<?php
require_once 'config.php';
// Check if the form was submitted


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    

    // Get the submitted form data
    $date = $_POST['date'];
    $sales_person_name = $_POST['sales_person_name'];
    $city = $_POST['city'];
    $vendor = $_POST['vendor'];
    $segment = $_POST['segment'];

    // Handle different business segments separately
    switch ($segment) {
        case 'food':
            $total = isset($_POST['total']) ? $_POST['total'] : null;
            $delivery_charge = isset($_POST['delivery_charge']) ? $_POST['delivery_charge'] : null;
            $gst = isset($_POST['gst']) ? $_POST['gst'] : null;
            $delivery_boy = isset($_POST['delivery_boy']) ? $_POST['delivery_boy'] : null;
            $any_concern = isset($_POST['any_concern']) ? $_POST['any_concern'] : null;

            $sql = "INSERT INTO sales_info (date, sales_person_name, city, vendor, segment, price, total, delivery_charge, gst, delivery_boy, any_concern)
                    VALUES ('$date', '$sales_person_name', '$city', '$vendor', '$segment', null, '$total', '$delivery_charge', '$gst', '$delivery_boy', '$any_concern')";
            break;

        case 'service':
            $service_price = isset($_POST['service_price']) ? $_POST['service_price'] : null;
            $service_total = isset($_POST['service_total']) ? $_POST['service_total'] : null;
            $service_gst = isset($_POST['service_gst']) ? $_POST['service_gst'] : null;

            $sql = "INSERT INTO sales_info (date, sales_person_name, city, vendor, segment, price, total, gst)
                    VALUES ('$date', '$sales_person_name', '$city', '$vendor', '$segment', '$service_price', '$service_total', '$service_gst')";
            break;

        case 'subscription':
            $subscription_price = isset($_POST['subscription_price']) ? $_POST['subscription_price'] : null;
            $subscription_total = isset($_POST['subscription_total']) ? $_POST['subscription_total'] : null;
            $subscription_gst = isset($_POST['subscription_gst']) ? $_POST['subscription_gst'] : null;
            $subscription_validity = isset($_POST['subscription_validity']) ? $_POST['subscription_validity'] : null;

            $sql = "INSERT INTO sales_info (date, sales_person_name, city, vendor, segment, price, total, gst, subscription_validity)
                    VALUES ('$date', '$sales_person_name', '$city', '$vendor', '$segment', '$subscription_price', '$subscription_total', '$subscription_gst', '$subscription_validity')";
            break;

        case 'other':
            $other_price = isset($_POST['other_price']) ? $_POST['other_price'] : null;
            $other_total = isset($_POST['other_total']) ? $_POST['other_total'] : null;
            $other_gst = isset($_POST['other_gst']) ? $_POST['other_gst'] : null;

            $sql = "INSERT INTO sales_info (date, sales_person_name, city, vendor, segment, price, total, gst)
                    VALUES ('$date', '$sales_person_name', '$city', '$vendor', '$segment', '$other_price', '$other_total', '$other_gst')";
            break;

        default:
            // Invalid segment value, handle the error as needed
            die("Invalid segment value");
    }

    // Execute the SQL query
    if ($connection->query($sql) === TRUE) {
        
        
        $destinationURL = "city_head.html";
        //header( "Location: " . $destinationURL);
        echo '<script type="text/javascript">'; 
echo 'alert("New record created successfully");'; 
echo 'window.location.href = "city_head_client.php";';
echo '</script>';
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    // Close the database connection
    $connection->close();
}
?>
