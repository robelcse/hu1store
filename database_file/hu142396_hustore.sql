-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 04:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hu142396_hustore`
--

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gift_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `amount_used` float(10,2) NOT NULL DEFAULT 0.00,
  `theme` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `gift_no`, `amount`, `currency`, `amount_used`, `theme`, `message`) VALUES
(1, '11607320147', 123.00, 'usd', 0.00, '7f7f7f', 'This is test gift'),
(10872, '108721607361147', 125.00, 'usd', 0.00, 'ed1c24', 'This is test Gift');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `provider` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `reg_price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `type`, `provider`, `title`, `image`, `details`, `price`, `reg_price`) VALUES
(1, 1, 1, 'Dell SE2417HGX 24 Inch', '1.jpg', 'Model: Dell SE2417HGX\r\nRedefining fast\r\nSmooth gameplay\r\nEffortlessly connect\r\nClear, quality visuals\r\n3 years Warranty', 187.00, 200.00),
(2, 2, 2, 'Dell SE2417HG 18 Inch', '2.jpg', 'Model: Dell SE2417HG\r\nType LED-backlit LCD monitor\r\nPanel Type TN\r\nResolution Full HD 1920 x 1080\r\nBrightness 300 cd/m²', 164.00, 188.00),
(3, 3, 3, 'Dell Ultra Thin LED Monitor', '3.jpg', 'No matter where you sit, colours stay\r\naccurate and consistent across the wide\r\n178 degree /178 degree viewing angle', 117.00, 120.00),
(4, 4, 4, 'ViewSonic HD LED Monitor', '4.jpg', 'Model: Viewsonic VX2276-SHD Monitor\r\nLow Input Lag\r\nHard-Coating Shell\r\nANTI-GLARE Monitor\r\nMetalic Triangle Stand\r\n3 Years Warranty', 127.00, 135.00),
(5, 2, 5, 'Samsung 23.6 Inch LED Monitor', '5.jpg', 'Screen Size: 23.6\" LED\r\nContrast Ratio: 3000:1\r\nResolution: 1366 x 768\r\n3 Years warrenty', 276.00, 317.00),
(6, 4, 6, 'Samsung Monitor High Glossy Finish', '6.jpg', 'Resolution: 1920x1080\r\nScreen Size: 21.5\"\r\nBrightness: 200cd/m2\r\nMade in China.\r\n3 Years Warranty', 117.00, 129.00),
(7, 4, 7, 'Hp 21.5 Inch LED Monitor (E221i)', '7.jpg', '21.5 Inch LED Display\r\nScreen resolution: 1920x1080 Pixel\r\nResponse time: 8ms (gray to gray)\r\nRefresh rate: 50-76 Hz\r\n3 Year Warranty', 164.00, 176.00),
(8, 5, 8, 'Samsung Monitor (S19C300NY)', '8.jpg', 'Size: 18.5\"\r\nBrightness: 200\r\nMade in China.\r\nWarranty: 3 Years', 82.00, 88.00),
(9, 4, 9, 'Benq Zowie XL2411P 24\" E-Sports Monitor', '9.jpg', 'Lightning-fast 144 Hz refresh rate performance for a smooth gaming experience', 328.00, 335.00),
(10, 4, 10, 'Xiaomi Redmi Gaming Monitor 23.8\"', '10.jpg', 'Best Budget Gaming Monitor\r\n23.8 Inch Ultra-Thin 1080P HD\r\nIPS 178° Wide Angle Display Screen\r\nMachine power: 24W Max.\r\n1 Year Warranty', 158.00, 170.00),
(11, 4, 11, 'SSD- SU 630 2.5\" Solid State Drive', '11.jpg', 'If you’re looking to replace that HDD of\r\nyours with an SSD, look no further than\r\nthe ADATA SU630', 37.00, 47.00),
(12, 6, 12, '240GB M2 ADATA SU650 3D Internal SSD', '12.jpg', '240GB ADATA M.2 2280 SATA III SSD\r\nRead/Write speed up to 520MB/s to 450MB/s *\r\n3D TLC NAND technology', 38.00, 47.00),
(13, 2, 13, 'Transcend 420S 120GB M.2 SSD', '13.jpg', 'Model: Transcend 420S\r\nCapacity 120GB\r\nFlash Type 3D NAND flash\r\nInterface SATA III 6Gb/s', 32.00, 41.00),
(14, 2, 14, 'Transcend 256GB 2.5\" SATAIII SSD', '14.jpg', 'Model: Transcend 230S\r\nCapacity: 256GB\r\nInterface: SATA III 6Gb/s\r\n3D NAND flash\r\nWarranty: 05 years Warranty', 49.00, 58.00),
(15, 4, 15, 'Samsung T3 Portable SSD', '15.jpg', 'Portable Design with Internal SSD-level Performance\r\nSuperfast Read-Write Speeds of up to 450 MB/s', 152.00, 164.00),
(16, 4, 16, 'HV-MS998GT Wireless Optical Mouse', '16.jpg', 'Comfortable plug-and-play mouse with\r\nan optical precision.The low-profile shapeof Wireless Optical mouse feels good ineither hand, even after a long day of work free moving in 10 meters', 5.00, 6.00),
(17, 4, 17, 'HAVIT MS1001 RGB Gaming mouse', '17.jpg', 'Brand: Havit\r\nModel MS1001\r\nMouse Type: USB\r\nThe number of keys:7', 10.00, 11.00),
(18, 2, 18, 'Havit MS1023 RGB Programmable Mouse', '18.jpg', 'One click to switch the DPI.\r\nSix gears of mouse adjustment(800-1600-\r\n2400-3200-4800-6400DPI)', 12.00, 15.00),
(19, 2, 19, 'Xiaomi Mouse Wireless Game Mouse', '19.jpg', '1.RGB light :Adjustable breathable backlight.\r\n2.3.Fashionable design, confortable to grip.\r\n3.2 working mode USB braided wire or\r\nWirless according your preference', 106.00, 130.00),
(20, 4, 20, 'El016 Toys Mouse Bullet Funny Toys', '20.jpg', '1. Multiple powerful speed and vibration\r\n2. 100% waterproof design allows \r\nmassager to be washed with water.\r\n3. Easy to Use and Clean.Please clean I\r\nt before and after using it.\r\n ', 8.00, 9.00),
(21, 4, 21, 'YINDIAO V4 Gaming Keyboard USB', '21.jpg', 'Rich multimedia function key, press FN key + corresponding function key F1-F12 to trigger\r\nApplicable models: general\r\nType: Gaming keyboard\r\nNumber of keys: 104 keys', 33.00, 48.00),
(22, 2, 22, '4GB Android 4.4 Wi-Fi Tablet PC', '22.jpg', 'Tablet Capably Runs Android 4.4 Operating System - Also Known as Kit Kat;Lightweight, Compact & Ergonomic Tablet Design Fits Perfectly in Little Hands', 57.00, 83.00),
(23, 4, 23, 'Ultra-slim Wireless Keyboard Bluetooth 3.0', '23.jpg', 'ons:78 keys\r\nMaterial: Aluminum alloy\r\nConnection: On/Off switch\r\nType: Wireless Bluetooth Keyboard\r\nBluetooth Version: 3.0, 2.0, 1.1, 1.0\r\nColor: White', 25.00, 36.00),
(24, 1, 24, 'Leshp Portable Wireless 3.0 Keyboard', '24.jpg', 'Ultra Thin and Light: Compact size and light weight allows easily carried and packed backpack, messager bag or case.\r\nComfortable, quiet typing', 15.00, 19.00),
(25, 4, 25, 'Crystal Cleaning Gel Magic To Dust 2', '25.jpg', 'Effectively and directly absorb the dust and dust in the crevice and never fly around.\r\nExperiments show that it can kill common bacteria effectively', 10.00, 12.00),
(26, 7, 26, 'Havit SK708 RGB Gaming USB Speaker', '26.jpg', 'Product details of Havit SK708 RGB Gaming USB Speaker', 8.00, 9.00),
(27, 4, 27, 'H2239D - Gaming Wired Headphone - Black', '27.jpg', 'Surround sound, external noise reducing, with metal wire mesh and cool red led light which brings you small family theater experience', 13.00, 18.00),
(28, 2, 28, 'HAVIT H2232D RGB Gaming Headset 3.5mm Audio', '28.jpg', 'The dual large 50mm drivers of HAVIT H2232D RGB Gaming Headset pump out powerful audio. Virtual surround sound provides you with an upgraded level of audio precision, never miss any sound for fast action in games', 21.00, 36.00),
(29, 1, 29, 'Microlab M223 Multimedia (2.1) Subwoofer Speaker', '29.jpg', 'Dimensions: Subwoofer dimension: 155 x 228 x 285 mm Satellites dimension: 89 x 152 x 97 mm Product net weight: 3.6 kg Product giftbox: 320 x 204 x 353 mm (W x D x H)', 33.00, 42.00),
(30, 1, 30, 'Microlab M109 Multimedia Speaker', '30.jpg', 'Quality speakers designed for multimedia and computer application, Microlabs X-bass technology for depth and resolution, 2.1 subwoofer system that fills room with clear', 22.00, 24.00),
(31, 1, 31, 'R5 230 GPU Gaming Desktop Computer PC', '31.jpg', 'Brand: Mingying Model: R5 230 1G Type: entry level Chip model: R5 220 Core bit width: 64bit Graphics card slot: PCI-E 3.0', 37.00, 87.00),
(32, 1, 32, 'Jonsbo VC-4 Video Card Stand 5V 3Pin ARGB', '32.jpg', 'Feature: 1. Nine magic colors can be defined as lamp beads, with more than 16 million color changes, which can be adjusted by using the main board ARGB lamp effect, and the main board without ARGB function can also be adjusted by using the controller', 26.00, 54.00),
(33, 1, 33, 'PHANTEKS PC Image Card Gaming PCI-E X16', '33.jpg', '1. 220mm case extension PIC cable supports vertical installation of all brand video cards;2. For the hole spacing of 12.5cm, it is necessary to measure the size of bracket hole before purchase;3. Vertical installation can show the whole picture of the video card, showing different visual effects', 37.00, 75.00),
(34, 1, 34, 'Computer PC RGB Color-Changing Symphony LED', '34.jpg', 'Model: Colorful inside and outside of the squareInterface: 3pin + large 4DSpeed: 1200RPMWorking voltage: 12V', 11.00, 23.00),
(35, 1, 35, 'Mingying GTX 950 4GB 128Bit GDDR5 VGA Cards', '35.jpg', 'Brand: mingying / MingyingModel: GTX950M 4GType: Competitive EditionChip model: GTX950M', 135.00, 433.00),
(36, 1, 36, '3 Fan Universal GPU PCI Video Card', '36.jpg', 'image card partner, general-purpose image card cooling fan, support colorful lights. Unleash the performance of the image card to solve the high temperature problem, and the large air volume helps the image card to dissipate heat', 37.00, 70.00),
(37, 1, 37, 'Colorful GeForce GTX 1650 SUPER', '37.jpg', 'Dual Fans Compact size New Appearance Design GDDR6 Memory Chip Series:GeForce® GTX 1650 SUPER NB 4G-V Product Series:Colorful Series GPU Code Name:TU116 Manufacturing Process:12nm CUDA Cores:1280', 346.00, 457.00),
(38, 1, 38, 'GT210 Graphics Card 512MB GDDR2', '38.jpg', 'Brand: Mingying Model: GT210 512MB Genre: Game level Chip model: GT210 Core bit width: 64bit Graphics card slot: PCI-E 3.0 Interface: DVI HDMI VGA Memory capacity: 512MB Memory type: GDDR2', 55.00, 71.00),
(39, 1, 39, 'GeForce GTX 750 Ti 4GB DDR5 Graphics Card', '39.jpg', 'NVIDIA GeForce GTX 750 Ti Bus Standard –> PCI Express 3.0 Video Memory –> GDDR5 4096MB Memory Clock –> 7Gbps Memory Interface –> 128-Bit', 147.00, 159.00),
(40, 1, 40, 'Gigabyte 2GB DDR5 Graphics Card', '40.jpg', 'Integrated with 2GB GDDR5 64bit memory Supports HDMI 4K@60Hz Smooth 4K video playback and HTML5 web browsing', 112.00, 141.00),
(41, 1, 41, 'Intel Chipset G31 DDR2 Motherboard', '41.jpg', 'Return & Warranty Policy 7 Days Returns (Change of mind is not applicable) 1 YearService Warranty.', 24.00, 30.00),
(42, 1, 42, 'DESKTOP MOTHER BOARD H81 CHIPSET', '42.jpg', 'Brand - (Brand :Asus/msi/gigabyte/Asrock/Foxcon/Bioster) CPU Sockets - LGA1150 Chipset - Intel H81 Express Ram type - DDR3 Ram Bus - 1333/1600/1666MHz Maximum Ram supported - 16GB', 43.00, 50.00),
(43, 1, 43, 'Gigabyte G41 Motherboard', '43.jpg', 'Gigabyte G41 DDR-3 Motherboard Max Mainboard Size micro ATX Manufacturer Gigabyte Chipset Type Intel G41 Express / Intel ICH10 Max Bus Speed 1333 MHz Processor Socket LGA775 Socket', 32.00, 42.00),
(44, 1, 44, 'STAREX G-41 MOTHERBOARD', '44.jpg', 'Starex G41 mainboard has Intel G41 chipset, FSB support 1066 / 1333, memory support  DDR3 DIMM memory slot, maximum support up to 8 gigabyte memory, expansion slot 1 x PCI slot, storage 4 x SATA connector, 1 x IDE connector, USB 4 x USB 2.0 port, 2 x USB 2.0 header.', 29.00, 33.00),
(45, 1, 45, 'Raspberry Pi 4 Model B - 4GB RAM', '45.jpg', 'Broadcom BCM2711, Quad core Cortex-A72 (ARM v8) 64-bit SoC @ 1.5GHz 4GB LPDDR4-3200 SDRAM 2.4 GHz and 5.0 GHz IEEE 802.11ac wireless, Bluetooth 5.0, BLE Gigabit Ethernet 2 USB 3.0 ports; 2 USB 2.0 ports', 90.00, 104.00),
(46, 1, 46, 'MSI B450M Pro-M2 Socket Mainboard', '46.jpg', 'Brand - MSI Model - MSI B450M Pro-M2 Max CPU Sockets - AM4 Form factor - mATX Chipset - AMD B450 Chipset Supported Cpu -AMD Ryzen 1st/2nd/3rd Generation / Ryzen with Radeon Vega Graphics Processors & Athlon with Radeon Vega Graphics', 93.00, 106.00),
(47, 1, 47, 'RASPBERRY PI 4 MODEL LPDDR4', '47.jpg', 'DetailsBROADCOM SOC:Broadcom 2711PROCESSOR:ARM Cortex A72No. of CORES:QuadCPU SPEED:1.5GHzMEMORY:4GBGRAPHICS (GPU):VideoCore VI 4kp60Video Ports:2 x micro HDMIUSB PORTS:2 x USB3.0 & 2 x USB2.0GPIO HEADER:40A/V JACK:3.5mm StereoMICRO SD ', 76.00, 85.00),
(48, 1, 48, 'Asus H61M-lx plus Motherboard', '48.jpg', 'UEFI BIOS (EZ Mode) - Flexible & Easy BIOS Interface AI Suite II - One-stop Access to Innovative ASUS Features 100% Xtreme Durable Solid Capacitor - High-quality Capacitors', 41.00, 44.00),
(49, 1, 49, 'H81 MOTHER BOARD', '49.jpg', '1 Years Warranty Brand - (Brand :Asus/msi/gigabyte/Asrock/Foxcon/Bioster) CPU Sockets - LGA1150 Chipset - Intel H81 Express Ram type - DDR3 Ram Bus - 1333/1600/1666MHz Maximum Ram supported - 16GB', 42.00, 57.00),
(50, 1, 50, 'Gigabyte Aorus M2 6200 Gaming Mouse', '50.jpg', 'Interface USB Tracking System Gaming Optical Sensor (Pixart 3327) Sensitivity 200~6200dpi with 100dpi increments (Default: 400/800/1600/3200dpi) Report Rate 125/ 500/ 1000Hz Scrolling Standard', 17.00, 18.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `item` int(10) UNSIGNED NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `payment_status` enum('unpaid','paid') NOT NULL DEFAULT 'unpaid',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `item`, `item_price`, `currency`, `address_line_1`, `address_line_2`, `country`, `city`, `state`, `zip`, `payment_status`, `create_at`, `updated_at`) VALUES
(11111, 'Md Rashadul Islam', 'itsrashad@gmail.com', 5, 276.00, 'usd', '1234, Badda', NULL, 'Bangladesh', 'Dhaka', 'Dhaka', '1206', 'paid', '2020-12-07 10:29:04', '2020-12-07 10:29:07'),
(11112, 'Yeo Mccarthy', 'pizejavow@mailinator.com', 2, 164.00, 'usd', '45 East New Extension', 'Qui qui sit natus ha', 'Et et in natus maxim', 'Magna ipsam nesciunt', 'Quasi quibusdam unde', '35282', 'unpaid', '2020-12-23 23:16:09', '2020-12-23 23:16:09'),
(11113, 'Jared Burch', 'nogetoce@mailinator.com', 2, 164.00, 'usd', '54 East Green Cowley Boulevard', 'Omnis quia est venia', 'Aut libero ut qui ip', 'Nihil sed ullam duci', 'Quisquam ea aut veni', '99452', 'unpaid', '2020-12-26 04:50:29', '2020-12-26 04:50:29'),
(11114, 'Mohammad Sajjad Hossain', 'admin@gmail.com', 2, 164.00, 'usd', 'Niketon', 'Bazar', 'Bangladesh', 'Dhaka', 'Asia', '1219', 'unpaid', '2020-12-26 05:13:02', '2020-12-26 05:13:02'),
(11115, 'Mohammad Sajjad Hossain', 'admin@gmail.com', 2, 164.00, 'usd', 'Niketon', 'Bazar', 'Bangladesh', 'Dhaka', 'Asia', '1219', 'unpaid', '2020-12-26 05:13:29', '2020-12-26 05:13:29'),
(11116, 'Tanek Sargent', 'puna@mailinator.com', 1, 187.00, 'usd', '61 Fabien Road', 'Ipsa aliquam perspi', 'Obcaecati aut perfer', 'Enim deserunt dolore', 'Mollitia dolor ut vo', '27544', 'unpaid', '2021-01-03 11:50:28', '2021-01-03 11:50:28'),
(11117, 'Adam Shaffer', 'wiqadeviq@mailinator.com', 2, 164.00, 'usd', '60 Oak Parkway', 'Incididunt quasi qui', 'Elit iste velit min', 'Quia qui laboris exc', 'Sed numquam sed et d', '41136', 'unpaid', '2021-01-03 12:56:20', '2021-01-03 12:56:20'),
(11118, 'Willa Reed', 'meqawe@mailinator.com', 2, 164.00, 'usd', '81 West Fabien Freeway', 'Dolor ex veniam rei', 'Sapiente eveniet do', 'Rerum officia in eni', 'Ratione consectetur', '88275', 'unpaid', '2021-01-03 14:21:54', '2021-01-03 14:21:54'),
(11119, 'Brielle Mccormick', 'tyzotif@mailinator.com', 3, 117.00, 'usd', '59 White Fabien Street', 'Commodi voluptas lau', 'Exercitation facere', 'Eveniet maiores ips', 'Veniam ut illo Nam', '10632', 'unpaid', '2021-01-03 14:24:30', '2021-01-03 14:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` bigint(20) UNSIGNED DEFAULT NULL,
  `gift` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `tx_id` varchar(255) NOT NULL,
  `tx_status` enum('pending','success','error','cancel') NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `data` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order`, `gift`, `name`, `tx_id`, `tx_status`, `payment_method`, `amount`, `currency`, `data`, `datetime`) VALUES
(11111, 11111, NULL, 'Md Rashadul Islam', '1038351287', 'success', 'card', 276.00, 'usd', '{\"cardTransactionType\":\"AUTH_CAPTURE\",\"transactionId\":\"1038351287\",\"softDescriptor\":\"BLS*onboardingDefault\",\"amount\":276.00,\"usdAmount\":276.00,\"currency\":\"USD\",\"transactionApprovalDate\":\"12/07/2020\",\"transactionApprovalTime\":\"08:29:06\",\"cardHolderInfo\":{\"firstName\":\"Md\",\"lastName\":\"Rashadul\",\"email\":\"itsrashad@gmail.com\",\"zip\":\"1206\"},\"vaultedShopperId\":29661805,\"creditCard\":{\"cardLastFourDigits\":\"9299\",\"cardType\":\"VISA\",\"cardSubType\":\"CREDIT\",\"cardCategory\":\"PLATINUM\",\"binCategory\":\"CONSUMER\",\"binNumber\":\"426398\",\"cardRegulated\":\"N\",\"issuingBank\":\"ALLIED IRISH BANKS PLC\",\"expirationMonth\":\"04\",\"expirationYear\":\"2023\",\"issuingCountryCode\":\"ie\"},\"processingInfo\":{\"processingStatus\":\"success\",\"cvvResponseCode\":\"NM\",\"authorizationCode\":\"123456\",\"avsResponseCodeZip\":\"U\",\"avsResponseCodeAddress\":\"U\",\"avsResponseCodeName\":\"U\"},\"fraudResultInfo\":{}}', '2020-12-07 10:29:07'),
(11112, NULL, 10872, 'Md Rashadul Islam', '1038352057', 'success', 'card', 125.00, 'usd', '{\"cardTransactionType\":\"AUTH_CAPTURE\",\"transactionId\":\"1038352057\",\"softDescriptor\":\"BLS*onboardingDefault\",\"amount\":125.00,\"usdAmount\":125.00,\"currency\":\"USD\",\"transactionApprovalDate\":\"12/07/2020\",\"transactionApprovalTime\":\"09:12:26\",\"cardHolderInfo\":{\"firstName\":\"Md\",\"lastName\":\"Rashadul\"},\"vaultedShopperId\":29662085,\"creditCard\":{\"cardLastFourDigits\":\"9299\",\"cardType\":\"VISA\",\"cardSubType\":\"CREDIT\",\"cardCategory\":\"PLATINUM\",\"binCategory\":\"CONSUMER\",\"binNumber\":\"426398\",\"cardRegulated\":\"N\",\"issuingBank\":\"ALLIED IRISH BANKS PLC\",\"expirationMonth\":\"04\",\"expirationYear\":\"2023\",\"issuingCountryCode\":\"ie\"},\"processingInfo\":{\"processingStatus\":\"success\",\"cvvResponseCode\":\"NM\",\"authorizationCode\":\"123456\",\"avsResponseCodeZip\":\"U\",\"avsResponseCodeAddress\":\"U\",\"avsResponseCodeName\":\"U\"},\"fraudResultInfo\":{}}', '2020-12-07 11:12:27'),
(11113, 11112, NULL, 'Md.Robel Miah', '', 'error', 'card', 164.00, 'usd', '{\"message\":[{\"errorName\":\"BLS_NO_SUCH_SHOPPER_PAYMENT_METHOD\",\"code\":\"10000\",\"description\":\"The order failed because shopper payment details were incorrect or insufficient.\"}]}', '2020-12-23 23:16:10'),
(11114, 11113, NULL, 'Md. Robel Ahammed', '', 'error', 'card', 164.00, 'usd', '{\"message\":[{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"Order creation failure due to problematic input.\"},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"\'Card Number\' should be a valid Credit Card\",\"invalidProperty\":{\"name\":\"cardNumber\",\"messageValue\":\"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX1111\"}},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"\'Card Number\' should be between 12 and 21 characters long.\",\"invalidProperty\":{\"name\":\"cardNumber\",\"messageValue\":\"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX1111\"}}]}', '2020-12-26 04:50:29'),
(11115, 11114, NULL, 'Md Sajjad', '', 'error', 'card', 164.00, 'usd', '{\"message\":[{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"Order creation failure due to problematic input.\"},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"\'Card Number\' should be a valid Credit Card\",\"invalidProperty\":{\"name\":\"cardNumber\",\"messageValue\":\"XXXXX2122\"}},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"\'Card Number\' should be between 12 and 21 characters long.\",\"invalidProperty\":{\"name\":\"cardNumber\",\"messageValue\":\"XXXXX2122\"}},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"Field \'Card Type\' is required.\",\"invalidProperty\":{\"name\":\"cardType\"}},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"Card type is not supported.\"},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"The stated credit card expiration date has already passed.\",\"invalidProperty\":{\"name\":\"expirationMonth\"}}]}', '2020-12-26 05:13:02'),
(11116, 11115, NULL, 'Md Sajjad', '', 'error', 'card', 164.00, 'usd', '{\"message\":[{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"Order creation failure due to problematic input.\"},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"\'Card Number\' should be a valid Credit Card\",\"invalidProperty\":{\"name\":\"cardNumber\",\"messageValue\":\"XXXXX2122\"}},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"\'Card Number\' should be between 12 and 21 characters long.\",\"invalidProperty\":{\"name\":\"cardNumber\",\"messageValue\":\"XXXXX2122\"}},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"Field \'Card Type\' is required.\",\"invalidProperty\":{\"name\":\"cardType\"}},{\"errorName\":\"VALIDATION_GENERAL_FAILURE\",\"code\":\"10001\",\"description\":\"Card type is not supported.\"}]}', '2020-12-26 05:13:29'),
(11117, 11116, NULL, 'Robal Hasan', '', 'error', 'card', 187.00, 'usd', '{\"errorCode\":\"403\",\"errorDescription\":\"Forbidden Error\"}', '2021-01-03 11:50:30'),
(11118, 11117, NULL, 'Linda Brock', '', 'error', 'card', 164.00, 'usd', '{\"errorCode\":\"403\",\"errorDescription\":\"Forbidden Error\"}', '2021-01-03 12:56:21'),
(11119, 11118, NULL, 'asdas adasdas', '', 'error', 'card', 164.00, 'usd', '{\"errorCode\":\"403\",\"errorDescription\":\"Forbidden Error\"}', '2021-01-03 14:21:56'),
(11120, 11119, NULL, 'hgfh gjhgj', '', 'error', 'card', 117.00, 'usd', '{\"errorCode\":\"403\",\"errorDescription\":\"Forbidden Error\"}', '2021-01-03 14:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`) VALUES
(1, 'Dell'),
(2, 'Dell'),
(3, 'Dell'),
(4, 'ViewSonic'),
(5, 'Samsung'),
(6, 'Samsung'),
(7, 'HP'),
(8, 'Samsung'),
(9, 'Benq'),
(10, 'Xiaomi'),
(11, 'Adata'),
(12, 'Adata'),
(13, 'Transcend'),
(14, 'Transcend'),
(15, 'Samsung'),
(16, 'Havit'),
(17, 'Havit'),
(18, 'Havit'),
(19, 'Active4u'),
(20, 'Active4u'),
(21, 'Bradoo'),
(22, 'Bradoo'),
(23, 'Bradoo'),
(24, 'Active4u'),
(25, 'Active4u'),
(26, 'Havit'),
(27, 'Havit'),
(28, 'Havit'),
(29, 'Microlab'),
(30, 'Microlab'),
(31, 'Lemon'),
(32, 'Lemon'),
(33, 'Lemon'),
(34, 'Lemon'),
(35, 'Lemon'),
(36, 'Husbihe'),
(37, 'Husbihe'),
(38, 'Husbihe'),
(39, 'Afox'),
(40, 'Gigabyte'),
(41, 'Xplorer'),
(42, 'Rb technology'),
(43, 'Gigabyte'),
(44, 'Starex'),
(45, 'Raspberry Pi'),
(46, 'Msi'),
(47, 'Multi Fashion'),
(48, 'Asus'),
(49, 'RB Technology'),
(50, 'Gigabyte');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Computer components'),
(2, 'Computer components'),
(3, 'Computer components'),
(4, 'Computer components'),
(5, 'Computer components'),
(6, 'Computer components'),
(7, 'Computer components'),
(8, 'Computer components');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gift_no` (`gift_no`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `provider` (`provider`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order` (`order`),
  ADD KEY `gift` (`gift`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10873;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11120;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11121;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`type`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`provider`) REFERENCES `providers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item`) REFERENCES `items` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`gift`) REFERENCES `gifts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
