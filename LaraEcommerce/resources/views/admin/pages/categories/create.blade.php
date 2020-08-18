@extends('admin.layouts.master')

@section('content')

            <div class="main-panel">
              <div class="content-wrapper">
              <div class="card">
                 <div class="cared-header">
                  <center>Add Category</center> 
                 </div>
                  <div class="card-body">
                     
                     <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                     @include('admin.partials.messages')
                    <div class="form-group">
                      <label for="name">Category Name</label>
                      <input type="name" class="form-control"  name="name" id="name"  placeholder="Enter Name">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea name="Description" class="form-control" rows="8" cols="80"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="parent_id">Parent Category</label>
                     <select class="form-control" name="parent_id">
                       <option value="">select a parent class </option>    
                           @foreach( $main_categories as $category)
                             

                             <option value="{{$category->id}}">{{$category->name}}</option>

                           @endforeach 

                     </select>
                    </div>
                   
                  
                     
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" name="image" class="form-control" id="image" placeholder="Upload Image">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </form>
                  </div>

              </div>
              </div>
              </div>
@endsection