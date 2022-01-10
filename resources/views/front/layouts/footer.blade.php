<?php $ayarlar = DB::table('ayarlar')->first();
$sosyal = DB::table('sosyal_medya')->first();
$iletisim = DB::table('iletisim')->first();
?>
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
<!-- Footer
================================================== -->
<div id="footer">

    <!-- Container -->
    <div class="container">

        <div class="four columns">
            <h3>Hakkımızda</h3>
            <p style="margin:0;">{{$ayarlar->footer_hakkimizda}}</p>
        </div>

        <div class="four columns">
            <h3>Twitter</h3>

            <ul id="twitter"></ul>
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    $.getJSON('twitter.php?url='+encodeURIComponent('statuses/user_timeline.json?screen_name={{$sosyal->twitter}}&count=1'), function(tweets){
                        $("#twitter").html(tz_format_twitter(tweets));
                    }); });
            </script>
            <div class="clearfix"></div>

            <a href="https://twitter.com/{{$sosyal->twitter}}" class="twitter-follow-button" data-show-count="false" data-dnt="true">Takip et {{$sosyal->twitter}}</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

        </div>

        <div class="four columns">
            <h3>İletişim</h3>
            <ul class="get-in-touch">
                <li ><i class="icon-map-marker"></i> <p><strong>Adres:</strong> {{$iletisim->adres}}</p></li>
                @if($iletisim->tel_1)
                    <a href="tel:{{$iletisim->tel_1}}" ><li><i class="icon-user"></i> <p><strong>Tel:</strong> {{$iletisim->tel_1}}</p></li></a>
                    @endif
                @if($iletisim->tel_2)
                    <a href="tel:{{$iletisim->tel_2}}" ><li><i class="icon-user"></i> <p><strong>Tel:</strong> {{$iletisim->tel_2}}</p></li></a>
                @endif
                @if($iletisim->tel_3)
                    <a href="tel:{{$iletisim->tel_3}}" ><li><i class="icon-user"></i> <p><strong>Tel:</strong> {{$iletisim->tel_3}}</p></li></a>
                @endif
                @if($iletisim->email_1)
                    <a href="mailto:{{$iletisim->email_1}}" >  <li><i class="icon-envelope-alt"></i> <p><strong>E-posta:</strong> <a href="#">{{$iletisim->email_1}}</a></p></li></a>
                    @endif
                @if($iletisim->email_2)
                    <a href="mailto:{{$iletisim->email_2}}" >  <li><i class="icon-envelope-alt"></i> <p><strong>E-posta:</strong> <a href="#">{{$iletisim->email_1}}</a></p></li></a>
                @endif
            </ul>
        </div>

        <div class="four columns">
            <h3>Sosyal Medya</h3>
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
        </div>

    </div>
    <!-- Container / End -->

</div>
<!-- Footer / End -->

<!-- Footer Bottom / Start -->
<div id="footer-bottom">

    <!-- Container -->
    <div class="container">

        <div class="eight columns">{{$ayarlar->footer_text}}</div>


    </div>
    <!-- Container / End -->

</div>
<!-- Footer Bottom / Start -->


<!-- Style Switcher
================================================== -->
<link rel="stylesheet" href="{{asset('/public/front/css/switcher.css')}}">
<script src="{{asset('/public/front/scripts/switcher.js')}}"></script>
<script src="{{asset('/public/back/assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('/public/back/assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('/public/back/assets/js/general-widget.js')}}"></script>



@yield('js')

<!-- Style Switcher / End -->

<script>
    $(document).ready( function() {

        $(".colors li").click(function() {
            var color = $(this).css("background-color");
            $(".tag").css("background-color",color);
            $("#title").css("color",color);
        });

    });
</script>
</body>
</html>
