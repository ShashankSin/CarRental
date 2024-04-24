<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    session_start();
    $id = $_SESSION['id'];
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $cid=$_SESSION['cid'];
    echo gettype($cid)."\n";
    echo $id;


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
<?php
require('admin/include/db.php');
require('admin/include/essentials.php');

// Function to calculate total price
function calculateTotalPrice($dailyPrice, $startDate, $endDate) {
    // Calculate number of days, adding 1 to include the end date
    $numberOfDays = ceil(abs(strtotime($endDate) - strtotime($startDate)) / 86400) + 1; // 86400 seconds in a day
    
    // Calculate total price
    return $dailyPrice * $numberOfDays;
}

// Check if form is submitted
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $f_id = isset($_POST['car_id']) ? $_POST['car_id'] : null;
    $id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    // Fetch car details from the database
    $query = mysqli_query($con, "SELECT * FROM `car_feature` WHERE `f_id`='$f_id'");
    $row = mysqli_fetch_assoc($query);

    // Retrieve daily rental price from the database
    $dailyPrice = $row['Price'];

    // Calculate total price based on start date and end date
    $totalPrice = calculateTotalPrice($dailyPrice, $_POST['start_date'], $_POST['end_date']);

    // Insert data into the new table
    $insertQuery = "INSERT INTO calculated_prices (car_id, username, total_price) VALUES ('$f_id', '$id', '$totalPrice')";

    // Execute the query and check for errors
    if (mysqli_query($con, $insertQuery)) {
        // Query executed successfully
        echo "Record inserted successfully.";
    } else {
        // Query execution failed
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($con);
    }
} else {
    // If form is not submitted, set default total price to 0
    $totalPrice = 0;
}
?>
