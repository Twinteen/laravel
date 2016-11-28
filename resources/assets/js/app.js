/*var myApp = angular.module('myApp', []);*/

/*var myController = function ($scope) {
    $scope.message = "Hello world";

};

myApp.controller("myController", myController);*/

var app = angular
            .module("myModule", [])
            .controller("newController", function ($scope){
                var employees = [
                    { firstName: "Ben", lastName: "Gur" },
                    { firstName: "John", lastName: "Manson" }
                ];

                $scope.employees = employees;
            })
            .controller("myController", function ($scope) {
                $scope.message = "Hello world"

            })
            .controller('customersCtrl', function($scope, $http) {
                $http.get("api").then(function(response) {
                    $scope.myData = response.data;
                });
            })
            .controller('FormController',  function($scope) {
                var contact = {
                    firstName: "",
                    lastName: "",
                    telephone: "",
                    text: "",
                    birthday: ""
                };

                $scope.contact = contact;
            })
            .controller('createController', function ($scope, $http) {
                $scope.save = function () {

                    document.getElementById("message").textContent = "";

                    var request = $http({
                        method: "POST",
                        url: "api",
                        data: {
                            name: $scope.name,
                            surname: $scope.surname,
                            telephone: $scope.telephone,
                            text: $scope.text,
                            birthday: $scope.birthday
                        }
                        //headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                    });

                    /* Check whether the HTTP Request is successful or not. */
                    request.success(function (data) {
                        document.getElementById("message").textContent = "You have login successfully with email " + data;
                    });
                    request.error(function (data) {
                        console.log(data);
                        document.getElementById("message").textContent = "Error " + data;
                    });
                }
            });






