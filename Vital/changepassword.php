<?php
     
     session_start();
     if (!isset($_SESSION['username'])) {
         echo "Please Login <a href = 'index.php'>Login Screen</a>";
         exit(); die();
     }

     else {
       $role =$_SESSION['role'];
       $username =$_SESSION['username'];

       if ($role=="Admin" || $role =='Registrar' || $role =='User' || $role =='Chief' || $role =='Hospital' || $role =='Licensed Practioner' || $role =='HospitalD' || $role =='Pathologist') {
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

   
   <section class="row">
   	   <div class="col-md-4">
   	   	
   	   </div>
         

   	    <div class="col-md-4">
          <br><br>
   	   	     <h5>Change Password</h5>
   	   	     <form method="POST">
   	   	     	  <input type="text" name="curr_password" placeholder="Enter Current Password" class="form-control" 
   	   	     	  required="" minlength="8" maxlength="8">
   	   	     	  <br><br>

   	   	     	  <input type="password" name="password1" placeholder="Enter Password" class="form-control" required="" minlength="8" maxlength="8">
   	   	     	  <br><br>

   	   	     	  <input type="password" name="password2" placeholder="Confirm Password" class="form-control" required="" minlength="8" maxlength="8">
   	   	     	  <br><br>

                <input type="submit" class="btn btn-success" name="" value="Change Password">

   	   	     </form>
          


   	   	     <?php
   	   	       include 'connect.php';
               if (empty($_POST)) {
               	exit();
               }

                extract($_POST);


                $CreateSql2 = "SELECT * FROM users WHERE username = '$username'";

                $res1 = mysqli_query($connection, $CreateSql2);

                 if (mysqli_num_rows($res1) < 1) {
                   echo "User Not Found";
                   exit();
                }

                else {

                $colm = mysqli_fetch_array($res1);
                if ($colm[2] != $curr_password) {
                   echo "Current password is wrong";
                   exit();
                }

                else {
                    if ($password1!=$password2) {
                      echo "Password do not match";
                      exit();
                    }


                   $CreateSql = "UPDATE users SET password = '$password1' WHERE username = '$username'";

                    $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

                    if($res){
                    $smsg = "Password Changed Successfully.";
                    echo "$smsg <br>";
                
                  }else{
                    $fmsg = "Password Not Changed Successfully";
                    echo "$smsg";
                  }

                }//end inner else


                }//else

   	   	     ?>
   	   </div>

   	   <div class="col-md-4">
   	   	
   	   </div>
   </section>










</body>
</html>