<?php
include_once '../model/User.php';
include_once '../model/Post.php';
include_once '../model/Comment.php';
include 'functions/regex.php';
include 'functions/functions.php';
session_start();

$title = $_POST['title'];
$desc = $_POST['description'];
$data = date('d-m-y h:i');
$dateTime = DateTime::createFromFormat('d-m-y h:i', $data);

if($title != "" && $desc != "") {
    $newPost = new Post($_SESSION["postID"], $_SESSION['login'][2], "", $title, $desc, $dateTime);
    $varArray = array($newPost);
    $_SESSION["postID"] = $_SESSION["postID"] + 1;
    $_SESSION['posts'] = array_merge($varArray, $_SESSION['posts']);
    pushNewPostToUser($newPost);
}

header('Location: ../templates/userPanel.php');
exit();
