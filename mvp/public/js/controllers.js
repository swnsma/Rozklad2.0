/**
 * Created by t.blindaruk on 06.04.16.
 */

var timetableControllers = angular.module('timetableControllers', []);

timetableControllers.controller('MainCtrl', ['$scope', function ($scope) {
    (new Calendar()).renderCalendar();
}]);

timetableControllers.controller('GroupCtrl', ['$scope', '$routeParams', function ($scope,$routeParams) {
    $scope.group = $routeParams.group;
    debugger;
    (new Calendar()).renderCalendar($scope.group);
}]);