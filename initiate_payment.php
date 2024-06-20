<?php
require('admin/include/db.php');
require('admin/include/essentials.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['id'];
    $cid = $_SESSION['fid'];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $_SESSION['startDate'] = $startDate;
    $_SESSION['endDate'] =$endDate;
    $query = mysqli_query($con, "SELECT * FROM `car_feature` WHERE `f_id`='$cid'");
    $row = mysqli_fetch_assoc($query);

    $dailyPrice = $row['Price'];

    $totalPrice = calculateTotalPrice($dailyPrice, $startDate, $endDate);
    echo "<br>".$totalPrice;
    $_SESSION['totalPrice'] = $totalPrice;

    $email = $_SESSION['Email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Invalid email address format.";
        exit();
    }

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode([
            "return_url" => "http://localhost/projects/CarRental/insert_booking.php?order_id=101",
            "website_url" => "http://localhost/",
            "amount" => $totalPrice * 100, 
            "purchase_order_id" => "101",
            "purchase_order_name" => "Car Rental Payment",
            "customer_info" => [
                "name" => $_SESSION['Name'],
                "email" => $email,
                "phone" => "102"
            ]
        ]),
        CURLOPT_HTTPHEADER => array(
            'Authorization: key live_secret_key_68791341fdd94846a146f0457ff7b455',
            'Content-Type: application/json',
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    if ($response === false) {
        echo 'cURL error: ' . curl_error($curl);
    } else {
        $response_data = json_decode($response, true);
        if (isset($response_data['payment_url'])) {
            header('Location: ' . $response_data['payment_url']);
            exit();
        } else {
            var_dump($response_data); 
            echo "Error initiating payment.";
        }
    }
} else {
    exit();
}

function calculateTotalPrice($dailyPrice, $startDate, $endDate) {
    $numberOfDays = ceil(abs(strtotime($endDate) - strtotime($startDate)) / 86400) + 1;
    return $dailyPrice * $numberOfDays;
}
?>
