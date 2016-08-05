<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class TagsController extends Controller {
    public function __construct() {
        $this->middleware('auth', ['only' => 'create']);
    }

    public function index(Request $request) {
        return view('tags.index');
    }

    public function show(Tag $tag) {
        $articles = $tag->articles()->latest()->published()->paginate(3);
        $articles->setPath($tag->name);
        return view('articles.index', compact('articles'));
    }

    public function create() {
        return view('tags.create');
    }

    public function store(TagRequest $request, Tag $tag) {
        $request->user()->tags()->create(['name' => $request->name]);
        flash()->success('Your tag has been created');
        return redirect('tags');
    }

    public function edit(Tag $tag) {
        $tags = Tag::lists('name', 'id');
        return view('tags.edit', compact('tags', 'tag'));
    }

    public function update(Tag $tag, TagRequest $request) {
        if ($tag->isAuthorizeTag()) {
            $tag->update($request->all());
            flash()->success('Your tag have been updated');
            return redirect('tags');
        } else {
            flash()->warning('Oop! You are not allowed to update!');
            return redirect('tags');
        }
    }

    public function destroy(Tag $tag) {
        if ($tag->isAuthorizeTag()) {
            $tag->delete();
            flash()->success('Your tag have been deleted');
            return redirect('tags');
        } else {
            flash()->warning('Oop! You are not allowed to delete!');
            return redirect('tags');
        }
    }
}
