<?php

namespace App\Exports;

use App\Models\Userlogs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;


class LogsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithMapping
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
            '#','User Name','Access Date & Time','Access','Description'
        ];
    }
    public function collection(){
       
        $search = $this->request;
        $from = $search->from;
        $userID = $search->userID;

        $logs = userlogs::join('users','users.id','=','user_logs.user_id')
            ->when($from,function($query,$from) use($search){
                 
                if(!empty($search->to)) {

                    $query->whereBetween(DB::raw('DATE(user_logs.created_at)'),
                        array(
                            $search->from,$search->to
                    ));
                } 

                else $query->whereBetween(DB::raw('DATE(user_logs.created_at)'), array($search->from,date('Y-m-d')));

                return $query;
                
            })
            ->when($userID,function($query,$userID){
                return $query->where('users.id',$userID);
            })
            ->orderBy('id', 'DESC')
            ->where('users.active','Yes')
            ->where('users.deleted','No')
            ->select('users.name','user_logs.*')
            ->get();

        $logsExport = array(); $row = 0;

            foreach($logs as $key => $log){
                array_push($logsExport,array(
                   "Row"         => ++$row,
                   "UserName"    => $log->name,
                   'AccessDateAndTime' => date("d/m/Y", strtotime($log->created_at))." & ".date("h:i:sa", strtotime($log->created_at)),
                   "Access" => $log->access,
                   "Description" => $log->description,
                ));
            
            }

        return collect($logsExport);
    }
    
    public function map($row): array{

           $fields = [
           	  $row['Row'],$row['UserName'],$row['AccessDateAndTime'],	
              $row['Access'],$row['Description']
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