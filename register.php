<?php
$user=0;
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$phoneNumber = $_POST['phoneNumber'];
	$houseNumber= $_POST['houseNumber'];
	$adhaarNumber= $_POST['adhaarNumber'];
	$userPassword = $_POST['userPassword'];
	$confirmPassword = $_POST['confirmPassword'];

	// Database connection
	$conn = new mysqli('localhost','root','','gramavaani');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
	$sql="Select housenumber,phonenumber from `register` ";	
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		$num=mysqli_num_rows($result);
		if($num==0)
	    {	
		echo'<script> alert(" housenumber/adharnumber/phonenumber already registered..!! Enter new info")</script>';
			echo' <a  style="color: green;" href="register.html"><h1>Click here to refresh</a>';	}
else {
		$stmt = $conn->prepare("insert into register(firstname, lastname,phonenumber,housenumber,adharnumber,password,confirmpassword) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param( "ssiiiss", $firstName, $lastName,$phoneNumber, $houseNumber,$adhaarNumber,$userPassword,$confirmPassword);
		
	    $stmt->execute();
		
		$stmt1 = $conn->prepare("insert into login(housenumber,password) values(?, ?)");
		$stmt1->bind_param( "is",$houseNumber,$userPassword);
		
	    $stmt1->execute();
		header('Location:../login.html');
		$stmt->close();
		$conn->close();
}
	}
?>