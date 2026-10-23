-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 12:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoofari`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_contact`
--

CREATE TABLE `admin_contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `deve_name` varchar(255) DEFAULT NULL,
  `distri_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_contact`
--

INSERT INTO `admin_contact` (`id`, `email`, `phone`, `time`, `deve_name`, `distri_name`) VALUES
(1, 'zoofari98796@gmail.com', '9879655293', 'EveryDay : 08.00 AM - 12.00 PM,03.00 AM - 07.00 PM ', 'Gadhiya Bhakti R.\n', 'Hirpara Vruti M.');

-- --------------------------------------------------------

--
-- Table structure for table `booked_pkg`
--

CREATE TABLE `booked_pkg` (
  `book_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `adults` int(10) UNSIGNED NOT NULL,
  `children` int(10) UNSIGNED NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `time_slot` varchar(100) NOT NULL,
  `pay_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_pkg`
--

INSERT INTO `booked_pkg` (`book_id`, `uid`, `pid`, `adults`, `children`, `check_in_date`, `check_out_date`, `time_slot`, `pay_method`) VALUES
(13, 7, 7, 2, 0, '2024-08-31', '2024-09-02', '8:00AM-12:00PM', 'Credit/Debit Cards'),
(18, 4, 3, 2, 3, '2024-09-02', '2024-09-03', '3:00PM-7:00PM', 'Credit/Debit Cards'),
(19, 16, 2, 2, 2, '2024-09-13', '2024-09-20', '8:00AM-12:00PM', 'Paypal'),
(28, 12, 2, 4, 2, '2024-09-26', '2024-09-28', '03.00 AM - 07.00 PM', 'Credit/Debit Cards'),
(29, 4, 7, 5, 3, '2024-09-20', '2024-09-23', '08.00 AM - 12.00 PM', 'Bank Transfers'),
(30, 12, 6, 8, 4, '2024-09-21', '2024-09-24', '03.00 AM - 07.00 PM', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Normal Packages'),
(2, 'Intermediate/High Packages'),
(3, 'Exclusive Packages');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'vruti', 'vrutibgr@gmail.com', 'related to query', 'how to booked package'),
(3, 'Ajay Gadhiya', 'ajay1611@gmail.com', 'inquiry', 'please give information about how to booked package');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `uid`, `message`, `img`) VALUES
(1, 14, 'I noticed there is a feedback section, which I think is great. It shows you care about my experience. However, I would like to know if there are any recent reviews from other visitors to get a sense of what others think about Zoofari.', 'icoofed.png'),
(2, 12, 'The design should reflect the adventurous and natural vibe of a safari. Consider using earthy tones, vibrant images of wildlife, and nature-inspired fonts.', 'icoofed.png'),
(3, 4, 'Ensure the layout is clean and intuitive. The homepage should immediately capture the essence of a safari, perhaps with a hero image or a video background', 'icoofed.png'),
(4, 6, 'I really appreciated the \"Enjoy Wonderful Day With Your Family\" message—it made me think about a fun day out with my loved ones. The \"Read More\" and \"Watch Video\" buttons are helpful, but I would love to see a preview of what the video entails before I click on it.', 'icoofed.png'),
(5, 7, 'The safari packages are clearly displayed, which is great. I liked that each package had a photo, a brief description, and pricing information right up front. It made comparing the options super easy.', 'icoofed.png'),
(8, 16, 'My biggest concern would be the small typo and lack of detailed information on some aspects like the animals or the guides. These might make me hesitate slightly before making a booking.', 'icoofed.png'),
(9, 3, 'Capture the magic of Zoofari Park with our Animal Photos service. We offer a unique opportunity to take home stunning photographs of the incredible wildlife that calls our park home', 'icoofed.png'),
(10, 29, 'your website is very useful for us beacause it gives clear information about your services and we easily booked packages according to our budget.', 'icoofed.png');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pid` int(10) NOT NULL,
  `pkg_name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `pkg_img` varchar(255) NOT NULL,
  `vehical` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pid`, `pkg_name`, `description`, `duration`, `pkg_img`, `vehical`, `price`, `category_id`) VALUES
(1, 'Zoologists Experience', 'This tour is designed to captivate your interest', '1 Days/1 Night', 'pk13.jpg', '2 Gypsy', 500.00, 1),
(2, 'Golden Tour Safari', 'Discover the wonders of nature with our Wildlife Intro Tour. ', '4 Days/5 Nights', 'a7.jpg', '2 Gypsy', 400.00, 1),
(3, 'Wildlife Intro Tour', 'Immerse yourself in the natural world with our Wildlife Intro Tour. ', '3 Days', 's6.jpg', '2 Gypsy', 1200.00, 2),
(4, 'Picture Perfect Safari', 'Perfect for capture nature in our phone', '2 Days/3 Nights', 'monkey1.jpg', '1 Gypsy', 250.00, 2),
(6, 'Green Safari Expedition', 'Immerse yourself in the natural world with our Wildlife Intro Tour. ', '3 Days', 'jun3.jpg', '2 Gypsy', 1200.00, 3),
(7, 'Hippo Kingdom Adventure', 'Embark on a captivating journey through  serene rivers of the Hippo Safari', '1 Days', 'hipo.jpg', '2 Boats', 350.00, 3),
(8, 'Nature Trail', 'Stroll along scenic paths and learn about the flora and fauna that call these ecosystems home.', '2 Days/3 Nights', 'a3.jpg', '2 Gypsy', 1000.00, 1),
(10, 'Safari Expedition Escape', 'trike the perfect balance between adventure and relaxation on this safari.', '4 Days', 's1.jpg', '3 Gypsy', 2000.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pkg_detail`
--

CREATE TABLE `pkg_detail` (
  `de_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `longdesc` varchar(700) NOT NULL,
  `inclusion` varchar(600) NOT NULL,
  `optional` varchar(500) NOT NULL,
  `safty` varchar(600) NOT NULL,
  `fAQs` varchar(600) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `max_ad` int(10) NOT NULL,
  `max_ch` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkg_detail`
--

INSERT INTO `pkg_detail` (`de_id`, `pid`, `longdesc`, `inclusion`, `optional`, `safty`, `fAQs`, `quantity`, `max_ad`, `max_ch`) VALUES
(1, 1, 'Step into the heart of the wild with our Zoologists Experience package, a unique and immersive safari adventure designed for wildlife enthusiasts, budding zoologists, and nature lovers alike. This package offers an extraordinary opportunity to explore the untamed beauty of the savannah under the guidance of experienced zoologists and wildlife experts.\r\n\r\nThe Zoologists Experience takes you on a journey through lush landscapes and diverse ecosystems, where you will witness the majestic beauty of Africas iconic wildlife. Our expert zoologists will lead you on exciting game drives, nature walks, and guided tours, providing in-depth insights into the behavior, ecology, and conservation of variou', 'Expert guide safari, Local Transportation, Luxury tents, Food and Beverages, Car Parking, Animal Photos', 'Free Hi Speed Wi-Fi, Guided walking tours with experienced rangers', 'Stay Inside the Vehicle : During game drives, remain inside the safari vehicle unless instructed otherwise by your guide@Keep Calm and Quiet : Avoid making sudden movements or loud noises that could startle the animals.@Follow Camp Protocols : In the camp area, adhere to all safety protocols and instructions provided by our staff', 'Is this package suitable for families? Yes, the Zoologists Experience is suitable for families with children aged 12 and above. It provides a unique educational opportunity for young wildlife enthusiasts and offers a safe environment for all participants*What kind of wildlife can I expect to see? You can expect to see a diverse range of wildlife, including elephants, lions, leopards, cheetahs, giraffes, zebras, wildebeests, and various bird species. Our guides will take you to the best spots for wildlife viewing.', 'Yes', 4, 2),
(2, 2, 'Join us on the Picture Perfect Safari, a photography-centric adventure designed for both amateur and professional photographers who seek to capture the mesmerizing beauty of Zoofari wildlife and landscapes. This exclusive package offers a unique opportunity to explore some of the most photogenic spots on the continent, guided by experienced photographers and wildlife experts who know how to get you in the right place at the right time.', 'Expert guide safari, Local Transportation, Guide Services', 'Free Hi Speed Wi-Fi, Hot air balloon safari at sunrise, Marine Park Fees, Guided walking tours with experienced rangers', 'Stay Inside the Vehicle : During game drives, remain inside the safari vehicle unless instructed otherwise by your guide@Keep Calm and Quiet : Avoid making sudden movements or loud noises that could startle the animals.@Follow Camp Protocols : In the camp area, adhere to all safety protocols and instructions provided by our staff', ' Who will guide the photography tours? Our tours are led by professional wildlife photographers and experienced guides who provide valuable insights and tips for capturing stunning images of Africas wildlife and landscapes.* What kind of wildlife can I expect to photograph? You will have the opportunity to photograph a wide range of wildlife, including elephants, lions, leopards, cheetahs, giraffes, zebras, and numerous bird species, all in their natural habitats.', 'no', 4, 2),
(3, 7, 'The Hippo Kingdom Adventure is designed for nature enthusiasts, wildlife photographers, and anyone fascinated by these unique creatures. You will journey through some of Zoofari most picturesque landscapes, guided by expert naturalists who will provide you with insights into the behavior, ecology, and conservation of hippos.', 'Expert guide safari, Local Transportation, Luxury tents, Helicopter Transfers', 'Free Hi Speed Wi-Fi, Hot air balloon safari at sunrise, Marine Park Fees', 'Stay Inside the Vehicle : During game drives, remain inside the safari vehicle unless instructed otherwise by your guide@Keep Calm and Quiet : Avoid making sudden movements or loud noises that could startle the animals.@Follow Camp Protocols : In the camp area, adhere to all safety protocols and instructions provided by our staff', 'Is this package suitable for families? Yes, the Zoologists Experience is suitable for families with children aged 12 and above. It provides a unique educational opportunity for young wildlife enthusiasts and offers a safe environment for all participants*What kind of wildlife can I expect to see? You can expect to see a diverse range of wildlife, including elephants, lions, leopards, cheetahs, giraffes, zebras, wildebeests, and various bird species. Our guides will take you to the best spots for wildlife viewing.', 'yes', 10, 5),
(6, 3, 'Step into the heart of nature with our Wildlife Intro Tour, where adventure and learning meet! Perfect for families and first-time explorers, this tour offers a close-up experience with a wide variety of exotic animals in their natural habitats. Our expert guides will introduce you to fascinating wildlife facts while ensuring a safe and memorable journey through the park. Witness the beauty of the wilderness and gain a deeper appreciation for wildlife conservation, all in one exciting tour.', 'Expert guide safari, Luxury tents, Educational Wildlife Talks, Food and Beverages, Car Parking, Rest House', 'Marine Park Fees, Guided walking tours with experienced rangers', 'Stay Inside the Vehicle : During game drives, remain inside the safari vehicle unless instructed otherwise by your guide@Keep Calm and Quiet : Avoid making sudden movements or loud noises that could startle the animals.@Follow Camp Protocols : In the camp area, adhere to all safety protocols and instructions provided by our staff', 'Is this package suitable for families? Yes, the Zoologists Experience is suitable for families with children aged 12 and above. It provides a unique educational opportunity for young wildlife enthusiasts and offers a safe environment for all participants*What kind of wildlife can I expect to see? You can expect to see a diverse range of wildlife, including elephants, lions, leopards, cheetahs, giraffes, zebras, wildebeests, and various bird species. Our guides will take you to the best spots for wildlife viewing.	', 'Yes', 6, 3),
(7, 4, 'Capture the wild like never before with our Picture Perfect Safari, designed especially for photography enthusiasts and nature lovers. This exclusive tour takes you to the most scenic spots in the park, offering unparalleled opportunities to photograph majestic animals in their natural habitats. Our expert guides know the best angles and lighting conditions to help you get that perfect shot. Whether you are a professional photographer or just love capturing nature beauty, this safari will provide you with breathtaking memories and stunning images to cherish forever.', 'Local Transportation, Food and Beverages, Car Parking, Animal Photos, Guide Services', 'Free Hi Speed Wi-Fi', 'Stay Inside the Vehicle : During game drives, remain inside the safari vehicle unless instructed otherwise by your guide@Keep Calm and Quiet : Avoid making sudden movements or loud noises that could startle the animals.@Follow Camp Protocols : In the camp area, adhere to all safety protocols and instructions provided by our staff', 'Is this package suitable for families? Yes, the Zoologists Experience is suitable for families with children aged 12 and above. It provides a unique educational opportunity for young wildlife enthusiasts and offers a safe environment for all participants*What kind of wildlife can I expect to see? You can expect to see a diverse range of wildlife, including elephants, lions, leopards, cheetahs, giraffes, zebras, wildebeests, and various bird species. Our guides will take you to the best spots for wildlife viewing.', 'yes', 4, 2),
(8, 6, 'Embark on a journey of discovery with our Green Safari Expedition, where adventure meets eco-consciousness. This tour is perfect for nature enthusiasts who want to explore the wild while minimizing their environmental footprint. Our eco-friendly vehicles take you through lush landscapes, offering close encounters with diverse wildlife in their natural habitats. Learn about conservation efforts and the importance of preserving our planet rich biodiversity from our knowledgeable guides. Join us for an unforgettable experience that combines the thrill of a safari with a commitment to sustainability.\r\n\r\n', 'Helicopter Transfers, Exclusive Game Drives, Educational Wildlife Talks, Food and Beverages, Rest House', 'Hot air balloon safari at sunrise, Marine Park Fees', 'Stay Inside the Vehicle : During game drives, remain inside the safari vehicle unless instructed otherwise by your guide@Keep Calm and Quiet : Avoid making sudden movements or loud noises that could startle the animals.@Follow Camp Protocols : In the camp area, adhere to all safety protocols and instructions provided by our staff	', 'Is this package suitable for families? Yes, the Zoologists Experience is suitable for families with children aged 12 and above. It provides a unique educational opportunity for young wildlife enthusiasts and offers a safe environment for all participants*What kind of wildlife can I expect to see? You can expect to see a diverse range of wildlife, including elephants, lions, leopards, cheetahs, giraffes, zebras, wildebeests, and various bird species. Our guides will take you to the best spots for wildlife viewing.	', 'yes', 12, 6),
(9, 8, 'Immerse yourself in the serene beauty of the wilderness with our Nature Trail experience. This guided walk takes you through some of the most picturesque paths in the park, where you can enjoy the sights and sounds of nature up close. Ideal for those who love to explore on foot, the Nature Trail offers a peaceful escape into the heart of the wild. Along the way, our expert guides will share insights into the local flora and fauna, making this a perfect blend of relaxation and education. Whether you are a seasoned hiker or just looking for a tranquil adventure, the Nature Trail is a journey worth taking.\r\n\r\n', 'Expert guide safari, Luxury tents, Food and Beverages, Car Parking, Animal Photos, Rest House', 'Free Hi Speed Wi-Fi, Hot air balloon safari at sunrise', 'Stay Inside the Vehicle : During game drives, remain inside the safari vehicle unless instructed otherwise by your guide@Keep Calm and Quiet : Avoid making sudden movements or loud noises that could startle the animals.@Follow Camp Protocols : In the camp area, adhere to all safety protocols and instructions provided by our staff	', 'Is this package suitable for families? Yes, the Zoologists Experience is suitable for families with children aged 12 and above. It provides a unique educational opportunity for young wildlife enthusiasts and offers a safe environment for all participants*What kind of wildlife can I expect to see? You can expect to see a diverse range of wildlife, including elephants, lions, leopards, cheetahs, giraffes, zebras, wildebeests, and various bird species. Our guides will take you to the best spots for wildlife viewing.	', 'yes', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_desc` text DEFAULT NULL,
  `s_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_name`, `s_desc`, `s_img`) VALUES
(2, 'Free Hi Speed Wi-Fi', 'Stay connected throughout your adventure at Zoofari with our complimentary Hi-Speed Wi-Fi service. Whether you are sharing your exciting moments on social media, navigating through the park with our online map, or simply staying in touch with friends and family, our Wi-Fi service ensures you have seamless internet access anywhere in the park', 'icon-7.png'),
(3, 'Guide Services', 'Enhance your Zoofari experience with our expert Guide Services, designed to provide you with an in-depth understanding of the park diverse wildlife and natural habitats. Our knowledgeable guides are passionate about wildlife conservation and are eager to share fascinating insights, answer your questions, and tailor the tour to your interests.', 'icon-4.png'),
(4, 'Food & Beverages', 'At Zoofari Park, we believe that an extraordinary adventure deserves an equally delightful culinary experience. Our Food & Beverages service is designed to ensure that you stay refreshed and satisfied throughout your visit.', 'icon-5.png'),
(5, 'Rest House', 'Our Rest House features cozy accommodations where you can take a break, refresh yourself, and recharge for the next part of your journey. Each room is thoughtfully furnished with comfortable beds, clean linens, and modern amenities to ensure a restful stay.', 'icon-9.png'),
(6, 'Helicopter Transfers', 'Enjoy a seamless and comfortable journey as you soar above the landscape, taking in panoramic views that add an extra layer of excitement to your adventure. Our fleet of modern helicopters is operated by experienced pilots who ensure a smooth and safe flight from your location to Zoofari Park.', 'heli.png'),
(7, 'Animal Photos', 'Capture the magic of Zoofari Park with our Animal Photos service. We offer a unique opportunity to take home stunning photographs of the incredible wildlife that calls our park home', 'icon-3.png'),
(8, 'Exclusive Game Drives', 'Enjoy the luxury of a private safari experience with your own dedicated guide, who will provide expert insights and tailored commentary throughout your journey. Our custom game drives are conducted in specially equipped, comfortable vehicles that allow for unobstructed views and a smooth, enjoyable ride.', 'game.png'),
(9, 'Animal Photos', 'Capture the magic of Zoofari Park with our Animal Photos service. We offer a unique opportunity to take home stunning photographs of the incredible wildlife that calls our park home', 'icon-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_rajister`
--

CREATE TABLE `user_rajister` (
  `uid` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `phon` int(10) NOT NULL,
  `isAdmin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_rajister`
--

INSERT INTO `user_rajister` (`uid`, `username`, `email`, `password`, `Address`, `phon`, `isAdmin`) VALUES
(3, 'yaswi', 'yr10@gmail.com', '279', 'india', 2147483647, 0),
(4, 'admin', 'admin123@gmail.com', 'pass', 'surat', 2147483647, 0),
(6, 'foram', 'forambutani@gmail.com', 'er404', 'shivalik p', 2147483647, 0),
(7, 'mahek', 'mahek10@gmail.com', '8934', 'amrolli,block no2,surat', 2147483647, 0),
(12, 'bhakti', 'bgr98796@gmail.com', '123', 'junagadh', 2147483647, 1),
(14, 'krupali', 'krupali98@gmail.com', 'krup123', 'amdavad', 2147483647, 0),
(15, 'krupali', 'krupali98@gmail.com', 'krup123', 'amdavad', 2147483647, 0),
(16, 'nishita', 'nishu123@gmail.com', 'nishu', 'junagadh', 2147483647, 0),
(18, 'parth', 'parth@gmail.com', 'panth', 'surat', 2147483647, 0),
(29, 'udit', 'udit22@gmail.com', 'udit456', 'junagadh', 2147483647, 0),
(30, 'vruti', 'vruti2435@gmail.com', '123', 'junagadh', 1234567899, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_contact`
--
ALTER TABLE `admin_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked_pkg`
--
ALTER TABLE `booked_pkg`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `booked_pkg_ibfk_1` (`uid`),
  ADD KEY `booked_pkg_ibfk_2` (`pid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `feedback_ibfk_1` (`uid`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `packages_category_fk` (`category_id`);

--
-- Indexes for table `pkg_detail`
--
ALTER TABLE `pkg_detail`
  ADD PRIMARY KEY (`de_id`),
  ADD KEY `pkg_detail_pid_fk` (`pid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user_rajister`
--
ALTER TABLE `user_rajister`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_contact`
--
ALTER TABLE `admin_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booked_pkg`
--
ALTER TABLE `booked_pkg`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pkg_detail`
--
ALTER TABLE `pkg_detail`
  MODIFY `de_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_rajister`
--
ALTER TABLE `user_rajister`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_pkg`
--
ALTER TABLE `booked_pkg`
  ADD CONSTRAINT `booked_pkg_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_rajister` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `booked_pkg_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `packages` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_rajister` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_category_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `pkg_detail`
--
ALTER TABLE `pkg_detail`
  ADD CONSTRAINT `pkg_detail_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `packages` (`pid`),
  ADD CONSTRAINT `pkg_detail_pid_fk` FOREIGN KEY (`pid`) REFERENCES `packages` (`pid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
