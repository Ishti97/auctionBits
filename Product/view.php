<?php

	include '../Include/DB.php';
	//error_reporting(0);
	session_start();
	$username = $_GET['username'];
  $identity = $_GET['identity'];
	$id = $_GET['id'];

?>


<?php


if (isset($_POST['add'])) {

  $rating = $_POST["rating"];
$tmp_rating=0;
$temp_rated_by=0;

  $sql = "SELECT rated_by FROM product WHERE Id=$id";
  $result = mysqli_query($conn, $sql);
  
  if ($result->num_rows > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $temp_rated_by= $row["rated_by"];
  }
  }

  	
  $sql3 = "SELECT rating FROM product WHERE Id=$id ";
  $result3 = mysqli_query($conn, $sql3);
  
  
  if ($result3->num_rows > 0) {
    
    while($row3 = mysqli_fetch_assoc($result3)){
      
      $tmp_rating = $row3["rating"];
    
    }
    $tmp = $rating +  $tmp_rating;
    $temp_rated_by = $temp_rated_by + 1;
    $up_rating = $tmp/$temp_rated_by;
    echo $up_rating;
  }
  $sql4 = "UPDATE product SET rating=' $up_rating' WHERE Id=$id";
  $rslt = mysqli_query($conn, $sql4);

  $sql5 = "UPDATE product SET rated_by=' $temp_rated_by' WHERE Id=$id";
  $rslt5 = mysqli_query($conn, $sql5);

  if ($rslt5)
  {
  $rating="";
  header("Location: ../main.php?username=$username&identity=$identity");
  }
  else
  {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }




}







if (isset($_POST['submit2'])) {
    $price = $_POST['bidamount'];
    
            $sql= "Update product SET Price = '$price' WHERE Id = '$id' ";
			$result = mysqli_query($conn, $sql);


      $sql5= "INSERT INTO winner (Id, username, bid)
      VALUES ('$id', '$username', '$price') ";
      $result5 = mysqli_query($conn, $sql5);
      
			if($result){
				echo "<script>alert('Updated.')</script>";
        header("Location: ../main.php?username=$get_username&identity=$identity");
			}
        }

       






    if (isset($_POST['submit'])) {

		$sql1 = "SELECT * FROM product WHERE Id='$id'";
		$result = mysqli_query($conn, $sql1);

		$pname= "";
		if ($result->num_rows > 0) {
        
            while($row = $result->fetch_assoc()) {
				
				$pname = $row['Name']; 
				$pprice = $row['Price'];
			
			}
		}	
  
    $sql="INSERT INTO cart (ProductId, ProductName, Price, Buyer) VALUES ($id, '$pname', $pprice, '$username')";
    $result = mysqli_query($conn, $sql);
    
	if ($result) {
					
		echo "<script>alert('Wow! Added to Cart.')</script>";
		header("Location: ../main.php?username=$get_username&identity=$identity");
	} 
	else {
		echo "<script>alert('Woops! Something Wrong Went.')</script>";
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
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">



</head>

<body>
<div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="../main.php?&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Auction Bits
      </a></div>
        <ul class="links">
          <li><a href="../main.php?&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Home</a></li>
          <li><a href="#">About</a></li>
          <li>
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
          <li>
            <a href="#" class="desktop-link">Services</a>
            <input type="checkbox" id="show-services">
            <label for="show-services">Services</label>
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
          </li>
          <li><a href="#">Feedback</a></li>
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="search.php" class="search-box" method="POST">
        <input type="text" placeholder="Type Something to Search..." name="khoj" required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>



  <div class="hehe">
  <br><br><br><br><br>
</div>



<section style="text-align:center;" >
<?php
            $conn = new mysqli('localhost', 'root', '', 'auctionbits');
            $sql="SELECT product.Id, product.Name, product.Category, product.Price, product.Description, product.Image, product.rating, product.eventdt 
			FROM product WHERE Id = '$id'" ;
            $result = $conn->query($sql);
            ?> <div class="books-container"> <?php
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $pic="/auctionbits/Images/Product/";
                ?>
                        
                        <div class="product">
                           <div class="product-info">
                                <div class="picture"><img src="<?php echo $pic.$row['Image']?>" style="height: 100px;" alt=""></div>
                                <div class="product-name"><h4> <?php echo $row['Id'] ?> </h4></div>
                                <div class="product-name"><h4> <?php echo $row['Name'] ?> </h4></div>
                                <div class="product-writer font-weight-bold"><h5> <?php echo $row['Description'] ?></h5> </div>
                                <div class="text-secondary text-uppercase"><Strong> <?php echo $row['Category'] ?></Strong> </div>
                                <img src="../Images/star-rating.jpg"  width="30px" height="20px" alt="">
                                <div class="text-secondary text-uppercase"><Strong><?php echo $row["rating"]; ?></Strong> </div>
        <div class="product-name"><h5>Ending : <?php echo $row['eventdt'] ?> </h5></div>



        <!-- <div class="container mt-5"> -->
	
  <form action="" method="post" enctype="multipart/form-data" class="login-email">
    
        <div class="rateyo" id= "rating"
          data-rateyo-rating="4"
          data-rateyo-num-stars="5"
          data-rateyo-score="3">
       </div>
       <span class='result'>Rating : 0</span>
       <input type="hidden" name="rating">
       <div><input type="submit" name="add" class="btn btn-outline-dark my-3"> </div>
   
</form>	
 

                            
                  
                              <div class="product-price">Current Bid : <?php echo $row['Price'] ?>৳</div>
                                
                               
							  <form action="" method="POST" class="" enctype="multipart/form-data">
			<div class="product-info">
				<input type="text" placeholder="Bid here" name="bidamount" value="" required>
			</div>
			
			<div class="product-info">
				<button name="submit2" class="btn btn-outline-dark my-3">Bid</button>
			</div>
			</form>


			<form action="" method="POST" class="" enctype="multipart/form-data">
			<button name="submit" class="btn btn-outline-dark my-3">Add To Cart</button>
			</form>
        <a href="../main.php?&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" >Go Home</a>
                               

                               
                            </div>
                        </div>
                    </a>
                <?php
            } ?> </div> <?php
            } else {
            echo "0 results";
            }
            $conn->close();
        ?>
    </div>
   </div>
          </section>
				



  

	 <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>







</body>
</html>