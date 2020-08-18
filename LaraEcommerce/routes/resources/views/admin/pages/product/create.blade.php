@extends('admin.layouts.master')

@section('content')

            <div class="main-panel">
              <div class="content-wrapper">
              <div class="card">
                 <div class="cared-header">
                  <center>Add Product</center> 
                 </div>
                  <div class="card-body">
                     
                     <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                      {{ csrf_field()}}
                     @include('admin.partials.messages')
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Title</label>
                      <input type="text" class="form-control"  name="title" id="exampleInputEmail1"  placeholder="Enter title">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea name="Description" class="form-control" rows="8" cols="80"></textarea>
                    </div>
                   
                  
                     <div class="form-group">
                      <label for="exampleInputEmail1">Product Price</label>
                      <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Product Quantity</label>
                      <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter quantity">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>


                        <div class="form-group">
                      <label for="exampleInputEmail1">Select Category</label>
                          <select class="form-control" name="category_id">
                            
                         <option value=""> Select a Category</option>
       @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
                          <option value="{{$parent->id}}">{{$parent->name}}</option>
@foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)

             <option value="{{$child->id}}">----->{{$child->name}}</option>
                       @endforeach
                     @endforeach
                          </select>
                    </div>

              <div class="form-group">
            <label for="exampleInputEmail1">Select Brand</label>
                          <select class="form-control" name="brand_id">
                            
                         <option value=""> Select a Brand</option>
       @foreach (App\Models\Brand::orderBy('name','asc')->get() as $brand)
                          <option value="{{$brand->id}}">{{$brand->name}}</option>

                     @endforeach
                          </select>
                    </div>



                    <div class="form-group">
                      <label for="product_image">Product Imagae</label>
                      <input type="file" name="product_image" class="form-control" id="product_image" placeholder="Upload Image">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                  </form>
                  </div>

              </div>
              </div>
              </div>
@endsection