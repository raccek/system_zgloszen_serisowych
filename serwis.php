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
		<script type="text/javascript" src="JS/footable.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/styles.css">
		<link rel="stylesheet" type="text/css" href="CSS/footable.bootstrap.min.css">
	</head>

	<body>

	<div class="panel">
		
		<h3 class="panel-heading">Lista przyjętych zgłoszeń</h3>

		<a href="rejestracja.php"><button type="submit" class="btn" formaction="/rejestracja.php"> Nowy użytkownik </button></a>
		<a href="adminlog.php"><button type="submit" class="btn" formaction="/adminlog.php"> NOWE zgłoszenia</button></a>
		<a href="serwis.php"><button type="submit" class="btn btn-success" formaction="/serwis.php"> ZGŁOSZENIA SERWISOWE  </button></a>
		<a href="logout.php"><button type="submit" class="btn" formaction="/logout.php"> WYLOGUJ </button></a>
		<br />
		<br />

		<?php
					// podłączamy plik z danymi do łączenia się z DB
					require_once "conection2.php";
					// wywołujemy funkcję connection()
					$polaczenie = connection();
					@new mysqli($host, $user, $pass, $db_name);

					// ustawienie nazw kolum tabeli na stronie - NIEDZIAŁA
					// $sql = "SHOW TABLES FROM "

					// zapytanie do konkretnej tabeli 
					$wynik = mysql_query("SELECT * FROM `zgloszenia`")
					or die('Błąd zapytania');

					// wyświetlamy wyniki, sprawdzamy,
					// czy zapytanie zwróciło wartość większą od 0
					
					if(mysql_num_rows($wynik) > 0) {
				     // jeżeli wynik jest pozytywny, to wyświetlamy dane 
					echo 	'<table>';
				    echo 	'<thead>';
				    echo	"<tr>";
				    echo    "<td> Nr Zgłoszenia </td>";
				    echo  	"<td> Marka </td>";
				    echo  	"<td> Model </td>";
				    echo  	"<td> Data Przyjęcia </td>";
				    echo  	"<td> Szczegóły </td>";
				    echo    "</tr>";
				    echo 	"</thead>";
				    echo 	'<tbody id="aplikanci">';
				    while($r = mysql_fetch_assoc($wynik)) {
				        echo "<tr>";
				        echo "<td>".$r['nr_zgloszenia']."</td>";
				        echo "<td>".$r['marka']."</td>";
				        echo "<td>".$r['model']."</td>";
				        echo "<td>".$r['data_przyjecia']."</td>";
				        echo '<td><a href="#">szczegoly</a></td>';
				        echo "</tr>";
				    }
				    echo "</tbody>";
				    echo "</table>";
				}
?> 

		
	</div>

	</body>

</html>
