<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // default XAMPP user
$password = "";     // no password usually in XAMPP
$dbname = "contact_form_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Check if form fields are not empty
if (!empty($name) && !empty($email) && !empty($phone) && !empty($address) && !empty($subject) && !empty($message)) {
    // Prepare SQL to insert the form data
    $stmt = $conn->prepare("INSERT INTO messages (name, email, phone, address, subject, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $address, $subject, $message);

    // Execute and check
    if ($stmt->execute()) {
        // Close statement and connection
        $stmt->close();
        $conn->close();
        
        // Redirect after successful save to email.html
        header("Location: email.html?success=1");
        exit();
    } else {
        echo "Error saving message: " . $stmt->error;
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Please fill out all the fields.";
    $conn->close();
}
?>
