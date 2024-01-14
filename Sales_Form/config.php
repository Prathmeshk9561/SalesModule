<?php
// Database connection details
    $host = "localhost"; 
    $user = "root"; 
    $password = ""; 
    $database = "sewacity_sales"; 

    // Establish a connection to the database
    $connection = mysqli_connect($host, $user, $password, $database);

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>