@extends('back.layout.master')
@section('content')
    <div class="container-fluid">

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
            <div class="card card-body">
                <div class="d-md-flex no-block align-items-center">
                    <div>
                        <h2 class="card-title">Fikirlər</h2>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
                    <table class="table table-striped search-table v-middle">
                        <thead class="header-item">
                        <th class="text-dark font-weight-bold">Şəkil</th>
                        <th class="text-dark font-weight-bold">Adı Soyad</th>
                        <th class="text-dark font-weight-bold">Tarix</th>
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
                                <span class="usr-location" data-location="Boston, USA">{{$x->date}}</span>
                            </td>
                            <td>
                                <div class="switch">
                                    <label>
                                        <input type="checkbox" onchange="ThoughtsStatus({{$x->id}})" {{$x->status == "1" ? "checked" : ""}}>
                                        <span class="lever switch-col-teal"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mezmun{{$x->id}}"><i class="fa fa-eye"></i></button>
                                <button onclick="DeleteThoughts({{$x->id}},'{{$x->img}}')"  class="btn btn-outline-danger"><i class="fa fa-times"> </i></button>
                            </td>
                        </tr>
                        <!-- /.row -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>

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
                        <h4>Məzmun</h4>
                        <hr />
                        {!!$x->content1!!}
                    </div>
                    <div>
                        <hr />
                    </div>
                    <div class="modal-body">
                        <h4>Bioqrafiya</h4>
                        <hr />
                        {!!$x->bio!!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
