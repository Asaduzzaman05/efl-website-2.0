<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        return view('admin.service.index');
    }

    public function allservice(){
        $service = Service::latest()->get();
        $service = $service->map(function ($pro) {
            $pro->imageUrl = asset($pro->image);
            $pro->imageUrls = asset($pro->big_image);
            return $pro;
        });
        return response()->json($service);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required',
            'image' => 'mimes:jpg,png,jpeg,bmp,gif'
        ]);

        $slug = Str::slug($request->name.'-'.time());
        $service = new Service();
        $service->name = $request->name;
        $service->slug = $slug;
        $service->description = $request->description;
        $service->image = $this->imageUpload($request, 'image', 'uploads/service');
        $service->big_image = $this->imageUpload($request, 'big_image', 'uploads/service');
        $service->save();
        return response()->json($service);
    }

    public function edit($id){
        $service = Service::find($id);
        $service->imageUri = asset($service->image);
        $service->imageUris = asset($service->big_image);
        return response()->json($service);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name' =>'required',
            'image' => 'mimes:jpg,png,jpeg,bmp,gif'
        ]);
        $service = Service::find($id);
        $service->name = $request->name;
        $service->description = $request->description;

        $serviceImage ='';
        if($request->hasFile('image')){
             if(!empty($service->image) && file_exists($service->image)){
                 unlink($service->image);
             }
             $serviceImage = $this->imageUpload($request, 'image', 'uploads/service');
        }
        else{
            $serviceImage = $service->image;
        }
        $service->image = $serviceImage;
        // Main Image
        $serviceMainImage ='';
        if($request->hasFile('big_image')){
             if(!empty($service->big_image) && file_exists($service->big_image)){
                 unlink($service->big_image);
             }
             $serviceMainImage = $this->imageUpload($request, 'big_image', 'uploads/service');
        }
        else{
            $serviceMainImage = $service->big_image;
        }
        $service->big_image = $serviceMainImage;

        $service->save();
        if($service){
            $update = 'Successfully Update Service';
        }
        return response()->json($update);
    }

    public function destroy($id){
        $service = Service::find($id);
        if(!empty($service->image) && file_exists($service->image)){
         unlink($service->image);
        }
        $service->delete();
        if($service){
         $delete = "Service delete successfully";
        }
       return response()->json($delete);
    }
}
