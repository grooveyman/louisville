<?php 
	include('../server/connection.php');
	$alert  = array();
	if(isset($_POST['add_product'])){
		$name 		= mysqli_real_escape_string($db, $_POST['name']);
		$price 		= mysqli_real_escape_string($db, $_POST['price']);
		$quantity	= mysqli_real_escape_string($db, $_POST['quantity']);
		$unit		= mysqli_real_escape_string($db, $_POST['unit']);
		$stock		= mysqli_real_escape_string($db, $_POST['stock']);
		$remarks		= mysqli_real_escape_string($db, $_POST['remarks']);
		$location		= mysqli_real_escape_string($db, $_POST['location']);
	  	$image   	= $_FILES['image']['name'];
		$target   	= "../images/".basename($_FILES['image']['name']);
        $user 		= $_SESSION['username'];

		$sql  = "INSERT INTO `products` (product_name, sell_price, quantity, unit, min_stocks, remarks, location, images) VALUES ('$name','$price','$quantity','$unit','$stock','$remarks','$location','$image')";
	  	$result = mysqli_query($db, $sql);
 		if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $result == true){
 			$query 	= "INSERT INTO logs (username,purpose) VALUES('$user','Customer $name Added')";
 			$insert 	= mysqli_query($db,$query);
			header('location: ../products/create_product.php?added');
	  	}else{
			array_push($alert,"There was a problem uploading the image!");
	  	}
	}
