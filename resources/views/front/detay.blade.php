@extends('front.layouts.app')
@section('content')
    <style>
        body {
            margin: 0;
            padding: 0;
            background: rgb(230,230,230);

            color: rgb(50,50,50);
            font-family: 'Open Sans', sans-serif;

            line-height: 1.6em;
        }

        /* ================ The Timeline ================ */

        .timeline {
            position: relative;
            width: 660px;
            margin: 0 auto;
            margin-top: 20px;
            padding: 1em 0;
            list-style-type: none;
        }

        .timeline:before {
            position: absolute;
            left: 50%;
            top: 0;
            content: ' ';
            display: block;
            width: 6px;
            height: 100%;
            margin-left: -3px;
            background: rgb(80,80,80);
            background: -moz-linear-gradient(top, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,1)));
            background: -webkit-linear-gradient(top, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
            background: -o-linear-gradient(top, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
            background: -ms-linear-gradient(top, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);
            background: linear-gradient(to bottom, rgba(80,80,80,0) 0%, rgb(80,80,80) 8%, rgb(80,80,80) 92%, rgba(80,80,80,0) 100%);

            z-index: 5;
        }

        .timeline li {
            padding: 1em 0;
        }

        .timeline li:after {
            content: "";
            display: block;
            height: 0;
            clear: both;
            visibility: hidden;
        }

        .direction-l {
            position: relative;
            width: 300px;
            float: left;
            text-align: right;
        }

        .direction-r {
            position: relative;
            width: 300px;
            float: right;
        }

        .flag-wrapper {
            position: relative;
            display: inline-block;

            text-align: center;
        }

        .flag {
            position: relative;
            display: inline;
            background: rgb(248,248,248);
            padding: 6px 10px;
            border-radius: 5px;

            font-weight: 600;
            text-align: left;
        }

        .direction-l .flag {
            -webkit-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            -moz-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
        }

        .direction-r .flag {
            -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            -moz-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
            box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
        }

        .direction-l .flag:before,
        .direction-r .flag:before {
            position: absolute;
            top: 50%;
            right: -40px;
            content: ' ';
            display: block;
            width: 12px;
            height: 12px;
            margin-top: -10px;
            background: #fff;
            border-radius: 10px;
            border: 4px solid rgb(255,80,80);
            z-index: 10;
        }

        .direction-r .flag:before {
            left: -40px;
        }

        .direction-l .flag:after {
            content: "";
            position: absolute;
            left: 100%;
            top: 50%;
            height: 0;
            width: 0;
            margin-top: -8px;
            border: solid transparent;
            border-left-color: rgb(248,248,248);
            border-width: 8px;
            pointer-events: none;
        }

        .direction-r .flag:after {
            content: "";
            position: absolute;
            right: 100%;
            top: 50%;
            height: 0;
            width: 0;
            margin-top: -8px;
            border: solid transparent;
            border-right-color: rgb(248,248,248);
            border-width: 8px;
            pointer-events: none;
        }

        .time-wrapper {
            display: inline;

            line-height: 1em;
            font-size: 0.66666em;
            color: rgb(250,80,80);
            vertical-align: middle;
        }

        .direction-l .time-wrapper {
            float: left;
        }

        .direction-r .time-wrapper {
            float: right;
        }

        .time {
            display: inline-block;
            padding: 4px 6px;
            background: rgb(248,248,248);
        }

        .desc {
            margin: 1em 0.75em 0 0;

            font-size: 0.77777em;
            font-style: italic;
            line-height: 1.5em;
        }

        .direction-r .desc {
            margin: 1em 0 0 0.75em;
        }

        /* ================ Timeline Media Queries ================ */

        @media screen and (max-width: 660px) {

            .timeline {
                width: 100%;
                padding: 4em 0 1em 0;
            }

            .timeline li {
                padding: 2em 0;
            }

            .direction-l,
            .direction-r {
                float: none;
                width: 100%;

                text-align: center;
            }

            .flag-wrapper {
                text-align: center;
            }

            .flag {
                background: rgb(255,255,255);
                z-index: 15;
            }

            .direction-l .flag:before,
            .direction-r .flag:before {
                position: absolute;
                top: -30px;
                left: 50%;
                content: ' ';
                display: block;
                width: 12px;
                height: 12px;
                margin-left: -9px;
                background: #fff;
                border-radius: 10px;
                border: 4px solid rgb(255,80,80);
                z-index: 10;
            }

            .direction-l .flag:after,
            .direction-r .flag:after {
                content: "";
                position: absolute;
                left: 50%;
                top: -8px;
                height: 0;
                width: 0;
                margin-left: -8px;
                border: solid transparent;
                border-bottom-color: rgb(255,255,255);
                border-width: 8px;
                pointer-events: none;
            }

            .time-wrapper {
                display: block;
                position: relative;
                margin: 4px 0 0 0;
                z-index: 14;
            }

            .direction-l .time-wrapper {
                float: none;
            }

            .direction-r .time-wrapper {
                float: none;
            }

            .desc {
                position: relative;
                margin: 1em 0 0 0;
                padding: 1em;
                background: rgb(245,245,245);
                -webkit-box-shadow: 0 0 1px rgba(0,0,0,0.20);
                -moz-box-shadow: 0 0 1px rgba(0,0,0,0.20);
                box-shadow: 0 0 1px rgba(0,0,0,0.20);

                z-index: 15;
            }

            .direction-l .desc,
            .direction-r .desc {
                position: relative;
                margin: 1em 1em 0 1em;
                padding: 1em;

                z-index: 15;
            }

        }

        @media screen and (min-width: 400px ?? max-width: 660px) {

            .direction-l .desc,
            .direction-r .desc {
                margin: 1em 4em 0 4em;
            }

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
                    <h2>Etkinlik Detay Sayfası</h2>
                </div>

                <div class="eight columns">
                    <nav id="breadcrumbs">
                        <ul>
                            <li>Şuan Bulunduğun Sayfa:</li>
                            <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                            <li>Etkinlik Detay</li>
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

            <div class="twelve alt columns">

                <!-- Post -->
                <article class="post" style="margin: 0; border: 0;">

                    <figure class="post-img media">
                        <div class="mediaholder">
                            <a class="mfp-image" title="Touchpad Graphics Tablet" href="{{asset("public/".$event->image)}}">
                                <img src="{{asset("public/".$event->image)}}" style="height: 400px" alt=""/>
                                <div class="hovercover">
                                    <div class="hovericon"><i class="hoverzoom"></i></div>
                                </div>
                            </a>
                        </div>
                    </figure>

                    <div class="post-format">
                        <div class="circle"><i class="icon-pencil"></i><span></span></div>
                    </div>

                    <section class="post-content">

                        <header class="meta">
                            <h2><a href="#">{{$event->title}}</a></h2>
                            <ul>

                                <li>Kullanıcı: {{$user->name}} {{$user->last_name}} </li>
                                <li>Tarih: {{ \Carbon\Carbon::parse($event->created_at)->day }} {{ \Carbon\Carbon::parse($event->created_at)->monthName }} {{ \Carbon\Carbon::parse($event->created_at)->year }}</li>
                            </ul>
                        </header>

                        <p>{{$event->text}}</p>

{{--                        <h5>Website: <a href="{{$event->website}}" >{{$event->website}}</a></h5>--}}
{{--                        <h5>Etkinlik Tarihi: {{ \Carbon\Carbon::parse($event->date)->day }} {{ \Carbon\Carbon::parse($event->date)->monthName }} {{ \Carbon\Carbon::parse($event->date)->year }}</h5>--}}
{{--                        <h5>E-Posta: <a href="mailto:{{$event->email}}" >{{$event->email}}</a></h5>--}}
{{--                        @foreach(DB::table('languages')->where('iso_639_1',$event->country)->get() as $uuu)--}}
{{--                        <h5>Ülke: {{$uuu->name}}</h5>--}}
{{--                        @endforeach--}}
                        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

                        <!-- The Timeline -->

                        <ul style="font-size: 112.5%;" class="timeline">

                            <!-- Item 1 -->
                            <li>
                                <div class="direction-r">
                                    <div class="flag-wrapper">
                                        <span class="flag">Website</span>
                                    </div>
                                    <div class="desc"><a target="_blank" style="color: black" href="{{$event->website}}" ><h4>{{$event->website}}</h4></a></div>
                                </div>
                            </li>

                            <!-- Item 2 -->
                            <li>
                                <div class="direction-l">
                                    <div class="flag-wrapper">
                                        <span class="flag">Etkinlik Başlangıç Tarihi</span>
                                    </div>
                                    <div class="desc"><h4>{{ \Carbon\Carbon::parse($event->date)->day }} {{ \Carbon\Carbon::parse($event->date)->monthName }} {{ \Carbon\Carbon::parse($event->date)->year }} {{ \Carbon\Carbon::parse($event->date)->hour }}:{{ \Carbon\Carbon::parse($event->date)->minute }}</h4></div>
                                </div>
                            </li>

                            <li>
                                <div class="direction-r">
                                    <div class="flag-wrapper">
                                        <span class="flag">Etkinlik Bitiş Tarihi</span>
                                    </div>
                                    <div class="desc"><h4>{{ \Carbon\Carbon::parse($event->date1)->day }} {{ \Carbon\Carbon::parse($event->date1)->monthName }} {{ \Carbon\Carbon::parse($event->date1)->year }} {{ \Carbon\Carbon::parse($event->date1)->hour }}:{{ \Carbon\Carbon::parse($event->date1)->minute }}</h4></div>
                                </div>
                            </li>

                            <!-- Item 3 -->
                            <li>
                                <div class="direction-l">
                                    <div class="flag-wrapper">
                                        <span class="flag">E-Posta</span>
                                    </div>
                                    <div class="desc"><a href="mailto:{{$event->email}}" ><h4>{{$event->email}}</h4></a></div>
                                </div>
                            </li>

                            <li>
                                <div class="direction-r">
                                    <div class="flag-wrapper">
                                        <span class="flag">Ülke</span>
                                    </div>
                                    @foreach(DB::table('countries')->where('country_code',$event->country)->get() as $uuu)
                                    <div class="desc"><h4>{{$uuu->country_name}}</h4></div>
                                    @endforeach
                                </div>
                            </li>

                        </ul>

                    </section>
                    <div class="clearfix"></div>

                </article>






            </div>
            <!-- Container / End -->


            <!-- Sidebar
            ================================================== -->
            <div class="four columns">
            @if(DB::table('etkinlik')->where('country',$event->country)->where('id','!=', $event->id)->count()<0)
                <!-- Categories -->
                <div class="widget">
                    <h3 class="headline">Benzer Etkinlikler</h3><span class="line"></span><div class="clearfix"></div>
                    <div class="tabs-container">

                        <div class="tab-content" id="tab1">

                            <!-- Recent Posts -->
                            <ul class="widget-tabs">
                        @foreach(DB::table('etkinlik')->where('country',$event->country)->where('id','!=', $event->id)->take(3)->get() as $etkinliklerr)
                                <!-- Post #1 -->
                                <li>
                                    <div class="widget-thumb">
                                        <a href="{{route('etkinlik_detay', $etkinliklerr->url)}}"><img src="{{asset("public/".$etkinliklerr->image)}}" alt="" /></a>
                                    </div>

                                    <div class="widget-text">
                                        <h4><a href="{{route('etkinlik_detay', $etkinliklerr->url)}}">{{$etkinliklerr->title}}</a></h4>
                                        <span>{{ \Carbon\Carbon::parse($etkinliklerr->date)->day }} {{ \Carbon\Carbon::parse($etkinliklerr->date)->monthName }} {{ \Carbon\Carbon::parse($etkinliklerr->date)->year }}</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                     @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                @endif


                <div class="widget">
                    <h3 class="headline">Diğer Etkinlikler</h3><span class="line"></span><div class="clearfix"></div>
                    <div class="tabs-container">

                        <div class="tab-content" id="tab1">

                            <!-- Recent Posts -->
                            <ul class="widget-tabs">
                            @foreach(DB::table('etkinlik')->orderBy('id','desc')->take(3)->get() as $etkinliklerrr)
                                <!-- Post #1 -->
                                    <li>
                                        <div class="widget-thumb">
                                            <a href="{{route('etkinlik_detay', $etkinliklerrr->url)}}"><img src="{{asset("public/".$etkinliklerrr->image)}}" alt="" /></a>
                                        </div>

                                        <div class="widget-text">
                                            <h4><a href="{{route('etkinlik_detay', $etkinliklerrr->url)}}">{{$etkinliklerrr->title}}</a></h4>
                                            <span>{{ \Carbon\Carbon::parse($etkinliklerrr->date)->day }} {{ \Carbon\Carbon::parse($etkinliklerrr->date)->monthName }} {{ \Carbon\Carbon::parse($etkinliklerrr->date)->year }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>



                    </div>
                </div>


                <div class="widget" style="margin: 13px 0 0 0;">
                    <h3 class="headline">Etiket</h3><span class="line"></span><div class="clearfix"></div>

                    <nav class="tags">
                        @foreach(explode(',', $event->etiket ) as $tag )
                            @foreach(DB::table('etiket')->where('id',$tag)->get() as $etiket)
                        <a href="{{route('events_tag')}}?kategori={{$etiket->id}}">{{$etiket->title}}</a>
                        @endforeach
                        @endforeach

                    </nav>
                </div>
            </div>
        </div>
        <!-- Container / End -->


    </div>
    <!-- Content Wrapper / End -->

@endsection
