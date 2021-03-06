
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="../../../../favicon.ico">

    <title>titulo</title>
      <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/font/css/font-awesome.css')}}">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  </head>

  <body>
    @include('layouts._menu')
    
      <div class="container">
      
      @include('layouts._errors') {{-- incluye el partial del bucle de erores de forma global --}}
      @include('layouts._messages')
      
      <div id="app">
        @yield('content')
      </div>

    </div><!-- /.container -->

        <!-- jquery -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>

        <!-- popper -->
    <script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    {{-- <script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script> --}}
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('script')
    
  </body>
</html>
