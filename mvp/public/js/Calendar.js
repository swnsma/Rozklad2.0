/**
 * Created by t.blindaruk on 06.04.16.
 */
function Calendar(){

}
Calendar.prototype.renderCalendar =  function(group,element) {
    group = group ? group : null;
    $('#calendar').fullCalendar({
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        weekends: false, // will hide Saturdays and Sundays
        defaultView: "agendaWeek",
        height: 'auto',
        slotLabelInterval: 10,
        slotDuration: '00:30:00',
        displayEventTime: true,
        minTime: '08:00:00',
        maxTime: '14:10:00',
        fixedWeekCount: false,
        allDaySlot: false,
        firstDay: 1,
        header: {
            left: 'prev,next today ',
            center: 'title',
            right: 'agendaDay,agendaWeek'
        },
        monthNames: ['Cічень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Bересень', 'Жовтень', 'Листопад', 'Грудень'],
        monthNamesShort: ['Січ.', 'Лют.', 'Бер.', 'Квіт.', 'Трав.', 'Чер.', 'Лип.', 'Серп.', 'Bер.', 'Жов.', 'Лис.', 'Гру.'],
        dayNames: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
        dayNamesShort: ["ВС", "ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ"],
        timezone: 'local',
        buttonText: {
            today: "Сьогодні",
            month: "Місяць",
            week: "Тиждень",
            day: "День"
        },
        timeFormat: 'H:mm',// uppercase H for 24-hour clock
        axisFormat: 'H:mm',
        eventAfterRender: function (event, element, view) {
            var $element = $(element);
            if($element.css('marginRight') == '20px'){
                $element.css({
                    'marginRight':'-2px',
                    'width':'50%'
                })
            }
        },
        eventAfterAllRender: function (view) {
            var today = moment().format('YYYY-MM-DD');
            $('th.fc-day-header[data-date="' + today + '"]').css({
                'backgroundColor': $('.fc-today').css('backgroundColor')
            })
        },
        eventSources: [
            '/mvp/ajaxCall.php?group=' + group
        ],
        eventRender: function (event, element) {
            $(element).find('.fc-time span').before($('<span class="auditory">').text(event.auditory+ ' '));
            $(element).find('.fc-content').append($('<div class="teacher">').text(event.teacher));
            if (event.type === '1') {
                $(element).addClass('practice');
            } else {
                $(element).addClass('lecture');
            }
            ;
        },
        color: 'yellow',   // an option!
        textColor: 'black' // an option!
    })
};