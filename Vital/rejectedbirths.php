<?php
   
       session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	     if ($role =='Registrar' || $role =='Admin'){
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
   	   	     <h3>Rejected Applications</h3>
             <i>Filter by;</i>
   	   	     <form method="POST" class="form-inline">
   	   	     	  <input type="text" name="notification_no" placeholder="Enter Notication No."  class="form-control" 
                 
   	   	     	  >

                or 

                 <input type="text" name="applicant_idno" placeholder="Enter Applicant ID No."  class="form-control" 
               
                >

                 or 

                 <input type="text" name="district" placeholder="Enter District."  class="form-control" 
               
                >

                  or 

                 <input type="date" name="start" placeholder="Enter start date."  class="form-control" 
                >
                  and

                 <input type="date" name="end" placeholder="Enter end date."  class="form-control" 
               
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

                if (empty($_POST['district'])) {
                   $_POST['district'] = '';
               }


              if (empty($_POST['start'])) {
                   $_POST['start'] = '';
               }


              if (empty($_POST['end'])) {
                   $_POST['end'] = '';
               }

               //search
               //if (isset($_POST['username']) || isset($_POST['email'])) {
           
               $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE status = 'Rejected'";
               

               if (!empty($_POST) and $_POST['notification_no'] != '') {
                 $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE status = 'Rejected' and notification_no ='".$_POST['notification_no']."'";
               }


                if (!empty($_POST) and $_POST['applicant_idno'] != '') {
                 $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE  status = 'Rejected' and applicant_idno ='".$_POST['applicant_idno']."'";
                }

                 if (!empty($_POST) and $_POST['district'] != '') {
                 $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE  status = 'Rejected' and district ='".$_POST['district']."'";
                }


                if (!empty($_POST) and $_POST['start'] != '' and $_POST['end'] != '') {
                 $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE  status = 'Rejected' and dob  BETWEEN '".$_POST['start']."' 
                 AND '".$_POST['end']."' ";
                }






                 

              
               $res = mysqli_query($connection, $ReadSql); 
               
                if (mysqli_num_rows($res) < 1) {
                   echo "Error! No Records";
                   exit();
                }

                $count = mysqli_num_rows($res);
                echo "Showing $count Records";

                echo "<table class='table'>";
               
                    while($r = mysqli_fetch_assoc($res)){

                       echo "<tr>";
              
                   echo "<th>Notification No</th>";
                   echo "<th>Firstname</th>";
                   echo "<th>Secondname</th>";
                   echo "<th>Surname</th>";
                   echo "<th>DOB</th>";
                   echo "<th>Gender</th>";
                   echo "<th>Type of Birth</th>";
                   echo "<th>Place of Birth</th>";
                   echo "<th>District</th>";
                   echo "<th>B-Alive</th>";
                   echo "<th>B-Dead</th>";
                   echo "<th>Father Names</th>";
                   
               


                   echo "</tr>";


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
                            
                            echo "</tr>";

                            echo "<tr>";
                            echo "<th>Mother Names</th>";
                                     echo "<th>State of Birth.</th>";
                                     echo "<th>Residence</th>";
                                     echo "<th>Appl. Id No</th>";
                                     echo "<th>Appl. Tel.</th>";
                                     echo "<th>Confirmed</th>";
                                     echo "<th>Capacity Info</th>";
                                     echo "<th>Reg. Assistant</th>";
                                     echo "<th>Reg. Name</th>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>".$r['mother_name']."</td>";
                            echo "<td>".$r['sob']."</td>";
                            echo "<td>".$r['residence']."</td>";
                            echo "<td>".$r['applicant_idno']."</td>";
                            echo "<td>".$r['applicant_phone']."</td>";
                            echo "<td>".$r['applicant_confirm']."</td>";
                            echo "<td>".$r['capc_info']."</td>";
                            echo "<td>".$r['reg_ass']."</td>";
                            echo "<td>".$r['reg_name']."</td>";
                              $id = $r['notification_no'];
                   
                            echo "<td><a class = 'btn btn-success' onClick=\"javascript: return confirm('Are you sure you want to Approve');\"   
                            href=approvebirth.php?id=$id>Approve</span></a></td>";
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