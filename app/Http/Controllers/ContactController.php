<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ContactController extends Controller
{
    public function store(Request $request)
{

    // dd($request->all());

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'nullable|string|max:1000',
        'phone' => 'nullable|string|max:15',
        'subject' => 'nullable|string|max:255',
    ]);

    ContactUs::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->input('phone'),
        'subject' => $request->input('subject'),
        'message' => $request->message,
    ]);

    return redirect()->back()->with('success', 'Message successfully sent.');
}

}
