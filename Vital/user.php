
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
      <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

   <span class="login100-form-title">
            eVital
            <h4>Birth/Death Registration System</h4>
          </span>
          <br><br><br><br><br><br><br>
   <section class="row">
   	   <div class="col-md-4">
   	   	
   	   </div>
         

   	    <div class="col-md-4">
   	   	     <h5>Create Account</h5>
   	   	     <form method="POST">
   	   	     	  <input type="text" name="username" placeholder="Enter Username" class="form-control" 
   	   	     	  required="">
   	   	     	  <br><br>

   	   	     	  <input type="password" name="password1" placeholder="Enter Password" class="form-control" required="">
   	   	     	  <br><br>

   	   	     	  <input type="password" name="password2" placeholder="Confirm Password" class="form-control" required="">
   	   	     	  <br><br>

   	   	     	  <input type="email" name="email" placeholder="Enter Email" class="form-control" required="">
   	   	     	  <br><br>

                <i class="text-muted">* Use Id number used in birth certificate registration</i> 
                <input type="number" name="id_number" placeholder="Enter ID Number" class="form-control" required="">
                   <br><br>


                <input type="submit" class="btn btn-success" name="" value="Create User">

   	   	     </form>


               <div class="text-right p-t-13 p-b-23">
              <span class="txt1">
                Already Registered
              </span>

              <a href="index.php" class="txt2">
                Login
              </a>
            </div>


   	   	     <?php
   	   	       include 'connect.php';
               if (empty($_POST)) {
               	exit();
               }

                extract($_POST);

                if ($password1!=$password2) {
                	echo "Password do not match";
                	exit();
                }


               	$CreateSql = "INSERT INTO `users` (username, password, email,role,id_number) 
          				VALUES ('$username', '$password1', 
          				'$email', 'User','$id_number')";

          			    $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

          			   	if($res){
          					$smsg = "New User Created Successfully.";
          					echo "$smsg <br>";
          			
          				}else{
          					$fmsg = "User not created, please try again later.";
          					echo "$smsg";
          				}

   	   	     ?>

   	   </div>

   	   <div class="col-md-4">
   	   	
   	   </div>
   </section>










</body>
</html>