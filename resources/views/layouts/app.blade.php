<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title')</title>

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
</head>

<body>
    <div class="wrapper">
        @include('includes.sidebar')
        <div class="main-panel">
            @include('includes.navbar')

            @yield('content')
            
            @include('includes.footer')
        </div>
    </div>
    
</body>

@stack('before-script')
@include('includes.script')
@stack('after-script')

</html>