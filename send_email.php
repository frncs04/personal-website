<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Form Submitted</h2>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($_POST["name"]) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST["email"]) . "</p>";
    echo "<p><strong>Subject:</strong> " . htmlspecialchars($_POST["subject"]) . "</p>";
    echo "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($_POST["message"])) . "</p>";
    echo "<a href='index.html'>Back to site</a>";
} else {
    echo "Form not submitted correctly.";
}
?>
