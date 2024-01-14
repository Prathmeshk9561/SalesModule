<?php
session_start();

require_once 'config.php';
$now = time();
      
if($now > $_SESSION['expire']) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: index.html");  
}
if(empty($_SESSION['admin'])) {
    header("location:index.html");
}

// Fetch data from the database
$query = "SELECT * FROM sales_info";

$data = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="admin.css">
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <script src="admin.js"></script>

    <!-- <link rel="stylesheet" href="./css-1.css"> -->
    <title>Admin</title>
</head>

<body>
    <div class="header">
        <div class="left">
            <img src="./logo.png" alt="">
            <h1>SEWACITY</h1>
        </div>
        <div class="right">
       
            <a href="./logout_admin.php" class="logout_btn">Logout</a>
        </div>
    </div>
    <div class="head-title">
        <h2>Sale Records</h2>
    </div>
    
    <div class="container">


        <div class="outer-wrapper">
            <div class="table-wrapper">
                <table id="emp-table">
                    <thead>
                        <th col-index="1">Date</th>
                        <th col-index="2">Sales Person
                            <select class="table-filter" onchange="filter_rows()">
                                <option value="all">All</option>
                            </select>
                        </th>

                        <th col-index="3">City
                            <select class="table-filter" onchange="filter_rows()">
                                <option value="all">All</option>
                            </select>
                        </th>
                        <th col-index="4">Business Segment
                            <select class="table-filter" onchange="filter_rows()">
                                <option value="all">All</option>
                            </select>
                        </th>
                        <th col-index="5">Vendor
                            <select class="table-filter" onchange="filter_rows()">
                                <option value="all">All</option>
                            </select>
                        </th>
                        <th col-index="6">Price

                        </th>
                        <th col-index="7">Delivery Charge

                        </th>


                        <th col-index="8">GST

                        </th>
                        <th col-index="9">Total

                        </th>
                        <th col-index="10">Subscription validity

                        </th>

                        <th col-index="11">Delivery Boy

                        </th>

                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) { ?>
                            <tr>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['sales_person_name']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['segment']; ?></td>
                                <td><?php echo $row['vendor']; ?></td>
                                <td><?php echo $row['price'] ?: '0'; ?></td>
                                <td><?php echo $row['delivery_charge'] ?: '0'; ?></td>
                                <td><?php echo $row['gst'] ?: '0'; ?></td>
                                <td><?php echo $row['total'] ?: '0'; ?></td>
                                <td><?php echo $row['subscription_validity'] ?: 'N/A'; ?></td>
                                <td><?php echo $row['delivery_boy'] ?: 'N/A'; ?></td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <script>
                    window.onload = () => {
                        console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
                    };

                    getUniqueValuesFromColumn()
                </script>
            </div>
        </div>
    </div>
    <div class="spacer">

    </div>
    <a href="export.php" class="expbtn" >EXPORT</a>
    <div class="spacer">

    </div>
</body>

</html>
