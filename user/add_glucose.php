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
            <h3 class="content-header-title">Add Glucose level</h3>
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
											   <label>Date</label>
											   <input type='date' class="form-control" min="<?php echo date('Y-m-d'); ?>"  name='date' ><br>
											</div>
											<div class="col-sm-12">
											   <label>Glucose Level</label>
											   <input type='number' class="form-control"  name='gl' placeholder="height" ><br>
											</div>
											
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
<!-- Striped rows end -->


<?php
 include("connection.php");
 if(isset($_POST['submit']))
 {
	$date=$_POST['date'];
	$g=$_POST['gl'];

 
 
	$ins="INSERT INTO `glc_level`(`uid`, `glc_level`, `date`) VALUES 
		  ('$_SESSION[uid]','$g','$date')";
		  //echo $ins;
	$res= mysqli_query($con,$ins);
	
	if($res)
	{
	   echo "<script>
			   alert('insert successfully');
			   window.location='glucose.php';
			</script>";
	}
 }
 ?>

       </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

