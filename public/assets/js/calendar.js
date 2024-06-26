let date = new Date(); // creates a new date object with the current date and time
let year = date.getFullYear(); // gets the current year
let month = date.getMonth(); // gets the current month (index based, 0-11)

const day = document.querySelector(".calendar-dates"); // selects the element with class "calendar-dates"
const currdate = document.querySelector(".calendar-current-date"); // selects the element with class "calendar-current-date"
const prenexIcons = document.querySelectorAll(".calendar-navigation span"); // selects all elements with class "calendar-navigation span"

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"]; // array of month names

// function to generate the calendar
const manipulate = () => {
    // get the first day of the month
    let dayone = new Date(year, month, 1).getDay();

    // get the last date of the month
    let lastdate = new Date(year, month + 1, 0).getDate();

    // get the day of the last date of the month
    let dayend = new Date(year, month, lastdate).getDay();

    // get the last date of the previous month
    let monthlastdate = new Date(year, month, 0).getDate();

    let lit = ""; // variable to store the generated calendar HTML

    // loop to add the last dates of the previous month
    for (let i = dayone; i > 0; i--) {
        lit += `<li class="inactive">${monthlastdate - i + 1}</li>`;
    }

    // loop to add the dates of the current month
    for (let i = 1; i <= lastdate; i++) {
        // check if the current date is today
        let isToday = i === date.getDate() && month === new Date().getMonth() && year === new Date().getFullYear() ? "active" : "";
        lit += `<li class="${isToday}">${i}</li>`;
    }

    // loop to add the first dates of the next month
    for (let i = dayend; i < 6; i++) {
        lit += `<li class="inactive">${i - dayend + 1}</li>`
    }

    // update the text of the current date element with the formatted current month and year
    currdate.innerText = `${months[month]} ${year}`;

    // update the HTML of the dates element with the generated calendar
    day.innerHTML = lit;
}

manipulate();

// Attach a click event listener to each icon
prenexIcons.forEach(icon => {

    // When an icon is clicked
    icon.addEventListener("click", () => {
        // Check if the icon is "calendar-prev" or "calendar-next"
        month = icon.id === "calendar-prev" ? month - 1 : month + 1;

        // Check if the month is out of range
        if (month < 0 || month > 11) {
            // Set the date to the first day of the month with the new year
            date = new Date(year, month, new Date().getDate());
            // Set the year to the new year
            year = date.getFullYear();
            // Set the month to the new month
            month = date.getMonth();
        }

        else {
            // Set the date to the current date
            date = new Date();
        }

        // Call the manipulate function to update the calendar display
        manipulate();
    });
});

document.getElementById("calendar-today").addEventListener("click", () => {
    // Reset the date to the current date
    date = new Date();
    // Set the year to the current year
    year = date.getFullYear();
    // Set the month to the current month
    month = date.getMonth();
    // Call the manipulate function to update the calendar display
    manipulate();
});

document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const myModal = new bootstrap.Modal(document.getElementById('form'));
    const dangerAlert = document.getElementById('danger-alert');
    const close = document.querySelector('.btn-close');
    
  
  
    
  const myEvents = JSON.parse(localStorage.getItem('events')) || [
      {
        id: uuidv4(),
        title: `Edit Me`, 
        start: '2023-04-11',
        backgroundColor: 'red',
        allDay: false, 
        editable: false,
      },
      {
        id: uuidv4(),
        title: `Delete me`,
        start: '2023-04-17',
        end: '2023-04-21',
  
        allDay: false, 
        editable: false,
      },
    ];
  
  
    const calendar = new FullCalendar.Calendar(calendarEl, {
      customButtons: {
        customButton: {
          text: 'Add Event',
          click: function () {
            myModal.show();
            const modalTitle = document.getElementById('modal-title');
            const submitButton = document.getElementById('submit-button');
            modalTitle.innerHTML = 'Add Event'
            submitButton.innerHTML = 'Add Event'
            submitButton.classList.remove('btn-primary');
            submitButton.classList.add('btn-success');
  
            
  
            close.addEventListener('click', () => {
              myModal.hide()
            })
  
            
  
          }
        }
      },
      header: {
        center: 'customButton', // add your custom button here
        right: 'today, prev,next '
      },
      plugins: ['dayGrid', 'interaction'],
      allDay: false,
      editable: true,
      selectable: true,
      unselectAuto: false,
      displayEventTime: false,
      events: myEvents,
      eventRender: function(info) {
        info.el.addEventListener('contextmenu', function(e) {
          e.preventDefault();
          let existingMenu = document.querySelector('.context-menu');
          existingMenu && existingMenu.remove();
          let menu = document.createElement('div');
          menu.className = 'context-menu';
          menu.innerHTML = `<ul>
          <li><i class="fas fa-edit"></i>Edit</li>
          <li><i class="fas fa-trash-alt"></i>Delete</li>
          </ul>`;
  
          const eventIndex = myEvents.findIndex(event => event.id === info.event.id);
          
          
          document.body.appendChild(menu);
          menu.style.top = e.pageY + 'px';
          menu.style.left = e.pageX + 'px';
  
          // Edit context menu
  
          menu.querySelector('li:first-child').addEventListener('click', function() {
            menu.remove();
  
            const editModal = new bootstrap.Modal(document.getElementById('form'));
            const modalTitle = document.getElementById('modal-title');
            const titleInput = document.getElementById('event-title');
            const startDateInput = document.getElementById('start-date');
            const endDateInput = document.getElementById('end-date');
            const colorInput = document.getElementById('event-color');
            const submitButton = document.getElementById('submit-button');
            const cancelButton = document.getElementById('cancel-button');
            modalTitle.innerHTML = 'Edit Event';
            titleInput.value = info.event.title;
            startDateInput.value = moment(info.event.start).format('YYYY-MM-DD');
            endDateInput.value = moment(info.event.end, 'YYYY-MM-DD').subtract(1, 'day').format('YYYY-MM-DD');
            colorInput.value = info.event.backgroundColor;
            submitButton.innerHTML = 'Save Changes';
  
          
          
  
  
            editModal.show();
  
            submitButton.classList.remove('btn-success')
            submitButton.classList.add('btn-primary')
  
            // Edit button
  
            submitButton.addEventListener('click', function() {
              const updatedEvents = {
                id: info.event.id,
                title: titleInput.value,
                start: startDateInput.value,
                end: moment(endDateInput.value, 'YYYY-MM-DD').add(1, 'day').format('YYYY-MM-DD'),
                backgroundColor: colorInput.value
              }
  
              if ( updatedEvents.end <= updatedEvents.start) { // add if statement to check end date
                dangerAlert.style.display = 'block';
                return;
              }
            
              const eventIndex = myEvents.findIndex(event => event.id === updatedEvents.id);
              myEvents.splice(eventIndex, 1, updatedEvents);
            
              localStorage.setItem('events', JSON.stringify(myEvents));
            
              // Update the event in the calendar
              const calendarEvent = calendar.getEventById(info.event.id);
              calendarEvent.setProp('title', updatedEvents.title);
              calendarEvent.setStart(updatedEvents.start);
              calendarEvent.setEnd(updatedEvents.end);
              calendarEvent.setProp('backgroundColor', updatedEvents.backgroundColor);
  
  
            
              editModal.hide();
  
            })
  
            
          
          });
  
          // Delete menu
          menu.querySelector('li:last-child').addEventListener('click', function() {
            const deleteModal = new bootstrap.Modal(document.getElementById('delete-modal'));
            const modalBody = document.getElementById('delete-modal-body');
            const cancelModal = document.getElementById('cancel-button');
            modalBody.innerHTML = `Are you sure you want to delete <b>"${info.event.title}"</b>`
            deleteModal.show();
  
            const deleteButton = document.getElementById('delete-button');
            deleteButton.addEventListener('click', function () {
              myEvents.splice(eventIndex, 1);
              localStorage.setItem('events', JSON.stringify(myEvents));
              calendar.getEventById(info.event.id).remove();
              deleteModal.hide();
              menu.remove();
  
            });
  
            cancelModal.addEventListener('click', function () { 
              deleteModal.hide();
            })
  
            
          
          
          });
          document.addEventListener('click', function() {
            menu.remove();
          });
        });
      },
  
      eventDrop: function(info) { 
        let myEvents = JSON.parse(localStorage.getItem('events')) || [];
        const eventIndex = myEvents.findIndex(event => event.id === info.event.id);
        const updatedEvent = {
          ...myEvents[eventIndex],
          id: info.event.id, 
          title: info.event.title,
          start: moment(info.event.start).format('YYYY-MM-DD'),
          end: moment(info.event.end).format('YYYY-MM-DD'),
          backgroundColor: info.event.backgroundColor
        };
        myEvents.splice(eventIndex, 1, updatedEvent); // Replace old event data with updated event data
        localStorage.setItem('events', JSON.stringify(myEvents));
        console.log(updatedEvent);
      }
  
    });
  
    calendar.on('select', function(info) {
  
      const startDateInput = document.getElementById('start-date');
      const endDateInput = document.getElementById('end-date');
      startDateInput.value = info.startStr;
      const endDate = moment(info.endStr, 'YYYY-MM-DD').subtract(1, 'day').format('YYYY-MM-DD');
      endDateInput.value = endDate;
      if(startDateInput.value === endDate) {
        endDateInput.value = '';
      }
    });
  
  
    calendar.render();
  
    const form = document.querySelector('form');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault(); // prevent default form submission
  
      // retrieve the form input values
      const title = document.querySelector('#event-title').value;
      const startDate = document.querySelector('#start-date').value;
      const endDate = document.querySelector('#end-date').value;
      const color = document.querySelector('#event-color').value;
      const endDateFormatted = moment(endDate, 'YYYY-MM-DD').add(1, 'day').format('YYYY-MM-DD');
      const eventId = uuidv4();
  
      console.log(eventId);
  
      if (endDateFormatted <= startDate) { // add if statement to check end date
        dangerAlert.style.display = 'block';
        return;
      }
  
      const newEvent = {
        id: eventId,
        title: title,
        start: startDate,
        end: endDateFormatted,
        allDay: false,
        backgroundColor: color
      };
  
      // add the new event to the myEvents array
      myEvents.push(newEvent);
  
      // render the new event on the calendar
      calendar.addEvent(newEvent);
  
      // save events to local storage
      localStorage.setItem('events', JSON.stringify(myEvents));
  
      myModal.hide();
      form.reset();
    });
  
    myModal._element.addEventListener('hide.bs.modal', function () {
      dangerAlert.style.display = 'none';
      form.reset(); 
    });
  
  });