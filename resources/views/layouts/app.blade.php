<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.head')
</head>

<body>
    @include('layouts.nav')
    <div class="container-md">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>

</html>
