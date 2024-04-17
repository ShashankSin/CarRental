<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'project';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (!isset($_POST['username'], $_POST['phone'], $_POST['password'])) {

    exit('Please complete the registration form!');
}
if (empty($_POST['username']) || empty($_POST['phone'] || empty($_POST['password']))) {
    exit('Please complete the registration form');
}

if ($stmt = $con->prepare('SELECT id, Password FROM signup WHERE Name = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo 'Username exists, please choose another!';
    } else {
        if ($stmt = $con->prepare('INSERT INTO signup (Name, Phone,Password) VALUES (?, ?, ?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'], $_POST['phone'], $password);
            $stmt->execute();
            echo 'You have successfully registered! You can now login!';
            header("location:index.php");
        } else {
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
$con->close();
?>