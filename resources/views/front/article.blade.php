@extends('front.index')
@section('content')
    <section id="intro2" class="clearfix"></section>
    <main class="container main2">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item " aria-current="page"> مطالب</li>
                <li class="breadcrumb-item active" aria-current="page">{{$articles->name}}</li>
            </ol>
        </nav>

        <div class="container mt-2">
            <div class="row">

                <div class="col-sm-8 mb-3">
                    <h1>{{$articles->name}}</h1>
                    <div>
                        <ul>
                            <li style="font-size: 20px">نویسنده : {{$articles->user->name}}</li>
                            <li style="font-size: 20px">تاریخ
                                : {!! jdate($articles->created_at)->format('%A, %d %B %y') !!}</li>
                        </ul>

                    </div>

                    <p>{!!$articles->description!!}</p>
                </div>
            </div>
            <hr>
            @include('front.message')
            <div class="container mt-3">
                <form method="post" action="{{route('comment.store',$articles->id)}}">
                    @csrf
                    <div class="row">
                        @auth()
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">نام :</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="نام خود را وارد نمایید" value="{{Auth::user()->name}}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">ایمیل :</label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="ایمیل خود را وارد نمایید" value="{{Auth::user()->email}}" readonly>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">نام :</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="نام خود را وارد نمایید">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">ایمیل :</label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="ایمیل خود را وارد نمایید">
                                </div>
                            </div>
                        @endauth

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">متن نظرات شما :</label>
                                <textarea class="form-control" rows="6" name="body"
                                          placeholder="نظرات خود را وارد نمایید"> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recapcha">تصاویر امنیتی</label>
                        {!! htmlFormSnippet() !!}
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill btn-block">ارسال نظرات</button>

                </form>
            </div>

        </div>
        @foreach($comments  as $comment)
            <ul>
                <li>{{$comment->name}}</li>
                <li>{{$comment->email}}</li>
                <li>{{$comment->body}}</li>
            </ul>
        @endforeach
    </main>

@endsection
