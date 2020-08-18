<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Models\product;

class productscontroller extends Controller
{
       public function index()
    {
    	$products = product::orderBy('id','desc')->paginate(9);
    	return view('pages.product.index')->with('products',$products );
    }



public function show($slug)
{

     $product =Product::where('slug',$slug)->first();
     if (!is_null($product)){
     	
    return view('pages.product.show',compact('product'));


     }else{
        session()->flash('errors','sorry! this product is not found');
     	return redirect()->route('products');
     }

}
  
}