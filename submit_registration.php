<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        "Name" => $_POST['name'] ?? '',
        "Email" => $_POST['email'] ?? '',
        "Phone" => $_POST['phone'] ?? '',
        "Role" => $_POST['role'] ?? '',
        "Class" => $_POST['class'] ?? '',
        "Branch" => $_POST['branch'] ?? '',
        "Aadhar (Student)" => $_POST['student_aadhar'] ?? '',
        "Father Name" => $_POST['father_name'] ?? '',
        "Father Aadhar" => $_POST['father_aadhar'] ?? '',
        "Mother Name" => $_POST['mother_name'] ?? '',
        "Mother Aadhar" => $_POST['mother_aadhar'] ?? '',
        "Gender" => $_POST['gender'] ?? '',
        "Message" => $_POST['message'] ?? ''
    ];

    $entry = "";
    foreach ($data as $key => $value) {
        if (!empty($value)) {
            $entry .= "$key: $value\n";
        }
    }
    $entry .= "-----\n";

    file_put_contents("pending_registrations.txt", $entry, FILE_APPEND);
    echo "<h2>✅ Registration submitted successfully. Await approval.</h2>";
} else {
    echo "<h2>❌ Invalid access.</h2>";
}
?>
