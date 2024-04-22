<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    session_start();
    $id = $_SESSION['id'];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $cid=$_SESSION['cid'];
    echo gettype($cid)."\n";
    echo $cid;


    // Connect to the database (replace these with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project"; // Database name where you created the 'bookings' table

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement to insert booking data
    $stmt_insert = $conn->prepare("INSERT INTO booking (id, start_date, end_date) VALUES (?, ?, ?)");
    $stmt_insert->bind_param("iss", $id, $startDate, $endDate);

    // Prepare and bind the SQL statement to update car_feature quantity
    $stmt_update = $conn->prepare("UPDATE car_feature SET Quantity = QUantity-1 WHERE f_id = ?");

    // Execute insert statement
    if ($stmt_insert->execute() === TRUE) {
        // Execute update statement
     $stmt_update->bind_param("i", $cid);
    if ($stmt_update->execute()) {
        echo "Booking confirmed for car ID: $cid, Start Date: $startDate, End Date: $endDate";
    } else {
        echo "Error updating quantity: " . $stmt_update->error;
    }

    } else {
        echo "Error inserting booking: " . $stmt_insert->error;
    }

    // Close statements
    $stmt_insert->close();
    $stmt_update->close();

    // Close connection
    $conn->close();
} else {
    exit();
}
?>
