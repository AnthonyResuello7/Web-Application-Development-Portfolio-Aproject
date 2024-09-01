<?php
require 'constants.php';

// connect to the database 

$connection = new mysqli(dbhost, username, password, dbname);


if (mysqli_errno($connection)) {
    die(mysqli_error($connection));
}
