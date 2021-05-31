@extends('back.layout.master')
@section('content')
    <div class="container-fluid">

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
            <div class="card card-body">
                <div class="d-md-flex no-block align-items-center">
                    <div>
                        <h2 class="card-title">Komanda</h2>
                        <div class="  text-right d-flex justify-content-md-end ">
                            <button type="button" class="btn btn-primary mr-4" data-toggle="modal"
                                    data-target="#signup-modal"><i class="mdi mdi-account-multiple-plus font-16 mr-2"></i>Əlavə Et</button>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
                    <table class="table table-striped search-table v-middle">
                        <thead class="header-item">
                        <th class="text-dark font-weight-bold">Şəkil</th>
                        <th class="text-dark font-weight-bold">Adı</th>
                        <th class="text-dark font-weight-bold">Vəzifə</th>
                        <th class="text-dark font-weight-bold">Status</th>
                        <th class="text-dark font-weight-bold">Əməliyyatlar</th>
                        </thead>
                        <tbody>
                        @foreach($data as $x)
                        <!-- row -->
                        <tr>
                            <td>
                                <img src="{{asset($x->image)}}" alt="1" class="rounded-circle" width="35">
                            </td>
                            <td>
                                <span class="usr-ph-no" data-phone="+1 (070) 123-4567">{{$x->name}}</span>
                            </td>
                            <td>
                                <span class="usr-location" data-location="Boston, USA">{{$x->position}}</span>
                            </td>
                            <td>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" onchange="TeamStatus({{$x->id}})" {{$x->status == "1" ? "checked" : ""}}>
                                        <span class="lever switch-col-teal"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <a href="{{route('TeamEditIndex',$x->id)}}"><button  class="btn btn-outline-primary "><i class="fa fa-edit"> </i></button></a>
                                <button onclick="DeleteTeam({{$x->id}},'{{$x->image}}')"  class="btn btn-outline-danger"><i class="fa fa-times"> </i></button>
                            </td>
                        </tr>
                        <!-- /.row -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card">
                    <!-- Signup modal content -->
                    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- <div class="text-center bg-info p-3">
                                    <a href="index.html" class="text-success">
                                                    <span><img class="mr-2" src="../assets/images/logo-light-icon.png"
                                                               alt="" height="18"><img
                                                            src="../assets/images/logo-light-text.png" alt=""
                                                            height="18"></span>Komanda Üzvü Əlavə Et</a>
                                </div> -->
                                <div class="modal-body">
                                    <form class="pl-3 pr-3" method="POST" action="{{route('TeamAdd')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="username">Adı</label>
                                            <input name="name" class="form-control" type="text" id="username"
                                                   required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Vəzifə</label>
                                            <input name="position" class="form-control" type="text" id="position"
                                                   required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Şəkil Seç</label>
                                            <div class="input-group">

                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="image">@lang('lang.choose_file')</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button class="btn btn-primary" type="submit">Təsdiq Et</button>
                                        </div>
                                    </form>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <!-- SignIn modal content -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
@endsection
