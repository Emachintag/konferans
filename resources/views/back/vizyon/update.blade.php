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
    <style>
        .bloc-text-image {
            position:relative;
            margin:10px 10px;
            float:left;
            width:200px;
        }
        .bloc-text-image img {
            width: 100%;
            display:block;
        }

        .bloc-text-image .delete {
            position:absolute;
            display:block;
            top:5px;
            right:5px;
            color:#FFF;
            z-index:999;
            padding:5px;
            background: rgba(255,0,0, 0.7);
            cursor:pointer;
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
                        <h3>Vizyon Sayfası</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Aansayfa</a></li>
                            <li class="breadcrumb-item">Vizyon</li>
                            <li class="breadcrumb-item active">Vizyon ekle</li>
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
                                <h5>Misyon Ekleme</h5>
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
                                      enctype="multipart/form-data" action="{{route('vizyon.update',1635233954)}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="validationCustom01">Başlık:</label>
                                                @foreach($vizyon as $vizyonn)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$vizyonn->lang}}"></i>
                                                            <input value="{{$vizyonn->title}}" name="title_{{$vizyonn->lang}}" class="form-control baslik{{$vizyonn->id}}" id="validationCustom01" type="text" placeholder="{{$vizyonn->langName}} Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            @foreach($vizyon as $vizyonn)
                                                <div class="col-md-6">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input name="image_{{$vizyonn->lang}}" type='file' id="imageUpload{{$vizyonn->id}}" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload{{$vizyonn->id}}"></label>
                                                        </div>
                                                        <i style="margin: 10px"
                                                           class="flag-icon flag-icon-{{$vizyonn->lang}}"></i>
                                                        <label>Vizyon Kapak Fotoğraf:</label>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview{{$vizyonn->id}}" style="background-image: url({{asset('public/'.$vizyonn->image)}});">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>


                                        @foreach($vizyon as $vizyonn)
                                            <div class="email-wrapper">
                                                <div class="theme-form">
                                                    <div class="form-group">
                                                        <i style="margin: 10px"
                                                           class="flag-icon flag-icon-{{$vizyonn->lang}}"></i>
                                                        <label>İçerik:</label>
                                                        <textarea id="summernote{{$vizyonn->id}}"
                                                                  name="text_{{$vizyonn->lang}}">{!! $vizyonn->text !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @foreach(DB::table('vizyon_gorsel')->where('vizyon_id',1635233954)->get() as $images)
                                        <div class="bloc-text-image" data-id="{{$images->id}}">
                                            <img src="{{asset('public'.$images->gorsel)}}">
                                        </div>
                                    @endforeach
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="upload__box">
                                                <div class="upload__btn-box">
                                                    <label class="upload__btn">
                                                        <p>Vizyon Çoklu Resim</p>
                                                        <input name="images[]" type="file" multiple=""
                                                               data-max_length="20"
                                                               class="upload__inputfile">
                                                    </label>
                                                </div>
                                                <div class="upload__img-wrap"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-success btn-min-width btn-glow mr-1 mb-1">Gönder
                                    </button>
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
        @foreach($vizyon as $vizyonn)
        $(document).ready(function () {
            $('#summernote{{$vizyonn->id}}').summernote({
                height: 300,
            });
        });
        @endforeach
    </script>
    <script>
        @foreach($vizyon as $vizyonn)
        function readURL{{$vizyonn->id}}(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview{{$vizyonn->id}}').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview{{$vizyonn->id}}').hide();
                    $('#imagePreview{{$vizyonn->id}}').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload{{$vizyonn->id}}").change(function () {
            readURL{{$vizyonn->id}}(this);
        });
        @endforeach
    </script>
    <script>
        var imgArray = [];
        var imgWrap = "";
        jQuery(document).ready(function () {
            ImgUpload();
        });

        function ImgUpload() {


            $('.upload__inputfile').each(function () {
                $(this).on('change', function (e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function (f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    console.log(e.target.result)
                                    var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });


        }

        $('body').on('click', ".upload__img-close", function (e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    $(this).parent().parent().remove();
                    console.log($("input[name='images[]']").prop("files"));
                    console.log(imgArray)


                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    </script>
    <script>
        $('document').ready(function() {
            $(".bloc-text-image").mouseenter(function() {
                $(this).find('.description').stop().fadeIn('slow');
            });
            $(".bloc-text-image").mouseleave(function() {
                $(this).find('.description').stop().fadeOut('slow');
            });

            $('.bloc-text-image').each(function(i){
                $('<span class="delete">Fotoğrafı Sil</span>').appendTo($(this));
                if(i % 3 == 0){
                    $(this).css({
                        'clear': 'both'
                    });
                }
            });
            $(".bloc-text-image .delete").click(function() {
                $(this).closest('.bloc-text-image').fadeOut();
                $(this).parent().data('id');
                $.ajax({
                    url: "{{route('vizyon.imagedelete')}}",
                    method: "post",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {id:$(this).parent().data('id')},

                    // Expect a `mycustomtype` back from server
                    success: function (d) {
                        toastr.success($(e.target).is(":checked") ? "Blog Durumu Aktif" : "Blog Durumu Pasif")
                        $(e.target).prop("checked", $(e.target).is(":checked") ? true:false)
                    }
                });
            });
        });
    </script>
@endsection
