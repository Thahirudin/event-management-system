<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="index.html" class="header-logo">
            <img src="{{ asset('stemit') }}/assets/images/logo.png" class="img-fluid rounded-normal" alt="">
            <div class="logo-title">
                <span class="text-primary text-uppercase">Gamelab Event</span>
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
                <li class=" @yield('dashboard')"><a href="{{ route('organizer-dashboard') }}" class="iq-waves-effect"><i
                            class="las la-home iq-arrow-left"></i><span>Dashboard</span></a></li>
                <li class=" @yield('order')"><a href="{{ route('organizer-list-order') }}" class="iq-waves-effect"><i
                            class="ri-price-tag-line"></i><span>Order</span></a></li>
                <li class=" @yield('list-event') @yield('event-akan-datang') @yield('event-selesai')">
                    <a href="#event" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                            class="lab la-elementor iq-arrow-left"></i><span>Event</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="event" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class=" @yield('list-event')"><a href="{{ route('organizer-list-event') }}"><i
                                    class="ri-file-list-3-line"></i>List Event</a></li>
                        <li class=" @yield('event-akan-datang')"><a href="{{ route('organizer-event-akan-datang') }}"><i
                                    class="ri-calendar-event-line"></i>Event Akan Datang</a></li>
                        <li class=" @yield('event-selesai')"><a href="{{ route('organizer-event-selesai') }}"><i
                                    class="ri-calendar-check-line"></i>Event Selesai</a></li>
                    </ul>
                </li>
                <li class="@yield('list-organizer') @yield('list-member')">
                    <a href="#pengguna" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="las la-user-friends"></i><span>Pengguna</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="pengguna" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('list-organizer')"><a href="{{ route('organizer-list-organizer') }}"><i
                                    class="las la-user"></i>Organizer</a></li>
                        <li class="@yield('list-member')"><a href="{{ route('organizer-list-member') }}"><i
                                    class="las la-user"></i>Member</a></li>
                    </ul>
                </li>
                <li class="@yield('list-pemasukan-event') @yield('list-keuangan') @yield('list-pengeluaran-event')">
                    <a href="#keuangan" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="las la-file"></i><span>Keuangan</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="keuangan" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="@yield('list-keuangan')"><a href="{{ route('organizer-list-keuangan') }}"><i
                                    class="las la-file"></i>List Keuangan</a></li>
                        <li class="@yield('list-pemasukan-event')"><a href="{{ route('organizer-list-pemasukan-event') }}"><i
                                    class="las la-file"></i>Pemasukan Event</a></li>
                        <li class="@yield('list-pengeluaran-event')"><a href="{{ route('organizer-list-pengeluaran-event') }}"><i
                                    class="las la-file"></i>Pengeluaran Event</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
