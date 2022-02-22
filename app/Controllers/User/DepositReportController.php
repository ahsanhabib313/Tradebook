<?php

namespace App\Controllers\User;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\Report\Deposit;
use App\Models\User\UserAdditionalInfo;
use App\Middlewares\UserAuthMiddleware;
use App\Services\EncryptionService;
use Illuminate\Database\Capsule\Manager as DB;

class DepositReportController extends Controller{
   
    // checking the middleware
    public function __construct()
    {
        $this->registerMiddleware(new UserAuthMiddleware([]));
    }

    //show the deposit report page
    public function depositPageShow(){
        //fetch user data 
        $user = auth('user');

        return $this->render('user/reports/deposit-report',['user' => $user]);
    }
    
      //show the internal transfer report page
      public function getData(Request $request){

        //get the input data
        $user_id = $request->getParam('user_id');
        $type = $request->getParam('type');
        $min_amount = $request->getParam('min_amount');
        $max_amount = $request->getParam('max_amount');
        $from = $request->getParam('from_date') ;
        $to = $request->getParam('to_date') ;
        $status = $request->getParam('status');

        $query = Deposit::where('user_id', $user_id );

      

        if(!empty($type)){
        $query = $query->where('method', 'like', '%'.$type.'%');
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

        //initially get the withdraw table data
        $data = array();
        $i = 0;
        $total_amount = 0;

        foreach($datas as  $key => $item){

            $total_amount +=$item["amount"];

            $data[$i]['type'] = $item['method'];
            $data[$i]['fee'] = $item['fee'];
            $data[$i]['status'] = $item['status'];
            $data[$i]['created_at'] =  strtotime($item['created_at']) ;
            $data[$i]['created_at'] = date('Y-m-d H:i A', $data[$i]['created_at']);
            $data[$i]['amount'] = $item['amount'];

            $i++;

        } 

        //set the array of object as name data object
        $output['data'] =$data;
        $output['total_amount'] =$total_amount;

            // return the data as json
        echo  json_encode( $output);
        
    }


    //export csv file 
    public function getCsvFile($request, $response){

        $user_id = $request->getParam('user_id');
        $type = $request->getParam('type');
        $min_amount = $request->getParam('min_amount');
        $max_amount = $request->getParam('max_amount');
        $from = $request->getParam('from_date') ;
        $to = $request->getParam('to_date') ;
        $status = $request->getParam('status');
        $action = $request->getParam('action');


   
        $dbresult = Deposit::where('user_id', $user_id );

        

              
            $table_head = array("Method", "Charge", "Status", "Amount", "Date");
            header("Content-Description: File Transfer"); 
            header("Content-Disposition: attachment; filename=withdraw-reports".time().".csv"); 
            header("Content-Type: text/csv; charset=utf-8");
            $output = fopen('php://output', 'w');

            fputcsv($output,  $table_head);
         
        
            if(!empty($type)){
                $dbresult = $dbresult->where('method', 'like', '%'.$type.'%');
            }
            if(!empty($min_amount)){
                $dbresult =$dbresult->where('amount', '>=', $min_amount);
              
            }
            if(!empty($max_amount)){
                $dbresult =$dbresult->where('amount', '<=', $max_amount);
              
            }
            if(!empty($from)){
                $dbresult =$dbresult->whereDate('created_at', '>=', $from);  
            }
            if(!empty($to)){
                $dbresult =$dbresult->whereDate('created_at', '<=', $to);  
            }
            if(!empty($status)){
                $dbresult =$dbresult->where('status', 'like',  '%'.$status.'%');
        
            } 

        $dbresult = $dbresult->orderBy("id", 'desc');
        $result = $dbresult->get();

        $edata = array();
        foreach ($result as $key => $row) {
        	$edata = array();
        	
            $edata[] = $row['method'];
            $edata[] = $row['fee'];
            $edata[] = $row['status'];
            $edata[] = $row['amount'];
            $edata[] =  strtotime($row['created_at']) ;
            $edata[] = date_format($row->created_at, 'd F Y h:i:s A');;

            fputcsv($output, $edata);
        }

        fclose($output);
        exit();
    }




    



}