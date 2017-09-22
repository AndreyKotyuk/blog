<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Request;

class ArticlesController extends Controller
{
    function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index')->with('articles', $articles);
    }

    function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show')->with('article', $article);
    }

    function create()
    {
        return view('articles.create');

    }

    function store()
    {

        $input = Request::all();


        $input['published_at'] = Carbon::now();

        Article::create($input);
        return redirect('articles');
    }

}
