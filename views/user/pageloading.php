{% extends user/template/app %}
{% block title %}<?php echo("Page Title")?>{% endblock %}
{% block pushInHead %}
{% extends user/style/page-loading-style %}
{% extends user/profile/profile-style %}
{% endblock %}
{% block content  %}
<div class="container">
    <!-- ==============================================
        PAGE COVER PHOTO
    ==================================================-->
    <div class="page-cover-img-wrapper bg-white">
        <div class="cover-img-inner-con">
            <img class="mx-auto cover-img" style=" width:98%; height:80%;border-radius: 10px; z-index:-1;" src="../public/uploads/user/<?php echo(!empty($page->coverphoto))?$page->coverphoto:'webpage2.jpg'?>" alt="cover photo">
            <div class="btn btn-secondary btn-cover-edit more">
                <span class="text-white"> Edit comver photo</span>
                <ul class="more-dropdown">
                    <li>
                        <a data-toggle="modal" id="" class="edit" data-target="#editModal" href="/edit/"><i class="fa fa-edit"></i> Edit photo</a>
                    </li>
                    <li>
                        <a data-toggle="modal" id="" class="edit" data-target="#upload-modal" href="/edit/">
                            <i class="fa fa-upload"></i> Uload new photo
                        </a>
                    </li>
                </ul>
            </div>
            <!-- cover photo upload Modal -->
            <form action="/page/profile-update" method="post" enctype="multipart/form-data" id="edit-profile-pic">
                <input type="hidden" name="page_id" value="<?php echo($_GET['id'])?>">
                <div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-labelledby="upload-modal-label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="upload-modal-label">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none" id="pro-upload-error">
                                <!-- display here validation message from call back -->
                            </div>
                            <div class="form-group">
                                <label for="pro-img-upload" class="profile-up-label">
                                    <input type="file" name="image" id="pro-img-upload">
                                    <span class="livicon-evo" data-options="
                                        name: image.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                    </span>
                                    Upload a page profile
                                </label>
                            </div>
                            <div id="profile-preview" class="row">
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            <button id="proUpBtn" data-btnid="proUpBtn" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="edit-profile-pic" data-file="true" data-validator="true" data-callback="profile_pic_update_callBack" onclick="_run(this)" type="button" class="btn btn-primary" style="width:100px">Save Post</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="page-header">
        <div class="d-flex bg-white">
            <div class="w-auto mr-3 page-profile-container">
                <img class="rounded-circle page-profile-img" style="z-index: 11; position:relative;top:-95px;left:5px;" src="{{ asset('public/uploads/user/post/') }}<?php echo(!empty($page->profilepic)?$page->profilepic:'no-profile.jpg')?>" alt="profile photo">
                <!-- modal trigger -->
                <a href="#" class="profile-edit-icon" data-toggle="modal" data-target="#profile-edit">
                    <i class="fa fa-edit"></i>
                </a>
                <!-- profile-eddit Modal -->
                <form action="/page/profile-update" method="post" enctype="multipart/form-data" id="edit-profile-pic">
                    <input type="hidden" name="page_id" value="<?php echo($_GET['id'])?>">
                    <div class="modal fade" id="profile-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" style="display:none" id="pro-upload-error">
                                    <!-- display here validation message from call back -->
                                </div>
                                <div class="form-group">
                                    <label for="pro-img-upload" class="profile-up-label">
                                        <input type="file" name="image" id="pro-img-upload">
                                        <span class="livicon-evo" data-options="
                                            name: image.svg;
                                            style: lines;
                                            size: 30px;
                                            strokeColor: #c2c5d9;
                                            strokeWidth: 1;
                                            eventOn: parent;
                                            eventType: hover">
                                        </span>
                                        Upload a page profile
                                    </label>
                                </div>
                                <div id="profile-preview" class="row">
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                <button id="proUpBtn" data-btnid="proUpBtn" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="edit-profile-pic" data-file="true" data-validator="true" data-callback="profile_pic_update_callBack" onclick="_run(this)" type="button" class="btn btn-primary" style="width:100px">Save Post</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-auto" style="z-index: 3; position:relative;top:9px;">
                <h2 id="pnameHolder" class="font-weight-bold page-heading page-h-color" style="color:royalblue"><?php echo(!empty( $page->pname)? $page->pname:'<a href="#">There is no page! Please create a new page</a>')?></h2>
                <p id="pcategoryHolder" class=""><?php echo(!empty($page->pcategory)?$page->pcategory:'') ?></p>
            </div>
        </div>
    </div>
    <div class="ui-block border-left-0 border-right-0">
        <div class="d-flex justify-content-between">
            <ul class="d-flex mt-3 ml-3">
                <li class="pr-3"><a href="" class="active">Home</a></li>
                <li class="pr-3"><a href="">About</a></li>
                <li class="pr-3"><a href="">Photos</a></li>
                <li class="pr-3"><a href="">Videos</a></li>
                <li class="pr-3"><a href="">More</a></li>
            </ul>
            <ul class="d-flex align-items-center mt-2">
                <li class="pr-3"><img style="width:22px" src="https://img.icons8.com/material-outlined/24/000000/facebook-messenger--v2.png" /></li>
                <li class="pr-3"><img src="https://img.icons8.com/ios-glyphs/30/000000/search--v1.png" /></li>
                <li class="pr-3"><img src="https://img.icons8.com/material-outlined/24/000000/settings--v1.png" /></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="ui-block p-3">
                <h4 class="page-h-color font-weight-bold">About</h4>
                <p id="pdescriptionHolder"><?php echo(!empty($page->pdescription)?$page->pdescription:'') ?></p>
                <br>
                <h4 class="page-h-color font-weight-bold" style="color:royalblue">Created</h4>
                <p id="pdescriptionHolder"><?php echo(!empty($page->created_at)?date("F Y", strtotime($page->created_at)):'') ?></p>
                <br>
                <h4 class="font-weight-bold page-h-color" style="color:royalblue">Last Updated</h4>
                <p id="pdescriptionHolder"><?php echo(!empty($page->updated_at)?date("F Y", strtotime($page->updated_at)):'') ?></p>
                <br>
            </div>
        </div>
        <div class="col-md-8">
            <!-- ============================================
                    CREATE NEW PAGE POST
            ============================================= -->
            <div class="ui-block">
                <div class="hentry post">
                    <div class="post__author author vcard">
                        <img src="../public/uploads/user/<?= userinfois((Auth('user')->id), 'profile_photo');?>" alt="author" class="author-img">
                        <!-- post input -->
                        <div class="form-group">
                            <!-- Button trigger create post modal -->
                            <textarea class="form-control w-100" style="color:darkgray" id="post-input" data-toggle="modal" data-target="#postCreateModal" placeholder="Create a new post...."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ending create new post -->
            <!-- =========================================
                    PAGE POST
            =========================================== -->
            {% foreach($getPagePosts as $value): %}
                <!-- new design post -->
                <div class="ui-block">
                <article class="hentry post">
                    <div class="post__author author vcard inline-items">
                        <img src="../public/uploads/user/<?= userinfois($value->user_id, 'profile_photo');?>" alt="author" class="author-img">
                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#"><?= $value->first_name . " " . $value->last_name; ?></a>
                            <div class="post__date">
                                <time class="published" data-toggle="tooltip" title="<?= timeis($value->created_at); ?>" datetime="2004-07-24T18:18">
                                    <?= timeis($value->created_at, 'moment'); ?>
                                </time>
                            </div>
                        </div>
                        <div class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                            <ul class="more-dropdown">
                                {% if ($value->idofusers==(Auth('user')->id)){ %}
                                <li>
                                    <a data-toggle="modal" id="<?= $value->id; ?>" class="edit" data-target="#editModal<?php echo($value->id);?>" href="/edit/<?= $value->id; ?>">Edit Post</a>
                                </li>
                                <li>
                                    <a onclick="return confirm('Are You Sure You Want to Delete?')" id="delPost" href="delete?id=<?= $value->id; ?>">Delete Post</a>
                                </li>
                                {% } %}
                                <li>
                                    <a href="#">Turn Off Notifications</a>
                                </li>
                                <li>
                                    <a href="#">Select as Featured</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="p-paging" data-charecter="1">{{ $value->post }}</p>
                    <?php $total_img =0; ?>
                    <?php $post_image = \App\Models\Attachment::where('attachmentable_id', $value->id)
                        ->where('attachmentable_type', 'page_post')
                        ->select('name','id')->get();
                        $i = 1;
                    ?>
                    <!--=======================================================
                        Post Edit Modal  
                    ===========================================================-->
                    <form action="/user/edit" method="post" enctype="multipart/form-data" class="post-edit-form" id="edit-post-form<?php echo($value->id);?>">
                        <div class="modal fade" id="editModal<?php echo($value->id)?>" tabindex="-1" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Edit Post 
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="text-danger edit-errors" style="display:none"></ul>
                                        <textarea class="form-control post-description" rows="5" name="post"><?php echo($value->post);?></textarea>
                                        <input type="hidden" name="post_id" value="<?php echo($value->id);?>">
                                        <?php if(!empty($post_image)): ?>
                                            <hr>
                                            <!-- ================================
                                                edite image carousel
                                            ===================================== -->
                                            <div id="myCarousel<?php echo($value->id);?>" class="carousel slide w-100 custom-carousel" data-ride="carousel" data-interval="false">
                                                <div class="carousel-inner w-100" role="listbox">
                                                    {% foreach($post_image as $post_img): %}
                                                        <div class="carousel-item <?php echo(($item==1)?'active':' ')?>">
                                                            <div class="col-lg-4 col-md-6" id="item-id-<?php echo($post_img->id)?>">
                                                                <div class="position-relative edit-img-container">
                                                                    <img src="{{ asset('public/uploads/user/post/') }}<?= $post_img->name; ?>" alt="post image" class="img img-fluid edit-modal-img d-block w-100">
                                                                    <button class="btn-img-remove" data-image_id="<?php echo($post_img->id);?>">
                                                                        <span class="livicon-evo" data-options="
                                                                            name: trash.svg;
                                                                            style: lines;
                                                                            size: 30px;
                                                                            strokeColor: #c2c5d9;
                                                                            strokeWidth: 1;
                                                                            eventOn: parent;
                                                                            eventType: hover">
                                                                        </span>
                                                                        <span class="btn-img-text">Remove Image</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php $item++; ?>
                                                    {% endforeach; %}
                                                </div>
                                                <a class="carousel-control-prev bg-dark w-auto edit-carousel-prev" href="#myCarousel<?php echo($value->id);?>" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next bg-dark w-auto edit-carousel-next" href="#myCarousel<?php echo($value->id);?>" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-footer pt-0">
                                        <div class="d-flex" style="width:100%">
                                            <div class="w-100">
                                                <div class="image-add-more">
                                                    <label for="file-input<?php echo($value->id);?>" class="mb-0">
                                                        <span class="livicon-evo btn-add-more-image" data-options="
                                                            name: image.svg;
                                                            style: lines;
                                                            size: 50px;
                                                            strokeColor: #c2c5d9;
                                                            strokeWidth: 1;
                                                            eventOn: parent;
                                                            eventType: hover">
                                                        </span>
                                                    </label>
                                                    <input id="file-input<?php echo($value->id);?>" type="file" name="image[]" multiple/>
                                                </div>
                                            </div>
                                            <div class="w-100 mt-2 float-right text-right">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button id="editBtn" data-btnid="editBtn" data-form="edit-post-form<?php echo($value->id);?>" data-file="true" data-validator="true" data-callback="postEditCallBack" onclick="_run(this)" type="button" class="btn btn-primary edit-post-btn">Save changes</button>
                                                <input id="<?= $value->id; ?>" type="hidden" class="hidBtn">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                    <!-- Post Shared -->
                    {% if($value->shared != 0){ %}
                    <div class="shared-post-content-wrapper">
                        <!-- Post Image If Have -->
                        <?php
                        $postHave = \App\Models\Post::where('id', '=', $value->shared)->select('post', 'user_id', 'created_at')->first();
                        $imageOfPost = \App\Models\Attachment::where('attachmentable_id', '=', $value->shared)
                                        ->where('attachmentable_type', '=', 'page_post')
                                        ->select('name')->first();
                        echo "<hr>";
                        $profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', $postHave->user_id)->where("attachmentable_type", "user")->first();
                        ?>
                        <div class="post__author author vcard inline-items">
                            <img src="../public/uploads/user/<?= userinfois('profile_photo'); ?>" alt="author" class="author-img">
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="#"><?= userinfois($postHave->user_id); ?></a>
                                <div class="post__date">
                                    <time class="published" data-toggle="tooltip" title="<?= timeis($postHave->created_at); ?>" datetime="2004-07-24T18:18">
                                        <?= timeis($postHave->created_at, 'moment'); ?>
                                    </time>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($imageOfPost) {
                        ?>
                            <div class="shared-image-display post-thumb">
                                <img alt="Shared Image Display" src="{{ asset('public/uploads/user/post/') }}<?= $imageOfPost->name; ?>" />
                            </div>
                        <?php
                        }
                        echo "<p>" . $postHave->post . "</p>";
                        ?>
                    </div>
                    {% } %}
                    <!-- ====================================
                        POST IMAGE GALARY
                        IMAGE OPEN IN A MODAL
                    =========================================-->
                    <?php $total_img = count($post_image); ?>
                    <?php if($total_img<=2): ?>
                        <?php if (!empty($post_image)): ?>
                            <div class="post-thumb position-relative">
                                <div class="d-flex galary">
                                    <?php foreach($post_image as $img): ?>
                                        <!-- Trigger the Modal -->
                                        <?php if($i<=2):?>
                                            <div class="custom-col-lg flex-fill">
                                                <div class="grid-image-con overflow-hidden">
                                                    <img id="grid_image<?php echo $i;?>" src="{{ asset('public/uploads/user/post/') }}<?= $img->name; ?>" alt="Status Image" class="img img-fluid galary-img" data-image_id="<?php echo($i);?>" data-total_img="<?php echo($total_img);?>" data-id="<?php echo($img->id);?>">
                                                </div>
                                            </div>
                                            <?php $i++;?>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </div>
                                <!-- THE MODAL -->
                                <div id="myModal_<?php $value->id; ?>" class="img-modal">
                                    <!-- GALARY MODAL CONTENT LOAD HERE -->
                                    {% extends user/profile/galary-modal %}
                                </div> 
                            </div>
                            <!-- ENDING THE MODAL -->
                        <?php endif; ?>
                    <?php elseif($total_img<5 && $total_img>3): ?>
                        <!-- IF GALARY IMAGE MORE LESS THAN 5 -->
                        <?php if (!empty($post_image)): ?>
                            <div class="post-thumb">
                                <div class="d-flex galary">
                                    <?php foreach($post_image as $img): ?>
                                        <!-- Trigger the Modal -->
                                        <?php if($i==1):?>
                                            <div class="custom-col-lg flex-fill">
                                                <div class="grid-image-con overflow-hidden">
                                                    <img id="grid_image<?php echo $i;?>" src="{{ asset('public/uploads/user/post/') }}<?= $img->name; ?>" alt="Status Image" class="img img-fluid galary-img" data-image_id="<?php echo($i);?>" data-total_img="<?php echo($total_img);?>" data-id="<?php echo($img->id);?>">
                                                </div>
                                            </div>
                                            <?php $i++?>
                                        <?php else: ?>
                                            <?php break; ?>
                                        <?php endif;?>
                                    <?php endforeach?>
                                </div>
                                <div class="d-flex galary">
                                    <?php $j = 0?>
                                    {% foreach($post_image as $img): %}
                                        <!-- Trigger the Modal -->
                                        <?php $j++ ?>
                                        <?php if($i>1 && $j>=2):?>
                                            <div class="custom-col-lg">
                                                <div class="grid-image-con overflow-hidden">
                                                    <img id="grid_image<?php echo $i;?>" src="{{ asset('public/uploads/user/post/') }}<?= $img->name; ?>" alt="Status Image" class="img img-fluid galary-img" data-image_id="<?php echo($i);?>" data-total_img="<?php echo($total_img);?>" data-id="<?php echo($img->id);?>">
                                                </div>
                                            </div>
                                            <?php $i++?>
                                        <?php endif;?>
                                    {% endforeach; %}
                                </div>
                                <!-- THE MODAL -->
                                <div id="myModal_<?php $img->id; ?>" class="img-modal">
                                    <!-- GALARY MODAL CONTENT LOAD HERE -->
                                    {% extends user/profile/galary-modal %}
                                </div>
                                <!-- ENDING THE MODAL -->
                            </div>
                        <?php   endif; ?>
                    <?php else: ?>
                        <?php if (!empty($post_image)): ?>
                            <!-- IF IMAGE MORE THAN 5 -->
                            <div class="post-thumb position-relative">
                                <div class="d-flex galary">
                                    <?php foreach($post_image as $img): ?>
                                        <!-- Trigger the Modal -->
                                        <?php if($i==1):?>
                                            <div class="custom-col-lg flex-fill">
                                                <div class="grid-image-con overflow-hidden">
                                                    <img id="grid_image<?php echo $i;?>" src="{{ asset('public/uploads/user/post/') }}<?= $img->name; ?>" alt="Status Image" class="img img-fluid galary-img" data-image_id="<?php echo($i);?>" data-total_img="<?php echo($total_img);?>">
                                                </div>
                                            </div>
                                            <?php $i++;?>
                                        <?php else: ?>
                                            <?php break; ?>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="d-flex galary">
                                    <?php $j=0; ?>
                                    <?php foreach($post_image as $img): ?>
                                        <!-- Trigger the Modal -->
                                        <?php $j++;?>
                                        <?php if(($i>1 && $i<=4) && $j>=2):?>
                                            <div class="custom-col-lg">
                                                <div class="grid-image-con overflow-hidden position-relative">
                                                    <img id="grid_image<?php echo $i;?>" src="{{ asset('public/uploads/user/post/') }}<?= $img->name; ?>" alt="Status Image" class="img img-fluid galary-img" data-image_id="<?php echo($i);?>" data-total_img="<?php echo($total_img);?>">
                                                    <?php if($i==4): ?>
                                                        <div class="galary-all-img">
                                                            <span class="text-white total-image">
                                                                <b><?php echo($total_img);?></b>
                                                            </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <?php $i++;?>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="galary galary-multiple-img">
                                    <?php $j=0; ?>
                                    <?php foreach($post_image as $img): ?>
                                        <!-- Trigger the Modal -->
                                        <?php $j++;?>
                                        <?php if(($i>4) && $j>4):?>
                                            <div class="custom-col-lg">
                                                <div class="grid-image-con overflow-hidden">
                                                    <img id="grid_image<?php echo $i;?>" src="{{ asset('public/uploads/user/post/') }}<?= $img->name; ?>" alt="Status Image" class="img img-fluid galary-img" data-image_id="<?php echo($i);?>" data-total_img="<?php echo($total_img);?>">
                                                </div>
                                            </div>
                                            <?php $i++;?>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                </div>
                                <!-- THE MODAL -->
                                <div id="myModal_<?php $img->id; ?>" class="img-modal">
                                    <!-- GALARY MODAL CONTENT LOAD HERE -->
                                    {% extends user/profile/galary-modal %}
                                </div> 
                            </div>
                            <!-- ENDING THE MODAL -->
                        <?php endif; ?>
                    <?php endif; ?>
                    <!-- ========================================
                        image open in a modal from gallary
                        end this option
                    =============================================-->
                    <div class="post-additional-info inline-items">
                        <span id="post-like-box-{{$value->id}}" data-like-action="<?= likestatus($value->id); ?>" data-id="{{ $value->id}}" data-elemetype="post" class="like-item-element post-add-icon inline-items">
                            <div class="livicon-evo" data-options="name: heart.svg;size: 30px; style: lines;"></div>
                            <span id="total-post-like-view-{{$value->id}}"><?= totallike($value->id); ?></span>
                        </span>
                        <ul class="friends-harmonic">
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/friend-harmonic7.jpg" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/friend-harmonic8.jpg" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/friend-harmonic9.jpg" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/friend-harmonic10.jpg" alt="friend">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="../public/assets/user/img/friend-harmonic11.jpg" alt="friend">
                                </a>
                            </li>
                        </ul>
                        <div class="names-people-likes">
                            <a href="#">You</a>, <a href="#">Elaine</a> and
                            <br>22 more liked this
                        </div>
                        <div class="comments-shared">
                            <span class="post-add-icon inline-items cursor-pointer-finger comments-icon">
                                <div class="livicon-evo" data-options="name: comment.svg;size: 30px; style:lines; strokeColor: #888da8;"></div>
                                <span>{{count($value->comments)}}</span>
                            </span>

                            <span class="cursor-pointer-finger post-add-icon inline-items" onclick="sharethispost({{ $value->id}})" data-toggle="modal" data-target="#postShareModal">
                                <div class="livicon-evo" data-options="name: share.svg;size: 30px; style:lines; strokeColor: #888da8;"></div>
                                <span>0</span>
                            </span>
                        </div>
                    </div>
                </article>

                <!-- ============================================================
                            Comments Area Start
                ===============================================================-->
                <div class="comments-wrapper">
                    <ul class="comments-list" data-item="1" data-size="1">
                        {% foreach($value->comments as $comment): %}
                        <li class="comment-item">
                            <div class="post__author author vcard inline-items">
                                <img src="../public/uploads/user/<?= userinfois($comment->comment_by, 'profile_photo');?>" alt="author" class="author-img">
                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="02-ProfilePage.html"><?= userinfois($comment->comment_by, 'name'); ?></a>
                                    <div class="post__date">
                                        <time class="published" datetime="2004-07-24T18:18">
                                            <?= timeis($comment->created_at, 'moment'); ?>
                                        </time>
                                    </div>
                                </div>
                                <a href="#" class="more">
                                    <svg class="olymp-three-dots-icon">
                                        <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                </a>
                            </div>
                            <div class="comment-content">
                                <p> {{ $comment->comment; }}</p>
                                <?php
                                if (isset($comment->attach->name)) {
                                ?>
                                    <div class="comment-image-wrapper">
                                        <img src="{{ asset('public/uploads/user/comment/') }}<?= $comment->attach->name; ?>" alt="Comment Image" class="comment-img"/>
                                    </div>
                                    <div class="comment-img-modal">
                                        <!-- =================================
                                                HERE LOAD THE COMMENT MODAL
                                        ====================================== -->
                                        {% extends user/profile/comment-img-modal %}
                                    </div>
                                <?php
                                }
                                ?>
                                <span id="comment-like-box-{{$comment->id}}" data-like-action="<?= likestatus($comment->id, 'comment'); ?>" data-id="{{ $comment->id}}" data-elemetype="comment" class="like-item-element post-add-icon inline-items">
                                    <div class="livicon-evo" data-options="name: heart.svg;size: 30px; style:lines; strokeColor: #888da8;"></div>
                                    <span id="total-comment-like-view-{{$value->id}}"><?= totallike($comment->id, 'comment'); ?></span>
                                </span>
                            </div>
                        </li>
                        {% endforeach; %}
                    </ul>
                    <!-- ==============================
                        LOAD MORE COMMENT BUTTONS
                    ================================== -->
                    <div class="d-flex pt-3 pb-3 more-less-wrapper">
                        <div class="loadMore ml-3 w-100">Load more <span class="available-comments"></span></div>
                        <div class="showLess mr-3 ml-3">Show less</div>
                    </div>
                </div>
                <!-- ... end Comments -->
                
                <!-- Comment Form  -->
                <form action="post-comment" method="post" id="comment-form-{{$value->id}}" class="comment-form inline-items" enctype="multipart/form-data">
                    <div class="post__author author vcard inline-items">
                        <img src="../public/assets/user/img/author-page.jpg" alt="author" class="author-img">
                        <div class="form-group with-icon-right ">
                            <textarea name="comment" class="form-control textarea-comment" placeholder=""></textarea>
                            <input type="hidden" name="postid" value="{{$value->id}}" />
                            <input class="d-none comment-file-input" data-comment-wrapper="1{{$value->id}}" data-comment-file="{{$value->id}}" onchange="preview_file_photo(this)" type="file" name="commentfile[]" id="pr-file-attach-field-{{$value->id}}" />
                            <div class="camera-icon-con">
                                <label for="pr-file-attach-field-{{$value->id}}" class="options-message">
                                    <svg class="olymp-camera-icon">
                                        <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                    </svg>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Start Comment Attach Photo Preview -->
                    <div class="comment-image-wrapper dd-none" style="display:none !important;" id="comment-wrapper-1{{$value->id}}">
                        <span onclick="remove_comment_photo(1{{$value->id}})" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <img src="" alt="Image Of Comment Attachment" style="min-height:auto" class="comment-img-preview">
                    </div>
                    <!-- End Comment Attach Photo Preview -->
                    <button type="button" id="postCommentBtn{{$value->id}}" data-btnid="postCommentBtn{{$value->id}}" data-post-id="{{$value->id}}" data-file="true" data-loading="<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>" data-form="comment-form-{{$value->id}}" data-validator="true" data-callback="CommentPostCallback" onclick="_run(this)" class="btn btn-primary btn-submit-comment">Post Comment</button>
                </form>
                <!-- ... end Comment Form  -->
                <!-- ============================================================
                        Comments Area End
            ===============================================================-->
            </div>
            {% endforeach %}
        </div>
    </div>
</div>
<!--=======================================
        create new post Modal 
=========================================-->
<form action="/user/pageposts" id="create-post-form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="page_id" value="<?php echo($_GET['id'])?>">
    <div class="modal fade " id="postCreateModal" tabindex="-1" role="dialog" aria-labelledby="#postCreateModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postCreateModalTitle">Create a new post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <label for="post-input">Example textarea</label> -->
                    <textarea class="form-control w-100" style="color:darkgray" name="post_text" id="post-input-modal" placeholder="Write something..."></textarea>
                    <div class="row preview-img-row">
                        <!--================================
                                HERE LOAD THE  PREVIEW IMAGE
                        =================================-->
                    </div>
                </div>
                <div class="modal-footer pt-0">
                    <div class="d-flex w-100">
                        <div class="w-100">
                            <div class="mb-3">
                                <div class="image-add-more">
                                    <label for="file-input" class="mb-0">
                                        <span class="livicon-evo btn-add-more-image" data-options="
                                            name: image.svg;
                                            style: lines;
                                            size: 50px;
                                            strokeColor: #c2c5d9;
                                            strokeWidth: 1;
                                            eventOn: parent;
                                            eventType: hover">
                                        </span>
                                    </label>
                                    <input id="file-input" type="file" name="image[]" multiple class="input-post-img"/>
                                </div>
                            </div>
                        </div>
                        <div class=" w-100 text-right pt-2">
                            <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Cancel</button>
                            <button id="postBtn" data-btnid="postBtn" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="create-post-form" data-file="true" data-validator="true" data-callback="PostCallback" onclick="_run(this)" type="button" class="btn btn-primary" style="width:100px">Save Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- ENDING POST CREATION -->
<!-- Delete Modal  -->
<div class="modal fade" id="deletePage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Page permanently ? </h5>

            </div>
            <div class="modal-body">
                <p>Once you delete a Page, you will not be able to get it back. If you think you'll want to come back to your Page in the future, you can unpublish it instead of deleting it.</p>
                <p>Are you sure you want to delete <a href="pageloading?id=<?= $page->id ?>" style="color:royalblue"><?= $page->pname ?></a>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" onclick="deletePage(<?= $page->id ?>)" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
{% endblock %}
{% block pushInEnd %}
<script src="../public/assets/admin/plugins/common-ajax/common-ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#pagesettings").on("click", function(e) {
            e.preventDefault();
            $("#mainSection").addClass("d-none");
            $("#pageSettings").addClass("d-block");
        });

        $("#postWithImg").on('change', function(e) {
            let image = this.files[0].name;
            let imgofpost = URL.createObjectURL(event.target.files[0]);
            const valid_extensions = ["jpg", "jpeg", "png", "gif"];
            let extension = image.split(".");
            if (valid_extensions.includes(extension[1])) {
                $("#showImg").html('<img src=" ' + imgofpost + '" >');
                $("#clsCreatePost").click(function(e) {
                    console.log("clicked");
                    $("#pageText").val("");
                    $("#showImg").html("");
                });
            } else {
                Swal.fire('File does not support');
            }
        });
        // Upload Photo 
        $("#photoUpload").on("click", function(e) {
            e.preventDefault();
            $("#photoUpModal").modal("show");
            $("#pagePhoto").on("change", function() {
                var imagePathOfFileImage = URL.createObjectURL(event.target.files[0]);
                let img = this.files[0].name;
                const valid_extensions = ["jpg", "jpeg", "png", "gif"];
                let extension = img.split(".");
                if (valid_extensions.includes(extension[1])) {
                    $("#img-modal").html('<img src="' + imagePathOfFileImage + ' ">');
                    $(this).attr("class", "d-none");
                    $("#textWithImage").addClass("d-block");
                } else {
                    Swal.fire('File does not support');
                    $(this).val("");
                }
            });
            $(".imgclose").on("click", function() {
                $("#pagePhoto").attr("class", "d-block").val("");
                $("#img-modal").html("");
                $("#textWithImage").attr("class", "d-none form-control border-0");
            });
        });
        $("#form_submit").on("submit", function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            let img = $("#pagePhoto").val();
            if (img) {
                $.ajax({
                    url: "uploadImage",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $("#pagePost").prepend(data);
                        $("#photoUpModal").modal("hide");
                    }
                });
            } else {
                Swal.fire('Please Select an Image');
            }
        });
    });

    function pagePostLike(id) {
        console.log("clicked", id);
        $("#liketxt-" + id).toggleClass("likeColor");
        // $("#likeIcon-" + id).toggleClass("likeColor");
    }

    function deletePage(id) {
        console.log("clicked", id);
        $.ajax({
            url: "deletePage",
            data: {
                id: id
            },
            success: function(data) {
                notify('success', data);
                $("#deletePage").modal("hide");
                setTimeout(() => {
                    window.location.href = 'pages';
                }, 2000);
            }

        })
    }
    /**************************************************
     * POST CREATTION WITH MULTIPLE IMAGE
     **************************************************/
    function PostCallback(data) {
        // create new post from user wall
        if (data.success) {
            $('#create-post-form').trigger('reset');
            console.log(data);
            notify('success', data.message);
            $('#postBtn').removeAttr('disabled');
            $('#postCreateModal').modal('toggle');
            // $("#new-post-created").load('/user/create-post');
        } else {
            notify('error', data.message);
            console.log(data);
            $('#postBtn').removeAttr('disabled');
        }
    }
    
</script>
<script src="../public/assets/user/js/galary.js"></script>
<script src="../public/assets/user/js/carousel.js"></script>
{% endblock %}