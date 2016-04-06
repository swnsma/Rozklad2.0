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
        otherwise({
            redirectTo: '/'
        });
    }]);