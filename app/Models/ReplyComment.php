<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    use HasFactory;
    protected $table = 'reply';
    protected $fillable = [
        'name','email','phone','comment_id','created_at','updated_at'
        
    ];

}
