<?php
include_once '../model/User.php';
include_once '../model/Post.php';
include_once '../model/Comment.php';
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Panell d'usuari</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">TwisterGG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="userPanel.php">Inici</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userList.php">Usuaris</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['login'][2]->getUsername()?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if($_SESSION['login'][2]->getUsername() == "admin"){ ?>
                            <li><a class="dropdown-item" href="userAdminList.php">Llista de usuaris</a></li>
                            <li><a class="dropdown-item" href="postsAdminList.php">Llista de posts</a></li>
                        <?php }else{ ?>
                            <li><a class="dropdown-item" href="userProfile.php">Perfil</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="login.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="row py-5 px-4">
    <div class="col-md-5 mx-auto">
        <div class="bg-white shadow rounded overflow-hidden">

            <h1 class="mt-3 text-center">Posts</h1>

            <?php if(!isset($_SESSION['user']) || !$_SESSION['user']->getPosts() !== null){?>
                <div class="px-4 py-3">
                    <div class="p-4 rounded shadow-sm bg-light">
                        Aquest usuari encara no ha pujat cap post
                    </div>
                </div>
            <?php }else{ ?>
                <?php foreach ($_SESSION['user']->getPosts() as $post){?>
                    <div class="px-4 py-3 mb-4">
                        <div class="p-4 rounded shadow-sm bg-light">
                            <div class="text-center">
                                <h5 ><?php echo $post->getTitle();?></h5>
                            </div>
                            <div class="text-justify">
                                <p><?php echo $post->getBody()?></p>
                            </div>
                            <div class="float-end mb-3">
                                <p><?php echo $post->getDate()->format('d-m-y h:i') ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php }?>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
