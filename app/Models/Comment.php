<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = [
        'name', 'email', 'website', 'phone', 'comment', 'comnt_or_reply', 'created_at', 'updated_at'
    ];


}


