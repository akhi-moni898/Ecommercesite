@extends('admin.layouts.master')

@section('content')

            <div class="main-panel">
              <div class="content-wrapper">
              <div class="card">
                 <div class="cared-header">
                  <center>Add Division</center> 
                 </div>
                  <div class="card-body">
                     
                     <form action="{{ route('admin.division.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                     @include('admin.partials.messages')
                    <div class="form-group">
                      <label for="name">Division Name</label>
                      <input type="name" class="form-control"  name="name" id="name"  placeholder="Enter Name">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                     <div class="form-group">
                      <label for="priority">Priority</label>
                      <input type="priority" class="form-control"  name="priority" id="priority"  placeholder="Enter Name">
                      <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Division</button>
                  </form>
                  </div>

              </div>
              </div>
              </div>
@endsection