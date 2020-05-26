<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('back.categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.categories.create');
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
            'slug.required',
        ]);
        $category = new Category();
        try {
            $category->create($request->all());
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000:
                    $msg = 'نام مستعار وارد شده تکراری است';
            }
            return redirect(route('admin.categories.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ویرایش با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.categories'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('back.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //

        $valddateDate = $request->validate([
            'name.required',
            'slug.required',
        ]);
        try {
            $category->update($request->all());
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000:
                    $msg = 'نام مستعار وارد شده تکراری است';
            }
            return redirect(route('admin.categories.edit'))->with('warning', $exception->getCode());
        }
        $msg = 'ویرایش با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.categories'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        try {
            $category->delete();

        } catch (Exception $exception) {
            return redirect(route('admin.categories'))->with('warning', $exception->getCode());
        }
        $msg = 'آیتم مورد نظر با موفقیت حذف گردید';
        return redirect(route('admin.categories'))->with('success', $msg);
    }
}
