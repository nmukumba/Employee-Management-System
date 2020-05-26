<header class="main-header">

  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>H</b>RS</span>
    <!-- <span class="logo-mini"><img src="/img/logo3.png" class="img-responsive"></span> -->
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>HR</b> System</span>
    <!-- <span class="logo-lg"><img src="/img/logo2.png" class="img-responsive" style="height: 50px; margin: auto;"></span> -->
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="/img/avatar5.png" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">{{Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="/img/avatar5.png" class="img-circle" alt="User Image">
            <p>
              {{Auth::user()->name}}
              @if (Auth::user()->user_type_id == 1)
                  <small>System Admin</small>
              @endif
              @if (Auth::user()->user_type_id == 2)
                  <small>HR Officer</small>
              @endif
            </p>
          </li>
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="/profile" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Sign out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </li>
      
    </ul>
  </div>
</nav>
</header>