<?php
require 'config/database.php';


if (isset($_GET['id'])) {

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch post from database in order to delete project image form the image folder 
    $query = "SELECT * FROM projects WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // make sure only 1 project was fetched
    if (mysqli_num_rows($result) == 1) {
        $project = mysqli_fetch_assoc($result);
        $project_name = $project['project_image'];
        $project_path = '../Images/' . $project_name;

        if (file_exists($project_path)) {
            unlink($project_path);

            // delete project from database
            $delete_project_query = "DELETE FROM projects WHERE id=$id LIMIT 1";
            $delete_project_result = mysqli_query($connection, $delete_project_query);

            if (!mysqli_errno($connection)) {
                $_SESSION['delete-project-success'] = "Project Delete Successfully";
            }
        }
    }
}

header('location: view-projects.php');
die();
