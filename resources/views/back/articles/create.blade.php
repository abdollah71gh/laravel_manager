@extends('back.index')
@section('title')
    پنل مطالب -  ویرایش مطالب
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title"> ویرایش مطالب </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.articles.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">نام</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="نام مطالب  را وارد نمایید" value="{{old('name')}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">نام مستعار</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                           name="slug"
                                           placeholder="نام مستعار خود را وارد نمایید" value="{{old('slug')}}">
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">محتویات مطالب</label>
                                    <textarea id="editor" class="form-control" rows="6" @error('description') is-invalid @enderror
                                    name="description"
                                    placeholder="توضیحات  خود را وارد نمایید"> {{old('description')}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">وضعیت</label>
                                    <select class="form-control" name="status">
                                        <option value="0">منتشر نشده</option>
                                        <option value="1">منتشر شده</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">انتخاب دسته بندی</label>
                                    <div id="output"></div>
                                    <select class="chosen-select" name="categories[]" multiple style="width:400px">
                                        @foreach ($categories as $cat_id => $cat_name)
                                            <option value="{{$cat_id}}">{{$cat_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title"> نویسند :{{Auth::user()->name}}</label>
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-info" type="button" id="button-image">انتخاب</button>
                                    </div>
                                    <input type="text" id="image_label" class="form-control" name="image"
                                           aria-label="image" aria-describedby="button-image">


                                </div>


                                <button type="submit" class="btn btn-danger rounded-pill btn-block">ذخیره</button>
                                <a href="{{route('admin.articles')}}"
                                   class="btn btn-info btn-block rounded-pill">بازگشت</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>
@endsection

