/**
 * Created by t.blindaruk on 06.04.16.
 */
function Calendar() {
    this._option = {
        schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
        weekends: false, // will hide Saturdays and Sundays
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
            if (view.name === 'agendaWeek') {
                function addClass($element) {
                    $element.addClass('pair');
                    $element.addClass('date-' + event.start._i.replace(' ', '-'));
                }

                var $element = $(element);
                if ($element.css('marginRight') === '20px') {
                    addClass($element);
                    $element.css({
                        'z-index': '3',
                        'marginRight': '45px'
                    });
                }
                if ($element.css('left') !== '0px') {
                    addClass($element);
                    $element.css({
                        'left': '45px'
                    });
                }
            }
        },
        eventClick: function (calEvent, jsEvent, view) {
            if (view.name === 'agendaWeek') {
                var $self = $(this);
                var classList = $self.attr('class').split(/\s+/);
                var $prev = $self.prev();
                var $next = $self.next();
                var zIndex = _.max([+$prev.css('z-index'), +$next.css('z-index')]);
                $.each(classList, function (index, item) {
                    if (item === 'pair') {
                        $self.css({
                            'z-index': zIndex + 1
                        });
                        if ($prev.attr('class') && classList[index + 1] === $prev.attr('class').split(/\s+/)[index + 1]) {
                            $self.find('.fc-content').css({
                                'display': 'block'
                            });
                            $self.find('.fc-content .fc-time span').before($self.find('.auditory'));
                            $self.find('.auditory').css({
                                'position': 'static'
                            });
                        }
                        if ($next.attr('class') && classList[index + 1] === $next.attr('class').split(/\s+/)[index + 1]) {
                            $next.find('.fc-content').css({
                                'display': 'none'
                            });
                            $($next.append($next.find('.fc-content .auditory').css({
                                'position': 'absolute',
                                'right': 2,
                                'top': 2
                            })))
                        }
                    }
                });
            }
        },
        eventAfterAllRender: function (view) {
            if (view.name === "agendaDay") {
                var minute = moment().format('mm');
                minute = (minute < 30) ? '00' : '30';
                var hour = moment().format('HH') + ':' + minute + ':00';
                $('.fc-slats tr[data-time="' + hour + '"]').addClass('now')
            }
            if (view.name === "agendaWeek") {
                var today = moment().format('YYYY-MM-DD');
                $('th.fc-day-header[data-date="' + today + '"]').addClass('now');
            }
            $('.pair').click();
        },
        eventSources: [
            '/mvp/server/ajaxCall.php?group=' + group
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
        resourceLabelText: 'Викладач',
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
            {id: '4', resourceId: 'e', start: '2016-01-07T08:00:00', end: '2016-01-07T10:00:00', title: 'event 4'},
            {id: '5', resourceId: 'f', start: '2016-01-07T00:30:00', end: '2016-01-07T02:30:00', title: 'event 5'}
        ]
    };
    $('#calendar').fullCalendar(_.extend(option, this._option));
};