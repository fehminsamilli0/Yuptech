@extends('back.layout.master')
@extends('back.tinymce')
@section('content')
    <div class="container-fluid"><div class="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex no-block align-items-center">
                                <div>
                                    <h2 class="card-title">
                                        Portfolio Siyahı
                                    </h2>
                                </div>
                            </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive mt-3">
                                                <table class="table table-bordered table-responsive-lg">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">@lang('lang.img')</th>
                                                        <th scope="col">@lang('lang.title')</th>
                                                        <th scope="col">@lang('lang.servicecat')</th>
                                                        <th scope="col">@lang('lang.status')</th>
                                                        <th scope="col">@lang('lang.operations')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data as $x)
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <img style="width: 50px" src="{{asset($x->image)}}"  alt="1" />
                                                                </div>
                                                            </td>
                                                            <td>{{$x->name}}</td>
                                                            <td>{{\App\Models\Back\Cat_Portfolio::where('id',$x->cat_id)->first()->name}}</td>
                                                            <td>
                                                                <div class="switch">
                                                                    <label>
                                                                        <input type="checkbox" onchange="PortStatus({{$x->id}})" {{$x->status == "1" ? "checked" : ""}}>
                                                                        <span class="lever switch-col-teal"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mezmun{{$x->id}}"><i class="fa fa-eye"></i>
                                                                </button>
                                                                <a href="{{route('PortfolioEdit',$x->id)}}"><button class="btn btn-outline-primary "><i class="fa fa-edit"> </i></button></a>

                                                                <button onclick="DeletePort({{$x->id}},'{{$x->image}}')" class="btn btn-outline-danger "><i class="fa fa-times"> </i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form method="POST" action="{{route('PortfolioAdd')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="username">@lang('lang.sel_cat')</label>
                                                    <select data-placeholder="Select a state..."name="cate" class="select2-with-icons form-control" id="select2-with-icons" style="width: 100%; height:36px;">
                                                        @foreach($cat as $x)
                                                            <option value="{{$x->id}}">{{$x->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="username">@lang('lang.title')</label>
                                                    <input class="form-control" type="text" id="name" name="name" required="" >
                                                </div>
                                                <div class="form-group">
                                                    <label  for="tag" >Tag</label>
                                                    <div class="tags-default">
                                                        <input type="text" id="tag" name="tag[]" value="" data-role="tagsinput" placeholder="Teq Əlavə Edin..." required="required" /> </div>
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
                                                <div class="form-group">
                                                    <label>@lang('lang.content')</label>
                                                    <textarea name="content1" class="form-control txtarea" rows="7">
                                                    </textarea>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary" type="submit">@lang('lang.submit')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <!-- SignIn modal content -->
                            <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            </div>
                            <div class="btn-list">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                        data-target="#signup-modal">Kateqoriya Əlavə Et</button>
                            </div>
                            <!-- Button trigger modal -->


                            <!-- Bax -->
                            <!-- Modal -->
                            @foreach($data as $x)
                                <div class="modal fade" id="mezmun{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ətraflı</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4> Məzmun </h4>
                                            <br />
                                            {!!$x->content1!!}
                                        </div>
                                        <div class="modal-body">
                                        <h4> Tag </h4>
                                        <br />
                                        @foreach ((array)$x->tag as $z)
                                            {{ $z }}
                                        @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
