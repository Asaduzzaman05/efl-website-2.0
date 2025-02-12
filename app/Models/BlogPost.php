<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
        'title','description','views','image_path','date'
    ];
    public function comments()
{
    return $this->hasMany(Comment::class, 'blog_id');
}
}
