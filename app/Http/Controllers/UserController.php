<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;
use function Sodium\compare;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        $page_title = 'ویرایشش پروفایل';
        return view('front.auth.profile', compact('page_title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $message = [
            'name.required' => 'فیلد نام را وارد نمایید',
            'email.required' => 'فیلد ایمیل را وارد نمایید',
            'password.min'=>'پسورد باید ۸ کارکتر باشد',
            'password_confirmation.min'=>' تکرار پسورد باید ۸ کارکتر باشد  ',
        ];


        if (!empty($request->password)) {
            $valddateDate = $request->validate([
                'name.required',
                'email.required',
                'password'=>'min:8',
                'password_confirmation'=>'min:8'

            ], $message);
            $password = Hash::make($request->password);
            $user->password =$password;
        } else {
            $valddateDate = $request->validate([
                'name.required',
                'email.required',
                'password'=>'min:8',
                'password_confirmation'=>'min:8'
            ], $message);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        try {
            $user->save();
        }catch (Exception $exception){
            switch ($exception->getCode()){}
            return  redirect()->back()->with('warning',$exception->getCode());
        }
        $msg='ویرایش با موفقیت در دیتابیس ثبت گردید';
       return redirect(route('home'))->with('success',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
