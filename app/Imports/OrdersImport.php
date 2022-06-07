<?php

namespace App\Imports;

use App\Models\Bank_detail;
use App\Models\Bank_row_detail;
use App\Models\Transactioncode;
use App\Models\CustomerModel;
use App\Models\CustomerRowsModel;
use App\Models\Orders;
use App\Models\OrderRowModel;


use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;

class OrdersImport implements ToModel , WithHeadingRow ,SkipsOnError,WithValidation {

    use Importable,SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $count = 0;

    public function __construct(){
        
        $this->collection = array();
    }

    public function model(array $row){
        
        try {
        
            $bankExists     = Bank_detail::where('id',$row['bank_id'])->first();
            $CustomerExists = CustomerModel::where('account_no',trim($row['account_no'])
                                ->where('bank_details_id',$row['bank_id'])
                                ->first();

            $continue = true; $errors = array();
              
                if(empty($bankExists)){ 
                    $continue = false; 
                    $errors['bank'] = $row['account_no']." not added, bank not found :: ".$row['bank_id'];  
                }  
                
                if(empty($row['no_of_leaves'])) {
                    $continue = false; 
                    $errors['leaves'] = $row['account_no']." not added, please enter no of leaves";
                }

                if(gettype($row['no_of_leaves']) != "integer"){ 
                    $continue = false; 
                    $errors['leaves_type'] = $row['account_no']." not added, no of leaves should be numeric."; 
                }
                    
                if(empty($CustomerExists)) { 
                    $continue = false; 
                    $errors['customer'] = $row['account_no']." not added, customer not found";  
                } 
                
                if(gettype($row['account_no']) != "integer"){ 
                    $continue = false; 
                    $errors['account_no'] = $row['account_no']." not added, account number should be numeric.";   
                }

        } catch (\Throwable $error) {
           
            dd($error); exit;
        }

        if(empty($continue)) array_push($this->collection,array(
            'errors' => $errors, 
            'data' => $row,
            'line' => ++$this->count
        ));

        else array_push($this->collection,array(

            'errors' => false, 'data' => $row
        ));
        
    }

    public function verify(): array {

        try {

            $errors = array();

            foreach ($this->collection as $key => $row) {

                if(!empty($row['errors'])) $errors[] = $row['errors'];
            }
            
        } catch (\Throwable $error) {
            dd($error);
        }

        return $errors;
    }

    public function sets() : array {

        try {

            $bankSet = array();

            foreach ($this->collection as $key => $set) {

                if(empty($set['errors'])){

                    $bankId = $set['data']['bank_id'];

                    if(!array_key_exists($bankId,$bankSet)) $bankSet[$bankId] = array();

                    $bankSet[$bankId][] = $set['data'];
                }
            }

        } catch (\Throwable $error) {
            dd($error);

            return array('status' => false, 'data' => "");
        }

        return array('status' => true, 'data' => $bankSet);

    }

    public function execute($collections): bool {

        try {

            foreach ($collections as $key => $sets) {

                $orders = Orders::all()->last();  
                $user = Auth::user();  

            		if (isset($orders->id)) {
			            
                        $id = $orders->id + 1; $digit = strlen($id);
			            
                        if      ($digit == 1)  $id = '000'.$id;
                        else if ($digit == 2)  $id = '00'.$id;
                        else if ($digit == 3)  $id = '0'.$id;	

			                $order_no = 'OID/'.date('m').'/'.date('y').'/'.$id;
		            } else  $order_no = 'OID/'.date('m').'/'.date('y').'/'.'0001';

                     $orderDetails = array(
                         'order_no'   => $order_no,
                         'order_date' => date('Y-m-d H:i:s'),
                         'bank_id'    => $sets[0]['bank_id'],
                         'created_by' => $user->id,
                        );

                     $order = Orders::create($orderDetails);

                foreach($sets as $index => $set){

                    $customer = CustomerModel::where('account_no',$set['account_no'])->where('deleted','No')->first();

                    if(!empty($customer)) {
                        
                        $customerRows = CustomerRowsModel::where('customer_details_id',$customer->id)->first();

                        if(!empty($customerRows)) {

                            $orderRowDetails = array(
                                'order_id'            => @$order->id,
                                'customer_id'         => $customer->id,
                                'transaction_code_id' => $customerRows->transaction_code_id,
                                'start_no'            => ($customerRows->last_cheque_no + 1),
                                'end_no'              => ($customerRows->last_cheque_no + $set['no_of_leaves']),
                                'leaves'              => $set['no_of_leaves'],
                                'remarks'             => $set['remarks']
                             );

                            OrderRowModel::create($orderRowDetails);
                            CustomerRowsModel::where('customer_details_id',$customer->id)->update(['last_cheque_no' => ($customerRows->last_cheque_no + $set['no_of_leaves'])]);
                        }
                    }
                 }

                //echo 'vijay'; exit;

            }
            
        } catch (\Throwable $error) {
              dd($error);
              return false;
        }

        return true;
    }

    public function rules(): array {
           
        return [];
    }

    public function getRowCount() : int {
       return $this->count;
    }
}
