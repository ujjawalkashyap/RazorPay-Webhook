-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 03:49 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webhook`
--

-- --------------------------------------------------------

--
-- Table structure for table `webhook_dispute`
--

CREATE TABLE `webhook_dispute` (
  `webhook_dispute_id` bigint(20) NOT NULL,
  `webhook_id` bigint(20) NOT NULL,
  `id` varchar(50) DEFAULT NULL,
  `entity` varchar(50) DEFAULT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `amount_deducted` varchar(50) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `gateway_dispute_id` varchar(50) DEFAULT NULL,
  `reason_code` varchar(50) DEFAULT NULL,
  `respond_by` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `phase` varchar(50) DEFAULT NULL,
  `created_at` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webhook_invoice`
--

CREATE TABLE `webhook_invoice` (
  `webhook_invoice_id` bigint(20) NOT NULL,
  `webhook_id` bigint(20) NOT NULL,
  `id` varchar(50) DEFAULT NULL,
  `receipt` varchar(50) NOT NULL,
  `entity` varchar(50) DEFAULT NULL,
  `customer_id` varchar(50) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_contact` varchar(50) DEFAULT NULL,
  `customer_address` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `line_items` varchar(50) DEFAULT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `issued_at` varchar(50) DEFAULT NULL,
  `paid_at` varchar(50) DEFAULT NULL,
  `sms_status` varchar(50) DEFAULT NULL,
  `email_status` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `terms` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `shorts_url` varchar(50) DEFAULT NULL,
  `view_less` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created_at` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webhook_order`
--

CREATE TABLE `webhook_order` (
  `webhook_order_id` bigint(20) NOT NULL,
  `webhook_id` bigint(20) NOT NULL,
  `id` varchar(50) NOT NULL,
  `entity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `receipt` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `card_id` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `captured` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `error_code` varchar(255) DEFAULT NULL,
  `error_description` varchar(255) DEFAULT NULL,
  `fee` varchar(50) DEFAULT NULL,
  `service_tax` varchar(15) DEFAULT NULL,
  `international` tinyint(1) DEFAULT NULL,
  `vpa` varchar(50) DEFAULT NULL,
  `wallet` varchar(50) DEFAULT NULL,
  `attempts` varchar(15) DEFAULT NULL,
  `created_at` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webhook_payment`
--

CREATE TABLE `webhook_payment` (
  `webhook_payment_id` bigint(20) NOT NULL,
  `webhook_id` bigint(20) NOT NULL,
  `id` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `currency` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webhook_primary`
--

CREATE TABLE `webhook_primary` (
  `webhook_id` bigint(20) NOT NULL,
  `event` enum('payment.authorized','payment.failed','payment.captured','payment.dispute.created','order.paid','invoice.paid','invoice.expired','settlement.processed','subscription.charged') NOT NULL DEFAULT 'payment.captured',
  `full_data` text,
  `created_ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webhook_subscription`
--

CREATE TABLE `webhook_subscription` (
  `webhook_subscription_id` bigint(20) NOT NULL,
  `webhook_id` bigint(20) NOT NULL,
  `id` varchar(50) DEFAULT NULL,
  `entity` varchar(50) DEFAULT NULL,
  `plan_id` varchar(50) DEFAULT NULL,
  `customer_id` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `current_start` varchar(50) DEFAULT NULL,
  `current_end` varchar(50) DEFAULT NULL,
  `ended_at` varchar(50) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `notes` varchar(50) DEFAULT NULL,
  `charge_at` varchar(50) DEFAULT NULL,
  `start_at` varchar(50) DEFAULT NULL,
  `end_at` varchar(50) DEFAULT NULL,
  `auth_attempts` varchar(20) DEFAULT NULL,
  `total_count` varchar(20) DEFAULT NULL,
  `paid_count` varchar(20) DEFAULT NULL,
  `customer_notify` tinyint(1) DEFAULT NULL,
  `created_at` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `webhook_dispute`
--
ALTER TABLE `webhook_dispute`
  ADD PRIMARY KEY (`webhook_dispute_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `webhook_id` (`webhook_id`);

--
-- Indexes for table `webhook_invoice`
--
ALTER TABLE `webhook_invoice`
  ADD PRIMARY KEY (`webhook_invoice_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `webhook_id` (`webhook_id`);

--
-- Indexes for table `webhook_order`
--
ALTER TABLE `webhook_order`
  ADD PRIMARY KEY (`webhook_order_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `webhook_id` (`webhook_id`);

--
-- Indexes for table `webhook_payment`
--
ALTER TABLE `webhook_payment`
  ADD PRIMARY KEY (`webhook_payment_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `webhook_id` (`webhook_id`);

--
-- Indexes for table `webhook_primary`
--
ALTER TABLE `webhook_primary`
  ADD PRIMARY KEY (`webhook_id`);

--
-- Indexes for table `webhook_subscription`
--
ALTER TABLE `webhook_subscription`
  ADD PRIMARY KEY (`webhook_subscription_id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `webhook_id` (`webhook_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `webhook_dispute`
--
ALTER TABLE `webhook_dispute`
  MODIFY `webhook_dispute_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webhook_invoice`
--
ALTER TABLE `webhook_invoice`
  MODIFY `webhook_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webhook_order`
--
ALTER TABLE `webhook_order`
  MODIFY `webhook_order_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webhook_payment`
--
ALTER TABLE `webhook_payment`
  MODIFY `webhook_payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webhook_primary`
--
ALTER TABLE `webhook_primary`
  MODIFY `webhook_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `webhook_subscription`
--
ALTER TABLE `webhook_subscription`
  MODIFY `webhook_subscription_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `webhook_dispute`
--
ALTER TABLE `webhook_dispute`
  ADD CONSTRAINT `webhook_dispute_ibfk_1` FOREIGN KEY (`webhook_id`) REFERENCES `webhook_primary` (`webhook_id`);

--
-- Constraints for table `webhook_invoice`
--
ALTER TABLE `webhook_invoice`
  ADD CONSTRAINT `webhook_invoice_ibfk_1` FOREIGN KEY (`webhook_id`) REFERENCES `webhook_primary` (`webhook_id`);

--
-- Constraints for table `webhook_order`
--
ALTER TABLE `webhook_order`
  ADD CONSTRAINT `webhook_order_ibfk_1` FOREIGN KEY (`webhook_id`) REFERENCES `webhook_primary` (`webhook_id`);

--
-- Constraints for table `webhook_payment`
--
ALTER TABLE `webhook_payment`
  ADD CONSTRAINT `webhook_payment_ibfk_1` FOREIGN KEY (`webhook_id`) REFERENCES `webhook_primary` (`webhook_id`);

--
-- Constraints for table `webhook_subscription`
--
ALTER TABLE `webhook_subscription`
  ADD CONSTRAINT `webhook_subscription_ibfk_1` FOREIGN KEY (`webhook_id`) REFERENCES `webhook_primary` (`webhook_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
