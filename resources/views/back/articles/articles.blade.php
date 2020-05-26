@extends('back.index')
@section('title')
    پنل مدیریت   - مدیریت مطالب
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">مدیریت مطالب </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                @include('back.message')
                <a href="{{route('admin.articles.create')}}" class="btn btn-success rounded-pill btn-block">ایجاد دسته
                    بندی</a>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <table class="table text-center">
                                <thead class="bg-dark text-center">
                                <tr>
                                    <th class="text-light" style="font-size: 20px">نام</th>
                                    <th class="text-light" style="font-size: 20px">نام مستعار -slug</th>
                                    <th class="text-light" style="font-size: 20px">نویسنده</th>
                                    <th class="text-light" style="font-size: 20px">دسته بندی</th>
                                    <th class="text-light" style="font-size: 20px">بازدید</th>
                                    <th class="text-light" style="font-size: 20px">وضعیت</th>
                                    <th class="text-light" style="font-size: 20px">مدیریت</th>

                                </tr>
                                </thead>
                                <tbody class="bg-secondary">
                                @foreach($articles as $article)

                                    @switch($article->status)
                                        @case(1)
                                        @php
                                            $url=route('admin.articles.status',$article->id);
                                            $status='<a href="'.$url.'" class="badge badge-danger">فعال</a>' @endphp
                                        @break
                                        @case(0)
                                        @php
                                            $url=route('admin.articles.status',$article->id);
                                            $status= '<a href="'.$url.'" class="badge badge-info">غیر فعال</a>' @endphp
                                        @break
                                        @default
                                    @endswitch

                                    <tr>
                                        <td>{{$article->name}}</td>
                                        <td>{{$article->slug}}</td>
                                        <td>{{$article->user->name}}</td>
                                        <td>
                                            @foreach($article->categories()->pluck('name') as $category)
                                                <span class="badge badge-warning rounded-pill">{{$category}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{$article->hit}}</td>
                                        <td>{!!$status!!}</td>
                                        <td>
                                            <a href="{{route('admin.articles.edit',$article->slug)}}"
                                               class="badge badge-primary">ویرایش</a>
                                            <a href="{{route('admin.articles.destroy',$article->id)}} "
                                               onclick="return confirm('آیا میخواهید ایتم مورد نظر حذف گردد')"
                                               class="badge badge-success">حذف</a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

