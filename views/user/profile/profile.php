{% extends user/template/app %}
{% block title %}Profile{% endblock %}
{% block pushInHead %}
{% extends user/newsfeed-style %}
{% extends user/profile/profile-style %}
{% endblock %}
{% block content %}
<!-- Top Header-Profile -->
{% extends user/profile/profile-header %}
<div class="container">
    <div class="row">
        <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-sm-12 col-12">
            <div id="newsfeed-items-grid">
                <div class="ui-block">
                    <!-- create a new post -->
                    <article class="hentry post">
                        <div class="post__author author vcard">
                            <img src="../public/uploads/user/<?= userinfois((Auth('user')->id), 'profile_photo');?>" alt="author" class="author-img">
                            <div class="more"><svg class="olymp-three-dots-icon">
                                    <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                </svg>
                                <ul class="more-dropdown">
                                    <li>
                                        <a href="#">Edit Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Post</a>
                                    </li>
                                    <li>
                                        <a href="#">Turn Off Notifications</a>
                                    </li>
                                    <li>
                                        <a href="#">Select as Featured</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- post input -->
                            <form action="/user/create-post" id="create-post-form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <!-- Button trigger modal -->
                                    <textarea class="form-control w-100" style="color:darkgray" id="post-input" data-toggle="modal" data-target="#postCreateModal" placeholder="Create a new post...."></textarea>
                                    <!-- Modal -->
                                    <div class="modal fade " id="postCreateModal" tabindex="-1" role="dialog" aria-labelledby="postCreateModalTitle" aria-hidden="true">
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
                                                            <!-- <button type="button" class="btn btn-primary">Save Post</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </article>
                    <!-- ending create new post -->
                </div>
                <!-- Post -->
                {% foreach($wallposts as $value): %}
                <?php
                $profilePicture = App\Models\Attachment::select('name')->where('attachmentable_id', $userDetails->id)->where("attachmentable_type", "user")->first();
                ?>
                <div id="newsfeed-items-grid">
                <div class="ui-block">
                    <article class="hentry post">
                        <div class="post__author author vcard inline-items">
                            <img src="../public/uploads/user/<?= userinfois($userDetails->id, 'profile_photo');?>" alt="author" class="author-img">
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="#"><?= $value->first_name . " " . $value->last_name; ?></a>
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
                        <p class="p-paging" data-charecter="1">{{ $value->post }}</p>
                        <?php $total_img =0; ?>
                        <?php $post_image = \App\Models\Attachment::where('attachmentable_id', '=', $value->id)
                            ->where('attachmentable_type', '=', 'post')
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
                                            ->where('attachmentable_type', '=', 'post')
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
                        <div class="control-block-button post-control-button">
                            <span id="post-like-box2-{{$value->id}}" data-like-action="<?= likestatus($value->id); ?>" data-id="{{ $value->id}}" data-elemetype="post" class="btn btn-control like-item-element">
                                <div class="livicon-evo" data-options="name: heart.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                            </span>
                            <span href="#" class="btn btn-control">
                                <div class="livicon-evo" data-options="name: comments.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
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
                </div>
                {% endforeach; %}
                <!-- ... end Post -->
            </div>
            <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                </svg>
            </a>
        </div>
       <!-- PROFILE LEFT ASIDE INCLUDE HERE -->
       {% extends user/profile/profile-left-aside %}
        <!-- PROFILE RIGHT ASIDE INCLUDE HERE -->
        {% extends user/profile/profile-right-aside %}
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
                  <-- The Modal 1 -->
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

<script src="../public/assets/user/plugins/chart/core.js"></script>
<script src="../public/assets/user/plugins/chart/charts.js"></script>
<script src="../public/assets/user/plugins/chart/animated.js"></script>
<script src="../public/assets/user/plugins/chart/index.js"></script>

<script src="../public/assets/admin/plugins/common-ajax/common-ajax.js"></script>


<!--  Croppie - A Javascript Image Cropper  -->
<script src="../public/assets/user/plugins/croppie/croppie.js"></script>
<script src="../public/assets/user/plugins/croppie/image-changer-profile.js"></script>

<!-- Trader Following & Coping Script -->
<script src="../public/assets/user/plugins/add-follow-js/add-following.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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