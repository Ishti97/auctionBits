<?php

include '../Include/DB.php';

//error_reporting(0);

session_start();

$get_username = $_GET['username'];
$identity = $_GET['identity'];



// if(!isset($_SESSION['Identity']) && $_SESSION['Identity'] != "organization") {
// 	  header("Location: ../Login/organization.php");
// 		die();
// }

// if (!isset($_SESSION['Logged'])) {
//    header("Location: ../Login/organization.php");
// 	die();
// }


// if (!isset($_SESSION['Email'])) {
//    header("Location: ../Login/organization.php");
// }

// if($_SESSION['Username']==true && $_SESSION['Logged']==true){
	
// 	if((time() - $_SESSION['Time']) > 120){
// 			header("Location: ../Logout/organization.php");
// 	}
// 	else{
		
// 		$identity = $_SESSION['Identity'];
// 		$email = $_SESSION['Email'];
// 		$username = $_SESSION['Username'];
	
// 	}
// }
// else{
// 	header("Location: ../Logout/organization.php");
// }


if(isset($_POST['submit'])){
	
	$title = $_POST['title'];
	$content = $_POST['content'];
	
		$photo_name = $_FILES["image"]["name"];
        $photo_tmp_name = $_FILES["image"]["tmp_name"];
        $photo_size = $_FILES["image"]["size"];
        $photo_new_name = rand() . $photo_name;
		
		if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } 
		else {
				
				$sql = "INSERT INTO blog (Title, Content, Image, Author) VALUES (\"$title\", \"$content\", \"$photo_new_name\", (SELECT Email FROM bidder WHERE Username='$get_username')) ";	
				$result = mysqli_query($conn, $sql);
			
				if ($result) {
					
					move_uploaded_file($photo_tmp_name, "../Images/Post/" . $photo_new_name);
					
					echo "<script>alert('Wow! Post Created!')</script>";
					header("Location: blogs.php?username=$get_username&identity=$identity; ");
					
					$title = "";
					$content = "";
					$photo_tmp_name="";
					$photo_new_name="";
	
				} 
				else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
		}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="../Include/style.css">

		<title>Create Post</title>
	</head>
	
	<body>

















<div class="container mt-5">


		<form action="" method="POST" class="login-email"  enctype="multipart/form-data">
		
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Create Post</p>
			
				<input type="text" placeholder="Title" name="title" class="form-control my-3 bg-whitetext-white" required>

			
				<textarea  placeholder="Content" name="content" class="form-control my-3 bg-white text-black" cols="30" rows="10"  required></textarea>

				<p class="login-text" style="font-size: 1rem; font-weight: 500;">Choose Image</p>
               <input class="form-control my-3 bg-whitetext-white" type="file" accept="image/*" placeholder="Image" name="image" required>
          
			<div class="input-group">
			 
				<button name="submit" class="">Post</button>
			</div>
		</form>
	</div>
	
</body>
</html>