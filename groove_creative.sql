-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2021 at 02:07 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groove_creative`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendance_status` int(11) NOT NULL,
  `fingerprint_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@groove-creative.com', '0', NULL, NULL),
(3, 'Pegawai1', 'test@test.com', '00000', '2021-07-08 03:39:40', '2021-07-08 03:39:40'),
(4, 'Pegawai2', 'test2@gmail.com', '00000000000000', '2021-07-14 06:51:04', '2021-07-14 06:51:04'),
(5, 'Pegawai3', 'test3@gmail.com', '00000000000000', '2021-07-14 06:51:38', '2021-07-14 06:51:38'),
(6, 'Pegawai4', 'test4@gmail.com', '000000000', '2021-07-14 06:51:53', '2021-07-14 06:51:53'),
(7, 'Pegawai5', 'test5@gmail.com', '0000000000000', '2021-07-14 06:52:47', '2021-07-14 06:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fingerprints`
--

CREATE TABLE `fingerprints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ammount` int(11) NOT NULL,
  `invoice_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `ammount`, `invoice_pembelian`, `description`, `created_at`, `updated_at`) VALUES
(1, 150000, 'cbe771868d7f82f7652a64741fba6482.jpg', 'testt', '2021-08-10 05:13:49', '2021-08-10 05:13:49'),
(2, 1200000, 'ff2cfdd52a56e43d06b165f3839b1b7e.png', 'Test pengeluaran proyek 1', '2021-08-11 06:32:48', '2021-08-11 06:32:48'),
(3, 1200000, '35616ea4bd4243c4a8f6358ef5863aed.png', 'Test pengeluaran proyek 1', '2021-08-11 06:33:35', '2021-08-11 06:33:35'),
(4, 1200000, '8e45d5e8ea573313999b27bf75584453.png', 'Test pengeluaran proyek 1', '2021-08-11 06:34:09', '2021-08-11 06:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2021_06_09_065620_create_supplies_table', 1),
(3, '2021_06_09_103431_create_projects_table', 1),
(4, '2021_06_09_103659_create_employees_table', 1),
(5, '2021_06_09_103808_create_user_roles_table', 1),
(6, '2021_06_09_103832_create_users_table', 1),
(7, '2021_06_09_104440_create_transactions_table', 1),
(8, '2021_06_09_104636_create_transaction_details_table', 1),
(9, '2021_06_09_123216_create_project_employees_table', 1),
(10, '2021_06_09_130955_create_project_invoices_table', 1),
(11, '2021_06_09_131108_create_fingerprints_table', 1),
(12, '2021_06_09_131116_create_attendances_table', 1),
(13, '2021_06_17_130423_create_ledgers_table', 1),
(14, '2021_06_29_091200_create_project_ledgers_table', 1),
(15, '2021_06_29_091515_create_supply_ledgers_table', 1),
(16, '2021_07_27_163626_create_short_links_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_phone` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimate_budget` int(11) NOT NULL,
  `project_status` int(11) NOT NULL,
  `pay_status` int(11) NOT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_leader_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `client_name`, `client_email`, `client_phone`, `estimate_budget`, `project_status`, `pay_status`, `project_description`, `project_leader_id`, `created_at`, `updated_at`) VALUES
(27, 'Proyek 1 Test', 'Klien 1', 'klien1@mail.com', '', 45000000, 1, 2, 'proyek test 1', 6, '2021-08-03 05:25:16', '2021-08-08 03:20:31'),
(28, 'Proyek 2 Teest', 'Test 2', 'test2@gmail.com', '', 15000000, 1, 2, 'Proyek 2 Test', 5, '2021-08-08 04:04:47', '2021-08-10 04:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `project_invoices`
--

CREATE TABLE `project_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_invoice` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_pay` bigint(20) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `invoice_status` int(11) DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_invoices`
--

INSERT INTO `project_invoices` (`id`, `no_invoice`, `order_id`, `total_pay`, `payment_method`, `bukti_pembayaran`, `invoice_type`, `status`, `invoice_status`, `project_id`, `created_at`, `updated_at`) VALUES
(1, '1/GC/V/2021', 'GCO-210807-08084-27', 45000000, 'By System', NULL, 1, 1, 200, 27, '2021-08-04 21:19:50', '2021-08-08 03:20:31'),
(2, '2/GC/V/2021', 'GCO-210808-07368-28', 3000000, 'By System', NULL, 0, 1, 200, 28, '2021-08-08 11:44:56', '2021-08-10 04:28:51'),
(3, '3/GC/V/2021', 'GCO-210808-07818-28', 12000000, 'By System', NULL, 1, 1, 200, 28, '2021-08-08 12:31:11', '2021-08-10 04:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `project_ledgers`
--

CREATE TABLE `project_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ledger_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_ledgers`
--

INSERT INTO `project_ledgers` (`id`, `ledger_id`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 1, 28, '2021-08-10 05:13:49', '2021-08-10 05:13:49'),
(2, 4, 27, '2021-08-11 06:34:09', '2021-08-11 06:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `short_links`
--

CREATE TABLE `short_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supply_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `supply_name`, `price`, `stock`, `unit`, `created_at`, `updated_at`) VALUES
(4, 'Kertas A5', 78450, 4, 'rim', '2021-07-04 05:54:16', '2021-07-04 05:54:16'),
(5, 'Akrilik 150cmx100cm', 345000, 2, 'lembar', '2021-07-04 07:09:26', '2021-07-05 06:04:23'),
(6, 'Test', 1234567, 3, 'lembar', '2021-07-04 07:09:46', '2021-07-05 06:56:09'),
(7, 'test123', 1234555, 3, 'lembar', '2021-07-04 07:10:05', '2021-07-05 06:53:05'),
(8, 'Test1234', 1500002, 1, 'lembar', '2021-07-05 05:11:57', '2021-07-05 06:56:03'),
(10, 'ini cobaan', 100000, 5, 'lembar', '2021-07-05 16:03:09', '2021-07-05 16:03:09'),
(12, 'Cobain terus', 9000, 45, '', '2021-07-05 16:03:29', '2021-07-05 16:03:29'),
(13, 'test223', 45000, 23, '', '2021-07-05 16:46:02', '2021-07-05 16:46:30'),
(14, 'SSSSSS', 12342, 5, '', '2021-07-06 12:34:00', '2021-07-06 12:34:00'),
(15, 'test2232', 45000, 22, '', '2021-07-08 10:27:42', '2021-07-08 10:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `supply_ledgers`
--

CREATE TABLE `supply_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ledgers_id` bigint(20) UNSIGNED NOT NULL,
  `supply_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `supply_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `user_role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `account_status`, `avatar`, `employee_id`, `user_role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$mwcz8bM/M0NyCLEys7333.MNFqm0VvGOr/96.lwW6j2ePTfa6rWHy', 1, 'avatar.png', 1, 1, NULL, NULL),
(3, 'test', '$2y$10$9ftVD91HXgHtQu3x5/g6f.m6gyw9JrPg4n50aLUHKjNBNesJodqsS', 1, 'avatar.png', 3, 2, '2021-07-08 03:39:40', '2021-07-08 03:43:44'),
(4, 'test2', '$2y$10$F0KtMGMtrTz.iOpTFN4hGOcmaJ/G55lDRR5flQ23FsN94rmWlc.WC', 1, 'avatar.png', 4, 2, '2021-07-14 06:51:04', '2021-07-14 06:51:27'),
(5, 'test3', '$2y$10$KMMYRaauAZIodJN.6UXcP.ym56dBthVtv6QXEqD59Ikkt3NhfQ4t6', 1, 'avatar.png', 5, 2, '2021-07-14 06:51:38', '2021-07-14 06:51:56'),
(6, 'test4', '$2y$10$ybzAfS0/7fF7SWOU3Mm7RuyuRzF3n/b1HcDrc6WRlxrDAVvyDBreW', 1, 'avatar.png', 6, 2, '2021-07-14 06:51:54', '2021-07-14 06:51:57'),
(7, 'test5', '$2y$10$t3kmLoyjtbbgibgViPwLUOTkNG5O/IbO8Jc6ZOCMQkb1aueyayN/y', 1, 'avatar.png', 7, 2, '2021-07-14 06:52:47', '2021-07-14 06:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'owner', NULL, NULL),
(3, 'pegawai', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_fingerprint_id_foreign` (`fingerprint_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fingerprints`
--
ALTER TABLE `fingerprints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fingerprints_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_project_leader_id_foreign` (`project_leader_id`);

--
-- Indexes for table `project_invoices`
--
ALTER TABLE `project_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_invoices_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_ledgers`
--
ALTER TABLE `project_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_ledgers_ledgers_id_foreign` (`ledger_id`),
  ADD KEY `project_ledgers_projects_id_foreign` (`project_id`);

--
-- Indexes for table `short_links`
--
ALTER TABLE `short_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_ledgers`
--
ALTER TABLE `supply_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supply_ledgers_ledgers_id_foreign` (`ledgers_id`),
  ADD KEY `supply_ledgers_supply_id_foreign` (`supply_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_supply_id_foreign` (`supply_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_employee_id_foreign` (`employee_id`),
  ADD KEY `users_user_role_id_foreign` (`user_role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fingerprints`
--
ALTER TABLE `fingerprints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project_invoices`
--
ALTER TABLE `project_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_ledgers`
--
ALTER TABLE `project_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `short_links`
--
ALTER TABLE `short_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `supply_ledgers`
--
ALTER TABLE `supply_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_fingerprint_id_foreign` FOREIGN KEY (`fingerprint_id`) REFERENCES `fingerprints` (`id`);

--
-- Constraints for table `fingerprints`
--
ALTER TABLE `fingerprints`
  ADD CONSTRAINT `fingerprints_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_project_leader_id_foreign` FOREIGN KEY (`project_leader_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_invoices`
--
ALTER TABLE `project_invoices`
  ADD CONSTRAINT `project_invoices_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `project_ledgers`
--
ALTER TABLE `project_ledgers`
  ADD CONSTRAINT `project_ledgers_ledgers_id_foreign` FOREIGN KEY (`ledger_id`) REFERENCES `ledgers` (`id`),
  ADD CONSTRAINT `project_ledgers_projects_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `supply_ledgers`
--
ALTER TABLE `supply_ledgers`
  ADD CONSTRAINT `supply_ledgers_ledgers_id_foreign` FOREIGN KEY (`ledgers_id`) REFERENCES `ledgers` (`id`),
  ADD CONSTRAINT `supply_ledgers_supply_id_foreign` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_supply_id_foreign` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `users_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
