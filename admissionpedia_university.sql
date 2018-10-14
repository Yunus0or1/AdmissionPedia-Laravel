-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 02:20 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admissionpedia_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'qAbwbuG9u6DX75kyRAFLawYth2a7mKLm', 1, '2018-07-28 00:17:53', '2018-07-28 00:17:53', '2018-07-28 00:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `all_depts`
--

CREATE TABLE `all_depts` (
  `dept_id` int(10) UNSIGNED NOT NULL,
  `dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` int(11) NOT NULL,
  `dept_belongs_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_seat` int(11) NOT NULL DEFAULT '0',
  `req_gpa_ssc` double NOT NULL DEFAULT '0',
  `req_gpa_hsc` double NOT NULL DEFAULT '0',
  `req_gpa_total` double NOT NULL DEFAULT '0',
  `req_gpa_bangla` double NOT NULL DEFAULT '0',
  `req_gpa_english` double NOT NULL DEFAULT '0',
  `req_gpa_math` double NOT NULL DEFAULT '0',
  `req_gpa_physics` double NOT NULL DEFAULT '0',
  `req_gpa_chem` double NOT NULL DEFAULT '0',
  `req_gpa_biology` double NOT NULL DEFAULT '0',
  `req_gpa_business_management` double NOT NULL DEFAULT '0',
  `req_gpa_accounting` double NOT NULL DEFAULT '0',
  `req_gpa_finance` double NOT NULL DEFAULT '0',
  `req_gpa_marketing` double NOT NULL DEFAULT '0',
  `req_gpa_economics` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `all_nctb_curriculum_units`
--

CREATE TABLE `all_nctb_curriculum_units` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `univ_id` int(11) NOT NULL,
  `unit_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_belongs_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_seat` int(11) NOT NULL DEFAULT '0',
  `exam_date` date NOT NULL DEFAULT '0000-00-00',
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `exact_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `system_of_apply` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `form_price` int(11) NOT NULL DEFAULT '0',
  `req_gpa_ssc` double NOT NULL DEFAULT '0',
  `req_gpa_hsc` double NOT NULL DEFAULT '0',
  `req_gpa_total` double NOT NULL DEFAULT '0',
  `req_gpa_bangla` double NOT NULL DEFAULT '0',
  `req_gpa_english` double NOT NULL DEFAULT '0',
  `req_gpa_math` double NOT NULL DEFAULT '0',
  `req_gpa_physics` double NOT NULL DEFAULT '0',
  `req_gpa_chem` double NOT NULL DEFAULT '0',
  `req_gpa_biology` double NOT NULL DEFAULT '0',
  `req_gpa_business_management` double NOT NULL DEFAULT '0',
  `req_gpa_accounting` double NOT NULL DEFAULT '0',
  `req_gpa_finance` double NOT NULL DEFAULT '0',
  `req_gpa_marketing` double NOT NULL DEFAULT '0',
  `req_gpa_economics` double NOT NULL DEFAULT '0',
  `req_biology_agri_as_a_subject` int(11) NOT NULL DEFAULT '0',
  `req_math_as_a_subject` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2017_10_15_115402_create_files_table', 1),
(19, '2018_06_16_122150_create_community_table', 1),
(20, '2018_07_27_172805_admission', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `headline` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `asked_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `commenter_id` int(10) UNSIGNED NOT NULL,
  `commenter_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reply` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commented_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `science_student`
--

CREATE TABLE `science_student` (
  `student_id` int(11) NOT NULL,
  `gpa_ssc` double NOT NULL DEFAULT '0',
  `gpa_hsc` double NOT NULL DEFAULT '0',
  `gpa_total` double NOT NULL DEFAULT '0',
  `gpa_bangla` double NOT NULL DEFAULT '0',
  `gpa_english` double NOT NULL DEFAULT '0',
  `gpa_math` double NOT NULL DEFAULT '0',
  `gpa_physics` double NOT NULL DEFAULT '0',
  `gpa_chem` double NOT NULL DEFAULT '0',
  `gpa_biology` double NOT NULL DEFAULT '0',
  `gpa_agri` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribelists`
--

CREATE TABLE `subscribelists` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `universityId` int(11) NOT NULL,
  `emailAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `univ_id` int(10) UNSIGNED NOT NULL,
  `univ_full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `univ_short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_seat` int(11) NOT NULL,
  `total_unit` int(11) NOT NULL,
  `unit_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_science_unit` int(11) NOT NULL,
  `total_commerce_unit` int(11) NOT NULL,
  `total_all_allowed_unit` int(11) NOT NULL,
  `apply_start` date NOT NULL,
  `apply_off` date NOT NULL,
  `req_gpa_ssc` double NOT NULL DEFAULT '0',
  `req_gpa_hsc` double NOT NULL DEFAULT '0',
  `req_gpa_total` double NOT NULL DEFAULT '0',
  `req_gpa_pcmeb` double NOT NULL DEFAULT '0',
  `allow_second_timer` int(11) NOT NULL,
  `deduction` int(11) NOT NULL,
  `prospectus_based_on_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prospectus_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gre_score` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '10000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagepath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `full_name`, `user_name`, `type`, `imagepath`, `created_at`, `updated_at`) VALUES
(1, 'asd@asd', '$2y$10$TVPteYOxk9zhrJYH98pxhevPFxlC0aY/FnT.HXS6cqT2nAVPr.GvG', NULL, '2018-07-28 00:17:53', 'asd', 'asd', 'admin', NULL, '2018-07-28 00:17:53', '2018-07-28 00:17:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_depts`
--
ALTER TABLE `all_depts`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `all_nctb_curriculum_units`
--
ALTER TABLE `all_nctb_curriculum_units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `science_student`
--
ALTER TABLE `science_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subscribelists`
--
ALTER TABLE `subscribelists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`univ_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `all_depts`
--
ALTER TABLE `all_depts`
  MODIFY `dept_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `all_nctb_curriculum_units`
--
ALTER TABLE `all_nctb_curriculum_units`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribelists`
--
ALTER TABLE `subscribelists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `univ_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
