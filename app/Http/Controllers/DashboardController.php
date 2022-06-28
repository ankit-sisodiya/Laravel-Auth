<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use App\Models\Userlogs;
use App\Models\User;
use App\Models\Roles;

use Maatwebsite\Excel\Facades\Excel;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
       
      
        if(Auth::check()){
            return view('dashboard');
          }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function search(Request $request){

        $search = $request->keyword;
        $response = User::where('keywords', 'LIKE', "%{$search}%")
                    ->where('deleted','No')->orderBy('first_name')->select('first_name','last_name','contact_no')                    
                    ->get();        
                   
        if(!empty($response)){
            foreach($response as $key => $row){
                $row['name'] = $row['first_name'].' '.$row['last_name'].' ('.$row['last_name'].') -  '. $search;     
                $row['address'] = route('Users/add');

            }
        }
        
        // if(empty($response->toArray())) {
        //     $response = Roles::where('keywords', 'LIKE', "%{$request->keyword}%")
        //                     ->where('deleted','No')->orderBy('roles')->select('roles')->get();

        //     if(!empty($response)){
        //         foreach($response as $key => $row){
        //             $row['name'] = $row['roles'];        
        //             $row['address'] = route('user-access');
    
        //         }
        //     }
        // }
     // echo '<pre>';  print_r($response->toArray());exit;
        return Response::json(array('data' => $response, 'search' => $request->input()));
    }


    public function error404(Request $request){
       
      
        return view('alerts.error-404');
    }

    

    
}
