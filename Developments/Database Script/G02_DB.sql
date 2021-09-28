-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 10:14 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pp4e`
--

-- --------------------------------------------------------

--
-- Table structure for table `charts`
--

CREATE TABLE `charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `y_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charts`
--

INSERT INTO `charts` (`id`, `y_data`, `x_data`, `created_at`, `updated_at`) VALUES
(1, 'PHP', '95', NULL, NULL),
(2, 'MySQL', '91', NULL, NULL),
(3, 'Laravel', '98', NULL, NULL),
(4, 'React', '80', NULL, NULL),
(5, 'OpenCart', '75', NULL, NULL),
(6, 'VueJS', '82', NULL, NULL),
(7, 'Python', '85', NULL, '2021-09-09 23:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `client_reviews`
--

CREATE TABLE `client_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_reviews`
--

INSERT INTO `client_reviews` (`id`, `client_name`, `client_description`, `client_img`, `created_at`, `updated_at`) VALUES
(1, 'Harry Doe', '“I want to thank you again for putting together an excellent workshop.  I have taken several courses on PM and I have to say, without a doubt, I left this one with more take-a-ways that are applicable to my work in product development than any other.  Of most importance were the tips and tools I learned on time estimating.  It will be most helpful as I prepare the business case for my next project.  After 40 years of managing projects of various sizes, I think I am finally able to transition from a dominating “seat of the pants” approach to an approach that is much more disciplined.  Never too late, I guess.”\r\n\r\n', 'https://image.freepik.com/free-photo/waist-up-portrait-handsome-serious-unshaven-male-keeps-hands-together-dressed-dark-blue-shirt-has-talk-with-interlocutor-stands-against-white-wall-self-confident-man-freelancer_273609-16320.jpg', NULL, NULL),
(2, 'Mohammed Ali', '“The instructor was very enthusiastic and knowledgeable about the subject matter. She kept the class interesting and brought up good examples. The risk plan analysis and the concept of negative stakeholders was most helpful.”\r\n\r\n', 'https://image.freepik.com/free-photo/smiling-tattooed-bearded-trendy-muslim-guy-sitting-cafe-morning-having-peasant-conversation-with-his-friend-mobile-phone_232070-7905.jpg', NULL, NULL),
(3, 'Tim Burdeu', '“I felt the workshop was valuable and that your presentation skills are excellent. Everything flowed very well and you stayed on schedule with the workshop.  Keep up the good work!”\r\n', 'https://img.freepik.com/free-photo/young-arabian-man-isolated-yellow-space-showing-welcome-expression_1187-88820.jpg?size=338&ext=jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'John', 'john@gmail.com', 'this is for test', NULL, NULL),
(2, 'tamie', 'tamie@gmail.com', 'hehehehehe', NULL, NULL),
(3, 'hien', 'hien@gmail.com', 'adadwadaw\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` float NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_type`, `coupon_discount`, `valid_from`, `valid_to`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HELLO1', 'value', 200, '2021-09-01', '2021-09-30', 0, NULL, '2021-09-19 21:12:11'),
(2, 'MIDAUTUMN', 'value', 50, '2021-09-01', '2021-09-30', 1, NULL, '2021-09-20 22:45:52'),
(3, 'HAPPYSMILE', 'percent', 0.1, '2021-09-01', '2021-09-15', 1, NULL, NULL),
(6, 'FUTURE', 'percent', 0.8, '2021-09-01', '2021-09-30', 1, NULL, NULL),
(7, 'TALENT', 'percent', 1, '2021-09-01', '2021-10-09', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_lecture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_student` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_all` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `short_title`, `short_description`, `small_img`, `long_title`, `long_description`, `total_duration`, `total_lecture`, `total_student`, `skill_all`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'course detail 1', 'course detail', 'https://image.freepik.com/free-photo/learner-lesson_1098-14155.jpg', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', NULL, NULL),
(2, 'course detail 2', 'course detail', 'https://image.freepik.com/free-photo/coach-by-whiteboard_1098-12970.jpg', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', NULL, NULL),
(3, 'course detail 3', 'course detail', 'https://image.freepik.com/free-photo/learner-lesson_1098-14155.jpg', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', NULL, NULL),
(4, 'course detail 4', 'course detail', 'https://image.freepik.com/free-photo/learner-lesson_1098-14155.jpg', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', 'course detail', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL COMMENT 'employee_id=user_id',
  `date` date NOT NULL,
  `attend_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL COMMENT 'employee_id=User_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_salary` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Final Test', '2021-09-14 05:48:41', '2021-09-14 05:48:41'),
(3, 'Midterm Test', '2021-09-14 05:49:51', '2021-09-14 05:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `address`, `email`, `phone`, `facebook`, `youtube`, `twitter`, `footer_credit`, `created_at`, `updated_at`) VALUES
(1, '101 Bui Vien, Ward 15 District 1, Ho Chi Minh City', 'Support@pp4e.com', '(028)-247247', 'https://www.facebook.com/', 'https://www.youtube.com/', 'https://twitter.com/?lang=en', '© Copyright 2021 by PP4E, All Rights Reserved', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_pages`
--

CREATE TABLE `home_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tech_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_student` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_pages`
--

INSERT INTO `home_pages` (`id`, `home_title`, `home_subtitle`, `tech_description`, `total_student`, `total_course`, `total_review`, `video_description`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 'Professional Programming for Everyone', 'Learn Profesionally', '<p>Hi! I\'m Doe Nguyen. I\'m a web developer with a serious love for teaching I am a founder of PP4E and a passionate Web Developer, Programmer & Instructor.</p>\n\n<p>I am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.\n\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.</p>', '34678', '22', '3000', '       <p className=\"serviceDescription text-justify\">\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of Professional Programming for Everyone and a passionate Web Developer, Programmer & Instructor.<br></br>\n\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.\n<br></br>\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.\n                              </p>', 'https://media.w3.org/2010/05/sintel/trailer_hd.mp4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `refund` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `about`, `refund`, `terms`, `privacy`, `created_at`, `updated_at`) VALUES
(1, '<h1 className=\"serviceName\">Who I Am </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.   \r\n</p>\r\n\r\n<br></br>\r\n<h1 className=\"serviceName\">Our Mission </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E  and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.  \r\n</p>\r\n\r\n<br></br>\r\n<h1 className=\"serviceName\">Our Vision  </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E  and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.  <br></br>\r\n</p>', '<h1 className=\"serviceName\">Who I Am </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.   \r\n</p>\r\n\r\n<br></br>\r\n<h1 className=\"serviceName\">Our Mission </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E  and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.  \r\n</p>\r\n\r\n<br></br>\r\n<h1 className=\"serviceName\">Our Vision  </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E  and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.  <br></br>\r\n</p>', '<h1 className=\"serviceName\">Who I Am </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.   \r\n</p>\r\n\r\n<br></br>\r\n<h1 className=\"serviceName\">Our Mission </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E  and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.  \r\n</p>\r\n\r\n<br></br>\r\n<h1 className=\"serviceName\">Our Vision  </h1>\r\n<hr />\r\n<p  className=\"serviceDescription\">\r\nHi! I\'m Vinh Doe. I\'m a web developer with a serious love for teaching I am a founder of PP4E  and a passionate Web Developer, Programmer & Instructor.\r\n<br></br>\r\nI am working online for the last 7 years and have created several successful websites running on the internet. I try to create a project-based course that helps you to learn professionally and make you fell as a complete developer. easy learning exists to help you succeed in life.<br></br>\r\n\r\nEach course has been hand-tailored to teach a specific skill. I hope you agree! Whether you’re trying to learn a new skill from scratch or want to refresh your memory on something you’ve learned in the past, you’ve come to the right place.<br></br>\r\n\r\nEducation makes the world a better place. Make your world better with new skills.  <br></br>\r\n</p>', '<h1 classname=\"serviceName\"><u><b><span style=\"font-family: Verdana; background-color: rgb(255, 156, 0);\">SAO KÊ ĐI TRẤN THÀNH ƠI!</span></b></u></h1><table class=\"table table-bordered\"><tbody><tr><td>Ngày</td><td>Số tiền</td><td><a href=\"http://vnexpress.net\" target=\"_blank\">Nội dung</a></td><td>Ghi chú</td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><h1 classname=\"serviceName\"><br></h1>', NULL, '2021-09-07 09:12:01'),
(2, '<p>This is the test only.</p><p>Hello, my name is Vinh.</p>', '<p>This is the test only.</p><p>Hello, my name is Vinh.</p>', '<p>This is the test only.</p><p>Hello, my name is Vinh.</p>', '<p>This is the test only.</p><p>Hello, my name is Vinh.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_salary` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_teachers`
--

CREATE TABLE `level_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `increment_salary` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_08_21_045124_create_sessions_table', 1),
(7, '2021_08_24_091959_create_services_table', 2),
(8, '2021_08_24_093118_create_client_reviews_table', 3),
(9, '2021_08_24_093903_create_projects_table', 4),
(10, '2021_08_24_094516_create_contacts_table', 5),
(11, '2021_08_24_122139_create_footers_table', 6),
(12, '2021_08_24_125153_create_home_pages_table', 7),
(13, '2021_08_24_130258_create_charts_table', 8),
(14, '2021_08_24_131902_create_information_table', 9),
(15, '2021_08_24_132432_create_courses_table', 10),
(17, '2021_09_11_071803_create_student_years_table', 12),
(23, '2014_10_12_000000_create_users_table', 17),
(26, '2021_09_14_120714_create_exam_types_table', 20),
(29, '2021_09_14_140839_create_student_discounts_table', 22),
(31, '2021_09_11_074033_create_student_groups_table', 24),
(32, '2021_09_11_075634_create_student_shifts_table', 24),
(33, '2021_09_16_140702_create_student_days_table', 25),
(39, '2021_09_16_125801_create_student_subjects_table', 28),
(41, '2021_09_16_170556_create_subject_fee_logs_table', 29),
(42, '2021_09_17_161728_create_student_classes_table', 30),
(46, '2021_09_19_170150_create_coupons_table', 32),
(49, '2021_09_18_155801_create_student_regs_table', 33),
(50, '2021_09_14_120102_create_job_titles_table', 34),
(51, '2021_09_27_051646_create_level_teachers_table', 35),
(52, '2021_09_27_054139_create_employee_salary_logs_table', 36),
(53, '2021_09_27_054149_create_employee_attendances_table', 36);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_img_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_img_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_features` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_live_preview` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_img_one`, `project_img_two`, `project_name`, `project_description`, `project_features`, `project_live_preview`, `created_at`, `updated_at`) VALUES
(1, 'https://image.freepik.com/free-vector/online-courses-tutorials_52683-37860.jpg', 'http://localhost:3000/static/media/pdetails.8992071a.png', 'Project Name One', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph,\r\n\r\n', 'https://easylearningbd.com/', NULL, NULL),
(2, 'https://image.freepik.com/free-vector/online-courses-tutorials_52683-37860.jpg', 'http://localhost:3000/static/media/pdetails.8992071a.png', 'Project Name Two', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph,\r\n\r\n', 'https://easylearningbd.com/', NULL, NULL),
(3, 'https://image.freepik.com/free-vector/online-courses-tutorials_52683-37860.jpg', 'http://localhost:3000/static/media/pdetails.8992071a.png', 'Project Name Three', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph,\r\n\r\n', 'https://easylearningbd.com/', NULL, NULL),
(4, 'http://127.0.0.1:8000/upload/project_images/1710396494573186.png', 'http://localhost:3000/static/media/pdetails.8992071a.png', 'Project Name Three', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph,', 'https://easylearningbd.com/', NULL, '2021-09-08 21:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_description`, `service_logo`, `created_at`, `updated_at`) VALUES
(1, 'Ecommerce 123', 'I will design and develop ecommerce online store website.', 'http://127.0.0.1:8000/upload/service_logo/1710337770282204.png', NULL, '2021-09-08 05:46:44'),
(2, 'Web Design', 'Qualified web design and attractive effects which catches visitor’s Eye.', 'https://image.freepik.com/free-photo/web-design-online-technology-content-concept_53876-123927.jpg', NULL, NULL),
(3, 'Web Development 2', '1 Clean and fresh issue free code to make your website dynamic perfectly.', 'http://127.0.0.1:8000/upload/service_logo/1710489186875841.png', NULL, '2021-09-09 21:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('B8p3PgFtCPBGX1ieh0atPY0A83xbhRDNIV9ERh6f', 30, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36 Edg/93.0.961.52', 'YTo3OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy9tYW5hZ2VtZW50L3N0dWRlbnQvY2xhc3MiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiczFMTHlaSlJmcVFZbjBMNUJRVkd2WlFueVJtdUtMMEFCbkRKbW1zZCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MzA7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRMdXF6a2dDc0NmTnZ2YUdHUDlSRGdPWGU3Q3RVSDhPNDRLdTlCLnNlMzBRV29vQVh1UFg0dSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkTHVxemtnQ3NDZk52dmFHR1A5UkRnT1hlN0N0VUg4TzQ0S3U5Qi5zZTMwUVdvb0FYdVBYNHUiO30=', 1632806377),
('JbcpkARQoFNaKZ8NF3YMDZBVmDJ7TSaNzSSvfgjw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSTlxc1BCWVBsRGxUQmc3SlVTR2hJbmsyRjZDSXlGemFZamk2ck54UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy9tYW5hZ2VtZW50L3N0dWRlbnRsaXN0L2NsYXNzLzUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkUFVPUGtLNjhjb285NWF0dkFnWFQwT1hETWs3U202QW1DcjlxblJsdVFzb1E0SmJOaXg1cFciO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFBVT1BrSzY4Y29vOTVhdHZBZ1hUME9YRE1rN1NtNkFtQ3I5cW5SbHVRc29RNEpiTml4NXBXIjt9', 1632816127);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT 0,
  `year_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL,
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `planned_start_date` date NOT NULL,
  `applied_fee` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `teacher_id`, `year_id`, `group_id`, `subject_id`, `day_id`, `shift_id`, `planned_start_date`, `applied_fee`, `created_at`, `updated_at`) VALUES
(1, 'SE_DW_M0_0921', 23, 4, 1, 2, 1, 1, '2021-09-30', 250, '2021-09-18 03:13:29', '2021-09-18 03:13:29'),
(5, 'SE_DW_E1_0921', 23, 5, 1, 2, 2, 3, '2021-09-30', 200, '2021-09-20 09:09:02', '2021-09-20 09:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `student_days`
--

CREATE TABLE `student_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_days`
--

INSERT INTO `student_days` (`id`, `name`, `short_code`, `created_at`, `updated_at`) VALUES
(1, 'Mon - Wed - Fri', '0', '2021-09-16 07:29:06', '2021-09-16 07:29:06'),
(2, 'Tue - Thu - Sat', '1', '2021-09-16 07:29:23', '2021-09-16 07:29:42'),
(3, 'Sat - Sun', '2', '2021-09-16 07:30:16', '2021-09-16 07:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_discounts`
--

CREATE TABLE `student_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_discounts`
--

INSERT INTO `student_discounts` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(6, 9, 1, 100, '2021-09-14 17:51:23', '2021-09-14 17:51:23'),
(7, 10, 1, 100, '2021-09-14 18:11:48', '2021-09-14 18:11:48'),
(14, 17, 1, 100, '2021-09-14 19:15:14', '2021-09-14 19:15:14'),
(15, 18, 1, 100, '2021-09-14 19:16:01', '2021-09-14 19:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `short_code`, `created_at`, `updated_at`) VALUES
(1, 'Software Engineering', 'SE', '2021-09-16 06:52:33', '2021-09-16 06:52:33'),
(2, 'Marketing', 'MKT', '2021-09-16 06:53:25', '2021-09-16 06:53:25'),
(3, 'Data Science', 'DS', '2021-09-16 06:54:05', '2021-09-16 06:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `student_regs`
--

CREATE TABLE `student_regs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `mark` double(8,2) DEFAULT NULL,
  `voucher_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee_amount` double(8,2) NOT NULL,
  `discount_amount` double(8,2) DEFAULT NULL,
  `paid` double(8,2) NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_regs`
--

INSERT INTO `student_regs` (`id`, `student_id`, `class_id`, `mark`, `voucher_name`, `value`, `fee_amount`, `discount_amount`, `paid`, `payment`, `created_at`, `updated_at`, `id_no`) VALUES
(4, 30, 1, 8.00, 'TALENT', '-100%', 250.00, 250.00, 0.00, 'transfer', '2021-09-22 21:59:08', '2021-09-24 06:40:59', 2021090004),
(48, 30, 5, 7.50, 'MIDAUTUMN', '-50', 200.00, 50.00, 150.00, 'transfer', '2021-09-27 09:15:20', '2021-09-28 01:02:07', 2021090005);

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `short_code`, `created_at`, `updated_at`) VALUES
(1, 'Morning', 'M', '2021-09-16 06:56:56', '2021-09-16 06:56:56'),
(2, 'Afternoon', 'A', '2021-09-16 06:57:41', '2021-09-16 06:57:41'),
(3, 'Evening', 'E', '2021-09-16 06:58:02', '2021-09-16 06:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_session` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `name`, `short_code`, `total_session`, `created_at`, `updated_at`) VALUES
(2, 'Dynamic Website', 'DW', 16, '2021-09-17 17:17:51', '2021-09-17 17:19:20'),
(3, 'Data Management', 'DM', 20, '2021-09-17 17:20:53', '2021-09-17 17:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, '2022', '2021-09-12 10:36:42', '2021-09-12 10:36:42'),
(5, '2021', '2021-09-16 07:38:31', '2021-09-16 07:38:31'),
(6, '2019', '2021-09-16 07:38:46', '2021-09-16 07:38:46'),
(7, '2020', '2021-09-16 07:38:56', '2021-09-16 07:38:56'),
(8, '2023', '2021-09-24 06:15:22', '2021-09-24 06:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `subject_fee_logs`
--

CREATE TABLE `subject_fee_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'subject_id=Subject_id',
  `fee_amount` int(11) NOT NULL,
  `effective_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_fee_logs`
--

INSERT INTO `subject_fee_logs` (`id`, `subject_id`, `fee_amount`, `effective_date`, `created_at`, `updated_at`) VALUES
(1, 2, 150, '2021-09-01', '2021-09-17 17:17:51', '2021-09-17 17:17:51'),
(2, 2, 200, '2021-09-30', '2021-09-17 17:18:43', '2021-09-17 17:18:43'),
(3, 3, 250, '2021-09-25', '2021-09-17 17:20:53', '2021-09-17 17:20:53'),
(4, 2, 300, '2021-11-01', '2021-09-21 21:14:03', '2021-09-21 21:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Student,Employee,Admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of sotware,operator=computer operator,user=employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Vinh N', 'vinh@gmail.com', NULL, '$2y$10$PUOPkK68coo95atvAgXT0OXDMk7Sm6AmCr9qnRluQsoQ4JbNix5pW', '124214214', '16 nguyễn thị minh khai q1', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, '202109271642face.png', NULL, '2021-09-27 09:43:11'),
(4, 'Admin', 'tamie', 'tamie@gmail.com', NULL, '$2y$10$xCX85vTXHfWxAvh5hHD2uunDWwvwXYVNxgRV7o82QxgWrdYL01m6G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9577', 'Sales_Marketing', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-14 02:24:34', '2021-09-14 02:24:34'),
(23, 'Teacher', 'David', 'david@gmail.com', NULL, '$2y$10$x0FwxN6e.rPE6xmmBBpOsu/mFl5FkOOv26bWfo.bK1.nG0qScyMOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9577', 'Teacher', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-14 02:24:34', '2021-09-14 02:24:34'),
(24, 'Teacher', 'Alex', 'alex@gmail.com', NULL, '$2y$10$x0FwxN6e.rPE6xmmBBpOsu/mFl5FkOOv26bWfo.bK1.nG0qScyMOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9577', 'Teacher', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-14 02:24:34', '2021-09-14 02:24:34'),
(25, 'Student', 'xuyen', 'xuyen@gmai.com', NULL, '$2y$10$WFB9TBZ4FDIrfRnKkJEK8uXW0h/V5MD9zvn9N2XXtno/7ndmmZLD.', '1244211414', '123 abc', 'Male', NULL, NULL, NULL, NULL, '20210022', '1988-08-01', 'Welcome19880801', 'Student', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-19 04:08:05', '2021-09-19 04:08:05'),
(26, 'Student', 'phuc vu', 'phucvu@gmail.com', NULL, '$2y$10$x0FwxN6e.rPE6xmmBBpOsu/mFl5FkOOv26bWfo.bK1.nG0qScyMOS', '1112334', '456 abc', 'Male', NULL, NULL, NULL, NULL, '20210026', '1988-08-23', 'Welcome19880801', 'Student', NULL, NULL, NULL, 1, NULL, NULL, '202109231850face.png', '2021-09-19 04:41:05', '2021-09-23 11:50:28'),
(30, 'Student', 'huyen', 'huyen@gmail.com', NULL, '$2y$10$LuqzkgCsCfNvvaGGP9RDgOXe7CtUH8O44Ku9B.se30QWooAXuPX4u', '12414', '32523 dfsf', 'Female', NULL, NULL, NULL, NULL, '20210027', '2010-02-22', 'Welcome20100222', 'Student', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-22 09:20:04', '2021-09-22 09:20:04'),
(31, 'Student', 'tuyet', 'tuyet@gmail.com', NULL, '$2y$10$7pl70DE4yg1DAOE0whb/qesBRL/9ZYSvR097vyBSQaSF3rMESLBhO', '2124214', '12421 wdadawd', 'Female', NULL, NULL, NULL, NULL, '20210028', '2009-02-22', 'Welcome20090222', 'Student', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-22 09:24:07', '2021-09-22 09:24:07'),
(32, 'Admin', 'huan', 'huan@gmail.com', NULL, '$2y$10$rNjPri2ufLaUJwgLIfwi/.FVsNZ3F0nCxoEFLAXwYQKl5Uf7ViL7S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7677', 'Sale_Marketing', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-24 06:12:46', '2021-09-24 06:12:46'),
(33, 'Marketing', 'John Do', 'john@gmail.com', NULL, '$2y$10$l5WXQO3NQx4N6vddGcphiewV1cB5dJgGHGw18LkyRE1JVzlmLBHkK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3633', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-27 09:55:44', '2021-09-27 09:55:44'),
(34, 'OfficeAdmin', 'Khoa Le', 'khoa@gmail.com', NULL, '$2y$10$tyFq2lUpipncQxTUd2NOVuDSZMLTCucy6Yr3Yq59kjs21FEb2.36q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '555', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2021-09-27 10:04:15', '2021-09-27 10:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charts`
--
ALTER TABLE `charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_reviews`
--
ALTER TABLE `client_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_salary_logs_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_pages`
--
ALTER TABLE `home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_titles_name_unique` (`name`);

--
-- Indexes for table `level_teachers`
--
ALTER TABLE `level_teachers`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`),
  ADD KEY `student_classes_teacher_id_foreign` (`teacher_id`),
  ADD KEY `student_classes_year_id_foreign` (`year_id`),
  ADD KEY `student_classes_group_id_foreign` (`group_id`),
  ADD KEY `student_classes_subject_id_foreign` (`subject_id`),
  ADD KEY `student_classes_day_id_foreign` (`day_id`),
  ADD KEY `student_classes_shift_id_foreign` (`shift_id`);

--
-- Indexes for table `student_days`
--
ALTER TABLE `student_days`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_days_name_unique` (`name`),
  ADD UNIQUE KEY `student_days_short_code_unique` (`short_code`);

--
-- Indexes for table `student_discounts`
--
ALTER TABLE `student_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`),
  ADD UNIQUE KEY `student_groups_short_code_unique` (`short_code`);

--
-- Indexes for table `student_regs`
--
ALTER TABLE `student_regs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_regs_class_id_foreign` (`class_id`),
  ADD KEY `student_regs_student_id_foreign` (`student_id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`),
  ADD UNIQUE KEY `student_shifts_short_code_unique` (`short_code`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_subjects_name_unique` (`name`),
  ADD UNIQUE KEY `student_subjects_short_code_unique` (`short_code`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

--
-- Indexes for table `subject_fee_logs`
--
ALTER TABLE `subject_fee_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_fee_logs_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charts`
--
ALTER TABLE `charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_reviews`
--
ALTER TABLE `client_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_pages`
--
ALTER TABLE `home_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_teachers`
--
ALTER TABLE `level_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_days`
--
ALTER TABLE `student_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_discounts`
--
ALTER TABLE `student_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_regs`
--
ALTER TABLE `student_regs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject_fee_logs`
--
ALTER TABLE `subject_fee_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD CONSTRAINT `employee_attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD CONSTRAINT `employee_salary_logs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD CONSTRAINT `student_classes_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `student_days` (`id`),
  ADD CONSTRAINT `student_classes_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `student_groups` (`id`),
  ADD CONSTRAINT `student_classes_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `student_shifts` (`id`),
  ADD CONSTRAINT `student_classes_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `student_subjects` (`id`),
  ADD CONSTRAINT `student_classes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_classes_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `student_years` (`id`);

--
-- Constraints for table `student_regs`
--
ALTER TABLE `student_regs`
  ADD CONSTRAINT `student_regs_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `student_classes` (`id`),
  ADD CONSTRAINT `student_regs_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subject_fee_logs`
--
ALTER TABLE `subject_fee_logs`
  ADD CONSTRAINT `subject_fee_logs_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `student_subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
