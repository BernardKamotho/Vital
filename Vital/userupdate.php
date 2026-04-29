<?php
    
       session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	     if ($role=="User" || $role =='Registrar') {
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
	<title>User Update</title>
<!-- Latest compiled and minified CSS -->
</head>
<body>

  <?php
  require_once('connect.php');
	
  $id = $_GET['id'];
  

  if ($role =='User' || $role =='Registrar') {
  $SelSql = "SELECT * FROM `birthcertificat_app_form` WHERE notification_no='$id'";
   }

  $res = mysqli_query($connection, $SelSql);
   
   //count how many rows reeturned
    if (mysqli_num_rows($res) < 1) {
    	echo "<br>Your session might have expired! or accessing the wrong resource";
    	exit();
    } 

    $r = mysqli_fetch_assoc($res);
  ?>

<!--  value="<?php echo $r['first_name'];?>" -->

 <section class="row">
   	   <div class="col-md-4">
   	   	
   	   </div>


   	    <div class="col-md-4">
   	   	     <h3>Birth Details Update</h3>
   	   	     <form method="POST">
   	   	     	      <label><b>Name of Child</b></label> <br>
                    <input type="text" name="cfname" placeholder="Enter Child First Name" class="form-control" 
                            required="" value="<?php echo $r['cfname'];?>">
                            <br>

                    <input type="text" name="cmname" placeholder="Enter Child Middle Name" class="form-control" 
                            required="" value="<?php echo $r['cmname'];?>">
                            <br>


                    <input type="text" name="csurname" placeholder="Enter Child Surname" class="form-control" 
                            required="" value="<?php echo $r['csurname'];?>">
                            <br>


                    <input type="text" name="applicant_phone" placeholder="Enter Your Phone" class="form-control" 
                            required="" value="<?php echo $r['applicant_phone'];?>">
                            <br>        

              
                      <input type="submit" class="btn btn-success" name="" value="Update Application" 
                      onClick="return confirm('Are you sure you want to Update');"   >

   	   	     </form>

   	   	     <?php
   	   	       include 'connect.php';
               if (empty($_POST)) {
               	exit();
               }

                extract($_POST);

              
                if ($role =='User' || $role =='Registrar') {
                   	$CreateSql = "UPDATE  `birthcertificat_app_form` SET cfname = '$cfname', cmname = '$cmname', csurname = '$csurname', applicant_phone = '$applicant_phone' WHERE notification_no = '$id'";
                 }


        			    $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

        			   	if($res){
        					$smsg = "Application Updated Successfully.";
        					echo "$smsg <br> <a href = 'userapplications.php'> Go to Your Applications</a>";
        					
          				}else{
          					$fmsg = "User not be updated, please try again later.";
          					echo "$smsg  <br>   <a href = 'userapplications.php'> Go to Your Applications</a>";
          				}

   	   	     ?>
   	   </div>

   	   <div class="col-md-4">
   	   	
   	   </div>
   </section>



</body>
</html>
