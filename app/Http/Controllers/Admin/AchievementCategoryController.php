<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AchivementCategory;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AchievementCategoryController extends Controller
{
    public function index(){
      
        return view('admin.achivementCategory.index');
    }

    public function getAchivementCat(){
        $achivementCat = AchivementCategory::latest()->get();
        return response()->json($achivementCat);
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required|max:200',
         ]);
        $slug = Str::slug($request->name.'-'.time());
        $achivementCat = new AchivementCategory();
        $achivementCat->slug = $slug;
        $achivementCat->name = $request->name;
        $achivementCat->description = $request->description;
        $achivementCat->save();
        if($achivementCat){
            $success = 'successfully data insert';
        }
        return response()->json($success);

    }
    public function edit($id){
        $achivementCategory = AchivementCategory::find($id);
        return response()->json($achivementCategory);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' =>'required|max:200',
         ]);
         $achivementCategory = AchivementCategory::find($id);
         $achivementCategory->name = $request->name;
         $achivementCategory->description = $request->description;
         $achivementCategory->save();
         if($achivementCategory){
            $success = 'successfully data Update';
        }
        return response()->json($success);

    }

    public function destroy($id){
        $achivementCategory = AchivementCategory::find($id);
        $achivementCategory->delete();
        if($achivementCategory){
            $delete = "Achivement Categry delete successfully";
        }
        return response()->json($delete);
    }
}
