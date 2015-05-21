<style type="text/css">
	#one, #two {
		float: left;
		width:; 300px;
	}
</style>
<?php
	$original = array("xin chào", "Kìa", "con bướm", "vàng", "Kìa", "con bướm", "vàng",
	 "Xòe", "đôi cánh", "Xòe", "đôi cánh", "Tung cánh", "bay", "năm",
	  "ba", "vòng", "Tung cánh", "bay", "năm", "ba", "vòng", ".", "Em",
	   "ngồi", "xem", "Em", "ngồi", "xem");

	$translated = array("hello", "Behold", "butterfly", "gold", "Behold", "butterfly",
	 "gold", "Spread", "wings", "Spread", "wings", "Breaking", "fly", "in", "three",
	  "rounds", "Breaking", "fly", "in", "three", "rounds", ".", "I", "sat",
	   "watching", "I", "sat", "watching");

	echo "<div id='one'>";
	echo "<pre>";
	print_r($original);
	echo "</pre>";
	echo "</div>";

	echo "<div id='two'>";
	echo "<pre>";
	print_r($translated);
	echo "</pre>";
	echo "</div>";
?>