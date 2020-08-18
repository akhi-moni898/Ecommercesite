<?php
namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Image;
class pagescontroller extends Controller
{
   public function index()
   {
   	return view('admin.pages.index');
   }
  
    
   
}

