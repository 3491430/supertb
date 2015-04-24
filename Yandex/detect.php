<?php
	include_once 'transKey.php';
	//determine the language from user file
	if(isset($_POST['ta_original'])){
		$detectThis = ltrim($_POST['ta_original']);
		$firstWord = explode(' ', $detectThis);
	}
	$detectLanguage = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/detect?key=".$key."&text=".$firstWord[0]."+".end($firstWord));
	$languagejson = json_decode($detectLanguage, true);
	$detectedLanguage = $languagejson['lang'];
	echo $detectedLanguage;
?>