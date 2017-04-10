
<html lang="en">
<head>
    <meta charset= "UTF-8" >
    <title>My Website</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" >

<!-- js -->
<script src= "https://code.jquery.com/jquery.js" ></script>
<script src= "//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</head>
<body>
<header>
    <nav class="navbar navbar-defualt" role="navigation">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li><a href="./">Home</a></li>
                <li><a href="./analytics">Data Analytics</a></li>
                <li><a href="./admin">Administration</a></li>
                <li><a href="http://sites.google.com/ait.asia/projectvi/">About Project</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>
</header>
@yield('content')
</body>
</html>
