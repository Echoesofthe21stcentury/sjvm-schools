<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = "";
    foreach ($_POST as $key => $value) {
        $data .= ucfirst($key) . ": " . htmlspecialchars($value) . "\n";
    }
    $data .= "-----\n";

    file_put_contents("pending_registrations.txt", $data, FILE_APPEND);

    echo "<h2 style='color:green;'>✅ Registration submitted successfully!</h2>";
    echo "<p>Your request has been sent for approval.</p>";
    echo "<a href='register.html'>Go Back</a>";
} else {
    echo "Invalid access.";
}
?>
