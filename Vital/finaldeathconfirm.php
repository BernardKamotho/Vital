<?php
    
       session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	     if ($role=="User") {
	     	echo "<a href ='logout.php'>Logout</a>";
	        echo "Welcome $username Logged in as $role";
	          include 'usermenu.php';
          }

           else {
      	 session_destroy();
      	 header("location:index.php");

      }

      }
 
?>



             <?php
   	   	       include 'connect.php';
                $id = $_GET['id'];
              
                if ($role =='User') {
                   	$CreateSql = "UPDATE  `deathcertificate_form` SET user_applied = 'Applied' WHERE deceased_idno = '$id'";
                 }

        			    $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

        			   	if($res){
        					$smsg = "Application Updated Successfully. Your Death cerfiticate will ready in 2 weeks time. Thank you.";
        					echo "$smsg <br> <a href = 'userdeathapplications.php'> Go to Your Applications</a>";
        					
          				}else{
          					$fmsg = "User not be updated, please try again later.";
          					echo "$smsg  <br>   <a href = 'userdeathapplications.php'> Go to Your Applications</a>";
          				}

   	   	     ?>