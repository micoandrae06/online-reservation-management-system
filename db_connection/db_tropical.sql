-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 09:07 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Database: `db_tropical`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rates`
--

CREATE TABLE `tbl_rates` (
  `_id` int(11) NOT NULL,
  `_exceeding_hour` double NOT NULL,
  `_extra_person` double NOT NULL,
  `_extra_bed` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rates`
--

INSERT INTO `tbl_rates` (`_id`, `_exceeding_hour`, `_extra_person`, `_extra_bed`) VALUES
(1, 150, 250, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resort`
--

CREATE TABLE `tbl_resort` (
  `_id` int(11) NOT NULL,
  `_resort_id` varchar(255) NOT NULL,
  `_resort_description` varchar(255) NOT NULL,
  `_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resort`
--

INSERT INTO `tbl_resort` (`_id`, `_resort_id`, `_resort_description`, `_img`) VALUES
(2, 'Resort', 'Resort na maganda', '1667417188093.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resort_lodging`
--

CREATE TABLE `tbl_resort_lodging` (
  `_id` int(11) NOT NULL,
  `_transaction_num` varchar(255) NOT NULL,
  `_date` date NOT NULL,
  `_guest_email` varchar(255) NOT NULL,
  `_guest_name` varchar(255) NOT NULL,
  `_guest_contact` varchar(255) NOT NULL,
  `_guest_address` varchar(1000) NOT NULL,
  `_resort_id` varchar(255) NOT NULL,
  `_tour_type` varchar(255) NOT NULL,
  `_rate` double NOT NULL,
  `_total_amount` double NOT NULL,
  `_payment` double NOT NULL,
  `_balance` double NOT NULL,
  `_checkedin_time` datetime NOT NULL,
  `_checkedout_time` datetime NOT NULL,
  `_guest_origin` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `_gcash_request_code` varchar(255) NOT NULL,
  `_cancellation_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resort_lodging`
--

INSERT INTO `tbl_resort_lodging` (`_id`, `_transaction_num`, `_date`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_resort_id`, `_tour_type`, `_rate`, `_total_amount`, `_payment`, `_balance`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status`, `_gcash_request_code`, `_cancellation_reason`) VALUES
(5, '20221104164016980388', '2022-11-04', '', '', '', '', '1', 'Overnight', 2, 2, 2, 0, '2022-11-04 23:40:16', '2022-11-04 23:59:47', 'walk-in', 'checked-out', '', ''),
(6, '20221104164716872013', '2022-11-04', '', '', '', '', 'Resort', 'Day Tour', 2, 2, 2, 0, '2022-11-04 23:47:16', '2022-11-05 00:02:17', 'walk-in', 'checked-out', '', ''),
(2, '20221104233645000000', '2022-11-04', '', '', '', '', '1', 'Overnight', 2, 2, 2, 0, '0000-00-00 00:00:00', '2022-11-04 23:36:55', 'walk-in', 'checked-out', '', ''),
(3, '20221104233727000000', '2022-11-04', '', '', '', '', '1', 'Overnight', 2, 2, 2, 0, '2022-11-04 23:37:27', '2022-11-04 23:47:54', 'walk-in', 'checked-out', '', ''),
(4, '20221104233826000000', '2022-11-04', '', '', '', '', '1', 'Overnight', 2, 2, 2, 0, '2022-11-04 23:38:26', '2022-11-04 23:48:13', 'walk-in', 'checked-out', '', ''),
(7, '20221105050423371815', '2022-11-05', '', '', '', '', 'Resort', 'Overnight', 2, 2, 2, 0, '2022-11-05 12:04:23', '2022-11-05 12:17:30', 'walk-in', 'checked-out', '', ''),
(1, 'd7564b1d2644388b2c8aab115728a772', '2022-11-04', 'hernandez_elijah@outlook.com', 'Elijah Hidalgo Hernandez', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'Resort', 'Day Tour', 2, 2, 1, 1, '2022-11-04 15:38:49', '2022-11-04 15:51:22', 'reservation', 'checked-out', '20221104BPW213', 'Did not receive a payment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resort_rate`
--

CREATE TABLE `tbl_resort_rate` (
  `_id` int(11) NOT NULL,
  `_tour_type` varchar(255) NOT NULL,
  `_tour_description` varchar(255) NOT NULL,
  `_pax` int(11) NOT NULL,
  `_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resort_rate`
--

INSERT INTO `tbl_resort_rate` (`_id`, `_tour_type`, `_tour_description`, `_pax`, `_price`) VALUES
(1, 'Day Tour', '5:00 AM - 5:00 PM', 25, 2),
(3, 'Overnight', '5:00 PM - 5:00 AM', 10, 2),
(4, 'Day Tour', '5:00 AM - 5:00 PM', 15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `_id` int(11) NOT NULL,
  `_room_id` varchar(50) NOT NULL,
  `_room_type` varchar(255) NOT NULL,
  `_room_description` varchar(1000) NOT NULL,
  `_img` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`_id`, `_room_id`, `_room_type`, `_room_description`, `_img`, `_status`) VALUES
(2, 'test23', 'Standard Room', 'Double size bed - 22 flat TV - With Cabinet - Free Wifi', '1667414920274.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_lodging`
--

CREATE TABLE `tbl_room_lodging` (
  `_id` int(11) NOT NULL,
  `_transaction_num` varchar(255) NOT NULL,
  `_date` date NOT NULL,
  `_arrival_time` datetime NOT NULL,
  `_checkout_time` datetime NOT NULL,
  `_guest_email` varchar(255) NOT NULL,
  `_guest_name` varchar(255) NOT NULL,
  `_guest_contact` varchar(255) NOT NULL,
  `_guest_address` varchar(1000) NOT NULL,
  `_room_id` varchar(255) NOT NULL,
  `_room_type` varchar(255) NOT NULL,
  `_hours` int(11) NOT NULL,
  `_rate` double NOT NULL,
  `_extra_person` int(11) NOT NULL,
  `_extra_person_rate` double NOT NULL,
  `_extra_bed` int(11) NOT NULL,
  `_extra_bed_rate` double NOT NULL,
  `_exceeding_hours` int(11) NOT NULL,
  `_exceeding_hours_rate` double NOT NULL,
  `_total_amount` double NOT NULL,
  `_payment` double NOT NULL,
  `_balance` double NOT NULL,
  `_room_transfer` varchar(255) NOT NULL,
  `_checkedin_time` datetime NOT NULL,
  `_checkedout_time` datetime NOT NULL,
  `_guest_origin` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `_gcash_request_code` varchar(255) NOT NULL,
  `_cancellation_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room_lodging`
--

INSERT INTO `tbl_room_lodging` (`_id`, `_transaction_num`, `_date`, `_arrival_time`, `_checkout_time`, `_guest_email`, `_guest_name`, `_guest_contact`, `_guest_address`, `_room_id`, `_room_type`, `_hours`, `_rate`, `_extra_person`, `_extra_person_rate`, `_extra_bed`, `_extra_bed_rate`, `_exceeding_hours`, `_exceeding_hours_rate`, `_total_amount`, `_payment`, `_balance`, `_room_transfer`, `_checkedin_time`, `_checkedout_time`, `_guest_origin`, `_status`, `_gcash_request_code`, `_cancellation_reason`) VALUES
(13, '20221104164131205804', '2022-11-04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'test23', 'Standard Room', 6, 3, 0, 250, 0, 500, 1, 150, 153, 3, 0, '', '2022-11-04 23:41:31', '2022-11-04 23:58:55', 'walk-in', 'checked-out', '', ''),
(11, '20221104213408000000', '2022-11-04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 2, 0, '', '2022-11-04 21:34:08', '2022-11-04 21:41:41', 'walk-in', 'checked-out', '', ''),
(14, '20221105033943328364', '2022-11-05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'test23', 'Standard Room', 3, 2, 1, 250, 0, 500, 0, 150, 252, 252, 0, '', '2022-11-05 10:39:43', '2022-11-05 11:58:46', 'walk-in', 'checked-out', '', ''),
(15, '20221105050028065669', '2022-11-05', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 2, 0, '', '2022-11-05 12:00:28', '2022-11-05 12:00:32', 'walk-in', 'checked-out', '', ''),
(9, '3082817cfc064a066c4da77b034cfa80', '2022-11-07', '2022-11-07 16:30:00', '2022-11-07 19:30:00', 'marquesescharles@gmail.com', 'charles esmalla marqueses', '09471093329', 'dito lang', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'reservation', 'cancelled', '20221104BRX943', 'Did not receive a payment'),
(6, '47c33e6d34df44145ce44a3c4c5481a6', '2022-11-04', '2022-11-05 09:50:00', '2022-11-05 12:50:00', 'hernandez_elijah@outlook.com', 'Elijah Hidalgo Hernandez', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'reservation', 'cancelled', '20221104BPF463', 'Did not receive a payment'),
(5, '52b8b5ca069730c4148fa688eb8260a7', '2022-11-04', '2022-11-05 09:47:00', '2022-11-05 12:47:00', 'hernandez_elijah@outlook.com', 'Elijah Hidalgo Hernandez', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '2022-11-04 15:34:40', '2022-11-04 15:51:16', 'reservation', 'checked-out', '20221104BPF185', ''),
(10, 'a4db7b6addab5279fd5843af48495596', '2022-11-09', '2022-11-09 16:53:00', '2022-11-09 19:53:00', 'marquesescharles@gmail.com', 'charles esmalla marqueses', '09471093329', 'dito lang', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'reservation', 'cancelled', '20221104BRY351', 'Other destination preferred'),
(4, 'a9ba2f3c186dbda7413c4bb2b40242d9', '2022-11-05', '2022-11-05 09:44:00', '2022-11-05 12:44:00', 'hernandez_elijah@outlook.com', 'Elijah Hidalgo Hernandez', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'reservation', 'cancelled', '20221104BPE851', 'Decided to stay at home'),
(7, 'b48b7a8e2797d6f1c5e25b9602c990c6', '2022-11-05', '2022-11-05 04:20:00', '2022-11-05 07:20:00', 'hernandez_elijah@outlook.com', 'Elijah Hidalgo Hernandez', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '2022-11-05 16:32:36', '2022-11-04 21:41:38', 'reservation', 'checked-out', '20221104BRV026', ''),
(2, 'c0ee7516e85d8f79d2e14001cb8fd684', '2022-11-05', '2022-11-05 03:08:00', '2022-11-05 06:08:00', 'hernandez_elijah@outlook.com', 'Elijah Hidalgo Hernandez', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'reservation', 'cancelled', '0', 'Change of plan'),
(3, 'c1ae1c2932b7051af62144e5a3b3cca5', '2022-11-12', '2022-11-12 03:19:00', '2022-11-12 06:19:00', 'hernandez_elijah@outlook.com', 'Elijah Hidalgo Hernandez', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'reservation', 'cancelled', '20221104BMU119', 'Duplicate booking'),
(8, 'f83756f2bac4edff19dc74b579f43453', '2022-11-05', '2022-11-05 16:30:00', '2022-11-05 19:30:00', 'hernandez_elijah@outlook.com', 'Elijah Hidalgo Hernandez', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'test23', 'Standard Room', 3, 2, 0, 250, 0, 500, 0, 150, 2, 1, 1, '', '2022-11-05 10:31:48', '2022-11-05 10:39:08', 'reservation', 'checked-out', '20221104BRW052', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_rate`
--

CREATE TABLE `tbl_room_rate` (
  `_id` int(11) NOT NULL,
  `_room_type` varchar(255) NOT NULL,
  `_3_hr` double NOT NULL,
  `_6_hr` double NOT NULL,
  `_12_hr` double NOT NULL,
  `_24_hr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room_rate`
--

INSERT INTO `tbl_room_rate` (`_id`, `_room_type`, `_3_hr`, `_6_hr`, `_12_hr`, `_24_hr`) VALUES
(2, 'Deluxe Room', 1, 2, 3, 4),
(1, 'Standard Room', 2, 3, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tropi`
--

CREATE TABLE `tbl_tropi` (
  `_id` int(11) NOT NULL,
  `_keyword` varchar(10000) NOT NULL,
  `_reply` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tropi`
--

INSERT INTO `tbl_tropi` (`_id`, `_keyword`, `_reply`) VALUES
(1, 'What are the services being offered by your business?', 'hotel accommodations and swimming pool (resort)'),
(2, 'What is the price rate for the hotel accommodation?', 'Standard Room: 3 hrs - Php350      6 hrs - Php550                            12 hrs - Php850    24 hrs - Php1500'),
(3, 'What is the price rate for the hotel accommodation?', 'Deluxe Room:   3 hrs â€“ Php450      6 hrs â€“ Php750                            12 hrs â€“ Php1250    24 hrs â€“ Php2000'),
(4, 'What is the price rate for the hotel accommodation?', 'Exceeding Hour: Php150'),
(5, 'What is the price rate for the hotel accommodation?', 'Extra Person: Php250'),
(6, 'What is the price rate for the hotel accommodation?', 'Extra Bed: Php500'),
(7, 'How many people can be in one room?', '3 to 4 person'),
(8, 'What is the time allowed in swimming pool?', 'Day Tour: 8:00AM - 5:00PM'),
(9, 'What is the time allowed in swimming pool?', 'Overnight: 6:00PM - 5:00AM'),
(10, 'What are the features of your hotel rooms?', 'STANDARD ROOM - Double size bed - 22 flat TV - With Cabinet - Free Wifi'),
(11, 'What are the features of your hotel rooms?', 'DELUXE ROOM - Queen size bed - 32 flat TV - Bathroom Heater - With Cabinet - Free Wifi'),
(12, 'Do you have parking slots?', '5 for cars and 10 for motorcycles'),
(13, 'What are the occasions that can be held in the venue?', 'Family outings, weddings, birthday parties, corporate seminars and conferences'),
(14, 'What is the business current working hours?', '24/7 working hours'),
(17, 'San ka punta?', 'to the moon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `_id` int(11) NOT NULL,
  `_email` varchar(255) NOT NULL,
  `_first_name` varchar(255) NOT NULL,
  `_middle_name` varchar(255) NOT NULL,
  `_surname` varchar(255) NOT NULL,
  `_birthday` date NOT NULL,
  `_contact` varchar(255) NOT NULL,
  `_address` varchar(1000) NOT NULL,
  `_usertype` varchar(255) NOT NULL,
  `_password` varchar(255) NOT NULL,
  `_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`_id`, `_email`, `_first_name`, `_middle_name`, `_surname`, `_birthday`, `_contact`, `_address`, `_usertype`, `_password`, `_status`) VALUES
(10, '2134edsczx@gmail.com', 'zsdxfas', 'asdasd', 'sdfsdf', '1994-11-25', '09281565442', 'zasdasd', 'Frontdesk', '1', 'verified'),
(1, 'Administrator', 'asdasdasd', 'asdasd', 'asdasd', '1994-11-15', '09281565544', 'asddasd', 'Administrator', 'admin', 'verified'),
(6, 'hernandez_elijah@outlook.com', 'Elijah', 'Hidalgo', 'Hernandez', '1994-11-15', '09281565442', 'San Pedro, Sto Tomas, Batangas', 'Guest', 'QILj4n)3', 'verified'),
(7, 'marquesescharles@gmail.com', 'charles', 'esmalla', 'marqueses', '1998-12-11', '09471093329', 'dito lang', 'Guest', '123456', 'verified'),
(9, 'ysabelijah@gmail.com', 'Eliana', 'Efe', 'Hernandez', '1994-11-15', '9281565442', 'tayte', 'Frontdesk', 'asd', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_rates`
--
ALTER TABLE `tbl_rates`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  ADD PRIMARY KEY (`_resort_id`),
  ADD KEY `_id` (`_id`);

--
-- Indexes for table `tbl_resort_lodging`
--
ALTER TABLE `tbl_resort_lodging`
  ADD PRIMARY KEY (`_transaction_num`),
  ADD KEY `_id` (`_id`);

--
-- Indexes for table `tbl_resort_rate`
--
ALTER TABLE `tbl_resort_rate`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`_room_id`),
  ADD KEY `_id` (`_id`);

--
-- Indexes for table `tbl_room_lodging`
--
ALTER TABLE `tbl_room_lodging`
  ADD PRIMARY KEY (`_transaction_num`),
  ADD KEY `_id` (`_id`);

--
-- Indexes for table `tbl_room_rate`
--
ALTER TABLE `tbl_room_rate`
  ADD PRIMARY KEY (`_room_type`),
  ADD KEY `_id` (`_id`);

--
-- Indexes for table `tbl_tropi`
--
ALTER TABLE `tbl_tropi`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`_email`),
  ADD KEY `_id` (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_rates`
--
ALTER TABLE `tbl_rates`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_resort`
--
ALTER TABLE `tbl_resort`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_resort_lodging`
--
ALTER TABLE `tbl_resort_lodging`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_resort_rate`
--
ALTER TABLE `tbl_resort_rate`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_room_lodging`
--
ALTER TABLE `tbl_room_lodging`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_room_rate`
--
ALTER TABLE `tbl_room_rate`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tropi`
--
ALTER TABLE `tbl_tropi`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
