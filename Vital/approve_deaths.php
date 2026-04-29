<?php
   
       session_start();
	   if (!isset($_SESSION['username'])) {
	   	   echo "Please Login <a href = 'index.php'>Login Screen</a>";
	   	   exit(); die();
	   }

	   else {
	   	 $role =$_SESSION['role'];
	     $username =$_SESSION['username'];

	     if ($role =='Registrar'){
	     	echo "<a href ='logout.php'>Logout</a>";
	        echo "Welcome $username Logged in as $role";
            include 'header_admin.php';

           $deceased_idno = $_GET['id'];

           include 'connect.php';


           $CreateSql = "UPDATE deathcertificate_form SET status = 'Approved', approved_by = '$username' WHERE deceased_idno = '$deceased_idno'";

             $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

			   	if($res){
					$smsg = "Death Updated Successfully.";
    						//here
    				$url="https://modcom.co.ke/Vital/generate_death.php"; // Specify your url
                    $data= array('edit_notification_search'=>$deceased_idno); // Add parameters in key value
                    $ch = curl_init(); // Initialize cURL
                    curl_setopt($ch, CURLOPT_URL,$url);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_exec($ch);
                    curl_close($ch);
					
				
					echo "$smsg <br>";
				
				}else{
					$fmsg = "Death not updated, please try again later.";
					echo "$smsg";
				}
				
				
				
			
				
				
				
          }

           else {
      	 session_destroy();
      	 header("location:index.php");
      }

      }

?>







