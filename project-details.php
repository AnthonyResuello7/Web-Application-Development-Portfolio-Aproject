<?php
//  Header section
include 'components/header.php';

// fetch project from database if id is set 

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM projects WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $project = mysqli_fetch_assoc($result);
} else {
    header('location: index.php');
    die();
}

?>



<section class="project-detail">
    <div class="container project-detail-container">
        <h2><?= $project['title'] ?></h2>
        <div class="project-user">
            <?php
            // fetch student from projects table using the student_id
            $student_id = $project['student_id'];
            $student_query = "SELECT * FROM users WHERE id = $student_id";
            $student_result = mysqli_query($connection, $student_query);
            $student = mysqli_fetch_assoc($student_result);

            ?>
            <div class="project-user-icon">
                <img src="Images/Profile-Male-PNG.png">
            </div>
            <div class="project-user-info">
                <h5> By student: <?= "{$student['firstname']} {$student['lastname']}" ?> </h5>
                <small>
                    <?= date("M d, Y - H:i", strtotime($project['date_time'])) ?>
                </small>
            </div>
        </div>
        <div class="project-detail-image">
            <img src="Images/<?= $project['project_image'] ?>">
        </div>

        <p>
            <?= $project['body'] ?>
        </p>

</section>




<?php
// Footer Section
include 'components/project-footer.php'

?>