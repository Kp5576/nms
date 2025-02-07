<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMember extends Model
{
     use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'customer_member';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email' , 'mobile' , 'customer_id', 'alert'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}