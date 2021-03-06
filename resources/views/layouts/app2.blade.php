<!DOCTYPE HTML>
<html class="no-js">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Халява -  @yield('title')</title>
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
    <link href="{{ asset('css/zaweb.css') }}" rel="stylesheet" type="text/css"/>
    @yield('css')

<style>
    .morecontent span {
        display: none;
    }
    .morelink {
        display: block;
    }
    .property-block{
        border: 2px solid #E68080;
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
                           {{-- <li class="dropdown"><a data-toggle="dropdown"><i class="fa fa-globe"></i> Город <b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">Воркута</a></li>
                                    <li><a href="">Инта</a></li>
                                </ul>
                            </li>--}}
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
                                "hlv24.ru"</a>
                        </h1>
                    </div>
                    <div class="pluso" style="margin: 4px; margin-top: 21px;" data-background="transparent" data-options="medium,square,line,horizontal,counter,theme=07" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
                    {{--<div class="col-md-6 col-sm-4 col-xs-4">--}}
                        <div class="contact-info-blocks hidden-sm hidden-xs">

                           {{-- <ul class="horiz-nav-icons">

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
                        </div>--}}
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
                                @foreach($items as $item)
                                    @if(Auth::guest() && $item->link == '/')
                                        <li><a href="/auth/login"> {{$item->name}}</a></li>
                                    @else
                                        <li><a href="{{ $item->link }}"> {{$item->name}}</a></li>
                                    @endif
                                @endforeach

                                    <li><a href="/services">Услуги</a></li>
                                    <li><a href="/rules">Правила</a></li>
                                    <li><a href="/about">О проекте</a></li>
                                    <li><a href="/faq">FAQ</a></li>
                                    <li><a href="/contacts">Контакты</a></li>
                                <li><a href="javascript:jivo_api.open();">Cвязаться</a></li>
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

                    @yield('content')

                </div>
            </div>
        </div>
    </div>


    <!-- Banner -->
    @include('layoutBlocks.footer')
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Загрузка завершена</h4>
            </div>
            <div class="modal-body">
                <p>Данные загружены.</p>
                <p>Вы можете перейти к магазинам и отредактировать созданные товары, или остаться и продолжать загружать товары.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Остаться</button>
                <a href="{{ url("/shops/my") }}" type="button" class="btn btn-primary">Перейти к магазинам</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">(function() {
        if (window.pluso)if (typeof window.pluso.start == "function") return;
        if (window.ifpluso==undefined) { window.ifpluso = 1;
            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
            s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
            s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
            var h=d[g]('body')[0];
            h.appendChild(s);
        }})();
</script>
<script src="{{ asset('js/components.js') }}"></script>

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

<script src="/js/readmore.min.js"></script>

<script src="{{ asset('js/shop.js') }}"></script>

<!-- All Scripts -->
<!--[if lte IE 9]>
<script src="/js/script_ie.js"></script><![endif]-->
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $("a[rel^='prettyPhoto']").prettyPhoto({});
    });
</script>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'esl0GxVhzv';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!--{/literal} END JIVOSITE CODE -->

@yield('js')
</body>
</html>
