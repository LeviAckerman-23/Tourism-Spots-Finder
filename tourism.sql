-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 08:28 PM
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
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `experience` enum('Bad','Good','Excellent') NOT NULL,
  `comments` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `full_name`, `experience`, `comments`, `submitted_at`) VALUES
(1, 7, 'MUHAMMED ADHIL KR', 'Excellent', 'It wasddncunudccjmxdngwxhuxsnjsnjmkxs\r\nncdnucnncdcd\r\nskmnjsjnj\r\n', '2024-10-23 13:58:51'),
(2, 24, 'Kockachi MP', '', 'hahahahhahahahahahhahhahha', '2024-10-24 02:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `spot_id` int(11) DEFAULT NULL,
  `pname` varchar(30) NOT NULL,
  `pdescription` varchar(10000) NOT NULL,
  `pi_main` varchar(1000) NOT NULL,
  `pi1` varchar(1000) NOT NULL,
  `pi2` varchar(1000) NOT NULL,
  `pi3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`spot_id`, `pname`, `pdescription`, `pi_main`, `pi1`, `pi2`, `pi3`) VALUES
(1, 'Goa', 'Calangute is the most popular holiday destination in Goa. Calangute Beach is colloquially know as the Queen of all the Beaches. Excellent accommodation facilites are available, particularly at the tourist resorts and cottages.\r\nThe Beaches of Goa are much ahead of other beaches in India in terms of popularity and the facilities that are available here. The beaches here have been accepted as a matter of life, there are exotic cuisine backing the pleasure of have on sun and sand, and water sports facilities that include from water scooters to water gliding. To add on you can shake your legs for some time with a glass of feni and beer, engaged in shopping on the beachside, or have midnight bonfire on the beach.', 'images//destination//goa1.jpg', 'images//destination//goa2.jpg', 'images//destination//goa3.jpg', 'images//destination//goa4.jpg'),
(2, 'Kerala', 'A state in Southern India is known as a tropical paradise of waving palms and wide sandy beaches. It is a narrow strip of coastal territory that slopes down the Western Ghats in a cascade of lush green vegetation, and reaches to the Arabian sea. Kerala borders the states of Tamil Nadu to the east and Karnataka to the north. It is also known for its backwaters, mountains, coconuts, spices and art forms like Kathakali and Mohini Attam. It is the most literate state in India, and a land of diverse religions, where you can find Hindu temples, mosques, churches, and even synagogues. With world class tourist sporting options, ayurvedic spas and treatments, eco-tourism initiatives, Kerala has much to offer the visitor.', 'images//destination//kerala1.jpg', 'images//destination//kerala2.jpg', 'images//destination//kerala3.jpg', 'images//destination//kerala4.jpg'),
(3, 'Mysore', 'Mysore Palace, also called Amba Vilas Palace, is one of the most magnificent and largest palaces in India. Situated in the southern state of Karnataka, it used to be the official residence of the Wodeyar Dynasty, the rulers of Mysore from 1399 to 1950. The grand palace stands tall in the heart of Mysore city and attracts visitors from across the world. Being one of the prime attractions in India after the Taj Mahal, it certainly deserves a place in every traveler’s bucket list. So why not visit Mysore Palace this holiday season?', 'images//destination//mysore1.jpg', 'images//destination//mysore2.jpg', 'images//destination//mysore3.jpg', 'images//destination//mysore4.jpg'),
(4, 'Ladakh', 'Leh & Ladakh, situated amidst the Great Himalayas and the Karakoram ranges in the scenic state of Jammu and Kashmir, are two of the most spectacular places in the world where scores of tourists from across the globe throng annually. Emblems of pure paradisiacal beauty, Leh & Ladakh are all about awe-inspiring landscapes, picturesque green oasis, scintillating monasteries and quaint hamlets. You are taken in by the breathtaking beauty the moment you land in this incredible mountain town. Get mesmerised by the amazingly pristine blue sky and transfer to a world of complete solitude admiring the mountain flowers, the snow covered peaks, the streams flowing by and the deep valleys', 'images//destination//ladakh1.jpg', 'images//destination//ladakh2.jpg', 'images//destination//ladakh3.jpg', 'images//destination//ladakh4.jpg'),
(5, 'Taj Mahal', 'The Taj Mahal is located on the right bank of the Yamuna River in a vast Mughal garden that encompasses nearly 17 hectares, in the Agra District in Uttar Pradesh. It was built by Mughal Emperor Shah Jahan in memory of his wife Mumtaz Mahal with construction starting in 1632 AD and completed in 1648 AD, with the mosque, the guest house and the main gateway on the south, the outer courtyard and its cloisters were added subsequently and completed in 1653 AD. The existence of several historical and Quaranic inscriptions in Arabic script have facilitated setting the chronology of Taj Mahal.', 'images//destination//tajmahal1.jpg', 'images//destination//tajmahal2.jpg', 'images//destination//tajmahal3.jpg', 'images//destination//tajmahal4.jpg'),
(6, 'India Gate', 'India Gate is one of many British monuments built by order of the Imperial War Graves Commission (later renamed Commonwealth War Graves Commission). The architect was Sir Edwin Lutyens, an Englishman who designed numerous other war memorials and was also the principal planner of New Delhi. The cornerstone was laid in 1921 by the duke of Connaught, third son of Queen Victoria. Construction of the All-India War Memorial, as it was originally known, continued until 1931, the year of the formal dedication of New Delhi as the capital of India.', 'images//destination//india_gate1.jpg', 'images//destination//india_gate2.jpg', 'images//destination//india_gate3.jpg', 'images//destination//india_gate4.jpg'),
(7, 'Hampi', 'Hampi is one of finest historical sites of ancient age in the world. It was the initial capital city of famous historical Vijayanagara Empire located on the bank of Tungabhadra River about 11 km away from Hospet City. Hampi is a small location covered an area of 25 sq. km. and it is totally bounded by mountains (Anjaneya, Malyavanta and Matanga Hills) by the three sites and rest one site is bordered by Tungabhadra River. It is believed by Hindus that Hampi was a kingdom of Monkeys (according to the Ramayana) before Vijayanagara Empire in pre-ancient age (around 1 CE) when the city was known as Kishkindha.', 'images//destination//hampi1.jpg', 'images//destination//hampi2.jpg', 'images//destination//hampi3.jpg', 'images//destination//hampi4.jpg'),
(8, 'Rajasthan', 'Rajasthan, state of northwestern India, located in the northwestern part of the Indian subcontinent. It is bounded to the north and northeast by the states of Punjab and Haryana, to the east and southeast by the states of Uttar Pradesh and Madhya Pradesh, to the southwest by the state of Gujarat, and to the west and northwest by the provinces of Sindh and Punjab in Pakistan. The capital city is Jaipur, in the east-central part of the state.', 'images//destination//rajasthan1.jpg', 'images//destination//rajasthan2.jpg', 'images//destination//rajasthan3.jpg', 'images//destination//rajasthan4.jpg'),
(9, 'Manali', 'Once called the \"end of the habitable world,\" Manali is an important hill station of northern India and is the destination of thousands of tourists every year. Its cool atmosphereprovides a perfect haven for the ones afflicted by the hot Indian summers. Besides offering quite a few places for sightseeing, Manali is also famous for adventure sports like skiing, hiking, mountaineering, paragliding, rafting, trekking, kayaking, and mountain biking. In brief, Manali-the veritable \"valley of the Gods\"-is an ideal place for the ones in search of both adventure and comfort.', 'images//destination//manali1.jpg', 'images//destination//manali2.jpg', 'images//destination//manali3.jpg', 'images//destination//manali4.jpg'),
(10, 'Srinagar', 'Srinagar, the summer capital is situated in the centre of Kashmir valley and is surrounded by five districts. In the north it is flanked by Kargil, in the South by Pulwama, in the north-west by Budgam. This extremely beautiful place tells the story of the love of the Mughal emperors. It possess deep green rice fields and river bridges, gardens in bloom, lakes rimmed by houseboats, a business center and holiday resort.', 'images//destination//srinagar1.jpg', 'images//destination//srinagar2.jpg', 'images//destination//srinagar3.jpg', 'images//destination//srinagar4.jpg'),
(11, 'Amritsar', 'Amritsar - Amritsar, literally Pool of Nectar, derives its name from Amrit Sarovar, the holy tank that surrounds the fabulous Golden Temple. First time visitors to Amritsar could be forgiven for the impression that Amritsar is like any other small town in northern India. In one sense, it is - with bustling markets, haphazard traffic, unyielding cattle, crowds and congestion typical of small town India. But Amritsar stands head and shoulders above any other city, its status elevated and sanctified by the presence of the venerable Golden Temple.', 'images//destination//amritsar1.jpg', 'images//destination//amritsar2.jpg', 'images//destination//amritsar3.jpg', 'images//destination//amritsar4.jpg'),
(12, 'Jog Falls', 'Jog Falls are located in the Shimoga district of Karnataka. Four cascades, known as Raja, Rani, Rover and Rocket merge to form the huge waterfall on the Sharavathi River. The falls are locally known as Geruoppe Falls, Gersoppa Falls and Jogada Gundi. Jog itself is a Kannada word, which means falls. Jog Falls are unique as the water does not stream down the rocks in a tiered fashion; it thunders down the slope losing contact with the rocks, making it the tallest un-tiered waterfall in India. The beauty of the waterfalls is enhanced by the lush green surroundings, which provide a scenic backdrop. Visitors can hike to the base of the falls and take a plunge in the water.', 'images//destination//jogfalls1.jpg', 'images//destination//jogfalls2.jpg', 'images//destination//jogfalls3.jpg', 'images//destination//jogfalls4.jpg'),
(13, 'Manglore', 'Mangalore, located on the southwestern coast of India in Karnataka, is a vibrant port city known for its scenic beaches, rich cultural heritage, and diverse cuisine. Flanked by the Arabian Sea and the Western Ghats, Mangalore offers a perfect blend of nature and urban charm. Popular attractions include Panambur Beach, famous for its sunsets and water sports, and Tannirbhavi Beach, known for its serene atmosphere.', 'images//destination//mysore1.jpg', 'images//destination//mysore2.jpg', 'images//destination//kerala3.jpg', 'images//destination//srinagar4.jpg'),
(30, 'Athirappilly', 'Athirappilly Waterfalls, located in Thrissur, Kerala, is often referred to as the Niagara of India. Surrounded by lush greenery, it attracts nature lovers and adventure seekers alike.', 'images/destination/athirappilly_main.jpg', 'images/destination/athirappilly1.jpg', 'images/destination/athirappilly2.jpg', 'images/destination/athirappilly3.jpg'),
(31, 'Munnar', 'Munnar, located in the Idukki district of Kerala, is one of India’s most picturesque hill stations, nestled in the Western Ghats. Known for its expansive tea plantations, mist-covered hills, and cool climate, Munnar attracts nature enthusiasts, honeymooners, and adventure seekers alike. Visitors can explore scenic spots like the Eravikulam National Park, home to the endangered Nilgiri Tahr, and the Mattupetty Dam with its tranquil lake offering boating opportunities.', 'images/destination/munnar_main.jpg', 'images/destination/munnar1.jpg', 'images/destination/munnar2.jpg', 'images/destination/munnar3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tourism_spots`
--

CREATE TABLE `tourism_spots` (
  `spot_id` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `google_place_id` varchar(255) DEFAULT NULL,
  `category` enum('nature','historical','cultural','adventure','urban','beaches') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourism_spots`
--

INSERT INTO `tourism_spots` (`spot_id`, `pname`, `address`, `latitude`, `longitude`, `google_place_id`, `category`, `created_at`) VALUES
(1, 'Goa', 'Goa, India', 15.29930000, 74.12400000, NULL, 'nature', '2024-10-09 16:58:23'),
(2, 'Kerala', 'Kerala, India', 10.85050000, 76.27110000, NULL, 'nature', '2024-10-09 16:58:23'),
(3, 'Mysore', 'Mysore, Karnataka, India', 12.29580000, 76.63940000, NULL, 'historical', '2024-10-09 16:58:23'),
(4, 'Ladakh', 'Leh, Ladakh, India', 34.15260000, 77.57700000, NULL, 'adventure', '2024-10-09 16:58:23'),
(5, 'Taj Mahal', 'Agra, Uttar Pradesh, India', 27.17510000, 78.04210000, 'ChIJLU2k8F-hAjoRYngW0MyZn7Q', 'historical', '2024-10-09 16:58:23'),
(6, 'India Gate', 'New Delhi, India', 28.61290000, 77.22950000, 'ChIJ7ZPE2xY9DzkR7yVQ2XTvNL0', 'historical', '2024-10-09 16:58:23'),
(7, 'Hampi', 'Hampi, Karnataka, India', 15.33500000, 76.46000000, NULL, 'historical', '2024-10-09 16:58:23'),
(8, 'Rajasthan', 'Rajasthan, India', 26.91240000, 75.78730000, NULL, 'cultural', '2024-10-09 16:58:23'),
(9, 'Manali', 'Manali, Himachal Pradesh, India', 32.24320000, 77.18920000, NULL, 'adventure', '2024-10-09 16:58:23'),
(10, 'Srinagar', 'Srinagar, Jammu & Kashmir, India', 34.08370000, 74.79730000, NULL, 'nature', '2024-10-09 16:58:23'),
(11, 'Amritsar', 'Amritsar, Punjab, India', 31.63400000, 74.87230000, NULL, 'cultural', '2024-10-09 16:58:23'),
(12, 'Jog Falls', 'Jog Falls, Karnataka, India', 14.22220000, 74.77130000, NULL, 'nature', '2024-10-09 16:58:23'),
(13, 'Manglore', 'Mangalore, Karnataka, India', 12.91410000, 74.85600000, NULL, 'cultural', '2024-10-09 16:58:23'),
(30, 'Athirappilly', 'Athirappilly, Thrissur, Kerala, India', 10.28525300, 76.56995600, 'ChIJ5bGX7cs8BTsRcUto9Z1WAGY', 'nature', '2024-10-20 10:17:15'),
(31, 'Munnar', 'Munnar, Idukki District, Kerala, India', 10.08893300, 77.05952500, 'ChIJ6e3YlZsDBTsRTPaE0ys0NT8', 'nature', '2024-10-20 10:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 1,
  `ProfilePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone`, `city`, `role`, `created_at`, `status`, `ProfilePath`) VALUES
(7, 'Naruto', 'manushyanff@gmail.com', 'Naruto12', '7592862649', 'Aluva', 'user', '2024-09-18 06:37:14', 1, NULL),
(8, 'Adhil', 'muhammedadhil346@gmail.com', 'Adhil123', '8281262973', 'Aluva', 'user', '2024-09-18 06:55:11', 1, NULL),
(9, 'Sasuke', 'jdzygarde@gmail.com', 'Sasuke12', '7592862649', 'Ernakulam', 'user', '2024-09-18 10:14:10', 1, NULL),
(11, 'Daemon', 'daemon@gmail.com', 'Daemon12', '6282742946', 'Aluva', 'user', '2024-10-01 07:37:59', 1, NULL),
(14, 'Levi', 'levi@gmail.com', 'Levi1234', '1111111111', 'Kerala', 'user', '2024-10-02 08:31:20', 0, NULL),
(15, 'Ichigo', 'ichigo@gmail.com', 'Ichigo12', '3333333333', 'Japan', 'user', '2024-10-02 08:36:47', 0, NULL),
(16, 'aaaaaaaa', 'aaaaa@gmail.com', 'Aaaa1111', '0000000000', 'eeeeeeeeeee', 'user', '2024-10-02 08:40:39', 0, NULL),
(18, 'Eren', 'eren@gmail.com', 'Eren1234', '7549382033', 'Delhi', 'user', '2024-10-12 09:04:22', 1, NULL),
(19, 'Njan', 'meeeh@gmail.com', 'Aaaaaaa1', '8298302892', 'Kerala', 'user', '2024-10-13 10:28:03', 0, NULL),
(21, 'Ichigo', 'ichigo2@gmail.com', 'Ichigo12', '7549382033', 'Delhi', 'user', '2024-10-16 14:08:18', 1, NULL),
(22, 'Hii', 'hi@gmail.com', 'Hiiiiii1', '1234567890', 'Ker', 'user', '2024-10-16 14:18:06', 0, NULL),
(23, 'Meow', 'meow@gmail.com', 'Meow1234', '0987654321', 'India', 'user', '2024-10-18 10:30:38', 0, NULL),
(24, 'Yuji', 'yuji@gmail.com', 'Yuji1234', '9876543982', 'kochi', 'user', '2024-10-24 01:31:32', 0, NULL),
(26, 'Hiii', 'hi23@gmail.com', 'Hi123456', '9876543982', 'kochi', 'user', '2024-10-24 17:42:25', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD KEY `fk_spot` (`spot_id`);

--
-- Indexes for table `tourism_spots`
--
ALTER TABLE `tourism_spots`
  ADD PRIMARY KEY (`spot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tourism_spots`
--
ALTER TABLE `tourism_spots`
  MODIFY `spot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `fk_spot` FOREIGN KEY (`spot_id`) REFERENCES `tourism_spots` (`spot_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
