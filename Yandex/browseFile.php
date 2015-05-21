<?php
	//require_once "connect.php";

	

	//GET RECORD
	$select = "SELECT original_text FROM file";
	$result = $connection->query($select);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "id: ".$row["original_text"];
			echo "<br/>";
		}
	}else{
		echo "0 resutls";
	}



	$connection->close();
?>