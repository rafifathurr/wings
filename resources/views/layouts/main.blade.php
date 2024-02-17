<!DOCTYPE html>
<html lang="en">

<!-- Head -->
@include('layouts.head')
<!-- End Head -->

<body>
    <div class="wrapper">

        <!-- Logo Header -->
        @include('layouts.header')
        <!-- End Logo Header -->

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End Sidebar -->

        <!-- Main Content -->
        <div class="main-panel">

            <!-- Content -->
            @yield('content')
            <!-- End Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End Footer -->
        </div>
        <!-- End Main Content -->

    </div>

    <!-- Scripts -->
    @include('layouts.script')
    @stack('javascript-bottom')
    <!-- End Scripts -->
</body>

</html>
