document.addEventListener("DOMContentLoaded", function() {
    function getGreeting() {
        const now = new Date();
        const hour = now.getHours();
        let greeting;
        let icon;

        if (hour < 3) {
            greeting = "IT'S LATE &nbsp;";
            // icon = '<i class="fa-solid fa-mug-saucer"></i>';
            icon = '<i style="color: #40ac40; display: inline-block; width: 26px; height: 26px;"><svg style="margin-top: -5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 12V4a1 1 0 0 0-2 0v2H6V4a1 1 0 0 0-2 0v8a2 2 0 0 0-2 2v6a1 1 0 0 0 2 0v-2h16v2a1 1 0 0 0 2 0v-6a2 2 0 0 0-2-2Zm-9 0H6v-1a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1Zm7 0h-5v-1a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1Z" fill="currentColor"></path></svg></i>';
        } else if (hour < 12) {
            greeting = "GOOD MORNING &nbsp;";
            icon = '<i class="fa-solid fa-mug-saucer"></i>';
        } else if (hour < 18) {
            greeting = "AFTERNOON &nbsp;";
            icon = '<i class="fa-solid fa-sun"></i>';
        } else {
            greeting = "GOOD EVENING &nbsp;";
            icon = '<i class="fa-solid fa-moon"></i>';
        }

        return { greeting, icon };
    }

    const greetingElement = document.getElementById("greeting");
    const { greeting, icon } = getGreeting();
    greetingElement.innerHTML = `${greeting}${icon}`;
});