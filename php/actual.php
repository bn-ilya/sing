<?php include"php/head.php" ?>

<?php include"php/header.php" ?>

<div class="song_text">
	<div class="container">
		<div class="textsong_container">
			<div class="song_column">
				<div class="song_row">





<?php 
	
	

	//получение данных

	$result = $sql->query("SELECT `id` FROM `actual`");
	foreach ($result as $str) {

	print_r($str);
	$idActual = $str['id'];
	$resultSong = $sql->query("SELECT `id`, `name`, `author` FROM `song attributes` WHERE `id` = '$idActual'");
	foreach ($resultSong as $value) {
		
	

	$author = (int)$value['author'];
		$author = $sql->query("SELECT `name` FROM `author` WHERE `id` =  '$author'  ");

		foreach ($author as $authorName) {
			$author = $authorName['name'];
		}
		
	include"php/button.php";

		}
	}
?>

				</div>
			</div>	
		</div>
	</div>
</div>

<?php include"php/end.php" ?>