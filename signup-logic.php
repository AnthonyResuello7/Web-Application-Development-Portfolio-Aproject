<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$firstname) {
        $_SESSION['signup'] = "Please enter your first name";
    } elseif (!$lastname) {
        $_SESSION['signup'] = "Please enter your last name";
    } elseif (!$username) {
        $_SESSION['signup'] = "Please enter your username";
    } elseif (!$email) {
        $_SESSION['signup'] = "Please enter a valid email address";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Password should be 8+ characters";
    } else {
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Passwords do not match";
        } else {
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);


            $user_check_query = "SELECT * FROM users WHERE username = '$username' OR
            email";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "username or email already exist";
            }
        }
    }

    if (isset($_SESSION['signup'])) {

        $_SESSION['signup-data'] = $_POST;
        header('location: signup.php');
        die();
    } else {
        $insert_user_query = "INSERT INTO users SET 
        firstname = '$firstname', 
        lastname = '$lastname', 
        username = '$username', 
        email = '$email', 
        password = '$hashed_password', 
        is_admin = 0";

        $insert_user_result = mysqli_query($connection, $insert_user_query);


        if (!mysqli_errno($connection)) {
            $_SESSION['signup-success'] = "Registration Sucessful. Please Log in";
            header('location: login.php');
            die();
        }
    }
} else {
    header('location: signup.php');
    die();
}
