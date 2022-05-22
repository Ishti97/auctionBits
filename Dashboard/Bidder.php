<?php
	
	include '../Include/DB.php';
	
	//error_reporting(0);

	session_start();


	if(!isset($_SESSION['Identity']) && $_SESSION['Identity'] != "bidder") {
	  header("Location: ../Login/Bidder.php");
		die();
}

if (!isset($_SESSION['Logged'])) {
      header("Location: ../Login/Bidder.php");
	die();
}

if($_SESSION['Username']==true && $_SESSION['Logged']==true){
	
	if((time() - $_SESSION['Time']) > 10){
		  header("Location: ../Logout/Bidder.php");
	}
	else{
		
		$identity = $_SESSION['Identity'];
		$email = $_SESSION['Email'];
		$username = $_SESSION['Username'];
		
	}
}
else{
	header("Location: ../Logout/Bidder.php");
}

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

	<link rel="stylesheet" type="text/css" href="../Include/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="../Include/nav.css"> -->

	<title>Bidder</title>
</head>
<body>

	<div class="topnav" id="myTopnav">
			<a href="../index.php" class="btn btn-outline-dark my-3">HOME</a>
			<!-- <a href="../UpdateProfile/donar.php?username=<?php echo $_SESSION['Username']; ?>"  class="btn btn-outline-dark my-3">|Update Profile</a> -->
			<a href="../Logout/Bidder.php"  class="btn btn-outline-dark my-3">|Sign Out</a>
			
			
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
			</a>
	</div>


	<div class="container mt-5">
		   <!--<form action="" method="post" enctype="multipart/form-data" class="login-email">-->
		   
		   <?php 
					$sql = "SELECT * FROM bidder WHERE Email='{$_SESSION["Email"]}'";
					$result = mysqli_query($conn, $sql);
					
					if ($result->num_rows > 0) {
						
						$row = mysqli_fetch_assoc($result);
						// $_SESSION['Email'] = $row['Email'];
						// $_SESSION['Username'] = $row['Username'];
						
				?>
				
				<?php } ?>	
				
						<p class="login-text" style=" font-size: 2rem; font-weight: 700;"><u>Info | Bidder</u></p>
						<img src="../Images/Bidder/<?php echo $row["Image"]; ?>" width="150px" height="auto" alt="">
		  		
						<p class="login-text" style="font-size: 1rem; font-weight: 800;">Name: <?php echo $row["Username"]; ?></p>
						<p class="login-text" style="font-size: 1rem; font-weight: 800;">Designation: <?php echo $row["Designation"]; ?></p>
						<p class="login-text" style="font-size: 1rem; font-weight: 800;">Contact: <?php echo $row["ContactNo"]; ?></p>
				
			<!--	<h2><a href="../UpdateProfile/donar.php?username=<?php echo $_SESSION['Username']; ?>" class="btn btn-light">Update Profile</a></h2>
				<h2><a href="../Logout/donar.php" class="btn btn-light">Sign Out</a></h2>
				-->
				
			<!--</form>-->
		</div>



</body>
</html>