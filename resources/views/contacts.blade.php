<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AngularTest</title>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body ng-app="myModule" ng-controller="customersCtrl">
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
                            <td>2</td>
                            <td>{{ contact.contact_name }}</td>
                            <td>{{ contact.contact_telephone }}</td>
                            <td></td>
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
                    <form class="form-horizontal">
                        <fieldset>
                            <div class="form-group">
                                <label for="Name" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="Name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Surname" class="col-lg-2 control-label">Surname</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="Surname" placeholder="Surname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-lg-2 control-label">Textarea</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="3" id="textArea"></textarea>
                                    <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>
    </div>
</div>



<script src="<% asset('js/app.js') %>"></script>
</body>
</html>