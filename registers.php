<?php
include("header.php");


?>
<br><br><br>


 <!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">

      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
              <div class="box text-center">

                <h4 class="h-bold">	Register Form</h4>
                <p>
				<center>
				<form method="POST" action="">

							<input type='text' class="form-control"  name='name'  placeholder=" Name" required ><br>
				<input type='text' class="form-control"  name='address'  placeholder="Address" required ><br>
				<input type='text' class="form-control"  name='phone' pattern="[0-9]{10}"  placeholder="Phone Number"  required><br>

				<input type='email' class="form-control" name='email' placeholder="Email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" required ><br>
				<input type='password' class="form-control"  name='password' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="Password" required ><br>
				
				<br><br>
				</table>
				<br>
				<br>
								<input type="submit" name="submit" class="btn btn-primary" value="Register">

					</form>
				

<?php 


 
 ?>
 
 <?php
 $con=mysqli_connect("localhost","root","","blood");
 if(isset($_POST['submit']))
 {
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$email=$_POST['email'];
$password=$_POST['password'];

 
 
 $ins="INSERT INTO register(name,phone,address,email,password)
	VALUES('$name','$phone','$address','$email','$password')";
	$res= mysqli_query($con,$ins);
	
	 if($res)
	{
	   echo "<script>
	   alert('Registered successfully');
	   window.location='login.php';
	   
	   
	   </script>";
	}
 }
 ?>
 
				</center>
                </p>
				
              </div>
            </div>
          </div>

        
        </div>
      </div>

    </section>




























<?php
include("footer.php");


?>