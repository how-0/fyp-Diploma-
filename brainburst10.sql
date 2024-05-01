-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2024 at 10:04 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brainburst`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'abc@gmail.com', '12345'),
(2, 'brainburst@gmail.com', 'brainburst');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `ques_id` text NOT NULL,
  `ans_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ques_id`, `ans_id`) VALUES
('1000', '123'),
('1001', '122'),
('1002', '129'),
('1003', '124'),
('1004', '121'),
('1005', '130'),
('1006', '131'),
('1007', '132'),
('1008', '133'),
('1009', '134'),
('1010', '135'),
('1011', '136'),
('1012', '137'),
('1013', '138'),
('1014', '139'),
('1015', '140'),
('1016', '141'),
('6620abf261387', '6620abf261dcc'),
('6620abf264ae5', '6620abf264f31'),
('6620abf266462', '6620abf266906'),
('6620adb740223', '6620adb74077c'),
('6620adb742187', '6620adb74265e'),
('6620adb743c78', '6620adb744116'),
('6620af86e74ad', '6620af86e7af0'),
('6620af86e99cc', '6620af86e9f62'),
('6620af86eb773', '6620af86ebc4e'),
('6620bb09383a7', '6620bb0938ab9'),
('6620bb093a78a', '6620bb093ac17'),
('6620bb093bf7f', '6620bb093c360'),
('6620bb6ed8dce', '6620bb6ed90d2'),
('6620bb6edbf98', '6620bb6edc4af'),
('6620bcbf9379f', '6620bcbf93b29'),
('6620bda7988d4', '6620bda798d95'),
('6620bdf53fced', '6620bdf540264'),
('6620bdf54531b', '6620bdf5457f0'),
('6620bdf546c52', '6620bdf54700d'),
('6621e80d3b799', '6621e80d3b9d2'),
('6621f9a15899e', '6621f9a158c14'),
('6621faa72e2bd', '6621faa72e44a'),
('6621fae6720ed', '6621fae672342'),
('6621fae674692', '6621fae674946'),
('6621fcdac9246', '6621fcdac94c4'),
('6621fcdaca604', '6621fcdaca8d0'),
('6621fd2e97dcb', '6621fd2e9802d'),
('6621fd2e98fe7', '6621fd2e99277'),
('6621fd5a68060', '6621fd5a682ac'),
('6622797ca91f8', '6622797ca9485'),
('6622797caa5b5', '6622797caa85d'),
('66227aa424c6d', '66227aa424e70'),
('66227aa425ddd', '66227aa426097'),
('6622a3d38d632', '6622a3d38d8fa'),
('6622a3d392fee', '6622a3d39330b'),
('6622a3d394199', '6622a3d39450f'),
('66234af82c9cd', '66234af82cb8a'),
('66266bbad2f4d', '66266bbad31d0'),
('66266bbad6749', '66266bbad69ce');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `quiz_id` int(6) NOT NULL AUTO_INCREMENT,
  `quiz_category` varchar(255) NOT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`quiz_id`, `quiz_category`) VALUES
(1, 'Computer Sciencee'),
(2, 'Mathematics'),
(3, 'Geography'),
(4, 'History'),
(5, 'Technology'),
(6, 'Science'),
(7, 'Sports'),
(8, 'Movies'),
(9, 'Music'),
(10, 'Languages'),
(11, 'General Knowledge'),
(12, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('55846be776610', 'testing', 'sunnygkp10@gmail.com', 'testing', 'testing stART', '2015-06-19', '09:22:15pm'),
('5584ddd0da0ab', 'netcamp', 'sunnygkp10@gmail.com', 'feedback', ';mLBLB', '2015-06-20', '05:28:16am'),
('558510a8a1234', 'sunnygkp10', 'sunnygkp10@gmail.com', 'dl;dsnklfn', 'fmdsfld fdj', '2015-06-20', '09:05:12am'),
('5585509097ae2', 'sunny', 'sunnygkp10@gmail.com', 'kcsncsk', 'l.mdsavn', '2015-06-20', '01:37:52pm'),
('5586ee27af2c9', 'vikas', 'vikas@gmail.com', 'trial feedback', 'triaal feedbak', '2015-06-21', '07:02:31pm'),
('5589858b6c43b', 'nik', 'nik1@gmail.com', 'good', 'good site', '2015-06-23', '06:12:59pm');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `email` varchar(50) NOT NULL,
  `e_id` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `e_id`, `score`, `level`, `correct`, `wrong`, `date`) VALUES
('sunnygkp10@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2015-06-23 09:31:02'),
('sunnygkp10@gmail.com', '558920ff906b8', 4, 2, 2, 0, '2015-06-23 13:31:45'),
('avantika420@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2015-06-23 14:32:40'),
('avantika420@gmail.com', '5589222f16b93', 4, 2, 2, 0, '2015-06-23 14:49:15'),
('sunnygkp10@gmail.com', '5589741f9ed52', 4, 5, 3, 2, '2015-06-23 15:06:52'),
('mi5@hollywood.com', '5589222f16b93', 4, 2, 2, 0, '2015-06-23 15:12:32'),
('nik1@gmail.com', '558921841f1ec', 1, 2, 1, 1, '2015-06-23 16:11:26'),
('sunnygkp10@gmail.com', '5589222f16b93', 1, 2, 1, 1, '2015-06-24 03:22:14'),
('123@gmail.com', '5589222f16b93', -2, 2, 2, 2, '2024-04-16 12:25:37'),
('123@gmail.com', '5589222f16b93', -2, 2, 0, 2, '2024-04-16 12:25:37'),
('123@gmail.com', '5589222f16b93', -2, 2, 0, 2, '2024-04-16 12:25:37'),
('', '558922ec03021', -2, 2, 0, 2, '2024-04-16 12:45:16'),
('', '55897338a6659', -5, 5, 0, 5, '2024-04-16 13:42:25'),
('', '5589741f9ed52', -2, 5, 1, 4, '2024-04-16 13:49:34'),
('', '558921841f1ec', 4, 2, 2, 0, '2024-04-16 14:10:43'),
('', '558920ff906b8', -2, 2, 0, 2, '2024-04-16 14:17:15'),
('123@gmail.com', '558920ff906b8', -2, 2, 0, 2, '2024-04-16 15:29:06'),
('123@gmail.com', '5589741f9ed52', -2, 5, 1, 4, '2024-04-16 15:29:11'),
('abc@gmail.com', '558921841f1ec', -2, 2, 0, 2, '2024-04-17 04:39:09'),
('dsfsdededf@sdeddfnk.com', '558920ff906b8', 1, 2, 1, 1, '2024-04-18 01:49:28'),
('123@gmail.com', '558921841f1ec', -2, 2, 0, 2, '2024-04-18 02:42:20'),
('brainburst@gmail.com', '6620bd9c6228c', 1, 1, 1, 0, '2024-04-19 03:44:58'),
('brainburst@gmail.com', '6620bdc8dc476', -3, 3, 0, 3, '2024-04-19 04:36:04'),
('brainburst@gmail.com', '66234acccea36', 1, 1, 1, 0, '2024-04-20 04:56:06'),
('abc@gmail.com', '66234acccea36', 1, 1, 1, 0, '2024-04-20 18:23:45'),
('abc@gmail.com', '6625b50d16fca', 1, 1, 1, 0, '2024-04-22 12:57:24'),
('abc@gmail.com', '6620bdc8dc476', -1, 3, 1, 2, '2024-04-22 12:57:45'),
('abc@gmail.com', '66266b8c89309', -2, 2, 0, 2, '2024-04-22 13:56:11'),
('brainburst@gmail.com', '66266b8c89309', 0, 2, 1, 1, '2024-04-22 14:06:35'),
('brainburst@gmail.com', '6625b6cb79478', 2, 2, 2, 0, '2024-04-22 14:12:53'),
('abc@gmail.com', '558920ff906b8', 0, 2, 1, 2, '2024-04-22 15:46:43'),
('abc@gmail.com', '5589741f9ed52', -2, 5, 1, 4, '2024-04-23 10:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `ques_id` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `option_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`ques_id`, `option`, `option_id`) VALUES
('1000', 'usermod', '123'),
('1000', 'useradd', '55892169d2f05'),
('1000', 'useralter', '55892169d2f09'),
('1000', 'groupmod', '55892169d2f0c'),
('1001', '751', '5589216a48713'),
('1001', '752', '5589216a4871a'),
('1001', '754', '5589216a4871f'),
('1001', '755', '122'),
('1002', 'echo', '129'),
('1002', 'print', '558922119525a'),
('1002', 'printf', '5589221195265'),
('1002', 'cout', '5589221195270'),
('1003', 'int a', '55892211f1f97'),
('1003', '$a', '124'),
('1003', 'long int a', '55892211f1fb4'),
('1003', 'int a$', '55892211f1fbd'),
('1004', 'cin>>a;', '121'),
('1004', 'cin<<a;', '558922895ea26'),
('1004', 'cout>>a;', '558922895ea34'),
('1004', 'cout<a;', '558922895ea41'),
('1005', 'cout', '130'),
('1005', 'cin', '55892289aa7df'),
('1005', 'print', '55892289aa7eb'),
('1005', 'printf', '55892289aa7f5'),
('1006', '255.0.0.0', '131'),
('1006', '255.255.255.0', '558923539a480'),
('1006', '255.255.0.0', '558923539a48b'),
('1006', 'none of these', '558923539a495'),
('1007', '192.168.1.100', '5589235405192'),
('1007', '172.168.16.2', '55892354051a3'),
('1007', '10.0.0.0.1', '55892354051b4'),
('1007', '11.11.11.11', '132'),
('1008', 'containing root file-system required during bootup', '558973f462e44'),
('1008', ' Contains only scripts to be executed during bootup', '558973f462e56'),
('1008', ' Contains root-file system and drivers required to be preloaded during bootup', '133'),
('1008', 'None of the above', '558973f462e6b'),
('1009', 'Kernel', '134'),
('1009', 'Shell', '558973f4d4acf'),
('1009', 'Commands', '558973f4d4ad9'),
('1009', 'Script', '558973f4d4ae3'),
('1010', 'Boot Loading', '558973f526f9d'),
('1010', ' Boot Record', '558973f526fb9'),
('1010', ' Boot Strapping', '135'),
('1010', ' Booting', '558973f526fce'),
('1011', ' Quick boot', '558973f57aef1'),
('1011', 'Cold boot', '136'),
('1011', ' Hot boot', '558973f57af17'),
('1011', ' Fast boot', '558973f57af27'),
('1012', 'bash', '558973f5e7623'),
('1012', ' Csh', '558973f5e7636'),
('1012', ' ksh', '558973f5e7640'),
('1012', ' sh', '137'),
('1013', 'q', '5589751a81bd6'),
('1013', 'wq', '5589751a81be8'),
('1013', ' both (a) and (b)', '138'),
('1013', ' none of the mentioned', '5589751a81bfd'),
('1014', ' moves screen down one page', '139'),
('1014', 'moves screen up one page', '5589751adbdce'),
('1014', 'moves screen up one line', '5589751adbdd8'),
('1014', ' moves screen down one line', '5589751adbde2'),
('1015', ' yy', '140'),
('1015', 'yw', '5589751b3b05e'),
('1015', 'yc', '5589751b3b069'),
('1015', ' none of the mentioned', '5589751b3b073'),
('1016', 'X', '141'),
('1016', 'x', '5589751b9a9a5'),
('1016', 'D', '5589751b9a9b7'),
('1016', 'd', '5589751b9a9c9'),
('5589751bd02ec', 'autoindentation is not possible in vi editor', '5589751bdadaa'),
('6620abf261387', '1', '6620abf261dc6'),
('6620abf261387', '2', '6620abf261dcc'),
('6620abf261387', '3', '6620abf261dd0'),
('6620abf261387', '10', '6620abf261dd1'),
('6620abf264ae5', '4', '6620abf264f31'),
('6620abf264ae5', '10', '6620abf264f35'),
('6620abf264ae5', '2', '6620abf264f36'),
('6620abf264ae5', '1', '6620abf264f38'),
('6620abf266462', '10', '6620abf266901'),
('6620abf266462', '0', '6620abf266905'),
('6620abf266462', '20', '6620abf266906'),
('6620abf266462', '100', '6620abf266907'),
('6620adb740223', 'Final Year Project', '6620adb74077c'),
('6620adb740223', 'Dont know', '6620adb740782'),
('6620adb740223', 'Fear your project', '6620adb740784'),
('6620adb740223', 'Not of all above', '6620adb740787'),
('6620adb742187', 'Kdc', '6620adb742659'),
('6620adb742187', 'Kentucky Fried Chicken', '6620adb74265e'),
('6620adb742187', 'dc', '6620adb742660'),
('6620adb742187', 'dc', '6620adb742662'),
('6620adb743c78', 'McDonald', '6620adb744116'),
('6620adb743c78', '123', '6620adb74411b'),
('6620adb743c78', '12345', '6620adb74411d'),
('6620adb743c78', 'abc', '6620adb74411e'),
('6620af86e74ad', '1', '6620af86e7ae9'),
('6620af86e74ad', '2', '6620af86e7af0'),
('6620af86e74ad', '3', '6620af86e7af3'),
('6620af86e74ad', '4', '6620af86e7af5'),
('6620af86e99cc', '1', '6620af86e9f57'),
('6620af86e99cc', '2', '6620af86e9f5e'),
('6620af86e99cc', '3', '6620af86e9f60'),
('6620af86e99cc', '4', '6620af86e9f62'),
('6620af86eb773', '1', '6620af86ebc48'),
('6620af86eb773', '12', '6620af86ebc4c'),
('6620af86eb773', '100', '6620af86ebc4d'),
('6620af86eb773', '20', '6620af86ebc4e'),
('6620bb09383a7', '1', '6620bb0938ab6'),
('6620bb09383a7', '2', '6620bb0938ab9'),
('6620bb09383a7', '3', '6620bb0938abb'),
('6620bb09383a7', '4', '6620bb0938abc'),
('6620bb093a78a', '1', '6620bb093ac0f'),
('6620bb093a78a', '2', '6620bb093ac13'),
('6620bb093a78a', '3', '6620bb093ac15'),
('6620bb093a78a', '4', '6620bb093ac17'),
('6620bb093bf7f', '1', '6620bb093c35a'),
('6620bb093bf7f', '3', '6620bb093c35d'),
('6620bb093bf7f', '5', '6620bb093c35f'),
('6620bb093bf7f', '10', '6620bb093c360'),
('6620bb6ed8dce', '123', '6620bb6ed90d2'),
('6620bb6ed8dce', '234', '6620bb6ed90d6'),
('6620bb6ed8dce', '567', '6620bb6ed90d7'),
('6620bb6ed8dce', '234', '6620bb6ed90d9'),
('6620bb6edbf98', '123', '6620bb6edc4aa'),
('6620bb6edbf98', '234', '6620bb6edc4af'),
('6620bb6edbf98', '567', '6620bb6edc4b0'),
('6620bb6edbf98', '789', '6620bb6edc4b1'),
('6620bcbf9379f', '1', '6620bcbf93b25'),
('6620bcbf9379f', '2', '6620bcbf93b29'),
('6620bcbf9379f', '3', '6620bcbf93b2b'),
('6620bcbf9379f', '4', '6620bcbf93b2c'),
('6620bda7988d4', '123', '6620bda798d95'),
('6620bda7988d4', '345', '6620bda798d99'),
('6620bda7988d4', '567', '6620bda798d9b'),
('6620bda7988d4', '567', '6620bda798d9c'),
('6620bdf53fced', '1', '6620bdf54025e'),
('6620bdf53fced', '2', '6620bdf540264'),
('6620bdf53fced', '3', '6620bdf540266'),
('6620bdf53fced', '4', '6620bdf540268'),
('6620bdf54531b', '1', '6620bdf5457e8'),
('6620bdf54531b', '2', '6620bdf5457ec'),
('6620bdf54531b', '3', '6620bdf5457ee'),
('6620bdf54531b', '4', '6620bdf5457f0'),
('6620bdf546c52', '1', '6620bdf54700a'),
('6620bdf546c52', '5', '6620bdf54700c'),
('6620bdf546c52', '10', '6620bdf54700d'),
('6620bdf546c52', '20', '6620bdf54700e'),
('6621e80d3b799', '123', '6621e80d3b9d2'),
('6621e80d3b799', '11', '6621e80d3b9d4'),
('6621e80d3b799', '11111', '6621e80d3b9d4'),
('6621e80d3b799', '11111', '6621e80d3b9d5'),
('6621f9a15899e', '123', '6621f9a158c14'),
('6621f9a15899e', '1', '6621f9a158c16'),
('6621f9a15899e', '1', '6621f9a158c17'),
('6621f9a15899e', '1', '6621f9a158c17'),
('6621faa72e2bd', '123', '6621faa72e44a'),
('6621faa72e2bd', '1', '6621faa72e44c'),
('6621faa72e2bd', '1', '6621faa72e44d'),
('6621faa72e2bd', '1', '6621faa72e44d'),
('6621fae6720ed', 'ABC', '6621fae672342'),
('6621fae6720ed', '1', '6621fae672344'),
('6621fae6720ed', '2', '6621fae672345'),
('6621fae6720ed', '3', '6621fae672345'),
('6621fae674692', 'QWE', '6621fae674946'),
('6621fae674692', '1', '6621fae674949'),
('6621fae674692', '2', '6621fae674949'),
('6621fae674692', '3', '6621fae67494a'),
('6621fcdac9246', '123', '6621fcdac94c4'),
('6621fcdac9246', '1', '6621fcdac94c6'),
('6621fcdac9246', '1', '6621fcdac94c7'),
('6621fcdac9246', '1', '6621fcdac94c7'),
('6621fcdaca604', '12345', '6621fcdaca8d0'),
('6621fcdaca604', '1', '6621fcdaca8d2'),
('6621fcdaca604', '1', '6621fcdaca8d3'),
('6621fcdaca604', '1', '6621fcdaca8d4'),
('6621fd2e97dcb', '789', '6621fd2e9802d'),
('6621fd2e97dcb', '1', '6621fd2e98030'),
('6621fd2e97dcb', '1', '6621fd2e98031'),
('6621fd2e97dcb', '1', '6621fd2e98032'),
('6621fd2e98fe7', 'qwer', '6621fd2e99277'),
('6621fd2e98fe7', '1', '6621fd2e99278'),
('6621fd2e98fe7', '1', '6621fd2e99278'),
('6621fd2e98fe7', '1', '6621fd2e99279'),
('6621fd5a68060', '123', '6621fd5a682ac'),
('6621fd5a68060', '1', '6621fd5a682af'),
('6621fd5a68060', '1', '6621fd5a682b0'),
('6621fd5a68060', '1', '6621fd5a682b1'),
('6622797ca91f8', '123', '6622797ca9485'),
('6622797ca91f8', '1', '6622797ca9486'),
('6622797ca91f8', '1', '6622797ca9487'),
('6622797ca91f8', '1', '6622797ca9488'),
('6622797caa5b5', '1', '6622797caa85b'),
('6622797caa5b5', '1', '6622797caa85c'),
('6622797caa5b5', '1', '6622797caa85d'),
('6622797caa5b5', '123', '6622797caa85d'),
('66227aa424c6d', '123', '66227aa424e70'),
('66227aa424c6d', '1', '66227aa424e72'),
('66227aa424c6d', '1', '66227aa424e72'),
('66227aa424c6d', '1', '66227aa424e73'),
('66227aa425ddd', '123', '66227aa426097'),
('66227aa425ddd', '1', '66227aa426099'),
('66227aa425ddd', '1', '66227aa426099'),
('66227aa425ddd', '1', '66227aa42609a'),
('6622a3d38d632', '123', '6622a3d38d8fa'),
('6622a3d38d632', '1', '6622a3d38d8fb'),
('6622a3d38d632', '1', '6622a3d38d8fc'),
('6622a3d38d632', '1', '6622a3d38d8fd'),
('6622a3d392fee', '123', '6622a3d39330b'),
('6622a3d392fee', '1', '6622a3d39330c'),
('6622a3d392fee', '1', '6622a3d39330d'),
('6622a3d392fee', '1', '6622a3d39330d'),
('6622a3d394199', '123', '6622a3d39450f'),
('6622a3d394199', '1', '6622a3d394511'),
('6622a3d394199', '1', '6622a3d394512'),
('6622a3d394199', '1', '6622a3d394513'),
('66234af82c9cd', 'Malaysia', '66234af82cb8a'),
('66234af82c9cd', 'Mine', '66234af82cb8c'),
('66234af82c9cd', 'Me', '66234af82cb8c'),
('66234af82c9cd', 'My', '66234af82cb8d'),
('66266bbad2f4d', 'Lee Chong Wei', '66266bbad31d0'),
('66266bbad2f4d', 'LCC', '66266bbad31d1'),
('66266bbad2f4d', 'LWW', '66266bbad31d1'),
('66266bbad2f4d', 'LCE', '66266bbad31d2'),
('66266bbad6749', 'LSS', '66266bbad69cc'),
('66266bbad6749', 'LSS', '66266bbad69cd'),
('66266bbad6749', 'Lee Zii Zia', '66266bbad69cd'),
('66266bbad6749', 'Lee Zii Jia', '66266bbad69ce');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `e_id` text NOT NULL,
  `ques_id` text NOT NULL,
  `quest` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`e_id`, `ques_id`, `quest`, `choice`, `sn`) VALUES
('558920ff906b8', '1000', 'what is command for changing user information??', 4, 1),
('558920ff906b8', '1001', 'what is permission for view only for other??', 4, 2),
('558921841f1ec', '1002', 'what is command for print in php??', 4, 1),
('558921841f1ec', '1003', 'which is a variable of php??', 4, 2),
('5589222f16b93', '1004', 'what is correct statement in c++??', 4, 1),
('5589222f16b93', '1005', 'which command is use for print the output in c++?', 4, 2),
('558922ec03021', '1006', 'what is correct mask for A class IP???', 4, 1),
('558922ec03021', '1007', 'which is not a private IP??', 4, 2),
('55897338a6659', '1008', 'On Linux, initrd is a file', 4, 1),
('55897338a6659', '1009', 'Which is loaded into memory when system is booted?', 4, 2),
('55897338a6659', '1010', ' The process of starting up a computer is known as', 4, 3),
('55897338a6659', '1011', ' Bootstrapping is also known as', 4, 4),
('55897338a6659', '1012', 'The shell used for Single user mode shell is:', 4, 5),
('5589741f9ed52', '1013', ' Which command is used to close the vi editor?', 4, 1),
('5589741f9ed52', '1014', ' In vi editor, the key combination CTRL+f', 4, 2),
('5589741f9ed52', '1015', ' Which vi editor command copies the current line of the file?', 4, 3),
('5589741f9ed52', '1016', ' Which command is used to delete the character before the cursor location in vi editor?', 4, 4),
('5589741f9ed52', '5589751bd02ec', ' Which one of the following statement is true?', 4, 5),
('6620abb24b85f', '6620abf261387', '', 4, 1),
('6620abb24b85f', '6620abf264ae5', '', 4, 2),
('6620abb24b85f', '6620abf266462', '', 4, 3),
('6620ac52ca8ee', '6620adb740223', '', 4, 1),
('6620ac52ca8ee', '6620adb742187', '', 4, 2),
('6620ac52ca8ee', '6620adb743c78', '', 4, 3),
('6620af5bb3bfd', '6620af86e74ad', '', 4, 1),
('6620af5bb3bfd', '6620af86e99cc', '', 4, 2),
('6620af5bb3bfd', '6620af86eb773', '', 4, 3),
('6620badb65257', '6620bb09383a7', '1 + 1 =', 4, 1),
('6620badb65257', '6620bb093a78a', '2 + 2 =', 4, 2),
('6620badb65257', '6620bb093bf7f', '5 + 5 =', 4, 3),
('6620bb4e862c9', '6620bb6ed8dce', '123', 4, 1),
('6620bb4e862c9', '6620bb6edbf98', '234', 4, 2),
('6620bcafbe754', '6620bcbf9379f', '1 plus 1', 4, 1),
('6620bd9c6228c', '6620bda7988d4', '123', 4, 1),
('6620bdc8dc476', '6620bdf53fced', '1 + 1 =', 4, 1),
('6620bdc8dc476', '6620bdf54531b', '2 + 2 =', 4, 2),
('6620bdc8dc476', '6620bdf546c52', '5 + 5 =', 4, 3),
('6621e800504eb', '6621e80d3b799', '123', 4, 1),
('6621f99c41084', '6621f9a15899e', '123', 4, 1),
('6621faa2decd4', '6621faa72e2bd', '123', 4, 1),
('6621fad7373f6', '6621fae6720ed', 'ABC', 4, 1),
('6621fad7373f6', '6621fae674692', 'QWE', 4, 2),
('6621fccede017', '6621fcdac9246', '123', 4, 1),
('6621fccede017', '6621fcdaca604', '12345', 4, 2),
('6621fd1a115a5', '6621fd2e97dcb', '789', 4, 1),
('6621fd1a115a5', '6621fd2e98fe7', 'qwer', 4, 2),
('6621fd54c3ef6', '6621fd5a68060', '123', 4, 1),
('6622796c95530', '6622797ca91f8', '123', 4, 1),
('6622796c95530', '6622797caa5b5', '123', 4, 2),
('66227a913f1ea', '66227aa424c6d', '123', 4, 1),
('66227a913f1ea', '66227aa425ddd', '123', 4, 2),
('6622a3c1ba75c', '6622a3d38d632', '123', 4, 1),
('6622a3c1ba75c', '6622a3d392fee', '123', 4, 2),
('6622a3c1ba75c', '6622a3d394199', '123', 4, 3),
('66234acccea36', '66234af82c9cd', 'What does "my" in website means?', 4, 1),
('66266b8c89309', '66266bbad2f4d', 'Who is LCW', 4, 1),
('66266b8c89309', '66266bbad6749', 'Who is LZJ', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `e_id` text NOT NULL,
  `quiz_code` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `quiz_id` int(5) NOT NULL,
  `quiz_category` varchar(255) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`quiz_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6630 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`e_id`, `quiz_code`, `title`, `quiz_id`, `quiz_category`, `correct`, `wrong`, `total`, `time`, `date`) VALUES
('558920ff906b8', 2001, 'Computer Science', 1, 'Computer Sciencee', 2, 1, 2, 5, '2024-04-23 07:12:36'),
('558921841f1ec', 2002, 'Php Coding', 1, 'Computer Sciencee', 2, 1, 2, 5, '2024-04-23 07:12:36'),
('5589222f16b93', 2003, 'C++ Coding', 1, 'Computer Sciencee', 2, 1, 2, 5, '2024-04-23 07:12:36'),
('558922ec03021', 2004, 'Networking', 1, 'Computer Sciencee', 2, 1, 2, 5, '2024-04-23 07:12:36'),
('55897338a6659', 2005, 'Science', 3, 'Geography', 2, 1, 5, 10, '2024-04-22 00:33:36'),
('5589741f9ed52', 2006, 'Mathematics', 2, 'Mathematics', 2, 1, 5, 10, '2024-04-22 00:33:46'),
('6620bd9c6228c', 2007, 'Qwe', 3, 'Geography', 1, 1, 1, 0, '2024-04-22 00:33:50'),
('6620bdc8dc476', 2008, 'Simple Mathamatics', 2, 'Mathematics', 1, 1, 3, 0, '2024-04-22 00:33:56'),
('6622a38663410', 2026, 'Xcv', 2, 'Mathematics', 1, 1, 2, 0, '2024-04-22 00:35:21'),
('6622a3c1ba75c', 2027, 'Geo', 3, 'Geography', 1, 1, 3, 0, '2024-04-22 00:35:25'),
('6622a57bc62ff', 2028, '1', 1, 'Computer Sciencee', 1, 1, 1, 0, '2024-04-23 07:12:36'),
('66234a9446221', 2029, 'Maths', 2, 'Mathematics', 1, 1, 123, 0, '2024-04-22 00:35:33'),
('66234acccea36', 2030, 'Ge', 3, 'Geography', 1, 1, 1, 0, '2024-04-22 00:35:38'),
('6625b50d16fca', 6625, 'Aaa', 1, 'Computer Sciencee', 1, 1, 2, 0, '2024-04-23 07:12:36'),
('6625b6aede58a', 6626, 'Bbb', 2, 'Mathematics', 1, 1, 2, 0, '2024-04-22 01:00:06'),
('6625b6cb79478', 6627, 'History', 4, 'History', 1, 1, 2, 0, '2024-04-22 01:00:35'),
('662668a4d5ca1', 6628, 'Jk', 3, 'Geography', 1, 1, 2, 0, '2024-04-22 13:39:24'),
('66266b8c89309', 6629, 'Sports', 7, 'Sports', 1, 1, 2, 0, '2024-04-22 13:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('sunnygkp10@gmail.com', 9, '2015-06-24 03:22:14'),
('avantika420@gmail.com', 8, '2015-06-23 14:49:15'),
('mi5@hollywood.com', 4, '2015-06-23 15:12:32'),
('nik1@gmail.com', 1, '2015-06-23 16:11:26'),
('123@gmail.com', -26, '2024-04-18 02:42:20'),
('', -7, '2024-04-16 14:17:15'),
('abc@gmail.com', -4, '2024-04-23 10:00:05'),
('dsfsdededf@sdeddfnk.com', 1, '2024-04-18 01:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `daily_goal` int(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `email`, `password`, `image`, `summary`, `daily_goal`) VALUES
('John', '-', 'abc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'C:/xampp/htdocs/brainburst/uploads/depositphotos_655727758-stock-photo-organ-donation-charity-volunteer-giving.jpg', 'wer', 7),
('Avantika', 'F', 'avantika420@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0),
('Sd', 'M', 'dsfsdededf@sdeddfnk.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 0),
('Tom Cruze', 'M', 'mi5@hollywood.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0),
('Netcamp', 'M', 'netcamp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0),
('Nikunj', 'M', 'nik1@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', 0),
('Sd', 'M', 'sadfasdfa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 0),
('Sunny', 'M', 'sunnygkp10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0),
('User', 'M', 'user@user.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0),
('Vikash', 'M', 'vikash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
