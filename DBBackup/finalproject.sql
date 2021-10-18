-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 10:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `choose_lesson`
--

CREATE TABLE `choose_lesson` (
  `id` int(10) UNSIGNED NOT NULL,
  `stuednt_id` int(10) UNSIGNED NOT NULL,
  `presentation_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_code` char(50) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `class_code`, `created_at`, `updated_at`) VALUES
(1, '1001', NULL, NULL),
(2, '1002', NULL, NULL),
(3, '1003', NULL, NULL),
(4, '1004', NULL, NULL),
(5, '1005', NULL, NULL),
(6, '1101', NULL, NULL),
(7, '1102', NULL, NULL),
(8, '1103', NULL, NULL),
(9, '1104', NULL, NULL),
(10, '1105', NULL, NULL),
(11, '1201', NULL, NULL),
(12, '1202', NULL, NULL),
(13, '1203', NULL, NULL),
(14, '1204', NULL, NULL),
(15, '1205', NULL, NULL),
(16, '1301', NULL, NULL),
(17, '1302', NULL, NULL),
(18, '1303', NULL, NULL),
(19, '1304', NULL, NULL),
(20, '1305', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educational_group`
--

CREATE TABLE `educational_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `educational_group`
--

INSERT INTO `educational_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الکترونیک', NULL, NULL),
(2, 'کامپیوتر سخت افزار', NULL, NULL),
(3, 'مهندسی فناوری اطلاعات (IT)', NULL, NULL),
(4, 'مدیریت صنعتی', NULL, NULL),
(5, 'کامپیوتر نرم افزار', NULL, NULL),
(6, 'مهندسی ارتباطات و فناوری اطلاعات (ICT)', NULL, NULL),
(7, 'مهندسی تکنولوژی مخابرات-انتقال', NULL, NULL),
(8, 'حسابداری بازرگانی-حسابداری', NULL, NULL),
(9, 'مهندسی پزشکی-بیوالکتریک', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `codeStandard` char(50) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

CREATE TABLE `employment_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `employment_type`
--

INSERT INTO `employment_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'پیمانی', NULL, NULL),
(2, 'رسمی', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `garde`
--

CREATE TABLE `garde` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade_value` smallint(5) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `chooseLesson_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoze_doroos`
--

CREATE TABLE `hoze_doroos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `hoze_doroos`
--

INSERT INTO `hoze_doroos` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'دروس مربوط به گروه های آموزشی شش گانه', NULL, NULL),
(2, 'دروس علوم پایه', NULL, NULL),
(3, 'دروس عمومی', NULL, NULL),
(4, 'دروس معارف', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_course`
--

CREATE TABLE `lesson_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `code` char(50) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `type` char(50) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `saat_amali` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `saat_teori` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `pishniaz` varchar(100) COLLATE utf8_persian_ci DEFAULT '',
  `code_pishniaz` char(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `vahed_amali` smallint(5) NOT NULL,
  `vahed_teori` smallint(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `madrak`
--

CREATE TABLE `madrak` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `madrak`
--

INSERT INTO `madrak` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'دیپلم', NULL, NULL),
(2, 'فوق دیپلم', NULL, NULL),
(3, 'لیسانس', NULL, NULL),
(4, 'فوق لیسانس', NULL, NULL),
(5, 'دکتری', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maghtae`
--

CREATE TABLE `maghtae` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `maghtae`
--

INSERT INTO `maghtae` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'کاردانی پیوسته', NULL, NULL),
(2, 'کاردانی ناپیوسته', NULL, NULL),
(3, 'کارشناسی پیوسته', NULL, NULL),
(4, 'کارشناسی ناپیوسته', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `martabe_elmi`
--

CREATE TABLE `martabe_elmi` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `martabe_elmi`
--

INSERT INTO `martabe_elmi` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'استادیار', NULL, NULL),
(2, 'مربی', NULL, NULL),
(3, 'دانشیار', NULL, NULL),
(4, 'استاد', NULL, NULL),
(5, 'مربی آموزشیار', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(70) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `description` varchar(250) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `employee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nobate_paziresh`
--

CREATE TABLE `nobate_paziresh` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `nobate_paziresh`
--

INSERT INTO `nobate_paziresh` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'روزانه', NULL, NULL),
(2, 'شبانه', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `id` int(10) UNSIGNED NOT NULL,
  `lessonCourse_id` int(10) UNSIGNED NOT NULL,
  `educationalGroup_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `capacity` smallint(5) UNSIGNED NOT NULL,
  `classRoom_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `class_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `presentation_code` char(50) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reshte_tahsili`
--

CREATE TABLE `reshte_tahsili` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `codeDaneshjo` char(50) COLLATE utf8_persian_ci NOT NULL,
  `maghtae_id` int(10) UNSIGNED NOT NULL,
  `reshteTahsili_id` int(10) UNSIGNED NOT NULL,
  `termVorod_id` int(10) UNSIGNED NOT NULL,
  `nobatePaziresh_id` int(10) UNSIGNED NOT NULL,
  `vazeiateNezamVazife_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `codeModares` char(50) COLLATE utf8_persian_ci NOT NULL,
  `userType_id` int(10) UNSIGNED NOT NULL,
  `martabeElmi_id` int(11) UNSIGNED NOT NULL,
  `employmentType_id` int(10) UNSIGNED NOT NULL,
  `teachingType_id` int(11) UNSIGNED NOT NULL,
  `madrak_id` int(10) UNSIGNED NOT NULL,
  `educationalGroup_id` int(10) UNSIGNED NOT NULL,
  `hozeDoroos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teaching_type`
--

CREATE TABLE `teaching_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `teaching_type`
--

INSERT INTO `teaching_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'کادر آموزشی موظف', NULL, NULL),
(2, 'حق التدریس رسمی مرکز', NULL, NULL),
(3, 'حق التدریس سایر رسمی مراکز', NULL, NULL),
(4, 'حق التدریس آزاد', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term_vorod`
--

CREATE TABLE `term_vorod` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` char(50) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `term_vorod`
--

INSERT INTO `term_vorod` (`id`, `number`, `created_at`, `updated_at`) VALUES
(1, '961', NULL, NULL),
(2, '962', NULL, NULL),
(3, '971', NULL, NULL),
(4, '972', NULL, NULL),
(5, '981', NULL, NULL),
(6, '982', NULL, NULL),
(7, '991', NULL, NULL),
(8, '992', NULL, NULL),
(9, '4001', NULL, NULL),
(10, '4002', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'teacher', NULL, NULL),
(2, 'employee', NULL, NULL),
(3, 'student', NULL, NULL),
(4, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `tell` char(20) COLLATE utf8_persian_ci NOT NULL,
  `m_code` char(30) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `serial_number` char(20) COLLATE utf8_persian_ci NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jender` bit(1) NOT NULL,
  `father_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `birthday_place` varchar(70) COLLATE utf8_persian_ci NOT NULL,
  `mazhab` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `university` varchar(70) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `tell`, `m_code`, `address`, `serial_number`, `birthday`, `jender`, `father_name`, `birthday_place`, `mazhab`, `university`, `created_at`, `updated_at`) VALUES
(1, 'ali', 'alavi', 'alavi@info.com', '09368132334', '0925345678', 'alahiye 3', '98233', '2021-10-18 18:17:34', b'1', 'mehdi', 'mashhad', 'shiyee', 'montazeri', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_id`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vazeiate_nezam_vazife`
--

CREATE TABLE `vazeiate_nezam_vazife` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `vazeiate_nezam_vazife`
--

INSERT INTO `vazeiate_nezam_vazife` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'معاف دائم', NULL, NULL),
(2, 'پایان خدمت', NULL, NULL),
(3, 'معاف پزشکی', NULL, NULL),
(4, 'معاف تکفل', NULL, NULL),
(5, 'درحین خدمت', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choose_lesson`
--
ALTER TABLE `choose_lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_code` (`class_code`);

--
-- Indexes for table `educational_group`
--
ALTER TABLE `educational_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_type`
--
ALTER TABLE `employment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garde`
--
ALTER TABLE `garde`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoze_doroos`
--
ALTER TABLE `hoze_doroos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_course`
--
ALTER TABLE `lesson_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `madrak`
--
ALTER TABLE `madrak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maghtae`
--
ALTER TABLE `maghtae`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `martabe_elmi`
--
ALTER TABLE `martabe_elmi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nobate_paziresh`
--
ALTER TABLE `nobate_paziresh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classCode_id` (`classRoom_id`);

--
-- Indexes for table `reshte_tahsili`
--
ALTER TABLE `reshte_tahsili`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maghtae_id` (`maghtae_id`),
  ADD KEY `reshteTahsili_id` (`reshteTahsili_id`),
  ADD KEY `termVorod_id` (`termVorod_id`),
  ADD KEY `nobatePaziresh_id` (`nobatePaziresh_id`),
  ADD KEY `vazeiateNezamVazife_id` (`vazeiateNezamVazife_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `martabeElmi_id` (`martabeElmi_id`),
  ADD KEY `userType_id` (`userType_id`),
  ADD KEY `employmentType_id` (`employmentType_id`),
  ADD KEY `teachingType_id` (`teachingType_id`),
  ADD KEY `madrak_id` (`madrak_id`),
  ADD KEY `educationalGroup_id` (`educationalGroup_id`),
  ADD KEY `hozeDoroos_id` (`hozeDoroos_id`);

--
-- Indexes for table `teaching_type`
--
ALTER TABLE `teaching_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_vorod`
--
ALTER TABLE `term_vorod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `vazeiate_nezam_vazife`
--
ALTER TABLE `vazeiate_nezam_vazife`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choose_lesson`
--
ALTER TABLE `choose_lesson`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `educational_group`
--
ALTER TABLE `educational_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_type`
--
ALTER TABLE `employment_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `garde`
--
ALTER TABLE `garde`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoze_doroos`
--
ALTER TABLE `hoze_doroos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lesson_course`
--
ALTER TABLE `lesson_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `madrak`
--
ALTER TABLE `madrak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maghtae`
--
ALTER TABLE `maghtae`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `martabe_elmi`
--
ALTER TABLE `martabe_elmi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nobate_paziresh`
--
ALTER TABLE `nobate_paziresh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reshte_tahsili`
--
ALTER TABLE `reshte_tahsili`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teaching_type`
--
ALTER TABLE `teaching_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `term_vorod`
--
ALTER TABLE `term_vorod`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vazeiate_nezam_vazife`
--
ALTER TABLE `vazeiate_nezam_vazife`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `presentation`
--
ALTER TABLE `presentation`
  ADD CONSTRAINT `FK_presentation_classroom` FOREIGN KEY (`classRoom_id`) REFERENCES `classroom` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_student_maghtae` FOREIGN KEY (`maghtae_id`) REFERENCES `maghtae` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_student_nobate_paziresh` FOREIGN KEY (`nobatePaziresh_id`) REFERENCES `nobate_paziresh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_student_reshte_tahsili` FOREIGN KEY (`reshteTahsili_id`) REFERENCES `reshte_tahsili` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_student_term_vorod` FOREIGN KEY (`termVorod_id`) REFERENCES `term_vorod` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_student_vazeiate_nezam_vazife` FOREIGN KEY (`vazeiateNezamVazife_id`) REFERENCES `vazeiate_nezam_vazife` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `FK_teacher_educational_group` FOREIGN KEY (`educationalGroup_id`) REFERENCES `educational_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_teacher_employment_type` FOREIGN KEY (`employmentType_id`) REFERENCES `employment_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_teacher_hoze_doroos` FOREIGN KEY (`hozeDoroos_id`) REFERENCES `hoze_doroos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_teacher_madrak` FOREIGN KEY (`madrak_id`) REFERENCES `madrak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_teacher_martabe_elmi` FOREIGN KEY (`martabeElmi_id`) REFERENCES `martabe_elmi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_teacher_teaching_type` FOREIGN KEY (`teachingType_id`) REFERENCES `teaching_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_teacher_user_type` FOREIGN KEY (`userType_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_type`
--
ALTER TABLE `user_type`
  ADD CONSTRAINT `FK__type` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
