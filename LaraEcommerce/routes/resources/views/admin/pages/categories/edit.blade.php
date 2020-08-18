@extends('admin.layouts.master')

@section('content')

            <div class="main-panel">
              <div class="content-wrapper">
              <div class="card">
                 <div class="cared-header">
                  <center>Edit Category</center> 
                 </div>
                  <div class="card-body">
                     
                     <form action="{{ route('admin.category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                     @include('admin.partials.messages')
                    <div class="form-group">
                      <label for="name">Category Name</label>
                      <input type="name" class="form-control"  name="name" id="name"  value="{{$category->name}}">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                     <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" class="form-control" rows="8" cols="80"> {{$category->description}}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="parent_id">Parent Category</label>
                     <select class="form-control" name="parent_id">
                           
                           @foreach( $main_categories as $cat)
                             

                             <option value="{{$cat->id}}" {{ $cat->id == $category->Parent_id ? 'selected': ''}}>{{$cat->name}}</option>

                           @endforeach 

                     </select>
                    </div>
                   
                  
                     
                    <div class="form-group">
                           <label for="oldimage">Old Image</label><br>
                          <img src="{!!asset('images/categories/'.$category->image)!!}" width="100"><br>

                      <label for="image"> New Image</label>
                      <input type="file" name="image" class="form-control" id="image" placeholder="Upload Image">

                  

                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                  </form>
                  </div>

              </div>
              </div>
              </div>
@endsection