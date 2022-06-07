<?php

namespace App\Exports;

use App\Models\Orders;
use App\Models\OrderRowModel;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class OrderSubmitExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping{
    
    /**
    * @return \Illuminate\Support\Collection
    */
    //use Exportable;
    protected $request;
    public function __construct($request){
        $this->request = $request;

    }

	public function headings(): array{
        return [
            '#',               "OrderNumber",
            "OrderDate",       "BankName",
            "Type",            "Account",   
            "Name",            "StartNo",
            "Clearance",       "BankCode",
            "BranchCode",      "BranchAddress",
            "TransactionCode", "BookQty", 
            "ChqDgt",          "Status",
        ];
  
    }
    public function collection(){
         
        $request = $this->request;

        if(array_key_exists('search',$request->input())) $search = true;
        
        else $search = false;

        $orderID = $request->OrderID;

        $orderExport = array(); $num = 0;

        $orders = Orders::leftjoin('bank_details', 'orders.bank_id', '=', 'bank_details.id')
            ->when($search,function($query,$search) use($request){
                 
                if(array_key_exists('bankID',$request->search)) { 

                     $bank_Id = $request->search['bankID'];
                    
                     return $query->where('bank_details.id',$bank_Id);
                }
                
            })
            ->when($search,function($query,$search) use($request){

            if(array_key_exists('toDate',$request->search) and array_key_exists('fromDate',$request->search)) {

                $fromDate = $request->search['fromDate'];
                $toDate = $request->search['toDate'];

                $query->whereBetween(DB::raw('DATE(orders.order_date)'),array(
                    $fromDate,$toDate
                ));
            } 
            
            else if(array_key_exists('fromDate',$request->search)) { 
                $query->whereBetween(DB::raw('DATE(orders.order_date)'), array(
                    $request->search['fromDate'],
                    date('Y-m-d')));
            }
            
            return $query;
        })->when($orderID,function($query,$orderID){
                return $query->where('orders.id',$orderID);
        })
        ->select('orders.*', 'bank_details.bank_name','bank_details.bank_code')
        ->where('orders.deleted', 'No')        
        ->orderBy('orders.id', 'DESC')
        ->get();

        function game($orderRows,$key,$position){
               
            try {
                
                if(!empty($orderRows[$position][$key])) return $orderRows[$position][$key];
                
                else  return "Not Available";
            }

             catch (\Throwable $th) {
                 return "Not Available";
            }
        } 

        foreach($orders as $order){

            $orderRows = OrderRowModel::select('customer_details.*','order_rows.*','transaction_code.code as transactionCode',
            'account_types.code as accountType','bank_row_details.branch_name','bank_row_details.sort_code','bank_row_details.clearance','bank_details.bank_code as BankCode')
            ->leftJoin('customer_details',function($relation){
                return $relation->on('order_rows.customer_id','=','customer_details.id')
                                ->where('customer_details.deleted','No');
            })
            ->leftJoin('transaction_code',function($relation){
                return $relation->on('order_rows.transaction_code_id','=','transaction_code.id')
                                ->where('transaction_code.deleted','No');
            })
            ->leftJoin('account_types',function($relation){
                return $relation->on('customer_details.account_type_id','=','account_types.id')
                                ->where('account_types.deleted','No');
            })
             ->leftJoin('bank_details',function($relation){
                return $relation->on('customer_details.bank_details_id','=','bank_details.id')
                                ->where('bank_details.deleted','No');
            })
            ->leftJoin('bank_row_details',function($relation){
                return $relation->on('customer_details.bank_detail_row_id','=','bank_row_details.id')
                                ->where('bank_row_details.deleted','No');
            })
            ->where('order_rows.order_id',$order->id)->get();  $times = 0;


            if($order->order_status == 1){
                $status = 'Completed';
            }else{
                $status = 'Pending';
            }

           try {
                
                do {

                    array_push($orderExport,array(

                        "num"              => ++$num,
                        "OrderNumber"      => $order->order_no,
                        "OrderDate"        => $order->order_date,
                        "BankName"         => $order->bank_name,
                        "Type"             => !empty(count($orderRows)) ? $orderRows[$times]->accountType : "Not Available",
                        "Account"          => !empty(count($orderRows)) ? $orderRows[$times]->account_no : "Not Available",
                        "Name"             => !empty(count($orderRows)) ? $orderRows[$times]->first_name." ".$orderRows[$times]->middle_name." ".$orderRows[$times]->last_name : "Not Available",
                        "StartNo"          => !empty(count($orderRows)) ? $orderRows[$times]->start_no : "Not Available",
                        "Clearance"        =>  game($orderRows,"clearance",$times),
                        "BankCode"         => !empty(count($orderRows)) ? $orderRows[$times]->BankCode : "Not Available",
                        "BranchCode"       =>  game($orderRows,"branch_code",$times), 
                        "BranchAddress"    =>  game($orderRows,"branch_name",$times),
                        "TransactionCode"  => !empty(count($orderRows)) ? $orderRows[$times]->transactionCode : "Not Available",
                        "Leaves"           => !empty(count($orderRows)) ? $orderRows[$times]->leaves : "Not Available",
                        "ChequeDigit"      => !empty(count($orderRows)) ? $orderRows[$times]->cheque_digit : "Not Available",
                        "Status"          => $status,
                    
                        //"SortCode"         =>  game($orderRows,"sort_code",$times),
                        //"EndNo"            => !empty(count($orderRows)) ? $orderRows[$times]->end_no : "Not Available",
                        //"Remarks"          => !empty(count($orderRows)) ? $orderRows[$times]->remarks : "Not Available",
                    ));
                 
                    $times++;
                } while ($times < count($orderRows));
                
           } catch(\Exception $e){
               echo "<hr><br>there is an issue<br>";
               echo "<pre>";
               echo $times."<br>";
               print_r($orderRows); 
               echo "<h2 style='color:red;'>error</h2>";
           }
                          
        }

        //echo "<pre>"; print_r($orderExport);exit();
            
        return collect($orderExport);
    }
    
    public function map($row): array{
           $fields = [
                $row["num"],              $row["OrderNumber"],
                $row["OrderDate"],        $row["BankName"],
                $row["Type"],             $row["Account"],   
                $row["Name"],             $row["StartNo"],
                $row["Clearance"],        $row["BankCode"],
                $row["BranchCode"],       $row["BranchAddress"],
                $row["TransactionCode"],  $row["Leaves"], 
                $row["ChequeDigit"],      $row["Status"], 
            ];

               
        return $fields;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $header = 'A1:P1'; // All headers
                $cells = 'A:P';
                $event->sheet->getStyle($cells)->getAlignment()->applyFromArray(array('horizontal' => 'right'));
                $event->sheet->getDelegate()->getStyle($header)->getFont()->setSize(13);
                $event->sheet->getStyle($header)->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                $event->sheet->getStyle('A')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                
            },
        ];
        
    }
}
