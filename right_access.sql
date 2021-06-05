-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 يونيو 2021 الساعة 23:17
-- إصدار الخادم: 10.4.17-MariaDB
-- PHP Version: 8.0.0
CREATE DATABASE right_access;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `right_access`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- بنية الجدول `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `hour` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `meetings`
--

INSERT INTO `meetings` (`id`, `user_id`, `project_id`, `date`, `hour`, `about`, `color`) VALUES
(10, 4, 2, '3-5-2021', ' 10:30Am ', '', ''),
(12, 4, 1, '10-6-2021', '2:00PM', '', ''),
(14, 2, 4, '2021-06-25', '14:30', 'check the content', 'green'),
(18, 10, 6, '2021-06-24', '18:09', 'editing', '#f00'),
(19, 10, 6, '2021-07-01', '14:20', 'design', '#00f');

-- --------------------------------------------------------

--
-- بنية الجدول `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `first_img` varchar(255) NOT NULL,
  `sec_img` varchar(255) NOT NULL,
  `third_img` varchar(255) NOT NULL,
  `en_catagory` varchar(255) NOT NULL,
  `en_description` varchar(1000) NOT NULL,
  `en_client` varchar(255) NOT NULL,
  `android_link` varchar(255) NOT NULL,
  `ios_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `portfolio`
--

INSERT INTO `portfolio` (`id`, `catagory`, `client`, `link`, `description`, `first_img`, `sec_img`, `third_img`, `en_catagory`, `en_description`, `en_client`, `android_link`, `ios_link`) VALUES
(1, 'المواقع', 'شركة AUS ', 'https://example.com', 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور\r\nأنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد\r\nأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس', 'Hd-Laptop-wallpapers.jpg', 'images (1).jpg', 'images (31).jpeg', 'Websites', 'Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius', 'AUS Company', '', ''),
(2, 'التطبيقات', 'شركة ويل', '', 'أنكاييديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد\r\nأكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات . ديواس\r\nأيوتي أريري دولار إن ريبريهينديرأيت فوليوبتاتي فيلايت أيسسي كايلليوم دولار أيو فيجايت\r\n', 'خلفيات-كمبيوتر-hd-2-1-648x405.jpg', 'خلفيات-كمبيوتر-hd-4-1.jpg', 'خلفيات-لاب-توب-hd-3-1-648x405.jpg', 'Apps', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', 'ًُWell Company', 'https://play.google.com/store/apps/details?id=com.facebook.katana&hl=ar&gl=US', 'https://apps.apple.com/us/app/facebook/id284882215');

-- --------------------------------------------------------

--
-- بنية الجدول `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `progress_num` int(11) NOT NULL,
  `progress_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `dead_line` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `projects`
--

INSERT INTO `projects` (`id`, `name`, `discription`, `progress_num`, `progress_name`, `user_id`, `start_time`, `dead_line`) VALUES
(1, 'تصميم موقع ', 'في هذه الخدمة سيتم عمل موقع الكتروني للشركة التابعة لك كما تم الاتفاق ', 30, 'مرحلة البرمجة', 4, '3/6/2021', '3/7/2021'),
(2, 'عمل تطبيق للموبايل', 'عمل تطبيق للموبايل للتعريف بالشركة وتقديم خدماتها', 15, 'كتابة المحتوي', 4, '2021-06-21', '2021-07-01'),
(4, 'Build a website', 'We will build a website for the company to introduce it and provide its services', 10, 'كتابة المحتوي', 2, '2021-06-15', '2021-07-03'),
(6, 'project1', 'وصف المشروع انشاء متجر الكتروني', 10, 'اتفاق علي المشروع ', 10, '2021-07-02', '2021-06-11');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_key` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'assets/img/users/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `phone`, `user_key`, `img`) VALUES
(1, 'ahmed marouf', 'ahmed@gmail.com', '12345678', '01093435545', '2483975hijlk;f7334iuyi4f5o', 'assets/img/users/default.png'),
(2, 'mohammed abdullah', 'mo@gmail.com', '123', ' 09786878', '43573i4uftdgfy43u623', 'assets/img/users/images (28).jpeg'),
(3, 'seif', 'seif@gmail.com', '22749nd83fd', '870898765465', '435tg66543426gyuf3j', 'assets/img/users/default.png'),
(4, 'ali', 'ali@gmail.com', '2343dmsfd', '324567567', 'rgthuhy564trwe3245t', 'assets/img/users/default.png'),
(5, 'ahmed mohammed', 'aaar432@gmail.com', '23984873', '01099903862', '3c3c14c6524a62e92ea7e08dd4e3dfa762efc5665633', 'assets/img/users/default.png'),
(6, 'alert(0)', 'e@mail.com', '123456789', 'alert(0)', 'ded2a934642cfce5752fa615c4e367a033366c26d8ee', 'assets/img/users/default.png'),
(7, 'test login', 'test@gmail.com', 'asdfghjk', '01928374', '043ea57dc6622f33da8f223c4ee6645ed695c76ae1c3', 'assets/img/users/default.png'),
(8, 'محمود معروف', 'mrwf088@gmail.com', '12345678', '01099903862', '66c3e685e3c6e75e633dc4dfd14caae223a496f25072', 'assets/img/users/default.png'),
(9, 'محمود معروف', 'mrwf0088@gmail.com', '12345678', '01099903862', 'ded46345fe36e22e831c655ca32f66a40ecd7a6c7329', 'assets/img/users/images (29).jpeg'),
(10, 'mohamed123', 'mohamed1233@gmail.com', '123456789', '012336655478', '6636943dc41368743acd5fe75ecf62e2a65e2ad0c3e2', 'assets/img/users/1-1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
