<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Division;

use App\Models\District;

use Image;

use File;
class DivisionsController extends Controller
{

   public 	function index()
   {
   	   
   	   $divisions = Division::orderby('priority','asc')->get();

   	   return view('admin.pages.divisions.index', compact('divisions'));

   } 


    public 	function create()
   {
   	 

   	   return view('admin.pages.divisions.create');
   } 



 public function store(Request $request)
   {
   	
    $request->validate([
    'name' => 'required|max:255',
   'priority' => 'required',
  
],

[
   'name.required' => 'Please provide a division name',
   'priority.required'  => 'Please provide division priority',

]


); 


     $division = new Division();

      $division->name = $request->name;
      $division->priority = $request->priority;
   

       $division -> save();

      session()->flash('success','a new division has added successfully!!');
     return redirect()->route('admin.divisions');
     

   }
  
   public function edit($id)
   {


  
    $division = Division::find($id);

    if(!is_null($division)){
    return view('admin.pages.divisions.edit',compact('division'));
}else
{
   return redirect()->route('admin.divisions');
     
}

   }


    public function update(Request $request,$id)
   {
   	
    $request->validate([
    'name' => 'required|max:255',
   'priority' => 'required',
],

[
	'name.required' => 'Please provide a division name',
   'priority.required'  => 'Please provide division priority',

]


);


     $division = Division::find($id);

      $division->name = $request->name;
      $division->priority = $request->priority;
    
  


       $division -> save();

      session()->flash('success','a new division has updated successfully!!');
     return redirect()->route('admin.divisions');
     

   }
  
   public function delete($id)
   {

   	  $division = Division::find($id);
   	  if (!is_null($division)) {
                   
      $districts=District::where('division_id',$division->id)->get();
      foreach ($districts as $district) {
               $district ->delete();
      }
   	  	$division ->delete();
   	  }

   	  session()->flash('success','deleted successfully!!');

   	  return back();
   }


}

	
