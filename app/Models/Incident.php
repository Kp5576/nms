<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
     use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'incidents';

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nms_id', 'start_datetime', 'end_datetime'
    ];
} 