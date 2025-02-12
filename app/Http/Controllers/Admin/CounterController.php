<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Counter;
use Exception;

class CounterController extends Controller
{
    public function index(){
        $counters = Counter::all();
        return view('admin.counter.index',compact('counters'));
    }

    public function store(Request $request){

        $request->validate([
            'title'  => 'required',
            'count_number'  => 'required',

       ]);

        try{
            $counter = new Counter();
            $counter->title = $request->title;
            $counter->count_number = $request->count_number;
            $counter->save();
            Session::flash('success','Count Number Add Successfully Add');
            return back();

        }catch(Exception $e){
           Session::flash('error','Something is Worng');
           return back();
        }

    }

    public function edit($id){
       $counter = Counter::find($id);
       return view('admin.counter.edit',compact('counter'));
    }

    public function update(Request $request,$id){

        try{

            $counter = Counter::find($id);
            $counter->title = $request->title;
            $counter->count_number = $request->count_number;
            $counter->save();
            Session::flash('success','Count Number Update Successfully');
            return back();

        }catch(Exception $e){
            Session::flash('error','Something is worng');
        }

    }

    public function delete($id){
        try{

            $counter = Counter::find($id);
            $counter->delete();
            Session::flash('success','Counter Number Delete Successfully');
            return back();

        }catch(Exception $e){
           Session::flash('error','Something Is Worng');
           return back();
        }

    }
}
