<?php


namespace App\Http\Controllers;


use App\Blog;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Facade;

class Home extends Facade
{
    public static function getTrendingArticle()
    {
        return Blog::whereDate('created_at', '>=', Carbon::now()->subDays(30))->orderBy('views')->take(5)->get();
    }
    public static function getBestTag()
    {
        return Tag::with('blogs')->get()->sortBy(function ($q){
            $q->blogs->count();
        })->take(4);
    }
}
