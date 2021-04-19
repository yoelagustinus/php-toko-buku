<?php
	$link = mysqli_connect("localhost", "root", "", "db_buku");
	
	if($link === false){
		die("ERROR: could not connect. " .mysqli_connect_error());
	}
	$sql = "CREATE TABLE User(
		ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Nama VARCHAR(255) NOT NULL,
		Email VARCHAR(255) NOT NULL,
		Pass VARCHAR(255) NOT NULL,
		Kategori BOOLEAN
	)";
	if(mysqli_query($link, $sql)){
		echo "Created successfully";
	} else {
		echo "ERROR: " . $sql . "<br>" . mysqli_error($link);
	}
	mysqli_close($link);
?>
