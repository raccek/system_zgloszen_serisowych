<?php

	session_start();
	
	if ((!isset($_POST['email'])) || (!isset($_POST['password'])))
	{
		header('Location: index.php');
		exit();
	}

	$userip = $_SERVER['REMOTE_ADDR'];

	require_once "conection.php";

	$polaczenie = @new mysqli($host, $user, $pass, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$email = htmlentities($email, ENT_QUOTES, "UTF-8");
		$password = htmlentities(sha1($password), ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM user WHERE email='%s' AND password='%s'",
		mysqli_real_escape_string($polaczenie,$email),
		mysqli_real_escape_string($polaczenie,$password))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;

				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['login'] = $wiersz['login'];
				$_SESSION['name'] = $wiersz['name'];
				$_SESSION['surname'] = $wiersz['surname'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['rejestracja'] = $wiersz['rejestracja'];
				$_SESSION['logowanie'] = $wiersz['logowanie'];
				$_SESSION['ip'] = $wiersz['ip'];
				
				unset($_SESSION['blad']);
				$rezultat->free_result();
				
				$sql = "UPDATE user SET logowanie=NOW(), ip='$userip' WHERE email='$email'";
				if ($polaczenie->query($sql) === TRUE){
				    header('Location: adminlog.php');
				} else {
				    echo "Error updating record: " . $conn->error;
				}

				
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red; font-size: 25px;">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>