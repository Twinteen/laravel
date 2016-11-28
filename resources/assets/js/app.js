var app = angular
            .module("contacts", [], function($locationProvider){
                $locationProvider.html5Mode({
                    enabled: true,
                    requireBase: false
                });
            })
            .factory('contactHandler', function($http) {
                return {
                    saveContact: function($contactData) {
                        document.getElementById("message").textContent = "";
                        var request = $http({
                            method: "POST",
                            url: "api/contact",
                            data: {
                                name: $contactData.name,
                                surname: $contactData.surname,
                                telephone: $contactData.telephone,
                                text: $contactData.text,
                                birthday: $contactData.birthday
                            }
                        });

                        request.success(function (data) {
                            document.getElementById("message").textContent = "You have login successfully with email " + data;
                            $http.get("api/contact").then(function(response) {
                                $contactData.myData = response.data
                            });
                        });
                        request.error(function (data) {
                            console.log(data);
                            document.getElementById("message").textContent = "Error " + data;
                        });

                        return $contactData;
                    }
                };
            })
            .controller('contactsController', function($scope, $http, contactHandler) {
                $http.get("api/contact").then(function(response) {
                    $scope.myData = response.data;
                });

                $('#birthdayPicker').datetimepicker({
                    format: 'DD/MM/YYYY'
                }).on('dp.change', function(newDate) {
                    $scope.birthday = newDate.date.format("YYYY-MM-DD");
                });

                $scope.setBackGround = function(contactBirthday) {
                    var now = new Date();
                    var newDate = moment(new Date()).add(10, 'days');
                    var diff = moment(now).diff(moment(newDate.format('YYYY') + contactBirthday.slice(4)), 'days', true);
                    var color = null;
                    if(diff < 0){
                        if(diff >= -10 && diff < -5){
                            color = '#faf2cc';
                        }else if(diff > -5){
                            color = '#ebcccc';
                        }
                    }
                    return color;
                };

                $scope.save = function () {
                    $scope = contactHandler.saveContact($scope);
                }
            })
            .controller('EditContactController', function($scope, $http, $location) {
                var url = $location.url();
                var id = url.substr(url.length - 1);

                $http.get("/api/contact/" + id).then(function(response) {
                    console.log("api/contact/" + id);
                    console.log(response);
                    $scope.name = response.data.contact_name;
                    $scope.surname = response.data.contact_surname;
                    $scope.telephone = response.data.contact_telephone;
                    $scope.text = response.data.contact_text;
                    $scope.birthday = response.data.contact_birthday;
                    //console.log($scope.name);
                    //$scope.myData = response.data
                });

/*                var request = $http({
                    method: "GET",
                    url: "/api/contact/" + id,
                    data: {
                        contact: id
                    }

                });*/
/*                request.success(function (data) {
                    console.log('YES');
                });
                request.error(function (data) {
                    console.log("NO");
                });*/

        /*get("api/contact/contact").then(function(response) {
                console.log("api/contact/" + id);
                console.log(response);
                $scope.myData = response.data;

            });

            $('#birthdayPicker').datetimepicker({
                format: 'DD/MM/YYYY'
            }).on('dp.change', function(newDate) {
            $scope.birthday = newDate.date.format("YYYY-MM-DD");
            });*/

/*        $scope.save = function () {
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
            });

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
        }*/
    });






