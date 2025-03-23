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
            <h3 class="content-header-title">User Information</h3>
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
					
					<?php
					$con=mysqli_connect("localhost","root","","blood");
					
					$res=mysqli_query($con,"SELECT * FROM `user_info` where uid='$_SESSION[uid]'");
					$row=mysqli_fetch_array($res);
					?>
					
					<div class="card-content collapse show">
						<div class="table-responsive">
							<div class="col-xl-9 col-lg-9 col-md-12">
							  <div class="card">
								  <div class="card-block">
									  <div class="card-body">
										<form method="post">
											<?php
											if (mysqli_num_rows($res) == 0) {
											
											?>
											<a href="add_user_info.php" class="btn btn-primary" style="float:right;">Add</a>
											<?php
											}
											?>
											<br><br>
											<div class="col-sm-12">
											   <label>Weight</label>
											   <input type='text' class="form-control" value="<?php echo $row['weight'] ?>"  readonly name='weight' placeholder="weight" ><br>
											</div>
											<div class="col-sm-12">
											   <label>Height</label>
											   <input type='text' class="form-control" value="<?php echo $row['height'] ?>" readonly  name='height' placeholder="height" ><br>
											</div>
											<div class="col-sm-12">
											   <label>BMI</label>
											   <input type='text' class="form-control" value="<?php echo $row['bmi'] ?>" readonly name='BMI' placeholder="BMI" ><br>
											</div>
											<div class="col-sm-12">
											   <label>Age</label>
											   <input type='text' class="form-control" value="<?php echo $row['age'] ?>" readonly  name='age' placeholder="gender" ><br>
											</div>
											<div class="col-sm-12">
											   <label>Gender</label>
											   <input type='text' class="form-control" value="<?php echo $row['gender'] ?>" readonly name='csl' placeholder="current sugar level" ><br>
												
											</div>
											<div class="col-sm-12">
											   <label>Medical History</label>
											  <textarea class="form-control"  name='th' placeholder="medical history" readonly><?php echo $row['medical_history'] ?></textarea> <br>
											
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
 include("connection.php");
 if(isset($_POST['submit']))
 {
	$weight=$_POST['weight'];
	$height=$_POST['height'];
	$BMI=$_POST['BMI'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$csl=$_POST['csl'];
	$th=$_POST['th'];

 
 
	$ins="INSERT INTO `user_info`(`uid`, `weight`, `height`, `bmi`, `age`, `gender`, `treatinghosp`, `cgl`)
		  VALUES ('$_SESSION[uid]','$weight','$height','$BMI','$age','$gender','$th','$csl')";
		  echo $ins;
	$res= mysqli_query($con,$ins);
	
	if($res)
	{
	   echo "<script>
			   alert('insert successfully');
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