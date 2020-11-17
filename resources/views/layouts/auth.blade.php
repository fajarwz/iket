<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @stack('prepend-style')
  @include('includes.auth.style')
  @stack('addon-style')
</head>

<body>
  @yield('content')
  
  @stack('prepend-script')
  @include('includes.auth.script')
  @stack('addon-script')
</body>

</html>

<script>
$(document).ready(function() {
    $('a[href*=\\#]').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop : $(this.hash).offset().top
        }, 500);
    });
});
</script>