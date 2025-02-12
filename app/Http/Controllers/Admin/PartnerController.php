<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    public function index(){
        $partners = Partner::all();
        return view('admin.partner.index',compact('partners'));
    }

    public function store(Request $request){
      
         $request->validate([
              'partner_title' => 'required',
              'image' => 'mimes:jpg,png,jpeg,bmp,gif'
         ]);

        try{

            $partners = new Partner();
            $partners->partner_title = $request->partner_title;
            $partners->image = $this->imageUpload($request, 'image', 'uploads/partner') ?? '';
         
            $partners->save();
            Session::flash('success', ' Partner Added Successfully');
            return back();

        }catch(Exception $e){
            Session::flash('error','Something Worng');
        }
        
       

    }

    public function edit($id){
        $partner = Partner::find($id);
        return view('admin.partner.edit',compact('partner'));
        
    }

    public function update(Request $request,$id){

        try{

            $partner = Partner::find($id);
            $partner->partner_title = $request->partner_title;


            $partnerImage ='';
            if($request->hasFile('image')){
                 if(!empty($partner->image) && file_exists($partner->image)){
                     unlink($partner->image);
                 }
                 $partnerImage = $this->imageUpload($request, 'image', 'uploads/partner');   
            }
            else{
                $partnerImage = $partner->image;
            }  
            $partner->image = $partnerImage;
            $partner->save();
   
            Session::flash('success','Partner Update Successfuly');
            return back();

        }catch(Exception $e){
         
            Session::flash('error','Someting is Worng'); 

        }
      
    }

    public function delete($id){
        try{
            $partner = Partner::find($id);
            if(!empty($partner->image) && file_exists($partner->image)){
                unlink($partner->image);
            }
            $partner->delete();
            Session::flash('success','Partner Successfully Delete');
            return back();

        }catch(Exception $e){
           return back();
        }
    
       
    }
}
