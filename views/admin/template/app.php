<?php use App\Core\Application; ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../assets/admin/img/basic/favicon.ico" type="image/x-icon">
    <title>{% yield title %}</title>

    <style>.loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .theme-dark .height-full {
            background: #212121;
            min-height: 100vh;
        }
    </style>


    <!-- CSS -->
    <link rel="stylesheet" href="../assets/admin/css/app.css">
    

    {% yield pushInHead %}

    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="theme-dark">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<script>
    /*
     *  Add sidebar classes (sidebar-mini sidebar-collapse sidebar-expanded-on-hover) in body tag
     *  you can remove this script tag and add classes directly to body
     *  this is only for demo
     */
    document.body.className += ' sidebar-mini' + ' sidebar-collapse' + ' sidebar-expanded-on-hover' + ' sidebar-top-offset';
</script>

<!-- Side Bar -->
{% extends admin/template/partials/sidebar %}

<!--Sidebar End-->
<div class="sticky">
    <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white b-b">
        <div class="relative">
            <div class="d-flex">
                <div>
                    <a href="panel-page-dashboard7.html#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                        <i></i>
                    </a>
                </div>
                <ul class="nav responsive-tab nav-material nav-material-white mt-1 ml-3" id="v-pills-tab">
                    <li>
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="panel-page-dashboard7.html#v-pills-1">
                            <i class="mr-3 icon-code2"></i>Data Analysis</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="panel-page-dashboard7.html#v-pills-2"><i
                                class="icon icon-plus-circle mb-3"></i>Yesterday</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="panel-page-dashboard7.html#v-pills-3"><i
                                class="icon icon-calendar"></i>By Date</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--Top Menu Start -->
        <div class="navbar-custom-menu d-flex align-items-center">
            <ul class="nav navbar-nav">
                <!-- Messages-->
                <li class="dropdown custom-dropdown messages-menu">
                    <a href="panel-page-dashboard7.html#" class="nav-link pl-lg-3 pr-lg-3 b-l" data-toggle="dropdown">
                        <i class="icon-message "></i>
                        <span class="badge badge-success badge-mini rounded-circle">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu pl-2 pr-2">
                                <!-- start message -->
                                <li>
                                    <a href="panel-page-dashboard7.html#">
                                        <div class="avatar float-left">
                                            <img src="../assets/admin/img/dummy/u4.png" alt="">
                                            <span class="avatar-badge busy"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="panel-page-dashboard7.html#">
                                        <div class="avatar float-left">
                                            <img src="../assets/admin/img/dummy/u1.png" alt="">
                                            <span class="avatar-badge online"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="panel-page-dashboard7.html#">
                                        <div class="avatar float-left">
                                            <img src="../assets/admin/img/dummy/u2.png" alt="">
                                            <span class="avatar-badge idle"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <!-- start message -->
                                <li>
                                    <a href="panel-page-dashboard7.html#">
                                        <div class="avatar float-left">
                                            <img src="../assets/admin/img/dummy/u3.png" alt="">
                                            <span class="avatar-badge busy"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer s-12 p-2 text-center"><a href="panel-page-dashboard7.html#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Notifications -->
                <li class="dropdown custom-dropdown notifications-menu">
                    <a href="panel-page-dashboard7.html#" class="nav-link  b-r b-l pl-lg-3 pr-lg-3" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-notifications "></i>
                        <span class="badge badge-danger badge-mini rounded-circle">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="panel-page-dashboard7.html#">
                                        <i class="icon icon-data_usage text-success"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="panel-page-dashboard7.html#">
                                        <i class="icon icon-data_usage text-danger"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="panel-page-dashboard7.html#">
                                        <i class="icon icon-data_usage text-yellow"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer p-2 text-center"><a href="panel-page-dashboard7.html#">View all</a></li>
                    </ul>
                </li>

            </ul>
            <!-- Button -->
            <div>
                <a href="panel-page-dashboard7.html#" class="btn btn-primary btn-sm ml-3 d-none d-sm-block">Add New Project</a>
            </div>
        </div>

    </div>
</div>
<div class="page has-sidebar-left height-full">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
        {% yield content %}
    </div>
</div>
<!-- Right Sidebar -->
<aside class="control-sidebar fixed white ">
    <div class="slimScroll">
        <div class="sidebar-header">
            <h4>Activity List</h4>
            <a href="panel-page-dashboard7.html#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="p-3">
            <div>
                <div class="my-3">
                    <small>25% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>45% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 45%;" aria-valuenow="45"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>60% Complete</small>
                    `
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>75% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>100% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 bg-primary text-white">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="font-weight-normal s-14">Sodium</h5>
                    <span class="font-weight-lighter text-primary">Spark Bar</span>
                    <div> Oxygen
                        <span class="text-primary">
                                                    <i class="icon icon-arrow_downward"></i> 67%</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <canvas width="100" height="70" data-chart="spark" data-chart-type="bar"
                            data-dataset="[[28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100]]"
                            data-labels="['a','b','c','d','e','f','g','h','i','j','k','l','m','n','a','b','c','d','e','f','g','h','i','j','k','l','m','n']">
                    </canvas>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                <tbody>
                <tr>
                    <td>
                        <a href="panel-page-dashboard7.html#">INV-281281</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 1228.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="panel-page-dashboard7.html#">INV-01112</a>
                    </td>
                    <td>
                        <span class="badge badge-warning">Overdue</span>
                    </td>
                    <td>$ 5685.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="panel-page-dashboard7.html#">INV-281012</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 152.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="panel-page-dashboard7.html#">INV-01112</a>
                    </td>
                    <td>
                        <span class="badge badge-warning">Overdue</span>
                    </td>
                    <td>$ 5685.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="panel-page-dashboard7.html#">INV-281012</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 152.28</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="sidebar-header">
            <h4>Activity</h4>
            <a href="panel-page-dashboard7.html#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="p-4">
            <div class="activity-item activity-primary">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 5 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-danger">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 8 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit ametcon the sectetur that ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-success">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 10 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet cons the ecte tur and adip ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-warning">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 12 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet consec tetur adip ascing elit users.</p>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="../assets/admin/js/app.js"></script>




<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>

{% yield pushInEnd %}
</body>
</html>