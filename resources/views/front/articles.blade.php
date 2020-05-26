@extends('front.index')
@section('content')
    <section id="intro2" class="clearfix"></section>
    <main class="container main2">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active" aria-current="page"> مطالب</li>
            </ol>
        </nav>

        <div class="container mt-2">
            <div class="row">
                @foreach($articles as  $article)
                    <div class="col-sm-3">
                        <img src=" <?php  echo '/storage/photos/11/thumbs/' . basename($article->image)?>" alt="">
                        <h3><a href="{{route('articles.by.slug',$article->slug)}}"> {{$article->name}}</a></h3>
                        <div>
                            <ul>
                                <li style="font-size: 20px" >نویسنده : {{$article->user->name}}</li>
                                <li style="font-size: 20px">تاریخ  : {!! jdate($article->created_at)->format('%B -%d- %Y') !!}</li>
                            </ul>

                        </div>
                        <p><?php  echo mb_substr(strip_tags($article->description), 0, 120,'UTF8') . '...'; ?></p>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

