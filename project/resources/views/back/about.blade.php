@extends('back.layout.master')
@extends('back.tinymce')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h2 class="card-title">@lang('lang.about')</h2>

                    <form method="post" action="{{route('AboutUpdate')}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="id" value="{{$data[0]->id}}" />
                        <input type="hidden" name="oldimage" value="{{$data[0]->about_image}}" />

                        <div class="form-group">
                            <label>@lang('lang.desc')</label>
                            <input type="text" name="about_title" class="form-control" value="{{$data[0]->about_title}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('lang.content')</label>
                            <textarea name="about_content" class="form-control txtarea " rows="7">
                            {{$data[0]->about_content}}
                        </textarea>

                        </div>
                        <div class="form-group">
                            <label >@lang('lang.current_img')</label> <br />
                            <img style="width: 150px" src="{{asset($data[0]->about_image)}}"  />
                        </div>

                        <div class="form-group">
                            <label> @lang('lang.choose_image')</label>
                            <div class="input-group">

                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
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
