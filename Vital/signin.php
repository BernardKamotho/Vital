<?php

        extract($_POST);

        $servername = "localhost";
        $username = "modcomac_evital";
        $password = "vMH3O]HRqHPV";
        $dbname = "modcomac_evital";
        
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM signup where idnumber = '$idnumber' and password = '$edit_password'";
        $response =  mysqli_query($conn, $sql);
        $count = mysqli_num_rows($response);
        
        if($count==0){
            echo "0";//no user
        }
        
        else {
            echo "1";//user found
        }
        
     
   
?>