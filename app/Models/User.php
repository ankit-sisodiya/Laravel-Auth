<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\AccessLevel;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'contact_no',
        'designation',
        'department',
        'role_id',
        'active',
        'IsActive',
        'created_by',
        'updated_by',
        'keywords',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function isAuthorized($access){

        $UserID = Auth::id();

        // $search =  User::leftJoin('access_level','access_level.user_id','=','users.id')

        // ->leftJoin('roles','roles.id','=','users.role_id')
        // ->select('users.name','access_level.permissions','roles.roles')
        // ->where(array(
        //         ['users.id',$UserId],
        //         ['users.deleted','No'],
        //         ['users.active','Yes']
        //     ))
        // ->first();

  
          
         return $search;

    }
}
