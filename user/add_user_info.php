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
					<div class="card-content collapse show">
						<div class="table-responsive">
							<div class="col-xl-9 col-lg-9 col-md-12">
							  <div class="card">
								  <div class="card-block">
									  <div class="card-body">
										<form method="post">
											<div class="col-sm-12">
											   <label>Weight</label>
											   <input type='text' class="form-control"  name='weight' placeholder="weight" ><br>
											</div>
											<div class="col-sm-12">
											   <label>Height</label>
											   <input type='text' class="form-control"  name='height' placeholder="height" ><br>
											</div>
											<div class="col-sm-12">
											   <label>Age</label>
											   <input type='text' class="form-control"  name='age' placeholder="gender" ><br>
											</div>
											<div class="col-sm-12">
											   <label>Gender</label>
											   <select class="form-control"  name='gender' >
												  <option value="">select</option>
												  <option value="male">Male</option>
												  <option value="female">Female</option>

											   </select><br>
											</div>
											<div class="col-sm-12">
											   <label>Medical History</label>
											   <textarea class="form-control"  name='th' placeholder="medical history"></textarea> <br>
											
											<div class="col-sm-12 ">
											   <br>
												<input type="submit" class="btn btn-primary" name="submit">
											</div>
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
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$th=$_POST['th'];

	// Convert height to meters
	$heightInMeters = $height / 100;

	// Calculate BMI
	$bmi = $weight / pow($heightInMeters, 2);
	//echo $bmi;
	// Round BMI to two decimal places
	$roundedBmi = round($bmi, 2);
 
	$ins="INSERT INTO `user_info`(`uid`, `weight`, `height`, `bmi`, `age`, `gender`, `medical_history`)
		  VALUES ('$_SESSION[uid]','$weight','$height','$roundedBmi','$age','$gender','$th')";
		  //echo $ins;
	$res= mysqli_query($con,$ins);
	if($res)
	{
	   echo "<script>
			 alert('insert successfully');
			 window.location='user_info.php';
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