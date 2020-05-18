<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'INTERN-CAMPUSPEDIA')}}</title>
		
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

    </head>
    <body>
    	@include('inc.navbar')
		
		<nav class="container" style="margin-top: 40px">
        	@yield('content')
    	</nav>


    </body>
</html>
