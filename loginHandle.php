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
                header('Location: preschool-website-template/index.html');
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
