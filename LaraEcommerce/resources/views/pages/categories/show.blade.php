@extends('layouts.master')

 @section('content')


     <!----start sidebar+content----->
<div class="container margin-top" >
	 <div class="row">
	 	   <div class="col-md-4">
										 	   	  
				 	  @include('partials.sidebar')						 	   
	 	   </div>
	
	
	 	   <div class="col-md-8">
	 	   	   <div class="widget">
	 	   	   	 
	 	   
	 	   	   	    	
             <h3>All Products in <span class="badge badge-info"> {{$category->name}}</span></h3>
   <div class="form-group">
            <p> @php
                 
                  $products=$category->products()->paginate(9);

             @endphp

             @if($products->count()>0)
                 @include('pages.product.partials.all_products')


             @else 
               <div class="alert alert-warning">
              no product
                
               </div>

             @endif
             </p>
            
               </div>
	 	   	   	  
	 	   	   	    </div>
	 	   	   </div>
	 	   </div>
	  </div>



    <!----End sidebar+content----->

  @endsection