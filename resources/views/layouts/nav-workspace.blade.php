<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1c1c1c;">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Left section: Logo and Sidebar toggle -->
        <div class="d-flex align-items-center">
            <a id="sidebarToggleBtn" class="navbar-brand px-2 me-4" style="cursor: pointer; user-select: none;">
                <img id="sidebarToggleIcon" class="icon rotated-icon" style="filter: brightness(0.5);" src="{{ asset('assets/images/toggle.svg')}}" draggable="false">
            </a>
            <a class="navbar-brand text-white d-flex align-items-center ms-3" href="{{ url('/landing') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" draggable="false" width="40" height="40" style="transform: scale(2);">
            </a>
        </div>

        <!-- Right section: User info, Notifications, and Dropdown -->
        <div class="d-flex align-items-center">
            <ul class="navbar-nav flex-row align-items-center">
                <!-- User Name -->
                <li class="nav-item ms-3">
                    <a class="nav-link font-weight-bold nav-username" href="/settings">{{ Auth::user()->name }}</a>
                </li>

                <!-- Profile Picture -->
                <li class="nav-item ms-3">
                    <a href="/settings">
                        <div class="mini-profile-picture rounded-circle">
                            <img class="img-fluid" src="{{ auth()->user()->profile_picture }}" alt="Profile Picture">
                        </div>
                    </a>
                </li>

                <!-- Notification Bell -->
                <li class="nav-item ms-3 dropdown">
                    <button class="btn btn-secondary d-flex align-items-center justify-content-center" type="button" id="notificationDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/images/icon-bell.svg') }}" alt="bell" style="width: 0.8em; margin-top: 2px;">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdownButton">
                        <!-- Incoming Requests -->
                        <li class="dropdown-header">Incoming Requests <span class="badge" style="background-color: #2c2c2c">0</span></li>
                        {{-- <li class="dropdown-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>John Doe</strong>
                                <p>Request description here.</p>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success">
                                    <img class="icon" src="{{ asset('assets/images/icon-checkmark.svg') }}" draggable="false">
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <img class="icon" src="{{ asset('assets/images/icon-cross.svg') }}" draggable="false">
                                </button>
                            </div>
                        </li> --}}
                    </ul>
                </li>

                <!-- Dropdown -->
                <li class="nav-item ms-2 dropdown">
                    <button class="btn btn-secondary d-flex align-items-center justify-content-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/images/icon-dropdown.svg') }}" alt="dropdown" style="width: 0.8em; margin-top: 3px;">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <!-- Settings -->
                        <li>
                            <a href="/settings" class="dropdown-item" style="cursor: pointer;">
                                <img src="{{ asset('assets/images/icon-sidebar-settings.svg') }}" alt="settings" style="margin-right: 8px; width: 20px;">
                                <span class="text-white">Settings</span>
                            </a>
                        </li>
                        <!-- Logout Form -->
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="p-0">
                                @csrf
                                <button type="submit" class="dropdown-item" style="cursor: pointer;">
                                    <img src="{{ asset('assets/images/nav-logout.svg') }}" alt="Logout" style="margin-right: 8px; width: 20px;">
                                    <span class="text-white">{{ __('Log out') }}</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>
