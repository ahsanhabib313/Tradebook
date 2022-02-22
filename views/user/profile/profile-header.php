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
                        <div class="top-header-author profile-con">
                            {% if($userDetails->id==(Auth('user')->id)) { %}
                                <div class="text-left cam-container">
                                    <span data-target="#cameraiconModal-<?= $userDetails->id ?>" data-toggle="modal" class="livicon-evo camicon" data-options="
                                                name: camera.svg;
                                                style: lines;
                                                size: 30px;
                                                strokeColor: #c2c5d9;
                                                strokeWidth: 1;
                                                eventOn: parent;
                                                eventType: hover">
                                    </span>
                                </div>
                            {% } %}
                            <div class="d-flex">
                                <div class="author-thumb propic profile-h-img">
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
                                <div class="author-content">
                                    <a href="#" class="h3 author-name"><?= userinfois($userDetails->id, 'name'); ?></a>
                                    <div class="country"><?= ((userinfois($userDetails->id, 'city') != '') ? userinfois($userDetails->id, 'city') . ',' : ''); ?> <?= userinfois($userDetails->id, 'country'); ?></div>
                                </div>
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
                                        <a href="07-ProfilePage-Photos.html">Following</a>
                                    </li>
                                    <li>
                                        <a href="09-ProfilePage-Videos.html">Follower</a>
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