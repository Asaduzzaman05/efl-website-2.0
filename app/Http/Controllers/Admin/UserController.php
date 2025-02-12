<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        $user = User::all();
        return view('auth.register', compact('user'));
    }

    public function createUser(Request $request){
     
        $request->validate([
            'email'=>'required|unique:users',
            'image'=>'required|image|mimes:jpg,png,gif,bmp',
            'password'=>'required|confirmed|min:2',
        ]);

        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->image = $this->imageUpload($request, 'image', 'uploads/user') ?? '';
            $user->status= 1;
            $user->save();
            Session::flash('success', ' User Added Successfully');
            return back();

        }catch(Exception $e){
           Session::flash('error','Something is Worng');
           return back();
        }
        
    }

    public function edit($id){
        $user = User::find($id);
        $userList = User::all();
        return view('auth.edit', compact('user', 'userList'));
    }

    public function updateUser(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email'=>'required',
            'image'=>'image|mimes:jpg,png,gif,bmp',
        ]);
        $user = User::find($id);
        $duplicate = User::where('id', '!=',  $id)->where('email', $request->email)->get();
        if(count($duplicate) > 0){

        }else{

         $userImage ='';
        if($request->hasFile('image')){
            if(!empty($user->image) && file_exists($user->image)){
                unlink($user->image);
            }
            $userImage = $this->imageUpload($request, 'image', 'uploads/user');   
        }
        else{
            $userImage = $user->image;
        }  
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        } else {
            $user->password = $user->password;
        }
        $user->image = $userImage;
        $user->status= 1;
        $user->save();
        Session::flash('success', ' User update Successfully');
        return back();
      
        }
        
    }

    public function changepassword(){
       return view('auth.change-password');
    }

    public function passwordUpdate(Request $request){

       
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required',
        ]);
        $has_password = Auth::user()->password;
        if(Hash::check($request->old_password, $has_password))
        {
            if(!Hash::check($request->password, $has_password))
            {
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login');
            }
            else
            {
                return redirect()->back()->withInput();
            }
        }
        else
        {
            return 'password dose not match';
        }
    }
   
}
