<?php 
	include"head.php";
	header("Location:/sing/");

	$getFormName = $_POST['name'];
	$getFormAuthor = $_POST['select'];
	$getFormText = $_POST['text'];

	$addToBase = $sql->query("INSERT INTO `song attributes` (`id`, `name`, `text`, `author`, `popular`) VALUES (NULL, '$getFormName', '$getFormText', '$getFormAuthor', '');");
?>