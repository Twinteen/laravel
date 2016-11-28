/*var myApp = angular.module('myApp', []);*/

/*var myController = function ($scope) {
    $scope.message = "Hello world";

};

myApp.controller("myController", myController);*/

var app = angular
            .module("myModule", [])
            .controller('customersCtrl', function($scope, $http) {
                $http.get("api").then(function(response) {
                    $scope.myData = response.data;
                });

                $scope.setBackGround = function(contactBirthday) {
                    var now = new Date();
                    var birthday = contactBirthday.split("-");
                    if(parseInt(birthday[1]) == 12 && parseInt(birthday[2]) >= 21) {
                        birthday[0] = parseInt(now.getFullYear()) + 1;
                    }
                    else {
                        birthday[0] = parseInt(now.getFullYear());
                    }

                    var newBd = new Date(parseInt(birthday[1]) + "/" + birthday[2] + "/" + birthday[0]);
                    var diff = parseInt(newBd.getTime() - new Date().getTime())/86400000;
                    var color = null;
                    if(diff > 0) {
                        if(diff <= 10 && diff > 5) {
                            color = '#faf2cc';
                        } else if(diff <= 5) {
                            color = '#ebcccc';
                        }
                    }

                    return color;
                }

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

                        $http.get("api").then(function(response) {
                            $scope.myData = response.data
                        });
                    });
                    request.error(function (data) {
                        console.log(data);
                        document.getElementById("message").textContent = "Error " + data;
                    });
                }
            });






