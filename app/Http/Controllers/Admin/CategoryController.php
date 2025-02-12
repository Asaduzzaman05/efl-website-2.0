<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function getCategory(){
        $category = Category::latest()->get();
        return response()->json($category);
    }

    public function store(Request $request){
     
        $request->validate([
          'name' =>'required|max:200',
          'description' => 'required'
       ]);
        $slug = Str::slug($request->name.'-'.time());
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->save();
        if($category){
            $success = 'successfully data insert';
        }
       return response()->json($success);
    }


    // edit category 
     
    public function edit($id){
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id){
       
        $request->validate([
            'name' =>'required|max:200',
            'description' => 'required'
        ]);
  
          $category =Category::find($id);
          $category->name = $request->name;
          $category->description = $request->description;
          $category->save();
          if($category){
              $update = 'successfully Update Cateogry';
          }
         return response()->json($update);
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        if($category){
            $delete = "categry delete successfully";
        }
        return response()->json($delete);
    }
}
