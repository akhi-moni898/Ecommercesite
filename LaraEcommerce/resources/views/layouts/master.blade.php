<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ecommerce</title>
	@include('partials.styles')
</head>
<body>
  <div class="wrapper">
  	     
  	     @include('partials.nav')

          @include('partials.messages')

     @yield('content')


  </div>
   @include('partials.scripts')

</body>
</html>