<?php
include '../model/User.php';
include 'functions/functions.php';
include 'functions/regex.php';
session_start();

$email    = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

$email_format = true;
$user_format = true;
$email_exists = false;
$user_exists = false;

$_SESSION['email_msg_error'][1] = false;
$_SESSION['user_msg_error'][1] = false;


if(isset($username) && isset($password)) {

    if(!regexEmail($email)){
        $_SESSION['email_msg_error'][0] = "El correu electronic no compleix el format indicat";
        $_SESSION['email_msg_error'][1] = true;
        $email_format = false;
    }elseif (checkIfEmailExist($email)) {
        $_SESSION['email_msg_error'][0] = "Aquest correu electronic ja es troba registat amb un altre usuari";
        $_SESSION['email_msg_error'][1] = true;
        $email_exists = true;
    }

    if (!regexUsername($username)) {
        $_SESSION['user_msg_error'][0] = "El nom d'usuari no compleix el format especificat";
        $_SESSION['user_msg_error'][1] = true;
        $user_format = false;
    }elseif (checIfUserExist($username)){
        $_SESSION['user_msg_error'][0] = "Aquest nom d'usuari ja existeix";
        $_SESSION['user_msg_error'][1] = true;
        $user_exists = true;
    }

    if($email_format && $user_format && !$email_exists && !$user_exists ){
        $_SESSION['new_user'] = new User(true, $username, $password, $email);
        header('Location: ../templates/fillUserInfo.php');
        exit();
    }
    header('Location: ../templates/registerUser.php');
    exit();
}



?>
