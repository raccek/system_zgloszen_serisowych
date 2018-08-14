<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: adminlog.php');
		exit();
	}

?>

<!DOCTYPE html>

<html lang="pl">

	<head>
		<title>AleSerwis logowanie </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-beta.2/angular.min.js"></script>
		<script type="text/javascript" src="JS/controller.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	</head>

	<body>

	<div class="panel">
		<h3 class="panel-heading">Logowanie do systemu</h3>
		<form class="panel-body" method="POST" action="zaloguj.php" >
			<fieldset class="well">
				<div <div class="form-group">
					<!-- <label for="email">E-mail: </label> -->
					<input type="email" required name="email" id="email" class="form-control" placeholder="E-mail">
				</div>
				<div <div class="form-group">
					<!-- <label for="password">Password: </label> -->
					<input type="password" required name="password" id="password" class="form-control" placeholder="Password">
				</div>
				<input type="submit" value="Login" class="btn btn-primary btn-block">
			</fieldset>
		</form>

		
	</div>

	</body>

</html>
