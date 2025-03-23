<?php
include("header.php");
include("nav.php");
?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->




    <div class="app-content content">
      <div class="content-wrapper">
		
        <div class="content-body"><!-- Chart -->
			<div class="content-wrapper-before"></div>
			<div class="content-header row">
			  <div class="content-header-left col-md-4 col-12 mb-2">
				<h3 class="content-header-title">Dashboard</h3>
			  </div>
			  
			<!-- graph     
			<div class="col-md-12 ">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Glucose Track</h4>
						<?php
						//session_start();
						//echo 
						//$python = `"python" "graph1.py" "-i" "$_SESSION[uid]"`;
						?>
						<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					</div>
					<div class="card-content collapse show">
						<div class="card-body">
							<div class="height-400">
							<img src="fig.png">
							</div>
						</div>
					</div><br><br><br>
				</div>
			</div> --> 
			  
			  <div class="content-header-right col-md-8 col-12">
				<div class="breadcrumbs-top float-md-right">
				  <div class="breadcrumb-wrapper mr-1">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="index.php">Home</a>
					  </li>
					  <li class="breadcrumb-item active">Dashboard
					  </li>
					</ol>
				  </div>
				</div>
			  </div>
			</div>
<!-- Chart -->
<!-- eCommerce statistic -->
			<div class="row">
				
				<div class="col-xl-4 col-lg-6 col-md-12">
					<div class="card pull-up ecom-card-1 bg-white">
						<a href="prediction.php">
						<div class="card-content ecom-card2 height-180 ">
							<div class="card text-center"><br><br>
								<br><br><h1 class="card-title">Prediction</h1>
							</div>
						</div>
							</a>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6 col-md-12">
					<div class="card pull-up ecom-card-1 bg-white">
						<a href="viewappointment.php">
						<div class="card-content ecom-card2 height-180 ">
							<div class="card text-center"><br><br>
								<br><br><h1 class="card-title">View Appointment</h1>
							</div>
						</div>
							</a>
					</div>
				</div>
			
				
				<div class="col-xl-4 col-lg-6 col-md-12">
					<div class="card pull-up ecom-card-1 bg-white">
						<a href="viewhospital.php">
						<div class="card-content ecom-card2 height-180 ">
							<div class="card text-center"><br><br>
								<br><br><h1 class="card-title">View Hospitals</h1>
							</div>
						</div>
						</a>
					</div>
				</div>
				
				<div class="col-xl-4 col-lg-6 col-md-12">
					<div class="card pull-up ecom-card-1 bg-white">
						<a href="view-payment.php">
						<div class="card-content ecom-card2 height-180 ">
							<div class="card text-center"><br><br>
								<br><br><h1 class="card-title">View Payments</h1>
							</div>
						</div>
						</a>
					</div>
				</div>
				
			</div>
<!--/ eCommerce statistic -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


 <?php
 include("footer.php");
 ?>