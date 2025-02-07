<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ISP extends Model
{
     use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'isp';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile', 'email', 'address', 'operator'
    ];
}
