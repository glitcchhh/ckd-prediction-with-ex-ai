<?php

include("connection.php");
						
						//$sel="select * from parent where id='$_REQUEST[id]'";
						$up="update appointment set status='Approved' where id='$_REQUEST[id]'";
						
						$res=mysqli_query($con,$up);
						if($res)
						{
							echo "<script>
							alert('approved successfully');
							windows.location('viewappointment.php');
							
							
							
							</script>";
							
							echo '<script type="text/javascript">
           window.location = "viewappointment.php"
      </script>';
							
						}




?>