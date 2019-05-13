var app = angular.module("myApp",[]);
app.controller("userController",function($scope,$http){
    $scope.insertData=function(){
        $http.post("sqlSignup.php",{'username':$scope.username,'password':$scope.password,'fName':$scope.fName,'lName':$scope.lName})
        .then(function(data){
            sweetAlert("Data Complete","Insert Complete Form","success");
            location.href = "login.php";
        });
    }
    $scope.displayData=function(){
       $http.get("select.php").then(function(response){
            $scope.names=response.data.records;
    });
   }
    $scope.checkData=function(){
       $http.get("select.php").then(function(response){
            $scope.names=response.data.records;
    });
   }
});
