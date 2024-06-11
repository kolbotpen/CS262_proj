<nav class="will-hide-navbar">
  <div class="navbar-brand-container">
    <!-- OURDEN LOGO -->
    <a href="{{ url('landing') }}">
      <img src="{{ asset('assets/images/logo.svg') }}" class="logo" alt="logo" draggable="false">
    </a>
  </div>
  <div class="navbar navbar-expand-lg navbar-light bg-light outfit">
    <div class="container">
      <!-- Navbar toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('landing') ? 'active' : '' }}" href="{{ url('landing') }}">
                <img src="{{ asset('assets/images/nav-landing.svg') }}" class="nav-icon">
                Landing
            </a>
          </li>        
          <li class="nav-item">
            @auth
                <a class="nav-link {{ request()->is('companies') ? 'active' : '' }}" href="{{ url('companies') }}">
                    <img src="{{ asset('assets/images/nav-workspace.svg') }}" class="nav-icon">
                    Workspace
                </a>
            @else
                <a class="nav-link" href="{{ route('login') }}">
                    <img src="{{ asset('assets/images/nav-workspace.svg') }}" class="nav-icon">
                    Workspace
                </a>
            @endauth
        </li>
        
          <li class="nav-item">
            <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">
              <img src="{{ asset('assets/images/nav-about.svg') }}" class="nav-icon">
              About
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('contact') }}">
              <img src="{{ asset('assets/images/nav-contacts.svg') }}" class="nav-icon">
              Contacts
            </a>
          </li>
        </ul>
        <hr class="navbar-hr">
        <!-- login and shi -->
        <ul class="navbar-nav navbar-hr-vertical">
          @if (Auth::check())
          <li class="nav-item">
            <a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" 
                  onclick="event.preventDefault();
                  this.closest('form').submit();" class="nav-link logout-link logout-btn">
                  {{ __('Log out') }}
                </x-dropdown-link>
              </form>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link login-btn" href="{{ url('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link sign-up-btn" href="{{ url('register') }}">Sign up</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</nav>

<script src="{{ asset('assets/js/nav-hide.js') }}"></script>
{{-- <script src="{{ asset('assets/js/nav-keyboard.js') }}"></script> --}}
