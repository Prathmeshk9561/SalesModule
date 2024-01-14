<?php
require_once 'config.php';

$sql = "SELECT * FROM sales_info";
$res = mysqli_query($connection, $sql);

$html = '<table><tr><th>Date</th><th>Sales_Person_name</th><th>City</th><th>Vendor</th><th>Segment</th><th>Price</th><th>Delivery_Charge</th><th>GST</th><th>Total</th><th>Subscription Validity</th><th>Delivery Boy</th></tr>';
while ($row = mysqli_fetch_assoc($res)) {
    // Check and replace empty/null fields with '0'
    $date = $row['date'] ?: '0';
    $salesPersonName = $row['sales_person_name'] ?: '0';
    $city = $row['city'] ?: '0';
    $segment = $row['segment'] ?: '0';
    $vendor = $row['vendor'] ?: '0';
    $price = $row['price'] ?: '0';
    $deliveryCharge = $row['delivery_charge'] ?: '0';
    $gst = $row['gst'] ?: '0';
    $total = $row['total'] ?: '0';
    $subscriptionValidity = $row['subscription_validity'] ?: 'N/A';
    $deliveryBoy = $row['delivery_boy'] ?: 'N/A';

    // Append the data to the HTML table
    $html .= '<tr><td>' . $date . '</td><td>' . $salesPersonName . '</td><td>' . $city . '</td><td>' . $segment . '</td><td>' . $vendor . '</td><td>' . $price . '</td><td>' . $deliveryCharge . '</td><td>' . $gst . '</td><td>' . $total . '</td><td>' . $subscriptionValidity . '</td><td>' . $deliveryBoy . '</td></tr>';
}
$html .= '</table>';


$filename = 'Sales_Report .xls';
header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");


// Output the HTML as an Excel file
echo $html;
?>
