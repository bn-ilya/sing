	<header class="hat">
			<div class="container">
				<div class="hat__menu">
					<!--<a href="../index.php"><div class="hat_back">назад</div></a>-->
					<div class="hat__container">
					<div class="hat__logo logo__song">
						
					<?php 

					if (!isset($_SESSION['boolUrl'])) {
						$_SESSION['boolUrl'] = false;
					};

					$uri = $_SERVER['REQUEST_URI'];

					if (strpos($uri, 'song.php') == true && $_SESSION['boolUrl'] == true) {?>
						<div class="hat__menu">
							<a href="actual.php">
									<img src="img/iconsSVG/arrow.svg" alt="" width="20px" height="20px">
							</a>
						</div>
					<?php } else { ?>
						<div class="hat__menu">
							<a href="">
									<img src="img/iconsSVG/menu.svg" alt="" width="20px" height="20px">
							</a>
						</div>
					<?php }; ?>

						<div class="hat__text">	
		
								<div class="hat__block block__center">
										<div class="hat__title">СБОРНИК ПОКЛОНЕНИЯ</div>
								</div>
								<div class="hat__block">
										<div class="hat__subtitle">Krop - Kvk</div>
								</div>
						</div>


						<div class="hat__back">
							<a href="../sing">
							<img src="img/iconsSVG/home.svg" alt="" width="20px" height="20px">
							</a>
						</div>

						</div>

					</div>
					<div class="hat__container">
							<div class="hat__search">
								<form action="search.php" method="POST" class="search__row">
									<div class="search__box">
  										<input name="search" type="text" placeholder="Найти песню" class="search">
  										<div class="search__button">
  										<button type="submit"><img src="img/iconsSVG/search.svg" alt="" width="15px" height="15px"></button>
  										</div>
  									</div>
	  						
								</form>
							</div>

					</div>	
				</div>
			</div>
	</header>

