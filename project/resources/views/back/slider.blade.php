@extends('back.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex no-block align-items-center">
                            <div>
                                <h2 class="card-title">@lang('lang.emp_list')</h2>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt">
                                        <table class="table table-bordered table-responsive-lg">
                                            <thead>
                                            <tr>
                                                <th scope="col">Şəkil</th>
                                                <th scope="col">Adı</th>
                                                <th scope="col">Rəng</th>
                                                <th scope="col">Tarix</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Əməliyyatlar</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($slider as $x)
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <img style="width: 50px" src="{{asset($x->image)}}"  />
                                                        </div>
                                                    </td>
                                                    <td>{{$x->name}}</td>
                                                    <td>{{$x->back_color}}</td>
                                                    <td>{{$x->date}}</td>

                                                    <td>
                                                        <div class="switch">
                                                            <label>
                                                                <input type="checkbox" onchange="SliderStatus({{$x->id}})" {{$x->status == "1" ? "checked" : ""}}>
                                                                <span class="lever switch-col-teal"></span>
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td>

                                                        <button onclick="DeleteSlider({{$x->id}},'{{$x->image}}')" class="btn btn-outline-danger"><i class="fa fa-times"> </i></button>
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
                                        <form method="POST" action="{{route('SliderAdd')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div><i class="flag-icon flag-icon-az"></i> AZ</div>
                                            <div class="form-group">
                                                <label for="username">Adı</label>
                                                <input class="form-control" type="text" id="name" name="name" required="" >
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Rəng</label>
                                                <input class="form-control" type="color" id="back_color" name="back_color" required="" >
                                            </div>

                                            <div class="form-group">
                                                <label>Şəkil Seç</label>
                                                <div class="input-group">

                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="logo" required="">
                                                        <label class="custom-file-label" for="icon">@lang('lang.choose_file')</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <!-- ENG -->
                                            <div>
                                                <i class="flag-icon flag-icon-gb"></i> EN
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Adı</label>
                                                <input class="form-control" type="text" id="name" name="name" required="" >
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Rəng</label>
                                                <input class="form-control" type="color" id="back_color" name="back_color" required="" >
                                            </div>

                                            <div class="form-group">
                                                <label>Şəkil Seç</label>
                                                <div class="input-group">

                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="logo" required="">
                                                        <label class="custom-file-label" for="icon">@lang('lang.choose_file')</label>
                                                    </div>

                                                </div>

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
                        <div class="btn-list">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#signup-modal">Əlavə Et</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
