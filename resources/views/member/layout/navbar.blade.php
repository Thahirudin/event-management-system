  <div class="iq-top-navbar">
      <div class="iq-navbar-custom">
          <nav class="navbar navbar-expand-lg navbar-light p-0">
              <div class="iq-menu-bt d-flex align-items-center">
                  <div class="wrapper-menu">
                      <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
                  <div class="iq-navbar-logo d-flex justify-content-between">
                      <a href="{{ route('home') }}" class="header-logo">
                          <img src="{{ asset('img/Logo 1.png') }}" class="img-fluid rounded-normal" alt="">
                          <div class="logo-title">
                              <span class="text-primary text-uppercase">Gamevent</span>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="iq-search-bar ml-auto">
              </div>
              <div>
                  @if (Auth::user())
                      <ul class="navbar-nav">
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
                      </ul>
                  @elseif (auth()->guard('member')->check())
                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-label="Toggle navigation">
                          <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list">
                              <li class="line-height pt-3">
                                  <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                      <img src="{{ asset('uploads/members') .'/' .auth()->guard('member')->user()->profil }}"
                                          class="img-fluid rounded-circle mr-3" alt="user">
                                  </a>
                                  <div class="iq-sub-dropdown iq-user-dropdown">
                                      <div class="iq-card shadow-none m-0">
                                          <div class="iq-card-body p-0 ">
                                              <div class="bg-primary p-3">
                                                  <h5 class="mb-0 text-white line-height">Hello
                                                      {{ auth()->guard('member')->user()->nama }}</h5>
                                                  <span
                                                      class="text-white font-size-12">{{ auth()->guard('member')->user()->jabatan }}</span>
                                              </div>
                                              <a href="{{ route('member-profil-member', ['id' => auth()->guard('member')->user()->id]) }}"
                                                  class="iq-sub-card iq-bg-primary-hover">
                                                  <div class="media align-items-center">
                                                      <div class="rounded iq-card-icon iq-bg-primary">
                                                          <i class="ri-file-user-line"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <h6 class="mb-0 ">Profil saya</h6>
                                                          <p class="mb-0 font-size-12">Lihat Detail profil</p>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="{{ route('member-edit-member', ['id' => auth()->guard('member')->user()->id]) }}"
                                                  class="iq-sub-card iq-bg-primary-hover">
                                                  <div class="media align-items-center">
                                                      <div class="rounded iq-card-icon iq-bg-primary">
                                                          <i class="ri-profile-line"></i>
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <h6 class="mb-0 ">Edit Profile</h6>
                                                          <p class="mb-0 font-size-12">Edit Detail Profil</p>
                                                      </div>
                                                  </div>
                                              </a>
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
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  @else
                      <ul class="navbar-nav">
                          <li class="nav-item pt-3">
                              <a href="{{ route('login') }}" class="btn btn-primary text-white px-3 py-1">Login</a>
                          </li>
                      </ul>
                  @endif
              </div>

          </nav>
      </div>
  </div>
