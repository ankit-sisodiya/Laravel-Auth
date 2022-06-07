<?php

namespace App\Imports;

use App\Models\Bank_detail;
use App\Models\Bank_row_detail;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\DB;



class BankDetailsImport implements ToModel , WithHeadingRow ,SkipsOnError,WithValidation {

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

        ++$this->count;

        $bankName = $row['bank_name'];

        if(!array_key_exists($bankName,$this->collection)){
          
           $this->collection[$bankName] = array();

           $this->collection[$bankName]['Bank Details'] = array("bank_name"  => $row['bank_name'],
                                                                "bank_code"  => $row['bank_code'],
                                                                "created_by" => Auth::id()
                                                            );

           $this->collection[$bankName]['Bank Row Details'] = array();

        }  unset($row['bank_name']); unset($row['bank_code']); array_shift($row);
          
        array_push($this->collection[$bankName]['Bank Row Details'], $row); 
        

    }

    public function verify(): bool {
        
        foreach ($this->collection as $key => $index) {
           
            $sets = $this->collection[$key]['Bank Row Details'];
            $find = array_unique(array_column($sets, 'branch_code'));

            if(count($sets) != count($find)) return false;
 
        }
           return true;
    }

    public function execute(): array {

      //  echo "<pre>";  print_r($this->collection); exit();

        foreach ($this->collection as $key => $value) {

            $response = Bank_detail::create($value['Bank Details']);

            if(!$response) return [false,'Bank Details Not Added Successfully!'];

            try {

                foreach($value['Bank Row Details'] as $row){
                    
                    $row['bank_details_id'] = $response->id;
                    
                    $row['sort_code'] = $value['Bank Details']['bank_code']."-".$row['branch_code']."-".$row['clearance'];

                    $bankBranche = Bank_row_detail::create($row);

                    }

            } catch (\Throwable $error) {
                // dd($error);
                return [false,'Branch Details Not Added For '.$value['Bank Details']['bank_name']];
            }
             
        }

        return [true];
        
    }

    public function rules(): array {
           
        return [
            '*.bank_name'   => ['required'],
            '*.bank_code'   => ['required','max:2','min:2','unique:bank_details,bank_code'],
            '*.branch_name' => ['required'],
            '*.branch_code' => ['required'],
            '*.clearance'   => ['required'],
        ];
    }
    public function getRowCount() : int {
       return $this->count;
    }
}
