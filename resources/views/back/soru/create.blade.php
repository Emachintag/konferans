@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/dropzone.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@extends('back.layouts.app')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>S.S.S Ekleme Sayfası</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Aansayfa</a></li>
                            <li class="breadcrumb-item">S.S.S</li>
                            <li class="breadcrumb-item active">S.S.S ekle</li>
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
                                <h5>S.S.S Ekleme</h5>
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
                                      enctype="multipart/form-data" action="{{route('soru.store')}}">
                                    @csrf
                                    <div class="col-sm-9">
                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <label for="validationCustom01">Soru:</label>
                                                @foreach($lang as $langs)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$langs->lang}}"></i>
                                                            <input  name="title_{{$langs->lang}}" class="form-control baslik{{$langs->id}}" id="validationCustom01" type="text" placeholder="{{$langs->langName}} Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <div class="col-md-3">
                                                <br>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input  name="sira" class="form-control" id="validationCustom01" type="number" placeholder="Sıra Giriniz">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        @foreach($lang as $langs)
                                            <div class="email-wrapper">
                                                <div class="theme-form">
                                                    <div class="form-group">
                                                        <i style="margin: 10px"
                                                           class="flag-icon flag-icon-{{$langs->lang}}"></i>
                                                        <label>Cevap:</label>
                                                        <textarea id="summernote{{$langs->id}}"
                                                                  name="text_{{$langs->lang}}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
        @foreach($lang as $langs)
        $(document).ready(function () {
            $('#summernote{{$langs->id}}').summernote({
                height: 300,
            });
        });
        @endforeach
    </script>
@endsection
