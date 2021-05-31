@extends('back.layout.master')
@section('content')
    <div class="container-fluid">

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
            <div class="card card-body">
                <div class="d-md-flex no-block align-items-center">
                    <div>
                        <h2 class="card-title">Abunələr</h2>
                    </div>
                </div>
                <br/>
                <div class="table-responsive">
                    <table class="table table-striped search-table v-middle">
                        <thead class="header-item">
                        <th class="text-dark font-weight-bold">ID</th>
                        <th class="text-dark font-weight-bold">Email</th>
                        <th class="text-dark font-weight-bold">IP</th>
                        <th class="text-dark font-weight-bold">Əməliyyatlar</th>
                        </thead>
                        <tbody>
                        @foreach($data as $x)
                        <!-- row -->
                        <tr>
                            <td>
                                <span>{{$x->id}}</span>
                            </td>
                            <td>
                                <span>{{$x->email}}</span>
                            </td>
                            <td>
                                <span>{{$x->ip}}</span>
                            </td>
                            <td>
                                <button onclick="DeleteSubs({{$x->id}})"  class="btn btn-outline-danger"><i class="fa fa-times"> </i></button>
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
@endsection
