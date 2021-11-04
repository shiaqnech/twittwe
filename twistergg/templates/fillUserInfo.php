<?php
include_once '../model/User.php';
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="styles/fillUserStyle.css">-->

    <title>Hello, world!</title>
</head>
<body>
<section class="vh-100 gradient-custom"
         style="background-image: url(../static/bg-images/fill-bg.jpg);-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-10">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Dades de l'usuari</h1>
                        <form class="fill-form" action="../controllers/createUser.php" method="post"
                              enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="firstName" name="firstName"
                                               class="form-control form-control-lg" placeholder="Nom"/>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="lastName" name="lastName"
                                               class="form-control form-control-lg" placeholder="Cognom"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <input
                                                type="date"
                                                class="form-control form-control-lg"
                                                id="birthdayDate"
                                                name="birthdayDate"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="tel" id="phoneNumber" name="phoneNumber"
                                               class="form-control form-control-lg"
                                               placeholder="Exemple: +33 333333333"/>
                                    </div>
                                </div>
                            </div>

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
                                                checked
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
                                        />
                                        <label class="form-check-label" for="maleGender">Home</label>
                                    </div>
                                </div>
                            </div>

                            <label>Choose a profile picture:</label>

                            <input type="file"
                                   id="avatar" name="avatar"
                                   accept="image/png, image/jpeg">

                            <div class="mt-4 pt-2 float-left">
                                <a href='registerUser.php' class='btn btn-secondary btn-lg float-left'>Enrere</a>
                            </div>

                            <div class="mt-4 pt-2 float-right">
                                <input class="btn btn-primary btn-lg" type="submit" value="Registra"/>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>