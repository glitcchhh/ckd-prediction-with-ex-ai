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
            <h3 class="content-header-title">Add Doctor</h3>
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
                  <div class="card-body">
                      <form method="POST" action="">
						<input type='text' class="form-control" name='name' placeholder="Name" ><br>
						<input type='text' class="form-control" name='phone' placeholder="Phone" ><br>
						<input type='text' class="form-control" name='specialization' placeholder="Specialization" ><br>
						<input type='text' class="form-control" name='consult' placeholder="Consultation Fees" ><br>
						<input type='text' class="form-control" name='email' placeholder="Email" ><br>
						<input type='text' class="form-control"  name='password'  placeholder="Password" ><br>
						<br>
						<input type="submit" name="submit" class="btn btn-primary" value="Save">

					  </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Basic Inputs end -->

<?php 

$hid=$_SESSION['hid'];
 $con=mysqli_connect("localhost","root","","blood");
 if(isset($_POST['submit']))
 {
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$specialization=$_POST['specialization'];
$consult=$_POST['consult'];

 
 
 $ins="INSERT INTO doctors(name,phno,email,password,category,hospname,consultation_fee)
	VALUES('$name','$phone','$email','$password','$specialization','$hid','$consult')";
	//echo $ins;
	$res= mysqli_query($con,$ins);
	
	 if($res)
	{
	   echo "<script>
	   alert('insert successfully');
	   
	   
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