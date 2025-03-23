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
            <h3 class="content-header-title">Add Consultation</h3>
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
							<div class="col-xl-9 col-lg-9 col-md-12">
							  <div class="card">
								  <div class="card-block">
									  <div class="card-body">
										  <form method="POST" enctype="multipart/formdata">
											<!-- Form start -->
											<div class="row">
												<div class="well-title">
													<h4>Payment Info</h4>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label" for="name">Doctor Name</label>
														<input  name="doc" type="doctor" placeholder="Card Holder" value="<?php echo $_SESSION['docname']; ?>" readonly class="form-control input-md" required>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label" for="name">Consultation Fees</label>
														<input  name="fee" type="text" placeholder="Card Holder" value="<?php echo $_SESSION['fee']; ?>" readonly class="form-control input-md" required>
													</div>
												</div>
												
												<div class="well-title">
													<h4>Card Info</h4>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label" for="name">Card Type</label>
														<select name="card" class="form-control input-md">
														  <option value="">-- Select --</option>
														  <option value="debit">Debit </option>
														  <option value="credit">Credit</option>
														</select> 
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label" for="name">Card Holder</label>
														<input  name="holder" type="text" placeholder="Card Holder" class="form-control input-md" required>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label" for="name">Card Number</label>
														<input  name="num" type="text"  placeholder="Card Number" class="form-control input-md" pattern="[0-9]{16}" required>
													</div>
												</div>
												<!-- Text input-->
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="email">Expire Date</label>
														<select name="mm" class="form-control input-md">
														  <option value="">-- Select --</option>
														  <option value="1">01 </option>
														  <option value="2">02</option>
														  <option value="3">03</option>
														  <option value="4">04</option>
														  <option value="5">05</option>
														  <option value="6">06</option>
														  <option value="7">07</option>
														  <option value="8">08</option>
														  <option value="9">09</option>
														  <option value="10">10</option>
														  <option value="11">11</option>
														  <option value="12">12</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="email">.</label>
														<select name="yy" class="form-control input-md">
														  <option value="">-- Select --</option>
														  <option value="2022">2022 </option>
														  <option value="2023">2023 </option>
														  <option value="2024">2024 </option>
														  <option value="2025">2025</option>
														  <option value="2026">2026</option>
														</select> 
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label" for="email">CVV</label>
														<input  name="cvv" type="password"  placeholder="CVV" pattern="[0-9]{3}" class="form-control input-md" required>
													</div>
												</div>
												
												
												<!-- Button -->
												<div class="col-md-12">
													<div class="form-group">
														<center><button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button></center>
													</div>
												</div>
											</div>
										</form>
									  </div>
								  </div>
							  </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- Striped rows end -->


<?php
include ("connection.php");
if(isset($_POST['submit']))
{
	$card=$_POST['card'];
	$holder=$_POST['holder'];
	$num=$_POST['num'];
	$mm=$_POST['mm'];
	$yy=$_POST['yy'];
	$cvv=$_POST['cvv'];
	$fee=$_POST['fee'];
	
	date_default_timezone_set('Asia/Kolkata');
	$currentTime = date( 'Y-m-d h:i:s');

	
	$ins="INSERT INTO `payment`(`uid`, `doctor_id`, `hospital_id`,appointment_id,`amount`, `cardname`, `cardnumber`, `card_type`, `cardyear`, `cardmonth`, `cvv`, `date`, `status`) 
	values('$_SESSION[uid]','$_SESSION[docid]','$_SESSION[hosid]','$_REQUEST[id]','$fee','$holder','$num','$card','$yy','$mm','$cvv','$currentTime','completed')";
	//echo $ins;
	$res=mysqli_query($con,$ins);
	if($res)
	{
		mysqli_query($con,"UPDATE `appointment` SET `slot_status`='0' WHERE id='$_REQUEST[id]'");
	echo '<script>alert("Payment Succesful!")
			window.location="view-payment.php"
		  </script>'; 
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