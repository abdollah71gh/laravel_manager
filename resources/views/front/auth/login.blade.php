@extends('front.index')
@section('content')
<section id="intro2" class="clearfix"></section>
<main class="container main2">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item active" aria-current="page">ثبت نام</li>
        </ol>
    </nav>
    <div class="container mt2">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header bg-info text-light">فرم ثبت نام</div>
                    <div class="card-body">
                        <form method="post" action="{{route('login')}}">
                            @csrf

                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       placeholder="ایمیل خود را وارد نمایید" value="{{old('email')}}">
                                @error('email')
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

                            <button type="submit" class="btn btn-danger rounded-pill btn-block">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
