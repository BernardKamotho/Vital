<?php
      
       session_start();
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
             require_once('connect.php');

			  $id = $_GET['id'];

			   if ($role =='Registrar') {
                  $ReadSql = "SELECT * FROM `users` WHERE username LIKE '%$username%' 
                  AND role != 'Admin' AND role != 'Registrar'";
               }

              if ($role =='Admin') {
			      $DelSql = "DELETE FROM `users` WHERE id='$id' ";
              }

              elseif ($role == 'Registrar') {
              	   $DelSql = "DELETE FROM `users` WHERE id='$id'  AND role != 'Admin' AND role != 'Registrar'";
              }



		      //execute query
			  $res = mysqli_query($connection, $DelSql);

				    if($res){
				      echo "User id $id has been deleted <a href = 'adminuserview.php'>Back to Users</a>";
					
					}else{
					echo "Failed to delete";
					}
		      } 
		      else {  echo "Require Admin Previlleges.";
		       echo "Please Login as admin<a href = 'index.php'>Login Screen</a>";
              }

          }//end if admin

      

	   
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>





</body>
</html>