<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/loadFile.js"></script>

	<?php 
		if(!empty($_POST['submit'])){
			if($_POST['langList'] == "Select a language"){
				echo "Choose a language";
			}else{
				//include 'apikey/detect.php';
				//include 'apikey/translate.php';
			}
		}
	?>
</head>
<body>
	<div class="header">
		<h1>Home</h1>
		<hr/>		
	</div>


	<div class="content">
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" id="mainForm">
			<input type="reset" value="Reset">
			<input type="file" id="file" name="file">
			<hr/>
			<div class="droplist">
				Translate to:
				<?php 
				//populate drop list
					$json = '{"ar":"Arabic","az":"Azerbaijani","be":"Belarusian","bg":"Bulgarian","bs":"Bosnian","ca":"Catalan","cs":"Czech","da":"Danish","de":"German","el":"Greek","en":"English","es":"Spanish","et":"Estonian","fi":"Finnish","fr":"French","he":"Hebrew","hr":"Croatian","hu":"Hungarian","hy":"Armenian","id":"Indonesian","is":"Icelandic","it":"Italian","ja":"Japanese","ka":"Georgian","ko":"Korean","lt":"Lithuanian","lv":"Latvian","mk":"Macedonian","ms":"Malay","mt":"Maltese","nl":"Dutch","no":"Norwegian","pl":"Polish","pt":"Portuguese","ro":"Romanian","ru":"Russian","sk":"Slovak","sl":"Slovenian","sq":"Albanian","sr":"Serbian","sv":"Swedish","th":"Thai","tr":"Turkish","uk":"Ukrainian","vi":"Vietnamese","zh":"Chinese"}';
					$langArr = json_decode($json, true);
					$keys = array_keys($langArr);
					$i = 0;

					echo "<select id='langList' name='langList' form='mainForm'>";
		
					echo "<option>Select a language</option>";

					foreach($langArr as $lang){
						if($_POST['langList'] == $keys[$i]){
							echo "<option selected value='".$keys[$i]."'>".$lang."</option>";
						}else{
							echo "<option value='".$keys[$i]."'>".$lang."</option>";
						}
						$i++;
					}
					echo "</select>";
				?>
			</div>
		</form>
			<br />
			<div class="original">
				<strong>Original</strong>
				<br />
				<textarea id="ta_original" form="mainForm" name="ta_original" readonly><?php if(!empty($_POST)){ echo $_POST["ta_original"];} ?></textarea>				
			</div>

			<div class="translated">
				<strong>Translated</strong>
				<br />
				<textarea id="ta_translated" form="mainForm" name="ta_translated"><?php if(!empty($_POST)){ echo $translated;} ?></textarea>
			</div>
			<div class="right">
				<input type="submit" id="submit" name="submit" form="mainForm" value="Translate">
			</div>
		
	</div>

	<div class="footer">
		<a href="http://translate.yandex.com">Powered by Yandex.Translate</a>
	</div>
</body>
</html>