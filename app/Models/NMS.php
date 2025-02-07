<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NMS extends Model
{
     use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'nms';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id', 'isp_id','isp_members_ids', 'isp_members_names', 'customer_id', 'hindi_english','agent_id',
        'customer_alert','isp_alert','agent_alert','ip_address','port','is_ok', 'uptime',
        'uptime_seconds', 'downtime', 'downtime_seconds', 'average_response_time', 'total_checks','total_ok_checks',
        'total_not_ok_checks','last_check_datetime','next_check_datetime','main_ok_datetime','last_ok_datetime',
        'main_not_ok_datetime','last_not_ok_datetime','incident_id','agent_members_ids', 'agent_members_names','customer_members_ids', 'customer_members_names','whatsapp_message','mail_alert'
    ];
    public function user()
    {
        return $this->hasOne(User::class,'id','member_id');
    } 
    public function isp()
    {
        return $this->hasOne(ISP::class,'id','isp_id');
    }
    public function customer()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    public function agent()
    {
        return $this->hasOne(Agent::class,'id','agent_id');
    }

} 