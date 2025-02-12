<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'branch_master';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'branch_code', 'branch_name', 'address', 'ip', 'port', 'isp_name', 'operator_name', 'agent_name'
    ];
}
