<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'project';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (empty($_POST['username'] && $_POST['password'])) {
    exit('Please fill both the username and password fields!');
}
if ($stmt = $con->prepare('SELECT ID, Password FROM signup WHERE Name = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['Name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: loggedin.php');
        } else {
            echo "wrong";
        }
    } else {
        echo 'Incorrect username and/or password!';
    }

    $stmt->close();
}
?>