{% extends user/template/app %}
{% block title %}News Feed{% endblock %}
{% block pushInHead %}
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    {% extends user/newsfeed-style %}
    {% extends user/profile/profile-style %}
{% endblock %}
{% block content %}
<!-- Top Header-Profile -->
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <!-- News Feed Form  -->
                <div class="news-feed-form">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">
                                <div class="livicon-evo" data-options="
                                        name: pen.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </div>
                                <span>Status</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">
                                <div class="livicon-evo" data-options="
                                        name: camera.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </div>
                                <span>Multimedia</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
                                <div class="livicon-evo" data-options="
                                        name: link.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </div>
                                <span>Blog Post</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                            <form action="post-status" method="post" id="post-status-form" enctype="multipart/form-data">
                                <div class="author-thumb">
                                    <a href="profile?id=<?= Auth('user')->id ?>">
                                        <?php
                                        $profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', (Auth('user')->id))->where("attachmentable_type", "user")->first();
                                        if (!empty($profilePicture->name)) {
                                            echo '<img src="../public/uploads/user/' . $profilePicture->name . '" alt="author">';
                                        } else {
                                            echo '<img width="100%" src="../public/uploads/user/no-profile.jpg" alt="nature">';
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div id="content" class="form-group with-icon label-floating is-empty">
                                    <input type="file" name="photo[]" onchange="preview_photo()" id="poststatusphoto" />
                                    <textarea id="get_url" name="status" class="form-control" placeholder="Share what you are thinking here...">
                                    </textarea>
                                    <div id="results" class="d-none">
                                        <iframe src="" id="LinkContainer" name="iframe_a" height="300px" width="100%" title="Iframe Example" frameborder="0"></iframe>
                                    </div>
                                </div>
                                <!-- Image or media upload preview -->
                                <div id="file-preview-wrappper">
                                    <ul>
                                        <li>
                                            <span onclick="removestatusphoto()" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            <img src="'../../public/assets/uploads/user/no-image.jpg'" id="uploadedimg" class="img-item" alt="Preview image" />
                                        </li>

                                    </ul>
                                </div>
                                <div class="add-options-message">
                                    <a data-target="#update-header-photo" class="options-message" data-toggle="modal" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTOS">
                                        <div class="livicon-evo" data-options="
                                        name: camera.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="TAG YOUR FRIENDS">
                                        <div class="livicon-evo" data-options="
                                        name: desktop.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD LOCATION">
                                        <div class="livicon-evo" data-options="
                                        name: location.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>
                                    <button type="button" id="postStatusBtn" data-file="true" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-btnid="postStatusBtn" data-form="post-status-form" data-validator="true" data-callback="statusPostCallback" class="btn btn-primary btn-md-2" onclick="_run(this)">Post Status</button>
                                    <button type="button" id="postPreview" data-toggle="modal" data-target="#previewBtn" class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
                            <form>
                                <div class="author-thumb">
                                    <img src="../public/uploads/user/<?= $profilePicture->name; ?>" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <label class="control-label">Share what you are thinking here...</label>
                                    <textarea id="get_url" class="form-control" placeholder=""></textarea>
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTOS">
                                        <div class="livicon-evo" data-options="
                                        name: camera.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="TAG YOUR FRIENDS">
                                        <div class="livicon-evo" data-options="
                                        name: desktop.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>

                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD LOCATION">
                                        <div class="livicon-evo" data-options="
                                        name: location.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>
                                    <button class="btn btn-primary btn-md-2">Post Status</button>
                                    <button id="postPreview" data-toggle="modal" data-target="#previewBtn" class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
                            <form>
                                <div class="author-thumb">
                                    <img src="../public/uploads/user/<?= $profilePicture->name; ?>" alt="author">
                                </div>
                                <div class="form-group with-icon label-floating is-empty result">
                                    <label class="control-label">Share what you are thinking here...</label>
                                    <textarea id="get_url" class="form-control" placeholder=""></textarea>
                                </div>
                                <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTOS">
                                        <div class="livicon-evo" data-options="
                                        name: camera.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="TAG YOUR FRIENDS">
                                        <div class="livicon-evo" data-options="
                                        name: desktop.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD LOCATION">
                                        <div class="livicon-evo" data-options="
                                        name: location.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #c2c5d9;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                        </div>
                                    </a>
                                    <button class="btn btn-primary btn-md-2">Post Status</button>
                                    <button id="postPreview" data-toggle="modal" data-target="#previewBtn" class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ... end News Feed Form  -->
            </div>
            <div id="newsfeed-items-grid">
                <?php $isUpdated = true;  ?>
                {% foreach($newsfeedposts as $value): %}
                <div class="ui-block">
                    <article class="hentry post">
                        <div class="post__author author vcard inline-items">
                            <!-- authore image in post -->
                            <img src="../public/uploads/user/<?= userinfois($value->idofusers, 'profile_photo');?>" alt="author">

                            <div class="author-date">
                                <a class="h6 post__author-name fn" id="userfname" href="profile?id=<?= $value->idofusers; ?>"><?= $value->first_name . " " . $value->last_name; ?></a>
                                <div class="post__date">
                                    <time class="published" data-toggle="tooltip" title="<?= timeis($value->created_at); ?>" datetime="2004-07-24T18:18">
                                        <?= timeis($value->created_at, 'moment'); ?>
                                    </time>
                                </div>
                            </div>
                            <div class="more"><svg class="olymp-three-dots-icon">
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
                        <p id="description" class="description_<?= $value->id; ?> show-more-text" data-char="1">{{ $value->post }}</p>
                        <!-- ===============================================
                            GET POST IMAGES BY QUERY
                        ====================================================== -->
                        <?php $total_img =0; ?>
                        <?php $post_image = \App\Models\Attachment::where('attachmentable_id', '=', $value->id)->where('attachmentable_type', '=', 'post')->select('name','id','attachmentable_id')->get();
                        $i = 1; $item = 1;
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
                                            <div class="row preview-img-row">
                                                <!--================================
                                                    HERE LOAD THE  PREVIEW IMAGE
                                                =================================-->
                                            </div>
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
                                                        <input id="file-input<?php echo($value->id);?>" type="file" name="image[]" multiple class="input-post-img"/>
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
                                ->where('attachmentable_type', '=', 'post')
                                ->select('name')->first();
                            $profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', $postHave->user_id)->where("attachmentable_type", "user")->first();

                            echo "<hr>";
                            ?>
                            <div class="post__author author vcard inline-items">
                                <img src="../public/uploads/user/<?= $profilePicture->name ?>" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="profile?id=<?= $postHave->user_id; ?>"><?= userinfois($postHave->user_id); ?></a>
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
                            IMAGE OPEN IN A MODAL FROM GALARY
                            image open in a modal
                         =========================================-->
                        <?php $total_img = count($post_image); ?>
                        <?php if($total_img<=2): ?>
                            <?php if ($total_img!=0): ?>
                                <div class="post-thumb position-relative">
                                    <div class="d-flex galary">
                                        <?php foreach($post_image as $img): ?>
                                            <!-- Trigger the Modal -->
                                            <?php if($i<=2):?>
                                                <div class="custom-col-lg flex-fill">
                                                    <div class="grid-image-con overflow-hidden">
                                                        <img id="grid_image<?php echo $i;?>" src="{{ asset('public/uploads/user/post/') }}<?= $img->name; ?>" alt="Status Image" class="img img-fluid galary-img" data-image_id="<?php echo($i);?>" data-total_img="<?php echo($total_img);?>">
                                                    </div>
                                                </div>
                                                <?php $i++;?>
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- THE MODAL -->
                                    <div id="myModal_<?php isset($img)?$img->id:""; ?>" class="img-modal">
                                        <!-- GALARY MODAL CONTENT LOAD HERE -->
                                        {% extends user/profile/galary-modal %}
                                    </div> 
                                </div>
                                <!-- ENDING THE MODAL -->
                            <?php endif; ?>
                        <?php elseif($total_img<5 && $total_img>3): ?>
                            <!-- IF GALARY IMAGE MORE LESS THAN 5 -->
                            <?php if ($total_img!=0): ?>
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
                                                        <img id="grid_image<?php echo $i;?>" src="{{ asset('public/uploads/user/post/') }}<?= $img->name; ?>" alt="Status Image" class="img img-fluid galary-img" data-image_id="<?php echo($i);?>" data-total_img="<?php echo($total_img);?>">
                                                    </div>
                                                </div>
                                                <?php $i++?>
                                            <?php endif;?>
                                        {% endforeach; %}
                                    </div>
                                    <!-- THE MODAL -->
                                    <div id="myModal_<?php isset($img)?$img->id:null; ?>" class="img-modal">
                                        <!-- GALARY MODAL CONTENT LOAD HERE -->
                                        {% extends user/profile/galary-modal %}
                                    </div>
                                    <!-- ENDING THE MODAL -->
                                </div>
                            <?php   endif; ?>
                        <?php else: ?>
                            <?php if ($total_img!=0): ?>
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
                                    <div id="myModal_<?php isset($img)?$img->id:null; ?>" class="img-modal">
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
                                    <div class="livicon-evo" data-options="name: comments.svg;size: 30px; style: lines; strokeColor: #888da8;"></div>
                                    <span>{{count($value->comments)}}</span>
                                </span>
                                <span class="cursor-pointer-finger post-add-icon inline-items" onclick="sharethispost({{ $value->id}})" data-toggle="modal" data-target="#postShareModal">
                                    <div class="livicon-evo" data-options="name: share.svg;size: 30px; style: lines; strokeColor: #888da8;"></div>
                                    <span>0</span>
                                </span>
                            </div>
                        </div>
                        <div class="control-block-button post-control-button">
                            <span id="post-like-box2-{{$value->id}}" data-like-action="<?= likestatus($value->id); ?>" data-id="{{ $value->id}}" data-elemetype="post" class="btn btn-control like-item-element">
                                <div class="livicon-evo" data-options="name: heart.svg; size:30px; style:lines; strokeColor: #fff;"></div>
                            </span>
                            <span href="#" class="btn btn-control">
                                <div class="livicon-evo" data-options="name: comment.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                            </span>
                            <span href="#" class="btn btn-control">
                                <div class="livicon-evo" data-options="name: share.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                            </span>
                        </div>
                    </article>
                    <!-- ============================================================
							Comments Area Start
                    ===============================================================-->
                    <div class="comments-wrapper">
                        <ul class="comments-list" id="post-comment-{{$value->id}}" data-item="1" data-size="1">
                            {% foreach($value->comments as $comment): %}
                            <li class="comment-item">
                                <div class="post__author author vcard inline-items">
                                    <img src="../public/uploads/user/<?= userinfois($comment->comment_by, 'profile_photo');?>" alt="author">
                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="profile?id=<?= $comment->comment_by; ?>"><?= userinfois($comment->comment_by, 'name'); ?></a>
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
                                    <?php if (isset($comment->attach->name)) { ?>
                                        <div class="comment-image-wrapper">
                                            <img src="{{ asset('public/uploads/user/comment/') }}<?= $comment->attach->name; ?>" alt="Comment Image" class="comment-img"/>
                                        </div>
                                        <div class="comment-img-modal mCustomScrollbar" data-mcs-theme="dark">
                                            <!-- =================================
                                                HERE LOAD THE COMMET IMAGE MODAL
                                            ====================================== -->
                                            {% extends user/profile/comment-img-modal %}
                                        </div>
                                    <?php } ?>
                                    <span id="comment-like-box-{{$comment->id}}" data-like-action="<?= likestatus($comment->id, 'comment'); ?>" data-id="{{ $comment->id}}" data-elemetype="comment" class="like-item-element post-add-icon inline-items">
                                        <div class="livicon-evo" data-options="name: heart.svg;size: 30px; style:lines; strokeColor: #888da8;"></div>
                                        <span id="total-comment-like-view-{{$value->id}}"><?= totallike($comment->id, 'comment'); ?></span>
                                    </span>
                                    <!-- =========================================
                                            REPLY OPERATION BEGIN HERE  
                                    ===============================================-->
                                    <div id="replyAgain"></div>
                                    <input type="hidden" class="idBtn" id="<?= $value->idofusers ?>">
                                    <a style="cursor:pointer;" id="reply-btn-<?= $comment->id ?>" onclick="showReplyForm(<?= $comment->id ?>, '<?= $comment->users->first_name . ' ' . $comment->users->last_name; ?>')" class="reply">Reply</a>
                                    <!-- Reply Form Start -->
                                    <form action="reply" method="post" id="reply-form-<?= $comment->id ?>" class="d-none comment-form inline-items" enctype="multipart/form-data">
                                        <div class="post__author author vcard inline-items">
                                            <img src="../public/uploads/user/<?= userinfois((Auth('user')->id), 'profile_photo');?>" alt="author">
                                            <div class="form-group with-icon-right ">
                                                <textarea name="reply" class="form-control rounded-pill" id="replyData-<?= $comment->id ?>" placeholder="Type Your Reply here">
                                            </textarea>
                                                <input type="hidden" name="replyid" value="<?= $comment->id ?>" />
                                                <input class="d-none" data-reply-wrapper="<?= $comment->id ?>" data-reply-file="<?= $comment->id ?>" onchange="preview_file_photo(this)" type="file" name="replyfile[]" id="file-attach-field-<?= $comment->id ?>" />
                                                <div class="add-options-message">
                                                    <label for="file-attach-field-<?= $comment->id ?>" class="options-message">
                                                        <svg class="olymp-camera-icon">
                                                            <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                                        </svg>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start reply  Attach Photo Preview -->
                                        <div class="comment-image-wrapper dd-none" style="display:none !important;" id="comment-wrapper-{{$value->id}}">
                                            <span onclick="remove_comment_photo<?= $value->id ?>" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            <img src="" alt="Image Of Comment Attachment" />
                                        </div>
                                        <!-- End reply Attach Photo Preview -->
                                        <button type="button" id="ReplyPostBtn<?= $comment->id ?>" data-btnid="ReplyPostBtn<?= $comment->id ?>" data-post-id="<?= $comment->id ?>" data-file="true" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="reply-form-<?= $comment->id ?>" data-validator="true" data-callback="ReplyPostCallback" onclick="_run(this)" class="btn btn-md-2 btn-primary">Reply</button>
                                    </form>
                                    <!-- Reply Form End -->
                                    {%foreach($comment->reply as $reply):%}
                                    <div id='repliedText-{{$reply->id}};'>
                                        <h6><?= $reply->user->first_name . " " . $reply->user->last_name ?></h6>
                                        <p class="ml-5">{{$reply->reply}}</p>
                                    </div>
                                    {%endforeach%}
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
                            <img src="../public/uploads/user/<?= userinfois((Auth('user')->id), 'profile_photo');?>" alt="author">
                            <div class="form-group with-icon-right ">
                                <textarea name="comment" class="form-control textarea-comment" placeholder=""></textarea>
                                <input type="hidden" name="postid" value="{{$value->id}}" />
                                <input class="comment-file-input d-none" data-comment-wrapper="1{{$value->id}}" data-comment-file="{{$value->id}}" onchange="preview_file_photo(this)" type="file" name="commentfile[]" id="comment-file-input-{{$value->id}}" />
                                <!-- <input type="file" name="commentfile[]" id="file-attach-field-{{$value->id}}" class="comment-file-input"> -->
                                <div class="add-options-message">
                                    <label for="comment-file-input-{{$value->id}}" class="options-message">
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
                            <img src="" alt="Image Of Comment Attachment" />
                        </div>
                        <!-- End Comment Attach Photo Preview -->
                        <button type="button" id="postCommentBtn{{$value->id}}" data-btnid="postCommentBtn{{$value->id}}" data-post-id="{{$value->id}}" data-file="true" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="comment-form-{{$value->id}}" data-validator="true" data-callback="CommentPostCallback" onclick="_run(this)" class="btn btn-primary btn-submit-comment" style="display:none">Post Comment</button>
                    </form>
                    <!-- ... end Comment Form  -->
                    <!-- ============================================================
							Comments Area End
				    ===============================================================-->
                </div>
                {% endforeach; %}
            </div>
            <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                </svg>
            </a>
        </main>
        <!-- ... end Main Content -->
        <!-- Left Sidebar -->
        <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
            <!-- Trade You May Like 1 -->
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Trade You May Like</h6>
                    <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                            <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                    </a>
                </div>
                <!-- W-Friend-Pages-Added -->
                <ul class="widget w-friend-pages-added notification-list friend-requests">
                    <li class="inline-items" style="border-left: 4px solid #263858;">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">All Item</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="All Item">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Forex</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Forex">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Trading News</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Trading News">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Following</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Following">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Crypto Currency</a>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="Crypto Currency">
                            <div class="togglebutton">
                                <label>
                                    <input type="checkbox" checked="">
                                </label>
                            </div>
                        </span>
                    </li>
                </ul>
                <!-- .. end W-Friend-Pages-Added -->
            </div>

            <!-- Trade You May Like 2  -->
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Trade You May Like</h6>
                    <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                            <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                    </a>
                </div>
                <!-- W-Friend-Pages-Added -->
                <ul class="widget w-friend-pages-added notification-list friend-requests">
                    <li class="inline-items">
                        <div class="author-thumb no-rds">
                            <img src="../public/assets/user/icon/pair/eur_usd.svg" alt="author" style="border-radius: 0px;">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">EUR/USD</a>
                            <span class="chat-message-item">
                                <span class="text-danger">8.475857</span> |
                                <span class="text-success">7.484748</span>
                            </span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="START TRADING">
                            <a href="#">
                                <div class="livicon-evo" data-options="
                                        name: bar-chart.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #053788;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </div>
                            </a>
                        </span>

                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="../public/assets/user/icon/pair/gbp_usd.svg" alt="gbpusd" style="border-radius: 0px;">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">GBP/USD</a>
                            <span class="chat-message-item">
                                <span class="text-danger">8.475857</span> |
                                <span class="text-success">7.484748</span>
                            </span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <div class="livicon-evo" data-options="
                                        name: bar-chart.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #053788;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </div>
                            </a>
                        </span>
                    </li>
                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="../public/assets/user/icon/pair/usd_chf.svg" alt="usdchf" style="border-radius: 0px;">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">USD/CHF</a>
                            <span class="chat-message-item">
                                <span class="text-success">8.475857</span> |
                                <span class="text-danger">7.484748</span>
                            </span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <div class="livicon-evo" data-options="
                                        name: bar-chart.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #053788;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </div>
                            </a>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="../public/assets/user/icon/pair/usd_hkd.svg" alt="USDHKD" style="border-radius: 0px;">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">USD/HKD</a>
                            <span class="chat-message-item">
                                <span class="text-danger">8.475857</span> |
                                <span class="text-success">7.484748</span>
                            </span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <div class="livicon-evo" data-options="
                                        name: bar-chart.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #053788;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </div>
                            </a>
                        </span>
                    </li>

                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="../public/assets/user/icon/pair/aud_cad.svg" alt="AUDCAD" style="border-radius: 0px;">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">AUD/CAD</a>
                            <span class="chat-message-item">
                                <span class="text-success">8.475857</span> |
                                <span class="text-danger">7.484748</span>
                            </span>
                        </div>
                        <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                            <a href="#">
                                <div class="livicon-evo" data-options="
                                        name: bar-chart.svg;
                                        style: lines;
                                        size: 30px;
                                        strokeColor: #053788;
                                        strokeWidth: 1;
                                        eventOn: parent;
                                        eventType: hover">
                                </div>
                            </a>
                        </span>
                    </li>
                </ul>
                <!-- .. end W-Friend-Pages-Added -->
            </div>
            <!-- TradeBook Deposit Now  -->
            <div class="widget w-action">
                <img src="../public/assets/user/img/logo.png" alt="Olympus">
                <div class="content">
                    <h4 class="title">TRADEBOOK</h4>
                    <span>GET 100% BONUS ON DEPOSIT!</span>
                    <a href="#" class="btn btn-bg-secondary btn-md">Deposit Now!</a>
                </div>
            </div>
        </aside>
        <!-- ... end Left Sidebar -->
        <!-- Right Sidebar -->
        <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
            <!-- Happy Birthday Block -->
            <div class="ui-block">
                <!-- W-Birthsday-Alert -->
                <div class="widget w-birthday-alert">
                    <div class="icons-block">
                        <i class="fa fa-copy"></i>
                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="content">
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar48-sm.jpg" alt="author">
                        </div>
                        <span>Notification </span>
                        <a href="#" class="h4 title">Marina Just Copied <span class="h4 title text-success">James Summers!</span></a>
                        <p>Leave her a message with your best wishes on her profile page!</p>
                    </div>
                </div>
                <!-- ... end W-Birthsday-Alert -->
            </div>
            <!-- Top Traders Block -->
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Top Traders</h6>
                    <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                    </a>
                </div>
                <!-- W-Action -->
                <ul class="widget w-friend-pages-added notification-list friend-requests">
                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar38-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Francine Smith</a>
                            <span class="chat-message-item">8 Friends in Common</span>
                        </div>
                        <span class="notification-icon">
                            <a href="#" class="accept-request">
                                <span class="icon-add without-text">
                                    <i class="fa fa-copy lic"></i>
                                </span>
                            </a>
                        </span>
                    </li>
                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar39-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Hugh Wilson</a>
                            <span class="chat-message-item">6 Friends in Common</span>
                        </div>
                        <span class="notification-icon">
                            <a href="#" class="accept-request">
                                <span class="icon-add without-text">
                                    <i class="fa fa-copy lic"></i>
                                </span>
                            </a>
                        </span>
                    </li>
                    <li class="inline-items">
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar40-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Karen Masters</a>
                            <span class="chat-message-item">6 Friends in Common</span>
                        </div>
                        <span class="notification-icon">
                            <a href="#" class="accept-request">
                                <span class="icon-add without-text">
                                    <i class="fa fa-copy lic"></i>
                                </span>
                            </a>
                        </span>
                    </li>
                </ul>
                <!-- ... end W-Action -->
            </div>
            <!-- Activity Feed Block -->
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Activity Feed</h6>
                    <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                    </a>
                </div>
                <!-- W-Activity-Feed -->
                <ul class="widget w-activity-feed notification-list">
                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar49-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Marina Polson</a> commented on Jason Mark’s <a href="#" class="notification-link">photo.</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 mins ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar9-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Jake Parker </a> liked Nicholas Grissom’s <a href="#" class="notification-link">status update.</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">5 mins ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar50-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Mary Jane Stark </a> added 20 new photos to her <a href="#" class="notification-link">gallery album.</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">12 mins ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar51-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Nicholas Grissom </a> updated his profile <a href="#" class="notification-link">photo</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar48-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Marina Valentine </a> commented on Chris Greyson’s <a href="#" class="notification-link">status update</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar52-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Green Goo Rock </a> posted a <a href="#" class="notification-link">status update</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Elaine Dreyfuss </a> liked your <a href="#" class="notification-link">blog post</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Elaine Dreyfuss </a> commented on your <a href="#" class="notification-link">blog post</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="../public/assets/user/img/avatar53-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Bruce Peterson </a> changed his <a href="#" class="notification-link">profile picture</a>.
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">15 hours ago</time></span>
                        </div>
                    </li>

                </ul>

                <!-- .. end W-Activity-Feed -->
            </div>
            <!-- Right Side Register Now -->
            <div class="ui-block">
                <!-- W-Action -->
                <div class="widget w-action">
                    <img src="../public/assets/user/img/logo.png" alt="Olympus">
                    <div class="content">
                        <h4 class="title">OLYMPUS</h4>
                        <span>THE BEST SOCIAL NETWORK THEME IS HERE!</span>
                        <a href="01-LandingPage.html" class="btn btn-bg-secondary btn-md">Register Now!</a>
                    </div>
                </div>
                <!-- ... end W-Action -->
            </div>
        </aside>
        <!-- ... end Right Sidebar -->
    </div>
</div>


<!-- Window-popup Update Header Photo -->
<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
    <div class="modal-dialog window-popup update-header-photo" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Update Header Photo</h6>
            </div>

            <div class="modal-body">
                <label for="poststatusphoto" href="#" class="upload-photo-item">
                    <svg class="olymp-computer-icon">
                        <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                    </svg>

                    <!-- <label for="poststatusphoto"> -->
                    <h6>Upload Photo</h6>
                    <span>Browse your computer.</span>
                    <!-- </label> -->
                </label>

                <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

                    <svg class="olymp-photos-icon">
                        <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                    </svg>

                    <h6>Choose from My Photos</h6>
                    <span>Choose from your uploaded photos</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- ... end Window-popup Update Header Photo -->
<!-- Window-popup Choose from my Photo -->
<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
    <div class="modal-dialog window-popup choose-from-my-photo" role="document">

        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                </svg>
            </a>
            <div class="modal-header">
                <h6 class="title">Choose from My Photos</h6>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
                            <svg class="olymp-photos-icon">
                                <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
                            <svg class="olymp-albums-icon">
                                <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="modal-body">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo1.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo2.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo3.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo4.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo5.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo6.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>

                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo7.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo8.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <div class="radio">
                                <label class="custom-radio">
                                    <img src="../public/assets/user/img/choose-photo9.jpg" alt="photo">
                                    <input type="radio" name="optionsRadios">
                                </label>
                            </div>
                        </div>
                        <a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
                        <a href="#" class="btn btn-primary btn-lg btn--half-width">Confirm Photo</a>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../public/assets/user/img/choose-photo10.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">South America Vacations</a>
                                    <span>Last Added: 2 hours ago</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../public/assets/user/img/choose-photo11.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">Photoshoot Summer 2016</a>
                                    <span>Last Added: 5 weeks ago</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../public/assets/user/img/choose-photo12.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">Amazing Street Food</a>
                                    <span>Last Added: 6 mins ago</span>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../public/assets/user/img/choose-photo13.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">Graffity & Street Art</a>
                                    <span>Last Added: 16 hours ago</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../public/assets/user/img/choose-photo14.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">Amazing Landscapes</a>
                                    <span>Last Added: 13 mins ago</span>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="choose-photo-item" data-mh="choose-item">
                            <figure>
                                <img src="../public/assets/user/img/choose-photo15.jpg" alt="photo">
                                <figcaption>
                                    <a href="#">The Majestic Canyon</a>
                                    <span>Last Added: 57 mins ago</span>
                                </figcaption>
                            </figure>
                        </div>


                        <a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
                        <a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ... end Window-popup Choose from my Photo -->

<!-- START PREVIEW MODAL  -->

<div class="modal fade" id="previewBtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div id="premodbody" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Start Post Share Modal -->
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
                <button id="postShareBtn" data-btnid="postShareBtn" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="share-form" data-validator="true" data-callback="sharePostCallback" onclick="_run(this)" type="button" class="btn btn-primary">Share</button>
            </div>
        </div>
    </div>
</div>


<!-- End Post Share Modal -->
{% endblock %}


{% block pushInEnd %}
<script src="../public/assets/admin/plugins/common-ajax/common-ajax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
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

    function removestatusphoto() {
        $('#file-preview-wrappper').hide();
        let frame = document.querySelector('#file-preview-wrappper .img-item');
        frame.src = '';
        $('#poststatusphoto').val('');
    }
    /* End Image View For Post Status */
    function statusPostCallback(data) {
        $('#postStatusBtn').prop('disabled', true);

        if (data.success) {
            $('#postStatusBtn').prop('disabled', false);
            notify('success', data.message);
            $('#post-status-form')[0].reset();
            $('#post-status-form textarea').text('');
            removestatusphoto();
            realTimePostSocket(data.lastpostid, 'post');

        } else {
            $('#postStatusBtn').prop('disabled', false);
            notify('error', data.message);
            $._validator("post-status-form", data.errors);
        }
    }
    // Comment CallBack 
    function CommentPostCallback(data) {
        if (data.success) {
            $('#postCommentBtn' + data.postid).prop('disabled', false);
            realTimePostSocket(data.lastcommentid, 'comment');
            // Script For Post Share Notification
            notificationSocket(data.broadcastto, 'comment');
            $('#comment-form-' + data.postid).find('textarea').val('');
        } else {
            notify('error', data.message);
            $._validator("comment-form-" + data.postid, data.errors);
        }
    }
    // Reply CallBack 
    function ReplyPostCallback(data) {
        if (data.success) {
            $('#ReplyPostBtn' + data.replyid).prop('disabled', false);
            realTimePostSocket(data.lastreplyid, 'reply');
            // Script For Post Share Notification
            notificationSocket(data.broadcastto, 'reply');
            $('#reply-form-' + data.replyid).find('textarea').val('');


        } else {

            notify('error', data.message);
            $._validator("reply-form-" + data.replyid, data.errors);
        }
    }

    // Shared Post CallBack
    function sharePostCallback(data) {

        if (data.success) {
            // Script For Post Share Notification
            notificationSocket(data.broadcastto, 'post_share');
            realTimePostSocket(data.lastpostid, 'post');
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

                        // Notification Init for like post, comment
                        notificationSocket(data.broadcastto, likeAction, itemtype);

                    }



                }
            },
            error: function(e) {
                console.log(e)
            }
        });

    });


    /*******************************************
     *       Share This Post
     *******************************************/
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



    /****************************************************************
     *          Socket For New Post Appending
     ************************************************************/
    function realTimePostSocket(newpostid, type) {
        let newPostId = newpostid;
        let itemType = type;


        /**
         * Send New Post Information To The Server
         */
        socket.emit('newpostforuser', {
            newPostId: newPostId,
            itemtype: itemType
        });
    }


    // Broadcast Post & Comment To The Users
    socket.on('newpost', ({
        newPostId,
        itemtype
    }) => {

        var latestPostId = newPostId;
        var itemType = itemtype;

        //alert('Post id is:- '+latestPostId+' Item type'+itemType);


        $.ajax({
            url: 'real-time-post-comment',
            type: 'POST',
            dataType: 'json',
            data: {
                op: 'realtimepost',
                lastitem: latestPostId,
                itemtype: itemType
            },
            success: function(data) {
                if (data.success) {
                    if (itemType == 'post') {
                        $('#newsfeed-items-grid').prepend(data.elementHtml);
                    } else if (itemType == 'comment') {
                        let commentOnPostId = data.commmentpostid;
                        $('#post-comment-' + commentOnPostId).append(data.elementHtml);
                    } else if (itemType == 'reply') {
                        $('#repliedText-' + data.replyPostid).append(data.reply);
                    }

                    $('.livicon-evo').addLiviconEvo();

                }
            },
            error: function(e) {
                console.log(e)
            }
        });
    });
    
    // comment reply 
    function showReplyForm(id, username) {
        $("#reply-form-" + id).addClass('d-block');
        $('#replyData-' + id).val(username);

        $('#ReplyPostBtn' + id).click(function(e) {
            e.preventDefault();
            const replyData = $('#replyData-' + id).val();
            $.ajax({
                url: "reply",
                type: "POST",
                data: {
                    id: id,
                    replyData: replyData
                },
                success: function(res) {
                    const reply = JSON.parse(res)[0];
                    // $('#repliedText-' + reply.id).append(reply.reply);
                    // console.log("preppended");

                }
            })
            $('#replyData-' + id).val('');
            $('#replyAgain').addClass('d-block');

        })
    }
    /************************************************
    *REPLY FORM IN GALARY MODAL
    ************************************************ */
    function modalReplyForm(id, username) {
        $("#modal-reply-form-" + id).addClass('d-block');
        $('#modal-replyData-' + id).val(username);

        $('#modalReplyPostBtn' + id).click(function(e) {
            e.preventDefault();
            const replyData = $('#modal-replyData-' + id).val();
            $.ajax({
                url: "reply",
                type: "POST",
                data: {
                    id: id,
                    replyData: replyData
                },
                success: function(res) {
                    const reply = JSON.parse(res)[0];
                }
            })
            $('#modal-replyData-' + id).val('');
            $('#modal-replyAgain').addClass('d-block');

        })
    }
    // get url 
    $('#get_url').keyup(function(e) {
        let input = $('#get_url').val();
        let urlRegex = /(www.[^ ]*|https?:\/\/[^ ]*)/;
        let url = input.match(urlRegex);
        if (url) {
            $.ajax({
                url: 'preview',
                method: 'post',
                data: {
                    url: url[1]
                },
                success: function(data) {
                    let urlData = JSON.parse(data);
                    if (urlData.embed) {
                        $('#results').addClass('d-block');
                        $('#results').html(`
                        <div class="row">
                            <div class="col-md-12">
                            ` + urlData.embed + `
                            </div>
                        </div>                                        
                    `);
                    } else {
                        $('#results').addClass('d-block');
                        $('#results').html(`
                        <div class="row">
                            <div class="col-md-5">
                            <img float="right" width="250px" height="250px" src="` + urlData.cover + `">
                            </div>
                            <div class="col-md-7">
                            <h5 class="mt-1">` + urlData.title + `</h5>
                            <p class="text-muted">` + urlData.description + `</p>
                            </div>
                        </div> 
                        `);
                    }

                }
            })

        }
    });
    // preview modal button  
    $('#postPreview').click(function(e) {
        $('#previewBtn').modal('show');
        let input = $('#get_url').val();
        let src = $('#uploadedimg').attr("src");
        if (input && src.includes('blob')) {
            $('#premodbody .modal-body').html(`
            <p>` + input + `</p>
            <img src = "` + src + `" />
           `);
        } else if (src.includes('blob')) {
            $('#premodbody .modal-body').html(`
            <img src = "` + src + `" />           
           `);
        } else {
            $('#premodbody .modal-body').text(input);
        }

    });
</script>
<script src="../public/assets/user/js/galary.js"></script>
<script src="../public/assets/user/js/carousel.js"></script>
{% endblock %}