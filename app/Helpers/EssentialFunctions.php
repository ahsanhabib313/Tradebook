<?php

use App\Core\Application;
use App\Models\User;
use App\Models\Like;
use App\Models\User\Friend;
use App\Models\User\Follow;
use App\Models\Rating;
use App\Models\Notification;
use App\Models\Attachment;


/**
 * Insert Data For Notifications
 */

function storeNotification($for, $notification, $n_type){

    Notification::insert(
        [
            'notification' => $notification,
            'n_type' => $n_type,
            'n_for' => $for,
            'u_type' => 'user',
            'n_from' => selfInfo('id')
        ]
    );

}



/**
* Display Current Time Display 
*/
function timeis($ti, $type = ''){

    if($type == 'moment'){

        $time = time() - strtotime($ti); 
        $time = ($time < 1) ? 1 : $time;
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);

            return $numberOfUnits.' '.$text.(($numberOfUnits > 1) ?'s ago':' ago');
        }

    }else{
        return date_format(date_create($ti),"d F Y H:i:s A");
    }
}


/**
 * Self Information's
 */

function selfInfo($info = ''){
    $user = auth('user');
    if($info == '' || $info == 'name'){
        return $user->first_name.' '.$user->last_name;
    }elseif ($info == 'first_name'){
        return $user->first_name;
    }elseif ($info == 'city'){
        return $user->city;
    }elseif ($info == 'country'){
        return $user->country;
    }elseif ($info == 'profile_photo'){

        // src="../public/uploads/user/selfInfo('profile_photo')"
        $profilePicture = Attachment::select('name')->where('attachmentable_id', $user->id)->where("attachmentable_type", "user")->first();
        if (!empty($profilePicture->name)) {
            return $profilePicture->name;
        }else{
            return 'no-profile.jpg';
        }
    }elseif ($info == 'profile_cover_photo'){
        $coverImage = Attachment::select('name')->where('attachmentable_id', $user->id)->where("attachmentable_type", "cover_image")->orderBy('id', "desc")->first();
        if (!empty($coverImage->name)) {
            return $coverImage->name;
        }else{
            return 'no-image.png';
        }
    }elseif ($info == 'id'){
        return $user->id;
    }

}

/**
* Getting Other User Details
*/
function userinfois($id, $info = 'name'){
    $userInfo = '';
    $userId = $id;

    // Retrieving User's Full Name
    $userIs = User::where('id', '=', $userId)
        ->select('id','first_name','last_name', 'email', 'city', 'country', 'created_at')
        ->first();

    if($info == 'name'){


        if($userIs){
            $userInfo = $userIs->first_name." ".$userIs->last_name;
            return $userInfo;
        }
        
    }elseif ($info == 'first_name'){
        $userInfo = $userIs->first_name;
        return $userInfo;
    }elseif ($info == 'city'){
        $userInfo = $userIs->city;
        return $userInfo;
    }elseif ($info == 'email'){
        $userInfo = $userIs->email;
        return $userInfo;
    }elseif ($info == 'country'){
        $userInfo = $userIs->country;
        return $userInfo;
    }elseif ($info == 'created_at'){
        $userInfo = $userIs->created_at;
        return $userInfo;
    }elseif ($info == 'profile_photo'){
        $profilePicture = Attachment::select('name')->where('attachmentable_id', $userId)->where("attachmentable_type", "user")->first();
        if (!empty($profilePicture->name)) {
            return $profilePicture->name;
        }else{
            return 'no-profile.jpg';
        }
    }elseif ($info == 'profile_cover_photo'){
        $coverImage = Attachment::select('name')->where('attachmentable_id', $userId)->where("attachmentable_type", "cover_image")->orderBy('id', "desc")->first();
        if (!empty($coverImage->name)) {
            return $coverImage->name;
        }else{
            return 'no-image.png';
        }
    }elseif ($info == 'is_friend'){

        if(Friend::where('friend_id', $userId )->where('user_id', selfInfo('id'))->count() == 0){
            return false;
        }else{
            return true;
        }

    }elseif ($info == 'is_follow'){

        if(Follow::where('follow_id', $userId )->where('user_id', selfInfo('id'))->count() == 0){
            return false;
        }else{
            return true;
        }

    }else{
        return $userInfo." no data";
    }

}


/**
* Like Status Check. This function retrieve the action. 
* Which action will traeger. That mean 
* When user press like or dislike button. Which 
*/
function likestatus($id, $type = 'post'){
    $postId = $id;
    $userId = auth('user'); 

    if($type == 'post'){
        $likeObj = Like::where('item_id', '=', $postId)->where('user_id', '=', $userId->id)->where('like_of', '=', $type)->first();
    }elseif($type == 'comment'){
        $likeObj = Like::where('item_id', '=', $postId)->where('user_id', '=', $userId->id)->where('like_of', '=', $type)->first();
    }

    
    if($likeObj){
        return 'unlike';
    }else{
        return 'like';
    }

}


/**
* Total Like Countting
*/
function totallike($id, $type = 'post'){
    $postId = $id;
    if($type == 'post'){
        return $likeObj = Like::where('item_id', '=', $postId)->where('like_of', '=', $type)->count();
    }elseif($type == 'comment'){
        return $likeObj = Like::where('item_id', '=', $postId)->where('like_of', '=', $type)->count();
    }
}


/**
 * Total Follower Count
 */
function totalFollower($id){
    return Follow::where('follow_id', '=', $id)->where('main', '=', 1)->count();
}

/**
 * Total Following Count
 */
function totalFollowing($id){
    return Follow::where('user_id', '=', $id)->where('main', '=', 1)->count();
}


/**
 * Total Copier Count
 */
function totalCopier($id){
    return Friend::where('friend_id', '=', $id)->where('main', '=', 1)->count();
}

/**
 * Total Copied Count
 */
function totalCopied($id){
    return Friend::where('user_id', '=', $id)->where('main', '=', 1)->count();
}

/**
 * Total Rating Countting
 */
function totalRating($id){
    $rattingSum = Rating::where('user_id','=', $id)->sum('ratings.ratting');
    $rattingCount = Rating::where('user_id','=', $id)->count();
    if($rattingCount == 1 || $rattingCount == 0){
        return $rattingSum;
    }
    else{
        return round(($rattingSum  / 5));
    }


}




/**
 * @param $allFields
 * @param array $requireFields
 * @param array $modifyName
 * @return array
 * Validation Alternative for Respect Validation
 */
function validatorPony($allFields, $requireFields = [], $modifyName = []){
    $data = $allFields;

    $requiredFields = $requireFields;
    $errorFields = [];
    foreach($data as $key=>$value){
        if($data[$key] == '' && in_array($key, $requiredFields)){
            $errorFields[$key] =  [( isset($modifyName[$key] ) ? $modifyName[$key] : $key)." must not be empty"];
        }
    }

    // Error Have Or Not
    if( count($errorFields) > 0){
        $res['errors'] = $errorFields;
        $res['errorhave'] = true;
        return $res;
    }else{
        $res['errorhave'] = false;
        return $res;
    }
}


/**
 *  Single File Upload Scripts
 */
function uploadPony($file, $folder = 'images', $size = 1, $extensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp']){
    $result['success'] = false;
    if(isset($file)){
        $errors= array();
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp  = $file['tmp_name'];
        $file_type = $file['type'];
        $file_exp  = explode('.',$file_name);
        $file_ext  = strtolower(end($file_exp));
        $fileName  = time().rand(1000, 9999);
        $path      = "upload/".$folder."/".$fileName.".".$file_ext;
        if(in_array($file_ext,$extensions) === false){
            $result['message']= $file_ext." file format not supported!";
        }
        if($file_size > (1024 * 1024 * $size)){
            $result['message']='File size must be exactly '.$size.' MB';
        }
        if(empty($result['message'])==true){
            $upload = move_uploaded_file($file_tmp, $path);
            if ($upload){
                $result['success'] = true;
                $result['path']    = $path;
                $result['file']    = $fileName.".".$file_ext;
            }
        }
    }
    return $result;
}

?>