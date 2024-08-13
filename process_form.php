<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projectdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the SQL statement with placeholders
    $sql = "INSERT INTO students (first_name, last_name, admission_no, program, project_title) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bind_param("ssiss", $firstName, $lastName, $admissionNo, $program, $projectTitle);
    
    // Set parameters and execute
    $firstName = $_POST['txtFirstName'];
    $lastName = $_POST['txtLastName'];
    $admissionNo = $_POST['admNo'];
    $program = $_POST['ddlProgram'];
    $projectTitle = $_POST['txtProjectTitle'];
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
