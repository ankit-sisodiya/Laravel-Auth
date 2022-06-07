<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
      
        $UserId = Auth::id();
        $path   = $request->path();

        $search =  User::leftJoin('access_level','access_level.role_id','=','users.role_id')

        ->leftJoin('roles','roles.id','=','users.role_id')
        ->select('users.name','access_level.permissions','roles.roles')
        ->where(array(
                ['users.id',$UserId],
                ['users.deleted','No'],
                ['users.active','Yes']
            ))
        ->first();
        
        
        try {
            
            if($search->roles == "Admin") return $next($request);

            $permissions = unserialize($search->permissions);
            
            if (in_array($path, $permissions)) return $next($request);

            //return view('alerts/error-404');
            return redirect()->route('error-404')->with('warning',"Sorry you are not for this operation!");

      

        } catch (\Throwable $th) {

            //return view('alerts/error-404');
            return redirect()->route('error-404')->with('warning',"Sorry you are not for this operation!");
               
        }

        
    }
}
