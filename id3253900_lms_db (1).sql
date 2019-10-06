-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2018 at 08:15 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3253900_lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_course`
--

CREATE TABLE `add_course` (
  `addcourse_id` int(15) NOT NULL,
  `addcourse_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_credits` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_abbr` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_startdate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_enddate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_semester` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_coursetype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_specialization` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Core Course',
  `addcourse_scheduledate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_faculty` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addcourse_outcomes` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_course`
--

INSERT INTO `add_course` (`addcourse_id`, `addcourse_name`, `addcourse_code`, `addcourse_credits`, `addcourse_abbr`, `addcourse_startdate`, `addcourse_enddate`, `addcourse_semester`, `addcourse_coursetype`, `addcourse_specialization`, `addcourse_scheduledate`, `addcourse_time`, `addcourse_faculty`, `addcourse_description`, `addcourse_outcomes`) VALUES
(1, 'Project Management', 'OP6301', '3', 'PM', '31-10-2017', '30-11-2017', '2', 'Core', 'Operations', '26-10-2017', '10', 'Jasmine', 'sample', 'sample'),
(2, 'Customer Relationship Management', 'MK6201', '2', 'CRM', '31-10-2017', '30-11-2017', '3', 'Elective', 'Marketing', '26-10-2017', '15:00 pm', 'pranav', 'test', 'test'),
(7, 'Securities Analysis & Portfolio Management', 'FN6209', '2', 'SAPM', '25-10-2017', '31-10-2017', '4', 'Core', 'Finance', '31-10-2017', '8:0', 'raja', 'resource', 'resource'),
(8, 'ERP Management', 'IS6301', '3', 'ERP', '31-10-2017', '31-10-2017', '2', 'Core', 'Information Systems', '31-10-2017', '15:00 pm', 'Raja', 'resource', 'resource'),
(11, 'Performance and Compensation Management', 'HR6203', '2', 'PCM', '31-10-2017', '31-10-2017', '3', 'Core', 'Human Resource', '31-10-2017', '5', 'Jasmine', 'Improve Teaching?', 'Improve Teaching?'),
(13, 'Creativity and Innovation', 'ET6206', '2', 'CI', '31-10-2017', '31-10-2017', '2', 'Elective', 'ENTREPRENEURSHIP AND INNOVATION', '31-10-2017', '10', 'RS', 'Improve Teaching?', 'Improve Teaching?'),
(14, 'Managing Startups', 'ET6301', '3', 'MS', '31-10-2017', '31-10-2017', '3', 'Elective', 'ENTREPRENEURSHIP AND INNOVATION', '31-10-2017', '9:00', 'RS', 'Improve Teaching?', 'Improve Teaching?'),
(18, 'Business Economic', 'SM5301', '3', 'BE', '30-11-2017', '31-12-2017', '2', 'Core', 'Core Courses', '16-11-2017', '18:30', 'AK', 'classeses', 'classes'),
(28, 'aass', 'aaa', '3', 'aaaa', '30-11-2017', '30-11-2017', '4', 'Elective', 'Finance', '30-11-2017', '16:5', 'AB', 'fgcg\n', 'ghcnv');

-- --------------------------------------------------------

--
-- Table structure for table `attendace_details`
--

CREATE TABLE `attendace_details` (
  `attendance_id` int(200) NOT NULL,
  `student_rollnno` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `course_details_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_employeeid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `attendance_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `attendance_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `attendance_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendace_details`
--

INSERT INTO `attendace_details` (`attendance_id`, `student_rollnno`, `course_details_name`, `faculty_employeeid`, `attendance_date`, `attendance_time`, `attendance_status`) VALUES
(39, '401307003', 'Customer Relationship Management', '321321', '2017-11-17', '05-40-23', 'Absent'),
(63, '401307027,121', 'Project Management', '9999', '18-11-17', '8:51 am', 'Absent'),
(64, '401307028', 'Project Management', '9999', '19-11-17', '9:51 am', 'Absent'),
(65, '401307027', 'Project Management', '9999', '19-11-17', '9:37 am', 'Absent'),
(66, '121', 'Project Management', '9999', '19-11-17', '9:44 am', 'Absent'),
(67, '0', 'Performance and Compensation Management', '9999', '19-11-17', '9:45 am', 'Absent'),
(68, '401307027', 'Project Management', '9999', '19-11-17', '10:13 am', 'Absent'),
(99, '121', 'Project Management', '9999', '11-20-2017', '10:27 am', 'Present'),
(100, '401307027', 'Project Management', '9999', '11-20-2017', '10:27 am', 'Absent'),
(101, '102', 'Performance and Compensation Management', '9999', '11-20-2017', '10:44 am', 'Present'),
(102, '0', 'Performance and Compensation Management', '9999', '11-20-2017', '10:44 am', 'Absent'),
(103, '401307003', 'Customer Relationship Management', '9999', '11-20-2017', '10:45 am', 'Present'),
(104, '0', 'Customer Relationship Management', '9999', '11-20-2017', '10:45 am', 'Absent'),
(107, '106,401307027,121', 'ERP management', '8888', '11-20-2017', '10:53 am', 'Present'),
(108, '0', 'ERP management', '8888', '11-20-2017', '10:53 am', 'Absent'),
(113, '121', 'Project Management', '9999', '12-19-2017', '11:55 pm', 'Present'),
(114, '401307027', 'Project Management', '9999', '12-19-2017', '11:55 pm', 'Absent'),
(115, '401307027', 'Project Management', '9999', '12-20-2017', '10:28 am', 'Present'),
(116, '121', 'Project Management', '9999', '12-20-2017', '10:28 am', 'Absent'),
(117, '501604003', 'Wealth Management and Personal Financial Planning', '9999', '12-20-2017', '3:17 pm', 'Present'),
(118, '501604001,501604002', 'Wealth Management and Personal Financial Planning', '9999', '12-20-2017', '3:18 pm', 'Absent'),
(119, '121', 'Project Management', '9999', '12-20-2017', '4:50 pm', 'Present'),
(120, '401307027', 'Project Management', '9999', '12-20-2017', '4:50 pm', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_details`
--

CREATE TABLE `calendar_details` (
  `calendar_id` int(255) NOT NULL,
  `accademic_calendar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_semester_sesion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_semester_sesion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_classes_semester3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sprig_classes_semester24` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_classes_semester2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_classes_semester1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_teaching_semester3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_teaching_semester24` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_teaching_semester1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_midend_semester13` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_midend_semester24` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_teaching_semestersecond` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_teaching_semestersecond` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_break_semester13` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_break_semester24` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_teaching_semesterthird` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_weekend_days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fallend_break_semester13` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_closing_days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_weekend_days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `internship_days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_closing_days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `backlog_dates` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fall_winter_break` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spring_summer_break` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calendar_details`
--

INSERT INTO `calendar_details` (`calendar_id`, `accademic_calendar`, `fall_year`, `fall_semester_sesion`, `spring_year`, `spring_semester_sesion`, `fall_classes_semester3`, `sprig_classes_semester24`, `fall_classes_semester2`, `fall_classes_semester1`, `fall_teaching_semester3`, `spring_teaching_semester24`, `fall_teaching_semester1`, `fall_midend_semester13`, `spring_midend_semester24`, `fall_teaching_semestersecond`, `spring_teaching_semestersecond`, `fall_break_semester13`, `spring_break_semester24`, `fall_teaching_semesterthird`, `spring_weekend_days`, `fallend_break_semester13`, `spring_closing_days`, `fall_weekend_days`, `internship_days`, `fall_closing_days`, `backlog_dates`, `fall_winter_break`, `spring_summer_break`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(13, '2017-18*', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24,Monday, September 18–Sunday, September 24,Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24', 'Monday, September 18–Sunday, September 24'),
(14, 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18'),
(16, '2017-18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Monday & Tuesday, August 14-15; Saturday, September 30; Monday, October 02;\nThursday, October 05; Monday-Friday, October 16-20; Saturday, November 04;\nThursday &amp; Friday, November 23-24', 'Saturday, December 09 – Monday, December 18', 'Monday & Tuesday, August 14-15; Saturday, September 30; Monday, October 02;\nThursday, October 05; Monday-Friday, October 16-20; Saturday, November 04;\nThursday &amp; Friday, November 23-24', 'Monday & Tuesday, August 14-15; Saturday, September 30; Monday, October 02;\nThursday, October 05; Monday-Friday, October 16-20; Saturday, November 04;\nThursday &amp; Friday, November 23-24', 'Saturday, December 09 – Monday, December 18', 'Monday Tuesday, August 14-15; Saturday, September 30; Monday, October 02;\nThursday, October 05; Monday-Friday, October 16-20; Saturday, November 04;\nThursday &amp; Friday, November 23-24', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18', 'Saturday, December 09 – Monday, December 18');

-- --------------------------------------------------------

--
-- Table structure for table `course_count`
--

CREATE TABLE `course_count` (
  `coursecount_id` int(11) NOT NULL,
  `coursecount_name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `coursecount_count` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_count`
--

INSERT INTO `course_count` (`coursecount_id`, `coursecount_name`, `coursecount_count`) VALUES
(1, 'Creativity and Innovation', '2'),
(2, 'Managing Startups', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `course_details_id` int(255) NOT NULL,
  `course_details_code` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `course_details_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `course_details_specialization` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `course_details_credits` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_details_category` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `course_details_faculty` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `course_details_abbr` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_details_id`, `course_details_code`, `course_details_name`, `course_details_specialization`, `course_details_credits`, `course_details_category`, `course_details_faculty`, `course_details_abbr`) VALUES
(10, 'OP6301', 'Project Management', 'Operations', '3', 'Elective', 'JA', 'PM'),
(11, 'HR6203', 'Performance and Compensation Management', 'Human Resources', '2', 'Elective', 'JA', 'PCM'),
(14, 'MK6201', 'Customer Relationship Management', 'Marketing', '2', 'Elective', 'JA', 'CRM'),
(15, 'ET6206', 'Creativity and Innovation', 'Entrepreneurship and Innovation', '2', 'Elective', 'AG', 'CI'),
(18, 'ES6201', 'Sustainable Development', 'Energy and Sustainability', '2', 'Elective', 'RR', 'SD'),
(22, 'IM6205', 'Managing International Firms', 'International Management and Strategy', '2', 'Elective', 'Dr. A.Gaur', 'MIF'),
(25, 'ET6302', 'Practicing Venture Creation', 'Entrepreneurship and Innovation', '3', 'Elective', 'KG', 'PVC'),
(26, 'FN6205', 'Wealth Management and Personal Financial Planning', 'Finance', '2', 'Elective', 'PKG', 'WMPFP'),
(27, 'AC5301', 'Financial Reporting and Analysis', '', '3', 'Core', 'PKG', 'FRA'),
(28, 'OP6203', 'Supply Chain Management', 'Operations', '2', 'Elective', 'GG', 'SCM'),
(29, 'FN6103', 'Investment Banking', 'Finance', '1', 'Elective', 'SD', 'IB');

-- --------------------------------------------------------

--
-- Table structure for table `course_schedule`
--

CREATE TABLE `course_schedule` (
  `course_schedule_id` int(11) NOT NULL,
  `course_schedule_day` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_date` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_program` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_starttime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_endtime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_course` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_faculty` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_issue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_schedule`
--

INSERT INTO `course_schedule` (`course_schedule_id`, `course_schedule_day`, `course_schedule_date`, `course_schedule_program`, `course_schedule_starttime`, `course_schedule_endtime`, `course_schedule_course`, `course_schedule_faculty`, `course_schedule_issue`) VALUES
(1, 'Monday ', '07-08-17', 'ELECTIVE 1-(F3)', '9:30', '10:45', 'SCM', 'GG', 1),
(10, 'Monday ', '07-08-17', 'ELECTIVE 1-(F3)', '11:00', '12:15', 'SCM', 'GG', 1),
(11, 'Monday ', '07-08-17', 'ELECTIVE 1-(F3)', '12:30', '13:45', 'IM', 'GJ', 1),
(12, 'Monday', '07-08-17', 'ELECTIVE 1-(F3)', '13:45', '14:30', 'Lunch Break', 'Lunch Break', 1),
(13, 'Tuesday', '07-08-17', 'ELECTIVE 1-(F3)', '14:30', '15:45', 'IM', 'GJ', 3),
(14, 'Wednesday', '07-08-17', 'ELECTIVE 1-(F3)', '15:45', '18:15', 'TQM', 'GKN', 2),
(17, 'Monday', '07-08-17', 'ELECTIVE 2-(F2)', '9:30', '10:45', 'EMCC', 'RR', 1),
(18, 'Monday', '07-08-17', 'ELECTIVE 2-(F2)', '10:45', '12:00', 'TQM', 'VG', 1),
(19, 'Tuesday ', '08-08-17', 'ELECTIVE 1-(F3)', '9:30', '10:45', 'BFS', 'IK', 1),
(20, 'Tuesday ', '08-08-17', 'ELECTIVE 1-(F3)', '11:00', '12:15', 'IM', 'GJ', 1),
(21, 'Tuesday ', '08-08-17', 'ELECTIVE 2-(F2)', '9:30', '10:45', 'CI', 'KG', 1),
(22, 'Wednesday ', '09-08-17', 'ELECTIVE 1-(F3)', '9:30', '10:45', 'BFS', 'IK', 1),
(23, 'Wednesday ', '09-08-17', 'ELECTIVE 2-(F2)', '9:30', '10:45', 'CI', 'KG', 1),
(24, 'Wednesday ', '09-08-17', 'OPEN ELECTIVE', '16:30', '17:45', 'CIMH', 'KG -- LIBRARY', 1),
(25, 'Thursday ', '10-08-17', 'ELECTIVE 4', '11:00', '13:00', 'SL', 'Jasvir kaur ----Meeting Room', 1),
(26, 'Monday ', '20-11-2017', 'ELECTIVE 2-(F3)', '9:30', '10:45', 'PM', 'JA', 3),
(27, 'Monday ', '21-11-2017', 'ELECTIVE 2-(F3)', '9:30', '10:45', 'PM', 'JA', 3),
(28, 'Monday ', '20-11-2017', 'ELECTIVE 2-(F1)', '11:30', '13:00', 'CRM', 'JA', 3),
(29, 'Monday ', '22-11-2017', 'ELECTIVE 3-(F1)', '11:30', '13:00', 'ERP', 'AB', 3),
(30, 'Monday ', '6-11-2017', 'ELECTIVE 1-(F3)', '9:30', '10:45', 'DM', 'JA', 14),
(31, 'Tuesday ', '06-11-17', 'ELECTIVE 1-(F3)', '11:30', '12:00', 'DM', 'AKB', 14),
(32, 'Monday', '06-11-17', 'ELECTIVE 1-(F3)', '9:30', '10:45', 'SAPM', 'SGK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_schedule_issue`
--

CREATE TABLE `course_schedule_issue` (
  `course_schedule_issue` int(100) NOT NULL,
  `course_schedule_issue_semester` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_from` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_to` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `course_schedule_duration` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_schedule_issue`
--

INSERT INTO `course_schedule_issue` (`course_schedule_issue`, `course_schedule_issue_semester`, `course_schedule_from`, `course_schedule_to`, `course_schedule_duration`) VALUES
(1, 'Fall ', '07-08-17 (Monday)', '12-08-17 (Friday)', '24th July 2017 – 18th December 2017'),
(2, 'Fall ', '07-08-17 (Monday)', '13-08-17 (Monday)', '24th Jan 2017 – 18th July 2017'),
(3, 'Fall ', '20-11-17 (Monday)', '26-11-17 (Sunday)', '20th Novemeber 2017 – 26th Novemeber 2017'),
(14, 'Fall ', '06-11-17 (Monday)', '12-11-17 (Sunday)', '24thJuly 2017 – 18th December 2017'),
(15, 'Fall ', '06-11-17 (Monday)', '12-11-17 (Sunday)', '24thJuly 2017 – 18th December 2017');

-- --------------------------------------------------------

--
-- Table structure for table `email_profile`
--

CREATE TABLE `email_profile` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_profile`
--

INSERT INTO `email_profile` (`username`, `password`) VALUES
('newindialms@thapar.edu', 'newindialms01');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `facultydetails_ID` int(200) NOT NULL,
  `faculty_employeeid` varchar(255) NOT NULL,
  `faculty_lastname` varchar(255) NOT NULL,
  `faculty_firstname` varchar(255) NOT NULL,
  `faculty_phone` varchar(200) NOT NULL,
  `faculty_email` varchar(255) NOT NULL,
  `faculty_program` varchar(255) DEFAULT NULL,
  `faculty_designation` varchar(255) DEFAULT NULL,
  `faculty_joining` int(11) NOT NULL,
  `faculty_specialization` varchar(400) NOT NULL,
  `faculty_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`facultydetails_ID`, `faculty_employeeid`, `faculty_lastname`, `faculty_firstname`, `faculty_phone`, `faculty_email`, `faculty_program`, `faculty_designation`, `faculty_joining`, `faculty_specialization`, `faculty_code`) VALUES
(2, '9999', 'W', 'Jasmine', '9999', 'jasmine@gmail.com', 'MBA', 'Lecturer', 2015, 'Cognitive Science, Psychology, Organizational Behaviour and Human Resourse Management', 'JA'),
(7, '8888', 'Bhardwaj', 'Dr. Amit Kumar', '14079296508', 'amit@gmail.com', 'MBA', 'Assistant Professor', 2015, 'Cognitive Science, Psychology, Organizational Behaviour,Human Resourse Management', 'AB'),
(8, '401307002', 'amol', 'amol', '944256278', 'amol@gmail.com', 'MBA', 'Lecturer', 2017, 'CommonCourses', 'AK'),
(9, '1015641', 'Garg', 'Dr. Arunesh', '343243243', 'arunesh@gmail.com', 'MBA', 'Assistant Professor', 2015, 'Marketing', 'AG'),
(11, '5555', 'Gupta', 'Dr. Vipul', '8884102261', 'vipul@gmail.com', 'MBA', 'Assistant Professor', 2013, 'Operations ', 'VG'),
(12, '1001100', 'Gupta', 'Pradeep', '9356225822', 'pradeep.gupta@thapar.edu', 'MBA', 'Academics Co-ordinator', 2010, 'Accounting,Finance', 'PKG'),
(13, '2215692', 'Goyal', 'Pranav', '9815576386', 'pranav.goyal@thapar.edu', 'MBA', 'Program Manager', 2016, 'Program Manager,Examination Deputy Supervisor', 'PG');

-- --------------------------------------------------------

--
-- Table structure for table `fcm_info`
--

CREATE TABLE `fcm_info` (
  `fcm_token` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fcm_info`
--

INSERT INTO `fcm_info` (`fcm_token`) VALUES
('cg2ZN5LDNsc:APA91bGd0UYoPvz1ywmOsvq5yjm9qH234T2jpgt8Gln_Egx6K_ylH5867_bIer-nD0YHmykH5atgHRlxNOJPW1jxeR68ludmIC4ke7ig2H81EB8cUcnMsl2D-tNHk9kvttZlqB0zcx6m'),
('dlpasUIVEgo:APA91bGP4sFXnw_q4BiBIXe6MaS_f4CwB2Bbg25zgJ1OLFcxj0KO8X83vsSzSxHotdYFDcqmpNl2oOVw9xfZ09eY9rYrQR1l8E4GRdgyEZ4CS_dm6uJ7gdTj31tdSaWD9oS6huwkJQM_');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_info`
--

CREATE TABLE `feedback_info` (
  `id` int(30) NOT NULL,
  `feedback_title` varchar(200) NOT NULL,
  `feedback_question` varchar(200) NOT NULL,
  `feedback_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_info`
--

INSERT INTO `feedback_info` (`id`, `feedback_title`, `feedback_question`, `feedback_type`) VALUES
(1, 'Change the Course', 'please rate the class sessions for today.please rate the class sessions for today.', 'Rate'),
(8, 'How was the class', 'How was the class', 'Text'),
(9, 'class?', 'class?', 'Rate');

-- --------------------------------------------------------

--
-- Table structure for table `first_year`
--

CREATE TABLE `first_year` (
  `first_year_id` int(255) NOT NULL,
  `student_rollnno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_year_courses` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Business Economics,Organizing, Managing and Leading,Marketing Management,,Excel Modeling for Decision-making,Fundamentals to Business Analytics,Ethics in Business, Government and Society,Financial Reporting and Analysis,Managing Human Resource,Operations Management,Social and Commercial Entrepreneurship,Managerial Accounting,Managing Information for Business,Applied Business Research ,Financial Management,Strategic Management,Sustainability in Practice (Energy),Sustainability in Practice (Environment),,Sustainability in Practice (Economics),Communication and Consultative Problem Solving-I,Communication and Consultative Problem Solving-II ',
  `student_year` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `first_year`
--

INSERT INTO `first_year` (`first_year_id`, `student_rollnno`, `first_year_courses`, `student_year`) VALUES
(1, '401307005', 'Business Economics,Organizing, Managing and Leading,Marketing Management,,Excel Modeling for Decision-making,Fundamentals to Business Analytics,Ethics in Business, Government and Society,Financial Reporting and Analysis,Managing Human Resource,Operations Management,Social and Commercial Entrepreneurship,Managerial Accounting,Managing Information for Business,Applied Business Research ,Financial Management,Strategic Management,Sustainability in Practice (Energy),Sustainability in Practice (Environment),,Sustainability in Practice (Economics),Communication and Consultative Problem Solving-I,Communication and Consultative Problem Solving-II ', '1'),
(2, '401307006', 'Business Economics,Organizing, Managing and Leading,Marketing Management,,Excel Modeling for Decision-making,Fundamentals to Business Analytics,Ethics in Business, Government and Society,Financial Reporting and Analysis,Managing Human Resource,Operations Management,Social and Commercial Entrepreneurship,Managerial Accounting,Managing Information for Business,Applied Business Research ,Financial Management,Strategic Management,Sustainability in Practice (Energy),Sustainability in Practice (Environment),,Sustainability in Practice (Economics),Communication and Consultative Problem Solving-I,Communication and Consultative Problem Solving-II ', '1'),
(3, '401307007', 'Business Economics,Organizing, Managing and Leading,Marketing Management,,Excel Modeling for Decision-making,Fundamentals to Business Analytics,Ethics in Business, Government and Society,Financial Reporting and Analysis,Managing Human Resource,Operations Management,Social and Commercial Entrepreneurship,Managerial Accounting,Managing Information for Business,Applied Business Research ,Financial Management,Strategic Management,Sustainability in Practice (Energy),Sustainability in Practice (Environment),,Sustainability in Practice (Economics),Communication and Consultative Problem Solving-I,Communication and Consultative Problem Solving-II ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `first_year_course_list`
--

CREATE TABLE `first_year_course_list` (
  `first_year_course_list_id` int(200) NOT NULL,
  `first_year_course_list_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_year_course_list_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `first_year_course_list_credits` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_year_course_list_faculty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_year_course_list_abbr` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `first_year_course_list`
--

INSERT INTO `first_year_course_list` (`first_year_course_list_id`, `first_year_course_list_code`, `first_year_course_list_name`, `first_year_course_list_credits`, `first_year_course_list_faculty`, `first_year_course_list_abbr`) VALUES
(1, 'SM5301', 'Business Economics', '3', 'VC', 'BE'),
(3, 'OB5301', 'Organizing, Managing and Leading', '3', 'PKN', 'OML'),
(4, 'MK5301', 'Marketing Management', '3', 'AG/HS', 'MM'),
(5, 'OP5204', 'Excel Modeling for Decision-making', '2', 'GG/AM', 'EMDM'),
(6, 'OP5203', 'Fundamentals to Business Analytics', '2', 'H/GG', 'FBA'),
(7, 'OB5201', 'Ethics in Business, Government and Society', '2', 'GP', 'EBGS'),
(8, 'AC5301', 'Financial Reporting and Analysis', '2', 'PKG', 'FRA'),
(9, 'HR5201', 'Managing Human Resource', '2', 'SJ', 'MHR');

-- --------------------------------------------------------

--
-- Table structure for table `login_check`
--

CREATE TABLE `login_check` (
  `registrationid` int(25) NOT NULL,
  `studentid` varchar(25) NOT NULL,
  `phonenumber` varchar(25) NOT NULL,
  `idtype` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_check`
--

INSERT INTO `login_check` (`registrationid`, `studentid`, `phonenumber`, `idtype`) VALUES
(0, '501386', '9815576386', 'programmanager'),
(1, '2784', '2784', 'programmanager'),
(44, '9999', '9999', 'FacultyStaff'),
(47, '8888', '14079296508', 'FacultyStaff'),
(48, '1111', '1111', 'student'),
(49, '111', '111', 'student'),
(56, '5555', '8288008191', 'FacultyStaff'),
(59, '7777', '9815576386', 'FacultyStaff'),
(60, '6666', '8288006698', 'FacultyStaff'),
(63, '2215692', '9815576386', 'FacultyStaff');

-- --------------------------------------------------------

--
-- Table structure for table `notification_details`
--

CREATE TABLE `notification_details` (
  `notification_id` int(100) NOT NULL,
  `notification_title` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `notification_message` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `notification_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notification_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification_details`
--

INSERT INTO `notification_details` (`notification_id`, `notification_title`, `notification_message`, `notification_date`, `notification_type`) VALUES
(41, 'NewIndiaLMSAPP', 'Check the Updated Academic Calendar....', '2017-11-24 05:53:58', 'calendar'),
(42, 'sample', 'sample', '2017-11-24 10:23:26', 'calendar'),
(43, 'Academic Calendar', 'App Testing', '2017-12-19 23:28:08', 'calendar'),
(44, 'Academic Calendar', 'App Testing', '2017-12-19 23:28:47', 'calendar'),
(45, 'Academic calendar', 'App testing', '2017-12-19 23:37:15', 'calendar'),
(46, 'Academic calendar ', 'testing app', '2017-12-20 09:56:00', 'calendar'),
(47, 'Academic calendar ', 'testing app', '2017-12-20 09:56:28', 'calendar'),
(48, 'testing', 'testing', '2017-12-20 09:58:55', 'calendar'),
(49, 'Academic calendar', 'App testing', '2017-12-20 11:20:46', 'calendar'),
(50, 'Academic calendar ', 'app testing ', '2017-12-20 11:22:22', 'calendar'),
(51, 'testing ', 'testing\n', '2017-12-20 16:47:44', 'calendar'),
(52, 'Hi', 'Pfa the updated calendar\n', '2017-12-21 10:34:07', 'calendar');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrationid` int(20) NOT NULL,
  `studentid` varchar(250) NOT NULL,
  `phonenumber` varchar(250) NOT NULL,
  `emailaddress` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `idtype` varchar(200) NOT NULL,
  `otp` varchar(200) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registrationid`, `studentid`, `phonenumber`, `emailaddress`, `password`, `idtype`, `otp`, `verified`) VALUES
(1, '999', '123456', 'test@test.com', 'test', 'student', '', 0),
(2, '1111', '3434343', 'test@test.com', 'test', 'student', '', 0),
(19, '2222', '2222', 'kamalshree2784@gmail.com', 'asd', 'FacultySta', '', 0),
(44, '9999', '9999', 'codesqills@gmail.comm', 'test', 'FacultySta', '861849', 1),
(47, '8888', '14079296508', 'codesqills@gmail.com', 'test', 'FacultySta', '434151', 1),
(56, '5555', '8288008191', 'pnair@thapar.edu', 'test', 'FacultyStaff', '423894', 1),
(60, '6666', '8288006698', 'ripneet@thapar.edu', 'test', 'FacultyStaff', '748785', 1),
(63, '2215692', '9815576386', 'pranav.goyal@thapar.edu', 'test', 'FacultyStaff', '415769', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(200) NOT NULL,
  `feedback_questions` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentprofile_image`
--

CREATE TABLE `studentprofile_image` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentprofile_image`
--

INSERT INTO `studentprofile_image` (`id`, `url`, `name`) VALUES
(1, 'http://newindialms.000webhostapp.com/uploads/1.png', 'test'),
(3, 'http://newindialms.000webhostapp.com/uploads/2.png', 'testing'),
(4, 'http://newindialms.000webhostapp.com/uploads/4.png', 'alarmclock'),
(5, 'http://newindialms.000webhostapp.com/uploads/5.jpg', 'testing'),
(12, 'http://newindialms.000webhostapp.com/uploads/6.jpg', '1111'),
(14, 'http://newindialms.000webhostapp.com/uploads/13.jpg', '111'),
(15, 'http://newindialms.000webhostapp.com/uploads/15.jpeg', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `studentdetails_ID` int(11) NOT NULL,
  `student_rollnno` int(200) NOT NULL,
  `student_lastname` varchar(255) NOT NULL,
  `student_firstname` varchar(255) NOT NULL,
  `student_phone` varchar(300) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_program` varchar(255) DEFAULT NULL,
  `student_specialization` varchar(255) DEFAULT NULL,
  `student_joining` int(11) NOT NULL,
  `student_graduation` int(11) NOT NULL,
  `student_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`studentdetails_ID`, `student_rollnno`, `student_lastname`, `student_firstname`, `student_phone`, `student_email`, `student_program`, `student_specialization`, `student_joining`, `student_graduation`, `student_year`) VALUES
(1, 5555, 'Sharma', 'Neha', '8884102261', 'codesqills@gmail.com', 'MBA', 'Marketing', 2016, 2018, '1'),
(3, 102, 'Sharma', 'Jasmine', '2147483647', 'codesqills@gmail.com', 'MBA', 'Human Resources', 2016, 2018, '2'),
(4, 104, 's', 'Naresh', '988786776', 'codesqills@gmail.com', 'MBA', 'Human Resources', 2017, 2019, '2'),
(6, 106, 'K', 'Rajesh', '999657677', 'codesqills@gmail.com', 'MBA', 'International Management and Strategy', 2016, 2018, '1'),
(8, 107, 'A', 'Arjun', '98776522', 'codesqills@gmail.com', 'MBA', 'Entreprenuership', 2017, 2019, '2'),
(11, 108, 'd', 'Dinesh', '909777772', 'codesqills@gmail.com', 'MBA', 'Information Systems', 2016, 2018, '1'),
(13, 401307002, 'Lohia', 'Anmol', '786786786', 'codesqills@gmail.com', 'MBA', 'Entrepreneurship and Innovation', 2016, 2018, '2'),
(14, 121, 'S', 'Ramya', '65654565', 'codesqills@gmail.com', 'MBA', 'Operations', 2016, 2018, '1'),
(15, 110, 'R', 'Shreya', '987867678', 'codesqills@gmail.com', 'MBA', 'Accounting', 2017, 2019, '2'),
(16, 111, 'K', 'Ajay', '111', 'codesqills@gmail.com', 'MBA', 'Finance', 2017, 2019, '1'),
(17, 401307003, 'Singh', 'Jaskaran', '876767778', 'codesqills@gmail.com', 'MBA', 'Marketing', 2016, 2018, '2'),
(22, 401307001, 'Goyal', 'Aashish', '2147483647', 'codesqills@gmail.com', 'MBA', 'Entrepreneurship and Innovation', 2017, 2019, '2'),
(23, 401307004, 'Singh', 'Manpreet', '324234324', 'codesqills@gmail.com', 'MBA', 'Energy and Sustainability', 2017, 2019, '1'),
(24, 401307005, 'Sethi', 'Mehul', '324234234', 'codesqills@gmail.com', 'MBA', 'International Management and Strategy', 2017, 2019, '1'),
(25, 401307006, 'Aggarwal', 'Nitin Kumar', '2147483647', 'codesqills@gmail.com', 'MBA', 'Education Management and Leadership', 2017, 2019, '1'),
(28, 401307027, 'Chawla', 'Aakash', '423432423', 'codesqills@gmail.com', 'MBA', 'Operations', 2017, 2019, '2'),
(29, 1111, 'Bond', 'James', '1111', 'codesqills@gmail.com', 'MBA', 'Operations', 2017, 2019, '2'),
(33, 501604001, 'Anand', 'Akshita', '9815576386', 'pranav.goyal@thapar.edu', 'MBA', 'Finance', 2016, 2018, '1'),
(34, 501604002, 'Chawla', 'Aakash', '9815576386', 'pranav.goyal@thapar.edu', 'MBA', 'Finance', 2016, 2018, '2'),
(35, 501604003, 'Goyal', 'Aashish', '9815576386', 'pranav.goyal@thapar.edu', 'MBA', 'Finance', 2016, 2018, '2');

-- --------------------------------------------------------

--
-- Table structure for table `student_year_table`
--

CREATE TABLE `student_year_table` (
  `student_year_id` int(255) NOT NULL,
  `student_rollno` int(255) NOT NULL,
  `student_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courses_enrolled` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `student_specialization` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_year_table`
--

INSERT INTO `student_year_table` (`student_year_id`, `student_rollno`, `student_year`, `courses_enrolled`, `student_specialization`) VALUES
(1, 401307001, '2', 'Creativity and Innovation,Managing Startups', 'ENTREPRENEURSHIP AND INNOVATION'),
(3, 401307003, '2', 'Customer Relationship Management,Digital Marketing,Sales and Distribution Management', 'Marketing'),
(5, 401307002, '2', 'Creativity and Innovation,Practicing Venture Creation', 'ENTREPRENEURSHIP AND INNOVATION'),
(8, 106, '2', 'ERP Management,Information Systems Analysis & Design,E-Business Systems', 'Information Systems'),
(10, 401307005, '2', 'Managing International Firms,Competing in Emerging Markets', 'International Management and Strategy'),
(12, 102, '2', 'Performance and Compensation Management', 'Human Resources'),
(13, 121, '2', 'Project Management,Supply Chain Management,ERP Management', 'Operations'),
(14, 401307027, '2', 'Project Management,Supply Chain Management,ERP Management', 'Operations'),
(15, 501604001, '2', 'Wealth Management,Personal Financial Planning', 'Finance'),
(16, 501604002, '2', 'Wealth Management,Personal Financial Planning', 'Finance'),
(17, 501604003, '2', 'Wealth Management,Personal Financial Planning', 'Finance'),
(40, 1111, '2 ', 'Project Management,Supply Chain Management', 'Operations');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_course`
--
ALTER TABLE `add_course`
  ADD PRIMARY KEY (`addcourse_id`);

--
-- Indexes for table `attendace_details`
--
ALTER TABLE `attendace_details`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `calendar_details`
--
ALTER TABLE `calendar_details`
  ADD PRIMARY KEY (`calendar_id`);

--
-- Indexes for table `course_count`
--
ALTER TABLE `course_count`
  ADD PRIMARY KEY (`coursecount_id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`course_details_id`);

--
-- Indexes for table `course_schedule`
--
ALTER TABLE `course_schedule`
  ADD PRIMARY KEY (`course_schedule_id`),
  ADD UNIQUE KEY `course_schedule_id` (`course_schedule_id`);

--
-- Indexes for table `course_schedule_issue`
--
ALTER TABLE `course_schedule_issue`
  ADD PRIMARY KEY (`course_schedule_issue`);

--
-- Indexes for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD PRIMARY KEY (`facultydetails_ID`);

--
-- Indexes for table `feedback_info`
--
ALTER TABLE `feedback_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_year`
--
ALTER TABLE `first_year`
  ADD PRIMARY KEY (`first_year_id`);

--
-- Indexes for table `first_year_course_list`
--
ALTER TABLE `first_year_course_list`
  ADD PRIMARY KEY (`first_year_course_list_id`);

--
-- Indexes for table `login_check`
--
ALTER TABLE `login_check`
  ADD PRIMARY KEY (`registrationid`);

--
-- Indexes for table `notification_details`
--
ALTER TABLE `notification_details`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registrationid`),
  ADD UNIQUE KEY `studentid` (`studentid`),
  ADD UNIQUE KEY `phonenumber` (`phonenumber`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentprofile_image`
--
ALTER TABLE `studentprofile_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`studentdetails_ID`);

--
-- Indexes for table `student_year_table`
--
ALTER TABLE `student_year_table`
  ADD PRIMARY KEY (`student_year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_course`
--
ALTER TABLE `add_course`
  MODIFY `addcourse_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `attendace_details`
--
ALTER TABLE `attendace_details`
  MODIFY `attendance_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `calendar_details`
--
ALTER TABLE `calendar_details`
  MODIFY `calendar_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_count`
--
ALTER TABLE `course_count`
  MODIFY `coursecount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `course_details_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `course_schedule`
--
ALTER TABLE `course_schedule`
  MODIFY `course_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `faculty_details`
--
ALTER TABLE `faculty_details`
  MODIFY `facultydetails_ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback_info`
--
ALTER TABLE `feedback_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `first_year`
--
ALTER TABLE `first_year`
  MODIFY `first_year_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `first_year_course_list`
--
ALTER TABLE `first_year_course_list`
  MODIFY `first_year_course_list_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notification_details`
--
ALTER TABLE `notification_details`
  MODIFY `notification_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registrationid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentprofile_image`
--
ALTER TABLE `studentprofile_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `studentdetails_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `student_year_table`
--
ALTER TABLE `student_year_table`
  MODIFY `student_year_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
