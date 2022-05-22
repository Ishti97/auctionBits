<?php 

	include '../Include/DB.php';
	
	//error_reporting(0);
	
	session_start();

// if (isset($_SESSION['Email'])) {
    // header("Location: donar-dashboard.php");
// }

if (isset($_POST['submit'])) {

	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM seller WHERE Email='$email' AND Password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		
        

		$_SESSION['Identity'] = $row['Identity'];
		$_SESSION['Email'] = $row['Email'];
		$_SESSION['Username'] = $row['Username'];
		$_SESSION['Logged'] = 'true';
		$_SESSION['Time'] = time();
        
		
		header("Location: ../main.php?username={$_SESSION['Username']}&identity={$_SESSION['Identity']}");
		//header("Location: donar-dashboard.php");
	}
}

?>

<!-- <!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../Include/style.css">

	<title>Seller Login</title>
</head>

<body>

	<div class="container">
		<form action="" method="POST" class="login-email" enctype="multipart/form-data">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="../Registration/Seller.php">Register Here</a>.</p>
		</form>
	</div>
	
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>auctionBits</title>
</head>
<body>
    

<div class="login">
        <div class="container">
            <div class="parentlogin">
                <form action="" method="POST" enctype="multipart/form-data"> 
                    <div class="title">
                        <h1>Signin</h1>
                        <div class="icon">
                            <div class="social"> <a href="#" class="social-icon"><span class="fa fa-facebook"></span></a></div>
                            <div class="social">   <a href="#" class="social-icon"><span class="fa fa-twitter"></span></a></div>
                        </div>
                    </div>
                    <label class="label" for="name">Username</label>
                    <input type="text" placeholder="username" name="email"  required>
                    <label class="label" for="password">Password</label>
                    <input type="password" placeholder="password" name="password"  required>
                    <input type="submit" name="submit" class="submit" value="Sign In" >
                    <div class="extra">
                        <div class="checkbox">
                        <label><input type="checkbox" checked /> Remember me</label>
                        </div>
                        <div class="forget">
                        <a href="#">Forgot Password</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="parentdesc">
                <div class="description">
                    <h2>Welcome To Login</h2>
                    <p>Don't have an account?</p>
                    <a href="../Registration/Seller.php">Sign Up</a>
                 </div>
              </div>
        </div>

     </div>

    </body>
    </html>