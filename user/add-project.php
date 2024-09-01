<?php
//  Header section
include 'components/user-header.php';

$query = "SELECT * FROM project_types";
$project_types = mysqli_query($connection, $query);

$title = $_SESSION['add-project-data']['title'] ?? null;
$body = $_SESSION['add-project-data']['body'] ?? null;

unset($_SESSION['add-project-data']);


?>



<section class="form-section">
    <div class="container form-section-container">
        <h2>Add Project</h2>
        <?php if (isset($_SESSION['add-project'])) : ?>

            <div class="alert-message error-message">
                <p>
                    <?= $_SESSION['add-project'];
                    unset($_SESSION['add-project']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="add-project-logic.php" class="sign-up-form" action="" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Project Title">

            <select name=project_type>
                <?php while ($project_type = mysqli_fetch_assoc($project_types)) : ?>
                    <option value="<?= $project_type['id'] ?>"><?= $project_type['name'] ?></option>
                <?php endwhile ?>
            </select>

            </select>
            <textarea rows="10" name="body" placeholder="Project Description"><?= $body ?></textarea>
            <div class="project-main inline">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                <label for="is_featured">Main Project</label>
            </div>
            <div class="image-project">
                <label for="thumbnail">Add Project Image</label>
                <input class="input-file" name="project_image" type="file" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn-submit">Add Project</button>
        </form>
    </div>
</section>


<?php
// Footer Section
include 'components/user-footer.php';
?>