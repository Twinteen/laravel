<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet"
          href="https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
</head>
<body>
<div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>Edit your contact or go <a href="/">Back</a></h1>
                </div>
            </div>
        </div>
        <div class="row" ng-app="contacts" ng-controller="EditContactController">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="well bs-component">
                    <form class="form-horizontal" data-toggle="validator" role="form">
                        <fieldset>
                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="name" placeholder="First Name" ng-model="name" data-error="{{ errorData.contact_name[0] }}">
                                    <span style="color:red">{{ errorData.contact_name[0] }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="surname" class="col-lg-2 control-label">Surname</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="surname" placeholder="Surname" ng-model="surname">
                                    <span style="color:red">{{ errorData.contact_surname[0] }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="col-lg-2 control-label">Telephone</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="telephone" placeholder="Telephone" ng-model="telephone">
                                    <span style="color:red">{{ errorData.contact_telephone[0] }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Notes</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="textArea" ng-model="text"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="datetimepicker1" class="col-lg-2 control-label">Birthday</label>
                                <div class="col-sm-6">
                                    <div class='input-group date' id='birthdayPicker'>
                                        <input type='text' class="form-control" ng-model="birthday" />
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    <span style="color:red">{{ errorData.contact_birthday[0] }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="button" class="btn btn-primary" ng-click="save()">Save</button>
                                </div>
                            </div>
                            <span id="message"></span>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

</div>

<script src="<% asset('js/app.js') %>"></script>
</body>
</html>

