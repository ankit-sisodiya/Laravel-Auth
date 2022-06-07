<?php

namespace App\Exports;

use App\Models\CustomerModel;
use App\Models\Transactioncode;
use App\Models\CustomerRowsModel;
use App\Models\Bank_row_detail as BankBranch;
use Illuminate\Support\Str;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Sheet;


class CustomerExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
   // use Exportable;

    protected $filters;

    public function __construct($filters){
        
        $this->filters = $filters;

    }

	public function headings(): array{
        return [
            '#',
            'Bank Name','Bank Code','Branch Name','Branch Code',
            'Customer Name','Account','Account Number','Sort Code','Cheque Digit',
            'TransactionCode','ChequeNumber','Street Address','Country','State',
            'City','Zipcode','Contact Number','Email ID'
        ];
    }


    public function collection(){
        
        $search = $this->filters->input();
        $request = $this->filters;

        $customers = CustomerModel::leftJoin('account_types', 'account_types.id', '=', 'customer_details.account_type_id')
        
            ->when($search, function ($query, $search) use($request){

                $customerID = $request->customerID;
                $branchID = $request->branchID;
                $bankID = $request->bankID;

                    if(!empty($customerID))  $query->where('customer_details.id', $customerID);

                    if(!empty($bankID))      $query->where('customer_details.bank_details_id', $bankID);

                    if(!empty($branchID))    $query->where('customer_details.bank_detail_row_id', $branchID);

                    return $query;
                    
                })
            ->leftJoin('bank_details',function($join){
                      $join->on('bank_details.id', '=','customer_details.bank_details_id')
                        ->where('bank_details.deleted' , 'No');
                    })
            ->leftJoin('bank_row_details',function($join){
                      $join->on('bank_row_details.id', '=','customer_details.bank_detail_row_id')
                        ->where('bank_row_details.deleted' , 'No');
                    })
            ->select('customer_details.*','account_types.code as accountType','customer_details.id as CustomerID','bank_details.*','bank_row_details.*')
          
            ->where('customer_details.deleted' , 'No')->orderBy('customer_details.id','desc')->get();


        $customersExport = array(); $row = 0; 

        foreach($customers as $customer){

            $start = 0;

            $transactionDetails = CustomerRowsModel::leftJoin('transaction_code',function($relation){
                $relation->on('transaction_code.id','=','customer_row_details.transaction_code_id')
                        ->where('deleted', 'No');
                })
                    ->where('customer_row_details.customer_details_id',$customer->id)
                    ->select('customer_row_details.last_cheque_no','transaction_code.code as transactionCode')
                    ->orderBy('customer_row_details.customer_details_id','desc')
                    ->get();                 

            do {

                if(!empty(count($transactionDetails))) {

                    $transactionCode = $transactionDetails[$start]->transactionCode;
                    $chequeNumber = $transactionDetails[$start]->last_cheque_no;
                } else {
                    $transactionCode = "Not Available";
                    $chequeNumber = "Not Available"; 
                }

                /////////////////////////////// cheque digit logic ///////////////////////////////

                  $sortCode = implode("",explode('-',$customer->sort_code));
                  $accountNumber = $customer->account_no;
                  $newAccountNumber = "";

                  if(Str::length($customer->account_no) >= 10 ) $newAccountNumber = $sortCode.$accountNumber;

                  else  $newAccountNumber = $sortCode.'0'.$accountNumber;

                  $counter = 0; $product = 0; $chequesDigit = "";
                  $array = array(9,8,7,6,5,4,3,2);

                  for($index = 0; $index < strlen($newAccountNumber); $index++){

                            if($counter == 8) $counter = 0;

                            $account_no = $newAccountNumber[$index];
                            $weight = $array[$counter++];
                                $product += $account_no * $weight;
                    }

                   $customer->cheque_digit = "0".(11 - ($product % 11));

                /////////////////////////////// cheque digit logic ends ///////////////////////////////


                array_push($customersExport,array(
                    'Num'             => ++$row,
                    "BankName"        => empty($customer->bank_name)       ? "Not Available" : $customer->bank_name,
                    "BankCode"        => empty($customer->bank_code)       ? "Not Available" : $customer->bank_code,
                    'BranchName'      => empty($customer->branch_name)     ? "Not Available" : $customer->branch_name,
                    'BranchCode'      => empty($customer->branch_code)     ? "Not Available" : $customer->branch_code,
                    "CustomerName"    => $customer->first_name." ".$customer->last_name,
                    'Account'         => empty($customer->accountType)     ? "Not Available" : $customer->accountType,
                    'AccountNumber'   => empty($customer->account_no)      ? "Not Available" : $customer->account_no,
                    'SortCode'        => empty($customer->sort_code)       ? "Not Available" : $customer->sort_code,
                    'ChequeDigit'     => empty($customer->cheque_digit)    ? "Not Available" : $customer->cheque_digit,
                    'TransactionCode' => empty($transactionCode)           ? "Not Available" : $transactionCode,
                    'ChequeNumber'    => empty($chequeNumber)              ? "Not Available" : $chequeNumber,
                    'StreetAddress'   => empty($customer->street_address)  ? "Not Available" : $customer->street_address,
                    'country'         => empty($customer->country)         ? "Not Available" : $customer->country,
                    'state'           => empty($customer->state)           ? "Not Available" : $customer->state,
                    'city'            => empty($customer->city)            ? "Not Available" : $customer->city,
                    'zipcode'         => empty($customer->zipcode)         ? "Not Available" : $customer->zipcode,
                    'contact_no'      => empty($customer->contact_no)      ? "Not Available" : $customer->contact_no, 
                    'email_id'        => empty($customer->email_id)        ? "Not Available" : $customer->email_id
                ));
             
            $start++;

            } while ($start < count($transactionDetails)); 

        } 

     // echo "<pre>"; print_r($customersExport); exit();

        return collect($customersExport);  
        
    }
    
    public function map($row): array{

        $fields = [
           	$row['Num'],$row['BankName'],$row['BankCode'],$row['BranchName'],$row['BranchCode'],
           	$row['CustomerName'],$row['Account'],$row['AccountNumber'],$row['SortCode'],$row['ChequeDigit'],
            $row['TransactionCode'],$row['ChequeNumber'],$row['StreetAddress'],$row['country'],$row['state'],
            $row['city'],$row['zipcode'],$row['contact_no'],$row['email_id']   
        ];
        
        return $fields;
    }

    public function registerEvents(): array{
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $header = 'A1:S1'; // All headers
                $cells = 'A:S';
                $event->sheet->getStyle($cells)->getAlignment()->applyFromArray(array('horizontal' => 'right'));
                $event->sheet->getDelegate()->getStyle($header)->getFont()->setSize(14);
                $event->sheet->getStyle($header)->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                $event->sheet->getStyle('A')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                
            },
        ];  
        
    }

    

    
}
