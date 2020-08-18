<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;

use Image;

use File;
class CategoriesController extends Controller
{

   public 	function index()
   {
   	   
   	   $categories = Category::orderby('id','desc')->get();

   	   return view('admin.pages.categories.index', compact('categories'));

   } 


    public 	function create()
   {
   	   $main_categories = Category::orderby('name','desc')->where('parent_id',NULL)->get();

   	   return view('admin.pages.categories.create', compact('main_categories'));
   } 



 public function store(Request $request)
   {
   	
    $request->validate([
    'name' => 'required|max:255',
   'image' => 'nullable|image',
  
],

[
   'name.required' => 'Please provide a category name',
   'image.image'  => 'Please provide valid image',

]


);


     $category = new Category();

      $category->name = $request->name;
      $category->Description = $request->Description;
     $category->parent_id = $request->parent_id;
  
  
    if (count($request->image)>0) {

       $image = $request->file('image');
       $img = time().'.'.$image->getClientOriginalExtension();
       $location = public_path('images/categories/' .$img);
       Image::make($image)->save($location);

      $category->image = $img;

    }


       $category -> save();

      session()->flash('success','a new category has added successfully!!');
     return redirect()->route('admin.categories');
     

   }
  
   public function edit($id)
   {


   	 $main_categories = Category::orderby('name','desc')->where('parent_id',NULL)->get();
    $category = Category::find($id);

    if(!is_null(@Category)){
    return view('admin.pages.categories.edit',compact('category','main_categories'));
}else
{
   return redirect()->route('admin.categories');
     
}

   }


    public function update(Request $request,$id)
   {
   	
    $request->validate([
    'name' => 'required|max:255',
   'image' => 'nullable|image',
  
],

[
   'name.required' => 'Please provide a category name',
   'image.image'  => 'Please provide valid image',

]


);


     $category = Category::find($id);

      $category->name = $request->name;
      $category->Description = $request->Description;
     $category->parent_id = $request->parent_id;
  
  
    if (count($request->image)>0) {

    	if(File::exists('images/categories/'.$category->image)){

    		File::delete('images/categories/'.$category->image);
    	}

       $image = $request->file('image');
       $img = time().'.'.$image->getClientOriginalExtension();
       $location = public_path('images/categories/' .$img);
       Image::make($image)->save($location);

      $category->image = $img;

    }

       $category -> save();

      session()->flash('success','a new category has updated successfully!!');
     return redirect()->route('admin.categories');
     

   }
  
   public function delete($id)
   {

   	  $category = Category::find($id);
   	  if (!is_null($category)) {
                 
            if($category->parent_id==NULL){



            $sub_categories = Category::orderby('name','desc')->where('parent_id',$category->id)->get();

            foreach ($sub_categories as $sub) {

            	 if(File::exists('images/categories/'.$category->image)){

    		File::delete('images/categories/'.$category->image);
    	}


            	$sub->delete();

            }

            }

         if(File::exists('images/categories/'.$category->image)){

    		File::delete('images/categories/'.$category->image);
    	}



   	  	$category ->delete();
   	  }

   	  session()->flash('success','deleted successfully!!');

   	  return back();
   }


}

	