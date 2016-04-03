/**
 * Created by tania on 30.03.16.
 */
var app = angular.module("TimetableApp", ['ngRoute']);

app.controller("GroupCtrl", function ($scope, $http) {
    $http.get('ajaxGroup.php').success(function (data, status, headers, config) {
        $scope.groups = data;
    }).error(function (data, status, headers, config) {

    });
    $scope.group = '';
    $scope.countClick = 0;
    $scope.setActiveGroup = function (group) {
        if ($scope.countClick === 0) {
            function renderCalendar() {
                $('#calendar').fullCalendar({
                    weekends: false, // will hide Saturdays and Sundays
                    defaultView: "agendaWeek",
                    now: '2016-04-01',
                    height: 'auto',
                    slotLabelInterval: 10,
                    slotDuration: '00:30:00',
                    displayEventTime: true,
                    minTime: '08:00:00',
                    maxTime: '14:10:00',
                    //contentHeight:'auto',
                    fixedWeekCount: false,
                    allDaySlot: false,
                    //aspectRatio:7,
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
                    eventAfterAllRender: function (view) {

                    },
                    eventSources: [
                        '/mvp/ajaxCall.php?group=' + def
                    ],
                    eventRender: function (event, element) {
                        if(event.auditory) {
                            $(element).find('.fc-content').append($('<div class="auditory">').text(event.auditory));
                        }
                        $(element).find('.fc-content').append($('<div class="teacher">').text(event.teacher));

                        if (event.type == 1) {
                            $(element).addClass('practice');
                        }else{
                            $(element).addClass('lecture');
                        };
                    },
                    color: 'yellow',   // an option!
                    textColor: 'black' // an option!
                })
            }

            renderCalendar();
        }
        else {
            $('#calendar').fullCalendar('removeEventSource', '/mvp/ajaxCall.php?group=' + $scope.group);
            $('#calendar').fullCalendar('addEventSource',
                '/mvp/ajaxCall.php?group=' + group
            );
        }
        $scope.countClick++;
        $scope.group = group;
        debugger;
    }
});

app.directive('groupselect', function () {
    return {
        restrict: "E",
        templateUrl: "public/js/partial/groupSelect.html",
        link: function (scope, elm, attrs) {
            var def = 'ЕП-41к';
            $('.group').on('change', function (event) {
                var def1 = event.target.value;

                def = def1;
            })
        }
    }
});