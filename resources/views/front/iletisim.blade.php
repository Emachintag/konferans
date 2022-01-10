<?php $sosyal = DB::table('sosyal_medya')->first(); ?>
@extends('front.layouts.app')
@section('content')
    <style>
        iframe {
            width: 100%;
        }
    </style>
    <style>
        @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

        a, a:hover {
            text-decoration: none;
        }

        .socialbtns, .socialbtns ul, .socialbtns li {
            margin: 0;
            padding: 5px;
        }

        .socialbtns li {
            list-style: none outside none;
            display: inline-block;
        }

        .socialbtns .fa {
            color: #FFF;
            background-color: #000;
            width: 40px;
            height: 28px;
            padding-top: 12px;
            border-radius: 20px;
            -moz-border-radius: 20px;
            -webkit-border-radius: 20px;
            -o-border-radius: 20px;
            transition: all ease 0.3s;
            -moz-transition: all ease 0.3s;
            -webkit-transition: all ease 0.3s;
            -o-transition: all ease 0.3s;
            transform: rotate(-360deg);
            -moz-transform: rotate(-360deg);
            -webkit-transform: rotate(-360deg);
            -o-transform: rotate(-360deg);
        }

        .socialbtns .fa:hover {
            transition: all ease 0.3s;
            -moz-transition: all ease 0.3s;
            -webkit-transition: all ease 0.3s;
            -o-transition: all ease 0.3s;
            transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -webkit-transform: rotate(360deg);
            -o-transform: rotate(360deg);
        }

    </style>


    <!-- Content Wrapper / Start -->
    <div id="content-wrapper">


        <!-- Titlebar
        ================================================== -->
        <section id="titlebar">
            <!-- Container -->
            <div class="container">

                <div class="eight columns">
                    <h2>İletişim</h2>
                </div>

                <div class="eight columns">
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a></li>
                            <li>İletişim</li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- Container / End -->
        </section>


        <!-- Content
        ================================================== -->

        <!-- Container -->
        <div class="container">
            <div class="sixteen columns">
                <h3 class="headline">Lokasyon</h3><span class="line" style="margin-bottom: 35px;"></span><div class="clearfix"></div>
            </div>
        </div>
        <!-- Container / End -->


        <!-- Container -->
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12091.635064557599!2d30.332731!3d40.742033!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc7996fa884f94c03!2sSakarya%20%C3%9Cniversitesi!5e0!3m2!1str!2str!4v1638825825319!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <!-- Google Maps / End -->

            </div>
        </div>
        <!-- Container / End -->



        <!-- Container -->
        <div class="container">
            @if(session()->has('message'))
                <div class="notification success closeable">
                    <p><span>Başarılı !</span>  {{ session()->get('message') }}</p>
                    <a class="close" href="#"></a>
                </div>
            @endif
            <div class="twelve alt columns">

                <h3 class="headline">İletişim Formu</h3><span class="line" style="margin-bottom: 35px;"></span><div class="clearfix"></div>

                <!-- Contact Form -->
                <section id="contact">

                    <!-- Success Message -->
                    <mark id="message"></mark>

                    <!-- Form -->
                    <form method="post" action="{{route('iletisim_post')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <fieldset>

                            <div>
                                <label for="name" accesskey="U">Ad:</label>
                                <input name="ad" type="text" id="name" />
                            </div>

                            <div>
                                <label for="email" accesskey="E">Email: <span>*</span></label>
                                <input name="email" type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
                            </div>

                            <div>
                                <label for="comments" accesskey="C">Mesaj: <span>*</span></label>
                                <textarea name="text" cols="40" rows="3" id="comments" spellcheck="true"></textarea>
                            </div>

                        </fieldset>

                        <input type="submit" class="submit" id="submit" value="Gönder" />
                        <div class="clearfix"></div>

                    </form>

                </section>
                <!-- Contact Form / End -->

            </div>
            <!-- Container / End -->


            <!-- Sidebar
            ================================================== -->
            <div class="four columns">

                <!-- Information -->
                <div class="widget" style="margin-top:0;">
                    <h3 class="headline">İletişim</h3><span class="line"></span><div class="clearfix"></div>
                    <ul class="contact-informations">
                        <li><span class="address">{{$iletisim->adres}}</span></li>
                    </ul>

                    <ul class="contact-informations second">
                        @if($iletisim->tel_1)
                        <li><i class="icon-phone"></i> <p>{{$iletisim->tel_1}}</p></li>
                        @endif
                            @if($iletisim->tel_2)
                                <li><i class="icon-phone"></i> <p>{{$iletisim->tel_2}}</p></li>
                            @endif
                            @if($iletisim->tel_3)
                                <li><i class="icon-phone"></i> <p>+{{$iletisim->tel_3}}</p></li>
                            @endif
                            @if($iletisim->email_1)
                        <li><i class="icon-envelope-alt"></i> <p>{{$iletisim->email_1}}</p></li>
                            @endif
                            @if($iletisim->email_2)
                                <li><i class="icon-envelope-alt"></i> <p>{{$iletisim->email_2}}</p></li>
                            @endif
                    </ul>

                </div>

                <!-- Social -->
                <div class="widget">
                    <h3 class="headline">Sosyal Medya</h3><span class="line" style="margin-bottom: 25px;"></span><div class="clearfix"></div>
                    <ul class="social-icons">
                        <div align="center" class="socialbtns">
                            <ul>
                                @if($sosyal->facebook)
                                <li><a target="_blank" href="{{$sosyal->facebook}}" class="fa fa-lg fa-facebook"></a></li>
                                @endif
                                    @if($sosyal->twitter)
                                <li><a target="_blank" href="{{$sosyal->twitter}}" class="fa fa-lg fa-twitter"></a></li>
                                    @endif
                                    @if($sosyal->linkedin)
                                <li><a target="_blank" href="{{$sosyal->linkedin}}" class="fa fa-lg fa-linkedin"></a></li>
                                    @endif
                                    @if($sosyal->instagram)
                                <li><a target="_blank" href="{{$sosyal->instagram}}" class="fa fa-lg fa-instagram"></a></li>
                                    @endif
                                    @if($sosyal->youtube)
                                <li><a target="_blank" href="{{$sosyal->youtube}}" class="fa fa-lg fa-youtube"></a></li>
                                        @endif
                            </ul>
                        </div>

                    </ul>
                    <div class="clearfix"></div>

                </div>

            </div>

        </div>
        <!-- Container / End -->



    </div>
    <!-- Content Wrapper / End -->
@endsection
