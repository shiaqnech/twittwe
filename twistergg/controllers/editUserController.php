<?php
include_once '../model/User.php';
include_once '../model/Post.php';
include_once '../model/Comment.php';
include 'functions/regex.php';
include 'functions/functions.php';
session_start();

$name = array($_POST["nom"] ?? null, true);
$lastName = array($_POST["lastname"] ?? null, true);
$country = array($_POST["country"] ?? null, true);
$city = array($_POST["city"] ?? null, true);
$birthdayDate = array($_POST["birthdayDate"] ?? null, true);
$radioButtonOption = array($_POST["radioButtonOption"] ?? null, true);
$description = $_POST["description"] ?? null;
$password = $_POST["password"] ?? null;
$newUsername = array($_POST["newUsername"] ?? null, true);
$newPassword = array($_POST["newPassword"] ?? null, true);
$email = array($_POST["email"] ?? null, true);
$phone = array($_POST["phone"] ?? null, true);

if (!regexFirstName($name[0])) {
    $name[1] = false;
}
if (!regexLastName($lastName[0])) {
    $lastName[1] = false;
}
if ($country[0] != "" && $city[0] != "") {

    if (!regexOnlyLetters($country[0])) {
        $country[1] = false;
    }
    if (!regexOnlyLetters($city[0])) {
        $city[1] = false;
    }
}

//if (!regexBirthday($birthdayDate[0])) {
//    $birthdayDate[1] = false;
//}
if (is_null($radioButtonOption[0])) {
    $radioButtonOption[1] = false;
}
if ($newUsername[0] != "") {
    if (!regexUsername($newUsername[0])) {
        $newUsername[1] = false;
    } elseif (checIfUserExist($newUsername[0])) {
        $newUsername[1] = false;
    }
}
if ($newPassword[0] != "") {
    if (!checkIfPasswordMatch($password)) {
        $newPassword[1] = false;
    } elseif (regexPassword($newPassword)) {
        $newPassword[1] = false;
    }
}

if (!regexEmail($email[0])) {
    $email[1] = false;
}
if (!regexPhoneNumber($phone[0])) {
    $phone[1] = false;
}

if ($name[1] && $lastName[1] && $country[1] && $city[1] && $birthdayDate[1] && $radioButtonOption[1] && $newUsername[1] && $newPassword[1] && $email[1] && $phone[1]) {
    updateUserInfo($name[0], $lastName[0], $country[0], $city[0], $birthdayDate[0], $radioButtonOption[0], $newUsername[0], $newPassword[0], $email[0], $phone[0], $description);
} else {
}
header('Location: ../templates/editProfile.php');
exit();


?>
