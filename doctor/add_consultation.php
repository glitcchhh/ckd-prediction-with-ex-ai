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
            <h3 class="content-header-title">Add Consultation</h3>
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
										    <label>Patient Name</label>
											<select class="form-control" name="pid">
												<option value="">--select--</option>
												<?php
													$con=mysqli_connect("localhost","root","","blood");
													$sel="SELECT * FROM `appointment` where doctor_id='$_SESSION[did]' and status='Approved' and status='1'";
													//echo $sel;
													 $res1=mysqli_query($con,$sel);
													 while($row1=mysqli_fetch_array($res1))
													 {
														$sel1="SELECT * FROM `register` WHERE `id` = '$row1[uid]'";
														$res2=mysqli_query($con,$sel1);
														$row2=mysqli_fetch_array($res2);
														$_SESSION['hos']=$row1['hospitalname'];
												?>
												
												<option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
												<?php
												  }
												?>
											</select><br>
											<label>Problem</label>
											<input type='text' class="form-control" name='problem' placeholder="Problem" ><br>
											<label>Symptoms</label>
											<textarea class="form-control" name="Symptoms" placeholder="Symptoms"></textarea><br>
											<label>Findings</label>
											<textarea class="form-control" name="Findings"  placeholder="Findings"></textarea><br>
											<label>Medicines</label>
											<textarea class="form-control" name="Medicines" placeholder="Medicines"></textarea><br>
											<br>
											<input type="submit" name="submit" class="btn btn-primary" value="Add">

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

//$con=mysqli_connect("localhost","root","","blood");

if(isset($_POST['submit']))
 {
	$pid=$_POST['pid'];
	$problem=$_POST['problem'];
	$Symptoms=$_POST['Symptoms'];
	$Findings=$_POST['Findings'];
	$Medicines=$_POST['Medicines'];
	
	date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'Y-m-d h:i:s');
 
 
	$ins="INSERT INTO `consultation`(`patient_id`, `hospital_id`, `doctor_id`, `date`,`problem`, `symptoms`, `findings`, `medicines`)
	  VALUES( '$pid','$_SESSION[hos]','$_SESSION[did]','$currentTime','$problem','$Symptoms','$Findings','$Medicines')";
	//echo $ins;
	$res= mysqli_query($con,$ins);
	
	 if($res)
	{
	   echo "<script>
	   alert('insert successfully');
	   window.location='view_consultation.php';
	   
	   
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