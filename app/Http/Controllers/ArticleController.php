<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\ArticleRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Article;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewsletter;
use App\Models\User;
use PhpParser\Node\Name\FullyQualified;

class ArticleController extends AppBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    /**
     * Display a listing of the Article.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $articles = Article::withCount('contents')->paginate(10);
        $users = User::pluck('name', 'email')->toArray();

        return view('articles.index', compact('articles', 'users'));
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->all();

        $article = $this->articleRepository->create($input);

        Flash::success('Article saved successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified Article.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified Article in storage.
     *
     * @param int $id
     * @param UpdateArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        $article = $this->articleRepository->update($request->all(), $id);

        Flash::success('Article updated successfully.');

        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified Article from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->find($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        $this->articleRepository->delete($id);

        Flash::success('Article deleted successfully.');

        return redirect(route('articles.index'));
    }

    public function preview($id)
    {
        $article = Article::find($id);

        $contentFull = $article->contents()->where('shape', 1)->orderBy('sort')->get();
        $contentHalf = $article->contents()->where('shape', 2)->orderBy('sort')->get();
        // dd($contentHalf->chunk(2));

        return view('articles.preview', compact('article', 'contentFull', 'contentHalf'));
    }

    public function send($id)
    {
        $article = Article::find($id);

        $contentFull = $article->contents()->where('shape', 1)->orderBy('sort')->get();
        $contentHalf = $article->contents()->where('shape', 2)->orderBy('sort')->get();

        $emails = request()->filled('email') ? request('email') : User::pluck('email')->toArray();

        Mail::to($emails)
        ->send(new SendNewsletter($article, $contentFull, $contentHalf));

        Flash::success('Article sent successfully.');

        return back();
        // return view('emails.newsletter', compact('article', 'contentFull', 'contentHalf'));
    }
}
