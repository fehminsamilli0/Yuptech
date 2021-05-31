@extends('back.layout.master')
@extends('back.tinymce')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h2 class="card-title">Komanda Redaktə</h2>

                    <form method="post" action="{{route("TeamEditIndex",$data[0]->id)}}" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" name="oldimage" value="{{$data[0]->image}}" />

                        <div class="form-group">
                            <label>Adı</label>
                            <input type="text" name="name" class="form-control" value="{{$data[0]->name}}">
                        </div>

                        <div class="form-group">
                            <label>Vəzifə</label>
                            <input type="text" name="position" class="form-control" value="{{$data[0]->position}}">
                        </div>
                        <div class="form-group">
                            <label>Cari Şəkil</label> <br />
                            <img style="width: 150px" src="{{asset($data[0]->image)}}"  />
                        </div>

                        <div class="form-group">
                            <label> @lang('lang.choose_image')</label>
                            <div class="input-group">

                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" >
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

