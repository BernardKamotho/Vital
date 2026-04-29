<?php
     
     session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	     if ($role=="Admin" || $role =='Registrar' || $role =='Chief' || $role =='Hospital') {
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
	<title>Portal</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

   <h2 class="alert alert-dark text-center">Application Portal</h2>
   <section class="row">
   	   <div class="col-md-1">
   	   	
   	   </div>


   	    <div class="col-md-10">
   	   	     <h3>Birth Certificate Application</h3>
             <i class="text-danger">* Fill All Details</i>


   	   	     <form method="POST">
                <div class="row">
                      <div class="col-md-4">
                          <label><b>Name of Child</b></label> <br>
                             <input type="text" name="cfname" placeholder="Enter Child First Name" class="form-control" 
                            required="">
                            <br>

                             <input type="text" name="cmname" placeholder="Enter Child Middle Name" class="form-control" 
                            required="">
                            <br>


                             <input type="text" name="csurname" placeholder="Enter Child Surname" class="form-control" 
                            required="">
                            <br>

                            <label><b>Child Date of Birth</b></label><br>
                             <input type="Date" name="dob" class="form-control" 
                            required="">
                            <br>

                            <label><b>State of Birth</b></label><br>
                            <input type="radio" name="sob" required="" value="Dead">   <label>Dead</label>
                            <input type="radio" name="sob" required="" value="Alive">   <label>Alive</label>
                            <br>

                            
                            <label><b>Gender</b></label><br>
                            <input type="radio" name="gender" required="" value="Male">   <label>Male</label>
                            <input type="radio" name="gender" required="" value="Female">   <label>Female</label>
                            <br>

                            <label><b>Type of Birth</b></label><br>
                            <input type="radio" name="tob" required="" value="Single">   <label>Single</label>
                            <input type="radio" name="tob" required="" value="Twin">   <label>Twin</label>    
                            <input type="radio" name="tob" required="" value="Other">   <label>Other</label>   
                            <input type="text" name="tob_other" placeholder="Other,  Please Specify">
                            <br>
                      </div>

                      <div class="col-md-4">
                       <label><b>Place of Birth</b></label><br>
                      <i>Sub location/town/health institution</i><br>
                      <input type="text" name="pob" placeholder="Place of Birth" required="" class="form-control">
                      <br>

                      <input type="text" name="district" placeholder="District of Birth" required="" class="form-control">
                      <br>

                      <label><b>Previous Births to Mother</b></label><br>
                      <input type="number" name="balive" placeholder="No. of Children Born Alive" required="" class="form-control">
                      <br>

                      <input type="number" name="bdead" placeholder="No. of Children Born Dead" required="" class="form-control">
                      <br>

                      <input type="text" name="father_name" placeholder="Names of Father" required="" class="form-control">
                      <br>

                      <input type="text" name="mother_name" placeholder="Names of Mother" required="" class="form-control">
                      <br>

                      <input type="text" name="residence" placeholder="Residence" required="" class="form-control">
                      <br>   

                       <input type="text" name="applicant_idno" placeholder="Applicant IDNo" required="" class="form-control" minlength="8" maxlength="8">
                      <br> 

                         <input type="tel" name="applicant_phone" placeholder="Applicant Phone No" required="" class="form-control" minlength="10" maxlength="10">
                      <br> 
                </div> 


                <div class="col-md-4">
                     <label><b>Capacity of Informant</b></label><br>
                      <input type="radio" name="capc_info" required="" value="Parent">   <label>Parent</label><br>
                      <input type="radio" name="capc_info" required="" value="TBA">   <label>T.B.A</label><br>    
                      <input type="radio" name="capc_info" required="" value="Midwife">   <label>Midwife</label> <br>
                      <input type="radio" name="capc_info" required="" value="Medical Attendant">   <label>Medical Attendant</label> <br>
                      <input type="radio" name="capc_info" required="" value="Other">   <label>Other</label> 
                      <input type="text" name="capc_info_other" placeholder="Other, Please Specify" class="form-control">
                      <br>

                      <label><b>Registration Assistant For</b></label><br>
                      <input type="text" name="reg_ass" placeholder="Enter Sublocation/Institution" class="form-control" required="">
                      <br>

                      <label><b>Registering Officer Name</b></label>
                      <input type="text" name="reg_name" placeholder="Enter Your Name" class="form-control" required="">
                      <br>

                      <label>Did Applicant confirm details?</label><br>
                       <input type="radio" name="applicant_confirm" required="" value="Yes">   <label>Yes</label>
                       <input type="radio" name="applicant_confirm" required="" value="No">    <label>No</label>
                       <br>

                      <input type="submit" name="" class="btn btn-success" value="Click to Apply"  onClick="return confirm('Are you sure you want to submit?');" >
                </div>
                </div>
   	   	     </form>

                    <?php

                if (empty($_POST)) {
                  exit();
                }

                extract($_POST);

               
                include 'connect.php';

                $reg_date  = date("y/m/d");

                
                $sql = "INSERT INTO `birthcertificat_app_form`(`cfname`, `cmname`, `csurname`, `dob`, `gender`, `tob`, `pob`, `district`, `balive`, `bdead`, `father_name`, `mother_name`, `residence`, `capc_info`, `reg_ass`, `reg_name`, `applicant_idno`, `birthcertNo`, `reg_date`, `applicant_phone`,`sob`,`who_saved`,`applicant_confirm`) VALUES ('$cfname','$cmname','$csurname','$dob','$gender','$tob','$pob','$district','$balive','$bdead','$father_name','$mother_name','$residence','$capc_info','$reg_ass','$reg_name','$applicant_idno',UUID(),'$reg_date','$applicant_phone','$sob','$username','$applicant_confirm')";
                
                
                
                $response = mysqli_query($connection, $sql);
                    
                if($response){        
                 $last_id = mysqli_insert_id($connection);     
                  echo "<span class='alert alert-info'>New record created successfully. Notification No</span>: ".$last_id;
                  
                
                } else {
                  echo "<span class='alert alert-info'>Error: Failed to Register due to Technical Issues</span>";
                }

   
              ?>

            
   	   </div>

   	   <div class="col-md-4">
   	   	
   	   </div>
   </section>

</body>
</html>