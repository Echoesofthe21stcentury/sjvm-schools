<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $_POST['student_name'];
    $classApplying = $_POST['class_applying'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $aadhar = $_POST['aadhar'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Emails to receive the form
    $to = "echoesofthe21stcentury@gmail.com, saptasoul.offical@gmail.com";

    $subject = "New Admission Request from $studentName";
    $message = "
        New Admission Request:

        Name: $studentName
        Class Applying: $classApplying
        Mobile: $mobile
        DOB: $dob
        Aadhar: $aadhar
        Email: $email
        Address: $address
    ";

    $headers = "From: no-reply@sjvmschools.org";

    if (mail($to, $subject, $message, $headers)) {
        echo "✅ Admission form submitted successfully! We'll get in touch soon.";
    } else {
        echo "❌ Error: Unable to send the admission request.";
    }
} else {
    echo "Invalid access.";
}
?>
