<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'company_profiles';

    protected $fillable = [
        'company_name','phone_1','phone_2','email','logo','address','about_title','about_description',
        'about_image','facebook','youtube','instagram','twitter',
        'linkedin','wechat','fax','website','Tel','whatsapp','why_image','request_image','request_description',

    ];



}
