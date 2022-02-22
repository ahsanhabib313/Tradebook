<!-- Modal Content (The Image) -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="modal-img-container">
                <!-- The Close Button -->
                <span class="close modal-close">&times;</span>
                <!-- <span class="livicon-evo galary-trash" data-options="
                    name: trash.svg;
                    style: lines;
                    size: 40px;
                    strokeColor: #c2c5d9;
                    strokeWidth: 2;
                    eventOn: parent;
                    eventType: hover">
                </span> -->
                <button class="modal-prev">
                    <span class="livicon-evo" data-options="
                        name: angle-wide-left.svg;
                        style: lines;
                        size: 40px;
                        strokeColor: #c2c5d9;
                        strokeWidth: 2;
                        eventOn: parent;
                        eventType: hover">
                    </span>
                </button>
                <div class="galary-modal-inner-container mCustomScrollbar" data-mcs-theme="dark">
                    <img class="galary-modal-content" id="img_<?php $img->id?>">
                </div>
                <button class="modal-next">
                    <span class="livicon-evo" data-options="
                        name: angle-wide-right.svg;
                        style: lines;
                        size: 40px;
                        strokeColor: #c2c5d9;
                        strokeWidth: 2;
                        eventOn: parent;
                        eventType: hover">
                    </span>
                </button>
            </div>
        </div>
        <div class="col-lg-3">
            <!-- GALARY MODAL ASIDE RIGHT -->
            <div class="galary-modal-aside border p-3 bg-white mCustomScrollbar" data-mcs-theme="dark">
                <!-- POST AUTHORE IN GALARY MODAL -->
                <div class="post__author author vcard inline-items d-flex">
                    <div class="galary-auth-img-con mr-lg-3">
                        <img src="../public/uploads/user/<?= userinfois($value->idofusers,'profile_photo'); ?>" alt="author" class="galary-authore-img">
                    </div>
                    <div class="author-date w-100">
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
                <!-- POST TEXT IN GALARY MODAL -->
                <p id="description" class="description_<?= $value->id; ?>">{{ $value->post }}</p>
                <!-- Post Edit Modal  -->
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
                <!-- POST SHARE IN GALARY MODAL -->
                {% if($value->shared != 0){ %}
                    <div class="shared-post-content-wrapper">
                        <!-- Post Image If Have -->
                        <?php
                        $postHave = \App\Models\Post::where('id', '=', $value->shared)->select('post', 'user_id', 'created_at')->first();
                        $imageOfPost = \App\Models\Attachment::where('attachmentable_id', '=', $value->shared)
                                        ->where('attachmentable_type', '=', 'post')
                                        ->select('name')->first();
                        echo "<hr>";
                        ?>
                        <div class="post__author author vcard inline-items">
                            <img src="../public/uploads/user/<?= userinfois($postHave->user_id,'profile_photo'); ?>" alt="author">
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
                <!-- POST ADDITIONAL OPTION IN GALARY MODAL -->
                <article class="post-additional-info inline-items">
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
                </article>
                <!-- ==================================================
                        POST COMMETS IN GALARY MODAL
                ========================================================-->
                <div class="comments-wrapper">
                    <ul class="comments-list" data-item="1" data-size="1">
                        {% foreach($value->comments as $comment): %}
                        <li class="comment-item">
                            <div class="post__author author vcard inline-items">
                                <img src="../public/uploads/user/<?= userinfois($comment->comment_by, 'profile_photo');?>" alt="author">
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
                                                HERE LOAD THE COMMET MODAL
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
                                <!-- =========================================
                                        REPLY OPERATION BEGIN HERE  
                                ===============================================-->
                                <div id="replyAgain"></div>
                                <input type="hidden" class="idBtn" id="<?= $value->idofusers ?>">
                                <a style="cursor:pointer;" id="modal-reply-btn-<?= $comment->id ?>" onclick="modalReplyForm(<?= $comment->id ?>, '<?= $comment->users->first_name . ' ' . $comment->users->last_name; ?>')" class="reply">Reply</a>
                                <!-- Reply Form Start -->
                                <form action="reply" method="post" id="modal-reply-form-<?= $comment->id ?>" class="d-none comment-form inline-items" enctype="multipart/form-data">
                                    <div class="post__author author vcard inline-items">
                                        <img src="../public/uploads/user/<?= userinfois((Auth('user')->id), 'profile_photo');?>" alt="author">
                                        <div class="form-group with-icon-right ">
                                            <textarea name="reply" class="form-control rounded-pill" id="modal-replyData-<?= $comment->id ?>" placeholder="Type Your Reply here">
                                        </textarea>
                                            <input type="hidden" name="replyid" value="<?= $comment->id ?>" />
                                            <input class="d-none" data-reply-wrapper="<?= $comment->id ?>" data-reply-file="<?= $comment->id ?>" onchange="modal_preview_file(this)" type="file" name="replyfile[]" id="modal-file-attach-field-<?= $comment->id ?>" />
                                            <div class="add-options-message">
                                                <label for="modal-file-attach-field-<?= $comment->id ?>" class="options-message">
                                                    <svg class="olymp-camera-icon">
                                                        <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                                    </svg>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start reply  Attach Photo Preview -->
                                    <div class="comment-image-wrapper dd-none" style="display:none !important;" id="modal-comment-wrapper-{{$value->id}}">
                                        <span onclick="remove_modal_preview_file(<?= $value->id ?>)" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        <img src="" alt="Image Of Comment Attachment" />
                                    </div>
                                    <!-- End reply Attach Photo Preview -->
                                    <button type="button" id="modalReplyPostBtn<?= $comment->id ?>" data-btnid="modalReplyPostBtn<?= $comment->id ?>" data-post-id="<?= $comment->id ?>" data-file="true" data-loading="<i class='fas fa-sync-alt fa-spin fa-1x fa-fw'></i>" data-form="modal-reply-form-<?= $comment->id ?>" data-validator="true" data-callback="ReplyPostCallback" onclick="_run(this)" class="btn btn-md-2 btn-primary">Reply</button>
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
                <!-- ==========================================
                    COMMETS FORM IN GALARY MODAL 
                ================================================-->
                <hr>
                <form action="post-comment" method="post" id="modal-comment-form-{{$value->id}}" class="comment-form inline-items" enctype="multipart/form-data">
                    <div class="post__author author vcard inline-items">
                        <img src="../public/assets/user/img/author-page.jpg" alt="author" class="author-img">
                        <div class="form-group with-icon-right ">
                            <textarea name="comment" class="form-control" placeholder=""></textarea>
                            <input type="hidden" name="postid" value="{{$value->id}}" />
                            <input class="d-none" data-comment-wrapper="{{$value->id}}" data-comment-file="{{$value->id}}" onchange="preview_file_photo(this)" type="file" name="commentfile[]" id="file-attach-field-{{$value->id}}" />
                            <div class="camera-icon-con">
                                <label for="file-attach-field-{{$value->id}}" class="options-message">
                                    <svg class="olymp-camera-icon">
                                        <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                    </svg>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Start Comment Attach Photo Preview -->
                    <div class="comment-image-wrapper dd-none" style="display:none !important" id="comment-wrapper-{{$value->id}}">
                        <span onclick="remove_comment_photo({{$value->id}})" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <img src="" alt="Image Of Comment Attachment" style="min-height:auto" class="comment-img-preview">
                    </div>
                    <!-- End Comment Attach Photo Preview -->
                    <button type="button" id="postCommentBtn{{$value->id}}" data-btnid="postCommentBtn{{$value->id}}" data-post-id="{{$value->id}}" data-file="true" data-loading="<i class='fa fa-refresh fa-spin fa-1x fa-fw'></i>" data-form="modal-comment-form-{{$value->id}}" data-validator="true" data-callback="CommentPostCallback" onclick="_run(this)" class="btn btn-primary">Post Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>
