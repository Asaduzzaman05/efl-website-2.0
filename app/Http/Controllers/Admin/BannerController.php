<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Slider;
use App\Models\SliderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    public function index(){
       $sliders = Slider::get();
    //    dd($sliders);
       return view('admin.banner.index',compact('sliders'));
    }

    public function store(Request $request){

        $request->validate([

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);
        $slider = new Slider();
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('uploads/slider');
                $image->move($destinationPath, $filename);
                $imagePaths[] =$filename;
            }
            $slider->image_path = json_encode($imagePaths, true);
        }
        $slider->save();
        return redirect()->back()->with('success', ' Successfully created');
    }

    public function edit($id){
        $sliders = Slider::find($id);
        return view('admin.banner.edit',compact('sliders'));
    }

    public function update(Request $request, $id)
{

    $validated = $request->validate([
        'image_index' => 'required|integer',
        'images.*' => 'nullable|image|mimes:jpg,png,gif|max:20480',
    ]);

    try {
        DB::beginTransaction();
        $slider = Slider::findOrFail($id);

        $imagePaths = json_decode($slider->image_path, true);

        if (isset($imagePaths[$request->image_index])) {

            if ($request->hasFile("images.{$request->image_index}")) {

                $oldImagePath = public_path('uploads/slider/' . $imagePaths[$request->image_index]);
                if (file_exists($oldImagePath)) {
                    @unlink($oldImagePath);
                }
                $image = $request->file("images.{$request->image_index}");
                $filename = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('uploads/slider');
                $image->move($destinationPath, $filename);
                $imagePaths[$request->image_index] = $filename;
            } else {
                throw new Exception('No file uploaded for the selected image index.');
            }
        } else {
            throw new Exception('Invalid image index provided.');
        }
        $slider->image_path = json_encode($imagePaths);
        $slider->save();

        DB::commit();

        return redirect()->route('slider.create')->with('success', 'Slider image updated successfully.');
    } catch (Exception $e) {
        DB::rollBack();

        return redirect()->route('slider.create')->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function deleteImage(Request $request, $id)
{
    try {
        $slider = Slider::findOrFail($id);

        // Decode the JSON image paths
        $imagePaths = json_decode($slider->image_path, true);

        // Validate the image index exists
        if (isset($imagePaths[$request->image_index])) {
            $oldImagePath = public_path('uploads/slider/' . $imagePaths[$request->image_index]);

            // Delete the file from the filesystem
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Remove the image from the array
            unset($imagePaths[$request->image_index]);

            // Re-index the array to maintain consistency
            $imagePaths = array_values($imagePaths);

            // Update the database
            $slider->image_path = json_encode($imagePaths);
            $slider->save();

            return back()->with('success', 'Image deleted successfully.');
        } else {
            return back()->with('error', 'Invalid image index provided.');
        }
    } catch (Exception $e) {
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}


}
