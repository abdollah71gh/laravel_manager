@extends('back.index')
@section('title')
    پنل مدیریت   - مدیریت کاربران
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">کاربران </h4>
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
                                    <th class="text-light" style="font-size: 20px">نام</th>
                                    <th class="text-light" style="font-size: 20px">ایمیل</th>
                                    <th class="text-light" style="font-size: 20px">تلفن</th>
                                    <th class="text-light" style="font-size: 20px">نقش</th>
                                    <th class="text-light" style="font-size: 20px">وضعیت</th>
                                    <th class="text-light" style="font-size: 20px">مدیریت</th>

                                </tr>
                                </thead>
                                <tbody class="bg-secondary">
                                @foreach($users as $user)
                                    @switch($user->role)
                                        @case(1)
                                        @php $role='مدیر' @endphp
                                        @break
                                        @case(2)
                                        @php $role='کاربر' @endphp
                                        @break
                                        @default
                                    @endswitch
                                    {{--    role status--}}

                                    @switch($user->status)
                                        @case(1)
                                        @php
                                            $url=route('admin.user.status',$user->id);
                                            $status='<a href="'.$url.'" class="badge badge-danger">فعال</a>' @endphp
                                        @break
                                        @case(0)
                                        @php
                                            $url=route('admin.user.status',$user->id);
                                            $status= '<a href="'.$url.'" class="badge badge-info">غیر فعال</a>' @endphp
                                        @break
                                        @default
                                    @endswitch

                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$role}}</td>
                                        <td>{!! $status !!}</td>
                                        <td>
                                            <a href="{{route('admin.profile',$user->id)}}" class="badge badge-primary">ویرایش</a>
                                            <a href="{{route('admin.user.delete',$user->id)}} "onclick="return confirm('آیا میخواهید ایتم مورد نظر حذف گردد')"
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

