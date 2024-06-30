<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('adminhome') }}" class="brand-link">
        <img src="{{ asset('assets/images/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">OURDEN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- User Image -->
            </div>
            <div class="info">
                <a href="#" class="d-block">Welcome Admin Dashboard</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('adminhome') }}" class="nav-link {{ Request::is('adminhome') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li
                class="nav-item has-treeview {{ Request::is('workspace/companies*') || Request::is('workspace/teams*') || Request::is('workspace/users*') || Request::is('workspace/tasks*') || Request::is('workspace/request*') ? 'menu-open' : '' }}">
                    <a href="#"
                    class="nav-link {{ Request::is('workspace/companies*') || Request::is('workspace/teams*') || Request::is('workspace/users*') || 
                    Request::is('workspace/tasks*') || Request::is('workspace/request*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Workspace
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('company.workspace') }}"
                                class="nav-link {{ Request::is('workspace/companies*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Company</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('team.workspace') }}"
                                class="nav-link {{ Request::is('workspace/teams*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Team</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.workspace') }}"
                                class="nav-link {{ Request::is('workspace/users*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('task.workspace') }}"
                                class="nav-link {{ Request::is('workspace/tasks*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>Tasks</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('request.workspace') }}"
                                class="nav-link {{ Request::is('workspace/request*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>Request</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('setting')}}" class="nav-link {{ Request::is('setting*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <!-- Add more sidebar items here -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>