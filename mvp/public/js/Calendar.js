/**
 * Created by t.blindaruk on 06.04.16.
 */
function Calendar() {
    this._option = {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        weekends: false, // will hide Saturdays and Sundays
        now: '2016-04-04 10:30:00',
        minTime: '08:00:00',
        maxTime: '14:10:00',
        monthNames: ['Cічень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Bересень', 'Жовтень', 'Листопад', 'Грудень'],
        monthNamesShort: ['Січ.', 'Лют.', 'Бер.', 'Квіт.', 'Трав.', 'Чер.', 'Лип.', 'Серп.', 'Bер.', 'Жов.', 'Лис.', 'Гру.'],
        dayNames: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
        dayNamesShort: ["ВС", "ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ"],
        displayEventTime: true
    }
}
Calendar.prototype.renderCalendar = function (group, element) {
    group = group ? group : null;
    var option = {
        defaultView: "agendaWeek",
        height: 'auto',
        slotLabelInterval: 10,
        slotDuration: '00:30:00',
        fixedWeekCount: false,
        allDaySlot: false,
        firstDay: 1,
        header: {
            left: 'prev,next today ',
            center: 'title',
            right: 'agendaDay,agendaWeek'
        },
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
            if ($element.css('marginRight') == '20px') {
                $element.css({
                    'marginRight': '-2px',
                    'width': '50%'
                })
            }
        },
        eventAfterAllRender: function (view) {
            var $element = $('#calendar');
            if (view.name === "agendaDay") {
                var minute = $element.fullCalendar('getDate').format('mm');
                minute = (minute < 30) ? '00' : '30';
                var hour = $element.fullCalendar('getDate').format('HH') + ':' + minute + ':00';
                $('.fc-slats tr[data-time="' + hour + '"]').addClass('now')
            }
            if (view.name === "agendaWeek") {
                var today = $('#calendar').fullCalendar('getDate').format('YYYY-MM-DD');
                $('th.fc-day-header[data-date="' + today + '"]').addClass('now');
            }
        },
        eventSources: [
            '/mvp/ajaxCall.php?group=' + group
        ],
        eventRender: function (event, element) {
            $(element).find('.fc-time span').before($('<span class="auditory">').text(event.auditory + ' '));
            $(element).find('.fc-content').append($('<div class="teacher">').text(event.teacher));
            if (event.type === '1') {
                $(element).addClass('practice');
            } else {
                $(element).addClass('lecture');
            }
        }
    };
    $('#calendar').fullCalendar(_.extend(option, this._option));
};

Calendar.prototype.renderAuditory = function () {
    var option = {
        resourceAreaWidth: 230,
        defaultDate: '2016-01-07',
        editable: true,
        aspectRatio: 1.5,
        scrollTime: '00:00',
        header: {
            left: 'ktoday prev,next',
            center: 'title',
            right: ''
        },
        defaultView: 'timelineDay',
        views: {
            timelineThreeDays: {
                type: 'timeline',
                duration: {days: 3}
            }
        },
        resourceLabelText: 'Rooms',
        resources: [
            {id: 'a', title: 'Auditorium A'},
            {id: 'b', title: 'Auditorium B', eventColor: 'green'},
            {id: 'c', title: 'Auditorium C', eventColor: 'orange'},
            {
                id: 'd', title: 'Auditorium D', children: [
                {id: 'd1', title: 'Room D1'},
                {id: 'd2', title: 'Room D2'}
            ]
            },
            {id: 'e', title: 'Auditorium E'},
            {id: 'f', title: 'Auditorium F', eventColor: 'red'},
            {id: 'g', title: 'Auditorium G'},
            {id: 'h', title: 'Auditorium H'},
            {id: 'i', title: 'Auditorium I'},
            {id: 'j', title: 'Auditorium J'},
            {id: 'k', title: 'Auditorium K'},
            {id: 'l', title: 'Auditorium L'},
            {id: 'm', title: 'Auditorium M'},
            {id: 'n', title: 'Auditorium N'},
            {id: 'o', title: 'Auditorium O'},
            {id: 'p', title: 'Auditorium P'},
            {id: 'q', title: 'Auditorium Q'},
            {id: 'r', title: 'Auditorium R'},
            {id: 's', title: 'Auditorium S'},
            {id: 't', title: 'Auditorium T'},
            {id: 'u', title: 'Auditorium U'},
            {id: 'v', title: 'Auditorium V'},
            {id: 'w', title: 'Auditorium W'},
            {id: 'x', title: 'Auditorium X'},
            {id: 'y', title: 'Auditorium Y'},
            {id: 'z', title: 'Auditorium Z'}
        ],
        events: [
            {id: '1', resourceId: 'b', start: '2016-01-07T02:00:00', end: '2016-01-07T07:00:00', title: 'event 1'},
            {id: '2', resourceId: 'c', start: '2016-01-07T05:00:00', end: '2016-01-07T22:00:00', title: 'event 2'},
            {id: '3', resourceId: 'd', start: '2016-01-06', end: '2016-01-08', title: 'event 3'},
            {id: '4', resourceId: 'e', start: '2016-01-07T03:00:00', end: '2016-01-07T08:00:00', title: 'event 4'},
            {id: '5', resourceId: 'f', start: '2016-01-07T00:30:00', end: '2016-01-07T02:30:00', title: 'event 5'}
        ]
    };
    $('#calendar').fullCalendar(_.extend(option, this._option));
};