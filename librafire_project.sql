-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 08:25 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librafire_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `userID`, `name`, `description`, `price`, `payment`, `delivery`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'Book One', 'Book One Description', 100, 'cash', 'courier', '', '2019-11-28 07:33:43', '2019-11-28 07:33:43'),
(2, 2, 'Book Two', 'Book Two Description', 200, 'card', 'other', '', '2019-11-28 07:41:39', '2019-11-28 07:41:39'),
(4, 2, 'TV One', 'TV One Description', 400, 'cash', 'arrival', 'aadad.jpg', '2019-11-28 08:08:36', '2019-11-28 08:08:36'),
(5, 2, 'Foo', 'Foo description text', 110, 'cash', 'courier', 'asdasd.jpg', '2019-11-28 11:15:11', '2019-11-28 13:09:14'),
(12, 18, 'Example', 'Example description', 200, 'cash', 'courier', '', '2019-11-28 14:00:13', '2019-11-28 14:00:13'),
(13, 18, 'Book example', 'Book example description', 500, 'card', 'arrival', 'asdad.jpg', '2019-11-28 14:01:18', '2019-11-28 14:01:18'),
(15, 16, 'Car', 'Car example description text', 2000, 'cash', 'arrival', '', '2019-11-28 14:05:24', '2019-11-28 14:05:24'),
(16, 16, 'Bike', 'Bike description', 700, 'cash', 'arrival', 'asdaqqe.jpg', '2019-11-28 14:06:08', '2019-11-28 14:06:08'),
(17, 19, 'Book test1', 'Book test description1', 2201, 'checks', 'arrival', 'aadad.jpg', '2019-11-29 06:18:59', '2019-11-29 06:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_28_073512_create_items_table', 2),
(4, '2019_11_28_180927_create_offers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `userId`, `itemId`, `offer`, `created_at`, `updated_at`) VALUES
(1, 16, 4, 440, '2019-11-28 17:53:19', '2019-11-28 17:53:19'),
(4, 16, 1, 102, '2019-11-28 18:00:25', '2019-11-28 18:00:25'),
(5, 16, 2, 210, '2019-11-28 18:00:51', '2019-11-28 18:00:51'),
(6, 18, 15, 2100, '2019-11-28 18:05:20', '2019-11-28 18:05:20'),
(7, 18, 16, 720, '2019-11-28 18:05:48', '2019-11-28 18:05:48'),
(8, 13, 4, 500, '2019-11-28 18:40:58', '2019-11-28 18:40:58'),
(9, 6, 4, 520, '2019-11-28 18:43:03', '2019-11-28 18:43:03'),
(10, 19, 4, 600, '2019-11-29 06:22:28', '2019-11-29 06:22:28'),
(11, 19, 15, 2200, '2019-11-29 06:23:13', '2019-11-29 06:23:13'),
(12, 19, 16, 700, '2019-11-29 06:23:50', '2019-11-29 06:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '$2y$10$1epyDc/Jdk6jsobJJlWa8OcbUel.bra.oO0znqc471c8R0tdP9GOW', '2019-11-26 06:34:54', '2019-11-26 06:34:54'),
(2, 'Jane', 'Doe', 'janedoe@gmail.com', '$2y$10$rBkOyafziaqARekhEky1wO7odf.V80WnEJDAxtdMawJ5Z/09Z.D9G', '2019-11-26 06:49:55', '2019-11-26 06:49:55'),
(3, 'Test', 'Testing', 'testtesting@gmail.com', '$2y$10$2NpTvfQRAI9FxSkur2OcSup.RQaIlWxYmBLr1tTG7ziDczq6xLkni', '2019-11-26 06:52:32', '2019-11-26 06:52:32'),
(4, 'Jovan', 'Dosen', 'jovandosen@gmail.com', '$2y$10$AX3rUk7CVLPCH461vWix2eWulDM8NOaCvvaSmrNWumqtsjv8/wXOO', '2019-11-26 06:54:55', '2019-11-26 06:54:55'),
(5, 'Natasa', 'Nikolic', 'natasanikolic@gmail.com', '$2y$10$swAVoGFFh.kVDWm4fL0CVOMTSwfB6SRneQcd89F5V6fgzwWPZ5Jga', '2019-11-26 07:15:14', '2019-11-26 07:15:14'),
(6, 'Bojan', 'Jovanovic', 'bojanjovanovic@gmail.com', '$2y$10$vktT2HjzkkJRm5/.XUeEBuEs.zNezDcI0Gz/wRyOrCoZizoOg4sw.', '2019-11-26 09:46:42', '2019-11-26 09:46:42'),
(7, 'Nikolina', 'Nikic', 'nikolinanikic@gmail.com', '$2y$10$ntdb2YDbLSsKGA4rBa02fOvqsrMk9Fj3oeXWlEW6Z0GC4ObV6jrf.', '2019-11-26 10:28:23', '2019-11-26 10:28:23'),
(8, 'Petar', 'Petrovic', 'petarpetrovic@gmail.com', '$2y$10$68wnOnVxkJCFn0iMI7johecF5LpDTUb.9uvVNX00cTFEqutQa2kuW', '2019-11-26 10:33:48', '2019-11-26 10:33:48'),
(9, 'Foo', 'Foo Test', 'foo@gmail.com', '$2y$10$BXIXR96aNSMkhiy7IQbqIuogrjyoNH.JsKHhLs8s2ZCpn27HA/cTu', '2019-11-26 10:37:49', '2019-11-26 10:37:49'),
(10, 'Bar', 'Development', 'bar@gmail.com', '$2y$10$npdpb2Ha1/D5NKS0dBymtuPawR6MK0NKUE36t4srLd8R5TjrQnWNK', '2019-11-26 11:38:49', '2019-11-26 11:38:49'),
(11, 'Develop', 'Development', 'develop@gmail.com', '$2y$10$vhXLT1md/TRTIrW/j64IVuTjatBQiV4khM2ons/C8CPMZolBSAe9a', '2019-11-26 12:12:45', '2019-11-26 12:12:45'),
(12, 'Proba', 'Test', 'proba@gmail.com', '$2y$10$Pnh7GL1aLd.JROfjNmMEjuJx2wai7kV3yclU33IM8AoEEWg5obYWi', '2019-11-26 12:26:40', '2019-11-26 12:26:40'),
(13, 'Stefan', 'Stefanovic', 'stefan@gmail.com', '$2y$10$5/LqJG.8H8.OJ3YO2f8Ci.mvB6v0fwIyUqqDVjEWSRSYewhk8mDU2', '2019-11-26 12:35:06', '2019-11-26 12:35:06'),
(14, 'Jelena', 'Jovic', 'jelena@gmail.com', '$2y$10$jI1BvBTUduUnZ7ujXaZSAexL.LdhVEtow.atlJ.MGvXf5SwgihVZe', '2019-11-26 12:44:25', '2019-11-26 12:44:25'),
(15, 'Aleksandar', 'Aleksic', 'aleksandar@gmail.com', '$2y$10$tcJ.1KHR8wZin0n88AXalewpSNXX5LgyO7Vi3uuFoJEsXAuWW6ZZy', '2019-11-26 14:30:41', '2019-11-26 14:30:41'),
(16, 'Nemanja', 'Petric', 'nemanja@gmail.com', '$2y$10$W7.G79aZ1a0CJtOR7WGX2ep0hfOmCrKZfMyceromq.Tq8bbSYiTy.', '2019-11-26 16:39:33', '2019-11-27 15:58:05'),
(17, 'Jovana1', 'Lukic1', 'jovanalukic1@gmail.com', '$2y$10$YWwVV.a/yl40ryZu5cOcQeN4b8ROxYMu/K0zdcbqKnE0PAj76HIWG', '2019-11-27 16:11:34', '2019-11-27 16:15:03'),
(18, 'Petar', 'Petrovic', 'petar@gmail.com', '$2y$10$pivZddRAsYRHcAsyDm8CR.fFkP55W/dkZuqh9DBxm8cm.N70/cnr6', '2019-11-28 13:58:10', '2019-11-28 13:58:10'),
(19, 'Bojana1', 'Bakic1', 'bojana1@gmail.com', '$2y$10$upiD2vS3pNdTa6AD./nWwuazlFHs4etGOVH4wquuIjDKZFik6piyK', '2019-11-29 06:15:49', '2019-11-29 06:17:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
