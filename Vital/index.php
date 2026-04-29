<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>eVital</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST">
					<span class="login100-form-title">
						eVital
						<h4>Birth Registration System</h4>
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="forgot.php" class="txt2">
							Username / Password?
						</a>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Need an Account?
						</span>

						<a href="user.php" class="txt2">
							Create
						</a>
					</div>


					<div class="container-login100-form-btn">
						<input type="submit"  class="login100-form-btn" value="Login">
					</div>
				</form>
<?php
          
  require_once('connect.php');
   //check capture


 if (isset($_POST['username']) and isset($_POST['password'])){
     $username = mysqli_real_escape_string($connection, $_POST['username']);
     $password = mysqli_real_escape_string($connection, $_POST['password']);
     echo $username;

	 $ReadSql = "SELECT * FROM `users` WHERE username = '$username' and password = '$password'";	
	 //execute yor query 
	 $res = mysqli_query($connection, $ReadSql); 
	 $row = mysqli_fetch_array($res);
     //count how many rows found
	  if (mysqli_num_rows($res) == 1) {
	       
	    
	        $_SESSION['username'] = $username;
	        $_SESSION['role']  = $row[4];
	        if ($row[4]=='Admin') {
	           // echo "ok";
	            //echo $_SESSION['username'];
	            echo "<script>window.location.href='admin.php';</script>";
	        }

	        else  if ($row[4]=='Registrar') {
	        	echo "<script>window.location.href='admin.php';</script>";;
	        }

	         else  if ($row[4]=='Chief') {
	             echo "<script>window.location.href='birthappl.php';</script>";
	        //	header('location:birthappl.php');
	        }

	          else  if ($row[4]=='User') {
	          	$_SESSION['id_number']  = $row[5];
	          	 echo "<script>window.location.href='userapplications.php';</script>";
	        //	header('location:userapplications.php');
	        }

	           else  if ($row[4]=='HospitalD') {
	          	$_SESSION['id_number']  = $row[5];
	        	//header('location:deathapp/applydeathpractioner.php');
	        		 echo "<script>window.location.href='deathapp/applydeathpractioner.php';</script>";
	        
	        }

	           else  if ($row[4]=='Licensed Practioner') {
	          	$_SESSION['id_number']  = $row[5];
	        	//header('location:deathapp/licensed_practioner.php');
	        	 echo "<script>window.location.href='deathapp/licensed_practioner.php';</script>";
	        
	        }

	         else  if ($row[4]=='Pathologist') {
	          	$_SESSION['id_number']  = $row[5];
	        //	header('location:deathapp/pathologist.php');
	        	 	 echo "<script>window.location.href='deathapp/pathologist.php';</script>";
	        
	        }
	        
       }//end if

       else{
       	echo "Wrong Username or Password";
       }//end else

	  }//end if 
?>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>