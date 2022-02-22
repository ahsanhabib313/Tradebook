{% extends user/template/app %}


{% block title %}Profile{% endblock %}

{% block pushInHead %}


<!--  Croppie - A Javascript Image Cropper  -->
<!--    <link href="../public/assets/user/plugins/croppie/croppiex.css" />-->
<style>
    .author-thumb {
        z-index: 1;
    }

    .bg-primary {
        background-color: #2D6bff !important;
    }

    .table-careers span {
        display: table-cell;
        vertical-align: middle;
        width: 15%;
    }

    #chartdiv {
        width: 100%;
        height: 50vh;
    }

    #chartdiv2 {
        width: 100%;
        height: 50vh;
    }

    #chartdiv3 {
        width: 100%;
        max-height: 600px;
        height: 100vh;
    }

    #chartdiv4 {
        height: 355px;
    }

    #chartdiv5 {
        height: 355px;
    }

    .performance-line {
        display: flex;
    }

    .performance-percent {
        padding: 0;
        text-transform: uppercase;
        color: #777;
        font-size: 12px;
        border: none;
        width: 100%;
    }

    .performance-percent2 {
        border-left: 1px solid #dadada;
        border-right: 1px solid #dadada;
        padding: 0 20px;
        margin: 0 20px;
    }

    .trading-arrows {
        max-width: 55%;
        float: right;
    }

    .additional {
        text-align: center;
    }

    .additional-percent {
        border-left: 1px solid #dadada;
        border-right: 1px solid #dadada;
    }

    .additional-percents {
        border-right: 1px solid #dadada;
    }

    .similar-trader {
        border: 1px solid;
        width: 70px;
        height: 10px;
        margin-left: 2px;
    }

    .similar_traders {
        border: 1px solid;
        width: 70px;
        height: 10px;
    }

    .ripple-out {
        background-color: rgb(255, 255, 255);
        transform: scale(5.17795);
    }

    .top-header-author .author-thumb {

        border-color: #E0E0E0;
    }

    .star-icon .lievo-svg-wrapper {
        top: -6px;
        left: 10px;
    }

    .comment-icon .lievo-svg-wrapper {
        top: -6px;
        left: 10px;
    }

    .post-control-button .btn-control {
        height: 30px !important;
        width: 30PX !important;
        line-height: 29px;
    }

    .top-header-author .author-thumb img {
        width: 100% !important;
    }

    .author-thumb img {
        width: 98px !important;
    }

    .camicon {
        background-color: gray !important;
        cursor: pointer;
        border-radius: 15px;
        margin-top: 90px;
        margin-left: -500px;
        z-index: 1;
    }

    .coverphotoBtn {
        position: relative;
        top: -70px;
        left: -30px;
        z-index: 9999;
    }

    #coverImgCancel {
        z-index: 99999;
    }

    #coverImgSave {
        z-index: 99999;
    }
</style>
{% endblock %}

{% block content %}


<!-- Top Header-Profile -->
<?php

$profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', $userDetails->id)->where("attachmentable_type", "user")->first();
$coverImage = App\Models\Attachment::select('name')->where('attachmentable_id', $userDetails->id)->where("attachmentable_type", "cover_image")->orderBy('id', "desc")->first();

?>
<div class="container">

    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="top-header top-header-favorit" id="imgHolder">
                    <button id="coverImgCancel" type="button" class="btn btn-danger float-right d-none">Cancel</button>
                    <button id="coverImgSave" type="button" class="btn btn-primary float-right d-none">Save Changes</button>
                    <div class="top-header-thumb">
                        <div id="coverImg">

                        </div>
                        <?php
                        $coverImage = App\Models\Attachment::select('name')->where('attachmentable_id', $userDetails->id)->where("attachmentable_type", "cover_image")->orderBy('id', "desc")->first();
                        if (!empty($coverImage->name)) {
                            echo '<img id="previousImg" src="../public/uploads/user/' . $coverImage->name . '" alt="nature">';
                        } else {
                            echo '<img style="max-height:350px" id="previousImg" src="../public/uploads/user/no-image.png" alt="nature">';
                        }
                        ?>
                        {% if($userDetails->id==(Auth('user')->id)) { %}
                        <div class=" dropdown float-right coverphotoBtn">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                <span data-target="#cameraiconModal" class="livicon-evo" data-options="
                                        name: camera.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </span> Edit Cover Photo
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="" id="selectBtn">Select Photo</a>
                                <label class="ml-4 mb-0" for="coverPhotoUpload">Upload Photo</label>
                                <input id="coverPhotoUpload" class="d-none" type="file">
                                <a class="dropdown-item" href="#">Reposition</a>
                                <hr>
                                <a class="dropdown-item" href="#">Remove</a>
                            </div>
                        </div>
                        {% } %}
                        <div class="top-header-author profile">
                            <div class="author-thumb propic">
                                <?php
                                $profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', $userDetails->id)->where("attachmentable_type", "user")->first();
                                if (!empty($profilePicture->name)) {
                                    echo '<img id="previousImg" src="../public/uploads/user/' . $profilePicture->name . '" alt="nature">';
                                } else {
                                    echo '<img width="100%" src="../public/uploads/user/no-profile.jpg" alt="nature">';
                                }
                                ?>
                                <!-- <img src="../public/uploads/user/" alt="author"> -->
                            </div>
                            {% if($userDetails->id==(Auth('user')->id)) { %}
                            <span data-target="#cameraiconModal-<?= $userDetails->id ?>" data-toggle="modal" class="livicon-evo camicon" data-options="
                                        name: camera.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                            </span>
                            {% } %}
                            <div class="author-content">
                                <a href="#" class="h3 author-name"><?= userinfois($userDetails->id, 'name'); ?></a>
                                <div class="country"><?= ((userinfois($userDetails->id, 'city') != '') ? userinfois($userDetails->id, 'city') . ',' : ''); ?> <?= userinfois($userDetails->id, 'country'); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col col-xl-8 m-auto col-lg-8 col-md-12">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="12-FavouritePage.html" class="active">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="statistics">Statistics</a>
                                    </li>
                                    <li>
                                        <a href="following?id=<?= $userDetails->id ?>">Following</a>
                                    </li>
                                    <li>
                                        <a href="follower?id=<?= $userDetails->id ?>">Follower</a>
                                    </li>
                                    <li>
                                        <a href="portfolio">Protfolio</a>
                                    </li>
                                    <li>
                                        <a href="14-FavouritePage-Statistics.html">Finance</a>
                                    </li>
                                    <li>
                                        <a href="15-FavouritePage-Events.html">More</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            <?php
                            // CurrentUserId
                            if ($userDetails->id != selfInfo('id')) {
                            ?>
                                <span onclick="addFriendUnfriendFollowUnfollow(this)" id="follow-btn" data-actiontype="<?= ((userinfois($userDetails->id, 'is_follow')) ? 'unfollow' : 'follow'); ?>" data-friendid="<?= $userDetails->id; ?>" class="btn btn-control cursor-pointer-finger <?= ((userinfois($userDetails->id, 'is_follow')) ? 'bg-danger' : 'bg-success-new'); ?>" data-toggle="tooltip" data-original-title="<?= ((userinfois($userDetails->id, 'is_follow')) ? 'Unfollow' : 'Follow'); ?>">
                                    <?= ((userinfois($userDetails->id, 'is_follow')) ? '<i class="fas fa-user-minus"></i>' : '<i class="fas fa-user-plus"></i>'); ?>
                                </span>

                                <span onclick="addFriendUnfriendFollowUnfollow(this)" id="copy-btn" data-actiontype="<?= ((userinfois($userDetails->id, 'is_friend')) ? 'remove' : 'add'); ?>" data-friendid="<?= $userDetails->id; ?>" class="btn btn-control bg-purple cursor-pointer-finger" data-toggle="tooltip" data-original-title="<?= ((userinfois($userDetails->id, 'is_friend')) ? 'Uncopy' : 'Copy'); ?>">
                                    <div class="comment-icon livicon-evo" data-options="name: touch.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                                </span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- camera modal  -->
<div class="modal fade" id="cameraiconModal-<?= $userDetails->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Profile Picture</h5>
                <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="imgUploadBtn" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="d-none" id="imgPreview" style="width:100%; margin-top:30px">
                        <div id="imagePreview">

                        </div>
                    </div>
                    <input id="profilePic" type="file" name="file">
                    <input type="hidden" value="<?= $userDetails->id ?>" name="imagId" class="idofuser">
                    <input type="hidden" id="<?= $userDetails->id ?>" class="userImageId">
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancelBtn" class="btn btn-danger d-none">Cancel</button>
                    <button type="button" id="uploadBtn" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ... end Top Header-Profile -->

<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title">
                    <div class="h6 title">Followings (<?= count($followings) ?>)</div>
                    <form class="w-search">
                        <div class="form-group with-button">
                            <input class="form-control" type="text" placeholder="Search Friends...">
                            <button>
                                <svg class="olymp-magnifying-glass-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <?php foreach ($followings as $following) : ?>
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="ui-block">

                    <!-- Friend Item -->

                    <div class="friend-item">
                        <div class="friend-header-thumb">
                            <?php
                            $coverImage = App\Models\Attachment::select('name')->where('attachmentable_id', $following->follow_id)->where("attachmentable_type", "cover_image")->orderBy('id', "desc")->first();
                            if (!empty($coverImage->name)) {
                                echo '<img id="previousImg" src="../public/uploads/user/' . $coverImage->name . '" alt="nature">';
                            } else {
                                echo '<img style="max-height:350px" id="previousImg" src="../public/uploads/user/no-image.png" alt="nature">';
                            }
                            ?>
                        </div>

                        <div class="friend-item-content">

                            <div class="more">
                                <svg class="olymp-three-dots-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Report Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Block Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Turn Off Notifications</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="friend-avatar">
                                <div class="author-thumb">
                                    <?php
                                    $profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', $following->follow_id)->where("attachmentable_type", "user")->first();
                                    if (!empty($profilePicture->name)) {
                                        echo '<img src="../public/uploads/user/' . $profilePicture->name . '" alt="nature">';
                                    } else {
                                        echo '<img width="100%" src="../public/uploads/user/no-profile.jpg" alt="nature">';
                                    }
                                    ?>
                                    <!-- <img src="img/avatar1.jpg" alt="author"> -->
                                </div>
                                <div class="author-content">
                                    <a href="profile?id=<?= $following->follow_id ?>" class="h3 author-name"><?= userinfois($following->follow_id, 'name'); ?></a>
                                </div>
                            </div>

                            <div class="swiper-container" data-slide="fade">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="friend-count" data-swiper-parallax="-500">
                                            <a href="#" class="friend-count-item">
                                                <div class="h6"><?= totalCopied($following->follow_id) ?></div>
                                                <div class="title">Friends</div>
                                            </a>
                                            <a href="following?id=<?= $following->follow_id ?>" class="friend-count-item">
                                                <div class="h6"><?= totalFollowing($following->follow_id) ?></div>
                                                <div class="title">Followings</div>
                                            </a>
                                            <a href="follower?id=<?= $following->follow_id ?>" class="friend-count-item">
                                                <div class="h6"><?= totalFollower($following->follow_id) ?></div>
                                                <div class="title">Followers</div>
                                            </a>
                                        </div>
                                        <div class="control-block-button" data-swiper-parallax="-100">
                                            <!-- <a href="#" class="btn btn-control bg-blue">
                                                <div class="camment-icom livicon-evo livicon-evo-holder" data-options="name: comments.svg;size: 30xp; style:lines;  strokeColor: #fff;" style="visibility: visible; width: 35px; margin-left: -9px;"></div>
                                            </a>

                                            <a href="#" class="btn btn-control bg-purple">
                                                <div class="camment-icom livicon-evo livicon-evo-holder" data-options="name: users.svg;size: 30px; style:lines;  strokeColor: #fff;" style="visibility: visible; width: 35px; margin-left: -9px;"></div>
                                            </a> -->

                                            <?php
                                            // CurrentUserId
                                            if ($userDetails->id != selfInfo('id')) {
                                            ?>
                                                <span onclick="addFriendUnfriendFollowUnfollow(this)" id="follow-btn" data-actiontype="<?= ((userinfois($following->follow_id, 'is_follow')) ? 'unfollow' : 'follow'); ?>" data-friendid="<?= $following->follow_id; ?>" class="btn btn-control cursor-pointer-finger <?= ((userinfois($following->follow_id, 'is_follow')) ? 'bg-danger' : 'bg-success-new'); ?>" data-toggle="tooltip" data-original-title="<?= ((userinfois($following->follow_id, 'is_follow')) ? 'Unfollow' : 'Follow'); ?>">
                                                    <?= ((userinfois($following->follow_id, 'is_follow')) ? '<i class="fas fa-user-minus"></i>' : '<i class="fas fa-user-plus"></i>'); ?>
                                                </span>

                                                <span onclick="addFriendUnfriendFollowUnfollow(this)" id="copy-btn" data-actiontype="<?= ((userinfois($following->follow_id, 'is_friend')) ? 'remove' : 'add'); ?>" data-friendid="<?= $following->follow_id; ?>" class="btn btn-control bg-purple cursor-pointer-finger" data-toggle="tooltip" data-original-title="<?= ((userinfois($following->follow_id, 'is_friend')) ? 'Uncopy' : 'Copy'); ?>">
                                                    <div class="comment-icon livicon-evo" data-options="name: touch.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                                                </span>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <p class="friend-about" data-swiper-parallax="-500">
                                            Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
                                        </p>

                                        <div class="friend-since" data-swiper-parallax="-100">
                                            <span>Friends Since:</span>
                                            <div class="h6"><?= date("F Y", strtotime($following->created_at)) ?></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ... end Friend Item -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Window-popup Update Header Photo -->

<?php
$profilePictures = App\Models\Attachment::select('name')->where("attachmentable_type", "user")->get();

?>
<!-- =============================================================
                  cover photo  Select Image Modal 
================================================================-->
<div class="modal fade" id="coverphotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin: 0 auto;" id="exampleModalLabel">Select Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-center" id="recentPhoto" style="cursor:pointer">Recent Photo</h6>
                        <hr id="showHr" class="d-none" style="border: none; height:3px; color:#333;background-color:blue">
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center" style="cursor:pointer" id="photoAlbum">Photo Album</h6>
                        <hr id="showHr2" class="d-none" style="border: none; height:3px; color:#333;background-color:blue">
                    </div>
                </div>
                <div class="row">
                    {%foreach($profilePictures as $profilePicture):%}
                    <h1>Testing</h1>
                    <div class="col-md-4">
                        <img src="../public/uploads/user/<?= $profilePicture->name ?>" alt="">
                    </div>

                    {%endforeach%}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- =============================================================
                The Modal 1 
================================================================-->

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Upload Profile image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="demo-5">

                    <div class="tower-file">
                        <input type="file" name="file" id="demoInput5" multiple />
                        <label for="demoInput5" class="btn btn-primary">
                            <span class="mdi mdi-upload"></span>Select Files
                        </label>
                        <button style="height: 33px;" type="button" class="btn btn-secondary tower-file-clear align-top">Clear</button>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">submit</button>
            </div>

        </div>
    </div>
</div>


<!-- The Modal2 -->
<div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Upload Cover image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="demo-5">

                    <div class="tower-file">
                        <input type="file" name="file2" id="demoInput6" multiple />
                        <label for="demoInput6" class="btn btn-primary">
                            <span class="mdi mdi-upload"></span>Select Files
                        </label>
                        <button style="height: 33px;" type="button" class="btn btn-secondary tower-file-clear align-top">Clear</button>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">submit</button>
            </div>

        </div>
    </div>
</div>



<!-- =============================================================
                     Start Post Share Modal
================================================================-->
<div class="modal fade" id="postShareModal" tabindex="-1" role="dialog" aria-labelledby="postShareModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Share This Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="post-sharedpost" method="post" id="share-form" class="share-form inline-items">
                    <input type="hidden" id="shared-post-id" name="postid" />
                    <textarea name="sharedtext" class="form-control" placeholder="Write Something For Share"></textarea>
                </form>

                <!-- Shareable Post Preview -->
                <div id="shareable-post-preview">
                    <div id="post-image">
                        <img src="" alt="Shared Image" />
                    </div>
                    <div id="post-text">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="postShareBtn" data-btnid="postShareBtn" data-loading="<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>" data-form="share-form" data-validator="true" data-callback="sharePostCallback" onclick="_run(this)" type="button" class="btn btn-primary">Share</button>
            </div>
        </div>
    </div>
</div>

<!-- =======================================================================
                    Profile Photo Changes Modal
 ======================================================================= -->
<div class="modal fade" id="changeProfilePicModal" tabindex="-1" role="dialog" aria-labelledby="changeProfilePicModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="changeProfilePictureForm">
                </form>



                <img class="demo-cropper" id="profile-image-changer" src="../public/assets/user/plugins/croppie/demo-1.jpg" style="display: none;" />



            </div>
            <div class="modal-footer">
                <button id="changeProfilePictureBtn" data-btnid="changeProfilePictureBtn" data-loading="<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>" data-form="changeProfilePictureForm" data-validator="true" data-callback="changeProfilePicCallback" onclick="_run(this)" type="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</div>



{% endblock %}


{% block pushInEnd %}

<!-- <script src="../public/assets/user/plugins/chart/core.js"></script>
<script src="../public/assets/user/plugins/chart/charts.js"></script>
<script src="../public/assets/user/plugins/chart/animated.js"></script>
<script src="../public/assets/user/plugins/chart/index.js"></script> -->

<script src="../public/assets/admin/plugins/common-ajax/common-ajax.js"></script>


<!--  Croppie - A Javascript Image Cropper  -->
<!-- <script src="../public/assets/user/plugins/croppie/croppie.js"></script>
<script src="../public/assets/user/plugins/croppie/image-changer-profile.js"></script> -->

<!-- Trader Following & Coping Script -->
<script src="../public/assets/user/plugins/add-follow-js/add-following.js"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script>
    /* Start Image View For Post Status */
    function preview_photo() {
        let frame = document.querySelector('#file-preview-wrappper .img-item');
        var imagePathOfFileImage = URL.createObjectURL(event.target.files[0]);
        frame.src = imagePathOfFileImage;
        let imageDisplay = $('#poststatusphoto').val();

        if (imageDisplay != '') {

            var le = imageDisplay.length;
            var poin = imageDisplay.lastIndexOf(".");
            var accu1 = imageDisplay.substring(poin, le);
            var accu = accu1.toLowerCase();

            if ((accu != '.png') && (accu != '.jpg') && (accu != '.jpeg')) {
                notify('alert', "Please Select Valid Image File");
                $('#update-header-photo').modal('hide');
            } else {
                $('#file-preview-wrappper').fadeIn();
                $('#update-header-photo').modal('hide');
            }

        } else {
            $('#file-preview-wrappper').fadeOut();
        }
    }


    $('#previewBtn').on('click', function() {
        $('.preview').show().attr('src', pp.getAsDataURL());
    });

    function printOutput(data) {
        //console.log(data);
    }

    function removestatusphoto() {
        $('#file-preview-wrappper').hide();
        let frame = document.querySelector('#file-preview-wrappper .img-item');
        frame.src = '';
        $('#poststatusphoto').val('');
    }

    /* End Image View For Post Status */
    // Comment CallBack
    function CommentPostCallback(data) {
        if (data.success) {
            $('#postCommentBtn' + data.postid).prop('disabled', false);
        } else {
            // $('#postStatusBtn').prop('disabled', false);
            notify('error', data.message);
            $._validator("comment-form-" + data.postid, data.errors);
        }
    }

    // Shared Post CallBack
    function sharePostCallback(data) {

        if (data.success) {
            $('#postShareBtn').prop('disabled', false);
            $('#postShareModal').modal('hide');
            $('#postShareModal textarea').text('');
        }

    }


    // Like Functions
    $(".like-item-element").click(function() {


        var objIs = $(this);
        var postidis = objIs.data('id');
        var itemtype = objIs.data('elemetype');
        var likeAction = objIs.data('like-action');

        var data = {
            'postidis': postidis,
            'itemtype': itemtype,
            'doto': likeAction,
        }

        $.ajax({
            url: 'like-operations',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                if (!data.success) {
                    notify('error', data.message);
                } else if (data.success) {


                    // Like Status Update
                    if (likeAction == 'unlike') {
                        $('#' + itemtype + '-like-box-' + data.eleid).css('color', '#c2c5d9');
                        $('#' + itemtype + '-like-box-' + data.eleid).css('fill', '#c2c5d9');

                        if (itemtype == 'post') {
                            $('#post-like-box2-' + data.eleid).css('background-color', '#9a9fbf');
                        }


                        // Like Status Button Update
                        $('#' + itemtype + '-like-box-' + data.eleid).data('like-action', 'like');
                        if (itemtype == 'post') {
                            $('#post-like-box2-' + data.eleid).data('like-action', 'like');

                        }

                        let getNumberlike = $('#total-' + itemtype + '-like-view-' + data.eleid).text();
                        $('#total-' + itemtype + '-like-view-' + data.eleid).text(parseInt(getNumberlike) - 1);

                    } else if (likeAction == 'like') {
                        $('#' + itemtype + '-like-box-' + data.eleid).css('color', '#2D6BFF');
                        $('#' + itemtype + '-like-box-' + data.eleid).css('fill', '#2D6BFF');

                        if (itemtype == 'post') {
                            $('#post-like-box2-' + data.eleid).css('background-color', '#2D6BFF');
                        }

                        // Like Status Button Update
                        $('#' + itemtype + '-like-box-' + data.eleid).data('like-action', 'unlike');
                        if (itemtype == 'post') {
                            $('#post-like-box2-' + data.eleid).data('like-action', 'unlike');
                        }


                        let getNumberlike = $('#total-' + itemtype + '-like-view-' + data.eleid).text();
                        $('#total-' + itemtype + '-like-view-' + data.eleid).text(parseInt(getNumberlike) + 1);

                    }

                }
            },
            error: function(e) {
                console.log(e)
            }
        });

    });


    /*
     * Share This Post
     */
    function sharethispost(e) {
        let postId = e;
        $('#shared-post-id').val(postId);

        var data = {
            'postis': postId,
            'op': 'loadsharedpost',
        }

        // Loader
        $('#shareable-post-preview #post-text').text('Loading....');

        $('#shareable-post-preview #post-image').css('display', 'none');

        $.ajax({
            url: 'load-sharedpost',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                if (data.success) {
                    if (data.loaddata != '') {

                        // $('#shareable-post-preview #post-text').show();
                        $('#shareable-post-preview #post-text').text(data.loaddata);
                    }
                    if (data.attachfile != '') {
                        $('#shareable-post-preview #post-image').css('display', 'block');
                        $('#shareable-post-preview #post-image img').attr('src', '/../public/uploads/user/post/' + data.attachfile);
                    }
                }

            },
            error: function(e) {
                console.log(e)
            }
        });

    }

    // Run Events On .like-item-element
    $(document).ready(function() {


        var object = $('.like-item-element');

        var listItems = object;
        var listArray = Array.from(listItems);
        listArray.forEach(
            (item) => {
                let likeObj = $(item);

                let element = likeObj.attr('data-like-action');
                let postId = likeObj.attr('data-id');
                let elementType = likeObj.attr('data-elemetype');

                if (element == 'like') {

                    $('#' + elementType + '-like-box-' + postId).css('color', '#c2c5d9');
                    $('#' + elementType + '-like-box-' + postId).css('fill', '#c2c5d9');

                    if (elementType == 'post') {
                        $('#post-like-box2-' + postId).css('background-color', '#9a9fbf');
                    }

                } else if (element == 'unlike') {
                    $('#' + elementType + '-like-box-' + postId).css('color', '#2D6BFF');
                    $('#' + elementType + '-like-box-' + postId).css('fill', '#2D6BFF');

                    if (elementType == 'post') {
                        $('#post-like-box2-' + postId).css('background-color', '#2D6BFF');
                    }
                }
            }
        );

    });



    // image upload 

    $(document).ready(function() {
        $image_crop = $('#imagePreview').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 400,
                height: 300
            }
        });
        $('#profilePic').on("change", function(e) {
            // image cropping 
            let image = this.files[0].name;
            let extension = image.split(".");
            const valid_extensions = ["jpg", "jpeg", "png", "gif"];

            if (valid_extensions.includes(extension[1])) {

                var reader = new FileReader();
                reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#imgPreview').addClass('d-block');
                $('#profilePic').attr('class', "d-none");
                $("#cancelBtn").addClass("d-block btn btn-danger");
            } else {
                $("#profilePic").val("");
                Swal.fire('File does not support');
            }
        });

        $('#uploadBtn').click(function(event) {
            let id = $(".userImageId").attr('id');
            let image = $("#profilePic").val();
            if (image) {
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {

                    $.ajax({
                        url: "imgupload",
                        type: "POST",
                        data: {
                            "image": response,
                            "id": id
                        },
                        success: function(data) {
                            console.log(data);
                            $('#cameraiconModal-' + id).modal('hide');
                            $('.propic').html(data);
                        }
                    });
                })
            } else {
                Swal.fire("Please Select Image");
            }
        });

    });


    // image Cancel
    $(document).on('click', "#cancelBtn", function() {

        $('#profilePic').attr("class", "d-block")
        $('#profilePic').val('');
        $("#imgPreview").attr("class", "d-none");
        $("#cancelBtn").attr("class", "d-none");

    });
    // =========================================================
    //  Cover Photo Selection 
    // =========================================================

    $("#selectBtn").on("click", function(e) {
        e.preventDefault();
        $("#showHr").attr("class", "d-block");
        $("#photoAlbum").click(function() {
            $("#showHr").attr("class", "d-none");
            $("#showHr2").attr("class", "d-block");
        })
        $("#recentPhoto").click(function() {
            $("#showHr").attr("class", "d-block");
            $("#showHr2").attr("class", "d-none");
        })
        $("#coverphotoModal").modal("show");
        console.log("someone clicked me");
    })

    $(document).ready(function() {
        $('#coverPhotoUpload').on("change", function(e) {
            let image = this.files[0].name;
            let extension = image.split(".");
            const valid_extensions = ["jpg", "jpeg", "png", "gif"];
            // image cropping
            if (valid_extensions.includes(extension[1])) {
                $('#previousImg').attr("class", "d-none");
                $("#coverImgCancel").addClass("d-block");
                $("#coverImgSave").addClass("d-block");
                $("#coverImg").attr("class", "d-block");
                $image_crop = $('#coverImg').croppie({
                    enableExif: true,
                    viewport: {
                        width: 1076,
                        height: 330,
                        type: 'square'
                    },
                    boundary: {
                        width: 1076,
                        height: 330
                    }
                });


                var reader = new FileReader();
                reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
            } else {
                Swal.fire('File does not support');
            }
        });
        $("#coverImgCancel").click(function() {

            $("#coverImg").html("");
            $('#previousImg').attr("class", "d-block");
            $(this).attr("class", " btn btn-danger float-right d-none");
            $("#coverImgSave").attr("class", "btn btn-primary float-right d-none");
        });
        $("#coverImgSave").click(function() {
            let id = $(".userImageId").attr('id');
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {

                $.ajax({
                    url: "saveCoverImage",
                    type: "POST",
                    data: {
                        "image": response,
                        "id": id
                    },
                    success: function(data) {
                        $("#coverImg").html(data);
                        $("#coverImgCancel").attr("class", " btn btn-danger float-right d-none");
                        $("#coverImgSave").attr("class", "btn btn-primary float-right d-none");
                    }
                });
            })
        })


    })




    // function profilePicModalOpen() {
    //     // $('#myModal').modal('toggle');
    //     profileImageChange.profilePicChangeDestroy();
    //     profileImageChange.profilePicChangeInit();
    //     $('#changeProfilePicModal').modal('show');
    // }

    /*
           function profileImageChanger () {
               var mc = $('#cropper-1');
               mc.croppie({
                   viewport: {
                       width: 150,
                       height: 150,
                       type: 'circle'
                   },
                   boundary: {
                       width: 300,
                       height: 300
                   },
                   // url: 'demo/demo-1.jpg',
                   // enforceBoundary: false
                   // mouseWheelZoom: true
               });
           }
            */
</script>
{% endblock %}