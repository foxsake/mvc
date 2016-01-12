-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2015 at 02:24 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Nation'),
(3, 'Business'),
(4, 'Weather'),
(5, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `userid`, `postid`, `comment`, `date`) VALUES
(1, 4, 1, 'adadadadada', '2015-12-15 09:15:18'),
(2, 4, 1, 'comment', '2015-12-15 10:20:39'),
(3, 4, 1, 'another', '2015-12-15 10:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `postid`, `image`) VALUES
(7, 9, '650688_1450227149.jpeg'),
(8, 10, '362766_1450227256.png'),
(9, 11, '210188_1450227299.png'),
(10, 12, '825963_1450227350.jpeg'),
(11, 13, '924351_1450227403.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `categoryid`, `title`, `content`, `posted`) VALUES
(9, 1, 'Six U.K. Teens Arrested for using Lizard Squad''s DDoS Tool', 'Six British teenagers arrested and released on bail on suspicion of launching cyber attacks on websites and services with the help of Lizard Squad DDoS attack tool, called Lizard Stresser. Lizard Squad is infamous for hacking and knocking down the largest online gaming networks â€“ PlayStation Network and Xbox Live â€“ last year by launching massive Distributed Denial-of-Service (DDoS) attacks. The notorious hacker group set up a website to let customers use its Lizard-branded DDoS-for-hire tool Lizard Stresser to launch similar DDoS attacks.\r\nThe six teens, arrested by the National Crime Agency, are accused of using Lizard Stresser DDoS tool to launch cyber attacks against a school, a national newspaper, gaming companies and a number of online retailers. However, according to the law enforcement, none of the teenagers are believed to be the member of Lizard Squad, nor had any connection with the last year''s Christmas hack against Sony and Microsoft''s gaming services. It is alleged that all the six suspects are accused of buying the DDoS tool using alternative payment services, like Bitcoin.', '2015-12-16 00:52:29'),
(10, 1, 'BitTorrent Fixes Reflective DDoS Attack Security Flaw', 'Two weeks ago, we reported how a serious flaw in the popular peer-to-peer BitTorrent file sharing protocols could be exploited to carry out a devastating distributed denial of service (DDoS) attack, allowing lone hackers with limited resources to take down large websites.\r\n                    Good news is that the developers of BitTorrent have fixed the security issue in its service that is being used by hundreds of Millions of users worldwide.\r\n                    In a blog post published Thursday, BitTorrent announced that the flaw was resided in a reference implementation of the Micro Transport Protocol (uTP) called libuTP, which is used by many widely used BitTorrent clients such as Î¼Torrent, Vuze and Mainline.\r\n                    The San Francisco company also announced that it has rolled out a patch for its libuTP software that will stop miscreants from abusing the p2p protocol to conduct Distributed Reflective Denial-of-Service (DRDoS) attacks.\r\n                    DRDoS attack is a more sophisticated form of conventional DDoS attack where open and misconfigured DNS (Domain Name System) can be used by anyone to launch high-bandwidth DDoS attacks on the target websites.\r\n                    The vulnerability was made public two weeks ago by a research team led by Florian Adamsky of the City University London.\r\n                    The researcher showed how an attacker could send malicious data to vulnerable BitTorrent applications to flood a third-party target with data traffic of up to a factor of 120 times bigger than the original request.\r\n                    Just by replacing the attacker''s IP address in the malicious User Datagram Protocol (UDP) packet with the spoofed IP address of the target, a hacker could flood the target server with data traffic, effectively making it offline.', '2015-12-16 00:54:15'),
(11, 1, 'Warning! How Hackers Could Hijack Your Facebook Fan Page With This Trick', 'Facebook bounty hunter Laxman Muthiyah from India has recently discovered his third bug of this year in the widely popular social network website that just made a new record by touching 1 Billion users in a single day.\r\n                    At the beginning of the year, Laxman discovered a serious flaw in Facebook graphs that allowed him to view or probably delete others photo album on Facebook, even without having authentication.\r\n                    Just after a month, Laxman uncovered another critical vulnerability in the social network platform that resided in the Facebook Photo Sync feature, that automatically uploads photos from your mobile device to a private Facebook album, which isnâ€™t visible to any of your Facebook friends or other Facebook users.\r\n                    However, the flaw discovered by Laxman could allowed any third-party app to access and steal your personal photographs from the hidden Facebook Photo Sync album.', '2015-12-16 00:54:59'),
(12, 1, 'Mark''s Milestone: 1 Billion People Uses Facebook in A Single Day', 'Yesterday, Facebook Co-founder and Chairman Mark Zuckerberg broadcast in his Facebook post, that Monday Facebook made a record by counting ONE BILLION people accessing Facebook in a single day.\r\n                    Zuckerberg shared his happiness and thanked the world. He was overwhelmed with the milestone Facebook has touched and even shared a video expressing his emotions.\r\n                    "[Facebook] just passed an important milestone," Zuckerberg wrote in a Facebook post on Thursday. "For the first time ever, one billion people used Facebook in a single day."\r\n                    That means roughly 1 in 7 people on Earth connected with their friends and family using Facebook in a single day.', '2015-12-16 00:55:50'),
(13, 1, 'Disgusting! Ashley Madison was Building an App â€“ What''s your Wife Worth?', 'We could expect Ashley Madison to cross any limits when it comes to cheating, but this is WORSE.\r\n                    After all the revelations made by the Impact Team past week, this was something different from the leaked data that had names, password and other details of Ashley Madison clients.\r\n                    A dump from the leaked files unfold awful strategy of Avid Life Media (ALM), Ashley Madison''s parent company, to launch an app called "What''s your wife worth."\r\n                    As the name says it all, the app allows men to Rate each others Wives.', '2015-12-16 00:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `banner` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`banner`, `background`, `theme`, `layout`) VALUES
('617313_1450192679.jpeg', '', 'theme1.css', 'index1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `admin`, `banned`) VALUES
(1, 'admin', '$1$UxKUXtS1$e.IIj9HdzmGHTbMclz30S1', 1, 0),
(2, 'test', '$1$a.tyYVNs$BuZ4vYD/2WeSzCiz5cgZG1', 0, 1),
(3, 'test2', '$1$tKh8KrhF$dprmtmtCy3CUBArGKMw/e1', 0, 0),
(4, 'test3', '$1$yMKg362U$jOXWlS5CcnYl2R0acnLOJ.', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
