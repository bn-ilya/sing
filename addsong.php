z
<?php $favicon = 'favicon/worship.ico' ?>
<?php $title = 'Сборник песен | Добавить песню' ?>
<?php include"php/head.php" ?>

<?php include"php/header.php" ?>


<div class="addsong">
	<div class="addsong__body">
		<div class="container-phone">
			<form action="php/addsongpr.php" class="addsong__form" method="POST">
				<div class="addsong__item">
					<div class="addsong__title title">Название:</div>
					<div class="input">
						<input type="text" class="input-field title" name="name">
					</div>
				</div>
				<div class="addsong__item">
					<div class="addsong__title title">Автор:</div>
					<div class="input"> 
						<!-- <input type="text" class="input-field title" name="author"> -->
						<?php $getAuthorFromSql = $sql->query("SELECT `id`, `name` FROM `author`"); ?>
					 <select name="select" class="input-select title">
					 	<?php 
					 		
					 		foreach ($getAuthorFromSql as $value) {
					 		$author = $value['name'];
					 		$id = $value['id'];
					 	?>
					    <option value="<?= $id ?>" class="input-select"><?= $author ?></option>
						<?php }; ?>
					</select> 
  
					</div>
				</div>
				<div class="addsong__item">
					<div class="addsong__title title">Текст:</div>
					<div class="input-writing">
						<!-- <input type="text" class="input-field title"> -->
						<textarea id="" cols="30" rows="10" class="input-area title" name="text"></textarea>
					</div>
				</div>
				<div class="addsong__button">
					<input type="submit" class="addsong__submit title" value="Добавить">
					<input type="reset" class="addsong__reset title" value="Сброс">
				</div>
			</form>
		</div>
	</div>
</div>