-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 02:26 PM
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
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `course_introduction` text DEFAULT NULL,
  `provider` varchar(50) NOT NULL DEFAULT 'SSPU',
  `language` int(11) DEFAULT NULL,
  `outline` varchar(200) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coursename`, `course_introduction`, `provider`, `language`, `outline`, `doc_id`) VALUES
(1, 'PHP', 'THis is php course introdutcion', 'SSPU', 2, '<ol><li>Introduction to PHP</li><li>What is PHP</li><li>Variable management with PHP</li><li>Form and PHP</li><li>POO</li></ol>', 3),
(3, 'HTML5', 'Hyper Text Markeup Language version 5', 'SSPU', 2, '<ol><li>HTML History</li><li>Why HTML5</li><li>Tags</li><li>Style with html</li><li>Form</li><li>Multimedia</li></ol>', 3),
(4, 'Web responsive development', 'This course about mainly Javascript language ', 'SSPU', 2, '<ol><li>What is web ?</li><li>Different screens on web</li><li>Javascript language</li><li>Jquery</li><li>Regex</li></ol>', 4),
(5, '5G', '5G Technology', 'Huawei', 2, '<ol><li>History of telecom</li><li>GSM-2G-3G-4G-5G</li><li>5G architecture</li><li>5G components</li></ol>', 6),
(6, 'Harmony', 'This course is about Harmony OS ', 'Huawei', 2, '<ol><li>What is Harmony OS</li><li>Open harmony</li><li>Harmony architecture</li><li>How it works?</li><li>Harmony OS app development</li></ol>', 8);

-- --------------------------------------------------------

--
-- Table structure for table `doccategory`
--

CREATE TABLE `doccategory` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doccategory`
--

INSERT INTO `doccategory` (`id`, `categoryName`, `description`) VALUES
(1, 'Image', 'Documents in image format'),
(2, 'PDF', 'Documents in PDF format'),
(3, 'Other', 'Other document formats');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `docs` varchar(200) DEFAULT NULL,
  `category` varchar(300) NOT NULL,
  `detail` varchar(300) NOT NULL,
  `language` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `docs`, `category`, `detail`, `language`, `course_id`) VALUES
(3, 'Course document ', '01 Cloud Computing Basics(G13886851_OTHZH A) (1).pdf', '0', '', 2, NULL),
(4, 'Doc course', '02 Server Basics(G13886884_OTHZH A) (1).pdf', '', '', 2, 0),
(6, 'Course document', '0101 HTML Introduction.pdf', '', '', 2, 0),
(8, 'document', '070A0020.jpg', '', '', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language`) VALUES
(1, 'Chinese'),
(2, 'English'),
(3, 'French');

-- --------------------------------------------------------

--
-- Table structure for table `newclass`
--

CREATE TABLE `newclass` (
  `id` int(11) NOT NULL,
  `classname` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newclass`
--

INSERT INTO `newclass` (`id`, `classname`, `description`) VALUES
(1, 'Article', 'This class of information is about articles'),
(2, 'events', 'This class of news is about luban\'s event');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `pubdate` datetime DEFAULT NULL,
  `content` text DEFAULT NULL,
  `newclass` int(11) DEFAULT NULL,
  `illustration` varchar(300) DEFAULT NULL,
  `language` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `author`, `pubdate`, `content`, `newclass`, `illustration`, `language`) VALUES
(8, 'Warm Closing Ceremony for UNB Students and Faculty', 4, '2023-12-14 12:30:00', '<p><br>The Warm Closing Ceremony for UNB students and faculty unfolded brilliantly, marking the end of a memorable academic year.\"\"The event was filled with touching moments as we took time to reflect on collective achievements, personal growth, and challenges overcome throughout the year.\" \"Inspiring speeches highlighted the exceptional dedication of the faculty and provided students with an opportunity to acknowledge the precious friendships formed during their academic journey.\"\"Recognition of outstanding achievements added a special touch, showcasing individual contributions that enriched our academic community.\"\"The festivities created a warm atmosphere, strengthening bonds within the UNB family and fostering excitement for the future opportunities awaiting our students.\"\"This Closing Ceremony will be etched in our memories, symbolizing not only an end but also the beginning of new chapters and new horizons for each of us.</p>', 1, '070A5553.JPG', 0),
(10, 'Huawei Training Center Visiting In Hangzou', 4, '2023-11-06 19:40:00', '<p>Embark on an enlightening journey by visiting the Huawei Training Center in Hangzhou, where cutting-edge technology meets innovation. Immerse yourself in the world of Huawei\'s advancements as you step into state-of-the-art facilities designed for fostering knowledge and expertise.</p><p>Explore the intricacies of the latest technologies in telecommunications, 5G, and beyond, guided by knowledgeable trainers who&nbsp;</p><p>unveil the secrets behind Huawei\'s global success. Engage with interactive demonstrations showcasing the evolution of mobile devices and the future of connectivity.</p><p>Witness the collaborative spirit that drives Huawei\'s research and development, gaining insights into the company\'s commitment to pushing the boundaries of what\'s possible. From AI to IoT, experience firsthand the technologies shaping the digital landscape.</p><p>Discover Huawei\'s dedication to sustainability as you explore eco-friendly initiatives integrated into their operations. From energy-efficient buildings to responsible sourcing practices, witness how Huawei is contributing to a more sustainable future.</p><p>In this immersive visit to the Huawei Training Center, gain a deeper understanding of the technological prowess and innovative spirit that define Huawei\'s impact on the global landscape.</p>', 1, '070A9576.jpg', 0),
(16, 'Join SSPU Sport Festival.', 4, '2023-11-03 01:04:00', '<p>Celebrate the spirit of athleticism and camaraderie at the Jolin SSPU Sport Festival, where we proudly participated in a thrilling sports competition. Join us in reliving the excitement of the event as we competed with fervor, showcasing not only our physical prowess but also the unity and sportsmanship that define our community.</p><p>From adrenaline-pumping races to strategic team sports, our athletes gave their all, embodying the ethos of dedication and resilience. Explore the highlights of the competition, where cheers echoed through the air, and each victory was a testament to the collective effort and training that went into our sporting endeavors.</p><p>Capture the moments of triumph and perseverance as we navigated through various challenges, fostering a sense of pride in our achievements. Whether on the track, field, or court, the Jolin SSPU Sport Festival became a platform where passion for sports merged seamlessly with the values that bind us together.</p><p>Join us in cherishing the memories of this spirited competition, where athletes pushed their limits, friendships flourished, and the vibrant energy of sports illuminated the essence of our community.</p>', 2, 'EVAN6260.jpg', 0),
(9, 'A Day Walk In The Hangzou City Park', 4, '2023-12-07 19:30:00', '<p>Embark on a leisurely day stroll through the enchanting landscapes of Hangzhou City Park, where nature intertwines with cultural elegance. Begin your exploration at the iconic West Lake, a serene expanse surrounded by lush greenery and framed by ancient pagodas – a perfect retreat for contemplation.</p><p>Meander along the Su Causeway, adorned with willow trees that gracefully bow over the water, creating a picturesque scene that has inspired poets and artists for centuries. Take a moment to appreciate the classical architecture of Leifeng Pagoda, offering panoramic views of the lake and city.</p><p>Discover the tranquility of Guo\'s Villa, a traditional Chinese garden that invites you to wander through pavilions, bridges, and teahouses, each telling a story of timeless beauty. Embrace the rhythmic flow of life as you encounter locals practicing Tai Chi and enjoying moments of peaceful reflection.</p><p>As you traverse Bai Causeway, relish in the fragrant blooms of lotus flowers in summer or the delicate cherry blossoms in spring, adding bursts of color to the landscape. Conclude your day by savoring a cup of Longjing tea at a lakeside teahouse, where the beauty of nature and cultural richness converge in perfect harmony.</p>', 1, '070A0020.jpg', 0),
(12, 'Warm Opening Ceremony for UNB Students and Faculty', 4, '2023-09-29 00:54:00', '<p>Explore the vibrant energy that permeates our university well beyond the opening ceremony. Immerse yourself in a world where learning becomes an adventure, ideas take flight, and each member of our community contributes to creating an atmosphere of innovation and excellence.</p><p>Our photo gallery will capture moments of connection and celebration, transporting you to the heart of the event. Discover inspiring stories from our students and faculty, highlighting their achievements, passions, and commitments.</p><p>Beyond the festivities, our blog invites you to delve into fascinating topics, from innovative projects to profound reflections. Stay informed about the latest news, upcoming events, and exciting opportunities that will animate our campus.</p><p>Join us in this ongoing adventure of learning, growth, and exploration. Together, we shape the future and cultivate a community where everyone can excel.</p>', 1, 'EVAN6921.jpg', 0),
(13, 'A Day Sightseeing In The City Of Shanghai', 4, '2023-11-21 00:58:00', '<p>Embark on a captivating journey through the bustling cityscape of Shanghai, where modernity intertwines seamlessly with rich cultural heritage. Begin your day with a visit to the iconic Oriental Pearl Tower, standing tall amidst the dazzling skyline, offering panoramic views that capture the city\'s vibrant spirit.</p><p>Wander through the historic lanes of the Old Town, where ancient temples and traditional tea houses echo tales of centuries past. Stroll along the famous Bund, a waterfront promenade adorned with architectural marvels, showcasing the city\'s evolution from colonial-era to contemporary chic.</p><p>Indulge your senses in the vibrant atmosphere of Nanjing Road, a shopper\'s paradise featuring high-end boutiques and bustling markets. Take a moment of tranquility at the serene Yu Garden, a classical Chinese garden that transports you to a realm of calm amidst the urban hustle.</p><p>As the sun sets, witness the mesmerizing transformation of the city lights, reflected in the waters of the Huangpu River. Conclude your day with a cruise along the river, admiring the illuminated skyline, a testament to Shanghai\'s dynamic fusion of tradition and modernity.</p>', 1, 'article-5.png', 0),
(14, 'Visiting SSPU Bicycle Manufacturing Faculty', 4, '2023-11-20 01:01:00', '<p>Embark on an immersive journey into the heart of innovation as you explore the fascinating world of SSPU Bicycle Manufacturing. Witness the intricate process of crafting cutting-edge bicycles, where precision meets passion.</p><p>Step onto the factory floor and observe skilled artisans meticulously assembling each component, from sleek frames to state-of-the-art gear systems. Engage with the experts who infuse creativity and engineering prowess into every design, pushing the boundaries of bicycle technology.</p><p>Discover the commitment to sustainability as you explore the eco-friendly practices woven into the manufacturing process. From sourcing materials to adopting energy-efficient production methods, SSPU Bicycle Manufacturing is at the forefront of eco-conscious craftsmanship.</p><p>Uncover the story behind each bicycle, understanding the blend of artistry and functionality that defines SSPU\'s commitment to creating not just modes of transportation but vehicles that embody a lifestyle.</p><p>Immerse yourself in the world of SSPU Bicycle Manufacturing, where innovation meets craftsmanship, and each pedal stroke tells a tale of dedication to quality and performance.</p>', 1, 'article-4.png', 0),
(15, 'Participation At IOT Practice Class', 4, '2023-11-06 01:02:00', '<p>Immerse yourself in the world of the Internet of Things (IoT) through active participation in our IoT Practice Class. Delve into hands-on experiences that bring theoretical concepts to life, fostering a deeper understanding of the transformative power of IoT.</p><p>Engage with cutting-edge devices and sensors, unraveling the intricacies of how they communicate and collaborate to create a connected ecosystem. Our practice class provides a dynamic learning environment where you can experiment with real-world IoT applications and witness their impact.</p><p>Collaborate with fellow participants to tackle practical challenges, sharing insights and collectively problem-solving in the ever-evolving landscape of IoT. From smart homes to industrial applications, discover the versatility and potential of IoT technologies firsthand.</p><p>Our experienced instructors will guide you through practical exercises, empowering you to develop the skills needed to navigate the rapidly expanding field of IoT. By actively participating in our IoT Practice Class, you\'ll not only gain theoretical knowledge but also acquire practical skills that are crucial in today\'s digital age.</p>', 1, 'article-1.jpg', 0),
(17, 'Join Festival Gala of Chinese Multinationality', 4, '2023-11-01 01:06:00', '<p>Immerse yourself in the vibrant celebrations of the Chinese Multinationality Festivals Gala, where a kaleidoscope of cultures unfolds in a spectacular showcase of traditions, performances, and unity. Join the festivities as we embrace the rich tapestry of China\'s diverse ethnic groups, each contributing to the colorful mosaic of our cultural heritage.</p><p>From captivating dance performances to melodious musical expressions, experience the beauty of traditional arts that reflect the unique identity of various Chinese ethnicities.&nbsp;</p><p>The gala serves as a platform for cultural exchange, fostering understanding and appreciation for the rich diversity within the broader Chinese community.</p><p>Participate in traditional ceremonies, savor authentic cuisine, and engage in interactive activities that highlight the distinct customs of different Chinese ethnic groups. This gala is a celebration of harmony, where people from various backgrounds come together to honor their heritage and build bridges of understanding.</p><p>Join us in the joyous atmosphere of the Chinese Multinationality Festivals Gala, where the spirit of unity and cultural pride takes center stage, creating lasting memories and fostering a sense of shared identity.</p>', 2, 'EVAN4437.jpg', 0),
(18, 'Teachers Airport Pickup', 4, '2023-10-18 01:09:00', '<p>Extend a warm welcome to our esteemed teachers with a thoughtfully organized airport pickup service. As they arrive, ensure a seamless transition into our academic community by providing a courteous and efficient transportation experience.</p><p>Our dedicated team will be there to greet teachers upon arrival, offering assistance with luggage and creating a positive first impression. This personalized pickup service not only eases the travel process but also exemplifies our commitment to hospitality and support.</p><p>Beyond the practicalities, this gesture sets the tone for a collaborative and inclusive environment. Teachers will feel valued from the moment they step off the plane, fostering a sense of belonging and enthusiasm as they embark on their journey with our academic community.</p><p>Join us in making the arrival experience memorable for our teachers, showcasing the warmth and professionalism that define our commitment to creating an environment conducive to excellence in education.</p>', 2, '070A8704.JPG', 0),
(19, 'Foreigners Students Meeting ', 4, '2023-09-28 01:11:00', '<p>Step into the diverse and inclusive realm of our Foreign Students Meeting, where cultural richness converges in a tapestry of shared experiences and newfound friendships. Explore the unique perspectives brought by students from around the globe as they gather to connect, learn, and celebrate their international journey.</p><p>This meeting serves as a melting pot of cultures, creating an environment where languages, traditions, and stories intertwine. From lively discussions to cultural showcases, witness the vibrant exchange that fosters a sense of unity among students who call different corners of the world home.</p><p>Embrace the opportunity for cultural exploration as foreign students share insights into their backgrounds, enriching the collective tapestry of our academic community. This meeting goes beyond academia, creating a space for personal growth, intercultural understanding, and the formation of bonds that transcend geographical boundaries.</p><p>Join us in celebrating the diversity that defines our Foreign Students Meeting, where every interaction becomes a stepping stone towards a more interconnected and globally aware community.</p>', 2, 'EVAN1058.jpg', 0),
(20, 'UNB Students-SSPU Teachers Meeting', 4, '2023-09-27 01:14:00', '<p>Illuminate the cross-cultural exchange as UNB students engage in a meeting with SSPU teachers, forging connections that transcend borders. Explore the dynamic synergy between diverse perspectives as students absorb knowledge from the wealth of experience that SSPU teachers bring to the table.</p><p>This meeting becomes a nexus of learning and collaboration, where academic insights seamlessly blend with cultural exchange. UNB students have the opportunity to gain unique perspectives from SSPU teachers, enriching their educational journey with a global touch.</p><p>Witness the exchange of ideas and expertise, creating a platform where learning transcends traditional boundaries. As UNB students and SSPU teachers converge, this meeting fosters an environment of mutual understanding, fostering relationships that extend beyond the confines of the classroom.</p><p>Experience the vibrant tapestry of intellect and culture woven during the UNB students-SSPU teachers meeting, where the pursuit of knowledge becomes a truly global endeavor.</p>', 2, 'EVAN1267.jpg', 0),
(21, 'Visiting SSPU Campus Ceremony ', 4, '2023-09-26 01:16:00', '<p>Embark on a memorable journey as we anticipate the Visiting Ceremony at SSPU Campus, a celebration of collaboration, knowledge exchange, and shared aspirations. Join us in exploring the dynamic atmosphere of the campus, where academic excellence converges with a vibrant community spirit.</p><p>The ceremony is a gateway to discover the state-of-the-art facilities, innovative labs, and collaborative spaces that define SSPU\'s commitment to fostering cutting-edge education. Engage with faculty, students, and distinguished guests as we unveil the multifaceted aspects of our academic landscape.</p><p>Experience the rich tapestry of cultural diversity as the ceremony unfolds, with performances, exhibitions, and interactive sessions that showcase the unique identity of SSPU. This event marks the beginning of a collective journey towards academic achievement and cross-cultural understanding.</p><p>Join us in commemorating this Visiting Ceremony at SSPU Campus, where each step echoes with the promise of exploration, collaboration, and the pursuit of knowledge.</p>', 2, 'EVAN1019.jpg', 0),
(22, 'Students Airport Pickup', 4, '2023-09-25 01:19:00', '<p>Extend a warm welcome to our incoming students with a well-organized airport pickup service. As they arrive, our dedicated team will ensure a smooth transition to campus life by providing friendly assistance with luggage and offering a warm introduction to our academic community.</p><p>This thoughtful pickup service not only eases the initial challenges of arriving in a new place but also sets a positive tone for the students\' academic journey. From the airport to campus, we aim to make their first moments in our community comfortable, stress-free, and filled with the anticipation of exciting experiences.</p><p>Beyond the logistical support, this gesture signifies our commitment to creating a welcoming environment. It marks the beginning of a student\'s connection to our community, fostering a sense of belonging and creating the foundation for a successful and fulfilling academic experience.</p><p>Join us in making the students\' arrival a memorable and positive experience, emphasizing our dedication to their well-being and success in their academic pursuits.</p>', 2, 'EVAN0959.jpg', 0),
(23, 'Dumpling making', 4, '2023-12-15 02:03:00', '<h3>Amazing dumpling cooking</h3><p>Some text here</p>', 1, '070A5248.JPG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(9, 'Dramanee', 'nabernamoano@gmail.com', '$2y$10$gKjEuzUPFqvvgR0uv5/BjuR1IQdewv8IHwOHFChMJ0N'),
(2, 'babab', 'lionelMessi@pp.com', '$2y$10$nuALugVM8eV4SQTNQr9MNe1TaPRlbUo4yBIidC05Zru'),
(3, 'eeee', 'abraham.ouedraogo@nebrata.com', '$2y$10$y2eXFQgZZh7wVH/RtI9cV.HOPhLpzsSyQPWwGcZUXvu'),
(4, 'ulrich', 'lionel@pp.com', '$2y$10$9PSOB9puef20febRi6brtObISlm/cOVT3LoUaVXA.PO'),
(5, 'ulrich4', 'ulrichouedraogo500@gmail.com', '$2y$10$Xhdfk/iyMjRNDaXfGpNkjOYDZxePEwcPX9FRQELjD5S'),
(10, 'bali', 'bali@gmail.com', '12345'),
(12, 'admin', '', '$2y$10$l8Wk3zewJ4CyN.f..hD4GOxqQMoTASH04hmgvAIK55f'),
(13, 'test', '', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`);

--
-- Indexes for table `doccategory`
--
ALTER TABLE `doccategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language` (`language`),
  ADD KEY `fk_course_id` (`course_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newclass`
--
ALTER TABLE `newclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `newclass` (`newclass`),
  ADD KEY `language` (`language`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doccategory`
--
ALTER TABLE `doccategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newclass`
--
ALTER TABLE `newclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
