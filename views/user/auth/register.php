{% extends user/template/app-outside %}

{% block title %}Register{% endblock %}

{% block pushInHead %}
    <style type="text/css">
        #email-msg,#accept-privacy-msg{display: none;}
    </style>
{% endblock %}

{% block content %}
<div class="container">
    <div class="header--standard-wrap">

        <a href="#" class="logo">
            <div class="img-wrap">
                <img src="../assets/user/img/logo.png" alt="Olympus 007">
                <img src="../assets/user/img/logo-colored-small.png" alt="Olympus" class="logo-colored">
            </div>
            <div class="title-block">
                <h6 class="logo-title">olympus</h6>
                <div class="sub-title">SOCIAL NETWORK</div>
            </div>
        </a>

        <a href="#" class="open-responsive-menu js-open-responsive-menu">
            <svg class="olymp-menu-icon"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
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
                        <svg class="olymp-close-icon"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                    </li>
                    <li class="nav-item js-expanded-menu">
                        <a href="#" class="nav-link">
                            <svg class="olymp-menu-icon"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                            <svg class="olymp-close-icon"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        </a>
                    </li>
                    <li class="shoping-cart more">
                        <a href="#" class="nav-link">
                            <svg class="olymp-shopping-bag-icon"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-shopping-bag-icon"></use></svg>
                            <span class="count-product">2</span>
                        </a>
                        <div class="more-dropdown shop-popup-cart">
                            <ul>
                                <li class="cart-product-item">
                                    <div class="product-thumb">
                                        <img src="assets/user/img/product1.png" alt="product">
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
                                        <svg class="olymp-little-delete"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                    </div>
                                </li>
                                <li class="cart-product-item">
                                    <div class="product-thumb">
                                        <img src="assets/user/img/product2.png" alt="product">
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
                                        <svg class="olymp-little-delete"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
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
                            <svg class="olymp-magnifying-glass-icon"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
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
        <li class="nav-item active">
            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                <svg class="olymp-register-icon"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-register-icon"></use></svg>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
            <div class="title h6">Register to Olympus</div>
            <form id="signupForm" class="content" action="register" method="post">
                <div class="row">
                    <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">First Name</label>
                            <input name="first_name" class="form-control" placeholder="" type="text">
                        </div>
                    </div>
                    <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Last Name</label>
                            <input name="last_name" class="form-control" placeholder="" type="text">
                        </div>
                    </div>
                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Your Email</label>
                            <input name="email" class="form-control" placeholder="" type="email">
                            <span id="email-msg" class="text-danger">This email already registered</span>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Your Password</label>
                            <input name="password" class="form-control" placeholder="" type="password">
                        </div>

                        <div class="form-group date-time-picker label-floating">
                            <label class="control-label">Your Birthday</label>
                            <input name="datetimepicker" value="10/24/1984" />
                            <span class="input-group-addon">
                                <svg class="olymp-calendar-icon"><use xlink:href="../assets/user/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
                            </span>
                        </div>

                        <div class="form-group label-floating is-select">
                            <label class="control-label">Your Gender</label>
                            <select name="gender" class="selectpicker form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="remember">
                            <div class="checkbox">
                                <label>
                                    <input name="acceptterms" type="checkbox">
                                    I accept the <a href="#">Terms and Conditions</a> of the website.
                                </label>
                                <br>
                                <small>Already I have an account. </small><a href="login">Click To Login</a>
                            </div><br>
                            <span id="accept-privacy-msg" class="text-danger">You must be accepts Terms and Conditions</span>


                        </div>

                        <button type="button" id="signupBtn" data-loading="<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>" data-btnid="signupBtn" data-form="signupForm" data-validator="true" data-callback="signupCallback" class="btn btn-purple btn-lg full-width" onclick="_run(this)">Complete Registration!</button>
                     
                    </div>
                </div>
            </form>
        </div>
    </div>
    {% endblock %}

{% block pushInEnd %}
  


  <script>

   

    function signupCallback(data){
        $('#signupBtn').prop('disabled', true);
        $('#email-msg').hide();
        $('#accept-privacy-msg').hide();


        if(data.success){
            $('#signupBtn').prop('disabled', false);
            notify('success', data.message);
           
            $('#signupForm')[0].reset();

            setTimeout(function(){
                window.location.href = 'login';
            }, 2000);

        }else{
            $('#signupBtn').prop('disabled', false);
            notify('error', data.message);
            $._validator("signupForm", data.errors);

            if(data.mailexists){
                $('#email-msg').show();
            }

            if(data.privacyacceptserror){
                $('#accept-privacy-msg').show();
            }
        }
    }

  </script>
 
{% endblock %}