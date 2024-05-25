document.addEventListener("DOMContentLoaded", function() {
    let lastScrollTop = 0;
    // const navbar = document.querySelector("nav");
    const navbar = document.querySelector(".will-hide-navbar");

    window.addEventListener("scroll", function() {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // Scroll down
            navbar.classList.add("hide-nav");
        } else {
            // Scroll up
            navbar.classList.remove("hide-nav");
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
    });

    // Event to reveal navbar when mouse is hovering at top of screen
    document.addEventListener("mousemove", function(event) {
        if (event.clientY < 50) { // Adjust this value btw
            navbar.classList.remove("hide-nav");
        }
    });
});