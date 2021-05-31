@extends('back.layout.master')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex no-block align-items-center">
                            <div>
                                <h2 class="card-title">@lang('lang.cat_list')</h2>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered table-responsive-lg">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th scope="col">Kateqoriya Adı</th>
                                                <th scope="col">@lang('lang.status')</th>
                                                <th>Əməliyyat</th>
                                            </tr>
                                            </thead>
                                            <?php $a = 1 ?>
                                            <tbody>
                                            @foreach($cat as $x)
                                                <tr>
                                                    <th scope="row">{{$a++}}</th>
                                                    <td>{{$x->name}}</td>
                                                    <td>
                                                        <div class="switch">
                                                            <label><input type="checkbox" onchange="PortfolioCat({{$x->id}})" {{$x->status == "1" ? "checked" : ""}}>
                                                                <span class="lever switch-col-teal"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button onclick="DeletePortCat({{$x->id}})" class="btn btn-outline-danger "><i class="fa fa-times"> </i></button>
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
                                        <form method="POST" action="{{route('PortCatAdd')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">

                                                <label for="username">@lang('lang.cat_name')</label>
                                                <input class="form-control" type="text" id="name" name="name" required="required" />
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
                                    data-target="#signup-modal">@lang('lang.cat_add')</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

