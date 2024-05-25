// JavaScript code for section revealing (FADE-IN EFFECT ON SCROLL)
// Function to check if an element is in the viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top < (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom > 0
    );
}

// Function to handle scrolling
function handleScroll() {
    const sections = document.querySelectorAll('section');
    sections.forEach(section => {
        if (isInViewport(section)) {
            section.classList.add('fade-in');
        }
    });
}
// Add event listener for scroll event
window.addEventListener('scroll', handleScroll);
// Initial check on page load
window.addEventListener('load', handleScroll);

// Function to handle intersection
function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in');
            observer.unobserve(entry.target);
        }
    });
}
// Create a new IntersectionObserver
const observer = new IntersectionObserver(handleIntersection);