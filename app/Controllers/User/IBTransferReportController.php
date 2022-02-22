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

class IBTransferReportController extends Controller{
   
    // checking the middleware
    public function __construct()
    {
        $this->registerMiddleware(new UserAuthMiddleware([]));
    }

    //show the internal transfer report page
    public function getData(){

        $details = '
        <table class="display table" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">
            <tr>
                <td>Full name:</td>
                <td>Demo Name</td>
            </tr>
            <tr>
                <td>position:</td>
                <td>Demo Position</td>
            </tr>
            <tr>
                <td>Office:</td>
                <td>Demo Office</td>
            </tr>
            <tr>
                <td>Salary:</td>
                <td>Demo Salary</td>
            </tr>
        </table>
        '; 
 

     $data= array(
       [
        'name' => 'ahsan',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'Reza',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'Rajin',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'A',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'B',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'C',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'D',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'E',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'F',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'G',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'H',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'I',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'J',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'K',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'L',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       [
        'name' => 'M',
        'position' => 'software developer (web)',
        'office' => 'IT Corner',
        'salary' => '*********',
        'details'=> $details
       ],
       
     );
   
     $output['data'] = $data;
    
     echo json_encode( $output);
        
    }



    



}