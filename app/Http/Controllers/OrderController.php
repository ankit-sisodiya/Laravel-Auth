<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// /use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Session;
use Carbon\Carbon;

use App\Models\Userlogs;



class OrderController extends Controller
{
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

        $this->logs('Orders View','checked the Orders View Panel');

        return view('orders.view');
    }
    public function add(){   
    	    
        return view('orders.add');
    }
    public function create(Request $request){          
        //Code Here
    }
    
    public function edit(Request $request){   
         
        return view('orders.edit');
         
    }
    public function update(Request $request){
        //Code Here
    }
    public function destroy(Request $request){      
      //Code Here
    } 
    public function details($id=null)
    { 
        return view('orders.details');
    }

    
    
}
