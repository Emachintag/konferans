@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/dropzone.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        body {
            background: whitesmoke;
            font-family: 'Open Sans', sans-serif;
        }

        .avatar-container {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
        }


        .avatar-upload {
            position: relative;
            max-width: 300px;
        }

        .avatar-upload .avatar-edit {
            position: absolute;
            right: 0px;
            z-index: 1;
            top: 0px;
            width: 100%;
            height: 100%;

        }


        .avatar-upload .avatar-edit input {
            display: none;
        }

        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 100%;
            height: 100%;
            margin-bottom: 0;

            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all .2s ease-in-out;
        }

        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input + label:after {
            color: #757575;
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
            background: #FFFFFF;

        }

        .avatar-upload .avatar-preview {
            width: 300px;
            height: 300px;
            position: relative;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    <style>
        html * {
            box-sizing: border-box;
        }

        p {
            margin: 0;
        }

        .upload__box {
            padding: 17px;
        }

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload__btn {
            background-color: #6A0651;
            border: none;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        .upload__btn:hover {
            background-color: #24695c;
            border: none;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        .upload__btn-box {
            margin-bottom: 10px;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box {
            width: 200px;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        .upload__img-close:after {
            content: '\2716';
            font-size: 14px;
            color: white;
        }

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }

    </style>
@endsection
@extends('back.layouts.app')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Etkinlik Görüntüleme Sayfası</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Aansayfa</a></li>
                            <li class="breadcrumb-item">Etkinlik</li>
                            <li class="breadcrumb-item active">Etkinlik Görüntüle</li>
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
                                <h5>Etkinlik Görüntüleme</h5>
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
                                      enctype="multipart/form-data" action="{{route('referans.store')}}">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Etkinlik Adı:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input disabled value="{{$event->title}}" class="form-control" id="validationCustom01" type="text" ></div>
                                                    </div>
                                                    <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Website:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input disabled value="{{$event->website}}" class="form-control" id="validationCustom01" type="text" ></div>
                                                    </div>
                                                    <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Etkinlik Tarihi:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input disabled value="{{ \Carbon\Carbon::parse($event->date)->day }} {{ \Carbon\Carbon::parse($event->date)->monthName }} {{ \Carbon\Carbon::parse($event->date)->year }}" class="form-control" id="validationCustom01" type="text" ></div>
                                                    </div>
                                                    <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Oluşturma Tarihi:</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input disabled value="{{ \Carbon\Carbon::parse($event->created_at)->day }} {{ \Carbon\Carbon::parse($event->created_at)->monthName }} {{ \Carbon\Carbon::parse($event->created_at)->year }}" class="form-control" id="validationCustom01" type="text" ></div>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Email:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input disabled value="{{$event->email}}" class="form-control" id="validationCustom01" type="text" ></div>
                                                    </div>
                                                    <br>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Country:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            @foreach(DB::table('languages')->where('iso_639_1',$event->country)->get() as $uuu)
                                                            <input disabled value="{{$uuu->name}}" class="form-control" id="validationCustom01" type="text" ></div>
                                                        @endforeach
                                                    </div>
                                                    <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Durumu:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input disabled @if($event->status  == 0) value="Bekleniyor" @else value="Onaylandı" @endif class="form-control" id="validationCustom01" type="text" ></div>
                                                    </div>
                                                    <br>
                                            </div>

                                                <div class="col-md-6">
                                                    <label for="validationCustom01">Oluşturan Kişi:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                          @foreach(DB::table('users')->where('id',$event->user_id)->get() as $uu)
                                                            <input disabled value="{{$uu->name}}" class="form-control" id="validationCustom01" type="text" ></div>
                                                        @endforeach
                                                    </div>
                                                    <br>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="validationCustom01">Açıklama:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input disabled value="{{$event->text}}" class="form-control" id="validationCustom01" type="text" ></div>
                                                    </div>
                                                    <br>
                                                </div>


                                        <div class="form-group row">

                                                <div class="col-md-6">
                                                    <div class="avatar-upload">

                                                        <label>Etkinlik Fotoğraf:</label>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview{{$event->id}}" style="background-image: url({{asset("public/".$event->image)}});">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>

                                    </div>
                                        <input type="button" class="btn btn-success"
                                               style="font-weight: bold;display: inline;"
                                               value="Kapat"
                                               onclick="closeMe()">
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        function closeMe()
        {
            window.opener = self;
            window.close();
        }
    </script>

@endsection
