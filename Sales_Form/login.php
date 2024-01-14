<?php
session_start();
require_once 'config.php';
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
   
    // Get the JSON data from the request body
    $inputJSON = file_get_contents('php://input');

    // Convert the JSON data to a PHP associative array
    $data = json_decode($inputJSON, true);

    // Check if the JSON data was successfully decoded
    if ($data === null) {
        // Handle JSON decoding error (if any)
        echo 'Error decoding JSON data.';
    } else {
        // Access the data from the PHP associative array
        $userid = $data['userid'];
        $password = $data['password'];
        $role = $data['role'];

        if ($role == "cityhead") {
            $query = "SELECT * FROM city_head WHERE User_id = '$userid' AND Password = '$password'";
            $result = mysqli_query($connection, $query);
        } else {
            $query = "SELECT * FROM admin WHERE User_id = '$userid' AND Password = '$password'";
            $result = mysqli_query($connection, $query);
        }

        if (mysqli_num_rows($result) > 0) {
            // Login successful
            if($role=="cityhead") {
                $_SESSION['cityhead']=$userid;
                $_SESSION['start'] = time();  
                //1 day
                $_SESSION['expire'] = $_SESSION['start'] + (86400) ;
            }
            else{
                $_SESSION['admin']=$userid;
                $_SESSION['start'] = time(); 
                //1 day
                $_SESSION['expire'] = $_SESSION['start'] + (86400) ;
            }
            // Check if "Remember Me" checkbox is selected
           
            mysqli_close($connection);
            $response = array('result' => 1, 'role' => $data['role']);
        } else {
            // Login failed
            $response = array('result' => 0, 'role' => $data['role']);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    // Handle requests other than POST (if needed)
    echo 'Invalid request method.';
}
?>
