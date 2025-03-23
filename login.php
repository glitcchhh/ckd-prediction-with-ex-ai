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

                <h4 class="h-bold">	Login Form</h4>
                <p>
				<?php
						error_reporting(0);
						if($_REQUEST['st']=="fail")
						{
							echo"<div class='alert alert-danger ' role='alert'>
							<center><b>Incorrect Username or Password!<b></center>
						</div>";
						}
						?>
				<center>
				<form method="POST" action="check.php">

			
				<input type='text' class="form-control" name='email' placeholder="Email" ><br>
				<input type='password' class="form-control"  name='password'  placeholder="Password" ><br>
				<select name="type" class="form-control">
																	<option value="#">Select User Type</option>

								<option value="Admin">Admin</option>
								<option value="User">User</option>
								<option value="Doctor">Doctor</option>
								<option value="Hospital">Hospital</option>

								</select>
				<br><br>
				</table>
				<br>
				<br>
								<input type="submit" name="submit" class="btn btn-primary" value="Login">

					</form>

<?php 


 
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