<?php  
include 'Include/DB.php';
	session_start();

	$username = $_GET['username'];
	$identity = $_GET['identity'];

	
// $t=time();
// echo($t . "<br>");
// echo(date("Y-m-d",$t));


?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AuctionBits</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style9.css">

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <script Type="text/javascript" src="addcart.js"></script>


</head>
<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="main.php?&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Auction Bits
      </a></div>
        <ul class="links">
          <li><a href="main.php?&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li>
            <a href="#" class="desktop-link">Features</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <!-- <ul>
              <li><a href="#">Drop Menu 1</a></li>
              <li><a href="#">Drop Menu 2</a></li>
              <li><a href="#">Drop Menu 3</a></li>
              <li><a href="#">Drop Menu 4</a></li>
            </ul> -->
          </li>
		  <?php if($identity == 'seller') {?>
		  <li><a href="Product/AddProduct.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Sell Product</a></li>
		  <?php }?>
		  <?php if($identity == 'bidder') {?>
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
		  <li><a href="cart.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">My Cart</a></li>
		  <?php }?>
          <li><a href="Post/blogs.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Blog & Feedback</a></li>
		 
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search">Search</i></label>
      <form action="search.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" class="search-box" method="POST">
        <input type="text" placeholder="Search by Name or Category..." name="khoj" required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>



<div class="hehe">
  <br><br><br><br><br>


</div>
<?php
            $conn = new mysqli('localhost', 'root', '', 'auctionbits');
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);
            ?> <div class="books-container"> 
				

				<?php

			

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $pic="Images/Product/";
                ?>
                    
                        <div class="product">
                           <div class="product-info">
                                <div class="picture"><img src="<?php echo $pic.$row['Image']?>" style="height: 100px;" alt=""></div>
                                <div class="product-name"><h4>Product ID : <?php echo $row['Id'] ?></h4> </div>
                                <div class="product-name"><h4>Name : <?php echo $row['Name'] ?></h4> </div>
                                <div class="product-writer font-weight-bold"><h5> <?php echo $row['Description'] ?></h5> </div>
                                <div class="text-secondary text-uppercase"><Strong> <?php echo $row['Category'] ?></Strong> </div>

								<img src="Images/star-rating.jpg"  width="30px" height="20px" alt="">
								<div class="text-secondary text-uppercase"><Strong><?php echo $row["rating"]; ?></Strong> </div>

				
				<?php 
					$id = $row['Id'];

					$time = $row['eventdt'];
					$time_obj = strtotime($time);
					
					$now = new DateTime();
					$now->format('Y-m-d H:i:s'); 
					$now->getTimestamp();
			
				if($now->getTimestamp() > $time_obj ){	
					
						$sql2 = "SELECT username as user, MAX(bid) as bid FROM winner WHERE Id=$id ";
						$row44 = mysqli_query($conn, $sql2);
						if ($row44->num_rows > 0) {
							$row3 = mysqli_fetch_assoc($row44);
						 ?>
							<div class="product-name">Winner : <?php echo $row3['user'] ?> </div>
							<div class="product-name">Max Bid : <?php echo $row3['bid'] ?> ৳ </div>	

						<?php } }

					
				else{
					?>
					<div class="product-name"><h5>Ending : <?php echo $row['eventdt'] ?></h5> </div>
					
					<div class="text-secondary text-uppercase"><Strong>Current Bid : <?php echo $row['Price'] ?>৳</Strong> </div>

					<a href="Product/view.php?id=<?php echo $row['Id'] ?>&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>"><button class="">BID & MORE</button></a>
					
			<?php	}
					?>
					
				

                                
                               

                              
                                
                               
                                
								
                               
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

	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62879e9c7b967b11799067ce/1g3gs75rh';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    </body>







    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<footer class="content-footer">
    <p>Say hi to me on these social networks:</p>
      <ul class="social">
        
      <a href="https://github.com/salehakramjoy"><i class="fa fa-github-square fa-3x"></i></a>
      <a href="https://www.facebook.com/salehakram.joy/"><i class="fa fa-facebook-square fa-3x"></i></a>
      <a href="https://twitter.com/joysaleh1"><i class="fa fa-twitter-square fa-3x"></i></a>
      <a href="https://www.linkedin.com/in/saleh-akram-joy-168118168/"><i class="fa fa-linkedin-square fa-3x"></i></a>
      </ul>
    <p>Devlop By <a href="https://salehakram.xyz">Auction Bits Team</a></p>
  </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	







</html>