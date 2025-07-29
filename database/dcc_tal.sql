-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 05:09 PM
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
-- Database: `dcc_tal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2a$12$l4ubeQD4tOjaG7oeMetTlO76J4NpOENhBq6egzUO5.OoY04uKksW2', '2025-06-05 12:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notif`
--

CREATE TABLE `admin_notif` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `tableName` varchar(50) NOT NULL,
  `pageName` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `building_desc` text DEFAULT NULL,
  `is_structured` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isAccessable` tinyint(4) NOT NULL DEFAULT 0,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `building_desc`, `is_structured`, `created_at`, `isAccessable`, `latitude`, `longitude`, `status`) VALUES
(1, 'LSAB Building', 'The Library, Science, and Academic Building (LSAB) at Carlos Hilado Memorial State University (CHMSU) in Talisay City, Negros Occidental, serves as a central hub for various academic and student support services. Strategically located within the main campus, LSAB houses essential facilities that cater to the needs of students, faculty, and staff.', 1, '2025-06-07 10:46:07', 1, '10.743192046688', '122.97027551195', 1),
(2, 'Teachers Education Building (TEB)', 'The Technology Extension Building (TEB) of CHMSU Talisay Campus is a modern two-story facility that serves as the center for research, innovation, and community extension. It houses offices for research and development, intellectual property, and community engagement, along with a Technology Business Incubation (TBI) Center to support startups and innovation projects. The building is designed to promote collaboration and knowledge sharing among students, faculty, and partner communities.', 1, '2025-06-10 02:42:53', 1, '10.742372528149', '122.97118479932', 1),
(3, 'Student Center', 'The Student Center at CHMSU Talisay (also known as the Student Affairs and Services hub) is located along Mabini Street within the main campus. It functions as a central spot where students gather for meetings, activities, and casual hangouts a place to relax, socialize, and access student services', 1, '2025-06-10 06:05:33', 1, '10.741858449769', '122.96881020512', 1),
(4, 'Admin Building', 'The Administration Building at CHMSU Talisay Campus is a key hub for leadership and academic coordination. A multi‑storey structure located along Mabini Street, it accommodates essential central offices such as the President’s and Vice Presidents’ offices, the Registrar, the Finance and Planning divisions, Admissions, and the Bids & Awards Committee', 1, '2025-06-10 07:14:31', 1, '10.742904434677', '122.96944506072', 1),
(5, 'Technology Green Building', 'The Technology Extension Building (TEB) of Carlos Hilado Memorial State University (CHMSU) Talisay Campus serves as the institution’s hub for research, innovation, and community extension activities.', 1, '2025-06-11 04:45:46', 1, '10.742554253257', '122.96928610715', 1),
(6, 'Engineering Building', 'The Engineering Building of CHMSU Talisay Campus,is a dedicated multi-level structure situated along Mabini Street within the main campus. It accommodates the College of Engineering (and sometimes Architecture and Fine Arts), with departmental offices, faculty rooms, classrooms, and specialized laboratories—such as the Surveying, Soil Mechanics, Materials Testing, and Hydraulics labs—equipped with modern instruments used in civil engineering education', 1, '2025-06-11 04:46:21', 1, '10.742137657729', '122.96949135399', 1),
(7, 'Gym', 'The CHMSU Talisay Gymnasium, often referred to as the University Gym or Multipurpose Gym, is a versatile indoor sports facility located within the main campus. It\'s a spacious structure with high ceilings and bleacher seating, designed to accommodate basketball, volleyball, intramurals, sports clinics, and large university gatherings', 0, '2025-06-13 04:13:39', 1, '10.742027008394', '122.96894005147', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buildings_img`
--

CREATE TABLE `buildings_img` (
  `id` int(11) NOT NULL,
  `buildings_id` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings_img`
--

INSERT INTO `buildings_img` (`id`, `buildings_id`, `img`, `status`) VALUES
(1, 1, './assets/img/buildings/lsab2.jpg', 1),
(2, 1, './assets/img/buildings/lsab1.jpg', 1),
(4, 2, './assets/img/buildings/IMG_20250602_154109_871.jpg', 0),
(5, 2, './assets/img/buildings/IMG_20250602_154055_107.jpg', 0),
(6, 3, './assets/img/buildings/IMG_20250602_154055_107.jpg', 0),
(7, 4, './assets/img/buildings/5d438796-108c-4134-8d3f-2ebb3fb86b34.jpg', 0),
(8, 2, './assets/img/buildings/chmsu-teb.jpg', 1),
(9, 3, './assets/img/buildings/chmsu-teb.jpg', 1),
(10, 5, './assets/img/buildings/chmsu-teb.jpg', 1),
(11, 6, './assets/img/buildings/chmsu-teb.jpg', 1),
(12, 4, './assets/img/buildings/chmsu-teb.jpg', 0),
(13, 7, './assets/img/buildings/chmsu-teb.jpg', 1),
(17, 4, './assets/img/buildings/chmsu-tal.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `building_route`
--

CREATE TABLE `building_route` (
  `id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building_route`
--

INSERT INTO `building_route` (`id`, `building_id`, `latitude`, `longitude`, `img`, `created_at`) VALUES
(1, 1, '10.742538146367577', '122.96894043524786', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-13 01:57:48'),
(2, 1, '10.742437755168194', '122.96923707680624', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 01:58:33'),
(3, 1, '10.742752917263102', '122.96936041739556', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 02:42:36'),
(4, 1, '10.742792089750678', '122.96942261658232', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 02:43:08'),
(5, 1, '10.74345276349377', '122.96968114509771', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 02:44:34'),
(6, 1, '10.74321032550784', '122.9702906770871', './assets/img/buildings/chmsu-teb.jpg', '2025-06-13 02:45:06'),
(7, 7, '10.742537372680758', '122.96894483423843', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-14 10:33:13'),
(8, 7, '10.742468857410566', '122.96910777842398', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-14 10:34:52'),
(9, 7, '10.742043927749869', '122.96891126405716', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-14 10:35:34'),
(10, 4, '10.742540763581536', '122.96894368560498', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:38:50'),
(11, 4, '10.742480437898353', '122.96910875267214', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:39:16'),
(12, 4, '10.742921520218143', '122.96930810904509', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:40:03'),
(13, 4, '10.742912902275012', '122.96939263614229', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:40:28'),
(14, 3, '10.742541435075978', '122.96893983259027', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:41:25'),
(15, 3, '10.742475555009625', '122.96910478843104', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:41:48'),
(16, 3, '10.74217645932764', '122.96898811234855', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:42:13'),
(17, 3, '10.74215801288822', '122.96895592584302', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:42:32'),
(18, 3, '10.741870775328975', '122.96881913319459', './assets/img/building-routes/chmsu-tal.jpg', '2025-06-19 05:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `facilityName` varchar(100) NOT NULL,
  `floorNumber` varchar(25) NOT NULL,
  `roomNumber` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `building_id`, `facilityName`, `floorNumber`, `roomNumber`, `description`, `created_at`, `latitude`, `longitude`, `status`) VALUES
(1, 1, 'LSAB', '3rd', '311', 'LSAB Room 311 is a dedicated computer laboratory that serves as a learning hub for programming and other BSIS (Bachelor of Science in Information Systems) related courses. Equipped with essential hardware and software for hands-on training, it supports students in developing technical skills in coding, system design, and IT applications. Additionally, the room has hosted several Capstone project defenses, making it a key space for academic presentations and collaborative research in the program asdasdasd', '2025-06-08 00:31:10', '10.743401575996', '122.96982303346', 1),
(2, 1, 'LSAB', '3rd', '312', 'LSAB Room 312 is a dedicated computer laboratory that serves as a learning hub for programming and other BSIS (Bachelor of Science in Information Systems) related courses. Equipped with essential hardware and software for hands-on training, it supports students in developing technical skills in coding, system design, and IT applications. Additionally, the room has hosted several Capstone project defenses, making it a key space for academic presentations and collaborative research in the program', '2025-06-08 11:44:53', '10.743360089461', '122.96993303927', 1),
(5, 1, 'Library', '2nd', '', 'test', '2025-06-10 03:31:00', '10.7434126', '122.9697626', 0),
(6, 1, 'Campus Library', '2nd', '', 'The CHMSU Talisay Campus Library is a modern and well-equipped learning hub designed to support the academic needs of students and faculty. It offers a wide collection of books, journals, e-resources, and reference materials across various disciplines. With its quiet study areas, computer stations, and helpful staff, the library provides a conducive environment for research, study, and intellectual growth', '2025-06-11 02:52:28', '10.74337307999', '122.969664522', 1),
(7, 1, 'LSAB', '3rd', '313', 'test', '2025-06-13 06:45:56', '10.747904', '122.978304', 0),
(8, 1, 'test', '', '', 'test', '2025-06-14 11:19:02', '10.7201501', '122.5621063', 1),
(9, 4, 'Registrar\'s Office', '1st', '', 'test', '2025-06-28 09:49:18', '10.742956637985', '122.96942693798', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facilities_img`
--

CREATE TABLE `facilities_img` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities_img`
--

INSERT INTO `facilities_img` (`id`, `facility_id`, `img`, `status`) VALUES
(1, 1, './assets/img/facilities/311-3.jpg', 1),
(2, 1, './assets/img/facilities/311-2.jpg', 1),
(3, 1, './assets/img/facilities/311-1.jpg', 1),
(4, 1, './assets/img/facilities/lsab-room-311.jpg', 1),
(5, 2, './assets/img/facilities/312-3.jpg', 1),
(6, 2, './assets/img/facilities/312-2.jpg', 1),
(7, 2, './assets/img/facilities/312-1.jpg', 1),
(8, 2, './assets/img/facilities/lsab-room-312.jpg', 1),
(9, 5, './assets/img/facilities/IMG_20250602_154055_107.jpg', 1),
(10, 5, './assets/img/facilities/IMG_20250602_154034_810.jpg', 1),
(11, 1, './assets/img/buildings/IMG_20250602_153933_623.jpg', 0),
(12, 1, './assets/img/buildings/IMG_20250602_153917_313.jpg', 0),
(13, 6, './assets/img/facilities/library.jpg', 1),
(14, 7, './assets/img/facilities/chmsu-teb.jpg', 1),
(15, 8, './assets/img/facilities/chmsu-tal.jpg', 1),
(16, 9, './assets/img/facilities/chmsu-tal.jpg', 1),
(17, 6, './assets/img/buildings/chmsu-tal.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `facility_route`
--

CREATE TABLE `facility_route` (
  `id` int(11) NOT NULL,
  `facility_id` int(11) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility_route`
--

INSERT INTO `facility_route` (`id`, `facility_id`, `latitude`, `longitude`, `img`, `created_at`) VALUES
(1, 6, '10.74254523413136', '122.96894062306303', './assets/img/facility-routes/chmsu-tal.jpg', '2025-06-23 13:27:33'),
(2, 6, '10.742471028451913', '122.969121796504', './assets/img/facility-routes/chmsu-tal.jpg', '2025-06-23 13:28:18'),
(3, 6, '10.742445545224314', '122.96923005858174', './assets/img/facility-routes/chmsu-tal.jpg', '2025-06-23 13:29:31'),
(4, 8, '10.7195263', '122.5522241', './assets/img/facility-routes/chmsu-tal.jpg', '2025-07-03 14:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_notif`
--

CREATE TABLE `user_notif` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone_num` varchar(11) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `street` varchar(150) NOT NULL,
  `visit_purpose` varchar(250) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `building_id`, `fname`, `lname`, `phone_num`, `province`, `city`, `brgy`, `street`, `visit_purpose`, `destination`, `visited_at`) VALUES
(1, 1, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'test', 'Campus Library  , 2nd Floor', '2025-07-03 05:56:20'),
(2, 4, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'test', 'Admin Building', '2025-07-03 05:56:35'),
(3, 1, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'asd', 'LSAB Building', '2025-07-03 05:56:55'),
(4, 4, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'asd', 'Admin Building', '2025-07-03 05:57:04'),
(5, 4, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'asd', 'Admin Building', '2025-07-03 06:06:16'),
(6, 1, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'asd', 'Campus Library  , 2nd Floor', '2025-07-03 06:06:26'),
(7, 4, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'asd', 'Admin Building', '2025-07-03 06:06:32'),
(8, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'asd', 'LSAB Building', '2025-07-03 14:05:33'),
(9, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'Campus Library  , 2nd Floor', '2025-07-03 14:05:58'),
(10, 4, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'asasdasd', 'Admin Building', '2025-07-03 14:06:21'),
(11, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'Campus Library  , 2nd Floor', '2025-07-03 14:06:31'),
(12, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'Campus Library  , 2nd Floor', '2025-07-03 14:06:46'),
(13, 7, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'Gym', '2025-07-03 14:07:13'),
(14, 7, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'Gym', '2025-07-03 14:07:31'),
(15, 4, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'asd', 'Admin Building', '2025-07-03 14:11:40'),
(16, 4, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'Admin Building', '2025-07-03 14:12:18'),
(17, 4, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'Admin Building', '2025-07-03 14:13:18'),
(18, 4, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'asd', 'Admin Building', '2025-07-03 14:13:58'),
(19, 4, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'asd', 'Admin Building', '2025-07-03 14:14:18'),
(20, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'asd', 'Campus Library  , 2nd Floor', '2025-07-03 14:14:27'),
(21, 4, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'Admin Building', '2025-07-03 14:14:52'),
(22, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'dsas', 'LSAB Building', '2025-07-03 14:16:45'),
(23, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'dsas', 'LSAB Building', '2025-07-03 14:17:23'),
(24, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'test', 'LSAB Building', '2025-07-03 14:17:45'),
(25, 1, 'Juan ', 'Dela Cruz', '09234324234', 'NEGROS OCCIDENTAL', 'BACOLOD CITY', 'BARANGAY 14 (POB.)', 'Block 47 lot 14', 'asd', 'Campus Library  , 2nd Floor', '2025-07-03 14:17:58'),
(26, 7, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'test', 'Gym', '2025-07-03 14:27:18'),
(27, 1, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'test', 'LSAB Building', '2025-07-03 14:27:50'),
(28, 1, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'test', 'LSAB Building', '2025-07-03 14:28:46'),
(29, 1, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'tset', 'LSAB Building', '2025-07-03 14:28:54'),
(30, 7, 'Danilo', 'Burdagol', '09234723487', 'SURIGAO DEL SUR', 'TANDAG CITY', 'SAN AGUSTIN SUR', 'test', 'test', 'Gym', '2025-07-03 14:38:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notif`
--
ALTER TABLE `admin_notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings_img`
--
ALTER TABLE `buildings_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buildings_id` (`buildings_id`);

--
-- Indexes for table `building_route`
--
ALTER TABLE `building_route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `facilities_img`
--
ALTER TABLE `facilities_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_id` (`facility_id`);

--
-- Indexes for table `facility_route`
--
ALTER TABLE `facility_route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `user_notif`
--
ALTER TABLE `user_notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_notif`
--
ALTER TABLE `admin_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buildings_img`
--
ALTER TABLE `buildings_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `building_route`
--
ALTER TABLE `building_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `facilities_img`
--
ALTER TABLE `facilities_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `facility_route`
--
ALTER TABLE `facility_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_notif`
--
ALTER TABLE `user_notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buildings_img`
--
ALTER TABLE `buildings_img`
  ADD CONSTRAINT `buildings_img_ibfk_1` FOREIGN KEY (`buildings_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `building_route`
--
ALTER TABLE `building_route`
  ADD CONSTRAINT `building_route_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facilities_img`
--
ALTER TABLE `facilities_img`
  ADD CONSTRAINT `facilities_img_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facility_route`
--
ALTER TABLE `facility_route`
  ADD CONSTRAINT `facility_route_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
