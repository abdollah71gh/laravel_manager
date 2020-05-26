@extends('back.index')
@section('title')
   پنل مهارت هی من- مدیریت  مهارت های من
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title"> مهارت های من </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                @include('back.message')
                <a href="{{route('admin.skills.create')}}" class="btn btn-success rounded-pill btn-block">ایجاد دسته بندی</a>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <table class="table text-center">
                                <thead class="bg-dark text-center">
                                <tr >
                                    <th class="text-light" style="font-size: 20px">عنوان</th>
                                    <th class="text-light" style="font-size: 20px">نام</th>
                                    <th class="text-light" style="font-size: 20px">توضیحات</th>
                                    <th class="text-light" style="font-size: 20px">وضعیت</th>
                                    <th class="text-light" style="font-size: 20px">مدیریت</th>

                                </tr>
                                </thead>
                                <tbody class="bg-secondary">
                                @foreach($skills as $skill)
                                    @switch($skill->status)
                                        @case(1)
                                        @php
                                            $url=route('admin.skills.status',$skill->id);
                                            $status='<a href="'.$url.'" class="badge badge-danger">فعال</a>' @endphp
                                        @break
                                        @case(0)
                                        @php
                                            $url=route('admin.skills.status',$skill->id);
                                            $status= '<a href="'.$url.'" class="badge badge-info">غیر فعال</a>' @endphp
                                        @break
                                        @default
                                    @endswitch


                                    <tr>
                                        <td>{{$skill->name}}</td>
                                        <td>{{$skill->title}}</td>
                                        <td>{{$skill->body}}</td>
                                        <td>{!! $status!!}</td>

                                        <td>
                                            <a href="{{route('admin.skills.edit',$skill->id)}}" class="badge badge-primary">ویرایش</a>
                                            <a href="{{route('admin.skills.destroy',$skill->id)}} "onclick="return confirm('آیا میخواهید ایتم مورد نظر حذف گردد')"
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

