<!doctype html>
<html>
	<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
		 
          * {
               box-sizing: border-box;
          }

          .row::after {
               content: "";
               clear: both;
               display: table;
			  
          }

          [class*="col-"] {
			  
               float: left;
               padding: 15px;
          }

          html {
               background-color: azure;
               font-family: "Lucida Sans", sans-serif;
          }

          .header {
			  
               background-color: #9933cc;
               color: #ffffff;
               padding: 15px;
               overflow: auto;
			 
          }

          .menu a {
               text-decoration: none;
			  
          }

          .menu ul {
               list-style-type: none;
               margin: 0;
               padding: 0;
          }

          .menu li {
               padding: 8px;
               margin-bottom: 7px;
               background-color: rgba(57,231,145,1.00);
               color: rgba(255,255,255,1.00);
               box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
          }

          .menu li:hover {
               background-color:rgba(56,178,231,1.00);
		 }
         
			  
          .aside {
               background-color:rgba(57,231,145,1.00);
               padding: 15px;
               color: #ffffff;
               text-align: center;
               font-size: 14px;
               box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
          }

          .footer {
               background-color: rgba(57,231,145,1.00);
               color: #ffffff;
               text-align: center;
               font-size: 12px;
               padding: 15px;
          }

          /* For mobile phones: */
          [class*="col-"] {
               width: 100%;
          }

          @media only screen and (min-width: 600px) {

               /* For tablets: */
               .col-s-1 {
                    width: 8.33%;
               }

               .col-s-2 {
                    width: 16.66%;
				  
               }

               .col-s-3 {
                    width: 25%;
               }

               .col-s-4 {
                    width: 33.33%;
               }

               .col-s-5 {
                    width: 41.66%;
               }

               .col-s-6 {
                    width: 50%;
               }

               .col-s-7 {
                    width: 58.33%;
               }

               .col-s-8 {
                    width: 66.66%;
               }

               .col-s-9 {
                    width: 75%;
               }

               .col-s-10 {
                    width: 83.33%;
               }

               .col-s-11 {
                    width: 91.66%;
               }

               .col-s-12 {
                    width: 100%;
               }
          }

          @media only screen and (min-width: 768px) {

               /* For desktop: */
               .col-1 {
                    width: 8.33%;
               }

               .col-2 {
                    width: 16.66%;
				   
               }

               .col-3 {
                    width: 25%;
               }

               .col-4 {
                    width: 33.33%;
               }

               .col-5 {
                    width: 41.66%;
               }

               .col-6 {
                    width: 50%;
               }

               .col-7 {
                    width: 58.33%;
               }

               .col-8 {
                    width: 66.66%;
               }

               .col-9 {
                    width: 75%;
               }

               .col-10 {
                    width: 83.33%;
               }

               .col-11 {
                    width: 91.66%;
               }

               .col-12 {
                    width: 100%;
               }
          }
		
		</style>
	</head>
	<body>
		<div class="header">
          
          <div class="col-1 col-s-2">
               <img src="../images/emblem_karnataka.png" alt="emblem" style="width: 170%; height: 10%" />
               
		 </div>
          <div class="col-2 col-s-2">
                <span style="font-size: 40px; line-height: 75px;">Gramavaani </span><br />
			  <span style="font-size: 15px;">Karnataka sarkara</span><br/>
			  <span style="font-size: 15px;">Panchayath:Bhairumbe</span>
          </div>
          <div class="col-9 col-s-10" style="text-align:right; padding: 5px; ">
               Hello user! | <a href="../homepage.html">Logout</a>
			   <br>
			  <br>
			  <br>
			  			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The form -->
<form class="example" action="process_search5.php" >
  <input type="text" placeholder="Search here"    id="search" name="search1" required>
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
          </div>
			 
     </div>

     <div class="row">
          <div class="col-2 col-s-2 menu">
               <ul>
                                    
				   <a href="../assetregister.html">
                         <li>Asset registration</li>
                    </a>
                    <a href="../BusinessLicense.html">
                         <li>Business license application</li>
                    </a>

                    <a href="../complaint.html">
                         <li>Complaint registration</li>
                    </a>

                    <a href="meetinginputfetch.php">
                         <li>Meeting input</li>
                    </a>
                    
                    <a href="villagerinfofetch.php">
                         <li>Villlagers information</li>
                    </a>
               </ul>
          </div>
		 </body>
		</html>
<?php
	$hn=$_GET['search1'];
$conn =new mysqli('localhost','root','','gramavaani');
if(!$conn)
{
	die("connection error".mysqli_connect_error());
}
$query1="SELECT * from meetinginput where meetingdate='$hn' or meetingtime='$hn' or meetingplace='$hn' or meetingtitle='$hn' or host='$hn' ";
$result=mysqli_query($conn,$query1);
	if(mysqli_num_rows($result)==0){
		echo"<script> alert('No results found..try again...')</script>";
			echo"<script>window.location.replace('meetinginputfetch.php')</script>";
	}
		else{
echo "<table align='center' border='1px' style='width:700px;line-height:50px;'>";
echo "<tr>";
echo "<th colspan='5'> <h2>Meeting Information</h2></th>";

echo "</tr>";
echo "<tr>";
echo "<h2><th>Meeting date</th></h2>";
echo "<h2><th>Meeting time</th></h2>";
echo "<h2><th>Meeting Place</th></h2>";
echo "<h2><th>Meeting Title</th></h2>";
echo "<h2><th>Host</th></h2>";
echo "</tr>";

while($row=mysqli_fetch_assoc($result))
{

	    $meetingDate=$row['meetingdate'];
		$meetingTime=$row['meetingtime'];
		$meetingPlace=$row['meetingplace'];
		$meetingTitle=$row['meetingtitle'];
		$host=$row['host'];

	

//echo "<tr>";

//echo "</tr>";
	
echo "<tr>";
echo "<h2><td>$meetingDate</td></h2>";
echo "<h2><td>$meetingTime</td></h2>";
echo "<h2><td>$meetingPlace</td></h2>";
echo "<h2><td>$meetingTitle</td></h2>";
echo "<h2><td>$host</td></h2>";
echo "</tr>";
//echo "</tr>";

}
		}
echo"</table>";
mysqli_close($conn);

?>