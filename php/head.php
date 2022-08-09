
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="css/main.css?v4" >
    <link rel="stylesheet" href="css/fonts.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/media.css">
    <script src="js/commom.js"></script>
    <link rel="shortcut icon" href="<?=$favicon?>">
    <title><?=$title?></title>
    <meta property="og:title" content="Сборник поклонения">
	<meta property="og:description" content="Поём сегодня">
    <meta property="og:image" content="img/iconsSVG/prewfour.jpg">
<?php
 	$sql = new mysqli('localhost', 'root', 'robokop67', 'song');
 ?>

</head>
 
<body>

    <?php 
        session_start();
    ?>