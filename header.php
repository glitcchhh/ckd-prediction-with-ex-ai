<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Medicio landing page template for Health niche</title>

  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="css/animate.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="color/default.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


  <div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Call us now +62 008 65 001</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
          <a class="navbar-brand" href="index-2.php">
                    <img src="img/logo.png" alt="" width="150" height="40" />
                </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
		  <?php
				   	session_start();
	   error_reporting(0);
	  //echo $_SESSION['usertype'];
	if($_SESSION['usertype']=="Admin")
	   {
	   ?>
	   
	               <li class="active"><a href="admin/addhospital.php">Add Hodpital</a></li>
					<li><a href="admin/viewusers.php">View Users</a></li>
					<li><a href="admin/excercise.php">Add  Exercise</a></li>

	               <li ><a href="logout.php">Logout</a></li>

	   
	   
	   
	   
	     <?php
	   }
	elseif($_SESSION['usertype']=="User")
		{
	   
	   ?>
	   
	   	    <li class="active"><a href="user/viewhospital.php">View Hospital</a></li>
					<li><a href="user/viewexercise.php">View Exercise</a></li>

	               <li><a href="logout.php">Logout</a></li>

	   
	   
	   
	     <?php
	   }
	elseif($_SESSION['usertype']=="Doctor")
		{
	   
	   ?>
	   <li class="active"><a href="doctor/viewappointment.php">View Appointment</a></li>
	               <li><a href="logout.php">Logout</a></li>

	   
	    
	     <?php
	   }
	elseif($_SESSION['usertype']=="Hospital")
		{
	   
	   ?>
	    <li class="active"><a href="hospital/doctor.php">Add Doctor</a></li>
					
	    <li><a href="logout.php">Logout</a></li>

	   <?php
		}
		else
		{
	   ?>
	   
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="registers.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
            <?php
		}
			?>
              <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index-2.php">Home CTA</a></li>
                <li><a href="index-form.php">Home Form</a></li>
                <li><a href="index-video.php">Home video</a></li>
              </ul>
            </li>-->
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>