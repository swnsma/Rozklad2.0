/**
 * Created by t.blindaruk on 06.04.16.
 */

var timetableControllers = angular.module('timetableControllers', []);

timetableControllers.controller('HomeController', [function () {
    debugger;
    (new Calendar()).renderCalendar();
}]);

timetableControllers.controller('GroupController', [ '$routeParams','$scope', function ( $routeParams,$scope) {
    $scope.group = $routeParams.group;
    debugger;
    if(isMobile.any) {
        (new Calendar()).renderMobileCalendar($scope.group);
    }else{
        (new Calendar()).renderCalendar($scope.group);
    }
}]);
// timetableControllers.controller('AuditoryCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
//     (new Calendar()).renderAuditory();
// }]);

