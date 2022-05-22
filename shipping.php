<?php

include 'Include/DB.php';

//error_reporting(0);

$username = $_GET['username'];
$Total = $_GET['price'];





if (isset($_POST['submit'])) {
	
	$FirstName = $_POST['firstname'];
	$LastName = $_POST['lastname'];
	$Email = $_POST['email'];
	$Country = $_POST['country'];
	$State = $_POST['state'];
    $PostCode = $_POST['p-code'];
	$StreetAddress = $_POST['s-address'];
	$Phone = $_POST['phone'];
    $ShippingMethod = $_POST['radio'];
	
				
                $sql = "INSERT INTO shipping (Email, FirstName, LastName, Country, State, PostCode, StreetAddress, Phone, ShippingMethod)
                VALUES (\"$Email\", \"$FirstName\", \"$LastName\", \"$Country\", \"$State\", \"$PostCode\", \"$StreetAddress\", \"$Phone\", \"$ShippingMethod\" )";
                echo $sql;
                $result = mysqli_query($conn, $sql);
                
				
				if ($result) {

					echo "<script>alert('Wow! Shipped.')</script>";
					header("Location: checkout.php?price=$Total&username=$username");
					
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--<link rel="stylesheet" type="text/css" href="/Include/style.css">
-->
    <link rel="stylesheet" type="text/css" href="Include/nav.css">
    <title>Shipping Info</title>
    <style>

    </style>
</head>

<body>


    <h2><a href="main.php" class="btn btn-outline-dark my-3">HOME</a></h2>


    <div style="margin: 0 30vw;">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Shipping Form</h2>
                <p class="lead">Place your Shipping Information</p>
                <hr>
            </div>
        </div>

        <div class="container">
            <h4 class="mb-3">Billing Address</h4>
            <form action="" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" id="firstName" name="firstname" class="form-control" placeholder="John" required>
                        <div class="invalid-feedback">
                            Valid first name is required
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" id="lastName" name="lastname" class="form-control" placeholder="Doe" required>
                        <div class="invalid-feedback">
                            Valid last name is required
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                @
                            </span>
                            <input type="text" id="email" name="email" class="form-control" placeholder="john@mail.com" required>
                        </div>
                        <div class="invalid-feedback">
                            Valid email is required
                        </div>
                    </div>


                    <div class="col-md-5">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" id="country" name="country" class="form-control" placeholder="Bangladesh" required>
                        <div class="invalid-feedback">
                            Valid Country name is required
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="state" class="form-label">State</label>
                        <input type="text" id="state" name="state" class="form-control" placeholder="Dhaka" required>
                        <div class="invalid-feedback">
                            Valid State name is required
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="p-code" class="form-label">Post Code</label>
                        <input type="text" id="p-code" name="p-code" class="form-control" placeholder="1212" required>
                        <div class="invalid-feedback">
                            Valid Post Code is required
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="s-address" class="form-label">Street Address</label>
                        <input type="text" id="s-address" name="s-address" class="form-control" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid Street Address is required
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid Phone Number is required
                        </div>
                    </div>


                    <hr class="my-4">

                    <h4 class="mb-3">Shipping Method</h4>

                    <div class="form-check" style="margin: auto auto 2px auto;">
                        <input value="1" id="sundorbon" type="radio" name="radio" class="form-check-input" checked required>
                        <label for="sundorbon">Sundobon Curier</label>
                    </div>
                    <div class="form-check" style="margin: 2px auto;">
                        <input value="2" id="redx" type="radio" name="radio" class="form-check-input" required>
                        <label for="redx">RedX Curier</label>
                    </div>
                    <div class="form-check" style="margin: 2px auto;">
                        <input value="3" id="pathao" type="radio" name="radio" class="form-check-input" required>
                        <label for="pathao">Pathao</label>
                    </div>

                    <hr class="my-4">

                    <a href="checkout.php?price=<?php echo $Total; ?>&username=<?php echo $username; ?>"><button name="submit" class="btn btn-primary btn-lg btn-block">Checkout</button></a>
                </div>
            </form>
        </div>
    </div>








    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>