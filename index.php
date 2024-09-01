<?php
//  Header section
include 'components/header.php';

// fetch featured project form database 
$featured_query = "SELECT * FROM projects WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

//fetch projects from projects table

$query = "SELECT * FROM projects ORDER by date_time DESC LIMIT 9";
$projects = mysqli_query($connection, $query);


?>




<?php if (mysqli_num_rows($featured_result) == 1) : ?>
    <!-- Project Section -->
    <section class="main-project">
        <div class="container project project-container">
            <div class="project-image">
                <img src="Images/<?= $featured['project_image'] ?>">
            </div>
            <div class="project-description">
                <?php
                // fetch project type from project_types table using project_type_id of featured project
                $project_type_id = $featured['project_type_id'];
                $project_type_query = "SELECT * FROM project_types WHERE id = $project_type_id";
                $project_type_result = mysqli_query($connection, $project_type_query);
                $project_type = mysqli_fetch_assoc($project_type_result);
                ?>
                <a href="project-details.php?id=<?= $featured['project_type_id'] ?>" class="project-type">
                    <?= $project_type['name'] ?>
                </a>
                <h2 class="project-title"> <a href="project-details.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                <p class="project-info">
                    <?= substr($featured['body'], 0, 400) ?>...
                </p>
                <div class="project-user">
                    <?php
                    // fetch student from projects table using the student_id
                    $student_id = $featured['student_id'];
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
                            <?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif ?>




<!-- List of Project section -->

<section class="projects">
    <div class="container projects-container">
        <?php while ($project = mysqli_fetch_assoc($projects)) : ?>

            <article class="project">
                <div class="projects-image">
                    <a href="project-details.php?id=<?= $project['id'] ?>">
                        <img src="Images/<?= $project['project_image'] ?>">
                    </a>
                </div>
                <div class="project-description">
                    <?php
                    // fetch project type from project_types table using project_type_id of featured project
                    $project_type_id = $project['project_type_id'];
                    $project_type_query = "SELECT * FROM project_types WHERE id = $project_type_id";
                    $project_type_result = mysqli_query($connection, $project_type_query);
                    $project_type = mysqli_fetch_assoc($project_type_result);
                    ?>
                    <a href="project-details.php?id=<?= $project['id'] ?>" class="project-type">
                        <?= $project_type['name'] ?>
                    </a>
                    <h3 class="project-title">
                        <a href="project-details.php?id=<?= $project['id'] ?>">
                            <?= $project['title'] ?>
                        </a>
                    </h3>
                    <p class="project-info">
                        <?= substr($project['body'], 0, 250) ?>...
                    </p>
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
                </div>
            </article>

        <?php endwhile; ?>
    </div>
</section>


<?php
// Footer Section
include 'components/footer.php'

?>