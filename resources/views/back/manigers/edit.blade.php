@extends('back.index')
@section('title')
    پنل تیم مهندسی - ویرایش  تیم ما
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">ویرایش تیم  مهندسی </h4>
                    </div>
                </div>

            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" action="{{route('admin.manigers.update',$maniger->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label for="">نام </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name"
                                           placeholder="نام خود را وارد نمایید" value="{{$maniger->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">تولید محتویات</label>
                                    <textarea type="text"  rows="6" class="form-control @error('body') is-invalid @enderror"
                                              name="body"
                                              placeholder="توضیحات مربوطه خود را وارد نمایید">{{$maniger->body}}</textarea>
                                    @error('body')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">عنوان</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           name="title"
                                           placeholder="  عنوان خود خود را وارد نمایید" value="{{$maniger->title}}">
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">تولید محتویات</label>
                                    <textarea type="text"  rows="6" class="form-control @error('job') is-invalid @enderror"
                                              name="job"
                                              placeholder=" شغل مربوطه خود را وارد نمایید">{{$maniger->job}}</textarea>
                                    @error('job')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-info" type="button" id="button-image">انتخاب</button>
                                    </div>
                                    <input type="text" id="image_label" class="form-control" name="image"
                                           aria-label="image" aria-describedby="button-image" value="{{$maniger->image}}">

                                </div>


                                <button type="submit" class="btn btn-danger rounded-pill btn-block">ذخیره</button>
                                <a href="{{route('admin.manigers')}}" class="btn btn-info btn-block rounded-pill">بازگشت</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>
@endsection

