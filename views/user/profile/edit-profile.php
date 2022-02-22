{% extends user/template/app %}


{% block title %}Edit Profile{% endblock %}

{% block pushInHead %}
<link rel="stylesheet" type="text/css" href="../public/assets/user/css/google_auth.css" charset="utf-8" />

<!-- Intel Telephone Input -->
<link href="../public/assets/user/plugins/intl-tel-input-master/css/intelligent-phone.min.css" />
<link href="../public/assets/user/plugins/intl-tel-input-master/css/intelligent-phone-custom.css" />

<style type="text/css">
    .steper-two{padding-bottom: 3rem;}
    .g_down_instal{padding-bottom: 3rem;}
    .code_in {left: 30px;}
    .scan_qr{height: 16rem;}
    .twofa-code{display: block;}
    .auth_in{background-color: white;}
    .tower-input-preview-container{width:140px;height:140px;}
    .tower-input-preview-container img{max-width: 100%;}
    .header-spacer{height: 70px;}
</style>
{% endblock %}

{% block content %}


<!-- Your Account Personal Information -->
<div class="main-header">
    <div class="content-bg-wrap bg-account"></div>
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                <div class="main-header-content">
                    <p><br/><br/></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-1"></div>
        <div class="col col-3">
            <p style="color:#fff;">Account Balance</p>
            <h1 class="text-left" style="color:#fff;"> <span>$</span>10.248438381</h1>
        </div>
        <div class="col col-2">
            <p style="color:#fff;">Total Withdraw</p>
            <h4 class="text-left" style="color:#fff;"> <span>$</span>1.24843838</h4>
        </div>
        <div class="col col-2">
            <p style="color:#fff;">Total Deposit</p>
            <h4 class="text-left" style="color:#fff;"> <span>$</span>1.24843838</h4>
        </div>
        <div class="col col-2">
            <p style="color:#fff;">Equity</p>
            <h4 class="text-left" style="color:#fff;"> <span>$</span>0.24843838</h4>
        </div>
    </div>

</div>
<div class="profile-section" style="background-color: #022778; color:#fff !important; margin-top: -30px; margin-bottom: 40px">
    <div class="row">
        <div class="col col-xl-12 m-auto col-lg-12 col-md-12">
            <ul class="profile-menu" >
                <li>
                    <a href="#" class="active" style="color: #fff !important;">Overview</a>
                </li>
                <li>
                    <a href="statistics" style="color: #fff !important;">Statistics</a>
                </li>
                <li>
                    <a href="portfolio" style="color: #fff !important;">Portfolio</a>
                </li>
                <li>
                    <a href="#" style="color: #fff !important;">Deals & Orders</a>
                </li>
                <li>
                    <a href="#" style="color: #fff !important;">Financial Report</a>
                </li>
                <li>
                    <a href="#" style="color: #fff !important;">Activity Log</a>
                </li>
                <li>
                    <a href="#" style="color: #fff !important;">More</a>
                </li>

            </ul>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

            <div class="tab-content" id="myTabContent">
                <!-- Profile Settings Contents -->
                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Personal Information's</h6>
                        </div>
                        <div class="ui-block-content">

                            <!-- Personal Information Form  -->

                            <form action="edit-profile" method="post" id="personal-info-form">
                                <input type="hidden" name="op" value="personalinfo"/>
                                <div class="row">

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">First Name</label>
                                            <input name="first_name" class="filter-error filter form-control" placeholder="" type="text" value="<?= $userdetails->first_name; ?>">
                                        </div>


                                        <div class="form-group date-time-picker label-floating">
                                            <label class="control-label">Your Birthday</label>
                                            <input name="datetimepicker" class="filter-error" placeholder="10/24/1984" value="<?=   date("Y-m-d", strtotime($userdetails->dob)); ?>" />
                                            <span class="input-group-addon">
												<svg class="olymp-month-calendar-icon icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
											</span>
                                        </div>


                                        <div class="form-group label-floating is-select">
                                            <label class="control-label">Your Country</label>
                                            <select name="country" class="selectpicker form-control filter-error" data-flag="true" data-default="US">

                                                <?php
                                                $countries = App\Models\Country::all();
                                                foreach ($countries as $key => $country) {
                                                    $selected = ($country->printable_name == $userdetails->country) ? 'selected="selected"' : '';
                                                    echo '<option '.$selected.' value="'.$country->printable_name.'">'.$country->printable_name.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Last Name</label>
                                            <input class="form-control filter-error filter" name="last_name" placeholder="" type="text" value="<?= $userdetails->last_name; ?>">
                                        </div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Phone Number</label>
                                            <input name="phone" value="<?= $userdetails->phone; ?>" class="form-control filter-error filter" type="text">
                                        </div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Post Code</label>
                                            <input name="postcode" class="form-control filter-error filter filter-num" type="text" value="<?= $userdetails->postcode; ?>">
                                        </div>
                                    </div>


                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your City</label>
                                            <input name="city" class="form-control" type="text" value="<?= $userdetails->city; ?>">
                                        </div>
                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating is-select">
                                            <label class="control-label">Your Gender</label>
                                            <select name="gender" class="selectpicker filter-error filter form-control">
                                                <option style="display: none" value="">Select</option>
                                                <option <?= (( $userdetails->gender == 'Male') ? 'selected' : ''); ?> value="Male">Male</option>
                                                <option <?= (( $userdetails->gender == 'Female') ? 'selected' : ''); ?> value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Birthplace</label>
                                            <select name="birthplace" class="selectpicker form-control filter-error">
                                                <option style="display: none" value="">Please Select Your Birthplace</option>
                                                <?php
                                                foreach ($countries as $key => $country) {
                                                    $selected2 = NULL;
                                                    $selected2 = (($country->printable_name == $userdetails->birthplace) ? 'selected="selected"' : '');
                                                    echo '<option '.$selected2.' value="'.$country->printable_name.'">'.$country->printable_name.'</option>';
                                                }

                                                ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Passport Number (If you have)</label>
                                            <input name="passport_number" class="form-control filter filter-num" type="text" value="<?= $userdetails->passport_number; ?>">
                                        </div>
                                    </div>

                                    <div class="col col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Your Address</label>
                                            <input name="address" class="form-control filter filter-address" placeholder="" type="text" value="<?= $userdetails->address; ?>">
                                        </div>
                                    </div>


                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <button type="button" id="InfoChangeBtn" data-btnid="InfoChangeBtn" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="personal-info-form" data-validator="true" data-callback="ChangeProfileCallback" onclick="_run(this)" class="btn btn-primary btn-lg full-width">Save all Changes</button>
                                    </div>

                                </div>
                            </form>

                            <!-- ... end Personal Information Form  -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Login Security Settings</h6>
                        </div>
                        <div class="ui-block-content">

                            <!-- Personal Account Settings Form -->
                            <form>
                                <div class="row">
                                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">No Authenticate</div>
                                                <p>Just Login No Authenticate Needed </p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input class="security" id="no_security" name="security" value="1" type="checkbox">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Email Authenticate</div>
                                                <p>Email Authenticate Needed  to login</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input class="security" id="security_email" name="security" value="2" type="checkbox">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Google Authenticate</div>
                                                <p>Google Authenticate Authenticate Needed to login</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input class="security" id="security_google" name="security" value="3" type="checkbox">
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <button class="btn btn-primary btn-lg full-width">Change Security Setting</button>
                                    </div>
                                </div>
                            </form>


                            <!-- Two step Modal  Start-->
                            <div class="modal fade" id="twofa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">GOOGLE AUTHENTICATOR</h5>
                                            <button type="button" class="close" data-backdrop="false" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="twofaForm" method="post" action="">

                                                <div class="panel-body sect-dark google-FA" id="bg">

                                                    <ul class="row" id="step">
                                                        <li class="col-sm-12 g_down_instal"><span class="staper">1</span>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h3> Download 2 FA Backup Key:</h3>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8">

                                                                <input class="key_in auth_in" name="secret" type="text" value=""/>
                                                                <a class="dicon" href="#"><img class="img_icon" src="../public/assets/user/img/download.png" /></a>
                                                            </div>
                                                        </li>

                                                        <li class="col-sm-12 steper-two">
                                                            <span class="staper">2</span>
                                                            <div class="col-sm-12">
                                                                <h4>Download and Install:</h4>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="dapp">
                                                                    <a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank"><img src="../public/assets/user/img/iphone.png" /></a>

                                                                    <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank"><img src="../public/assets/user/img/android.png" /></a>
                                                                </div>
                                                            </div>
                                                            <div class="clr"></div>
                                                        </li>

                                                        <li class="col-sm-10 scan_qr"><span class="staper staper-three">3</span>
                                                            <h4>Scan QR:</h4>
                                                            <div id="qrcode">
                                                                <img src='../public/assets/user/img/chart.png'/>
                                                            </div>
                                                            <div class="code_in">
                                                                <h4>Enter 2FA code form the app:</h4>
                                                                <div class="input-group mb-md twofa-code">
                                                                    <input class="form-control auth_in" type="text" name="code"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                            <button type="button" class="btn-success btn-sm float-right modal-save-btn gAuthBtn" data-dismiss="modal" >Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Two Step Modal End -->

                            <!-- ... end Personal Account Settings Form  -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="details-about-u" role="tabpanel" aria-labelledby="account-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Details About You</h6>
                        </div>
                        <div class="ui-block-content">

                            <!-- User Additional Informations Form -->
                            <form action="edit-profile" method="post" id="additionalInfoForm">
                                <div class="row">
                                    <input type="hidden" name="op" value="users_additional_info"/>
                                    <div class="col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Overview Of Your Self</label>
                                            <textarea name="about" class="filter-error filter form-control"><?= (( isset($additionAlInfo->about) ) ? $additionAlInfo->about  : ''); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Facebook</label>
                                            <input name="facebook" class="filter-error filter form-control" type="text" value="<?= (( isset($additionAlInfo->facebook) ) ? $additionAlInfo->facebook  : ''); ?>">
                                        </div>
                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Twitter</label>
                                            <input name="twitter" class="filter-error filter form-control" type="text" value="<?= (( isset($additionAlInfo->twitter) ) ? $additionAlInfo->twitter  : ''); ?>">
                                        </div>
                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Linkedin</label>
                                            <input name="linkedin" class="filter-error filter form-control" type="text" value="<?= (( isset($additionAlInfo->linkedin) ) ? $additionAlInfo->linkedin  : ''); ?>">
                                        </div>
                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Website</label>
                                            <input name="website" class="filter-error filter filter-website form-control" type="text" value="<?= (( isset($additionAlInfo->website) ) ? $additionAlInfo->website  : ''); ?>">
                                        </div>
                                    </div>



                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <button type="button" id="additionalInfoBtn" data-btnid="additionalInfoBtn" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="additionalInfoForm" data-validator="true" data-callback="ChangeProfileCallback" onclick="_run(this)" class="btn btn-primary btn-lg full-width">Save all Changes</button>
                                    </div>
                                </div>
                            </form>


                            <!-- Two step Modal  Start-->
                            <div class="modal fade" id="twofa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">GOOGLE AUTHENTICATOR</h5>
                                            <button type="button" class="close" data-backdrop="false" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="twofaForm" method="post" action="">

                                                <div class="panel-body sect-dark google-FA" id="bg">

                                                    <ul class="row" id="step">
                                                        <li class="col-sm-12 g_down_instal"><span class="staper">1</span>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h3> Download 2 FA Backup Key:</h3>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8">

                                                                <input class="key_in auth_in" name="secret" type="text" value=""/>
                                                                <a class="dicon" href="#"><img class="img_icon" src="../public/assets/user/img/download.png" /></a>
                                                            </div>
                                                        </li>

                                                        <li class="col-sm-12 steper-two">
                                                            <span class="staper">2</span>
                                                            <div class="col-sm-12">
                                                                <h4>Download and Install:</h4>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="dapp">
                                                                    <a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank"><img src="../public/assets/user/img/iphone.png" /></a>

                                                                    <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank"><img src="../public/assets/user/img/android.png" /></a>
                                                                </div>
                                                            </div>
                                                            <div class="clr"></div>
                                                        </li>

                                                        <li class="col-sm-10 scan_qr"><span class="staper staper-three">3</span>
                                                            <h4>Scan QR:</h4>
                                                            <div id="qrcode">
                                                                <img src='../public/assets/user/img/chart.png'/>
                                                            </div>
                                                            <div class="code_in">
                                                                <h4>Enter 2FA code form the app:</h4>
                                                                <div class="input-group mb-md twofa-code">
                                                                    <input class="form-control auth_in" type="text" name="code"/>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                            <button type="button" class="btn-success btn-sm float-right modal-save-btn gAuthBtn" data-dismiss="modal" >Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Two Step Modal End -->

                            <!-- ... end Personal Account Settings Form  -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Change Password</h6>
                        </div>
                        <div class="ui-block-content">


                            <!-- Change Password Form -->
                            <form action="edit-profile" method="post" id="password-change-form">
                                <input type="hidden" name="op" value="passcha"/>
                                <div class="row">

                                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="currentpassword" class="control-label">Current Password</label>
                                            <input id="currentpassword" name="currentpassword" class="form-control filter-error filter" placeholder="" type="password" value="">
                                        </div>
                                    </div>

                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating is-empty">
                                            <label for="password" class="control-label">Your New Password</label>
                                            <input id="password" name="password" class="form-control filter-error filter" placeholder="" type="password">
                                        </div>
                                    </div>
                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group label-floating is-empty">
                                            <label for="confirmpassword" class="control-label">Confirm New Password</label>
                                            <input id="confirmpassword" name="confirmpassword" class="form-control filter-error filter" placeholder="" type="password">
                                        </div>
                                    </div>
                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                        <button type="button" id="passChangeBtn" data-btnid="passChangeBtn" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="password-change-form" data-validator="true" data-callback="ChangeProfileCallback" onclick="_run(this)" class="btn btn-primary btn-lg full-width">Change Password</button>
                                    </div>
                                </div>
                            </form>

                            <!-- ... end Change Password Form -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="notifc" role="tabpanel" aria-labelledby="notifc-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Notifications</h6>
                        </div>
                        <div class="ui-block-content">
                            <!-- Change Password Form -->
                            <form>
                                <div class="row">

                                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Notifications Sound</div>
                                                <p>A sound will be played each time you receive a new activity notification</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Notifications Email</div>
                                                <p>We’ll send you an email to your account each time you receive a new activity notification</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Friend’s Birthdays</div>
                                                <p>Choose wheather or not receive notifications about your friend’s birthdays on your newsfeed</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Chat Message Sound</div>
                                                <p>A sound will be played each time you receive a new message on an inactive chat window</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>
                            <!-- ... end Change Password Form -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="hobbies" role="tabpanel" aria-labelledby="hobbies-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Financial and Investment</h6>
                        </div>
                        <div class="ui-block-content">
                                <form>
                                    <div class="row">

                                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Hobbies">I like to ride the bike to work, swimming, and working out. I also like reading design magazines, go to museums, and binge watching a good tv show while it’s raining outside.</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Favourite TV Shows">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Favourite Movies">Idiocratic, The Scarred Wizard and the Fire Crown,  Crime Squad, Ferrum Man. </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Favourite Games">The First of Us, Assassin’s Squad, Dark Assylum, NMAK16, Last Cause 4, Grand Snatch Auto. </textarea>
                                                    </div>

                                                    <button class="btn btn-secondary btn-lg full-width">Cancel</button>
                                            </div>

                                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Favourite Music Bands / Artists">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Favourite Books">The Crime of the Century, Egiptian Mythology 101, The Scarred Wizard, Lord of the Wings, Amongst Gods, The Oracle, A Tale of Air and Water.</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Favourite Writers">Martin T. Georgeston, Jhonathan R. Token, Ivana Rowle, Alexandria Platt, Marcus Roth. </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Other Interests">Swimming, Surfing, Scuba Diving, Anime, Photography, Tattoos, Street Art.</textarea>
                                                    </div>

                                                    <button class="btn btn-primary btn-lg full-width">Save all Changes</button>
                                            </div>

                                    </div>
                                </form>

                        </div>
                    </div>
                </div>

                <!-- Notifications Settings Contents -->
                <div class="tab-pane fade" id="info-notifc" role="tabpanel2" aria-labelledby="info-notifc-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Information Notifications</h6>
                        </div>
                        <div class="ui-block-content">
                            <!-- Change Password Form -->
                            <form>
                                <div class="row">

                                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Notifications Sound</div>
                                                <p>A sound will be played each time you receive a new activity notification</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Notifications Email</div>
                                                <p>We’ll send you an email to your account each time you receive a new activity notification</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Friend’s Birthdays</div>
                                                <p>Choose wheather or not receive notifications about your friend’s birthdays on your newsfeed</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </form>
                            <!-- ... end Change Password Form -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="message-notifc" role="tabpanel2" aria-labelledby="message-notifc-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Message Notifications</h6>
                        </div>
                        <div class="ui-block-content">
                            <!-- Change Password Form -->
                            <form>
                                <div class="row">

                                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Notifications Sound</div>
                                                <p>A sound will be played each time you receive a new activity notification</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Notifications Email</div>
                                                <p>We’ll send you an email to your account each time you receive a new activity notification</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Chat Message Sound</div>
                                                <p>A sound will be played each time you receive a new message on an inactive chat window</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>
                            <!-- ... end Change Password Form -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="friend-req-notifc" role="tabpanel2" aria-labelledby="friend-req-notifc-tab">
                    <div class="ui-block">
                        <div class="ui-block-title">
                            <h6 class="title">Friend Request Notifications</h6>
                        </div>
                        <div class="ui-block-content">
                            <!-- Change Password Form -->
                            <form>
                                <div class="row">

                                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Notifications Sound</div>
                                                <p>A sound will be played each time you receive a new activity notification</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="description-toggle">
                                            <div class="description-toggle-content">
                                                <div class="h6">Notifications Email</div>
                                                <p>We’ll send you an email to your account each time you receive a new activity notification</p>
                                            </div>

                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" checked="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- ... end Change Password Form -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="desktop-container-panel" class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
            <div class="ui-block">

                <!-- Your Profile  -->

                <div id="profile-panel" class="your-profile">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Your Profile</h6>
                    </div>

                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <!-- Profile Settings Navs -->
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Profile Settings
                                        <svg class="olymp-dropdown-arrow-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <ul class="nav nav-tabs your-profile-menu" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="hobbies-tab" data-toggle="tab" href="#hobbies" role="tab" aria-controls="hobbies" aria-selected="false">Financial and Investment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="details-about-u-tab" data-toggle="tab" href="#details-about-u" role="tab" aria-controls="details-about-u" aria-selected="false">Details About You</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Security Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Change Password</a>
                                    </li>
                                </ul>
                            </div>


                            <!-- Notifications Settings Navs -->
                            <div class="card-header" role="tab" id="headingTwo">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="headingOne">
                                        Notifications Settings
                                        <svg class="olymp-dropdown-arrow-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                                    </a>
                                </h6>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <ul class="nav nav-tabs your-profile-menu" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="info-notifc-tab" data-toggle="tab" href="#info-notifc" role="tab" aria-controls="info-notifc" aria-selected="true">Information Notifications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="message-notifc-tab" data-toggle="tab" href="#message-notifc" role="tab" aria-controls="message-notifc" aria-selected="true">Message Notifications</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="friend-req-notifc-tab" data-toggle="tab" href="#friend-req-notifc" role="tab" aria-controls="friend-req-notifc" aria-selected="true">Friends Request Notifications</a>
                                    </li>

                                </ul>
                            </div>





                        </div>
                    </div>
                </div>

                <!-- ... end Your Profile  -->


            </div>
        </div>
    </div>
</div>


{% endblock %}


{% block pushInEnd %}
<script src="../public/assets/admin/plugins/common-ajax/common-ajax.js"></script>
<script src="../public/assets/user/plugins/filterjs/filter.js"></script>


<!-- Intel Telephone Input -->
<script src="../public/assets/admin/plugins/intl-tel-input-master/js/intelligent-phone.js"></script>
<script>
    $("body").filterInput();

    // for phone number
   // $('.input-phone').intlInputPhone();




    // Checkbox handler
    $('input.security').on('change', function() {
        $('input.security').not(this).prop('checked', false);

        if($(this).val() == 3){
            if($(this).is(':checked')){
                $('#twofa').appendTo("body").modal('show');
            }
        }

    });

    // Change Profile CallBack. I will use for all form request
    function ChangeProfileCallback(data, btnName, formName){
        let operationValue = $('#'+formName+' input[name="op"]').val();

        if(data.success){
            $('#'+btnName).prop('disabled', false);
            $('#'+formName)[0].reset();

            toastNotify('success', data.message);
            $('#'+formName+' input[name="op"]').val(operationValue);
        }else{
            toastNotify('error', data.message);
        }


    }

    // Tab Problem Fixing
    $(".nav-item .nav-link").click(function(){
        $('#accordion').find('.nav-item .nav-link.active').removeClass("active");
    });





</script>
{% endblock %}







