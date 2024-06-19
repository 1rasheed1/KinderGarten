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
$name = $_POST['name1'];
$father = $_POST['father1'];
$age = $_POST['age1'];
$claSS = $_POST['claSS1'];
$phone = $_POST['phone1'];

// Prepare SQL statement to insert data into teachers table
$stmt = $conn->prepare("INSERT INTO student (Sname, Sfather, Sage, Sclass, Sphone) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssdds", $name, $father, $age, $claSS, $phone);

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



