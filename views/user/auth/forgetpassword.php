{% extends user/template/app-outside %}

{% block title %}{{ $title }}{% endblock %}

{% block pushInHead %}
    <style type="text/css">
        .registration-login-form{min-height: auto;}

        #email-change-notification{display: none;}
        #email-change-notification strong{color:green;}
    </style>
{% endblock %}

    {% block content %}
    <div class="container">
        <div class="header--standard-wrap">

            <a href="#" class="logo">
                <div class="img-wrap">
                    <img src="../assets/user/img/logo.png" alt="Olympus">
                    <img src="../assets/user/img/logo-colored-small.png" alt="Olympus" class="logo-colored">
                </div>
                <div class="title-block">
                    <h6 class="logo-title">olympus</h6>
                    <div class="sub-title">SOCIAL NETWORK</div>
                </div>
            </a>

            <a href="#" class="open-responsive-menu js-open-responsive-menu">
                <svg class="olymp-menu-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
            </a>

            <div class="nav nav-pills nav1 header-menu">
                <div class="mCustomScrollbar">
                    <ul>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profile</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Profile Page</a>
                                <a class="dropdown-item" href="#">Newsfeed</a>
                                <a class="dropdown-item" href="#">Post Versions</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-has-megamenu">
                            <a href="#" class="nav-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Forums</a>
                            <div class="dropdown-menu megamenu">
                                <div class="row">
                                    <div class="col col-sm-3">
                                        <h6 class="column-tittle">Main Links</h6>
                                        <a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-blue-light">new</span></a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                    </div>
                                    <div class="col col-sm-3">
                                        <h6 class="column-tittle">BuddyPress</h6>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page<span class="tag-label bg-primary">HOT!</span></a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                    </div>
                                    <div class="col col-sm-3">
                                        <h6 class="column-tittle">Corporate</h6>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                    </div>
                                    <div class="col col-sm-3">
                                        <h6 class="column-tittle">Forums</h6>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                        <a class="dropdown-item" href="#">Profile Page</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Terms & Conditions</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Events</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Privacy Policy</a>
                        </li>
                        <li class="close-responsive-menu js-close-responsive-menu">
                            <svg class="olymp-close-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        </li>
                        <li class="nav-item js-expanded-menu">
                            <a href="#" class="nav-link">
                                <svg class="olymp-menu-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                                <svg class="olymp-close-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                            </a>
                        </li>
                        <li class="shoping-cart more">
                            <a href="#" class="nav-link">
                                <svg class="olymp-shopping-bag-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-shopping-bag-icon"></use></svg>
                                <span class="count-product">2</span>
                            </a>
                            <div class="more-dropdown shop-popup-cart">
                                <ul>
                                    <li class="cart-product-item">
                                        <div class="product-thumb">
                                            <img src="assets/img/product1.png" alt="product">
                                        </div>
                                        <div class="product-content">
                                            <h6 class="title">White Enamel Mug</h6>
                                            <ul class="rait-stars">
                                                <li>
                                                    <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                </li>
                                            </ul>
                                            <div class="counter">x2</div>
                                        </div>
                                        <div class="product-price">$20</div>
                                        <div class="more">
                                            <svg class="olymp-little-delete"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                        </div>
                                    </li>
                                    <li class="cart-product-item">
                                        <div class="product-thumb">
                                            <img src="assets/img/product2.png" alt="product">
                                        </div>
                                        <div class="product-content">
                                            <h6 class="title">Olympus Orange Shirt</h6>
                                            <ul class="rait-stars">
                                                <li>
                                                    <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                </li>

                                                <li>
                                                    <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                </li>
                                                <li>
                                                    <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                </li>
                                            </ul>
                                            <div class="counter">x1</div>
                                        </div>
                                        <div class="product-price">$40</div>
                                        <div class="more">
                                            <svg class="olymp-little-delete"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                        </div>
                                    </li>
                                </ul>

                                <div class="cart-subtotal">Cart Subtotal:<span>$80</span></div>

                                <div class="cart-btn-wrap">
                                    <a href="#" class="btn btn-primary btn-sm">Go to Your Cart</a>
                                    <a href="#" class="btn btn-purple btn-sm">Go to Checkout</a>
                                </div>
                            </div>
                        </li>

                        <li class="menu-search-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#main-popup-search">
                                <svg class="olymp-magnifying-glass-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {% endblock %}


    {% block formarea %}
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                <svg class="olymp-login-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-login-icon"></use></svg>
            </a>
        </li>
        
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
        <div class="title h6">Reset Your Password</div>
            <form action="resetPassword" id="resetPassForm" method="post" class="content">
                <div class="row" id="resetPassFormElements">
                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Your Email</label>
                            <input class="form-control" placeholder="" name="email" type="email">
                        </div>
                        
                        <button type="button" id="resetPassBtn" data-loading="<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>" data-btnid="resetPassBtn" data-form="resetPassForm" data-validator="true" data-callback="loginCallback" class="btn btn-lg btn-primary full-width" onclick="_run(this)">Send Password Reset LInk</button>

                        <div class="or"></div>

                        <p>Don’t you have an account? <a href="register">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p>
                    </div>
                </div>

                <!-- Display Notifications -->
                <div class="row" id="email-change-notification">
                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p>Password reset link and instractions sent mail to <strong></strong>. Please check your email </p>
                    </div>
                </div>


            </form>
        </div>

       
    </div>
    {% endblock %}

{% block pushInEnd %}
   <script>
    function loginCallback(data){
        $('#resetPassBtn').prop('disabled', true);


        if(data.success){
            $('#resetPassBtn').prop('disabled', false);
            notify('success', data.message);
            $('#resetPassFormElements').hide();

            $('#email-change-notification strong').text(data.email);
            $('#email-change-notification').show();
            
        }else{
            $('#resetPassBtn').prop('disabled', false);
            notify('error', data.message);
            $._validator("forgetPassForm", data.errors);
        }
    }
   </script>
{% endblock %}