<?php
namespace App\Controllers\User;
use Illuminate\Support\Facades\Validator;
use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\User;
use App\Models\Post;
use App\Models\User\Copy;
use App\Models\User\Follow;
use App\Models\Rating;
use App\Models\Notification;
use App\Models\User\UserAdditionalInfo;
use App\Middlewares\UserAuthMiddleware;
use App\Models\Attachment;
use App\Services\EncryptionService;
use App\Services\Upload;
use App\Services\UploadService;
use Illuminate\Database\Capsule\Manager as DB;

/**
 *
 * Class AuthController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class PostController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new UserAuthMiddleware([]));
    }
    public function createPost(Request $request){
        $data = $request->getBody();
        $res['success'] = false;
        $res['message'] = 'Please fix the following errors';

        $post_text = $request->getParam('post_text');
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
            'created_at' => date('Y-m-d h:i:s')
        ]);

        if ($insert) {
                for($i=0;$i<count($uploaded_files);$i++)
                {
                    $insertAttach = Attachment::insert([
                        'attachmentable_id' => $insert->id,
                        'attachmentable_type' => 'post',
                        'name' => $uploaded_files[$i]
                    ]);
                }
                $res['success'] = true;
                $res['lastpostid'] = $insert->id;
                $res['message'] = "Status Updated Successfully";
                $res['uploaded']=$upload_status;
        }
        return json_encode($res);
    }
    /***************************************************
     * POST PHOTO DELETE OPERATION
     **************************************************/
    public function delete_photo(Request $request){
        $image_id=$request->getParam("image_id");
        $target_file = Attachment::where("id",$image_id)->select('name')->get();
        if(!empty($target_file)){
            $target_file = $target_file[0]->name;
        }
        $delete = Attachment::where('id',$image_id)->delete();
        if($delete){
            unlink(__DIR__."/../../../public/uploads/user/post".$target_file);
            $data = [
                'status'=>1,
                'message'=>"Photo successfully deleted",
                'upload'=>$upload_status
            ];
        }else{
            $data = [
                'status'=>0,
                'message'=>"Photo delete operation failed",
                'upload'=>$upload_status
            ];
        }
        return json_encode($data);
    }
    
}