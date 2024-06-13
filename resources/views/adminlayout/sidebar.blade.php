<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Internal CSS -->
	<style>
		.nav-link.active {
			background-color: #343a40; /* Darker background color */
			color: #fff; /* White text color */
		}
		
		.nav-link.active i {
			color: #fff; /* White icon color */
		}
	</style>
	<!-- End CSS -->
    <!-- Brand Logo -->
    <a href="{{route('adminhome')}}" class="brand-link">
        <img src="assets/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN DASHBOARD</span>
    </a>
    <a href="{{route('adminhome')}}" class="brand-link">
        <div class="user-panel">
            Welcome Admin
        </div>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="adminhome" id="dashboard-link" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>                                                                
                </li>
                <li class="nav-item">
                    <a href="workspace" id="workspace-link" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Workspace</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="setting" id="setting-link" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Setting</p>
                    </a>
                </li>
                <!-- Additional sidebar items here -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Get the current URL path
			var path = window.location.pathname;

			// Define the paths and corresponding element IDs
			var routes = {
				'adminhome': 'dashboard-link',
				'workspace': 'workspace-link',
				'setting': 'setting-link'
			};

			// Iterate over the routes object
			for (var key in routes) {
				if (routes.hasOwnProperty(key)) {
					// Check if the path contains the key
					if (path.includes(key)) {
						// Get the corresponding element by ID
						var activeLink = document.getElementById(routes[key]);
						if (activeLink) {
							// Add the active class to the element
							activeLink.classList.add('active');
						}
					}
				}
			}
		});
	</script>
</aside>
