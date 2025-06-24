<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name             = $_POST["name"];
    $email            = $_POST["email"];
    $phone            = $_POST["phone"];
    $role             = $_POST["role"];
    $message          = $_POST["message"];

    $class            = $_POST["class"] ?? "";
    $gender           = $_POST["gender"] ?? "";
    $student_aadhar   = $_POST["student_aadhar"] ?? "";
    $father_name      = $_POST["father_name"] ?? "";
    $father_aadhar    = $_POST["father_aadhar"] ?? "";
    $mother_name      = $_POST["mother_name"] ?? "";
    $mother_aadhar    = $_POST["mother_aadhar"] ?? "";

    $classteacher_of  = $_POST["classteacher_of"] ?? "";
    $branch           = $_POST["branch"] ?? "";

    // Prepare the data string
    $entry = "=============================\n";
    $entry .= "Name: $name\n";
    $entry .= "Email: $email\n";
    $entry .= "Phone: $phone\n";
    $entry .= "Role: $role\n";
    
    if ($role === "student") {
        $entry .= "Class: $class\n";
        $entry .= "Gender: $gender\n";
        $entry .= "Student Aadhar: $student_aadhar\n";
        $entry .= "Father Name: $father_name\n";
        $entry .= "Father Aadhar: $father_aadhar\n";
        $entry .= "Mother Name: $mother_name\n";
        $entry .= "Mother Aadhar: $mother_aadhar\n";
    } elseif ($role === "teacher") {
        $entry .= "Class Teacher Of: $classteacher_of\n";
        $entry .= "Branch: $branch\n";
    }

    $entry .= "Message: $message\n";
    $entry .= "Submitted At: " . date("Y-m-d H:i:s") . "\n";

    $file = fopen("registrations_pending.txt", "a");
    fwrite($file, $entry . "\n");
    fclose($file);

    // Redirect back with success (can add a success flag)
    header("Location: register.html?success=1");
    exit;
} else {
    echo "Invalid request method!";
}
?>
