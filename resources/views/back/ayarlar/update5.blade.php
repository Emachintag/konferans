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
                        <h3>Sosyal Medya</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index')}}">Aansayfa</a></li>
                            <li class="breadcrumb-item">Sosyal Medya</li>
                            <li class="breadcrumb-item active">Sosyal Medya</li>
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
                                <h5>Sosyal Medya Ekleme</h5>
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
                                      enctype="multipart/form-data" action="{{route('sosyal.update',1)}}">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col-md-4">
                                                <label for="validationCustom01">Facebook:</label>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i style="margin: 10px" data-feather="facebook"></i>
                                                            <input value="{{$sosyal->facebook}}" name="facebook" class="form-control" id="validationCustom01" type="text" placeholder="Facebook Linki Giriniz"></div>
                                                    </div>
                                                    <br>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="validationCustom01">Instagram:</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i style="margin: 10px" data-feather="instagram"></i>
                                                        <input value="{{$sosyal->instagram}}" name="instagram" class="form-control" id="validationCustom01" type="text" placeholder="Instagram Linki Giriniz"></div>
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="validationCustom01">Twitter:</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i style="margin: 10px" data-feather="twitter"></i>
                                                        <input value="{{$sosyal->twitter}}" name="twitter" class="form-control" id="validationCustom01" type="text" placeholder="Twitter Linki Giriniz"></div>
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Youtube:</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i style="margin: 10px" data-feather="youtube"></i>
                                                        <input value="{{$sosyal->youtube}}" name="youtube" class="form-control" id="validationCustom01" type="text" placeholder="Youtube Linki Giriniz"></div>
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="validationCustom01">Linkedin:</label>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i style="margin: 10px" data-feather="linkedin"></i>
                                                        <input value="{{$sosyal->linkedin}}" name="linkedin" class="form-control" id="validationCustom01" type="text" placeholder="Linkedin Linki Giriniz"></div>
                                                </div>
                                                <br>
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
