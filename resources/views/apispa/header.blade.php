<nav class="navbar navbar-expand-md  fixed">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<div class="logo">
		</div>
		<ul class="navbar-nav ml-auto">
			@guest
			<div class="hb-socialicons-area">
				<span class="hb-timeandday">Globe - 09452448857 &nbsp; Smart - 09071650779</span>
				<span class="hb-timeandday">&nbsp;Opening Hours: &nbsp; 11:00 A.M. - 12:00 A.M. Wed. - Sun.</span>
				<ul class="hb-socialicons hb-withoutbackground list-unstyled">
					<li><a href="https://www.facebook.com/apispabaguio/"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
				</ul>
			</div>
			@else
			<li class="nav-item dropdown">
				<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>
				<a class="dropdown-item" href="/profile">
					{{ __('Profile') }}
				</a>
				
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>
		@endguest
	</ul>
</div>
</nav>


