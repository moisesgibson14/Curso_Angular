<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Angular ejemplo uno</title>
    <script src="js/angular.js"></script>
  </head>
  <body ng-app="miapp">
    <div ng-controller="micontrolador">
      <h1>Welcome {{titulo.title}}</h1>
    </div>
    <script>
      angular.module("miapp",[])
      .controller("micontrolador",function($scope){
        $scope.titulo={};
        $scope.titulo.title="AngularJS";
      });
    </script>
  </body>
</html>
