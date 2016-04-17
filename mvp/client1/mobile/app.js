// 
// Here is how to define your module 
// has dependent on mobile-angular-ui
//
var appControllers = angular.module('appControllers', [
]);
appControllers.controller('MainController', [function () {
    debugger;
    (new Calendar()).renderCalendar();
}])
    .controller('GroupCtrl', ['$scope', '$routeParams', function ($scope, $routeParams) {
    debugger;
    $scope.group = $routeParams.group;
    (new Calendar()).renderCalendar($scope.group);
}]);
var app = angular.module('MobileAngularUiExamples', [
    'ngRoute',
    'mobile-angular-ui',
    'mobile-angular-ui.gestures',
    'appControllers'
]);

// app.run(function ($transform) {
//     window.$transform = $transform;
// });

app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'home.html',
            controller: 'MainController',
            reloadOnSearch: false
        })
        .when('/group/:group', {
            templateUrl: 'group.html',
            controller: 'GroupCtrl',
            reloadOnSearch: false
        });
});


app.directive('groupselect', function () {
    return {
        restrict: "E",
        templateUrl: "./partial/directive/groupSelect.html",
        controller: ['$scope', '$http', '$location', function ($scope, $http, $location) {
            $http.get('//' + $location.host() + '/mvp/server/ajaxGroup.php').success(function (data, status, headers, config) {
                data = data.constructor === Array ? data : [];
                $scope.groups = data ? data : [];
            }).error(function (data, status, headers, config) {

            });
        }],
    }
});