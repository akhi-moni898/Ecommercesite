@extends('layouts.master')

 @section('content')


     <!----start sidebar+content----->
<div class="container margin-top" >
	 <div class="row">
	 	   <div class="col-md-4">
										 	   	  
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  

    	@php $i = 1; @endphp 
    	@foreach ($product->images as $image)
    	  <div class="carousel-item active  {{ $i==1 ? 'active':''}}">
    	    <img class="d-block w-100" src="{!! asset('images/products/'.$image->image) !!}" alt="First slide">

    	        </div>
    		 @php $i++; @endphp
    	 @endforeach 
      

   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 

<div class="mt-3">
    <h2>Category <span class="badge badge-primary"> {{ $product->category->name}}</span> </h2>
       </div>
	 	   </div>

      
	
	
	 	   <div class="col-md-8">
	 	   	   <div class="widget">
	 	   	   	 
	
	 	   	   	    	


               <h3>{{ $product->title}}</h3>
                  <h3>{{ $product->price}} taka</h3>

                  <span class="badge badge-primary">
                  	
                  <h3>	{{ $product->quantity < 1 ? 'no item is available': $product->quantity.' item in stock'}}</h3>
                  </span>
<hr>

                  <div class="product-description">
                  	
                  
                    {{ $product->description}}
                  </div>

	 	   	   	
	 	   	   	    </div>
	 	   	   </div>
	 	   </div>
	  </div>



    <!----End sidebar+content----->

  @endsection