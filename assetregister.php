<?php
	$name = $_POST['name'];
	$houseNumber = $_POST['houseNumber'];
	$assetDescription = $_POST['assetDescription'];
    $totalAsset=$_POST['totalAsset'];
 $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;

        

         
// Database connection
	$conn = new mysqli('localhost','root','','gramavaani');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else{
         
		$sql="Select housenumber,firstname from `register` ";	
		$result=mysqli_query($conn,$sql);
	if($result)
	{
		$stmt ="insert into assetregister(name,housenumber,description,totalasset,file) values('$name','$houseNumber')";
	}
		else{
		$stmt ="insert into assetregister(name,housenumber,description,totalasset,file) values('$name','$houseNumber','$assetDescription','$totalAsset','$pdf')";
		
	 $query=mysqli_query($conn,$stmt);
		  move_uploaded_file($pdf_tem_loc,$pdf_store);
		echo "<script> alert('Registered successfully')</script>";
		echo "<script> window.location.replace('/gramavaani_v2/assetregister.html')</script>";
		$conn->close();
		}
	}
?>