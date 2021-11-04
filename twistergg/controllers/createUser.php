<?php
include_once '../model/User.php';
include_once '../model/Post.php';
include_once '../model/Comment.php';
include 'functions/regex.php';
session_start();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$birthday = $_POST['birthdayDate'];


$phoneNumber = $_POST['phoneNumber'];
$gender = $_POST['radioButtonOption'];
$firstName_regex = true;
$lastName_regex = true;
$birthday_regex = true;
$phoneNumber_regex = true;
$gender_selected = true;

if (!regexFirstName($firstName)) {
    $firstName_regex = false;
}
if (!regexLastName($lastName)) {
    $lastName_regex = false;
}

$birthday_regex = regexBirthday($birthday);

if (!regexPhoneNumber($phoneNumber)) {
    $phoneNumber_regex = false;
}

if (is_null($gender)) {
    $gender_selected = false;
}

if ($firstName_regex && $lastName_regex && $birthday_regex && $phoneNumber_regex && $gender_selected) {
    //Adding properties to the new usee
    $_SESSION['new_user']->setName($firstName);
    $_SESSION['new_user']->setLastName($lastName);
    $_SESSION['new_user']->setBirthday($birthday);
    $_SESSION['new_user']->setPhoneNumber($phoneNumber);
    $_SESSION['new_user']->setGender($gender);

    //Saving the img in the local server
    $uploaddir = 'C:/xampp/htdocs/twistergg/static/avatars/';
    $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
    $_SESSION['new_user']->setAvatar(basename($_FILES['avatar']['name']));
    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadfile);

    //Pushing the new user
    array_push($_SESSION['users'], $_SESSION['new_user']);

    //Giving user credential to login
    $_SESSION["login"] = array(false, true, $_SESSION['new_user']);

    header('Location: ../templates/userProfile.php');
} else {
    header('Location: ../templates/registerUser.php');
}
exit();


?>