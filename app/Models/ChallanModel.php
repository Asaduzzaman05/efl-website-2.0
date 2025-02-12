<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallanModel extends Model
{
    use HasFactory;
    protected $table = 'challan';
    protected $fillable = [
        'title','description','views','image_path'
    ];
}
