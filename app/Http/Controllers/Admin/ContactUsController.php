<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\ContactUs;
use Exception;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        $messages = ContactUs::all();
        return view('admin.message.list',compact('messages'));
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

         $contact = new ContactUs();
         $contact->name = $request->name;
         $contact->email = $request->email;
         $contact->message = $request->message;
         $contact->save();

         if($contact){
            Session::flash('message','Message Successfully Send');
            return back();
         }else{
             Session::flash('error', 'Opps! Message send Fail');
             return back();
         }


    }

    public function delete($id){
        try{

            $message = ContactUs::find($id);
            $message->delete();
            Session::flash('success','Message Successfuly Delete');
            return back();

        }catch(Exception $e){
           Session::flash('error','Something is worong ');
        }


    }
}
