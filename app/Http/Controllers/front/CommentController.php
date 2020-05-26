<?php

namespace App\Http\Controllers\front;

use App\frontmodels\Article;
use App\Http\Controllers\Controller;
use App\frontmodels\Comment;
use App\Mail\CommentsSend;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{


    public function store(Article $article, Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',

        ]);

        $article->comments()->create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'body' => $request->body
            ]
        );
        Mail::to($request->email)
            ->send(new CommentsSend($request,$article));
        $msg='ایمیل شما با موفقیت ارسال شد در صورت تایید از مدیر سایت نمایش داده میشود';
        return back()->with('success',$msg);


    }

}
