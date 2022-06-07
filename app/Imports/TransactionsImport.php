<?php

namespace App\Imports;

use App\Models\Transactioncode;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class TransactionsImport implements ToModel ,WithStartRow,WithValidation,WithHeadingRow {

    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function rules(): array {
        return [
            'code' => 'required',
        ];
    }
    public function customValidationMessages(){
        return [
            "code.required" => "Transaction Code must not be empty!",
            "code.unique"   => "The Transaction Code has already been used"
        ];
    }

    public function model(array $row){
        echo "<pre>";
        print_r($row);
        exit();
    
        $transactions = Transactioncode::create([
            'code'              => $row[1],
            'description'       => $row[2],
        ]);

        return $transactions;

     }


}
