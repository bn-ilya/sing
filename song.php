
<?php $favicon = 'favicon/worship.ico' ?>
<?php $prewiew = 'img/iconsSVG/prewfour.jpg' ?>
<?php $title = $_GET['name']; ?>

<?php include"php/head.php"; ?>


<?php include"php/header.php"; ?>

<?php 
	$_SESSION['UrlGet'] = $_SERVER['REQUEST_URI']; 
?>		

<?php 
	
	$id = $_GET['id'];

	$data = $sql->query("SELECT `name`, `id`, `author`, `popular`, `text` FROM `song attributes` WHERE `id` = '$id'");


	foreach ($data as $str) {
		$popular = $str['popular'] + 1;
		$sql->query("UPDATE `song attributes` SET `popular` = '$popular' WHERE `song attributes`.`id` = '$id'");
		$author = (int)$str['author'];
		$author = $sql->query("SELECT `name` FROM `author` WHERE `id` =  '$author' ");

		foreach ($author as $authorName) {
			$author = $authorName['name'];
?>
<div class="popap__wrapper">	
<div class="popap__container" id="popap__edit">	
	<div class="popap">
		<div class="popap__form">
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
				<div class="button__edit">	
					<input type="submit" value="Изменить" class="input__edit">
				</div>
			</form>		
		</div>
	</div>
</div>
</div>

 <div class="song__back">
	<div class="namesong">
		<div class="container">
			<div class="textsong_container">
				<div class="namesong_column">
					<div class="namesong_row">
						<div class="namesong__block">	
							<div class="namesong_name"><?= $str['id'] . '&nbsp;' . "- " . $str['name'] ?></div>
						</div>
						<div class="namesong_author"><?= $author ?></div>
					</div>
					<?php if(isset($_SESSION['boolLog'], $_SESSION['boolPass'])) {
				if ($_SESSION['boolLog'] == true && $_SESSION['boolPass'] == true) { ?>
					<div class="edit__song">
						<!-- <input type="submit" value="Редактировать песню" class="edit__button" onclick="buttonForm(this)">
						 -->
						<form action="redactor.php" method="POST">
							<input type="hidden" name="passId" value="<?= $str['id'] ?>">
							<input type="submit" class="edit__button" value="Редактировать песню">
						</form>
						
					</div>

					<?php }; }; ?>
				</div>
			</div>
		</div>
	</div>
	
<?php
		};
	};
 ?>


<div class="container">	
<div class="textsong_container">
	<div class="change_column_chords">
		<section class="change_rows_chords">
			<input type="button" name="myButton" value="C" onclick="forButton(this)" class="up_chords"> 
			<input type="button" name="myButton" value="C#" onclick="forButton(this)" class="up_chords"> 
			<input type="button" name="myButton" value="D" onclick="forButton(this)" class="up_chords"> 
			<input type="button" name="myButton" value="D#" onclick="forButton(this)" class="up_chords"> 
			<input type="button" name="myButton" value="E" onclick="forButton(this)" class="up_chords"> 
			<input type="button" name="myButton" value="F" onclick="forButton(this)" class="up_chords">
			<input type="button" name="myButton" value="F#" onclick="forButton(this)" class="up_chords"> 
			<input type="button" name="myButton" value="G" onclick="forButton(this)" class="up_chords">
			<input type="button" name="myButton" value="G#" onclick="forButton(this)" class="up_chords"> 
			<input type="button" name="myButton" value="A" onclick="forButton(this)" class="up_chords">
			<input type="button" name="myButton" value="A#" onclick="forButton(this)" class="up_chords"> 
			<input type="button" name="myButton" value="H" onclick="forButton(this)" class="up_chords">	
		</section>
	</div>

	<div class="block_show_chords">
				<input type="button" name="hideChords" value="Скрыть аккорды" onclick="hideChords(this)" class="show_chords">
				<div class="fonts_change">
				<input type="button" name="FontsUp" value="" onclick="fontChange(this)" class="fonts_up">
				<input type="button" name="FontsDown" value="" onclick="fontChange(this)" class="fonts_down">
				</div>

	</div>


	<div class="textsong_column">
		<div class="textsong_rows">

<?php 

	function thisIsChords($str) {
		if (strpos($str, 'C') !== false) { 
			return true;
		}

		if (strpos($str, 'D') !== false) { 
			return true;
		}
 
		if (strpos($str, 'E') !== false) { 
			return true;
		}

		if (strpos($str, 'F') !== false) { 
			return true;
		}

		if (strpos($str, 'G') !== false) { 
			return true;
		}

		if (strpos($str, 'A') !== false) { 
			return true;
		}

		if (strpos($str, 'H') !== false) { 
			return true;
		}

		if (strpos($str, 'B') !== false) { 
			return true;
		}

		return false;
	}

	function thisIsInfo($str) {
		if (strpos($str, '#') !== false) {
			return true;
		}

		return false;
	};



$data = $sql->query("SELECT `name`, `id`, `author`, `text` FROM `song attributes` WHERE `id` = '$id'");
	$data = $data->fetch_assoc();
	$keywords = explode("\n", $data['text']);
	
	foreach ($keywords as $key => $value) {
		
		if (thisIsChords($value) == true) { ?>
			<p id="cords_<?=$key?>" class="chords"> <?=$value?> </p>
		<?php

		} else if (thisIsInfo($value)) { ?>
			
			<p id="info_<?=$key?>" class="info"> <?=$value?>
			<?php

		} else { ?>
			<p id="string_<?=$key?>" class="text_song"> <?=$value?>
	<?php	
		}
	?>
<?php 
} 
?>
</div>
	</div>
</div>
</div>
</div>
	<script>

	let getPopap = document.getElementById('popap__edit')

	function buttonForm(button) {
		getPopap.style.overflow = 'visible';
	
	}


	let fontSize = 14;
		function fontChange(button) {

			if (button.name == "FontsUp") {
			fontSize = fontSize + 2;
			} else {
			fontSize = fontSize - 2;
			}

			if (fontSize > 22) {
				fontSize = 22;
			}

			if (fontSize < 10) {
				fontSize = 10;
			}

			for(let j = 0; j<100; j++) {

    			let div = document.getElementById("cords_" + j);
    			if(div != null) {
    			div.style.fontSize = fontSize + "px";   
    			}

    			let divOne = document.getElementById("string_" + j);
    			if(divOne != null) {
    			divOne.style.fontSize = fontSize + "px";   
    			}    			

    			let divTwo = document.getElementById("info_" + j);
    			if(divTwo != null) {
    			divTwo.style.fontSize = fontSize + "px";   
    			}
    		}
    	}


    	let showChords = true;

    	function hideChords(button) {
    		if (showChords == true) {
    			button.value = 'Показать аккорды';
    		for(let j = 0; j<100; j++) {
    			let div = document.getElementById("cords_" + j);
    			if(div != null) {
    					div.classList.add("hide");
    			}
    		} 
    		showChords = false;

    		} else {
    			
    			for(let j = 0; j<100; j++) {
    				button.value = 'Скрыть аккорды';
    				let div = document.getElementById("cords_" + j);
    				if(div != null) {
    					div.classList.remove("hide");
    			}
    		showChords = true;
    		}
    	}


    		



    		
    	}

    	function forButton(button){
    		var tone = getTone();
    		while(tone != button.value) {
    			for(let i = 0; i<100; i++){
    	   		//console.log(i);
	    	   	var div = document.getElementById("cords_" + i); 
				if(div != null){
					div.innerHTML = div.innerHTML.replace(/C#/g,"ПростоРе");
					div.innerHTML = div.innerHTML.replace(/D#/g,"ПростоМи");
					div.innerHTML = div.innerHTML.replace(/F#/g,"ПростоСоль");    	   	
					div.innerHTML = div.innerHTML.replace(/G#/g,"ПростоЛя");
					div.innerHTML = div.innerHTML.replace(/A#/g,"ПростоСи");

					div.innerHTML = div.innerHTML.replace(/C/g,"ДоДиез");
					div.innerHTML = div.innerHTML.replace(/D/g,"РеДиез");			
					div.innerHTML = div.innerHTML.replace(/E/g,"ПростоФа");
					div.innerHTML = div.innerHTML.replace(/F/g,"ФаДиез");			
					div.innerHTML = div.innerHTML.replace(/G/g,"СольДиез");			
					div.innerHTML = div.innerHTML.replace(/A/g,"ЛяДиез");
					div.innerHTML = div.innerHTML.replace(/H/g,"ПростоДо");			
					

					div.innerHTML = div.innerHTML.replace(/ДоДиез/g,"C#");
					div.innerHTML = div.innerHTML.replace(/РеДиез/g,"D#");
					div.innerHTML = div.innerHTML.replace(/ФаДиез/g,"F#");
					div.innerHTML = div.innerHTML.replace(/СольДиез/g,"G#");
					div.innerHTML = div.innerHTML.replace(/ЛяДиез/g,"A#");

					div.innerHTML = div.innerHTML.replace(/ПростоДо/g,"C");
					div.innerHTML = div.innerHTML.replace(/ПростоРе/g,"D");
					div.innerHTML = div.innerHTML.replace(/ПростоМи/g,"E");
					div.innerHTML = div.innerHTML.replace(/ПростоФа/g,"F");
					div.innerHTML = div.innerHTML.replace(/ПростоСоль/g,"G");
					div.innerHTML = div.innerHTML.replace(/ПростоЛя/g,"A");
					div.innerHTML = div.innerHTML.replace(/ПростоСи/g,"H");  
					tone = getTone();
					}
				}  	
    		}
    	   	
		}

		function getTone() {
				for(let i = 0; i<100; i++){
	    	   		//console.log(i);
		    	   	var div = document.getElementById("cords_" + i); 
					if(div != null){
						let strokeChords = div.innerText;
						let minimumPosition = 10000;
						let arr = new Array(strokeChords.indexOf("C"), //56
						                    strokeChords.indexOf("D"), //-1
						                    strokeChords.indexOf("E"), //26
						                    strokeChords.indexOf("F"), //-1
						                    strokeChords.indexOf("G"), //32
						                    strokeChords.indexOf("A"), //-1
						                    strokeChords.indexOf("H")  //44                
						                   );

						for (let i = 0; i < arr.length; i++){

						   if (arr[i]>=0 && arr[i] < minimumPosition){
						           minimumPosition = arr[i];
						    }
						}


						if(strokeChords.slice(minimumPosition+1, minimumPosition+2) == "#"){
						    return (strokeChords.slice(minimumPosition, minimumPosition+1) + "#"); 
						} else {
						    return (strokeChords.slice(minimumPosition, minimumPosition+1)); 
						}		
					return null
				}
			}
		}

    </script>


<?php include"php/end.php" ?>

















