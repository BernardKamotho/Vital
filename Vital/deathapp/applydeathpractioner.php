<?php
     
     session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = '../index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	       if ($role =='HospitalD') {
	     	echo "<a href ='../logout.php'>Logout</a>";
	        echo "Welcome $username Logged in as $role";
	         include 'header_death.php';
          }

           else {
      	 session_destroy();
      	 header("location:../index.php");
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

   <h2 class="alert alert-dark text-center">Registration Portal</h2>
   <section class="row">
   	   <div class="col-md-1">
   	   	
   	   </div>


   	    <div class="col-md-10">
   	   	     <h3>Register Death</h3>
             <i class="text-danger">(for use by medical practitioner)</i>

   	   	     <form method="POST">
                <div class="row">
                      <div class="col-md-4">
                                   <label><b>DECEASED ID NUMBER</b></label>
            <input type="number" name="deceased_idno" placeholder="enter id number"   required="" class="form-control" minlength="8" maxlength="8"><br>


                         <label><b>BURIAL PERMIT/DEATH NOTIFICATION</b></label>
            <input type="alphanumeric" name="permit_number" placeholder="enter burial permit/death notification"   required="" class="form-control"><br>

                             
      <label> <b> FULL NAME OF DECEASED </b></label>
            <label><b>baptismal or given name(s)</b></label>
              <input type="text" name="defname" placeholder="enter baptisimal name of deceased" size="40px" required="" class="form-control"> <br>

      <label><b>Middle or Tribal Name</b></label>
        <input type="text" name="demname" placeholder="enter middlename of deceased" size="40px" required="" class="form-control"><br>

        
        <label><b>surname or tribal name of father</b></label>
      <input type="text" name="desurname" placeholder="enter surname/teribal name of deceased" size="50px" required="" class="form-control"><br>




                            <label><b>Date of Death</b></label><br>
                             <input type="Date" name="dod" class="form-control" 
                            required="">
                            <br>

                            
                            <label><b>Sex of the Deceased</b></label><br>
                            <input type="radio" name="gender" required="" value="Male">   <label>Male</label>
                            <input type="radio" name="gender" required="" value="Female">   <label>Female</label>
                            <br>


                            <label><b> AGE OF DECEASED</b></label>
                            <input type="number" name="age" placeholder="enter age of deceased" size="50px" required="" class="form-control" maxlength="3">
               
                      </div>

                      <div class="col-md-4">

                   

                 <!--occupation-->

                   <label><b> Occupation of deceased</b></label>
                   <input type="text" name="occupation" placeholder="enter occupation of deceased" size="50px" required="" class="form-control"><br>


                                <!--place of death-->
                       <label><b> EXACT PLACE OF DEATH</b></label><br>
                       <label>No.of house and street  road, if any</label>
                       <textarea cols="40" rows="5" name="street" required="" class="form-control"></textarea>
                       <br>

                       <label>Name of town,if any,or village/sub- location and location</label>
                        <textarea cols="40" rows="5" name="town" required="" class="form-control"></textarea><br>

                      <label>If in Institution, name of hospital or  medical centre</label>
                      <textarea cols="40" rows="5" name="hospital" required="" class="form-control"></textarea>
                      <br>

                          
                      
                      </div> 


                <div class="col-md-4">


                       <label><b>TO BE COMPLETED BY MEDICAL PRACTITIONER:</b></label><br>
                          <label>Cause of Death Enter one cause per line:</label><br><br>
                          <label> IMMEDIATE CAUSE (A)</label>
                          <textarea cols="50" rows="2" name="cause_a" required="" class="form-control"></textarea><br><br>

                         <label>DUE TO (B)</label>
                          <textarea cols="40" rows="2" name="cause_b" required="" class="form-control"></textarea><br><br>

                          <label>DUE TO (C)</label>
                          <textarea cols="40" rows="2" name="cause_c" required="" class="form-control"></textarea><br><br>

                          <label>OTHER SIGNIFICANT CONDITIONS</label>
                          <textarea cols="40" rows="2" name="other_conditions" required="" class="form-control"></textarea><br><br> 

                   
                </div>

               


                </div>

 <div class="row">
                    <div class="col-md-2">
                      
                    </div>

                    <div class="col-md-8">
                             <label><b>TO BE COMPLETED BY MEDICAL PRACTITIONER:</b></label><br><br>
                            <!--certificate-->
                            <label>I certify that-</label><br><br>
                            <label>(a) I attended the deceased or<br>
                                 (b) I examined the body after death or<br>
                                 (c) I conducted a post mortem examination of the above information<br> is correct to the best of my knowledge
                            </label><br><br>


                            <label><b>Next of Kin Id No.</b></label>
                              <input type="text" name="next_of_kin_id" placeholder="enter next of kin ID "  required="" class="form-control" minlength="8" maxlength="8"> 

                            <label><b>TITLE</b></label>
                              <input type="text" name="title_practioner" placeholder="enter title of medical practitioner "  required="" class="form-control">


                            <label><b>DATE</b></label>
                              <input type="date" name="date" placeholder="enter the date" required="" class="form-control"><br><br>

                            <label>NAME IN BLOCK LETTERS</label>
                            <input type="text" name="practioner_name" placeholder="enter your name" size="50px" required="" class="form-control"><br><br>


                          <label> NAME OF LOCAL REGISTRAR</label>
                          <input type="text" name="regs_name" placeholder="enter name of the local registrar" size="50px" required="" class="form-control">

                          <label>DATE RECORD RECIEVED</label>
                                  <input type="date" name="date_rvd" required="" class="form-control"><br><br>

                          <input type="submit" name="" class="btn btn-success" value="Click to Submit"  onClick="return confirm('Are you sure you want to submit?');" >
                    </div>

                    <div class="col-md-2">
                      
                    </div>
                </div>
   	   	     </form>

                    <?php

                if (empty($_POST)) {
                  exit();
                }

                extract($_POST);

               
                include '../connect.php';

                $reg_date  = date("y/m/d");

                
                $sql = "INSERT INTO `deathcertificate_form`(`deceased_idno`,`permit_number`, `defname`, `demname`, `desurname`, `dod`, `gender`, `age`, `occupation`, `street`, `town`, `hospital`, `cause_a`, `cause_b`, `cause_c`, `other_conditions`, `next_of_kin_id`,`title_practioner`, `date`, `practioner_name`, `regs_name`, `date_rvd`) 
                VALUES ('$deceased_idno','$permit_number','$defname','$demname','$desurname','$dod','$gender','$age','$occupation','$street','$town','$hospital','$cause_a','$cause_b','$cause_c','$other_conditions','$next_of_kin_id','$title_practioner','$date','$practioner_name','$regs_name','$date_rvd')";
                
                
                
                $response = mysqli_query($connection, $sql);
                    
                if($response){        
                 $last_id = mysqli_insert_id($connection);     
                  echo "<span class='alert alert-info'>New record created successfully";
                  
                
                } else {
                  echo "<span class='alert alert-info'>Error: Failed to Register due to Technical Issues, Check Burial Permit again and retry.</span>";
                }
   
              ?>

            
   	   </div>

   	   <div class="col-md-4">
   	   	
   	   </div>
   </section>

</body>
</html>