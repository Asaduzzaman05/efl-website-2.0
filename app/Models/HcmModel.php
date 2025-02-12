<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HcmModel extends Model
{
    use HasFactory;
    protected $table = 'hcm';
    protected $fillable = [
        'title','description','image_path'
    ];
}
