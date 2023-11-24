<?php

$servername = "localhost"; // Replace with your actual MySQL server name
$username = "root"; // Replace with your actual MySQL username
$password = ""; // Replace with your actual MySQL password
$dbname = "db"; // Replace with your actual database name

// Check if data is sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract parameters from the POST request
  //  $param1 = $_POST['param1']; // Replace with the actual parameter name
    //$param2 = $_POST['param2']; // Replace with the actual parameter name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Modify the SQL query based on your requirements
    $query = "SELECT * FROM employees  WHERE 1";
    
    // Execute the query
    $result = $conn->query($query);

    // Organize data into an array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Close the connection
    $conn->close();

    // Return data as JSON
    echo json_encode(['data' => $data]);
} else {
    // If not a POST request, handle accordingly (optional)
    echo "Invalid request method.";
}
?>
