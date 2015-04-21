<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">

		function start(){
			function onFileSelected(event){
				//check if File API is supported
				if(window.File){
					//get the file from the element that triggered the event
					var file = event.target.files[0];
					//check if file exists
					if(file){
						//create FileReader object to read contents of the File
						var fr = new FileReader();
						fr.onload = function(e){
							var contents = e.target.result;
							document.getElementById("ta_original").innerHTML = contents;
						}
					}else{
						alert("no file");
					}
					fr.readAsText(file);
				}else{
					alert("File API not supported");
				}
			}
			document.getElementById('file').addEventListener('change', onFileSelected, false);
			}
		window.onload = start;
	</script>

	<?php 
		if(!empty($_POST)){
			include 'translate.php';
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
			<input type="file" id="file" value="Browse">
		</form>
		<hr/>
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
				<input type="submit" form="mainForm" value="Translate">
			</div>
		
	</div>

	<div class="footer">
		<a href="http://translate.yandex.com">Powered by Yandex.Translate</a>
	</div>
</body>
</html>