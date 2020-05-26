@extends('back.index')
@section('title')
    پنل مدیریت   - مدیریت نظرات
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">مدیریت نظرات </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                @include('back.message')
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <table class="table text-center">
                                <thead class="bg-dark text-center">
                                <tr>
                                    <th class="text-light" style="font-size: 20px">خلاصه نظر</th>
                                    <th class="text-light" style="font-size: 20px">نویسنده</th>
                                    <th class="text-light" style="font-size: 20px"> برای مطالب</th>
                                    <th class="text-light" style="font-size: 20px">  تاریخ ثبت</th>
                                    <th class="text-light" style="font-size: 20px">وضعیت</th>
                                    <th class="text-light" style="font-size: 20px">مدیریت</th>

                                </tr>
                                </thead>
                                <tbody class="bg-secondary">
                                @foreach($comments as $comment)

                                    @switch($comment->status)
                                        @case(1)
                                        @php
                                            $url=route('admin.comments.status',$comment->id);
                                            $status='<a href="'.$url.'" class="badge badge-danger">فعال</a>' @endphp
                                        @break
                                        @case(0)
                                        @php
                                            $url=route('admin.comments.status',$comment->id);
                                            $status= '<a href="'.$url.'" class="badge badge-info">غیر فعال</a>' @endphp
                                        @break
                                        @default
                                    @endswitch

                                    <tr>
                                        <td>{!! mb_substr($comment->body,0,50) !!}</td>
                                        <td>{{$comment->name}}</td>
                                        <td>{{$comment->article->name}}</td>
                                       <td>{!! jdate($comment->created_at)->format('%d-%B-%Y') !!}</td>
                                        <td>{!!$status!!}</td>
                                        <td>
                                            <a href="{{route('admin.comments.edit',$comment->id)}}"
                                               class="badge badge-primary">ویرایش</a>
                                            <a href="{{route('admin.comments.destroy',$comment->id)}} "
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

