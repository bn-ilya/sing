
<?php
	session_start();
	$getUrl = $_SESSION['UrlGet'];
	header("Location: $getUrl");
?>