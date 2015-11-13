<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Article;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        $articles = $tag->articles()->latest()->published()->paginate(3);
        $articles->setPath($tag->name);
        return view('articles.index',compact('articles'));
    }
}
