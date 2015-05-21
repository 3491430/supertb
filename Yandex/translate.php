<?php
	//get the detected language id
	//$langFrom = $detectedLanguage;

	//NEW API LANG DETECT
	$langFrom = $langCode;

	//TEST API TO SEE IF API IS WORKING
	//$langFrom = "ar";
	//RESULTS - instead of running a language detection, I hard coded the language code to passed and this works.

	//get the language-to from the drop list
	$langTo = $_POST['langList'];

	//get the users text
	$text = $_POST['ta_original'];


	if($detectedLanguage == "en"){
		//run translation on each word seperately
		$text_arr = explode(" ", $text);
		$translation_arr = array();

		for($i=0; $i<count($text_arr); $i++){
			//fetch the translation
			$translateText = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=".$config["key"]["translateKey"]."&lang=".$langFrom."-".$langTo."&text=".urlencode($text_arr[$i]));
		
			//JSON encoded string to phph variable
			$translatejson = json_decode($translateText, true);

			//response status code 
			$int_code = $translatejson['code'];

			//translated text
			$translated = $translatejson['text'][0];
			array_push($translation_arr, $translated);
		}
		
	}else{
		//normal block translation
		//fetch the translation
		$translateText = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=".$config["key"]["translateKey"]."&lang=".$langFrom."-".$langTo."&text=".urlencode($text));
		
		//JSON encoded string to phph variable
		$translatejson = json_decode($translateText, true);

		//response status code 
		$int_code = $translatejson['code'];

		

		if($_POST['langList'] == "en"){
			//Single translated text
			$translated_arr = explode(" ", $translatejson['text'][0]);
			echo "Broken translation into array";
			// for($i=0; $i<count($translated_arr); $i++){
				
			// }
			echo "<pre>";
			print_r($translated_arr);
			echo "</pre>";
			
		}else{
			//Block translated text
			$translated = $translatejson['text'][0];
			echo "Block translation ".$translated;
		}
	}


	echo "<br/>";
	//echo "translate.php";
	echo "<pre>";
	//for block
	//print_r($translateText);

	//for single
	//print_r($translation_arr);
	echo "</pre>";

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

//javascript vars
	echo "<script>var langTo =".json_encode($langTo)."</script>";

?>



