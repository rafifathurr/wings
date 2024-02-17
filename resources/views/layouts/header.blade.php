<div class="main-header">
    <div class="logo-header" data-background-color="blue">

        <a href="index.html" class="logo">
            <img src="{{ asset('assets/img/wings.svg') }}" width="25%" alt="navbar brand" class="navbar-brand">
            &nbsp;
            <span class="text-white"><b>Checkout App</b></span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    @include('layouts.navbar')
    <!-- End Navbar -->
</div>
