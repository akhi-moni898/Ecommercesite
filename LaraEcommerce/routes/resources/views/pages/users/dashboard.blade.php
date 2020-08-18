@extends('pages.users.master')
@section('sub-content')
      
   <div class="container">
       
<center>
<h1>Welcome   </h1>
      
       <p>You Can change Your Profile Information</p>
        </center>
        <hr>
           <div class="row">
           	<div class="col-md-4">
        <div class=" card card-body mt-2 pointer" onclick="location.href'{{route('user.profile')}}'">
        	<h3>Update Profile</h3>
        </div>
    </div>
    </div>
   </div>


@endsection