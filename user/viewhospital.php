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
            <h3 class="content-header-title">View Hospitals</h3>
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
										<th>Email</th>
										<th>Specialization</th>
										<th>Phone</th>
										<th>Chat</th>
										<th>Appointment</th>
									</tr>
								</thead>
								<tbody>
									
								
								<?php
								$con=mysqli_connect("localhost","root","","blood");

								$res=mysqli_query($con,"SELECT * FROM doctors");
								$i=1;
									 while($row=mysqli_fetch_array($res))
									{
									$res1=mysqli_query($con,"SELECT * FROM hospital where id='$row[hospname]'");

									$row1=mysqli_fetch_array($res1);						
													
								
								
								?>
								<tr>
								<td><?php  echo $i;?></td>
								<td><?php  echo $row1['name'];?></td>
								<td><?php  echo $row['name'];?></td>
								<td><?php  echo $row['email'];?></td>
								<td><?php  echo $row['category'];?></td>
								<td><?php  echo $row['phno'];?></td>
								<td><a href="chat.php?id=<?php echo $row['id']; ?>">Chat</a></td>
								<td><a href="slot.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Request</a></td>

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