<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use App\Models\Userlogs;
use App\Models\Roles;
use App\Models\User;
use App\Models\Departments;
use App\Models\OtpConfirmation;
use Mail; 
use App\Mail\OTPMail;
use App\Mail\NotifyMail;

class UsersController extends Controller
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

    public function add($id=null){ 

    	$roles = Roles::all()->where('deleted', 'No')->where('active', 'Yes');

    	$departments = Departments::all()->where('deleted', 'No');  
        if($id){
            $user = User::find($id);
        }else{
            $user = "";
        }
    	 
    	$users = DB::table('users')
        ->leftjoin('roles', 'users.role_id', '=', 'roles.id')
        ->leftjoin('department', 'users.department', '=', 'department.id')
        ->select('users.*', 'roles.roles', 'department.department_name')        
        ->where('users.deleted', 'No')
        ->orderBy('users.id', 'DESC')
        ->get();  
        return view('users.add',compact('roles','departments','users','user'));
    }

    public function create(Request $request){  
        $this->logs("User Add",'Added the User'); 
        $user  = Auth::user();      
        $rules = [
            'first_name' => 'required|string|min:3|max:255',            
            'email' => 'required|unique:users|email',
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
             return redirect()->route('Users/add')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->all();
            
            try{
                $keywords = $data['first_name'].', '.$data['last_name'].', '.$data['contact_no'].', '.$data['designation'].', '.$data['email'];
                $data['created_by'] = $user->id;
                $data['name'] = $data['first_name'];
                $data['keywords'] = $keywords;
                $data['password'] = Hash::make('Vijay@123');
                User::create($data);
                           
                return back()->with('success','User created successfully!');
            }
            catch(Exception $e){
                //return redirect('Bank-details/add')->with('failed',"operation failed");
                return redirect()->route('Users/add')->with('error','User Not Added Successfully!');
            }
        }
    }
    public function update(Request $request, $id)
    {
        $user  = Auth::user();      
        $rules = [
            'first_name' => 'required|string|min:3|max:255',            
            'email' => ['required','email',Rule::unique('users')->ignore($request->id)]
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
             return redirect()->route('Users/edit',$id)
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data  = $request->input();        

            if(User::find($id)->update($data)){
                return redirect()->route('Users/add')->with('success', 'Users Updated successfully.');
            }else{
                return redirect()->route('Users/add')->with('error', 'Users Not Updated.');
            }
        }
    }
    public function destroy(Request $request)
    {
      $this->logs("User Delete",'Deleted the User'); 
      $id= $request->id;      
      $users = User::find($id); 
      $users->deleted = 'Yes';
      //$bank_details->save();
      if($users->save()){
            return back()->with('success','User Deleted successfully!');
      }else{
            return redirect()->route('Users/add')->with('error','User Details Not Deleted Successfully!');
      }
        //return Response()->json($bank_details);
    }
    public function updateStatus(Request $request)
    {
        $this->logs("User Status",'Status Updated the User'); 
        $user = User::findOrFail($request->user_id);
        $user->active = $request->status;
        $user->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }
    public function changePassword($id=null){ 

        $user  = Auth::user(); 
        return view('auth.reset-password');
    }
    public function updatePassword(Request $request){ 

        $user  = Auth::user();    
        $password = Hash::make($request->confirm_password);
       // print_r($request->all());exit;
        if(User::where('email', $request->email)->update(['password' => $password])){
          
            $details = [
                'password' =>  $request->confirm_password
            ];
           
            Mail::to($request->email)->send(new NotifyMail($details));

            if(Mail::failures()){
                echo 0;
                exit;
            }
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
        
    }

    public function OtpSend(Request $request)
    {
        $user  = Auth::user();      
        $rules = [                       
            'email' => ['required']
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
             return redirect()->route('Users/edit',$id)
            ->withInput()
            ->withErrors($validator);
        }
        else{
           $users_data =  User::where('deleted', 'No')->where('email', $request->email)->get(); 
           
           if(empty($users_data->toArray())){
                echo 3;
                exit;

           }
           $otp = rand(1000, 9999);

            $input = $request->all();
            $input['otp'] = $otp;
            $input['email'] = $input['email'];
            $otp_data = OtpConfirmation::create($input);

            $details = [
                'otp' =>  $otp
            ];
           
            Mail::to($input['email'])->send(new OTPMail($details));
        

            if(Mail::failures()){
               echo 0;
               exit;
            }else{
               echo 1;
               exit;
            }
        }
    }

    public function OtpVerify(Request $request){               
    
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
            'email' => 'required',               
        ]);           
       // print_r($validator);exit;
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }        
    
        $input = $request->all();      
        
        $last_mobile_entry = OtpConfirmation::where('email',$input['email'])->where('otp',$input['otp'])->where('status','No')->first();
    
         if($last_mobile_entry){
            $verified = DB::table('otp_confirmation')
              ->where('email',$input['email'])
              ->where('otp',$input['otp'])
              ->where('status','No')
              ->update(['status' => 'Yes']);           
            if($verified){
                echo 1;
              exit; 
            }else{
                echo 0;
                exit; 
            }
               
            
         }else{
            echo 0;
            exit;
         }        
    
       // $success['token'] =  $otp_data->createToken('MyApp')->plainTextToken;
         
    }
    
    
    public function error500(Request $request){
       
      
        return view('alerts.error-500');
    }
    public function signout(Request $request){
       
      
        return view('alerts.signout');
    }

    public function logout()
    {
        $user  = Auth::id();  
       
       $updateUser = User::where('id', $user)->update(['IsActive' => 'No']);
        Session::flush();        
       // Auth::logout();

        return redirect('Signout');
    }
}
