

<!DOCTYPE html>
<html>
<head>
	<title>Admin Update</title>
<!-- Latest compiled and minified CSS -->
</head>
<body>

  <?php
  require_once('connect.php');
	
  $id = $_GET['id'];
  
  $role =  "Admin";
  if ($role =='Admin') {
  $SelSql = "SELECT * FROM `users` WHERE id='$id'";
   }

   elseif ($role =='Registrar') {
     $SelSql = "SELECT * FROM `users` WHERE id='$id'  AND role != 'Admin' AND role != 'Registrar'";
   }



  $res = mysqli_query($connection, $SelSql);
   
   //count how many rows reeturned
    if (mysqli_num_rows($res) < 1) {
    	echo "<br>Your session might have expired! or accessing the wrong resource";
    	exit();
    } 

    $r = mysqli_fetch_assoc($res);

  ?>

<!--  value="<?php echo $r['first_name'];?>" -->

 <section class="row">
   	   <div class="col-md-4">
   	   	
   	   </div>


   	    <div class="col-md-4">
   	   	     <h3>Update Users</h3>
   	   	     <form method="POST">
   	   	     	  <input type="text" name="username" placeholder="Enter Username" class="form-control" 
   	   	     	  required="" value="<?php echo $r['username'];?>">
   	   	     	  <br><br>

   	   	     	  <input type="password" name="password1" placeholder="Enter Password" class="form-control" 
   	   	     	  required="" value="<?php echo $r['password'];?>">
   	   	     	  <br><br>

   	   	     	  <input type="password" name="password2" placeholder="Confirm Password" class="form-control" 
   	   	     	  required="" value="<?php echo $r['password'];?>">
   	   	     	  <br><br>

   	   	     	  <input type="email" name="email" placeholder="Enter Email" class="form-control" 
   	   	     	  required="" value="<?php echo $r['email'];?>">
   	   	     	  <br><br>


                  <input type="submit" class="btn btn-success" name="" value="Update User" 
                  onClick="return confirm('Please confirm Update');"   >

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
           
            if ($role =='Admin') {
        
               	$CreateSql = "UPDATE  `users` SET username = '$username', password = '$password1', email = '$email' WHERE id = '$id'";

                $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

              if($res){
                $smsg = "User Updated Successfully.";
                echo "$smsg <br>";
                echo "Username : $username   Password : $password1";
              }else{
                $fmsg = "User not be updated, please try again later.";
                echo "$fmsg";
              }
             }
            
            elseif ($role =='Registrar') {
               $CreateSql = "UPDATE  `users` SET username = '$username', password = '$password1', email = '$email' WHERE id = '$id'  AND role != 'Admin' AND role != 'Registrar'";

               $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

                if($res){
                $smsg = "User Updated Successfully.";
                echo "$smsg <br>";
                echo "Username : $username   Password : $password1";
              }else{
                $fmsg = "User not be updated, please try again later.";
                echo "$smsg";
              }
            }


			    

   	   	     ?>
   	   </div>

   	   <div class="col-md-4">
   	   	
   	   </div>
   </section>



</body>
</html>
