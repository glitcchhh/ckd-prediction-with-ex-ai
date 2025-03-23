	<?php
	include("connection.php");
	  $del="DELETE FROM `slot` where id='$_REQUEST[id]'";
	mysqli_query($con,$del);
    header('location:add-slot.php');	
	
	?>