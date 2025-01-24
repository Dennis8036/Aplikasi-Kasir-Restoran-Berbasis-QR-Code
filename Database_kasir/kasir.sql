/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : kasir

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 24/01/2025 19:29:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_activity
-- ----------------------------
DROP TABLE IF EXISTS `tb_activity`;
CREATE TABLE `tb_activity`  (
  `id_activity` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NULL DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `timestamp` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_activity`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_activity
-- ----------------------------
INSERT INTO `tb_activity` VALUES (1, 1, 'User melakukan Penghapusan seluruh data activity', '2025-01-24 19:11:28');
INSERT INTO `tb_activity` VALUES (2, 1, 'User membuka Log Activity', '2025-01-24 19:11:28');
INSERT INTO `tb_activity` VALUES (3, 1, 'User membuka halaman Setting', '2025-01-24 19:11:32');
INSERT INTO `tb_activity` VALUES (4, 1, 'User membuka view meja', '2025-01-24 19:11:35');
INSERT INTO `tb_activity` VALUES (5, 1, 'User membuka view User', '2025-01-24 19:11:54');
INSERT INTO `tb_activity` VALUES (6, 1, 'User membuka view meja', '2025-01-24 19:11:56');
INSERT INTO `tb_activity` VALUES (7, 1, 'User membuka Daftar Menu', '2025-01-24 19:12:05');
INSERT INTO `tb_activity` VALUES (8, 1, 'User membuka halaman pesanan', '2025-01-24 19:12:17');
INSERT INTO `tb_activity` VALUES (9, 1, 'User membuka view meja', '2025-01-24 19:12:20');
INSERT INTO `tb_activity` VALUES (10, 1, 'User membuka halaman kategori', '2025-01-24 19:12:32');
INSERT INTO `tb_activity` VALUES (11, 1, 'User membuka Daftar Menu', '2025-01-24 19:12:34');
INSERT INTO `tb_activity` VALUES (12, 1, 'User membuka halaman pesanan', '2025-01-24 19:12:36');
INSERT INTO `tb_activity` VALUES (13, 1, 'User membuka view User', '2025-01-24 19:12:39');
INSERT INTO `tb_activity` VALUES (14, 1, 'User membuka view meja', '2025-01-24 19:12:41');
INSERT INTO `tb_activity` VALUES (15, 1, 'User membuka Daftar Menu', '2025-01-24 19:12:43');
INSERT INTO `tb_activity` VALUES (16, 1, 'User membuka halaman pesanan', '2025-01-24 19:12:44');
INSERT INTO `tb_activity` VALUES (17, 1, 'User membuka Daftar Menu', '2025-01-24 19:12:51');
INSERT INTO `tb_activity` VALUES (18, 1, 'User membuka halaman kategori', '2025-01-24 19:12:53');
INSERT INTO `tb_activity` VALUES (19, 1, 'User melakukan logout', '2025-01-24 19:12:57');
INSERT INTO `tb_activity` VALUES (20, 1, 'User membuka Dashboard', '2025-01-24 19:13:10');
INSERT INTO `tb_activity` VALUES (21, 1, 'User membuka halaman pesanan', '2025-01-24 19:13:13');
INSERT INTO `tb_activity` VALUES (22, 1, 'User membuka halaman kategori', '2025-01-24 19:13:18');
INSERT INTO `tb_activity` VALUES (23, 1, 'User membuka view meja', '2025-01-24 19:13:20');
INSERT INTO `tb_activity` VALUES (24, 1, 'User membuka view User', '2025-01-24 19:13:22');
INSERT INTO `tb_activity` VALUES (25, 1, 'User membuka Log Activity', '2025-01-24 19:13:24');
INSERT INTO `tb_activity` VALUES (26, 1, 'User membuka halaman pesanan', '2025-01-24 19:13:27');
INSERT INTO `tb_activity` VALUES (27, 1, 'User melakukan logout', '2025-01-24 19:13:44');
INSERT INTO `tb_activity` VALUES (28, 1, 'User membuka Dashboard', '2025-01-24 19:17:01');
INSERT INTO `tb_activity` VALUES (29, 1, 'User membuka halaman kategori', '2025-01-24 19:17:11');
INSERT INTO `tb_activity` VALUES (30, 1, 'User membuka Daftar Menu', '2025-01-24 19:17:28');
INSERT INTO `tb_activity` VALUES (31, 1, 'User membuka Form Penambahan Data Menu', '2025-01-24 19:17:35');
INSERT INTO `tb_activity` VALUES (32, 1, 'User membuka Daftar Menu', '2025-01-24 19:18:03');
INSERT INTO `tb_activity` VALUES (33, 1, 'User melakukan Pengeditan Menu', '2025-01-24 19:18:17');
INSERT INTO `tb_activity` VALUES (34, 1, 'User membuka Daftar Menu', '2025-01-24 19:18:18');
INSERT INTO `tb_activity` VALUES (35, 1, 'User melakukan Pengeditan Menu', '2025-01-24 19:18:24');
INSERT INTO `tb_activity` VALUES (36, 1, 'User membuka Daftar Menu', '2025-01-24 19:18:24');
INSERT INTO `tb_activity` VALUES (37, 1, 'User membuka halaman pesanan', '2025-01-24 19:18:37');
INSERT INTO `tb_activity` VALUES (38, 1, 'User membuka view meja', '2025-01-24 19:18:46');
INSERT INTO `tb_activity` VALUES (39, 1, 'User membuka halaman pesanan', '2025-01-24 19:20:10');
INSERT INTO `tb_activity` VALUES (40, 1, 'User Melakukan Orderan Makanan', '2025-01-24 19:20:13');
INSERT INTO `tb_activity` VALUES (41, 1, 'User Melakukan Orderan Makanan', '2025-01-24 19:20:25');
INSERT INTO `tb_activity` VALUES (42, 1, 'User melakukan Penambahan Data Pesanan', '2025-01-24 19:21:15');
INSERT INTO `tb_activity` VALUES (43, 1, 'User membuka halaman pesanan', '2025-01-24 19:21:15');
INSERT INTO `tb_activity` VALUES (44, 1, 'User membuka view User', '2025-01-24 19:21:51');
INSERT INTO `tb_activity` VALUES (45, 1, 'User membuka Log Activity', '2025-01-24 19:21:57');
INSERT INTO `tb_activity` VALUES (46, 1, 'User membuka halaman Setting', '2025-01-24 19:22:03');
INSERT INTO `tb_activity` VALUES (47, 1, 'User masuk ke profile', '2025-01-24 19:22:10');
INSERT INTO `tb_activity` VALUES (48, 1, 'Mengubah Password', '2025-01-24 19:22:17');
INSERT INTO `tb_activity` VALUES (49, 1, 'User melakukan logout', '2025-01-24 19:22:23');

-- ----------------------------
-- Table structure for tb_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori`  (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kategori
-- ----------------------------
INSERT INTO `tb_kategori` VALUES (1, 'Makanan');
INSERT INTO `tb_kategori` VALUES (3, 'Minuman');
INSERT INTO `tb_kategori` VALUES (4, 'Dessert');

-- ----------------------------
-- Table structure for tb_meja
-- ----------------------------
DROP TABLE IF EXISTS `tb_meja`;
CREATE TABLE `tb_meja`  (
  `id_meja` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_meja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `qr_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_meja`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_meja
-- ----------------------------
INSERT INTO `tb_meja` VALUES (1, 'Meja 1', NULL);
INSERT INTO `tb_meja` VALUES (2, 'Meja 2', NULL);
INSERT INTO `tb_meja` VALUES (3, 'Meja 3', NULL);
INSERT INTO `tb_meja` VALUES (4, 'Meja 4', NULL);

-- ----------------------------
-- Table structure for tb_menu
-- ----------------------------
DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE `tb_menu`  (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NULL DEFAULT NULL,
  `nama_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stok` enum('Tersedia','Habis') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_menu
-- ----------------------------
INSERT INTO `tb_menu` VALUES (16, 1, 'Nasi Goreng', '15000', '1737528127.jpg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (25, 1, 'Mie Goreng', '15000', '1737544558.jpg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (26, 1, 'Nasi Putih', '5000', '1737544780.png', 'Tersedia');
INSERT INTO `tb_menu` VALUES (27, 1, 'Sup Ayam', '30000', '1737545967.jpeg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (28, 1, 'Mie Soto Ayam', ' 17000', '1737545998.jpg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (29, 3, 'Air Mineral', '5000', 'bxfdAXBTnzXyipfwYCRIYIEJHVQ9QccgMagdVK6L.webp', 'Tersedia');
INSERT INTO `tb_menu` VALUES (30, 3, 'Teh Obeng', ' 7000', '1737546041.jpg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (31, 3, 'Es Jeruk', ' 13000', '1737546061.jpg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (32, 3, 'Cappuccino', ' 25000', '1737546104.jpg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (33, 4, 'Chocolate Cake', ' 27000', '1737546173.jpg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (34, 4, 'Cheese Cake', ' 27000', '1737546196.jpg', 'Tersedia');
INSERT INTO `tb_menu` VALUES (35, 4, 'Pancake', ' 35000', '1737546227.avif', 'Tersedia');

-- ----------------------------
-- Table structure for tb_pesanan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pesanan`;
CREATE TABLE `tb_pesanan`  (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_meja` int(11) NULL DEFAULT NULL,
  `id_menu` int(11) NULL DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total_harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_pesanan` enum('Pending','Selesai','Batal') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_pesan` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pesanan
-- ----------------------------
INSERT INTO `tb_pesanan` VALUES (27, 8, 30, '2', '14000', 'Pending', '2025-01-24 18:59:03');
INSERT INTO `tb_pesanan` VALUES (28, 8, 31, '1', '13000', 'Pending', '2025-01-24 18:59:03');
INSERT INTO `tb_pesanan` VALUES (31, 3, 16, '2', '30000', 'Pending', '2025-01-24 19:21:15');
INSERT INTO `tb_pesanan` VALUES (32, 3, 31, '1', '13000', 'Pending', '2025-01-24 19:21:15');

-- ----------------------------
-- Table structure for tb_setting
-- ----------------------------
DROP TABLE IF EXISTS `tb_setting`;
CREATE TABLE `tb_setting`  (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_dashboard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_tab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_setting
-- ----------------------------
INSERT INTO `tb_setting` VALUES (1, 'Kasir Restoran', 'logo_kasir_2.png', 'logo_kasir_1.png', 'logo_kasir_3.png');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_level` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_at` datetime(0) NULL DEFAULT NULL,
  `update_at` datetime(0) NULL DEFAULT NULL,
  `delete_at` datetime(0) NULL DEFAULT NULL,
  `create_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `delete_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin@gmail.com', '1', '1726230005_28d6e9ea0ca83d2be479.jpg', '2025-01-13 09:38:58', '2025-01-21 14:22:12', NULL, NULL, 1, NULL);
INSERT INTO `tb_user` VALUES (2, 'kasir', 'c81e728d9d4c2f636f067f89cc14862c', 'kasir@gmail.com', '2', '1727069096_2edc2e6a17ea73c3a9db.jpg', '2025-01-13 09:40:00', '2025-01-21 18:37:06', NULL, NULL, 0, NULL);
INSERT INTO `tb_user` VALUES (3, 'pelanggan', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'pelanggan@gmail.com', '3', NULL, '2025-01-13 09:46:00', '2025-01-14 21:28:42', NULL, NULL, 0, NULL);

SET FOREIGN_KEY_CHECKS = 1;
