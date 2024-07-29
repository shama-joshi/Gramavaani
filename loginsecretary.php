<?php


	$mobileNumber = $_POST['mobileNumber'];
	$password = $_POST['Password'];
	// Database connection
	$conn = new mysqli('localhost','root','','gramavaani');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
//		$stmt = $conn->prepare("insert into loginsecretary(phonenumber,password) values( ?,?)");
//	$stmt->bind_param( "is",$mobileNumber,$password);
//		$execval = $stmt->execute();
//		//echo $execval;
//		echo "Login successfully...";
//		header('Location:secretarymainpage.html');
//	$stmt->close();
//	$conn->close();
//	}
//

		$stmt = "SELECT phonenumber, password FROM loginsecretary
            WHERE phonenumber = '$mobileNumber' 
            AND password = '$password'";
		$execval = $conn->query($stmt);
		
		if($execval->num_rows > 0) {
			
			header('Location:\gramavaani_v2\secretarymainpage.html');
			
		} else {
			echo "<script>alert('Invalid mobile number or password...')</script>";
			 echo"<script>window.location.replace('../loginsecretary.html')</script>";
		}
		
		
		$conn->close();
	}
?>