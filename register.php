<?php
// Configure admin email
$adminEmail = "admin@sjvmschools.org";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    // Student Fields
    $aadhar = $_POST['aadhar'] ?? '';
    $aadharName = $_POST['aadharName'] ?? '';
    $fatherName = $_POST['fatherName'] ?? '';
    $fatherAadhar = $_POST['fatherAadhar'] ?? '';
    $motherName = $_POST['motherName'] ?? '';
    $motherAadhar = $_POST['motherAadhar'] ?? '';
    $class = $_POST['class'] ?? '';

    // Teacher Fields
    $classTeaching = $_POST['classTeaching'] ?? '';

    // Handle photo upload
    $photoName = $_FILES['photo']['name'];
    $photoTmp = $_FILES['photo']['tmp_name'];
    $uploadDir = "uploads/";

    // Create folder if not exists
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $photoPath = $uploadDir . uniqid() . "_" . basename($photoName);
    move_uploaded_file($photoTmp, $photoPath);

    // Prepare email content
    $subject = "New Login Request - $role";
    $message = "
    Name: $name\n
    Role: $role\n
    Email: $email\n
    Mobile: $mobile\n
    Address: $address\n";

    if ($role === "Student") {
        $message .= "
        Aadhar No: $aadhar\n
        Name (Aadhar): $aadharName\n
        Father Name: $fatherName\n
        Father Aadhar: $fatherAadhar\n
        Mother Name: $motherName\n
        Mother Aadhar: $motherAadhar\n
        Class: $class\n";
    }

    if ($role === "Teacher") {
        $message .= "Class Teaching: $classTeaching\n";
    }

    $message .= "\nPhoto uploaded at: $photoPath";

    // Send email
    $success = mail($adminEmail, $subject, $message);

    if ($success) {
        echo "<h2>Request submitted successfully!</h2><p>We’ll contact you once approved.</p>";
    } else {
        echo "<h2>Failed to send request. Try again later.</h2>";
    }
} else {
    echo "Invalid request.";
}
?>
