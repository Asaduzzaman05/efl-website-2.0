<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class BlogController extends Controller
{
    public function index(){

        $aisItems = BlogPost::select('*')
                            ->orderByDesc('created_at')
                            ->get();

        return view('admin.blogs.index', compact('aisItems'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        ini_set('max_execution_time', '3000');
        ini_set('memory_limit', '256M');
        ini_set("pcre.backtrack_limit", "50000000");
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'subcategory' => 'nullable|string|max:255',
            'date'=>'nullable',
            'description' => 'required|string|max:100000000000',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        $blogPost = new BlogPost();
        $blogPost->title = $validated['title'];
        $blogPost->category = $validated['category'];
        $blogPost->subcategory = $validated['subcategory'];
        $blogPost->date = $validated['date'];
        $blogPost->description = $validated['description'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('uploads/blog_images');
            $image->move($destinationPath, $filename);
            $blogPost->image_path = 'public/uploads/blog_images/' . $filename;
        }
        $blogPost->views = 0;
        $blogPost->save();
        return redirect()->route('blog.index')->with('success', 'Blog post created successfully!');
    }


    public function allblogs(){
        $choose = BlogPost::all();
        return response()->json($choose);
      }



     public function destroy($id)
     {
         $aisItem = BlogPost::find($id);

         if ($aisItem) {
             // Optionally delete the image file if it exists
             if ($aisItem->image_path) {
                 $imagePath = public_path($aisItem->image_path);
                 if (file_exists($imagePath)) {
                     unlink($imagePath);
                 }
             }

             $aisItem->delete();

             return redirect()->back()->with('success', 'Post deleted successfully!');
         } else {
             return redirect()->back()->with('error', 'Item not found');
         }
     }
     public function edit($id)
     {
         $aisItem = BlogPost::findOrFail($id);
         return view('admin.blogs.edit', compact('aisItem'));
     }

     public function update(Request $request, $id)
     {
        // dd($request->all());
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'category' => 'required|string|max:255',
             'subcategory' => 'required|string|max:255',
             'date'=>'nullable',
             'description' => 'required|string',

             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
         ]);

         $aisItem = BlogPost::findOrFail($id);

         $aisItem->title = $validated['title'];
         $aisItem->category = $validated['category'];
         $aisItem->subcategory = $validated['subcategory'];
         $aisItem->date =$validated['date'];
         $aisItem->description = $validated['description'];

         if ($request->hasFile('image')) {
             // Delete the old image if it exists
             if ($aisItem->image_path && file_exists(public_path($aisItem->image_path))) {
                 @unlink(public_path($aisItem->image_path));
             }

             $image = $request->file('image');
             $filename = time() . '_' . $image->getClientOriginalName();
             $destinationPath = public_path('uploads/blog_images');
             $image->move($destinationPath, $filename);
             $aisItem->image_path = 'public/uploads/blog_images/' . $filename;
         }

         $aisItem->save();

         return redirect()->route('blog.index')->with('success', 'Blog post updated successfully!');
     }

}
