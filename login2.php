<?php
// Replace these variables with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ipproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming $uname and $password are user inputs (e.g., from a form)
$uname = $_POST['login-name']; // replace with your actual form field name
$password = $_POST['login-password']; // replace with your actual form field name

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM ipproject WHERE email = ? AND password = ? LIMIT 1");
$stmt->bind_param("ss", $uname, $password);

// Execute the query
$stmt->execute();

// Store the result to check if a matching record was found
$stmt->store_result();

// Check the number of rows returned
if ($stmt->num_rows > 0) {
    echo "Login successful!";
} else {
    echo "Login failed.";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
