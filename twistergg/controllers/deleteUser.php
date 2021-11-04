<?php
include_once '../model/User.php';
include_once '../model/Post.php';
include_once '../model/Comment.php';
include 'functions/functions.php';
session_start();

$_SESSION['user'] = getUserByUsername($_POST['username']);
if($_SESSION['user'] != null){
    deleteUserPosts();
    $key = array_search($_SESSION['user'], $_SESSION['users']);
    unset($_SESSION['users'][$key]);
}

header('Location: ../templates/userAdminList.php');
