<?php

function regexEmail($email): bool
{
    if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
        return true;
    }
    return false;
}

function regexUsername($username) : bool
{
    if(preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{4,15}$/', $username)){
        return true;
    }
    return false;
}

function regexPassword(array $newPassword) : bool
{
    if(preg_match('/^[A-Za-z0-9_@./#&+*-]{7,30}$/', $newPassword)){
        return true;
    }
    return false;
}

function regexFirstName($firstName): bool
{
    if (preg_match("/^([a-zA-Z' ]{2,20}+)$/", $firstName)) {
        return true;
    }
    return false;
}

function regexLastName($lastName): bool
{
    if (preg_match("/^([a-zA-Z' ]{2,20}+)$/", $lastName)) {
        return true;
    }
    return false;
}

function regexBirthday($birthday): bool
{
    list($yyyy, $mm, $dd) = explode('-', $birthday);
    if (!checkdate($mm, $dd, $yyyy)) {
        return false;
    }
    return true;
}

function regexPhoneNumber($phoneNumber): bool
{
    if (preg_match("/\(?\+[0-9]{1,3}\)? ?-?[0-9]{1,3} ?-?[0-9]{3,5} ?-?[0-9]{4}( ?-?[0-9]{3})? ?(\w{1,10}\s?\d{1,6})?/", $phoneNumber)) {
        return true;
    }
    return false;
}
function regexOnlyLetters($country) : bool
{
    if (preg_match("/^([a-zA-Z' ]{2,20}+)$/", $country)) {
        return true;
    }
    return false;
}

?>