<?php
//session_start();
include("header.php");
include("nav.php");

$con=mysqli_connect("localhost","root","","blood");
error_reporting(0);


date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['ccc']))
{
    $date = date('Y-m-d H:i:s');
    mysqli_query($con,"INSERT INTO chat(sid,message,date_time,userid,type) VALUES('$_REQUEST[id]','$_POST[msgd]','$date','$_SESSION[did]','doctor')");
	//echo "INSERT INTO chat(sid,message,date_time,userid) VALUES('$_REQUEST[id]','$_POST[msgd]','$date','$_SESSION[uid]')";
    header("location:chat.php?id=$_REQUEST[id]");
}
?>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}

.rh_page__main {
    width: 100%;
}


        .chat-wrapper{
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 10px;
            height: 400px;
            overflow-y: scroll;
            flex-direction: column;
            display: flex;
            flex-direction: column-reverse; /* Reverse the order of the messages */
        }

        .message-wrapper {
            margin-bottom: 10px;
        }

        .message-bubble {
            display: inline-block;
            max-width: 70%;
            padding: 10px;
            border-radius: 10px;
            color: #434242;
            font-size: 14px;
        }

        .message-bubble1 {
            display: inline-block;
            max-width: 70%;
            padding: 10px;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
        }

        .sent-bubble {
            background-color: #0695FF;
            align-self: flex-end;
        }

        .received-bubble {
            background-color: #fff;
            align-self: flex-start;
        }

        .message-time {
            font-size: 12px;
            color: #777;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .message-input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 14px;
        }

        .send-button {
            background-color: #5BC0F8;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 50%;
            margin-left: 5px;
            cursor: pointer;
        }

        .send-button i {
            font-size: 16px;
        }

        .chat-header {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 10px;
        }

        .chat-header-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .chat-header-name {
            font-weight: bold;
        }
		
		.container {
			width: 768px;
		}
    </style>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">View Appointments</h3>
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
		<section id="html-headings-default" class="row match-height">
    <div class="col-sm-12 col-md-8">
        <div class="card">
            <div class="card-header">
               <div class="container">
					<?php
					if($_REQUEST['id']!='')
					{
					?>
					
					<!-- Chat Header -->
					<?php
					$sel = mysqli_query($con, "SELECT * FROM `register` WHERE id='$_REQUEST[id]'");
					while ($row = mysqli_fetch_array($sel)) {
					?>
					<div class="chat-header">
						<h3><a title="">User :<?php echo $row['name'] ?></a></h3>
					</div>
					<?php
					}
					?>
					<!-- Chat Messages -->
					<div class="chat-wrapper" id="message">
						<?php
						$sel = "SELECT * FROM chat WHERE (userid='$_SESSION[did]' and sid='$_REQUEST[id]')  OR  (userid='$_REQUEST[id]' and sid='$_SESSION[did]')  ORDER BY id DESC";
						//echo $sel;
						$result = mysqli_query($con, $sel);
						$rows = mysqli_num_rows($result);
						while($row = mysqli_fetch_array($result))
						{
							$time24Hr = $row['date_time']; 
							$time12Hr = date("h:i A", strtotime($time24Hr));
							if($row['type'] == 'doctor')
							{
								echo "<div class='message-wrapper sent' style='text-align:right'>";
								echo "<div class='message-bubble1 sent-bubble' style='text-align:right'>";
								echo "<span class='message-text' style='text-align:right'>$row[message]</span>";
								echo "<br>";
								echo "<span class='message-time' style='text-align:right'>$time12Hr</span>";
								echo "</div>";
								echo "</div>";
							}
							else
							{
								echo "<div class='message-wrapper received'>";
								echo "<div class='message-bubble received-bubble'>";
								echo "<span class='message-text'>$row[message]</span>";
								echo "<br>";
								echo "<span class='message-time'>$time12Hr</span>";
								echo "</div>";
								echo "</div>";
							}
						}
						?>
					</div>
					<!-- Message Input -->
					<form action="" method="post">
						<div class="input-wrapper">
							<input type="text" class="message-input" name="msgd" placeholder="Message" required>
							<button type="submit" class="send-button" name="ccc"><i class="fa fa-paper-plane">Send</i></button>
						</div>
					</form>
					
					<?php
					}
					?>
				</div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card">
           <div class="card-header">
              <h4>Users</h4>
				<?php
				$sel="select distinct sid from chat where userid='$_SESSION[did]' and type='user'";
				//echo $sel;
				$result = mysqli_query($con,$sel);
				while($row = mysqli_fetch_array($result))
				{
					$s1=mysqli_query($con,"select * from register where id='$row[sid]'");
					$cc=mysqli_fetch_array($s1);
				?>
				<p><a href="chat.php?id=<?php echo $row['sid']; ?>"><?php echo $cc['name']; ?></a></p>
				<?php
				}
				?>
            </div> 
        </div>
    </div>
</section>
<!--/ Headings -->
<!-- Striped rows end -->


       </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

 <?php
 include("footer.php");
 ?>