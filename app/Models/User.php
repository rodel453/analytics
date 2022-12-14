<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Website;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $appends = [
        'fullname',
    ];
    
    protected $fillable = [
        'first_name',
        'last_name',
        'user_type',
        'email',
        'password',
        'picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPictureAttribute($value){
        if($value){
            return asset('startbootstrap/css/images/'.$value);
        }else{
            return asset('startbootstrap/css/images/logo.png');
        }
    }

    public function getFullnameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function websites(){
        return $this->hasMany('\App\Models\Website'); 
    }
}
