<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $email = $_POST["Email"];

    // Validate email (you can use additional validation)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert data into your database table
        $servername = "localhost";
        $username = "lafmyebl_muhdulamin";
        $password = "KZN(P7%Nf9?T";
        $dbname = "lafmyebl_Requests";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Download (Name, Email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'server167.web-hosting.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'admin@lafmo.net';
                $mail->Password   = 'Falahm-4103';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = '465';

                //Recipient
                $mail->setFrom('admin@lafmo.net', 'Adrian Oliver');
                $mail->addAddress($email);

                //Content
                $pdfLink = "lafmo.net/images/banner.png";
                $subject = "Welcome to Our Newsletter!";
                $message = "Thank you for subscribing! Download your free PDF here: $pdfLink";

                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $message;

                $mail->send();
                echo "Subscription successful. Check your email for the free PDF.";
            } catch (Exception $e) {
                echo "Error sending email: " . $mail->ErrorInfo;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid email address";
    }
}
?>
