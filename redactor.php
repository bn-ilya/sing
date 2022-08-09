<?php $favicon = 'favicon/worship.ico' ?>
<?php $title = 'Сборник песен | Редактор' ?>

<?php

include"php/head.php"; 

include"newheader.php";

$getUrl = $_SESSION['UrlGet'];
$id = $_POST['passId'];
$data = $sql->query("SELECT `name`, `id`, `author`, `popular`, `text` FROM `song attributes` WHERE `id` = '$id'");

	foreach ($data as $str) {
		$popular = $str['popular'] + 1;
		$sql->query("UPDATE `song attributes` SET `popular` = '$popular' WHERE `song attributes`.`id` = '$id'");
		$author = (int)$str['author'];
		$author = $sql->query("SELECT `name` FROM `author` WHERE `id` =  '$author' ");

		foreach ($author as $authorName) {
			$author = $authorName['name'];
?>	

<div class="redactor__wrapper">	
	<div class="redactor__intro">
		<div class="redactor__title titleLocal">Редактор песни</div>
		<div class="redactor__subtitle"><?= $str['name'] ?></div>
	</div>					
		<div class="edit__container">
			<form class="input__song" method="POST" action="edit.php">	

				<div class="form__edit">		
					<input type="text" placeholder="Название" class="input__edit" name="editname" value="<?= $str['name'] ?>">
				</div>	
				<div class="form__edit">
					<input type="text" placeholder="Автор" class="input__edit" name="editauthor" value="<?= $author ?>">
					<input type="hidden" name="authorPass" value="<?= $str['author'] ?>">
				</div>
				<div class="form__edit__text">
					<textarea class="input__edit__text" name="edittext" ><?= $str['text'] ?></textarea>
				</div>
				<input type="hidden" name="idEdit" value="<?= $str['id'] ?>">
				<div class="button__redactor">
					<div class="button__edit">	
						<input type="submit" value="Изменить" class="input__edit">
					</div>
				
					<a href="<?= $getUrl ?>" class="button__return">
						<input type="button" value="Отмена"
						name="сancel" class="input__return">
					</a>
					
				</div>

			</form>		
		</div>
</div>			
<?php
		};
	};
 ?>

 <script>  
 	// let getUrlSong = "<?php  ?>";
 	// let getCancel = document.querySelector('.input__return').onclick = function link() {document.location.href = getUrlSong}
 </script>