@extends('front.layouts.app')
@section('content')
    <?php
    if (isset($_GET['kategori'])) {
        $etkinlikler = DB::table('etkinlik')->where('etiket', $_GET['kategori'])->get();
    } else {
        if (isset($_GET['q'])){
            $etkinlikler = DB::table('etkinlik')->where('title' , 'LIKE', '%'.$_GET['q'].'%')->get();
        }
        else
        {
            $etkinlikler = DB::table('etkinlik')->get();
        }
    }
    ?>
    <!-- Content Wrapper / Start -->
    <div id="content-wrapper">



        <!-- Titlebar
        ================================================== -->
        <section id="titlebar">
            <!-- Container -->
            <div class="container">

                <div class="eight columns">
                    <h2>Etkinlik</h2>
                </div>

                <div class="eight columns">
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Anasayfa</a></li>
                            <li>Etkinlik</li>
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- Container / End -->
        </section>



        <!-- Container -->
        <div class="container">

            <!-- Portfolio Wrapper-->
            <div id="portfolio-wrapper">

                    @foreach($etkinlikler as $etkinliklers)
                        <div class="four columns portfolio-item media architecture technology">
                            <figure>
                                <div class="mediaholder">
                                    <a href="{{route('etkinlik_detay', $etkinliklers->url)}}">
                                        <img alt="" src="{{asset("public/".$etkinliklers->image)}}"/>
                                        <div class="hovercover">
                                            <div class="hovericon"><i class="hoverlink"></i></div>
                                        </div>
                                    </a>
                                </div>

                                <a href="{{route('etkinlik_detay', $etkinliklers->url)}}">
                                    <figcaption class="item-description">
                                        <h5>{{$etkinliklers->title}}</h5>
                                    </figcaption>
                                </a>

                            </figure>
                        </div>
                    @endforeach



            </div>
            <!-- Portfolio Wrapper / End -->

        </div>
        <!-- Container / End -->


    </div>
    <!-- Content Wrapper / End -->


@endsection
