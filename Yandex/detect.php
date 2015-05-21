<?php
	//determine the language from user file
	if(isset($_POST['ta_original'])){
		$detectThis = ltrim($_POST['ta_original']);
		//$detectThis = $_POST['ta_original'];
		//$wordArray = explode(' ', $detectThis);

	}
	//$detectLanguage = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/detect?key=".$key."&text=".$firstWord[0]."+".end($firstWord));
	//$detectLanguage = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/detect?key=".$config["key"]["translateKey"]."&text=".$wordArray[0]."+".$wordArray[1]);
	$detectLanguage = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/detect?key=".$config["key"]["translateKey"]."&text=".$detectThis);
	
	$languagejson = json_decode($detectLanguage, true);
	$detectedLanguage = $languagejson['lang'];

	//echo "detect.php";
	//echo "<br />";
	//echo $detectedLanguage;

	// if(array_key_exists($detectedLanguage, $langArr)){
	// 	echo "detected language: ".$langArr[$detectedLanguage];
	// 	echo " ".$detectedLanguage;
	// 	echo "<pre>";
	// 	print_r($wordArray);
	// 	echo "</pre>";
	// }else{
	// 	echo 'failed language detection';
	// }
	




	//NEW API TEST
	require_once("resources/detectlanguage-php-master/lib/detectlanguage.php");
	use \DetectLanguage\Detectlanguage;

	Detectlanguage::setApiKey($config["key"]["detectLangKey"]);

	$langCode = DetectLanguage::simpleDetect(ltrim($_POST['ta_original']));
	echo "NEW API LANG DETECTION<br/>";
	echo $langCode;

?>