<?php $favicon = 'favicon/worship.ico' ?>
<?php $title = 'Сборник песен | Войти' ?>

<?php include"php/head.php" ?>

<?php include"php/header.php" ?>

<div class="login login_position">
	<div class="login__body">
		<div class="container-phone">
			<form class="login__form" action="php/authorization.php" method="POST">
				<div class="login__item">
						<div class="login__title title">Логин:</div>
						<div class="input">
							<input class="input-field title" type="text" name="login">
						</div>
				</div>
				<div class="login__item">
						<div class="login__title title">Пароль:</div>
						<div class="input">
							<input class="input-field title" type="password" name="password">
						</div>
				</div>
				<div class="login__button">
					<input class="login__submit title" type="submit">
				</div>
			</form>
		</div>
	</div>	
</div>