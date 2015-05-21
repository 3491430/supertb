<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="resources/jquery-ui-1.11.4/jquery-ui.css">
	<script src="resources/jquery-ui-1.11.4/jquery-ui.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/loadFile.js"></script>
	<script src="js/popup.js"></script>
	<script src="js/sortable.js"></script>


<!-- Reset Button -->
<!-- ================================================= -->
	<script type="text/javascript">
		$(document).ready(function(){
			//Add click event to reset button
			$('input[value="Reset"]').click(function(){
				document.getElementById("ta_original").innerHTML = "";
				document.getElementById("ta_translated").innerHTML = "";
				//document.getElementById("langList").val('Select a language');
			});

			//Enable the Save button when the translated area has a change
			$("#ta_translated").change(function(){
				$("#save").prop('disabled', false);
			});


			//SAVE BUTTON
			$('#save').click(function(){
				var div_translation = $('#div_translated').html();
				$('#div_translation').val(div_translation);
			});
		})
	</script>
<!-- ================================================= -->
</head>
<body>
	<div class="header">
		<h1>Translate</h1>
		<hr/>		
	</div>

	<!-- POPUP -->
	<!-- ================================= -->
	<div class='popup'>
		<span class="close">X</span>
		<br/>
		<ul id="wordList">
			
		</ul>
	</div>
	<!-- ================================== -->

	<div class="content">


<!-- Translate when form is validated -->
<!-- ================================================= -->
	<?php
	//Check if tranlate button is clicked
		if(isset($_POST['submit'])){
			//Check language is selected
			if($_POST['langList'] == "Select a language"){
				echo "Choose a language </br>";
			}
			//Check file is selected
			if(empty($_POST['file'])){
				echo "Select a file";
			}

			//If a file and language are selected then add the following php files
			if($_POST['langList'] != "Select a language" && !empty($_POST['file'])){
				include 'config.php';
				include 'detect.php';
				include 'translate.php';
			}
		//Check if Save button is clicked
		}elseif(isset($_POST['save'])){
			include 'saveFile.php';
		}
	?>
<!-- ====================================================== -->
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST" id="mainForm">
			<input type="reset" value="Reset">
			<input type="file" id="file" name="file">
			<input type="hidden" id="filename" name="filename" value="<?php echo $_POST['file'] ?>">
			<input type="hidden" id="detectedLang" name="detectedLang" value="<?php echo $detectedLanguage; ?>" >
			<input type="hidden" id="div_translation" name="div_translation">

			<hr/>
			<div class="droplist">
				Translate to:
				<?php 
					//populate drop list with languages
					$json = '{"ar":"Arabic","az":"Azerbaijani","be":"Belarusian","bg":"Bulgarian","bs":"Bosnian","ca":"Catalan","cs":"Czech","da":"Danish","de":"German","el":"Greek","en":"English","es":"Spanish","et":"Estonian","fi":"Finnish","fr":"French","he":"Hebrew","hr":"Croatian","hu":"Hungarian","hy":"Armenian","id":"Indonesian","is":"Icelandic","it":"Italian","ja":"Japanese","ka":"Georgian","ko":"Korean","lt":"Lithuanian","lv":"Latvian","mk":"Macedonian","ms":"Malay","mt":"Maltese","nl":"Dutch","no":"Norwegian","pl":"Polish","pt":"Portuguese","ro":"Romanian","ru":"Russian","sk":"Slovak","sl":"Slovenian","sq":"Albanian","sr":"Serbian","sv":"Swedish","th":"Thai","tr":"Turkish","uk":"Ukrainian","vi":"Vietnamese","zh":"Chinese"}';
					$langArr = json_decode($json, true);
					$keys = array_keys($langArr);
					$i = 0;

					echo "<select id='langList' name='langList' form='mainForm'>";
		
					echo "<option>Select a language</option>";

					//loop through the languages array
					foreach($langArr as $lang){
						//if the POST variable exists then check against the languages array and have it selected
						 if($_POST['langList'] == $keys[$i]){
							echo "<option selected value='".$keys[$i]."'>".$lang."</option>";
						 }else{
						 //otherwise just populate the drop list
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
				<!-- <textarea id="ta_translated" form="mainForm" name="ta_translated"><?php //if(!empty($_POST)){if(isset($translated)){echo $translated;}else{echo $_POST['ta_translated'];}} ?></textarea> -->
				<div id="div_translated">
					<?php 
						if(!empty($_POST['div_translation'])){
							echo $_POST['div_translation'];
						}
					?>
					<ul id="sortable">
						<?php if(!empty($_POST)){if(!empty($translation_arr)){foreach($translation_arr as $index => $value){echo "<pre><li id='translationarr'><span id="."word-".$index.">".$value." "."</span></li></pre>";}}elseif(!empty($translated)){echo $translated;}elseif(isset($translated_arr)){foreach($translated_arr as $index => $value){echo "<pre><li id='translationarr'><span id="."word-".$index.">".$value." "."</span><li></pre>";}}} ?>
					</ul>
				</div>
			</div>
			<div class="right">
				<input type="submit" id="save" name="save" form="mainForm" value="Save">
				<input type="submit" id="submit" name="submit" form="mainForm" value="Translate">
			</div>
		
	</div>

	<div class="footer">
		<a href="http://translate.yandex.com">Powered by Yandex.Translate</a>
	</div>
	<?php 
		//echo "POST array";
		echo "<pre>";
		//print_r($_POST); 
		echo "</pre>";
	?>
	
</body>
</html>