<?php
// Check if the email parameter is set in the POST request
if(isset($_POST['email'])) {
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

    // Prepare and bind the SQL statement to delete the row with the provided email
    $stmt = $conn->prepare("DELETE FROM teachers WHERE Temail = ?");
    $stmt->bind_param("s", $email);

    // Set the email parameter from the POST request
    $email = $_POST['email'];

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        // Deletion successful
        echo "Row deleted successfully";
    } else {
        // Error occurred
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If email parameter is not set in the POST request
    echo "Email parameter not provided";
}
?>
