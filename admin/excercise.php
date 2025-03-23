<?php
include("header.php");
include("nav.php");
?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Add Exercise</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Add Exercise
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
						<input type="text" required name="name" placeholder=" Name *" class="form-control"required><br>
                      	<textarea  required class="form-control" name="description" rows="3" cols="50"></textarea> 
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
include ("connection.php");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$des=$_POST['description'];
	
	
    $ins="insert into exercise(name,description) values('$name','$des')";

    if(mysqli_query($con,$ins))
		{
			
			echo "<script>
			alert('insert successfully')

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