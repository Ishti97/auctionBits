<?php  
include '../Include/DB.php';
	session_start();

	$username = $_GET['username'];
  $identity = $_GET['identity'];

?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AuctionBits</title>
  <link rel="stylesheet" href="style.css">
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
      <div class="logo"><a href="../main.php?&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Auction Bits
      </a></div>
        <ul class="links">
          <li><a href="../main.php?&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Home</a></li>
          <li><a href="../main.php?&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Go back</a></li>
           <!--<li>
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
		  <li><a href="Login/Seller.php">Sell Product</a></li>
		  <li><a href="Login/Bidder.php">Buy Product</a></li>
          <li>
            <a href="#" class="desktop-link">Services</a>
            <input type="checkbox" id="show-services">
            <label for="show-services">Services</label>
            <ul>
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
            </ul> 
          </li>-->
          <li><a href="create.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">+ Create Post</a></li>
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
<?php
            $conn = new mysqli('localhost', 'root', '', 'auctionbits');
            $sql = "SELECT * FROM blog";
            $result = $conn->query($sql);
            ?> <div class="books-container"> 
				

				<?php

			

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $pic="../Images/Post/";
                ?>
                    
                        <div class="product">
                           <div class="product-info">
                                <div class="picture"><img src="<?php echo $pic.$row['Image']?>" style="height: 100px;" alt=""></div>
                              
                                <div class="product-name"><h4>Title: <?php echo $row['Title'] ?> </h4></div>
                                <div class="product-name"><h4>Author: <?php echo $row['Author'] ?> </h4></div>
                                <div class="text-secondary text-uppercase"><Strong>Date: <?php echo $row['DateTime'] ?>  </Strong></div>
                            
                               

                                <p class="card-text"><?php echo substr($row['Content'], 0, 50);?>...</p>		
          <a href="view.php?id=<?php echo $row['Id'];?>&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" class="btn btn-light">Read More <span class="text-danger">&rarr;</span></a>	
                                 
                        </div>




                        </div>
                <?php
            } ?> </div> <?php
            } else {
            echo "0 results";
            }
            $conn->close();
        ?>



















    </div>








</body>
</html>