<?php
include_once '../model/User.php';
include 'functions/functions.php';

session_start();
$user = $_POST["username"] ?? null;
$pass = $_POST["password"] ?? null;


if (isset($user) && isset($pass) && isset($_SESSION["users"])) {
    if ($user === $_SESSION["users"][0]->getUsername() && $pass === $_SESSION["users"][0]->getPassword()) {
        //ADMIN
        $_SESSION["login"] = array(true, true, $_SESSION["users"][0]);
        header('Location: ../templates/userPanel.php');

    } elseif (checkCredUser($user, $pass) != null) {
        $_SESSION["login"] = array(false, true, checkCredUser($user, $pass));
        header('Location: ../templates/userPanel.php');
    } else {
        //INVALID CREDENTIALS
        $_SESSION["login"] = array(false, false, null);
        header('Location: ../templates/login.php');
    }
}
?>
