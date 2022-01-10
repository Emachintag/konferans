@extends('back.layouts.app')
@section('content')

    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->

    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid dashboard-default-sec">
            <div class="row">
                <div class="col-xl-6 box-col-12 des-xl-100">
                    <div class="row">
                        <div class="col-xl-12 col-md-6 box-col-6 des-xl-50">
                            <div class="card profile-greeting">
                                <div class="card-header">
                                    <div class="header-top">
                                        <div class="setting-list bg-primary position-unset">
                                            <ul class="list-unstyled setting-option">
                                                <li>
                                                    <div class="setting-white"><i class="icon-settings"></i></div>
                                                </li>
                                                <li><i class="view-html fa fa-code font-white"></i></li>
                                                <li><i class="icofont icofont-maximize full-card font-white"></i>
                                                </li>
                                                <li><i class="icofont icofont-minus minimize-card font-white"></i>
                                                </li>
                                                <li><i class="icofont icofont-refresh reload-card font-white"></i>
                                                </li>
                                                <li><i class="icofont icofont-error close-card font-white"> </i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center p-t-0">
                                    <h3 class="font-light">Hoşgeldin, {{Auth::user()->name}} {{Auth::user()->last_name}}!!</h3>
                                    <p>Merhaba Admin Panele Hoşgeldiniz Ayarlara Gitmek için Aşağıdakı Butona Tıklayınız.</p>
                                    <a href="{{route('ayarlar.index')}}" class="btn btn-light">Ayarlar</a>
                                    <a href="{{route('hakkimizda.index')}}" class="btn btn-light">Hakkımızda</a>
                                </div>

                                <!-- weather widget start -->


                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">

                        <!--Dayspedia.com widget--><iframe width='600' height='250' style='padding:0!important;margin:0!important;border:none!important;background:none!important;background:transparent!important' marginheight='0' marginwidth='0' frameborder='0' scrolling='no' comment='/*defined*/' src='https://dayspedia.com/if/digit/?v=1&iframe=eyJ3LTEyIjp0cnVlLCJ3LTExIjp0cnVlLCJ3LTEzIjp0cnVlLCJ3LTE0IjpmYWxzZSwidy0xNSI6dHJ1ZSwidy0xMTAiOnRydWUsInctd2lkdGgtMCI6ZmFsc2UsInctd2lkdGgtMSI6ZmFsc2UsInctd2lkdGgtMiI6dHJ1ZSwidy0xNiI6IjQ4cHgiLCJ3LTE5IjoiNDgiLCJ3LTE3IjoiMTYiLCJ3LTIxIjp0cnVlLCJiZ2ltYWdlIjoxMywiYmdpbWFnZVNldCI6dHJ1ZSwidy0yMWMwIjoiI2ZmZmZmZiIsInctMCI6dHJ1ZSwidy0zIjp0cnVlLCJ3LTNjMCI6IiMzNDM0MzQiLCJ3LTNiMCI6IjQiLCJ3LTYiOiIjMzQzNDM0Iiwidy0yMCI6dHJ1ZSwidy00IjoiIzAwN2RiZiIsInctMTgiOnRydWUsInctd2lkdGgtMmMtMCI6IjYwMCJ9&lang=en&cityid=4404'></iframe><!--Dayspedia.com widget ENDS-->

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('sosyal.index')}}" >
                                <div class="bg-primary b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">Sosyal Medya Ekle</span>
                                            <h4 class="mb-0">Tıkla</h4><i class="icon-bg"
                                                                          data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('iletisim.index')}}" >
                                <div class="bg-secondary b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">İletişim Bilgileri Ekle</span>
                                            <h4 class="mb-0">Tıkla</h4><i class="icon-bg"
                                                                          data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('user.create')}}" >
                                <div class="bg-success b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">Kulannıcı Sayısı</span>
                                            <h4 class="mb-0">{{$user->count()}}</h4><i class="icon-bg"
                                                                          data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('referans.create')}}" >
                                <div class="bg-info b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">Referans Sayısı</span>
                                            <h4 class="mb-0">{{$referans->count()}}</h4><i class="icon-bg"
                                                                          data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('etiket.create')}}" >
                                <div class="bg-warning b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">Etiket Sayısı</span>
                                            <h4 class="mb-0">{{$etiket->count()}}</h4><i class="icon-bg"
                                                                          data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('sayfa.create')}}" >
                                <div class="bg-danger b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">Sayfa Sayısı</span>
                                            <h4 class="mb-0">{{$sayfa->count()}}</h4><i class="icon-bg"
                                                                          data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('event.index')}}" >
                                <div class="bg-dark b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">Etkinlik Sayısı</span>
                                            <h4 class="mb-0">{{$event->count()}}</h4><i class="icon-bg"
                                                                                        data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3 col-lg-6">
                        <div class="card o-hidden border-0">
                            <a href="{{route('slider.index')}}" >
                                <div class="bg-light-secondary b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="align-self-center text-center"><i data-feather="file-plus"></i></div>
                                        <div class="media-body"><span class="m-0">Slider Sayısı</span>
                                            <h4 class="mb-0">{{$slider->count()}}</h4><i class="icon-bg"
                                                                                        data-feather="file-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->

@endsection

