-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 08:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '2021-01-08 13:35:39' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2021-01-08 13:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `id` int(11) NOT NULL,
  `CustomerName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`id`, `CustomerName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Ziska Pharma', '2022-06-11 04:22:03', NULL),
(4, 'Cocacola Bangladesh Ltd', '2022-06-13 09:23:31', NULL),
(5, 'Odessy Crapt', '2022-06-16 06:40:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbliteam`
--

CREATE TABLE `tbliteam` (
  `id` int(11) NOT NULL,
  `IteamName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbliteam`
--

INSERT INTO `tbliteam` (`id`, `IteamName`, `CreationDate`, `UpdationDate`) VALUES
(8, 'Steel', '2022-04-25 15:20:03', '2022-05-22 09:20:01'),
(9, 'Color', '2022-04-25 15:20:09', '2022-05-22 09:20:13'),
(13, 'M.S sheet', '2022-05-11 02:43:16', NULL),
(14, 'ss five', '2022-05-12 05:10:27', NULL),
(15, 'Frame', '2022-05-14 05:25:35', '2022-05-22 09:20:37'),
(16, 'Chemical', '2022-06-02 06:27:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(3, 'Md Juel Hossain', 'juelhossain466@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01777550506', NULL, NULL, NULL, NULL, '2021-12-11 16:02:12', NULL),
(4, 'Prince Jewel', 'rabeya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01777550506', NULL, NULL, NULL, NULL, '2022-03-25 03:26:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dlvr_install`
--

CREATE TABLE `tbl_dlvr_install` (
  `id` int(11) NOT NULL,
  `Ordercustomer` int(11) DEFAULT NULL,
  `Date1` varchar(120) DEFAULT NULL,
  `Delivery_Weight` varchar(150) DEFAULT NULL,
  `Ins_Date` varchar(150) DEFAULT NULL,
  `Ttl_Lbr_Wrk` varchar(150) DEFAULT NULL,
  `Vehicale_No` int(11) DEFAULT NULL,
  `Remarks` longtext DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dlvr_install`
--

INSERT INTO `tbl_dlvr_install` (`id`, `Ordercustomer`, `Date1`, `Delivery_Weight`, `Ins_Date`, `Ttl_Lbr_Wrk`, `Vehicale_No`, `Remarks`, `Vimage1`, `Vimage2`, `Vimage3`, `RegDate`, `UpdationDate`) VALUES
(1, 1, '10-12-22', '200', '250', '34', NULL, 'hell', NULL, NULL, NULL, '2022-06-19 03:17:16', '2022-06-23 05:08:47'),
(2, 1, '11-12-22', '130', 'mona', '09876543211', 223344, 'helo', NULL, NULL, NULL, '2022-06-23 05:14:14', NULL),
(3, 1, '11-12-22', '130', 'mona', '09876543211', 223344, 'hhhjkkk', 'WhatsApp Image 2022-05-28 at 10.49.29 AM.jpeg', 'WhatsApp Image 2022-05-27 at 7.21.26 PM.jpeg', NULL, '2022-06-23 05:16:17', '2022-06-23 05:16:33'),
(4, 1, '11-12-22', '130', 'mona', '09876543211', 223344, 'hh', 'domain_renew_invoice_1780727.pdf', 'MinMax Rack Ads.pdf', 'Proposed Budget For MinMax Rack.pdf', '2022-06-23 09:03:47', NULL),
(5, 1, '11-12-22', '130', 'mona', '09876543211', 223344, 'hh', 'domain_renew_invoice_1780727.pdf', 'MinMax Rack Ads.pdf', 'Proposed Budget For MinMax Rack.pdf', '2022-06-23 10:06:38', NULL),
(6, 1, '11-12-22', '130', 'mona', '09876543211', 223344, 'hh', 'domain_renew_invoice_1780727.pdf', 'MinMax Rack Ads.pdf', 'Proposed Budget For MinMax Rack.pdf', '2022-06-23 10:07:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_install`
--

CREATE TABLE `tbl_install` (
  `id` int(11) NOT NULL,
  `Ordercustomer` int(11) DEFAULT NULL,
  `Date1` varchar(120) DEFAULT NULL,
  `Sup_Name` varchar(150) DEFAULT NULL,
  `Sup_Num` varchar(150) DEFAULT NULL,
  `Ttl_Lbr_Wrk` varchar(150) DEFAULT NULL,
  `Remarks` longtext DEFAULT NULL,
  `Ttl_Paymnt` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_install`
--

INSERT INTO `tbl_install` (`id`, `Ordercustomer`, `Date1`, `Sup_Name`, `Sup_Num`, `Ttl_Lbr_Wrk`, `Remarks`, `Ttl_Paymnt`, `RegDate`, `UpdationDate`) VALUES
(1, 1, '11-12-22', 'HAbib', '12345678900', '2 hour', '1.Rahim (In -8:00 - - OUT- 5:00)\r\n2.Karim (In - 8:20 - - OUT- 5:00)', NULL, '2022-06-25 05:01:48', NULL),
(2, 1, '11-12-22', 'HAbib', '12345678900', '2 hour', '1.Rahim (In -8:00 - - OUT- 5:00)\r\n2.Karim (In - 8:20 - - OUT- 5:00)', NULL, '2022-06-25 05:09:53', NULL),
(3, 1, '11-12-22', 'juel', '12345678900', '20hours', '1.Karim (In : 8:00 -- Out 5:00)-500\r\n2.Rahim (In : 8:00 -- Out 5:00)-500', 1000, '2022-06-26 02:55:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int(11) NOT NULL,
  `Ordercustomer` int(11) DEFAULT NULL,
  `Marketertitle` varchar(150) DEFAULT NULL,
  `Ordersheet` varchar(150) DEFAULT NULL,
  `Contactperson` varchar(150) DEFAULT NULL,
  `Offermaker` varchar(150) DEFAULT NULL,
  `Contactnumber1` varchar(150) DEFAULT NULL,
  `Contactnumber2` varchar(150) DEFAULT NULL,
  `Designation` varchar(150) DEFAULT NULL,
  `Tweight` int(11) DEFAULT NULL,
  `Theoratical_weight` int(11) DEFAULT NULL,
  `Deliverdate` varchar(150) DEFAULT NULL,
  `Expt_del_date` varchar(150) DEFAULT NULL,
  `T_Weight` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `Ordercustomer`, `Marketertitle`, `Ordersheet`, `Contactperson`, `Offermaker`, `Contactnumber1`, `Contactnumber2`, `Designation`, `Tweight`, `Theoratical_weight`, `Deliverdate`, `Expt_del_date`, `T_Weight`, `RegDate`, `UpdationDate`) VALUES
(1, 1, 'Shakil', 'Mahmdul', 'asad', 'Ariful Islam', '1234', '23212', 'sr. designer', 150, 220, '11/12/22', '22/12/23', NULL, '2022-06-12 10:05:50', '2022-06-13 09:22:25'),
(2, 4, 'Shakil', 'Asad', 'Habib', 'Ariful Islam2', '12354', '1344', 'Sr. Executive', 150, 222, '11/12/22', '22/12/23', NULL, '2022-06-13 09:24:37', NULL),
(3, 4, 'Ahsan Habib', 'Asadurzaman', 'Mizanur Rahman', 'Ariful Islam', '01777550506', '01777550507', 'Sr. Executive', 1000, 1200, '11/12/22', '15/12/22', NULL, '2022-06-14 10:33:46', '2022-06-14 10:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production`
--

CREATE TABLE `tbl_production` (
  `id` int(11) NOT NULL,
  `ordercustomer` int(11) DEFAULT NULL,
  `dates` longtext DEFAULT NULL,
  `Weight` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_production`
--

INSERT INTO `tbl_production` (`id`, `ordercustomer`, `dates`, `Weight`, `RegDate`, `UpdationDate`) VALUES
(1, 1, '11-12-22', 150, '2022-06-14 05:03:47', NULL),
(3, 1, '11-12-22', 55, '2022-06-14 05:05:38', NULL),
(4, 1, '13-12-22', 150, '2022-06-14 05:32:16', NULL),
(5, 1, '14-12-22', 150, '2022-06-14 05:35:57', NULL),
(6, 1, '15-12-22', 200, '2022-06-14 05:38:26', NULL),
(7, 1, '16-12-22', 200, '2022-06-14 05:39:13', NULL),
(8, 1, '17-12-22', 200, '2022-06-14 05:41:26', NULL),
(9, 1, '17-12-22', 200, '2022-06-14 05:42:43', NULL),
(10, 1, '18-12-22', 200, '2022-06-14 05:48:08', NULL),
(11, 1, '19-12-22', 200, '2022-06-14 05:48:34', NULL),
(12, 1, '20-12-22', 200, '2022-06-14 05:50:34', NULL),
(13, 1, '21-12-22', 200, '2022-06-14 05:56:26', NULL),
(14, 1, '20-12-22', 500, '2022-06-14 06:02:07', NULL),
(15, 1, '25-12-22', 55, '2022-06-14 06:03:09', NULL),
(16, 1, '27-12-22', 400, '2022-06-14 06:05:32', NULL),
(30, 1, '17-12-22', 234, '2022-06-14 07:27:26', NULL),
(31, 1, '17-12-22', 334, '2022-06-14 07:28:23', NULL),
(32, 1, '17-12-22', 555, '2022-06-14 07:29:33', NULL),
(33, 1, '17-12-22', 444, '2022-06-14 07:33:11', NULL),
(34, 1, '17-12-22', 299, '2022-06-14 08:32:59', NULL),
(35, 1, '29-12-22', 500, '2022-06-14 10:29:07', '2022-06-16 05:59:26'),
(36, 1, '30-12-22', 200, '2022-06-14 10:30:34', NULL),
(37, 1, '17-12-22', 30, '2022-06-15 06:24:15', NULL),
(38, 1, '17-12-22', 444, '2022-06-16 09:34:45', NULL),
(39, 1, '17-12-22', 234, '2022-06-23 03:49:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id` int(11) NOT NULL,
  `PurchaseBy` varchar(150) DEFAULT NULL,
  `PurchaseShop` varchar(150) DEFAULT NULL,
  `PurchaseIteam` int(11) DEFAULT NULL,
  `RequisitionTitle` int(11) DEFAULT NULL,
  `PurchaseDetails` longtext DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Mobile` int(11) DEFAULT NULL,
  `T_Price` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id`, `PurchaseBy`, `PurchaseShop`, `PurchaseIteam`, `RequisitionTitle`, `PurchaseDetails`, `Price`, `Quantity`, `Mobile`, `T_Price`, `RegDate`, `UpdationDate`) VALUES
(10, 'Juel', 'Shopno Traders', 13, 1, NULL, 60000, 5, 1777550506, 300000, '2022-05-22 09:30:48', '2022-05-31 04:44:24'),
(11, 'Juel', 'Shopno Traders', 13, 1, 'sdgbd', 60000, 80, 1777550506, 4800000, '2022-05-22 10:25:10', NULL),
(12, 'Asad ', 'Habib Traders', NULL, 1, NULL, 6000, 4, 1777550506, 240000, '2022-05-23 07:48:47', '2022-05-23 07:49:48'),
(14, 'Juel', 'Shopno Traders', 9, 1, NULL, 7000, 10, 1777550506, 70000, '2022-05-23 08:14:42', '2022-06-04 03:14:25'),
(15, 'Juel', 'Shopno Traders', 13, 1, 'fhvh', 7000, 10, 1777550506, 70000, '2022-05-23 08:15:31', NULL),
(16, 'Asad ', 'Shopno Traders', 13, 1, 'vbdv', 60000, 6, 1777550506, 360000, '2022-05-23 08:27:49', NULL),
(17, 'Habib', 'Shopno Traders', 13, 1, 'hfc', 40000, 80, 1777550506, 3200000, '2022-05-23 08:45:38', NULL),
(18, 'Asad ', 'Habib Traders', 13, 1, 'vfb b', 5000, 5, 1777550506, 25000, '2022-05-23 08:49:10', NULL),
(19, 'Habib', 'R F L', 13, 1, 'hhhhh', 5000, 5, 1777550506, 25000, '2022-05-23 08:57:08', NULL),
(20, 'Habib', 'R F L', 13, 1, 'hhhhh', 5000, 5, 1777550506, 25000, '2022-05-23 08:57:52', NULL),
(22, 'Juel', 'Habib Traders', 13, 1, 'dg', 5000, 4, 1777550506, 20000, '2022-05-23 09:02:45', NULL),
(23, 'Juel', 'Habib Traders', 13, 1, 'dg', 5000, 4, 1777550506, 20000, '2022-05-23 09:02:58', NULL),
(24, 'Juel', 'Habib Traders', 13, 1, 'dg', 5000, 4, 1777550506, 20000, '2022-05-23 09:03:33', NULL),
(25, 'Juel', 'Habib Traders', 13, 1, 'dg', 5000, 4, 1777550506, 20000, '2022-05-23 09:04:26', NULL),
(26, 'Juel', 'Habib Traders', 13, 1, 'dg', 5000, 4, 1777550506, 20000, '2022-05-23 09:06:26', NULL),
(27, 'Asad ', 'Shopno Traders', 13, 1, 'rccg', 40000, 200, 1777550506, 8000000, '2022-05-23 09:14:03', NULL),
(28, 'Asad ', 'Shopno Traders', 13, 1, 'rccg', 40000, 200, 1777550506, 8000000, '2022-05-23 09:16:22', NULL),
(29, 'Asad ', 'Habib Traders', 13, 1, 'jb gj', 5000, 5, 1777550506, 25000, '2022-05-24 02:57:47', NULL),
(30, 'Asad ', 'Habib Traders', 13, 1, 'jb gj', 5000, 5, 1777550506, 25000, '2022-05-24 02:58:29', NULL),
(31, 'Asad ', 'Habib Traders', 13, 1, 'jb gj', 5000, 5, 1777550506, 25000, '2022-05-24 02:59:40', NULL),
(32, 'Asad ', 'Shopno Traders', 13, 1, 'gdcg', 8000, 5, 1777550506, 40000, '2022-05-24 03:14:02', NULL),
(33, 'Asad ', 'Shopno Traders', 13, 1, 'gdcg', 8000, 5, 1777550506, 40000, '2022-05-24 03:15:10', NULL),
(34, 'Asad ', 'Shopno Traders', 13, 1, 'gdcg', 8000, 5, 1777550506, 40000, '2022-05-24 03:17:19', NULL),
(35, 'Asad ', 'Shopno Traders', 13, 1, 'gdcg', 8000, 5, 1777550506, 40000, '2022-05-24 03:21:01', NULL),
(36, 'Asad ', 'Shopno Traders', 13, 1, 'gdcg', 8000, 5, 1777550506, 40000, '2022-05-24 03:25:05', NULL),
(37, 'Asad ', 'Shopno Traders', 13, 1, 'gdcg', 8000, 5, 1777550506, 40000, '2022-05-24 03:31:41', NULL),
(38, 'Asad ', 'Shopno Traders', 13, 1, 'tg  mj', 60000, 10, 1777550506, 600000, '2022-05-24 03:33:31', NULL),
(39, 'Habib', 'Shopno Traders', 8, 2, 'this is color', 40000, 6, 1777550506, 240000, '2022-05-24 03:43:00', NULL),
(40, 'Liton', 'Shopno Traders', 13, 3, 'this is ms sheet', 60000, 2, 1777550506, 120000, '2022-05-24 10:03:17', NULL),
(41, 'Saddam', 'R F L', 14, 4, 'This is requirement basis', 60000, 6, 1777550506, 360000, '2022-05-30 10:00:31', NULL),
(42, 'touhid', 'R F L', 8, 5, 'Thiss', 60000, 4, 1777550506, 240000, '2022-06-02 06:29:45', NULL),
(43, 'asad', 'Shopno Traders', 13, 6, 'efcgv', 60000, 3, 1777550506, 180000, '2022-06-06 04:53:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requisition`
--

CREATE TABLE `tbl_requisition` (
  `id` int(11) NOT NULL,
  `RequisitionTitle` varchar(150) DEFAULT NULL,
  `RequisitionIteam` int(11) DEFAULT NULL,
  `RequisitionDetails` longtext DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `T_Price` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_requisition`
--

INSERT INTO `tbl_requisition` (`id`, `RequisitionTitle`, `RequisitionIteam`, `RequisitionDetails`, `Price`, `Quantity`, `T_Price`, `RegDate`, `UpdationDate`) VALUES
(1, 'job-102', 14, 'ggg', 60000, 9, 540000, '2022-05-22 09:28:26', '2022-05-31 04:38:43'),
(2, 'Job-555', 8, 'this is stell', 60000, 4, 240000, '2022-05-24 03:38:17', NULL),
(3, 'job-450', 13, 'this is ms sheet', 60000, 4, 240000, '2022-05-24 10:01:44', NULL),
(4, 'job-200', 14, 'This Is SS Five for Job-200', 60000, 5, 300000, '2022-05-30 09:59:11', NULL),
(5, 'job-990', 8, 'this is sstell', 60000, 5, 300000, '2022-06-02 06:28:41', NULL),
(6, 'job-1000', 13, 'efdxeg', 60000, 4, 240000, '2022-06-06 04:52:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requ_purch`
--

CREATE TABLE `tbl_requ_purch` (
  `id` int(11) NOT NULL,
  `RequisitionTitleRP` varchar(150) DEFAULT NULL,
  `RequisitionIteamRP` int(11) DEFAULT NULL,
  `T_PriceRP` int(11) DEFAULT NULL,
  `pur_t_price` int(11) DEFAULT NULL,
  `t_due` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_requ_purch`
--

INSERT INTO `tbl_requ_purch` (`id`, `RequisitionTitleRP`, `RequisitionIteamRP`, `T_PriceRP`, `pur_t_price`, `t_due`, `RegDate`, `UpdationDate`) VALUES
(1, 'job-102', 14, 600000, 600000, 0, '2022-05-22 09:28:26', '2022-05-30 09:50:34'),
(2, 'Job-555', 8, 240000, 240000, 0, '2022-05-24 03:38:17', '2022-05-24 03:43:00'),
(3, 'job-450', 13, 240000, 120000, 120000, '2022-05-24 10:01:44', '2022-05-24 10:03:17'),
(4, 'job-200', 14, 300000, 360000, -60000, '2022-05-30 09:59:11', '2022-05-30 10:00:31'),
(5, 'job-990', 8, 300000, 240000, 60000, '2022-06-02 06:28:41', '2022-06-02 06:29:45'),
(6, 'job-1000', 13, 240000, 180000, 60000, '2022-06-06 04:52:40', '2022-06-06 04:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '2021-01-08 07:35:39' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'user', 'c33367701511b4f6020ec61ded352059', '2022-06-04 05:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbliteam`
--
ALTER TABLE `tbliteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tbl_dlvr_install`
--
ALTER TABLE `tbl_dlvr_install`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_install`
--
ALTER TABLE `tbl_install`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_production`
--
ALTER TABLE `tbl_production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_requisition`
--
ALTER TABLE `tbl_requisition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_requ_purch`
--
ALTER TABLE `tbl_requ_purch`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbliteam`
--
ALTER TABLE `tbliteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dlvr_install`
--
ALTER TABLE `tbl_dlvr_install`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_install`
--
ALTER TABLE `tbl_install`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_production`
--
ALTER TABLE `tbl_production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_requisition`
--
ALTER TABLE `tbl_requisition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_requ_purch`
--
ALTER TABLE `tbl_requ_purch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
