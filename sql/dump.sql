/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50139
Source Host           : localhost:3306
Source Database       : connectivo

Target Server Type    : MYSQL
Target Server Version : 50139
File Encoding         : 65001

Date: 2010-05-12 11:21:36
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `action_logs`
-- ----------------------------
DROP TABLE IF EXISTS `action_logs`;
CREATE TABLE `action_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `controller` varchar(255) NOT NULL DEFAULT '',
  `action` varchar(255) NOT NULL DEFAULT '',
  `params` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2527 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of action_logs
-- ----------------------------
INSERT INTO `action_logs` VALUES ('2349', '1', 'leads', 'index', '', '2009-07-03 23:21:37');
INSERT INTO `action_logs` VALUES ('2350', '1', 'users', 'index', '', '2009-07-03 23:21:41');
INSERT INTO `action_logs` VALUES ('2351', '1', 'users', 'edit', '1', '2009-07-03 23:21:45');
INSERT INTO `action_logs` VALUES ('2352', '1', 'users', 'edit', '1', '2009-07-03 23:21:48');
INSERT INTO `action_logs` VALUES ('2353', '1', 'users', 'index', '', '2009-07-03 23:21:49');
INSERT INTO `action_logs` VALUES ('2354', '1', 'users', 'edit', '20', '2009-07-03 23:21:51');
INSERT INTO `action_logs` VALUES ('2355', '1', 'users', 'edit', '20', '2009-07-03 23:21:55');
INSERT INTO `action_logs` VALUES ('2356', '1', 'users', 'index', '', '2009-07-03 23:21:56');
INSERT INTO `action_logs` VALUES ('2357', '1', 'users', 'index', '', '2009-07-03 23:26:43');
INSERT INTO `action_logs` VALUES ('2358', '1', 'users', 'logout', '', '2009-07-03 23:26:50');
INSERT INTO `action_logs` VALUES ('2359', '1', 'users', 'index', '', '2009-07-03 23:28:49');
INSERT INTO `action_logs` VALUES ('2360', '1', 'leads', 'index', '', '2009-07-03 23:28:52');
INSERT INTO `action_logs` VALUES ('2361', '1', 'action_logs', 'index', '', '2009-07-03 23:28:55');
INSERT INTO `action_logs` VALUES ('2362', '1', 'payments', 'index', '', '2009-07-03 23:28:57');
INSERT INTO `action_logs` VALUES ('2363', '1', 'payments', 'index', '', '2009-07-03 23:29:28');
INSERT INTO `action_logs` VALUES ('2364', '1', 'action_logs', 'index', '', '2009-07-03 23:29:31');
INSERT INTO `action_logs` VALUES ('2365', '1', 'leads', 'index', '', '2009-07-03 23:38:03');
INSERT INTO `action_logs` VALUES ('2366', '1', 'users', 'logout', '', '2009-07-03 23:38:14');
INSERT INTO `action_logs` VALUES ('2367', '20', 'leads', 'index', '', '2009-07-03 23:38:19');
INSERT INTO `action_logs` VALUES ('2368', '20', 'search', 'index', '', '2009-07-03 23:41:56');
INSERT INTO `action_logs` VALUES ('2369', '20', 'search', 'index', '', '2009-07-03 23:42:01');
INSERT INTO `action_logs` VALUES ('2370', '20', 'search', 'index', '', '2009-07-03 23:42:04');
INSERT INTO `action_logs` VALUES ('2371', '20', 'users', 'logout', '', '2009-07-03 23:42:39');
INSERT INTO `action_logs` VALUES ('2372', '1', 'leads', 'index', '', '2009-07-03 23:57:18');
INSERT INTO `action_logs` VALUES ('2373', '1', 'leads', 'index', '', '2009-07-04 00:25:14');
INSERT INTO `action_logs` VALUES ('2374', '1', 'leads', 'index', '', '2009-07-07 18:07:51');
INSERT INTO `action_logs` VALUES ('2375', '1', 'leads', 'index', '', '2009-07-07 21:57:49');
INSERT INTO `action_logs` VALUES ('2376', '1', 'keys', 'settings', '', '2009-07-07 21:57:57');
INSERT INTO `action_logs` VALUES ('2377', '1', 'keys', 'settings', '', '2009-07-07 22:02:08');
INSERT INTO `action_logs` VALUES ('2378', '1', 'keys', 'settings', '', '2009-07-07 22:02:33');
INSERT INTO `action_logs` VALUES ('2379', '1', 'keys', 'settings', '', '2009-07-07 22:03:03');
INSERT INTO `action_logs` VALUES ('2380', '1', 'keys', 'settings', '', '2009-07-07 22:03:13');
INSERT INTO `action_logs` VALUES ('2381', '1', 'keys', 'settings', '', '2009-07-07 22:03:30');
INSERT INTO `action_logs` VALUES ('2382', '1', 'keys', 'settings', '', '2009-07-07 22:04:01');
INSERT INTO `action_logs` VALUES ('2383', '1', 'keys', 'settings', '', '2009-07-07 22:04:20');
INSERT INTO `action_logs` VALUES ('2384', '1', 'keys', 'settings', '', '2009-07-07 22:05:44');
INSERT INTO `action_logs` VALUES ('2385', '1', 'keys', 'settings', '', '2009-07-07 22:06:05');
INSERT INTO `action_logs` VALUES ('2386', '1', 'keys', 'settings', '', '2009-07-07 22:06:18');
INSERT INTO `action_logs` VALUES ('2387', '1', 'leads', 'index', '', '2009-07-07 19:31:47');
INSERT INTO `action_logs` VALUES ('2388', '1', 'leads', 'index', '', '2009-07-07 19:37:15');
INSERT INTO `action_logs` VALUES ('2389', '1', 'keys', 'settings', '', '2009-07-07 19:37:23');
INSERT INTO `action_logs` VALUES ('2390', '1', 'keys', 'settings', '', '2009-07-07 19:38:58');
INSERT INTO `action_logs` VALUES ('2391', '1', 'leads', 'index', '', '2009-07-07 19:39:02');
INSERT INTO `action_logs` VALUES ('2392', '1', 'products', 'index', '', '2009-07-07 19:39:06');
INSERT INTO `action_logs` VALUES ('2393', '1', 'users', 'logout', '', '2009-07-07 19:39:58');
INSERT INTO `action_logs` VALUES ('2394', '1', 'leads', 'index', '', '2009-07-07 19:40:44');
INSERT INTO `action_logs` VALUES ('2395', '1', 'leads', 'index', '', '2009-07-07 19:40:48');
INSERT INTO `action_logs` VALUES ('2396', '1', 'users', 'login', '', '2009-07-07 19:40:55');
INSERT INTO `action_logs` VALUES ('2397', '1', 'products', 'index', '', '2009-07-07 19:42:13');
INSERT INTO `action_logs` VALUES ('2398', '1', 'users', 'logout', '', '2009-07-07 19:42:15');
INSERT INTO `action_logs` VALUES ('2399', '1', 'leads', 'index', '', '2009-07-07 22:56:22');
INSERT INTO `action_logs` VALUES ('2400', '1', 'keys', 'settings', '', '2009-07-07 22:56:32');
INSERT INTO `action_logs` VALUES ('2401', '1', 'keys', 'settings', '', '2009-07-07 22:57:04');
INSERT INTO `action_logs` VALUES ('2402', '1', 'keys', 'settings', '', '2009-07-07 22:57:26');
INSERT INTO `action_logs` VALUES ('2403', '1', 'keys', 'settings', '', '2009-07-07 22:57:39');
INSERT INTO `action_logs` VALUES ('2404', '1', 'keys', 'settings', '', '2009-07-07 23:01:23');
INSERT INTO `action_logs` VALUES ('2405', '1', 'keys', 'settings', '', '2009-07-07 23:02:48');
INSERT INTO `action_logs` VALUES ('2406', '1', 'keys', 'settings', '', '2009-07-07 23:03:53');
INSERT INTO `action_logs` VALUES ('2407', '1', 'leads', 'index', '', '2009-07-08 00:07:49');
INSERT INTO `action_logs` VALUES ('2408', '1', 'leads', 'index', '', '2009-07-08 00:17:31');
INSERT INTO `action_logs` VALUES ('2409', '1', 'users', 'logout', '', '2009-07-08 00:17:37');
INSERT INTO `action_logs` VALUES ('2410', '1', 'leads', 'index', '', '2009-07-08 00:29:16');
INSERT INTO `action_logs` VALUES ('2411', '1', 'leads', 'index', '', '2009-07-07 21:31:33');
INSERT INTO `action_logs` VALUES ('2412', '1', 'settings', 'index', '', '2009-07-07 21:31:36');
INSERT INTO `action_logs` VALUES ('2413', '1', 'settings', 'index', '', '2009-07-07 21:34:19');
INSERT INTO `action_logs` VALUES ('2414', '1', 'leads', 'index', '', '2009-07-08 00:47:10');
INSERT INTO `action_logs` VALUES ('2415', '1', 'leads', 'index', '', '2009-07-08 00:47:21');
INSERT INTO `action_logs` VALUES ('2416', '1', 'keys', 'index', '', '2009-07-08 00:47:27');
INSERT INTO `action_logs` VALUES ('2417', '1', 'keys', 'add', '', '2009-07-08 00:47:35');
INSERT INTO `action_logs` VALUES ('2418', '1', 'keys', 'add', '', '2009-07-08 00:49:22');
INSERT INTO `action_logs` VALUES ('2419', '1', 'keys', 'add', '', '2009-07-08 00:49:33');
INSERT INTO `action_logs` VALUES ('2420', '1', 'keys', 'index', '', '2009-07-08 00:49:38');
INSERT INTO `action_logs` VALUES ('2421', '1', 'keys', 'index', '', '2009-07-08 00:50:06');
INSERT INTO `action_logs` VALUES ('2422', '1', 'keys', 'delete', '', '2009-07-08 00:50:11');
INSERT INTO `action_logs` VALUES ('2423', '1', 'keys', 'index', '', '2009-07-08 00:50:53');
INSERT INTO `action_logs` VALUES ('2424', '1', 'keys', 'delete', '2', '2009-07-08 00:51:03');
INSERT INTO `action_logs` VALUES ('2425', '1', 'keys', 'index', '', '2009-07-08 00:51:06');
INSERT INTO `action_logs` VALUES ('2426', '1', 'keys', 'add', '', '2009-07-08 00:51:48');
INSERT INTO `action_logs` VALUES ('2427', '1', 'keys', 'add', '', '2009-07-08 00:51:55');
INSERT INTO `action_logs` VALUES ('2428', '1', 'keys', 'index', '', '2009-07-08 00:51:58');
INSERT INTO `action_logs` VALUES ('2429', '1', 'keys', 'delete', '3', '2009-07-08 00:52:05');
INSERT INTO `action_logs` VALUES ('2430', '1', 'keys', 'index', '', '2009-07-08 00:52:08');
INSERT INTO `action_logs` VALUES ('2431', '1', 'keys', 'delete', '1', '2009-07-08 00:52:16');
INSERT INTO `action_logs` VALUES ('2432', '1', 'keys', 'index', '', '2009-07-08 00:52:19');
INSERT INTO `action_logs` VALUES ('2433', '1', 'leads', 'index', '', '2010-05-12 10:41:55');
INSERT INTO `action_logs` VALUES ('2434', '1', 'leads', 'index', '', '2010-05-12 10:42:25');
INSERT INTO `action_logs` VALUES ('2435', '1', 'keys', 'index', '', '2010-05-12 10:42:31');
INSERT INTO `action_logs` VALUES ('2436', '1', 'action_logs', 'index', '', '2010-05-12 10:42:33');
INSERT INTO `action_logs` VALUES ('2437', '1', 'users', 'index', '', '2010-05-12 10:42:36');
INSERT INTO `action_logs` VALUES ('2438', '1', 'users', 'index', '', '2010-05-12 10:44:12');
INSERT INTO `action_logs` VALUES ('2439', '1', 'products', 'index', '', '2010-05-12 10:44:14');
INSERT INTO `action_logs` VALUES ('2440', '1', 'leads', 'index', '', '2010-05-12 10:44:58');
INSERT INTO `action_logs` VALUES ('2441', '1', 'leads', 'index', '', '2010-05-12 10:45:55');
INSERT INTO `action_logs` VALUES ('2442', '1', 'leads', 'index', '', '2010-05-12 10:47:22');
INSERT INTO `action_logs` VALUES ('2443', '1', 'leads', 'index', '', '2010-05-12 10:48:13');
INSERT INTO `action_logs` VALUES ('2444', '1', 'settings', 'index', '', '2010-05-12 10:50:01');
INSERT INTO `action_logs` VALUES ('2445', '1', 'settings', 'index', '', '2010-05-12 10:50:10');
INSERT INTO `action_logs` VALUES ('2446', '1', 'settings', 'edit', '1', '2010-05-12 10:50:14');
INSERT INTO `action_logs` VALUES ('2447', '1', 'settings', 'edit', '1', '2010-05-12 10:50:19');
INSERT INTO `action_logs` VALUES ('2448', '1', 'settings', 'index', '', '2010-05-12 10:50:19');
INSERT INTO `action_logs` VALUES ('2449', '1', 'settings', 'edit', '4', '2010-05-12 10:50:23');
INSERT INTO `action_logs` VALUES ('2450', '1', 'settings', 'edit', '4', '2010-05-12 10:50:30');
INSERT INTO `action_logs` VALUES ('2451', '1', 'settings', 'index', '', '2010-05-12 10:50:30');
INSERT INTO `action_logs` VALUES ('2452', '1', 'settings', 'edit', '2', '2010-05-12 10:50:32');
INSERT INTO `action_logs` VALUES ('2453', '1', 'settings', 'edit', '2', '2010-05-12 10:50:37');
INSERT INTO `action_logs` VALUES ('2454', '1', 'settings', 'index', '', '2010-05-12 10:50:37');
INSERT INTO `action_logs` VALUES ('2455', '1', 'settings', 'edit', '1', '2010-05-12 10:50:40');
INSERT INTO `action_logs` VALUES ('2456', '1', 'settings', 'edit', '1', '2010-05-12 10:50:44');
INSERT INTO `action_logs` VALUES ('2457', '1', 'settings', 'index', '', '2010-05-12 10:50:45');
INSERT INTO `action_logs` VALUES ('2458', '1', 'settings', 'edit', '4', '2010-05-12 10:50:48');
INSERT INTO `action_logs` VALUES ('2459', '1', 'settings', 'edit', '4', '2010-05-12 10:50:53');
INSERT INTO `action_logs` VALUES ('2460', '1', 'settings', 'index', '', '2010-05-12 10:50:54');
INSERT INTO `action_logs` VALUES ('2461', '1', 'settings', 'index', '', '2010-05-12 10:51:11');
INSERT INTO `action_logs` VALUES ('2462', '1', 'leads', 'index', '', '2010-05-12 10:51:13');
INSERT INTO `action_logs` VALUES ('2463', '1', 'products', 'index', '', '2010-05-12 10:51:15');
INSERT INTO `action_logs` VALUES ('2464', '1', 'users', 'index', '', '2010-05-12 10:51:16');
INSERT INTO `action_logs` VALUES ('2465', '1', 'action_logs', 'index', '', '2010-05-12 10:51:18');
INSERT INTO `action_logs` VALUES ('2466', '1', 'action_logs', 'index', '', '2010-05-12 10:52:50');
INSERT INTO `action_logs` VALUES ('2467', '1', 'action_logs', 'index', '', '2010-05-12 10:53:16');
INSERT INTO `action_logs` VALUES ('2468', '1', 'action_logs', 'index', '', '2010-05-12 10:53:23');
INSERT INTO `action_logs` VALUES ('2469', '1', 'leads', 'index', '', '2010-05-12 10:53:31');
INSERT INTO `action_logs` VALUES ('2470', '1', 'leads', 'add', '', '2010-05-12 10:53:35');
INSERT INTO `action_logs` VALUES ('2471', '1', 'products', 'index', '', '2010-05-12 10:53:40');
INSERT INTO `action_logs` VALUES ('2472', '1', 'leads', 'index', '', '2010-05-12 10:53:41');
INSERT INTO `action_logs` VALUES ('2473', '1', 'leads', 'add', '', '2010-05-12 10:53:44');
INSERT INTO `action_logs` VALUES ('2474', '1', 'products', 'index', '', '2010-05-12 10:54:10');
INSERT INTO `action_logs` VALUES ('2475', '1', 'products', 'add', '', '2010-05-12 10:54:13');
INSERT INTO `action_logs` VALUES ('2476', '1', 'products', 'add', '', '2010-05-12 10:54:22');
INSERT INTO `action_logs` VALUES ('2477', '1', 'products', 'add', '', '2010-05-12 10:55:25');
INSERT INTO `action_logs` VALUES ('2478', '1', 'products', 'index', '', '2010-05-12 10:55:25');
INSERT INTO `action_logs` VALUES ('2479', '1', 'products', 'index', '', '2010-05-12 10:55:52');
INSERT INTO `action_logs` VALUES ('2480', '1', 'products', 'index', '', '2010-05-12 10:56:07');
INSERT INTO `action_logs` VALUES ('2481', '1', 'products', 'delete', '9', '2010-05-12 10:56:10');
INSERT INTO `action_logs` VALUES ('2482', '1', 'products', 'index', '', '2010-05-12 10:56:10');
INSERT INTO `action_logs` VALUES ('2483', '1', 'leads', 'add', '', '2010-05-12 10:56:13');
INSERT INTO `action_logs` VALUES ('2484', '1', 'leads', 'add', '', '2010-05-12 10:57:30');
INSERT INTO `action_logs` VALUES ('2485', '1', 'leads', 'index', '', '2010-05-12 10:57:31');
INSERT INTO `action_logs` VALUES ('2486', '1', 'leads', 'index', '', '2010-05-12 10:57:55');
INSERT INTO `action_logs` VALUES ('2487', '1', 'leads', 'index', '', '2010-05-12 10:58:02');
INSERT INTO `action_logs` VALUES ('2488', '1', 'leads', 'index', '', '2010-05-12 10:58:07');
INSERT INTO `action_logs` VALUES ('2489', '1', 'leads', 'index', '', '2010-05-12 10:58:30');
INSERT INTO `action_logs` VALUES ('2490', '1', 'leads', 'view', '1', '2010-05-12 10:58:34');
INSERT INTO `action_logs` VALUES ('2491', '1', 'notes', 'add', '1', '2010-05-12 10:58:41');
INSERT INTO `action_logs` VALUES ('2492', '1', 'leads', 'view', '1', '2010-05-12 10:58:45');
INSERT INTO `action_logs` VALUES ('2493', '1', 'users', 'index', '', '2010-05-12 10:58:47');
INSERT INTO `action_logs` VALUES ('2494', '1', 'action_logs', 'index', '', '2010-05-12 10:58:53');
INSERT INTO `action_logs` VALUES ('2495', '1', 'action_logs', 'index', '', '2010-05-12 10:59:07');
INSERT INTO `action_logs` VALUES ('2496', '1', 'users', 'index', '', '2010-05-12 10:59:10');
INSERT INTO `action_logs` VALUES ('2497', '1', 'users', 'index', '', '2010-05-12 10:59:23');
INSERT INTO `action_logs` VALUES ('2498', '1', 'users', 'index', '', '2010-05-12 10:59:30');
INSERT INTO `action_logs` VALUES ('2499', '1', 'users', 'index', '', '2010-05-12 11:04:35');
INSERT INTO `action_logs` VALUES ('2500', '1', 'users', 'index', '', '2010-05-12 11:04:45');
INSERT INTO `action_logs` VALUES ('2501', '1', 'users', 'index', '', '2010-05-12 11:05:15');
INSERT INTO `action_logs` VALUES ('2502', '1', 'users', 'index', '', '2010-05-12 11:06:30');
INSERT INTO `action_logs` VALUES ('2503', '1', 'users', 'index', '', '2010-05-12 11:06:57');
INSERT INTO `action_logs` VALUES ('2504', '1', 'users', 'index', '', '2010-05-12 11:07:20');
INSERT INTO `action_logs` VALUES ('2505', '1', 'users', 'index', '', '2010-05-12 11:08:01');
INSERT INTO `action_logs` VALUES ('2506', '1', 'users', 'index', '', '2010-05-12 11:10:30');
INSERT INTO `action_logs` VALUES ('2507', '1', 'users', 'edit', '20', '2010-05-12 11:10:37');
INSERT INTO `action_logs` VALUES ('2508', '1', 'users', 'edit', '20', '2010-05-12 11:10:39');
INSERT INTO `action_logs` VALUES ('2509', '1', 'users', 'index', '', '2010-05-12 11:10:39');
INSERT INTO `action_logs` VALUES ('2510', '1', 'users', 'add', '', '2010-05-12 11:10:43');
INSERT INTO `action_logs` VALUES ('2511', '1', 'users', 'index', '', '2010-05-12 11:10:47');
INSERT INTO `action_logs` VALUES ('2512', '1', 'leads', 'index', '', '2010-05-12 11:10:49');
INSERT INTO `action_logs` VALUES ('2513', '1', 'products', 'index', '', '2010-05-12 11:10:50');
INSERT INTO `action_logs` VALUES ('2514', '1', 'payments', 'index', '', '2010-05-12 11:10:51');
INSERT INTO `action_logs` VALUES ('2515', '1', 'leads', 'add', '', '2010-05-12 11:10:53');
INSERT INTO `action_logs` VALUES ('2516', '1', 'payments', 'index', '', '2010-05-12 11:10:55');
INSERT INTO `action_logs` VALUES ('2517', '1', 'payments', 'index', '', '2010-05-12 11:11:05');
INSERT INTO `action_logs` VALUES ('2518', '1', 'payments', 'add', '', '2010-05-12 11:11:07');
INSERT INTO `action_logs` VALUES ('2519', '1', 'leads', 'index', '', '2010-05-12 11:11:32');
INSERT INTO `action_logs` VALUES ('2520', '1', 'leads', 'view', '1', '2010-05-12 11:11:36');
INSERT INTO `action_logs` VALUES ('2521', '1', 'products', 'index', '', '2010-05-12 11:11:48');
INSERT INTO `action_logs` VALUES ('2522', '1', 'users', 'index', '', '2010-05-12 11:11:49');
INSERT INTO `action_logs` VALUES ('2523', '1', 'users', 'index', '', '2010-05-12 11:12:01');
INSERT INTO `action_logs` VALUES ('2524', '1', 'leads', 'index', '', '2010-05-12 11:12:03');
INSERT INTO `action_logs` VALUES ('2525', '1', 'leads', 'index', '', '2010-05-12 11:16:27');
INSERT INTO `action_logs` VALUES ('2526', '1', 'leads', 'index', '', '2010-05-12 11:17:00');

-- ----------------------------
-- Table structure for `contact_types`
-- ----------------------------
DROP TABLE IF EXISTS `contact_types`;
CREATE TABLE `contact_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact_types
-- ----------------------------
INSERT INTO `contact_types` VALUES ('1', 'Email');
INSERT INTO `contact_types` VALUES ('2', 'Fax Number');
INSERT INTO `contact_types` VALUES ('3', 'Cell Phone');
INSERT INTO `contact_types` VALUES ('4', 'Home Phone');
INSERT INTO `contact_types` VALUES ('5', 'Other');

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lead_id` int(10) DEFAULT NULL,
  `contact_type_id` int(1) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'Admin', null);
INSERT INTO `groups` VALUES ('2', 'Staff', null);

-- ----------------------------
-- Table structure for `leads`
-- ----------------------------
DROP TABLE IF EXISTS `leads`;
CREATE TABLE `leads` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `product_id` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `leadtime` varchar(255) DEFAULT NULL,
  `notes` text,
  `status` int(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of leads
-- ----------------------------

-- ----------------------------
-- Table structure for `notes`
-- ----------------------------
DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lead_id` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `type_id` tinyint(1) DEFAULT NULL,
  `note` text,
  `date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notes
-- ----------------------------

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for `uploads`
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(75) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `data` mediumblob NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uploads
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Administrator', 'admin', '74ceb3d2dd9beb1fe7911e5e23d94eb7340f48a6', '1', '2009-03-31 12:43:56', '2009-07-03 23:21:48');
INSERT INTO `users` VALUES ('20', 'Staff', 'staff', 'f95565b9f9c849551b652d24a4b2e2d6b4dfd2f9', '2', '2009-04-09 11:53:52', '2010-05-12 11:10:39');
