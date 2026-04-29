<?php
   
       session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];
       $id_number =$_SESSION['id_number'];

	     if ($role=="User"){
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
<!DOCTYPE html>
<html>
<head>
	<title>eVital</title>
</head>
<body>

   <h2 class="alert alert-dark text-center">Online Portal</h2>
   <section class="row">
   
   	    <div class="col-md-12">
   	   	     <h3>My Applications</h3>
   	   	
   	   	     <?php
   	   	       include 'connect.php';
               
      
               //search
               //if (isset($_POST['username']) || isset($_POST['email'])) {
           
               $ReadSql = "SELECT * FROM `birthcertificat_app_form` WHERE  applicant_idno = '$id_number'";
               
              
               $res = mysqli_query($connection, $ReadSql); 
               
                if (mysqli_num_rows($res) < 1) {
                   echo "Error! No Birth Records <br/>";
                   exit();
                }
                $count = mysqli_num_rows($res);
                echo "Viewing $count Application(s) <br/>";

                  
                    while($r = mysqli_fetch_assoc($res)){

                        echo "<div class ='row'>";
                          echo "<div class = 'col-md-2'>";
                          echo "</div>";
                          echo "<div class = 'col-md-3'>";
                            echo "<div class = 'card'>";
                                echo "<b>Notification No: </b>".$r['notification_no'] ."<br>";
                                echo "<b>Child Firstname: </b>".$r['cfname']."<br>"; 
                                echo "<b>Child Secondname: </b>".$r['cmname']."<br>";
                                echo "<b>Child Surname: </b>".$r['csurname']."<br>";
                                echo "<b>DOB: </b>".$r['dob']."<br>";
                                echo "<b>Gender: </b>".$r['gender']."<br>";
                                echo "<br>";
                                if ($r['status'] =='Approved') {
                                  echo "<a href ='https://modcom.co.ke/Vital/".$r['notification_no'].".pdf"."'>View Certificate</a>";
                                }
                              
                            echo "</div>";  
                          echo "</div>";  
                             
                          echo "<div class= 'col-md-3'>";    
                            echo "<div class = 'card'>";
                                
                                echo "<b>Type of Birth: </b>".$r['tob']."<br>";
                                echo "<b>Place of Birth</b>".$r['pob']."<br>";
                                echo "<b>District: </b>".$r['district']."<br>";
                                echo "<b>Born Alive to Mother: </b>".$r['balive']."<br>";
                                echo "<b>Born Dead to Mother: </b>".$r['bdead']."<br>";
                                echo "<b>Father's Names:</b> ".$r['father_name']."<br>";
                                echo "<b>Application Status:</b> ".$r['status']."<br>";
                                echo "<b>Application Confirmed:</b> ".$r['applicant_confirm']."<br>";
                                                
                            
                            echo "</div>";
                          echo "</div>";  



                           echo "<div class= 'col-md-3'>";    
                            echo "<div class = 'card'>";
                      
                                echo "<b>Mother's Names:</b> ".$r['mother_name']."<br>";
                                echo "<b>State of Birth: </b>".$r['sob']."<br>";
                                echo "<b>Residence: </b>".$r['residence']."<br>";
                                echo "<b>Applicant Id No.: </b>".$r['applicant_idno']."<br>";
                                echo "<b>Applicant Phone: </b>".$r['applicant_phone']."<br>";
                                        $id = $r['notification_no'];
                                echo "<br>";
                   
                            echo "<td><a class = 'btn btn-success' href=userupdate.php?id=$id>Update/Change</a></td>";
                            echo "</div>";
                            echo "Before confirming please click above Update/Change, for any change that need to be made ";
                               echo "<a class = 'btn btn-danger text-center' onClick=\"javascript: return confirm('Are you sure you want to submit confirmation?');\"   
                            href=finaluserconfirm.php?id=$id>Click to Confirm</span></a>";
                        
                            echo "</div>"; 
                             echo "</div>";
                             echo "<br/>";
                             echo "<br/>";
                              echo "<br/>";

                        
                    }

                   
               
                

               //}

   	   	     ?>




   	   </div>

   	
   </section>
</body>
</html>