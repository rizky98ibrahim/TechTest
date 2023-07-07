/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : bonus_case

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 08/07/2023 04:39:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for instansi
-- ----------------------------
DROP TABLE IF EXISTS `instansi`;
CREATE TABLE `instansi`  (
  `id_instansi` int NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi_instansi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_instansi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of instansi
-- ----------------------------
INSERT INTO `instansi` VALUES (1, 'Instansi A', 'Deskripsi Instansi A', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (2, 'Instansi B', 'Deskripsi Instansi B', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (3, 'Instansi C', 'Deskripsi Instansi C', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (4, 'Instansi D', 'Deskripsi Instansi D', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (5, 'Instansi E', 'Deskripsi Instansi E', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (6, 'Instansi F', 'Deskripsi Instansi F', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (7, 'Instansi G', 'Deskripsi Instansi G', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (8, 'Instansi H', 'Deskripsi Instansi H', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (9, 'Instansi I', 'Deskripsi Instansi I', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (10, 'Instansi J', 'Deskripsi Instansi J', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (11, 'Instansi K', 'Deskripsi Instansi K', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (12, 'Instansi L', 'Deskripsi Instansi L', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (13, 'Instansi M', 'Deskripsi Instansi M', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (14, 'Instansi N', 'Deskripsi Instansi N', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (15, 'Instansi O', 'Deskripsi Instansi O', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (16, 'Instansi P', 'Deskripsi Instansi P', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (17, 'Instansi Q', 'Deskripsi Instansi Q', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (18, 'Instansi R', 'Deskripsi Instansi R', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (19, 'Instansi S', 'Deskripsi Instansi S', '2023-07-08 04:38:23', '2023-07-08 04:38:23');
INSERT INTO `instansi` VALUES (20, 'Instansi T', 'Deskripsi Instansi T', '2023-07-08 04:38:23', '2023-07-08 04:38:23');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'superadmin');
INSERT INTO `roles` VALUES (2, 'admin');
INSERT INTO `roles` VALUES (3, 'user');
INSERT INTO `roles` VALUES (4, 'guest');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NULL DEFAULT 3,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `role_id`(`role_id` ASC) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Super Admin', 'superadmin', 'superadmin@localhost.com', '0838555250', 'password', 1, '2023-07-07 23:06:20', '2023-07-08 04:38:43');
INSERT INTO `users` VALUES (2, 'Admin', 'admin', 'admin@localhost.com', '0819555042', 'password', 2, '2023-07-07 23:06:20', '2023-07-08 04:38:45');
INSERT INTO `users` VALUES (3, 'User', 'user', 'user@localhost.com', '0857555392', 'password', 3, '2023-07-07 23:06:20', '2023-07-08 04:38:48');
INSERT INTO `users` VALUES (4, 'Guest', 'guest', 'guest@localhost.com', '0838555600', 'password', 4, '2023-07-07 23:06:20', '2023-07-08 04:38:51');
INSERT INTO `users` VALUES (5, 'Budi Santoso', 'budisantoso', 'budi.santoso@localhost.com', '0899555964', 'password', 3, '2023-07-07 23:06:20', '2023-07-08 04:38:54');
INSERT INTO `users` VALUES (6, 'Siti Rahayu', 'sitirahayu', 'siti.rahayu@localhost.com', '0896555581', 'password', 3, '2023-07-07 23:06:20', '2023-07-08 04:38:57');
INSERT INTO `users` VALUES (7, 'Agus Widodo', 'aguswidodo', 'agus.widodo@localhost.com', '0878555873', 'password', 3, '2023-07-07 23:06:20', '2023-07-08 04:38:59');
INSERT INTO `users` VALUES (8, 'Dewi Setiawati', 'dewisetiawati', 'dewi.setiawati@localhost.com', '0858555087', 'password', 3, '2023-07-07 23:06:20', '2023-07-08 04:39:01');
INSERT INTO `users` VALUES (9, 'Hendro Susanto', 'hendrosusanto', 'hendro.susanto@localhost.com', '0838555279', 'password', 3, '2023-07-07 23:06:20', '2023-07-08 04:39:05');

SET FOREIGN_KEY_CHECKS = 1;
