<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Project;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    public function index(){
        $clients = Project::all();
        return view('admin.project.index',compact('clients'));
    }

    public function store(Request $request){
      //  dd($request->all());
        $request->validate([
            'title'  => 'required',
            'image'  => 'required|image|mimes:jpg,png,gif',
       ]);

       try{

        $project = New Project();
        $project->title = $request->title;
        $project->slug = Str::slug($request->title);
        $project->image = $this->imageUpload($request, 'image', 'uploads/project') ?? '';
        $project->save();
        Session::flash('success','Project Successfully Add');
        return back();

       }catch(Exception $e){
        Session::flash('error','Something is Worng');
       }
    }

    public function edit($id){

        $clients = Project::find($id);
        return view('admin.project.edit',compact('clients'));
    }

   public function update(Request $request, $id){

            $request->validate([
                'title'  => 'required',
                'image'  => 'image|mimes:jpg,png,gif',
           ]);

        try{

            $project = Project::find($id);
            $project->title = $request->title;
            $project->description = $request->description;
            $project->slug = Str::slug($request->title);

           //Client Image
           $projectImage ='';
           if($request->hasFile('image')){
               if(!empty($project->image) && file_exists($project->image)){
                   unlink($project->image);
               }
               $projectImage = $this->imageUpload($request, 'image', 'uploads/project');
           }
           else{
               $projectImage = $project->image;
           }
           $project->image = $projectImage;


            $project->save();
            Session::flash('success','Project Successfully Updated');
            return redirect()->route('project.index');

        }catch(Exception $e){
           Session::flash('error','Something is Worng');
        }


   }

   public function delete($id){
       try{

        $project = Project::find($id);
        $project->delete();
        Session::flash('success','Project Successfully Delete');
        return back();

       }catch(Exception $e){
           Session::flash('error','Something is Worng');
           return back();
       }

   }


}
