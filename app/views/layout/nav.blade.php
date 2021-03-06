<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Ticket Management</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('dashboard/tickets') }}">Tickets</a></li>
        @if (Auth::user()->role->name == 'Manager' || Auth::user()->role->name == 'Admin')
          <li><a href="{{ URL::to('dashboard/analytics') }}">Analytics</a></li>
        @endif
        @if (Auth::user()->role->name == 'Admin')
          <li><a href="{{ URL::to('admin/users') }}">Administration</a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <p class="navbar-text">Signed in as {{ Auth::user()->name }}</p>
        <li><a href="{{ URL::to('auth/logout') }}">Sign out</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
