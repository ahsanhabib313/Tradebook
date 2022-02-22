{% extends admin/template/app-outside %}

{% block title %}Login{% endblock %}

{% block content %}
<div id="primary" class="black p-t-b-100 height-full responsive-phone">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mx-md-auto paper-card r-5">

                <div class="text-center">
                    <img src="assets/img/dummy/u4.png" alt="">
                    <h3 class="mt-2">Admin Login</h3><br>
                </div>

                <form id="login_form" action="login" method="post">
                    <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                        <input type="text" name="email" class="form-control form-control-lg" value="" placeholder="Email Address">
                    </div>

                    <div class="form-group has-icon"><i class="icon-user-secret"></i>
                        <input type="password" name="password" class="form-control form-control-lg" value="" placeholder="Password">
                    </div>

                    <button id="loginBtn" onclick="_run(this)" data-form="login_form" data-loading="Loading...." data-btnid="loginBtn" data-callback="loginCallBack" data-validator="true" type="button" name="submit" class="btn btn-success btn-lg btn-block">Login</button><br>
                    <center>
                        <p><a class="text-danger" href="forgotpass">Have you forgot your password?</a></p>
                    </center>
                </form>

            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block pushInEnd %}
    <script type="text/javascript">
        function loginCallBack(data){
            $('#loginBtn').prop('disabled', false);
            if(data.success){
                window.location.href = "dashboard";
            }
        }
    </script>
{% endblock %}