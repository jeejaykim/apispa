<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    @if(request()->route()->getName() == 'reservation.index')
    <div class="navbar-wrapper">
      <a class="btn" href="{{ route('reservation.create') }}" style="color:#fff;">
        <i class="material-icons">add</i> Add Old Reservation
      </a>
    </div>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form" action="{{route('record.search')}}" method="POST" role="search">
        @csrf
        <span class="bmd-form-group"><div class="input-group no-border">
          <input type="text" value="" class="form-control" placeholder="Search..." name="search_me">
          <button type="submit" class="btn btn-white btn-round btn-just-icon"> 
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
          </button>
        </div></span>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="/storage/avatars/{{Auth::user()->avatar}}" alt="" style="width:50px;height:auto;border-radius:50%;" >
            <p class="d-lg-none d-md-block">
              Account
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{route('user.edit',['id' => Auth::user()->id])}}">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </a>
        </div>
      </li>
    </ul>
  </div>
</div>
</nav>