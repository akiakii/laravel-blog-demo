{{-- Navigation --}}
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    {{-- Brand and toggle get grouped for better mobile display --}}
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target="#navbar-main">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">{{ config('blog.name') }}</a>
    </div>

    {{-- Collect the nav links, forms, and other content for toggling --}}
    <div class="collapse navbar-collapse" id="navbar-main">
        <ul class="nav navbar-nav">
            <li>
                <a href="/">Home</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-left">
            <li>
                <a href="/contact">Contact</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="/auth/login">Login</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false">
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/auth/logout">Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
  </div>
</nav>