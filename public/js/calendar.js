document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('visit-form');

    const calendarEl = document.getElementById('calendarDays');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',

        locale: "es",

        headerToolbar: {
            left: "prev, next today",
            center: "title",
            right: "dayGridMonth, timeGridWeek, listWeek",
        },

        dateClick: function (info) {
            console.log(info);
            $('#evento').css('display', 'flex');
        }

    });

    calendar.render();

    document.getElementById('btn-save').addEventListener("click", function () {
        const data = new FormData(form);
        console.log("Datos del formulario:", Array.from(data.entries())); // Muestra los datos del formulario

        const selectedOption = form.querySelector('input[name="option"]:checked');
        if (selectedOption) {
            console.log("Valor de la opción seleccionada:", selectedOption.value);
        } else {
            console.log("No se ha seleccionado ninguna opción.");
        }
    });

    $('#close-modal').on('click', function () {
        $('#evento').css('display', 'none');
        form.reset();
    });

    // Cerrar el modal al hacer clic fuera de él
    $('#evento').on('click', function (e) {
        if (e.target === this) {
            $(this).css('display', 'none');
        }
    });
})