<?php

namespace App\Http\Controllers;

//use DB;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {
    public function __construct() {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index(Request $request) {
        // $articles = Article::orderBy('title');
        // $title = $request->input('title');
        // if(!empty($title)){
        //   $articles->Where('title','LIKE','%'.$title.'%');
        // }

        //$articles = $articles->paginate(3);
        $sql = 'id, title, user_id, published_at, CONCAT(SUBSTR(body, 1, 236), "...") AS "body"';
        $articles = Article::selectRaw($sql)->latest()->published()->paginate(3);
        // return $articles = Article::latest()->published()->paginate(3);
        $articles->setPath('/articles');
        $latest = Article::latest()->first();

        return view('articles.index', compact('articles', 'latest'));
    }

    public function show(Article $article) {
        /*$article = Article::findOrFail($id);*/

        return view('articles.show', compact('article'));
    }

    public function create() {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request) {
        $this->createArticle($request);

        /*flash()->overlay('Your article has been created','Good job!');*/
        flash()->success('Your article has been created');
        return redirect('articles');
    }

    public function edit(Article $article) {
        /*$article = Article::findOrFail($id);*/
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request) {
        /*$article = Article::findOrFail($id);*/
        $article->update($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        flash()->success('Your article have been updated');
        return redirect('articles');
    }

    public function destroy(Article $article) {
        $article->delete();
        flash()->success('Your article have been deleted');
        return redirect('articles');
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
