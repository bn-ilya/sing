<?php 	
	$sql = new mysqli('localhost', 'root', 'robokop67', 'song');
	$input = $_POST['getName'];
	$checkInput = $sql->query("SELECT `num` FROM `actual` WHERE `num` = '$input'"); 
	$row = $checkInput->fetch_assoc();
	$checkTransl = $row['num'];
	if ($checkTransl == $input) {
		exit();
	} else {
		$sendActual = $sql->query("INSERT INTO `actual` (`num`) VALUES ('$input')");
	};	
?>

