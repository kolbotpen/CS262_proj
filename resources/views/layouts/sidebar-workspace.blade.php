<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse p-0" style="background-color: #000000;">
  <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 100%; height: 100%; background-color: #121212;">
    <div class="text-left mb-4 rounded" style="background-color: #222222;">
      <div class="d-flex align-items-center p-4 text-green-gradient">
        <h5 class="inter m-0"><strong>WELCOME,<br>{{ Auth::user()->name }}</strong></h5>
      </div>
    </div>    
    
    <h6 class="pb-2 mb-0 text-gray">MAIN MENU</h6>
    <ul class="nav nav-pills flex-column main-menu">
      <li class="nav-item">
        <a class="nav-link text-gray sidebar-tab" href="companies">
          <img class="icon" style="filter: brightness(0.5)" src="{{ asset('assets/images/icon-sidebar-companies.svg')}}" draggable="false">Companies
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-gray sidebar-tab" href="tasks">
          <img class="icon" style="filter: brightness(0.5)" src="{{ asset('assets/images/icon-sidebar-tasks.svg')}}" draggable="false">Tasks
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-gray sidebar-tab" href="calendar">
          <img class="icon" style="filter: brightness(0.5)" src="{{ asset('assets/images/icon-sidebar-calendar.svg')}}" draggable="false">Calendar
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-gray sidebar-tab" href="settings">
          <img class="icon" style="filter: brightness(0.5)" src="{{ asset('assets/images/icon-sidebar-settings.svg')}}" draggable="false">Settings
        </a>
      </li>
    </ul>

    <h6 class="pb-2 mt-4 mb-2 text-gray">UPCOMING DEADLINES</h6>
    <ul class="todo-list">
      <li class="mb-2">
        <a href="#" class="text-decoration-none text-gray">
        Review Wireframes
        </a>
      </li>
      <li class="mb-2">
        <a href="#" class="text-decoration-none text-gray">
        Fix CSS bugs
        </a>
      </li>
      <li class="mb-2">
        <a href="#" class="text-decoration-none text-gray">
        Reports Monthly Financial
        </a>
      </li>
      <li class="mb-2">
        <a href="#" class="text-decoration-none text-gray">
        HTML Design
        </a>
      </li>
    </ul>
  </div>
</nav>
