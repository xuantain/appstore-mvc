-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 24, 2015 at 03:15 AM
-- Server version: 5.0.51
-- PHP Version: 5.5.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `appstore`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `categories`
-- 

CREATE TABLE `categories` (
  `cat_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(60) collate utf8_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `categories`
-- 

INSERT INTO `categories` VALUES (1, 1, 'Game', 1);
INSERT INTO `categories` VALUES (2, 1, 'Sports', 1);
INSERT INTO `categories` VALUES (3, 1, 'Education', 1);
INSERT INTO `categories` VALUES (4, 1, 'Tools', 1);
INSERT INTO `categories` VALUES (5, 1, 'Music & Audio', 1);
INSERT INTO `categories` VALUES (6, 1, 'Shoping', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `apps`
-- 

CREATE TABLE `apps` (
  `app_id` int(10) unsigned NOT NULL auto_increment,
  `cat_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `app_name` varchar(60) collate utf8_unicode_ci NOT NULL,
  `main_image` tinyint(2) NOT NULL,
  `type` varchar(20) collate utf8_unicode_ci NOT NULL,
  `link` varchar(100) collate utf8_unicode_ci NULL,
  `description` text collate utf8_unicode_ci NOT NULL,
  `price` float(10) NOT NULL,
  `watch` int(10) NULL,
  `active` varchar(60) collate utf8_unicode_ci NOT NULL,
  `download` int(10) NULL,
  PRIMARY KEY  (`app_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `apps`
-- 

INSERT INTO `apps` VALUES (1, 1, 1, 'ABCDF', 0, 'Android', '', 'Game game', 0, 1, 1, 1);
INSERT INTO `apps` VALUES (2, 1, 1, 'QQQWW', 0, 'iOS', '', 'Game game', 0, 1, 1, 1);
INSERT INTO `apps` VALUES (3, 1, 2, 'XSDFG', 0, 'Android', '', 'Game game', 0, 1, 1, 1);
INSERT INTO `apps` VALUES (4, 1, 2, 'T555Y', 0, 'iOS', '', 'Game game', 0, 1, 1, 1);
INSERT INTO `apps` VALUES (5, 2, 1, 'YBCDF', 0, 'Android', '', 'Lorem ipsum dolo', 0, 1, 1, 1);
INSERT INTO `apps` VALUES (6, 3, 1, 'UQQWW', 0, 'iOS', '', 'Lorem ipsum dolo', 0, 1, 1, 1);
INSERT INTO `apps` VALUES (7, 2, 2, 'KSDFG', 0, 'Android', '', 'Lorem ipsum dolo', 0, 1, 1, 1);
INSERT INTO `apps` VALUES (8, 3, 2, 'M555Y', 0, 'iOS', '', 'Lorem ipsum dolo', 0, 1, 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `app_histories`
-- 

CREATE TABLE `app_histories` (
  `app_history_id` int(10) unsigned NOT NULL auto_increment,
  `app_id` int(10) unsigned NOT NULL,
  `version` varchar(40) collate utf8_unicode_ci NOT NULL,
  `size` float(10) NOT NULL,
  `new_features` text collate utf8_unicode_ci NOT NULL,
  `compatible` varchar(40) collate utf8_unicode_ci NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY  (`app_history_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `app_histories`
-- 

INSERT INTO `app_histories` VALUES (1, 1, '1.0', 3.5, 'add new', '4.0.1', '2015-08-25 07:58:10');
INSERT INTO `app_histories` VALUES (2, 2, '1.0', 5.5, 'add new', '6.0', '2015-08-25 07:58:10');
INSERT INTO `app_histories` VALUES (3, 3, '1.0', 3.5, 'add new', '4.0.1', '2015-08-25 07:58:10');
INSERT INTO `app_histories` VALUES (4, 4, '1.0', 5.5, 'add new', '6.0', '2015-08-25 07:58:10');
INSERT INTO `app_histories` VALUES (5, 5, '1.0', 3.5, 'add new', '4.0.1', '2015-08-25 07:58:10');
INSERT INTO `app_histories` VALUES (6, 6, '1.0', 5.5, 'add new', '6.0', '2015-08-25 07:58:10');
INSERT INTO `app_histories` VALUES (7, 7, '1.0', 3.5, 'add new', '4.0.1', '2015-08-25 07:58:10');
INSERT INTO `app_histories` VALUES (8, 8, '1.0', 5.5, 'add new', '6.0', '2015-08-25 07:58:10');

-- --------------------------------------------------------

-- 
-- Table structure for table `media`
-- 

CREATE TABLE `media` (
  `media_id` int(10) unsigned NOT NULL auto_increment,
  `app_id` int(10) unsigned NOT NULL,
  `media_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `type` varchar(20) collate utf8_unicode_ci NOT NULL,
  `position` int(10) NOT NULL,
  PRIMARY KEY  (`media_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `media`
-- 

INSERT INTO `media` VALUES (1, 1, 'image1.jpg', 'image', 0);
INSERT INTO `media` VALUES (2, 1, 'image2.jpg', 'image', 1);
INSERT INTO `media` VALUES (3, 2, 'image1.jpg', 'image', 0);
INSERT INTO `media` VALUES (4, 2, 'image2.jpg', 'image', 1);
INSERT INTO `media` VALUES (5, 3, 'image1.jpg', 'image', 0);
INSERT INTO `media` VALUES (6, 3, 'image2.jpg', 'image', 1);
INSERT INTO `media` VALUES (7, 4, 'image1.jpg', 'image', 0);
INSERT INTO `media` VALUES (8, 4, 'image2.jpg', 'image', 1);
INSERT INTO `media` VALUES (9, 5, 'image2.jpg', 'image', 0);
INSERT INTO `media` VALUES (10, 6, 'image2.jpg', 'image', 0);
INSERT INTO `media` VALUES (11, 7, 'image1.jpg', 'image', 0);
INSERT INTO `media` VALUES (12, 8, 'image2.jpg', 'image', 0);

-- 
-- Table structure for table `rates`
-- 

CREATE TABLE `rates` (
  `rate_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `app_history_id` int(10) unsigned NOT NULL,
  `rating` tinyint(2) NOT NULL,
  `comment` text collate utf8_unicode_ci NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY  (`rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `rates`
-- 

INSERT INTO `rates` VALUES (1, 2, 1, 4, 'good app', '2015-08-25 08:20:10');
INSERT INTO `rates` VALUES (2, 2, 2, 3, 'good app', '2015-08-25 08:25:10');
INSERT INTO `rates` VALUES (3, 2, 3, 5, 'good app', '2015-08-25 08:30:10');
INSERT INTO `rates` VALUES (4, 2, 5, 4, 'good app', '2015-08-25 08:37:10');
INSERT INTO `rates` VALUES (5, 2, 6, 3, 'good app', '2015-08-25 08:35:10');
INSERT INTO `rates` VALUES (6, 2, 4, 2, 'bad app', '2015-08-25 08:38:10');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `user_name` varchar(40) collate utf8_unicode_ci NOT NULL,
  `first_name` varchar(40) collate utf8_unicode_ci NULL,
  `last_name` varchar(30) collate utf8_unicode_ci NULL,
  `email` varchar(60) collate utf8_unicode_ci NOT NULL,
  `pass` varchar(40) collate utf8_unicode_ci NOT NULL,
  `website` varchar(60) collate utf8_unicode_ci default NULL,
  `gender` varchar(20) collate utf8_unicode_ci NOT NULL,
  `avatar` varchar(100) collate utf8_unicode_ci default NULL,
  `user_level` tinyint(4) NOT NULL,
  `active` varchar(60) collate utf8_unicode_ci default NULL,
  `registration_date` datetime NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'admin', 'admin', '', 'admin@gmail.com', 'abc123', '', 'male', '', '1', '1', '2015-08-25 07:57:10');
INSERT INTO `users` VALUES (2, 'xuantain', 'Xuan Tai', 'Nguyen', 'xuantain@gmail.com', 'abc123', '', 'male', '', '1', '1', '2015-08-25 07:58:10');
