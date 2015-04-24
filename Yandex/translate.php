<?php

	include_once "transKey.php";
	//get the detected language id
	$langFrom = $detectedLanguage;
	//get the language-to from the drop list
	$langTo = $_POST['langList'];
	//get the users text
	$text = $_POST['ta_original'];

	//fetch the translation
	$translateText = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=".$key."&lang=".$langFrom."-".$langTo."&text=".urlencode($text));
	$translatejson = json_decode($translateText, true);

	$int_code = $translatejson['code'];
	
	//translated text
	$translated = $translatejson['text'][0];

	switch($int_code){
		case 200:
			echo "Operation completed successfully.";
			break;
		case 401:
			echo "Invalid API key.";
			break;
		case 402:
			echo "This API key has been blocked.";
			break;
		case 403:
			echo "You have reached the daily limit for requests (including calls of the detect method).";
			break;
		case 404:
			echo "You have reached the daily limit for the volume of translated text (including calls of the detect method).";
			break;
		case 413:
			echo "The text size exceeds the maximum.";
			break;
		case 422:
			echo "The text could not be translated. ";
			break;
		case 501:
			echo "The specified translation direction is not supported.";
			break;
		default:
			echo "Unknown Error";
	}



?>



