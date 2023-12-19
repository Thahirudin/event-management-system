<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ route('home') }}" class="header-logo">
            <img src="{{ asset('img/Logo 1.png') }}" class="img-fluid rounded-normal" alt="">
            <div class="logo-title">
                <span class="text-primary text-uppercase">GAMEVENT</span>
            </div>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class=" @yield('dashboard')"><a href="{{ route('home') }}" class="iq-waves-effect"><i
                            class="las la-home iq-arrow-left"></i><span>Home</span></a></li>
                <li class=" @yield('order')"><a href="{{ route('admin-list-order') }}" class="iq-waves-effect"><i
                            class="ri-price-tag-line"></i><span>Order</span></a></li>
                <li class=" @yield('tentang-kami')"><a href="{{ route('tentang-kami') }}" class="iq-waves-effect"><i
                            class="las la-user"></i><span>Tentang Kami</span></a></li>
            </ul>
        </nav>
    </div>
</div>
