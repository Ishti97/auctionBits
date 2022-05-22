<?php 

	include 'Include/DB.php';
	
	//error_reporting(0);
	
	session_start();

// if (isset($_SESSION['Email'])) {
    // header("Location: donar-dashboard.php");
// }

if (isset($_POST['signin'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM bidder WHERE Email='$email' AND Password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		
		$_SESSION['Identity'] = $row['Identity'];
		$_SESSION['Email'] = $row['Email'];
		$_SESSION['Username'] = $row['Username'];
		$_SESSION['Logged'] = 'true';
		$_SESSION['Time'] = time();
		
		header("Location: main.php?username={$_SESSION['Username']}&identity={$_SESSION['Identity']}");
		//header("Location: donar-dashboard.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AuctionBits</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="Registration/Bidder.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">AuctionBits</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" >
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" >
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" >
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" >
                                <a href="Seller.php" style="margin-left: 2px;">Not a Bidder</a>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>





<!-- <!DOCTYPE html>
<html>

<head>
    <title>Login</title>


    <link rel="stylesheet" type="text/css" href="css/login-page.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

    <div class="main-container">
        <div class="container">
            <div class="login-content">
                <form action="index.html">

                    <img src="images/login/avatar.svg" />
                    <h2 class="title">Hello Bidder</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Username</h5>
                            <input type="text" class="input" />
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Password</h5>
                            <input type="password" class="input" />
                        </div>
                    </div>
                    <a href="#">Forgot Password?</a><br />
                    <a href="login-bidder.php" style="font-size: 0.8rem">Not Bidder</a>
                    <input type="submit" class="btn" value="Login" />
                    
                    <div class="bottom-content" style="margin-bottom: 3px;">
                        <a href="#">Don't have an account?</a>
                    </div>
                    <div class="bottom-content">
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                        <a href="#">Privacy Policy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</body>

</html>
 -->