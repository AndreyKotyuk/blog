<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    function index(){
        $articles = Article::all();
        return view('articles.index')->with('articles',$articles);
    }

    function show($id){
        $article = Article::findOrFail($id);

        return view('articles.show')->with('article',$article);
    }
}
