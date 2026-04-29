<?php
   
       session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	     if ($role=="Admin" || $role =='Registrar' || $role=="Chief" || $role =='Hospital'){
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
	<title>eVital</title>
</head>
<body>

   <h2 class="alert alert-dark text-center">Online Portal</h2>
   <section class="row">
   
   	    <div class="col-md-12">
   	   	     <h3>My Not - Approved Applications</h3>
   	   	     <form method="POST">
   	   	     	  <input type="text" name="notification_no" placeholder="Enter Notication No to search" 
                class="form-control" 
   	   	     	  >

                or 

                 <input type="text" name="applicant_idno" placeholder="Enter Applicant ID to search" 
                class="form-control" 
                >
   	   	
   	   	     	  <br><br>
                <input type="submit" class="btn btn-success" name="" value="View Application">

   	   	     </form>


   	   	     <?php
   	   	       include 'connect.php';
               
               //on page load

               if (empty($_POST['notification_no'])) {
               	   $_POST['notification_no'] = '';
               }

                if (empty($_POST['applicant_idno'])) {
                   $_POST['applicant_idno'] = '';
               }



               //search
               //if (isset($_POST['username']) || isset($_POST['email'])) {
           
               $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE who_saved = '$username' and status = 'Not Approved'";
               
  
               if (!empty($_POST) and $_POST['notification_no'] != '') {
                 $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE who_saved = '$username' and status = 'Not Approved' and notification_no ='".$_POST['notification_no']."'";
               }


                if (!empty($_POST) and $_POST['applicant_idno'] != '') {
                 $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE who_saved = '$username' and status = 'Not Approved' and applicant_idno ='".$_POST['applicant_idno']."'";
                }


              
               $res = mysqli_query($connection, $ReadSql); 
               
                if (mysqli_num_rows($res) < 1) {
                   echo "Error! No Records";
                   exit();
                }

                echo "<table class='table'>";
                echo "<tr>";
              
                   echo "<th>Notification No</th>";
                   echo "<th>Child Firstname</th>";
                   echo "<th>Child Secondname</th>";
                   echo "<th>Child Surname</th>";
                   echo "<th>DOB</th>";
                   echo "<th>Gender</th>";
                   echo "<th>Type of Birth</th>";
                   echo "<th>Place of Birth</th>";
                   echo "<th>District</th>";
                   echo "<th>B-alive</th>";
                   echo "<th>B-Dead</th>";
                   echo "<th>Father Names</th>";
                   echo "<th>Mother Names</th>";
                  


                   echo "</tr>";
                    while($r = mysqli_fetch_assoc($res)){
                            echo "<tr>";
                            echo "<td>".$r['notification_no'] ."</td>";
                            echo "<td>".$r['cfname']."</td>"; 
                            echo "<td>".$r['cmname']."</td>";
                            echo "<td>".$r['csurname']."</td>";
                            echo "<td>".$r['dob']."</td>";
                            echo "<td>".$r['gender']."</td>";
                            echo "<td>".$r['tob']."</td>";
                            echo "<td>".$r['pob']."</td>";
                            echo "<td>".$r['district']."</td>";
                            echo "<td>".$r['balive']."</td>";
                            echo "<td>".$r['bdead']."</td>";
                            echo "<td>".$r['father_name']."</td>";
                            echo "<td>".$r['mother_name']."</td>";
                            echo "</tr>";

                            echo "<tr>";
                             echo "<th>State of Birth.</th>";
                             echo "<th>Residence</th>";
                             echo "<th>Applicant Id No</th>";
                             echo "<th>Applicant Tel.</th>";
                             echo "</tr>";

                             echo "<tr>";

                            echo "<td>".$r['sob']."</td>";
                            echo "<td>".$r['residence']."</td>";
                            echo "<td>".$r['applicant_idno']."</td>";
                            echo "<td>".$r['applicant_phone']."</td>";

                           echo "</tr>";  

                                                                           echo "<tr>";
  echo "<td class = 'bg-info'>  <span class = 'badge badge-info'></span>  </td>";
                          echo "</tr>";
                    }
                    echo "</table>";
                

               //}

   	   	     ?>




   	   </div>

   	
   </section>
</body>
</html>