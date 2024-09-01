<?php
// Header section
include 'components/header.php';

// fetch all projects from projects table
$query = "SELECT * FROM projects ORDER BY date_time DESC";
$projects = mysqli_query($connection, $query);

?>


<!-- Search all projects using a title or a start date -->

<!-- Search Bar Section -->
<section class="search-bar-section">
    <form class="container search-bar-container" action="search.php" method="GET">
        <div>
            <i class="fas fa-search"></i>
            <input type="search" name="search" placeholder="Search for project">
        </div>
        <button type="submit" name="submit" class="btn">Search</button>
    </form>
</section>

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
                        <?= substr($project['body'], 0, 200) ?>...
                    </p>
                    <div class="project-user">
                        <?php
                        // fetch student from users table using the student_id
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
include 'components/footer.php';
?>