<?php
include_once '../model/User.php';
include_once '../model/Post.php';
include_once '../model/Comment.php';
session_start();

unset($_SESSION['new_user']);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/editProfileStyle.css">

    <title>Perfil</title>
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
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3 mt-4"><img
                                src="../static/avatars/<?php echo $_SESSION['login'][2]->getAvatar()?>"
                                alt="..." width="200" class="rounded mb-2 img-thumbnail"><a href="userProfile.php"
                                                                                            class="btn btn-outline-dark btn-sm btn-block float-end me-3">Enrere</a>
                    </div>
                    <div class="media-body mb-5 text-black">
                        <h4 class="mt-0 mb-0"><?php echo $_SESSION['login'][2]->getName() . " " . $_SESSION['login'][2]->getLastName() ?></h4>
                        <p class="small mb-4"><i class="fas fa-map-marker-alt mr-2"></i>

                            <?php if (empty($_SESSION['login'][2]->getLocation())) { ?>
                                Desconeguda
                            <?php } else {
                                $array_location = $_SESSION['login'][2]->getLocation() ?>
                                <?php
                                echo $array_location[0];
                                ?>,
                                <?php
                                echo " " . $array_location[1];
                                ?>
                            <?php } ?>
                        </p>
                    </div>
                </div>
            </div>
            <form class="fill-form" action="../controllers/createPost.php" method="post" enctype="multipart/form-data">
                <div class="bg-light p-4 d-flex justify-content-center text-center">
                    <h1>Nou post</h1>
                </div>
                <div class="px-4 py-3">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="mb-3">
                            <label for="title" class="form-label"><h5>Titol</h5></label>
                            <input type="text" class="form-control" id="title" name="title"
                                   value="">
                        </div>
                    </div>
                    <div class="p-4 rounded shadow-sm bg-light mt-4">
                        <h5 class="mb-1">Descripció</h5>
                        <textarea id="description" name="description" rows="9" cols="86" maxlength="620"> </textarea>
                    </div>

                    <div class="p-4 rounded shadow-sm bg-light mt-4">
                        <label>Escull una imatge per al post</label>
                        <input type="file"
                               id="avatar" name="avatar"
                               accept="image/png, image/jpeg"
                        >
                    </div>
                    <div class="mt-4 pt-2">
                        <input class="btn btn-primary btn-lg float-end ms-4 me-4" type="submit" value="Crear Post"/>
                        <a href='userProfile.php' class='btn btn-secondary btn-lg float-end mb-3'>Enrere</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
