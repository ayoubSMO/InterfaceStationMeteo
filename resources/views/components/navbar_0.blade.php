
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">

<header class="header black-bg">
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="./" class="logo"><b>e-<span>Station</span> IAAD</b></a>
    <!--logo end-->
        <!-- settings end -->
        <!-- inbox dropdown start-->
    <div class="top-menu">
      @auth
      <ul class="nav pull-right top-menu">
        <button class="btn btn-primary" hidden>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-jet-responsive-nav-link href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                          this.closest('form').submit();">
              {{ __('Log Out') }}
          </x-jet-responsive-nav-link>
      </form>
        </button>
      </ul>
      @endauth
    </div>
  </header>