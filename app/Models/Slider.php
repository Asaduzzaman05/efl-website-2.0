<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = [
         'slider_title_one',
         'slider_title_two',
         'image_path',
         'status',
    ];

    public function sliderImage(){
        return $this->hasMany(SliderImage::class);
    }
}
