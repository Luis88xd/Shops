-- phpMyAdmin SQL Dump
-- version 4.1.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 23 Sty 2014, 11:32
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `sortable`
--

CREATE TABLE `sortable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(255) NOT NULL,
  `ord` int(11) NOT NULL, -- THIS MUST BE AN INT
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Downloaded table `sortable`
--

INSERT INTO `sortable` (`id`, `photo_name`, `ord`) VALUES
(1, '1.jpg', 3),
(2, '2.jpg', 2),
(3, '3.jpg', 4),
(4, '4.jpg', 0),
(5, '5.jpg', 1),
(6, '6.jpg', 5);
