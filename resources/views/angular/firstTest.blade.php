<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AngularTest</title>

</head>
<body ng-app="myApp">
<div ng-controller="myController">
    <% message %>
</div>

<div ng-app="request" >

    <ul>
        <li ng-controller="requestController">
            <% post %>
        </li>
    </ul>

</div>



<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>