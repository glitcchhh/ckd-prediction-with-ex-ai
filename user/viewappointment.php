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
            <h3 class="content-header-title">View Appointments</h3>
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
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Hospital Name</th>
										<th>Doctor Name</th>
										<th>Problem</th>
										<th>Date</th>
										<th>Status</th>
										<th>Payment</th>
									</tr>
								</thead>
								<tbody>
									
								<?php
								$con=mysqli_connect("localhost","root","","blood");

								$res=mysqli_query($con,"SELECT * FROM `appointment` WHERE uid='$_SESSION[uid]'");
								$i=1;
								while($row=mysqli_fetch_array($res))
								{
								$res1=mysqli_query($con,"SELECT * FROM hospital where id='$row[hospitalname]'");
								//echo "SELECT * FROM hospital where id='$row[hospitalname]'";
								$row1=mysqli_fetch_array($res1);	
								
								$res2=mysqli_query($con,"SELECT * FROM `doctors` where id='$row[doctor_id]'");
								//echo "SELECT * FROM hospital where id='$row[hospitalname]'";
								$row2=mysqli_fetch_array($res2);	
													
								$_SESSION['hosid']=$row1['id'];
								$_SESSION['docid']=$row2['id'];
								$_SESSION['docname']=$row2['name'];
								$_SESSION['fee']=$row2['consultation_fee'];
								
								?>
								<tr>
								<td><?php  echo $i;?></td>
								<td><?php  echo $row1['name'];?></td>
								<td><?php  echo $row2['name'];?></td>
								<td><?php  echo $row['problem'];?></td>
								<td><?php  echo $row['date'];?></td>
								<td><?php  echo $row['status'];?></td>
								
								
								
								<?php
								if ($row['status'] == "Approved") {
									$q = mysqli_query($con, "SELECT * FROM payment WHERE appointment_id='$row[id]'");
									//echo "SELECT * FROM payment WHERE appointment_id='$row[id]'";
									$c = mysqli_fetch_array($q);
									if ($c['status'] == 'completed') {
										echo "<td>Payment completed</td>";
									} else {
										?>
											<td>
												<a href="payment.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Payment</a>
											</td>
											</tr>
										<?php
									}
								}
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