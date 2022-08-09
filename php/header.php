

	
<div class="header"></div>
<div class="wrapper__header">
	<div class="container__header">
 		<div class="hat__container__logo">
							<div class="hat__content">
								<div class="hat__header">
										<div class="hat__item">
											<?php if ($_SERVER['REQUEST_URI'] != '/sing/' && $_SERVER['REQUEST_URI'] != '/sing/index.php') {?>
											<a href="http://hmk-life.ru/sing/"><div class="hat__back"></div></a>
											<?php }; ?>
										</div>
											
										<div class="hat__logo">
											<div class="hat__block block__center">
													<div class="hat__title">СБОРНИК
													ПОКЛОНЕНИЯ</div>
											</div>
											<div class="hat__block block__subtitle">
													<div class="hat__subtitle">Krop - Kvk</div>
											</div>
										</div>

										<div class="header__burger">
											<span></span>
										</div>
								</div>

								
								</div></div>
	</div>		</div>

	<div class="hat__container__search">
		<div class="wrapper__search">
		<div class="hat__search hat__search__two">
			<form action="search.php" method="POST" class="search__row">
				<div class="search__box">
	  				<input name="search" type="text" placeholder="Найти песню" class="search">
	  				<div class="search__button">
						<button type="submit"><img src="img/iconsSVG/search.svg" alt="" width="15px" height="15px"></button>
	  				</div>
	  			</div>
			</form>

			<div class="header__burger burgerHidden">
				<span></span>
			</div>

		</div>
					

		
		</div>	
	</div>

<nav class="header__menu">
									<div class="menu__container">
									<div class="header__container">	
									<ul class="header__list">
										<a href="http://hmk-life.ru/sing/" class="links linkOne">
											<div class="menu__icon">	
												<img src="img/music/one.svg" alt="" class="items__icon">
											</div>
											<div class="header__link">Главная</div>
										</a>

										<a href="http://hmk-life.ru/sing/actual.php" class="links linkTwo">
											<div class="menu__icon">	
												<img src="img/music/two.svg" alt="" class="items__icon">
											</div>
											<div class="header__link">Поём сегодня</div>
										</a>

										<a href="http://hmk-life.ru/sing/top.php" class="links linkThree">
											<div class="menu__icon">	
												<img src="img/music/three.svg" alt="" class="items__icon">
											</div>
											<div class="header__link">Топ 10</div>
										</a>

										<a href="http://hmk-life.ru/sing/login.php" class="links linkFour">
											<!-- <div class="menu__icon">	
												<img src="img/music/one.svg" alt="" class="items__icon">
											</div> -->
											<div class="header__link">Войти</div>
										</a>

										<?php if (isset($_SESSION['boolLog'])) {
											if ($_SESSION['boolLog'] = true) {
										?>
										<a href="http://hmk-life.ru/sing/admin.php" class="links linkFive">
											<div class="header__link">Кабинет Админа</div>
										</a>
										<?php }}?>
									</ul>
									</div>
									</div>	
									</nav>

<script>
	let classBurger = document.querySelector('.header__burger');
	let classMenu = document.querySelector('.header__menu');
	let body = document.body;
	let classBurgerTwo = document.querySelector('.burgerHidden');
	let containerHeader = document.querySelector('.container__header');

	let hatBool = false // *переменная для проверки смены меню

	classBurgerTwo.onclick = () => {
		classBurgerTwo.classList.toggle('active');
		document.querySelector('.search__row').classList.toggle('hidesearch')
		document.querySelector('.header__burger').classList.toggle('header__burger_hide')
		classMenu.classList.toggle('active');
		body.classList.toggle('lock');
		containerHeader.classList.toggle('.container__header_position');
		document.querySelector('.header').classList.toggle('header_active');
		//Стилизация шапки
		document.querySelector('.hat__title').textContent = "Меню"
		//Смена СБОРНИК на Меню
		if (hatBool == true) {
			hatBool = false
		} else {
			hatBool = true
		} 
		// если до клика hatbool была правда, то меняется на ложь
		//Изменить вид title 
		document.querySelector('.hat__title').classList.toggle('hat__title_change');
		if (hatBool == true) {
		document.querySelector('.hat__title').textContent = "Меню"
		}
		if (hatBool == false) {
			document.querySelector('.hat__title').textContent = "СБОРНИК ПОКЛОНЕНИЯ"
		}
	}

	classBurger.onclick = () => {
		classBurger.classList.toggle('active');
		classMenu.classList.toggle('active');
		body.classList.toggle('lock');
		containerHeader.classList.toggle('.container__header_position');

		//Стилизация шапки
		//Смена СБОРНИК на Меню
		if (hatBool == true) {
			hatBool = false
		} else {
			hatBool = true
		} 
		// если до клика hatbool была правда, то меняется на ложь
		if (hatBool == true) {
		document.querySelector('.hat__title').textContent = "Меню"
		}
		if (hatBool == false) {
			document.querySelector('.hat__title').textContent = "СБОРНИК ПОКЛОНЕНИЯ"
		}
		//Удалить все иконки слева 
		if (document.querySelector('.hat__back') !== null) {
		document.querySelector('.hat__back').classList.toggle('hat__back_hide');
		}
		//Изменить вид title 
		document.querySelector('.hat__title').classList.toggle('hat__title_change');
		//Удаление krop-kvk
		document.querySelector('.block__subtitle').classList.toggle('block__subtitle_hide');
		//Изменить вид плашки (header)
		document.querySelector('.header').classList.toggle('header_active');
	};	

	// настройка шапки при скролее
	window.addEventListener('scroll', () => {
		if (pageYOffset > 70) {
			//изменение вида шапки при скролле
			// document.querySelector('.hat__search__one').style.display = "none"; //Срытие основного поиска
			document.querySelector('.hat__search__two').classList.add('two__search');
			// document.querySelector('.search__row').classList.add('hidesearch')
			document.querySelector('.wrapper__search').classList.add('onScroll');
			document.querySelector('.burgerHidden').style.display = 'block';	
			//убираю  авторизацию и название
			document.querySelector('.hat__logo').style.display = 'none';
			document.querySelector('.header__burger').style.display = 'none';
			// document.querySelector('.header__burger').style.display = 'none';
			//перемещаю всё в право
			let gHeader = document.querySelector('.hat__content').classList.add('headerScroll');
			//прячу основной бургкр
			// document.querySelector('.burger__one')
		} else if (pageYOffset < 70) {
			// document.querySelector('.hat__search__one').style.display = "block";
			document.querySelector('.hat__search__two').classList.remove('two__search');
			document.querySelector('.wrapper__search').classList.remove('onScroll');
			document.querySelector('.burgerHidden').style.display = 'none';
			//убираю  авторизацию и название
			document.querySelector('.hat__logo').style.display = 'block';
			document.querySelector('.header__burger').style.display = 'block';
			// document.querySelector('.header__burger').style.display = 'block';
			//перемещаю всё в право
			let gHeader = document.querySelector('.hat__content').classList.remove('headerScroll');
		}
	})
	
</script>