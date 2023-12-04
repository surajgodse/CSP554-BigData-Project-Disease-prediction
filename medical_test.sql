-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 02:37 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `email_id`, `phone`) VALUES
(1, 'admin', 'admin', '$2y$10$.CpzsWjT6.cLjtpeGzoK6ObogqByMk.s4XeDAzXQXZgTbv5DVcNW2', 'admin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `docotrs`
--

CREATE TABLE `docotrs` (
  `dr_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Education` varchar(255) NOT NULL,
  `Speciality` varchar(255) NOT NULL,
  `test_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docotrs`
--

INSERT INTO `docotrs` (`dr_id`, `name`, `Education`, `Speciality`, `test_id`, `address`, `contact`) VALUES
(1, 'Dr. Sameer Rane', 'MBBS', 'Child specialist', '1', '133, 1st Floor, MIRC Building, Bombay Hospital, Near Metro Cinema, Marine Drive, Mumbai, Maharashtra 400020', '213123'),
(2, ' Dr. Ajit Krishna Shetty', 'MBBS, MD - Medicine', 'General Physician', '1', '179/180, Road Number 2, Kamal Charan Building, Jawahar Nagar, Landmark: Near Vijaya Bank, Mumbai', '12312345234'),
(3, ' Dr. Laxman G. Jonwal', 'MD - Medicine, BAMS', 'Consultant Physician, Ayurveda', '1', 'Plot Number 30/221, Matoshree Bungalow, Charkop Sector 6, Landmark: Behind Ambe Mata Mandir & Near Chickuwadi Mhada Colony Bridge, Mumbai', '9876767865'),
(4, 'Dr. B.R. Ramesh Rao', 'MBBS, MD - General Medicine, DNB - Nephrology', 'Nephrologist/Renal Specialist, General Physician', '1', '20, Nitya Priya Society, Landmark: Next To Sanjeevani Hospital, Near Andheri Station East, Mumbai', '976567879656'),
(5, 'Dr. Yatin Gadgil', 'MBBS, MD - General Medicine', 'General Physician, Internal Medicine', '2', '3, new shreenath building, next to darshan sanitaryware, opp shobha hotel, L J road, mahim west, mumbai 16, Landmark: opp shobha hotel, Mumbai', '8657456745'),
(6, ' Dr. Vilas Kulkarni', 'MD - Pediatrics, MBBS', 'Pediatrician', '2', '11/12/13/14, Link Garden Society, Tower Number 2, Landmark: Near Indra Darshan and Yamuna Nagar, Mumbai', '967865775');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `test` varchar(255) NOT NULL,
  `feedback` mediumtext NOT NULL,
  `given_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `doctor`, `test`, `feedback`, `given_by`) VALUES
(1, 'Dr. Vilas Kulkarni', 'Malaria', 'Good and accurate treatment', 'Dipak'),
(3, 'Dr. B.R. Ramesh Rao', 'Maleria', 'Nice', 'Dipak ');

-- --------------------------------------------------------

--
-- Table structure for table `first_aid`
--

CREATE TABLE `first_aid` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `test_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `first_aid`
--

INSERT INTO `first_aid` (`id`, `description`, `test_id`) VALUES
(1, 'Clear any sources of stagnating water, indoors and outdoors, as they can act as mosquito breeding grounds. Since mosquitoes are night feeders, stay away from danger zones â€“ particularly fields, forests and swamps â€“ from dusk to dawn to avoid being bitten. Wear pants and long-sleeved clothing that are light-coloured and comfortable as mosquitoes can bite through tight synthetic clothing and are attracted to dark colours.', '1'),
(2, 'The World Health Organization (WHO) recommends artemisinin-based combination therapy (ACT) to treat uncomplicated malaria.', '1'),
(3, 'There are a number of options that travellers can take to prevent malaria, including antimalarial medication, using anti-mosquito sprays or lotions, and sleeping under a permethrin-treated bed net.', '1'),
(4, 'Drink plenty of liquids. Choose water, juice and warm soups to prevent dehydration.', '1'),
(5, 'Rest. Get more sleep to help your immune system fight infection.', '2'),
(6, 'Consider pain relievers. Use an over-the-counter pain reliever, such as acetaminophen (Tylenol, others) or ibuprofen (Advil, Motrin IB, others), cautiously. Also, use caution when giving aspirin to children or teenagers.', '2');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ravi sharma', 'ravi@gmail.com', 'Need to know if any test for Jaundise?', 'Need to know if any test for Jaundise?'),
(2, 'Dipak', 'dipak@gmail.com', 'Do you have Maleria test?', 'Do you have Maleria test?');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_phone` varchar(20) NOT NULL,
  `p_password` varchar(100) NOT NULL,
  `p_address` varchar(255) NOT NULL,
  `p_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `p_name`, `p_email`, `p_phone`, `p_password`, `p_address`, `p_username`) VALUES
(37, 'dipak', 'p1@gmail.com', '21321321321321', '$2y$10$Um242H4GJQ2hap7OH2bNjOv2/2ADES6xqKZhJFP12BVa2tpyuAeRu', 'dewqrweqr', 'dipak'),
(38, 'Dipak ', 'test_patient@gmail.com', '982191231', '$2y$10$FdB5kVlKMrOtl/8KANEM2.0Uezjg1QjonxwxwXeBkrrrJyOiwoiwG', 'test_patient@gmail.com', 'patient1');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `test_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `test_id`) VALUES
(1, 'Do you have Abdominal pain?', '1'),
(2, 'Are you suffering from Diarrhea, nausea and vomiting?', '2'),
(3, 'Do you have High fever?', '1'),
(4, 'Do you have a sensation of cold with shivering?', '1'),
(5, 'Are you suffering from fever, headaches, and vomiting', '1'),
(6, 'Do you have sweats, followed by a return to normal temperature, with tiredness?', '1'),
(7, 'Do you have impaired consciousness?', '1'),
(8, 'Do you have deep breathing and respiratory distress?', '1'),
(9, 'Do you have Fatigue or tiredness, which can be extreme?', '2'),
(10, 'Are you suffering from Runny or stuffy nose?', '2'),
(11, 'Do you have Diarrhea and vomiting occasionally, but more commonly seen than with other strains of flu?', '2'),
(12, 'Are you suffering from Fast breathing or difficulty breathing?', '2'),
(13, 'Do you have Rash with a fever?', '2');

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE `test_category` (
  `test_id` int(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `questions_added` varchar(255) NOT NULL,
  `remedy_added` varchar(255) NOT NULL,
  `test_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`test_id`, `test_name`, `questions_added`, `remedy_added`, `test_description`) VALUES
(1, 'Maleria', '1', '1', 'Testing test Description for Maleria'),
(2, 'H1N1', '1', '1', 'Testing test Description for H1N1'),
(3, 'Typhoid', '0', '0', 'Typhoid is caused by Salmonella typhi, a bacterium from the same genus that causes salmonella.'),
(4, 'Jaundice', '0', '0', 'Jaundice is a condition in which the skin, whites of the eyes and mucous membranes turn yellow because of a high level of bilirubin, a yellow-orange bile pigment.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `docotrs`
--
ALTER TABLE `docotrs`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_aid`
--
ALTER TABLE `first_aid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_email` (`p_email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_category`
--
ALTER TABLE `test_category`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `docotrs`
--
ALTER TABLE `docotrs`
  MODIFY `dr_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `first_aid`
--
ALTER TABLE `first_aid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `test_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
