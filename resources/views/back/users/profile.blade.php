@extends('back.index')
@section('title')
ویرایش کاربر
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">ویرایش کاربر </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{route('admin.profileupdate',$user->id)}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="نام خود را وارد نمایید" value="{{$user->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           placeholder="ایمیل خود را وارد نمایید" value="{{$user->email}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                           name="phone"
                                           placeholder="تلفن خود را وارد نمایید" value="{{$user->phone}}">
                                    @error('phone')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           placeholder="پسورد خود را وارد نمایید">
                                    @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           name="password_confirmation"
                                           placeholder="پسورد خود را مجددا وارد نمایید">
                                    @error('password_confirmation')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-danger rounded-pill btn-block">ویرایش</button>
                                <a href="{{route('admin.users')}}" class="btn btn-info btn-block rounded-pill">بازگشت</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>
@endsection

