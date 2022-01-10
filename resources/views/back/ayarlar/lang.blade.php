@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/select2.css')}}">
@endsection
@extends('back.layouts.app')
@section('content')
    <style>


        HTML CSS JS

        Result
        Skip Results Iframe

        body {
            background: #f7f7f7;
        }

        .table {
            border-spacing: 0 0.85rem !important;
        }

        .table .dropdown {
            display: inline-block;
        }

        .table td,
        .table th {
            vertical-align: middle;
            margin-bottom: 10px;
            border: none;
        }

        .table thead tr,
        .table thead th {
            border: none;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            background: transparent;
        }

        .table td {
            background: #fff;
        }

        .table td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .table td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .avatar {
            width: 2.75rem;
            height: 2.75rem;
            line-height: 3rem;
            border-radius: 50%;
            display: inline-block;
            background: transparent;
            position: relative;
            text-align: center;
            color: #868e96;
            font-weight: 700;
            vertical-align: bottom;
            font-size: 1rem;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .avatar-sm {
            width: 2.5rem;
            height: 2.5rem;
            font-size: 0.83333rem;
            line-height: 1.5;
        }

        .avatar-img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .avatar-blue {
            background-color: #c8d9f1;
            color: #467fcf;
        }

        table.dataTable.dtr-inline.collapsed
        > tbody
        > tr[role="row"]
        > td:first-child:before,
        table.dataTable.dtr-inline.collapsed
        > tbody
        > tr[role="row"]
        > th:first-child:before {
            top: 28px;
            left: 14px;
            border: none;
            box-shadow: none;
        }

        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child,
        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child {
            padding-left: 48px;
        }

        table.dataTable > tbody > tr.child ul.dtr-details {
            width: 100%;
        }

        table.dataTable > tbody > tr.child span.dtr-title {
            min-width: 50%;
        }

        table.dataTable.dtr-inline.collapsed > tbody > tr > td.child,
        table.dataTable.dtr-inline.collapsed > tbody > tr > th.child,
        table.dataTable.dtr-inline.collapsed > tbody > tr > td.dataTables_empty {
            padding: 0.75rem 1rem 0.125rem;
        }

        div.dataTables_wrapper div.dataTables_length label,
        div.dataTables_wrapper div.dataTables_filter label {
            margin-bottom: 0;
        }

        @media (max-width: 767px) {
            div.dataTables_wrapper div.dataTables_paginate ul.pagination {
                -ms-flex-pack: center !important;
                justify-content: center !important;
                margin-top: 1rem;
            }
        }

        .btn-icon {
            background: #fff;
        }
        .btn-icon .bx {
            font-size: 20px;
        }

        .btn .bx {
            vertical-align: middle;
            font-size: 20px;
        }

        .dropdown-menu {
            padding: 0.25rem 0;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
        }

        .badge {
            padding: 0.5em 0.75em;
        }

        .badge-success-alt {
            background-color: #d7f2c2;
            color: #7bd235;
        }

        .table a {
            color: #212529;
        }

        .table a:hover,
        .table a:focus {
            text-decoration: none;
        }

        table.dataTable {
            margin-top: 12px !important;
        }

        .icon > .bx {
            display: block;
            min-width: 1.5em;
            min-height: 1.5em;
            text-align: center;
            font-size: 1.0625rem;
        }

        .btn {
            font-size: 0.9375rem;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
        }

        .avatar-blue {
            background-color: #c8d9f1;
            color: #467fcf;
        }

        .avatar-pink {
            background-color: #fcd3e1;
            color: #f66d9b;
        }


    </style>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Site Ayarlar Sayfası</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Aansayfa</a></li>
                            <li class="breadcrumb-item">Site Ayarlar</li>
                            <li class="breadcrumb-item active">Site Ayarlar ekle</li>
                        </ol>
                    </div>
                    @include('back.widget.bookmark')
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5>Dil Ekle</h5>
                            </div>
                            <div class="card-body add-post">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>Hata! </strong>    {{ $error }}
                                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endforeach
                                @endif
                                <form class="row needs-validation" method="post" autocomplete="off"
                                      enctype="multipart/form-data" action="{{route('lang.store')}}">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group row">


                                            <div class="col-md-8">
                                                <select
                                                    class="js-example-basic-single col-sm-12 select2-hidden-accessible"
                                                    tabindex="-1" aria-hidden="true" name="lang">
                                                    <optgroup label="Kategoriler">
                                                        @foreach($langs as $langss)

                                                            <option value="{{$langss->iso_639_1}}">{{$langss->name}}</option>
                                                             <id disabled hidden value="{{$langss->name}}" name="langName" >
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit"
                                                        class="btn btn-success btn-min-width btn-glow mr-1 mb-1">Gönder
                                                </button>
                                            </div>

                                            <div class="col-md-12">




                                                <div class="container">
                                                    <div class="row py-5">
                                                        <div class="col-12">

                                                            <table id="example" class="table table-hover responsive nowrap" style="width:100%">
                                                                <h4>Aktif Diller</h4>
                                                                <thead>
                                                                <tr>
                                                                    <th>Dil</th>
                                                                    <th>İşlem</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($lang as $langg)
                                                                <tr>
                                                                    <td>
                                                                        <a href="#">
                                                                            <div class="d-flex align-items-center">
                                                                                <i style="margin: 10px"
                                                                                   class="flag-icon flag-icon-{{$langg->lang}}"></i>

                                                                                <div class="">
                                                                                    <p class="font-weight-bold mb-0">{{$langg->langName}}</p>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </td>

                                                                    <td style="text-align: center" >
                                                                        <a href="{{route('lang.destroy',$langg->id)}}" class="btn btn-pill btn-danger-gradien " type="button"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                    @endforeach
                                                                </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>




                                        </div>




                                    </div>
                                </form>




</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('/public/back/assets/js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/dropzone/dropzone-script.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/select2/select2-custom.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/email-app.js')}}"></script>
    <script src="{{asset('/public/back/assets/js/form-validation-custom.js')}}"></script>
    <script>


        HTML CSS JS

        Result
        Skip Results Iframe

        $(document).ready(function() {
            $("#example").DataTable({
                aaSorting: [],
                responsive: true,

                columnDefs: [
                    {
                        responsivePriority: 1,
                        targets: 0
                    },
                    {
                        responsivePriority: 2,
                        targets: -1
                    }
                ]
            });

            $(".dataTables_filter input")
                .attr("placeholder", "Search here...")
                .css({
                    width: "300px",
                    display: "inline-block"
                });

            $('[data-toggle="tooltip"]').tooltip();
        });


    </script>
@endsection
