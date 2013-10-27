-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2013 at 11:33 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `faqa`
--

CREATE TABLE IF NOT EXISTS `faqa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `question_desc` text,
  `answer_en` text NOT NULL,
  `answer_ml` text CHARACTER SET utf8 NOT NULL,
  `video_link` varchar(200) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` bigint(20) NOT NULL,
  `category` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `patientqa`
--

CREATE TABLE IF NOT EXISTS `patientqa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `question_desc` text,
  `answer_en` text,
  `answer_ml` text CHARACTER SET utf8,
  `video_link` varchar(200) DEFAULT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` bigint(20) DEFAULT NULL,
  `category` bigint(20) DEFAULT NULL,
  `patient_id` bigint(20) NOT NULL,
  `answer_author` varchar(50) DEFAULT NULL,
  `status` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;
