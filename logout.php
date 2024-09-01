<?php
require 'config/constant.php';

session_destroy();
header('location: index.php');
die();

// Log Out user