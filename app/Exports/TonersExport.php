<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Toners;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class TonersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
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
            'Issue Date',
            'No. Of Toners',
            'Remarks',
        ];
    }
    public function collection(){
        $search = $this->request;
        //print_r($search['from']);exit;
        $from = date('Y-m-d 00:00:00',strtotime($search['from']));
        $to = date('Y-m-d 23:59:59',strtotime($search['to']));
        $transactions = Toners::whereBetween('from_date', [$from, $to])->get()->toArray();
         
        return collect($transactions);
    }
    
    public function map($row): array{
           $fields = [
           	  $row['id'],	              
              \Carbon\Carbon::parse($row['from_date'])->format('d/m/Y'),
              $row['toners'],
              $row['remarks'],
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
