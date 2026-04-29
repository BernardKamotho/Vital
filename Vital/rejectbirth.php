<?php
   
       session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	     if ($role =='Registrar'){
	     	echo "<a href ='logout.php'>Logout</a>";
	        echo "Welcome $username Logged in as $role";
            include 'header_admin.php';

           $notification_no = $_GET['id'];

           include 'connect.php';


           $CreateSql = "UPDATE birthcertificat_app_form SET status = 'Rejected', approved_by = '$username' WHERE notification_no = '$notification_no'";

             $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

			   	if($res){
					$smsg = "User Updated Successfully.";
					echo "$smsg <br>";
				
				}else{
					$fmsg = "User not be updated, please try again later.";
					echo "$smsg";
				}
               }

           else {
      	 session_destroy();
      	 header("location:index.php");
      }

      }

?>







