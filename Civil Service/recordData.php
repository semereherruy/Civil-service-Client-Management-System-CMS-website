<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal Details
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $surname = $_POST['surname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $nationalId = $_POST['nationalId'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];

    // Educational and Professional Information
    $educationalLevel = $_POST['educationalLevel'];
    $certification = $_FILES['certification']['name'];  //?
    $employeeId = $_POST['employeeId'];
    $department = $_POST['department'];
    $jobTitle = $_POST['jobTitle'];
    $employmentStatus = $_POST['employmentStatus'];
    $dateOfJoining = $_POST['dateOfJoining'];
    $dateOfLeaving = $_POST['dateOfLeaving'];
    $organizationName = $_POST['organizationName'];
    $workLocation = $_POST['workLocation'];

    // Additional Information
    $emergencyName = $_POST['emergencyName'];
    $emergencyRelationship = $_POST['emergencyRelationship'];
    $emergencyPhone = $_POST['emergencyPhone'];
    $skills = $_POST['skills'];
    $languages = $_POST['languages'];
    $healthInfo = $_FILES['healthInfo']['name'];
    $legalDocs = $_FILES['legalDocs']['name'];

    // File Upload Paths
    $uploadDir = 'uploads/';
    move_uploaded_file($_FILES['certification']['tmp_name'], $uploadDir . $certification);
    move_uploaded_file($_FILES['healthInfo']['tmp_name'], $uploadDir . $healthInfo);
    move_uploaded_file($_FILES['legalDocs']['tmp_name'], $uploadDir . $legalDocs);

    // SQL Insert Statement
    $sql = "INSERT INTO clients (
        firstName, middleName, surname, dob, gender, nationality, region, city, nationalId, phoneNumber, email, 
        educationalLevel, certification, employeeId, department, jobTitle, employmentStatus, dateOfJoining, dateOfLeaving, 
        organizationName, workLocation, skills, languages, healthInfo, legalDocs, emergencyName, emergencyRelationship, emergencyPhone
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
    )";

    // Prepare and Bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssssssssssssssss", 
        $firstName, $middleName, $surname, $dob, $gender, $nationality, $region, $city, $nationalId, $phoneNumber, $email, 
        $educationalLevel, $certification, $employeeId, $department, $jobTitle, $employmentStatus, $dateOfJoining, $dateOfLeaving, 
        $organizationName, $workLocation, $skills, $languages, $healthInfo, $legalDocs, $emergencyName, $emergencyRelationship, $emergencyPhone
    );

    // Execute and Check
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
