<?php

namespace App;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
//        'user_id', //temporary временно разврешаем пользователю записовать сатический айди
    ]; //массив позволяющий менять значения в бд в указаных столбцах

    protected $dates =[
        'published_at'
    ]; //массив позволяющий обращаться с любым timestamp как с обьектом Carbon
    //dd($article->published_at->addDays(8)->diffForHumans()); (в контроллере)

    public function scopePublished($query){
        $query->where('published_at','<=',Carbon::now());
    }//query scope область запросов. позволяет делегировать обьемный код в с контроллера в модель как пример
    //        $articles = Article::latest('updated_at')->published()->get();
    //семантика scopeНазваниеМетода

    public function scopeUnPublished($query){
        $query->where('published_at','>',Carbon::now());
    }

    public function setPublishAtAttribute($date){
        $this->attributes['published_at']=Carbon::createFromFormat('Y-m-d',$date);
    }//мутатор для свойств,set and get дают нам возможность манипулировать данными перед добавлением в БД или после их извлечения из неё.


//    public function setUserIdAttribute(){
//        $this->attributes['user_id']= Auth::user();
//    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
