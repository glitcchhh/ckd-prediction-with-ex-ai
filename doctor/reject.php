<?php
	$con=mysqli_connect("localhost","root","","blood");
	
	$up="update appointment set status='Rejected' where id='$_REQUEST[id]'";
	$res=mysqli_query($con,$up);
	if($res)
					{
					echo '<script>alert("Succesfully Rejected!")
							     window.location="viewappointment.php";
								  </script>'; 
					
					}				
	
	
?>