<!DOCTYPE html>
<html lang="en">
<head>

    <title>{% yield title %}</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Main Font -->
    <script src="../public/assets/user/js/libs/webfontloader.min.js"></script>

    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../public/assets/user/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/user/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/user/Bootstrap/dist/css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/user/bootstrap4-glyphicons/css/bootstrap-glyphicons.min.css">


    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="../public/assets/user/css/main.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/user/css/fonts.min.css">
    <!--PNotify-->
    <link rel="stylesheet" type="text/css" href="../public/assets/user/plugins/pnotify/pnotify.custom.css">



    <link rel="stylesheet" type="text/css" href="../public/assets/user/plugins/animate-css/animate.css">
    
    <link rel="stylesheet" type="text/css" href="../public/assets/user/css/custom.css">

    {% yield pushInHead %}
</head>

<body class="landing-page">


<!-- Preloader -->
<div id="hellopreloader">
    <div class="preloader">
        <svg width="45" height="45" stroke="#fff">
            <g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
                <circle cx="22" cy="22" r="6" stroke="none">
                    <animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
                    <animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
                    <animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
                </circle>
                <circle cx="22" cy="22" r="6" stroke="none">
                    <animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
                    <animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
                    <animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
                </circle>
                <circle cx="22" cy="22" r="8">
                    <animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite" values="6;1;2;3;4;5;6"/>
                </circle>
            </g>
        </svg>

        <div class="text">Loading ...</div>
    </div>
</div>

<!-- ... end Preloader -->
<div class="content-bg-wrap"></div>


<!-- Header Standard Landing  -->

<div class="header--standard header--standard-landing" id="header--standard">
    {% yield content %}
</div>

<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard"></div>

<div class="container">
    <div class="row display-flex">
        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="landing-content">
                <h1>Welcome to the Biggest Social Network in the World</h1>
                <p>We are the best and biggest social network with 5 billion active users all around the world. Share you
                    thoughts, write blog posts, show your favourite music via Stopify, earn badges and much more!
                </p>
                <a href="register" class="btn btn-md btn-border c-white">Register Now!</a>
            </div>
        </div>

        <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
            
            <!-- Login-Registration Form  -->
            
            <div class="registration-login-form">
                <!-- Nav tabs -->
                
            
                <!-- Tab panes -->
                {% yield formarea %}

            </div>
            
            <!-- ... end Login-Registration Form  -->       </div>
    </div>
</div>

<!-- Window-popup Restore Password -->

<div class="modal fade" id="restore-password" tabindex="-1" role="dialog" aria-labelledby="restore-password" aria-hidden="true">
    <div class="modal-dialog window-popup restore-password-popup" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Restore your Password</h6>
            </div>

            <div class="modal-body">
                <form  method="get">
                    <p>Enter your email and click the send code button. You’ll receive a code in your email. Please use that
                        code below to change the old password for a new one.
                    </p>
                    <div class="form-group label-floating">
                        <label class="control-label">Your Email</label>
                        <input class="form-control" placeholder="" type="email" value="james-spiegel@yourmail.com">
                    </div>
                    <button class="btn btn-purple btn-lg full-width">Send me the Code</button>
                    <div class="form-group label-floating">
                        <label class="control-label">Enter the Code</label>
                        <input class="form-control" placeholder="" type="text" value="">
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Your New Password</label>
                        <input class="form-control" placeholder="" type="password" value="olympus">
                    </div>
                    <button class="btn btn-primary btn-lg full-width">Change your Password!</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- ... end Window-popup Restore Password -->


<!-- Window Popup Main Search -->

<div class="modal fade" id="main-popup-search" tabindex="-1" role="dialog" aria-labelledby="main-popup-search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>
            <div class="modal-body">
                <form class="form-inline search-form" method="post">
                    <div class="form-group label-floating">
                        <label class="control-label">What are you looking for?</label>
                        <input class="form-control bg-white" placeholder="" type="text" value="">
                    </div>

                    <button class="btn btn-purple btn-lg">Search</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ... end Window Popup Main Search -->

<!-- JS Scripts -->
<script src="../public/assets/user/js/jQuery/jquery-3.4.1.js"></script>

<sctipt src="../public/assets/user/plugins/animate-css/animate.js"></sctipt>
 <!-- <sctipt src="../public/assets/user/plugins/common-ajax/common-ajax.js"></sctipt> -->
<script src="../public/assets/admin/plugins/common-ajax/common-ajax.js"></script> 

 <script src="../public/assets/user/js/libs/jquery.appear.js"></script>
<script src="../public/assets/user/js/libs/jquery.mousewheel.js"></script>
<script src="../public/assets/user/js/libs/perfect-scrollbar.js"></script>
<script src="../public/assets/user/js/libs/jquery.matchHeight.js"></script>
<script src="../public/assets/user/js/libs/svgxuse.js"></script>
<script src="../public/assets/user/js/libs/imagesloaded.pkgd.js"></script>
<script src="../public/assets/user/js/libs/Headroom.js"></script>
<script src="../public/assets/user/js/libs/velocity.js"></script>
<script src="../public/assets/user/js/libs/ScrollMagic.js"></script>
<script src="../public/assets/user/js/libs/jquery.waypoints.js"></script>
<script src="../public/assets/user/js/libs/jquery.countTo.js"></script>
<script src="../public/assets/user/js/libs/popper.min.js"></script>
<script src="../public/assets/user/js/libs/material.min.js"></script>
<script src="../public/assets/user/js/libs/bootstrap-select.js"></script>
<script src="../public/assets/user/js/libs/smooth-scroll.js"></script>
<script src="../public/assets/user/js/libs/selectize.js"></script>
<script src="../public/assets/user/js/libs/swiper.jquery.js"></script>
<script src="../public/assets/user/js/libs/moment.js"></script>
<script src="../public/assets/user/js/libs/daterangepicker.js"></script>
<script src="../public/assets/user/js/libs/fullcalendar.js"></script>
<script src="../public/assets/user/js/libs/isotope.pkgd.js"></script>
<script src="../public/assets/user/js/libs/ajax-pagination.js"></script>
<script src="../public/assets/user/js/libs/Chart.js"></script>
<script src="../public/assets/user/js/libs/chartjs-plugin-deferred.js"></script>
<script src="../public/assets/user/js/libs/circle-progress.js"></script>
<script src="../public/assets/user/js/libs/loader.js"></script>
<script src="../public/assets/user/js/libs/run-chart.js"></script>
<script src="../public/assets/user/js/libs/jquery.magnific-popup.js"></script>
<script src="../public/assets/user/js/libs/jquery.gifplayer.js"></script>
<script src="../public/assets/user/js/libs/mediaelement-and-player.js"></script>
<script src="../public/assets/user/js/libs/mediaelement-playlist-plugin.min.js"></script>
<script src="../public/assets/user/js/libs/ion.rangeSlider.js"></script>
<script src="../public/assets/user/js/libs/leaflet.js"></script>
<script src="../public/assets/user/js/libs/MarkerClusterGroup.js"></script> -->

<script src="../public/assets/user/js/main.js"></script>
<script src="../public/assets/user/js/libs-init/libs-init.js"></script>
<script defer src="../public/assets/user/fonts/fontawesome-all.js"></script>
<!--PNotify-->
<script src="../public/assets/user/plugins/pnotify/pnotify.custom.js"></script>

<script src="../public/assets/user/Bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="../public/assets/user/js/custom.js"></script>


{% yield pushInEnd %}

</body>
</html>