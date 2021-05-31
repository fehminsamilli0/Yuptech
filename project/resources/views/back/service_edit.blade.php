@extends('back.layout.master')
@extends('back.tinymce')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h2 class="card-title">@lang('lang.about')</h2>

                    <form method="post" action="{{route('ServiceEdit',$data[0]->id)}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="id" value="{{$data[0]->id}}" />
                        <input type="hidden" name="oldservice" value="{{$data[0]->img}}" />

                        <div class="form-group">
                            <label>Başlıq</label>
                            <input type="text" name="title" class="form-control" value="{{$data[0]->title}}">
                        </div>
                        <div class="form-group">
                            <label for="username">@lang('lang.sel_cat')</label>
                            <select data-placeholder="Select a state..." name="cate" class="select2-with-icons form-control" id="select2-with-icons" style="width: 100%; height:36px;">
                                @foreach($topcat as $x)
                                    <optgroup label="{{$x->cat_name}}">
                                        @foreach($cat as $y)
                                            @if($y->top_cat == $x->id)
                                                <option @if($y->id === $data[0]->cat_id) selected="selected" @endif value="{{$y->id}}">{{$y->cat_name}}</option>
                                            @endif
                                        @endforeach
                                        @endforeach
                                    </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>@lang('lang.content')</label>
                            <textarea name="content1" class="form-control txtarea " rows="7">
                            {{$data[0]->content1}}
                        </textarea>

                        </div>
                        <div class="form-group">
                            <label >@lang('lang.current_img')</label> <br />
                            <img style="width: 150px" src="{{asset($data[0]->img)}}"  />
                        </div>
                        <div class="form-group">
                            <label>Tags</label>

                                <input type="text" value="{{$data[0]->tag}}" data-role="tagsinput">

                        </div>
                        <div class="form-group">
                            <label> @lang('lang.choose_image')</label>
                            <div class="input-group">

                                <div class="custom-file">
                                    <input type="file" name="img" class="custom-file-input" id="img">
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
