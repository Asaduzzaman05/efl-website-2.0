<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $category = Category::latest()->get();
        return view('admin.product.index', compact('category'));
    }

    public function subcategory($id){
        $subcategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategory);
    }

    // all product
    public function allProduct(){
        $product = Product::with('category','subcategory')->latest()->get();
        $product = $product->map(function ($pro) {
            $pro->imageUrl = asset($pro->image);
            return $pro;
        });
        return response()->json($product);
    }

    // store product
    public function store(Request $request){

        $request->validate([
            'category_id' =>'required',
            'name' =>'required',
            'image' => 'required|mimes:jpg,png,jpeg,bmp,gif',
            'pdf' => 'mimes:pdf'
        ]);

        $slug = Str::slug($request->name . '-' . time());
        $product = new Product();
        $product->slug = $slug;
        $product->category_id = $request->category_id;
        // $product->sub_category_id = $request->sub_category_id;
        $product->name = $request->name;
        $product->description = $request->description;

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $fileName = rand(111, 99999) . '.' . $extension;
        $imageResize = Image::make($image->getRealPath());
        $imageResize->resize(162,113);
        $imageResize->save(public_path('uploads/products/thumb/' . $fileName));
        $imageNameWithPath  = 'uploads/products/thumb/' . $fileName;
        $product->thumImage = $imageNameWithPath;

        $product->image = $this->imageUpload($request, 'image', 'uploads/products');
        $product->pdf = $this->imageUpload($request, 'pdf', 'uploads/products/pdf');

        //$product->image = '';
        $product->save();

        if($product){
            $data = 'product upload successfull';
        }
        return response()->json($data);
    }


// edit product
    public function edit($id){
        $product = Product::find($id);
        $product->imageUri = asset($product->image);
        $product->pdfUri = asset($product->pdf);
        return response()->json($product);

    }
    
  // Update Product
  public function update(Request $request,$id){
      
        $slug = Str::slug($request->name . '-' . time());
        $product = Product::find($id);
        $product->slug = $slug;
        $product->category_id = $request->category_id;
        // $product->sub_category_id = $request->sub_category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $productImage ='';
        if($request->hasFile('image')){
             if(!empty($product->image) && file_exists($product->image)){
                 unlink($product->image);
             }

             $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $fileName = rand(111, 99999) . '.' . $extension;
            $imageResize = Image::make($image->getRealPath());
            $imageResize->resize(162,113);
            $imageResize->save(public_path('uploads/products/thumb/' . $fileName));
            $imageNameWithPath  = 'uploads/products/thumb/' . $fileName;
            $product->thumImage = $imageNameWithPath;
             $productImage = $this->imageUpload($request, 'image', 'uploads/products');   
        }
        else{
            $productImage = $product->image;
        }  


        $pdfName ='';
        if($request->hasFile('pdf')){
             if(!empty($product->pdf) && file_exists($product->pdf)){
                 unlink($product->pdf);
             }
             $pdfName = $this->imageUpload($request, 'pdf', 'uploads/products/pdf');   
        }
        else{
            $pdfName = $product->pdf;
        } 

        $product->pdf = $pdfName;
        $product->image = $productImage;
        $product->save();
        if($product){
            $update = 'successfully Update Product';
        }
       return response()->json($update);
  }  

  public function destroy($id){
      $product = Product::find($id);
      if(!empty($product->image) && file_exists($product->image)){
        unlink($product->image);
       }
      $product->delete();
      if($product){
        $delete = "product delete successfully";
      }
      return response()->json($delete);
  }

}
