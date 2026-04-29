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
        
        $sql = "INSERT INTO `signup`(`idnumber`, `password`) 
        VALUES ('$idnumber','$edit_password')";
        
        
        
        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

   
?>