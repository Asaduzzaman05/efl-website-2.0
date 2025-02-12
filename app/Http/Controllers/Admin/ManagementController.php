<?php

namespace App\Http\Controllers\Admin;

use App\Models\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ManagementController extends Controller
{

    public function index()
    {
        $management = Management::latest()->get();
        return view('admin.management.index', compact('management'));
    }

    public function allManagement(){
        $management = Management::latest()->get();
        $management = $management->map(function($pro){
             $pro->imageUrl = asset($pro->iamge);
             return $pro;
        });
        return response()->json($management);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'designation' => 'required|string|max:50',
            'image' => 'required|Image|mimes:jpg,png,jpeg,bmp',
        ]);

        $management = new Management();
        $management->name = $request->name;
        $management->designation = $request->designation;
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $fileName = rand(111, 99999) . '.' . $extension;
        $imageResize = Image::make($image->getRealPath());
        $imageResize->resize(240,240);
        $imageResize->save(public_path('uploads/management/' . $fileName));
        $management->image  = 'uploads/management/' . $fileName;
        $management->save();
        return response()->json(['success','Management Successfully save']);
    }


    public function edit($id)
    {
        $management = Management::find($id);
       return response()->json($management);
    }


    public function update(Request $request, $id)
    {

        $management = Management::find($id);

        $managementImage = '';
        if ($request->hasFile('image')) {
            if (!empty($management->image) && file_exists($management->image)) {
                unlink($management->image);
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = rand(111, 99999) . '.' . $extension;
            $imageResize = Image::make($image->getRealPath());
            $imageResize->resize(240,240);
            $imageResize->save(public_path('uploads/management/' . $fileName));
            $managementImage = 'uploads/management/' . $fileName;
            // $managementImage = $this->imageUpload($request, 'image', 'uploads/management');
        } else {
            $managementImage = $management->image;
        }
        $management->name = $request->name;
        $management->designation = $request->designation;
        $management->image = $managementImage;
        $management->save();
        return response()->json($management);

    }

    public function destroy($id)
    {
        $management = Management::find($id);
        if(!empty($management->image) && file_exists($management->image)){
         unlink($management->image);
        }
        $management->delete();
        if($management){
         $delete = "Management delete successfully";
        }
       return response()->json($delete);
    }
}
