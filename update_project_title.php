<?php
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "root";
        $dbname = "projectdb";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode JSON data sent from the client
    $data = json_decode(file_get_contents("php://input"), true);

    // Get the new project title from the decoded data
    $newTitle = $data['newTitle'];

   
     $sql = "UPDATE projects SET title = '$newTitle' WHERE id = 1"; // Assuming the project ID is 1
     if (mysqli_query($conn, $sql)) {
         echo "Project title changed successfully to: " . $newTitle;
     } else {
         echo "Error updating project title: " . mysqli_error($conn);
     }

    // Close database connection if needed
     mysqli_close($conn);
} else {
    // If not a POST request, return an error message
    echo "Invalid request method.";
}
?>
