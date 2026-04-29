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
</head>
<body>

   <h2 class="alert alert-dark text-center">Admin Portal</h2>
   <section class="row">
   	   <div class="col-md-2">
   	   	
   	   </div>
   	    <div class="col-md-8">
   	   	     <h3>View Users</h3>
   	   	     <form method="POST">
   	   	     	  <input type="text" name="username" placeholder="Enter Username to search" 
                class="form-control" 
   	   	     	  >
   	   	
   	   	     	  <br><br>
                <input type="submit" class="btn btn-success" name="" value="View Users">

   	   	     </form>


   	   	     <?php
   	   	       include 'connect.php';
               
               //on page load

               if (empty($_POST['username'])) {
               	   $_POST['username'] = '';
               }


               //search
               //if (isset($_POST['username']) || isset($_POST['email'])) {
               $username = $_POST['username'];
             
               if ($role =='Registrar') {
                  $ReadSql = "SELECT * FROM `users` WHERE username LIKE '%$username%' 
                  AND role != 'Admin' AND role != 'Registrar'";
               }

               elseif ($role =='Admin') {
                 $ReadSql = "SELECT * FROM `users` WHERE username LIKE '%$username%'";
               }
  
              
               $res = mysqli_query($connection, $ReadSql); 
               
                if (mysqli_num_rows($res) < 1) {
                   echo "Error! No Records";
                   echo "<br/><b>Add New Users</b>  <a href = 'admin.php'>Click Here</a>";
                   exit();
                }

                echo "<table class='table'>";
                echo "<tr>";
              
                   echo "<th>ID Name</th>";
                   echo "<th>Username</th>";
                   echo "<th>Email</th>";
                   echo "<th>Role</th>";
                    echo "</tr>";
                    while($r = mysqli_fetch_assoc($res)){
                             echo "<tr>";
                        
                          echo "<td>".$r['id'] ."</td>";
                          echo "<td>".$r['username']."</td>"; 
                          echo "<td>".$r['email']."</td>";
                          echo "<td>".$r['role']."</td>";
                                  $id = $r['id'];
                 
                          echo "<td><a class = 'btn btn-success' href=adminupdate.php?id=$id>Update/Change</a></td>";

                          echo "<td><a class = 'btn btn-danger' onClick=\"javascript: return confirm('Please confirm deletion');\"   
                          href=admindelete.php?id=$id>Delete</span></a></td>";
                        echo "</tr>";  
                    }
                    echo "</table>";
                

               //}

   	   	     ?>




   	   </div>

   	   <div class="col-md-2">
   	   	
   	   </div>
   </section>
</body>
</html>