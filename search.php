<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AuctionBits</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
          <li><a href="index.php">Home</a></li>
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
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>



<div class="hehe">
  <br><br><br><br><br>
</div>
<?php
            $kisu=$_POST['khoj'];
            $conn = new mysqli('localhost', 'root', '', 'auctionbits');
            $sql = "SELECT * FROM product where Name LIKE '%$kisu%' OR Category LIKE '%$kisu%'  ";
            $result = $conn->query($sql);
            ?> <div class="books-container"> <?php
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $pic="Images/Product/";
                ?>
                    
                        <div class="product">
                           <div class="product-info">
                                <div class="picture"><img src="<?php echo $pic.$row['Image']?>" style="height: 100px;" alt=""></div>
                                <div class="product-name"><h5>Product ID : <?php echo $row['Id'] ?> </h5> </div>
                                <div class="product-name"><h5>Name : <?php echo $row['Name'] ?> </h5></div>
                                <div class="product-writer font-weight-bold"> <h5><?php echo $row['Description'] ?></h5> </div>
                                <div class="text-secondary text-uppercase"><strong> <?php echo $row['Category'] ?> </strong></div>

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

					<a href="Product/view.php?id=<?php echo $row['Id'] ?>&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>"><button class="btn btn-outline-dark my-3">Bid</button></a>
					
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

    </body>
</html>