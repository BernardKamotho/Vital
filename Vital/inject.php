<?php

$input = $_GET['input'];

if ($input) {
    $db = mysqli_connect("localhost", "root", "", "hyraxDB");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    else{
        echo "Ok";
    }
    $escaper = $input;
    $statement = $db->prepare("SELECT * FROM products2 WHERE product_id = ? LIMIT 1");
    $statement->bind_param("s", $escaper);
    $statement->execute();
    $result = $statement->get_result();
    $statement->close();
    $count = $result->num_rows;
    if ($count > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Product:" . $row['product_name'] . "<br>";
            echo "Annotation:" . $row['product_cost'] . "<br>";
            echo "TestOK!<br>";
        }
    } 
    else {
        echo 'No record!';
    }
    $result->free();
    $db->close();
}
?>