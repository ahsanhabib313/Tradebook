<?php

namespace App\Controllers\User;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Middlewares\UserAuthMiddleware;
use App\Services\UploadService;
use App\Models\User;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Share;
use App\Models\Attachment;
use DOMDocument;
use App\Services\Upload;
use GrahamCampbell\ResultType\Success;
use Illuminate\Database\Capsule\Manager as DB;
use Dusterio\LinkPreview\Client;

/**
 *
 * Class AuthController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class NewsfeedController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new UserAuthMiddleware([]));
    }


    public function newsfeed()
    {
        // Get Newsfeed Post
        $user = auth('user');
        $userinfo = User::where("id", $user->id)->first();
        $getPosts = Post::join('users', 'posts.user_id', '=', 'users.id')
            // ->leftJoin('attachments', 'posts.id', '=', 'attachments.attachmentable_id')
            ->where('posts.post', '!=', NULL)
            ->select('users.id as idofusers', 'users.first_name', 'users.last_name', 'posts.created_at', 'posts.id', 'posts.post', 'posts.shared')
            // ->select('users.id as idofusers', 'users.first_name', 'users.last_name', 'posts.created_at', 'posts.id', 'posts.post', 'posts.shared', 'attachments.name as filename', 'attachments.attachmentable_type as filetype')
            ->orderBy('posts.id', 'desc')->get();

        $profilePicture = Attachment::where('attachmentable_id', $userinfo->id)->orderBy("id", "desc")->first();

        // $getPosts = Post::orderBy('posts.id', 'desc')->get();
        $param = [
            "title" => "News Feed",
            'newsfeedposts' => $getPosts,
            // 'profilePicture' => $profilePicture
        ];
        return $this->render('user/newsfeed', $param);
    }

    /******************************************************
    *   POST STATUS
    ********************************************************/
    public function postStatus(Request $request, Response $response)
    {

        if ($request->isPost()) {

            $data = $request->getBody();

            $errors = [];
            $res['success'] = false;
            $res['message'] = "Fix the following errors!";

            $status = $request->getParam('status');
            $photo = $_FILES["photo"];


            // Error Filtering
            $requiredFields = array('status');

            $errorFields = [];
            foreach ($data as $key => $value) {
                if ($data[$key] == '' && in_array($key, $requiredFields)) {
                    $errorFields[$key] =  [$key . " must not be empty"];
                }
            }

            // Error Have Or Not
            if (count($errorFields) > 0) {
                $res['errors'] = $errorFields;
                return json_encode($res);
            }

            // User Details
            $user = auth('user');




            $postStatus = Post::create([
                'user_id' => $user->id,
                'post' => $status
            ]);


            if ($postStatus) {

                $upload = new UploadService();


                if ($_FILES['photo']['name'] != '') {
                    $imgUpload = $upload->uploads($_FILES['photo']);
                    // Insert Into Attachment Table
                    foreach ($imgUpload as $key => $value) {
                        $insertAttach = Attachment::insert([
                            'attachmentable_id' => $postStatus->id,
                            'attachmentable_type' => 'post',
                            'name' => $imgUpload[$key]['name']
                        ]);
                    }

                    $res['success'] = true;
                    $res['message'] = "Post File Attached";
                }

                $res['success'] = true;
                $res['lastpostid'] = $postStatus->id;
                $res['message'] = "Status Updated Successfully";
            }


            return json_encode($res);
        }
    }
    /*************************************************
     * EDIT POST START
     ***********************************************/
    public function editPost(Request $request)
    {
        $post = Post::where('id', $request->getParam('post_id'))->update(['post' => $request->getParam('post')]);
        $upload_status=[
            'status'=>"success",
            'success'=>"Post Updated"
        ];
        // configer file type for image upload
        $file_type = ["jpg","png","jpeg","gif"];
        $config_data = [
            "file_name"             => "post-image", //you may set a file name
            "name_attribute"        => "image", //value of input field name attribute
            "target_dir"            => "/",
            "file_type"             => $file_type, //file type should be any valid file type, default "jpg","png","jpeg","gif"
            
            "upload_option"         => "multiple", //upload option may be "multiple" or "single"
            "watermark"             => false, //to create watermark set "true", default "false"
        ];
        $file = $_FILES['image']['name'];
        if($file[0]!=""){
            $upload = new Upload($config_data);
            $upload_status = $upload->store();
            $uploaded_files = $upload->get_target_file();
            if($upload_status['status']==='success'){
                for($i=0;$i<count($uploaded_files);$i++)
                {
                    $insertAttach = Attachment::insert([
                        'attachmentable_id' => $request->getParam('post_id'),
                        'attachmentable_type' => 'post',
                        'name' => $uploaded_files[$i]
                    ]);
                }
                if($insertAttach){
                    $upload_status=[
                        'status'=>"success",
                        'upload_status'=>true,
                        'upload_success'=>count($uploaded_files)."File Uploaded"
                    ];
                }else{
                    $upload_status=[
                        'status'=>"failed",
                        'upload_status'=>false,
                        'upload_error'=>"Upload failed please try again"
                    ];
                }
            }
        }
        
        return json_encode($upload_status);
    }

    // delete post 

    public function deletePost(Request $request, Response $response)
    {

        $postId = $request->getParam('id');
        if ($request->isGet()) {
            Post::find($postId)->delete();
            $response->redirect("/user/news_feed");
        } else {
            echo "can't delete this Post";
        }
    }
    // end of delete post 

    public function postComment(Request $request, Response $response)
    {

        if ($request->isPost()) {

            $data = $request->getBody();

            $errors = [];
            $res['success'] = false;

            $comment = $request->getParam('comment');
            $postid = $request->getParam('postid');



            // Error Filtering
            $requiredFields = array('comment');

            $errorFields = [];
            foreach ($data as $key => $value) {
                if ($data[$key] == '' && in_array($key, $requiredFields)) {
                    $errorFields[$key] =  [$key . " must not be empty"];
                }
            }

            // Error Have Or Not
            if (count($errorFields) > 0) {
                $res['errors'] = $errorFields;
                return json_encode($res);
            }

            // User Details
            $user = auth('user');


            $commentStatus = Comment::create([
                'comment' => $comment,
                'post_id' => $postid,
                'comment_by' => $user->id
            ]);

            $res['postid'] = $postid;

            if ($commentStatus) {

                $upload = new UploadService();
                $imgUpload = $upload->uploads($_FILES['commentfile'], 'user/comment');

                if (count($imgUpload)) {
                    // Success To Upload File Upload
                    $insertAttach = Attachment::create([
                        'attachmentable_id' => $commentStatus->id,
                        'attachmentable_type' => 'comment',
                        'name' => $imgUpload[0]['name']
                    ]);


                    $res['message'] = "Post File Attached";
                    $res['success'] = true;
                }
                $getBroadcast = Post::where('id', '=', $postid)->select('user_id')->first();
                $res['lastcommentid'] = $commentStatus->id;
                $res['lastpostid'] = $postid;
                $res['broadcastto'] = $getBroadcast->user_id;

                $res['success'] = true;
            }

            return json_encode($res);
        }
    }
    // reply comment 

    public function commentReply(Request $request, Response $response)
    {
        $res['success'] = false;
        $output = '';
        if ($request->isPost()) {
            $user = auth('user');
            $id = $_POST['id'];
            $data = $_POST['replyData'];
            if ($data) {
                $insertedData = Reply::create([
                    'comment_id' => $id,
                    'reply' => $data,
                    'reply_by' => $user->id
                ]);
                if ($insertedData) {
                    $fetchedData = Comment::where('id', $id)->get();
                    $repliedData = Reply::where('id', $insertedData->id)->get();
                    $res['success'] = true;

                    return json_encode($repliedData);
                }
            }

            // return json_encode($res);
        }
    }

    // likeOperations
    public function likeOperations(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $data = $request->getBody();

            $errors = [];
            $res['success'] = false;


            $postidis = $request->getParam('postidis');
            $itemtype = $request->getParam('itemtype');
            $doto = $request->getParam('doto');

            $res['eleid'] = $postidis;

            $userId = auth('user');

            // Check Like Is Already Exisets
            $likeExisets = Like::where('item_id', '=', $postidis)->where('user_id', '=', $userId->id)->first();

            if ($doto == 'like') {


                if (!$likeExisets) {
                    $insertLike = Like::insert([
                        'item_id' => $postidis,
                        'user_id' => $userId->id,
                        'like_of' => $itemtype
                    ]);

                    if (!$insertLike) {
                        $res['success'] = false;
                        $res['message'] = "Failed To Like. Please Try Again";
                        return json_encode($res);
                    } else {
                        $res['success'] = true;
                        if ($itemtype == 'comment') {
                            $getBroadcastId = Comment::where('id', '=', $postidis)->select('comment_by')->first()->comment_by;
                        } else {
                            $getBroadcastId = Post::where('id', '=', $postidis)->select('user_id')->first()->user_id;
                        }

                        $res['broadcastto'] = $getBroadcastId;
                    }
                    return json_encode($res);
                }
            } elseif ($doto == 'unlike') {

                if ($likeExisets) {
                    $updateLike = Like::where('item_id', '=', $postidis)
                        ->where('user_id', '=', $userId->id)
                        ->where('like_of', '=', $itemtype)->delete();

                    if (!$updateLike) {
                        $res['success'] = false;
                        $res['message'] = "Failed To Unlike. Please Try Again";
                    } else {
                        $res['success'] = true;
                    }
                }
                return json_encode($res);
            }
        }
    }

    // Load Shared Post
    public function loadSharedPost(Request $request, Response $response)
    {
        if ($request->isPost()) {

            $postidis = $request->getParam('postis');
            $op = $request->getParam('op');

            if ($op == 'loadsharedpost') {
                $res['success'] = false;

                $loadData = Post::where('id', $postidis)->select('post')->first();

                // Get Image Is
                $attachImage = Attachment::where([
                    ['attachmentable_id', '=', $postidis],
                    ['attachmentable_type', '=', 'post']
                ])->select('name')
                    ->first();

                if ($loadData) {
                    $res['success'] = true;
                    $res['loaddata'] = $loadData->post;
                    $res['attachfile'] = (($attachImage) ? $attachImage->name : '');
                }



                return json_encode($res);
            }
        }
    }


    // Post Shared Post
    public function postSharedPost(Request $request, Response $response)
    {
        if ($request->isPost()) {

            $postid = $request->getParam('postid');
            $sharedtext = $request->getParam('sharedtext');


            $res['success'] = false;

            // User Details
            $user = auth('user');

            $postSharedStatus = Post::create([
                'user_id' => $user->id,
                'post' => $sharedtext,
                'shared' => $postid
            ]);
            $res['lastpostid'] = $postSharedStatus->id;

            if ($postSharedStatus) {
                $getBroadcastId = Post::where('id', '=', $postid)->select('user_id')->first()->user_id;
                $res['broadcastto'] = $getBroadcastId;

                $res['success'] = true;
                $res['message'] = "Post Shared Successfully";
            }

            return json_encode($res);
        }
    }


    // Post Live Update On The Wall
    public function realTimePostComment(Request $request, Response $response)
    {

        if ($request->isPost()) {

            $op = $request->getParam('op');
            $lastitem = $request->getParam('lastitem');
            $itemtype = $request->getParam('itemtype');

            $res['success'] = false;
            // User Details
            $user = auth('user');
            if ($op == 'realtimepost') {



                if ($itemtype == 'post') {
                    $htmlIsNow = '';

                    $value = Post::join('users', 'posts.user_id', '=', 'users.id')
                        ->leftJoin('attachments', 'posts.id', '=', 'attachments.attachmentable_id')
                        ->select('users.id as idofusers', 'users.first_name', 'users.last_name', 'posts.created_at', 'posts.id', 'posts.post', 'posts.shared', 'attachments.name as filename', 'attachments.attachmentable_type as filetype')
                        ->where('posts.id', '=', $lastitem)
                        ->orderBy('posts.id', 'desc')->first();

                    $profilePicture = Attachment::select('name')->where('attachmentable_id', $value->idofusers)->where("attachmentable_type", "user")->first();


                    /* Start Of HTML Appending */
                    $htmlIsNow = '<div class="ui-block">
                                        <article class="hentry post">
                                            <div class="post__author author vcard inline-items">
                                                <img src="../public/uploads/user/' . $profilePicture->name . '" alt="author">
                                                <div class="author-date">
                                                    <a class="h6 post__author-name fn" href="profile?id=' . $value->idofusers . '">' . $value->first_name . ' ' . $value->last_name . '</a>
                                                    <div class="post__date">
                                                        <time class="published" data-toggle="tooltip" title="' . timeis($value->created_at) . '" datetime="2004-07-24T18:18">
                                                            ' . timeis($value->created_at, 'moment') . '
                                                        </time>
                                                    </div>
                                                </div>
                                        
                                                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
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
                                            </div>
                                        
                                            <p>' . $value->post . '</p>';

                    /* Start Post Share */
                    if ($value->shared != 0) {
                        $htmlIsNow .= '<div class="shared-post-content-wrapper">';

                        $postHave = \App\Models\Post::where('id', '=', $value->shared)->select('post', 'user_id', 'created_at')->first();
                        $imageOfPost = \App\Models\Attachment::where('attachmentable_id', '=', $value->shared)
                            ->where('attachmentable_type', '=', 'post')
                            ->select('name')->first();
                        $profilePicture = Attachment::select('name')->where('attachmentable_id', $postHave->user_id)->where("attachmentable_type", "user")->first();
                        $htmlIsNow .= '<hr><div class="post__author author vcard inline-items">
                                                                <img src="../public/uploads/user/' . $profilePicture->name . '" alt="author">
                                                                <div class="author-date">
                                                                    <a class="h6 post__author-name fn" href="profile?id=' . $postHave->user_id . '">' . userinfois($postHave->user_id) . '</a>
                                                                    <div class="post__date">
                                                                        <time class="published" data-toggle="tooltip" title="' . timeis($postHave->created_at) . '" datetime="2004-07-24T18:18">
                                                                            ' . timeis($postHave->created_at, 'moment') . '
                                                                        </time>
                                                                    </div>
                                                                </div>
                                                            </div>';

                        if ($imageOfPost) {
                            $htmlIsNow .= '<div class="shared-image-display post-thumb">
                                                            <img  alt="Shared Image Display" src="../public/uploads/user/post/' . $imageOfPost->name . '"/>
                                                        </div>';
                        }
                        $htmlIsNow .= '<p>' . $postHave->post . '</p>
                                                               </div>';
                    }

                    /* End Post Share */
                    if ($value->filename != '' && $value->filetype == 'post') {
                        $htmlIsNow .= '<div class="post-thumb">
                                            <img src="../public/uploads/user/post/' . $value->filename . '" alt="status Image" />
                                        </div>';
                    }


                    $htmlIsNow .= '<div class="post-additional-info inline-items">
                                                            <span id="post-like-box-' . $value->id . '" data-like-action="likestatus(' . $value->id . ')" data-id="' . $value->id . '" data-elemetype="post" class="like-item-element post-add-icon inline-items">
                                                                <div class="livicon-evo" data-options="name: heart.svg;size: 30px; style: lines;"></div>
                                                                <span id="total-post-like-view-' . $value->id . '">' . totallike($value->id) . '</span>
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
                                                                <span onclick="commentboxopen(' . $value->id . ')" class="post-add-icon inline-items cursor-pointer-finger">
                                                                    <div class="livicon-evo" data-options="name: comments.svg;size: 30px; style: lines; strokeColor: #888da8;"></div>
                                                                    <span>' . count($value->comments) . '</span>
                                                                </span>
                                                    
                                                                <span class="cursor-pointer-finger post-add-icon inline-items" onclick="sharethispost(' . $value->id . ')" data-toggle="modal" data-target="#postShareModal">
                                                                    <div class="livicon-evo" data-options="name: share.svg;size: 30px; style: lines; strokeColor: #888da8;"></div>
                                                                    <span>0</span>
                                                                </span>
                                                            </div>
                                                    
                                                    
                                                        </div>
                                                    
                                                        <div class="control-block-button post-control-button">
                                                    
                                                            <span id="post-like-box2-' . $value->id . '" data-like-action="' . likestatus($value->id) . '" data-id="' . $value->id . '" data-elemetype="post" class="btn btn-control like-item-element">
                                                                <div class="livicon-evo" data-options="name: heart.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                                                            </span>
                                
                                                            <span href="#" class="btn btn-control">
                                                                <div class="livicon-evo" data-options="name: comment.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                                                            </span>
                                
                                                            <span href="#" class="btn btn-control">
                                                                <div class="livicon-evo" data-options="name: share.svg;size: 30px; style:lines; strokeColor: #fff;"></div>
                                                            </span>

                                                        </div>
                                                    </article>';


                    /*============================================================
                                        Comments Area Start
                                ===============================================================*/
                    $htmlIsNow .= '<ul class="comments-list" id="post-comment-' . $value->id . '">
                                                
                                                  </ul>';

                    /*-- ... end Comments --*/

                    /** Start Comment Form **/
                    $htmlIsNow .= '<form action="post-comment" method="post" id="comment-form-' . $value->id . '" class="dd-none comment-form inline-items" enctype="multipart/form-data">
                    
                                                        <div class="post__author author vcard inline-items">
                                                            <img src="../public/assets/user/img/author-page.jpg" alt="author">
                                                    
                                                            <div class="form-group with-icon-right ">
                                                                <textarea name="comment" class="form-control" placeholder=""></textarea>
                                                                <input type="hidden" name="postid" value="' . $value->id . '"/>
                                                                <input class="d-none" data-comment-wrapper="' . $value->id . '" data-comment-file="' . $value->id . '" onchange="preview_file_photo(this)" type="file" name="commentfile[]" id="file-attach-field-' . $value->id . '"/>
                                                                <div class="add-options-message">
                                                                    <label for="file-attach-field-' . $value->id . '" class="options-message">
                                                                        <svg class="olymp-camera-icon">
                                                                            <use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                
                                                        <!-- Start Comment Attach Photo Preview -->
                                                        <div class="comment-image-wrapper dd-none" id="comment-wrapper-{{$value->id}}">
                                                            <span onclick="remove_comment_photo(' . $value->id . ')" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                            <img src="" alt="Image Of Comment Attachment"/>
                                                        </div>
                                                        <!-- End Comment Attach Photo Preview -->
                                
                                                        <button type="button" id="postCommentBtn' . $value->id . '" data-btnid="postCommentBtn' . $value->id . '" data-post-id="' . $value->id . '" data-file="true" data-loading="<i class=\'fas fa-sync-alt fa-spin fa-1x fa-fw\'></i>" data-form="comment-form-' . $value->id . '" data-validator="true" data-callback="CommentPostCallback" onclick="_run(this)" class="btn btn-md-2 btn-primary">Post Comment</button>
                                                    </form> ';
                    /** End Comment Form **/



                    $htmlIsNow .= '</div>';
                    /* End Of HTML Appending */

                    if ($value) {
                        $res['success'] = true;
                    }
                    $res['elementHtml'] = $htmlIsNow;
                } elseif ($itemtype == 'comment') {
                    // Last Comment ID
                    $lastCommentId = $lastitem;

                    $htmlIsNow = '';

                    $value = Comment::where('id', '=', $lastCommentId)->first();
                    $profilePicture = Attachment::select('name')->where('attachmentable_id', $value->comment_by)->where("attachmentable_type", "user")->first();

                    if ($value) {

                        $comment = $value;
                        $htmlIsNow = '<li class="comment-item">
								<div class="post__author author vcard inline-items">
									<img src="../public/uploads/user/' . $profilePicture->name . '" alt="author">
									<div class="author-date">
										<a class="h6 post__author-name fn" href="' . $comment->comment_by . '">' . userinfois($comment->comment_by, 'name') . '</a>
										<div class="post__date">
											<time class="published" datetime="2004-07-24T18:18">
												' . timeis($comment->created_at, 'moment') . '
											</time>
										</div>
									</div>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../public/assets/user/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
								</div>
							
								<p> ' . $comment->comment . '</p>';




                        if (isset($comment->attach->name)) {
                            $htmlIsNow .= '<div class="comment-image-wrapper">
                                                <img src="../public/uploads/user/comment/' . $comment->attach->name . '" alt="Comment Image"/>
                                            </div>';
                        }

                        $htmlIsNow .= '<span id="comment-like-box-' . $comment->id . '" data-like-action="' . likestatus($comment->id, 'comment') . '" data-id="' . $comment->id . '" data-elemetype="comment" class="like-item-element post-add-icon inline-items">
                                                        <div class="livicon-evo" data-options="name: heart.svg;size: 30px; style:lines; strokeColor: #888da8;"></div>
                                                        <span id="total-comment-like-view-' . $value->id . '">' . totallike($comment->id, 'comment') . '</span>
                                                    </span>
                                                     
                                                    <a href="#" id="replay-btn-' . $comment->id . '" class="reply">Reply</a>
                    
                                                    <form action="reply" method="post" class="reply-form" id="replay-form-' . $comment->id . '"> 
                                                        <input class="form-control" type="text" placeholder="Type your replay here" name="replay"/>
                                                        <buuton class="btn btn-success" type="button">Post</button>
                                                    </form>
                                                </li>';


                        $res['success'] = true;
                    }
                    $res['commmentpostid'] = Comment::where('id', '=', $lastCommentId)->select('post_id')->first()->post_id;
                    $res['elementHtml'] = $htmlIsNow;
                } elseif ($itemtype == 'reply') {
                }


                return json_encode($res);
            }
        }
    }


    public function preview()
    {
        $url = $_POST['url'];
        $str_con = str_contains($url, 'https://www.youtube.com/watch');
        if ($str_con) {
            $previewClient = new Client($url);
            $preview = $previewClient->getPreview('youtube');
            $preview = $preview->toArray();
            return json_encode($preview);
        } else {
            $previewClient = new Client($url);
            $preview = $previewClient->getPreview('general');

            $preview = $preview->toArray();
            return json_encode($preview);
        }
    }
}
