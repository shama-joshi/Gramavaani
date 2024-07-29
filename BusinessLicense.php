<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
    $place=$_POST['place'];
	$phoneNumber = $_POST['phoneNumber'];
	$adhaarNumber = $_POST['adhaarNumber'];   
    $businessName=$_POST['businessName'];
    $formOfBusiness=$_POST['formOfBusiness'];
    $businessDescription=$_POST['businessDescription'];
    $initialInvestment=$_POST['initialInvestment'];
// Database connection
	$conn = new mysqli('localhost','root','','gramavaani');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into businesslicense(firstname,lastname, place,phonenumber,adharnumber,businessname,businesstype,description,
		initialinvestment)values(?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param( "sssiisssi",$firstName,$lastName,$place,$phoneNumber,$adhaarNumber,$businessName,$formOfBusiness,$businessDescription,$initialInvestment);
    	$execval = $stmt->execute();
//		echo $execval;
		
		echo "<script>alert('Upload succesfully ')</script>";
				echo "<script>window.location.replace('/gramavaani_v2/BusinessLicense.html')</script>";
		$stmt->close();
		$conn->close();
	}
?>