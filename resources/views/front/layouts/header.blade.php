<?php $ayarlar= DB::table('ayarlar')->first(); ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Astrum</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('/public/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/public/front/css/colors/green.css')}}" id="colors">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Java Script
    ================================================== -->
    <script src="{{asset('/public/front/scripts/jquery.min.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.themepunch.plugins.min.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.themepunch.showbizpro.min.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.easing.min.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.tooltips.min.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.superfish.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.twitter.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.flexslider.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.jpanelmenu.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.contact.js')}}"></script>
    <script src="{{asset('/public/front/scripts/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('/public/front/scripts/custom.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/select2.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <link rel="icon" href="{{asset("public/".$ayarlar->favicon)}}">

@yield('css')


</head>
<body>


<!-- Header
================================================== -->
<header id="header">

    <!-- Container -->
    <div class="container">

        <!-- Logo / Mobile Menu -->
        <div class="three columns">

            <div id="mobile-navigation">
                <form method="GET" id="menu-search" action="#">
                    <input type="text" placeholder="Start Typing..." />
                </form>
                <a href="#menu" class="menu-trigger"><i class="icon-reorder"></i></a>
                <span class="search-trigger"><i class="icon-search"></i></span>
            </div>

            <div id="logo">
                <h1><a href="{{route('anasayfa')}}"><img src="{{asset("public/".$ayarlar->logo)}}" alt="Astrum" /></a></h1>
            </div>
        </div>


        <!-- Navigation
        ================================================== -->
        <div class="thirteen columns">

            <nav id="navigation" class="menu">
                <ul id="responsive">

                    <li><a href="{{route('anasayfa')}}" @if(Request::path() == '/') id="current" @endif>Anasayfa</a></li>
                    <li><a href="{{route('about')}}" @if(Request::path() == 'hakkimizda') id="current" @endif>Hakkımızda</a></li>
                    <li><a href="{{route('events')}}">Etkinlikler</a>

                    </li>
{{--                    @foreach(DB::table('sayfa_kategori')->where('kategori_tree',0)->get() as $sayfcat)--}}
{{--                        @if(DB::table('sayfa_kategori')->where('kategori_tree',$sayfcat->id)->count() < 1)--}}
{{--                        <li><a href="" >{{$sayfcat->kategori}}</a> </li>--}}
{{--                        @else--}}
{{--                            <li><a href="" >{{$sayfcat->kategori}}</a>--}}
{{--                                <ul>--}}
{{--                                    @foreach(DB::table('sayfa_kategori')->where('kategori_tree',$sayfcat->id)->get() as $sayfcattree)--}}
{{--                                    <li><a href="elements.html">{{$sayfcattree->kategori}}</a></li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            @endif--}}
{{--                    @endforeach--}}
                    @foreach(DB::table('sayfa')->where('status',1)->orderBy('sira','ASC')->get() as $sayfa)
                        <li><a @if($sayfa->type == 1) href="{{route('sayfa_detay', $sayfa->url)}}" @else target="_blank" href="{{$sayfa->link}}" @endif>{{$sayfa->title}}</a></li>
                    @endforeach
                    <li><a href="{{route('contact')}}" @if(Request::path() == 'iletisim') id="current" @endif>İletişim</a></li>
                    @if (Auth::check())
                    <li><a href="#">{{Auth::user()->name}} {{Auth::user()->last_name}}</a>
                        <ul>
                            @if(Auth::user()->role == 1)
                                <li><a href="{{route('profil')}}">Profil Bilgileri</a></li>
                            <li><a href="{{route('event')}}">Etkinlik Ekle</a></li>
                                <li><a href="{{route('index')}}">Panel</a></li>
                                <li><a href="{{route('logout')}}">Çıkış</a></li>
                            @elseif(Auth::user()->role == 2)
                                <li><a href="{{route('profil')}}">Profil Bilgileri</a></li>
                                <li><a href="{{route('event')}}">Etkinlik Ekle</a></li>
                                <li><a href="{{route('logout')}}">Çıkış</a></li>
                                @endif

                        </ul>
                    </li>
                    @else
                    <li><a href="{{route('login')}}">Giriş Yap</a></li>
                    @endif


                </ul>
            </nav>
        </div>

    </div>
    <!-- Container / End -->

</header>
<!-- Header / End -->


