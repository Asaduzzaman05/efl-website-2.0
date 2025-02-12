<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\CompanyProfile;
use Exception;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $company = CompanyProfile::first();
        return view('admin.company.profile',compact('company'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'company_name' => 'required',
            'email' => 'required',
            'phone_1' => 'required',
            'phone_2' => 'required',
            'address' => 'required',
        ]);

        try{
            $company = CompanyProfile::find($id);
            $company->company_name = $request->company_name;
            $company->email = $request->email;
            $company->phone_1 = $request->phone_1;
            $company->phone_2 = $request->phone_2;
            $company->address = $request->address;
            $company->facebook = $request->facebook;
            $company->youtube = $request->youtube;
            $company->linkedin = $request->linkedin;
            $company->instagram = $request->instagram;
            $company->twitter = $request->twitter;
            $company->wechat = $request->wechat;
            $company->whatsapp = $request->whatsapp;
            $company->fax = $request->fax;
            $company->website = $request->website;
            $company->tel = $request->tel;
            $company->slogan = $request->slogan;
            $company->open_time = $request->open_time;
            $company->close_time = $request->close_time;
            $company->contact_us = $request->contact_us;
            $company->achievement = $request->achievement;
            $company->about_description = $request->about_description;
            $company->request_description = $request->request_description;
             //logo image
            $logoImage ='';
            if($request->hasFile('logo')){
                if(!empty($company->logo) && file_exists($company->logo)){
                    unlink($company->logo);
                }
                $logoImage = $this->imageUpload($request, 'logo', 'uploads/company');
            }
            else{
                $logoImage = $company->logo;
            }
            $company->logo = $logoImage;

            //about image
              $aboutImage ='';
              if($request->hasFile('about_image')){
                  if(!empty($company->about_image) && file_exists($company->about_image)){
                      unlink($company->about_image);
                  }
                  $aboutImage = $this->imageUpload($request, 'about_image', 'uploads/company');
              }
              else{
                  $aboutImage = $company->about_image;
              }
              $company->about_image = $aboutImage;
             //Why image
                $whyImage ='';
                if($request->hasFile('why_image')){
                    if(!empty($company->why_image) && file_exists($company->why_image)){
                        unlink($company->why_image);
                    }
                    $whyImage = $this->imageUpload($request, 'why_image', 'uploads/company');
                }
                else{
                    $whyImage = $company->why_image;
                }
                $company->why_image = $whyImage;
            //Quote image
                $quoteImage ='';
                if($request->hasFile('request_image')){
                    if(!empty($company->request_image) && file_exists($company->request_image)){
                        unlink($company->request_image);
                    }
                    $quoteImage = $this->imageUpload($request, 'request_image', 'uploads/company');
                }
                else{
                    $quoteImage = $company->request_image;
                }
                $company->request_image = $quoteImage;

            $company->save();
            Session::flash('success','Company Profile Successfully Updated');
            return back();

            }catch(Exception $e){

              Session::flash('error','Opps! Something is Worng ');
            }
     }
}
