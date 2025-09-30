-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 12:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp_new`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add` ()  BEGIN
DECLARE x int;
DECLARE c int;
DECLARE n int;




SET c=(SELECT COUNT(id) FROM salary1 WHERE stat=1);
set x=0;

bashar:LOOP
IF x >=c THEN

LEAVE bashar;
END IF;


SET @date=(SELECT date_format(now(), "%Y-%m-%d"));

SET @emp_id=(SELECT emp_id FROM salary1 WHERE stat=1 LIMIT 1 OFFSET x);
SET @stat=(SELECT stat FROM salary1 WHERE stat=1 LIMIT 1 OFFSET x);
SET @type=(SELECT type FROM salary1 WHERE stat=1 LIMIT 1 OFFSET x);

SET @salary_id=(SELECT salary_id FROM salary1 WHERE stat=1 LIMIT 1 OFFSET x);

SET @amount=(SELECT amount FROM salary1 WHERE stat=1 LIMIT 1 OFFSET x);
SET @n=(SELECT id FROM emp_slip where stat=1);
INSERT INTO `salary_slip2`( `emp_id`,`emp_slip`, `salary_id`, `stat`, `amount`, `date`, `type`,`from1`) VALUES (@emp_id,@n,@salary_id,1,@amount,@date,@type,1);




SET x= x+1;


END LOOP;
UPDATE `salary_slip2` SET `emp_slip`=@n,date=@date WHERE emp_slip=0;


UPDATE `emp_slip` SET `stat` = '0' WHERE stat = 1;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add1` ()  NO SQL
BEGIN
DECLARE x int;
DECLARE c int;
DECLARE n int;

SET c=(SELECT COUNT(id) FROM salary2 WHERE p_price !=0);
set x=0;

bashar:LOOP


IF x >=c THEN

LEAVE bashar;
END IF;

SET @id =(SELECT id FROM salary2 WHERE p_price !=0 LIMIT 1 OFFSET x);

SET @date=(SELECT date_format(now(), "%Y-%m-%d"));

SET @emp_id=(SELECT emp_id FROM salary2 WHERE p_price !=0 LIMIT 1 OFFSET x);
SET @n=(SELECT id FROM emp_slip where stat1=1);
SET @type=2;

SET @salary_id=10;

SET @price=(SELECT price FROM salary2 WHERE p_price !=0 LIMIT 1 OFFSET x);
SET @p_price=(SELECT p_price FROM salary2 WHERE p_price !=0  LIMIT 1 OFFSET x);

SELECT @price;
SELECT @p_price;

SET x= x+1;
IF @p_price <=@price THEN
SET @price1=(SELECT p_price FROM salary2 WHERE id=@id);

UPDATE `salary2` SET `p_price` = (p_price- p_price)  WHERE id = @id;
END IF;
IF @p_price >=@price THEN
SET @price1=(SELECT price FROM salary2 WHERE id=@id);

UPDATE `salary2` SET `p_price` = (p_price- price)  WHERE id = @id;
END IF;






INSERT INTO `salary_slip2`( `emp_id`,`emp_slip`, `salary_id`, `stat`, `amount`, `date`, `type`,`from1`) VALUES (@emp_id,@n,@salary_id,1,@price1,@date,@type,3);




END LOOP;

UPDATE `emp_slip` SET `stat1` = '0' WHERE stat1 = 1;


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account_c1`
--

CREATE TABLE `account_c1` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_c1`
--

INSERT INTO `account_c1` (`id`, `account_name`) VALUES
(1, 'الأصـــــول'),
(2, 'الالتزمات'),
(3, 'حقوق الملكية'),
(4, 'المصروفات'),
(5, 'الإيرادات');

-- --------------------------------------------------------

--
-- Table structure for table `account_c2`
--

CREATE TABLE `account_c2` (
  `id` int(1) NOT NULL,
  `c1` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_c2`
--

INSERT INTO `account_c2` (`id`, `c1`, `name`) VALUES
(110, 1, 'الأصول الثابتة'),
(120, 1, 'الأصول المتداولة'),
(210, 2, 'الخصوم المتداولة'),
(230, 2, 'الخصوم طويلة الأجل'),
(310, 2, 'رأس المال'),
(320, 2, 'المسحوبات الشخصية'),
(330, 2, 'جاري صاحب الشركة'),
(340, 2, 'الاحتياطات'),
(350, 2, 'الأرباح المحتجزة '),
(410, 4, 'تكلفة المبيعات'),
(420, 4, 'مصاريف البيع والتسويق'),
(430, 4, 'مصاريف إدارية وعمومية'),
(510, 5, 'إيرادات النشاط الرئيسي'),
(520, 5, 'إيرادات أخرى');

-- --------------------------------------------------------

--
-- Table structure for table `account_c3`
--

CREATE TABLE `account_c3` (
  `id` int(1) NOT NULL,
  `c1` int(1) DEFAULT NULL,
  `c2` int(1) DEFAULT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_c3`
--

INSERT INTO `account_c3` (`id`, `c1`, `c2`, `name`) VALUES
(1, 1, 110, 'الاراضي'),
(2, 1, 110, 'المباني'),
(3, 1, 110, 'السيارات'),
(4, 1, 110, 'الاثاث'),
(10, 1, 110, 'كمبيوترات'),
(11, 1, 120, 'الصندوق'),
(12, 1, 120, 'البنك'),
(13, 2, 120, 'اوراق القبض'),
(14, 2, 120, 'المخزون'),
(15, 2, 120, 'ايرادات مستحقة'),
(16, 2, 120, 'مصروفات مدفوعة مقدماً'),
(17, 2, 210, 'الدائنون'),
(18, 2, 210, 'اوراق الدفع'),
(19, 2, 210, 'قروض قصيرة الاجل'),
(20, 2, 210, 'ايرادات مقبوضة مقدماً'),
(21, 4, 210, 'مصروفات مستحقة'),
(22, 2, 220, 'قروض طويلة الاجل\r\n'),
(38, 4, 110, 'جوالات'),
(39, 1, 120, 'المدينون'),
(40, 2, 310, 'رأس مال 1'),
(42, 2, 210, 'القيمة المضافة المدفوعة'),
(43, 1, 120, 'السلف');

-- --------------------------------------------------------

--
-- Table structure for table `account_no`
--

CREATE TABLE `account_no` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_c3` int(1) NOT NULL,
  `account_c2` int(1) NOT NULL,
  `balance` decimal(18,2) NOT NULL DEFAULT 0.00,
  `stat` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_no`
--

INSERT INTO `account_no` (`id`, `account_name`, `account_c3`, `account_c2`, `balance`, `stat`) VALUES
(14, 'سيارة رقم 123', 3, 110, '11000.00', 1),
(17, 'سيارة 10', 3, 110, '10000.00', 1),
(18, 'سيارة 1010101', 3, 110, '10000.00', 1),
(25, 'عميل 5', 39, 120, '9000.00', 1),
(26, 'مورد1', 17, 210, '10000.00', 1),
(27, 'عميل6', 39, 120, '10000.00', 1),
(28, 'مورد 2', 17, 210, '10000.00', 1),
(35, 'Project1', 21, 210, '4000.00', 1),
(36, 'الخزينة', 11, 120, '-5000.00', 1),
(37, 'البنك', 12, 120, '1000.00', 1),
(39, 'dddddd', 21, 210, '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sale_date` date NOT NULL,
  `start_date` date NOT NULL,
  `account_c3` int(1) NOT NULL,
  `exp` int(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `des` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `currency` int(1) NOT NULL,
  `account_no` int(1) NOT NULL,
  `tax1` int(1) NOT NULL DEFAULT 0,
  `tax2` int(1) NOT NULL DEFAULT 0,
  `branch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `sale_date`, `start_date`, `account_c3`, `exp`, `user_id`, `des`, `price`, `currency`, `account_no`, `tax1`, `tax2`, `branch`) VALUES
(37, 'car1', '2022-07-25', '2022-07-27', 3, 12, 6, 'aaaaaaa', '10000', 1, 77, 56, 56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`) VALUES
(1, 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `cost1`
--

CREATE TABLE `cost1` (
  `id` int(1) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `stat` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cost1`
--

INSERT INTO `cost1` (`id`, `account_name`, `stat`) VALUES
(1, 'مشروع 1', 1),
(2, 'الخصوم', 1),
(3, 'حقوق الملكية', 1),
(4, 'المصروفات', 1),
(5, 'الإيرادات', 1),
(6, 'cc', 0),
(7, 'bb', 0),
(8, 'صثصثص', 1),
(9, '23232', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cost2`
--

CREATE TABLE `cost2` (
  `id` int(1) NOT NULL,
  `c1` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `stat` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cost2`
--

INSERT INTO `cost2` (`id`, `c1`, `name`, `stat`) VALUES
(110, 1, 'الاجور', 1),
(120, 1, 'الأصول المتداولة', 1),
(210, 2, 'الخصوم المتداولة', 1),
(230, 2, 'الخصوم طويلة الأجل', 1),
(310, 3, 'رأس المال', 1),
(320, 3, 'المسحوبات الشخصية', 1),
(330, 3, 'جاري صاحب الشركة', 1),
(340, 3, 'الاحتياطات', 1),
(350, 3, 'الأرباح المحتجزة ', 1),
(410, 4, 'تكلفة المبيعات', 1),
(420, 4, 'مصاريف البيع والتسويق', 1),
(430, 4, 'مصاريف إدارية وعمومية', 1),
(510, 5, 'إيرادات النشاط الرئيسي', 1),
(520, 5, 'إيرادات أخرى', 1),
(530, 9, '3243', 1);

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` int(1) NOT NULL,
  `cost2_id` int(1) NOT NULL,
  `dr` int(1) NOT NULL,
  `cr` int(1) NOT NULL,
  `rate` int(1) NOT NULL,
  `trans_id` int(1) NOT NULL,
  `date2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `cost2_id`, `dr`, `cr`, `rate`, `trans_id`, `date2`) VALUES
(158, 120, 200, 0, 20, 30, '2022-07-03'),
(159, 230, 800, 0, 80, 30, '2022-07-03'),
(160, 350, 200, 0, 10, 30, '2022-07-03'),
(161, 350, 0, 100, 10, 30, '2022-07-03'),
(162, 430, 0, 900, 90, 30, '2022-07-03'),
(163, 520, 0, 200, 10, 30, '2022-07-03'),
(164, 120, 300, 0, 30, 29, '2022-07-03'),
(165, 230, 200, 0, 20, 29, '2022-07-03'),
(166, 350, 300, 0, 30, 29, '2022-07-03'),
(167, 430, 200, 0, 20, 29, '2022-07-03'),
(168, 520, 0, 300, 30, 29, '2022-07-03'),
(169, 430, 0, 300, 30, 29, '2022-07-03'),
(170, 350, 0, 200, 20, 29, '2022-07-03'),
(171, 230, 0, 200, 20, 29, '2022-07-03'),
(172, 430, 2400, 0, 80, 28, '2022-07-03'),
(173, 520, 600, 0, 20, 28, '2022-07-03'),
(174, 120, 1500, 0, 50, 28, '2022-07-03'),
(175, 120, 0, 600, 20, 28, '2022-07-03'),
(176, 230, 0, 2400, 80, 28, '2022-07-03'),
(177, 350, 0, 1500, 50, 28, '2022-07-03'),
(178, 120, 1000, 0, 50, 32, '2022-07-03'),
(179, 120, 1000, 0, 50, 32, '2022-07-03'),
(180, 350, 0, 1000, 50, 32, '2022-07-03'),
(181, 430, 0, 1000, 50, 32, '2022-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(1) NOT NULL,
  `code` varchar(100) NOT NULL,
  `rate` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `rate`) VALUES
(1, 'USD', 12),
(2, 'SDG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(1) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `type_c` int(1) NOT NULL,
  `fax` varchar(150) CHARACTER SET latin1 NOT NULL,
  `address` varchar(200) DEFAULT 'Re-Entry Visa',
  `country` varchar(150) DEFAULT '',
  `currency` int(1) DEFAULT 1,
  `region` varchar(255) DEFAULT '',
  `emp_name` varchar(255) DEFAULT '',
  `leave_status` int(25) DEFAULT 1,
  `group1` int(1) DEFAULT 0,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `des` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `type_c`, `fax`, `address`, `country`, `currency`, `region`, `emp_name`, `leave_status`, `group1`, `zip`, `city`, `des`) VALUES
(1600, 'aaaasa', 'brico2001@hotmail.com', '111', 1, '111', '11', 'Barbados', 1, '111', '', 1, 1, '0', '', ''),
(1601, 'aasasd', 'xx001@hotmail.com', '242424', 1, '232424', 'fdfdfd', 'Bangladesh', 1, 'aaa', '', 1, 1, '0', '', ''),
(1602, 'xxxx', 'sxsd', 'aa', 1, 'aa', 'sdsd', 'Bahrain', 1, 'aaa', '', 1, 1, '0', '', ''),
(1604, 'USD', '', '', 1, '', '', '', 1, '', '', 1, 1, '0', '', ''),
(1605, 'fsdgs', 'ds', 'sfssfs', 1, '', 'sdgsdg', '', 1, 'sdfs', '', 1, 2, '', 'sdf', 'etfgergvrweg'),
(1606, 'aa', 'm@mail.com', '121', 2, '2323', 'sfdf', '', 1, 'dsafds', '', 1, 2, 'aa', 'sdfds', 'dfdf'),
(1607, 'aaaa', 'Rsnour0@yahoo.com', '43320', 1, '23230', 'Ksa0', '', 2, 'dsafds0', '', 1, 3, '123210', 'Riyadh', 'fzsfdsf0'),
(1608, 'عميل 5', 'admin@gmail.com', '4324435', 1, '23230', 'Ksa0', '', 1, 'dsafds0', '', 1, 2, '', '', ''),
(1609, 'مورد1', 'admin333@example.com', '4324435', 2, '23230', 'ثيس', '', 1, 'dsafds0', '', 1, 3, '32432', 'Riyadh', 'شيسي'),
(1610, 'عميل6', 'data.greensoft@gmail.com', '4324435', 1, '23421', 'ثيس', '', 1, '', '', 1, 2, '42354325', 'تتت', '324325'),
(1611, 'مورد 2', 'data.greensof2t@gmail.com', '4324435', 2, '', '', '', 1, '', '', 1, 2, '', '', ''),
(1612, 'ggg', 'mhbhbhv@vhdgvd.ds', '777777', 2, '1212', 'egypt', '', 1, 'west', '', 1, 2, '31792', 'qtour', 'fdfsdfsf'),
(1613, 'bashar essam', 'basharessam4@gmail.com', '01064696894', 1, '123', 'egypt', '', 1, 'west', '', 1, 2, '31792', 'qtour', 'dfhhbdfg'),
(1614, 'abu', 'bricooooo@gmail.com', '5454', 1, '35345', 'gfgf', '', 1, 'fdfdfd', '', 1, 2, '4343', 'fdfdfd', 'xcxcx'),
(1615, 'غ', 'bricoooooo@gmail.com', '5454', 2, '35345', 'gfgf', '', 2, 'fdfdfd', '', 1, 3, '4343', 'fdfdfd', 'سششس');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(1) NOT NULL,
  `stat` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `user_id`, `stat`) VALUES
(3, 'IT', 2, 1),
(2, 'HR', 2, 1),
(4, 'cccc', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `id` int(1) NOT NULL,
  `emp_id` int(1) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_depart` int(1) NOT NULL,
  `leave_type` int(1) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `stat` int(1) DEFAULT 1,
  `des` text DEFAULT NULL,
  `days` int(1) DEFAULT 0,
  `date2` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `emp_id`, `emp_name`, `emp_depart`, `leave_type`, `from_date`, `to_date`, `stat`, `des`, `days`, `date2`) VALUES
(1618, 1600, 'aaaasa', 3, 3, '2022-07-06', '2022-07-19', 3, '', 13, '2022-07-06 18:30:15'),
(1616, 1600, 'aaaasa', 3, 2, '2022-07-06', '2022-07-16', 4, 'zxzxzxcz', 10, '2022-07-06 18:23:28'),
(1617, 1600, 'aaaasa', 3, 3, '2022-07-05', '2022-07-24', 4, '', 19, '2022-07-06 18:25:05'),
(1615, 1601, 'aasasd', 3, 2, '2022-07-06', '2022-07-18', 3, 'fgdtgch', 12, '2022-07-06 15:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `emp_profile`
--

CREATE TABLE `emp_profile` (
  `id` int(1) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `photo` text NOT NULL,
  `emp_marital_status` int(1) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT NULL,
  `stat` int(25) DEFAULT 1,
  `birth_date` date DEFAULT NULL,
  `emp_passport` varchar(255) NOT NULL,
  `depart` int(1) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_profile`
--

INSERT INTO `emp_profile` (`id`, `name`, `email`, `bank`, `password`, `phone`, `photo`, `emp_marital_status`, `address`, `country`, `city`, `region`, `join_date`, `stat`, `birth_date`, `emp_passport`, `depart`, `job_title`) VALUES
(1600, 'aaaasa', 'brico2001@hotmail.com', '', '', '111', '1', 1, '11', 'Barbados', '1', '111', '2022-07-02 12:50:41', 0, '2022-07-02', '0546', 3, ''),
(1601, 'aasasd', 'xx001@hotmail.com', '', '', '242424', '1', 1, 'fdfdfd', 'Bangladesh', '1', 'aaa', '2022-07-02 12:50:41', 1, '2022-07-02', '0', 3, NULL),
(1602, 'xxxx', 'sxsd', '123', '', 'aa', '1', 1, 'sdsd', 'Bahrain', '1', 'aaa', '2022-07-02 12:50:41', 1, '2022-07-02', '0', 3, NULL),
(1606, 'aa', 'm@mail.com', '', '', '121', '1', 1, 'sfdf', '', '1', 'dsafds', '2022-07-02 12:50:41', 1, '2022-07-02', 'aa', 3, NULL),
(1607, '4534540', 'Rsnour0@yahoo.com', '', '', '43320', '2', 1, 'Ksa0', '', '2', 'dsafds0', '2022-07-02 12:50:41', 1, '2022-07-02', '123210', 3, NULL),
(1608, 'عميل 5', 'admin@gmail.com', '', '', '4324435', '1', 1, 'Ksa0', '', '1', 'dsafds0', '2022-07-02 12:50:41', 1, '2022-07-02', '', 3, NULL),
(1609, 'مورد1', 'admin333@example.com', '', '', '4324435', '2', 1, 'ثيس', 'aaa', '1', 'dsafds0', '2022-07-02 12:50:41', 1, '2022-07-02', '32432', 3, 'ffff'),
(1610, 'عميل6', 'data.greensoft@gmail.com', '', '', '4324435', '1', 1, 'ثيس', '', '1', '', '2022-07-02 12:50:41', 1, '2022-07-02', '42354325', 3, NULL),
(1611, 'basharessam', 'data.greensof2t@gmail.com', '123', '25d55ad283aa400af464c76d713c07ad', '01064696894', '968316567794982.jpg', 1, 'aa', 'مصر', 'qtour', 'west', '2022-07-02 12:50:41', 1, '2022-07-02', '30009121602352', 3, 'aaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `emp_slip`
--

CREATE TABLE `emp_slip` (
  `id` int(1) NOT NULL,
  `date` date NOT NULL,
  `date1` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stat` int(1) NOT NULL DEFAULT 0,
  `stat1` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_slip`
--

INSERT INTO `emp_slip` (`id`, `date`, `date1`, `stat`, `stat1`) VALUES
(28, '2022-08-17', '2022-08-16 22:30:59', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group1`
--

CREATE TABLE `group1` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group1`
--

INSERT INTO `group1` (`id`, `name`) VALUES
(2, 'aa'),
(3, 'bbbb');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) NOT NULL,
  `account` varchar(200) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `cn` varchar(100) NOT NULL DEFAULT '',
  `date` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `datepaid` datetime DEFAULT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `discount_type` varchar(1) NOT NULL DEFAULT 'f',
  `discount_value` decimal(14,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(14,2) NOT NULL DEFAULT 0.00,
  `taxname` varchar(100) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `tax2` decimal(10,2) NOT NULL,
  `tax_total` decimal(16,4) NOT NULL DEFAULT 0.0000,
  `total` decimal(18,2) NOT NULL DEFAULT 0.00,
  `taxrate` decimal(10,2) NOT NULL,
  `taxrate2` decimal(10,2) NOT NULL,
  `status` text NOT NULL,
  `paymentmethod` text NOT NULL,
  `notes` text NOT NULL,
  `vtoken` varchar(20) NOT NULL,
  `ptoken` varchar(20) NOT NULL,
  `r` varchar(100) NOT NULL DEFAULT '0',
  `nd` date DEFAULT NULL,
  `eid` int(10) NOT NULL DEFAULT 0,
  `ename` varchar(200) NOT NULL DEFAULT '',
  `vid` int(11) NOT NULL DEFAULT 0,
  `quote_id` int(11) NOT NULL DEFAULT 0,
  `currency` int(11) NOT NULL DEFAULT 0,
  `currency_iso_code` char(3) DEFAULT NULL,
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_prefix` varchar(10) DEFAULT NULL,
  `currency_suffix` varchar(10) DEFAULT NULL,
  `currency_rate` decimal(11,4) NOT NULL DEFAULT 1.0000,
  `recurring` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `account`, `title`, `cn`, `date`, `duedate`, `datepaid`, `subtotal`, `discount_type`, `discount_value`, `discount`, `taxname`, `tax`, `tax2`, `tax_total`, `total`, `taxrate`, `taxrate2`, `status`, `paymentmethod`, `notes`, `vtoken`, `ptoken`, `r`, `nd`, `eid`, `ename`, `vid`, `quote_id`, `currency`, `currency_iso_code`, `currency_symbol`, `currency_prefix`, `currency_suffix`, `currency_rate`, `recurring`) VALUES
(1, 'ساب السودان', 'ٍSAB>SD', '00001', '2020-02-11', '2020-02-18', '2020-02-11 11:05:00', '1800.00', 'f', '0.00', '700.00', '', '0.00', '0.00', '0.0000', '1100.00', '0.00', '0.00', 'Paid', '', '', '5394531324', '1602276044', '0', '2020-02-11', 0, '', 0, 0, 1, 'SAR', '', NULL, NULL, '1.0000', 0),
(9, 'Nopteic', 'SM 20 Post', '00003', '2020-02-12', '2020-02-12', '2020-02-12 02:02:43', '5000.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '5000.00', '0.00', '0.00', 'Paid', '', '', '3764550264', '1907865319', '0', '2020-02-12', 0, '', 0, 0, 2, 'SDG', '', NULL, NULL, '0.0400', 0),
(3, 'Compomedia', '', '00003', '2020-02-12', '2020-02-12', '2020-02-12 00:39:59', '5000.00', 'f', '0.00', '1000.00', '', '0.00', '0.00', '0.0000', '4000.00', '0.00', '0.00', 'Paid', '', '', '1788096506', '8062941909', '0', '2020-02-12', 0, '', 0, 0, 2, 'SDG', '', NULL, NULL, '0.0400', 0),
(4, 'موقع اصلي', '', '00004', '2020-02-12', '2020-02-12', '2020-02-12 01:11:20', '44300.00', 'f', '0.00', '3000.00', '', '0.00', '0.00', '0.0000', '41300.00', '0.00', '0.00', 'Partially Paid', '', '', '8277537618', '4399179506', '0', '2020-02-12', 0, '', 0, 0, 2, 'SDG', '', NULL, NULL, '0.0400', 0),
(5, 'موقع صوتها', 'موقع صوتها', '00005', '2020-02-12', '2020-02-12', '2020-02-12 01:14:25', '38000.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '38000.00', '0.00', '0.00', 'Partially Paid', '', '', '2041659310', '0501965853', '0', '2020-02-12', 0, '', 0, 0, 2, 'SDG', '', NULL, NULL, '0.0400', 0),
(6, 'ابحث لي', 'تصميم شعار', '00006', '2020-02-12', '2020-02-12', '2020-02-12 01:17:05', '300.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '300.00', '0.00', '0.00', 'Paid', '', '', '1326280403', '8059417591', '0', '2020-02-12', 0, '', 0, 0, 1, 'SAR', '', NULL, NULL, '1.0000', 0),
(7, 'لارين', 'SM 30 Post', '00007', '2020-02-12', '2020-02-12', '2020-02-12 01:21:33', '5000.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '5000.00', '0.00', '0.00', 'Paid', '', '', '8968574134', '6887471914', '0', '2020-02-12', 0, '', 0, 0, 2, 'SDG', '', NULL, NULL, '0.0400', 0),
(8, 'NGS', 'NGS', '00008', '2020-02-12', '2020-02-12', '2020-02-12 01:52:32', '1400.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '1400.00', '0.00', '0.00', 'Partially Paid', '', '', '0300470829', '0523975049', '0', '2020-02-12', 0, '', 0, 0, 1, 'SAR', '', NULL, NULL, '1.0000', 0),
(10, 'موقع اصلي', '', '00004', '2020-02-26', '2020-02-26', '2020-02-26 11:48:07', '0.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '0.00', '0.00', '0.00', 'Paid', '', '', '6734551850', '6289331929', '0', '2020-02-26', 0, '', 0, 0, 1, 'SAR', '', NULL, NULL, '1.0000', 0),
(11, 'موقع صوتها', '', '00005', '2020-02-26', '2020-02-26', '2020-02-26 11:50:46', '0.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '0.00', '0.00', '0.00', 'Paid', '', '', '6905164805', '0604365953', '+1 month', '2020-03-26', 0, '', 0, 0, 1, 'SAR', '', NULL, NULL, '1.0000', 0),
(12, 'Compomedia', 'تصميم شعارات', '00006', '2020-03-05', '2020-03-05', '2020-03-05 06:43:35', '3000.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '3000.00', '0.00', '0.00', 'Paid', '', '', '3002195382', '7225604062', '0', '2020-03-05', 0, '', 0, 0, 2, 'SDG', '', NULL, NULL, '0.0400', 0),
(13, 'Nopteic', 'باقة سوشل ميديا', '00007', '2020-03-05', '2020-03-05', '2020-03-05 06:46:35', '5000.00', 'p', '0.00', '0.00', '', '0.00', '0.00', '0.0000', '5000.00', '0.00', '0.00', 'Paid', '', '', '2179045781', '0803895689', '0', '2020-03-05', 0, '', 0, 0, 2, 'SDG', '', NULL, NULL, '0.0400', 0),
(14, 'ابحث لي', 'sss', '00008', '2020-05-09', '2020-05-14', '2020-05-09 00:18:34', '200.00', 'p', '0.00', '20.00', '', '0.00', '0.00', '0.0000', '180.00', '0.00', '0.00', 'Paid', '', '', '9727806919', '3677932879', '0', '2020-05-09', 0, '', 0, 0, 1, 'SAR', '', NULL, NULL, '1.0000', 0),
(15, 'لارين', 'test', '00009', '2020-10-19', '2020-10-19', '2020-10-19 18:50:42', '3000.00', 'f', '0.00', '500.00', '', '375.00', '0.00', '0.0000', '2875.00', '0.00', '0.00', 'Partially Paid', '', '', '6247395042', '8648970510', '0', '2020-10-19', 0, '', 0, 0, 1, 'SAR', '', NULL, NULL, '1.0000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_resume`
--

CREATE TABLE `leave_resume` (
  `id` int(1) NOT NULL,
  `emp_id` varchar(250) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_dept` varchar(150) NOT NULL,
  `request_type` int(1) NOT NULL,
  `from_date` varchar(150) CHARACTER SET latin1 NOT NULL,
  `to_date` varchar(200) DEFAULT 'Re-Entry Visa',
  `resume_date` varchar(150) DEFAULT '',
  `leave_status` int(1) DEFAULT 1,
  `leave_desc` varchar(255) DEFAULT '',
  `leave_days` int(1) DEFAULT 0,
  `approved_on` varchar(255) NOT NULL,
  `dateIn` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_resume`
--

INSERT INTO `leave_resume` (`id`, `emp_id`, `emp_name`, `emp_dept`, `request_type`, `from_date`, `to_date`, `resume_date`, `leave_status`, `leave_desc`, `leave_days`, `approved_on`, `dateIn`) VALUES
(1600, 'aaaasa', 'brico2001@hotmail.com', '111', 1, '111', '11', 'Barbados', 1, '111', 1, '0', ''),
(1601, 'aasasd', 'xx001@hotmail.com', '242424', 1, '232424', 'fdfdfd', 'Bangladesh', 1, 'aaa', 1, '0', ''),
(1602, 'xxxx', 'sxsd', 'aa', 1, 'aa', 'sdsd', 'Bahrain', 1, 'aaa', 1, '0', ''),
(1604, 'USD', '', '', 1, '', '', '', 1, '', 1, '0', ''),
(1605, 'fsdgs', 'ds', 'sfssfs', 1, '', 'sdgsdg', '', 1, 'sdfs', 2, '', 'sdf'),
(1606, 'aa', 'm@mail.com', '121', 1, '2323', 'sfdf', '', 1, 'dsafds', 2, 'aa', 'sdfds'),
(1607, '4534540', 'Rsnour0@yahoo.com', '43320', 2, '23230', 'Ksa0', '', 2, 'dsafds0', 3, '123210', 'Riyadh'),
(1608, 'عميل 5', 'admin@gmail.com', '4324435', 1, '23230', 'Ksa0', '', 1, 'dsafds0', 2, '', ''),
(1609, 'مورد1', 'admin333@example.com', '4324435', 2, '23230', 'ثيس', '', 1, 'dsafds0', 3, '32432', 'Riyadh'),
(1610, 'عميل6', 'data.greensoft@gmail.com', '4324435', 1, '23421', 'ثيس', '', 1, '', 2, '42354325', 'تتت'),
(1611, 'مورد 2', 'data.greensof2t@gmail.com', '4324435', 2, '', '', '', 1, '', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(1) NOT NULL,
  `stat` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `name`, `user_id`, `stat`) VALUES
(3, 'anul leave', 2, 1),
(2, 'sik leave', 2, 1),
(4, 'cccc', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymen_method`
--

CREATE TABLE `paymen_method` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymen_method`
--

INSERT INTO `paymen_method` (`id`, `name`) VALUES
(3, 'Check'),
(2, 'Cash'),
(4, 'Credit Card'),
(5, 'Debit'),
(6, 'Electronic Transfer'),
(7, 'Paypal'),
(8, 'ATM Withdrawals'),
(9, 'Pagseguro');

-- --------------------------------------------------------

--
-- Table structure for table `pay_slip`
--

CREATE TABLE `pay_slip` (
  `id` int(1) NOT NULL,
  `des` varchar(255) NOT NULL,
  `emp_id` int(1) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pay_slip`
--

INSERT INTO `pay_slip` (`id`, `des`, `emp_id`, `amount`, `date`) VALUES
(3, 'ضربية الدخل', 2, '500', '2022-07-30'),
(2, 'القيمة المضافة', 2, '1000', '2022-07-30'),
(4, 'راتب اساسي', 2, '1000', '2022-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `pro`
--

CREATE TABLE `pro` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pro`
--

INSERT INTO `pro` (`id`, `name`) VALUES
(1, 'مصروفات'),
(2, 'ايرادات'),
(3, 'فواتير');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `cat_id` int(1) DEFAULT NULL,
  `user_id` int(1) DEFAULT NULL,
  `des` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `start_date`, `end_date`, `cat_id`, `user_id`, `des`) VALUES
(29, 'Project1', '2022-08-09', '2022-08-31', 3, 2, 'fdd'),
(30, 'dddddd', '2022-08-17', '2022-08-27', 3, 6, '123');

-- --------------------------------------------------------

--
-- Table structure for table `pro_a`
--

CREATE TABLE `pro_a` (
  `id` int(1) NOT NULL,
  `pro_id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date1` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pro_a`
--

INSERT INTO `pro_a` (`id`, `pro_id`, `name`, `amount`, `date1`) VALUES
(16, 29, 'bbbbbb', '1000', '2022-08-09 16:42:34'),
(17, 29, 'aa', '233', '2022-08-09 16:42:34'),
(18, 30, 'cdca', '1000', '2022-08-16 22:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `pro_cat`
--

CREATE TABLE `pro_cat` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pro_cat`
--

INSERT INTO `pro_cat` (`id`, `name`) VALUES
(3, 'ضربية الدخل'),
(2, 'القيمة المضافة'),
(4, 'راتب اساسي');

-- --------------------------------------------------------

--
-- Table structure for table `pro_stag`
--

CREATE TABLE `pro_stag` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pro_id` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pro_stag`
--

INSERT INTO `pro_stag` (`id`, `name`, `pro_id`) VALUES
(9, 'bashar essam', 29);

-- --------------------------------------------------------

--
-- Table structure for table `pro_task`
--

CREATE TABLE `pro_task` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stage_id` int(1) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(1) NOT NULL,
  `stat` int(1) NOT NULL,
  `date1` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stat` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `name`, `stat`, `type`) VALUES
(3, 'ضربية الدخل', 1, 2),
(2, 'القيمة المضافة', 1, 2),
(4, 'راتب اساسي', 1, 1),
(6, 'غياب بدون عزر', 1, 2),
(7, 'جزئ ', 1, 2),
(8, 'حافز ', 1, 1),
(9, 'اجر اضافي', 1, 1),
(10, 'السلفيات', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary1`
--

CREATE TABLE `salary1` (
  `id` int(1) NOT NULL,
  `stat` int(1) NOT NULL,
  `salary_id` int(1) DEFAULT NULL,
  `emp_id` int(1) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary1`
--

INSERT INTO `salary1` (`id`, `stat`, `salary_id`, `emp_id`, `amount`, `type`) VALUES
(63, 1, 3, 1608, '1000', 2),
(62, 1, 4, 1608, '10000', 1),
(56, 1, 4, 1600, '100000', 1),
(55, 1, 3, 1600, '1000', 2),
(54, 1, 3, 1600, '100', 2),
(57, 1, 4, 1601, '10000', 1),
(58, 1, 2, 1602, '10000', 2),
(53, 1, 2, 1600, '100', 2),
(52, 1, 4, 1600, '100', 1),
(61, 1, 2, 1606, '100', 2),
(60, 1, 4, 1606, '10000', 1),
(59, 1, 3, 1606, '50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary2`
--

CREATE TABLE `salary2` (
  `id` int(1) NOT NULL,
  `emp_id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `num` int(1) NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `date_start` date NOT NULL,
  `account_no` int(1) NOT NULL,
  `des` text NOT NULL,
  `stat` int(1) NOT NULL DEFAULT 0,
  `trans_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary2`
--

INSERT INTO `salary2` (`id`, `emp_id`, `name`, `date`, `amount`, `price`, `num`, `p_price`, `date_start`, `account_no`, `des`, `stat`, `trans_id`) VALUES
(27, 1600, 'xxxx', '2022-07-29', '1000000', '1000', 1000, '1000', '2022-07-29', 12, 'xxx', 0, 135),
(29, 1606, 'aa', '2022-07-29', '10000', '1000', 10, '0', '2022-07-29', 12, 'dsds', 0, 137),
(30, 1600, 'xxxx', '2022-07-29', '1000000', '1000', 1000, '0', '2022-07-29', 12, 'xxx', 0, 135),
(31, 1606, 'aa', '2022-07-29', '10000', '1000', 10, '0', '2022-07-29', 12, 'dsds', 0, 137);

-- --------------------------------------------------------

--
-- Table structure for table `salary_slip2`
--

CREATE TABLE `salary_slip2` (
  `id` int(1) NOT NULL,
  `emp_id` int(1) NOT NULL,
  `emp_slip` int(1) NOT NULL DEFAULT 0,
  `salary_id` int(1) NOT NULL,
  `stat` int(1) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `type` int(1) NOT NULL,
  `from1` int(1) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_slip2`
--

INSERT INTO `salary_slip2` (`id`, `emp_id`, `emp_slip`, `salary_id`, `stat`, `amount`, `date`, `type`, `from1`, `des`) VALUES
(675, 1608, 28, 3, 1, '1000', '2022-08-17', 2, 1, ''),
(676, 1608, 28, 4, 1, '10000', '2022-08-17', 1, 1, ''),
(677, 1600, 28, 10, 1, '1000', '2022-08-17', 2, 3, ''),
(678, 1600, 28, 4, 1, '100000', '2022-08-17', 1, 1, ''),
(679, 1600, 28, 3, 1, '1000', '2022-08-17', 2, 1, ''),
(680, 1600, 28, 3, 1, '100', '2022-08-17', 2, 1, ''),
(681, 1601, 28, 4, 1, '10000', '2022-08-17', 1, 1, ''),
(682, 1602, 28, 2, 1, '10000', '2022-08-17', 2, 1, ''),
(683, 1600, 28, 2, 1, '100', '2022-08-17', 2, 1, ''),
(684, 1600, 28, 4, 1, '100', '2022-08-17', 1, 1, ''),
(685, 1606, 28, 2, 1, '100', '2022-08-17', 2, 1, ''),
(686, 1606, 28, 4, 1, '10000', '2022-08-17', 1, 1, ''),
(687, 1606, 28, 3, 1, '50', '2022-08-17', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `start`
--

CREATE TABLE `start` (
  `id` int(1) NOT NULL,
  `num` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `start`
--

INSERT INTO `start` (`id`, `num`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_note`
--

CREATE TABLE `task_note` (
  `id` int(1) NOT NULL,
  `des` text CHARACTER SET utf8 NOT NULL,
  `user_id` int(1) NOT NULL,
  `task_id` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_note`
--

INSERT INTO `task_note` (`id`, `des`, `user_id`, `task_id`, `date`) VALUES
(21, '', 6, 30, '2022-08-09 14:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rate` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `rate`) VALUES
(3, 'ضربية الدخل', 12),
(2, 'القيمة المضافة', 10),
(5, 'ش', 5);

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(1) NOT NULL,
  `name` text NOT NULL,
  `currency_id` int(1) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `t_type` int(1) NOT NULL,
  `stat` int(1) DEFAULT 0,
  `date2` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `name`, `currency_id`, `ref`, `t_type`, `stat`, `date2`) VALUES
(135, 'xxx', 1, '', 1, 0, '2022-07-29'),
(136, 'dfdfd', 1, '', 1, 0, '2022-07-29'),
(137, 'dsds', 1, '', 1, 0, '2022-07-29'),
(139, '', 1, 'dcdv', 2, 0, '2022-08-09'),
(140, '', 1, '', 2, 0, '2022-08-09'),
(141, '', 1, '', 2, 0, '2022-08-10'),
(142, '', 1, '', 2, 0, '2022-08-10'),
(143, 'ddd', 1, '123', 1, 1, '2022-08-17'),
(144, 'ss', 1, '123', 2, 1, '2022-08-17'),
(145, 'dddddddd', 1, '12', 3, 0, '2022-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(1) NOT NULL,
  `trans_id` int(1) NOT NULL,
  `account_id` int(1) NOT NULL DEFAULT 0,
  `dr` float DEFAULT 0,
  `cr` float DEFAULT 0,
  `des` text NOT NULL,
  `balance` float NOT NULL,
  `date2` date NOT NULL,
  `stat` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `trans_id`, `account_id`, `dr`, `cr`, `des`, `balance`, `date2`, `stat`) VALUES
(542, 137, 12, 0, 10000, 'dsds', -910000, '2022-07-29', 0),
(541, 137, 78, 10000, 0, 'dsds', 1010000, '2022-07-29', 0),
(548, 136, 12, 0, 10000, 'dfdfd', -910000, '2022-07-29', 0),
(547, 136, 78, 10000, 0, 'dfdfd', 1020000, '2022-07-29', 0),
(546, 135, 12, 0, 1000000, 'xxx', 80000, '2022-07-29', 0),
(545, 135, 78, 1000000, 0, 'xxx', 1020000, '2022-07-29', 0),
(549, 143, 14, 1000, 0, 'aa', 11000, '2022-08-17', 1),
(550, 143, 36, 0, 1000, 'aa', -5000, '2022-08-17', 1),
(551, 144, 36, 0, 1000, '', -6000, '2022-08-17', 1),
(552, 144, 35, 1000, 0, '', 4000, '2022-08-17', 1),
(553, 145, 36, 1000, 0, 'ddd', -5000, '2022-08-17', 0),
(554, 145, 25, 0, 1000, 'dd', 9000, '2022-08-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_c`
--

CREATE TABLE `type_c` (
  `id` int(1) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_c`
--

INSERT INTO `type_c` (`id`, `name`) VALUES
(1, 'Expense'),
(2, 'gl'),
(3, 'Ø¯Ø§Ø¹Ù…');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(155) NOT NULL,
  `pr` int(1) NOT NULL DEFAULT 2,
  `yes` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `pr`, `yes`) VALUES
(2, 'admin2', 'basharessam4@gmail.com', '01064696894', '25d55ad283aa400af464c76d713c07ad', 2, 0),
(6, 'admin1', '', '01064696895', '25d55ad283aa400af464c76d713c07ad', 1, 0),
(32, 'admin3', 'basharessam9@gmail.com', '01064696898', '25d55ad283aa400af464c76d713c07ad', 2, 0),
(33, 'admin4', 'basharessam74@gmail.com', '01064696899', '25d55ad283aa400af464c76d713c07ad', 2, 0),
(34, 'admin5', 'basharessam46@gmail.com', '01064696894', '25d55ad283aa400af464c76d713c07ad', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_c1`
--
ALTER TABLE `account_c1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_c2`
--
ALTER TABLE `account_c2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_c3`
--
ALTER TABLE `account_c3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_no`
--
ALTER TABLE `account_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost1`
--
ALTER TABLE `cost1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost2`
--
ALTER TABLE `cost2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_profile`
--
ALTER TABLE `emp_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_slip`
--
ALTER TABLE `emp_slip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group1`
--
ALTER TABLE `group1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`(3));

--
-- Indexes for table `leave_resume`
--
ALTER TABLE `leave_resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymen_method`
--
ALTER TABLE `paymen_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_slip`
--
ALTER TABLE `pay_slip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro`
--
ALTER TABLE `pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_a`
--
ALTER TABLE `pro_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_cat`
--
ALTER TABLE `pro_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_stag`
--
ALTER TABLE `pro_stag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_task`
--
ALTER TABLE `pro_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary1`
--
ALTER TABLE `salary1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary2`
--
ALTER TABLE `salary2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_slip2`
--
ALTER TABLE `salary_slip2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `start`
--
ALTER TABLE `start`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_note`
--
ALTER TABLE `task_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_c`
--
ALTER TABLE `type_c`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_c1`
--
ALTER TABLE `account_c1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `account_c2`
--
ALTER TABLE `account_c2`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;

--
-- AUTO_INCREMENT for table `account_c3`
--
ALTER TABLE `account_c3`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `account_no`
--
ALTER TABLE `account_no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cost1`
--
ALTER TABLE `cost1`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cost2`
--
ALTER TABLE `cost2`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=531;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1616;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1619;

--
-- AUTO_INCREMENT for table `emp_profile`
--
ALTER TABLE `emp_profile`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1633;

--
-- AUTO_INCREMENT for table `emp_slip`
--
ALTER TABLE `emp_slip`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `group1`
--
ALTER TABLE `group1`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leave_resume`
--
ALTER TABLE `leave_resume`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1612;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymen_method`
--
ALTER TABLE `paymen_method`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pay_slip`
--
ALTER TABLE `pay_slip`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pro`
--
ALTER TABLE `pro`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pro_a`
--
ALTER TABLE `pro_a`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pro_cat`
--
ALTER TABLE `pro_cat`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pro_stag`
--
ALTER TABLE `pro_stag`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pro_task`
--
ALTER TABLE `pro_task`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary1`
--
ALTER TABLE `salary1`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `salary2`
--
ALTER TABLE `salary2`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `salary_slip2`
--
ALTER TABLE `salary_slip2`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=688;

--
-- AUTO_INCREMENT for table `start`
--
ALTER TABLE `start`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_note`
--
ALTER TABLE `task_note`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- AUTO_INCREMENT for table `type_c`
--
ALTER TABLE `type_c`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `add_salary` ON SCHEDULE EVERY 1 SECOND STARTS '2022-08-16 15:11:36' ENDS '2030-04-30 15:07:36' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN

DECLARE c int;





SET c=(SELECT COUNT(id) FROM emp_slip WHERE stat=1);



IF c =1 THEN

CALL `add`(); 
 

END IF;

END$$

CREATE DEFINER=`root`@`localhost` EVENT `add_salary1` ON SCHEDULE EVERY 1 SECOND STARTS '2022-08-16 23:33:00' ENDS '2033-09-30 23:31:45' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN

DECLARE c int;





SET c=(SELECT COUNT(id) FROM emp_slip WHERE stat1=1);



IF c =1 THEN
CALL `add1`();

 

END IF;

END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
