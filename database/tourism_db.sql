-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 08:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE `book_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=confirm, 2=cancelled\r\n',
  `schedule` date DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`id`, `user_id`, `package_id`, `status`, `schedule`, `date_created`) VALUES
(2, 4, 8, 3, '2021-06-21', '2021-06-19 08:37:59'),
(3, 5, 8, 3, '2021-06-18', '2021-06-19 11:51:50'),
(4, 6, 8, 3, '2024-04-03', '2024-04-14 19:56:08'),
(5, 6, 8, 2, '2024-04-17', '2024-04-15 17:49:18'),
(6, 6, 1, 1, '2024-04-25', '2024-04-15 17:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(30) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `subject`, `message`, `status`, `date_created`) VALUES
(8, 'Mokshi', 'mokshihr6@gmail.com', 'query about the package', 'what is the name of the travel agency. And what time to arive to the place.', 1, '2024-04-15 16:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(30) NOT NULL,
  `title` text DEFAULT NULL,
  `tour_location` text DEFAULT NULL,
  `cost` double NOT NULL,
  `description` text DEFAULT NULL,
  `upload_path` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 =active ,2 = Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `tour_location`, `cost`, `description`, `upload_path`, `status`, `date_created`) VALUES
(1, 'Luxury Bundles: Elevate Your Experience!!!', 'Kodagu->Hassan->Mysuru->Bengaluru-> Belagavi.', 9999, '&lt;p&gt;&lt;b style=&quot;&quot;&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;Kodagu&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;: Immerse yourself in the lush landscapes and rich cultural heritage of Kodagu, also known as Coorg. Explore sprawling coffee plantations, misty hills, and serene waterfalls. Experience the unique Kodava culture, visit ancient temples, and indulge in adventure activities like trekking and river rafting.\n&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;\nHassan&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;: Discover the architectural marvels and historical treasures of Hassan. Explore the intricately carved Hoysala temples at Belur and Halebidu, showcasing exquisite craftsmanship and ancient stories. Dive into the tranquility of Shravanabelagola, home to the iconic monolithic statue of Lord Bahubali.\n&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;\nMysuru&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;: Step into the roya&lt;/span&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;﻿&lt;/span&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;l past of Mysuru, the cultural capital of Karnataka. Marvel at the opulent Mysore Palace, adorned with intricate artwork and grandeur. Wander through the vibrant Devaraja Market, savoring local delicacies and shopping for traditional crafts. Explore the lush Brindavan Gardens and witness the enchanting beauty of the illuminated fountains.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;\n\nBengaluru&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;: Experience the dynamic blend of tradition and modernity in Bengaluru, the Silicon Valley of India. Delve into the city\'s bustling markets, vibrant nightlife, and diverse culinary scene. Visit historic landmarks like Tipu Sultan\'s Summer Palace and Bangalore Palace, contrasted with the high-tech ambiance of the IT parks and innovative startups.\n&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;b style=&quot;&quot;&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;\nBelagavi&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;: Embark on a journey to Belagavi, a hidden gem in Karnataka\'s northern region. Explore the architectural splendor of Belagavi Fort, which has stood as a witness to centuries of history. Discover the cultural richness of the region through its ancient temples, serene lakes, and mouthwatering cuisine, influenced by Maratha, Kannada, and Portuguese flavors.&lt;/span&gt;&lt;/p&gt;', 'uploads/package_1', 1, '2021-06-18 11:15:03'),
(7, 'Glamour Galore: Unwrap Your Dream Packages!!!', 'Alleppey->Kochi->Munnar->Wayanad->Thiruvananthapuram', 14999, '&lt;div&gt;&lt;b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;Alleppey&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;: Experience the enchanting backwaters of Alleppey aboard traditional houseboats known as \'kettuvallams\'. Drift along serene canals fringed with palm trees and paddy fields, immersing yourself in the tranquil ambiance of Kerala\'s famed backwaters. Explore the rustic charm of Alleppey\'s villages, indulge in delicious Kerala cuisine, and witness breathtaking sunsets over the shimmering waters.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;Kochi&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;: Dive into the eclectic mix of cultures and history in Kochi, also known as Cochin. Explore the colonial heritage of Fort Kochi with its charming Dutch and Portuguese architecture, including the iconic Chinese fishing nets. Wander through bustling spice markets, visit ancient Jewish synagogues, and delve into the vibrant arts scene at venues like the Kochi-Muziris Biennale.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;Munnar&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;: Escape to the verdant hills of Munnar, a haven for nature lovers and tea enthusiasts. Trek through lush tea plantations, inhaling the aroma of freshly plucked leaves and enjoying panoramic views of the Western Ghats. Discover cascading waterfalls like Attukal and Lakkam, explore picturesque valleys, and encounter diverse wildlife in Eravikulam National Park.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;Wayanad&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;: Immerse yourself in the untouched beauty of Wayanad\'s pristine landscapes and rich biodiversity. Trek through dense forests to hidden waterfalls like Meenmutty and Soochipara, or embark on wildlife safaris in Wayanad Wildlife Sanctuary, home to elephants, tigers, and exotic bird species. Explore ancient Edakkal Caves adorned with prehistoric petroglyphs and unwind amidst the tranquility of tea and coffee plantations.&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;Thiruvananthapuram&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;: Discover the cultural and historical treasures of Thiruvananthapuram, the capital city of Kerala. Visit the majestic Padmanabhaswamy Temple, an architectural marvel and spiritual hub. Explore the Napier Museum and the Trivandrum Zoo, housing a diverse collection of artifacts and wildlife. Relax on the pristine shores of Kovalam Beach or rejuvenate with traditional Ayurvedic treatments at renowned wellness centers.&lt;/span&gt;&lt;/div&gt;', 'uploads/package_7', 1, '2021-06-18 11:17:11'),
(8, 'Bounty Boxes: Explore Endless Possibilities!!!', 'North goa ->South goa', 18999, '&lt;p style=&quot;text-align: justify; &quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;﻿&lt;/span&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, sans-serif&quot;&gt;&lt;b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;North Goa: &lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;; font-size: 18px;&quot;&gt;Experience the vibrant and lively side of Goa with a tour package to North Goa. Explore iconic beaches such as Calangute, Baga, and Anjuna, known for their golden sands, water sports, and bustling shacks serving delectable seafood. Immerse yourself in the energetic nightlife of Goa with beach parties, live music, and vibrant clubs. Visit historic forts like Aguada and Chapora, offering panoramic views of the Arabian Sea. Discover the cultural heritage of the region with visits to quaint villages, spice plantations, and colorful markets.&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify; &quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, sans-serif&quot;&gt;&lt;br&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: justify; &quot;&gt;&lt;font color=&quot;#000000&quot; face=&quot;Open Sans, Arial, sans-serif&quot;&gt;&lt;b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;South Goa&lt;/span&gt;&lt;/b&gt;&lt;span style=&quot;font-size: 18px; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;: Indulge in relaxation and serenity with a tour package to South Goa. Unwind on pristine and less crowded beaches such as Palolem, Agonda, and Colva, surrounded by swaying palm trees and azure waters. Enjoy water activities like dolphin cruises, kayaking, and parasailing in the tranquil waters. Explore the colonial charm of Old Goa with its majestic churches and cathedrals, including the UNESCO World Heritage site of Basilica of Bom Jesus. Delve into the tranquility of nature with visits to wildlife sanctuaries, spice farms, and mangrove forests.&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;', 'uploads/package_8', 1, '2021-06-18 13:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(6) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `name_on_card` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `card_cvv` varchar(4) NOT NULL,
  `exp_month` date NOT NULL,
  `exp_year` year(4) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `full_name`, `name_on_card`, `card_number`, `card_cvv`, `exp_month`, `exp_year`, `amount`, `created_at`) VALUES
(3, 'mokshi', 'debit', '4444', '3444', '2024-04-26', '2024', 60000.00, '2024-04-15 11:45:05'),
(5, 'bala', 'debit', '444', '444', '2024-04-17', '2024', 444.00, '2024-04-15 15:54:16'),
(6, 'bala', 'debit', '444', '444', '2024-04-17', '2024', 444.00, '2024-04-15 15:56:07'),
(7, 'prajwal', 'debit', '32434', '324', '2024-04-11', '2024', 8347.00, '2024-04-16 09:13:30'),
(8, 'mokshi', 'debit', '656', '6756', '2024-04-19', '2024', 14.00, '2024-04-16 17:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `rate_review`
--

CREATE TABLE `rate_review` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate_review`
--

INSERT INTO `rate_review` (`id`, `user_id`, `package_id`, `rate`, `review`, `date_created`) VALUES
(4, 6, 1, 3, 'An unforgettable journey filled with breathtaking landscapes, cultural immersion, and unparalleled hospitality – this tourist package exceeded all expectations!', '2024-04-15 08:00:26'),
(8, 8, 7, 5, 'Embark on a transformative odyssey through majestic landscapes and vibrant cultures with this meticulously crafted tourist package.', '2024-04-15 11:53:16'),
(9, 8, 8, 5, 'Experience the ultimate Goa getaway: beaches, fun, and culture all wrapped up in one amazing package!', '2024-04-15 15:57:03'),
(11, 6, 7, 4, 'Explore Kerala\'s beauty and rich culture with a perfect package designed for an amazing getaway!', '2024-04-15 16:08:29'),
(12, 6, 1, 4, '&lt;p&gt;&lt;b&gt;&lt;span style=&quot;font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;Its a Mysterious adventure with the Nature filled with Greenary and the services were the best.I suggest for you to see the package...&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;', '2024-04-15 17:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Tourism Management System'),
(6, 'short_name', 'Tourly'),
(11, 'logo', 'uploads/1713105240_aeroplane4.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1713105240_1623988200_The_Ruins_in_Talisay,_Negros_Occidental_at_Dusk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(6, 'mokshi ', 'H R', 'mokshi@123', 'c635658ee013342c07deea0a5fb9b7e2', 'uploads/1713105300_user.jpg', NULL, 0, '2024-04-14 19:52:42', '2024-04-14 20:05:27'),
(8, 'Prajwal', 'P C ', 'prajwal@123', '123456', NULL, NULL, 0, '2024-04-14 23:33:31', '2024-04-15 15:53:18'),
(9, 'mokshi ', '2w', 'sharon1', 'eb8ff09b090554db929f186f7e741fb9', NULL, NULL, 0, '2024-04-14 23:36:30', NULL),
(10, 'pramod', 'bulli', 'pramod@123', 'bb16fa6160fa1d8a73eba6217844a08b', NULL, NULL, 0, '2024-04-15 16:55:08', NULL),
(11, 'monesh', 'H R', 'monesh212', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 0, '2024-04-16 19:40:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_review`
--
ALTER TABLE `rate_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT for table `book_list`
--
ALTER TABLE `book_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rate_review`
--
ALTER TABLE `rate_review`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
