

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
														    <p class="card-text">Taka-{{$product->price}}</p>
														   @include('pages.product.partials.cart-button')
                                                          </div>
                                                     </div>
	 	   	   	    	  </div>
	 	   	   	    	   
	 	   	   	    	  


	 	   	   @endforeach

</div>
<div class="pagination">
	
	{{$products->links()}}
</div>
