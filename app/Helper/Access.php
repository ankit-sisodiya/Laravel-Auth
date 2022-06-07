<?php 

  use App\Models\User;

   function game($access){
        
      $UserID = Auth::id();

      $search =  User::leftJoin('access_level','access_level.role_id','=','users.role_id')
        ->leftJoin('roles',function($relation){
            return $relation->on('roles.id','=','users.role_id')->where('roles.active','Yes');
        })
        ->select('users.name','access_level.permissions','roles.roles','roles.active')
        ->where(array(
                ['users.id',$UserID],
                ['users.deleted','No'],
                ['users.active','Yes']
            ))
        ->first();

       $permissions = unserialize($search->permissions);

        if(empty($permissions) and $search->roles != "Admin") return false;

        if ($search->roles == "Admin") {
            
            switch ($access) {
           
                case 'user-access': return true; break;
                case 'Users/add': return true; break;
           }

        }
         
        if(!empty($permissions)) {
            if(array_key_exists($access,$permissions)) return true;
        }
        
        else return false;

   }
                    
                    
?>