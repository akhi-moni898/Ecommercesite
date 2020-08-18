<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\District;

use App\Models\Division;

use Image;

use File;
class DistrictsController extends Controller
{

     public   function index()
   {
       
       $districts = District::orderby('name','asc')->get();

       return view('admin.pages.districts.index', compact('districts'));

   } 


    public  function create()
   {
     
 $divisions = Division::orderby('priority','asc')->get();
       return view('admin.pages.districts.create',compact('divisions'));
   } 



 public function store(Request $request)
   {
    
    $request->validate([
    'name' => 'required|max:255',
   'division_id' => 'required',
  
],

[
   'name.required' => 'Please provide a district name',
   'division_id.required'  => 'Please provide district priority',

]


); 


     $district = new District();

      $district->name = $request->name;
      $district->division_id = $request->division_id;
   

       $district -> save();

      session()->flash('success','a new district has added successfully!!');
     return redirect()->route('admin.districts');
     

   }
  
   public function edit($id)
   {

$divisions = Division::orderby('priority','asc')->get();
  
    $district = District::find($id);

    if(!is_null($district)){
    return view('admin.pages.districts.edit',compact('district','divisions'));
}else
{
   return redirect()->route('admin.districts');
     
}

   }


    public function update(Request $request,$id)
   {
    
    $request->validate([
    'name' => 'required|max:255',
   'division_id' => 'required',
],

[
  'name.required' => 'Please provide a district name',
   'division_id.required'  => 'Please provide district priority',

]


);


     $district = District::find($id);

      $district->name = $request->name;
      $district->division_id = $request->division_id;
    
  


       $district -> save();

      session()->flash('success','a new district has updated successfully!!');
     return redirect()->route('admin.districts');
     

   }
  
   public function delete($id)
   {

      $district = District::find($id);
      if (!is_null($district)) {
                 

        $district ->delete();
      }

      session()->flash('success','deleted successfully!!');

      return back();
   }


}