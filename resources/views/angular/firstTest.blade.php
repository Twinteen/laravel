<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AngularTest</title>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body ng-app="myModule" ng-controller="customersCtrl">
<div>
    <form name="myForm" class="my-form">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" ng-model="name">
        <label for="surname">Surname</label>
        <input type="text" id="surname" name="surname" ng-model="surname">
        <label for="telephone">Telephone</label>
        <input type="text" id="telephone" name="telephone" ng-model="telephone">
        <label for="text">Text</label>
        <input type="text" id="text" name="text" ng-model="text">
        <label for="birthday">Birthday</label>
        <input type="text" id="birthday" name="birthday" ng-model="birthday">
        <button ng-click="save()">Save</button><br>
        <span id="message"></span>
    </form>
</div>
<div>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Telephone</th>
            <th>Text</th>
            <th>Birthday</th>
        </tr>
        <tr ng-repeat="contact in myData" ng-style="{'background-color': '{{ setBackGroundImage(contact.contact_birthday) }}'}">
            <td>{{ contact.contact_name }}</td>
            <td>{{ contact.contact_surname }}</td>
            <td>{{ contact.contact_telephone }}</td>
            <td>{{ contact.contact_text }}</td>
            <td>{{ contact.contact_birthday }}</td>
        </tr>
    </table>

</div>


<script src="<% asset('js/app.js') %>"></script>

</body>
</html>