<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between">
                    <a href="index.html" class="header-logo">
                        <img src="{{ asset('stemit') }}/assets/images/logo.png" class="img-fluid rounded-normal"
                            alt="">
                        <div class="logo-title">
                            <span class="text-primary text-uppercase">Streamit</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="iq-search-bar ml-auto">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li class="nav-item nav-icon search-content">
                        <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                            <i class="ri-search-line"></i>
                        </a>
                    </li>
                    @if (Auth::user())
                        @if (Auth::user()->jabatan == 'Admin')
                            <li class="nav-item pt-3">
                                <a href="{{ route('admin-dashboard') }}"
                                    class="btn btn-primary text-white px-3 py-1">Dashboard</a>
                            </li>
                        @elseif (Auth::user()->jabatan == 'Organizer')
                            <li class="nav-item pt-3">
                                <a href="{{ route('organizer-dashboard') }}"
                                    class="btn btn-primary text-white px-3 py-1">Dashboard</a>
                            </li>
                        @endif
                    @elseif (auth()->guard('member')->check())
                        <li class="nav-item pt-3">
                            <div class="d-inline-block w-100 text-center p-3">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <a class="bg-primary iq-sign-btn" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    role="button">
                                    Keluar <i class="ri-login-box-line ml-2"></i>
                                </a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item pt-3">
                            <a href="{{ route('login') }}" class="btn btn-primary text-white px-3 py-1">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
