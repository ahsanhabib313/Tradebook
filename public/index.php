<?php

use App\Core\Application;


require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
	'settings' => [
		'rootPath' => dirname(__DIR__),
		'viewPath' => __DIR__ . '/../views'
	]
];

$app = new Application($config);

//Set your custom not found page here
$app->page404 = 'admin/_error';

//CONNECT TO DATABASE BY ILLUMINATE
require __DIR__ . '/../config/database.php';


//USER ROUTES
$app->router->get('/user/login', [App\Controllers\User\AuthController::class, 'login']);


$app->router->get('/', [App\Controllers\Admin\SiteController::class, 'home']);

/*************************************************************
				User Controllers
 **************************************************************/
// Auth Controllers
$app->router->get('/user/login', [App\Controllers\User\AuthController::class, 'login']);
$app->router->post('/user/login', [App\Controllers\User\AuthController::class, 'login']);
$app->router->get('/user/register',  [App\Controllers\User\AuthController::class, 'register']);
$app->router->post('/user/register', [App\Controllers\User\AuthController::class, 'register']);

$app->router->get('/user/forgetpassword', [App\Controllers\User\AuthController::class, 'forgetpassword']);
$app->router->post('/user/forgetpassword', [App\Controllers\User\AuthController::class, 'forgetpassword']);

$app->router->get('/user/reset-password', [App\Controllers\User\AuthController::class, 'resetpassword']);
$app->router->post('/user/reset-password', [App\Controllers\User\AuthController::class, 'resetpassword']);

$app->router->get('/user/logout', [App\Controllers\User\AuthController::class, 'logout']);


// login with facebook route 
$app->router->get('/user/loginFacebook', [App\Controllers\User\AuthController::class, 'loginWithFacebook']);
$app->router->get('/user/callback', [App\Controllers\User\AuthController::class, 'callBackFromFacebook']);



// Dashboard Controllers
$app->router->get('/user/news_feed', [App\Controllers\User\NewsfeedController::class, 'newsfeed']);
$app->router->post('/user/edit', [App\Controllers\User\NewsfeedController::class, 'editPost']);
$app->router->get('/user/delete', [App\Controllers\User\NewsfeedController::class, 'deletePost']);
$app->router->post('/user/preview', [App\Controllers\User\NewsfeedController::class, 'preview']);
$app->router->post('/user/post-status', [App\Controllers\User\NewsfeedController::class, 'postStatus']);
$app->router->post('/user/real-time-post-comment', [App\Controllers\User\NewsfeedController::class, 'realTimePostComment']);
$app->router->post('/user/post-comment', [App\Controllers\User\NewsfeedController::class, 'postComment']);
$app->router->post('/user/reply', [App\Controllers\User\NewsfeedController::class, 'commentReply']);
$app->router->post('/user/like-operations', [App\Controllers\User\NewsfeedController::class, 'likeOperations']);
$app->router->post('/user/load-sharedpost', [App\Controllers\User\NewsfeedController::class, 'loadSharedPost']);
$app->router->post('/user/post-sharedpost', [App\Controllers\User\NewsfeedController::class, 'postSharedPost']);


$app->router->get('/user/profile', [App\Controllers\User\ProfileController::class, 'profile']);
$app->router->get('/user/statistics', [App\Controllers\User\ProfileController::class, 'statistics']);

$app->router->get('/user/portfolio', [App\Controllers\User\ProfileController::class, 'portfolio']);
$app->router->get('/user/following', [App\Controllers\User\ProfileController::class, 'following']);
$app->router->get('/user/follower', [App\Controllers\User\ProfileController::class, 'follower']);
$app->router->get('/user/blockUser', [App\Controllers\User\ProfileController::class, 'blockUser']);
$app->router->post('/user/reportUser', [App\Controllers\User\ProfileController::class, 'reportUser']);

$app->router->post('/user/add-friend-follow-unfollow', [App\Controllers\User\ProfileController::class, 'addFriendFollowUnfollow']);


$app->router->get('/user/edit-profile', [App\Controllers\User\ProfileController::class, 'editProfile']);
$app->router->post('/user/edit-profile', [App\Controllers\User\ProfileController::class, 'changeProfile']);
$app->router->post('/user/star-ratting', [App\Controllers\User\ProfileController::class, 'starRatting']);
// Reset The Notifications
$app->router->post('/user/reset-notification', [App\Controllers\User\ProfileController::class, 'resetNotification']);

/*************************************************************
				Admin Controllers
 **************************************************************/
$app->router->get('/admin/login', [App\Controllers\Admin\AuthController::class, 'login']);
$app->router->post('/admin/login', [App\Controllers\Admin\AuthController::class, 'login']);

$app->router->get('/admin/register', [App\Controllers\Admin\AuthController::class, 'register']);
$app->router->post('/admin/register', [App\Controllers\Admin\AuthController::class, 'register']);
$app->router->get('/admin/logout', [App\Controllers\Admin\AuthController::class, 'logout']);

$app->router->get('/admin/dashboard', [App\Controllers\Admin\DashboardController::class, 'dashboard']);
$app->router->get('/admin/forgotpass', [App\Controllers\Admin\ForgotPassController::class, 'forgotpass']);

// IMAGE UPLOAD 

$app->router->post('/user/imgupload', [App\Controllers\User\ProfileController::class, 'uploadImage']);
$app->router->post('/user/imageCancel', [App\Controllers\User\ProfileController::class, 'cancelImage']);
$app->router->post('/user/saveCoverImage', [App\Controllers\User\ProfileController::class, 'saveCoverImage']);

// reports controllers
$app->router->get('/user/reports/balance-transfer-report',[App\Controllers\User\ReportController::class,'balanceTransferReportPageShow']);
$app->router->get('/user/reports/external-transfer-report',[App\Controllers\User\ReportController::class,'externalTransferReportPageShow']);
$app->router->get('/user/reports/ib-transfer-report',[App\Controllers\User\ReportController::class,'ibTransferReportPageShow']);
$app->router->get('/user/reports/trading-report',[App\Controllers\User\ReportController::class,'tradingReportPageShow']);


//withdraw report route
$app->router->get('/user/reports/withdraw-report', [App\Controllers\User\WithdrawReportController::class, 'withdrawReportShow']);
$app->router->get('/user/get/withdraw-report/data',[App\Controllers\User\WithdrawReportController::class,'getData']);
$app->router->post('/user/get/withdraw/csv/file',[App\Controllers\User\WithdrawReportController::class,'getCsvFile']);

//deposit report route
$app->router->get('/user/reports/deposit-report', [App\Controllers\User\DepositReportController::class, 'depositPageShow']);
$app->router->get('/user/get/deposit-report/data',[App\Controllers\User\DepositReportController::class,'getData']);
$app->router->post('/user/get/deposit/csv/file',[App\Controllers\User\DepositReportController::class,'getCsvFile']);


//internal report transfer
$app->router->get('/user/reports/internal-transfer-report',[App\Controllers\User\InternalTransferReportController::class,'PageShow']);
$app->router->get('/user/get/internal-transfer-report/data',[App\Controllers\User\InternalTransferReportController::class,'getData']);
$app->router->post('/user/get/internal-transfer/csv/file',[App\Controllers\User\InternalTransferReportController::class,'getCsvFile']);


//external report transfer
$app->router->get('/user/reports/external-transfer-report',[App\Controllers\User\ExternalTransferReportController::class,'PageShow']);
$app->router->get('/user/get/external-transfer-report/data',[App\Controllers\User\ExternalTransferReportController::class,'getData']);
$app->router->post('/user/get/external-transfer/csv/file',[App\Controllers\User\ExternalTransferReportController::class,'getCsvFile']);



 


// pages controllers 

$app->router->get('/user/pages', [App\Controllers\User\PagesController::class, 'createPage']);
$app->router->get('/user/editPage', [App\Controllers\User\PagesController::class, 'editPage']);
$app->router->post('/user/updatePage', [App\Controllers\User\PagesController::class, 'updatePage']);
$app->router->get('/user/deletePage', [App\Controllers\User\PagesController::class, 'deletePage']);
$app->router->get('/user/pageloading', [App\Controllers\User\PagesController::class, 'getpage']);
$app->router->get('/user/pagesform', [App\Controllers\User\PagesController::class, 'createFormDisplay']);
$app->router->post('/user/pagesform', [App\Controllers\User\PagesController::class, 'submitFormData']);
$app->router->post('/user/pagesImg', [App\Controllers\User\PagesController::class, 'imgSubmit']);
$app->router->post('/user/pageposts', [App\Controllers\User\PagesController::class, 'pagePost']);
$app->router->get('/user/pagePhotos', [App\Controllers\User\PagesController::class, 'pagePhotos']);
$app->router->post('/user/uploadImage', [App\Controllers\User\PagesController::class, 'pageImgPost']);


// post controller
$app->router->post('/user/create-post', [App\Controllers\User\PostController::class, 'createPost']);
$app->router->post('/user/post-image-delete', [App\Controllers\User\PostController::class, 'delete_photo']);
$app->router->post('/page/profile-update', [App\Controllers\User\PagesController::class, 'update_photo']);

$app->run();
