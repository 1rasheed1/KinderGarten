<?php
if (isset($_POST['signupMail']) && isset($_POST['signupPass']) && isset($_POST['signupName'])) {
    $uMail = $_POST['signupMail'];
    $uPass = $_POST['signupPass'];
    $uName = $_POST['signupName'];

    try {
        $db = new mysqli('localhost', 'root', '', 'Kindergarten');
        
        // Insert the new user
        $qryStr = "INSERT INTO Users (uName, uMail, uPassword, uType) VALUES (?, ?, ?, 2)";
        $stmt = $db->prepare($qryStr);
        $stmt->bind_param("sss", $uName, $uMail, $uPass);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            header('Location: SiteFolder/index.php');
            exit;
        } else {
            echo "<script>alert('Failed to register user!');</script>";
        }

        $stmt->close();
        $db->close();
    } catch (Exception $e) {
        echo "error";
    }
}
?>
