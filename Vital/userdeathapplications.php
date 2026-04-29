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
   	   	     <h3>My Death Applications</h3>
   	   	
   	   	     <?php
   	   	       include 'connect.php';
               
               //search
               //if (isset($_POST['username']) || isset($_POST['email'])) {
           
               $ReadSql = "SELECT * FROM `deathcertificate_form` WHERE  next_of_kin_id = '$id_number'";
               
              
               $res = mysqli_query($connection, $ReadSql); 
               
                if (mysqli_num_rows($res) < 1) {
                   echo "Error! No Death Records";
                   exit();
                }
                $count = mysqli_num_rows($res);
                echo "Found $count Application(s)";

                  
                    while($r = mysqli_fetch_assoc($res)){

                        echo "<div class ='row container'>";
                        echo "<div class = 'col-md-2'>";
                        echo "</div>";


                          echo "<div class = 'col-md-3'>";
                            echo "<div class = 'card'>";
                                echo "<b>Deceased Id: </b>".$r['deceased_idno'] ."<br>";
                                echo "<b>Firstname: </b>".$r['defname']."<br>"; 
                                echo "<b>Secondname: </b>".$r['demname']."<br>";
                                echo "<b>Surname: </b>".$r['desurname']."<br>";
                                echo "<b>DOD: </b>".$r['dod']."<br>";
                                echo "<b>Gender: </b>".$r['gender']."<br>";
                                echo "<br>";
                                if ($r['status'] =='Approved') {
                                  echo "<a href ='https://modcom.co.keVital/".$r['deceased_idno'].".pdf"."'>View Certificate</a>";
                                }
                              
                            echo "</div>";  
                          echo "</div>";  
                             
                          echo "<div class= 'col-md-3'>";    
                            echo "<div class = 'card'>";
                                
                                echo "<b>Age: </b>".$r['age']."<br>";
                                echo "<b>Occupation</b>".$r['occupation']."<br>";
                                echo "<b>Street: </b>".$r['street']."<br>";
                                echo "<b>Town: </b>".$r['town']."<br>";
                           
                                echo "<b>Cause A:</b> ".$r['cause_a']."<br>";
                                echo "<b>Cause B:</b> ".$r['cause_b']."<br>";
                                echo "<b>Cause C:</b> ".$r['cause_c']."<br>";
                                                
                            
                            echo "</div>";
                          echo "</div>";  



                           echo "<div class= 'col-md-3'>";    
                            echo "<div class = 'card'>";
                      
                                echo "<b>Other Conditions:</b> ".$r['other_conditions']."<br>";
                                echo "<b>Doctor Names: </b>".$r['practioner_name']."<br>";
                                echo "<b>Date Received: </b>".$r['date_rvd']."<br>";
                                echo "<b>Status: </b>".$r['status']."<br>";

    
                                echo "<br>";

                                $id = $r['deceased_idno'];
                   
                            echo "<td><a class = 'btn btn-success' href=userdeathupdate.php?id=$id>Update/Change</a></td>";
                            echo "</div>";
                            echo "Before confirming please click above Update/Change, for any change that need to be made ";
                               echo "<a class = 'btn btn-danger text-center' onClick=\"javascript: return confirm('Are you sure you want to submit confirmation?');\"   
                            href=finaldeathconfirm.php?id=$id>Click to Confirm</span></a>";
                           echo "";  
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