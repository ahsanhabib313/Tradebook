{% extends user/template/app %}
{% block content  %}
<style type="text/css">
    .textColor {
        color: black !important;
        cursor: pointer;
    }

    textarea::-webkit-input-placeholder {
        font-size: 20px;

    }

    .likeColor {
        font-size: 20px;
        color: blue !important;
    }
</style>
<div class="row">
    <div class="col-md-2">
        <h4 class="font-weight-bolder ml-2">Manage Page</h4>
        <ul class="ml-2">
            <li> <a style="color:black !important; font-size:16px;" class="py-3" href="">
                    <img width="23px" class="mr-1 " src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/64/000000/external-home-multimedia-kiranshastry-lineal-color-kiranshastry.png" />Home
                </a></li> <br>

            <li><a style="color:black !important; font-size:16px;" class="my-3" href="editPage?id=<?= $page->id ?>"><img width="21px" class="mr-1" src="https://img.icons8.com/ios/50/000000/edit--v1.png" />Edit Page info</a></li><br>
            <li><a style="color:black !important; font-size:16px;" id="pagesettings" class="my-3" href=""><img width="21px" class="mr-1" src="https://img.icons8.com/material-outlined/24/000000/settings--v2.png" />Page Settings</a></li><br>
        </ul>
    </div>
    <div id="pageSettings" class=" shadow d-none col-md-10">

        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Page Visibility</h6>
                    </div>
                    <div class="col-md-8">
                        <p>Page published</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a class="float-right pr-3" href="">Edit</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <h6>Remove Page</h6>
                    </div>
                    <div class="col-md-8">
                        <a href="" data-toggle="modal" data-target="#deletePage" style="color:royalblue !important;">Delete your page</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a class="float-right pr-3" href="">Edit</a>
            </div>
        </div>

    </div>
    <div id="mainSection" class="bg-white shadow col-md-8 pt-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (!empty($page->coverphoto)) {
                    echo ' <img class="mx-auto" style=" width:98%; height:80%;border-radius: 10px; z-index:-1;" src="../public/uploads/user/' . $page->coverphoto . '" alt="">';
                } else {
                    echo '<img class="mx-auto" id="coverImg" style="width:98%; height:80%;border-radius: 10px; z-index:-1;" src="../public/uploads/user/webpage2.jpg" alt="">';
                }
                ?>

            </div>
        </div>
        <div class="row">
            <div class="d-flex">
                <div class="col-md-3">
                    <?php
                    if (!empty($page->profilepic)) {
                        echo '<img class="rounded-circle" style="z-index: 11; position:relative;top:-140px;left:5px;" src="../public/uploads/user/' . $page->profilepic . '" alt="">';
                    } else {
                        echo ' <img class="rounded-circle" id="proImg" style=" width:100%; z-index: 3; position:relative;top:-100px;left:5px;" src="../public/uploads/user/propic2.jpg" alt="">';
                    }
                    ?>

                </div>
                <div class="col-md-9" style="z-index: 3; position:relative;top:-60px;">
                    <h2 id="pnameHolder" class="font-weight-bold" style="color:royalblue"><?= $page->pname ?></h2>
                    <p id="pcategoryHolder" class=""><?= $page->pcategory ?></p>
                </div>
            </div>
        </div>

        <div class="row shadow" style="z-index: 3; position:relative; top:-130px">
            <div class="col-md-12">
                <hr>
                <div class="d-flex justify-content-between">
                    <ul class="d-flex">
                        <li class="pr-3"><a href="" class="active">Home</a></li>
                        <li class="pr-3"><a href="">About</a></li>
                        <li class="pr-3"><a href="">Photos</a></li>
                        <li class="pr-3"><a href="">Videos</a></li>
                        <li class="pr-3"><a href="">More</a></li>
                    </ul>
                    <ul class="d-flex align-items-center">
                        <li class="pr-3"><img style="width:22px" src="https://img.icons8.com/material-outlined/24/000000/facebook-messenger--v2.png" /></li>
                        <li class="pr-3"><img src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png" /></li>
                        <li class="pr-3"><img src="https://img.icons8.com/material-outlined/24/000000/settings--v1.png" /></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" id="pagePost" style="z-index: 3; position:relative; top:-80px">
            <div class="col col-xl-12 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Last Photos</h6>
                    </div>
                    <div class="ui-block-content">

                        <!-- W-Latest-Photo -->

                        <ul class="widget w-last-photo js-zoom-gallery">
                            <li>
                                <a href="img/last-photo10-large.jpg">
                                    <img src="img/last-photo10-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot11-large.jpg">
                                    <img src="img/last-phot11-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot12-large.jpg">
                                    <img src="img/last-phot12-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot13-large.jpg">
                                    <img src="img/last-phot13-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot14-large.jpg">
                                    <img src="img/last-phot14-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot15-large.jpg">
                                    <img src="img/last-phot15-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot16-large.jpg">
                                    <img src="img/last-phot16-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot17-large.jpg">
                                    <img src="img/last-phot17-large.jpg" alt="photo">
                                </a>
                            </li>
                            <li>
                                <a href="img/last-phot18-large.jpg">
                                    <img src="img/last-phot18-large.jpg" alt="photo">
                                </a>
                            </li>
                        </ul>


                        <!-- .. end W-Latest-Photo -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row">

</div>

{% endblock %}