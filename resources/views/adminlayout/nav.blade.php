<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <div class="navbar-nav pl-2">
        <!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
    </div>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                <img src="{{ asset('assets/images/avatar5.png') }}" class='img-circle elevation-2' width="40" height="40" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                <h4 class="h4 mb-0"><strong>{{ Auth::user()->name }}</strong></h4>
                <div class="mb-3">{{ Auth::user()->email }}</div>
                <div class="dropdown-divider"></div>
                <a href="setting" class="dropdown-item">
                    <i class="fas fa-user-cog mr-2"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <form class="dropdown-item text-danger" method="POST" action="{{ route('logout') }}">
                    <a class="fas fa-sign-out-alt mr-2" style="color: red;">
                        @csrf
                        <x-dropdown-link :href="route('logout')" style="color: red;
									font-size: 50px;" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>