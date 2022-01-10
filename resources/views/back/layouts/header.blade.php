<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('/public/back/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('/public/back/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Admin Panel</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/fontawesome/css/all.min.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/vector-map.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('/public/back/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/responsive.css')}}">
    @toastr_css
    @yield('css')
</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row m-0">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                                                                    src="{{asset('/public/back/assets/images/logo/logo.png')}}"
                                                                    alt=""></a>
                </div>
                <div class="dark-logo-wrapper"><a href="index.html"><img class="img-fluid"
                                                                         src="{{asset('/public/back/assets/images/logo/dark-logo.png')}}"
                                                                         alt=""></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                                               id="sidebar-toggle"></i></div>
            </div>
            <div class="left-menu-header col">
                <ul>
                    <li>
                        <form class="form-inline search-form">
                            <div class="search-bg"><i class="fa fa-search"></i>
                                <input class="form-control-plaintext" placeholder="Search here.....">
                            </div>
                        </form>
                        <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                    </li>
                </ul>
            </div>
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                data-feather="maximize"></i></a></li>

                    <li>
                        <div class="mode"><i class="fa fa-moon"></i></div>
                    </li>

                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light" type="button"><a href="{{route('logout')}}"><i
                                    data-feather="log-out"></i>Çıkış</a></button>
                    </li>
                </ul>
            </div>
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
            <div class="sidebar-user text-center"><img class="img-90 rounded-circle"
                                                             src="{{asset("public/".Auth::user()->image)}}"

                                                             alt="">

                    <h6 class="mt-3 f-14 f-w-600">{{Auth::user()->name}} {{Auth::user()->last_name}}</h6>
                <p class="mb-0 font-roboto">{{Auth::user()->email}}</p>

            </div>
            <nav>
                <div class="main-navbar">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="mainnav">
                        <ul class="nav-menu custom-scrollbar">
                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                                                                      aria-hidden="true"></i></div>
                            </li>
                            <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('index')}}"><i
                                        data-feather="home"></i><span>Anasayfa</span></a></li>
                            <li class="sidebar-main-title">
                                <div>
                                    <h6>Site Ayarlar </h6>
                                </div>
                            </li>
                            <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('ayarlar.index')}}"><i
                                        data-feather="settings"></i><span>Ayarlar Ekle</span></a></li>

                            <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('iletisim.index')}}"><i
                                        data-feather="phone"></i><span>İletişim Bilgileri Ekle</span></a></li>

                            <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('sosyal.index')}}"><i
                                        data-feather="facebook"></i><span>Sosyal Medya Ekle</span></a></li>
                            <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('form.index')}}"><i
                                        data-feather="mail"></i><span>İletisim Form</span></a></li>

                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="edit"></i><span>Kullanıcı</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="{{route('user.create')}}">Kullanıcı Ekle</a></li>
                                    <li><a href="{{route('user.index')}}">Kullanıcı Listele</a></li>
                                </ul>
                            </li>

{{--                            <li class="sidebar-main-title">--}}
{{--                                <div>--}}
{{--                                    <h6>SEO Ayarlar </h6>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('title.index')}}"><i--}}
{{--                                        data-feather="hash"></i><span>Meta Title Ekle</span></a></li>--}}

{{--                            <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{route('desc.index')}}"><i--}}
{{--                                        data-feather="hash"></i><span>Meta Description Ekle</span></a></li>--}}




                            <li class="sidebar-main-title">
                                <div>
                                    <h6>Modüller </h6>
                                </div>
                            </li>



                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="airplay"></i><span>Referans</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="{{route('referans.create')}}">Referans Ekle</a></li>
                                    <li><a href="{{route('referans.index')}}">Referans Listele</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="airplay"></i><span>Etiket</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="{{route('etiket.create')}}">Etiket Ekle</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="package"></i><span>Sayfa</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="{{route('sayfa.create')}}">Sayfa Ekle</a></li>
                                    <li><a href="{{route('sayfa.index')}}">Sayfa Listele</a></li>
{{--                                    <li><a class="submenu-title" href="javascript:void(0)">Sayfa Kategori<span--}}
{{--                                                class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>--}}
{{--                                        <ul class="nav-sub-childmenu submenu-content">--}}
{{--                                            <li><a href="{{route('sayfa-category.create')}}">Kategori Ekle</a></li>--}}
{{--                                            <li><a href="{{route('sayfa-category.index')}}">Kategori Listele</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
                                </ul>
                            </li>

                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="slack"></i><span>Etkinlik</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="{{route('event.index')}}">Etkinlik Listele</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="film"></i><span>Slider</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="{{route('slider.create')}}">Slider Ekle</a></li>
                                    <li><a href="{{route('slider.index')}}">Slider Listele</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
                                        data-feather="briefcase"></i><span>Kurumsal</span></a>
                                <ul class="nav-submenu menu-content">
                                    <li><a href="{{route('hakkimizda.index')}}">Hakkımızda Ekle</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </div>
            </nav>
        </header>
