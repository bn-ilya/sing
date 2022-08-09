
<?php $prewiew = 'img/iconsSVG/prewfour.jpg' ?>

<?php $favicon = 'favicon/worship.ico' ?>

<?php $title = 'Сборник песен | Топ 10' ?>

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

<div class="hello__title index__text top__title__main">Топ 10 песен:</div>

<div class="top__subtitle__main">Топ составлен по кол-ву посещаемости песен.</div>

<?php 
	$data = $sql->query("SELECT `id`, `name`, `popular`, `author` FROM `song attributes` ORDER BY `song attributes`.`popular` DESC LIMIT 10 ");

	//$data = $data->fetch_assoc();
	foreach ($data as $str) {
		$author = (int)$str['author'];
		$author = $sql->query("SELECT `name` FROM `author` WHERE `id` =  '$author'  ");

		foreach ($author as $authorName) {
			$author = $authorName['name'];
		}

 ?>

	
	<?php include"php/button.php" ?>


<?php 
	} 
?>
				</div>
			</div>	
		</div>
	</div>
</div>


	
<script>
	
</script>
<?php include"php/end.php" ?>