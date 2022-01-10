@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/dropzone.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@extends('back.layouts.app')
@section('content')
<style>
    body  {
        text-align: center; !important;
        background: #111a23;
    }

    .containers {
        height: 270px;
        position: relative;
        max-width: 320px;
        margin: auto;
    }
    .containers .imageWrapper {
        border: 3px solid #df00ee;
        width: 70%;
        padding-bottom: 70%;
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .containers .imageWrapper img {
        height: 105%;
        width: initial;
        max-height: 100%;
        max-width: initial;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .file-upload {
        position: relative;
        overflow: hidden;
        margin: 10px;

    }
    .file-upload {
        position: relative;
        overflow: hidden;
        margin: 10px;
        width: 100%;
        max-width: 150px;
        text-align: center;
        color: #fff;
        font-size: 1.2em;
        border: 2px solid #888;
        padding: 0.85em 1em;
        display: inline;
        -ms-transition: all 0.2s ease;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        text-align: center; !important;
        background: #111a23;
    }
    .file-upload:hover {
        background: #999;
        -webkit-box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.75);
        -moz-box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.75);
        box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.75);
    }
    .file-upload input.file-input {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        height: 100%;
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
                                <h5>Site Ayarlar Ekleme</h5>
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
                                      enctype="multipart/form-data" action="{{route('ayarlar.update',1635233954)}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Footer Text:</label>
                                                @foreach($ayarlar as $ayarlars)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$ayarlars->lang}}"></i>
                                                            <input value="{{$ayarlars->footer_text}}" name="footer_text_{{$ayarlars->lang}}" class="form-control baslik{{$ayarlars->id}}" id="validationCustom01" type="text" placeholder="{{$ayarlars->langName}} Footer Text Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Footer Hakkımızda:</label>
                                                @foreach($ayarlar as $ayarlars)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$ayarlars->lang}}"></i>
                                                            <input value="{{$ayarlars->footer_hakkimizda}}" name="footer_hakkimizda_{{$ayarlars->lang}}" class="form-control baslik{{$ayarlars->id}}" id="validationCustom01" type="text" placeholder="{{$ayarlars->langName}} Footer Hakkımızda Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group row">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="containers">
                                                        <div class="imageWrapper">
                                                            @if($ayarlarlogo->logo)
                                                                <img class="image" src="{{asset('public/'.$ayarlarlogo->logo)}}">
                                                            @else
                                                                <img class="image" src="{{asset('public/img/logo.png')}}">
                                                                @endif

                                                        </div>
                                                    </div>
                                                    <button class="file-upload">
                                                        <input name="logo" type="file" class="file-input">Logo Yükle
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="containers">
                                                        <div class="imageWrapper">
                                                            @if($ayarlarlogo->logo_footer)
                                                                <img class="image" src="{{asset('public/'.$ayarlarlogo->logo_footer)}}">
                                                            @else
                                                                <img class="image" src="{{asset('public/img/logo.png')}}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <button class="file-upload">
                                                        <input name="logo_footer" type="file" class="file-input">Footer Logo
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="containers">
                                                        <div class="imageWrapper">
                                                            @if($ayarlarlogo->favicon)
                                                                <img class="image" src="{{asset('public/'.$ayarlarlogo->favicon)}}">
                                                            @else
                                                                <img class="image" src="{{asset('public/img/favicon.png')}}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <button class="file-upload">
                                                        <input name="favicon" type="file" class="file-input">Favicon
                                                    </button>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <button type="submit"
                                            class="btn btn-success btn-min-width btn-glow mr-1 mb-1">Gönder
                                    </button>
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
        $('.file-input').change(function(){
            var curElement = $(this).parent().parent().find('.image');
            console.log(curElement);
            var reader = new FileReader();

            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                curElement.attr('src', e.target.result);
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
