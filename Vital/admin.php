<?php
     session_start();
      //echo "here: ".$_SESSION['username'];
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	         
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	     if ($role=="Admin" || $role =='Registrar') {
	     	echo "<a href ='logout.php'>Logout</a>";
	        echo "Welcome $username Logged in as $role";
	         include 'header_admin.php';
          }

           else {
      	 session_destroy();
      	 header("location:index.php");
      }
      }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

   <h2 class="alert alert-dark text-center">Admin Portal</h2>
   <section class="row">
   	   <div class="col-md-4">
   	   	
   	   </div>


   	    <div class="col-md-4">
   	   	     <h3>Create Users</h3>
   	   	     <form method="POST">
   	   	     	  <input type="text" name="username" placeholder="Enter Username" class="form-control" 
   	   	     	  required="">
   	   	     	  <br><br>

   	   	     	  <input type="password" name="password1" placeholder="Enter Password" class="form-control" required="" minlength="8" maxlength="8">
   	   	     	  <br><br>

   	   	     	  <input type="password" name="password2" placeholder="Confirm Password" class="form-control" required="" minlength="8" maxlength="8">
   	   	     	  <br><br>

   	   	     	  <input type="email" name="email" placeholder="Enter Email" class="form-control" required="">
   	   	     	  <br><br>


                   <?php
                   if ($_SESSION['role'] =='Admin' || $_SESSION['role'] =='Registrar') {
                          echo "<label>Select User Role</label><br>";
                          echo " <select name='role' required='' class='form-control'>";
                          

                            if ($_SESSION['role'] =='Admin') {
                                echo "<option>Admin</option>";
                                echo "<option>Registrar</option>";
                            }
                            

                          	echo "<option>Hospital</option>";
                            echo "<option>Chief</option>";
                            echo "<option>HospitalD</option>";
                    
                            echo "</select>";
                            echo "<br><br>";
                        }
                    ?>
                   <input type="number" name="id_number" placeholder="Enter ID Number" class="form-control" required="" minlength="8" maxlength="8">
                   <br><br>


                  <input type="submit" class="btn btn-success" name="" value="Create User">

   	   	     </form>


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

            $random = rand(10,100);

               	$CreateSql = "INSERT INTO `users` (username, password, email,role,id_number, ussd_pin) 
          				VALUES ('$username', '$password1', 
          				'$email', '$role','$id_number','$username.$random')";

          			    $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

          			   	if($res){
          					$smsg = "New User Created Successfully.";
          					echo "$smsg <br>";
          					echo "Username : $username   Password : $password1";
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