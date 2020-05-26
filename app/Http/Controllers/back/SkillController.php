<?php

namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Skill;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skills = Skill::orderBy('id', 'DESC')->get();
        return view('back.skills.skills', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.skills.create');
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
        $valddateDate = $request->validate([
            'name.required',

        ]);
        $skill = new Skill();
        try {
            $skill->create($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.skills.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره مهارت ها با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.skills'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
        return view('back.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        //
        $valddateDate = $request->validate([
            'name.required',
//            'slug.required',
        ]);
        try {
            $skill->update($request->all());

        } catch (Exception $exception) {
            return redirect(route('admin.skills.create'))->with('warning', $exception->getCode());

        }
        $msg = 'ذخیره مهارت ها با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.skills'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        //
        $skill->delete();
        $msg = 'ایتم مورد نظر حذف گردید';
        return redirect(route('admin.skills'))->with('success', $msg);
    }
    public function updatstatus(Skill $skill)
    {
        if ($skill->status == 1) {
            $skill->status = 0;
        } else {
            $skill->status = 1;
        }
        $skill->save();
        $msg = 'بروز رسانی با موفقیت انجام شد';
        return redirect(route('admin.skills'))->with('success', $msg);

    }
}
