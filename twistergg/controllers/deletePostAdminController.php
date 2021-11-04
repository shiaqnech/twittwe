<?php
include_once '../model/User.php';
include_once '../model/Post.php';
include_once '../model/Comment.php';
include 'functions/functions.php';
session_start();

deleteUserPostByAdmin($_POST['postId'], $_POST['username']);
header('Location: ../templates/viewPosts.php');




