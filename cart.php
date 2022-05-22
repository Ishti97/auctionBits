<?php
	
include 'Include/DB.php';

//error_reporting(0);

$username = $_GET['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--<link rel="stylesheet" type="text/css" href="/Include/style.css">
--><link rel="stylesheet" type="text/css" href="Include/nav.css">
	<title>Transaction</title>
	<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #68cca7;
  color: white;
}
</style>
</head>
<body>
    
  
<h2><a href="main.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" ><button class="btn btn-outline-dark my-3">Go Back</button></a></h2>
	<table width="1000" border="5" align="center" id="customers">
		
		<tr>
			<th>ProductID</th>
			<th>ProductName</th>
			<th>Price</th>
		</tr>
<?php  
		$sql = "SELECT * FROM cart WHERE Buyer = '$username'";
		$result = mysqli_query($conn, $sql);
		
		while($row=mysqli_fetch_assoc($result)){		
    ?>
		<tr>
		<td><?php echo $row["ProductId"]; ?></td>
		<td><?php echo $row["ProductName"]; ?></td>
		<td><?php echo  $row["Price"]; ?></td>
		
		</tr>
	<?php } ?>
	


<?php
  $Total = "";
        $sql2 = "SELECT SUM(Price) as Total
        FROM cart
        WHERE Buyer= '$username' ";
        $result = mysqli_query($conn, $sql2);

        while($row=mysqli_fetch_assoc($result)){
            $Total = $row['Total'];
    ?>

<tr>
		<td></td>
		<td></td>
		<td><?php  echo $row['Total']; ?></td>
       
		</tr>
         
        
        <?php
    } ?>


</table>

<!-- <a href="checkout.php?price=<?php echo $Total; ?>&username=$username"><button>Checkout</button></a> -->
<a href="shipping.php?price=<?php echo $Total; ?>&username=<?php echo $username; ?>"><button>Checkout</button></a>

	 <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>