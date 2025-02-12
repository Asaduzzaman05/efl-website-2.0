<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\AchivementCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AchievementController extends Controller
{
    public function index(){

        $achivementCat = AchivementCategory::latest()->get();
        return view('admin.achivement.index',compact('achivementCat'));
    }

    public function allAchievement(){

        $achivement = Achievement::with('achievementcat')->latest()->get(); 
        $achivement = $achivement->map(function($achi){
            $achi->imageUrl = asset($achi->image);
            return $achi;
        });
        return response()->json($achivement);
    }

    public function store(Request $request){

    //    dd($request->all());
        $request->validate([
            'achievementCat_id' =>'required',
            'name' =>'required',
            'image' => 'required|mimes:jpg,png,jpeg,bmp,gif',
            'pdf' => 'mimes:pdf'
        ]);

        $slug = Str::slug($request->name . '-' . time());
        $achivement = new Achievement();
        $achivement->slug = $slug;
        $achivement->achievementCat_id = $request->achievementCat_id;
        // $product->sub_category_id = $request->sub_category_id;
        $achivement->name = $request->name;
        $achivement->description = $request->description;

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $fileName = rand(111, 99999) . '.' . $extension;
        $imageResize = Image::make($image->getRealPath());
        $imageResize->resize(162,113);
        $imageResize->save(public_path('uploads/achivement/thumb/' . $fileName));
        $imageNameWithPath  = 'uploads/achivement/thumb/' . $fileName;
        $achivement->thumImage = $imageNameWithPath;

        $achivement->image = $this->imageUpload($request, 'image', 'uploads/achivement');
        $achivement->pdf = $this->imageUpload($request, 'pdf', 'uploads/achivement/pdf');

        //$product->image = '';
        $achivement->save();
        if($achivement){
            $data = "Achievement Successfully Add";
        }
        return response()->json($data);
    }

    public function edit($id){
        $achivement = Achievement::find($id);
        $achivement->imageUri = asset($achivement->image);
        // $achivement->pdfUri = asset($achivement->pdf);
        return response()->json($achivement);
    }

    public function update(Request $request,$id){

        $slug = Str::slug($request->name . '-' . time());
        $achivement = Achievement::find($id);
        $achivement->slug = $slug;
        $achivement->achievementCat_id = $request->achievementCat_id;
        // $product->sub_category_id = $request->sub_category_id;
        $achivement->name = $request->name;
        $achivement->description = $request->description;
        $productImage ='';
        if($request->hasFile('image')){
             if(!empty($achivement->image) && file_exists($achivement->image)){
                 unlink($achivement->image);
             }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = rand(111, 99999) . '.' . $extension;
            $imageResize = Image::make($image->getRealPath());
            $imageResize->resize(162,113);
            $imageResize->save(public_path('uploads/achivement/thumb/' . $fileName));
            $imageNameWithPath  = 'uploads/achivement/thumb/' . $fileName;
            $achivement->thumImage = $imageNameWithPath;
             $productImage = $this->imageUpload($request, 'image', 'uploads/achivement');   
        }
        else{
            $productImage = $achivement->image;
        }  


        $achivement->image = $productImage;
        $achivement->save();
        if($achivement){
            $update = 'successfully Update Achivement';
        }
       return response()->json($update);
    }

    public function destroy($id){
        $achivement = Achievement::find($id);
        if(!empty($achivement->image) && file_exists($achivement->image)){
          unlink($achivement->image);
         }
        $achivement->delete();
        if($achivement){
          $delete = "Achivement delete successfully";
        }
        return response()->json($delete);
    }
}
