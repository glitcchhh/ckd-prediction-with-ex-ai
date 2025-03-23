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
            <h3 class="content-header-title">View Payments</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">View Doctors
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
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Patient Name</th>
										<th scope="col">Doctor Name</th>
										<th scope="col">Amount</th>
										<th scope="col">Card Number</th>
										<th scope="col">Card Type</th>
										<th scope="col">Payment Date</th>
									</tr>
								</thead>
								<tbody>
									
								
								<?php
								$con=mysqli_connect("localhost","root","","blood");

								$res=mysqli_query($con,"SELECT * FROM `payment` WHERE `hospital_id`='$_SESSION[hid]'");
								
								$i=1;
								while($row=mysqli_fetch_array($res))
									{
										$res1=mysqli_query($con,"SELECT * FROM `register` WHERE `id`='$row[uid]'");
										$row1=mysqli_fetch_array($res1);
										
										$res2=mysqli_query($con,"SELECT * FROM `doctors` WHERE `id`='$row[doctor_id]'");
										$row2=mysqli_fetch_array($res2);
								?>
									<tr>
									<td><?php  echo $i;?></td>
									<td><?php  echo $row1['name'];?></td>
									<td><?php  echo $row2['name'];?></td>
									<td><?php  echo $row['amount'];?></td>
									<td><?php  echo $row['cardnumber'];?></td>
									<td><?php  echo $row['card_type'];?></td>
									<td><?php  echo $row['date'];?></td>
									</tr>
								<?php
								$i++;
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
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