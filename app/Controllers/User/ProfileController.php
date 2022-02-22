<?php

namespace App\Controllers\User;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\User;
use App\Models\Post;
use App\Models\User\Friend;
use App\Models\User\Follow;
use App\Models\Rating;
use App\Models\Notification;
use App\Models\User\UserAdditionalInfo;
use App\Middlewares\UserAuthMiddleware;
use App\Models\Attachment;
use App\Models\User\UserBlock;
use App\Models\User\UserReport;
use App\Services\EncryptionService;
use Illuminate\Database\Capsule\Manager as DB;

/**
 *
 * Class AuthController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new UserAuthMiddleware([]));
    }


    public function profile(Request $request, Response $response)
    {
        $data = $request->getBody();
        $userId = $request->getParam('id');
        if ($userId) {
            $user = User::where('id', '=', (int)$userId)->first();
            $additionAlInfo = UserAdditionalInfo::where('user_id', '=', $user->id)->first();
        } else {
            $user = auth('user');
            $additionAlInfo = UserAdditionalInfo::where('user_id', '=', $user->id)->first();
        }

        // Get Newsfeed Post
        $getPosts = Post::join('users', 'posts.user_id', '=', 'users.id')
            // ->leftJoin('attachments', 'posts.id', '=', 'attachments.attachmentable_id')
            ->select('users.first_name', 'users.last_name', 'posts.created_at', 'posts.id', 'posts.post', 'posts.shared')
            ->where('posts.user_id', '=', $user->id)
            ->where('posts.post', '!=', NULL)
            ->orderBy('posts.id', 'desc')->get();
        // $profilePicture = Attachment::where('attachmentable_id', '=', (int) $userId)->orderBy("id", "desc")->first();
        $param = [
            "title" => "Profile",
            'wallposts' => $getPosts,
            'userDetails' => $user,
            'additionAlInfo' => $additionAlInfo,
            // 'profilePicture' => $profilePicture
        ];
        return $this->render('user/profile/profile', $param);
    }

    public function editProfile(Request $request, Response $response)
    {
        // $activeTab = $request->getParam('tab');

        $user = auth('user');

        $additionAlInfo = UserAdditionalInfo::where('user_id', '=', selfInfo('id'))->first();

        $param = [
            "title" => "Profile Settings",
            'userdetails' => $user,
            'additionAlInfo' => $additionAlInfo
        ];
        return $this->render('user/profile/edit-profile', $param);
    }

    // changeProfile
    public function changeProfile(Request $request, Response $response)
    {

        if ($request->isPost()) {

            $data = $request->getBody();

            // User Details
            $user = auth('user');

            // Must Have For Validation
            $errors = [];

            $res['success'] = false;
            $res['message'] = "Fix the following errors!";

            $op = $request->getParam('op');

            // Personal Information Section
            if ($op == 'personalinfo') {
                $first_name = $request->getParam('first_name');
                $last_name = $request->getParam('last_name');
                $dob = $request->getParam('datetimepicker');
                $country = $request->getParam('country');
                $birthplace = $request->getParam('birthplace');
                $phone = $request->getParam('phone');
                $postcode = $request->getParam('postcode');
                $city = $request->getParam('city');
                $gender = $request->getParam('gender');
                $passport_number = $request->getParam('passport_number');
                $address = $request->getParam('address');


                /*
                 * Start Filter / Validations Of Required Fields
                 */
                $requiredFields = array('first_name', 'last_name', 'datetimepicker', 'country', 'phone', 'postcode', 'city', 'gender', 'address');
                $modifyName['first_name'] = 'First Name';
                $modifyName['last_name'] = 'Last Name';
                $modifyName['datetimepicker'] = 'Date Of Birth';
                $modifyName['country'] = 'Country';
                $modifyName['phone'] = 'Phone';
                $modifyName['postcode'] = 'Post Code';
                $modifyName['city'] = 'City';
                $modifyName['gender'] = 'Gender';
                $modifyName['address'] = 'Address';

                $fieldsValidation = validatorPony($request->getBody(), $requiredFields, $modifyName);

                if ($fieldsValidation['errorhave']) {
                    $res['errors'] = $fieldsValidation['errors'];
                    return json_encode($res);
                } else {


                    $updateInformations = User::where('id', $user->id)
                        ->update([
                            'first_name' => $first_name,
                            'last_name' => $last_name,
                            'dob' => date("Y-m-d", strtotime($dob)),
                            'country' => $country,
                            'birthplace' => $birthplace,
                            'phone' => $phone,
                            'postcode' => $postcode,
                            'city' => $city,
                            'gender' => $gender,
                            'passport_number' => $passport_number,
                            'address' => $address
                        ]);



                    if ($updateInformations) {
                        $res['success'] = true;
                        $res['message'] = "Your Profile Updated Successfully";
                    } else {
                        $res['success'] = false;
                        $res['message'] = "Failed To Updated Information For Some Technical Issues!! Please Try Again";
                    }


                    return json_encode($res);
                }
            }

            // Change Password Section
            if ($op == 'passcha') {
                $currentpassword = $request->getParam('currentpassword');
                $password = $request->getParam('password');
                $confirmpassword = $request->getParam('confirmpassword');


                /*
                 * Start Filter / Validations Of Required Fields
                 */
                $requiredFields = array('currentpassword', 'password', 'confirmpassword');
                $modifyName['currentpassword'] = 'Current Password';
                $modifyName['password'] = 'Password';
                $modifyName['confirmpassword'] = 'Confirm Password';

                $fieldsValidation = validatorPony($request->getBody(), $requiredFields, $modifyName);

                if ($fieldsValidation['errorhave']) {
                    $res['errors'] = $fieldsValidation['errors'];
                    return json_encode($res);
                }
                // End Filter/ Validations Of Required Fields


                $convert = new EncryptionService();
                $passwordEncCurrent     = $convert->encrypt_decrypt('encrypt', $currentpassword);


                $checkPass = User::where([
                    ["id", "=", $user->id],
                    ["password", "=", $passwordEncCurrent]
                ])->first();

                if (!$checkPass) {
                    $res['success'] = false;
                    $res['message'] = "Your Current Password Is Wrong";
                    return json_encode($res);
                } elseif ($password != $confirmpassword) {
                    $res['success'] = false;
                    $res['message'] = "Password And Confirm Password don't match";
                    return json_encode($res);
                } else {
                    $password = $convert->encrypt_decrypt('decrypt', $password);
                    //$changePassword = false;

                    $changePassword = User::where('id', $user->id)
                        ->update(['password' => $password]);

                    if ($changePassword) {
                        $res['success'] = true;
                        $res['message'] = "Your Password Changed Successfully";
                    } else {
                        $res['success'] = false;
                        $res['message'] = "Failed To Change Password For Some Technical Issues!! Please Try Again";
                    }


                    return json_encode($res);
                }
            }

            // Details About You
            if ($op == 'users_additional_info') {

                $about = $request->getParam('about');
                $facebook = $request->getParam('facebook');
                $twitter = $request->getParam('twitter');
                $linkedin = $request->getParam('linkedin');
                $website = $request->getParam('website');


                /*
                 * Start Filter / Validations Of Required Fields
                 */
                $requiredFields = array('about');
                $modifyName['about'] = 'About Field';


                $fieldsValidation = validatorPony($request->getBody(), $requiredFields, $modifyName);

                if ($fieldsValidation['errorhave']) {
                    $res['errors'] = $fieldsValidation['errors'];
                    return json_encode($res);
                }
                // End Filter/ Validations Of Required Fields


                $UserAditionalInfo = UserAdditionalInfo::updateOrCreate(
                    [
                        'user_id' => selfInfo('id'),
                    ],
                    [
                        'about' => $about,
                        'facebook' => $facebook,
                        'twitter' => $twitter,
                        'linkedin' => $linkedin,
                        'website' => $website
                    ]
                );





                if ($UserAditionalInfo) {
                    $res['success'] = true;
                    $res['message'] = "Your Additional Information Added Successfully";
                } else {
                    $res['success'] = false;
                    $res['message'] = "Failed To Add Your Additional Information For Some Technical Issues!! Please Try Again";
                }

                return json_encode($res);
            }


            return json_encode($res);
        }
    }


    public function statistics()
    {
        $param = [
            "title" => "Statistics"
        ];
        return $this->render('user/profile/statistics', $param);
    }

    public function portfolio(Request $request, Response $response)
    {
        // Search Copier
        $srcCopier = $request->getParam('srccopier');






        // Start Pagination Script
        $pageno = $request->getParam('pageno');

        $paginationPage = false;
        if ($pageno > 0) {
            $pageno = $pageno;
            $paginationPage = true;
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;
        // End Pagination Script


        $copyers = Friend::where('user_id', selfInfo('id'))->where('friends.main', '=', 1)->select('friends.friend_id', 'friends.created_at');

        // If Search Condition Is Run
        if ($srcCopier != '') {
            $copyers = $copyers->join('users', 'users.id', '=', 'friends.friend_id')
                ->where(function ($q) use ($srcCopier) {
                    $q->orWhere('users.first_name', 'LIKE', '%' . $srcCopier . '%');
                    $q->orWhere('users.last_name', 'LIKE', '%' . $srcCopier . '%');
                });
            //->where('users.first_name');
        }

        // Filter Operation
        $filterBtn = $request->getParam('filter');

        if ($filterBtn != '') {

            $rating = $request->getParam('rating');
            //  $copyers = $copyers->join('ratings', 'ratings.user_id', '=', 'friends.friend_id')/*->where('ratings.ratting', '<=', $rating)*/;
        }


        $total_rows = $copyers->count();
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        if ($paginationPage) {
            $copyersResult = $copyers->offset($offset)->limit($no_of_records_per_page)->get();
        } else {
            $copyersResult = $copyers->get();
        }



        $user = auth('user');
        $additionAlInfo = UserAdditionalInfo::where('user_id', '=', $user->id)->first();

        $param = [
            "title" => "Portfolio",
            "myallcopies" => $copyersResult,
            'userDetails' => $user,
            'additionAlInfo' => $additionAlInfo,
            'total_pages' => $total_pages,
            'pageno' => $pageno
        ];
        return $this->render('user/profile/portfolio', $param);
    }

    public function starRatting(Request $request, Response $response)
    {
        $givenRatting = $request->getParam('givenratting');
        $userId = $request->getParam('user_id');

        $admin = Rating::updateOrCreate(
            [
                'ratted_by' => selfInfo('id'),
                'user_id' => $userId
            ],
            [
                'ratting' => $givenRatting,
            ]
        );
    }

    // user followings
    public function following(Request $request)
    {
        $data = $request->getBody();
        $userId = $request->getParam('id');
        if ($userId) {
            $user = User::where('id', '=', (int)$userId)->first();
            $additionAlInfo = UserAdditionalInfo::where('user_id', '=', $user->id)->first();
        } else {
            $user = auth('user');
            $additionAlInfo = UserAdditionalInfo::where('user_id', '=', $user->id)->first();
        }
        $followings = Follow::where('user_id', $user->id)->where('main', 1)->get();

        // $profilePicture = Attachment::where('attachmentable_id', '=', (int) $userId)->orderBy("id", "desc")->first();
        $param = [
            "title" => "Profile",
            'userDetails' => $user,
            'additionAlInfo' => $additionAlInfo,
            'followings' => $followings
            // 'profilePicture' => $profilePicture

        ];
        return $this->render('user/profile/following', $param);
    }

    // user followers
    public function follower(Request $request)
    {
        $data = $request->getBody();
        $userId = $request->getParam('id');
        if ($userId) {
            $user = User::where('id', '=', (int)$userId)->first();
            $additionAlInfo = UserAdditionalInfo::where('user_id', '=', $user->id)->first();
        } else {
            $user = auth('user');
            $additionAlInfo = UserAdditionalInfo::where('user_id', '=', $user->id)->first();
        }
        $followers = Follow::where('follow_id', $user->id)->where('main', 1)->get();

        // $profilePicture = Attachment::where('attachmentable_id', '=', (int) $userId)->orderBy("id", "desc")->first();
        $param = [
            "title" => "Profile",
            'userDetails' => $user,
            'additionAlInfo' => $additionAlInfo,
            'followers' => $followers
            // 'profilePicture' => $profilePicture

        ];
        return $this->render('user/profile/follower', $param);
    }

    // block a user
    public function blockUser(Request $request)
    {
        $userId = auth('user')->id;
        $blockId = $request->getParam('id');

        if (UserBlock::where('user_id', $userId)->where('block_id', $blockId)->first()) {
            return json_encode(['status' => 'already blocked']);
        } else {
            UserBlock::create([
                'user_id' => $userId,
                'block_id' => $blockId
            ]);
            return json_encode(['status' => 'success']);
        }
    }

    // report a user
    public function reportUser(Request $request)
    {
        $reportNote = $request->getParam('reportNote');
        $userId = auth('user')->id;
        $reportId = $request->getParam('userId');
        // return json_encode(['test' => 'testintg']);
        // die;
        if (UserReport::where('user_id', $userId)->where('report_id', $reportId)->first()) {
            return json_encode(['status' => 'already reported']);
        } else {
            UserReport::create([
                'user_id' => $userId,
                'report_id' => $reportId,
                'report' => $reportNote
            ]);
            return json_encode(['status' => 'success']);
        }
    }

    // Trader Copy
    function addFriendFollowUnfollow(Request $request, Response $response)
    {


        $res['success'] = false;

        $friendId = $request->getParam('friend_id');
        $actionType = $request->getParam('actiontype');


        // Copy Or Uncopy Section
        if ($actionType == 'add') {
            if (Friend::where('user_id', selfInfo('id'))->where('friend_id', $friendId)->count() == 0) {
                $friendShip = new Friend();
                $friendShip->user_id = selfInfo('id');
                $friendShip->friend_id = $friendId;
                $friendShip->main = 1;
                $friendShip->save();
            }

            if (Friend::where('friend_id', selfInfo('id'))->where('user_id', $friendId)->count() == 0) {
                $friendShip = new Friend();
                $friendShip->user_id = $friendId;
                $friendShip->friend_id = selfInfo('id');
                $friendShip->save();
            }

            $res['success'] = true;
            $res['nextaction'] = 'remove';
            return json_encode($res);
        } elseif ($actionType == 'remove') {

            Friend::where('user_id', selfInfo('id'))->where('friend_id', $friendId)->delete();
            Friend::where('friend_id', selfInfo('id'))->where('user_id', $friendId)->delete();


            $res['success'] = true;
            $res['nextaction'] = 'add';
            return json_encode($res);
        }


        // Follow or Unfollow Section
        if ($actionType == 'follow') {
            if (Follow::where('user_id', selfInfo('id'))->where('follow_id', $friendId)->count() == 0) {
                $friendShip = new Follow();
                $friendShip->user_id = selfInfo('id');
                $friendShip->follow_id = $friendId;
                $friendShip->main = 1;
                $friendShip->save();
            }

            if (Follow::where('follow_id', selfInfo('id'))->where('user_id', $friendId)->count() == 0) {
                $friendShip = new Follow();
                $friendShip->user_id = $friendId;
                $friendShip->follow_id = selfInfo('id');
                $friendShip->save();
            }

            $notificationIs = 'started ' . $actionType . ' your profile';
            storeNotification($friendId, $notificationIs, $actionType);

            $res['success'] = true;
            $res['nextaction'] = 'unfollow';
            return json_encode($res);
        } elseif ($actionType == 'unfollow') {

            Follow::where('user_id', selfInfo('id'))->where('follow_id', $friendId)->delete();
            Follow::where('follow_id', selfInfo('id'))->where('user_id', $friendId)->delete();

            $notificationIs = $actionType . 'ed your profile';
            storeNotification($friendId, $notificationIs, $actionType);


            $res['success'] = true;
            $res['nextaction'] = 'follow';
            return json_encode($res);
        }
    }

    /**
     * Reset The Notification
     */
    public function resetNotification(Request $request, Response $response)
    {

        if ($request->isPost()) {
            $op = $request->getParam('op');
            $notifId = $request->getParam('notifi_id');
            $res['success'] = false;

            if ($op == 'resetnotification') {

                $getNotification = Notification::find($notifId);

                if (isset($getNotification->id)) {

                    if ($getNotification->n_read == 0) {

                        Notification::where([
                            ['id', '=', $notifId],
                            ['n_for', '=', selfInfo('id')],
                            ['n_read', '=', 0],
                        ])->update(['n_read' => 1]);

                        $res['notifi_id'] = $notifId;
                        $res['success'] = true;
                    }
                }
            }
            return json_encode($res);
        }

    }



    // ============================================
    // image upload 
    // ============================================
    public function uploadImage(Request $request, Response $response)
    {
        if (isset($_POST["image"])) {
            $data = $_POST["image"];
            $id = $_POST['id'];
            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $target_dir = __DIR__ . '/../../../public/uploads/user/';

            $imageName = $target_dir . time() . '.jpg';
            $image = time() . '.jpg';

            file_put_contents($imageName, $data);
            $insertAttach = Attachment::updateOrCreate(
                [
                    'attachmentable_id' => $id,
                    'attachmentable_type' => 'user'
                ],
                [
                    'name' => $image
                ]
            );

            echo '<img src="../public/uploads/user/' . $image . '" class="img-thumbnail" />';
        }
    }


    public function saveCoverImage(Request $request, Response $response)
    {
        if (isset($_POST["image"])) {
            $data = $_POST["image"];
            $id = $_POST['id'];
            $image_array_1 = explode(";", $data);

            $image_array_2 = explode(",", $image_array_1[1]);

            $data = base64_decode($image_array_2[1]);

            $target_dir = __DIR__ . '/../../../public/uploads/user/';

            $imageName = $target_dir . time() . '.jpg';
            $image = time() . '.jpg';
            file_put_contents($imageName, $data);
            $insertAttach = Attachment::insert([
                'attachmentable_id' => $id,
                'attachmentable_type' => 'cover_image',
                'name' => $image
            ]);
            echo '<img src="../public/uploads/user/' . $image . '" class="img-thumbnail" />';
        }
    }


}
