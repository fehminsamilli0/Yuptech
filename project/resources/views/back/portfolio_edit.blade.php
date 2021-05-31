@extends('back.layout.master')
@extends('back.tinymce')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h2 class="card-title">@lang('lang.about')</h2>

                    <form method="post" action="{{route('PortfolioEdit',$data[0]->id)}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="id" value="{{$data[0]->id}}" />
                        <input type="hidden" name="oldimage" value="{{$data[0]->image}}" />

                        <div class="form-group">
                            <label>Ad</label>
                            <input type="text" name="name" class="form-control" value="{{$data[0]->name}}">
                        </div>
                        <div class="form-group">
                            <label for="username">@lang('lang.sel_cat')</label>
                            <select data-placeholder="Select a state..." name="cate" class="select2-with-icons form-control" id="select2-with-icons" style="width: 100%; height:36px;">
                                @foreach($data as $x)
                                        @foreach($cat as $y)
                                                <option @if($y->id === $data[0]->cat_id) selected="selected" @endif value="{{$y->id}}">{{$y->name}}</option>
                                        @endforeach
                                        @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>@lang('lang.content')</label>
                            <textarea name="content1" class="form-control txtarea " rows="7">
                            {{$data[0]->content1}}
                        </textarea>
                            <div class="form-group">
                                <label>Tags</label>
                                @foreach((array)$data[0]->tag as $z)
                                    <input type="text" value="{{$z}}" data-role="tagsinput">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label >@lang('lang.current_img')</label> <br />
                            <img style="width: 150px" src="{{asset($data[0]->image)}}"  />
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
