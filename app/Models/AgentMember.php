<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentMember extends Model
{
     use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'agent_member';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email' , 'mobile' , 'agent_id', 'alert'
    ];

    public function agent()
    {
        return $this->hasOne(Agent::class,'id','agent_id');
    }
}