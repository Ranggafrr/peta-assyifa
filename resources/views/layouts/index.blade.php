<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.header')

<body>
    <div class="flex min-h-screen h-auto w-full overflow-hidden">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="w-full bg-gray-50">
            <!-- Fixed Navbar -->
            @include('layouts.navbar')
            @yield('content')
        </div>
    </div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
