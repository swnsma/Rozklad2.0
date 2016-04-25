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
        displayEventTime: true,
        timezone: 'local',
        buttonText: {
            today: "Сьогодні",
            month: "Місяць",
            week: "Тиждень",
            day: "День"
        },
        timeFormat: 'H:mm',// uppercase H for 24-hour clock
        axisFormat: 'H:mm',
        eventRender: function (event, element) {
            $(element).find('.fc-time span').before($('<span class="auditory">').text(event.auditory + ' '));
            $(element).find('.fc-content').append($('<div class="teacher">').text(event.teacher));
            if (event.type === '1') {
                $(element).addClass('practice');
            } else {
                $(element).addClass('lecture');
            }
        }
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
        ]
    };
    $('#calendar').fullCalendar(_.extend(option, this._option));
};
Calendar.prototype.renderMobileDay = function(group,now, element){
    group = group ? group : null;
    var option = {
        defaultView: "agendaDay",
        height: 'auto',
        slotLabelInterval: 10,
        slotDuration: '00:30:00',
        fixedWeekCount: false,
        allDaySlot: false,
        firstDay: 1,
        header: {
            left: '',
            center: '',
            right: ''
        },
        now: now,
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
    $('#mobileAddition').fullCalendar(_.extend(option, this._option));
    $('#mobileAddition').fullCalendar( 'gotoDate', now);
}

Calendar.prototype.renderMobileCalendar = function (group, element) {
    var self = this;
    group = group ? group : null;
    var option = {
        defaultView: "agendaDay",
        height: 'auto',
        slotLabelInterval: 10,
        slotDuration: '00:30:00',
        fixedWeekCount: false,
        allDaySlot: false,
        firstDay: 1,
        header: {
            left: 'prev,next today ',
            center: 'title',
            right: 'agendaDay,month'
        },

        eventSources: [
            '/mvp/server/ajaxCall.php?group=' + group
        ],
        eventAfterRender: function (event, element, view) {
            if (view.name === 'month') {
                $('.fc-content-skeleton').addClass('mobile-fc-content-skeleton');
                $(element).remove();

            }
        },
        dayClick: function(date, jsEvent, view) {
            if (view.name === 'month') {
                self.renderMobileDay(group,date.format());
                $('.select-day').removeClass('select-day');
                this.addClass('select-day');
            }
        },
        viewRender: function( view, element ){
            if (view.name === 'month') {
                self.renderMobileDay(group,$('#calendar').fullCalendar('getDate').format());
                $('#mobileAddition').css({
                    'display':'block'
                })
            }else{
                $('#mobileAddition').css({
                    'display':'none'
                })
            }

        }
    };
    $('#calendar').fullCalendar(_.extend(option, this._option));
};
Calendar.prototype.renderTeacher = function(data){
    var option = {
        resourceAreaWidth: 230,
        aspectRatio: 1.5,
        scrollTime: '00:00',
        header: {
            left: 'today prev,next',
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
        resourceLabelText: 'Викладачі',
        eventRender: function (event, element) {
            $(element).find('.fc-content').append($('<div class="auditory">').text(event.auditory));
            if (event.type === '1') {
                $(element).addClass('practice');
            } else {
                $(element).addClass('lecture');
            }
        }
    };
    debugger;
    $('#teacher').fullCalendar(_.extend(this._option,_.extend(option,data) ));
};