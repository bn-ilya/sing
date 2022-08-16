<?php
	include "dbconn.php";
	$input = $_POST['getName'];
	$sendActual = $sql->query("DELETE FROM `actual` WHERE `actual`.`num` = '$input'");
?>