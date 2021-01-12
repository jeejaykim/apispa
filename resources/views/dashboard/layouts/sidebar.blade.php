
<div class="sidebar" data-color="purple" data-background-color="white" data-image="./dashboard">
  
  <div class="logo">
    <a href="/" class="simple-text logo-normal">
      {{-- <img src="/storage/avatars/{{Auth::user()->avatar}}" alt="" style="height:10vh;width:auto;border-radius:50%;background-style:cover;"> --}}
      {{-- <img src="{{asset('images/logo.png')}}" alt="" style="height:10vh;width:auto;"> --}}
      <h4>API SPA</h4>
    </a>
  </div>
  
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ request()->route()->getName() == 'reservation.index' || 
                             request()->route()->getName() == 'category.index' || 
                             request()->route()->getName() == 'service.index' ||
                             request()->route()->getName() == 'addon.index'? 'active' : '' }}">
        <a class="nav-link" href="{{ route('reservation.index') }}">
          <i class="material-icons">calendar_today</i>
          <p>Reservations</p>
        </a>
      </li>
      @if(Auth::user()->role == 'admin')
      <li class="nav-item {{ request()->route()->getName() == 'dashboard.index' ? 'active' : '' }}">
        <a class="nav-link " href="{{ route('dashboard.index') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ request()->route()->getName() == 'user.index' || 
                             request()->route()->getName() == 'schedule.index' || 
                             request()->route()->getName() == 'attendance.index' || 
                             request()->route()->getName() == 'expense.index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">person</i>
          <p>Users</p>
        </a>
      </li>
      
      <li class="nav-item {{ request()->route()->getName() == 'dashboard.customer' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.customer') }}">
          <i class="material-icons">supervisor_account</i>
          <p>Customers</p>
        </a>
      </li>
      
      @else
      
      @endif
      <li class="nav-item {{ request()->route()->getName() == 'dashboard.today' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.today') }}">
          <i class="material-icons">today</i>
          <p>For Today </p>
        </a>
      </li>
      
      <li class="nav-item {{ request()->route()->getName() == 'dashboard.allreservations' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.allreservations') }}">
          <i class="material-icons">calendar_today</i>
          <p>All Reservations</p>
        </a>
      </li>
      
      <li class="nav-item {{ request()->route()->getName() == 'dashboard.trash' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.trash') }}">
          <i class="material-icons">delete</i>
          <p>Trash </p>
        </a>
      </li>
    </ul>
  </div>
</div>
