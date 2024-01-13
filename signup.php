<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
	$email = $_POST["Email"];
	
    // Validate email (you can use additional validation)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert email into your database table
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Lafmo";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Download (Name, Email) VALUES ('$name', '$email')";

        if ($conn->query($sql) === TRUE) {
            // Send welcome email with the PDF link
            $pdfLink = "lafmo.net";
            $subject = "Welcome to Our Newsletter!";
            $message = "Thank you for subscribing! Download your free PDF here: $pdfLink";

            mail($email, $subject, $message);

            echo "Subscription successful. Check your email for the free PDF.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Invalid email address";
    }
}
?>