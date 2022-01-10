@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/dropzone.css')}}">
@endsection
@extends('back.layouts.app')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Meta Title Başlık</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Aansayfa</a></li>
                            <li class="breadcrumb-item">Meta Title</li>
                            <li class="breadcrumb-item active">Meta Title ekle</li>
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
                                <h5>Meta Title Ekleme</h5>
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
                                      enctype="multipart/form-data" action="{{route('title.update',1635233954)}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Haber Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->haber}}" name="haber_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Haber Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Blog Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->blog}}" name="blog_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Blog Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <hr>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Hizmet Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->hizmet}}" name="hizmet_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Hizmet Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Ürün Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->urun}}" name="urun_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Ürün Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <hr>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Referans Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->referans}}" name="referans_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Referans Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Belge Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->belge}}" name="belge_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Belge Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <hr>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Ekip Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->ekip}}" name="ekip_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Ekip Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">S.S.S Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->sorular}}" name="sorular_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} S.S.S Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <hr>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Slider Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->slider}}" name="slider_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} S.S.S Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Hakkımızda Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->hakkimizda}}" name="hakkimizda_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Hakkımızda Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <hr>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Vizyon Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->vizyon}}" name="vizyon_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Vizyon Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Yorum Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->yorum}}" name="yorum_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Yorum Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <hr>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">İletişim Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->iletisim}}" name="iletisim_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} İletişim Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01">Misyon Başlık:</label>
                                                @foreach($meta as $metas)
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" class="flag-icon flag-icon-{{$metas->lang}}"></i>
                                                            <input value="{{$metas->misyon}}" name="misyon_{{$metas->lang}}" class="form-control baslik{{$metas->id}}" id="validationCustom01" type="text" placeholder="{{$metas->langName}} Misyon Başlık Giriniz"></div>
                                                    </div>
                                                    <br>
                                                @endforeach
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
@endsection
