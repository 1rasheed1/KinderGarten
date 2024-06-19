<?php
// MySQL database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Kindergarten";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch POST data
$name = $_POST['name'];
$work = $_POST['work'];
$age = $_POST['age'];
$salary = $_POST['salary'];
$email = $_POST['email'];

// Prepare SQL statement to insert data into teachers table
$stmt = $conn->prepare("INSERT INTO teachers (Tname, Twork, Tage, Tsalary, Temail) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdds", $name, $work, $age, $salary, $email);

// Execute prepared statement
if ($stmt->execute()) {
     echo '<script>window.location.href = "../SiteFolder/404.php";</script>';
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>



