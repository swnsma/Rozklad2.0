/**
 * Created by t.blindaruk on 06.04.16.
 */

var timetableControllers = angular.module('timetableControllers', []);

timetableControllers.controller('HomeController', [function () {
    (new Calendar()).renderCalendar();
}]);

timetableControllers.controller('TeacherController',['$http','$location',function($http,$location){
    $http.get('//' + $location.host() + '/mvp/server/ajaxTeacher.php').success(function (data, status, headers, config) {
        (new Calendar()).renderTeacher(data);
    }).error(function (data, status, headers, config) {

    });
}]);

timetableControllers.controller('GroupController', [ '$routeParams','$scope', function ( $routeParams,$scope) {
    $scope.group = $routeParams.group;
    if(isMobile.any) {
        (new Calendar()).renderMobileCalendar($scope.group);
    }else{
        (new Calendar()).renderCalendar($scope.group);
    }
}]);

