<?php
include("header.php");
include("nav.php");
$con=mysqli_connect("localhost","root","","blood");
?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

<?php
		if(isset($_REQUEST['rid']))
		{
		$rid=$_REQUEST['rid'];
		mysqli_query($con,"DELETE FROM hospital WHERE id='$rid'");
		}

		?>
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
                  <li class="breadcrumb-item active">View Hospitals
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
										<th scope="col">Hospital Name</th>
										<th scope="col">Location</th>
										<th scope="col">Email</th>
										<th scope="col">Phone</th>
										<th scope="col">Delete</th>
									</tr>
								</thead>
								<tbody>
									
								
								<?php
								

								$res=mysqli_query($con,"SELECT * FROM `hospital`");
								$i=1;
								while($row=mysqli_fetch_array($res))
									{
								?>
									<tr>
									<td><?php  echo $i;?></td>
									<td><?php  echo $row['name'];?></td>
									<td><?php  echo $row['location'];?></td>
									<td><?php  echo $row['email'];?></td>
									<td><?php  echo $row['phone'];?></td>
									<td><a href="?rid=<?php  echo $row['id'];?>">remove</a></td>
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