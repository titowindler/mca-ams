-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 02:53 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mca_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `academic_year_id` int(11) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `set_academic_year` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`academic_year_id`, `school_year`, `set_academic_year`, `created_at`, `updated_at`) VALUES
(2, '2020-2021', 0, '2020-10-20', '0000-00-00'),
(3, '2021-2022', 1, '2021-04-05', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `a_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `a_last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `a_first_name`, `a_last_name`, `dob`, `gender`, `email`, `contact_no`, `address`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Dandave', 'Doydoy', '1995-04-15', 1, 'dandavedoydoy01@gmail.com', '0924511233', 'Talisay Cebu City', '2019-10-05', '2020-10-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `calculate_grade`
--

CREATE TABLE `calculate_grade` (
  `calculategrade_id` int(11) NOT NULL,
  `calculategrade_class_id` int(11) NOT NULL,
  `calculategrade_student_id` int(11) NOT NULL,
  `calculategrade_subject_id` int(11) NOT NULL,
  `calculategrade_teacher_id` int(11) NOT NULL,
  `calculategrade_academic_year_id` int(11) NOT NULL,
  `calculategrade_ps_id` int(11) NOT NULL,
  `calculategrade_grading_quarter` varchar(50) NOT NULL,
  `calculategrade_ps_percentage_ww` varchar(50) DEFAULT '0',
  `calculategrade_ps_percentage_pt` varchar(50) DEFAULT '0',
  `calculategrade_ps_percentage_qa` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww1` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww2` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww3` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww4` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww5` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww6` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww7` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww8` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww9` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_ww10` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt1` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt2` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt3` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt4` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt5` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt6` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt7` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt8` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt9` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_pt10` varchar(50) DEFAULT '0',
  `calculategrade_ps_hps_qa1` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww1` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww2` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww3` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww4` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww5` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww6` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww7` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww8` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww9` varchar(50) DEFAULT '0',
  `calculategrade_ss_ww10` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt1` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt2` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt3` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt4` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt5` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt6` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt7` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt8` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt9` varchar(50) DEFAULT '0',
  `calculategrade_ss_pt10` varchar(50) DEFAULT '0',
  `calculategrade_ss_qa1` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calculate_grade`
--

INSERT INTO `calculate_grade` (`calculategrade_id`, `calculategrade_class_id`, `calculategrade_student_id`, `calculategrade_subject_id`, `calculategrade_teacher_id`, `calculategrade_academic_year_id`, `calculategrade_ps_id`, `calculategrade_grading_quarter`, `calculategrade_ps_percentage_ww`, `calculategrade_ps_percentage_pt`, `calculategrade_ps_percentage_qa`, `calculategrade_ps_hps_ww1`, `calculategrade_ps_hps_ww2`, `calculategrade_ps_hps_ww3`, `calculategrade_ps_hps_ww4`, `calculategrade_ps_hps_ww5`, `calculategrade_ps_hps_ww6`, `calculategrade_ps_hps_ww7`, `calculategrade_ps_hps_ww8`, `calculategrade_ps_hps_ww9`, `calculategrade_ps_hps_ww10`, `calculategrade_ps_hps_pt1`, `calculategrade_ps_hps_pt2`, `calculategrade_ps_hps_pt3`, `calculategrade_ps_hps_pt4`, `calculategrade_ps_hps_pt5`, `calculategrade_ps_hps_pt6`, `calculategrade_ps_hps_pt7`, `calculategrade_ps_hps_pt8`, `calculategrade_ps_hps_pt9`, `calculategrade_ps_hps_pt10`, `calculategrade_ps_hps_qa1`, `calculategrade_ss_ww1`, `calculategrade_ss_ww2`, `calculategrade_ss_ww3`, `calculategrade_ss_ww4`, `calculategrade_ss_ww5`, `calculategrade_ss_ww6`, `calculategrade_ss_ww7`, `calculategrade_ss_ww8`, `calculategrade_ss_ww9`, `calculategrade_ss_ww10`, `calculategrade_ss_pt1`, `calculategrade_ss_pt2`, `calculategrade_ss_pt3`, `calculategrade_ss_pt4`, `calculategrade_ss_pt5`, `calculategrade_ss_pt6`, `calculategrade_ss_pt7`, `calculategrade_ss_pt8`, `calculategrade_ss_pt9`, `calculategrade_ss_pt10`, `calculategrade_ss_qa1`) VALUES
(30, 1, 2, 1, 1, 3, 8, '1st Quarter', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(31, 1, 3, 1, 1, 3, 8, '1st Quarter', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(32, 1, 4, 1, 1, 3, 8, '1st Quarter', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(33, 1, 2, 1, 1, 3, 8, '2nd Quarter', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(34, 1, 3, 1, 1, 3, 8, '2nd Quarter', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(35, 1, 4, 1, 1, 3, 8, '2nd Quarter', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_gradelevel` varchar(50) NOT NULL,
  `class_section` varchar(50) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `class_adviser` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_gradelevel`, `class_section`, `academic_year`, `class_adviser`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Test', 'Kinder', '250', 3, 1, '2021-06-02', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `class_student_id` int(11) NOT NULL,
  `cstud_classID` int(11) NOT NULL,
  `cstud_studentID` int(11) NOT NULL,
  `cstud_academicyearID` int(11) NOT NULL,
  `student_status` int(11) NOT NULL,
  `student_status_reason` varchar(150) NOT NULL,
  `isLockClassStudent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_student`
--

INSERT INTO `class_student` (`class_student_id`, `cstud_classID`, `cstud_studentID`, `cstud_academicyearID`, `student_status`, `student_status_reason`, `isLockClassStudent`) VALUES
(1, 1, 2, 3, 1, '', 1),
(2, 1, 3, 3, 1, '', 1),
(3, 1, 4, 3, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `class_subject_id` int(11) NOT NULL,
  `csubj_classID` int(11) NOT NULL,
  `csubj_teacherID` int(11) NOT NULL,
  `class_subject_teacherStatus` int(11) NOT NULL,
  `csubj_academicyearID` int(11) NOT NULL,
  `class_subject_day` varchar(50) NOT NULL,
  `csubj_subjectID` int(11) NOT NULL,
  `class_subject_start` time NOT NULL,
  `class_subject_end` time NOT NULL,
  `isLockClassSubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`class_subject_id`, `csubj_classID`, `csubj_teacherID`, `class_subject_teacherStatus`, `csubj_academicyearID`, `class_subject_day`, `csubj_subjectID`, `class_subject_start`, `class_subject_end`, `isLockClassSubject`) VALUES
(1, 1, 1, 0, 3, 'Monday', 1, '07:00:00', '08:00:00', 1),
(2, 1, 1, 0, 3, 'Wednesday', 1, '07:00:00', '08:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_description` varchar(150) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `academic_yearID` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `event_description`, `event_start_date`, `event_end_date`, `academic_yearID`, `created_at`, `updated_at`) VALUES
(2, 'Periodical Exam', 'This is for periodical exam', '2020-10-26', '2020-10-29', 1, '2020-10-16', '2020-10-23'),
(3, 'Monthly Exam', 'Monthly Examination', '2020-11-09', '2020-11-12', 1, '2020-10-23', '0000-00-00'),
(4, 'Card Giving Day', 'Submission of Grades', '2020-12-12', '2020-12-12', 1, '2020-10-23', '0000-00-00'),
(5, 'Final Exam', 'Final Examination', '2020-12-14', '2020-12-16', 1, '2020-10-23', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `notif_adminID` int(11) NOT NULL,
  `notif_teacherID` int(11) NOT NULL,
  `notif_studentID` int(11) NOT NULL,
  `notif_message` varchar(255) NOT NULL,
  `notif_status` int(11) NOT NULL,
  `notif_usertype` int(11) NOT NULL,
  `notif_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_id`, `notif_adminID`, `notif_teacherID`, `notif_studentID`, `notif_message`, `notif_status`, `notif_usertype`, `notif_datetime`) VALUES
(15, 0, 1, 0, 'You have been assigned as the class adviser for the Class Name: Test - 250 Grade Level: Kindergarten A.Y: 2021-2022 ', 1, 3, '2021-06-02 00:27:54'),
(16, 0, 0, 2, 'You have been enrolled in class Test for the A.Y 2021-2022 ', 0, 2, '2021-06-02 00:26:52'),
(17, 0, 0, 3, 'You have been enrolled in class Test for the A.Y 2021-2022 ', 0, 2, '2021-06-02 00:27:03'),
(18, 0, 0, 4, 'You have been enrolled in class Test for the A.Y 2021-2022 ', 0, 2, '2021-06-02 00:27:11'),
(19, 0, 1, 0, 'You have been assigned as the teacher for the subject Test-Kinder- 250 of the A.Y 2021-2022 ', 1, 3, '2021-06-02 00:27:54'),
(20, 0, 1, 0, 'You have been assigned as the teacher for the subject Test-Kinder- 250 of the A.Y 2021-2022 ', 1, 3, '2021-06-02 00:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `percentage_score`
--

CREATE TABLE `percentage_score` (
  `percentagescore_id` int(11) NOT NULL,
  `percentagescore_class_id` int(11) NOT NULL,
  `percentagescore_subject_id` int(11) NOT NULL,
  `percentagescore_teacher_id` int(11) NOT NULL,
  `percentagescore_academic_year_id` int(11) NOT NULL,
  `percentagescore_percentage_ww` varchar(50) DEFAULT NULL,
  `percentagescore_percentage_pt` varchar(50) DEFAULT NULL,
  `percentagescore_percentage_qa` varchar(50) DEFAULT NULL,
  `percentagescore_hps_ww1` varchar(50) NOT NULL,
  `percentagescore_hps_ww2` varchar(50) NOT NULL,
  `percentagescore_hps_ww3` varchar(50) NOT NULL,
  `percentagescore_hps_ww4` varchar(50) NOT NULL,
  `percentagescore_hps_ww5` varchar(50) NOT NULL,
  `percentagescore_hps_ww6` varchar(50) NOT NULL,
  `percentagescore_hps_ww7` varchar(50) NOT NULL,
  `percentagescore_hps_ww8` varchar(50) NOT NULL,
  `percentagescore_hps_ww9` varchar(50) NOT NULL,
  `percentagescore_hps_ww10` varchar(50) NOT NULL,
  `percentagescore_hps_pt1` varchar(50) NOT NULL,
  `percentagescore_hps_pt2` varchar(50) NOT NULL,
  `percentagescore_hps_pt3` varchar(50) NOT NULL,
  `percentagescore_hps_pt4` varchar(50) NOT NULL,
  `percentagescore_hps_pt5` varchar(50) NOT NULL,
  `percentagescore_hps_pt6` varchar(50) NOT NULL,
  `percentagescore_hps_pt7` varchar(50) NOT NULL,
  `percentagescore_hps_pt8` varchar(50) NOT NULL,
  `percentagescore_hps_pt9` varchar(50) NOT NULL,
  `percentagescore_hps_pt10` varchar(50) NOT NULL,
  `percentagescore_hps_qa1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percentage_score`
--

INSERT INTO `percentage_score` (`percentagescore_id`, `percentagescore_class_id`, `percentagescore_subject_id`, `percentagescore_teacher_id`, `percentagescore_academic_year_id`, `percentagescore_percentage_ww`, `percentagescore_percentage_pt`, `percentagescore_percentage_qa`, `percentagescore_hps_ww1`, `percentagescore_hps_ww2`, `percentagescore_hps_ww3`, `percentagescore_hps_ww4`, `percentagescore_hps_ww5`, `percentagescore_hps_ww6`, `percentagescore_hps_ww7`, `percentagescore_hps_ww8`, `percentagescore_hps_ww9`, `percentagescore_hps_ww10`, `percentagescore_hps_pt1`, `percentagescore_hps_pt2`, `percentagescore_hps_pt3`, `percentagescore_hps_pt4`, `percentagescore_hps_pt5`, `percentagescore_hps_pt6`, `percentagescore_hps_pt7`, `percentagescore_hps_pt8`, `percentagescore_hps_pt9`, `percentagescore_hps_pt10`, `percentagescore_hps_qa1`) VALUES
(8, 1, 1, 1, 3, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `s_id_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_middle_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_lrn_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_contact_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_contact_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `s_id_number`, `username`, `password`, `s_first_name`, `s_middle_name`, `s_last_name`, `s_lrn_number`, `dob`, `gender`, `email`, `contact_no`, `address`, `mother_name`, `mother_contact_no`, `father_name`, `father_contact_no`, `created_at`, `updated_at`, `status`) VALUES
(2, 'MCA20200', 'MCA20200', '7acd2d971f899ededbca561d3c235d4c', 'Dallin James', 'Cayawan', 'Canlas', '160743', '2002-01-15', 1, 'djcanlas@gmail.com', '09190950572', '17A Veum Isle Suite 615 Poblacion Escalante 0589', 'Michele Davis Canlas', '09995764744', 'Brycen Prosacco Canlas', '09573380027', '2020-10-13', '2021-05-24', 1),
(3, 'MCA20201', 'MCA20201', '313c143a226f552a2364491fe0fa1241', 'Benny Federico', 'Baal', 'Lavares', '160729', '2003-05-05', 1, 'bennyrico@gmail.com', '09347281734', '5393 Harvey Street Apt 908 Poblacion Cabanatuan 2582 Camarines Sur', 'Rachel Kilback Lavares', '09048337092', 'Jasper Schamberger Lavares', '09179332371', '2020-10-14', '2021-05-24', 1),
(4, 'MCA20202', 'MCA20202', 'eaf055f1817084ce77e59600fc81b5de', 'Alonso', 'Ambulo ', 'Panaligan', '161485', '2002-01-16', 1, 'alonso_panaligan16@gmail.com', '09509628613', '03A Lesch Glens Apt 632 Carmen 4178', 'Ashley Panaligan', '09801942192', 'Hansen Panaligan', '09759693460', '2020-10-14', '2021-05-24', 1),
(5, 'MCA20203', 'MCA20203', 'cee952f844e2e2ef52f72d58de0c6bec', 'Dana', 'Baltar', 'Custodio', '160754', '2004-07-08', 2, 'danabaltarcustodio@gmail.com', '09993484842', '04A Dooley Ramp Poblacion Laoag 8747 Misamis Occidental', 'Alvera Lin Custodio ', '09819165730', 'Chadrick Rath Custodio', '09145074925', '2020-10-14', '2021-05-24', 1),
(6, 'MCA20204', 'MCA20204', '2e8d5c0583654f7d1827c96adbb69e64', 'Carina Carson', 'Junco', 'CaÃ±ada', '161034', '2004-10-07', 2, 'carina_carson@gmail.com', '09011395078', '1404 Wolf Fort Poblacion Cotabato City 2987 Cavite', 'Cora Runte CaÃ±ada', '09833677341', 'Moshe Leffler CaÃ±ada', '09917960920', '2020-10-14', '2021-05-24', 1),
(7, 'MCA20205', 'MCA20205', '98c48b60f1c952ea94a062227fd274f7', 'Skye Maricela', 'Cojuangco', 'Bituin', '160731', '2002-09-17', 2, 'maricelasyke@gmail.com', '09666904538', '0396 Anderson Flats Apt 134 Poblacion Iriga 6975 Guimaras', 'Patricia Soanne Bituin', '09322988120', 'Pierre Borer Bituin', '09568761382', '2020-10-14', '2021-05-24', 1),
(8, 'MCA20206', 'MCA20206', '90ea947e2e63c03607849b0aa92d4ba0', 'Lawson Alfredo', 'Nazar', 'Diaz', '160855', '2000-09-05', 1, 'lawsondiaz@gmail.com', '09465044492', '22A Konopelski Heights Sigma 1495 Dinagat Islands', 'Geraldine Diaz ', '09347281734', 'Nat Wilson Diaz', '09162584552', '2020-10-14', '2021-05-24', 1),
(9, 'MCA20207', 'MCA20207', 'aace4e1ad72272dd0aecc023f90c7a0a', 'Katia Nelia', 'Suaco', 'Roxas', '161484', '2004-11-11', 2, 'katnelia@gmail.com', '09403849048', ' 02A Durgan Field Poblacion Ligao 7706 Guimaras', 'Leah Angelica Roxas', '09750191058', 'Richmond Adams Roxas', '09497627381', '2020-10-15', '2021-05-24', 1),
(10, 'MCA20208', 'MCA20208', '3cca37ac8568084a9a173f0d0764d323', 'Tristen Mio', 'Hadjirul', 'Luz', '160854', '2005-06-30', 1, 'tristen_luz@gmail.com', '09609233487', '86A13 Rowe Motorway Suite 691 Poblacion Imus 3074 Quirino', 'Beatrice Luz', '09584307646', 'Franco Bruen Luz', '09623129451', '2020-10-15', '2021-05-24', 1),
(11, 'MCA20209', 'MCA20209', '3936be2d85c67298041bf119057eba43', 'Alize Luz', 'Linganyan', 'Canencia', '161303', '2006-07-05', 2, 'itsmealize@gmail.com', '09573586107', '60A65 Bergstrom Springs Suite 578 General Santos City 0668 Cagayan', 'Marlene Nisha Canencia', '09001529902', 'Quincy Barrows Canencia', '09662760601', '2020-10-15', '2021-05-24', 1),
(14, 'MCA202110', 'MCA202110', 'f93324be08a34c421986662a3aaeba11', 'Bobby Leroy', 'Caldero', 'Borres', '752156', '2002-12-13', 1, 'bobbybor@gmail.com', '09325557358', '9886 Holly Stravenue Lanao del Sur', 'Consolacion Hermano Borres', '09195556607', 'Sebastiano Cedro Borres', '09195555103', '2021-04-20', '2021-05-24', 1),
(15, 'MCA202111', 'MCA202111', '3b51daeeaf1a9faf6d376dd8b22d55c7', 'Allan Maurice', 'Junco', 'Etrone', '712356', '2001-07-11', 1, 'allanmie@gmail.com', '09285551770', '65160 Morris River South Cotabato', 'Barbara Moreno Etrone', '09235551021', 'Salomon Jeremiah Etrone', '09285552789', '2021-04-20', '2021-05-24', 1),
(17, 'MCA202112', 'MCA202112', '5b6fe177e9a1caacca56620de696ede8', 'Chad', 'asda', 'Gothong', '123245', '2003-01-09', 1, 'benedict_gothong@yahoo.com', '39328734193', 'asdasdasdasda', 'asdasd', '1231', 'asd', '123123', '2021-05-09', '2021-05-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_ay`
--

CREATE TABLE `student_ay` (
  `s_school_yearID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `s_grade_level` varchar(50) NOT NULL,
  `student_type` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `student_ay_status` int(11) NOT NULL,
  `isLockStudentAy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_ay`
--

INSERT INTO `student_ay` (`s_school_yearID`, `studentID`, `s_grade_level`, `student_type`, `created_at`, `updated_at`, `student_ay_status`, `isLockStudentAy`) VALUES
(3, 2, 'Kinder', 'New', '2021-06-02', '0000-00-00', 0, 1),
(3, 3, 'Kinder', 'New', '2021-06-02', '0000-00-00', 0, 1),
(3, 4, 'Kinder', 'New', '2021-06-02', '0000-00-00', 0, 1),
(3, 5, 'Kinder', 'New', '2021-06-02', '0000-00-00', 0, 1),
(3, 6, 'Kinder', 'New', '2021-06-02', '0000-00-00', 0, 1),
(3, 7, 'Kinder', 'New', '2021-06-02', '0000-00-00', 0, 1),
(3, 8, 'Kinder', 'New', '2021-06-02', '0000-00-00', 0, 1),
(3, 9, 'Kinder', 'New', '2021-06-02', '0000-00-00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_core_value`
--

CREATE TABLE `student_core_value` (
  `studentcorevalue_id` int(11) NOT NULL,
  `studentcorevalue_classid` int(11) NOT NULL,
  `studentcorevalue_studentid` int(11) NOT NULL,
  `studentcorevalue_corevalueid` int(11) NOT NULL,
  `studentcorevalue_academicyear` varchar(50) NOT NULL,
  `studentcorevalue_quarter` varchar(50) NOT NULL,
  `studentcorevalue_marking` varchar(50) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE `student_grade` (
  `studentgrade_id` int(11) NOT NULL,
  `studentgrade_classid` int(11) NOT NULL,
  `studentgrade_studentid` int(11) NOT NULL,
  `studentgrade_subjectid` int(11) NOT NULL,
  `studentgrade_academicyear` int(11) NOT NULL,
  `studentgrade_q1` varchar(50) DEFAULT NULL,
  `studentgrade_q2` varchar(50) DEFAULT NULL,
  `studentgrade_q3` varchar(50) DEFAULT NULL,
  `studentgrade_q4` varchar(50) DEFAULT NULL,
  `studentgrade_finalrating` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_grade`
--

INSERT INTO `student_grade` (`studentgrade_id`, `studentgrade_classid`, `studentgrade_studentid`, `studentgrade_subjectid`, `studentgrade_academicyear`, `studentgrade_q1`, `studentgrade_q2`, `studentgrade_q3`, `studentgrade_q4`, `studentgrade_finalrating`) VALUES
(1, 1, 2, 1, 3, NULL, NULL, NULL, NULL, ''),
(2, 1, 3, 1, 3, NULL, NULL, NULL, NULL, ''),
(3, 1, 4, 1, 3, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject_description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `subject_description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'BIBLE', 'Bible', 'Add Subject Description', '2020-10-15', '2020-10-15', 1),
(2, 'ENG-1', 'English 1', 'Basic Understanding of English Language', '2020-10-15', '0000-00-00', 1),
(3, 'READ-1', 'Reading 1', 'Reading Comprehension', '2020-10-15', '0000-00-00', 1),
(4, 'MATH-1', 'Math 1', 'Introduction To Basic Algebra', '2020-10-15', '0000-00-00', 1),
(5, 'SCIENCE-1', 'Science 1', 'Elementary Sciences', '2020-10-15', '0000-00-00', 1),
(6, 'AP-1', 'Aralin Panglipunan 1', 'Aralin Panglipunan', '2020-10-15', '0000-00-00', 1),
(7, 'HELE-1', 'HELE 1', 'Home Economics And Livelihood Education', '2020-10-15', '0000-00-00', 1),
(8, 'FIL-1', 'Filipino 1', 'Wika Filipino', '2020-10-15', '0000-00-00', 1),
(9, 'COMPUTER-1', 'Computer 1', 'Introduction to Web Designing', '2020-10-15', '0000-00-00', 1),
(10, 'PE-1', 'Physical Education 1', 'Physical Education', '2020-10-15', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `t_id_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_middle_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `t_last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `t_id_number`, `username`, `password`, `t_first_name`, `t_middle_name`, `t_last_name`, `dob`, `gender`, `email`, `contact_no`, `address`, `created_at`, `updated_at`, `status`) VALUES
(1, 'MCAT20200', 'MCAT20200', '1ca342e2b1c0bd44ea9f9b8ba9430737', 'Jackeline Jordana', 'Batac', 'Lansangan', '1990-10-16', 2, 'jackelinejordana@gmail.com', '09753103028', '79 Russel Path Apt 391 Poblacion Cabanatuan 9108 Maguindanao', '2020-10-15', '0000-00-00', 1),
(2, 'MCAT20201', 'MCAT20201', '509757db4575b516c97eec18d3198b8b', 'Eliza Hannah ', 'Dioquino', 'Barcelona', '1994-05-10', 2, 'barcelona_eliza@gmail.com', '09327841882', '61A Conroy Vista Apt 688 Basay 6712 Basilan', '2020-10-15', '0000-00-00', 1),
(3, 'MCAT20202', 'MCAT20202', 'cd8e8ecf5a50b2c73653074707c94468', 'Eva Estefani', 'Burton', 'Macatangay', '1993-05-07', 2, 'eva.estefani@gmail.com', '09237872393', '45 Leffler Estate Suite 577 Linapacan 2049 Leyte', '2020-10-15', '0000-00-00', 1),
(4, 'MCAT20203', 'MCAT20203', '63c264cdf4f0c1313e64cd19abb04592', 'Maggie Coraly', 'Malambut', 'Bayona', '1992-09-14', 2, 'maggie_bayona@gmail.com', '09136287896', '21A68 Cartwright Overpass Lemery 9480 Sorsogon', '2020-10-15', '0000-00-00', 1),
(5, 'MCAT20204', 'MCAT20204', '8d09882c3a35d2dfb214a7161195fcef', 'Joey Norman', 'Nato', 'Roxas', '1993-06-09', 1, 'joeyroxas@gmail.com', '09045774611', '4463 Prohaska Roads Suite 156 Poblacion Antipolo 0145 Negros Occidental', '2020-10-15', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_ay`
--

CREATE TABLE `teacher_ay` (
  `t_school_yearID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `t_grade_level` varchar(50) NOT NULL,
  `teacher_type` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `teacher_ay_status` int(11) NOT NULL,
  `isLockTeacherAy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_ay`
--

INSERT INTO `teacher_ay` (`t_school_yearID`, `teacherID`, `t_grade_level`, `teacher_type`, `created_at`, `updated_at`, `teacher_ay_status`, `isLockTeacherAy`) VALUES
(3, 1, ' ', 'New', '2021-06-02', '0000-00-00', 1, 1),
(3, 2, ' ', 'New', '2021-06-02', '0000-00-00', 1, 1),
(3, 3, ' ', 'New', '2021-06-02', '0000-00-00', 1, 1),
(3, 4, ' ', 'New', '2021-06-02', '0000-00-00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`academic_year_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `calculate_grade`
--
ALTER TABLE `calculate_grade`
  ADD PRIMARY KEY (`calculategrade_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`class_student_id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`class_subject_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `percentage_score`
--
ALTER TABLE `percentage_score`
  ADD PRIMARY KEY (`percentagescore_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_ay`
--
ALTER TABLE `student_ay`
  ADD KEY `school_yearID` (`s_school_yearID`),
  ADD KEY `student_ay_ibfk_1` (`studentID`);

--
-- Indexes for table `student_core_value`
--
ALTER TABLE `student_core_value`
  ADD PRIMARY KEY (`studentcorevalue_id`);

--
-- Indexes for table `student_grade`
--
ALTER TABLE `student_grade`
  ADD PRIMARY KEY (`studentgrade_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_ay`
--
ALTER TABLE `teacher_ay`
  ADD KEY `teacherID` (`teacherID`),
  ADD KEY `teacher_ay_ibfk_1` (`t_school_yearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `academic_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calculate_grade`
--
ALTER TABLE `calculate_grade`
  MODIFY `calculategrade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `class_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `percentage_score`
--
ALTER TABLE `percentage_score`
  MODIFY `percentagescore_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_core_value`
--
ALTER TABLE `student_core_value`
  MODIFY `studentcorevalue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_grade`
--
ALTER TABLE `student_grade`
  MODIFY `studentgrade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
