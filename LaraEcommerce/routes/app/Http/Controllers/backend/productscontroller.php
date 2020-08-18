<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Image;
class productscontroller extends Controller
{
   public function index()
   {
    $products = Product::orderBy('id','desc')->get();
    return view('admin.pages.product.manage')-> with('products',$products);
   }

   public function create()
   {
   	return view('admin.pages.product.create');
   }
  
   public function edit($id)
   {
    $product = product::find($id);
    return view('admin.pages.product.edit')-> with('product',$product);
   }



    public function store(Request $request)
   {
   	
    $request->validate([
    'title' => 'required|max:255',
   'Description' => 'required',
   'price' => 'required|numeric',
   'quantity' => 'required|numeric',
   'category_id' => 'required|numeric',
   'brand_id' => 'required|numeric',
]);


     $product = new Product;

     $product->title = $request->title;
      $product->Description = $request->Description;

     $product->price = $request->price;

     $product->quantity = $request->quantity;    

      $product->slug = str_slug($request->title);

     $product->category_id = $request->category_id;
     
     
     $product->brand_id =$request->brand_id;
     $product->admin_id = 1;

     $product -> save();
    if ($request->hasFile('product_image')) {

       $image = $request->file('product_image');
       $img = time().'.'.$image->getClientOriginalExtension();
       $location = public_path('images/products/' .$img);
       Image::make($image)->save($location);

       $product_image = new ProductImage;
       $product_image -> product_id = $product->id;
         $product_image -> image = $img;
           $product_image -> save();

    }




     return redirect()->route('admin.pages.product.create');
     

   }
    
     public function update(Request $request,$id)
   {
    
    $request->validate([
    'title' => 'required|max:255',
   'Description' => 'required',
   'price' => 'required|numeric',
   'quantity' => 'required|numeric',
   'category_id' => 'required|numeric',
   'brand_id' => 'required|numeric',
]);


     $product =  Product::find($id);

     $product->title = $request->title;
      $product->Description = $request->Description;

     $product->price = $request->price;

     $product->quantity = $request->quantity;

     $product->category_id = $request->category_id;
     
     
     $product->brand_id =$request->brand_id;    

     $product -> save();
   
     return redirect()->route('admin.products');
     

   }
   public function delete($id)
   {

   	  $product = Product::find($id);
   	  if (!is_null($product)) {


   	  	$product ->delete();
   	  }

   	  session()->flash('success','deleted successfully!!');

   	  return back();
   }
    
   
}
