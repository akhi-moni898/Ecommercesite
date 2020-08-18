<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;


class pagescontroller extends Controller
{
    public function index()
    {

    	$products = product::orderBy('id','desc')->paginate(9);

    	return view('pages.index',compact('products'));
    }

    public function contact()
    {
    	return view('pages.contact');
    }

   public function search(Request $request)
    {

    	$search = $request->search;
    	$products = Product::orWhere('title','like' ,'%'.$search.'%')
    	->orWhere('description','like', '%'.$search.'%')
    	->orWhere('quantity','like' ,'%'.$search.'%')
    	->orderBy('id','desc')
    	->paginate(9);
    	return view('pages.product.search',compact('search','products'));
    }
   
}
