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

class ReportController extends Controller{
    public function __construct()
    {
        $this->registerMiddleware(new UserAuthMiddleware([]));
    }

   
    
    
   
    //show the balance transfer report page
    public function balanceTransferReportPageShow(){

        return $this->render('user/reports/balance-transfer-report');
    }
     //show the external transfer report page
     public function externalTransferReportPageShow(){

        return $this->render('user/reports/external-transfer-report');
    }
     //show the IB transfer report page
     public function ibTransferReportPageShow(){

        return $this->render('user/reports/ib-transfer-report');
    }
     //show the trading report page
     public function tradingReportPageShow(){

        return $this->render('user/reports/trading-report');
    }





    



}