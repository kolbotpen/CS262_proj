<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapsed">
    <div class="sidebar-inner">
        

        {{-- WELCOME MESSAGE --}}
        <div class="text-left m-3 mt-4 mb-4 rounded welcome-message" style="background-color: #222222;">
            <div class="d-flex align-items-center p-4 text-green-gradient">
                <h5 class="inter m-0 welcome-title">
                    <strong class="welcome-text">WELCOME,<br>{{ Auth::user()->name }}</strong>
                </h5>
            </div>
        </div>

        <div class="sidebar-menu">
            <h6 class="pb-2 ms-3 mt-4 mb-2 text-gray">MAIN MENU</h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="browse">
                        <img class="icon" style="filter: brightness(0.5)"
                            src="{{ asset('assets/images/icon-sidebar-browse.svg')}}" draggable="false">
                        <span class="text">Browse</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="companies">
                        <img class="icon" style="filter: brightness(0.5)"
                            src="{{ asset('assets/images/icon-sidebar-companies.svg')}}" draggable="false">
                        <span class="text">Companies</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calendar">
                        <img class="icon" style="filter: brightness(0.5)"
                            src="{{ asset('assets/images/icon-sidebar-calendar.svg')}}" draggable="false">
                        <span class="text">Calendar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings">
                        <img class="icon" style="filter: brightness(0.5)"
                            src="{{ asset('assets/images/icon-sidebar-settings.svg')}}" draggable="false">
                        <span class="text">Settings</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-menu">
            <h6 class="pb-2 ms-3 mt-4 mb-2 text-gray">UPCOMING DEADLINES</h6>
            <ul class="todo-list">
                <li class="ms-3 mb-2">
                    <a href="#" class="text-decoration-none">Review Wireframes</a>
                </li>
                <li class="ms-3 mb-2">
                    <a href="#" class="text-decoration-none">Fix CSS bugs</a>
                </li>
                <li class="ms-3 mb-2">
                    <a href="#" class="text-decoration-none">Reports Monthly Financial</a>
                </li>
                <li class="ms-3 mb-2">
                    <a href="#" class="text-decoration-none">HTML Design</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="{{asset ('assets/js/sidebar-workspace-collapse.js')}}">

</script>