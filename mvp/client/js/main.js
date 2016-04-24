/**
 * Created by tania on 17.04.16.
 */
var timetableApp = angular.module('timetableApp', [
    'ngRoute',
    'timetableControllers',
    'mobile-angular-ui',
    'mobile-angular-ui.gestures'
]);

timetableApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.when('/', {
            templateUrl: './partial/home.html',
            controller: 'HomeController',
            reloadOnSearch: false
        }).when('', {
            templateUrl: './partial/home.html',
            controller: 'HomeController',
            reloadOnSearch: false
        }).when('/group/:group', {
            templateUrl: './partial/group.html',
            controller: 'GroupController',
            reloadOnSearch: false
            // }).when('/auditory', {
            //     templateUrl: 'public/partial/auditory.html',
            //     controller: 'AuditoryCtrl'
        }).otherwise({
            redirectTo: '/'
        });
    }])
    .run(function ($rootScope) {
        debugger;
        $rootScope.isMobile = isMobile.any;
    });
timetableApp.directive('groupselect', function () {
    return {
        restrict: "E",
        templateUrl: function () {
            if (isMobile.any) {
                return "./partial/directive/mobile/groupSelect.html";
            }
            else {
                return "./partial/directive/web/groupSelect.html";
            }
        },
        controller: ['$scope', '$http', '$location', function ($scope, $http, $location) {
            $http.get('//' + $location.host() + '/mvp/server/ajaxGroup.php').success(function (data, status, headers, config) {
                data = data.constructor === Array ? data : [];
                $scope.groups = data ? data : [];
            }).error(function (data, status, headers, config) {

            });
        }]
    }
});