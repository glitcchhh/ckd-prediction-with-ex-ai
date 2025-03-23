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
            <h3 class="content-header-title">Profile</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Add Doctor
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Inputs start -->
<section class="basic-inputs">
  <div class="row match-height">
      <div class="col-xl-8 col-lg-8 col-md-12">
          <div class="card">
              <div class="card-header">
              </div>
              <div class="card-block">
			  
			  <?php
			  //session_start();
			  $con=mysqli_connect("localhost","root","","blood");

				$res=mysqli_query($con,"SELECT * FROM `register` WHERE id='$_SESSION[uid]'");
				$row=mysqli_fetch_array($res);
			  ?>
                  <div class="card-body">
                      <form method="POST" action="">
						<label>Name</label>
						<input type='text' class="form-control" value="<?php echo $row['name']; ?>" readonly name='name' placeholder="Name" ><br>
						<label>Phone</label>
						<input type='text' class="form-control" value="<?php echo $row['phone']; ?>" readonly name='phone' placeholder="Phone" ><br>
						<label>Email</label>
						<input type='text' class="form-control" value="<?php echo $row['email']; ?>" readonly name='specialization' placeholder="Email" ><br>
						<label>Address </label>
						<input type='text' class="form-control" value="<?php echo $row['address']; ?>" readonly name='consult' placeholder="address" ><br>
						
						<a class="btn btn-primary" href="update_profile.php?id=<?php echo $row['id'];?>">Update</a></td>
					  </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Basic Inputs end -->



       </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

 <?php
 include("footer.php");
 ?>