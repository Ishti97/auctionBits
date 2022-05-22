<?php 

include '../Include/DB.php';
//error_reporting(0);
$get_username = $_GET['username'];
$identity = $_GET['identity'];
//session_start();

// if (isset($_SESSION['Email'])) {
    // header("Location: signIn_donar.php");
// }

if (isset($_POST['submit'])) {
	
	// $id = $_POST['productId'];
	$name = $_POST['name'];
	$category = $_POST['radio'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$event_dt = $_POST['event_dt'];

		
		$photo_name = $_FILES["image"]["name"];
        $photo_tmp_name = $_FILES["image"]["tmp_name"];
        $photo_size = $_FILES["image"]["size"];
        $photo_new_name = rand().$photo_name;
		
		if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } 
		else {
		
			$sql = "SELECT * FROM product WHERE Id='$id'";
			$result = mysqli_query($conn, $sql);
			
			if (!$result->num_rows > 0) {
				
                $sql = "INSERT INTO product (Price, Name, Category, Description, Image, eventdt)
                VALUES (\"$price\", \"$name\", \"$category\", \"$description\", \"$photo_new_name\",\"$event_dt\")";
                echo $sql;
                $result = mysqli_query($conn, $sql);
                
				
				if ($result) {
					
					move_uploaded_file($photo_tmp_name, "../Images/Product/" . $photo_new_name);
					

					echo "<script>alert('Item Added.')</script>";
					header("Location: ../main.php?username=$get_username&identity=$identity");
					
				
					$name = "";
					$price ="";
					$photo_tmp_name="";
					$photo_new_name="";
					$description="";
                    $category="";
					
				} 
				else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
			} else {
				echo "<script>alert('Woops! Email Already Exists.')</script>";
			}
		}
	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link rel="stylesheet" type="text/css" href="/Include/style.css"> -->
      <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="stylefooter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <link rel="stylesheet" type="text/css" href="Include/nav.css">
    <title>ADD PRODUCT</title>
    <style>

    </style>
</head>

<body>


<div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="#">Auction Bits
      </a></div>
        <ul class="links">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
        <!--   <li>
            <a href="#" class="desktop-link">Features</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <ul>
              <li><a href="#">Drop Menu 1</a></li>
              <li><a href="#">Drop Menu 2</a></li>
              <li><a href="#">Drop Menu 3</a></li>
              <li><a href="#">Drop Menu 4</a></li>
            </ul>
          </li>
		  <?php if($identity == 'seller') {?>
		  <li><a href="Product/AddProduct.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Sell Product</a></li>
		  <?php }?>
		  <?php if($identity == 'bidder') {?> -->
		  <!-- <li><a href="Login/Bidder.php">Buy Product</a></li> -->
          <!-- <li> -->
            <!-- <a href="#" class="desktop-link">Services</a>
            <input type="checkbox" id="show-services">
            <label for="show-services">Services</label> -->
            <!-- <ul>
              <li><a href="#">Drop Menu 1</a></li>
              <li><a href="#">Drop Menu 2</a></li>
              <li><a href="#">Drop Menu 3</a></li>
              <li>
                <a href="#" class="desktop-link">More Items</a>
                <input type="checkbox" id="show-items">
                <label for="show-items">More Items</label>
                <ul>
                  <li><a href="#">Sub Menu 1</a></li>
                  <li><a href="#">Sub Menu 2</a></li>
                  <li><a href="#">Sub Menu 3</a></li>
                </ul>
              </li>
            </ul> -->
          <!-- </li> -->
		  <!-- <li><a href="cart.php?username=<?php echo $username; ?>">My Cart</a></li>
		  <?php }?>
          <li><a href="Post/blogs.php?username=<?php echo $username; ?>">Blog & Feedback</a></li>
		 
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="search.php" class="search-box" method="POST">
        <input type="text" placeholder="Search by Name or Category..." name="khoj" required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form> -->
    </nav>
  </div>


<br><br><br>

    <div style="margin: 0 30vw;">
        <div class="container">
            <div class="py-5 text-center">
                <h2>ADD PRODUCT</h2>
                <p class="lead">Place your Product</p>
                <hr>
            </div>
        </div>

        <div class="container">
            <h4 class="mb-3">Product Info</h4>
            <form action="" method="POST" enctype="multipart/form-data" novalidate>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" id="Name" name="name" class="form-control" placeholder="Product name..." required>
                        <div class="invalid-feedback">
                            Valid first name is required
                        </div>
                    </div>

                    <!-- <div class="col-sm-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" id="lastName" name="lastname" class="form-control" placeholder="Doe" required>
                        <div class="invalid-feedback">
                            Valid last name is required
                        </div>
                    </div> -->

                    <!-- <div class="col-12">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                $
                            </span>
                            <input type="text" id="email" name="email" class="form-control" placeholder="john@mail.com" required>
                        </div>
                        <div class="invalid-feedback">
                            Valid email is required
                        </div>
                    </div> -->


                    <div class="col-md-5">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" id="price" name="price" class="form-control" placeholder="৳" required>
                        <div class="invalid-feedback">
                            Valid Country name is required
                        </div>
                    </div>
                    <!-- <div class="col-md-5">
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
                    </div> -->

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" id="description" name="description" class="form-control" placeholder="20 words about the product" required>
                        <div class="invalid-feedback">
                            Valid Street Address is required
                        </div>
                    </div>

					<div class="">
                                <label for="">Event Date & Time</label>
                                <input type="datetime-local" name="event_dt" class="form-control">
                            </div>
                    <!-- <div class="col-12">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="" required>
                        <div class="invalid-feedback">
                            Valid Phone Number is required
                        </div>
                    </div> -->


                    <hr class="my-4">

                    <h4 class="mb-3">Category</h4>

                    <div class="form-check" style="margin: auto auto 2px auto;">
                        <input value="sports" id="sports" type="radio" name="radio" class="form-check-input" checked required>
                        <label for="sports">Sports</label>
                    </div>
                    <div class="form-check" style="margin: 2px auto;">
                        <input value="antique" id="antique" type="radio" name="radio" class="form-check-input" required>
                        <label for="antique">Antique</label>
                    </div>
                    <div class="form-check" style="margin: 2px auto;">
                        <input value="art" id="art" type="radio" name="radio" class="form-check-input" required>
                        <label for="art">Art</label>
                    </div>
                    <div class="form-check" style="margin: 2px auto;">
                        <input value="others" id="others" type="radio" name="radio" class="form-check-input" required>
                        <label for="others">Others</label>
                    </div>

					<div class="input-group">
					<p class="login-text" style="font-size: 1rem; font-weight: 500;">Choose Image</p>
				
                <input type="file" accept="image/*" placeholder="Image" name="image" required>
            </div>

                    <hr class="my-4">

                <button name="submit" class="btn btn-primary btn-lg btn-block">Add</button></a>
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








