<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;

use Image;

use File;

class categoriescontroller extends Controller
{
  
    public function index()
    {

    }
    public function show($id)
    {
            
      $category= Category::find($id);
      if (!is_null($category)) {
             
             return view('pages.categories.show',compact('category'));
      }else
      {
        session()->flash('errors','sorry!!');
        return redirect('/');
      }

    }

    
}
