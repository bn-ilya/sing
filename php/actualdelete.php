<?php
	$input = $_POST['getName'];
	$sql = new mysqli('localhost', 'root', 'robokop67', 'song');
	$sendActual = $sql->query("DELETE FROM `actual` WHERE `actual`.`num` = '$input'");
?>