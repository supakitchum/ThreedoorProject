<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link href="../cssPa/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<script src="../js/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../js/dist/sweetalert.css">
<body>
<div class="container">
<div ng-app="myApp" ng-controller="customersCtrl"> 
<script type="text/javascript"> </script>
<table class="bordered">
<tr>
        <th>PID</th>
        <th>Name</th>
        <th>Photo</th>
        <th> </th>
</tr>
  <tr ng-repeat="x in names">
    <td>{{x.Pid}}</td>
    <td width="30%">{{x.Pname}}</td>
    <td><img src="../product/imgDir/{{x.imgDir}}" width="90px" height="90px"></td>
    <td><a class="btn waves-effect waves-light" href="admin_manage.php?pid={{x.Pid}}#edit" target="_top" style="width: 30%;">EDIT</a>&nbsp;<a class="btn waves-effect waves-light" href="delete_sql.php?id=<?php echo "{{x.Pid}}";?>" target="_top" style="background-color: red; width: 30% ;">DELETE</a></td>
  </tr>
</table>

</div>
</div>
<script>
var app = angular.module('myApp', []);
app.controller('customersCtrl', function($scope, $http) {
    $http.get("product_sql.php")
    .then(function (response) {$scope.names = response.data.records;});
});
</script>

</body>
</html>
