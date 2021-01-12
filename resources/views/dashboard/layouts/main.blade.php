<!DOCTYPE html>
<html lang="en">

@include('dashboard.layouts.head')

<body class="">
  <div class="wrapper ">

    @include('dashboard.layouts.sidebar')

    <div class="main-panel">
        @include('dashboard.layouts.navbar')
        @yield('content')

        {{-- @include('dashboard.layouts.footer') --}}
    </div>
  </div>
@include('dashboard.layouts.scripts')
</body>

</html>
