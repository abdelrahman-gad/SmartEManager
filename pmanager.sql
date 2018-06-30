-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 يونيو 2018 الساعة 15:28
-- إصدار الخادم: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmanager`
--

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`id`, `body`, `image`, `user_id`, `commentable_type`, `commentable_id`, `created_at`, `updated_at`) VALUES
(1, 'fgyghyuadsgifjhk', NULL, 12, 'task', 6, '2018-04-14 17:49:44', '2018-04-14 17:49:44'),
(2, 'dummy content for comnetin g on the comapany', NULL, 12, 'company', 1, '2018-04-14 17:51:58', '2018-04-14 17:51:58'),
(3, 'dummy content for comnetin g on the comapany', NULL, 12, 'project', 2, '2018-04-14 17:52:16', '2018-04-14 17:52:16'),
(4, 'jnvbdffv', NULL, 12, 'task', 6, '2018-04-14 18:21:49', '2018-04-14 18:21:49'),
(6, 'dummy data for tasks', NULL, 12, 'task', 6, '2018-04-14 19:54:14', '2018-04-14 19:54:14'),
(7, 'dummy data comment for project', NULL, 12, 'project', 2, '2018-04-14 19:57:34', '2018-04-14 19:57:34'),
(8, 'smart ios is considered as breakthrow operating system', NULL, 12, 'task', 3, '2018-04-21 21:08:49', '2018-04-21 21:08:49'),
(9, 'hello guys', NULL, 12, 'task', 3, '2018-04-24 12:11:26', '2018-04-24 12:11:26'),
(10, 'ewefefe', NULL, 12, 'task', 8, '2018-06-27 12:53:33', '2018-06-27 12:53:33'),
(11, 'ferferf', NULL, 12, 'task', 8, '2018-06-27 12:53:47', '2018-06-27 12:53:47'),
(12, 'cdcdc', NULL, 12, 'task', 6, '2018-06-27 14:26:06', '2018-06-27 14:26:06');

-- --------------------------------------------------------

--
-- بنية الجدول `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `companies`
--

INSERT INTO `companies` (`id`, `name`, `description`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'LENOVO', 'it is multinational technology company', 'pexels-photo-157213.jpeg', 12, '2018-03-17 17:36:36', '2018-04-11 09:51:26'),
(2, 'apple', 'apple is the most powerful company in technology track', '10570287_535908323221674_1647853366421638867_n.jpg', 12, '2018-03-17 18:58:15', '2018-03-17 18:58:15'),
(3, 'benaa today', 'this company will connect providers to customers', 'new-york-skyline-manhattan-hudson-40142.jpeg', 12, '2018-04-25 10:20:07', '2018-04-25 10:20:07'),
(4, 'apple', 'technolgy company', '33.jpg', 12, '2018-06-27 12:45:08', '2018-06-27 12:45:08'),
(5, 'samsung', 'cell phones company', 'download (2).jpg', 12, '2018-06-27 12:46:19', '2018-06-27 12:46:19'),
(6, 'hawawi', 'network company', 'rss-icon.png', 12, '2018-06-27 12:47:52', '2018-06-27 12:47:52');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_09_070120_create_companies_table', 1),
(4, '2017_09_09_071240_create_projects_table', 1),
(5, '2017_09_09_071948_create_tasks_table', 1),
(6, '2017_09_09_082113_create_comments_table', 1),
(7, '2017_09_09_090252_create_roles_table', 1),
(8, '2017_09_09_092955_create_project_user_table', 1),
(9, '2017_09_09_093411_create_task_user_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `image`, `company_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'macintosh', 'it is a laptop with high quelity', '10155202_762075223830938_4134850830056479274_n.jpg', NULL, 12, '2018-03-17 19:35:40', '2018-04-11 01:10:44'),
(2, 'iphone 6', 'mobile with smart operating system', 'pexels-photo-302769.jpeg', NULL, 12, '2018-03-17 19:42:32', '2018-04-11 09:52:01'),
(3, 'project one', 'cell phone', '0d374d4f6cf707.jpg', 6, 12, '2018-06-27 12:48:39', '2018-06-27 12:48:39'),
(4, 'project two', 'improving eading generation of cell phones', 'download.jpg', 6, 12, '2018-06-27 12:51:36', '2018-06-27 12:51:36');

-- --------------------------------------------------------

--
-- بنية الجدول `project_user`
--

CREATE TABLE `project_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `days` int(10) UNSIGNED DEFAULT NULL,
  `hours` int(10) UNSIGNED DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `content`, `image`, `project_id`, `user_id`, `days`, `hours`, `company_id`, `created_at`, `updated_at`) VALUES
(1, 'face detection', 'this tecknique was used in authentication', 'pexels-photo-196667.jpeg', 1, 12, 90, 12, 1, NULL, '2018-04-25 10:32:18'),
(3, 'smart os', 'developimg  smart os', 'black-and-white-city-houses-skyline.jpg', 1, 12, 43, 8, NULL, '2018-04-10 23:21:03', '2018-04-10 23:21:03'),
(6, 'scientific research', 'most of famuas companies are interested in scientific n researches', 'new-york-skyline-manhattan-hudson-40142.jpeg', 1, 12, 100, 7, 1, '2018-04-11 07:03:34', '2018-04-14 16:29:09'),
(7, 'lenove 7', 'android  version hieger than the existed one', 'pexels-photo-220769.jpeg', 1, 12, 150, 7, 1, '2018-04-11 07:17:17', '2018-04-11 09:52:36'),
(8, 'homeland security', 'tracking the traffic', 'images.jpg', 3, 12, 2, 3, 5, '2018-06-27 12:53:21', '2018-06-27 12:53:21');

-- --------------------------------------------------------

--
-- بنية الجدول `task_user`
--

CREATE TABLE `task_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `job_title`, `bio`, `image`, `dob`, `password`, `first_name`, `middle_name`, `last_name`, `city`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'adminadmin', 'adminadmin@gmail.com', 'CEO', 'administrator of many  famous companies', 'man-1485335_960_720.jpg', '2018-06-06', '$2y$10$DJqA29iH6oOc0zs2k7/6qO.u8gj7YsOy/KDT0MzflA6gqSUF4HyCu', NULL, NULL, NULL, NULL, 1, '9WmVNgWFjnGwI2GohNU5sJfRJkkJSjs5GGWOuZbYuc1DYp1sscVdLXbMyBL0', '2018-06-27 13:07:29', '2018-06-27 13:07:29'),
(13, 'abdurrahman gad', 'abdurrahman@gmail.com', 'software engineer', 'html css php sql css', 'stock-photo-young-indian.jpg', '1992-06-25', '$2y$10$LLtKFXrqEn//Ilg/h.V1.OfO33F8fiHCJtekMuPQ4dwzZrjpmx.0K', NULL, NULL, NULL, NULL, 2, NULL, '2018-06-27 13:43:01', '2018-06-27 13:43:01'),
(14, 'abbad', 'abbad@gmail.com', 'SEO specialist', 'search engine optimization apwecialist', 'stock-photo-handsome.jpg', '1990-06-06', '$2y$10$SiFaM8FGVjkeBWkSAv4fquhpPSMi8nvKkaNGNgeErUEbhgt9J/Ddu', NULL, NULL, NULL, NULL, 2, NULL, '2018-06-27 13:45:36', '2018-06-27 13:45:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_company_id_foreign` (`company_id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_user_id_foreign` (`user_id`),
  ADD KEY `project_user_project_id_foreign` (`project_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_company_id_foreign` (`company_id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user_user_id_foreign` (`user_id`),
  ADD KEY `task_user_task_id_foreign` (`task_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `project_user`
--
ALTER TABLE `project_user`
  ADD CONSTRAINT `project_user_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- القيود للجدول `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `task_user`
--
ALTER TABLE `task_user`
  ADD CONSTRAINT `task_user_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `task_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
