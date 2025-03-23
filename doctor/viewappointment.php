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
										<th scope="col">#</th>
										<th scope="col">Patient Name</th>
										<th scope="col">Age</th>
										<th scope="col">Gender</th>
										<th scope="col">Weight</th>
										<th scope="col">Height</th>
										<th scope="col">BMI</th>
										<th scope="col">Medical History</th>
										<th scope="col">Problem</th>
										<th scope="col">Date</th>
										<th scope="col">Status</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									
								
								<?php
								$con=mysqli_connect("localhost","root","","blood");
								
								$sel="SELECT * FROM appointment where doctor_id='$_SESSION[did]'";
								//echo $sel;
								$res=mysqli_query($con,$sel);
								
								$i=1;
									 while($row=mysqli_fetch_array($res))
									{
									$res1=mysqli_query($con,"SELECT * FROM register where id='$row[uid]'");

									$row1=mysqli_fetch_array($res1);	
									
									$res2=mysqli_query($con,"SELECT * FROM `user_info` WHERE `uid`='$row[uid]'");

									$row2=mysqli_fetch_array($res2);
													
									
								?>
								<tr>
								<td><?php  echo $i;?></td>
								<td><?php  echo $row1['name'];?></td>
								<td><?php  echo $row2['age'];?></td>
								<td><?php  echo $row2['gender'];?></td>
								<td><?php  echo $row2['weight'];?></td>
								<td><?php  echo $row2['height'];?></td>
								<td><?php  echo $row2['bmi'];?></td>
								<td><?php  echo $row2['medical_history'];?></td>
								<td><?php  echo $row['problem'];?></td>
								<td><?php  echo $row['date'];?></td>
								<td><?php  echo $row['status'];?></td>
								<?php
								if($row['status']=='pending')
								{
								?>
								<td><a href="approve.php?id=<?php echo $row['id']; ?>" class="btn btn-icon btn-success "><i class="la la-check"></i></a>
								<a href="reject.php?id=<?php echo $row['id']; ?>" class="btn btn-icon btn-danger mr-1"><i class="la la-times"></i></a></td>
								<?php
								}
								?>

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