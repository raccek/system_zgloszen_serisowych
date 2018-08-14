<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
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
		
		<h3 class="panel-heading">Witamy w systemie przyjęc serwisowych AleSerwis</h3>

		<a href="rejestracja.php"><button type="submit" class="btn" formaction="/rejestracja.php"> Nowy użytkownik </button></a>
		<a href="adminlog.php"><button type="submit" class="btn btn-success" formaction="/adminlog.php"> NOWE zgłoszenie</button></a>
		<a href="serwis.php"><button type="submit" class="btn" formaction="/serwis.php"> ZGŁOSZENIA SERWISOWE  </button></a>
		<a href="logout.php"><button type="submit" class="btn" formaction="/logout.php"> WYLOGUJ </button></a>
		<br />
		<br />