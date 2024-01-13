<?php
$name = $_POST['name'];
$mail = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$conn = new mysqli('localhost', 'lafmyebl_muhdulamin', 'KZN(P7%Nf9?T', 'lafmyebl_Requests');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO contacts (Name, Email, Subject, Message) VALUES (?, ?, ?, ?)");
    
    if ($stmt) {
        $stmt->bind_param("ssss", $name, $mail, $subject, $message);
        $stmt->execute();
        echo "Submitted Successfully...";
        $stmt->close();
    } else {
        echo "Statement preparation error: " . $conn->error;
    }
    
    $conn->close();
}
?>
