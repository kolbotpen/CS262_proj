document.addEventListener("DOMContentLoaded", function() {
    const sidebarMenu = document.getElementById('sidebarMenu');
    const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
    const navLinks = sidebarMenu.querySelectorAll('.nav-link');
    const mainContent = document.querySelector('main.flex-container');
    const sidebarToggleIcon = sidebarToggleBtn.querySelector('img');

    // Function to toggle sidebar collapse
    function toggleSidebar() {
        const isCollapsed = sidebarMenu.classList.toggle('collapsed');
        mainContent.classList.toggle('main-shifted', !isCollapsed);
        
        // Toggle rotated icon class
        sidebarToggleIcon.style.transform = isCollapsed ? 'rotate(-90deg)' : 'rotate(0deg)';

        // Store sidebar state in session storage
        sessionStorage.setItem('sidebarCollapsed', isCollapsed ? 'true' : 'false');
    }

    // Toggle sidebar collapse on button click
    sidebarToggleBtn.addEventListener('click', toggleSidebar);

    // Set initial sidebar state based on session storage
    const isSidebarCollapsed = sessionStorage.getItem('sidebarCollapsed') === 'true';
    // sidebarMenu.classList.toggle('collapsed', !isSidebarCollapsed); // Remove collapsed class when isSidebarCollapsed is false
    sidebarMenu.classList.toggle('collapsed', isSidebarCollapsed); // Add sidebar collapsed class when isSidebarCollapsed is true
    mainContent.classList.toggle('main-shifted', !isSidebarCollapsed); // Add sidebar shifted class when isSidebarCollapsed is false
    sidebarToggleIcon.style.transform = isSidebarCollapsed ? 'rotate(-90deg)' : 'rotate(0deg)';

    // Set ACTIVE menu item based on current URL
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });

    // Adjust main content padding on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth <= 700) {
            mainContent.classList.remove('main-shifted');
        } else {
            mainContent.classList.toggle('main-shifted', !isSidebarCollapsed);
        }
    });

    // Initialize main content padding on page load
    if (window.innerWidth <= 700) {
        mainContent.classList.remove('main-shifted');
    }
});
