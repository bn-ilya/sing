
<div class="button__container" id="button__containers<?= $str['id'] ?>">
	<form method="GET" action="song.php" class="button__song"<?= $str['id'] ?> onsubmit="sessionTrue(this)">
		<input type="hidden" name="id" value="<?= $str['id'] ?>">
	<button type="submit" class="song_block" name="<?= $str['id'] ?>" onmouseover="coloringButton(this)" onmouseout="unColoringButton(this)">
		<div class="song_stroke" >
			<div class="song_num" id="songs_stroke<?= $str['id'] ?>"><?= $str['id'] ?></div>
			<div class="song_namecontainer">
				<div class="song_name" name="name"><?= $str['name'] ?></div>
				<div class="song_author"><?= $author ?></div>
			</div>
		</div>
		
	</button>
	<input name="name" value="<?= $str['name'] ?>" type="hidden">
	</form>

	<?php 
			if(isset($_SESSION['boolLog'], $_SESSION['boolPass'])) {
				if ($_SESSION['boolLog'] == true && $_SESSION['boolPass'] == true) { ?>
					<form action="index.php" name="actualTransf<?= $str['id'] ?>">
						<input type="submit" class="add__actual" value="X" name="<?= $str['id'] ?>" onclick="getButton(this)">
						 <input type="hidden" name="idActual" value="<?= $str['id'] ?>">
					</form>
	<?php };}; ?>

</div>

<script>

		function coloringButton(button) {
			
			let NumBackgraund = document.getElementById("songs_stroke" + button.name).style;
			NumBackgraund.background = '#8fa282';
			NumBackgraund.color = 'white';
			}
    		
    	function unColoringButton(button) {
			
    		let NumBackgraund = document.getElementById("songs_stroke" + button.name).style;
			NumBackgraund.background = '#f9f9f9';
			NumBackgraund.color = 'black';
			}

		function sessionTrue(button) {
			<?php $_SESSION['boolUrl'] = true; ?>
		}
	
    </script>