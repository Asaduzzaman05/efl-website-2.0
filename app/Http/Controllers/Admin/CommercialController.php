<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Commercial;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CommercialController extends Controller
{
    public function index(){
        $commercials = Commercial::all();
        return view('admin.commercial.index',compact('commercials'));
    }

    public function store(Request $request){

        $request->validate([
            'name'  => 'required',
            'image'  => 'required|image|mimes:jpg,png,gif',
        ]);

        try{

            $commercial = new Commercial();
            $commercial->name = $request->name;
            $commercial->slug = Str::slug($request->slug);
            $commercial->image = $this->imageUpload($request, 'image', 'uploads/commercial') ?? '';
            $commercial->save();
            Session::flash('success','Commercial Display Solution Successfully Add');
            return back();

        }catch(Exception $e){
           Session::flash('error','Something is Worng');
        }

      
    }

    public function edit($id){
        $commercial = Commercial::find($id);
        return view('admin.commercial.edit',compact('commercial'));
    }

    public function update(Request $request,$id){

        try{

            $commercial = Commercial::find($id);
            $commercial->name = $request->name;
            //Commercial update image
            $commercialImage ='';
            if($request->hasFile('image')){
                if(!empty($commercial->logo) && file_exists($commercial->logo)){
                    unlink($commercial->logo);
                }
                $commercialImage = $this->imageUpload($request, 'image', 'uploads/commercial');   
            }
            else{
                $commercialImage = $commercial->image;
            }  
            $commercial->image = $commercialImage;
            $commercial->save();
            Session::flash('success','Commercial Display Solution Successfuly Updated');
            return back();

            }catch(Exception $e){
                Session::flash('error','Something is Worng');
            }
      

    }

    public function delete($id){
        try{
            $commercial = Commercial::find($id);
            $commercial->delete();
            Session::flash('success','Commercial Display Solution Successfully Delete');
            return back();
        }catch(Exception $e){
           Session::flash('error','Something is Worng');
        }
       
    }
}
