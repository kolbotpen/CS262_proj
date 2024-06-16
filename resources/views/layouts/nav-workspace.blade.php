<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1c1c1c;">
  <div class="container-fluid d-flex justify-content-between">
    <div class="d-flex align-items-center">
      <a id="sidebarToggleBtn" class="navbar-brand px-2 me-5" style="cursor: pointer; user-select: none;">
        <img id="sidebarToggleIcon" class="icon rotated-icon" style="filter: brightness(0.5);" src="{{ asset('assets/images/toggle.svg')}}" draggable="false">
      </a>

      <a class="navbar-brand text-white d-flex align-items-center" href="landing">
        <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" draggable="false" width="40" height="40" style="transform: scale(2);">
      </a>
    </div>

    <div class="d-flex align-items-center">
      <ul class="navbar-nav flex-row">
        
        <!-- Logout -->
        <li class="nav-item" style="scale: 0.9;">
          <form method="POST" action="{{ route('logout') }}" class="p-0">
            @csrf
            <button type="submit" class="btn btn-secondary d-flex align-items-center rounded nav-link px-3 py-2" style="background: none;">
              <img src="{{ asset('assets/images/nav-logout.svg') }}" alt="Logout" style="margin-right: 8px; filter: brightness(0.6); width: 20px;">
              <span class="text-white">{{ __('Log out') }}</span>
            </button>
          </form>
        </li>

        <!-- Profile Picture -->
        <li class="nav-item ms-3">
          <a class="nav-link p-0" href="settings">
            <img src="{{ asset('assets/images/avatar.png') }}" alt="Profile Picture" class="rounded-circle" width="40" height="40">
          </a>
        </li>

        <!-- Notification -->
        <li class="nav-item ms-3">
          <a class="nav-link p-0" href="#">
            <div class="rounded-circle bg-green-gradient d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
              <img src="{{ asset('assets/images/icon-bell.svg') }}" alt="Notification" class="rounded-circle" style="max-width: 100%; max-height: 100%;">
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
