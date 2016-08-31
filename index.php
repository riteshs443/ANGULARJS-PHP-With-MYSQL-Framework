<!DOCTYPE html>
<html>
<head>
	<title>Edoofa</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/2.0.0/toaster.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body ng-app="edoofa">
	<div class="container-fluid">
		<ng-view></ng-view>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/2.0.0/toaster.js"></script>
	<script src="app/app.js"></script>
	<script src="app/controller/auth.js"></script>
</body>
</html>