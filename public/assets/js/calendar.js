function generateCalendar() {
    const calendarHeader = document.getElementById('calendarHeader');
    const calendar = document.getElementById('calendar');
    const today = new Date();
    const currentMonth = today.getMonth();
    const currentYear = today.getFullYear();
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    // Set the current month and year in the header
    calendarHeader.textContent = `${monthNames[currentMonth]} ${currentYear}`;

    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    // Add days of the week header
    daysOfWeek.forEach(day => {
        const dayElement = document.createElement('div');
        dayElement.classList.add('header');
        dayElement.textContent = day;
        calendar.appendChild(dayElement);
    });

    // Add blank spaces for days before the start of the month
    for (let i = 0; i < firstDayOfMonth; i++) {
        const blankSpace = document.createElement('div');
        calendar.appendChild(blankSpace);
    }

    // Add the days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.textContent = day;
        calendar.appendChild(dayElement);
    }
}

document.addEventListener('DOMContentLoaded', generateCalendar);