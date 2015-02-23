-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2014 at 01:52 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `coderity`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brief` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `modified`) VALUES
(NULL, 'site_name', '', NULL);

INSERT INTO `settings` (`id`, `name`, `value`, `modified`) VALUES
(NULL, 'site_email', '', NULL);

INSERT INTO `settings` (`id`, `name`, `value`, `modified`) VALUES
(NULL, 'google_analytics', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


--
-- Table structure for table `redirects`
--

CREATE TABLE IF NOT EXISTS `redirects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `redirect` varchar(255) NOT NULL,
  `created` datetime NULL,
  `modified` datetime NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `redirects`
--

INSERT INTO `redirects` (`id`, `url`, `redirect`, `created`, `modified`) VALUES
(1, 'index.html', '', NULL, NULL),
(2, 'index.htm', '', NULL, NULL),
(3, 'default.html', '', NULL, NULL),
(4, 'default.htm', '', NULL, NULL),
(5, 'index.php', '', NULL, NULL),
(6, 'index.shtml', '', NULL, NULL),
(7, 'index.asp', '', NULL, NULL),
(8, 'default.asp', '', NULL, NULL),
(10, 'index.cfm', '', NULL, NULL),
(11, 'index.pl', '', NULL, NULL);

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Table structure for table `revisions`
--

CREATE TABLE IF NOT EXISTS `revisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `revision` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_id` int(11) NOT NULL,
  `field` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `model_id` (`model_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- Added 9th Jan 2015

ALTER TABLE `articles` ADD `route` VARCHAR( 255 ) NULL AFTER `image` ,
ADD `new_window` TINYINT( 1 ) NOT NULL AFTER `route` ;

-- Added 16th Jan 2015

INSERT INTO `settings` (`id`, `name`, `value`, `modified`) VALUES (NULL, 'site_emails_cc', '', NULL);

-- Added 23rd Feb 2015


--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `route` varchar(255) DEFAULT NULL,
  `post_route` varchar(255) DEFAULT NULL,
  `view` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `top_show` tinyint(1) NOT NULL,
  `top_order` int(11) DEFAULT NULL,
  `bottom_show` tinyint(1) NOT NULL,
  `bottom_order` int(11) DEFAULT NULL,
  `new_window` tinyint(1) NOT NULL,
  `element` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `lft`, `rght`, `name`, `sub_title`, `meta_title`, `meta_description`, `meta_keywords`, `content`, `slug`, `route`, `post_route`, `view`, `class`, `top_show`, `top_order`, `bottom_show`, `bottom_order`, `new_window`, `element`, `created`, `modified`) VALUES
(1, NULL, 1, 2, 'Home', NULL, 'Welcome to Coderity', '', '', '<div class="row">\r\n<div class="col-lg-12 text-center">\r\n<h1>Welcome to Coderity</h1>\r\n\r\n<p class="lead">Welcome to Coderity (pronouced Co-der-ity).&nbsp; Coderity is an &quot;out of the box&quot; CMS&nbsp;for the <a href="http://www.cakephp.org" target="_blank">CakePHP framework</a>, available on GitHub under the MIT license.</p>\r\n\r\n<p>Elegant, simple to use and install, Coderity provides a easy to use, straight forward Content Management System for CakePHP 2.</p>\r\n\r\n<p>Coderity is built on top of CakePHP. &nbsp;It is useful if you are looking for an out of the box, simple to use CakePHP CMS, which can be expanded and made your own!</p>\r\n\r\n<p class="lead">Features include:</p>\r\n\r\n<ul class="list-unstyled">\r\n <li>Pages management - add, edit and delete pages.</li>\r\n <li>Drag and drop ordering of the navigation menu, with the option to select which pages show in the top and bottom menu.</li>\r\n  <li>Site Blocks - Set general content global area&#39;s - such as header and footer sections, which can be edited and updated site wide.</li>\r\n <li>Blog - add, edit and delete blog articles. &nbsp;Have the ability to turn off the blog section if it isn&#39;t needed.</li>\r\n <li>Contact Form and Leads Management. &nbsp;A simple contact form is included by default, which emails the website administrator and stores the details in the Leads area.</li>\r\n  <li>Manage Admin Users - add, edit and delete the users of the CMS.</li>\r\n  <li>Redirects - add, edit and delete 301 redirects.</li>\r\n  <li>General Settings - control the overall settings such as the Site Name, Site Email Address and Google Analytics script.</li>\r\n <li>Easy installer. &nbsp;On initial set up, the website has a simple installer for setting the site details and creating the first admin user.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<!-- /.row -->', 'home', '/', '', '', '', 1, 0, 1, NULL, 0, 0, NULL, '2015-02-23 22:43:31'),
(2, NULL, 3, 4, 'Docs', NULL, 'Docs', '', '', '<div class="row">\r\n<div class="col-lg-12 text-center">\r\n<h1>Coderity Docs</h1>\r\n\r\n<p class="lead">Need Help with Coderity</p>\r\n\r\n<p>Check out the <a href="http://www.coderity.com/docs" target="_blank">Coderity Docs</a> for help using Coderity!</p>\r\n</div>\r\n</div>\r\n', 'docs', '', '', '', '', 1, 1, 1, 1, 0, 0, '2015-02-23 22:46:06', '2015-02-23 22:46:06'),
(3, NULL, 5, 6, 'Contact Form', NULL, 'Contact Form', '', '', '<div class="row">\r\n<div class="col-lg-12 text-center">\r\n<h1>Example Contact Form</h1>\r\n\r\n<p class="lead">The following is an example of a Contact Form from Coderity.&nbsp; This is set by setting the &quot;Page View&quot; to &quot;contact&quot; in the Pages CMS.&nbsp; You can create your own custom view files in app/View/Pages and link them to the CMS by changing the &quot;Page View&quot; value!</p>\r\n\r\n<p>For more information on this, check out the <a href="http://www.coderity.com/docs" target="_blank">Coderity Docs</a>!</p>\r\n</div>\r\n</div>\r\n', 'contact', '', '', 'contact', '', 1, 2, 1, 2, 0, 0, '2015-02-23 22:48:52', '2015-02-23 22:48:52');
