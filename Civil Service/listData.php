<?php

include "connection.php";

// Process search query
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $employeeId = $_GET['employeeId'];

    // SQL Query
    $sql = "SELECT * FROM clients WHERE employeeId = ?";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employeeId);

    // Execute statement
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["firstName"] . " " . $row["middleName"] . " " . $row["surname"] . "<br>";
            echo "Date of Birth: " . $row["dob"] . "<br>";
            echo "Gender: " . $row["gender"] . "<br>";
            echo "Nationality: " . $row["nationality"] . "<br>";
            echo "Region: " . $row["region"] . "<br>";
            echo "City: " . $row["city"] . "<br>";
            echo "National ID: " . $row["nationalId"] . "<br>";
            echo "Phone Number: " . $row["phoneNumber"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Educational Level: " . $row["educationalLevel"] . "<br>";
            echo "Employee ID: " . $row["employeeId"] . "<br>";
            echo "Department: " . $row["department"] . "<br>";
            echo "Job Title: " . $row["jobTitle"] . "<br>";
            echo "Employment Status: " . $row["employmentStatus"] . "<br>";
            echo "Date of Joining: " . $row["dateOfJoining"] . "<br>";
            echo "Date of Leaving: " . $row["dateOfLeaving"] . "<br>";
            echo "Organization Name: " . $row["organizationName"] . "<br>";
            echo "Work Location: " . $row["workLocation"] . "<br>";
            echo "Emergency Contact Name: " . $row["emergencyName"] . "<br>";
            echo "Emergency Relationship: " . $row["emergencyRelationship"] . "<br>";
            echo "Emergency Phone Number: " . $row["emergencyPhone"] . "<br>";
            echo "Skills and Competences: " . $row["skills"] . "<br>";
            echo "Languages Spoken: " . $row["languages"] . "<br>";
            echo "Health Information: <a href='uploads/" . $row["healthInfo"] . "'>Download Health Info</a><br>";
            echo "Legal Documentations: <a href='uploads/" . $row["legalDocs"] . "'>Download Legal Docs</a><br>";
            echo "<hr>";
        }
    } else {
        echo "No results found for Employee ID: " . $employeeId;
    }

    // Close statement and connection
    $stmt->close();
}

$conn->close();
?>
