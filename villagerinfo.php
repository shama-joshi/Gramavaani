<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$houseNumber = $_POST['houseNumber'];
	$phoneNumber = $_POST['phoneNumber'];
	$adhaarNumber = $_POST['adhaarNumber'];
	$gender = $_POST['gender'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','gramavaani');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into villagerinfo(firstname, lastname,housenumber,phonenumber,adharnumber,sex) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param( "ssiiis", $firstName, $lastName, $houseNumber,$phoneNumber,$adhaarNumber,$gender);
		$execval = $stmt->execute();
//		echo $execval;
		echo "<script>alert('Information filled succesfully')</script>";
				echo "<script>window.location.replace('/gramavaani_v2/villagerinfosecre.html')</script>";
		$stmt->close();
		$conn->close();
	}
?>