

<?php $favicon = 'favicon/worship.ico' ?>

<?php $title = 'Сборник песен | ХМК KVK' ?>

<?php include"php/head.php" ?>

<div class="popap__container" id="popap">	
<div class="popap">	
		
	<div class="popap__form">	
		<form action="php/authorization.php" class="form__authorization" method="post">
			<input type="submit" class="form__close" value="X" onclick="closeForm(this)">
			<div class="form__block">
				<input type="text" class="form__name"  name="login">
			</div>
			
			<div class="form__block">
				<input type="password" class="form__password" name="password">
			</div>
			<input type="submit" class="form__submit" value="Войти">
		</form>
	</div>
	
</div>
</div>

<?php include"php/header.php" ?>

<?php 
	$_SESSION['UrlGet'] = $_SERVER['REQUEST_URI']; 
?>		

<header class="hat"> 
			<div class="container">
				<div class="hat__menu">

					<!--<a href="../index.php"><div class="hat_back">назад</div></a>-->
					<div class="hat__container">
						

						<div class="hat__search hat__search__one">
								<form action="search.php" method="POST" class="search__row">
									<div class="search__box">
  										<input name="search" type="text" placeholder="Найти песню" class="search">
  										<div class="search__button">
  										<button type="submit"><img src="img/iconsSVG/search.svg" alt="" width="15px" height="15px"></button>
  										</div>
  									</div>
								</form>
						</div>
						

						<div class="header__burger burgerHidden">
									<span></span>
						</div>

								
							<div class="hello">
								<div class="hello__intro">
									<div class="hello__column">	
									<div class="hello__block block__one">	
											<div class="hello__title">Сборник для тебя</div>
									</div>

									<div class="hello__block block__two">
											<div class="hello__subtitle">Аккорды, текста, аудио, много простых, но удобных вещей. Поклонимся Творцу!</div>
									</div>
									</div>
								</div>
							</div>

							<div class="user__button">
								<a href="actual.php" style="outline: none" class="actual__intro">
										<div class="actual__column">
											<div class="actual__icon hello__block block__margin"><img src="img/iconsSVG/time.svg" alt="" width="20px" height="20px"></div>
											<div class="actual__container">
												<div class="hello__block block__actual">
													<div class="hello__title">Поём сегодня</div>
												</div>

												<div class="hello__block block__hide">
													<div class="hello__subtitle">Подборка актуальных песен на сегодня</div>
												</div>
											</div>
										</div>
								</a>

								<a href="top.php" class="top__intro">
										<div class="top__column">
											<div class="top__title">10</div>
											<div class="top__subtitle">ТОП</div>
										</div>	
								</a>

								
							</div>
							
					</div>	
				</div>
			</div>
		</header>


<div class="song_text">
	<div class="container">
	<div class="textsongmain_container">
		<div class="song_column song_column_change">
			<div class="song_row">

	<div class="hello__title index__text">Все песни</div>

	

<?php

	$data = $sql->query("SELECT `name`, `id`, `author` FROM `song attributes`");

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
	//Кнопка открытия формы авторизации (header.php -> authorization__botton)
	let getPopap= document.getElementById('popap');

	function buttonForm(button) {
		getPopap.style.overflow = 'visible';
	
	}

	//Кнопка закрытия формы авторизации (index.php ->)

	function closeForm(button) {
		getPopap.style.overflow = 'hidden';
	}

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

	// document.forms.actualTransf<?= $str['id'] ?>.onsubmit = function(e) {
	// e.preventDefault();
	// let userInput = document.forms.actualTransf.idActual.value;

	// let xhr = new XMLHttpRequest();
	// xhr.open('POST', 'actualtransf.php');
	// xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	// xhr.send('idActual' + userInput);	
	// };




</script>
<?php include"php/end.php" ?>