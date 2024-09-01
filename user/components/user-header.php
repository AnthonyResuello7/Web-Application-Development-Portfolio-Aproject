<?php
require 'config/database.php';

// check login status

if (!isset($_SESSION['user-id'])) {
    header('location: ../login.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aproject</title>
    <link rel="stylesheet" href="../style.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
    <!-- Navigation Section -->
    <nav>
        <div class="container navbar-container">
            <a href="../index.php" class="logo"><span>A</span>project</a>
            <ul class="nav-menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="../project.php">Projects</a></li>
                <li><a href="../about.php">About Us</a></li>
                <?php if (isset($_SESSION['user-id'])) : ?>
                    <li class="nav-profilepic">
                        <div class="avatar">
                            <img src="../Avatar-Profile-PNG-Images.png">
                        </div>
                        <ul>
                            <li><a href="view-projects.php">View Projects</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="../signup.php">Sign In</a></li>
                <?php endif ?>
            </ul>

            <button id="open-nav-icon"> <i class="fas fa-bars"></i></button>
            <button id="close-nav-icon"><i class="fas fa-times"></i></button>
        </div>
    </nav>