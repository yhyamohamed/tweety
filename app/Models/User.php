<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\followTrait;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable,followTrait;
    use TwoFactorAuthenticatable;
   

 
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

  
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = [
        'profile_photo_url',
    ];

    public function getAvatarAttribute()
    {
        return "https://i.pravatar.cc/200?u=".$this->email;
    }

    public function timeline()
    {
        //the user tweets 
        //+tweets of the people he follows
        $ids=$this->follows()->pluck('id');
        //desc
       return Tweet::whereIn('user_id',$ids)
               ->orWhere('user_id',$this->id)
               ->latest()->get();
    }
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
   
//    public function getRouteKeyName()
//    {
//        return 'name';
//    }
}
