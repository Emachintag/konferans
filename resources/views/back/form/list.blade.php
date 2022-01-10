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
                        <h3>İletişim Form Sayfası</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Aansayfa</a></li>
                            <li class="breadcrumb-item">İletişim Form </li>
                            <li class="breadcrumb-item active">İletişim Form Listeleme</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <!-- Bookmark Start-->
                        <div class="bookmark">
                            <ul>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                       data-placement="top" title="" data-original-title="Tables"><i
                                            data-feather="inbox"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                       data-placement="top" title="" data-original-title="Chat"><i
                                            data-feather="message-square"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                       data-placement="top" title="" data-original-title="Icons"><i
                                            data-feather="command"></i></a></li>
                                <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover"
                                       data-placement="top" title="" data-original-title="Learning"><i
                                            data-feather="layers"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                    <form class="form-inline search-form">
                                        <div class="form-group form-control-search">
                                            <input type="text" placeholder="Search..">
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- Bookmark Ends-->
                    </div>
                </div>
            </div>
            <div class="container-fluid general-widget">

                <!-- Container-fluid starts-->

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5> Listeleme</h5>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="display " id="basic-2">
                                    <thead>
                                    <tr>
                                        <th>Ad</th>
                                        <th>Email</th>
                                        <th>Mesaj</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>İşlem</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($form as $forms)
                                        <tr class="tr-check" data-id="{{$forms->id}}">
                                            <td>{{$forms->ad}}</a></td>
                                            <td>{{$forms->email}}</a></td>
                                            <td>{{$forms->text}}</a></td>

                                            <td>{{ \Carbon\Carbon::parse($forms->created_at)->day }} {{ \Carbon\Carbon::parse($forms->created_at)->monthName }} {{ \Carbon\Carbon::parse($forms->created_at)->year }}</td>
                                            <td style="text-align: center" >
                                                <a href="{{route('form.destroy',$forms->id)}}" class="btn btn-pill btn-danger-gradien" type="button"><i class="fa fa-trash"></i></a>
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
    <script src="{{asset('/public/back/assets/js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/dropzone/dropzone-script.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/form-validation-custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


    <script src="{{asset('/public/back/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/tooltip-init.js')}}"></script>




@endsection
