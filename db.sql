-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2023 at 06:25 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 8.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `body` text COLLATE utf8mb4_general_ci NOT NULL,
  `project_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_type_id` int UNSIGNED NOT NULL,
  `student_id` int UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `body`, `project_image`, `date_time`, `project_type_id`, `student_id`, `is_featured`) VALUES
(1, 'Lost in the Jungle: A 3D Adventure Game', 'Lost in the Jungle is a 3D adventure game that takes players on a thrilling journey through a dense and mysterious jungle. The game is designed to offer an immersive and engaging experience, with stunning visuals, challenging puzzles, and exciting combat sequences.\r\n\r\nPlayers will take on the role of a young explorer who finds himself stranded in the heart of the jungle, with no memory of how he got there. As they explore the lush environment, they&#039;ll uncover clues and solve puzzles to unravel the mystery of their surroundings.', '1681388286004aa880-a13a-11eb-801e-34db7fbd21c2.jpg', '2023-04-13 11:49:38', 1, 1, 1),
(2, 'E-Commerce Website Development', 'The goal of this project is to develop a fully functional e-commerce website that allows users to browse products, add items to their cart, and make purchases securely. The website should also include features such as a user login system, search functionality, and a shopping cart.\r\n\r\nThis project will involve designing and developing a user-friendly and intuitive interface for the e-commerce website, ensuring that the site is easy to navigate and that products are displayed in an organized and appealing manner. The website will also need to integrate with a payment gateway to securely process transactions and allow users to make purchases with their preferred payment methods.', '1681386619website-devevlopment-projects.jpg', '2023-04-13 11:50:19', 2, 1, 0),
(3, 'Graphic Design for a 3D Game', 'The objective of this project is to create high-quality graphics for a game, which includes designing characters, backgrounds, and other visual elements that are used in games. The game can be of any genre, such as action, adventure, puzzle, or sports.\r\n\r\nThe project will start with research and planning, where we will analyze the target audience, game genre, and storyline to determine the appropriate visual style. Next, we will create sketches and concept art to help us determine the overall look and feel of the game.', '1681397841animated-project (1).jpg', '2023-04-13 11:51:14', 3, 1, 0),
(4, ' Redesigning the Website of a Local Store', ' In this project, the goal is to redesign the website of a local restaurant to improve its visual appeal and user experience. The design will focus on creating a more modern and sleek look while maintaining the brand&#039;s identity and showcasing the restaurant&#039;s menu and specials. The project will involve creating wireframes and mockups of the new design, selecting appropriate color schemes and typography, and optimizing the design for responsive web viewing across various devices.\r\n\r\nThe design will focus on creating a more modern and sleek look while maintaining the brand&#039;s identity and showcasing the restaurant&#039;s menu and specials. The project will involve conducting user research to identify pain points and areas for improvement, creating wireframes and mockups of the new design using design tools.', '1681397559website-project.jpg', '2023-04-13 12:05:32', 2, 2, 0),
(5, 'Creating 3D Models for a Video Game ', 'In this project, we will be using Blender, a powerful 3D modeling and animation software, to create 3D models for a video game. 3D models are essential to creating a visually appealing and immersive gaming experience. Whether it&#039;s characters, weapons, vehicles, or environments, high-quality 3D models can make a game more engaging and memorable.\r\n\r\nTo start, we will learn the basics of Blender&#039;s interface, including navigating the viewport, using the various tools and modifiers, and setting up a project for game development. We will also learn about the different file formats and import/export options necessary for working with game engines.\r\n\r\nNext, we will begin creating our 3D models. We will start with simple objects, such as cubes and spheres, to get familiar with Blender&#039;s modeling tools. Then, we will move on to more complex models, such as characters and vehicles. We will cover topics such as topology, UV mapping, rigging, and texturing to create detailed and realistic models.', '1681398882animation-projectss.jpg', '2023-04-13 12:08:49', 3, 2, 0),
(6, 'Creating a 3D Car Racing Game ', 'In this project, we will use Unity, a popular game engine, to create a 3D car racing game. Car racing games are a popular genre in the gaming industry, providing players with an exciting and immersive experience. We will cover the basics of game development, including scripting, game design, 3D modeling, and user interface (UI) design.\r\n\r\nTo start, we will set up a project in Unity and create a basic car controller script. We will then create a simple level using Unity&#039;s terrain tools and add some obstacles and challenges for the player to overcome. We will use Blender, a powerful 3D modeling software, to create a 3D model of a car and import it into Unity. We will learn about texturing, rigging, and animating the car to create a realistic and dynamic driving experience.', '1681398604Game-Design-Project.jpg', '2023-04-13 15:10:04', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `name`) VALUES
(1, 'Game Development '),
(2, 'Web Development'),
(3, 'Graphic Design'),
(4, 'Animation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'John', 'doe', 'John', 'john@doe.com', '$2y$10$OrjF8.OI3WtM1Fw1A7.aEebuKxrub/0S8sBvRhjh3cE8.qMG9wSji', 0),
(2, 'Anthony', 'Resuello', 'Anthony', 'anthony@aproject.com', '$2y$10$B05WW0Zzh6Ov9wJSdbRDLeqqlM9bopxSBT0QQv6FuFdaodKMmnWeS', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projects_users` (`student_id`),
  ADD KEY `fk_projects_project_types` (`project_type_id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_projects_project_types` FOREIGN KEY (`project_type_id`) REFERENCES `project_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_projects_users` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
