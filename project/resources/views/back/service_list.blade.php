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
                                        @lang('lang.servicelist')
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
                                                                    <img style="width: 50px" src="{{asset($x->img)}}"  alt="1" />
                                                                </div>
                                                            </td>
                                                            <td>{{$x->title}}</td>
                                                            <td>{{\App\Models\Back\Service_Cat::where('id',$x->cat_id)->first()->cat_name}}</td>
                                                            <td>
                                                                <div class="switch">
                                                                    <label>
                                                                        <input type="checkbox" onchange="Status({{$x->id}})" {{$x->status == "1" ? "checked" : ""}}>
                                                                        <span class="lever switch-col-teal"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mezmun{{$x->id}}"><i class="fa fa-eye"></i>
                                                                </button>
                                                                <a href="{{route('ServiceEdit',$x->id)}}"><button class="btn btn-outline-primary "><i class="fa fa-edit"> </i></button></a>

                                                                <button onclick="DeleteService({{$x->id}},'{{$x->logo}}')" class="btn btn-outline-danger "><i class="fa fa-times"> </i></button>
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
                                            <form method="POST" id="formid" action="{{route('ServiceAdd')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="username">@lang('lang.sel_cat')</label>
                                                    <select data-placeholder="Select a state..."name="cate" class="select2-with-icons form-control" id="select2-with-icons" style="width: 100%; height:36px;">

                                                            @foreach($topcat as $x)
                                                            <optgroup label="{{$x->cat_name}}">
                                                                @foreach($cat as $y)
                                                                @if($y->top_cat == $x->id)
                                                            <option value="{{$y->id}}">{{$y->cat_name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </optgroup>
                                                            @endforeach

                                                    </select>
                                                   </div>
                                                <div class="form-group">
                                                    <label for="username">@lang('lang.title')</label>
                                                    <input class="form-control" type="text" id="title" name="title" required=""  >
                                                </div>
                                                <div class="form-group">
                                                    <label  for="tag" >Tag</label>
                                                    <div class="tags-default">
                                                        <input type="text" id="tag" data-role="tagsinput" name="tag[]"  placeholder="Teq Əlavə Edin..." required="required" /> </div>
                                                </div>

                                                <div class="form-group">
                                                    <label> @lang('lang.choose_image')</label>
                                                    <div class="input-group">

                                                        <div class="custom-file">
                                                            <input type="file" name="img" class="custom-file-input" id="img">
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
                                        data-target="#signup-modal">@lang('lang.service_add')</button>
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
<script>
    $('#formid').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    $(function () {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }
        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();
        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });
        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });
        // For multiselect
        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });
        $('#public-methods').multiSelect();
        $('#select-all').click(function () {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function () {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function () {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function () {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });
        $(".ajax").select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;
                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            }, // let our custom formatter work
            minimumInputLength: 1,
            //templateResult: formatRepo, // omitted for brevity, see the source of this page
            //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        });
    });
</script>
