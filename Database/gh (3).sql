-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2026 at 07:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(2, 'parthmuliya02@gmail.com', '$2y$10$j6gsBPS1XL4/BncatSAMMekSJXDlFRroRunr2No1SykKAvB8CoLt6');

-- --------------------------------------------------------

--
-- Table structure for table `admin_otp`
--

CREATE TABLE `admin_otp` (
  `admin_id` int(11) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `travel_category` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `full_name`, `email`, `phone`, `travel_category`, `message`, `created_at`) VALUES
(1, 'abcde', 'abc@gmail.com', '9213423534', 'Solo', 'qwertyuiop', '2026-03-02 07:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt_tag` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `title`, `image`, `alt_tag`, `created_at`) VALUES
(1, 'Bali', 'Bali.jpg', 'Bali', '2026-02-24 11:31:25'),
(2, 'Paris', 'Paris.png', 'Paris', '2026-02-24 11:37:26'),
(3, 'India', 'journey15.jpg', 'India', '2026-02-24 12:34:33'),
(4, 'Dubai', 'dubai.jpg', 'Dubai', '2026-02-27 10:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `exclusions`
--

CREATE TABLE `exclusions` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `exclusion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exclusions`
--

INSERT INTO `exclusions` (`id`, `itinerary_id`, `exclusion`) VALUES
(5, 1, 'Rohtang permit charges'),
(6, 2, 'Airfare / Train Tickets'),
(7, 2, 'Personal Expenses'),
(8, 2, 'Travel Insurance'),
(9, 2, 'Lunch & Dinner'),
(10, 2, 'Extra Adventure Activities'),
(16, 4, 'International airfare'),
(17, 4, 'UAE visa charges'),
(18, 4, 'Personal expenses'),
(24, 3, 'International Airfare'),
(25, 3, 'Visa Charges'),
(26, 3, 'Travel Insurance'),
(27, 3, 'Personal Expenses'),
(28, 3, 'Optional Tours');

-- --------------------------------------------------------

--
-- Table structure for table `inclusions`
--

CREATE TABLE `inclusions` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `inclusion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inclusions`
--

INSERT INTO `inclusions` (`id`, `itinerary_id`, `inclusion`) VALUES
(5, 1, '4 Nights accommodation'),
(6, 2, '3 Nights Hotel Stay'),
(7, 2, 'Daily Breakfast'),
(8, 2, 'Airport Transfers'),
(9, 2, 'Sightseeing by AC Vehicle'),
(10, 2, 'Water Sports Activities'),
(17, 4, '4 Nights accommodation in Dubai'),
(18, 4, 'Daily breakfast'),
(19, 4, 'Dubai Marina Dhow Cruise with dinne'),
(20, 4, 'Desert Safari with BBQ dinner'),
(27, 3, '4 Nights Hotel Accommodation'),
(28, 3, 'Daily Breakfast'),
(29, 3, 'Airport Transfers'),
(30, 3, 'Desert Safari with BBQ Dinner'),
(31, 3, 'Burj Khalifa Entry Ticket'),
(32, 3, 'Dubai Marina Cruise Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `hero_description` text DEFAULT NULL,
  `overview` text NOT NULL,
  `tour_duration` varchar(100) DEFAULT NULL,
  `starting_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`id`, `destination_id`, `title`, `hero_description`, `overview`, `tour_duration`, `starting_price`, `created_at`, `image`) VALUES
(1, 3, 'Manali Adventure Tour â€“ 5 Days', NULL, 'Experience the beauty of Himachal with snow mountains, Solang Valley activities, Rohtang Pass, Hadimba Temple and scenic valleys. Ideal for honeymooners and adventure lovers.', NULL, NULL, '2026-02-24 13:13:35', 'journey3.jpg'),
(2, 3, 'Goa 3N/4D', NULL, 'Experience the beauty of Himachal with snow mountains, Solang Valley activities, Rohtang Pass, Hadimba Temple and scenic valleys. Ideal for honeymooners and adventure lovers. | Experience the beauty of Himachal with snow mountains, Solang Valley activities, Rohtang Pass, Hadimba Temple and scenic valleys. Ideal for honeymooners and adventure lovers.', NULL, NULL, '2026-02-27 07:13:54', 'details-bg.jpg'),
(3, 4, 'Magical Dubai Escape', 'Experience the luxury and adventure of Dubai with desert safari, Burj Khalifa visit, and Marina cruise.', 'Desert Safari Adventure | Burj Khalifa 124th Floor Visit | Dubai Marina Dinner Cruise | Luxury 4-Star Hotel Stay | Airport Transfers Included', '', 0.00, '2026-02-27 10:51:36', 'Adventure.png'),
(4, 4, 'Dubai Luxury City Experience', 'Experience the glamour of Dubai with world-class shopping, iconic skyscrapers, desert adventures, and luxurious experiences. This carefully curated itinerary blends modern attractions with cultural heritage for a memorable journey.', 'Explore iconic landmarks like Burj Khalifa & Palm Jumeirah Luxury city tour with modern & cultural attractions Desert safari with dune bashing and BBQ dinner Dubai Marina cruise experience Shopping at Dubai Mall & traditional souks', '5 Days / 4 Nights', 45999.00, '2026-02-27 13:07:07', '5 Days Explorer.png');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_categories`
--

CREATE TABLE `itinerary_categories` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `itinerary_categories`
--

INSERT INTO `itinerary_categories` (`id`, `itinerary_id`, `category_id`) VALUES
(6, 1, 1),
(7, 1, 2),
(8, 1, 3),
(9, 1, 4),
(10, 1, 5),
(11, 2, 1),
(12, 2, 2),
(13, 2, 3),
(14, 2, 5),
(20, 4, 1),
(21, 4, 3),
(22, 4, 5),
(23, 3, 1),
(24, 3, 3),
(25, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_days`
--

CREATE TABLE `itinerary_days` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `day_title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `itinerary_days`
--

INSERT INTO `itinerary_days` (`id`, `itinerary_id`, `day_title`, `description`) VALUES
(6, 1, 'Day 1 â€“ Arrival in Manali', 'Pickup from Volvo stand.\r\nHotel check-in.\r\nEvening Mall Road visit.'),
(7, 2, 'Day 1 – Arrival & Baga Beach', 'Airport pickup, check-in & evening beach visit'),
(8, 2, 'Day 2-Water Sports & Calangute', 'Jet ski, banana ride & sightseeing'),
(9, 2, 'Day 3-North Goa Tour', 'Fort Aguada, Anjuna Beach, Vagator'),
(10, 2, 'Day 4-Departure', 'Breakfast & drop to airport'),
(17, 4, 'Day 1 –Arrival in Dubai & Dhow Cruise', 'Arrive at Dubai International Airport and transfer to your hotel. In the evening, enjoy a romantic Dhow Cruise at Dubai Marina with dinner and live entertainment.'),
(18, 4, 'Day 2-Dubai City Tour & Burj Khalifa', 'Discover Dubai’s top attractions including Jumeirah Mosque, Burj Al Arab, Palm Jumeirah, and Dubai Mall. Visit the observation deck of Burj Khalifa in the evening.'),
(19, 4, 'Day 3-Desert Safari Adventure', 'Experience thrilling dune bashing in the Arabian desert followed by camel rides, sandboarding, cultural shows, and a delicious BBQ dinner.'),
(20, 4, 'Day 4-Leisure & Shopping', 'Enjoy leisure time for shopping at Gold Souk, Spice Souk, or Mall of the Emirates. Optional visit to Ski Dubai or Aquaventure Waterpark.'),
(26, 3, 'Day 1-Arrival in Dubai', 'Arrival at Dubai International Airport. Meet and greet followed by hotel transfer. Evening at leisure.'),
(27, 3, 'Day 2-Dubai City Tour & Burj Khalifa', 'Half-day Dubai city tour covering Jumeirah Mosque, Palm Jumeirah, and Dubai Mall. Evening visit to Burj Khalifa 124th floor.'),
(28, 3, 'Day 3-Desert Safari Experience', 'Thrilling dune bashing, camel riding, cultural performances, and BBQ dinner in the desert camp.'),
(29, 3, 'Day 4-Dubai Marina Cruise', 'Evening luxury cruise with buffet dinner and live entertainment at Dubai Marina.'),
(30, 3, 'Day 5-Departure', 'Breakfast at hotel. Check-out and airport transfer for return journey.');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary_types`
--

CREATE TABLE `itinerary_types` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `itinerary_types`
--

INSERT INTO `itinerary_types` (`id`, `itinerary_id`, `type_id`) VALUES
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 2, 3),
(8, 2, 6),
(11, 4, 3),
(12, 4, 6),
(14, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `related_destinations`
--

CREATE TABLE `related_destinations` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `related_destination_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `related_destinations`
--

INSERT INTO `related_destinations` (`id`, `itinerary_id`, `related_destination_id`) VALUES
(2, 1, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `related_itineraries`
--

CREATE TABLE `related_itineraries` (
  `id` int(11) NOT NULL,
  `itinerary_id` int(11) NOT NULL,
  `related_itinerary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `related_itineraries`
--

INSERT INTO `related_itineraries` (`id`, `itinerary_id`, `related_itinerary_id`) VALUES
(1, 4, 3),
(2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `travel_categories`
--

CREATE TABLE `travel_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `travel_categories`
--

INSERT INTO `travel_categories` (`id`, `name`) VALUES
(1, 'Solo'),
(2, 'Couple'),
(3, 'Group'),
(4, 'Family'),
(5, 'Corporate');

-- --------------------------------------------------------

--
-- Table structure for table `travel_types`
--

CREATE TABLE `travel_types` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `travel_types`
--

INSERT INTO `travel_types` (`id`, `name`) VALUES
(1, 'Leisure & Vacation'),
(2, 'Business & MICE'),
(3, 'Adventure Travel'),
(4, 'Cultural & Heritage Tourism'),
(5, 'Eco & Sustainable Travel'),
(6, 'Wellness Tourism'),
(7, 'Dark Tourism'),
(8, 'Specialized Travel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_otp`
--
ALTER TABLE `admin_otp`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exclusions`
--
ALTER TABLE `exclusions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_id` (`itinerary_id`);

--
-- Indexes for table `inclusions`
--
ALTER TABLE `inclusions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_id` (`itinerary_id`);

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indexes for table `itinerary_categories`
--
ALTER TABLE `itinerary_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_id` (`itinerary_id`);

--
-- Indexes for table `itinerary_days`
--
ALTER TABLE `itinerary_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_id` (`itinerary_id`);

--
-- Indexes for table `itinerary_types`
--
ALTER TABLE `itinerary_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_id` (`itinerary_id`);

--
-- Indexes for table `related_destinations`
--
ALTER TABLE `related_destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itinerary_id` (`itinerary_id`),
  ADD KEY `related_destination_id` (`related_destination_id`);

--
-- Indexes for table `related_itineraries`
--
ALTER TABLE `related_itineraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_categories`
--
ALTER TABLE `travel_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_types`
--
ALTER TABLE `travel_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exclusions`
--
ALTER TABLE `exclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `inclusions`
--
ALTER TABLE `inclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itinerary_categories`
--
ALTER TABLE `itinerary_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `itinerary_days`
--
ALTER TABLE `itinerary_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `itinerary_types`
--
ALTER TABLE `itinerary_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `related_destinations`
--
ALTER TABLE `related_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `related_itineraries`
--
ALTER TABLE `related_itineraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `travel_categories`
--
ALTER TABLE `travel_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `travel_types`
--
ALTER TABLE `travel_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exclusions`
--
ALTER TABLE `exclusions`
  ADD CONSTRAINT `exclusions_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inclusions`
--
ALTER TABLE `inclusions`
  ADD CONSTRAINT `inclusions_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD CONSTRAINT `itineraries_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary_categories`
--
ALTER TABLE `itinerary_categories`
  ADD CONSTRAINT `itinerary_categories_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary_days`
--
ALTER TABLE `itinerary_days`
  ADD CONSTRAINT `itinerary_days_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary_types`
--
ALTER TABLE `itinerary_types`
  ADD CONSTRAINT `itinerary_types_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `related_destinations`
--
ALTER TABLE `related_destinations`
  ADD CONSTRAINT `related_destinations_ibfk_1` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `related_destinations_ibfk_2` FOREIGN KEY (`related_destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
