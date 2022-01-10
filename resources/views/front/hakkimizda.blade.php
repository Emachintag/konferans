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
                    <h2>Hakkımızda</h2>
                </div>

                <div class="eight columns">
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a></li>
                            <li>Hakkımızda</li>
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
                <h3 class="headline">{{$hakkimizda->title}}</h3><span class="line" style="margin-bottom:30px;"></span><div class="clearfix"></div>
                <p>{!! $hakkimizda->text !!}</p>
                  </div>



        </div>
        <!-- Container / End -->


    </div>




    <div class="container">

        <!-- Portfolio Wrapper-->
        <div id="portfolio-wrapper">

            <!-- Portfolio Item -->

        @foreach(DB::table('hakkimizda_gorsel')->where('hakkimizda_id',1635233954)->get() as $images)
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
