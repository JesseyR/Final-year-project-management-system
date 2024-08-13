<?php
// Database connection details
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

// Fetch tasks
$sql = "SELECT id, description, completed FROM tasks";
$result = $conn->query($sql);

$tasks = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
}

$conn->close();

// Return tasks as JSON
echo json_encode($tasks);
?>
