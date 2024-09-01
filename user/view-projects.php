<?php
//  Header section
include 'components/user-header.php';

// fetch current user's projects 
$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, project_type_id FROM projects WHERE student_id = $current_user_id ORDER BY id DESC";
$projects = mysqli_query($connection, $query);

?>




<section class="view-project-section">
    <div class="container view-project-container">
        <aside>
            <li>
                <a class="active"><i class="far
                                fa-edit"></i>
                    <h5>Update Projects</h5>
                </a>
            </li>

            <li>
                <a class="add-project" href="add-project.php"><i class="fas
                                fa-plus-circle"></i>
                    <h5>Add Project</h5>
                </a>
            </li>

        </aside>
        <main>
            <?php if (isset($_SESSION['add-project-success'])) : // Show message add project is successful
            ?>
                <div class="alert-message sucess-message">
                    <p>
                        <?= $_SESSION['add-project-success'];
                        unset($_SESSION['add-project-success']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['update-project-success'])) : // Show message update project is successful
            ?>
                <div class="alert-message sucess-message">
                    <p>
                        <?= $_SESSION['update-project-success'];
                        unset($_SESSION['update-project-success']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['update-project'])) : // Show message if update project was not successful
            ?>
                <div class="alert-message error-message">
                    <p>
                        <?= $_SESSION['update-project'];
                        unset($_SESSION['update-project']);
                        ?>
                    </p>
                </div>

            <?php elseif (isset($_SESSION['delete-project-success'])) : // Show message if update project was not successful
            ?>
                <div class="alert-message sucess-message">
                    <p>
                        <?= $_SESSION['delete-project-success'];
                        unset($_SESSION['delete-project-success']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <h2>Update Projects</h2>
            <?php if (mysqli_num_rows($projects) > 0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Project Type</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($project = mysqli_fetch_assoc($projects)) : ?>
                            <!-- get project type title of each project from the project type table -->
                            <?php
                            $project_type_id = $project['project_type_id'];
                            $project_query = "SELECT name FROM project_types WHERE id = $project_type_id";
                            $project_result = mysqli_query($connection, $project_query);
                            $project_type = mysqli_fetch_assoc($project_result);
                            ?>

                            <tr>
                                <td><?= $project['title'] ?></td>
                                <td><?= $project_type['name'] ?></td>
                                <td><a href="update-project.php?id=<?= $project['id'] ?>" class="btn sm"> Update </a></td>
                                <td><a href="delete-project.php?id=<?= $project['id'] ?>" class="btn sm danger"> Delete </a></td>
                            </tr>
                        <?php endwhile ?>

                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert-message error-message"><?= "No projects found" ?></div>
            <?php endif ?>
        </main>
    </div>
</section>




<?php
// Footer Section
include 'components/user-footer.php';

?>