-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 05:40 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talentmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(100) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`) VALUES
(1, 'Who We Are', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id interdum orci, sed rhoncus augue. Fusce pretium arcu neque, eu scelerisque orci accumsan non. Nam fringilla non arcu quis faucibus. Fusce urna justo, porta eget commodo id, pharetra non odio. Vivamus rhoncus augue eros, in cursus nibh blandit eu. In quis nisl rhoncus, pellentesque augue vel, scelerisque dolor. Suspendisse posuere varius sem, ac porta enim interdum quis.</p>\r\n<p>Morbi sed lacus auctor, facilisis sem facilisis, molestie lectus. Vestibulum rutrum velit commodo consectetur ornare. In volutpat fringilla fermentum. Fusce eu maximus lectus. Maecenas ligula libero, facilisis sed ornare a, consectetur sit amet nisl. In quis dolor cursus, rutrum augue vitae, tincidunt nisl. Sed risus mi.</p>'),
(2, 'What We Do', '<p>venenatis non tempus ut, ullamcorper non elit. Sed libero enim, pulvinar ut viverra eget, viverra et diam. Aliquam nunc mi, dapibus at sodales at, feugiat eu magna. Maecenas vestibulum accumsan velit, at ullamcorper mi iaculis ut. Ut urna eros, tincidunt at hendrerit luctus, fermentum sed ligula.</p>\r\n<p>Nunc in fringilla risus, ut sodales metus. Duis cursus maximus purus vitae pretium. Pellentesque fermentum mi ac massa aliquam, sed vehicula ligula condimentum. Pellentesque ut orci auctor, condimentum leo at, condimentum nunc. Phasellus at mauris fermentum, fermentum orci ac, congue tellus. Fusce lectus orci, volutpat in felis eu, ullamcorper rhoncus erat. In et sodales elit. Fusce dictum, dui eu vulputate fringilla, justo ex consequat nisi, id luctus nisi diam vitae arcu. Nulla pharetra scelerisque nisi. Donec varius nibh eget egestas fringilla. Cras ac purus tincidunt, lacinia dui sit amet, convallis odio. Fusce efficitur elit turpis, vel pharetra felis laoreet vel.</p>'),
(3, 'Why We Are Here', '<p>Etiam metus nisi, rutrum ac felis eget, malesuada cursus est. Duis nulla dolor, venenatis vitae tempus nec, semper vel nisl. Mauris facilisis enim eu odio venenatis porta. Ut at nisl at libero efficitur mattis. Sed est velit, tincidunt sit amet ex non, condimentum aliquet dolor. Donec auctor tincidunt nibh, convallis feugiat lacus cursus id. In eleifend, turpis eget feugiat pulvinar, lectus massa placerat dolor, vel consectetur nunc lectus ut arcu. Pellentesque rhoncus nisl et rhoncus pretium.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Languages'),
(2, 'Accents'),
(3, 'Musician'),
(4, 'Singer'),
(5, 'Dancer'),
(6, 'Performing Artist'),
(7, 'Stunts');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `interested_talent` varchar(5000) NOT NULL,
  `enquiry` varchar(10000) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `sent` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(100) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `content`) VALUES
(11, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id interdum orci, sed rhoncus augue. Fusce pretium arcu neque, eu scelerisque orci accumsan non. Nam fringilla non arcu quis faucibus. Fusce urna justo, porta eget commodo id, pharetra non odio. Vivamus rhoncus augue eros, in cursus nibh blandit eu. In quis nisl rhoncus, pellentesque augue vel, scelerisque dolor. Suspendisse posuere varius sem, ac porta enim interdum quis.'),
(12, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id interdum orci, sed rhoncus augue. Fusce pretium arcu neque, eu scelerisque orci accumsan non. Nam fringilla non arcu quis faucibus. Fusce urna justo, porta eget commodo id, pharetra non odio. Vivamus rhoncus augue eros, in cursus nibh blandit eu. In quis nisl rhoncus, pellentesque augue vel, scelerisque dolor. Suspendisse posuere varius sem, ac porta enim interdum quis.');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'VIC'),
(2, 'NSW'),
(3, 'QLD'),
(4, 'SA'),
(5, 'WA'),
(6, 'NT'),
(7, 'ACT'),
(8, 'TAS'),
(9, 'International');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` int(100) UNSIGNED NOT NULL,
  `filename` varchar(100) NOT NULL,
  `talent_id` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(100) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(9000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `content`) VALUES
(15, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id interdum orci, sed rhoncus augue. Fusce pretium arcu neque, eu scelerisque orci accumsan non. Nam fringilla non arcu quis faucibus. Fusce urna justo, porta eget commodo id, pharetra non odio. Vivamus rhoncus augue eros, in cursus nibh blandit eu. In quis nisl rhoncus, pellentesque augue vel, scelerisque dolor. Suspendisse posuere varius sem, ac porta enim interdum quis.</p>'),
(16, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id interdum orci, sed rhoncus augue. Fusce pretium arcu neque, eu scelerisque orci accumsan non. Nam fringilla non arcu quis faucibus. Fusce urna justo, porta eget commodo id, pharetra non odio. Vivamus rhoncus augue eros, in cursus nibh blandit eu. In quis nisl rhoncus, pellentesque augue vel, scelerisque dolor. Suspendisse posuere varius sem, ac porta enim interdum quis.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'Languages'),
(2, 'Accents'),
(3, 'Musician'),
(4, 'Singer'),
(5, 'Dancer'),
(6, 'Performing Artist'),
(7, 'Stunts');

-- --------------------------------------------------------

--
-- Table structure for table `talents`
--

CREATE TABLE `talents` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `height` int(3) DEFAULT NULL,
  `bio` varchar(5000) DEFAULT NULL,
  `featurephoto` varchar(100) NOT NULL,
  `location_id` int(100) UNSIGNED DEFAULT NULL,
  `agerangeone` varchar(7) DEFAULT NULL,
  `agerangetwo` varchar(7) DEFAULT NULL,
  `agerangethree` varchar(7) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `categorythree` varchar(20) DEFAULT NULL,
  `categorytwo` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `car` tinyint(1) NOT NULL,
  `licence` tinyint(1) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `suburb` varchar(25) DEFAULT NULL,
  `postcode` int(4) DEFAULT NULL,
  `tattoos` varchar(90) DEFAULT NULL,
  `piercing` varchar(90) DEFAULT NULL,
  `bodymod` varchar(90) DEFAULT NULL,
  `nudity` varchar(14) DEFAULT NULL,
  `differences` varchar(400) DEFAULT NULL,
  `availability` varchar(9) NOT NULL,
  `experience` varchar(15) NOT NULL,
  `dress` varchar(10) NOT NULL,
  `eye` varchar(11) DEFAULT NULL,
  `hair` varchar(17) DEFAULT NULL,
  `mediaone` varchar(100) DEFAULT NULL,
  `mediatwo` varchar(100) DEFAULT NULL,
  `mediathree` varchar(100) DEFAULT NULL,
  `industryone` varchar(13) DEFAULT NULL,
  `industrytwo` varchar(13) DEFAULT NULL,
  `industrythree` varchar(13) DEFAULT NULL,
  `roleone` varchar(21) DEFAULT NULL,
  `roletwo` varchar(21) DEFAULT NULL,
  `rolethree` varchar(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `talents`
--

INSERT INTO `talents` (`id`, `name`, `gender`, `height`, `bio`, `featurephoto`, `location_id`, `agerangeone`, `agerangetwo`, `agerangethree`, `firstname`, `lastname`, `categorythree`, `categorytwo`, `category`, `dob`, `email`, `mobile`, `car`, `licence`, `address`, `suburb`, `postcode`, `tattoos`, `piercing`, `bodymod`, `nudity`, `differences`, `availability`, `experience`, `dress`, `eye`, `hair`, `mediaone`, `mediatwo`, `mediathree`, `industryone`, `industrytwo`, `industrythree`, `roleone`, `roletwo`, `rolethree`) VALUES
(103, 'Cathrine', 'Female', 170, '', 'user-img/12.jpg', 1, '18-25', '26-30', '', 'Cathrine', 'Mount', '', 'Performing Artist', 'Dancer', '1988-10-28', 'mount.c@backstageagent.com', '0487973306', 1, 1, ' 6 Sunraysia Road', 'Corindhap', 3352, '', '', '', 'Partial nudity', '', 'Flexible', 'Experienced', 'Dominatrix', 'Black', 'Black', 'user-img/35.jpg', 'user-img/31.jpg', 'user-img/41.jpg', 'Film', 'Music Video', 'TV', 'Actor', 'Modelling', 'Performing Artist'),
(105, 'Alex', 'Female', 178, '', 'user-img/13.jpg', 3, '18-25', '26-30', '', 'Alexandra', 'Myers', '', '', '', '1994-01-14', 'alexmyers@hotmail.com', '0408057849', 0, 1, '42 Anderson Street', 'Brighton', 4017, '', '', '', 'Partial nudity', '', 'Any time', 'No Experience', 'Latex', 'Brown', 'Brown Dark', 'user-img/4.jpg', 'user-img/3.jpg', 'user-img/13.jpg', 'Film', 'Music Video', '', 'Modelling', 'Fashion', ''),
(106, 'Robert', 'Male', 185, '', 'user-img/29.jpg', 1, '26-30', '31-35', '36-40', 'Robert', 'Small', '', 'Stunts', 'Performing Artist', '1989-12-18', 'rsmall@mail.com', '0472374852', 1, 1, '38 Carlisle Street', 'Clonbinane', 3658, 'Left Bicep', '', '', 'Full nudity', '', 'Any time', 'Some Experience', 'Master', 'Blue Green', 'Black', 'user-img/', 'user-img/', 'user-img/', 'Film', 'TV', 'Documentaries', 'Modelling', 'Background Extra', 'Featured Extra'),
(108, 'Alyce', 'Female', 170, '', 'user-img/14.jpg', 8, '18-25', '26-30', '', 'Alice', 'Wonder', '', '', 'Languages', '1982-05-19', 'alice@mail.com', '0442806106', 0, 0, '57 Isaac Road', 'Florentine', 7140, '', '', '', 'Partial nudity', '', 'Part Time', 'Some Experience', 'Master', 'Brown Hazel', 'Red', 'user-img/3.jpg', 'user-img/1.jpg', 'user-img/36.jpg', 'TV', 'Music Video', '', 'Modelling', 'Performing Artist', 'Actor'),
(110, 'Juju Bee', 'Male', 180, 'Facebook : jujubee', 'user-img/jujubeeee.jpg', 2, '26-30', '31-35', '', 'Max ', 'Williams', '', 'Dancer', 'Singer', '1990-08-07', 'maxwilliams@email.com', '0553738945', 0, 0, '40 Wynyard Street', 'Gilmore', 2720, '', '', '', 'Partial nudity', '', 'Weekends', 'Some Experience', 'Leather', 'Black', 'Black', 'user-img/pexels-greta-hoffman-7675924.jpg', 'user-img/pexels-greta-hoffman-7675901.jpg', 'user-img/pexels-greta-hoffman-7675770.jpg', 'TV', 'TVC', 'Music Video', 'Drag Queen', 'Fashion', 'Stage'),
(111, 'Harvey Love', 'Gender-Neutral', 188, '', 'user-img/harveylove.jpg', 4, '18-25', '26-30', '31-35', 'Harvey', 'Davidson', '', 'Dancer', 'Languages', '1986-07-16', 'davidsonharvey@mail.com', '0527397012', 1, 1, '7 Meyer Road', 'Sunnydale', 5354, 'Left Bicep', '', '', 'Partial nudity', '', 'Flexible', 'Some Experience', 'Leather', 'Black', 'Black', 'user-img/pexels-cottonbro-4904525.jpg', 'user-img/pexels-cottonbro-4904569.jpg', 'user-img/pexels-cottonbro-4904448.jpg', 'Film', 'Music Video', '', 'Fashion', 'Stage', 'Actor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `modified`, `token`) VALUES
(2, 'testing', '$2y$10$DyzA7NeRGRPKfNUuUJdCzOILUCX0r6Etc8byTNrVqFvsTSfj/getC', 'testing@email.com', '2022-08-17 09:28:22', '2022-11-03 14:35:38', NULL),
(3, 'test', '$2y$10$Jnm6s0a7AWysMo/PFI9oJepiHE9DEnk9rOv1glNBro1Eu.Z.Fn/am', 'test@email.com', '2022-08-17 09:28:22', '2022-08-17 09:28:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_media_talent` (`talent_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talents`
--
ALTER TABLE `talents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_talent_location` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `talents`
--
ALTER TABLE `talents`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `fk_media_talent` FOREIGN KEY (`talent_id`) REFERENCES `talents` (`id`);

--
-- Constraints for table `talents`
--
ALTER TABLE `talents`
  ADD CONSTRAINT `fk_talent_location` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
