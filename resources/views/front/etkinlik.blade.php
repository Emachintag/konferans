@extends('front.layouts.app')
@section('content')
    <?php
    if (isset($_GET['kategori'])) {
        $etkinlikler = DB::table('etkinlik')->where('country', $_GET['kategori'])->get();
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
                @if (isset($_GET['kategori']))
                    @foreach($etkinlikler as $eventss)
                        <div class="four columns portfolio-item media architecture technology">
                            <figure>
                                <div class="mediaholder">
                                    <a href="{{route('etkinlik_detay', $eventss->url)}}">
                                        <img style="width: 400px;height: 200px" alt="" src="{{asset("public/".$eventss->image)}}"/>
                                        <div class="hovercover">
                                            <div class="hovericon"><i class="hoverlink"></i></div>
                                        </div>
                                    </a>
                                </div>

                                <a href="{{route('etkinlik_detay', $eventss->url)}}">
                                    <figcaption class="item-description">
                                        <h5>{{$eventss->title}}</h5>
                                    </figcaption>
                                </a>

                            </figure>
                        </div>
                    @endforeach
                    @elseif(isset($_GET['etiket']))
                    @foreach($etiket as $etikets)
                        <div class="four columns portfolio-item media architecture technology">
                            <figure>
                                <div class="mediaholder">
                                    <a href="{{route('etkinlik_detay', $etikets->url)}}">
                                        <img alt="" src="{{asset("public/".$etikets->image)}}"/>
                                        <div class="hovercover">
                                            <div class="hovericon"><i class="hoverlink"></i></div>
                                        </div>
                                    </a>
                                </div>

                                <a href="{{route('etkinlik_detay', $etikets->url)}}">
                                    <figcaption class="item-description">
                                        <h5>{{$etikets->title}}</h5>
                                    </figcaption>
                                </a>

                            </figure>
                        </div>
                    @endforeach

                    @else
                @foreach($event as $events)
                <div class="four columns portfolio-item media architecture technology">
                    <figure>
                        <div class="mediaholder">
                            <a href="{{route('etkinlik_detay', $events->url)}}">
                                <img style="width: 400px;height: 200px" alt="" src="{{asset("public/".$events->image)}}"/>
                                <div class="hovercover">
                                    <div class="hovericon"><i class="hoverlink"></i></div>
                                </div>
                            </a>
                        </div>

                        <a href="{{route('etkinlik_detay', $events->url)}}">
                            <figcaption class="item-description">
                                <h5>{{$events->title}}</h5>
                            </figcaption>
                        </a>

                    </figure>
                </div>
            @endforeach
@endif


            </div>
            <!-- Portfolio Wrapper / End -->

        </div>
        <!-- Container / End -->


    </div>
    <!-- Content Wrapper / End -->


@endsection
