<?php

namespace App\Http\Controllers\back;

use App\Category;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('back.articles.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all()->pluck('name', 'id');
        return view('back.articles.create', compact('categories'));
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


        $valddateDate = $request->validate([
            'name.required',
//            'slug.required',
        ]);
        if (empty($request->slug)) {
            $slug = SlugService::createSlug(Article::class, 'slug', $request->name);
        } else {
            $slug = SlugService::createSlug(Article::class, 'slug', $request->slug);
        }
        $request->merge(['slug' => $slug]);
        $article = new Article();
        try {
            $article = $article->create($request->all());
            $article->categories()->attach($request->categories);
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000:
                    $msg = 'نام مستعار وارد شده تکراری است';
            }
            return redirect(route('admin.articles.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره مطالب با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.articles'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Article $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Article $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        $categories = Category::all()->pluck('name', 'id');
        return view('back.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Article $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //

        $valddateDate = $request->validate([
            'name.required',
//            'slug.required',
        ]);
        try {
            $article->update($request->all());
            $article->categories()->sync($request->categories);
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000:
                    $msg = 'نام مستعار وارد شده تکراری است';
            }
            return redirect(route('admin.articles.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره مطالب با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.articles'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Article $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
        $msg = 'ایتم مورد نظر حذف گردید';
        return redirect(route('admin.articles'))->with('success', $msg);
    }

    public function updatstatus(Article $article)
    {
        if ($article->status == 1) {
            $article->status = 0;
        } else {
            $article->status = 1;
        }
        $article->save();
        $msg = 'بروز رسانی با موفقیت انجام شد';
        return redirect(route('admin.articles'))->with('success', $msg);

    }


}
