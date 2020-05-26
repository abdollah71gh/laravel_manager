<?php

namespace App\Http\Controllers\back;

use App\Category;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Article;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::orderBy('id', 'DESC')->get();
        return view('back.comments.comments', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
        return view('back.comments.edit', compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required'
        ]);


        try {
            $comment->update($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.comments.edit'))->with('warning', $exception->getCode());
        }

        $msg = "ذخیره ی نظر با موفقیت انجام شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
        try {
            $comment->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.comments'))->with('warning', $exception->getCode());
        }

        $msg = "آیتم مورد نظر حذف گردید";
        return redirect(route('admin.comments'))->with('success', $msg);
    }

    public function updatstatus(Comment $comment)
    {
        if ($comment->status == 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }

        $comment->save();
        $msg = "بروزرسانی با موفقیت انجام شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }
}
