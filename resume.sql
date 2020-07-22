-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2020 at 05:30 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.32-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` json NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `address`, `email`, `password`, `avatar`, `roles`, `active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kamal Raj Silwal', '9841588209', 'Baniyatar, Tokha-03, Kathmandu, Nepal', 'u.silwal@gmail.com', '$2y$10$LqRIhX4aRsoJ.214srtyZuiayWAVNn0l53yPi0NsW9ovGCrt2yXZa', 'kamal-raj-silwal.JPG', '[\"ADMIN\", \"SUPERADMIN\"]', 1, NULL, 'H18fRxw7sNdwvH2dhuvFOhfsrUlyCByYOxnAkeMyE85mucp98NkpyCS223xu', '2020-07-05 22:26:11', '2020-07-06 10:24:55'),
(24, 'Some name', '2322', 'some place', 'example@example.com', '$2y$10$JXzjpOAIWHNrWHVXxYaqqOKAMFLPYZhSswrYNRxxChvOnqm/X.Sle', NULL, '[\"ADMIN\"]', 1, NULL, NULL, '2020-07-06 13:24:25', '2020-07-06 13:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `awarder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `title`, `date`, `awarder`, `summary`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'TechPro', '2017-07-18', 'Ubuntu', 'dfafafadfafafda', 1, '2020-07-12 13:08:46', '2020-07-12 13:13:38'),
(2, 'Award', '2014-11-01', 'Company', 'There is no spoon.', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `study_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `gpa` double(4,2) UNSIGNED NOT NULL,
  `courses` json NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `institution`, `area`, `study_type`, `start_date`, `end_date`, `gpa`, `courses`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Pinnacle Academy', 'dfafaadf', 'Higher Secondary', '2017-07-12', NULL, 4.20, '[\"fafdaa\", \"jdkdsafjij\"]', 1, '2020-07-12 08:50:43', '2020-07-13 19:13:50'),
(3, 'Amar Jyoti Higher Secondary English Boarding School', 'Science', 'SEE (SLC)', '1993-07-14', '2003-07-14', 4.00, '[\"English\", \"Math\", \"Science\"]', 1, '2020-07-13 19:15:41', '2020-07-13 19:15:41'),
(4, 'University', 'Software Development', 'Bachelor', '2011-01-01', '2013-01-01', 4.00, '[\"DB1101 - Basic SQL\", \"DB1101 - Basic PHP\"]', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` json NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `name`, `keywords`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Astronomy', '[\"universe\", \"Orion Nebula\", \"Milky Way Galaxy\"]', 1, '2020-07-13 00:28:31', '2020-07-13 08:18:31'),
(2, 'Wildlife', '[\"Ferrets\", \"Unicorns\"]', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fluency` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `fluency`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nepali', 'Native Speaker', 1, '2020-07-12 14:11:11', '2020-07-12 14:11:11'),
(2, 'English', 'Proficient', 1, '2020-07-12 14:11:36', '2020-07-12 14:11:36'),
(3, 'Norsk', 'Conversant', 1, '2020-07-12 14:11:53', '2020-07-12 14:11:53'),
(4, 'English', 'Native speaker', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `linked_social_accounts`
--

CREATE TABLE `linked_social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `address`, `postal_code`, `city`, `country_code`, `region`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Tokha-03, Baniyatar', '00977', 'Kathmandu', 'NEP', '3', 1, NULL, NULL),
(3, '2712 Broadway St', 'CA 94115', 'San Francisco', 'US', 'California', 2, '2020-07-15 01:37:40', '2020-07-15 01:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2020_07_03_023843_create_admins_table', 2),
(7, '2020_07_03_024452_create_locations_table', 3),
(8, '2020_07_03_025119_create_profiles_table', 3),
(9, '2020_07_03_025304_create_works_table', 3),
(10, '2020_07_03_025638_create_volunteers_table', 3),
(11, '2020_07_03_030112_create_education_table', 3),
(12, '2020_07_03_030935_create_awards_table', 3),
(13, '2020_07_03_031102_create_publications_table', 3),
(14, '2020_07_03_061736_create_skills_table', 3),
(15, '2020_07_03_061931_create_languages_table', 3),
(16, '2020_07_03_062147_create_interests_table', 3),
(17, '2020_07_03_062312_create_references_table', 3),
(18, '2020_07_05_105945_create_sitesettings_table', 4),
(19, '2020_07_06_162014_create_themes_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `network` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `network`, `username`, `url`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Twitter', 'wup3ndra', 'https://www.twitter.com/wup3ndra', 1, '2020-07-12 03:50:27', '2020-07-16 04:54:35'),
(4, 'facebook', 'wupendra', 'https://facebook.com/wupendra', 1, '2020-07-12 04:25:22', '2020-07-12 04:25:22'),
(5, 'Twitter', 'john', 'http://twitter.com/john', 2, '2020-07-15 01:37:40', '2020-07-15 01:37:40'),
(6, 'Facebook', 'john', 'http://facebook.com/john', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `name`, `publisher`, `release_date`, `website`, `summary`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Into the wild', 'ABC printing Press', '2017-07-13', 'https://kamalsilwal.com.np', 'Its the book about a man living into the wild leaving everything behind.', 1, '2020-07-13 06:16:05', '2020-07-13 06:44:03'),
(2, 'Publication', 'Company', '2014-10-01', 'http://publication.com', 'Some of the work of the john doe. His summary of the work he did for the company. some of the description is written here....', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `name`, `reference`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '--Charles Dicken', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', 1, '2020-07-13 08:15:22', '2020-07-13 08:15:22'),
(2, 'Jane Doe', 'Some of the work of the john doe. His summary of the work he did for the company. some of the description is written here....', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `googleplus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` json DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `app_name`, `meta_title`, `meta_keyword`, `meta_description`, `short_note`, `address`, `contact`, `mobile`, `facebook`, `googleplus`, `twitter`, `instagram`, `youtube`, `linkedin`, `admin_email`, `options`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'MakeMyCV', 'Make My CV', 'cv, resume, free cv, make free cv, make resume free, export cv, make cv online, make resume online', 'Make my CV is an free application where you can make and export your personal CV for free.', 'Make My CV provides all of its services for free of cost. We believe that we can contribute the world to be a better place.', 'Baniyatar-03, Tokha, Kathmandu, Nepal', '9841588209', '9841588209', '#', '#', '#', '#', '#', '#', 'makemycv@gmail.com', '{\"banner\": \"makemycv-banner0.jpg\", \"banner_caption\": \"Need a CV to leap to the next step of your career? No problem, we provide CVs in hundered of themes and the best part is, its all for free!!! Select your favourite theme and get the CV the way you want.\"}', 'makemycv-logo.png', 'makemycv-favicon.png', '2020-07-05 03:39:19', '2020-07-06 15:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` json NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `level`, `keywords`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'master', '[\"laravel\", \"php\", \"mysql\", \"git\"]', 1, '2020-07-12 10:50:15', '2020-07-12 10:50:15'),
(2, 'Frontend Develpoment', 'intermediate', '[\"Html\", \"Css\"]', 1, '2020-07-12 10:56:18', '2020-07-12 12:18:24'),
(3, 'Graphics Design', 'beginner', '[\"photoshop\", \"illustrator\", \"gimp\"]', 1, '2020-07-12 12:19:28', '2020-07-12 12:19:28'),
(4, 'test', 'master', '[\"QA\", \"testing\"]', 1, '2020-07-13 08:18:09', '2020-07-13 08:18:09'),
(5, 'Web Development', 'Master', '[\"HTML\", \"CSS\", \"Javascript\"]', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `image`, `credit`, `download_count`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Elegant', 'elegant', 'Elegant theme for Resume', 'resume themes, CV, resume, free cv download, free resume, easy cv, easy resume', 'resume themes, CV, resume, free cv download, free resume, easy cv, easy resume', 'elegant2.jpeg', 'Mudassir', 0, 1, '2020-07-06 12:05:01', '2020-07-06 13:21:40'),
(2, 'Kwan', 'kwan', 'A cool resume theme', 'resume themes, CV, resume, free cv download, free resume, easy cv, easy resume', 'resume themes, CV, resume, free cv download, free resume, easy cv, easy resume', 'kwan.jpeg', 'Nacho Coloma', 0, 1, '2020-07-06 13:14:11', '2020-07-06 13:14:11'),
(3, 'Spartan', 'spartan', 'Great resume theme', 'resume themes, CV, resume, free cv download, free resume, easy cv, easy resume', 'resume themes, CV, resume, free cv download, free resume, easy cv, easy resume', 'spartan.jpeg', 'Francesco Esposito', 0, 1, '2020-07-06 13:16:31', '2020-07-06 13:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `visibility` tinyint(1) NOT NULL DEFAULT '0',
  `username_flalg` tinyint(1) NOT NULL DEFAULT '0',
  `uptodate` tinyint(1) DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `label`, `website`, `summary`, `picture`, `active`, `visibility`, `username_flalg`, `uptodate`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kamal Raj Silwal', 'u.silwal@gmail.com', 'kamal-raj-silwal', '9841588209', 'A Senior Web Developer looking for a new opportunity', 'https://kamalsilwal.com.np', 'I am a computer geek who spends most of his time in front of a pc, banging his\r\nhead for small problems and smiling with joy for little solutions. I am a web\r\ndeveloper by profession.', 'kamal-raj-silwal0.JPG', NULL, 0, 0, NULL, NULL, '$2y$10$4FDkwqrIKJjhBSuqfBYBWOSDj/OpWAnCu0yvZxvyimGLFnNCA2f1q', 'caHQ5Vviy4iVL2AdG6eYVenZSjs1jsdNEpwcHpvOLdoYIcOntZKNKhD4NwU9', '2020-07-05 11:45:08', '2020-07-15 21:05:50'),
(2, 'John Doe', 'john@gmail.com', NULL, '(912) 555-4321', 'Programmer', 'http://johndoe.com', 'A summary of John Doe...contains some of the material of John Doe.', 'avatar.jpg', 1, 0, 0, 0, NULL, '$2y$10$wsDoDSYUaUeuLPkTfFk3YOOqUJEW5iRuo6kIOHJoMF43ipFaM5U9.', NULL, '2020-07-15 01:37:40', '2020-07-15 01:37:40'),
(3, 'Alex Nelson', 'example@example.com', 'alex-nelson', '9841588209', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '$2y$10$czP3Zk/nJz3U6jGWD2SZAeNE9A9VfA.yIDMNeq/iCD1Xg2Dyw3gw2', NULL, '2020-07-05 12:34:23', '2020-07-05 12:34:23'),
(4, 'some-name', 'some@example.com', 'some-name', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, NULL, NULL, 'NUZXtDkbHVc5aWDHLQad61PLay7lFUP7cp6LkhM4qobNydFZTstpcKsa3Ol4', '2020-07-15 00:31:00', '2020-07-15 09:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlights` json NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `organization`, `position`, `website`, `start_date`, `end_date`, `summary`, `highlights`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Prakriti ko Ghar', 'Accountant', 'https://pkg.org.np', '2017-07-02', '2017-07-25', 'PKG nepal is an non profit organization currently working on the self sustainable house for the orphan children.', '[\"Check account and the company transaction.\\r\", \"Help with the audit report.\"]', 1, '2020-07-13 00:07:35', '2020-07-13 00:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlights` json NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `company`, `position`, `website`, `start_date`, `end_date`, `summary`, `highlights`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Ncom Services Pvt. Ltd', 'Web Developer', NULL, '2013-07-13', '2015-09-23', 'Ncom Service is a software company located at Samakhusi, Kathmandu Nepal.', '[\"Develpeded application on Code Ignitor and Yii Frameworks.\\r\", \"Took part in the development of Fannep.com, a first time fantasy league application made in Nepal.\"]', 1, '2020-07-12 01:41:30', '2020-07-13 19:22:54'),
(9, 'Decade International Pvt. Ltd.', 'Lead Php Developer', 'https://decadeint.com/', '2015-08-19', '2017-03-15', 'Decade International is a company which importer of technological goods. There were many web applications needed for the company and they also used to sell software application as a service.', '[\"Worked in inhouse projects like decade.com, wakietalkienepal.com, nebulla.com etc.\\r\", \"Projects were done in Laravel and Code ignitor frameworks.\"]', 1, '2020-07-13 19:35:11', '2020-07-13 19:35:11'),
(10, 'Company', 'President', 'http://company.com', '2013-01-01', '2014-01-01', 'Some of the work of the john doe. His summary of the work he did for the company. some of the description is written here.', '[\"Some of the work of the john doe. His summary of the work he did for the company. some of the description is written here.\"]', 2, '2020-07-15 01:37:41', '2020-07-15 01:37:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awards_user_id_foreign` (`user_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interests_user_id_foreign` (`user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_user_id_foreign` (`user_id`);

--
-- Indexes for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `linked_social_accounts_provider_id_unique` (`provider_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_user_id_foreign` (`user_id`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publications_user_id_foreign` (`user_id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `references_user_id_foreign` (`user_id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `themes_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `user_username_unique` (`username`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `volunteers_user_id_foreign` (`user_id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `references`
--
ALTER TABLE `references`
  ADD CONSTRAINT `references_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD CONSTRAINT `volunteers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
