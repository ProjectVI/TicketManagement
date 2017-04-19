<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ticket Management System</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    </head>
    <body>
        <h1>Laravel Quickstart</h1>
        <a href="{{ URL::to('logout') }}">Logout</a>
        <div class="container">
          @yield('content')
        </div>
    </body>
</html>
