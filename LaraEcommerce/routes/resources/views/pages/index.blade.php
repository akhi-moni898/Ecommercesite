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
	 	   	   	  <h2>Featured Products</h2>
	 	   	   	    <div class="row">


	 	   	   	   @include('pages.product.partials.all_products')
	 	   	   	    	
	 	   	   </div>
	 	   </div>
	  </div>

</div>
</div>

    <!----End sidebar+content----->

  @endsection