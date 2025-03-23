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
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					</div>
					<div class="card-content collapse show">
						<div class="table-responsive">
							<div class="col-xl-12 col-lg-12 col-md-12">
							  <div class="card">
								  <div class="card-block">
									  <div class="card-body">
										<form method="post">
											<div class="row">
												<div class="col-sm-3">
													<label for="weight">Age</label>
													<input type="text" class="form-control" id="weight" name="weight" placeholder="Age">
												</div>
												<div class="col-sm-3">
													<label for="height">Blood Pressure</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Blood Pressure">
												</div>
												<div class="col-sm-3">
													<label for="height">Specific Gravity</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Specific Gravity">
												</div>
												<div class="col-sm-3">
													<label for="height">Albumin</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Albumin">
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-3">
													<label for="weight">Sugar</label>
													<input type="text" class="form-control" id="weight" name="weight" placeholder="Sugar">
												</div>
												<div class="col-sm-3">
													<label for="height">Red Blood Cells</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Red Blood Cells">
												</div>
												<div class="col-sm-3">
													<label for="height">Pus Cell </label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Pus Cell ">
												</div>
												<div class="col-sm-3">
													<label for="height">Pus Cell clumps</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Pus Cell clumps">
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-3">
													<label for="weight">Bacteria</label>
													<input type="text" class="form-control" id="weight" name="weight" placeholder="Bacteria">
												</div>
												<div class="col-sm-3">
													<label for="height">Blood Glucose Random</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Blood Glucose Random">
												</div>
												<div class="col-sm-3">
													<label for="height">Blood Urea</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Blood Urea">
												</div>
												<div class="col-sm-3">
													<label for="height">Serum Creatinine</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Serum Creatinine">
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-3">
													<label for="weight">Sodium</label>
													<input type="text" class="form-control" id="weight" name="weight" placeholder="Sodium">
												</div>
												<div class="col-sm-3">
													<label for="height">Potassium</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Potassium">
												</div>
												<div class="col-sm-3">
													<label for="height">Hemoglobin</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Hemoglobin">
												</div>
												<div class="col-sm-3">
													<label for="height">Packed Cell Volume</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Packed Cell Volume">
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-3">
													<label for="weight">White Blood Cell Count</label>
													<input type="text" class="form-control" id="weight" name="weight" placeholder="White Blood Cell Count">
												</div>
												<div class="col-sm-3">
													<label for="height">Red Blood Cell Count</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Red Blood Cell Count">
												</div>
												<div class="col-sm-3">
													<label for="height">Hypertension</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Hypertension">
												</div>
												<div class="col-sm-3">
													<label for="height">Diabetes Mellitus</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Diabetes Mellitus">
												</div>
											</div>
											
											<div class="row">
												<div class="col-sm-3">
													<label for="weight">Coronary Artery Disease</label>
													<input type="text" class="form-control" id="weight" name="weight" placeholder="Coronary Artery Disease">
												</div>
												<div class="col-sm-3">
													<label for="height">Appetite</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Appetite">
												</div>
												<div class="col-sm-3">
													<label for="height">Pedal Edema</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Pedal Edema">
												</div>
												<div class="col-sm-3">
													<label for="height">Anemia</label>
													<input type="text" class="form-control" id="height" name="height" placeholder="Anemia">
												</div>
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
	
 }
 ?>

       </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

 <?php
 include("footer.php");
 ?>