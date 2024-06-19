<?php
session_start();

if (isset($_POST['loginMail']) && isset($_POST['loginPassword'])) {
    $uMail = $_POST['loginMail'];
    $uPass = $_POST['loginPassword'];

    try {
        $db = new mysqli('localhost', 'root', '', 'Kindergarten');
        $qryStr = "SELECT * FROM Users";
        $res = $db->query($qryStr);
        $loginSuccess = false;

        for ($i = 0; $i < $res->num_rows; $i++) {
            $row = $res->fetch_object();
            if ($row->uMail == $uMail && $row->uPassword == $uPass) {
                $_SESSION['userEmail'] = $uMail; // Save user email
                $_SESSION['userName'] = $row->uName; // Save user name
                if ($row->uType == 1) {
                    $_SESSION['isAdmin'] = true;
                } else {
                    $_SESSION['isAdmin'] = false;
                }
                header('Location: SiteFolder/index.php');
                exit;
            }
        }


        $_SESSION['loginError'] = true;
        $db->close();
    } catch (Exception $e) {
        echo "error";
    }

    header('Location: HTML/Login.php');
    exit;
}
?>
