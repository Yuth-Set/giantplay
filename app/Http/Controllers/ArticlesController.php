<?php

namespace App\Http\Controllers;

//use DB;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class ArticlesController extends Controller {
    public function __construct() {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index(Request $request) {
        $sql = ("id, title, user_id, published_at, CONCAT(SUBSTR(body, 1, 236), '...') AS body");
        $articles = Article::selectRaw($sql)->latest()->published()->paginate(3);
        $articles->setPath('/articles');
        $latest = Article::latest()->first();

        return view('articles.index', compact('articles', 'latest'));
    }

    public function show(Article $article) {
        return view('articles.show', compact('article'));
    }

    public function create() {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request) {
        $this->createArticle($request);
        flash()->success('Your article has been created');
        return redirect('articles');
    }

    public function edit(Article $article) {
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request) {
        if (Auth::user() == $article->user) {
            $article->update($request->all());
            if ($request->has('tag_list')) {
                $article->tags()->sync($request->tag_list);
            } else {
                $article->tags()->detach($request->tag_list);
            }
            flash()->success('Your article have been updated');
            return redirect('articles');
        } else {
            flash()->warning('Oop! You are not allowed to update!');
            return redirect('articles');
        }
    }

    public function destroy(Article $article) {
        if (Auth::user() == $article->user) {
            $article->delete();
            flash()->success('Your article have been deleted');
            return redirect('articles');
        } else {
            flash()->warning('Oop! You are not allowed to delete!');
            return redirect('articles');
        }
    }

    private function syncTags(Article $article, array $tags) {
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request) {
        $article = Auth::user()->articles()->create($request->all());
        $article->tags()->attach($request->input('tag_list'));
        return $article;
    }

    public function search(Request $request) {
        $keyword = "%{$request->input('k')}%";
        return Article::
            where('title', 'LIKE', $keyword)
            ->orWhere('body', 'LIKE', $keyword)->get();
    }
}
