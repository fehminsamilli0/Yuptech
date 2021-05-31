@extends('back.layout.master')
@extends('back.tinymce')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h2 class="card-title">İş Sahəsi Redaktə </h2>

                    <form method="post" action="{{route("JobEditIndex",$job[0]->id)}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="oldicon" value="{{$job[0]->icon}}" />

                        <div class="form-group">
                            <label>Adı</label>
                            <input type="text" name="name" class="form-control" value="{{$job[0]->name}}">
                        </div>

                        <div class="form-group">
                            <label>Rəng</label>
                            <input type="color" name="back_color" class="form-control" value="{{$job[0]->back_color}}">
                        </div>
                        <div class="form-group">
                            <label>Cari Şəkil</label> <br />
                            <img style="width: 150px" src="{{asset($job[0]->icon)}}"  />
                        </div>

                        <div class="form-group">
                            <label> @lang('lang.choose_image')</label>
                            <div class="input-group">

                                <div class="custom-file">
                                    <input type="file" name="icon" class="custom-file-input" >
                                    <label class="custom-file-label" for="logo">@lang('lang.choose_file')</label>
                                </div>
                            </div>
                        </div>


                        <div>
                            <button type="submit" class="btn-block btn btn-outline-success mt-5">@lang('lang.submit')</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

