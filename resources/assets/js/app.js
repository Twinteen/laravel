var app = angular
            .module("contacts", ['ui.bootstrap'], function($locationProvider){
                $locationProvider.html5Mode({
                    enabled: true,
                    requireBase: false
                });
            })
            .factory('contactHandler', function($http) {
                return {
                    saveContact: function($contactData, id) {
                        var method;
                        if (parseInt(id)){
                            method = "PUT";
                            url = "/api/contact/" + id;
                        }else {
                            method = "POST";
                            url = "/api/contact";
                        }

                        var request = $http({
                            method: method,
                            url: url,
                            data: {
                                contact_name: $contactData.name,
                                contact_surname: $contactData.surname,
                                contact_telephone: $contactData.telephone,
                                contact_text: $contactData.text,
                                contact_birthday: $contactData.birthday
                            }
                        });

                        return request;
                    }
                };
            })
            .controller('contactsController', function($scope, $http, $uibModal) {
                $scope.init = function() {
                    $http.get("/api/contact").then(function(response) {
                        $scope.myData = response.data;
                        if($scope.modalInstance) {
                            $scope.cancel();
                        }
                    });
                };

                $scope.createContact = function () {
                    $scope.modalInstance = $uibModal.open({
                        templateUrl: 'createContact.html',
                        controller: 'CreateNewContact',
                        scope: $scope
                    });
                };

                $scope.cancel = function () {
                    $scope.modalInstance.close();
                };

                $scope.setBackGround = function(contactBirthday) {
                    var now = new Date();
                    var newDate = moment(new Date()).add(10, 'days');
                    var diff = moment(now).diff(moment(newDate.format('YYYY') + contactBirthday.slice(4)), 'days', true);
                    var color = null;
                    if(diff < 0){
                        if(diff >= -10 && diff < -5){
                            color = '#faf2cc';
                        } else if(diff > -5){
                            color = '#ebcccc';
                        }
                    }
                    return color;
                };
            })
            .controller('CreateNewContact', function($scope, $http, contactHandler) {
                angular.element(document).ready(function () {
                    $('#birthdayPicker').datetimepicker({
                        format: 'DD/MM/YYYY'
                    }).on('dp.change', function(newDate) {
                        $scope.birthday = newDate.date.format("YYYY-MM-DD");
                    });
                });

                $scope.save = function () {
                    var save = contactHandler.saveContact($scope);
                    save.then(function successCallback() {
                        $scope.errorData = null;
                        $scope.init();
                    }, function errorCallback(response) {
                        if(response.status === 422){
                            $scope.errorData = response.data;
                        } else {
                            document.getElementById("message").textContent = "Something went wrong";
                        }
                    });
                }
            })
            .controller('EditContactController', function($scope, $http, $location, contactHandler) {
                var id = $location.url().split("/")[2]||"Unknown";

                $('#birthdayPicker').datetimepicker({
                    format: 'DD/MM/YYYY'
                }).on('dp.change', function(newDate) {
                    $scope.birthday = newDate.date.format("YYYY-MM-DD");
                });

                $http.get("/api/contact/" + id).then(function(response) {
                    $scope.name = response.data.contact_name;
                    $scope.surname = response.data.contact_surname;
                    $scope.telephone = response.data.contact_telephone;
                    $scope.text = response.data.contact_text;
                    $scope.birthday = response.data.contact_birthday;
                });

                $scope.save = function (){
                    var save = contactHandler.saveContact($scope, id);
                    save.then(function successCallback(response) {
                        $scope.message = "The contact has been successfully updated";
                        document.getElementById("message").textContent = $scope.message;
                        $scope.errorData = null;
                    }, function errorCallback(response) {
                        if(response.status === 422){
                            $scope.errorData = response.data;
                            document.getElementById("message").textContent = "";
                        }
                        else {
                            document.getElementById("message").textContent = "Something went wrong";
                        }
                    });
                }
            });






