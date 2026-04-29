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
   	   	     <h3>Approved Death Applications</h3>
             <i>Filter by;</i>
   	   	     <form method="POST" class="form-inline">
   	   	     	  <input type="text" name="deceased_idno" placeholder="Enter Deceased id no"  class="form-control" 
                 
   	   	     	  >

                or 

                 <input type="text" name="permit_number" placeholder="Enter Burial Permit."  class="form-control" 
               
                >

                 or 

        
                 <input type="date" name="start" placeholder="Enter start date."  class="form-control" 
                >
                  and

                 <input type="date" name="end" placeholder="Enter end date."  class="form-control" 
               
                >

   	   	
   	   	     	  <br><br>
                <input type="submit" class="btn btn-success" name="" value="View Applications">

   	   	     </form>


   	   	     <?php
   	   	       include 'connect.php';
               
               //on page load

               if (empty($_POST['deceased_idno'])) {
               	   $_POST['deceased_idno'] = '';
               }

                if (empty($_POST['permit_number'])) {
                   $_POST['permit_number'] = '';
               }

    
              if (empty($_POST['start'])) {
                   $_POST['start'] = '';
               }


              if (empty($_POST['end'])) {
                   $_POST['end'] = '';
               }

               //search
               //if (isset($_POST['username']) || isset($_POST['email'])) {
           
               $ReadSql = "SELECT * FROM `deathcertificate_form` WHERE status = 'Approved' AND user_applied ='Applied'";
               

               if (!empty($_POST) and $_POST['deceased_idno'] != '') {
                 $ReadSql = "SELECT * FROM `deathcertificate_form` WHERE status = 'Approved' AND user_applied ='Applied' and deceased_idno ='".$_POST['deceased_idno']."'";
               }


                if (!empty($_POST) and $_POST['permit_number'] != '') {
                 $ReadSql = "SELECT * FROM `deathcertificate_form` WHERE  status = 'Approved' AND user_applied ='Applied' and permit_number ='".$_POST['permit_number']."'";
                }

                if (!empty($_POST) and $_POST['start'] != '' and $_POST['end'] != '') {
                 $ReadSql = "SELECT * FROM `deathcertificate_form` WHERE  status = 'Approved' AND user_applied ='Applied' and dod  BETWEEN '".$_POST['start']."' 
                 AND '".$_POST['end']."' ";
                }

                 
               $res = mysqli_query($connection, $ReadSql); 
               
                if (mysqli_num_rows($res) < 1) {
                   echo "Error! No Records";
                   exit();
                }

                $count = mysqli_num_rows($res);
                echo "Showing $count Records. Certificate Generared";
          


                echo "<table class='table'>";
                echo "<tr>";
              
                   echo "<th>Deceased ID.</th>";
                   echo "<th>Burial Permit.</th>";
                   echo "<th>Firstname</th>";
                   echo "<th>Secondname</th>";
                   echo "<th>Surname</th>";
                   echo "<th>DOD</th>";
                   echo "<th>Gender</th>";
                   echo "<th>Age</th>";
                   echo "<th>Occupation</th>";
                   echo "<th>Street</th>";
                   echo "<th>Town</th>";
                   echo "<th>Hospital</th>";
                   echo "<th>Cause A</th>";
                   echo "<th>Cause B</th>";
                   echo "<th>Cause C.</th>";
                   echo "<th>Other Conditions</th>";
              
              


                   echo "</tr>";
                    while($r = mysqli_fetch_assoc($res)){

                            echo "<tr>";
                            echo "<td>".$r['deceased_idno'] ."</td>";
                            echo "<td>".$r['permit_number']."</td>"; 
                            echo "<td>".$r['defname']."</td>";
                            echo "<td>".$r['demname']."</td>";
                            echo "<td>".$r['desurname']."</td>";
                            echo "<td>".$r['dod']."</td>";
                            echo "<td>".$r['gender']."</td>";
                            echo "<td>".$r['age']."</td>";
                            echo "<td>".$r['occupation']."</td>";
                            echo "<td>".$r['street']."</td>";
                            echo "<td>".$r['town']."</td>";
                            echo "<td>".$r['hospital']."</td>";
                            echo "<td>".$r['cause_a']."</td>";
                            echo "<td>".$r['cause_b']."</td>";
                            echo "<td>".$r['cause_c']."</td>";
                            echo "<td>".$r['other_conditions']."</td>";
                            echo "</tr>";

                            echo "<tr>";
                                     echo "<th>Practioner Name</th>";
                                     echo "<th>Registrar</th>";
                                     echo "<th>Date Received.</th>";
                                     echo "<th>Applied For..</th>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>".$r['practioner_name']."</td>";
                            echo "<td>".$r['regs_name']."</td>";
                            echo "<td>".$r['date_rvd']."</td>";
                            echo "<td>".$r['user_applied']."</td>";
                   
                              $id = $r['permit_number'];
                   


                                if ($r['status'] =='Approved') {
                                  echo "<td><a href ='https://modcom.co.ke/Vital/".$r['deceased_idno'].".pdf"."'>View Certificate</a></td>";
                                }
                           
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