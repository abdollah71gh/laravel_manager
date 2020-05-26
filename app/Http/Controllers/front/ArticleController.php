<?php

namespace App\Http\Controllers\front;

use App\frontmodels\Category;
use App\Http\Controllers\Controller;
use App\frontmodels\Article;
use App\frontmodels\Comment;
use App\frontmodels\User;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('front.articles', compact('articles'));
    }


    public function show(Article $article)
    {
        //

        return view('front.article', compact('article'));
    }

    public function showArticles($slug ,Article $article)
    {
        $articles = Article::where('slug', $slug)->first();
        $comments=$article->comments()->get();
        return view('front.article', compact('articles','comments'));
    }


}
