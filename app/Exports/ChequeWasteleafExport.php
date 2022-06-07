<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\WasteLeaves;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class ChequeWasteleafExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
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
            '#',
            'Bank Name',
            'No. Of Check Waste Leaf',
            'Wastage Date',
            'Account Type',
        ];
    }
    public function collection(){
        $search = $this->request;
        //print_r($search['from']);exit;
        $from = date('Y-m-d 00:00:00',strtotime($search['from']));
        $to = date('Y-m-d 23:59:59',strtotime($search['to']));
        $transactions = WasteLeaves::with('bankDetails')->whereBetween('from_date', [$from, $to])->get()->toArray();
        //echo "<pre>"; print_r($transactions);exit;
        return collect($transactions);
    }
    
    public function map($row): array{
           $fields = [
           	  $row['id'],	 
              $row['bank_details']['bank_name'],
              $row['no_leaves'],             
              \Carbon\Carbon::parse($row['from_date'])->format('d/m/Y'),
              $row['account_type'],
         ];
        return $fields;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
        
    }
}
