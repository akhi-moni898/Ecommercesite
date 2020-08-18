<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Brand;

use Image;

use File;
class BrandsController extends Controller
{

   public 	function index()
   {
   	   
   	   $brands = Brand::orderby('id','desc')->get();

   	   return view('admin.pages.brands.index', compact('brands'));

   } 


    public 	function create()
   {
   	  

   	   return view('admin.pages.brands.create');
   } 



 public function store(Request $request)
   {
   	
    $request->validate([
    'name' => 'required|max:255',
   'image' => 'nullable|image',
  
],

[
   'name.required' => 'Please provide a brand name',
   'image.image'  => 'Please provide valid image',

]


);


     $brand = new Brand();

      $brand->name = $request->name;
      $brand->Description = $request->Description;
  
  
  
    if (count($request->image)>0) {

       $image = $request->file('image');
       $img = time().'.'.$image->getClientOriginalExtension();
       $location = public_path('images/brands/' .$img);
       Image::make($image)->save($location);

      $brand->image = $img;

    }


       $brand -> save();

      session()->flash('success','a new brand has added successfully!!');
     return redirect()->route('admin.brands');
     

   }
  
   public function edit($id)
   {


    $brand = Brand::find($id);

    if(!is_null($brand)){
    return view('admin.pages.brands.edit',compact('brand'));
}else
{
   return redirect()->route('admin.brands');
     
}

   }


    public function update(Request $request,$id)
   {
   	
    $request->validate([
    'name' => 'required|max:255',
   'image' => 'nullable|image',
  
],

[
   'name.required' => 'Please provide a brand name',
   'image.image'  => 'Please provide valid image',

]


);


     $brand = Brand::find($id);

      $brand->name = $request->name;
      $brand->Description = $request->Description;
 
  
    if (count($request->image)>0) {

    	if(File::exists('images/brands/'.$brand->image)){

    		File::delete('images/brands/'.$brand->image);
    	}

       $image = $request->file('image');
       $img = time().'.'.$image->getClientOriginalExtension();
       $location = public_path('images/brands/' .$img);
       Image::make($image)->save($location);

      $brand->image = $img;

    }

       $brand -> save();

      session()->flash('success','a new brand has updated successfully!!');
     return redirect()->route('admin.brands');
     

   }
  
   public function delete($id)
   {

   	  $brand = Brand::find($id);
   	  if (!is_null($brand)) {
                 
    

         if(File::exists('images/brands/'.$brand->image)){

    		File::delete('images/brands/'.$brand->image);
    	}



   	  	$brand ->delete();
   	  }

   	  session()->flash('success','deleted successfully!!');

   	  return back();
   }


}

	