<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'project';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (!isset($_POST['username'], $_POST['email'], $_POST['password'])) {

    exit('Please complete the registration form!');
}
if (empty($_POST['username']) || empty($_POST['email'] || empty($_POST['password']))) {
    exit('Please complete the registration form');
}

if ($stmt = $con->prepare('SELECT id, Password FROM signup WHERE Name = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo 'Username exists, please choose another!';
    } else {
        if ($stmt = $con->prepare('INSERT INTO signup (Name, Email,Password) VALUES (?, ?, ?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
            $stmt->execute();
            echo 'You have successfully registered! You can now login!';
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
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
echo "hello";
if (isset($_POST["submit"])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vehiclerental123@gmail.com';
    $mail->Password = 'jkpwqcihdvdkwhva';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    echo "hello";
    $mail->setFrom('vehiclerental123@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = "Register";
    $mail->Body = "You hace successfully registered.";
    $mail->send();

    echo
        "
    <script>
    alert('Sent Successfully');
    document.location.href='index.php';
    </script>";
}

?>