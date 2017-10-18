<?php

namespace App\Http\Controllers;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    function index()
    {
        $user = \Auth::user();
        $articles=$user->articles()->published()->get();
//       return \Auth::user()->id;
//        $articles = Article::latest('updated_at')->where('published_at','<=',Carbon::now())->get();
//        $articles = Article::latest('updated_at')->published()->get();

        return view ('articles.index',compact('articles'));
    }

    function show($id)
    {
        $article = Article::findOrFail($id);

       // dd($article->published_at->addDays(8)->diffForHumans());

        return view('articles.show')->with('article', $article);
    }

    function create()
    {
        return view('articles.create');

    }

    function store(ArticleRequest $request) //ArticleRequest - область запросов где описаны требования параметров формы
    {
        $article= new Article($request->all()); //здесь еще не определен user_id (*1*)


//        метод Auth::user() возврачает обьект залогиненного пользователя
//        тоесть схоже на  $user = App\User::first(); $user->articles()-get() в tinker

        \Auth::user()->articles()->save($article); //(*2*) здесь user_id определяеться автоматически
//        $this->validate($request,['title'=>'required|min:3','body'=>'required']); //или метод validation
//        Article::create($request->all()); //create - функция модели Eloquent
        return redirect('articles'); //перенаправляем на GET article
    }

    function edit($id){
        $article = Article::findOrFail($id);
        return view('articles.edit')->with('article',$article);
    }

    function update($id, ArticleRequest $request){
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
