/**
 * Created by t.blindaruk on 06.04.16.
 */

var timetableControllers = angular.module('timetableControllers', []);

timetableControllers.controller('MainCtrl', [ function () {
    (new Calendar()).renderCalendar();
}]);

timetableControllers.controller('GroupCtrl', ['$scope', '$routeParams', function ($scope,$routeParams) {
    $scope.group = $routeParams.group;
    (new Calendar()).renderCalendar($scope.group);
}]);
timetableControllers.controller('AuditoryCtrl', ['$scope', '$routeParams', function ($scope,$routeParams) {
    (new Calendar()).renderAuditory();
}]);

