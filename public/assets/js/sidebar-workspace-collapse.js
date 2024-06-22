document.addEventListener("DOMContentLoaded", function() {
    const sidebarMenu = document.getElementById('sidebarMenu');
    const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
    const navLinks = sidebarMenu.querySelectorAll('.nav-link');
    const mainContent = document.querySelector('main.flex-container');
    const footer = document.querySelector('footer');
    const sidebarToggleIcon = sidebarToggleBtn.querySelector('img');

    // Function to toggle sidebar collapse
    function toggleSidebar() {
        const isCollapsed = sidebarMenu.classList.toggle('collapsed');
        mainContent.classList.toggle('main-shifted', !isCollapsed);
        footer.classList.toggle('footer-shifted', !isCollapsed);
        
        // Toggle rotated icon class
        sidebarToggleIcon.style.transform = isCollapsed ? 'rotate(-90deg)' : 'rotate(0deg)';
    }

    // Toggle sidebar collapse on button click
    sidebarToggleBtn.addEventListener('click', toggleSidebar);

    // Set ACTIVE menu item based on current URL
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });

    // Adjust main content and footer padding on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth <= 700) {
            mainContent.classList.remove('main-shifted');
            footer.classList.remove('footer-shifted');
        } else {
            mainContent.classList.toggle('main-shifted', !sidebarMenu.classList.contains('collapsed'));
            footer.classList.toggle('footer-shifted', !sidebarMenu.classList.contains('collapsed'));
        }
    });

    // Initialize main content and footer padding on page load
    if (window.innerWidth <= 700) {
        mainContent.classList.remove('main-shifted');
        footer.classList.remove('footer-shifted');
    }
});
