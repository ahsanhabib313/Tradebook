<?php

namespace App\Controllers\User;

namespace App\Controllers\User;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\Report\Withdraw;
use App\Models\Report\Deposit;
use App\Middlewares\UserAuthMiddleware;
use App\Services\EncryptionService;
use Illuminate\Database\Capsule\Manager as DB;

class InternalTransferReportController extends Controller{

    // checking the middleware
    public function __construct()
    {
        $this->registerMiddleware(new UserAuthMiddleware([]));
    }

     //show the internal transfer report page
     public function PageShow(){

        //fetch the user info
        $user = auth('user');

        return $this->render('user/reports/internal-transfer-report', ['user' => $user]);
    }

    //show the internal transfer report page
    public function getData(Request $request){

     //get the input data
     $user_id = $request->getParam('user_id');
     $method = $request->getParam('type');
     $account_number = $request->getParam('account_number');
     $min_amount = $request->getParam('min_amount');
     $max_amount = $request->getParam('max_amount');
     $from = $request->getParam('from_date') ;
     $to = $request->getParam('to_date') ;
     $status = $request->getParam('status');
    

     if(!empty($method) && $method == 1){ // method 1 is "Trading To Wallet"
    
                $query = Deposit::where('user_id', $user_id );
                
                if(!empty($account_number)){
                    $query =$query->where('login', $account_number);
                
                }
                if(!empty($min_amount)){
                    $query =$query->where('amount', '>=', $min_amount);
                
                }
                if(!empty($max_amount)){
                    $query =$query->where('amount', '<=', $max_amount);
                
                }
                if(!empty($from)){
                    $query =$query->whereDate('created_at', '>=', $from);  
                }
                if(!empty($to)){
                    $query =$query->whereDate('created_at', '<=', $to);  
                }
                if(!empty($status)){
                    $query =$query->where('status', 'like',  '%'.$status.'%');
            
                } 

                $datas = $query->get();

        
     }elseif(!empty($method) && $method == 2){// method 1 is "Wallet To Trading"

                $query = Withdraw::where('user_id', $user_id);

                if(!empty($account_number)){
                    $query =$query->where('login', $account_number);
                
                }
                if(!empty($min_amount)){
                    $query =$query->where('amount', '>=', $min_amount);
                
                }
                if(!empty($max_amount)){
                    $query =$query->where('amount', '<=', $max_amount);
                
                }
                if(!empty($from)){
                    $query =$query->whereDate('created_at', '>=', $from);  
                }
                if(!empty($to)){
                    $query =$query->whereDate('created_at', '<=', $to);  
                }
                if(!empty($status)){
                    $query =$query->where('status', 'like',  '%'.$status.'%');
            
                } 


                $datas = $query->get();


     }else{

                $query = Withdraw::where('user_id', $user_id);

                $withdraw_datas = $query->get();

                $query = Deposit::where('user_id', $user_id );

                $deposit_datas = $query->get();

                $datas = $withdraw_datas->merge($deposit_datas);

               

     }

        //initially get the withdraw table data
         $data = array();
         $i = 0;
         $total_amount = 0;
         foreach($datas as $item){
            $total_amount +=$item["amount"];
            $details = '<div class="col-md-12">
                        <h4 class="text-left text-secondary font-weight-bold">Details:</h4>
                        <table class="table text-center text-dark">
                                <thead >
                                    <tr class="table-secondary">
                                    <th>Account Number</th>
                                    <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>'.$item["login"].'</td>
                                <td>'.$item["amount"].'</td>
                                </tr>
                                </tbody>
                        </table>
                        </div>';

             $data[$i]['id'] = $item['id'];
             $data[$i]['method'] = $item['method'];
             $data[$i]['Account_number'] = $item['login'];
             $data[$i]['fee'] = $item['fee'];
             $data[$i]['status'] = $item['status'];
             $data[$i]['amount'] = $item['amount'];
             $data[$i]['created_at'] =  strtotime($item['created_at']) ;
             $data[$i]['created_at'] = date('Y-m-d H:i A', $data[$i]['created_at']); 

             $data[$i]['details'] = $details; 
             
             $i++;
         } 

         echo  json_encode([
             'data' => $data,
             'total_amount' => $total_amount
         ]); 
         

        }


        //export csv file 
    public function getCsvFile($request, $response){

        //get the input data
        $user_id = $request->getParam('user_id');
        $method = $request->getParam('type');
        $account_number = $request->getParam('account_number');
        $min_amount = $request->getParam('min_amount');
        $max_amount = $request->getParam('max_amount');
        $from = $request->getParam('from_date') ;
        $to = $request->getParam('to_date') ;
        $status = $request->getParam('status');

              
            $table_head = array("Method", "Account Number", "Charge", "Status", "Date","Amount");
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=withdraw-reports".time().".csv"); 
            header("Content-Type: text/csv; charset=utf-8");
            $output = fopen('php://output', 'w');

            fputcsv($output,  $table_head);
         
        
            if(!empty($method) && $method == 1){ // method 1 is "Trading To Wallet"
    
                $query = Deposit::where('user_id', $user_id );
                
                if(!empty($account_number)){
                    $query =$query->where('login', $account_number);
                
                }
                if(!empty($min_amount)){
                    $query =$query->where('amount', '>=', $min_amount);
                
                }
                if(!empty($max_amount)){
                    $query =$query->where('amount', '<=', $max_amount);
                
                }
                if(!empty($from)){
                    $query =$query->whereDate('created_at', '>=', $from);  
                }
                if(!empty($to)){
                    $query =$query->whereDate('created_at', '<=', $to);  
                }
                if(!empty($status)){
                    $query =$query->where('status', 'like',  '%'.$status.'%');
            
                } 

                $datas = $query->get();

        
     }elseif(!empty($method) && $method == 2){// method 1 is "Wallet To Trading"

                $query = Withdraw::where('user_id', $user_id);

                if(!empty($account_number)){
                    $query =$query->where('login', $account_number);
                
                }
                if(!empty($min_amount)){
                    $query =$query->where('amount', '>=', $min_amount);
                
                }
                if(!empty($max_amount)){
                    $query =$query->where('amount', '<=', $max_amount);
                
                }
                if(!empty($from)){
                    $query =$query->whereDate('created_at', '>=', $from);  
                }
                if(!empty($to)){
                    $query =$query->whereDate('created_at', '<=', $to);  
                }
                if(!empty($status)){
                    $query =$query->where('status', 'like',  '%'.$status.'%');
            
                } 


                $datas = $query->get();


     }else{

                $query = Withdraw::where('user_id', $user_id);

                $withdraw_datas = $query->get();

                $query = Deposit::where('user_id', $user_id );

                $deposit_datas = $query->get();

                $datas = $withdraw_datas->merge($deposit_datas);

               

     }

      //initially get the withdraw table data
      $data = array();
    
     
      foreach($datas as $item){
          $data = array();
          $data[] = $item['method'];
          $data[] = $item['login'];
          $data[] = $item['fee'];
          $data[] = $item['status'];
          $data[] = $item['created_at'];
          $data[] = $item['amount'];
     

          fputcsv($output, $data);
          
         
      } 

      fclose($output);
        exit();
       
    }
}