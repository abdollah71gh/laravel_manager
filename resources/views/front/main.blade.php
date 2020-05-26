@extends('front.index')
@section('content')
@include('front.message')
    <section id="intro" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-6 intro-info order-md-first order-last">
                    <h2>Rapid Solutions<br>for Your <span>Business!</span></h2>
                    <div>
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>

                <div class="col-md-6 intro-img order-md-last order-first">
                    <img src="front/img/intro-img.svg" alt="" class="img-fluid">
                </div>
            </div>

        </div>
    </section>

    <main id="main">

        @include('front.abouts')


  @include('front.service')

{{--@include('front.myus')--}}

{{--@include('front.callaction')--}}

{{--@include('front.features')--}}

@include('front.portfolio')

  @include('front.clientsection')

@include('front.team')

{{--@include('front.clientfade')--}}

{{--    @include('front.pricing')--}}

{{--    @include('front.faq')--}}

    </main>
@endsection
