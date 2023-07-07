/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : mahasiswa

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 07/07/2023 15:16:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `tb_mahasiswa`;
CREATE TABLE `tb_mahasiswa`  (
  `mhs_id` int NOT NULL AUTO_INCREMENT,
  `mhs_nim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mhs_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mhs_angkatan` int NULL DEFAULT NULL,
  PRIMARY KEY (`mhs_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_mahasiswa
-- ----------------------------
INSERT INTO `tb_mahasiswa` VALUES (1, '20180001', 'Jono', 2018);
INSERT INTO `tb_mahasiswa` VALUES (2, '20180002', 'Taufik', 2018);
INSERT INTO `tb_mahasiswa` VALUES (3, '20180003', 'Maria', 2018);
INSERT INTO `tb_mahasiswa` VALUES (4, '2019001', 'Sari', 2019);
INSERT INTO `tb_mahasiswa` VALUES (5, '2019002', 'Bambang', 2019);

-- ----------------------------
-- Table structure for tb_mahasiswa_nilai
-- ----------------------------
DROP TABLE IF EXISTS `tb_mahasiswa_nilai`;
CREATE TABLE `tb_mahasiswa_nilai`  (
  `mhs_nilai_id` int NOT NULL AUTO_INCREMENT,
  `mhs_id` int NULL DEFAULT NULL,
  `mk_id` int NULL DEFAULT NULL,
  `nilai` float NULL DEFAULT NULL,
  PRIMARY KEY (`mhs_nilai_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_mahasiswa_nilai
-- ----------------------------
INSERT INTO `tb_mahasiswa_nilai` VALUES (1, 1, 1, 70);
INSERT INTO `tb_mahasiswa_nilai` VALUES (2, 1, 1, 80);
INSERT INTO `tb_mahasiswa_nilai` VALUES (3, 2, 1, 82);
INSERT INTO `tb_mahasiswa_nilai` VALUES (4, 2, 2, 74);
INSERT INTO `tb_mahasiswa_nilai` VALUES (5, 4, 1, 76);
INSERT INTO `tb_mahasiswa_nilai` VALUES (6, 4, 2, 80);
INSERT INTO `tb_mahasiswa_nilai` VALUES (7, 5, 1, 60);

-- ----------------------------
-- Table structure for tb_matakuliah
-- ----------------------------
DROP TABLE IF EXISTS `tb_matakuliah`;
CREATE TABLE `tb_matakuliah`  (
  `mk_id` int NOT NULL AUTO_INCREMENT,
  `mk_kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mk_sks` int NULL DEFAULT NULL,
  `mk_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mk_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_matakuliah
-- ----------------------------
INSERT INTO `tb_matakuliah` VALUES (1, 'MK202   ', 3, 'OOP');
INSERT INTO `tb_matakuliah` VALUES (2, 'MK303', 2, 'Basis Data');

SET FOREIGN_KEY_CHECKS = 1;
