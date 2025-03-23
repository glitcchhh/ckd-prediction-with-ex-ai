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
            <h3 class="content-header-title">View Users</h3>
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
							<div class="wow fadeInUp" data-wow-delay="0.2s">
								<div class="box ">
								<?php
								$con=mysqli_connect("localhost","root","","blood");
								$res1=mysqli_query($con,"SELECT * FROM `doctors` WHERE `id` = '$_REQUEST[id]'");
								$row1=mysqli_fetch_array($res1);
								?>
								<h3 class="h-bold text-center">	Available Time Slots</h3>
									<h5>Doctor Name: <?php echo $row1['name']; ?></h5>
									<h5>Specialization: <?php echo $row1['category']; ?> </h5>
								
									<?php
									$res=mysqli_query($con,"SELECT * FROM `slot` WHERE `doc_id` = '$_REQUEST[id]'");
									//echo "SELECT * FROM `slot` WHERE `doc_id` = '$_REQUEST[id]'";
									$i=1;
									while($row=mysqli_fetch_array($res))
									{
										$sel3="select * from appointment where slot_id='$row[id]'";
										$res3=mysqli_query($con,$sel3);
										$row3= mysqli_fetch_array($res3);
										//echo "aa".$row['id'];
										$sid=$row['id'];
										if($row3['slot_status']=="1")
										{
										
									?>
									
									<a href="request.php?did=<?php echo $row1['id']; ?>&sid=<?php echo $sid; ?>" class="btn btn-danger disabled"><?php echo $row['slot']; ?></a>
									
									<?php
									}
									else
									{
									?>
									
									<a href="request.php?did=<?php echo $row1['id']; ?>&sid=<?php echo $sid; ?>" class="btn btn-success "><?php echo $row['slot']; ?></a>
									
									<?php
									}
									$i++;
									}
									?>
									<br><br>
								</div>
							</div>
						
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