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
	 
	if (isset($_POST['zgloszenie']))
	{
		// dane do tabeli  -  dane_klienta
		$imie = filtruj($_POST['imie']);
		$nazwisko = filtruj($_POST['nazwisko']);
		$telefon = filtruj($_POST['telefon']);
		$email = filtruj($_POST['email']);
		$kod_pocztowy = filtruj($_POST['kod_pocztowy']);
		$miejscowosc = filtruj($_POST['miejscowosc']);
		$ulica = filtruj($_POST['ulica']);
		$nr_domu = filtruj($_POST['nr_domu']);
		$nr_mieszkania = filtruj($_POST['nr_mieszkania']);
		$data_dodania = filtruj($_POST['data_dodania']);
	   	$ip = filtruj($_SERVER['REMOTE_ADDR']);

	   	// dane do tabeli  -  zgloszenia
		$marka = filtruj($_POST['marka']);
		$model = filtruj($_POST['model']);
		$numer_seryjny = filtruj($_POST['numer_seryjny']);
		$opis_usterki = filtruj($_POST['opis_usterki']);
		$przyjety_sprzet = filtruj($_POST['przyjety_sprzet']);
		$data_przyjęcia = filtruj($_POST['data_przyjęcia']);
		$data_dodania = filtruj($_POST['data_dodania']);
		$data_modyfikacji = filtruj($_POST['data_modyfikacji']);
		// $user_id = filtruj($_POST['user_id']);
		$user_id = '1';
		// wyliczanie numeru zgłoszenia
			$rok=date(Y);
			$miesiac=date(m);
			$new_id=0;
			$last_id=mysql_query("SELECT `id` FROM `zgloszenia` ORDER BY id DESC LIMIT 1");
			$next_id=mysql_fetch_assoc($last_id);
			$new_id=$next_id['id'] + 1;

			// echo "last id ".$next_id['id']."<br />";
			// echo "new id ".$new_id."<br />";
		$nr_zgloszenia = $rok."/".$miesiac."/".$new_id;
			// echo $nr_zgloszenia;


		
	   	mysql_query("INSERT INTO `dane_klienta` (`imie`, `nazwisko`, `telefon`, `email`, `kod_pocztowy`, `miejscowosc`, `ulica`, `nr_domu`, `nr_mieszkania`, `data_dodania`, `ip`)
	            VALUES ('".$imie."', '".$nazwisko."', '".$telefon."', '".$email."', '".$kod_pocztowy."', '".$miejscowosc."', '".$ulica."', '".$nr_domu."', '".$nr_mieszkania."', '".date("Y-m-d h:i:s")."', '".$ip."');");

	    mysql_query("INSERT INTO `zgloszenia` (`nr_zgloszenia`, `marka`, `model`, `numer_seryjny`, `opis_usterki`, `przyjety_sprzet`, `data_przyjecia`, `data_dodania`, `data_modyfikacji`, `user_id`, `ip`)
	            VALUES ('".$nr_zgloszenia."', '".$marka."', '".$model."', '".$numer_seryjny."', '".$opis_usterki."', '".$przyjety_sprzet."', '".date("Y-m-d h:i:s")."', '".date("Y-m-d h:i:s")."', '".date("Y-m-d h:i:s")."', '".$user_id."', '".$ip."');");
	 	
			// mysql_query($insert1,$insert2);
	           
			echo mysql_error();
	      	
	         // header('Location: serwis.php');
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>AleSerwis - Przyjęte zgłoszenie</title>
</head>
<body>
<?php include 'header.php'; ?>

	<h1> Przyjęto zgłoszenie nr <?php echo $nr_zgloszenia; ?></h1>
	Imię: <?php echo $imie; ?> , Nazwisko <?php echo $nazwisko; ?> , Telefon <?php echo $telefon; ?> , E-mail <?php echo $email; ?> <br />

	<br />
	<br />
	<br />
	<a href="wydruk_przyjetego_zgloszenia.php" target="_blank">wydruk zgłoszenia</a> |
	<a href="serwis.php">Zapisz zgłoszenie</a> |
	<a href="">Edytuj zgłoszenie</a>

	

<?php include 'footer.php'; ?>
</body>
</html>