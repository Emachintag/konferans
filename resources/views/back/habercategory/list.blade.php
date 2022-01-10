@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/datatables.css')}}">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        tr:hover {
            -moz-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        }

        tr:hover td {
            color: #e019e4;
        }
    </style>

@endsection
@extends('back.layouts.app')
@section('content')

    <div class="page-body">
        <div class="container-fluid container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Haber Kategori Listeleme Sayfası</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Aansayfa</a></li>
                            <li class="breadcrumb-item">Haber Kategori</li>
                            <li class="breadcrumb-item active">Haber Kategori Listeleme</li>
                        </ol>
                    </div>
                    @include('back.widget.bookmark')
                </div>
            </div>
            <div class="container-fluid general-widget">
                <div class="row">
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="file-minus"></i></div>
                                    <div class="media-body"><span class="m-0">Toplam Kategori</span>
                                        <h4 class="mb-0 counter">{{$habercategory->count()}}</h4><i class="icon-bg"
                                                                                           data-feather="file-minus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <div class="bg-danger b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="toggle-left"></i></div>
                                    <div class="media-body"><span class="m-0">Deaktif Kategori</span>
                                        <h4 class="mb-0 counter">{{$habercategory->where('status',0)->count()}}</h4><i class="icon-bg"
                                                                                                              data-feather="toggle-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <div class="bg-primary b-r-4 card-body">
                                <div class="media static-top-widget">
                                    <div class="align-self-center text-center"><i data-feather="toggle-right"></i>
                                    </div>
                                    <div class="media-body"><span class="m-0">Aktif Kategori</span>
                                        <h4 class="mb-0 counter">{{$habercategory->where('status',1)->count()}}</h4><i class="icon-bg"
                                                                                                              data-feather="toggle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('haber-category.create')}}" >
                                <div class="bg-primary b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">Kategori Ekle</span>
                                            <h4 class="mb-0">Tıkla</h4><i class="icon-bg"
                                                                          data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Haber Kategori Listeleme</h5>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="display " id="basic-2">
                                    <thead>
                                    <tr>
                                        <th>Başlık</th>
                                        <th>Resim</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>Durum</th>
                                        <th>İşlem</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($habercategory as $habercategorys)

                                        <tr class="tr-check" data-id="{{$habercategorys->lang_id}}" data-status="{{$habercategorys->status}}">
                                            <td>{{$habercategorys->kategori}}</td>
                                            <td style="text-align: center"><img style="border-radius: 10%" class="img"
                                                                                src="{{asset("public/".$habercategorys->image)}}"
                                                                                height="100"></td>
                                            <td>{{ \Carbon\Carbon::parse($habercategorys->created_at)->day }} {{ \Carbon\Carbon::parse($habercategorys->created_at)->monthName }} {{ \Carbon\Carbon::parse($habercategorys->created_at)->year }}</td>
                                            <td><label class="switch">
                                                    <input type="checkbox" class="checkk"
                                                           @if($habercategorys->status) checked @endif>
                                                    <span class="slider round"></span>

                                                </label>
                                            </td>
                                            <td style="text-align: center" >
                                                <a href="{{route('haber-category.edit',$habercategorys->lang_id)}}" class="btn btn-pill btn-info-gradien" type="button"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('haber-category.destroy',$habercategorys->lang_id)}}" class="btn btn-pill btn-danger-gradien" type="button"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/public/back/assets/js/form-validation-custom.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/tooltip-init.js')}}"></script>
    <script>
        $(".checkk").change((e) => {


            var id = $(e.target).parents("tr").data("id");
            $.ajax({
                url: "{{route('haber-category.status')}}",
                method: "post",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {id: id, status: $(e.target).is(":checked") ? 1 : 0},

                // Expect a `mycustomtype` back from server
                success: function (d) {
                    toastr.success($(e.target).is(":checked") ? "Haber Kategori Durumu Aktif" : "Haber Kategori Durumu Pasif")
                    $(e.target).prop("checked", $(e.target).is(":checked") ? true : false)
                }
            });
        })

        var sayi = $(".tr-check").length
        if (sayi == 0) {
            $("#silcheckbox").prop("disabled", true)
        }
        console.log(sayi)

    </script>




@endsection