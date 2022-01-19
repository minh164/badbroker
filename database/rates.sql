/*
 Navicat Premium Data Transfer

 Source Server         : 0Local
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : broker

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 19/01/2022 10:01:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for rates
-- ----------------------------
DROP TABLE IF EXISTS `rates`;
CREATE TABLE `rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `value` double(10,0) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of rates
-- ----------------------------
BEGIN;
INSERT INTO `rates` VALUES (1, '2021-01-01 00:00:00', 'RUB', 90, '2022-01-18 07:48:23', '2022-01-18 07:48:23');
INSERT INTO `rates` VALUES (2, '2021-01-01 00:00:00', 'EUR', 1, '2022-01-18 07:48:23', '2022-01-18 07:48:23');
INSERT INTO `rates` VALUES (3, '2021-01-01 00:00:00', 'GBP', 1, '2022-01-18 07:48:23', '2022-01-18 07:48:23');
INSERT INTO `rates` VALUES (4, '2021-01-01 00:00:00', 'JPY', 126, '2022-01-18 07:48:23', '2022-01-18 07:48:23');
INSERT INTO `rates` VALUES (5, '2021-01-02 00:00:00', 'RUB', 90, '2022-01-18 07:48:24', '2022-01-18 07:48:24');
INSERT INTO `rates` VALUES (6, '2021-01-02 00:00:00', 'EUR', 1, '2022-01-18 07:48:24', '2022-01-18 07:48:24');
INSERT INTO `rates` VALUES (7, '2021-01-02 00:00:00', 'GBP', 1, '2022-01-18 07:48:24', '2022-01-18 07:48:24');
INSERT INTO `rates` VALUES (8, '2021-01-02 00:00:00', 'JPY', 125, '2022-01-18 07:48:24', '2022-01-18 07:48:24');
INSERT INTO `rates` VALUES (9, '2021-01-03 00:00:00', 'RUB', 91, '2022-01-18 07:48:24', '2022-01-18 07:48:24');
INSERT INTO `rates` VALUES (10, '2021-01-03 00:00:00', 'EUR', 1, '2022-01-18 07:48:24', '2022-01-18 07:48:24');
INSERT INTO `rates` VALUES (11, '2021-01-03 00:00:00', 'GBP', 1, '2022-01-18 07:48:24', '2022-01-18 07:48:24');
INSERT INTO `rates` VALUES (12, '2021-01-03 00:00:00', 'JPY', 126, '2022-01-18 07:48:24', '2022-01-18 07:48:24');
INSERT INTO `rates` VALUES (13, '2021-01-04 00:00:00', 'RUB', 91, '2022-01-18 07:48:25', '2022-01-18 07:48:25');
INSERT INTO `rates` VALUES (14, '2021-01-04 00:00:00', 'EUR', 1, '2022-01-18 07:48:25', '2022-01-18 07:48:25');
INSERT INTO `rates` VALUES (15, '2021-01-04 00:00:00', 'GBP', 1, '2022-01-18 07:48:25', '2022-01-18 07:48:25');
INSERT INTO `rates` VALUES (16, '2021-01-04 00:00:00', 'JPY', 126, '2022-01-18 07:48:25', '2022-01-18 07:48:25');
INSERT INTO `rates` VALUES (17, '2021-01-05 00:00:00', 'RUB', 91, '2022-01-18 07:48:26', '2022-01-18 07:48:26');
INSERT INTO `rates` VALUES (18, '2021-01-05 00:00:00', 'EUR', 1, '2022-01-18 07:48:26', '2022-01-18 07:48:26');
INSERT INTO `rates` VALUES (19, '2021-01-05 00:00:00', 'GBP', 1, '2022-01-18 07:48:26', '2022-01-18 07:48:26');
INSERT INTO `rates` VALUES (20, '2021-01-05 00:00:00', 'JPY', 126, '2022-01-18 07:48:26', '2022-01-18 07:48:26');
INSERT INTO `rates` VALUES (21, '2021-01-06 00:00:00', 'RUB', 91, '2022-01-18 07:48:26', '2022-01-18 07:48:26');
INSERT INTO `rates` VALUES (22, '2021-01-06 00:00:00', 'EUR', 1, '2022-01-18 07:48:26', '2022-01-18 07:48:26');
INSERT INTO `rates` VALUES (23, '2021-01-06 00:00:00', 'GBP', 1, '2022-01-18 07:48:26', '2022-01-18 07:48:26');
INSERT INTO `rates` VALUES (24, '2021-01-06 00:00:00', 'JPY', 127, '2022-01-18 07:48:26', '2022-01-18 07:48:26');
INSERT INTO `rates` VALUES (25, '2021-01-07 00:00:00', 'RUB', 92, '2022-01-18 07:48:31', '2022-01-18 07:48:31');
INSERT INTO `rates` VALUES (26, '2021-01-07 00:00:00', 'EUR', 1, '2022-01-18 07:48:31', '2022-01-18 07:48:31');
INSERT INTO `rates` VALUES (27, '2021-01-07 00:00:00', 'GBP', 1, '2022-01-18 07:48:31', '2022-01-18 07:48:31');
INSERT INTO `rates` VALUES (28, '2021-01-07 00:00:00', 'JPY', 127, '2022-01-18 07:48:31', '2022-01-18 07:48:31');
INSERT INTO `rates` VALUES (29, '2021-01-08 00:00:00', 'RUB', 91, '2022-01-18 07:48:32', '2022-01-18 07:48:32');
INSERT INTO `rates` VALUES (30, '2021-01-08 00:00:00', 'EUR', 1, '2022-01-18 07:48:32', '2022-01-18 07:48:32');
INSERT INTO `rates` VALUES (31, '2021-01-08 00:00:00', 'GBP', 1, '2022-01-18 07:48:32', '2022-01-18 07:48:32');
INSERT INTO `rates` VALUES (32, '2021-01-08 00:00:00', 'JPY', 127, '2022-01-18 07:48:32', '2022-01-18 07:48:32');
INSERT INTO `rates` VALUES (33, '2021-01-09 00:00:00', 'RUB', 91, '2022-01-18 07:48:33', '2022-01-18 07:48:33');
INSERT INTO `rates` VALUES (34, '2021-01-09 00:00:00', 'EUR', 1, '2022-01-18 07:48:33', '2022-01-18 07:48:33');
INSERT INTO `rates` VALUES (35, '2021-01-09 00:00:00', 'GBP', 1, '2022-01-18 07:48:33', '2022-01-18 07:48:33');
INSERT INTO `rates` VALUES (36, '2021-01-09 00:00:00', 'JPY', 127, '2022-01-18 07:48:33', '2022-01-18 07:48:33');
INSERT INTO `rates` VALUES (37, '2021-01-10 00:00:00', 'RUB', 91, '2022-01-18 07:48:33', '2022-01-18 07:48:33');
INSERT INTO `rates` VALUES (38, '2021-01-10 00:00:00', 'EUR', 1, '2022-01-18 07:48:33', '2022-01-18 07:48:33');
INSERT INTO `rates` VALUES (39, '2021-01-10 00:00:00', 'GBP', 1, '2022-01-18 07:48:33', '2022-01-18 07:48:33');
INSERT INTO `rates` VALUES (40, '2021-01-10 00:00:00', 'JPY', 127, '2022-01-18 07:48:33', '2022-01-18 07:48:33');
INSERT INTO `rates` VALUES (41, '2021-01-11 00:00:00', 'RUB', 91, '2022-01-18 07:48:34', '2022-01-18 07:48:34');
INSERT INTO `rates` VALUES (42, '2021-01-11 00:00:00', 'EUR', 1, '2022-01-18 07:48:34', '2022-01-18 07:48:34');
INSERT INTO `rates` VALUES (43, '2021-01-11 00:00:00', 'GBP', 1, '2022-01-18 07:48:34', '2022-01-18 07:48:34');
INSERT INTO `rates` VALUES (44, '2021-01-11 00:00:00', 'JPY', 127, '2022-01-18 07:48:34', '2022-01-18 07:48:34');
INSERT INTO `rates` VALUES (45, '2020-04-16 00:00:00', 'RUB', 81, '2022-01-18 07:57:52', '2022-01-18 07:57:52');
INSERT INTO `rates` VALUES (46, '2020-04-16 00:00:00', 'EUR', 1, '2022-01-18 07:57:52', '2022-01-18 07:57:52');
INSERT INTO `rates` VALUES (47, '2020-04-16 00:00:00', 'GBP', 1, '2022-01-18 07:57:52', '2022-01-18 07:57:52');
INSERT INTO `rates` VALUES (48, '2020-04-16 00:00:00', 'JPY', 117, '2022-01-18 07:57:52', '2022-01-18 07:57:52');
INSERT INTO `rates` VALUES (49, '2020-04-17 00:00:00', 'RUB', 81, '2022-01-18 07:57:53', '2022-01-18 07:57:53');
INSERT INTO `rates` VALUES (50, '2020-04-17 00:00:00', 'EUR', 1, '2022-01-18 07:57:53', '2022-01-18 07:57:53');
INSERT INTO `rates` VALUES (51, '2020-04-17 00:00:00', 'GBP', 1, '2022-01-18 07:57:53', '2022-01-18 07:57:53');
INSERT INTO `rates` VALUES (52, '2020-04-17 00:00:00', 'JPY', 117, '2022-01-18 07:57:53', '2022-01-18 07:57:53');
INSERT INTO `rates` VALUES (53, '2020-04-18 00:00:00', 'RUB', 81, '2022-01-18 07:57:54', '2022-01-18 07:57:54');
INSERT INTO `rates` VALUES (54, '2020-04-18 00:00:00', 'EUR', 1, '2022-01-18 07:57:54', '2022-01-18 07:57:54');
INSERT INTO `rates` VALUES (55, '2020-04-18 00:00:00', 'GBP', 1, '2022-01-18 07:57:54', '2022-01-18 07:57:54');
INSERT INTO `rates` VALUES (56, '2020-04-18 00:00:00', 'JPY', 117, '2022-01-18 07:57:54', '2022-01-18 07:57:54');
INSERT INTO `rates` VALUES (57, '2020-02-05 00:00:00', 'RUB', 69, '2022-01-18 07:58:09', '2022-01-18 07:58:09');
INSERT INTO `rates` VALUES (58, '2020-02-05 00:00:00', 'EUR', 1, '2022-01-18 07:58:09', '2022-01-18 07:58:09');
INSERT INTO `rates` VALUES (59, '2020-02-05 00:00:00', 'GBP', 1, '2022-01-18 07:58:09', '2022-01-18 07:58:09');
INSERT INTO `rates` VALUES (60, '2020-02-05 00:00:00', 'JPY', 121, '2022-01-18 07:58:09', '2022-01-18 07:58:09');
INSERT INTO `rates` VALUES (61, '2020-02-06 00:00:00', 'RUB', 70, '2022-01-18 07:58:11', '2022-01-18 07:58:11');
INSERT INTO `rates` VALUES (62, '2020-02-06 00:00:00', 'EUR', 1, '2022-01-18 07:58:11', '2022-01-18 07:58:11');
INSERT INTO `rates` VALUES (63, '2020-02-06 00:00:00', 'GBP', 1, '2022-01-18 07:58:11', '2022-01-18 07:58:11');
INSERT INTO `rates` VALUES (64, '2020-02-06 00:00:00', 'JPY', 121, '2022-01-18 07:58:11', '2022-01-18 07:58:11');
INSERT INTO `rates` VALUES (65, '2020-02-07 00:00:00', 'RUB', 70, '2022-01-18 07:58:11', '2022-01-18 07:58:11');
INSERT INTO `rates` VALUES (66, '2020-02-07 00:00:00', 'EUR', 1, '2022-01-18 07:58:11', '2022-01-18 07:58:11');
INSERT INTO `rates` VALUES (67, '2020-02-07 00:00:00', 'GBP', 1, '2022-01-18 07:58:11', '2022-01-18 07:58:11');
INSERT INTO `rates` VALUES (68, '2020-02-07 00:00:00', 'JPY', 120, '2022-01-18 07:58:11', '2022-01-18 07:58:11');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;