<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    <form class="search-form">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i data-feather="search"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
      </div>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item dropdown nav-profile">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{auth()->user()->profile_photo_url}}" alt="profile">
        </a>
        <div class="dropdown-menu" aria-labelledby="profileDropdown">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <img src="{{auth()->user()->profile_photo_url}}" alt="">
            </div>
            <div class="info text-center">
              <p class="name font-weight-bold mb-0">{{auth()->user()->name}}</p>
              <p class="email text-muted mb-3">{{auth()->user()->email}}</p>
            </div>
          </div>
          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              <li class="nav-item">
                <a href="javascript:;" class="nav-link">
                  <i data-feather="edit"></i>
                  <span>Edit Profile</span>
                </a>
              </li>

              <li class="nav-item">
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                          <i data-feather="log-out"></i>
                          <span>{{ __('Log Out') }}</span>
                      </a>
                  </form>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
