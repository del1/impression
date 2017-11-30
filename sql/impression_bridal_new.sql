-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 04:47 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impression_bridal_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `lnk_brands_to_images`
--

CREATE TABLE `lnk_brands_to_images` (
  `bti_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnk_brands_to_images`
--

INSERT INTO `lnk_brands_to_images` (`bti_id`, `brand_id`, `image_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lnk_product_to_documents`
--

CREATE TABLE `lnk_product_to_documents` (
  `ptd_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lnk_product_to_subcat`
--

CREATE TABLE `lnk_product_to_subcat` (
  `pts_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnk_product_to_subcat`
--

INSERT INTO `lnk_product_to_subcat` (`pts_id`, `product_id`, `sub_cat_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 6),
(4, 1, 17),
(5, 1, 41),
(6, 2, 1),
(7, 2, 2),
(8, 2, 6),
(9, 2, 17),
(10, 2, 28),
(11, 2, 34),
(12, 2, 45),
(13, 3, 2),
(14, 3, 5),
(15, 3, 17),
(16, 3, 28),
(17, 3, 34),
(18, 4, 1),
(19, 4, 2),
(20, 4, 6),
(21, 4, 21),
(22, 4, 28),
(23, 4, 34),
(24, 4, 45),
(25, 5, 2),
(26, 5, 5),
(27, 5, 8),
(28, 5, 21),
(29, 5, 28),
(30, 5, 33),
(31, 5, 43),
(32, 6, 2),
(33, 6, 5),
(34, 6, 8),
(35, 6, 21),
(36, 6, 27),
(37, 7, 2),
(38, 7, 5),
(39, 7, 8),
(40, 7, 22),
(41, 7, 28),
(42, 7, 33),
(43, 7, 43),
(44, 8, 1),
(45, 8, 2),
(46, 8, 5),
(47, 8, 18),
(48, 8, 30),
(49, 8, 39),
(50, 8, 43),
(51, 9, 2),
(52, 9, 5),
(53, 9, 8),
(54, 9, 21),
(55, 9, 30),
(56, 9, 43),
(57, 10, 2),
(58, 10, 5),
(59, 10, 6),
(60, 10, 8),
(61, 10, 21),
(62, 10, 27),
(63, 10, 28),
(64, 10, 45),
(65, 11, 2),
(66, 11, 5),
(67, 11, 6),
(68, 11, 8),
(69, 11, 21),
(70, 11, 38),
(71, 11, 45),
(72, 12, 1),
(73, 12, 2),
(74, 12, 5),
(75, 12, 18),
(76, 12, 30),
(77, 12, 39),
(78, 12, 43),
(79, 13, 2),
(80, 13, 5),
(81, 13, 8),
(82, 13, 21),
(83, 13, 30),
(84, 13, 39),
(85, 13, 43),
(86, 14, 1),
(87, 14, 2),
(88, 14, 5),
(89, 14, 18),
(90, 14, 27),
(91, 14, 28),
(92, 14, 43),
(93, 15, 2),
(94, 15, 6),
(95, 15, 21),
(96, 15, 30),
(97, 15, 34),
(98, 15, 43),
(99, 16, 1),
(100, 16, 2),
(101, 16, 6),
(102, 16, 21),
(103, 16, 38),
(104, 17, 1),
(105, 17, 2),
(106, 17, 5),
(107, 17, 6),
(108, 17, 21),
(109, 17, 34),
(110, 17, 39),
(111, 18, 1),
(112, 18, 2),
(113, 18, 5),
(114, 18, 6),
(115, 18, 21),
(116, 18, 28),
(117, 18, 33),
(118, 19, 1),
(119, 19, 2),
(120, 19, 5),
(121, 19, 6),
(122, 19, 18),
(123, 19, 30),
(124, 19, 43),
(125, 20, 1),
(126, 20, 2),
(127, 20, 18),
(128, 20, 30),
(129, 20, 43),
(130, 21, 1),
(131, 21, 18),
(132, 21, 34),
(133, 21, 43),
(134, 22, 1),
(135, 22, 2),
(136, 22, 6),
(137, 22, 21),
(138, 22, 34),
(139, 22, 45),
(140, 23, 2),
(141, 23, 6),
(142, 23, 24),
(143, 23, 29),
(144, 23, 43),
(145, 24, 1),
(146, 24, 2),
(147, 24, 21),
(148, 24, 30),
(149, 24, 33),
(150, 24, 43),
(151, 25, 2),
(152, 25, 3),
(153, 25, 21),
(154, 25, 29),
(155, 25, 33),
(156, 25, 43),
(157, 26, 2),
(158, 26, 3),
(159, 26, 21),
(160, 26, 27),
(161, 26, 28),
(162, 26, 43),
(163, 27, 1),
(164, 27, 2),
(165, 27, 18),
(166, 27, 27),
(167, 27, 28),
(168, 27, 43),
(169, 28, 1),
(170, 28, 2),
(171, 28, 6),
(172, 28, 21),
(173, 28, 38),
(174, 28, 39),
(175, 28, 43),
(176, 29, 1),
(177, 29, 2),
(178, 29, 5),
(179, 29, 24),
(180, 29, 27),
(181, 29, 28),
(182, 29, 43),
(183, 30, 6),
(184, 30, 23),
(185, 30, 28),
(186, 30, 33),
(187, 30, 43),
(188, 31, 6),
(189, 31, 9),
(190, 31, 23),
(191, 31, 30),
(192, 31, 43),
(193, 32, 1),
(194, 32, 6),
(195, 32, 23),
(196, 32, 27),
(197, 32, 28),
(198, 32, 43),
(199, 33, 6),
(200, 33, 17),
(201, 33, 28),
(202, 33, 34),
(203, 33, 46),
(204, 34, 1),
(205, 34, 2),
(206, 34, 6),
(207, 34, 24),
(208, 34, 28),
(209, 34, 34),
(210, 34, 43),
(211, 35, 1),
(212, 35, 2),
(213, 35, 21),
(214, 35, 27),
(215, 35, 29),
(216, 35, 43),
(217, 36, 1),
(218, 36, 2),
(219, 36, 24),
(220, 36, 38),
(221, 36, 43),
(222, 37, 1),
(223, 37, 2),
(224, 37, 21),
(225, 37, 29),
(226, 37, 33),
(227, 37, 43),
(228, 38, 1),
(229, 38, 2),
(230, 38, 6),
(231, 38, 24),
(232, 38, 28),
(233, 38, 33),
(234, 38, 43),
(235, 39, 1),
(236, 39, 2),
(237, 39, 21),
(238, 39, 27),
(239, 39, 28),
(240, 39, 43),
(241, 40, 2),
(242, 40, 6),
(243, 40, 18),
(244, 40, 28),
(245, 40, 45),
(246, 41, 6),
(247, 41, 12),
(248, 41, 21),
(249, 41, 30),
(250, 41, 34),
(251, 41, 43),
(252, 42, 4),
(253, 42, 18),
(254, 42, 27),
(255, 42, 28),
(256, 42, 43),
(257, 43, 12),
(258, 43, 18),
(259, 43, 28),
(260, 43, 33),
(261, 43, 43),
(262, 44, 12),
(263, 44, 21),
(264, 44, 30),
(265, 44, 39),
(266, 44, 43),
(267, 45, 12),
(268, 45, 21),
(269, 45, 32),
(270, 45, 34),
(271, 45, 43),
(272, 46, 3),
(273, 46, 6),
(274, 46, 21),
(275, 46, 28),
(276, 46, 43),
(277, 47, 1),
(278, 47, 6),
(279, 47, 21),
(280, 47, 28),
(281, 47, 43),
(282, 48, 1),
(283, 48, 2),
(284, 48, 5),
(285, 48, 24),
(286, 48, 29),
(287, 48, 33),
(288, 48, 43),
(289, 49, 4),
(290, 49, 18),
(291, 49, 41),
(292, 49, 43),
(293, 50, 6),
(294, 50, 18),
(295, 50, 30),
(296, 50, 43),
(297, 51, 3),
(298, 51, 18),
(299, 51, 27),
(300, 51, 29),
(301, 51, 45),
(302, 52, 1),
(303, 52, 2),
(304, 52, 24),
(305, 52, 27),
(306, 52, 28),
(307, 52, 43),
(308, 53, 9),
(309, 53, 21),
(310, 53, 27),
(311, 53, 28),
(312, 53, 45),
(313, 54, 1),
(314, 54, 2),
(315, 54, 6),
(316, 54, 21),
(317, 54, 27),
(318, 54, 28),
(319, 54, 43),
(320, 55, 6),
(321, 55, 17),
(322, 55, 27),
(323, 55, 28),
(324, 55, 45),
(325, 56, 2),
(326, 56, 6),
(327, 56, 9),
(328, 56, 18),
(329, 56, 32),
(330, 56, 34),
(331, 56, 43),
(332, 57, 2),
(333, 57, 3),
(334, 57, 6),
(335, 57, 22),
(336, 57, 28),
(337, 57, 32),
(338, 57, 34),
(339, 57, 43),
(340, 58, 2),
(341, 58, 6),
(342, 58, 21),
(343, 58, 27),
(344, 58, 28),
(345, 58, 43),
(346, 59, 9),
(347, 59, 17),
(348, 59, 27),
(349, 59, 28),
(350, 59, 45),
(351, 60, 3),
(352, 60, 6),
(353, 60, 24),
(354, 60, 30),
(355, 60, 33),
(356, 60, 46),
(357, 61, 2),
(358, 61, 6),
(359, 61, 18),
(360, 61, 30),
(361, 61, 33),
(362, 61, 43),
(363, 62, 3),
(364, 62, 9),
(365, 62, 25),
(366, 62, 27),
(367, 62, 28),
(368, 62, 43),
(369, 63, 2),
(370, 63, 6),
(371, 63, 18),
(372, 63, 32),
(373, 63, 34),
(374, 63, 43),
(375, 64, 1),
(376, 64, 2),
(377, 64, 18),
(378, 64, 27),
(379, 64, 28),
(380, 64, 43),
(381, 65, 1),
(382, 65, 2),
(383, 65, 6),
(384, 65, 24),
(385, 65, 27),
(386, 65, 28),
(387, 65, 43),
(388, 66, 1),
(389, 66, 2),
(390, 66, 5),
(391, 66, 6),
(392, 66, 21),
(393, 66, 27),
(394, 66, 28),
(395, 66, 43),
(396, 67, 1),
(397, 67, 2),
(398, 67, 6),
(399, 67, 21),
(400, 67, 27),
(401, 67, 28),
(402, 67, 43),
(403, 68, 2),
(404, 68, 6),
(405, 68, 21),
(406, 68, 41),
(407, 68, 43),
(408, 69, 1),
(409, 69, 2),
(410, 69, 6),
(411, 69, 21),
(412, 69, 28),
(413, 69, 43),
(414, 70, 1),
(415, 70, 2),
(416, 70, 9),
(417, 70, 18),
(418, 70, 27),
(419, 70, 28),
(420, 70, 43),
(421, 71, 1),
(422, 71, 2),
(423, 71, 6),
(424, 71, 21),
(425, 71, 27),
(426, 71, 28),
(427, 71, 43),
(428, 72, 3),
(429, 72, 6),
(430, 72, 21),
(431, 72, 32),
(432, 72, 41),
(433, 72, 43),
(434, 73, 6),
(435, 73, 24),
(436, 73, 34),
(437, 73, 43),
(438, 74, 1),
(439, 74, 2),
(440, 74, 9),
(441, 74, 21),
(442, 74, 27),
(443, 74, 28),
(444, 74, 45),
(445, 75, 3),
(446, 75, 9),
(447, 75, 21),
(448, 75, 27),
(449, 75, 28),
(450, 75, 43),
(451, 76, 1),
(452, 76, 2),
(453, 76, 5),
(454, 76, 6),
(455, 76, 24),
(456, 76, 34),
(457, 76, 43),
(458, 77, 3),
(459, 77, 17),
(460, 77, 18),
(461, 77, 27),
(462, 77, 28),
(463, 77, 47),
(464, 78, 6),
(465, 78, 9),
(466, 78, 24),
(467, 78, 27),
(468, 78, 28),
(469, 78, 43),
(470, 79, 3),
(471, 79, 21),
(472, 79, 27),
(473, 79, 28),
(474, 79, 45),
(475, 80, 3),
(476, 80, 6),
(477, 80, 21),
(478, 80, 27),
(479, 80, 28),
(480, 80, 45),
(481, 81, 3),
(482, 81, 6),
(483, 81, 9),
(484, 81, 17),
(485, 81, 27),
(486, 81, 29),
(487, 81, 43),
(488, 82, 3),
(489, 82, 17),
(490, 82, 27),
(491, 82, 29),
(492, 82, 45),
(493, 82, 49),
(494, 83, 3),
(495, 83, 17),
(496, 83, 27),
(497, 83, 29),
(498, 83, 45),
(499, 84, 3),
(500, 84, 9),
(501, 84, 18),
(502, 84, 34),
(503, 84, 37),
(504, 84, 43),
(505, 85, 3),
(506, 85, 17),
(507, 85, 18),
(508, 85, 27),
(509, 85, 29),
(510, 85, 45),
(511, 86, 3),
(512, 86, 6),
(513, 86, 17),
(514, 86, 27),
(515, 86, 29),
(516, 86, 45),
(517, 87, 4),
(518, 87, 17),
(519, 87, 18),
(520, 87, 27),
(521, 87, 28),
(522, 87, 43),
(523, 88, 3),
(524, 88, 9),
(525, 88, 17),
(526, 88, 18),
(527, 88, 27),
(528, 88, 28),
(529, 88, 45),
(530, 89, 3),
(531, 89, 6),
(532, 89, 17),
(533, 89, 27),
(534, 89, 29),
(535, 89, 43),
(536, 90, 6),
(537, 90, 21),
(538, 90, 27),
(539, 90, 28),
(540, 90, 43),
(541, 91, 3),
(542, 91, 18),
(543, 91, 30),
(544, 91, 33),
(545, 91, 43),
(546, 92, 1),
(547, 92, 3),
(548, 92, 21),
(549, 92, 41),
(550, 92, 43),
(551, 93, 1),
(552, 93, 3),
(553, 93, 18),
(554, 93, 37),
(555, 93, 43),
(556, 94, 1),
(557, 94, 3),
(558, 94, 5),
(559, 94, 8),
(560, 94, 21),
(561, 94, 36),
(562, 94, 43),
(563, 95, 1),
(564, 95, 2),
(565, 95, 3),
(566, 95, 18),
(567, 95, 30),
(568, 95, 43),
(569, 96, 5),
(570, 96, 8),
(571, 96, 21),
(572, 96, 38),
(573, 96, 43),
(574, 97, 1),
(575, 97, 21),
(576, 97, 34),
(577, 97, 38),
(578, 97, 43),
(579, 98, 1),
(580, 98, 18),
(581, 98, 35),
(582, 98, 43),
(583, 99, 3),
(584, 99, 18),
(585, 99, 41),
(586, 99, 43),
(587, 100, 2),
(588, 100, 3),
(589, 100, 8),
(590, 100, 21),
(591, 100, 30),
(592, 100, 43),
(593, 101, 1),
(594, 101, 5),
(595, 101, 11),
(596, 101, 21),
(597, 101, 27),
(598, 101, 28),
(599, 101, 45),
(600, 102, 3),
(601, 102, 5),
(602, 102, 8),
(603, 102, 21),
(604, 102, 33),
(605, 102, 34),
(606, 102, 39),
(607, 102, 43),
(608, 103, 3),
(609, 103, 5),
(610, 103, 6),
(611, 103, 8),
(612, 103, 21),
(613, 103, 30),
(614, 103, 43),
(615, 104, 5),
(616, 104, 6),
(617, 104, 8),
(618, 104, 18),
(619, 104, 30),
(620, 104, 47),
(621, 105, 3),
(622, 105, 5),
(623, 105, 8),
(624, 105, 21),
(625, 105, 34),
(626, 105, 43),
(627, 106, 5),
(628, 106, 6),
(629, 106, 18),
(630, 106, 30),
(631, 106, 43),
(632, 107, 3),
(633, 107, 5),
(634, 107, 8),
(635, 107, 21),
(636, 107, 27),
(637, 107, 28),
(638, 107, 43),
(639, 108, 1),
(640, 108, 2),
(641, 108, 21),
(642, 108, 27),
(643, 108, 28),
(644, 108, 47),
(645, 109, 6),
(646, 109, 18),
(647, 109, 30),
(648, 109, 39),
(649, 109, 43),
(650, 110, 5),
(651, 110, 8),
(652, 110, 24),
(653, 110, 30),
(654, 110, 39),
(655, 110, 43),
(656, 111, 10),
(657, 111, 21),
(658, 111, 39),
(659, 111, 41),
(660, 111, 43),
(661, 112, 10),
(662, 112, 21),
(663, 112, 27),
(664, 112, 28),
(665, 112, 43),
(666, 113, 2),
(667, 113, 10),
(668, 113, 21),
(669, 113, 33),
(670, 113, 39),
(671, 113, 44),
(672, 114, 8),
(673, 114, 24),
(674, 114, 38),
(675, 114, 43),
(676, 115, 2),
(677, 115, 10),
(678, 115, 21),
(679, 115, 38),
(680, 115, 43),
(681, 116, 7),
(682, 116, 24),
(683, 116, 31),
(684, 116, 38),
(685, 116, 39),
(686, 116, 43),
(687, 117, 10),
(688, 117, 21),
(689, 117, 31),
(690, 117, 38),
(691, 117, 39),
(692, 117, 43),
(693, 118, 5),
(694, 118, 10),
(695, 118, 21),
(696, 118, 30),
(697, 118, 33),
(698, 118, 39),
(699, 118, 43),
(700, 119, 5),
(701, 119, 10),
(702, 119, 21),
(703, 119, 38),
(704, 119, 43),
(705, 120, 10),
(706, 120, 21),
(707, 120, 30),
(708, 120, 39),
(709, 120, 43),
(710, 121, 8),
(711, 121, 24),
(712, 121, 31),
(713, 121, 38),
(714, 121, 39),
(715, 121, 43),
(716, 122, 3),
(717, 122, 21),
(718, 122, 28),
(719, 122, 33),
(720, 122, 43),
(721, 123, 3),
(722, 123, 24),
(723, 123, 27),
(724, 123, 28),
(725, 123, 43),
(726, 124, 3),
(727, 124, 21),
(728, 124, 41),
(729, 124, 43),
(730, 125, 5),
(731, 125, 10),
(732, 125, 24),
(733, 125, 30),
(734, 125, 39),
(735, 125, 45),
(736, 126, 5),
(737, 126, 10),
(738, 126, 24),
(739, 126, 30),
(740, 126, 33),
(741, 126, 39),
(742, 126, 43),
(743, 127, 2),
(744, 127, 10),
(745, 127, 20),
(746, 127, 38),
(747, 127, 43),
(748, 128, 10),
(749, 128, 21),
(750, 128, 39),
(751, 128, 41),
(752, 128, 43),
(753, 129, 3),
(754, 129, 21),
(755, 129, 39),
(756, 129, 41),
(757, 129, 43),
(758, 130, 2),
(759, 130, 8),
(760, 130, 21),
(761, 130, 30),
(762, 130, 33),
(763, 130, 39),
(764, 130, 43),
(765, 131, 10),
(766, 131, 21),
(767, 131, 31),
(768, 131, 43),
(769, 132, 2),
(770, 132, 10),
(771, 132, 21),
(772, 132, 30),
(773, 132, 39),
(774, 132, 43),
(775, 133, 3),
(776, 133, 21),
(777, 133, 28),
(778, 133, 33),
(779, 133, 48),
(780, 134, 2),
(781, 134, 21),
(782, 134, 38),
(783, 134, 48),
(784, 135, 10),
(785, 135, 21),
(786, 135, 30),
(787, 135, 39),
(788, 135, 43),
(789, 136, 2),
(790, 136, 10),
(791, 136, 21),
(792, 136, 38),
(793, 136, 48),
(794, 137, 8),
(795, 137, 24),
(796, 137, 30),
(797, 137, 39),
(798, 137, 43),
(799, 138, 2),
(800, 138, 21),
(801, 138, 38),
(802, 138, 43),
(803, 139, 8),
(804, 139, 24),
(805, 139, 30),
(806, 139, 39),
(807, 139, 47),
(808, 140, 1),
(809, 140, 5),
(810, 140, 18),
(811, 140, 34),
(812, 140, 39),
(813, 140, 48),
(814, 141, 10),
(815, 141, 21),
(816, 141, 27),
(817, 141, 28),
(818, 141, 43),
(819, 142, 2),
(820, 142, 10),
(821, 142, 21),
(822, 142, 30),
(823, 142, 34),
(824, 142, 39),
(825, 142, 45),
(826, 143, 1),
(827, 143, 24),
(828, 143, 27),
(829, 143, 28),
(830, 143, 34),
(831, 143, 39),
(832, 143, 47),
(833, 144, 1),
(834, 144, 6),
(835, 144, 24),
(836, 144, 30),
(837, 144, 33),
(838, 144, 34),
(839, 144, 39),
(840, 144, 43),
(841, 145, 1),
(842, 145, 18),
(843, 145, 39),
(844, 145, 42),
(845, 145, 43),
(846, 146, 2),
(847, 146, 10),
(848, 146, 20),
(849, 146, 27),
(850, 146, 28),
(851, 146, 43),
(852, 147, 5),
(853, 147, 8),
(854, 147, 24),
(855, 147, 38),
(856, 147, 43),
(857, 148, 6),
(858, 148, 8),
(859, 148, 18),
(860, 148, 33),
(861, 148, 39),
(862, 148, 43),
(863, 149, 6),
(864, 149, 18),
(865, 149, 34),
(866, 149, 39),
(867, 149, 45),
(868, 150, 5),
(869, 150, 18),
(870, 150, 30),
(871, 150, 34),
(872, 150, 39),
(873, 150, 43),
(874, 151, 7),
(875, 151, 9),
(876, 151, 17),
(877, 151, 18),
(878, 151, 27),
(879, 151, 28),
(880, 151, 45),
(881, 152, 4),
(882, 152, 17),
(883, 152, 18),
(884, 152, 27),
(885, 152, 28),
(886, 152, 43),
(887, 153, 2),
(888, 153, 6),
(889, 153, 17),
(890, 153, 18),
(891, 153, 27),
(892, 153, 28),
(893, 153, 43),
(894, 154, 2),
(895, 154, 6),
(896, 154, 18),
(897, 154, 27),
(898, 154, 28),
(899, 154, 43),
(900, 155, 8),
(901, 155, 18),
(902, 155, 38),
(903, 155, 43),
(904, 156, 2),
(905, 156, 6),
(906, 156, 21),
(907, 156, 27),
(908, 156, 28),
(909, 156, 43),
(910, 157, 2),
(911, 157, 6),
(912, 157, 17),
(913, 157, 30),
(914, 157, 39),
(915, 157, 41),
(916, 157, 43),
(917, 158, 9),
(918, 158, 18),
(919, 158, 27),
(920, 158, 29),
(921, 158, 43),
(922, 159, 1),
(923, 159, 19),
(924, 159, 41),
(925, 159, 43),
(926, 160, 3),
(927, 160, 18),
(928, 160, 30),
(929, 160, 34),
(930, 160, 39),
(931, 160, 43),
(932, 161, 1),
(933, 161, 5),
(934, 161, 18),
(935, 161, 34),
(936, 161, 36),
(937, 161, 43),
(938, 162, 1),
(939, 162, 5),
(940, 162, 18),
(941, 162, 34),
(942, 162, 36),
(943, 162, 43),
(944, 163, 5),
(945, 163, 21),
(946, 163, 30),
(947, 163, 34),
(948, 163, 39),
(949, 163, 43),
(950, 164, 21),
(951, 164, 30),
(952, 164, 43),
(953, 165, 2),
(954, 165, 21),
(955, 165, 38),
(956, 165, 43),
(957, 166, 5),
(958, 166, 21),
(959, 166, 38),
(960, 166, 43),
(961, 167, 5),
(962, 167, 6),
(963, 167, 21),
(964, 167, 27),
(965, 167, 28),
(966, 167, 43),
(967, 168, 4),
(968, 168, 20),
(969, 168, 38),
(970, 168, 43),
(971, 169, 4),
(972, 169, 21),
(973, 169, 34),
(974, 169, 39),
(975, 169, 41),
(976, 169, 43),
(977, 170, 3),
(978, 170, 21),
(979, 170, 34),
(980, 170, 39),
(981, 170, 41),
(982, 170, 43),
(983, 171, 2),
(984, 171, 6),
(985, 171, 21),
(986, 171, 27),
(987, 171, 28),
(988, 171, 43),
(989, 172, 4),
(990, 172, 20),
(991, 172, 35),
(992, 172, 43),
(993, 173, 7),
(994, 173, 9),
(995, 173, 20),
(996, 173, 30),
(997, 173, 39),
(998, 173, 43),
(999, 174, 21),
(1000, 174, 40),
(1001, 174, 43),
(1002, 175, 4),
(1003, 175, 20),
(1004, 175, 41),
(1005, 175, 43),
(1006, 176, 4),
(1007, 176, 21),
(1008, 176, 27),
(1009, 176, 28),
(1010, 176, 43),
(1011, 177, 2),
(1012, 177, 21),
(1013, 177, 27),
(1014, 177, 28),
(1015, 177, 45),
(1016, 178, 5),
(1017, 178, 6),
(1018, 178, 20),
(1019, 178, 27),
(1020, 178, 28),
(1021, 178, 43),
(1022, 179, 6),
(1023, 179, 20),
(1024, 179, 34),
(1025, 179, 43),
(1026, 180, 5),
(1027, 180, 20),
(1028, 180, 34),
(1029, 180, 36),
(1030, 180, 43),
(1031, 181, 5),
(1032, 181, 8),
(1033, 181, 20),
(1034, 181, 41),
(1035, 181, 43),
(1036, 182, 2),
(1037, 182, 21),
(1038, 182, 41),
(1039, 182, 43),
(1040, 183, 2),
(1041, 183, 21),
(1042, 183, 41),
(1043, 183, 43),
(1044, 184, 8),
(1045, 184, 15),
(1046, 184, 20),
(1047, 184, 41),
(1048, 184, 43),
(1049, 185, 15),
(1050, 185, 25),
(1051, 185, 27),
(1052, 185, 28),
(1053, 185, 43),
(1054, 186, 2),
(1055, 186, 6),
(1056, 186, 25),
(1057, 186, 34),
(1058, 186, 38),
(1059, 186, 43),
(1060, 187, 2),
(1061, 187, 7),
(1062, 187, 18),
(1063, 187, 34),
(1064, 187, 38),
(1065, 187, 39),
(1066, 187, 43),
(1067, 188, 2),
(1068, 188, 21),
(1069, 188, 34),
(1070, 188, 43),
(1071, 189, 2),
(1072, 189, 20),
(1073, 189, 36),
(1074, 189, 43),
(1075, 190, 14),
(1076, 190, 25),
(1077, 190, 27),
(1078, 190, 28),
(1079, 190, 43),
(1080, 191, 5),
(1081, 191, 8),
(1082, 191, 21),
(1083, 191, 38),
(1084, 191, 39),
(1085, 191, 43),
(1086, 192, 5),
(1087, 192, 24),
(1088, 192, 30),
(1089, 192, 39),
(1090, 192, 43),
(1091, 193, 5),
(1092, 193, 24),
(1093, 193, 27),
(1094, 193, 28),
(1095, 193, 34),
(1096, 193, 43),
(1097, 194, 5),
(1098, 194, 21),
(1099, 194, 31),
(1100, 194, 39),
(1101, 194, 43),
(1102, 195, 5),
(1103, 195, 8),
(1104, 195, 24),
(1105, 195, 33),
(1106, 195, 34),
(1107, 195, 39),
(1108, 195, 43),
(1109, 196, 5),
(1110, 196, 8),
(1111, 196, 24),
(1112, 196, 27),
(1113, 196, 34),
(1114, 196, 39),
(1115, 196, 43),
(1116, 197, 5),
(1117, 197, 18),
(1118, 197, 34),
(1119, 197, 39),
(1120, 197, 43),
(1121, 198, 5),
(1122, 198, 8),
(1123, 198, 21),
(1124, 198, 33),
(1125, 198, 34),
(1126, 198, 39),
(1127, 198, 43),
(1128, 199, 5),
(1129, 199, 8),
(1130, 199, 24),
(1131, 199, 33),
(1132, 199, 39),
(1133, 199, 43),
(1134, 200, 5),
(1135, 200, 8),
(1136, 200, 20),
(1137, 200, 35),
(1138, 200, 43),
(1139, 201, 5),
(1140, 201, 8),
(1141, 201, 21),
(1142, 201, 34),
(1143, 201, 43),
(1144, 202, 5),
(1145, 202, 27),
(1146, 202, 29),
(1147, 202, 43),
(1148, 203, 5),
(1149, 203, 8),
(1150, 203, 25),
(1151, 203, 27),
(1152, 203, 28),
(1153, 203, 43),
(1154, 204, 5),
(1155, 204, 8),
(1156, 204, 21),
(1157, 204, 36),
(1158, 204, 43),
(1159, 205, 1),
(1160, 205, 5),
(1161, 205, 21),
(1162, 205, 35),
(1163, 205, 43),
(1164, 206, 5),
(1165, 206, 8),
(1166, 206, 21),
(1167, 206, 30),
(1168, 206, 38),
(1169, 206, 43),
(1170, 207, 5),
(1171, 207, 8),
(1172, 207, 20),
(1173, 207, 32),
(1174, 207, 43),
(1175, 208, 5),
(1176, 208, 8),
(1177, 208, 21),
(1178, 208, 30),
(1179, 208, 43),
(1180, 209, 5),
(1181, 209, 8),
(1182, 209, 21),
(1183, 209, 30),
(1184, 209, 39),
(1185, 209, 43);

-- --------------------------------------------------------

--
-- Table structure for table `lnk_story_to_images`
--

CREATE TABLE `lnk_story_to_images` (
  `sti_id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lnk_story_to_images`
--

INSERT INTO `lnk_story_to_images` (`sti_id`, `story_id`, `image_id`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lnk_user_to_favorites`
--

CREATE TABLE `lnk_user_to_favorites` (
  `utf_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_brands`
--

CREATE TABLE `ref_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_brands`
--

INSERT INTO `ref_brands` (`brand_id`, `brand_name`, `image_id`, `is_active`) VALUES
(1, 'Ashley & Justin Bride', NULL, 'true'),
(2, 'Cristiano Lucci', NULL, 'true'),
(3, 'Impression Bridal', NULL, 'true'),
(4, 'Simone Carvalli', NULL, 'true'),
(5, 'Victor Harper', NULL, 'true'),
(6, 'Ashley & Justin Bridesmaids', NULL, 'true'),
(7, 'Zoey Grey', NULL, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_catagory`
--

CREATE TABLE `ref_catagory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_catagory`
--

INSERT INTO `ref_catagory` (`cat_id`, `cat_name`, `image_id`, `is_active`) VALUES
(1, 'Fabric', NULL, 'true'),
(2, 'Silhoutte', NULL, 'true'),
(3, 'Neckline', NULL, 'true'),
(4, 'Waistline', NULL, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_collection`
--

CREATE TABLE `ref_collection` (
  `collection_id` int(11) NOT NULL,
  `collection_name` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_collection`
--

INSERT INTO `ref_collection` (`collection_id`, `collection_name`, `image_id`, `is_active`) VALUES
(1, 'Wedding Gowns', 7, 'true'),
(2, 'Bridesmaids Dresses', 8, 'true'),
(3, 'Prom/Special Occasion', 9, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pages`
--

CREATE TABLE `ref_pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pages`
--

INSERT INTO `ref_pages` (`page_id`, `page_name`) VALUES
(1, 'about_us');

-- --------------------------------------------------------

--
-- Table structure for table `ref_seasons`
--

CREATE TABLE `ref_seasons` (
  `season_id` int(11) NOT NULL,
  `season` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_seasons`
--

INSERT INTO `ref_seasons` (`season_id`, `season`, `image_id`, `is_active`) VALUES
(1, 'Fall 2016', NULL, 'true'),
(3, 'Spring 2016', NULL, 'true'),
(4, 'Fall 2017', NULL, 'true'),
(5, 'Spring 2017', NULL, 'true'),
(6, 'Fall 2018', NULL, 'true'),
(7, 'Spring 2018', NULL, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `ref_subcat_to_cat`
--

CREATE TABLE `ref_subcat_to_cat` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_subcat_to_cat`
--

INSERT INTO `ref_subcat_to_cat` (`sub_cat_id`, `sub_cat_name`, `cat_id`, `image_id`, `is_active`) VALUES
(1, 'Chiffon', 1, NULL, 'true'),
(2, 'Lace', 1, NULL, 'true'),
(3, 'Satin', 1, NULL, 'true'),
(4, 'Mikado', 1, NULL, 'true'),
(5, 'Sequins', 1, NULL, 'true'),
(6, 'Tulle', 1, NULL, 'true'),
(7, 'Velvet', 1, NULL, 'true'),
(8, 'Jersey', 1, NULL, 'true'),
(9, 'Organza', 1, NULL, 'true'),
(10, 'Ponte', 1, NULL, 'true'),
(11, 'Pongee', 1, NULL, 'true'),
(12, 'Silk Cepe', 1, NULL, 'true'),
(13, 'Taffeta', 1, NULL, 'true'),
(14, 'Denim', 1, NULL, 'true'),
(15, 'Vinyl', 1, NULL, 'true'),
(16, 'Georgette', 1, NULL, 'true'),
(17, 'Ballgown', 2, NULL, 'true'),
(18, 'A Line', 2, NULL, 'true'),
(19, 'Modified A Line', 2, NULL, 'true'),
(20, 'Two-Piece', 2, NULL, 'true'),
(21, 'Fit & Flare', 2, NULL, 'true'),
(22, 'Mermaid', 2, NULL, 'true'),
(23, 'Layered', 2, NULL, 'true'),
(24, 'Sheath', 2, NULL, 'true'),
(25, 'High-Low', 2, NULL, 'true'),
(26, 'Short', 2, NULL, 'true'),
(27, 'Strapless', 3, NULL, 'true'),
(28, 'Sweetheart', 3, NULL, 'true'),
(29, 'Modified Sweetheart', 3, NULL, 'true'),
(30, 'V-Neck', 3, NULL, 'true'),
(31, 'Keyhole', 3, NULL, 'true'),
(32, 'Scoop', 3, NULL, 'true'),
(33, 'Straps', 3, NULL, 'true'),
(34, 'Illusion', 3, NULL, 'true'),
(35, 'Jewel', 3, NULL, 'true'),
(36, 'Bateau', 3, NULL, 'true'),
(37, 'High', 3, NULL, 'true'),
(38, 'Halter', 3, NULL, 'true'),
(39, 'Plunging', 3, NULL, 'true'),
(40, 'Criss-Cross', 3, NULL, 'true'),
(41, 'Off-Shoulder', 3, NULL, 'true'),
(42, 'One-Shoulder', 3, NULL, 'true'),
(43, 'Natural', 4, NULL, 'true'),
(44, 'Empire', 4, NULL, 'true'),
(45, 'Dropped', 4, NULL, 'true'),
(46, 'Basque', 4, NULL, 'true'),
(47, 'Ruched', 4, NULL, 'true'),
(48, 'Inverted V', 4, NULL, 'true'),
(49, 'Asymmetrical', 4, NULL, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `document_id` int(11) NOT NULL,
  `doc_path` varchar(255) NOT NULL,
  `is_local` enum('true','false') NOT NULL DEFAULT 'false',
  `doc_desc` text,
  `is_active` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_documents`
--

INSERT INTO `tbl_documents` (`document_id`, `doc_path`, `is_local`, `doc_desc`, `is_active`) VALUES
(1, 'v1512026641/ogql6ltaytgzuduldp8o.jpg', 'false', NULL, 'true'),
(2, 'v1512031294/vsvtoo1zwqvpiyy9tdle.jpg', 'false', NULL, 'true'),
(3, 'v1512032724/am0rsxon8snttduzikyd.jpg', 'false', NULL, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insta`
--

CREATE TABLE `tbl_insta` (
  `insta_link_id` int(11) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `link_desc` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `added_time` datetime NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_insta`
--

INSERT INTO `tbl_insta` (`insta_link_id`, `short_desc`, `link_desc`, `image`, `added_time`, `is_active`) VALUES
(2, 'Lovly lady', 'https://www.instagram.com/p/BMmnZ_oDYDw/', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/15034924_670977999746591_7336199355868643328_n.jpg', '0000-00-00 00:00:00', 'true'),
(3, 'lovly group', 'https://www.instagram.com/p/BZZElQQhOdk/', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/21909355_213132122557197_6550362525592977408_n.jpg', '0000-00-00 00:00:00', 'true'),
(4, 'long1', 'https://www.instagram.com/p/BZi92xZBg_z', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/22070909_135872743814745_5237545225416605696_n.jpg', '0000-00-00 00:00:00', 'true'),
(5, '3', 'https://www.instagram.com/p/BZuMGCMh471/', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/22157206_493141997718267_187726273114537984_n.jpg', '0000-00-00 00:00:00', 'true'),
(6, '4', 'https://www.instagram.com/p/BZi-cXrhCcA/', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/21980170_484475635254450_3945516305687248896_n.jpg', '0000-00-00 00:00:00', 'true'),
(7, 'long2', 'https://www.instagram.com/p/BX1WZZpBd2y/', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/20837656_126160994676856_5048131412406829056_n.jpg', '0000-00-00 00:00:00', 'true'),
(8, '8', 'https://www.instagram.com/p/BbCjVynhQkI/?tagged=impressionbridalstore', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/23279948_881743161991333_9031985377862221824_n.jpg', '0000-00-00 00:00:00', 'true'),
(9, '5', 'https://www.instagram.com/p/Ba9S9ejB69F', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/22860840_1974175379517583_3313506284623364096_n.jpg', '0000-00-00 00:00:00', 'true'),
(10, '6', 'https://www.instagram.com/p/Ba2HjzJhuh2/', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/22857854_1761034503941327_773638423075356672_n.jpg', '0000-00-00 00:00:00', 'true'),
(11, 'sweet', 'https://www.instagram.com/p/BaIPo8Lh8So/?taken-by=impressionbridalstore', 'https://instagram.fpnq3-1.fna.fbcdn.net/t51.2885-15/e35/22344832_893670534130473_2860007680045481984_n.jpg', '0000-00-00 00:00:00', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `job_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_desc` text NOT NULL,
  `job_responsibility` text NOT NULL,
  `job_requirements` text NOT NULL,
  `job_benifit` text NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_id`, `store_id`, `job_title`, `job_desc`, `job_responsibility`, `job_requirements`, `job_benifit`, `is_active`) VALUES
(1, 2, 'BRIDAL RETAIL SALES MANAGER', '<p>We are seeking a fashion-forward and highly motivated Retail Store Manager to successfully coordinate a fast-paced, detail-oriented, and high-energy commission-based sales environment. As a Bridal Retail Store Manager with Impression Bridal, you will oversee all sales functions and operations to help each employee, and the store overall, meet sales goals.</p>\r\n                              <p>Additional tasks of the Bridal Retail Store Manager include:<br>\r\n                                - Ensuring that each customer’s experience is optimal<br>\r\n                                - Successfully manage a high paced, detail oriented, high-energy commission environment<br>\r\n                                - Manage and oversee all selling functions and operations<br>\r\n                                - Handling sensitive and emotional situations with tact and professionalism\r\n                              </p>', '<p>As a Bridal Retail Store Manager with Impression Bridal, you will recruit, train, coach, and retain high-caliber sales professionals.</p>\r\n                            <p>Additional responsibilities of the Bridal Retail Store Manager include:<br>\r\n                              - Training employees on how to handle difficult clients and complicated sales<br>\r\n                              - Examining merchandise to ensure that it is correctly priced and displayed<br>\r\n                              - Helping to maintain the cleanliness & attractive appearance of the sales floor, dressing rooms, & other areas<br>\r\n\r\n                            </p>', '<p>You must possess excellent interpersonal communication skills, a knack for organizing and a strong sense of bridal fashion and fashion in general. Our ideal Bridal Retail Store Manager has a real gift for motivating people and is flexible to meet the needs of our business.</p>\r\n                              <p>Additional requirements for the Bridal Retail Store Manager include:<br>\r\n                                - Minimum 2 years experience in a high-volume and fast-paced <br>\r\n                                - Flexible schedule and ability to work weekends<br>\r\n                                - Reliable transportation<br>\r\n                                - Ability to stand on your feet for long periods of time<br>\r\n                                - Bridal retail sales; styling or consulting experience a plus\r\n                              </p>', '<p>At Impression Bridal, we value and respect our employees by providing a highly rewarding and team-oriented work environment.</p>\r\n                            <p>Benefits for the Bridal Retail Store Manger include:<br>\r\n                              - Health, dental, and vision insurance<br>\r\n                              - Paid vacation, sick leave, and holiday time<br>\r\n                              - Generous employee discount<br>\r\n                              - Profit Sharing<br>\r\n                              - Management bonus plan rewards based on performance\r\n                            </p>', 'true'),
(3, 4, 'Sales Girl', 'asda sd', 'asd asd ', 'as dsa asd', ' asd asd', 'true'),
(4, 2, 'test job', 'We are seeking a fashion-forward and highly motivated Retail Store Manager to successfully coordinate a fast-paced, detail-oriented, and high-energy commission-based sales environment. As a Bridal Retail Store Manager with Impression Bridal, you will oversee all sales functions and operations to help each employee, and the store overall, meet sales goals.\r\n\r\nAdditional tasks of the Bridal Retail Store Manager include:\r\n- Ensuring that each customer’s experience is optimal\r\n- Successfully manage a high paced, detail oriented, high-energy commission environment\r\n- Manage and oversee all selling functions and operations\r\n- Handling sensitive and emotional situations with tact and professionalism', 'You must possess excellent interpersonal communication skills, a knack for organizing and a strong sense of bridal fashion and fashion in general. Our ideal Bridal Retail Store Manager has a real gift for motivating people and is flexible to meet the needs of our business.\r\n\r\nAdditional requirements for the Bridal Retail Store Manager include:\r\n- Minimum 2 years experience in a high-volume and fast-paced\r\n- Flexible schedule and ability to work weekends\r\n- Reliable transportation\r\n- Ability to stand on your feet for long periods of time<br>- Bridal retail sales; styling or consulting experience a plus', 'You must possess excellent interpersonal communication skills, a knack for organizing and a strong sense of bridal fashion and fashion in general. Our ideal Bridal Retail Store Manager has a real gift for motivating people and is flexible to meet the needs of our business.\r\n\r\nAdditional requirements for the Bridal Retail Store Manager include:\r\n- Minimum 2 years experience in a high-volume and fast-paced \r\n- Flexible schedule and ability to work weekends\r\n- Reliable transportation\r\n- Ability to stand on your feet for long periods of time\r\n- Bridal retail sales; styling or consulting experience a plus', 'At Impression Bridal, we value and respect our employees by providing a highly rewarding and team-oriented work environment.\r\n\r\nBenefits for the Bridal Retail Store Manger include:\r\n- Health, dental, and vision insurance\r\n- Paid vacation, sick leave, and holiday time\r\n- Generous employee discount\r\n- Profit Sharing\r\n- Management bonus plan rewards based on performance', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page_sections`
--

CREATE TABLE `tbl_page_sections` (
  `ps_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page_sections`
--

INSERT INTO `tbl_page_sections` (`ps_id`, `page_id`, `section_name`, `section_desc`) VALUES
(1, 1, 'About_us_Title', 'Wedding dresses<br><span>- the evolution</span>'),
(2, 1, 'Section-1', 'To get a sense of the present, sometimes it\'s best to go back to the past. Flashback to 1986- when, in my 20\'s, I discovered a keen interest for bridal fashion and founded Impression.</p>\r\n          <p>Recognizing an unfulfilled need in the bridal industry, I made it my personal mission to build a brand that provides brides with quality gowns that were fashionable and luxurious, yet affordable. Tough challenges and obstacles befell me at every corner, and although the chances initially seemed slim, nothing could stop my passionate drive to continually improve our services and enhance our products. We pushed forward relentlessly and continue to expand today.'),
(3, 1, 'Section-2', '<p>Our team of passionate individuals are knowledgeable in all things bridal, & are dedicated to working closely with you to ensure that your experience is memorable, personal, & simply fun! At the Impression Bridal Store, apart from the exquisite decor & spacious dressing rooms, you will find a large variety of gowns made for every kind of bride with every kind of budget!</p>\r\n          <p>\r\n          Our assortment of beautiful gowns also features the work of industry acclaimed designer brands, including Simone Carvalli, Yumi Katsura, Victor Harper, Cristiano Lucci, Disney Forever Enchanted, Royal Ball and many more! Come make a visit to one of our lovely stores, & let our expert stylists have the pleasure of helping you find the wedding dress of your dreams!<br><br>\r\nNick Yeh<br>\r\nPresident And CEO<p>'),
(4, 1, 'Quote', 'Impression Bridal Store presents a <span>variety of designs</span>, from bridal wear, bridesmaid dresses, prom dresses, quinceanera gowns, to special occassion dresses.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_desc` text,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `collection_id`, `brand_id`, `season_id`, `store_id`, `product_name`, `product_desc`, `is_active`) VALUES
(1, 1, 1, 7, NULL, '10488', NULL, 'true'),
(2, 1, 1, 7, NULL, '10489', NULL, 'true'),
(3, 1, 1, 7, NULL, '10490', NULL, 'true'),
(4, 1, 1, 7, NULL, '10491', NULL, 'true'),
(5, 1, 1, 7, NULL, '10495', NULL, 'true'),
(6, 1, 1, 7, NULL, '10496', NULL, 'true'),
(7, 1, 1, 7, NULL, '10497', NULL, 'true'),
(8, 1, 1, 7, NULL, '10498', NULL, 'true'),
(9, 1, 1, 7, NULL, '10499', NULL, 'true'),
(10, 1, 1, 7, NULL, '10500', NULL, 'true'),
(11, 1, 1, 7, NULL, '10501', NULL, 'true'),
(12, 1, 1, 7, NULL, '10502', NULL, 'true'),
(13, 1, 1, 7, NULL, '10503', NULL, 'true'),
(14, 1, 1, 7, NULL, '10504', NULL, 'true'),
(15, 1, 1, 7, NULL, '10505', NULL, 'true'),
(16, 1, 1, 7, NULL, '10506', NULL, 'true'),
(17, 1, 1, 7, NULL, '10507', NULL, 'true'),
(18, 1, 1, 7, NULL, '10508', NULL, 'true'),
(19, 1, 1, 7, NULL, '10509', NULL, 'true'),
(20, 1, 1, 7, NULL, '10511', NULL, 'true'),
(21, 1, 1, 7, NULL, '10512', NULL, 'true'),
(22, 1, 1, 7, NULL, '10517', NULL, 'true'),
(23, 1, 1, 7, NULL, '10518', NULL, 'true'),
(24, 1, 1, 7, NULL, '10521', NULL, 'true'),
(25, 1, 1, 7, NULL, '10522', NULL, 'true'),
(26, 1, 1, 7, NULL, '10523', NULL, 'true'),
(27, 1, 1, 7, NULL, '10524', NULL, 'true'),
(28, 1, 1, 7, NULL, '10526', NULL, 'true'),
(29, 1, 1, 7, NULL, '10535', NULL, 'true'),
(30, 1, 2, 7, NULL, '13091', NULL, 'true'),
(31, 1, 2, 7, NULL, '13092', NULL, 'true'),
(32, 1, 2, 7, NULL, '13094', NULL, 'true'),
(33, 1, 2, 7, NULL, '13095', NULL, 'true'),
(34, 1, 2, 7, NULL, '13099', NULL, 'true'),
(35, 1, 2, 7, NULL, '13100', NULL, 'true'),
(36, 1, 2, 7, NULL, '13101', NULL, 'true'),
(37, 1, 2, 7, NULL, '13104', NULL, 'true'),
(38, 1, 2, 7, NULL, '13106', NULL, 'true'),
(39, 1, 2, 7, NULL, '13108', NULL, 'true'),
(40, 1, 2, 7, NULL, '13109', NULL, 'true'),
(41, 1, 2, 7, NULL, '13110', NULL, 'true'),
(42, 1, 2, 7, NULL, '13111', NULL, 'true'),
(43, 1, 2, 7, NULL, '13112', NULL, 'true'),
(44, 1, 2, 7, NULL, '13113', NULL, 'true'),
(45, 1, 2, 7, NULL, '13114', NULL, 'true'),
(46, 1, 2, 7, NULL, '13115', NULL, 'true'),
(47, 1, 2, 7, NULL, '13116', NULL, 'true'),
(48, 1, 2, 7, NULL, '13117', NULL, 'true'),
(49, 1, 2, 7, NULL, '13118', NULL, 'true'),
(50, 1, 3, 7, NULL, '10371', NULL, 'true'),
(51, 1, 3, 7, NULL, '10372', NULL, 'true'),
(52, 1, 3, 7, NULL, '10373', NULL, 'true'),
(53, 1, 3, 7, NULL, '10374', NULL, 'true'),
(54, 1, 3, 7, NULL, '10375', NULL, 'true'),
(55, 1, 3, 7, NULL, '10376', NULL, 'true'),
(56, 1, 3, 7, NULL, '10379', NULL, 'true'),
(57, 1, 3, 7, NULL, '10383', NULL, 'true'),
(58, 1, 3, 7, NULL, '10388', NULL, 'true'),
(59, 1, 3, 7, NULL, '10390', NULL, 'true'),
(60, 1, 3, 7, NULL, '10391', NULL, 'true'),
(61, 1, 3, 7, NULL, '10392', NULL, 'true'),
(62, 1, 3, 7, NULL, '10393', NULL, 'true'),
(63, 1, 3, 7, NULL, '10399', NULL, 'true'),
(64, 1, 3, 7, NULL, '10401', NULL, 'true'),
(65, 1, 4, 7, NULL, '90341', NULL, 'true'),
(66, 1, 4, 7, NULL, '90342', NULL, 'true'),
(67, 1, 4, 7, NULL, '90343', NULL, 'true'),
(68, 1, 4, 7, NULL, '90344', NULL, 'true'),
(69, 1, 4, 7, NULL, '90345', NULL, 'true'),
(70, 1, 4, 7, NULL, '90346', NULL, 'true'),
(71, 1, 4, 7, NULL, '90348', NULL, 'true'),
(72, 1, 4, 7, NULL, '90349', NULL, 'true'),
(73, 1, 4, 7, NULL, '90350', NULL, 'true'),
(74, 1, 4, 7, NULL, '90351', NULL, 'true'),
(75, 1, 4, 7, NULL, '90352', NULL, 'true'),
(76, 1, 4, 7, NULL, '90353', NULL, 'true'),
(77, 1, 5, 7, NULL, 'Ansatasia', NULL, 'true'),
(78, 1, 5, 7, NULL, 'Blanche', NULL, 'true'),
(79, 1, 5, 7, NULL, 'Cora', NULL, 'true'),
(80, 1, 5, 7, NULL, 'Dolores', NULL, 'true'),
(81, 1, 5, 7, NULL, 'Eugenie', NULL, 'true'),
(82, 1, 5, 7, NULL, 'Lilliana', NULL, 'true'),
(83, 1, 5, 7, NULL, 'Madison', NULL, 'true'),
(84, 1, 5, 7, NULL, 'Maeve', NULL, 'true'),
(85, 1, 5, 7, NULL, 'Martine', NULL, 'true'),
(86, 1, 5, 7, NULL, 'Matilda', NULL, 'true'),
(87, 1, 5, 7, NULL, 'Millie', NULL, 'true'),
(88, 1, 5, 7, NULL, 'Petra', NULL, 'true'),
(89, 1, 5, 7, NULL, 'Phillipa', NULL, 'true'),
(90, 1, 5, 7, NULL, 'Quinn', NULL, 'true'),
(91, 2, 6, 7, NULL, '20321', NULL, 'true'),
(92, 2, 6, 7, NULL, '20322', NULL, 'true'),
(93, 2, 6, 7, NULL, '20323', NULL, 'true'),
(94, 2, 6, 7, NULL, '20324', NULL, 'true'),
(95, 2, 6, 7, NULL, '20325', NULL, 'true'),
(96, 2, 6, 7, NULL, '20326', NULL, 'true'),
(97, 2, 6, 7, NULL, '20327', NULL, 'true'),
(98, 2, 6, 7, NULL, '20328', NULL, 'true'),
(99, 2, 6, 7, NULL, '20329', NULL, 'true'),
(100, 2, 6, 7, NULL, '20330', NULL, 'true'),
(101, 2, 6, 7, NULL, '20331', NULL, 'true'),
(102, 2, 6, 7, NULL, '20332', NULL, 'true'),
(103, 2, 6, 7, NULL, '20333', NULL, 'true'),
(104, 2, 6, 7, NULL, '20334', NULL, 'true'),
(105, 2, 6, 7, NULL, '20335', NULL, 'true'),
(106, 2, 6, 7, NULL, '20336', NULL, 'true'),
(107, 2, 6, 7, NULL, '20337', NULL, 'true'),
(108, 2, 6, 7, NULL, '20338', NULL, 'true'),
(109, 3, 7, 7, NULL, '31120', NULL, 'true'),
(110, 3, 7, 7, NULL, '31121', NULL, 'true'),
(111, 3, 7, 7, NULL, '31122', NULL, 'true'),
(112, 3, 7, 7, NULL, '31123', NULL, 'true'),
(113, 3, 7, 7, NULL, '31124', NULL, 'true'),
(114, 3, 7, 7, NULL, '31125', NULL, 'true'),
(115, 3, 7, 7, NULL, '31126', NULL, 'true'),
(116, 3, 7, 7, NULL, '31127', NULL, 'true'),
(117, 3, 7, 7, NULL, '31128', NULL, 'true'),
(118, 3, 7, 7, NULL, '31129', NULL, 'true'),
(119, 3, 7, 7, NULL, '31130', NULL, 'true'),
(120, 3, 7, 7, NULL, '31131', NULL, 'true'),
(121, 3, 7, 7, NULL, '31132', NULL, 'true'),
(122, 3, 7, 7, NULL, '31133', NULL, 'true'),
(123, 3, 7, 7, NULL, '31134', NULL, 'true'),
(124, 3, 7, 7, NULL, '31135', NULL, 'true'),
(125, 3, 7, 7, NULL, '31137', NULL, 'true'),
(126, 3, 7, 7, NULL, '31138', NULL, 'true'),
(127, 3, 7, 7, NULL, '31139', NULL, 'true'),
(128, 3, 7, 7, NULL, '31140', NULL, 'true'),
(129, 3, 7, 7, NULL, '31141', NULL, 'true'),
(130, 3, 7, 7, NULL, '31142', NULL, 'true'),
(131, 3, 7, 7, NULL, '31144', NULL, 'true'),
(132, 3, 7, 7, NULL, '31145', NULL, 'true'),
(133, 3, 7, 7, NULL, '31146', NULL, 'true'),
(134, 3, 7, 7, NULL, '31147', NULL, 'true'),
(135, 3, 7, 7, NULL, '31149', NULL, 'true'),
(136, 3, 7, 7, NULL, '31150', NULL, 'true'),
(137, 3, 7, 7, NULL, '31152', NULL, 'true'),
(138, 3, 7, 7, NULL, '31154', NULL, 'true'),
(139, 3, 7, 7, NULL, '31161', NULL, 'true'),
(140, 3, 7, 7, NULL, '31162', NULL, 'true'),
(141, 3, 7, 7, NULL, '31163', NULL, 'true'),
(142, 3, 7, 7, NULL, '31164', NULL, 'true'),
(143, 3, 7, 7, NULL, '31168', NULL, 'true'),
(144, 3, 7, 7, NULL, '31169', NULL, 'true'),
(145, 3, 7, 7, NULL, '31170', NULL, 'true'),
(146, 3, 7, 7, NULL, '31171', NULL, 'true'),
(147, 3, 7, 7, NULL, '31172', NULL, 'true'),
(148, 3, 7, 7, NULL, '31173', NULL, 'true'),
(149, 3, 7, 7, NULL, '31174', NULL, 'true'),
(150, 3, 7, 7, NULL, '31175', NULL, 'true'),
(151, 3, 7, 7, NULL, '31176', NULL, 'true'),
(152, 3, 7, 7, NULL, '31177', NULL, 'true'),
(153, 3, 7, 7, NULL, '31178', NULL, 'true'),
(154, 3, 7, 7, NULL, '31179', NULL, 'true'),
(155, 3, 7, 7, NULL, '31180', NULL, 'true'),
(156, 3, 7, 7, NULL, '31181', NULL, 'true'),
(157, 3, 7, 7, NULL, '31182', NULL, 'true'),
(158, 3, 7, 7, NULL, '31183', NULL, 'true'),
(159, 3, 7, 7, NULL, '31185', NULL, 'true'),
(160, 3, 7, 7, NULL, '31186', NULL, 'true'),
(161, 3, 7, 7, NULL, '31188', NULL, 'true'),
(162, 3, 7, 7, NULL, '31189', NULL, 'true'),
(163, 3, 7, 7, NULL, '31190', NULL, 'true'),
(164, 3, 7, 7, NULL, '31191', NULL, 'true'),
(165, 3, 7, 7, NULL, '31192', NULL, 'true'),
(166, 3, 7, 7, NULL, '31193', NULL, 'true'),
(167, 3, 7, 7, NULL, '31194', NULL, 'true'),
(168, 3, 7, 7, NULL, '31195', NULL, 'true'),
(169, 3, 7, 7, NULL, '31196', NULL, 'true'),
(170, 3, 7, 7, NULL, '31197', NULL, 'true'),
(171, 3, 7, 7, NULL, '31199', NULL, 'true'),
(172, 3, 7, 7, NULL, '31200', NULL, 'true'),
(173, 3, 7, 7, NULL, '31201', NULL, 'true'),
(174, 3, 7, 7, NULL, '31203', NULL, 'true'),
(175, 3, 7, 7, NULL, '31205', NULL, 'true'),
(176, 3, 7, 7, NULL, '31206', NULL, 'true'),
(177, 3, 7, 7, NULL, '31208', NULL, 'true'),
(178, 3, 7, 7, NULL, '31211', NULL, 'true'),
(179, 3, 7, 7, NULL, '31212', NULL, 'true'),
(180, 3, 7, 7, NULL, '31214', NULL, 'true'),
(181, 3, 7, 7, NULL, '31218', NULL, 'true'),
(182, 3, 7, 7, NULL, '31219', NULL, 'true'),
(183, 3, 7, 7, NULL, '31220', NULL, 'true'),
(184, 3, 7, 7, NULL, '31221', NULL, 'true'),
(185, 3, 7, 7, NULL, '31222', NULL, 'true'),
(186, 3, 7, 7, NULL, '31229', NULL, 'true'),
(187, 3, 7, 7, NULL, '31230', NULL, 'true'),
(188, 3, 7, 7, NULL, '31231', NULL, 'true'),
(189, 3, 7, 7, NULL, '31232', NULL, 'true'),
(190, 3, 7, 7, NULL, '31234', NULL, 'true'),
(191, 3, 7, 7, NULL, '31240', NULL, 'true'),
(192, 3, 7, 7, NULL, '31241', NULL, 'true'),
(193, 3, 7, 7, NULL, '31247', NULL, 'true'),
(194, 3, 7, 7, NULL, '31248', NULL, 'true'),
(195, 3, 7, 7, NULL, '31250', NULL, 'true'),
(196, 3, 7, 7, NULL, '31251', NULL, 'true'),
(197, 3, 7, 7, NULL, '31252', NULL, 'true'),
(198, 3, 7, 7, NULL, '31253', NULL, 'true'),
(199, 3, 7, 7, NULL, '31257', NULL, 'true'),
(200, 3, 7, 7, NULL, '31258', NULL, 'true'),
(201, 3, 7, 7, NULL, '31261', NULL, 'true'),
(202, 3, 7, 7, NULL, '31263', NULL, 'true'),
(203, 3, 7, 7, NULL, '31265', NULL, 'true'),
(204, 3, 7, 7, NULL, '31266', NULL, 'true'),
(205, 3, 7, 7, NULL, '31268', NULL, 'true'),
(206, 3, 7, 7, NULL, '31270', NULL, 'true'),
(207, 3, 7, 7, NULL, '31271', NULL, 'true'),
(208, 3, 7, 7, NULL, '31272', NULL, 'true'),
(209, 3, 7, 7, NULL, '31273', NULL, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resent_links`
--

CREATE TABLE `tbl_resent_links` (
  `link_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `lnk` varchar(80) NOT NULL,
  `reg_time` datetime NOT NULL,
  `is_expired` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stores`
--

CREATE TABLE `tbl_stores` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `store_desc` text NOT NULL,
  `virtual_tour` text NOT NULL,
  `google_map` text NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stores`
--

INSERT INTO `tbl_stores` (`store_id`, `store_name`, `email_id`, `address`, `city`, `state`, `pincode`, `contact_number`, `store_desc`, `virtual_tour`, `google_map`, `is_active`) VALUES
(1, 'HOUSTON GALLERIA', 'galleria@impressionbridalstore.com', '3005 West Loop South Suite #100', 'Houston', 'TX', '77027', '(713) 623-4696', 'MONDAY TO FRIDAY : 11am to 8pm\r\nSATURDAY : 10am to 6pm\r\nSUNDAY : 12nn to 6pm', 'https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2sus!4v1466607369022!6m8!1m7!1s3upLnYGGGEEAAAQvO-WPoQ!2m2!1d29.73545534327307!2d-95.45865118163704!3f252!4f0!5f0.7820865974627469', 'http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Impression+Bridal+Retail+Store,+West+Loop+South+Freeway,+Houston,+TX&amp;aq=0&amp;oq=impression+brid&amp;sll=29.73602,-95.458723&amp;sspn=0.007667,0.016544&amp;g=3005+West+Loop+South+suite+%23100,+Houston,+TX.+77027&amp;ie=UTF8&amp;hq=Impression+Bridal+Retail+Store,+West+Loop+South+Freeway,+Houston,+TX&amp;t=m&amp;ll=29.747835,-95.460634&amp;spn=0.026082,0.038624&amp;z=14&amp;iwloc=A&amp;output=embed', 'true'),
(2, 'HOUSTON BAYBROOK', 'baybrook@impressionbridalstore.com', '18980 Gulf Freeway Suite #A', 'Friendswood', 'TX', '77546', '(281) 486-4696', 'MONDAY TO FRIDAY : 11am to 8pm\r\nSATURDAY : 10am to 6pm\r\nSUNDAY : 12nn to 6pm', 'https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2sus!4v1463068794695!6m8!1m7!1sCjHUznFGxxgAAAQvO0ixAw!2m2!1d29.545220501521367!2d-95.14748647947705!3f51.63533641683535!4f7.6865511534910524!5f0.4000000000000002', 'http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=18980+Gulf+Freeway+suite+%23A+Friendswood,+TX.+77546+impression&amp;aq=&amp;sll=29.545184,-95.14742&amp;sspn=0.015363,0.033023&amp;gl=us&amp;g=18980+Gulf+Fwy,+Friendswood,+TX+77546&amp;ie=UTF8&amp;t=m&amp;cid=9067377159204863829&amp;hq=18980+Gulf+Freeway+suite+%23A+Friendswood,+TX.+77546+impression&amp;hnear=&amp;ll=29.558302,-95.146236&amp;spn=0.026131,0.038624&amp;z=14&amp;iwloc=A&amp;output=embed', 'true'),
(3, 'SAN ANTONIO', 'sa@impressionbridalstore.com', '602 NW Loop 410 Ste. 107', 'San Antonio', 'TX', '78216', '(210) 468-1818', 'MONDAY TO FRIDAY : 11am to 8pm\r\nSATURDAY : 10am to 6pm\r\nSUNDAY : 12nn to 6pm', 'https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2sus!4v1466607426150!6m8!1m7!1say_sjoZJ-boAAAQvO-ipRA!2m2!1d29.51987943320036!2d-98.50278050091009!3f207!4f0!5f0.7820865974627469', 'http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=602+NW+LOOP+410+STE+107,+San+Antonio,+Texas+78216++impression&amp;aq=&amp;sll=29.545184,-95.14742&amp;sspn=0.015363,0.033023&amp;gl=us&amp;ie=UTF8&amp;hq=impression&amp;hnear=602+NW+Interstate+410+Loop+Frontage+Rd+%23107,+San+Antonio,+Texas+78216&amp;t=m&amp;cid=13732379029088252493&amp;ll=29.532242,-98.501701&amp;spn=0.026138,0.038624&amp;z=14&amp;iwloc=A&amp;output=embed', 'true'),
(4, 'ATLANTA', 'atl@impressionbridalstore.com', '501 Roberts Ct', 'Kennesaw', 'GA', '30144', '(770) 794-8545', 'MONDAY TO FRIDAY : 11am to 8pm\r\nSATURDAY : 10am to 6pm\r\nSUNDAY : 12nn to 6pm', '', 'http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=501+Roberts+Ct.+Kennesaw,+GA+30144+impression&amp;aq=&amp;sll=34.010842,-84.564534&amp;sspn=0.007319,0.016512&amp;gl=us&amp;g=501+Roberts+Ct.+Kennesaw,+GA+30144&amp;ie=UTF8&amp;hq=impression&amp;hnear=501+Roberts+Ct,+Kennesaw,+Georgia+30144&amp;t=m&amp;cid=9068969966099680554&amp;ll=34.022858,-84.566917&amp;spn=0.024898,0.038624&amp;z=14&amp;iwloc=A&amp;output=embed', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stories`
--

CREATE TABLE `tbl_stories` (
  `story_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `b_fname` varchar(255) NOT NULL,
  `g_fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `style` int(11) NOT NULL,
  `wedding_day` date NOT NULL,
  `purchased_from_store` int(11) NOT NULL,
  `weddingstory_desc` longtext,
  `service_id` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_website` varchar(100) NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stories`
--

INSERT INTO `tbl_stories` (`story_id`, `user_id`, `b_fname`, `g_fname`, `email`, `style`, `wedding_day`, `purchased_from_store`, `weddingstory_desc`, `service_id`, `service_name`, `service_website`, `is_active`) VALUES
(1, NULL, 'mahesh', 'mahesh', 'msakore@gmail.com', 10522, '2017-11-22', 1, 'descirption', '3', 'asdasd', 'www.servicewebsites.com', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trunkshows`
--

CREATE TABLE `tbl_trunkshows` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `store_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_desc` text NOT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_subscribed` enum('true','false') NOT NULL DEFAULT 'true',
  `signup_date` datetime NOT NULL,
  `userlevel_id` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `email_id`, `first_name`, `last_name`, `zipcode`, `password`, `is_subscribed`, `signup_date`, `userlevel_id`, `last_login`, `last_updated`, `is_active`) VALUES
(1, 'admin@gmail.com', 'admin', 'last_name', NULL, 'admin1', 'true', '2017-10-12 10:20:20', 1, '2017-11-30 19:32:50', NULL, 'true'),
(46, 'msakore@gmail.com', 'mahesh', 'sakore', '411039', 'admin1', 'true', '2017-11-21 14:09:07', 2, NULL, '2017-11-27 16:52:01', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lnk_brands_to_images`
--
ALTER TABLE `lnk_brands_to_images`
  ADD PRIMARY KEY (`bti_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `lnk_product_to_documents`
--
ALTER TABLE `lnk_product_to_documents`
  ADD PRIMARY KEY (`ptd_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `document_id` (`document_id`);

--
-- Indexes for table `lnk_product_to_subcat`
--
ALTER TABLE `lnk_product_to_subcat`
  ADD PRIMARY KEY (`pts_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`);

--
-- Indexes for table `lnk_story_to_images`
--
ALTER TABLE `lnk_story_to_images`
  ADD PRIMARY KEY (`sti_id`),
  ADD KEY `story_id` (`story_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `lnk_user_to_favorites`
--
ALTER TABLE `lnk_user_to_favorites`
  ADD PRIMARY KEY (`utf_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ref_brands`
--
ALTER TABLE `ref_brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `ref_catagory`
--
ALTER TABLE `ref_catagory`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `ref_collection`
--
ALTER TABLE `ref_collection`
  ADD PRIMARY KEY (`collection_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `ref_pages`
--
ALTER TABLE `ref_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `ref_seasons`
--
ALTER TABLE `ref_seasons`
  ADD PRIMARY KEY (`season_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `ref_subcat_to_cat`
--
ALTER TABLE `ref_subcat_to_cat`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `tbl_insta`
--
ALTER TABLE `tbl_insta`
  ADD PRIMARY KEY (`insta_link_id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `tbl_page_sections`
--
ALTER TABLE `tbl_page_sections`
  ADD PRIMARY KEY (`ps_id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `collection_id` (`collection_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `season_id` (`season_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `tbl_resent_links`
--
ALTER TABLE `tbl_resent_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  ADD PRIMARY KEY (`story_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `purchased_from_store` (`purchased_from_store`);

--
-- Indexes for table `tbl_trunkshows`
--
ALTER TABLE `tbl_trunkshows`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lnk_brands_to_images`
--
ALTER TABLE `lnk_brands_to_images`
  MODIFY `bti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lnk_product_to_documents`
--
ALTER TABLE `lnk_product_to_documents`
  MODIFY `ptd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lnk_product_to_subcat`
--
ALTER TABLE `lnk_product_to_subcat`
  MODIFY `pts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1186;
--
-- AUTO_INCREMENT for table `lnk_story_to_images`
--
ALTER TABLE `lnk_story_to_images`
  MODIFY `sti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lnk_user_to_favorites`
--
ALTER TABLE `lnk_user_to_favorites`
  MODIFY `utf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_brands`
--
ALTER TABLE `ref_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ref_catagory`
--
ALTER TABLE `ref_catagory`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_collection`
--
ALTER TABLE `ref_collection`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ref_pages`
--
ALTER TABLE `ref_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_seasons`
--
ALTER TABLE `ref_seasons`
  MODIFY `season_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ref_subcat_to_cat`
--
ALTER TABLE `ref_subcat_to_cat`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_insta`
--
ALTER TABLE `tbl_insta`
  MODIFY `insta_link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_page_sections`
--
ALTER TABLE `tbl_page_sections`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `tbl_resent_links`
--
ALTER TABLE `tbl_resent_links`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_stores`
--
ALTER TABLE `tbl_stores`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  MODIFY `story_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_trunkshows`
--
ALTER TABLE `tbl_trunkshows`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lnk_brands_to_images`
--
ALTER TABLE `lnk_brands_to_images`
  ADD CONSTRAINT `lnk_brands_to_images_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `ref_brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lnk_brands_to_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `tbl_documents` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lnk_product_to_documents`
--
ALTER TABLE `lnk_product_to_documents`
  ADD CONSTRAINT `lnk_product_to_documents_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lnk_product_to_documents_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `tbl_documents` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lnk_product_to_subcat`
--
ALTER TABLE `lnk_product_to_subcat`
  ADD CONSTRAINT `lnk_product_to_subcat_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lnk_product_to_subcat_ibfk_2` FOREIGN KEY (`sub_cat_id`) REFERENCES `ref_subcat_to_cat` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lnk_story_to_images`
--
ALTER TABLE `lnk_story_to_images`
  ADD CONSTRAINT `lnk_story_to_images_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `tbl_documents` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lnk_story_to_images_ibfk_2` FOREIGN KEY (`story_id`) REFERENCES `tbl_stories` (`story_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lnk_user_to_favorites`
--
ALTER TABLE `lnk_user_to_favorites`
  ADD CONSTRAINT `lnk_user_to_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lnk_user_to_favorites_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_brands`
--
ALTER TABLE `ref_brands`
  ADD CONSTRAINT `ref_brands_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_catagory`
--
ALTER TABLE `ref_catagory`
  ADD CONSTRAINT `ref_catagory_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_collection`
--
ALTER TABLE `ref_collection`
  ADD CONSTRAINT `ref_collection_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `tbl_products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_seasons`
--
ALTER TABLE `ref_seasons`
  ADD CONSTRAINT `ref_seasons_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `tbl_documents` (`document_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ref_subcat_to_cat`
--
ALTER TABLE `ref_subcat_to_cat`
  ADD CONSTRAINT `ref_subcat_to_cat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `ref_catagory` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_subcat_to_cat_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `tbl_documents` (`document_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD CONSTRAINT `tbl_jobs_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `tbl_stores` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_page_sections`
--
ALTER TABLE `tbl_page_sections`
  ADD CONSTRAINT `tbl_page_sections_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `ref_pages` (`page_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`collection_id`) REFERENCES `ref_collection` (`collection_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `ref_brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_products_ibfk_3` FOREIGN KEY (`season_id`) REFERENCES `ref_seasons` (`season_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_products_ibfk_4` FOREIGN KEY (`store_id`) REFERENCES `tbl_stores` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_resent_links`
--
ALTER TABLE `tbl_resent_links`
  ADD CONSTRAINT `tbl_resent_links_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stories`
--
ALTER TABLE `tbl_stories`
  ADD CONSTRAINT `tbl_stories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_stories_ibfk_2` FOREIGN KEY (`purchased_from_store`) REFERENCES `tbl_stores` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_trunkshows`
--
ALTER TABLE `tbl_trunkshows`
  ADD CONSTRAINT `tbl_trunkshows_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `tbl_stores` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
