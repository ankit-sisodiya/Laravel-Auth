<?php

namespace App\Imports;

use App\Models\Bank_detail;
use App\Models\Bank_row_detail;
use App\Models\Transactioncode;
use App\Models\CustomerModel;
use App\Models\CustomerRowsModel;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;

class CustomerImport implements ToModel , WithHeadingRow ,SkipsOnError,WithValidation {

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

        $continue = true; $errors = array();
        
        try {
        
            $bankExists      = Bank_detail::where('id',$row['bank_id'])->first();
            $branchExists    = Bank_row_detail::where('id',$row['branch_id'])->where('bank_details_id',$row['bank_id'])->first();
            $transactioncodeExists = Transactioncode::where('id',$row['transaction_code_id'])->first(); 
            $accountTypeExists     = DB::table('account_types')->where('id',$row['account_type_id'])->first();
            
                if(empty($bankExists)){ 
                    $continue = false; 
                    $errors['bank'] = $row['account_no']." not added bank not found :: ".$row['bank_id'];  
                }          
                    
                if(empty($branchExists)) { 
                    $continue = false; 
                    $errors['branch'] = $row['account_no']." not added branch not found :: ".$row['branch_id'];  
                } 
                
                if(empty($accountTypeExists)) { 
                    $continue = false; 
                    $errors['accountType'] = $row['account_no']." not added account not found :: ".$row['account_type_id'];  
                }      

                if(empty($transactioncodeExists)) { 
                    $continue = false; 
                    $errors['transaCtioncode'] = $row['account_no']." not added transaction code not found :: ".$row['transaction_code_id'];  
                } 

                if(gettype($row['account_no']) != "integer"){ 
                    $continue = false; 
                    $errors['account_no'] = $row['account_no']." not added account number should be numeric.";   
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

    public function execute(): bool {

        try {

            foreach ($this->collection as $key => $set) {

                if(empty($set['errors'])){

                    $user = Auth::user();

                    $set['data']['created_by']         = $user->id;
                    $set['data']['bank_details_id']    = $set['data']['bank_id'];
                    $set['data']['bank_detail_row_id'] = $set['data']['branch_id'];
                    $set['data']['zipcode']            = $set['data']['zippincode'];

                    unset($set['data']['']);

                    $customer = CustomerModel::create($set['data']);

                    if(!empty($customer)) $customerID = $customer['id'];


                    CustomerRowsModel::create(array(
                        'customer_details_id' => $customerID,
                        'transaction_code_id' =>  $set['data']['transaction_code_id'],
                        'last_cheque_no'      =>  $set['data']['last_issued_chq_no'],
                    ));
                } 
            }
            
        } catch (\Throwable $error) {
              dd($error);
              return false;
        }
        
        return true;
    }

    public function rules(): array {
           
        return [
            '*.first_name'           => ['required'],
            '*.bank_id'              => ['required'],
            '*.branch_id'            => ['required'],
            '*.account_type_id'      => ['required'],
            '*.account_no'           => ['required','max:16','min:7','unique:customer_details,account_no'],
        ];

    }

    public function getRowCount() : int {
       return $this->count;
    }
}
