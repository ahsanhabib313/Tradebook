<?php

namespace App\Controllers\User;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Middlewares\UserAuthMiddleware;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Services\Upload;
use App\Models\Attachment;

use Illuminate\Database\Capsule\Manager as DB;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new UserAuthMiddleware([]));
    }

    public function createPage()
    {
        $user = auth('user');
        $getPageInfo = Page::where("user_id", $user->id)->get();
        $param = [
            "getPageInfo" => $getPageInfo
        ];
        return $this->render("user/pages", $param);
    }
    public function createFormDisplay(Request $request, Response $response)
    {
        $user = auth('user');
        $getPageInfo = Page::where("user_id", $user->id)->orderBy('id', 'desc')->first();
        $param = [
            "getPageInfo" => $getPageInfo
        ];
        return $this->render("user/pagesform", $param);
    }
    public function submitFormData()
    {
        $pageName = $_POST['pname'];
        $pageCategory = $_POST['pcategory'];
        $pageDescription = $_POST['pdescription'];
        $user = auth('user');

        $pageInfo = Page::create([
            "user_id" => $user->id,
            "pname" => $pageName,
            "pcategory" => $pageCategory,
            "pdescription" => $pageDescription
        ]);
    }

    // showing edit form for editing page
    public function editPage(Request $request)
    {
        $id = $request->getParam('id');
        $user = auth('user');
        $getPageInfo = Page::where('id', $id)->where("user_id", $user->id)->first();

        if ($getPageInfo) {
            $param = [
                "getPageInfo" => $getPageInfo
            ];
            return $this->render("user/editPagesform", $param);
        } else {
            echo '404 NOT FOUND!!';
        }
    }

    // updating page in tradebook
    public function updatePage()
    {
        $user = auth('user');

        $pageName = $_POST['pageName'];
        $pageCategory = $_POST['pageCategory'];
        $pageDescription = $_POST['pageDescription'];
        $pageId = $_POST['id'];

        // updating image
        $imageUpdated = false;

        $proImg = $_FILES['profileImage']['name'];
        $coverImg = $_FILES['coverImage']['name'];
        $extension1 = pathinfo($proImg, PATHINFO_EXTENSION);
        $extension2 = pathinfo($coverImg, PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        // profile image
        if ($proImg) {
            if (in_array($extension1, $valid_extensions)) {
                $profileImg = rand() . "." . $extension1;
                $target_dir = __DIR__ . '/../../../public/uploads/user/';
                $path1 = $target_dir . $profileImg;
                if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $path1)) {
                    $pageImg = Page::where("id", $pageId)->where("user_id", $user->id)->update([
                        "profilepic" => $profileImg
                    ]);
                    $imageUpdated = true;
                }
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'Update Failed! Supported image extensions are jpg, jpeg, png, gif'
                ]);
            }
        }
        // cover image
        if ($coverImg) {
            if (in_array($extension2, $valid_extensions)) {
                $coverImage = rand() . "." . $extension2;
                $target_dir = __DIR__ . '/../../../public/uploads/user/';
                $path2 = $target_dir . $coverImage;

                if (move_uploaded_file($_FILES['coverImage']['tmp_name'], $path2)) {
                    $pageImg = Page::where("id", $pageId)->where("user_id", $user->id)->update([
                        "coverphoto" => $coverImage
                    ]);
                    $imageUpdated = true;
                }
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'Update Failed! Supported image extensions are jpg, jpeg, png, gif'
                ]);
            }
        }

        // updating page information
        $pageInformation = Page::where("id", $pageId)->where("user_id", $user->id)->update([
            "pname" => $pageName,
            "pcategory" => $pageCategory,
            "pdescription" => $pageDescription
        ]);
        if ($pageInformation || $imageUpdated) {
            return json_encode([
                'status' => 'success',
                'message' => 'Page Updated Successfully!'
            ]);
        }
    }

    public function getpage(Request $request, Response $response)
    {
        $id = $request->getParam('id');
        $user = auth('user');
        $getPageInfo = Page::where("id", $id)->orderBy('id', 'asc')->first();
        $getPagePosts = Post::where("page_id", $id)
        ->where("page_id","!=",0)
        ->where("user_id",$user->id)
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->orderBy("posts.id", "desc")
        ->select('users.first_name', 'users.last_name', 'posts.created_at', 'posts.id', 'posts.post', 'posts.shared')
        ->get();
        $userInfo = User::where("id", $user->id)->first();
        $param = [
            "page" => $getPageInfo,
            "getPagePosts" => $getPagePosts,
            "userInfo" => $userInfo
        ];
        return $this->render("user/pageloading", $param);
    }

    public function imgSubmit(Request $request, Response $response)
    {
        $user = auth('user');
        $proImg = $_FILES['profileImage']['name'];
        $coverImg = $_FILES['coverImage']['name'];
        $extension1 = pathinfo($proImg, PATHINFO_EXTENSION);
        $extension2 = pathinfo($coverImg, PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($extension1, $valid_extensions) && in_array($extension2, $valid_extensions)) {
            $profileImg = rand() . "." . $extension1;
            $coverImg = rand() . "." . $extension2;
            $target_dir = __DIR__ . '/../../../public/uploads/user/';
            $path1 = $target_dir . $profileImg;
            $path2 = $target_dir . $coverImg;
            if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $path1) && move_uploaded_file($_FILES['coverImage']['tmp_name'], $path2)) {
                $getPageInfo = Page::where("user_id", $user->id)->orderBy('id', 'desc')->first();
                $pageImg = Page::where("id", $getPageInfo->id)->where("user_id", $user->id)->update([
                    "profilepic" => $profileImg,
                    "coverphoto" => $coverImg
                ]);
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Page Created Successfully!'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Supported image extensions are jpg, jpeg, png, gif'
            ]);
        }
    }
    /********************************************
     * CREATE A POST ON PAGE
     *******************************************/
    public function pagePost(Request $request, Response $response)
    {
        $data = $request->getBody();
        $res['success'] = false;
        $res['message'] = 'Please fix the following errors';

        $post_text = $request->getParam('post_text');
        $page_id = $request->getParam('page_id');
        // Error Filtering
        $requiredFields = array(
            'post_text',
        );
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
        $upload = new Upload($config_data);
        $upload_status = $upload->store();
        $uploaded_files = $upload->get_target_file();
        // ending image upload 
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

        $res['success'] = true;
        $res['message'] = 'Registration Completed Successfully';
        $res['input']=$data;
        // get user id
        $user = auth('user');
        $user_id = $user->id;

        $insert = Post::create([
            'post' => $post_text,
            'user_id' => $user_id,
            'page_id' => $page_id,
            'created_at' => date('Y-m-d h:i:s')
        ]);

        if ($insert) {
                for($i=0;$i<count($uploaded_files);$i++)
                {
                    $insertAttach = Attachment::insert([
                        'attachmentable_id' => $insert->id,
                        'attachmentable_type' => 'page_post',
                        'name' => $uploaded_files[$i]
                    ]);
                }
                $res['success']     = true;
                $res['lastpostid']  = $insert->id;
                $res['message']     = "Status Updated Successfully";
                $res['uploaded']    = $upload_status;
        }
        return json_encode($res);
    }
    public function pageImgPost(Request $request, Response $response)
    {
        $user = auth('user');
        $imgText = $_POST['textWithImage'];
        $image = $_FILES['pageImg']['name'];
        $pageId = $_POST['pageId'];
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $valid_extensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($extension, $valid_extensions)) {
            $pageImg = time() . "." . $extension;
            $target_dir = __DIR__ . '/../../../public/uploads/user/';
            $path = $target_dir . $pageImg;
            if (move_uploaded_file($_FILES['pageImg']['tmp_name'], $path)) {

                $insertPagePost = Post::create([
                    "user_id" => $user->id,
                    "pagepost" => $imgText,
                    "page_id" => $pageId,
                    "ispageimg" => 1
                ]);
                $insertAttach = Attachment::create([
                    'attachmentable_id' =>  $insertPagePost->id,
                    'attachmentable_type' => 'page_image',
                    'name' => $pageImg
                ]);
                $getAttachement = Attachment::where("attachmentable_id", $insertPagePost->id)->where("attachmentable_type", "page_image")->orderBy("id", "desc")->first();
                echo '<div class="col-md-4"></div>
                <div class="col-md-8 mt-2 rounded shadow">
               <div class="row pt-3">
               <div class="col-md-12 d-flex justify-content-between">
                   <div class="d-flex justify-content-center">
                       <div class="mr-2">
                           <img width="40px" class="rounded-circle" src="../public/uploads/user/propic2.jpg" alt="">
                       </div>
                       <div>
                           <h4>' . $user->first_name . " " . $user->last_name . '</h4>
                           <div class="d-flex justify-content-center align-items-center">
                               <p class="mr-2">' . $getAttachement->created_at . '</p>
                               <img width="18px" class="mb-3" src="https://img.icons8.com/material-sharp/24/000000/globe--v1.png" />
                           </div>
                       </div>
                   </div>
                   <div class="d-flex justify-content-center align-items-center">
                       <a href=""><img width="15px" src="https://img.icons8.com/ios-glyphs/30/000000/ellipsis.png" /></a>
                   </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-12 postbody">
                   <p>' . $imgText . '</p>
                   <img src = "../public/uploads/user/' . $pageImg . '">
               </div>
             </div>
             <hr>
             <div class="row">
               <div class="col-md-12 postFooter">
                   <ul class="d-flex justify-content-between">
                       <li>
                           <div class="d-flex justify-content-center align-items-center">
                               <a href=""><img width="22px" src="https://img.icons8.com/ios/50/000000/facebook-like--v1.png" /></a>
                               <a class="mb-1 ml-1" style="color:black !important" href=""> Like</a>
                           </div>
                       </li>
                       <li>
                           <div class="d-flex justify-content-center align-items-center">
                               <a href=""><img width="22px" src="https://img.icons8.com/ios/50/000000/comments.png" /></a>
                               <a class="mb-1 ml-1" style="color:black !important" href=""> Comment</a>
                           </div>
                       </li>
                       <li>
                           <div class="d-flex justify-content-center align-items-center">
                               <a href=""><img class="mt-2" width="22px" src="https://img.icons8.com/external-outline-juicy-fish/60/000000/external-share-arrows-outline-outline-juicy-fish.png" /></a>
                               <a class="mb-1 ml-1" style="color:black !important" href="">Share</a>
                           </div>
                       </li>
                   </ul>
               </div>
             </div>
             </div>';
            }
        }
    }

    // page photos
    public function pagePhotos(Request $request)
    {
        $id = $request->getParam('id');
        $user = auth('user');
        $getPageInfo = Page::where("id", $id)->orderBy('id', 'asc')->first();
        $getPagePosts = Post::where("page_id", $id)->where('user_id', $user->id)->orderBy("id", "desc")->get();
        $userInfo = User::where("id", $user->id)->first();
        $param = [
            "page" => $getPageInfo,
            "getPagePosts" => $getPagePosts,
            "userInfo" => $userInfo
        ];

        return $this->render("user/pagePhotos", $param);
    }

    public function deletePage(Request $request, Response $response)
    {
        $id = $request->getParam('id');
        if ($id) {
            Page::find($id)->delete();
            $pages = Post::where("page_id", $id)->forceDelete();
            echo "Page Deleted";
        } else {
            echo "Opps! Something went wrong";
        }
    }
    /*********************************
     * PAGE PROFILE PHOTO UPLOAD
     ********************************/
    public function update_photo(Request $request)
    {
        $page_id = $request->getParam('page_id');
        $profile_img = Page::where('id',$page_id)
        ->select()
        ->get();
        // configer file type for image upload
        $file_type = ["jpg","png","jpeg","gif"];
        $config_data = [
            "file_name"             => "page-profile", //you may set a file name
            "name_attribute"        => "image", //value of input field name attribute
            "target_dir"            => "/",
            "file_type"             => $file_type, //file type should be any valid file type, default "jpg","png","jpeg","gif"
            
            "upload_option"         => "single", //upload option may be "multiple" or "single"
            "watermark"             => false, //to create watermark set "true", default "false"
        ];
        $upload = new Upload($config_data);
        $upload_status = $upload->store();
        $uploaded_files = $upload->get_target_file();
        if($upload_status['status']==='success'){
            $update = Page::where("id",$page_id)->update([
                'profilepic' => $uploaded_files[0],
                'updated_at' => date('Y-m-d h:i:s')
            ]);
            if($update){
                if(unlink(__DIR__."/../../../public/uploads/user/post/".$profile_img[0]->profilepic)){
                    $res['success'] = true;
                    $res['message'] = 'Profile picture updated';
                    $res['upload'] = $upload_status['success'];
                    $res['statuss'] = $upload_status['status'];
                }
            }else{
                $res['message'] = 'Profile picture not update!';
                $res['upload'] = $upload_status['failed'];
                $res['statuss'] = $upload_status['status'];
            }
        }else{
            $res['upload']=$upload_status['failed'];
            $res['status']=$upload_status['status'];
        }
        
        
        return json_encode($res);
    }
}
