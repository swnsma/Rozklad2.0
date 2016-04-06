/**
 * Created by tania on 30.03.16.
 */
var app = angular.module("TimetableApp", ['ngRoute']);

app.controller("GroupCtrl", function ($scope, $http) {

    $scope.group = '';
    $scope.countClick = 0;
    $scope.setActiveGroup = function (group) {
        if ($scope.countClick === 0) {
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
    }
});

