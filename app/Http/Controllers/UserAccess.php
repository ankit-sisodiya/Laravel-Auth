<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Userlogs;
use App\Models\AccessLevel;
use App\Models\Roles;


class UserAccess extends Controller
{

    public function logs($access,$description){
           
        try {

           $user  = Auth::user();
                
           Userlogs::create(array(
                    'user_id'     => $user->id,
                    'access'      => $access,
                    'description' => $user->name." ".$description
                ));

        } catch (\Throwable $th) { echo "something went wrong"; }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
          
        $roles = Roles::where('deleted','No')->get();

        $this->logs("User Access",'Visited the access page');

        return view('auth.useraccess',compact('roles'));
        
    }

    public function userAccess(Request $request){
        
        $userAccess = AccessLevel::where('role_id',$request->Id)->first();

        if(!empty($userAccess)){

            $permissions = unserialize($userAccess->permissions);
            $show =  json_encode(array(
                'role_id'      => $userAccess->role_id,
                'permissions' => $permissions
            ));

            print_r($show);
            exit();
        }

        else echo json_encode(404);

    }

    public function roleStatus(Request $request){
           
        $update = Roles::where('id',$request->Id)->update(['active' => $request->status]);
        
        echo json_encode($update);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $this->validate($request,array(
            'roleID' => 'required'
        ));
        
        $roleID = $request->get('roleID');

        $keywords = array('roleID','_token');
        $data  = $request->input();

        foreach ($keywords as  $key) {
             if(array_key_exists($key,$data)) {
                 unset($data[$key]);
             }
        }

        $permissions = serialize($data);
        
        $response = AccessLevel::updateOrCreate(
            ['role_id' => $roleID],
            ['role_id' => $roleID, 'permissions' => $permissions]
        );

        if($response) {
 
            $this->logs("User Access",'Granted The Access');
            
            return back()->with('success',"User access set successfully!");

        } else {
       
            $this->logs("User Access",'Got error while giving Access');

            return back()->with('failed',"User access faild!");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
