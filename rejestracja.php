<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}



	require("conection2.php");
	$polaczenie = connection();
	@new mysqli($host, $user, $pass, $db_name);
	 
	function filtruj($zmienna)
	{
	    if(get_magic_quotes_gpc())
	        $zmienna = stripslashes($zmienna); // usuwamy slashe
	 
	   // usuwamy spacje, tagi html oraz niebezpieczne znaki
	    return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
	}
	 
	if (isset($_POST['rejestruj']))
	{
	   $login = filtruj($_POST['login']);
	   $name = filtruj($_POST['name']);
	   $surname = filtruj($_POST['surname']);
	   $password1 = filtruj($_POST['password1']);
	   $password2 = filtruj($_POST['password2']);
	   $email = filtruj($_POST['email']);
	   $ip = filtruj($_SERVER['REMOTE_ADDR']);
	 
	   // sprawdzamy czy login nie jest już w bazie
	   if (mysql_num_rows(mysql_query("SELECT login FROM user WHERE login = '".$login."';")) == 0)
	   {
	      if ($password1 == $password2) // sprawdzamy czy hasła takie same
	      {
	         mysql_query("INSERT INTO `user` (`login`, `name`, `surname`, `password`, `email`, `rejestracja`, `logowanie`, `ip`)
	            VALUES ('".$login."', '".$name."', '".$surname."', '".sha1($password1)."', '".$email."', '".date("Y-m-d h:i:s")."', '".date("Y-m-d h:i:s")."', '".$ip."');");
	 
	         echo "Konto zostało utworzone!";
	      }
	      else echo "Hasła nie są takie same";
	   }
	   else echo "Podany login jest już zajęty.";
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

		<a href="rejestracja.php"><button type="submit" class="btn  btn-success" formaction="/rejestracja.php"> Nowy użytkownik </button></a>
		<a href="adminlog.php"><button type="submit" class="btn" formaction="/adminlog.php"> NOWE zgłoszenia</button></a>
		<a href="serwis.php"><button type="submit" class="btn" formaction="/serwis.php"> ZGŁOSZENIA SERWISOWE  </button></a>
		<a href="logout.php"><button type="submit" class="btn" formaction="/logout.php"> WYLOGUJ </button></a>
		<br />
		<br />


		<form class="panel-body" method="POST" action="rejestracja.php" >
			<fieldset class="well">
				<div <div class="form-group">
					<label for="login">Login: </label>
					<input type="text" required name="login" id="login" class="form-control" placeholder="Login">
				</div>
				<div <div class="form-group">
					<label for="email">E-mail: </label>
					<input type="email" required name="email" id="email" class="form-control" placeholder="E-mail">
				</div>
				<div <div class="form-group">
					<label for="password">Password: </label>
					<input type="password" required name="password1" id="password" class="form-control" placeholder="Password">
				</div>
				<div <div class="form-group">
					<label for="password">Password: </label>
					<input type="password" required name="password2" id="password" class="form-control" placeholder="Password">
				</div>
				<div <div class="form-group">
					<label for="text">Name: </label>
					<input type="text" required name="name" id="name" class="form-control" placeholder="Name">
				</div>
				<div <div class="form-group">
					<label for="text">Surname: </label>
					<input type="text" required name="surname" id="surname" class="form-control" placeholder="Surname">
				</div>
		</form>
				<input type="submit" value="Utwórz konto" name="rejestruj" class="btn btn-primary btn-block">
			</fieldset>
		</form>

		<?php
		echo "<p>Today is:</p>";
		echo date("Y-m-d h:i:s");
		?>
	</div>
	
	</body>

</html>