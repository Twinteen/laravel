<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts</title>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
</head>
<body ng-app="contacts" ng-controller="contactsController">
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1>Contacts</h1>
            </div>
        </div>
    </div>
    <div class="bs-docs-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create new contact</button>
                </div>
                <div class="bs-component">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="contact in myData" ng-style="{'background-color': '{{ setBackGround(contact.contact_birthday) }}'}">
                            <td>{{ contact.contact_id }}</td>
                            <td>{{ contact.contact_name }}</td>
                            <td>{{ contact.contact_telephone }}</td>
                            <td><a href="contact/{{ contact.contact_id }}">Edit</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- /example -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">New contact</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" >
                        <fieldset>
                            <div class="form-group">
                                <label for="name" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="name" placeholder="First Name" ng-model="name">
                                    <span class="help-inline">Woohoo!</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="surname" class="col-lg-2 control-label">Surname</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="surname" placeholder="Surname" ng-model="surname">
                                    <span class="help-inline">Woohoo!</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="col-lg-2 control-label">Telephone</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="telephone" placeholder="Telephone" ng-model="telephone">
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
                                </div>
                            </div>
                            <span id="message"></span>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="save()">Save</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="<% asset('js/app.js') %>"></script>
</body>
</html>