<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_image_name = filter_var($_POST['previous_image_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $project_type_id = filter_var($_POST['project_type'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $project_image = $_FILES['project_image'];

    $is_featured = $is_featured == 1 ?: 0;

    $project_to_insert = $previous_image_name;

    if (!$title || !$project_type_id || !$body) {
        $_SESSION['update-project'] = "Couldn't update project. Invalid form data on update project page.";
    } else {
        // delete existing image if new image is available 
        if ($project_image['name']) {
            $previous_image_path = '../Images/' . $previous_image_name;
            if ($previous_image_name) {
                unlink($previous_image_path);
            }

            // Project Image
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
                    $project_to_insert = $project_image_name;
                } else {
                    $_SESSION['update-project'] = "File size too big. Should be less than 2mb";
                }
            } else {
                $_SESSION['update-project'] = "File should be png, jpg or jpeg";
            }
        }

        // set is_featured of all projects to 0 if is_featured for this project is 1 
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE projects SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        // update project into database 
        $query = "UPDATE projects SET title = '$title', body = '$body', project_image= '$project_to_insert', 
        project_type_id = $project_type_id, is_featured = $is_featured WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['update-project-success'] = "Project updated successfully";
            header('location: view-projects.php');
            die();
        }
    }
}
// redirect back (with form data
header('location: view-projects.php');

die();
