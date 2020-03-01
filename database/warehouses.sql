-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2020 at 08:45 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouses`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acos_lft_rght` (`lft`,`rght`),
  KEY `idx_acos_alias` (`alias`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 42),
(2, 1, NULL, NULL, 'ArticleLocations', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'getData', 7, 8),
(6, 2, NULL, NULL, 'save', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Articles', 14, 29),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'search', 17, 18),
(11, 8, NULL, NULL, 'getData', 19, 20),
(12, 8, NULL, NULL, 'view', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 8, NULL, NULL, 'export', 25, 26),
(15, 8, NULL, NULL, 'pdfExport', 27, 28),
(16, 1, NULL, NULL, 'Consumables', 30, 39),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'view', 33, 34),
(19, 16, NULL, NULL, 'save', 35, 36),
(20, 16, NULL, NULL, 'delete', 37, 38),
(21, 1, NULL, NULL, 'Excel', 40, 41);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_aros_lft_rght` (`lft`,`rght`),
  KEY `idx_aros_alias` (`alias`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 5, NULL, 1, 4),
(2, NULL, 'Group', 6, NULL, 5, 8),
(3, NULL, 'Group', 7, NULL, 9, 12),
(4, 1, 'User', 13, NULL, 2, 3),
(5, 2, 'User', 14, NULL, 6, 7),
(6, 3, 'User', 15, NULL, 10, 11),
(7, NULL, 'Group', 8, NULL, 13, 14),
(8, NULL, 'Group', 9, NULL, 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  KEY `idx_aco_id` (`aco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 7, 1, '1', '1', '1', '1'),
(2, 8, 1, '-1', '-1', '-1', '-1'),
(3, 8, 16, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `reversed` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type_number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_type_idx` (`type_id`),
  KEY `fk_article_unit_idx` (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30222 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `article_locations`
--

DROP TABLE IF EXISTS `article_locations`;
CREATE TABLE IF NOT EXISTS `article_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `warehouse_location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_address_id_idx` (`article_id`),
  KEY `fk_locations_id_idx` (`warehouse_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `article_transfers`
--

DROP TABLE IF EXISTS `article_transfers`;
CREATE TABLE IF NOT EXISTS `article_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `required_amount` int(11) NOT NULL,
  `sent_amount` int(11) NOT NULL,
  `article_transferscol` int(11) NOT NULL,
  `sent_address` int(11) NOT NULL,
  `address_acceptance` varchar(255) NOT NULL,
  `warehouse_article_location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_article_transfer_idx` (`article_id`),
  KEY `fk_address_idx` (`warehouse_article_location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consumables`
--

DROP TABLE IF EXISTS `consumables`;
CREATE TABLE IF NOT EXISTS `consumables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `consumable_status` enum('draft','in use','phase out','obsolete') NOT NULL,
  `recommended_rating` enum('platinum','gold','silver') NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_consumable_name_idx` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `hs_number` varchar(45) DEFAULT NULL,
  `tax_group` int(11) DEFAULT NULL,
  `product_eccn` varchar(10) DEFAULT NULL,
  `release_date` varchar(20) DEFAULT NULL,
  `for_distributors` tinyint(1) DEFAULT NULL,
  `product_status` enum('draft','for sale','phase out','obsolete','nrnd') NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `service_production` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_goods_name_idx` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12034 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(8, 'Administrators', '2020-03-01 18:43:57', '2020-03-01 18:43:57'),
(9, 'Workers', '2020-03-01 18:44:04', '2020-03-01 18:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `status` enum('draft','in use','phase out','obsolete') NOT NULL,
  `recommended_rating` enum('platinum','gold','silver') DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_article_name_idx` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kits`
--

DROP TABLE IF EXISTS `kits`;
CREATE TABLE IF NOT EXISTS `kits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `hs_number` int(11) DEFAULT NULL,
  `tax_group` int(11) DEFAULT NULL,
  `product_eccn` varchar(5) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `for_distributors` tinyint(1) DEFAULT NULL,
  `kit_status` enum('draft','for sale','phase out','obsolete','nrnd') NOT NULL,
  `hide_kit_content` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_kit_name_idx` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `material_status` enum('development','in use','phase out','obsolete') DEFAULT NULL,
  `service_production` tinyint(1) DEFAULT NULL,
  `recommended_rating` enum('platinum','gold','silver') DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_article_idx` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9685 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

DROP TABLE IF EXISTS `operators`;
CREATE TABLE IF NOT EXISTS `operators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perrmission` tinyint(1) NOT NULL,
  `warehouse_place_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_users_idx` (`users_id`),
  KEY `fk_warehouse_places_idx` (`warehouse_place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `hs_number` int(11) DEFAULT NULL,
  `tax_group` int(11) DEFAULT NULL,
  `product_eccn` varchar(5) DEFAULT NULL,
  `release_date` varchar(45) DEFAULT NULL,
  `for_distributors` tinyint(1) DEFAULT NULL,
  `product_status` enum('development','for sale','phase out','obsolete','nrnd') NOT NULL,
  `service_production` tinyint(1) NOT NULL,
  `project` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `article_id_UNIQUE` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semi_products`
--

DROP TABLE IF EXISTS `semi_products`;
CREATE TABLE IF NOT EXISTS `semi_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `semi_product_status` enum('development','in use','phase out','obsolete') NOT NULL,
  `service_production` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_semi_article_idx` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_products`
--

DROP TABLE IF EXISTS `service_products`;
CREATE TABLE IF NOT EXISTS `service_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `hs_number` int(11) DEFAULT NULL,
  `tax_group` int(11) DEFAULT NULL,
  `service_eccn` varchar(5) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `for_distributors` tinyint(1) DEFAULT NULL,
  `service_status` enum('development','for sale','phase out','obsolete') NOT NULL,
  `project` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_service_name_idx` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `service_status` enum('draft','in use','phase out','obsolete') NOT NULL,
  `recommended_rating` enum('platinum','gold','silver') DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_supplier_name_idx` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transfer_code` varchar(255) DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `created_transfer` varchar(255) DEFAULT NULL,
  `transfer_place` varchar(255) DEFAULT NULL,
  `transfer_from_place` varchar(45) DEFAULT NULL,
  `good_release` varchar(255) DEFAULT NULL,
  `transfer_status` enum('otvoren','poslat','spreman','isporucen','otkazan') DEFAULT NULL,
  `transfer_type` tinyint(1) DEFAULT NULL,
  `warehouse_place_id` int(11) NOT NULL,
  `warehouse_addresses_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `article_transfers_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_places_idx` (`warehouse_place_id`),
  KEY `fk_adresses_idx` (`warehouse_addresses_id`),
  KEY `fk_users_idx` (`users_id`),
  KEY `fk_warehouse_article_idx` (`article_transfers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` enum('product','kit','material','semi_product','service_product','service_supplier','consumable','inventory','goods','other') NOT NULL,
  `tangible` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `code`, `name`, `class`, `tangible`, `active`, `created`, `modified`) VALUES
(2, 'SMD', 'SMD Komponente', 'material', 1, 1, '2019-12-19 16:17:29', '2020-01-15 14:49:54'),
(3, 'THR', 'Through Hole Komponente', 'material', 1, 1, '2019-12-19 16:18:02', '2019-12-19 16:18:02'),
(4, 'PCB', 'PCB ploce', 'material', 1, 1, '2019-12-19 16:18:27', '2019-12-19 16:18:27'),
(5, 'DOK', 'Dokumentacija', 'material', 1, 1, '2019-12-19 16:18:47', '2019-12-19 16:18:47'),
(6, 'KIT', 'Kitovi', 'kit', 1, 1, '2019-12-19 16:19:17', '2019-12-19 16:19:17'),
(7, 'PP', 'Poluproizvod', 'semi_product', 1, 1, '2019-12-19 16:19:46', '2019-12-19 16:19:46'),
(8, 'U SLPR', 'Payment Request', 'service_product', 0, 1, '2019-12-19 16:21:43', '2019-12-19 16:21:43'),
(9, 'U SLKFL', 'Key File License', 'service_product', 0, 1, '2019-12-19 16:23:34', '2019-12-19 16:23:34'),
(10, 'RND', 'Razvoj', 'service_product', 0, 1, '2019-12-19 16:24:02', '2019-12-19 16:24:02'),
(11, 'DNGL', 'USB Dongle License', 'service_product', 1, 1, '2019-12-19 16:24:58', '2019-12-19 16:24:58'),
(12, 'ELD', 'Electronic License Delivery', 'service_product', 0, 1, '2019-12-19 16:25:57', '2019-12-26 12:56:48'),
(13, 'IZRDKUT', 'Izrada kutije', 'service_supplier', 0, 1, '2019-12-19 16:27:54', '2019-12-19 16:27:54'),
(14, 'FARPRO', 'Farbanje proizvoda', 'service_supplier', 0, 1, '2019-12-19 16:28:31', '2019-12-19 16:28:31'),
(15, 'GOD', 'Roba', 'goods', 1, 1, '2019-12-19 16:29:28', '2019-12-19 16:29:28'),
(16, 'POT', 'Potrosni material', 'consumable', 1, 1, '2019-12-19 16:29:52', '2019-12-19 16:29:52'),
(17, 'SI', 'Sitan invertar', 'inventory', 1, 1, '2019-12-19 16:30:13', '2019-12-19 16:30:13'),
(18, 'PTP01', 'Potrosna roba (PIS)', 'consumable', 1, 0, '2019-12-19 16:31:13', '2019-12-19 16:31:13'),
(19, 'PTP02', 'Repromaterial', 'material', 1, 0, '2019-12-19 16:31:42', '2019-12-19 16:31:42'),
(21, 'PTP03', 'Repromaterial', 'product', 1, 0, '2019-12-19 16:34:42', '2019-12-26 14:42:18'),
(22, 'PT04', 'Ostala roba(PIS)', 'other', 1, 0, '2019-12-19 16:35:17', '2019-12-19 16:35:17'),
(23, 'PRO', 'Proizvod', 'product', 1, 1, '2020-01-29 12:04:45', '2020-01-29 12:04:45'),
(26, '23', '23', 'product', 0, 0, '2020-01-31 14:05:36', '2020-01-31 14:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `symbol`, `active`, `created`, `modified`) VALUES
(8, 'Litar', 'l', 1, '2019-12-19 15:36:13', '2019-12-19 15:36:13'),
(9, 'Pakovanje', 'pak.', 1, '2019-12-19 15:36:28', '2019-12-20 15:48:38'),
(10, 'Gram', 'g', 1, '2019-12-19 15:36:36', '2019-12-19 15:36:36'),
(11, 'Kilogram', 'kg', 1, '2019-12-19 15:36:48', '2019-12-19 15:36:48'),
(12, 'Komad', 'kom', 1, '2019-12-19 15:37:06', '2019-12-19 15:37:06'),
(14, 'Jutar', 'j', 0, '2019-12-23 14:58:15', '2019-12-26 13:04:13'),
(15, 'Metar', 'm', 1, '2020-01-15 14:57:56', '2020-01-15 14:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `warehouse_id_UNIQUE` (`warehouse_id`),
  KEY `fk_warehouse_place_idx` (`warehouse_id`),
  KEY `fk_warehouse_id_idx` (`warehouse_id`),
  KEY `fk_groups_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `group_id`, `email`, `warehouse_id`, `created`, `modified`) VALUES
(18, 'sefan23', '$2a$10$uPQN7YkGg5QetlFBLGMWHuDQ6oOhsuuHshl24r4IeE/Mj33POJyh6', 'Stefan', 'Drmanic', 8, 'stefan@gmail.com', NULL, '2020-03-01 19:08:38', '2020-03-01 19:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_article_amount`
--

DROP TABLE IF EXISTS `warehouse_article_amount`;
CREATE TABLE IF NOT EXISTS `warehouse_article_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) DEFAULT NULL,
  `free_amount` int(11) DEFAULT NULL,
  `requried_amount` int(11) DEFAULT NULL,
  `usage` int(11) DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `warehouse_place_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_places_idx` (`warehouse_place_id`),
  KEY `fk_addresses` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_locations`
--

DROP TABLE IF EXISTS `warehouse_locations`;
CREATE TABLE IF NOT EXISTS `warehouse_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address_code` varchar(45) NOT NULL,
  `row` varchar(45) NOT NULL,
  `shelf` int(11) NOT NULL,
  `box` varchar(45) NOT NULL,
  `warehouse_place_id` int(11) NOT NULL,
  `barcode` bigint(40) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_warehouse_place_idx` (`warehouse_place_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_places`
--

DROP TABLE IF EXISTS `warehouse_places`;
CREATE TABLE IF NOT EXISTS `warehouse_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` enum('product','goods','service_product','material','semi_product','consumable','inventory') NOT NULL,
  `second_type` enum('product','goods','service_product','material','semi_product','consumable','inventory') DEFAULT NULL,
  `third_type` enum('product','goods','service_product','material','semi_product','consumable','inventory') DEFAULT NULL,
  `default` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_article_code` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_unit` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `article_locations`
--
ALTER TABLE `article_locations`
  ADD CONSTRAINT `fk_address_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_location_id` FOREIGN KEY (`warehouse_location_id`) REFERENCES `warehouse_locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_transfers`
--
ALTER TABLE `article_transfers`
  ADD CONSTRAINT `fk_address` FOREIGN KEY (`warehouse_article_location_id`) REFERENCES `article_locations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `consumables`
--
ALTER TABLE `consumables`
  ADD CONSTRAINT `fk_consumable_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `fk_goods_name` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `fk_inventory_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kits`
--
ALTER TABLE `kits`
  ADD CONSTRAINT `fk_kit_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `fk_material_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_warehouse_places` FOREIGN KEY (`warehouse_place_id`) REFERENCES `warehouse_places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semi_products`
--
ALTER TABLE `semi_products`
  ADD CONSTRAINT `fk_semi_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_products`
--
ALTER TABLE `service_products`
  ADD CONSTRAINT `fk_service_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `fk_suppliers_article` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `fk_articles` FOREIGN KEY (`article_transfers_id`) REFERENCES `article_transfers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_warehouse_address` FOREIGN KEY (`warehouse_addresses_id`) REFERENCES `warehouse_locations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_warehouse_place` FOREIGN KEY (`warehouse_place_id`) REFERENCES `warehouse_places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `warehouse_article_amount`
--
ALTER TABLE `warehouse_article_amount`
  ADD CONSTRAINT `fk_addresses` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_places` FOREIGN KEY (`warehouse_place_id`) REFERENCES `warehouse_places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `warehouse_locations`
--
ALTER TABLE `warehouse_locations`
  ADD CONSTRAINT `fk_address_warehouse` FOREIGN KEY (`warehouse_place_id`) REFERENCES `warehouse_places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
