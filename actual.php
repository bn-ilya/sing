<?php $prewiew = 'img/iconsSVG/prewfour.jpg' ?>

<?php $favicon = 'favicon/worship.ico' ?>

<?php $title = 'Сборник песен | Поём сегодня' ?>

<?php include"php/head.php" ?>

<?php include"php/header.php" ?>

<?php 
	$_SESSION['UrlGet'] = $_SERVER['REQUEST_URI']; 
?>	

<div class="song_text">
	<div class="container">
		<div class="textsongmain_container">
			<div class="song_column">
				<div class="song_row">



<div class="hello__title index__text">Мы будем петь:</div>

<?php 
	
	//получение данных

	$result = $sql->query("SELECT `num` FROM `actual`");
	foreach ($result as $strOne) {

	$idActual = $strOne['num'];
	$resultSong = $sql->query("SELECT `id`, `name`, `author` FROM `song attributes` WHERE `id` = '$idActual'");
	foreach ($resultSong as $str) {
		
	

	$author = (int)$str['author'];
		$author = $sql->query("SELECT `name` FROM `author` WHERE `id` =  '$author'  ");

		foreach ($author as $authorName) {
			$author = $authorName['name'];
		} 

	include"php/buttonactual.php";

		}
	}
?>

				</div>
			</div>	
		</div>
	</div>
</div>



<script>
	//ajax запрос


	function getButton(button) {
		event.preventDefault();
		let getName = button.name;
		let userInput = getName;

		let xhr = new XMLHttpRequest();
		xhr.open('POST', 'php/actualdelete.php');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.send('getName=' + userInput);

		let styleButtons = document.getElementById("button__containers" + getName).style;
		styleButtons.display = 'none';
	}

</script>

<?php include"php/end.php" ?>