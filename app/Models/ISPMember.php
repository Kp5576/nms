<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISPMember extends Model
{
     use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'isp_member';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email' , 'mobile' , 'isp_id', 'alert'
    ];

    public function isp()
    {
        return $this->hasOne(ISP::class,'id','isp_id');
    }
}
