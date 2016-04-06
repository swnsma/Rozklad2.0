/**
 * Created by tania on 30.03.16.
 */
var timetableApp = angular.module('timetableApp',[
    'ngRoute',
    'timetableControllers'
]);

timetableApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
        when('/', {
            templateUrl: 'public/partial/main.html',
            controller: 'MainCtrl'
        }).
        when('', {
            templateUrl: 'public/partial/main.html',
            controller: 'MainCtrl'
        }).
        when('/group/:group', {
            templateUrl: 'public/partial/group.html',
            controller: 'GroupCtrl'
        }).
        when('/auditory', {
            templateUrl: 'public/partial/auditory.html',
            controller: 'AuditoryCtrl'
        }). 
        otherwise({
            redirectTo: '/'
        });
    }]);

timetableApp.directive('groupselect', function () {
    return {
        restrict: "E",
        templateUrl: "public/partial/directive/groupSelect.html",
        controller: ['$scope','$http', function($scope,$http) {
            $http.get('ajaxGroup.php').success(function (data, status, headers, config) {
                data =  data.constructor === Array ? data : [];
                $scope.groups = data ? data : [];
            }).error(function (data, status, headers, config) {

            });
        }],
    }
});