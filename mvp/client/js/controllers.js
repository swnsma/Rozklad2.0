/**
 * Created by t.blindaruk on 06.04.16.
 */

var timetableControllers = angular.module('timetableControllers', []);

timetableControllers.controller('MainController', ['$scope',function ($scope) {
    $scope.isMobile = isMobile.any;
}]);

timetableControllers.controller('HomeController', [function () {
    (new Calendar()).renderCalendar();
}]);

timetableControllers.controller('GroupController', ['$scope', '$routeParams', function ($scope, $routeParams) {
    $scope.group = $routeParams.group;

    if(isMobile.any) {
        (new Calendar()).renderCalendar($scope.group);
    }else{
        (new Calendar()).renderMobileCalendar($scope.group);
    }
}]);
// timetableControllers.controller('AuditoryCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
//     (new Calendar()).renderAuditory();
// }]);

