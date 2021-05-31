@extends('back.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex no-block align-items-center">
                            <div>
                                <h2 class="card-title">@lang('lang.general')</h2>
                            </div>
                        </div>
                        <form class="mt-4" method="POST" action="{{route('SettingsUpdate')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data[0]->id}}" />
                            <input type="hidden" name="oldlight" value="{{$data[0]->logo_light}}" />
                            <input type="hidden" name="olddark" value="{{$data[0]->logo_dark}}" />
                            <input type="hidden" name="oldfavicon" value="{{$data[0]->fav_icon}}" />
                            <input type="hidden" name="oldrobots" value="{{$data[0]->robots}}" />

                            @if(App::isLocale('az'))
                                <input type="hidden"  name="lang" value="0" class="form-control"  />
                            @endif
                            @if(App::isLocale('en'))
                                <input type="hidden"  name="lang" value="1" class="form-control"  />
                            @endif

                            <div class="form-group">
                                <label for="title">@lang('lang.title')</label>
                                <input type="text" maxlength="255" name="title" value="{{$data[0]->title}}" class="form-control"  />
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('lang.desc')</label>
                                <input type="text" maxlength="255" name="description" class="form-control" value="{{$data[0]->description}}"  />
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('lang.slogan')</label>
                                <input type="text" maxlength="255" name="slogan" class="form-control" value="{{$data[0]->slogan}}" />
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('lang.word')</label>
                                <input type="text" maxlength="255" name="word" class="form-control" value="{{$data[0]->word}}"  />
                            </div>

                            <div style="display:flex;justify-content: space-around;">
                                <div class="form-group">
                                    <label >@lang('lang.logo_light')</label> <br />
                                    <img style="width: 100px" src="{{asset($data[0]->logo_light)}}"  height="100" />
                                </div>
                                <div class="form-group">
                                    <label >@lang('lang.logo_dark')</label> <br />
                                    <img style="width: 100px" src="{{asset($data[0]->logo_dark)}}"  height="100"  />
                                </div>
                                <div class="form-group">
                                    <label>@lang('lang.fav_icon')</label> <br />
                                    <img style="width: 100px" src="{{asset($data[0]->fav_icon)}}"  height="100"  />
                                </div>
                            </div>


                            <div class="form-group">
                                <label>@lang('lang.logo_light1')</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@lang('lang.download')</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file"  name="light" class="custom-file-input" id="light">
                                        <label class="custom-file-label" for="light_logo">@lang('lang.choose_file')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('lang.logo_dark1')</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@lang('lang.download')</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="dark" class="custom-file-input" id="dark">
                                        <label class="custom-file-label" for="darklogo">@lang('lang.choose_file')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('lang.fav_icon1')</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@lang('lang.download')</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="favicon" class="custom-file-input" id="favicon">
                                        <label class="custom-file-label" for="robots">@lang('lang.choose_file')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('lang.robots')</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@lang('lang.download')</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="robots" class="custom-file-input" id="robots">
                                        <label class="custom-file-label" for="robots">@lang('lang.choose_file')</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-outline-success mt-5" >@lang('lang.submit')</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
