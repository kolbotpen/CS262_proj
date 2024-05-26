document.addEventListener('DOMContentLoaded', function() {
    // Get all nav links
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

    // Find the index of the currently active tab
    let currentIndex = Array.from(navLinks).findIndex(link => link.classList.contains('active'));

    // Function to set navigate class
    function setNavigate(index) {
        navLinks.forEach((link, i) => {
            if (i === index) {
                link.classList.add('navigate');
                link.focus();
            } else {
                link.classList.remove('navigate');
            }
        });
    }

    // Set the initial active tab
    setNavigate(currentIndex);

    // Listen for keydown events
    document.addEventListener('keydown', function(event) {
        if (event.key === 'ArrowRight') {
            currentIndex = (currentIndex + 1) % navLinks.length;
            setNavigate(currentIndex);
        } else if (event.key === 'ArrowLeft') {
            currentIndex = (currentIndex - 1 + navLinks.length) % navLinks.length;
            setNavigate(currentIndex);
        }
    });
});
