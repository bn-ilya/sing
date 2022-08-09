<?php 	
	include "php/dbconn.php";
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

