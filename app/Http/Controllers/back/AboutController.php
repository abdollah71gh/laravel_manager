<?php

namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use App\About;
use App\Maniger;
use Illuminate\Http\Request;
use Mockery\Exception;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $abouts = About::orderBy('id', 'DESC')->get();
        return view('back.abouts.abouts', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $about = new About();
        try {
            $about->create($request->all());

        } catch (Exception $exception) {
            return redirect(route('admin.abouts.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره داده با موفقیت در دیتابییس ثبت گردید';
        return redirect(route('admin.abouts'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
        return view('back.abouts.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
        $validateDate = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);
        try {
            $about->update($request->all());

        } catch (Exception $exception) {
            return redirect(route('admin.abouts.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره داده با موفقیت در دیتابییس ثبت گردید';
        return redirect(route('admin.abouts'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
        $about->delete();
        $msg='ایتم مورد نظر با موفقیت حذف گردید';
        return redirect(route('admin.abouts'))->with('success', $msg);
    }

    public function updatstatus(About $about)
    {
        if ($about->status == 1) {
            $about->status = 0;
        } else {
            $about->status = 1;
        }
        $about->save();
        $msg = 'بروز رسانی با موفقیت انجام شد';
        return redirect(route('admin.abouts'))->with('success', $msg);

    }
}
