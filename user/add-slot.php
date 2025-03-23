<?php
session_start();
include("header.php");
include("nav.php");
?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Appointment Time</h3>
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
							<div class="col-xl-8 col-lg-8 col-md-12">
							  <div class="card">
								  <div class="card-block">
									  <div class="card-body">
										  <form method="POST" action="">
										    <label>Slot Time</label>
											<input type='text' class="form-control" name='start' placeholder="24hrs" ><br>
											<input type="submit" name="submit" class="btn btn-primary" value="Save">

										  </form>
										  
											<?php 

											$con=mysqli_connect("localhost","root","","blood");

											if(isset($_POST['submit']))
											 {
												$start=$_POST['start'];

											 
											 
											 $ins="INSERT INTO `slot`(`doc_id`, `slot`) VALUES ('$_SESSION[did]','$start')";
												//echo $ins;
												$res= mysqli_query($con,$ins);
												
											 }


											?>
										  
									  </div>
									  <table class="table table-striped table-bordered table-hover">
                           
											<tr>
												<th>Sl No.</th>	
												<th>Slots</th>
												<th>Delete</th>
												
											</tr>
								
											<?php
												
												$sel1="SELECT * FROM `slot` WHERE `doc_id`='$_SESSION[did]'";
												$res1=mysqli_query($con,$sel1);
												$i=1;
												while($row1=mysqli_fetch_array($res1))
												{

											?>
								   
											<tr>
												<td><?php echo $i?></td>
											   
											    <td><?php echo $row1['slot']?></td>
											 
												<td><a href="delete.php?id=<?php echo $row1['id'];?>">Delete</td>
											</tr>
                      
											<?php
											$i++;
											}
											?>
									  </table>
								  </div>
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