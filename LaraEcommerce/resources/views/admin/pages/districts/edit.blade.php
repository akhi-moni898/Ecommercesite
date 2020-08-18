@extends('admin.layouts.master')

@section('content')

            <div class="main-panel">
              <div class="content-wrapper">
              <div class="card">
                 <div class="cared-header">
                  <center>Edit District</center> 
                 </div>
                  <div class="card-body">
                     
                     <form action="{{ route('admin.district.update',$district->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                     @include('admin.partials.messages')
                     <div class="form-group">
                      <label for="name">District Name</label>
                      <input type="name" class="form-control"  name="name" id="name"  value="{{$district->name}}">
                     
                    </div>
                   

                    <div class="form-group">
                      <label for="division_id">Select A Division</label>
                     <select class="form-control" name="division_id">
                       <option value="">Select A Division </option>    
                           @foreach( $divisions as $division)
                             

                             <option value="{{$division->id}}"{{$district->division->id==$division->id ? 'selected':''}}>{{$division->name}}</option>

                           @endforeach 

                     </select>
                    </div>
                   
                  
                     
                    <button type="submit" class="btn btn-primary">Update District</button>
                  </form>
                  </div>

              </div>
              </div>
              </div>
@endsection