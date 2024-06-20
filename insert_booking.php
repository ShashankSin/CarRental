<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; 
require('admin/include/db.php');
require('admin/include/essentials.php');
session_start();

$id = (int)$_SESSION['id'];
$cid = (int)$_SESSION['fid'];
$startDate = $_SESSION['startDate'];
$endDate = $_SESSION['endDate'];
$totalPrice = (float)$_SESSION['totalPrice'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->begin_transaction();

try {
    // Insert booking
    $stmt_insert = $conn->prepare("INSERT INTO booking (c_id, car_id, start_date, end_date) VALUES (?, ?, ?, ?)");
    $stmt_insert->bind_param("iiss", $id, $cid, $startDate, $endDate);

    // Insert calculated price
    $stmt_insert1 = $conn->prepare("INSERT INTO calculated_prices (c_id, car_id, total_price) VALUES (?, ?, ?)");
    $stmt_insert1->bind_param("iid", $id, $cid, $totalPrice);

    // Update car quantity
    $stmt_update = $conn->prepare("UPDATE car_feature SET Quantity = Quantity - 1 WHERE f_id = ?");
    $stmt_update->bind_param("i", $cid);

    if ($stmt_insert->execute() && $stmt_insert1->execute() && $stmt_update->execute()) {
        $conn->commit();
        echo "Booking successfully processed.";

        if (isset($_SESSION['Email'])) {
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'vehiclerental123@gmail.com';
                $mail->Password = 'jkpwqcihdvdkwhva';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('vehiclerental123@gmail.com', 'Vehicle Rental');
                $mail->addAddress($_SESSION['Email']);
                $mail->isHTML(true);
                $mail->Subject = "Booking Confirmation";
                $mail->Body = $_SESSION['car']." has been successfully booked from <b>".$_SESSION['startDate']."</b> to <b>".$_SESSION["endDate"]."</b>";

                if ($mail->send()) {
                    header("Location: booked.php");
                    exit(); // Ensure no further code is executed
                } else {
                    echo "Error sending email: " . $mail->ErrorInfo;
                }
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        }
    } else {
        $conn->rollback();
        echo "Error processing booking: " . $stmt_insert->error . " / " . $stmt_insert1->error . " / " . $stmt_update->error;
    }

    $stmt_insert->close();
    $stmt_insert1->close();
    $stmt_update->close();
} catch (Exception $e) {
    $conn->rollback();
    echo "Transaction failed: " . $e->getMessage();
}

$conn->close();
?>
