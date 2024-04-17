<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $car_type = $_POST['car_type'];
    $pickup_date = $_POST['pickup_date'];

    // You can perform further validation here

    // Store booking information in a database or do something else with it
    // For now, let's just display a confirmation message
    echo "<h2>Booking Confirmation</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Car Type: $car_type</p>";
    echo "<p>Pickup Date: $pickup_date</p>";
}
?>
