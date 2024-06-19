<?php

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

$fatherName = $_SESSION['userName'];
$sql = "SELECT * FROM student WHERE Sfather = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $fatherName);
$stmt->execute();
$result = $stmt->get_result();

$children = [];
while ($row = $result->fetch_assoc()) {
    $children[] = $row;
}

$stmt->close();
$conn->close();
?>
