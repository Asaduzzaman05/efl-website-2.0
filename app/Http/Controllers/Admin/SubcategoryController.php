<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.subcategory.index', compact('category'));
    }


    public function getSubcategory(){
        $subcategory = SubCategory::with('category')->get();
        return response()->json($subcategory);
    }

//subcategory store

    public function subCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);
        $subcategory = new SubCategory();
        $subcategory->category_id =$request->category_id;
        $subcategory->name =$request->name;
        $subcategory->description =$request->description;
        $subcategory->save();
        if($subcategory){
            $data = 'subcategory Insert Successfully';
        }
        return response()->json($data);
    }
//  subcategory edit

    public function editSubcategory($id){
        $subcategory = SubCategory::with('category')->find($id);
        return response()->json($subcategory);
    }

    public function updateSubcategory(Request $request, $id){
        
        $request->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);
        $slug = Str::slug($request->name . '-' . time());
        $subcategory = SubCategory::find($id);
        $subcategory->slug = $slug;
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->save();
        if($subcategory){
            $data = 'Subcategory Update Successfully';
        }
        return response()->json($data);
    }
  
}
