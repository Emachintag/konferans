
@extends('front.layouts.app')
@section('content')

<style>



    @import url(https://fonts.googleapis.com/css?family=Patua+One);



    .tags>a>li:hover {
        color:#fff;
        background-color: #262626;
    }
    .tags li {
        list-style:none;
        display:inline-block;
        background-color:#F0F2F4;
        border-radius:5px;
        padding:5px 10px;
       #font-size:18px;
        font-family: 'Patua One', cursive;
        color:black;
        box-shadow:0px 0px 7px black;
        margin:3px 1px 3px 1px;
        #line-height:27px;
        text-transform:uppercase;
    }


    .colors {
        list-style:none;
    }
    .colors li{
        display: inline-block;
        width:15px;
        height: 15px;
    }


</style>
<style>


    .slick-slide {
        margin: 0px 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-slider
    {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
        touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }

    .slick-list
    {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    .slick-list:focus
    {
        outline: none;
    }
    .slick-list.dragging
    {
        cursor: pointer;
        cursor: hand;
    }

    .slick-slider .slick-track,
    .slick-slider .slick-list
    {
        -webkit-transform: translate3d(0, 0, 0);
        -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .slick-track
    {
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }
    .slick-track:before,
    .slick-track:after
    {
        display: table;
        content: '';
    }
    .slick-track:after
    {
        clear: both;
    }
    .slick-loading .slick-track
    {
        visibility: hidden;
    }

    .slick-slide
    {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }
    [dir='rtl'] .slick-slide
    {
        float: right;
    }
    .slick-slide img
    {
        display: block;
    }
    .slick-slide.slick-loading img
    {
        display: none;
    }
    .slick-slide.dragging img
    {
        pointer-events: none;
    }
    .slick-initialized .slick-slide
    {
        display: block;
    }
    .slick-loading .slick-slide
    {
        visibility: hidden;
    }
    .slick-vertical .slick-slide
    {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }
    .slick-arrow.slick-hidden {
        display: none;
    }
</style>
<style>
    .tag {
        background: #73b819;
        color: white;
        display: inline-block;
        padding: 5px 10px 5px 25px;
        border-radius: 90px 30px 30px 90px;
        position: relative;
        margin: 0 10px 10px 0;
        font-family: helvetica;
    }
    .tag:after {
        content: '';
        width: 8px;
        height: 8px;
        background: white;
        position: absolute;
        top: 10px;
        left: 10px;
        border-radius: 90px;
    }
</style>
<style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {}
    a,
    a:hover,
    a:focus,
    a:active {
        text-decoration: none;
        outline: none;
    }

    a,
    a:active,
    a:focus {
        color: #333;
        text-decoration: none;
        transition-timing-function: ease-in-out;
        -ms-transition-timing-function: ease-in-out;
        -moz-transition-timing-function: ease-in-out;
        -webkit-transition-timing-function: ease-in-out;
        -o-transition-timing-function: ease-in-out;
        transition-duration: .2s;
        -ms-transition-duration: .2s;
        -moz-transition-duration: .2s;
        -webkit-transition-duration: .2s;
        -o-transition-duration: .2s;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    img {
        max-width: 100%;
        height: auto;
    }
    /*--blog----*/

    .blog-grid {
        padding: 50px 0;
    }

    .blog-list-grid {
        column-count: 3;
        column-gap: 30px;
    }
    .blog-list {
        float: left;
        width: 100%;
        -webkit-column-break-inside: avoid;
        page-break-inside: avoid;
        break-inside: avoid;
        page-break-inside: avoid;

        margin: 0 0 30px 0;
        background-color: #FFFFFF;
        -moz-box-shadow: 0 0 15px 2px rgba(0,0,0,0.05);
        -o-box-shadow: 0 0 15px 2px rgba(0,0,0,0.05);
        -webkit-box-shadow: 0 0 15px 2px rgba(0,0,0,0.05);
        box-shadow: 0 0 15px 2px rgba(0,0,0,0.05);
    }
    .blog-list-description {
        padding: 45px 25px;
    }
    .blog-list-description h4 {
        color: #424C4C;
        font-family: "Playfair Display";
        font-size: 24px;
        letter-spacing: 0.78px;
        line-height: 1.4;
        margin-bottom: 30px;
    }

    .blog-list-description h4 a {
        color: #424C4C;
    }
    .blog-list-description h4 a:hover {
        color: #06797b;
    }
    .blog-list-description p {
        font-size: 16px;
        line-height: 1.5;
    }

    @media only screen and (max-width: 921px) {
        .blog-list-grid {
            column-count: 2;
        }

    }
    @media only screen and (max-width: 767px) {
        .blog-list-grid {
            column-count: 1;
        }

    }
</style>

    <!-- Content Wrapper / Start -->
    <div id="content-wrapper">


        <!-- Slider
        ================================================== -->
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <ul>
@foreach($slider as $sliders)
                    <!-- Slide 1 -->
                    <li data-fstransition="fade" data-transition="fade" data-slotamount="10" data-masterspeed="300">
                        <img src="{{asset("public/".$sliders->image)}}" alt="">
                        <div  class="caption text sfb" data-x="0" data-y="170" data-speed="400" data-start="800"  data-easing="easeOutExpo"><h2 style="color: white" >{{$sliders->title}}</h2></div>
                        <div class="caption text sfb" data-x="1" data-y="210" data-speed="400" data-start="1000" data-easing="easeOutExpo"><h3 style="color: white" >{{$sliders->title_2}}</h3></div>
                       <div class="caption sft" data-x="450" data-y="140" data-speed="600" data-start="1300" data-easing="easeOutExpo"><img src="images/slider-07.png" alt=""></div>
                        <div class="caption sfb" data-x="570" data-y="215" data-speed="600" data-start="1300" data-easing="easeOutExpo"><img src="images/slider-08.png" alt=""></div>
                        <div class="caption sfb" data-x="600" data-y="31" data-speed="600" data-start="1200" data-easing="easeOutExpo"><img src="images/slider-01.png" alt=""></div>
                    </li>
    @endforeach


                </ul>
            </div>
        </div>



        <div class="container">

            <div class="container">

                <div class="row">
                    <div class="col-lg-4 text-center">
                        <h3 id="title">Ülke Seçiniz</h3>
                    </div>
                    <div class="col-lg-8">

{{--                            @foreach(DB::table('etkinlik')->get() as $etkinlik)--}}
{{--                            @foreach(DB::table('countries')->where('country_code',$etkinlik->country)->get()->unique('id') as $countries)--}}
{{--                            <a class="grow" href="{{route('events')}}?kategori={{$countries->country_code}}"><li class="tag"><span>#</span> {{$countries->country_name}}</li></a>--}}
{{--                            @endforeach--}}
{{--                            @endforeach--}}
                            @foreach($event as $events)
                            @foreach($country->where('country_code',$events->country)->unique('country_code') as $countries)
                                <a style="color: white" href="{{route('events')}}?kategori={{$countries->country_code}}" class="tag">{{$countries->country_name}}</a>
                            @endforeach
                            @endforeach

                    </div>
                </div>
            </div>

            <div class="container">

                <div class="row">
                    <div class="col-lg-4 text-center">
                        <h3 id="title">Etiket Seçiniz</h3>
                    </div>
                    <div class="col-lg-8">
                        @foreach($etiket as $etiketler)
                        <a style="color: white" href="{{route('events_tag')}}?kategori={{$etiketler->id}}" class="tag">{{$etiketler->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>


{{--            <div class="sixteen columns">--}}
{{--                <h3 class="headline">Öneçıkan Etkinlikler</h3>--}}
{{--                <span class="line" style="margin-bottom:0;"></span>--}}
{{--            </div>--}}

{{--           --}}
{{--            <div id="recent-work" class="showbiz-container sixteen columns">--}}

{{--                <!-- Navigation -->--}}
{{--                <div class="showbiz-navigation">--}}
{{--                    <div id="showbiz_left_1" class="sb-navigation-left"><i class="icon-angle-left"></i></div>--}}
{{--                    <div id="showbiz_right_1" class="sb-navigation-right"><i class="icon-angle-right"></i></div>--}}
{{--                </div>--}}
{{--                <div class="clearfix"></div>--}}

{{--                <!-- Portfolio Entries -->--}}
{{--                <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1">--}}
{{--                    <div class="overflowholder">--}}

{{--                        <ul>--}}

{{--                        @foreach($event as $events)--}}
{{--                            <!-- Item -->--}}
{{--                            <li>--}}
{{--                                <div class="portfolio-item media">--}}
{{--                                    <figure>--}}
{{--                                        <div class="mediaholder">--}}
{{--                                            <a href="{{asset("public/".$events->image)}}" class="mfp-gallery" title="Green Leaves">--}}
{{--                                                <img alt="" src="{{asset("public/".$events->image)}}"/>--}}
{{--                                                <div class="hovercover">--}}
{{--                                                    <div class="hovericon"><i class="hoverzoom"></i></div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}

{{--                                        <a href="{{route('etkinlik_detay', $events->url)}}">--}}
{{--                                            <figcaption class="item-description">--}}
{{--                                                <h5>{{$events->title}}</h5>--}}
{{--                                            </figcaption>--}}
{{--                                        </a>--}}

{{--                                    </figure>--}}
{{--                                </div>--}}
{{--                            </li>--}}


{{--                            @endforeach--}}

{{--                        </ul>--}}


{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}
        </div>




        <div class="blog-grid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Öneçıkan Etkinlikler</h4>
                        <br>
                        <div class="blog-list-grid">

                            @foreach($event->take(3) as $events)
                            <div class="blog-list">
                                <div class="blog-list-img">
                                    <img style="width: 400px;height: 200px" src="{{asset("public/".$events->image)}}">
                                </div>
                                <div class="blog-list-description">
                                    <h4><a href="{{route('etkinlik_detay', $events->url)}}">{{$events->title}}</a></h4>
                                     </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <br />
        <div class="container">
            <h2>Organizatörler</h2>
            <br>
            <section class="customer-logos slider">
                @foreach(DB::table('referans')->get() as $referans)
                <a target="_blank" href="{{$referans->link}}" ><div  class="slide"><img style="border-radius: 60%" src="{{asset("public/".$referans->image)}}"></div></a>
                @endforeach
            </section>
        </div>



    </div>
    <!-- Content Wrapper / End -->


@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>
@endsection
