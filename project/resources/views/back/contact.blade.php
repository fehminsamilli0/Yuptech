@extends('back.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex no-block align-items-center">
                            <div>
                                <h2 class="card-title">@lang('lang.contact')</h2>
                            </div>
                        </div>
                        <form class="mt-4" method="POST" action="{{route('ContactUpdate')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$data[0]->id}}"/>
                            <input type="hidden" name="oldimage" value="{{$data[0]->image}}"/>

                            <div class="form-group">
                                <label for="title">@lang('lang.address')</label>
                                <input type="text" maxlength="255" name="address" value="{{$data[0]->address}}"
                                       class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('lang.tel')</label>
                                <input type="tel" maxlength="255" name="tel" class="form-control"
                                       value="{{$data[0]->tel}}"/>
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('lang.email')</label>
                                <input type="email" maxlength="255" name="email" class="form-control"
                                       value="{{$data[0]->email}}"/>
                            </div>
                            <div class="form-group">
                                <label>@lang('lang.current_img')</label> <br/>
                                <img style="width: 150px" src="{{asset($data[0]->image)}}" width="100" height="100"
                                     alt=""/>
                            </div>

                            <div class="form-group">
                                <label>@lang('lang.img')</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@lang('lang.download')</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">@lang('lang.choose_file')</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-outline-success mt-5">@lang('lang.submit')</button>

                        </form>
                        <div class="form-group">
                            <form name="add_name" action="{{route('SmAdd')}}" method="post" id="add_name">
                                @csrf
                                <div class="d-md-flex no-block align-items-center">
                                    <div>
                                        <h2 class="card-title">Sosial Media Hesabları</h2>
                                    </div>
                                </div>
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
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <button type="button" name="add" id="add" class="btn btn-success">Əlavə Et</button>
                                        <br/>
                                        <br/>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-block btn-outline-success mt-5">@lang('lang.submit')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('backend/assets/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('backend/assets/extra-libs/jquery.repeater/repeater-init.js')}}"></script>
<script src="{{asset('backend/assets/extra-libs/jquery.repeater/dff.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append(' <tr id="row' + i + '"><td><input type="text" name="sm[name]" placeholder="Adı" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-outline-danger btn_remove">X</button></td></tr>', '<tr id="row' + i + '"><td><input type="text" name="sm[link]" placeholder="Link" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-outline-danger btn_remove">X</button></td></tr>', '<tr id="row' + i + '"><td><input type="text" name="sm[icon]" placeholder="Icon" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-outline-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        $('#submit').click(function () {
            $.ajax({
                url: "name.php",
                method: "POST",
                data: $('#add_name').serialize(),
                success: function (data) {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });

    });
</script>

