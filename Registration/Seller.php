<?php

include '../Include/DB.php';

error_reporting(0);

session_start();

// if (isset($_SESSION['Email'])) {
// header("Location: signIn_donar.php");
// }

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    // $contactno = $_POST['contact'];
    // $designation = $_POST['designation'];

    if ($password == $cpassword) {

        $photo_name = $_FILES["image"]["name"];
        $photo_tmp_name = $_FILES["image"]["tmp_name"];
        $photo_size = $_FILES["image"]["size"];
        $photo_new_name = rand() . $photo_name;

        if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {

            $sql = "SELECT * FROM seller WHERE Email='$email'";
            $result = mysqli_query($conn, $sql);

            if (!$result->num_rows > 0) {

                $sql = "INSERT INTO seller (Username, Email, Password,  Image)
						VALUES ('$username', '$email', '$password',  '$photo_new_name')";
                $result = mysqli_query($conn, $sql);

                if ($result) {

                    move_uploaded_file($photo_tmp_name, "../Images/Seller/" . $photo_new_name);


                    echo "<script>alert('Wow! Seller Registration Completed.')</script>";
                    header("Location: ../Seller.php");

                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                    $contactno = "";
                    $photo_tmp_name = "";
                    $photo_new_name = "";
                    $designation = "";
                } else {
                    echo "<script>alert('Woops! Something Wrong Went.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";
            }
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
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
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up - Seller</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="cpassword" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />

                            </div>
                            <div>
                                <a href="Bidder.php">Sign up as Bidder</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="../Seller.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>


<!-- 
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
                        <h1>SignUp</h1>
                        <div class="icon">
                            <div class="social"> <a href="#" class="social-icon"><span class="fa fa-facebook"></span></a></div>
                            <div class="social">   <a href="#" class="social-icon"><span class="fa fa-twitter"></span></a></div>
                        </div>
                    </div>
                    <label class="label" for="name">Username</label>
                    <input type="text" placeholder="username" name="username"  required>
                    <label class="label" for="email">Email</label>
                    <input type="email" placeholder="email" name="email"  required>
                    <label class="label" for="password">Password</label>
                    <input type="password" placeholder="password" name="password"  required>
                    <label class="label" for="confirm password">Confirm Password</label>
                    <input type="password" placeholder="confirm password" name="cpassword"  required>
                    <label class="label" for="contact">Contact No</label>
                    <input type="text" placeholder="ContactNo" name="contact"  required>
                    <label class="label" for="designation">Designation</label>
                    <input type="text" placeholder="Designation" name="designation"  required>
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
                    <h2>Welcome To SignUp</h2>
                    <p>Already have an account?</p>
                    <a href="../Login/Seller.php">Sign In</a>
                 </div>
              </div>
        </div>

     </div>

    </body>
    </html> -->