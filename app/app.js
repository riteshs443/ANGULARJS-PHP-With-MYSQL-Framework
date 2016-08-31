var app=angular.module('edoofa',['ngRoute','toaster']);

app.config(function($routeProvider) {
  $routeProvider

    .when("/main", {
      templateUrl : "views/main.html",
      controller: "Auth"
    })

    .when("/dashboard", {
      templateUrl : "views/dashboard.html",
      controller: "Auth"
    })

    .when("/forgetpwd", {
      templateUrl : "views/forgetpwd.html",
      controller: "Auth"
    })

    .otherwise({
        redirectTo: '/main'
      });

 });