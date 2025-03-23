<?php
//session_start();
include("header.php");
include("nav.php");
?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Add Appointment</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">View Users
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Inputs start -->
		
		<!-- Striped rows start -->
		<div class="row">
			<div class="col-8">
				<div class="card">
					<div class="card-header">
						<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					</div>
					<div class="card-content collapse show">
						<div class="table-responsive">
							<div class="col-xl-9 col-lg-9 col-md-12">
							  <div class="card">
								  <div class="card-block">
									  <div class="card-body">
										<form method="POST" action="">
											<?php
											$con=mysqli_connect("localhost","root","","blood");

											$res=mysqli_query($con,"SELECT * FROM doctors where id ='$_REQUEST[did]'");
											$i=1;
											$row=mysqli_fetch_array($res);
											$a=$row['id'];

											$res1=mysqli_query($con,"SELECT * FROM `slot` WHERE `doc_id`='$_REQUEST[did]' and `id`='$_REQUEST[sid]'");
											//echo "SELECT * FROM `slot` WHERE `doc_id`='$_REQUEST[did]' and `id`='$_REQUEST[sid]'";
											$row1=mysqli_fetch_array($res1);
											$b=$_REQUEST['sid'];
											?>
											<input type='text' class="form-control"  name='name' readonly  value="<?php echo $row['name'];  ?>" placeholder="Doctor Name" ><br>
											
											<input type='text' class="form-control"  name='name' readonly  value="<?php echo $row1['slot'];  ?>" placeholder="Appointment Time" ><br>
											
											<input type='text' class="form-control"  name='problem' required placeholder="Problem" ><br>

											<input type='date' class="form-control" name='date' required placeholder="Date" min="<?php echo date('Y-m-d'); ?>"><br>
											<input type='hidden' class="form-control"  name='hid' required value="<?php echo $row['hospname'];  ?>" placeholder="Address" ><br>
											<br>
											</table>
											
											<br>
											<br>
											<input type="submit" name="submit" class="btn btn-primary" value="Save">
										</form>
									  </div>
								  </div>
							  </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- Striped rows end -->


<?php 

//session_start();
$uid=$_SESSION['uid'];
$con=mysqli_connect("localhost","root","","blood");
if(isset($_POST['submit']))
  {
	$hid=$_POST['hid'];
	$problem=$_POST['problem'];
	$date=$_POST['date'];
	
	$ins="INSERT INTO appointment(uid,doctor_id,slot_id,hospitalname,problem,status,slot_status,date)
	VALUES('$uid','$a','$b','$hid','$problem','pending','1','$date')";
	$res= mysqli_query($con,$ins);
	
	 if($res)
	{
	   echo "<script>
	   alert('booking successfully');
	   window.location='viewappointment.php';
	   
	   
	   </script>";
	}
 }
  ?>

       </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

 <?php
 include("footer.php");
 ?>