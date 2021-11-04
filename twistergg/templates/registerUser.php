<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/textStyles.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registra Usuari</title>
</head>
<body>
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="col-md-5 col-12 bg-light rounded p-5 border-5s align-item-center">
            <h1 class="text-center mb-4">Registrar Usuari</h1>
            <form class="register-form" action="../controllers/newUser.php" method="post">
                <div class="mb-3">
                    <label for="email">Correu Electronic</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <?php if($_SESSION['email_msg_error'][1] == true){
                        echo "<p class='register-msg-error'>" . $_SESSION['email_msg_error'][0] . "</p>";
                    } ?>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Usuari</label>
                    <input type="text" class="form-control" id="username"  name="username" aria-describedby="emailHelp">
                    <?php if($_SESSION['user_msg_error'][1] == true){
                        echo "<p class='register-msg-error'>" . $_SESSION['user_msg_error'][0] . "</p>";
                    } ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contrasenya</label>
                    <input type="password" class="form-control" id="password" name="password">

                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Contrasenya</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-primary ">Continue</button>
                </div>
            </form>
            <a href='login.php' class='btn btn-danger'>Cancela</a>
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
