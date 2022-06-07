<?php

namespace App\Exports;

use App\Models\Bank_detail as BankDetails;
use App\Models\Bank_row_detail as BankBranches;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class BanksExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //use Exportable;
    protected $request;
    public function __construct($request){
        $this->request = $request;

        //echo "<pre>"; print_r($request->input()); exit();
    }

	public function headings(): array{
        return [
            '#','Bank Id','Bank Name','Bank Code','Branch Id','Branch Name','Branch Code','Clearance','Sort Code',
            'Street Address','Country','State','City','ZipCode'
        ];
    }
    public function collection(){
         
        $request = $this->request;
        $search = $this->request->input();
        $bankExport = array(); $num = 0;

        $banks = BankDetails::when($search,function($query,$search) use($request) {
            $BankID = $request['search']['bankID'];
            return $query->where('id',$BankID);
        })
        ->where('bank_details.deleted','No')
         ->orderBy('bank_details.id', 'DESC')
         ->get();
        

        foreach($banks as $bank){

            $branches = BankBranches::where('bank_row_details.bank_details_id',$bank->id)->get();
            $times = 0;

            try {
                
                do {
                 
                array_push($bankExport,array(
                   "Num"           => ++$num,
                   "BankID"        => $bank->id,
                   "BankName"      => $bank->bank_name,
                   'BankCode'      => $bank->bank_code,
                   "BranchID"      => !empty($branches[$times]['id'])              ? $branches[$times]['id']    : "Not Available",
                   "BranchName"    => !empty($branches[$times]['branch_name'])     ? $branches[$times]['branch_name']    : "Not Available",
                   "BranchCode"    => !empty($branches[$times]['branch_code'])     ? $branches[$times]['branch_code']    : "Not Available",
                   "Clearance"     => !empty($branches[$times]['clearance'])       ? $branches[$times]['clearance']      : "Not Available",
                   "SortCode"      => !empty($branches[$times]['sort_code'])       ? $branches[$times]['sort_code']      : "Not Available",
                   "StreetAddress" => !empty($branches[$times]['street_address'])  ? $branches[$times]['street_address'] : "Not Available",
                   "Country"       => !empty($branches[$times]['country'])         ? $branches[$times]['country']        : "Not Available",
                   "State"         => !empty($branches[$times]['state'])           ? $branches[$times]['state']          : "Not Available",
                   "City"          => !empty($branches[$times]['city'])            ? $branches[$times]['city']           : "Not Available",
                   "ZipCode"       => !empty($branches[$times]['zip_code'] )       ? $branches[$times]['zip_code']       : "Not Available",

                ));
                
                    $times++;

                } while ($times < count($branches));
                
            } catch(\Exception $error){
                dd($error);
                echo "there is an issue<br>";
                echo "Bank Id is ::".$bank->id;
                echo "<pre>"; print_r($branches); exit();
            }
        }

        // echo "<pre>"; print_r($bankExport); exit();

        return collect($bankExport);
       
    }
    
    public function map($row): array{
           $fields = [
           	  $row['Num'],$row['BankID'],$row['BankName'],$row['BankCode'],$row['BranchID'],$row['BranchName'],$row['BranchCode'],
           	  $row['Clearance'],$row['SortCode'],$row['StreetAddress'],$row['Country'],$row['State'],
              $row['City'],$row['ZipCode'],
               
         ];

        return $fields;
    }
    public function registerEvents(): array{

        return [
            AfterSheet::class => function(AfterSheet $event) {
                $header = 'A1:L1'; // All headers
                $cells = 'A:L';
                $event->sheet->getStyle($cells)->getAlignment()->applyFromArray(array('horizontal' => 'right'));
                $event->sheet->getDelegate()->getStyle($header)->getFont()->setSize(14);
                $event->sheet->getStyle($header)->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                $event->sheet->getStyle('A')->getAlignment()->applyFromArray(array('horizontal' => 'center'));
                
            },
        ];
        
    }
}
