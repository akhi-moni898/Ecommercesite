@extends('admin.layouts.master')

@section('content')

            <div class="main-panel">
              <div class="content-wrapper">
              <div class="card">
                 <div class="cared-header">
                  <center>Add Brand</center> 
                 </div>
                  <div class="card-body">
                     
                     <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                     @include('admin.partials.messages')
                    <div class="form-group">
                      <label for="name">Brand Name</label>
                      <input type="name" class="form-control"  name="name" id="name"  placeholder="Enter Name">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea name="Description" class="form-control" rows="8" cols="80"></textarea>
                    </div>                  
                     
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" name="image" class="form-control" id="image" placeholder="Upload Image">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                  </form>
                  </div>

              </div>
              </div>
              </div>
@endsection