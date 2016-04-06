/**
 * Created by tania on 30.03.16.
 */
var app = angular.module("TimetableApp", ['ngRoute']);

app.controller("GroupCtrl", function ($scope, $http) {
    $http.get('ajaxGroup.php').success(function (data, status, headers, config) {

        data =  data.constructor === Array ? data : [];
        $scope.groups = data ? data : [];
    }).error(function (data, status, headers, config) {

    });
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

app.directive('groupselect', function () {
    return {
        restrict: "E",
        templateUrl: "public/partial/groupSelect.html",
        link: function (scope, elm, attrs) {
            var def = 'ЕП-41к';
            $('.group').on('change', function (event) {
                var def1 = event.target.value;
                def = def1;
            })
        }
    }
});