<?php

include('../includes/Auth.php');
Auth::loggedIn('noAuth');
error_reporting(E_ALL);
ini_set("display_errors", "On");

if (isset($_POST['submit'])) {
    try {
        $data = Auth::register($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);
        if (isset($data['message'])) {
            header("Location: /");
        } else {
            $errors = $data['errors'];
        }
    } catch (Exception $err) {
        die($err);
    }
}
function getValue($key): string
{
    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
    return '';
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Php Crud</title>
</head>
<body>
<?php
include('../includes/navbar.php')
?>
<main>
    <div class="container card w-50 mt-5">
        <div class="card-body">
            <div class="card-title d-flex justify-content-center">
                <h3>Sign up</h3>
            </div>
            <hr/>
            <div class="card-text">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               value=<?php echo getValue('name') ?>>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                               value=<?php echo getValue('email') ?>>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                               value=<?php echo getValue('password') ?>>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                               value=<?php echo getValue('confirmPassword') ?>>
                    </div>
                    <?php
                    require('../includes/errors.php')
                    ?>
                    <div class="mb-3 d-flex justify-content-center">
                        <input type="submit" name="submit" class="btn btn-primary" value="Sign up">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>