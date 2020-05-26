@extends('front.index')
@section('content')
<section id="intro2" class="clearfix"></section>
<main class="container main2">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item active" aria-current="page"> فعالسازی حساب کاربری</li>
        </ol>
    </nav>
    <div class="container mt2">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header bg-info text-light"style="font-size: 20px">  فعال سازی حساب کاربری</div>
                    <div class="card-body">
                        <p class="bg-info  text-light py-2 px-2 " style="font-size: 17px">برای فعالسازی  تاییدیه ایمیل روی دکمه زیر کلیک نمایید تا ایمیل شما فعال شود با تشکر !!!</p>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('این یک ایمیل فعال سازی است لطفا پس از صحت ان تایید نمایید') }}
                            </div>
                        @endif
                    </div>
                    <div  class="card-footer">
                    <form method="post" action="{{route('verification.resend')}}">
                        @csrf
                        <button type="submit" class="btn btn-success  btn-block rounded-pill">ارسال تاییده ایمیل</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
