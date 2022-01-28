<?php

	include("../server/connection.php");
	$msg 		= '';
  	if(isset($_POST['update'])){
	  	$id       	= $_POST['id'];
	  	$owes 	= mysqli_real_escape_string($db, $_POST['owes']);
        $username	= $_SESSION['username'];

        $sql  = "UPDATE sales SET owes='$owes' WHERE reciept_no = '$id'";
        $result = mysqli_query($db, $sql);
        if($result == true){
            $query 	= "INSERT INTO logs (username,purpose) VALUES('$username','Updated Owings to $owes')";
            mysqli_query($db,$query);
            echo $sql;
            header('location: ../sales/creditors.php?updated');
        }
 	}