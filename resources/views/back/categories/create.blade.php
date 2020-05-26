@extends('back.index')
@section('title')
پنل دسته بندی - دسته بندی جدید
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title"> ایجاد دسته بندی </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{route('admin.categories.store')}}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="نام خود را وارد نمایید" value="{{old('name')}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                           name="slug"
                                           placeholder="نام مستعار خود را وارد نمایید" value="{{old('slug')}}">
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-danger rounded-pill btn-block">ذخیره</button>
                                <a href="{{route('admin.categories')}}" class="btn btn-info btn-block rounded-pill">بازگشت</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>
@endsection

