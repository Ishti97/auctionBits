<?php

	include '../Include/DB.php';
	session_start();
	$get = $_GET['id'];
	$username = $_GET['username'];
	$identity = $_GET['identity'];


	if (isset($_POST['submit'])) {
	
		$comment = $_POST['comment'];
					
					$sql = "INSERT INTO comment (comment, sender, postId)
					VALUES (\"$comment\", \"$username\", \"$get\")";
					
					$result = mysqli_query($conn, $sql);
					
					
					if ($result) {			
	
						//echo "<script>alert('Wow! Seller Registration Completed.')</script>";
						//header("Location: blogs.php?username=$username");
						// header("Location: views.php?id=$get&username=$username&identity=$identity");
												
						// 	$page = $_SERVER['PHP_SELF'];
						// 	print "<a href=\"$page\"></a>";

						$referer = $_SERVER['HTTP_REFERER'];
						header("Location: $referer");

						$comment = "";					
					} 
					else {
						echo "<script>alert('Woops! Something Wrong Went.')</script>";
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

	<title>Blog</title>
</head>

<body>
	
	<?php
			$sql="SELECT * FROM blog  WHERE Id = '$get'" ;
			$result = mysqli_query($conn, $sql);
					
					if ($result->num_rows > 0) {
						
						$row = mysqli_fetch_assoc($result);
					}
				?>

   <div class="container mt-5">
            <div class="bg-white p-5 rounded-lg text-black text-center">
                <h1><?php echo $row['Title'];?></h1>
				<h6 class="card-title"><?php echo  $row['Author'];?></h6>
				<h6 class="card-title"><?php echo  $row['DateTime'];?></h6>
				<img src="../Images/Post/<?php echo  $row['Image']; ?>" width="150px" height="auto" alt="">

            </div>
            <p class=""><?php echo $row['Content'];?></p>

			</div>



			<?php
            $conn = new mysqli('localhost', 'root', '', 'auctionbits');
            $sql = "SELECT * FROM comment WHERE postId=$get";
            $result = $conn->query($sql);
            ?> 
			
			<div class="container"> 
			<h6 style="text-align:center">Comment</h6>
		
				<?php

			

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>           
                        
						<div class="product-info">
                                       
						<h6 class="card-title">Reply: <?php echo $row['sender'] ?>, <?php echo $row['date'] ?></h6>
                     <p class="">---- <?php echo $row['comment'] ?> </p>
                            
								      
                <?php
            } ?> 
		</div> 
		
		<?php
            } 
            $conn->close();
        ?>


		</div>




			<div class="container">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
            <!-- <p class="login-text" style="font-size: 1rem; font-weight: 500;">Add Comment</p> -->
			<div class="input-group">
				<input type="text" placeholder="write something..." name="comment" required>
			</div>
			
			<div class="input-group">
				<button name="submit" class="">Comment</button>
			</div>
		</form>
				
			<div class="input-group">
        <a href="blogs.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" >Go Back</a>	
		</div>
</body>
</html>












