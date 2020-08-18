@extends('layouts.master')
@section('content')
      
   <div class="container mt-2">
       
     <div class="row">
     	  <div class="col-md-4">
     	  	<ul class="list-group">

     	  		<a href="{{route('user.dashboard')}}" class="list-group-item {{route::is('user.dashboard')? 'active': ''}}">Dashboard</a>
     	  		<a href="{{route('user.profile')}}" class="list-group-item {{route::is('user.profile')? 'active': ''}}">Update Profile</a>
                <a href="" class="list-group-item">Logout</a>
     	  		
     	  	</ul>
     	  </div>
     <div class="col-md-8 ">
        <div class="card card-body">
            
                @yield('sub-content')
        </div>
     	  
     	  </div>

     </div>

   </div>


@endsection