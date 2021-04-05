<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ArticleContentRepository;
use App\Http\Requests\CreateArticleContentRequest;
use App\Http\Requests\UpdateArticleContentRequest;
use App\Models\ArticleContent;

class ArticleContentController extends AppBaseController
{
    /** @var  ArticleContentRepository */
    private $articleContentRepository;

    public function __construct(ArticleContentRepository $articleContentRepo)
    {
        $this->articleContentRepository = $articleContentRepo;
    }

    /**
     * Display a listing of the ArticleContent.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articleContentsQuery = ArticleContent::query();

        if (request()->filled('article')) {
            $articleContentsQuery->where('article_id', request('article'));
        }

        $articleContents = $articleContentsQuery->paginate(10);

        return view('article_contents.index')
            ->with('articleContents', $articleContents);
    }

    /**
     * Show the form for creating a new ArticleContent.
     *
     * @return Response
     */
    public function create()
    {
        $articles = Article::pluck('title', 'id');

        return view('article_contents.create', compact('articles'));
    }

    /**
     * Store a newly created ArticleContent in storage.
     *
     * @param CreateArticleContentRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleContentRequest $request)
    {
        $input = $request->all();

        $articleContent = $this->articleContentRepository->create($input);

        Flash::success('Article Content saved successfully.');

        return redirect(route('articleContents.index'));
    }

    /**
     * Display the specified ArticleContent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articleContent = $this->articleContentRepository->find($id);

        if (empty($articleContent)) {
            Flash::error('Article Content not found');

            return redirect(route('articleContents.index'));
        }

        return view('article_contents.show')->with('articleContent', $articleContent);
    }

    /**
     * Show the form for editing the specified ArticleContent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articleContent = $this->articleContentRepository->find($id);

        if (empty($articleContent)) {
            Flash::error('Article Content not found');

            return redirect(route('articleContents.index'));
        }
        $articles = Article::pluck('title', 'id');

        return view('article_contents.edit', compact('articleContent', 'articles'));
    }

    /**
     * Update the specified ArticleContent in storage.
     *
     * @param int $id
     * @param UpdateArticleContentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleContentRequest $request)
    {
        $articleContent = $this->articleContentRepository->find($id);

        if (empty($articleContent)) {
            Flash::error('Article Content not found');

            return redirect(route('articleContents.index'));
        }

        $articleContent = $this->articleContentRepository->update($request->all(), $id);

        Flash::success('Article Content updated successfully.');

        return redirect(route('articleContents.index'));
    }

    /**
     * Remove the specified ArticleContent from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articleContent = $this->articleContentRepository->find($id);

        if (empty($articleContent)) {
            Flash::error('Article Content not found');

            return redirect(route('articleContents.index'));
        }

        $this->articleContentRepository->delete($id);

        Flash::success('Article Content deleted successfully.');

        return redirect(route('articleContents.index'));
    }
}
