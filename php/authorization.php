<?php 
	session_start();

	header("Location: ../index.php");
	//получение и обработка данных

	$getLogin = $_POST['login'];
	$getPassword = $_POST['password'];

	$formLogin = "max";
	$formPassword = "perdun";

	$_SESSION['boolLog'] = false;
	$_SESSION['boolPass'] = false;

	// setcookie("boolLog", false, time() + 3600);
	// setcookie("boolPass", false, time() + 3600);

	if ($getLogin == $formLogin && $getPassword == $formPassword) {
		$_SESSION['boolLog'] = true;
		$_SESSION['boolPass'] = true;
	};

?>