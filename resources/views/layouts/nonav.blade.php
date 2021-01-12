<!DOCTYPE html>
<html lang="en">
    @include('stuffs.head')

<body>
    {{-- @include('stuffs.navbar') --}}
    <div class="container-fluid " style="padding-top:15vh !important;">
    @include('stuffs.alerts')

        @yield('content')

    </div>

</body>
@include('stuffs.scripts')
</html>