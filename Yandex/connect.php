<?php
	$servername = 'localhost';
	$username = 'root';
	//wamp password blank
	//mamp password 'root'
	$password = 'root';
	$dbname = 'SuperTB';

	$connection = new mysqli($servername, $username, $password, $dbname);

	if($connection->connect_error){
		die("connection failed: ".$connection->connect_error);
	}

	echo "Connection successful </br>";



	//CREATE DATABASE
	// $query = "CREATE DATABASE myDB";
	// if($connection->query($query) === TRUE){
	// 	echo "DB Created";
	// }else{
	// 	echo "Error Creating DB: ".$connection->error;
	// }

	//CREATE TABLE
	// $query = "CREATE TABLE MyGuests(
	// 	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	// 	firstname VARCHAR(30) NOT NULL,
	// 	lastname VARCHAR(30) NOT NULL,
	// 	email VARCHAR(50) NOT NULL,
	// 	reg_date TIMESTAMP
	// 	)";
	// if($connection->query($query) === TRUE){
	// 	echo "Created Table";
	// }else{
	// 	echo "Error Creating Table: ".$connection->error;
	// }

	//INSERT DATA
	// $query = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@doe.com')";
	// if($connection->query($query) === TRUE){
	// 	$last_id = $connection->insert_id;
	// 	echo "New Record added. last inserted id: ".$last_id;
	// }else{
	// 	echo "Error: ".$query.$connection->error;
	// }
	
	//SELECT DATA
	// $query = "SELECT id, firstname, lastname FROM MyGuests";
	// $result = $connection->query($query);

	// if($result->num_rows > 0){
	// 	while($row = $result->fetch_assoc()){
	// 		echo "id: ".$row["id"]." - Name: ".$row["firstname"]." - Lastname: ".$row["lastname"]."</br>";
	// 	}
	// }else{
	// 	echo "0 results";
	// }



	//DELETE RECORD
	// $query = "DELETE FROM MyGuests WHERE id=3";
	// if($connection->query($query) === TRUE){
	// 	echo "Record Deleted";
	// }else{
	// 	echo "Error deleting record: ".$connection->error;
	// }


	//UPDATE RECORD
	// $query = "UPDATE MyGuests SET lastname='Doedoe' WHERE id=2";
	// if($connection->query($query) === TRUE){
	// 	echo "Record Updated";
	// }else{
	// 	echo "Error updating: ".$connection->error;
	// }


	//$connection->close();
?>