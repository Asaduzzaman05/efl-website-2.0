<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AisModel extends Model
{
    use HasFactory;
    protected $table = 'ais';
    protected $fillable = [
        'title','description','image_path'
    ];

}
