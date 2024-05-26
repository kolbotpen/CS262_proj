<nav class="navbar navbar-expand-lg navbar-dark" style="height: 60px; background-color: #1c1c1c; z-index: 1;">
  <div class="container-fluid" style="background-color: #1c1c1c;">
    <a class="navbar-brand text-white d-flex align-items-center" href="landing">
      <span class="ms-2"><img src="{{ asset('assets/images/logo.svg') }}" class="ms-4 me-4" alt="logo" draggable="false" width="40" height="40" style="transform: scale(2);"></span> <!-- Optional text next to the logo -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto">
        {{-- <li class="nav-item ms-2 me-2 d-flex align-items-center">
          <a class="nav-link active" aria-current="page" href="#"><img src="{{ asset('assets/images/nav-workspace.svg') }}" style="margin-right: 10px; filter:brightness(1); filter: drop-shadow(0 0 0px rgb(255, 255, 255));">Workspace</a>
        </li> --}}
        <li class="nav-item d-flex align-items-center" style="margin-left: -18px">
          <a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();" class="nav-link logout-link"><img src="{{ asset('assets/images/nav-logout.svg') }}" style="margin-right: 6px; filter:brightness(0.6);">
                {{ __('Log out') }}
              </x-dropdown-link>
            </form>
          </a>
        </li>
        <li class="nav-item ms-2 d-flex align-items-center">
          <a class="nav-link" href="settings">
            <img src="{{ asset('assets/images/avatar.png') }}" alt="Profile Picture" class="rounded-circle" width="40" height="40">
          </a>
        </li>
        <li class="nav-item ms-0 d-flex align-items-center">
          <a class="nav-link ms-2" href="#">
            <div class="rounded-circle bg-green-gradient d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                <img src="{{ asset('assets/images/icon-bell.svg') }}" alt="Notification" class="rounded-circle" style="max-width: 100%; max-height: 100%;">
            </div>
          </a>
        </li>
      </ul>
      

      {{-- <ul class="navbar-nav ms-auto">
        <li class="nav-item ms-auto d-flex flex-row align-items-center">
          <a class="nav-link" href="#">
            <img src="{{ asset('assets/images/avatar.png') }}" alt="Profile Picture" class="rounded-circle" width="40" height="40">
          </a>
          <a class="nav-link ms-2" href="#">
            <div class="rounded-circle bg-green-gradient d-flex justify-content-center align-items-center" style="width: 40px; height: 40px;">
                <img src="{{ asset('assets/images/icon-bell.svg') }}" alt="Notification" class="rounded-circle" style="max-width: 100%; max-height: 100%;">
            </div>
          </a>
        </li>
      </ul> --}}
      

    </div>
  </div>
</nav>





{{-- <script src="{{ asset('assets/js/nav-hide.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/nav-keyboard.js') }}"></script> --}}
