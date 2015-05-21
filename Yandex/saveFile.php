<?php
	require_once "connect.php";
	//information to save

	//FILENAME
	$filename_ext = explode(".", $_POST['filename']);
	$filename = $filename_ext[0];
	echo "Filename: ".$filename;
	echo "<br/>";

	//ORIGINAL TEXT
	$originalText = $_POST['ta_original'];
	echo "Original: ".$originalText;
	echo "<br/>";

	//LANG FROM
	$langFrom = $_POST['detectedLang'];
	echo "From: ".$langFrom;
	echo "<br/>";


	//TRANSLATED TEXT
	$translatedText = $_POST['div_translation'];
	echo "Translation: ".$translatedText;
	echo "<br/>";


	//LANG TO
	$langTo = $_POST['langList'];
	echo "To: ".$langTo;
	echo "<br/>";





	//WRITE TO DB
	$insert = "INSERT INTO file (title, author, detected_language, original_text, translated_text) VALUES ('$filename', 'author', '$langFrom', '$originalText', '$translatedText')";

	if($connection->query($insert) === TRUE){
		echo "added";
	}else{
		echo "error".$insert.$connection->error;
	}


	$connection->close();
?>