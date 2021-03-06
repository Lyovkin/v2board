<!DOCTYPE HTML>
<html class="no-js">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Халява - @yield('title')</title>
    <meta property="og:title" content="@yield('og_title')" />
    <meta property="og:description" content="@yield('og_description')" />
    <meta property="og:image" content="@yield('og_image')" />
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
      ================================================== -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
      ================================================== -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="/css/all.css" rel="stylesheet" type="text/css">

    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen"/><![endif]-->
<style>
    .morecontent span {
        display: none;
    }
    .morelink {
        display: block;
    }
</style>

</head>
<body class="home">

<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
    experience this site.</p>
<![endif]-->
<div class="body">
    <!-- Start Site Header -->
    <header class="site-header">
        <div class="top-header hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <ul class="horiz-nav pull-left">
                            <li class="dropdown"><a data-toggle="dropdown"><i class="fa fa-globe"></i> Город <b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Воркута</a></li>
                                    <li><a href="">Инта</a></li>
                                </ul>
                            </li>
                            @if(Auth::guest())
                                <li><a href="{{ url('auth/login') }}" ><i class="fa fa-user"></i> Вход </a>

                                </li>
                                <li><a href="{{ url('auth/register') }}"><i class="fa fa-check-circle"></i> Регистрация</a></li>
                            @else
                                <li ><a href="{{ url('profile') }}" ><i class="fa fa-user"></i> Мой профиль</a></li>
                                <li> <a href="/auth/logout"><i class="fa fa-lock"></i></i> Выход</a></li>
                            @endif
                        </ul>
                    </div>
                    <!---

                    <div class="col-md-8 col-sm-6">
                    <ul class="horiz-nav pull-right">
                    <li><a href="http://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="http://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="http://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                    -->

                </div>
            </div>
        </div>
        <div class="middle-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 col-xs-8">
                        <h1 class="logo"><a href="/"><img src="/img/logo/logo150x60.png" alt="Logo">ХаЛяВа -
                                "Воркута"</a>
                        </h1>
                    </div>
                    <div class="col-md-6 col-sm-4 col-xs-4">
                        <div class="contact-info-blocks hidden-sm hidden-xs">

                            <ul class="horiz-nav-icons">

                                <li>
                                    <a href="http://instagram.com" target="_blank">
                                        <img src="/images/social/VK.png" width="30">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://instagram.com" target="_blank">
                                        <img src="/images/social/FB.png" width="30">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://instagram.com" target="_blank">
                                        <img src="/images/social/ya.png" width="30">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://instagram.com" target="_blank">
                                        <img src="/images/social/Twitter.png" width="30">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://instagram.com" target="_blank">
                                        <img src="/images/social/Odnoklasniki.png" width="30">
                                    </a>
                                </li>
                                <li>
                                    <a href="http://instagram.com" target="_blank">
                                        <img src="/images/social/G.png" width="30">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navigation">
                            <ul class="">

                                <li>
                                    @if (Auth::guest())
                                        <a href="/">
                                            @else
                                                <a href="/">
                                                    @endif
                                                    <i class="fa fa-home"></i> Главная</a>
                                                <!-- <ul class="dropdown">
                                                    <li><a href="index.html">Version 1</a></li>
                                                    <li><a href="index1.html">Version 2</a></li>
                                                </ul>
                                                 -->
                                </li>

                                <li><a href="/questions"><i class="fa fa-question"></i> Вопросы</a>
                                    <!-- <ul class="dropdown">
                                        <li><a href="index.html">Version 1</a></li>
                                        <li><a href="index1.html">Version 2</a></li>
                                    </ul>
                                     -->
                                </li>
                                <li><a href="/categories"><i class="fa fa-list"></i> Категории</a>
                                    <!-- <ul class="dropdown">
                                        <li><a href="index.html">Version 1</a></li>
                                        <li><a href="index1.html">Version 2</a></li>
                                    </ul>
                                     -->
                                </li>
                                <li><a href="/news"><i class="fa fa-comment"></i> Новости</a>
                                    <!-- <ul class="dropdown">
                                        <li><a href="index.html">Version 1</a></li>
                                        <li><a href="index1.html">Version 2</a></li>
                                    </ul>
                                     -->
                                </li>
                                <li><a href="/about"><i class="fa fa-fax"></i> О нас</a>
                                    <!-- <ul class="dropdown">
                                        <li><a href="index.html">Version 1</a></li>
                                        <li><a href="index1.html">Version 2</a></li>
                                    </ul>
                                     -->
                                </li>
                                <li><a href="/contacts"><i class="fa fa-envelope-o"></i></i> Контакты</a>
                                    <!-- <ul class="dropdown">
                                        <li><a href="index.html">Version 1</a></li>
                                        <li><a href="index1.html">Version 2</a></li>
                                    </ul>
                                     -->
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Site Header -->
    @if(Request::is('/'))
        @include('slider.slider')
    @else
        @include('layoutBlocks.pageHead')
    @endif




    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">

                    <!-- Start Sidebar -->
                    @include('layoutBlocks.aside')

                    @yield('content')

                </div>
            </div>
        </div>
    </div>


    <!-- Banner -->
    @include('layoutBlocks.footer')
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

</div>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>


<script src="/js/handlebars.min.js"></script>

<script src="/js/app.js"></script>
<!-- Jquery Library Call -->
<script src="/plugins/prettyphoto/js/prettyPhoto.js"></script>
<!-- PrettyPhoto Plugin -->
<script src="/plugins/owl-carousel/js/owl.carousel.min.js"></script>
<!-- Owl Carousel -->
<script src="/plugins/flexslider/js/jquery.flexslider.js"></script>
<!-- FlexSlider -->
<script src="/js/helper-plugins.js"></script>
<!-- Plugins -->
<script src="/js/bootstrap.js"></script>
<!-- UI -->
<script src="/js/waypoints.js"></script>
<!-- Waypoints -->
<script src="/js/init.js"></script>

<script src="/upload/js/jquery.knob.js"></script>

<script src="/upload/js/jquery.ui.widget.js"></script>
<script src="/upload/js/jquery.iframe-transport.js"></script>
<script src="/upload/js/jquery.fileupload.js"></script>


<!-- main JS file -->
<script src="/upload/js/script.js"></script>
<script src="/js/ads.js"></script>
<script src="/js/nottifications.js"></script>

<script src="{{ asset('js/components.js') }}"></script>
<script src="{{ asset('js/shop.js') }}"></script>

<!-- All Scripts -->
<!--[if lte IE 9]>
<script src="/js/script_ie.js"></script><![endif]-->
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $("a[rel^='prettyPhoto']").prettyPhoto({});


    });
</script>
<script>
    $(document).ready(function() {
        // Configure/customize these variables.
        var showChar = 300;  // How many characters are shown by default
        var ellipsestext = "...";
        var moretext = "Читать далее >>>";
        var lesstext = "Свернуть <<<";


        $('.more').each(function() {
            var content = $(this).html();

            if(content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function(){
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });
</script>
@yield('js')
</body>
</html>
