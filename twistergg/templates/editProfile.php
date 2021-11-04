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

        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3 mt-4"><img
                                src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="userProfile.php"
                                                                                            class="btn btn-outline-dark btn-sm btn-block float-end">Enrere</a>
                    </div>
                    <div class="media-body mb-5 text-black">

                        <h4 class="mt-0 mb-0"><?php echo $_SESSION['login'][2]->getName() . " " . $_SESSION['login'][2]->getLastName() ?></h4>

                        <p class="small mb-4"><i class="fas fa-map-marker-alt mr-2"></i>
                            <?php if (empty($_SESSION['login'][2]->getLocation())) { ?>
                            <?php } else {
                                $_SESSION['login'][2]->getLocation() ?>
                            <?php } ?>
                        </p>

                    </div>
                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-center text-center">
                <h2>Editar dades</h2>
            </div>

            <form class="fill-form" action="../controllers/editUserController.php" method="post" enctype="multipart/form-data">
                <div class="px-4 py-3">
                    <h5 class="mb-1">Nom i cognoms</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom/s</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                   value="<?php echo $_SESSION['login'][2]->getName() ?>">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Cognom/s</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                   value="<?php echo $_SESSION['login'][2]->getLastname() ?>">
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-1">Localització</h5>
                    <?php if (!empty($_SESSION['login'][2]->getLocation())) {
                        $arrayLocation = $_SESSION['login'][2]->getLocation();
                    } ?>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="mb-3">
                            <label for="country" class="form-label">País</label>
                            <input type="text" class="form-control" id="country" name="country"
                                   value="<?php if (isset($arrayLocation)) {
                                       $arrayLocation[0];
                                   }
                                   ?>">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">Ciutat</label>
                            <input type="text" class="form-control" id="city" name="city"
                                   value="<?php if (isset($arrayLocation)) {
                                       $arrayLocation[1];
                                   }
                                   ?>">
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-1">Data de naixament</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="form-outline datepicker w-100">
                            <input
                                    type="date"
                                    class="form-control form-control-lg"
                                    id="birthdayDate"
                                    name="birthdayDate"
                                    value="<?php echo $_SESSION['login'][2]->getBirthday(); ?>"
                            />
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-1">
                        Genere
                    </h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <h6 class="mb-2 pb-1">Sexe: </h6>
                                <div class="form-check form-check-inline">
                                    <input
                                            class="form-check-input"
                                            type="radio"
                                            name="radioButtonOption"
                                            id="femaleGender"
                                            value="female"
                                        <?php
                                        if ($_SESSION['login'][2]->getGender() == "female") { ?>
                                            checked
                                        <?php } ?>

                                    />
                                    <label class="form-check-label" for="femaleGender">Dona</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input
                                            class="form-check-input"
                                            type="radio"
                                            name="radioButtonOption"
                                            id="maleGender"
                                            value="male"

                                        <?php
                                        if ($_SESSION['login'][2]->getGender() == "male") { ?>
                                            checked
                                        <?php } ?>

                                    />
                                    <label class="form-check-label" for="maleGender">Home</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-1">Descripció</h5>
                    <textarea id="description" name="description" rows="8" cols="93"
                              maxlength="620"> <?php if (!empty($_SESSION['login'][2]->getDescription())) {
                            $_SESSION['login'][2]->getDescription();
                        } ?> </textarea>
                </div>

                <div class="bg-light p-4 d-flex justify-content-center text-center">
                    <h2>Edita dades privades</h2>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-1">Cambiar el nom d'usuari</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'usuari</label>
                            <input type="text" class="form-control" id="username" name="username" disabled
                                   value="<?php echo $_SESSION['login'][2]->getUsername() ?>">
                        </div>
                        <div class="mb-3">
                            <label for="newUsername" class="form-label">Nou nom d'usuari</label>
                            <input type="text" class="form-control" id="newUsername" name="newUsername">
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-1">Cambiar contrasenya</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="mb-3">
                            <label for="password" class="form-label">Contrasenya actual</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Nova contrasenya</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword">
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-1">Cambiar correu electronic</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correu Electronic</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?php echo $_SESSION['login'][2]->getEmail() ?>">
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-1">Cambiar numero de telefon</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="<?php echo $_SESSION['login'][2]->getPhoneNumber() ?>"
                                   placeholder="Exemple: +33 333333333">
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg float-end ms-4 me-4" type="submit" value="Edita"/>
                    <a href='userProfile.php' class='btn btn-secondary btn-lg float-end mb-3'>Enrere</a>
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
