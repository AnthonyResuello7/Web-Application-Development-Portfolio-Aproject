<?php
require 'config/constant.php';

// get back from data if there was a registration error

$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
// delete signup data session

unset($_SESSION['signup-data']);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aproject</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>


    <!-- Register to become a registered user -->
    <section class="form-section">
        <div class="container form-section-container">
            <h2>Sign Up</h2>
            <?php if (isset($_SESSION['signup'])) : ?>

                <div class="alert-message error-message">
                    <p>
                        <?= $_SESSION['signup'];
                        unset($_SESSION['signup']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="signup-logic.php" class="sign-up-form" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
                <input type="text" name="username" value="<?= $username ?>" placeholder="Username">
                <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
                <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create password">
                <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm password">
                <div>
                    <button class="btn-submit" name="submit" type="submit">Sign Up</button>
                    <small>Already have an account? <a href="login.php">Log In</a></small>
                </div>
            </form>
        </div>
    </section>
</body>

</html>