@php
    use App\Helpers\CurrentUser;
@endphp
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ asset('assets/img/profile.jpg') }}" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="image profile"
                                        class="avatar-img rounded">
                                </div>
                                <div class="u-text" style="margin-top: auto; margin-bottom: auto;">
                                    <h3>{{ CurrentUser::userData()->user }}</h3>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out-alt"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Logout</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
