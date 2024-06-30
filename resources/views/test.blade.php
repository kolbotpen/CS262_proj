{{-- THIS PAGE IS FOR TESTING PURPOSES --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FullCalendar Example</title>
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/main.min.css' rel='stylesheet' />
</head>
<body>

  <div class="container">
    {{-- BREADCRUMB --}}
    <div class="breadcrumb mt-4 mb-4">
        <a href="#" class="breadcrumb-link">Calendar</a>
    </div>

    <div id='calendar'></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            {
              title: 'sdfsfdsdf',
              start: '2024-06-01',
              description: 'asfasf'
            },
        ],
        eventDidMount: function(info) {
          var tooltip = new Tooltip(info.el, {
            title: info.event.extendedProps.description,
            placement: 'top',
            trigger: 'hover',
            container: 'body'
          });
        }
      });
      calendar.render();
    });
</script>

</body>
</html>
