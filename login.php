<?php
require 'config/constant.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;


unset($_SESSION['signin-data']);
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




    <section class="form-section">
        <div class="container form-section-container">
            <h2>Log In</h2>

            <?php if (isset($_SESSION['signup-success'])) : ?>
                <div class="alert-message sucess-message">
                    <p>
                        <?= $_SESSION['signup-success'];
                        unset($_SESSION['signup-success']);
                        ?>
                    </p>
                </div>


            <?php elseif (isset($_SESSION['signin'])) : ?>
                <div class="alert-message error-message">
                    <p>
                        <?= $_SESSION['signin'];
                        unset($_SESSION['signin']);
                        ?>
                    </p>
                </div>

            <?php endif ?>

            <form action="login-logic.php" method="POST" class="sign-up-form">
                <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="Username/Email">
                <input type="password" name="password" value="<?= $password ?>" placeholder="Password">
                <div>
                    <button type="submit" name="submit" class="btn-submit">Log In</button>
                    <small>Dont have an Account? <a href="signup.php">Sign
                            Up</a></small>
                </div>
            </form>
        </div>
    </section>
</body>


</html>