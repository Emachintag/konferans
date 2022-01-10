@extends('front.layouts.app')
@section('content')



    <!-- Content Wrapper / Start -->
    <div id="content-wrapper">


        <!-- Titlebar
        ================================================== -->
        <section id="titlebar">
            <!-- Container -->
            <div class="container">

                <div class="eight columns">
                    <h2>{{$sayfa->title}}</h2>
                </div>

                <div class="eight columns">
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a></li>
                            <li>{{$sayfa->title}}</li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- Container / End -->
        </section>



        <!-- Content
        ================================================== -->

        <!-- Container -->
        <div class="container" style="margin-bottom: 10px;">

            <!-- Who We Are? -->
            <div class="col-md-12">
                <h3 class="headline">{{$sayfa->title}}</h3><span class="line" style="margin-bottom:30px;"></span><div class="clearfix"></div>
                <p>{!! $sayfa->text !!}</p>
            </div>



        </div>
        <!-- Container / End -->


    </div>




    <div class="container">

        <!-- Portfolio Wrapper-->
        <div id="portfolio-wrapper">

            <!-- Portfolio Item -->

        @foreach(DB::table('sayfa_gorsel')->where('sayfa_id',$sayfa->id)->get() as $images)
            <!-- Portfolio Item -->
                <div class="one-third column portfolio-item media architecture identity">
                    <figure>
                        <div class="mediaholder">
                            <a  href="{{asset('public'.$images->gorsel)}}" class="mfp-image" title="Surfing The Web">
                                <img style="width: 80%" alt="" src="{{asset('public'.$images->gorsel)}}"/>

                            </a>
                        </div>

                    </figure>
                </div>
            @endforeach



        </div>
        <!-- Portfolio Wrapper / End -->

    </div>
    <!-- Content Wrapper / End -->
@endsection
