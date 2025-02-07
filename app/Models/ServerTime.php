<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerTime extends Model
{
     use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'servers_uptime';

   /**
     * The attributes that are mass ass
     * ignable.
     *
     * @var array
     */
    protected $fillable = [
        'nms_id', 'date', 'latency', 'status'
    ];

    public function nms()
    {
        return $this->hasOne(NMS::class,'id','nms_id');
    } 
} 