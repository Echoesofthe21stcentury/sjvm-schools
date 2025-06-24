<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Common inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $message = $_POST['message'];
    $uid = strtoupper(substr($role, 0, 3)) . '-' . rand(10000, 99999);
    $password = "change@123";
    $changed = "no";

    $entry = "UserID: $uid\n";
    $entry .= "Password: $password\n";
    $entry .= "Changed: $changed\n";
    $entry .= "Name: $name\n";
    $entry .= "Email: $email\n";
    $entry .= "Phone: $phone\n";
    $entry .= "Role: $role\n";

    // Add role-specific fields
    if ($role === 'student') {
        $entry .= "Student Aadhar: {$_POST['student_aadhar']}\n";
        $entry .= "Gender: {$_POST['gender']}\n";
        $entry .= "Father Name: {$_POST['father_name']}\n";
        $entry .= "Father Aadhar: {$_POST['father_aadhar']}\n";
        $entry .= "Mother Name: {$_POST['mother_name']}\n";
        $entry .= "Mother Aadhar: {$_POST['mother_aadhar']}\n";
        $entry .= "Class: {$_POST['class']}\n";
    }

    if ($role === 'teacher') {
        $entry .= "Class Teacher Of: {$_POST['classteacher_of']}\n";
        $entry .= "Branch: {$_POST['branch']}\n";
    }

    $entry .= "Message: $message\n";
    $entry .= "=====\n";

    // Save to approved_users.txt
    file_put_contents("approved_users.txt", $entry, FILE_APPEND);

    echo "<h2 style='color:green;text-align:center;'>✅ Registration Successful</h2>";
    echo "<p style='text-align:center;'>Your User ID is <strong>$uid</strong><br>Default Password: <strong>$password</strong><br><br>Please <a href='userlogin.php'>Login Here</a></p>";
} else {
    echo "<h2 style='color:red;'>Invalid access.</h2>";
}
?>
