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
            <h3 class="content-header-title">Update Profile</h3>
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

				$res=mysqli_query($con,"SELECT * FROM `doctors` WHERE id='$_SESSION[did]'");
				$row=mysqli_fetch_array($res);
				
				$res1=mysqli_query($con,"SELECT * FROM `hospital` WHERE id='$row[hospname]'");
				$row1=mysqli_fetch_array($res1);
			  ?>
                  <div class="card-body">
                      <form method="POST" action="">
						<label>Name</label>
						<input type='text' class="form-control" value="<?php echo $row['name']; ?>"  name='name' placeholder="Name" ><br>
						<label>specialization</label>
						<input type='text' class="form-control" value="<?php echo $row['category']; ?>"  name='phone' placeholder="Phone" ><br>
						<label>Hospital</label>
						<input type='text' class="form-control" value="<?php echo $row1['name']; ?>"  name='specialization' placeholder="Specialization" ><br>
						<label>Phone</label>
						<input type='text' class="form-control" value="<?php echo $row['phno']; ?>"  name='specialization' placeholder="Specialization" ><br>
						<label>Email</label>
						<input type='text' class="form-control" value="<?php echo $row['email']; ?>"  name='consult' placeholder="Consultation Fees" ><br>
						
						<input type="submit" name="submit"class="btn btn-primary">
					  </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Basic Inputs end -->

<?php 



if(isset($_POST['submit']))
 {
	$a=$_POST['name'];
	$b=$_POST['phone'];
	$c=$_POST['email'];
	$d=$_POST['hos'];
	$d=$_POST['spc'];
 
 
	$ins="UPDATE `doctors` SET `name`='$a',`email`='$c',`phno`='$b',`hospname`='$d' WHERE id='$_REQUEST[id]'"; 
	$res= mysqli_query($con,$ins);
	
	 if($res)
	{
	   echo "<script>
	   alert('insert successfully');
	   window.location='profile.php';
	   
	   </script>";
	}
 }


?>



       </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

 <?php
 include("footer.php");
 ?>