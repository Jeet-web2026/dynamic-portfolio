-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 02:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_current_education`
--

CREATE TABLE `about_current_education` (
  `id` int(11) NOT NULL,
  `qualification` text NOT NULL,
  `q_name` text NOT NULL,
  `date` text NOT NULL,
  `name` text NOT NULL,
  `cttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_current_education`
--

INSERT INTO `about_current_education` (`id`, `qualification`, `q_name`, `date`, `name`, `cttime`) VALUES
(1, 'higher secondary', 'commerce', 'Jan 2020 - Jan 2021', 'Nangi High School', '2024-10-21 12:15:43'),
(3, 'Secondary', 'All Subjects', 'Jan 2019 - Jan 2020', 'Nangi High School', '2024-10-22 12:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `about_current_experience`
--

CREATE TABLE `about_current_experience` (
  `id` int(11) NOT NULL,
  `position` text NOT NULL,
  `company` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `ctttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_current_experience`
--

INSERT INTO `about_current_experience` (`id`, `position`, `company`, `date`, `location`, `ctttime`) VALUES
(1, 'Administrative Executive', 'M/s Solution Agency', 'Mar 2023 - Apr 2024', 'Tollygunge, Kolkata', '2024-10-21 11:32:47'),
(8, 'Backoffice Executive', 'Solomon Advisory Services', 'Apr 2022 - Mar 2023', 'New Alipore, Kolkata', '2024-10-22 10:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `about_education`
--

CREATE TABLE `about_education` (
  `id` int(11) NOT NULL,
  `qualification` text NOT NULL,
  `q_name` text NOT NULL,
  `date` text NOT NULL,
  `name` text NOT NULL,
  `cttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_education`
--

INSERT INTO `about_education` (`id`, `qualification`, `q_name`, `date`, `name`, `cttime`) VALUES
(2, 'Graduation', 'Bachelor of computer application (BCA)', 'Jun 2023 - Present', 'Indira Gandhi National Open University (IGNOU)', '2024-10-22 11:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `about_experience`
--

CREATE TABLE `about_experience` (
  `id` int(11) NOT NULL,
  `position` text NOT NULL,
  `company` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `cttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_experience`
--

INSERT INTO `about_experience` (`id`, `position`, `company`, `date`, `location`, `cttime`) VALUES
(2, 'Developer', 'Globe Allied Healthcare Skill Council', 'Mar 2024 - Present', 'South Dumdum', '2024-10-22 10:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `about_settings`
--

CREATE TABLE `about_settings` (
  `sl_no` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_settings`
--

INSERT INTO `about_settings` (`sl_no`, `image`, `description`, `dttime`) VALUES
(6, 'x', 'Software Developer', '2024-10-21 10:26:17'),
(7, 'y', 'I\'m from Garden Reach, Kolkata: 700024', '2024-10-21 10:26:17'),
(8, 'z', 'Currently I\'m pursuring Bachelor of Computer Application from IGNOU', '2024-10-21 10:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `about_slider`
--

CREATE TABLE `about_slider` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_slider`
--

INSERT INTO `about_slider` (`id`, `img`, `heading`, `description`, `cttime`) VALUES
(1, '', 'Html', 'HTML (Hypertext Markup Language) structures web content, defining elements like headings, paragraphs, and links.', '2024-10-21 10:51:37'),
(2, '', 'Css', 'CSS (Cascading Style Sheets) styles HTML elements, controlling layout, colors, fonts, and overall web design.', '2024-10-21 10:52:32'),
(3, '', 'Javascript', 'JavaScript (JS) is a programming language that enables interactive features and dynamic content on web pages.', '2024-10-21 11:05:55'),
(4, '', 'JQuery', 'jQuery is a JavaScript library that simplifies HTML document traversal, event handling, and animations for developers.', '2024-10-21 11:05:55'),
(5, '', 'JQuery UI', 'jQuery UI provides interactive components and effects for web applications, enhancing user interface functionality and design.', '2024-10-21 11:05:55'),
(6, '', 'Bootstrap', 'Bootstrap is a front-end framework for developing responsive websites, offering pre-designed components and grid layouts.', '2024-10-21 11:05:55'),
(7, '', 'PHP', 'PHP (Hypertext Preprocessor) is a server-side scripting language used for web development and dynamic content.', '2024-10-21 11:05:55'),
(8, '', 'Laravel', 'Laravel is a PHP framework that simplifies web application development with elegant syntax and powerful features.', '2024-10-21 11:05:55'),
(9, '', 'MySql', 'MySQL is an open-source relational database management system used for storing and managing data efficiently.', '2024-10-21 11:12:47'),
(10, '', 'React', 'React is a JavaScript library for building user interfaces, focusing on component-based architecture and performance.', '2024-10-21 11:12:47'),
(11, '', 'MUI', 'MUI (Material-UI) is a React component library implementing Google\'s Material Design for responsive web applications.', '2024-10-21 11:12:47'),
(12, '', 'Git', 'Git is a version control system for tracking changes in code, facilitating collaboration among developers.', '2024-10-21 11:12:47'),
(13, '', 'Github', 'GitHub is a platform for hosting Git repositories, enabling collaboration, version control, and project management.', '2024-10-21 11:12:47'),
(15, '', 'Api', 'An API enables software applications to communicate, facilitating data exchange and functionality integration between systems.', '2024-10-21 13:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `all_projects`
--

CREATE TABLE `all_projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `used_technologies` text NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `cttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_projects`
--

INSERT INTO `all_projects` (`project_id`, `project_name`, `project_description`, `used_technologies`, `project_link`, `cttime`) VALUES
(1, 'digital portfolio - 1', 'frontend development', 'html, css, javascript, bootstrap, api & github', 'https://jeet-web2026.github.io/Newportfolio/', '2024-10-23 12:47:27'),
(2, 'nova', 'frontend development', 'html, css, javascript, bootstrap, api & github', 'https://jeet-web2026.github.io/Nova/', '2024-10-23 12:47:27'),
(3, 'brilliaant career solution (official website)', 'full stack development', 'html, css, javascript, jquery, jquery ui, bootstrap, php, laravel, phpmyadmin, web hosting, git, api & github', 'https://brilliaantcs.com/', '2024-10-23 12:47:27'),
(4, 'Globe allied healthcare skill council (official website)', 'frontend development', 'html, css, javascript, jquery, jquery ui, bootstrap, git, api & github', 'https://globechealth.ac.in/', '2024-10-23 12:47:27'),
(5, 'universal council for vocational and skill education (official website)', 'frontend development', 'html, css, javascript, jquery, jquery ui, bootstrap, git, api & github', 'https://univskilleducation.org/', '2024-10-23 12:47:27'),
(6, 'vivekananda institute of health sciences (official website)', 'frontend development', 'html, css, javascript, jquery, jquery ui, bootstrap, git, api & github', 'https://vihealthscience.org/', '2024-10-23 12:47:27'),
(7, 'vidyasagar institute for advance studies (official website)', 'frontend development', 'html, css, javascript, jquery, jquery ui, bootstrap, git, api & github', 'https://studyvidyaa.in/', '2024-10-23 12:47:27'),
(8, 'get leads', 'frontend development', 'html, css, javascript, bootstrap, api & github', 'https://jeet-web2026.github.io/Get-leads/', '2024-10-23 12:47:27'),
(10, 'grocery', 'frontend development', 'html, css, javascript, bootstrap, api & github', 'https://jeet-web2026.github.io/Grocery/', '2024-10-24 12:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `contact_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_settings`
--

CREATE TABLE `home_settings` (
  `sl_no` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_settings`
--

INSERT INTO `home_settings` (`sl_no`, `image`, `description`, `dttime`) VALUES
(19, 'frontend development', 'Frontend development involves creating user interfaces using HTML, CSS, and JavaScript for interactive web experiences.', '2024-10-17 11:20:31'),
(20, 'backend development', 'Backend development with PHP and MySQL involves server-side logic, database management, and API creation.', '2024-10-17 11:24:24'),
(21, '3+', 'Years of Experience', '2024-10-17 11:32:24'),
(22, '8+', 'Real world project\'s experience', '2024-10-17 11:34:04'),
(23, '10+', 'Personal project\'s experience', '2024-10-17 11:34:04'),
(24, '6+', 'Month\'s relevant experience', '2024-10-17 11:34:04'),
(25, 'database management', 'Database management with PHP and MySQL involves data storage, retrieval, manipulation, and security in web applications.', '2024-10-17 11:34:04'),
(26, '7+', 'Companies worked', '2024-10-17 11:34:04'),
(27, 'demo', 'Brilliaant Career solution', '2024-10-17 11:44:01'),
(28, 'demo2', 'Nova', '2024-10-17 11:44:01'),
(29, 'demo3', 'Universal Counsil for Vocational and Skills Education', '2024-10-17 11:44:01'),
(31, 'Software developer', 'Frontend  & Backend Developer with 2+ years of experience, including 6 months of specialized frontend focus. Proficient in HTML, CSS, JavaScript, jQuery, jQuery UI, Bootstrap, PHP, Laravel and MySQL. Passionate about crafting intuitive, visually striking user interfaces. Experienced in transforming designs into responsive, high-performance web applications. Committed to staying updated with the latest frontend  & backend technologies.', '2024-10-17 12:19:29'),
(42, 'demo', 'Globe Allied Healthcare Skill Council', '2024-10-19 13:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `login_credintials`
--

CREATE TABLE `login_credintials` (
  `id` int(11) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `dttime` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_credintials`
--

INSERT INTO `login_credintials` (`id`, `emailid`, `password`, `mobileno`, `dttime`) VALUES
(11, 'jeetnath2110@gmail.com', '$2y$10$6ToIFAUQ4sr/VFV2gElgG.co9gzestHz8FtsXJl8YmILfkFJUYXg6', '9163715179', '2024-10-07 16:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_projects`
--

CREATE TABLE `ongoing_projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `used_technologies` text NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `cttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ongoing_projects`
--

INSERT INTO `ongoing_projects` (`project_id`, `project_name`, `project_description`, `used_technologies`, `project_link`, `cttime`) VALUES
(1, 'brilliaant career solution (official website)', 'full stack development', 'html, css, javascript, jquery, jquery ui, bootstrap, php, laravel, phpmyadmin, web hosting, git, api & github', 'https://brilliaantcs.com/', '2024-10-23 12:33:53'),
(2, 'digital portfolio - 2', 'full stack development (core php)', 'html, css, javascript, jquery, jquery ui, bootstrap, php, phpmyadmin, api & github', 'http://localhost/portfolio/', '2024-10-23 12:33:53'),
(3, 'braineduskills (official website)', 'Mern stack development (react)', 'html, css, javascript, react, mui, git, api & github', 'https://braineduskills.in/', '2024-10-23 12:33:53'),
(5, 'chat application', 'full stack development (core php)', 'html, css, javascript, jquery, jquery ui, bootstrap, php, phpmyadmin, api & github', 'https://github.com/Jeet-web2026/chat-application', '2024-10-24 12:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `recent_projects`
--

CREATE TABLE `recent_projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `used_technologies` text NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `cttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recent_projects`
--

INSERT INTO `recent_projects` (`project_id`, `project_name`, `project_description`, `used_technologies`, `project_link`, `cttime`) VALUES
(1, 'globe allied healthcare skill council', 'frontend development', 'html, css, javascript, jquery, jquery ui, bootstrap, git, api & github', 'https://globechealth.ac.in/', '2024-10-23 12:03:33'),
(2, 'universal council for vocational and skill education (official website)', 'frontend development', 'html, css, javascript, jquery, jquery ui, bootstrap, git, api & github', 'https://univskilleducation.org/', '2024-10-23 12:19:23'),
(5, 'globe holistic and alternative medicinal council (official website)', 'frontend development', 'html, css, javascript, jquery, jquery ui, bootstrap, git, api & github', 'https://globemedicinalcouncil.org/', '2024-10-24 12:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `links_id` int(11) NOT NULL,
  `link_name` varchar(255) NOT NULL,
  `links_path` varchar(255) NOT NULL,
  `cttime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`links_id`, `link_name`, `links_path`, `cttime`) VALUES
(1, 'github', 'https://github.com/Jeet-web2026', '2024-10-26 12:25:38'),
(2, 'google', 'https://www.cloudskillsboost.google/public_profiles/c4c05f5e-9c67-42ad-a286-c7f08b95fe60', '2024-10-26 12:25:38'),
(3, 'facebook', 'https://www.facebook.com/profile.php?id=61553622085466', '2024-10-26 12:25:38'),
(4, 'instagram', 'https://www.instagram.com/', '2024-10-26 12:25:38'),
(6, 'twitter', 'https://x.com/jitnath2023', '2024-10-27 12:11:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_current_education`
--
ALTER TABLE `about_current_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_current_experience`
--
ALTER TABLE `about_current_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_education`
--
ALTER TABLE `about_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_experience`
--
ALTER TABLE `about_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_settings`
--
ALTER TABLE `about_settings`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `about_slider`
--
ALTER TABLE `about_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_projects`
--
ALTER TABLE `all_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `home_settings`
--
ALTER TABLE `home_settings`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `login_credintials`
--
ALTER TABLE `login_credintials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongoing_projects`
--
ALTER TABLE `ongoing_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `recent_projects`
--
ALTER TABLE `recent_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`links_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_current_education`
--
ALTER TABLE `about_current_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_current_experience`
--
ALTER TABLE `about_current_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `about_education`
--
ALTER TABLE `about_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_experience`
--
ALTER TABLE `about_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_settings`
--
ALTER TABLE `about_settings`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `about_slider`
--
ALTER TABLE `about_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `all_projects`
--
ALTER TABLE `all_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `home_settings`
--
ALTER TABLE `home_settings`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `login_credintials`
--
ALTER TABLE `login_credintials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ongoing_projects`
--
ALTER TABLE `ongoing_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recent_projects`
--
ALTER TABLE `recent_projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `links_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
