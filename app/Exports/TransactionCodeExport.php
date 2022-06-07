<?php

namespace App\Exports;

use App\Models\Transactioncode;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionCodeExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //use Exportable;
    protected $request;
    public function __construct(){
        $this->request = "";
    }
	public function headings(): array{
        return [
            'Id',
            'Transaction Code',
            'Description'
        ];
    }
    public function collection(){
       
        $transactions = Transactioncode::where('deleted', 'No')->get();

        return collect($transactions);
    }
    
    public function map($row): array{
           $fields = [
           	  $row->id,	
              $row->code,
              $row->description,
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
