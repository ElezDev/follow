document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendarDays')
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es",
        headerToolbar: {
            left: "prev, next today",
            center: "title",
            right: "dayGridMonth, timeGridWeek, listWeek",
        }
    })
    calendar.render()
})