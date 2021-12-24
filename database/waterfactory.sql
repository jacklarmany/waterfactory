-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 07:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waterfactory`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດລູກຄ້າ',
  `fullname` varchar(70) NOT NULL COMMENT 'ຊື່ ແລະ ນາມສະກຸນ',
  `dob` date NOT NULL COMMENT 'ວັນ-ເດືອນ-ປີເກີດ',
  `gender` varchar(7) NOT NULL COMMENT 'ເພດ',
  `cardid` varchar(16) NOT NULL COMMENT 'ເລກບັດປະຈຳໂຕ',
  `tel` varchar(14) NOT NULL COMMENT 'ເບີໂທລະສັບ',
  `village` int(11) NOT NULL COMMENT 'ລະຫັດບ້ານ',
  `district` int(11) NOT NULL COMMENT 'ລະຫັດເມືອງ',
  `province` int(11) NOT NULL COMMENT 'ລະຫັດແຂວງ',
  `factoryid` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int(11) NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `dob`, `gender`, `cardid`, `tel`, `village`, `district`, `province`, `factoryid`, `userid`) VALUES
(12, 'ຈັນເພັງ ພົມມະດີ', '2021-12-24', 'male', '10-2568445', '+8562091004444', 4, 2, 1, 43, 11),
(13, 'ມະນີວັນ ຈັນທະສຸກ', '2021-12-29', 'female', '20-88745612', '+8562055676123', 3, 2, 1, 43, 11),
(14, 'ຈັນສຸດາ ມະລາວົງສັກ', '2021-12-09', 'male', '03-856856', '+8562094505678', 2, 1, 1, 43, 11);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `districtname` varchar(255) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `districtname`, `province_id`) VALUES
(1, 'ເມືອງ ເລົ່າງາມ', 1),
(2, 'ເມືອງ ສະມ້ວຍ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE `factory` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `logo` varchar(255) DEFAULT NULL COMMENT 'ໂລໂກ້ໂຮງງານ',
  `factoryname` varchar(200) NOT NULL COMMENT 'ຊື່ໂຮງງານ',
  `userid` int(11) NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`id`, `logo`, `factoryname`, `userid`) VALUES
(42, '', 'ໂຮງງານນໍ້າດື່ມບໍລິສຸດສາຍເຊເສັດ', 11),
(43, '', 'ໂຮງງານນໍ້າດື່ມກາດອກກຸຫຼາບ', 11),
(44, '', 'ໂຮງງານນໍ້າດື່ມກາຕາດຮັງ', 11),
(45, 'LGF-871639871945.png', 'ddd', 11),
(46, '', 'ໂຮງງານຢູ່ວັດ', 11),
(47, 'LGF-4601639879897.jpg', 'ໂຮງງານນໍ້າດື່ມກາຕາດສີ', 11);

-- --------------------------------------------------------

--
-- Table structure for table `factory_translate`
--

CREATE TABLE `factory_translate` (
  `id` int(11) NOT NULL,
  `language` varchar(45) DEFAULT NULL,
  `factoryname` varchar(45) DEFAULT NULL,
  `factoryid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factory_translate`
--

INSERT INTO `factory_translate` (`id`, `language`, `factoryname`, `factoryid`) VALUES
(1, 'lo', 'ໂຮງງານນໍ້າດື່ມກາດອກກຸຫຼາບ', 43),
(2, 'en', 'Water Factory KADOKULAPB', 43),
(3, 'lo', 'ໂຮງງານນໍ້າດື່ມກາຕາດຮັງ', 44),
(4, 'en', 'Katadhang water suplier', 44),
(5, 'lo', 'ໂຮງງານນໍ້າດື່ມບໍລິສຸດສາຍເຊເສັດ', 42),
(6, 'en', 'Saiyseseth water factory', 42),
(7, 'lo', 'ddd', 45),
(8, 'en', '', 45),
(9, 'lo', 'ໂຮງງານຢູ່ວັດ', 46),
(10, 'en', 'Temple Factory', 46),
(11, 'lo', 'ໂຮງງານນໍ້າດື່ມກາຕາດສີ', 47),
(12, 'en', 'Water Factory Katadsy', 47);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name_ascii` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language`, `country`, `name`, `name_ascii`, `status`) VALUES
('en', 'en', 'en', 'england', 'en-Ascii', 1),
('lo', 'lo', 'la', 'ລາວ', 'lo-Ascii', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language_source`
--

CREATE TABLE `language_source` (
  `id` int(11) NOT NULL,
  `category` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `language_source`
--

INSERT INTO `language_source` (`id`, `category`, `message`) VALUES
(297, 'app', 'New customer add completed'),
(298, 'app', 'The requested page does not exist.'),
(299, 'app', 'Added in the preparation for sell'),
(300, 'app', 'Select the product for sell first'),
(301, 'app', 'This item alreay exist, Please select new item for sell'),
(303, 'app', 'Create Successfully'),
(304, 'app', 'Create Customer'),
(305, 'app', 'Customers'),
(306, 'app', 'Update Customer: {name}'),
(307, 'app', 'Update'),
(308, 'app', 'Delete'),
(309, 'app', 'Are you sure you want to delete this item?'),
(310, 'app', 'Male'),
(311, 'app', 'Female'),
(312, 'app', 'Select option'),
(313, 'app', 'Save'),
(314, 'app', 'Search'),
(315, 'app', 'Reset'),
(316, 'app', 'Create Factory'),
(317, 'app', 'Factories'),
(318, 'app', 'Update Factory: {name}'),
(319, 'app', 'Logo'),
(320, 'app', 'Factory name Lao'),
(323, 'app', 'Create Post'),
(324, 'app', 'Posts'),
(325, 'app', 'Update Post: {name}'),
(326, 'app', 'Create Prepareforsell'),
(327, 'app', 'Prepareforsells'),
(328, 'app', 'Water name'),
(329, 'app', 'Quantity'),
(330, 'app', 'Sell price'),
(331, 'app', 'Amount'),
(332, 'app', 'Discount'),
(333, 'app', 'Amount discount'),
(334, 'app', 'Amount Receive'),
(335, 'app', 'Customer'),
(336, 'app', 'Action'),
(337, 'app', 'Update Prepareforsell: {name}'),
(338, 'app', 'Kip'),
(339, 'app', 'Select a state ...'),
(340, 'app', 'Select customer'),
(341, 'app', 'Discount - - - %'),
(342, 'app', 'Quantites'),
(343, 'app', 'Add to prepare for sell'),
(344, 'app', 'Post'),
(345, 'app', 'Username'),
(346, 'app', 'Password'),
(347, 'app', 'Forgot password'),
(348, 'app', 'Create Stuff'),
(349, 'app', 'Stuffs'),
(350, 'app', 'Update Stuff: {name}'),
(351, 'app', 'Create Stuffasuser'),
(352, 'app', 'Stuffasusers'),
(353, 'app', 'Update Stuffasuser: {name}'),
(354, 'app', 'Create Water'),
(355, 'app', 'Waters'),
(356, 'app', 'Update Water: {name}'),
(357, 'app', 'Sell'),
(358, 'app', 'Are you want to delete this item.?'),
(364, 'app', 'Create Wateradd'),
(365, 'app', 'Wateradds'),
(366, 'app', 'Update Wateradd: {name}'),
(367, 'app', 'View'),
(368, 'app', 'Email'),
(369, 'app', 'You are not allowed to {0} record #{1}'),
(370, 'app', 'On'),
(371, 'app', 'Off'),
(372, 'app', 'Active'),
(373, 'app', 'Inactive'),
(374, 'models', 'ID'),
(375, 'models', 'Fullname'),
(376, 'models', 'Dob'),
(377, 'models', 'Gender'),
(378, 'models', 'Cardid'),
(379, 'models', 'Tel'),
(380, 'models', 'Village'),
(381, 'models', 'District'),
(382, 'models', 'Province'),
(383, 'models', 'Factoryid'),
(384, 'models', 'Userid'),
(385, 'models', 'Districtname'),
(386, 'models', 'Province ID'),
(387, 'models', 'Logo'),
(388, 'models', 'Factoryname'),
(389, 'models', 'Language'),
(390, 'models', 'Language ID'),
(391, 'models', 'Country'),
(392, 'models', 'Name'),
(393, 'models', 'Name Ascii'),
(394, 'models', 'Status'),
(395, 'models', 'Category'),
(396, 'models', 'Message'),
(397, 'models', 'Translation'),
(398, 'models', 'Version'),
(399, 'models', 'Apply Time'),
(400, 'models', 'Positionname'),
(401, 'models', 'Salary'),
(402, 'models', 'Positionid'),
(403, 'models', 'Waterid'),
(404, 'models', 'Quality'),
(405, 'models', 'Sellprice'),
(406, 'models', 'Discount'),
(407, 'models', 'Customerid'),
(408, 'models', 'Amount'),
(409, 'models', 'Amountdiscount'),
(410, 'models', 'Provincename'),
(411, 'models', 'Date'),
(412, 'models', 'Time'),
(413, 'models', 'Salaryamount'),
(414, 'models', 'Stuffid'),
(415, 'models', 'Card ID'),
(416, 'models', 'District ID'),
(417, 'models', 'Village ID'),
(418, 'models', 'Paysalary'),
(419, 'models', 'Position ID'),
(420, 'models', 'Factory ID'),
(421, 'models', 'Uname'),
(422, 'models', 'Pword'),
(423, 'models', 'Username'),
(424, 'models', 'Auth Key'),
(425, 'models', 'Password Hash'),
(426, 'models', 'Password Reset Token'),
(427, 'models', 'Email'),
(428, 'models', 'Created At'),
(429, 'models', 'Updated At'),
(430, 'models', 'Verification Token'),
(431, 'models', 'Villagename'),
(432, 'models', 'Image'),
(433, 'models', 'Watername'),
(434, 'models', 'Unit'),
(435, 'models', 'Avalibledquantity'),
(436, 'models', 'Quantity'),
(437, 'models', 'Totalreceiveamount'),
(438, 'models', 'Billno'),
(439, 'models', 'Stuffasuserid'),
(440, 'test-yii2-db', 'ID'),
(441, 'test-yii2-db', 'Title'),
(442, 'pages', 'Select ...'),
(443, 'kvbase', 'It is recommended you use an upgraded browser to display the {type} control properly.'),
(444, 'kvselect', 'Select all'),
(445, 'kvselect', 'Unselect all'),
(446, 'language', 'Text not found in database! Please run project scan before translating!'),
(447, 'language', 'translations'),
(448, 'language', 'Successfully imported {fileName}'),
(449, 'language', '{type}: {new} new, {updated} updated'),
(450, 'language', 'Invalid model \"{model}\":'),
(451, 'language', 'Translation'),
(452, 'language', 'Create {modelClass}'),
(453, 'language', 'Languages'),
(454, 'language', 'Source'),
(455, 'language', 'Choosing the language of translation'),
(456, 'language', 'Text to be translated'),
(457, 'language', 'Export'),
(458, 'language', 'Import'),
(459, 'language', 'List of languages'),
(460, 'language', 'Status'),
(461, 'language', 'Statistic'),
(462, 'language', 'Translate'),
(463, 'language', 'Optimise database'),
(464, 'language', '{n, plural, =0{No entries} =1{One entry} other{# entries}} were removed!'),
(465, 'language', 'Scanning project'),
(466, 'language', '{n, plural, =0{No new entries} =1{One new entry} other{# new entries}} were added!'),
(467, 'language', '{n, plural, =0{No entries} =1{One entry} other{# entries}} remove!'),
(468, 'language', 'Translation into {language_id}'),
(469, 'language', 'Original'),
(470, 'language', 'Source language'),
(471, 'language', 'Enter \"{command}\" to search for empty translations.'),
(472, 'language', 'Action'),
(473, 'language', 'Save'),
(474, 'language', 'Update {modelClass}: '),
(475, 'language', 'Update'),
(476, 'language', 'Delete'),
(477, 'language', 'Are you sure you want to delete this item?'),
(478, 'language', 'Translation status'),
(479, 'language', 'Create'),
(480, 'language', 'Select all'),
(481, 'language', 'Delete selected'),
(482, 'language', 'Home'),
(483, 'language', 'Language'),
(484, 'language', 'Scan'),
(485, 'language', 'Optimize'),
(486, 'language', 'Im-/Export'),
(487, 'language', 'Toggle translate'),
(488, 'model', 'Language ID'),
(489, 'model', 'Language'),
(490, 'model', 'Country'),
(491, 'model', 'Name'),
(492, 'model', 'Name Ascii'),
(493, 'model', 'Status'),
(494, 'model', 'ID'),
(495, 'model', 'Category'),
(496, 'model', 'Message'),
(497, 'model', 'Translation'),
(498, 'settings', '\"{attribute}\" must be a valid JSON object'),
(499, 'settings', '{attribute} \"{value}\" already exists for this section.'),
(500, 'settings', 'Please select correct type'),
(501, 'settings', 'ID'),
(502, 'settings', 'Type'),
(503, 'settings', 'Section'),
(504, 'settings', 'Key'),
(505, 'settings', 'Value'),
(506, 'settings', 'Active'),
(507, 'settings', 'Created'),
(508, 'settings', 'Modified'),
(509, 'settings', 'Successfully saved settings on {section}'),
(510, 'settings', 'Create {modelClass}'),
(511, 'settings', 'Setting'),
(512, 'settings', 'Settings'),
(513, 'settings', 'Update {modelClass}: '),
(514, 'settings', 'Update'),
(515, 'settings', 'Delete'),
(516, 'settings', 'Are you sure you want to delete this item?'),
(517, 'settings', 'Change at your own risk'),
(518, 'settings', 'Create'),
(519, 'settings', 'Search'),
(520, 'settings', 'Reset'),
(521, 'giiant', 'No relations'),
(522, 'giiant', 'All relations'),
(523, 'giiant', 'All relations with inverse'),
(524, 'giiant', 'Via Table'),
(525, 'giiant', 'Via Model'),
(526, 'array', 'Inactive'),
(527, 'array', 'Active'),
(528, 'array', 'Beta'),
(529, 'javascript', 'Translation Language: {name}'),
(530, 'javascript', 'Save'),
(531, 'javascript', 'Close'),
(532, 'javascript', 'Are you sure you want to delete these items?'),
(533, 'javascript', 'Are you sure you want to delete this item?'),
(534, 'app', 'Quantity has been added'),
(535, 'app', 'Create Water Factory'),
(536, 'database', 'england'),
(537, 'database', 'en-Ascii'),
(538, 'database', 'ລາວ'),
(539, 'database', 'lo-Ascii'),
(540, 'app', 'Factory name English'),
(544, 'app', 'Stuff'),
(545, 'app', 'Dashboard'),
(546, 'app', 'History of Added'),
(547, 'app', 'History of Sale'),
(548, 'app', 'Warehouse of Water'),
(549, 'app', 'Staff as User'),
(550, 'app', 'Check Printed Bills'),
(551, 'app', 'Customer Info'),
(552, 'app', 'Create Position'),
(553, 'app', 'Positions'),
(554, 'app', 'Update Position: {name}'),
(555, 'app', 'Select Position'),
(556, 'app', 'Select staff'),
(557, 'app', 'Create Watersale'),
(558, 'app', 'Watersales'),
(559, 'app', 'Update Watersale: {name}'),
(560, 'app', 'Setting'),
(561, 'app', 'Manage'),
(562, 'app', 'Position'),
(563, 'app', 'Unit'),
(564, 'app', 'Create Unit'),
(565, 'app', 'Units'),
(566, 'app', 'Update Unit: {name}'),
(567, 'app', 'Upload Images, Videos, Doc'),
(568, 'app', 'Edit'),
(569, 'app', 'Available'),
(570, 'app', 'Sell-price'),
(571, 'app', 'Water name Lao'),
(572, 'app', 'Select a Unit ...'),
(573, 'app', 'Water name English'),
(574, 'app', 'Set Sell Price'),
(575, 'models', 'Unitname'),
(576, 'models', 'Unit ID'),
(577, 'models', 'Unitid');

-- --------------------------------------------------------

--
-- Table structure for table `language_translate`
--

CREATE TABLE `language_translate` (
  `id` int(11) NOT NULL,
  `language` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `translation` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `language_translate`
--

INSERT INTO `language_translate` (`id`, `language`, `translation`) VALUES
(297, 'lo', 'ເພີ່ມຂໍ້ມູນລູກຄ້າໃຫມ່ສຳເລັດແລ້ວ'),
(298, 'lo', 'ໜ້ານີ້ບໍ່ໄດ້ມີໃນລະບົບ'),
(299, 'lo', 'ເພີ່ມເຂົ້າໃນກະກຽມການຂາຍສຳເລັດ'),
(300, 'lo', 'ກະລຸນາ ເລືອກນໍ້າດື່ມທີ່ຈະຂາຍກ່ອນ'),
(301, 'lo', 'ມີໃນລາຍການແລ້ວ...!, ກະລຸນາເລືອກນໍ້າອື່ນເພື່ອຂາຍ'),
(303, 'lo', 'ສ້າງສຳເລັດແລ້ວ'),
(304, 'lo', 'ເພີ່ມລູກຄ້າໃໝ່'),
(305, 'lo', 'ລູກຄ້າ'),
(306, 'lo', 'ແກ້ໄຂຂໍ້ມູນຂອງ'),
(307, 'lo', 'ແກ້ໄຂ'),
(308, 'lo', 'ລົບ'),
(309, 'lo', 'ຕ້ອງການລົບສິ່ງນີ້ອອກ ແທ້ບໍ ?'),
(310, 'lo', 'ຊາຍ'),
(311, 'lo', 'ຍິງ'),
(312, 'lo', 'ເລືອກ ລາຍການ'),
(313, 'lo', 'ບັນທຶກ'),
(314, 'lo', 'ຄົ້ນຫາ'),
(315, 'lo', 'ຕັ້ງໃໝ່'),
(316, 'lo', 'ສ້າງໂຮງງານ'),
(318, 'lo', 'ແກ້ໄຂໂຮງງານ'),
(320, 'en', ''),
(320, 'lo', 'ຊື່ ໂຮງງານ ພາສາ ລາວ'),
(327, 'lo', 'ກະກຽມເພື່ອຂາຍ'),
(328, 'lo', 'ຊື່ນໍ້າດື່ມ'),
(329, 'lo', 'ຈຳນວນ'),
(330, 'lo', 'ລາຄາຂາຍ'),
(331, 'lo', 'ລວມເປັນເງິນ'),
(332, 'lo', 'ສ່ວນຫຼຸດ'),
(333, 'lo', 'ລວມເງິນທີ່ຫຼຸດ'),
(334, 'lo', 'ຈຳນວນເງິນຕົວຈິງ'),
(335, 'lo', 'ລູກຄ້າ'),
(337, 'lo', 'ແກ້ໄຂ'),
(338, 'lo', 'ກີບ'),
(340, 'lo', 'ເລືອກ ຊື່ລູກຄ້າ'),
(343, 'lo', 'ເພີ່ມເຂົ້າໃນໃບບິນ'),
(534, 'lo', 'ເພີ່ມຈຳນວນສຳເລັດ'),
(535, 'lo', 'ສ້າງໂຮງງານນໍ້າດື່ມ'),
(540, 'lo', 'ຊື່ ໂຮງງານ ພາສາ ອັງກິດ'),
(544, 'lo', 'ຂໍ້ມູນພະນັກງານ'),
(545, 'lo', 'ສູນລວມຂໍ້ມູນ'),
(546, 'lo', 'ປະຫວັດການເພີ່ມ'),
(547, 'lo', 'ປະຫວັດການຂາຍ'),
(548, 'lo', 'ຫ້ອງເກັບນໍ້າດື່ມ'),
(549, 'lo', 'ພະນັກງານເປັນຜູ້ໃຊ້'),
(550, 'lo', 'ໃບບິນພິມແລ້ວ'),
(551, 'lo', 'ຂໍ້ມູນລູກຄ້າ'),
(560, 'lo', 'ການຕັ້ງຄ່າ'),
(561, 'lo', 'ບໍລິຫານ'),
(569, 'lo', 'ຍັງມີຢູ່'),
(570, 'lo', 'ລາຄາຂາຍ');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດ',
  `positionname` varchar(255) NOT NULL COMMENT 'ຊື່ຕຳແໜ່ງ',
  `salary` decimal(10,2) NOT NULL COMMENT 'ເງິນເດືອນ',
  `factoryid` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int(11) NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `positionname`, `salary`, `factoryid`, `userid`) VALUES
(5, 'ຂາຍ', '1500000.00', 44, 11),
(6, 'ແບກຕຸກ', '1600000.00', 44, 11);

-- --------------------------------------------------------

--
-- Table structure for table `position_translate`
--

CREATE TABLE `position_translate` (
  `id` int(11) NOT NULL,
  `language` int(11) DEFAULT NULL,
  `positionname` varchar(50) DEFAULT NULL,
  `positionid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_translate`
--

INSERT INTO `position_translate` (`id`, `language`, `positionname`, `positionid`) VALUES
(1, 0, 'ຂາຍ', 5),
(2, 0, 'Sale', 5),
(3, 0, 'ແບກຕຸກ', 6),
(4, 0, 'BaekTouk', 6);

-- --------------------------------------------------------

--
-- Table structure for table `prepareforsell`
--

CREATE TABLE `prepareforsell` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດ',
  `waterid` int(11) NOT NULL COMMENT 'ລະຫັດນໍ້າດື່ມ',
  `quality` int(11) NOT NULL COMMENT 'ຈຳນວນ',
  `sellprice` decimal(10,2) NOT NULL COMMENT 'ລາຄາຂາຍ',
  `discount` decimal(10,2) DEFAULT NULL COMMENT 'ສ່ວນຫຼຸດ',
  `customerid` int(11) DEFAULT NULL COMMENT 'ລະຫັດລູກຄ້າ',
  `factoryid` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int(11) NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Stand-in structure for view `prepareforsellview`
-- (See below for the actual view)
--
CREATE TABLE `prepareforsellview` (
`id` int(11)
,`waterid` int(11)
,`quality` int(11)
,`sellprice` decimal(10,2)
,`amount` decimal(20,2)
,`discount` decimal(10,2)
,`amountdiscount` decimal(34,8)
,`customerid` int(11)
,`factoryid` int(11)
,`userid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `provincename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `provincename`) VALUES
(1, 'ສາລະວັນ'),
(2, 'ເຊກອງ'),
(3, 'ອັດຕະປື'),
(4, 'ວຽງຈັນ'),
(5, 'ໄຊຍະບູລີ'),
(6, 'ສະຫວັນນະເຂດ');

-- --------------------------------------------------------

--
-- Table structure for table `salarypaid`
--

CREATE TABLE `salarypaid` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດ',
  `date` date NOT NULL COMMENT 'ວັນທີ',
  `time` time NOT NULL COMMENT 'ເວລາ',
  `salaryamount` varchar(255) NOT NULL COMMENT 'ຈຳນວນເງິນເດືອນ',
  `stuffid` int(11) NOT NULL COMMENT 'ລະຫັດພະນັກງານ',
  `factoryid` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດ',
  `fullname` varchar(255) NOT NULL COMMENT 'ຊື່ ແລະ ນາມສະກຸນ',
  `gender` varchar(6) NOT NULL COMMENT 'ເພດ',
  `dob` date NOT NULL COMMENT 'ວັນເດືອນປີເກີດ',
  `card_id` varchar(16) NOT NULL COMMENT 'ເລກບັດປະຈຳໂຕ',
  `tel` varchar(14) NOT NULL COMMENT 'ເບີໂທລະສັບ',
  `province_id` int(11) NOT NULL COMMENT 'ລະຫັດແຂວງ',
  `district_id` int(11) NOT NULL COMMENT 'ລະຫັດເມືອງ',
  `village_id` int(11) NOT NULL COMMENT 'ລະຫັດບ້ານ',
  `paysalary` date DEFAULT NULL COMMENT 'ຈ່າຍເງິນເດືອນ',
  `position_id` int(11) NOT NULL COMMENT 'ລະຫັດຕຳແໜ່ງ',
  `factory_id` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int(11) NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `stuffasuser`
--

CREATE TABLE `stuffasuser` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດ',
  `uname` varchar(255) NOT NULL COMMENT 'ຊື່ຜູ້ໃຊ້',
  `pword` varchar(255) NOT NULL COMMENT 'ລະຫັດຜ່ານ',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'ສະຖານະ',
  `stuffid` int(11) NOT NULL COMMENT 'ລະຫັດພະນັກງານ',
  `factoryid` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `unitname` varchar(10) NOT NULL,
  `factoryid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unitname`, `factoryid`, `userid`) VALUES
(1, 'ຕຸກ', 43, 11),
(2, 'ແກັດ', 43, 11),
(3, 'ຕຸກ', 44, 11),
(4, 'ຕຸກ', 47, 11),
(5, 'ແພັກ', 43, 11);

-- --------------------------------------------------------

--
-- Table structure for table `unit_translate`
--

CREATE TABLE `unit_translate` (
  `id` int(11) NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `unitname` varchar(10) DEFAULT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit_translate`
--

INSERT INTO `unit_translate` (`id`, `language`, `unitname`, `unit_id`) VALUES
(1, 'lo', 'ຕຸກ', 1),
(2, 'en', 'Touk', 1),
(3, 'lo', 'ແກັດ', 2),
(4, 'en', 'Kat', 2),
(5, 'lo', 'ຕຸກ', 3),
(6, 'en', 'Touk', 3),
(7, 'lo', 'ຕຸກ', 4),
(8, 'en', 'Touk', 4),
(9, 'lo', 'ແພັກ', 5),
(10, 'en', 'Pack', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(11, 'jlarmany', 'HfN03pUcF0y-7aIRwvcwgcYyrni1kJ9i', '$2y$13$GjTadQ83jwnLRMntOzWJBetINJkIR1.FaxOD0z9bsvynDCd8wXbxi', NULL, 'jacklarmany@gmail.com', 10, 1639567355, 1639568252, 'cjSqi3f4AxjIHsPtLgovSMDTtVsRAaJn_1639567355');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `id` int(11) NOT NULL,
  `villagename` varchar(255) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`id`, `villagename`, `district_id`, `province_id`) VALUES
(1, 'ບ້ານ ແບ່ງອຸດົມ', 1, 1),
(2, 'ບ້ານ ຕຸມລານ', 1, 1),
(3, 'ບ້ານ ນາໄຊໃຫຍ່', 1, 1),
(4, 'ບ້ານ ນາກົກໂພ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `water`
--

CREATE TABLE `water` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດ',
  `image` varchar(255) NOT NULL COMMENT 'ຮູບພາບຂອງນໍ້າ',
  `watername` varchar(100) NOT NULL COMMENT 'ຊື່ນໍ້າດື່ມ',
  `unitid` int(11) NOT NULL COMMENT 'ລະຫັດຫົວໜ່ວຍ',
  `avalibledquantity` int(11) DEFAULT NULL COMMENT 'ຈຳນວນນໍ້າທີ່ຍັງເຫຼືອ',
  `sellprice` decimal(10,2) NOT NULL COMMENT 'ລາຄາຂາຍ',
  `factoryid` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int(11) NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `water`
--

INSERT INTO `water` (`id`, `image`, `watername`, `unitid`, `avalibledquantity`, `sellprice`, `factoryid`, `userid`) VALUES
(61, 'LGF-5081640130813.jpg', 'ນໍ້າດື່ມຕຸກນ້ອຍ', 3, 90, '5000.00', 44, 11),
(62, 'LGF-1561640131998.png', 'ນໍ້າດື່ມຕຸກກາງ', 3, 720, '7000.00', 44, 11),
(63, 'LGF-4241640216362.jpg', 'ນໍ້າຕຸກນ້ອຍ', 1, 1, '5000.00', 43, 11),
(64, 'LGF-1821640215691.png', 'ນໍ້າດື່ມຕຸກໃຫຍ່', 2, 167, '45000.00', 43, 11);

-- --------------------------------------------------------

--
-- Table structure for table `wateradd`
--

CREATE TABLE `wateradd` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດ',
  `date` date NOT NULL COMMENT 'ວັນທີ',
  `time` time NOT NULL COMMENT 'ເວລາ',
  `waterid` int(11) NOT NULL COMMENT 'ລະຫັດນໍ້າດື່ມ',
  `quantity` int(11) NOT NULL COMMENT 'ຈຳນວນ',
  `unitid` int(11) NOT NULL COMMENT 'ລະຫັດຫົວໜ່ວຍ',
  `factoryid` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int(11) NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wateradd`
--

INSERT INTO `wateradd` (`id`, `date`, `time`, `waterid`, `quantity`, `unitid`, `factoryid`, `userid`) VALUES
(72, '2021-12-22', '06:53:52', 61, 20, 3, 44, 11),
(73, '2021-12-22', '07:12:32', 61, 30, 3, 44, 11),
(74, '2021-12-22', '07:12:42', 61, 30, 3, 44, 11),
(75, '2021-12-22', '07:12:48', 61, 30, 3, 44, 11),
(76, '2021-12-22', '07:13:37', 62, 700, 3, 44, 11),
(77, '2021-12-22', '07:25:59', 62, 20, 3, 44, 11),
(78, '2021-12-23', '05:22:23', 63, 20, 1, 43, 11),
(79, '2021-12-23', '05:35:18', 63, 352, 1, 43, 11),
(80, '2021-12-23', '06:30:11', 64, 200, 2, 43, 11),
(81, '2021-12-23', '21:18:21', 63, 9, 1, 43, 11);

-- --------------------------------------------------------

--
-- Table structure for table `watersale`
--

CREATE TABLE `watersale` (
  `id` int(11) NOT NULL COMMENT 'ລະຫັດ',
  `date` date NOT NULL COMMENT 'ວັນທີ',
  `time` time NOT NULL COMMENT 'ເວລາ',
  `waterid` int(11) NOT NULL COMMENT 'ລະຫັດນໍ້າດື່ມ',
  `quantity` int(11) NOT NULL COMMENT 'ຈຳນວນຂາຍ',
  `sellprice` int(11) NOT NULL COMMENT 'ລາຄາຂາຍ',
  `amount` decimal(10,2) NOT NULL COMMENT 'ລວມເປັນເງິນ',
  `discount` int(11) DEFAULT NULL COMMENT 'ສ່ວນຫຼຸດ',
  `amountdiscount` decimal(10,2) DEFAULT NULL COMMENT 'ຈຳນວນເງິນທີ່ຫຼຸດ',
  `totalreceiveamount` decimal(10,2) NOT NULL COMMENT 'ຈຳນວນເງິນຮັບຈາກລູກຄ້າ',
  `customerid` int(11) DEFAULT NULL COMMENT 'ລະຫັດລູກຄ້າ',
  `billno` varchar(50) NOT NULL COMMENT 'ລະຫັດໃບບິນ',
  `stuffasuserid` int(11) DEFAULT NULL COMMENT 'ລະຫັດພະນັກງານຂາຍ',
  `factoryid` int(11) NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int(11) DEFAULT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `watersale`
--

INSERT INTO `watersale` (`id`, `date`, `time`, `waterid`, `quantity`, `sellprice`, `amount`, `discount`, `amountdiscount`, `totalreceiveamount`, `customerid`, `billno`, `stuffasuserid`, `factoryid`, `userid`) VALUES
(16, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640215640', NULL, 43, 11),
(17, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640215830', NULL, 43, 11),
(18, '2021-12-30', '00:00:00', 64, 20, 45000, '900000.00', 0, '0.00', '0.00', 0, '1143-1640215830', NULL, 43, 11),
(19, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640224922', NULL, 43, 11),
(20, '2021-12-30', '00:00:00', 64, 20, 45000, '900000.00', 0, '0.00', '0.00', 0, '1143-1640224922', NULL, 43, 11),
(21, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640266775', NULL, 43, 11),
(22, '2021-12-30', '00:00:00', 64, 20, 45000, '900000.00', 0, '0.00', '0.00', 0, '1143-1640266775', NULL, 43, 11),
(23, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640267111', NULL, 43, 11),
(24, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640267111', NULL, 43, 11),
(25, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640267146', NULL, 43, 11),
(26, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640267146', NULL, 43, 11),
(27, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640267147', NULL, 43, 11),
(28, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640267147', NULL, 43, 11),
(29, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640267252', NULL, 43, 11),
(30, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640267252', NULL, 43, 11),
(31, '2021-12-30', '00:00:00', 64, 20, 45000, '900000.00', 0, '0.00', '0.00', 0, '1143-1640267252', NULL, 43, 11),
(32, '2021-12-30', '00:00:00', 64, 20, 45000, '900000.00', 0, '0.00', '0.00', 0, '1143-1640267252', NULL, 43, 11),
(33, '2021-12-30', '00:00:00', 63, 1, 5000, '5000.00', 0, '0.00', '0.00', 0, '1143-1640267636', NULL, 43, 11),
(34, '2021-12-30', '00:00:00', 63, 1, 5000, '5000.00', 0, '0.00', '0.00', 0, '1143-1640267636', NULL, 43, 11),
(35, '2021-12-30', '00:00:00', 63, 5, 5000, '25000.00', 0, '0.00', '0.00', 0, '1143-1640269139', NULL, 43, 11),
(36, '2021-12-30', '00:00:00', 63, 2, 5000, '10000.00', 0, '0.00', '0.00', 0, '1143-1640269207', NULL, 43, 11),
(37, '2021-12-30', '00:00:00', 63, 1, 5000, '5000.00', 0, '0.00', '0.00', 0, '1143-1640269299', NULL, 43, 11),
(38, '2021-12-30', '00:00:00', 64, 13, 45000, '585000.00', 0, '0.00', '0.00', 0, '1143-1640269299', NULL, 43, 11),
(39, '2021-12-30', '00:00:00', 63, 1, 5000, '5000.00', 0, '0.00', '0.00', 0, '1143-1640269848', NULL, 43, 11),
(40, '2021-12-30', '00:00:00', 64, 20, 45000, '900000.00', 0, '0.00', '0.00', 0, '1143-1640269848', NULL, 43, 11);

-- --------------------------------------------------------

--
-- Table structure for table `water_translate`
--

CREATE TABLE `water_translate` (
  `id` int(11) NOT NULL,
  `language` int(11) DEFAULT NULL,
  `watername` varchar(10) DEFAULT NULL,
  `waterid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `water_translate`
--

INSERT INTO `water_translate` (`id`, `language`, `watername`, `waterid`) VALUES
(9, 0, 'ນໍ້າດື່ມຕຸ', 61),
(10, 0, 'Small Bott', 61),
(11, 0, 'ນໍ້າດື່ມຕຸ', 62),
(12, 0, 'Middle Bot', 62),
(13, 0, 'ນໍ້າ', 63),
(14, 0, 'Water', 63),
(15, 0, 'ນໍ້າດື່ມຕຸ', 64),
(16, 0, 'big water', 64),
(17, 0, 'ນໍ້າຕຸກນ້ອ', 63),
(18, 0, 'Small Wate', 63);

-- --------------------------------------------------------

--
-- Structure for view `prepareforsellview`
--
DROP TABLE IF EXISTS `prepareforsellview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prepareforsellview`  AS SELECT `prepareforsell`.`id` AS `id`, `prepareforsell`.`waterid` AS `waterid`, `prepareforsell`.`quality` AS `quality`, `prepareforsell`.`sellprice` AS `sellprice`, `prepareforsell`.`quality`* `prepareforsell`.`sellprice` AS `amount`, `prepareforsell`.`discount` AS `discount`, `prepareforsell`.`quality`* `prepareforsell`.`sellprice` * (`prepareforsell`.`discount` / 100) AS `amountdiscount`, `prepareforsell`.`customerid` AS `customerid`, `prepareforsell`.`factoryid` AS `factoryid`, `prepareforsell`.`userid` AS `userid` FROM `prepareforsell` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `factoryid` (`factoryid`) USING BTREE;

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_ibfk_1` (`province_id`);

--
-- Indexes for table `factory`
--
ALTER TABLE `factory`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- Indexes for table `factory_translate`
--
ALTER TABLE `factory_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factoryid` (`factoryid`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`) USING BTREE;

--
-- Indexes for table `language_source`
--
ALTER TABLE `language_source`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `language_translate`
--
ALTER TABLE `language_translate`
  ADD PRIMARY KEY (`id`,`language`) USING BTREE,
  ADD KEY `language_translate_idx_language` (`language`) USING BTREE;

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`) USING BTREE;

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `factoryid` (`factoryid`) USING BTREE;

--
-- Indexes for table `position_translate`
--
ALTER TABLE `position_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positionid` (`positionid`);

--
-- Indexes for table `prepareforsell`
--
ALTER TABLE `prepareforsell`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `waterid` (`waterid`) USING BTREE;

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salarypaid`
--
ALTER TABLE `salarypaid`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `stuffid` (`stuffid`) USING BTREE;

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `factory_id` (`factory_id`) USING BTREE,
  ADD KEY `post_id` (`position_id`) USING BTREE;

--
-- Indexes for table `stuffasuser`
--
ALTER TABLE `stuffasuser`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `stuffid` (`stuffid`) USING BTREE;

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factoryid` (`factoryid`);

--
-- Indexes for table `unit_translate`
--
ALTER TABLE `unit_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_translate_ibfk_1` (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`) USING BTREE;

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `water`
--
ALTER TABLE `water`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `factoryid` (`factoryid`) USING BTREE,
  ADD KEY `unitid` (`unitid`);

--
-- Indexes for table `wateradd`
--
ALTER TABLE `wateradd`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `wateradd_ibfk_1` (`waterid`) USING BTREE;

--
-- Indexes for table `watersale`
--
ALTER TABLE `watersale`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `waterid` (`waterid`) USING BTREE;

--
-- Indexes for table `water_translate`
--
ALTER TABLE `water_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waterid` (`waterid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດລູກຄ້າ', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `factory`
--
ALTER TABLE `factory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດໂຮງງານ', AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `factory_translate`
--
ALTER TABLE `factory_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `language_source`
--
ALTER TABLE `language_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `position_translate`
--
ALTER TABLE `position_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prepareforsell`
--
ALTER TABLE `prepareforsell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ', AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stuff`
--
ALTER TABLE `stuff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stuffasuser`
--
ALTER TABLE `stuffasuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_translate`
--
ALTER TABLE `unit_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `water`
--
ALTER TABLE `water`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ', AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `wateradd`
--
ALTER TABLE `wateradd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ', AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `watersale`
--
ALTER TABLE `watersale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ', AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `water_translate`
--
ALTER TABLE `water_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`factoryid`) REFERENCES `factory` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Constraints for table `factory`
--
ALTER TABLE `factory`
  ADD CONSTRAINT `factory_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `factory_translate`
--
ALTER TABLE `factory_translate`
  ADD CONSTRAINT `factory_translate_ibfk_1` FOREIGN KEY (`factoryid`) REFERENCES `factory` (`id`);

--
-- Constraints for table `language_translate`
--
ALTER TABLE `language_translate`
  ADD CONSTRAINT `language_translate_ibfk_1` FOREIGN KEY (`language`) REFERENCES `language` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `language_translate_ibfk_2` FOREIGN KEY (`id`) REFERENCES `language_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`factoryid`) REFERENCES `factory` (`id`);

--
-- Constraints for table `position_translate`
--
ALTER TABLE `position_translate`
  ADD CONSTRAINT `position_translate_ibfk_1` FOREIGN KEY (`positionid`) REFERENCES `position` (`id`);

--
-- Constraints for table `prepareforsell`
--
ALTER TABLE `prepareforsell`
  ADD CONSTRAINT `prepareforsell_ibfk_1` FOREIGN KEY (`waterid`) REFERENCES `water` (`id`);

--
-- Constraints for table `salarypaid`
--
ALTER TABLE `salarypaid`
  ADD CONSTRAINT `salarypaid_ibfk_1` FOREIGN KEY (`stuffid`) REFERENCES `stuff` (`id`);

--
-- Constraints for table `stuff`
--
ALTER TABLE `stuff`
  ADD CONSTRAINT `stuff_ibfk_1` FOREIGN KEY (`factory_id`) REFERENCES `factory` (`id`),
  ADD CONSTRAINT `stuff_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Constraints for table `stuffasuser`
--
ALTER TABLE `stuffasuser`
  ADD CONSTRAINT `stuffasuser_ibfk_1` FOREIGN KEY (`stuffid`) REFERENCES `stuff` (`id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`factoryid`) REFERENCES `factory` (`id`);

--
-- Constraints for table `unit_translate`
--
ALTER TABLE `unit_translate`
  ADD CONSTRAINT `unit_translate_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`);

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `village_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`),
  ADD CONSTRAINT `village_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`);

--
-- Constraints for table `water`
--
ALTER TABLE `water`
  ADD CONSTRAINT `water_ibfk_1` FOREIGN KEY (`factoryid`) REFERENCES `factory` (`id`),
  ADD CONSTRAINT `water_ibfk_2` FOREIGN KEY (`unitid`) REFERENCES `unit` (`id`);

--
-- Constraints for table `wateradd`
--
ALTER TABLE `wateradd`
  ADD CONSTRAINT `wateradd_ibfk_1` FOREIGN KEY (`waterid`) REFERENCES `water` (`id`);

--
-- Constraints for table `watersale`
--
ALTER TABLE `watersale`
  ADD CONSTRAINT `watersale_ibfk_1` FOREIGN KEY (`waterid`) REFERENCES `water` (`id`);

--
-- Constraints for table `water_translate`
--
ALTER TABLE `water_translate`
  ADD CONSTRAINT `water_translate_ibfk_1` FOREIGN KEY (`waterid`) REFERENCES `water` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
