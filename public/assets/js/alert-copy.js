document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.copy-code').forEach(element => {
        element.addEventListener('click', function() {
            navigator.clipboard.writeText(this.getAttribute('data-code'));
            showCustomAlert('Company code copied: ' + this.getAttribute('data-code'));
        });
    });

    function showCustomAlert(message) {
        const alertBox = document.createElement('div');
        alertBox.className = 'custom-alert';
        alertBox.textContent = message;
        document.body.appendChild(alertBox);

        requestAnimationFrame(() => alertBox.classList.add('show'));

        setTimeout(() => {
            alertBox.classList.remove('show');
            setTimeout(() => document.body.removeChild(alertBox), 500);
        }, 3000); // Adjusted to 3 seconds (2 seconds display time + 1 second fade-out time)
    }
});