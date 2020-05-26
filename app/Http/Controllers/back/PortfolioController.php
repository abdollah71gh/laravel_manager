<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Article;
use App\Portfolio;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios = Portfolio::orderBy('id', 'DESC')->get();
        return view('back.protfolios.portfolios', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.protfolios.create');

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

        ]);
        $portfolio = new Portfolio();
        try {
            $portfolio->create($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.portfolios.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره مطالب با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.portfolios'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
        return view('back.protfolios.edit', compact('portfolio'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        //
        $valddateDate = $request->validate([
            'name.required',
//            'slug.required',
        ]);
        try {
            $portfolio->update($request->all());

        } catch (Exception $exception) {
            return redirect(route('admin.portfolios.create'))->with('warning', $exception->getCode());

        }
        $msg = 'ذخیره نمونه کارها با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.portfolios'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
        $portfolio->delete();
        $msg = 'ایتم مورد نظر حذف گردید';
        return redirect(route('admin.portfolios'))->with('success', $msg);
    }

    public function updatstatus(Portfolio $portfolio)
    {
        if ($portfolio->status == 1) {
            $portfolio->status = 0;
        } else {
            $portfolio->status = 1;
        }
        $portfolio->save();
        $msg = 'بروز رسانی با موفقیت انجام شد';
        return redirect(route('admin.portfolios'))->with('success', $msg);

    }
}
