<?php

namespace App\Http\Controllers;

use App\Models\Userlogs;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LogsExport;

use Redirect,Response;




class UserlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logs($access,$description){

        date_default_timezone_set('Asia/Kolkata');

        try {

           $user  = Auth::user();
                
           Userlogs::create(array(
                    'user_id'     => $user->id,
                    'access'      => $access,
                    'description' => $user->name." ".$description
                ));

        } catch (\Throwable $th) { echo "something went wrong"; }
    }

    public function index(Request $request){
   
        $users = User::where('active','Yes')->where('users.deleted','No')->orderBy('users.name')->get();

        if(url()->previous() != $request->fullUrl())  $this->logs("Logs Report",'checked the logs View Panel');
        
        return view('auth.userlogs',[
            'users'  => $users,
            ]);
    }

    public function get(Request $request){
         
        date_default_timezone_set('Asia/Kolkata');

        $search = $request->from;
        $userID = $request->userID;

        $logs = userlogs::join('users','users.id','=','user_logs.user_id')
                ->orderBy('id', 'DESC')
                ->when($search,function($query,$search) use($request){
                
                    if(!empty($request->from) and !empty($request->to)){
                        $this->logs("Logs Report Filter",'filterd logs report from '.$request->from." to ".$request->to);
                          $query->whereBetween(DB::raw('DATE(user_logs.created_at)'),array(
                                 $request->from,$request->to
                        ));
                    }
                    
                    else  $query->whereBetween(DB::raw('DATE(user_logs.created_at)'), array($request->from,date('Y-m-d')));
            
                    return $query;
                })
                ->when($userID,function($query,$userID){
                    return $query->where('users.id',$userID);
                })
                ->where('users.active','Yes')
                ->where('users.deleted','No')
                ->select('users.name','user_logs.*')
                ->get();

            $data = array(
                'draw' => 1,
                'recordsTotal' => 0,
                "recordsFiltered" => 0,
                'logs' => array()); $num = 0;

            foreach($logs as $key => $log ){

               $data['logs'][] = array(
                    "num"  => ++$num,
                    "user" => $log->name,
                    "dateAndTime"  => date("d/m/Y", strtotime($log->created_at))." & ". date("h:i:sa", strtotime($log->created_at)),
                    "accessAndDescription" => $log->access." / ".$log->description);
            }



            $data['recordsTotal'] = count($data['logs']);
            $data['recordsFiltered'] = count($data['logs']);

            return Response::json($data);
            

    }

    public function export(Request $request){

        $this->logs("Logs Report Export",'exported logs report');

        return Excel::download(new LogsExport($request), 'Logs-Export.xlsx');
    }
}
