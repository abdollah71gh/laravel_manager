<?php

namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Team;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::orderBy('id', 'DESC')->get();
        return view('back.teams.teams', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.teams.create');
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
        $team = new Team();
        try {
            $team->create($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.teams.create'))->with('warning', $exception->getCode());
        }
        $msg = 'ذخیره مطالب با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.teams'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
        return view('back.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
        $valddateDate = $request->validate([
            'name.required',
//            'slug.required',
        ]);
        try {
            $team->update($request->all());

        } catch (Exception $exception) {
            return redirect(route('admin.teams.create'))->with('warning', $exception->getCode());

        }
        $msg = 'ذخیره نمونه کارها با موفقیت در دیتابیس ثبت گردید';
        return redirect(route('admin.teams'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        $team->delete();
        $msg = 'ایتم مورد نظر حذف گردید';
        return redirect(route('admin.teams'))->with('success', $msg);
    }
    public function updatstatus(Team $team)
    {
        if ($team->status == 1) {
            $team->status = 0;
        } else {
            $team->status = 1;
        }
        $team->save();
        $msg = 'بروز رسانی با موفقیت انجام شد';
        return redirect(route('admin.teams'))->with('success', $msg);

    }
}
