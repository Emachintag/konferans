<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>viho - Premium Admin Template</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/sweetalert2.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('/public/back/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('/public/back/assets/css/responsive.css')}}">
</head>
<body>
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<section>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <form method="post" action="{{route('signup_post')}}" autocomplete="off" enctype="multipart/form-data" class="theme-form login-form">
                        @csrf
                        <h4>Yeni Hesap Oluştur</h4>
                        <h6>Kaydolmak için aşağıdaki bilgileri doldurunuz.</h6>
                        <div class="form-group">
                            <label>Kullanıcı bilgileri</label>
                            <div class="small-group">
                                <div class="input-group"><span class="input-group-text"><i
                                            data-feather="user"></i></span>
                                    <input name="name" class="form-control" type="text" required="" placeholder="Ad">
                                </div>
                                <div class="input-group"><span class="input-group-text"><i
                                            data-feather="user"></i></span>
                                    <input name="last_name" class="form-control" type="text" required="" placeholder="Soyad">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>E-posta</label>
                            <div class="input-group"><span class="input-group-text"><i
                                        data-feather="mail"></i></span>
                                <input name="email" class="form-control" type="email" required="" placeholder="Test@gmail.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Şifre</label>
                            <div class="input-group"><span class="input-group-text"><i
                                        data-feather="lock"></i></span>
                                <input  class="form-control" type="password" name="password" required="" placeholder="*********">
                                <div class="show-hide"><span class="show">                         </span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Hesap Oluştur</button>
                        </div>
                        <div class="login-social-title">
                            <h5>Giriş Yap</h5>
                        </div>
                        <p>Hesabınız varsa giriş yapın.<a class="ms-2" href="{{route('login')}}">Giriş Yap</a> ve ya<a class="ms-2" href="{{route('anasayfa')}}">Anasayfa</a> Geri Dön</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-wrapper end-->
<!-- latest jquery-->
<script src="{{asset('/public/back/assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('/public/back/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('/public/back/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('/public/back/assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('/public/back/assets/js/config.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('/public/back/assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('/public/back/assets/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{asset('/public/back/assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('/public/back/assets/js/script.js')}}"></script>
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
