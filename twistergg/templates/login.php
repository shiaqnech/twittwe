<?php
include_once '../model/User.php';
include_once '../model/Post.php';
include_once '../model/Comment.php';
session_start();

$_SESSION['email_msg_error'] = array("",false);
$_SESSION['user_msg_error'] = array("",false);
$_SESSION["login"] = array(false,false,null);
$_SESSION['user'] = null;


    if(!isset($_SESSION["users"]) || !isset($_SESSION["posts"]) || !isset($_SESSION["coments"])){
        $_SESSION["users"] = array(
            new User(true, "admin","admin", "")
        );
        $_SESSION["posts"] = array();
        $_SESSION["coments"] = array();
        $_SESSION["postID"] = 1;
    }

?>

</html>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bootstrap 4 Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<body>

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center" style="background-image: url(../static/bg-images/index-bg.jpg);-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
    <div class="col-md-5 col-12 bg-light rounded p-5 border-5s align-item-center">
        <h1 class="text-center">Login</h1>
        <form class="login-form" action="../controllers/checkLogin.php" method="post">
            <div class="mb-3 ">
                <label for="username" class="form-label">Usuari</label>
                <input type="text" class="form-control" id="username"  name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 just">
                <label for="password" class="form-label">Contrasenya</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <a href="registerUser.php">Registrar nou usuari</a>
            <div class="float-right">
                <button type="submit" class="btn btn-secondary ">Login</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>