<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoGellary extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'photo_gellaries';
    protected $fillable = [
      'photo_name',
      'description',
      'created_date',
      'image',
      'status',
      'created_by',
      'updated_by',
    ];
}
