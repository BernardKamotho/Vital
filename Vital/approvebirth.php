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

           $notification_no = $_GET['id'];

           include 'connect.php';


           $CreateSql = "UPDATE birthcertificat_app_form SET status = 'Approved', approved_by = '$username' WHERE notification_no = '$notification_no'";

             $res = mysqli_query($connection, $CreateSql) or die(mysqli_error($connection));

			   	if($res){
					    $smsg = "Birth Updated Successfully.";
						//here
        				$url="generate_pdf.php"; // Specify your url
                        $data= array('edit_notification_search'=>$notification_no); // Add parameters in key value
                        $ch = curl_init(); // Initialize cURL
                        curl_setopt($ch, CURLOPT_URL,$url);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_exec($ch);
                        curl_close($ch);
					    echo "$smsg";
				
				}else{
					$fmsg = "Birth not updated, please try again later.";
					echo "$smsg";
				}
          }

           else {
      	 session_destroy();
      	 header("location:index.php");
      }

      }

?>







