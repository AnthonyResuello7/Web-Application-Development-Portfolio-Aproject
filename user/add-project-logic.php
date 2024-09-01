<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $student_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $project_type_id = filter_var($_POST['project_type'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $project_image = $_FILES['project_image'];

    $is_featured = $is_featured == 1 ?: 0;


    if (!$title) {
        $_SESSION['add-project'] = "Enter project title";
    } elseif (!$project_type_id) {
        $_SESSION['add-project'] = "Select project type";
    } elseif (!$body) {
        $_SESSION['add-project'] = "Enter project body";
    } elseif (!$project_image['name']) {
        $_SESSION['add-project'] = "Choose project image";
    } else {
        //  Project Image
        $time = time();
        $project_image_name = $time . $project_image['name'];
        $project_img_tmp_name = $project_image['tmp_name'];
        $project_image_path = '../Images/' . $project_image_name;

        // ensure file is an image 
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $project_image_name);
        $extension = end($extension);
        if (in_array($extension, $allowed_files)) {
            // Ensure the image is not too big (above 2mb)
            if ($project_image['size'] <= 2000000) {
                //  Upload project image
                move_uploaded_file($project_img_tmp_name, $project_image_path);
            } else {
                $_SESSION['add-project'] = "File size too big. Should be less than 2mb";
            }
        } else {
            $_SESSION['add-project'] = "File should be png, jpg or jpeg";
        }
    }

    // redirect back (with form data) to add-project page if there is any issues
    if (isset($_SESSION['add-project'])) {
        $_SESSION['add-project-data'] = $_POST;
        header('location: add-project.php');
        die();
    } else {
        //  set is_featured of all projects to 0 if is_featured for this project is 1 
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE projects SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
        // insert project into database 
        $query = "INSERT INTO projects (title, body, project_image, project_type_id, student_id, is_featured) 
        VALUES ('$title', '$body', '$project_image_name', '$project_type_id', '$student_id', '$is_featured')";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['add-project-success'] = "New project added successfully";
            header('location: view-projects.php');
            die();
        }
    }
}


header('location: ./user/add-project.php');
die();
