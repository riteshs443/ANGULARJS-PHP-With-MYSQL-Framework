'use strict';
app.controller('Auth',function($scope,$http,$location){

   /* ******************register start********************/
    $scope.register=function(username,email,pwd,phone){
        $scope.sucess='';
         $http.post('api/mail.php',{
                'name'                :   username,
                'email'               :   email,
                'phone'               :   phone
        })
        .then(function(response) {
            console.log(response.data);
         });
   	    $http.post('api/auth.php',{
                'name'                :   username,
                'email'               :   email,
                'phone'               :   phone,
                'pwd'                 :   pwd,
                'dor'                 :   moment().format("YYYY-MM-DD"),
                'functionName'        :   'register'
        })
        .then(function(response) {
             if(response.data === "1"){
                 $scope.sucess="true"; 
                 $scope.login(email,pwd);
              }
             if(response.data === "0"){
                $scope.sucess="false";  
                $scope.$evalAsync(); 
              }
        });
    };

    /* ******************register end********************/


    /* ******************Login start********************/
    $scope.login=function(email,pwd){
        $scope.sucess='';
        $http.post('api/auth.php',{
                'email'               :   email,
                'pwd'                 :   pwd,
                'functionName'        :   'login'
        })
        .then(function(response) {
             if(response.data === "0"){
                $scope.sucess="false";  
              }
             if(response.data === "1"){
               $location.path('/dashboard');
              }
         });
    };
    /* ******************Login end********************/


     /* ******************dashboard start********************/

    $scope.dashboard=function(){
        $http.post('api/auth.php',{
                'functionName'        :   'dashboard'
        })
        .then(function(response) {
            if(response.data === "0"){
               $location.path('/main');
            }else{
              $scope.Login=response.data;
              $scope.$evalAsync(); 
            }
         });
    };
     /* ******************dashboard end********************/

   /* ******************logout start********************/
    $scope.logout=function(){
        $http.post('api/auth.php',{
                'functionName'        :   'logout'
        })
        .then(function(response) {
            if(response.data === "0"){
                $location.path('/main');
            }
         });
    };
    /* ******************logout end********************/


    /* ******************Forgetpwd start********************/
    $scope.forgetpassword=function(email,phone,pwd){
        $scope.sucess='';
        $http.post('api/auth.php',{
                'email'               :   email,
                'pwd'                 :   pwd,
                'phone'               :   phone,
                'functionName'        :   'forgetpassword'
        })
        .then(function(response) {
            console.log(response.data);
             if(response.data === "0"){
                $scope.sucess="false";  
              }
              if(response.data === "1"){
                $scope.sucess="true";  
              }
             
         });
    };
    /* ******************Forgetpwd end********************/


    /* ******************checklogin start********************/
    $scope.checklogin=function(){
       $http.post('api/auth.php',{
                'functionName'        :   'checklogin'
        })
        .then(function(response) {
            if(response.data === "0"){
                $location.path('/main');
            }else{
                $location.path('/dashboard');
            }
         }); 
    };
     /* ******************checklogin end********************/


     /* ******************Changepwd start********************/
    $scope.Changepassword=function(oldpwd,newpwd){
        $scope.sucess='';
        $http.post('api/auth.php',{
                'oldpwd'              :   oldpwd,
                'newpwd'              :   newpwd,
                'functionName'        :   'Changepassword'
        })
        .then(function(response) {
            console.log(response.data);
            if(response.data === "0"){
              $scope.sucess="false";  
            }
            if(response.data === "1"){
              $scope.sucess="true";  
            }      
        });
    };
      /* ******************Changepwd end********************/
});