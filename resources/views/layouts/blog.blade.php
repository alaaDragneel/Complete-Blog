<!DOCTYPE html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title> {{ $settings->site_name }} - @yield('title', 'Home Page') </title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/crumina-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/grid.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/primary-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/magnific-popup.css') }}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="{{ asset('/css/rtl.css') }}">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <style>
        .padded-50 {
            padding: 40px;
        }

        .text-center {
            text-align: center;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }
    </style>

</head>


<body class=" ">
    
    <div class="content-wrapper">
        @include('includes.header', ['settings' => $settings])
        
        @yield('content')
        
        <!-- Subscribe Form -->

        <div class="container-fluid bg-green-color">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="subscribe scrollme">
                            <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                                <h4 class="subscribe-title">Email Newsletters!</h4>
                                <form class="subscribe-form" method="post" action="">
                                    <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                                    <button class="subscr-btn">subscribe
                                        <span class="semicircle--right"></span>
                                    </button>
                                </form>
                                <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

                            </div>

                            <div class="images-block">
                                <img src="{{ asset('/img/subscr-gear.png') }}" alt="gear" class="gear">
                                <img src="{{ asset('/img/subscr1.png') }}" alt="mail" class="mail">
                                <img src="{{ asset('/img/subscr-mailopen.png') }}" alt="mail" class="mail-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Subscribe Form -->
    </div>

    @include('includes.footer', ['settings' => $settings])
    
    
    @include('includes.svg-controls')
   
    @include('includes.search-overlay')
   

    <!-- JS Script -->

    <script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/crum-mega-menu.js') }}"></script>
    <script src="{{ asset('/js/swiper.jquery.min.js') }}"></script>
    <script src="{{ asset('/js/theme-plugins.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    {{--
    <script src="{{ asset('/js/form-actions.js') }}"></script> --}}

    <script src="{{ asset('/js/velocity.min.js') }}"></script>
    <script src="{{ asset('/js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('/js/animation.velocity.min.js') }}"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b58a0d012d859d2"></script>
    <!-- ...end JS Script -->

</body>

</html>