-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 10:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrumputlaut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbrekap`
--

CREATE TABLE `tbrekap` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `suhu` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbrekap`
--

INSERT INTO `tbrekap` (`id`, `waktu`, `suhu`) VALUES
(335, '2020-05-09 12:33:13', 30),
(336, '2020-05-09 12:41:52', 31),
(337, '2020-05-09 12:41:55', 30),
(338, '2020-05-09 12:42:06', 31),
(339, '2020-05-09 12:42:09', 30),
(340, '2020-05-09 12:42:14', 31),
(341, '2020-05-09 12:42:17', 30),
(342, '2020-05-09 12:42:23', 31),
(343, '2020-05-09 12:42:31', 30),
(344, '2020-05-09 12:42:37', 31),
(345, '2020-05-09 12:42:40', 30),
(346, '2020-05-09 12:42:48', 31),
(347, '2020-05-09 12:42:51', 30),
(348, '2020-05-09 12:42:54', 31),
(349, '2020-05-09 12:42:56', 30),
(350, '2020-05-09 12:42:59', 31),
(351, '2020-05-09 12:43:02', 30),
(352, '2020-05-09 12:43:05', 31),
(353, '2020-05-09 12:54:17', 30),
(354, '2020-05-09 12:54:20', 31),
(355, '2020-05-09 12:54:31', 30),
(356, '2020-05-09 12:54:36', 31),
(357, '2020-05-09 12:54:39', 30),
(358, '2020-05-09 12:54:42', 31),
(359, '2020-05-09 12:54:45', 30),
(360, '2020-05-09 12:54:53', 31),
(361, '2020-05-09 12:55:24', 30),
(362, '2020-05-09 12:55:29', 31),
(363, '2020-05-09 12:55:32', 30),
(364, '2020-05-09 12:55:35', 31),
(365, '2020-05-09 12:55:38', 30),
(366, '2020-05-09 12:55:40', 31),
(367, '2020-05-09 12:55:43', 30),
(368, '2020-05-09 12:55:46', 31),
(369, '2020-05-09 12:55:49', 30),
(370, '2020-05-09 12:55:52', 31),
(371, '2020-05-09 12:55:55', 30),
(372, '2020-05-09 12:56:06', 31),
(373, '2020-05-09 12:56:09', 30),
(374, '2020-05-09 12:56:17', 31),
(375, '2020-05-09 12:56:20', 30),
(376, '2020-05-09 12:56:56', 31),
(377, '2020-05-09 12:56:59', 30),
(378, '2020-05-09 12:57:04', 31),
(379, '2020-05-09 12:57:09', 30),
(380, '2020-05-09 12:57:29', 31),
(381, '2020-05-09 12:57:32', 30),
(382, '2020-05-09 12:57:35', 31),
(383, '2020-05-09 12:57:38', 30),
(384, '2020-05-09 12:57:40', 31),
(385, '2020-05-09 12:57:49', 30),
(386, '2020-05-09 12:57:54', 31),
(387, '2020-05-09 12:57:57', 30),
(388, '2020-05-09 12:58:00', 31),
(389, '2020-05-09 12:58:03', 30),
(390, '2020-05-09 12:58:08', 31),
(391, '2020-05-09 12:58:11', 30),
(392, '2020-05-09 12:58:14', 31),
(393, '2020-05-09 12:58:17', 30),
(394, '2020-05-09 12:58:25', 31),
(395, '2020-05-09 12:58:28', 30),
(396, '2020-05-09 12:58:31', 31),
(397, '2020-05-09 12:58:34', 30),
(398, '2020-05-09 12:58:37', 31),
(399, '2020-05-09 12:58:40', 30),
(400, '2020-05-09 12:58:48', 31),
(401, '2020-05-09 12:58:51', 30),
(402, '2020-05-09 12:59:49', 31),
(403, '2020-05-09 13:00:55', 30),
(404, '2020-05-09 13:01:59', 31),
(405, '2020-05-09 13:02:17', 30),
(406, '2020-05-09 13:02:22', 31),
(407, '2020-05-09 13:02:33', 30),
(408, '2020-05-09 13:03:33', 31),
(409, '2020-05-09 13:03:52', 30),
(410, '2020-05-09 13:03:55', 31),
(411, '2020-05-09 13:03:57', 30),
(412, '2020-05-09 13:04:03', 31),
(413, '2020-05-09 13:04:06', 30),
(414, '2020-05-09 13:04:12', 31),
(415, '2020-05-09 13:04:14', 30),
(416, '2020-05-09 13:04:17', 31),
(417, '2020-05-09 13:04:20', 30),
(418, '2020-05-09 13:04:26', 31),
(419, '2020-05-09 13:05:17', 30),
(420, '2020-05-09 13:05:22', 31),
(421, '2020-05-09 13:07:06', 30),
(422, '2020-05-09 13:07:19', 31),
(423, '2020-05-09 13:09:29', 30),
(424, '2020-05-09 13:09:32', 31),
(425, '2020-05-09 13:11:08', 30),
(426, '2020-05-09 13:11:14', 31),
(427, '2020-05-09 13:11:16', 30),
(428, '2020-05-09 13:11:22', 31),
(429, '2020-05-09 13:13:17', 30),
(430, '2020-05-09 13:13:44', 31),
(431, '2020-05-09 13:13:46', 30),
(432, '2020-05-09 13:13:53', 31),
(433, '2020-05-09 13:13:58', 30),
(434, '2020-05-09 13:14:01', 31),
(435, '2020-05-09 13:14:09', 30),
(436, '2020-05-09 13:14:12', 31),
(437, '2020-05-09 13:14:26', 30),
(438, '2020-05-09 13:14:31', 31),
(439, '2020-05-09 13:16:06', 30),
(441, '2020-05-09 13:24:20', 30),
(442, '2020-05-09 13:25:16', 31),
(443, '2020-05-09 13:25:18', 30),
(445, '2020-05-09 13:32:33', 31),
(446, '2020-05-09 13:40:37', 30),
(447, '2020-05-09 13:40:40', 31),
(448, '2020-05-09 13:40:48', 30),
(449, '2020-05-09 13:40:58', 31),
(450, '2020-05-09 13:41:11', 30),
(451, '2020-05-09 13:41:14', 31),
(452, '2020-05-09 13:41:46', 30),
(453, '2020-05-09 13:41:49', 31),
(454, '2020-05-09 13:41:54', 30),
(455, '2020-05-09 13:41:57', 31),
(456, '2020-05-09 13:42:05', 30),
(457, '2020-05-09 13:42:13', 31),
(458, '2020-05-09 13:42:19', 30),
(459, '2020-05-09 13:42:34', 31),
(460, '2020-05-09 13:42:37', 30),
(461, '2020-05-09 13:43:08', 31),
(462, '2020-05-09 13:43:13', 30),
(463, '2020-05-09 13:43:19', 31),
(464, '2020-05-09 13:43:24', 30),
(465, '2020-05-09 13:43:43', 31),
(466, '2020-05-09 13:43:54', 30),
(467, '2020-05-09 13:44:05', 31),
(468, '2020-05-09 13:44:11', 30),
(469, '2020-05-09 13:44:16', 31),
(470, '2020-05-12 10:48:13', 29),
(471, '2020-05-12 10:48:19', 30),
(472, '2020-05-12 10:49:20', 29),
(473, '2020-05-12 10:49:23', 30),
(474, '2020-05-12 10:51:21', 34),
(475, '2020-05-12 10:51:24', 30),
(476, '2020-06-07 07:25:28', 25),
(477, '2020-06-07 07:26:22', 32),
(478, '2020-06-07 07:35:35', 33),
(479, '2020-06-07 07:35:38', 32),
(480, '2020-06-07 07:38:27', 36),
(481, '2020-06-07 07:38:37', 25),
(482, '2020-06-07 07:38:40', 32),
(483, '2020-06-07 07:40:06', 36),
(484, '2020-06-07 07:40:43', 32),
(485, '2020-06-07 07:48:50', 31),
(486, '2020-06-07 07:48:57', 32),
(487, '2020-06-07 08:19:43', 31);

-- --------------------------------------------------------

--
-- Table structure for table `tbrumput`
--

CREATE TABLE `tbrumput` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NULL DEFAULT current_timestamp(),
  `lama_pengeringan` int(2) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbrumput`
--

INSERT INTO `tbrumput` (`id`, `waktu`, `lama_pengeringan`, `keterangan`) VALUES
(1, '2020-06-07 08:22:01', 1, 'Tidak ada rumput laut');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `nama`, `email`, `password`, `foto`, `created`) VALUES
(1, 'Rumput Laut', 'rumputlaut@gmail.com', '$2y$10$W8VeH2qe6ZQ3MPbV/TWmZeRcCJhXmArcXecRGdUr9jCAxS9eCv0We', 'rumput.jpg', 1586955454);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbrekap`
--
ALTER TABLE `tbrekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbrumput`
--
ALTER TABLE `tbrumput`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbrekap`
--
ALTER TABLE `tbrekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=488;

--
-- AUTO_INCREMENT for table `tbrumput`
--
ALTER TABLE `tbrumput`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;