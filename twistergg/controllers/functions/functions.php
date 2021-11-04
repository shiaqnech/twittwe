<?php
function checkCredUser($user, $password)
{
    foreach ($_SESSION["users"] as $usuari) {
        if ($usuari->getUsername() == $user) {
            if ($usuari->getPassword() === $password) {
                return $usuari;
            }
        }
    }
    return null;
}

function checkIfEmailExist($email): bool
{
    foreach ($_SESSION['users'] as $user) {
        if ($user->getEmail() == $email) {
            return true;
        }
    }
    return false;
}

function checIfUserExist($username): bool
{
    foreach ($_SESSION['users'] as $user) {
        if ($user->getUsername() == $username) {
            return true;
        }
    }
    return false;
}

function checkIfPasswordMatch($password): bool
{
    foreach ($_SESSION['users'] as $user) {
        if ($user->getUsername() == $_SESSION['login'][2]->getUsername()) {
            if ($user->getPassword() == $password) {
                return true;
            }
        }
    }
    return false;
}

function updateUserInfo($name, $lastName, $country, $city, $birthdayDate, $radioButtonOption, $newUsername, $newPassword, $email, $phone, $description)
{
    foreach ($_SESSION['users'] as $user) {
        if ($user->getUsername() == $_SESSION['login'][2]->getUsername()) {
            $user->setName($name);
            $user->setLastName($lastName);
            if ($country != "" && $city != "") {
                $array = array($country, $city);
                $user->setLocation($array);
            }
            $user->setBirthday($birthdayDate);
            $user->setGender($radioButtonOption);
            if ($newUsername != "") {
                $user->setUsername($newUsername);
            }
            if ($newPassword != "") {
                $user->setPassword($newPassword);
            }
            $user->setEmail($email);
            $user->setPhoneNumber($phone);
            $user->setDescription($description);
//            die(var_dump($_SESSION['users'][1]->getDescription()));

            $_SESSION['login'][2] = $user;
//            die(var_dump($_SESSION['login'][2]->getDescription()));
        }
    }
}

function pushNewPostToUser(Post $newPost)
{
    $var = array($newPost);
    foreach ($_SESSION['users'] as $user){
        if($user->getUsername() == $_SESSION['login'][2]->getUsername()){
            $user->setPosts(array_merge($user->getPosts(),$var));
            $_SESSION['login'][2] = $user;
//            die(var_dump($user->getPosts()));
//            die(var_dump("array usuaris" . $user->getPosts() . "login" . $_SESSION['login'][2]->getPosts()));
        }
    }
}

function getUserByUsername($username){
 foreach ($_SESSION['users'] as $user){
     if($user->getUsername() == $username){
         return $user;
     }
 }
 return null;
}

function deleteUserPosts(){
    foreach ($_SESSION['posts'] as $post){
        if($post->getUser()->getUsername() == $_SESSION['user']->getUsername()){
            $key = array_search($post, $_SESSION['posts']);
            unset($_SESSION['posts'][$key]);
        }
    }
}

function deleteUserPostByAdmin($postId, $username)
{
    $get_post = getPostByID($postId);
    $key_p1 = array_search($get_post, $_SESSION['posts']);
    unset($_SESSION['posts'][$key_p1]);

    foreach ($_SESSION['users'] as $user){
        if($user->getUsername() == $username){
            $array = $user->getPosts();
            $key = array_search($get_post, $array);
            unset($array[$key]);
            $user->setPosts($array);
            $_SESSION['user'] = $user;
        }
    }
}

function getPostByID($postId)
{
    foreach ($_SESSION['posts'] as $post){
        if($post->getPostID() == $postId){
            return $post;
        }
    }
    return null;
}



