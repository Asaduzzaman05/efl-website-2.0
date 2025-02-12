<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminService extends Model
{
    use HasFactory;
    protected $table = 'admin_services';
    protected $fillable = [
        'title','description','image_path','module', 'submodule'
    ];

}
