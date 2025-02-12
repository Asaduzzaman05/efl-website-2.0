<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\PhotoGellary;
use Exception;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PhotoGellaryController extends Controller
{
    public function index(){

        $photoGellary = PhotoGellary::all();
        return view('admin.photoGellary.index',compact('photoGellary'));

    }

    public function store(Request $request){
       
        $request->validate([
            'photo_name'  => 'required',
            'image'  => 'required|image|mimes:jpg,png,gif',
        ]);

        try{
            $photo = new PhotoGellary();
            $photo->photo_name = $request->photo_name;
            $photo->description = $request->description;
            $photo->created_date = $request->created_date;
          
            $image = $request->file('image');
            $mainImage = 'photo-'.time().uniqid().$image->getClientOriginalName();
            $thumbImage = 'photo_thumb-'.time().uniqid().$image->getClientOriginalName();
            Image::make($image)->save('uploads/photoGellary/'.$mainImage);
            // Image::make($image)->save('uploads/photoGellary/thumbnail/'.$thumbImage);
    
            $photo->image = $mainImage;
            $photo->thum_image = $thumbImage;
            $photo->save();
           // dd($photo);
            Session::flash('success','Photo Successfully Add');
            return back();  

        }catch(Exception $e){
           Session::flash('error','Something is worng');
        }
    }

    public function edit($id){
        $photos = PhotoGellary::find($id);
        return view('admin.photoGellary.edit',compact('photos'));
    }

    public function update(Request $request,$id){
     

     
        $photo = PhotoGellary::find($id);
        $photo->photo_name = $request->photo_name;
        $photo->created_date = $request->created_date;
        $photo->description = $request->description;
     
          // image
          $photoImage ='';
          if($request->hasFile('image')){
               if(!empty($photo->image) && file_exists($photo->image)){
                   unlink($photo->image);
               }
               $photoImage = $this->imageUpload($request, 'image', 'uploads/photoGellary');   
          }
          else{
              $photoImage = $photo->image;
          }  
           $photo->image = $photoImage;
           $photo->save();
           Session::flash('success','Photo Gellary Updated Successfuly');
           return back();
       
    }

    public function delete($id){
        try{

            $photo = PhotoGellary::find($id);
            $photo->delete();
            Session::flash('success','Photo Gellary Successfuly Delete');
            return back();

        }catch(Exception $e){
           Session::flash('error','Something is Worng');
           return back();
        }
    }
}
