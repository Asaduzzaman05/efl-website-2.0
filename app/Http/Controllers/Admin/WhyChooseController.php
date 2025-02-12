<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChoose;
class WhyChooseController extends Controller
{
    public function index(){

        return view('admin.choose.index');
    }
    public function allChoose(){

      $choose = WhyChoose::all();
      return response()->json($choose);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required',
        ]);

        $choose = new WhyChoose();
        $choose->title = $request->title;
        $choose->description = $request->description;
        $choose->save();
        return response()->json($choose);
    }
    public function edit($id){

       $choose = WhyChoose::find($id);
       return response()->json($choose);
    }
    public function update(Request $request,$id){

        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required',
        ]);

        $choose = WhyChoose::find($id);
        $choose->title = $request->title;
        $choose->description = $request->description;
        $choose->save();
        return response()->json($choose);

    }
    public function destroy($id){

        $choose = WhyChoose::find($id);
        $choose->delete();
        return response()->json($choose);
    }
}
