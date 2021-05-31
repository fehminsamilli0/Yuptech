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
                                                <th scope="col">@lang('lang.emp_logo')</th>
                                                <th scope="col">@lang('lang.emp_name')</th>
                                                <th scope="col">@lang('lang.status')</th>
                                                <th scope="col">@lang('lang.operations')</th>
                                                <th scope="col">@lang('lang.date')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($emp as $x)
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <img style="width: 50px" src="{{asset($x->logo)}}"  />
                                                        </div>
                                                    </td>
                                                    <td>{{$x->name}}</td>
                                                    <td>
                                                        <div class="switch">
                                                            <label>
                                                                <input type="checkbox" onchange="employeestatus({{$x->id}})" {{$x->status == '1' ? "checked" : ""}}>
                                                                <span class="lever switch-col-teal"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button onclick="DeleteEmp({{$x->id}},'{{$x->logo}}')" class="btn btn-outline-danger"><i class="fa fa-times"> </i></button>
                                                    </td>
                                                    <td>21-02-2020</td>
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
                                        <form method="POST" action="{{route('EmpAdd')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="username">@lang('lang.emp_name')</label>
                                                <input class="form-control" type="text" id="name" name="name" required="" >
                                            </div>
                                            <div class="form-group">
                                                <label> @lang('lang.choose_logo')</label>
                                                <div class="input-group">

                                                    <div class="custom-file">
                                                        <input type="file" name="logo" class="custom-file-input" id="logo">
                                                        <label class="custom-file-label" for="logo">@lang('lang.choose_file')</label>
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
                        <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        </div>
                        <div class="btn-list">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#signup-modal">@lang('lang.emp_add')</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
