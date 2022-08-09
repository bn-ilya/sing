
<?php 
	session_start();
	$getUrl = $_SESSION['UrlGet'];
	header("Location: $getUrl");

	
		if (isset($_POST['edittext'])) {
		include "php/dbconn.php";
		$changeText = $_POST['edittext'];	
		$changeName = $_POST['editname'];
		$changeAuthor = $_POST['editauthor'];
		$idEdit = $_POST['idEdit'];
		$getAuthor = $_POST['authorPass'];
		$sql->query("UPDATE `song attributes` SET `text` = '$changeText', `name` = '$changeName' WHERE `id` = 	'$idEdit'");	
	
			$sql->query("UPDATE `author` SET `name` = '$changeAuthor'	 WHERE `id` = '$getAuthor'");	
	
		};		
?>