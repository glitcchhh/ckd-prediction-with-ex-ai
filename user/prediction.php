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
            <h3 class="content-header-title">Kidney Disease Prediction</h3>
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
			<div class="col-lg-4 d-flex justify-content-center align-items-center">
				<a href="upload.php" class="card-link">
					<div class="card">
						<div class="card-body text-center">
							<img src="338864.png" style="width: 100px; height: 100px;" class="mb-3">
							<h3>Upload File</h3>
						</div>
					</div>
				</a>
			</div>

			<div class="col-lg-4 d-flex justify-content-center align-items-center">
				<a href="upload_data.php" class="card-link">
					<div class="card">
						<div class="card-body text-center">
							<img src="edit.jpg" style="width: 100px; height: 100px;" class="mb-3">
							<h3>Upload image</h3>
						</div>
					</div>
				</a>
			</div>
		</div>

<!-- Striped rows end -->


       </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

 <?php
 include("footer.php");
 ?>