var myApp = angular.module('myApp', []);

myApp.config(['$interpolateProvider',

    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
]);

var myController = function ($scope) {
    $scope.message = "Hello world";

};

myApp.controller("myController", myController);

var app = angular.module('request', []);

app.config(['$interpolateProvider',

    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
]);

var requestController = function ($scope, $http) {
    $scope.message = $http.get('api').
    success(function(data, status, headers, config) {
        $scope.posts = data;
    }).
    error(function(data, status, headers, config) {
        // log error
    });
};

app.controller("requestController", requestController);





