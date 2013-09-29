-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2013 at 03:31 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--
-- Creation: Sep 28, 2013 at 11:33 PM
--

	CREATE TABLE IF NOT EXISTS `questions` (
			`id` int(25) NOT NULL AUTO_INCREMENT,
			`question` varchar(250) NOT NULL,
			`question_desc` varchar(500) NOT NULL,
			`status` int(10) NOT NULL,
			`answer_id` int(25) DEFAULT NULL,
			`type` int(11) NOT NULL,
			`category` int(11) NOT NULL,
			`patient_id` int(11) DEFAULT NULL,
			PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

