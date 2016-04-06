/**
 * Created by t.blindaruk on 06.04.16.
 */

var timetableControllers = angular.module('timetableControllers', []);

timetableControllers.controller('MainCtrl', ['$scope','$http', function ($scope,$http) {
    (new Calendar()).renderCalendar();
    $http.get('ajaxGroup.php').success(function (data, status, headers, config) {
        debugger;
        data =  data.constructor === Array ? data : [];
        $scope.groups = data ? data : [];
    }).error(function (data, status, headers, config) {

    });
}]);

timetableControllers.controller('GroupCtrl', ['$scope', '$routeParams','$http', function ($scope,$routeParams,$http) {
    $http.get('ajaxGroup.php').success(function (data, status, headers, config) {
        data =  data.constructor === Array ? data : [];
        $scope.groups = data ? data : [];
    }).error(function (data, status, headers, config) {

    });
    $scope.group = $routeParams.group;
    (new Calendar()).renderCalendar($scope.group);
}]);

