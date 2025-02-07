<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'company',
        'router_limit',
        'password',
        'user_id',
        'role_id',
        'sms_whatsapp', 
        'whatsapp_type',
        'sms_type', 
        'whatsapp_auth_key', 
        'whatsapp_app_key', 
        'sms_auth_key', 
        'sms_sender_id', 
        'mail_username',
        'mail_password',
        'retry',
        'timeout', 
        'country_code',
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
        'password' => 'hashed',
    ];

    const ADMIN = 1;

    const CUSTOMER = 2;


    const TYPE = [
    self::ADMIN => 'Admin',
    self::CUSTOMER => 'Customer',
    ];


    const ACTIVE = 1;

    const DEACTIVE = 0;

    const STATUS = [
        self::ACTIVE => 'Active',
        self::DEACTIVE => 'Deactive',
    ];
    
    
   public function isAdmin()
    {
        if($this->role_id === 1)
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }
   
    public function isCustomer()
    {
        if($this->role_id === 2)
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        }
    }
}

