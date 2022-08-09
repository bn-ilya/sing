<?php $favicon = 'favicon/worship.ico' ?>
<?php $title = 'Сборник песен | Поиск' ?>
<?php include"php/head.php" ?>

<?php include"php/header.php" ?>

<div class="song_text">
	<div class="container">
		<div class="textsongmain_container">
			<div class="song_column song_column_change">
				<div class="song_row">

				<div class="hat__container">
							<div class="hat__search">
								<form action="search.php" method="POST" class="search__row_border">
									<div class="search__box">
  										<input name="search" type="text" placeholder="Найти песню" class="search">
  										<div class="search__button">
  										<button type="submit"><img src="img/iconsSVG/search.svg" alt="" width="15px" height="15px"></button>
  										</div>
  									</div>
	  						
								</form>
							</div>

					</div>	

<div class="hello__title index__text">Результат поиска:</div>

<?php 
	$text = trim($_POST["search"]);
	$text = preg_replace('|[\s]+|s', ' ', $text); //удаляем лишнии пробелы
	$query = ("SELECT `id`, `name`, `author` FROM `song attributes`");
	$nameQuery = " || ";
	//подготовка запроса
	if (is_numeric($text)) {
		$query = $query . " WHERE `id` = $text";
	} else {
		$pattern = '~(\w+)~';
		$keywords = explode(" ", $text);
 	
 		foreach ($keywords as $key => $value) {

 		if ($key == 0) {
 			$query = $query . " WHERE `text` LIKE '%$value%' ";
 			$nameQuery = $nameQuery . " `name` LIKE '%$value%' ";

 		} else {
 			$query = $query . " AND `text` LIKE '%$value%' ";
 			$nameQuery = $nameQuery . " AND `name` LIKE '%$value%' ";
 		} 
 	}

 		$query = $query . $nameQuery;

	}

 	



	//получение данных

	$result = $sql->query($query);
	foreach ($result as $str) {
	$author = (int)$str['author'];
		$author = $sql->query("SELECT `name` FROM `author` WHERE `id` =  '$author'  ");

		foreach ($author as $authorName) {
			$author = $authorName['name'];
		}
		
	include"php/button.php";
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
		xhr.open('POST', 'actualtransf.php');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.send('getName=' + userInput);
	}
</script>

<?php include"php/end.php" ?>