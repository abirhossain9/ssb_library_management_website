-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 10:58 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 = inactive , 1= active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `parent_id`, `status`) VALUES
(1, 'Education', 'This is the education category', 0, 1),
(2, 'Sports', 'This is the sports category', 0, 1),
(3, 'Cricket', 'this is cricket sub categoy', 2, 1),
(4, 'High School', 'This is high school sub category under education category', 1, 1),
(5, 'Politics ', 'This is politics category', 0, 1),
(6, 'Fashion', 'This is fashion category', 0, 1),
(7, 'Football', 'This category is under sports category', 2, 1),
(8, 'International', 'This is an international category', 0, 1),
(9, 'Entertainment ', '<p>This is the entertainment category.&nbsp;</p>\r\n', 0, 1),
(10, 'Primary education', '<p>this is a subcategory under education.</p>\r\n', 1, 1),
(11, 'Technology', 'This is technology. That\'s it :)', 0, 1),
(12, 'National', '<p>this is national category</p>\r\n', 0, 1),
(13, 'History', '<p>This is&nbsp;the history category. and its primary</p>\r\n', 0, 1),
(15, 'Medical', '<p>The Bangladesh&nbsp;<em>Medical</em>&nbsp;&amp; Dental Council (BM&amp;&amp;DC) is a statutory body with ... of&nbsp;<em>medical</em>&nbsp;education and recognition of&nbsp;<em>medical</em>&nbsp;qualifications in Bangladesh.</p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cmt_desc` text NOT NULL,
  `status` int(2) NOT NULL COMMENT '1= active,\r\n2=inactive',
  `cmt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `adder_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = active, 2 = inactive',
  `image` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category_id`, `adder_id`, `author_name`, `tags`, `status`, `image`, `post_date`) VALUES
(7, 'Gray\'s Anatomy (Paperback)', '<p>The Anatomical Basis of Clinical Practice</p>\r\n', 15, 0, 'Standring Susan', 'medical,doctor', 1, '104100grays.jpg', '2021-07-02 22:42:14'),
(8, 'হ্যামলেট (হার্ডকভার)', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>\r\n', 13, 12, 'সৈয়দ শামসুল হক', 'হ্যামলেট', 1, '9018433324880.png', '2021-07-03 18:52:27'),
(9, '  Spoken English at home (hardcover)', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>\r\n', 8, 12, 'Munjerin Shaheed', 'Copperplate', 1, '1517452324069.png', '2021-07-03 19:01:40'),
(10, 'Mission Timbuktu', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>\r\n', 5, 12, 'Dale H Khan', 'Nalanda', 1, '2219864323954.png', '2021-07-03 19:04:51'),
(11, 'Grasshopper ', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>\r\n', 12, 12, 'Chamak Hasan', 'Ideal', 1, '12477325064.png', '2021-07-03 19:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 2 COMMENT '1= Active, \r\n2 = Inactive',
  `user_role` int(1) NOT NULL DEFAULT 3 COMMENT '1= Super Admin,\r\n2= Editor,\r\n3= Users',
  `join_date` date NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `password`, `phone`, `address`, `status`, `user_role`, `join_date`, `image`) VALUES
(1, 'Md Abir Hossain', 'abir_hossain', 'abir.hossain04@northsouth.edu', '6df73cc169278dd6daab5fe7d6cacb1fed537131', '01624358055', 'Basundhara,Dhaka', 1, 2, '2021-05-29', '528977FILE0150 - Copy.jpeg'),
(11, 'Rinku', 'rinku123', 'rinku@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '01678945612', 'muradpur,dhaka', 1, 2, '2021-06-09', '2640629mama.jpg'),
(12, 'Abir Hossain', 'abir123', 'abirhasan282@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0161111111', 'house 169, road 08, block G', 1, 1, '2021-06-09', '504591profile.jpeg'),
(14, 'Raz Hossain', 'raz123', 'Raz@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, 2, 3, '2021-06-11', NULL),
(15, 'Sakil ahmed', 'sakil123', 'sakil@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, NULL, 2, 3, '2021-06-11', NULL),
(16, 'Emam Hossain', 'emam123', 'Emam@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, NULL, 2, 3, '2021-06-11', NULL),
(17, 'Rakib ahmed', 'Rakib123', 'rakib123@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, NULL, 2, 3, '2021-06-11', NULL),
(18, 'rakin ahmed', 'rakin123', 'rakin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, 2, 3, '2021-06-11', NULL),
(19, 'Akash Mia', 'akash1', 'akash123@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, NULL, 2, 3, '2021-06-11', NULL),
(20, 'Nazim ahmed', 'nazim123', 'Nazim@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0171234566', 'mipur,dhaka', 1, 3, '2021-06-11', NULL),
(21, 'Rifat Hossain', 'rifat1', 'rifat282@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0162431234', 'basundhara,dhaka', 1, 2, '2021-06-20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
