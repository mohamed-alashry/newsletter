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
    public function index(Request $request, $article)
    {
        $articleContents = ArticleContent::where('article_id', $article)->orderBy('sort')->paginate(10);

        return view('article_contents.index', compact('articleContents', 'article'));
    }

    /**
     * Show the form for creating a new ArticleContent.
     *
     * @return Response
     */
    public function create($article)
    {
        return view('article_contents.create', compact('article'));
    }

    /**
     * Store a newly created ArticleContent in storage.
     *
     * @param CreateArticleContentRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleContentRequest $request, $article)
    {
        $input = $request->all();

        $input['article_id'] = $article;
        $articleContent = $this->articleContentRepository->create($input);

        Flash::success('Article Content saved successfully.');

        return redirect(route('articles.articleContents.index', $article));
    }

    /**
     * Display the specified ArticleContent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($article, $id)
    {
        $articleContent = $this->articleContentRepository->find($id);

        if (empty($articleContent)) {
            Flash::error('Article Content not found');

            return redirect(route('articles.articleContents.index'));
        }

        return view('article_contents.show', compact('articleContent', 'article'));
    }

    /**
     * Show the form for editing the specified ArticleContent.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($article, $id)
    {
        $articleContent = $this->articleContentRepository->find($id);

        if (empty($articleContent)) {
            Flash::error('Article Content not found');

            return redirect(route('articles.articleContents.index'));
        }

        return view('article_contents.edit', compact('articleContent', 'article'));
    }

    /**
     * Update the specified ArticleContent in storage.
     *
     * @param int $id
     * @param UpdateArticleContentRequest $request
     *
     * @return Response
     */
    public function update($article, $id, UpdateArticleContentRequest $request)
    {
        $articleContent = $this->articleContentRepository->find($id);

        if (empty($articleContent)) {
            Flash::error('Article Content not found');

            return redirect(route('articles.articleContents.index'));
        }

        $articleContent = $this->articleContentRepository->update($request->all(), $id);

        Flash::success('Article Content updated successfully.');

        return redirect(route('articles.articleContents.index', $article));
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
    public function destroy($article, $id)
    {
        $articleContent = $this->articleContentRepository->find($id);

        if (empty($articleContent)) {
            Flash::error('Article Content not found');

            return redirect(route('articles.articleContents.index', $article));
        }

        $this->articleContentRepository->delete($id);

        Flash::success('Article Content deleted successfully.');

        return redirect(route('articles.articleContents.index', $article));
    }
}
