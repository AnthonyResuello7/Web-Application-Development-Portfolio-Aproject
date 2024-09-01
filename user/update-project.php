<?php
// Header section
include 'components/user-header.php';

// Fetch project types from database
$project_type_query = "SELECT * FROM project_types";
$project_types = mysqli_query($connection, $project_type_query);

// Fetch project data from database if ID is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM projects WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $project = mysqli_fetch_assoc($result);
} else {
    header('location: view-projects.php');
    die();
}
?>




<section class="form-section">
    <div class="container form-section-container">
        <h2>Update Project</h2>
        <!-- <div class="alert-message error-message"> -->
        <!-- <p>This is an error message</p> -->
        <!-- </div> -->
        <form action="update-project-logic.php" class="sign-up-form" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $project['id'] ?>">


            <input type="hidden" name="previous_image_name" value="<?= $project['project_image'] ?>">




            <input type="text" name="title" value="<?= $project['title'] ?>" placeholder="Project Title">

            <select name=project_type>
                <?php while ($project_type = mysqli_fetch_assoc($project_types)) : ?>
                    <option value="<?= $project_type['id'] ?>"><?= $project_type['name'] ?></option>
                <?php endwhile ?>
            </select>

            <textarea rows="10" name="body" placeholder="Project Description"><?= $project['body'] ?></textarea>

            <div class="project-main inline">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" checked>
                <label for="is_featured">Main Project</label>
            </div>

            <div class="image-project">
                <label for="thumbnail">Update Project Image</label>
                <input class="input-file" name="project_image" type="file" id="thumbnail">
            </div>

            <button type="submit" name="submit" class="btn-submit">Update Project</button>
        </form>
    </div>
</section>






<?php
// Footer Section
include 'components/user-footer.php';

?>