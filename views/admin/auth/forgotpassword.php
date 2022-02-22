{% extends admin/template/app-outside %}

{% block title %}{{ $title }}{% endblock %}

{% block content %}
<div id="primary" class="black p-t-b-100 height-full responsive-phone">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/img/icon/icon-plane.png" alt="">
                </div>

                <div class="col-lg-6 p-t-100">
                    <div class="text-danger">
                        <h1>Forgot Password!</h1>
                        <p class="s-18 p-t-b-20 font-weight-lighter">Write Your Email Address Where We Sent you Reset Password link</p>
                    </div>

                    <form id="forgo_form" action="forgot-password" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                    <input type="text" name="email" class="form-control form-control-lg no-b" value="" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button id="forgotbtn" onclick="_run(this)" data-form="forgo_form" data-loading="Sending...." data-btnid="forgotbtn" data-callback="forgotCallBack" data-validator="true" type="button" name="submit" class="btn btn-success btn-lg btn-block">Send Link</button>
                            </div>
                        </div>
                    </form><br>
                    <h5>Remembered Your Password?<a class="text-success" href="login"> Back to login page</a></h5>
                </div>

            </div>
        </div>
    </div>
{% endblock %}

{% block pushInEnd %}

{% endblock %}