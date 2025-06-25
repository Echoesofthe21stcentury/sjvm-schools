<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "your_email@sjvmschools.org"; // ✅ CHANGE THIS to your real school email
    $subject = "New Admission Form Submission";

    // Sanitize and assign values
    $name = htmlspecialchars($_POST["student_name"]);
    $class = htmlspecialchars($_POST["class_applying"]);
    $dob = htmlspecialchars($_POST["dob"]);
    $aadhar = htmlspecialchars($_POST["aadhar_number"]);
    $mobile = htmlspecialchars($_POST["mobile"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $state = htmlspecialchars($_POST["state"]);
    $district = htmlspecialchars($_POST["district"]);
    $address = htmlspecialchars($_POST["address"]);
    $father_name = htmlspecialchars($_POST["father_name"]);
    $father_aadhar = htmlspecialchars($_POST["father_aadhar"]);
    $mother_name = htmlspecialchars($_POST["mother_name"]);
    $mother_aadhar = htmlspecialchars($_POST["mother_aadhar"]);
    $email = htmlspecialchars($_POST["email"]);
    $prev_school = htmlspecialchars($_POST["prev_school"]);
    $ref_source = htmlspecialchars($_POST["ref_source"]);

    // Prepare email body
    $message = "
New Admission Request Received:

Student Name: $name
Class Applying: $class
Date of Birth: $dob
Aadhar Number: $aadhar
Mobile Number: $mobile
Gender: $gender
State: $state
District: $district
Address: $address

Father's Name: $father_name
Father's Aadhar: $father_aadhar
Mother's Name: $mother_name
Mother's Aadhar: $mother_aadhar

Email: $email
Previous School: $prev_school
Referral Source: $ref_source
";

    // Headers
    $headers = "From: admission@sjvmschools.org\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your admission form was submitted successfully.";
    } else {
        echo "Error: Unable to send email. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
