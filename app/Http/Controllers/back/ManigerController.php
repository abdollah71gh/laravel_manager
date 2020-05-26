<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Maniger;
use App\Portfolio;
use Illuminate\Http\Request;
use Mockery\Exception;

class ManigerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $manigers = Maniger::orderBy('id', 'DESC')->get();
        return view('back.manigers.manigers', compact('manigers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.manigers.create');
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
        $validateDate = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);
        $maniger = new Maniger();
        try {
            $maniger->create($request->all());

        } catch (Exception $exception) {
            return redirect(route('admin.manigers.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره داده با موفقیت در دیتابییس ثبت گردید';
        return redirect(route('admin.manigers'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Maniger $maniger
     * @return \Illuminate\Http\Response
     */
    public function show(Maniger $maniger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Maniger $maniger
     * @return \Illuminate\Http\Response
     */
    public function edit(Maniger $maniger)
    {
        //
        return view('back.manigers.edit',compact('maniger'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Maniger $maniger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maniger $maniger)
    {
        //
        $validateDate = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);
        try {
            $maniger->update($request->all());

        } catch (Exception $exception) {
            return redirect(route('admin.manigers.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره داده با موفقیت در دیتابییس ثبت گردید';
        return redirect(route('admin.manigers'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Maniger $maniger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maniger $maniger)
    {
        //
        $maniger->delete();
      $msg='ایتم مورد نظر با موفقیت حذف گردید';
        return redirect(route('admin.manigers'))->with('success', $msg);
    }
    public function updatstatus(Maniger $maniger)
    {
        if ($maniger->status == 1) {
            $maniger->status = 0;
        } else {
            $maniger->status = 1;
        }
        $maniger->save();
        $msg = 'بروز رسانی با موفقیت انجام شد';
        return redirect(route('admin.manigers'))->with('success', $msg);

    }
}
