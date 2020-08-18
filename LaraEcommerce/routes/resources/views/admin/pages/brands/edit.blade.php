@extends('admin.layouts.master')

@section('content')

            <div class="main-panel">
              <div class="content-wrapper">
              <div class="card">
                 <div class="cared-header">
                  <center>Edit brand</center> 
                 </div>
                  <div class="card-body">
                     
                     <form action="{{ route('admin.brand.update',$brand->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                     @include('admin.partials.messages')
                    <div class="form-group">
                      <label for="name">brand Name</label>
                      <input type="name" class="form-control"  name="name" id="name"  value="{{$brand->name}}">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                     <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" class="form-control" rows="8" cols="80"> {{$brand->description}}</textarea>
                    </div>

                  
                     
                    <div class="form-group">
                           <label for="oldimage">Old Image</label><br>
                          <img src="{!!asset('images/brands/'.$brand->image)!!}" width="100"><br>

                      <label for="image"> New Image</label>
                      <input type="file" name="image" class="form-control" id="image" placeholder="Upload Image">

                  

                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update brand</button>
                  </form>
                  </div>

              </div>
              </div>
              </div>
@endsection