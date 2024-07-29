<?php

	
	$houseNumber = $_POST['houseNumber'];
	$villagerPassword = $_POST['villagerPassword'];

	// Database connection
	$conn = new mysqli('localhost','root','','gramavaani');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {

		$stmt = "SELECT houseNumber, password FROM login
            WHERE housenumber = '$houseNumber' 
            AND password = '$villagerPassword'";
		$execval = $conn->query($stmt);
		
		if($execval->num_rows > 0) {
			
echo "Logged in successfully...";
		header('Location:\gramavaani_v2\villagermainpage.html');
		}
		 else {
	 echo "<script>alert('Inavlid house number or password...')</script>";
			 echo("<script>window.location.replace('/gramavaani_v2/login.html')</script>");

		}
		
		$conn->close();
	}
?>