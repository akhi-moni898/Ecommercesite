

<div class="row">
@foreach ($products as $product)
	 	   	   	    	  <div class="col-md-3">
														 <div class="card" >


                                     @php
                                            $i=1;
                                     @endphp


														 	@foreach ( $product->images as $image)
														 	@if($i>0)
	 <a href="{{ route('products.show',$product->slug)}}"><img class="card-img-top feature-img" src="{{ asset('images/products/'. $image->image )}}" alt="{{ $product->title }}"></a>
								  
								                           @endif

                                                        @php 

                                                          $i--;
                                                        @endphp

												         @endforeach
														  <div class="card-body">
														   <a href="{{ route('products.show',$product->slug)}}">{{$product->title}}</a>
														    <p class="card-text">Taka-50000</p>
														    <a href="#" class="btn btn-outline-warning">Add to Cart</a>
                                                          </div>
                                                     </div>
	 	   	   	    	  </div>
	 	   	   	    	   
	 	   	   	    	  


	 	   	   @endforeach

</div>
<div class="pagination">
	
	{{$products->links()}}
</div>
