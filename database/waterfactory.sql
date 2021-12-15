CREATE TABLE `bill`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `waterid` int NOT NULL,
  `quantity` int NOT NULL,
  `sellprice` decimal(10, 2) NOT NULL,
  `amount` decimal(10, 2) NOT NULL,
  `factoryid` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `customer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cardid` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` varchar(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `village` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `district` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `province` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `factoryid` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `factoryid`(`factoryid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `factory`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `factoryname` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `userid`(`userid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `language`  (
  `language_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ascii` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  PRIMARY KEY (`language_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

CREATE TABLE `language_source`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 297 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

CREATE TABLE `language_translate`  (
  `id` int NOT NULL,
  `language` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `translation` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`, `language`) USING BTREE,
  INDEX `language_translate_idx_language`(`language`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `post`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ',
  `postname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ຊື່ຕຳແໜ່ງ',
  `salary` decimal(10, 2) NOT NULL COMMENT 'ເງິນເດືອນ',
  `factoryid` int NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `factoryid`(`factoryid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `prepareforsell`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `waterid` int NOT NULL,
  `quality` int NOT NULL,
  `sellprice` decimal(10, 2) NOT NULL,
  `discount` decimal(10, 2) NULL DEFAULT NULL,
  `customerid` int NULL DEFAULT NULL,
  `factoryid` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `waterid`(`waterid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `salarypaid`  (
  `id` int NOT NULL COMMENT 'ລະຫັດ',
  `date` datetime NOT NULL COMMENT 'ວັນທີ-ເວລາ ທີ່ຈ່າຍເງິນ',
  `salaryamount` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ຈຳນວນເງິນເດືອນ',
  `stuffid` int NOT NULL COMMENT 'ລະຫັດພະນັກງານ',
  `factoryid` int NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `stuffid`(`stuffid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `stuff`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ',
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ຊື່ ແລະ ນາມສະກຸນ',
  `gender` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ເພດ',
  `dob` date NOT NULL COMMENT 'ວັນເດືອນປີເກີດ',
  `card_id` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ເລກບັດປະຈຳໂຕ',
  `tel` varchar(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ເບີໂທລະສັບ',
  `province_id` int NOT NULL COMMENT 'ລະຫັດແຂວງ',
  `district_id` int NOT NULL COMMENT 'ລະຫັດເມືອງ',
  `village_id` int NOT NULL COMMENT 'ລະຫັດບ້ານ',
  `paysalary` date NULL DEFAULT NULL COMMENT 'ຈ່າຍເງິນເດືອນ',
  `post_id` int NOT NULL COMMENT 'ລະຫັດຕຳແໜ່ງ',
  `factory_id` int NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  `userid` int NOT NULL COMMENT 'ລະຫັດເຈົ້າຂອງໂຮງງານ',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `factory_id`(`factory_id`) USING BTREE,
  INDEX `post_id`(`post_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `stuffasuser`  (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດ',
  `uname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ຊື່ຜູ້ໃຊ້',
  `pword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ລະຫັດຜ່ານ',
  `status` int NOT NULL DEFAULT 1,
  `stuffid` int NOT NULL COMMENT 'ລະຫັດພະນັກງານ',
  `factoryid` int NOT NULL COMMENT 'ລະຫັດໂຮງງານ',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `stuffid`(`stuffid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint NOT NULL DEFAULT 10,
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `password_reset_token`(`password_reset_token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

CREATE TABLE `water`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `watername` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `unit` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quality` int NULL DEFAULT NULL,
  `sellprice` decimal(10, 0) NOT NULL,
  `factoryid` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `factoryid`(`factoryid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `water_has_bill`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `waterid` int NOT NULL,
  `billid` int NOT NULL,
  `factoryid` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `waterid`(`waterid`) USING BTREE,
  INDEX `billid`(`billid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

CREATE TABLE `wateradd`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `waterid` int NOT NULL,
  `quality` int NOT NULL,
  `unit` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `factoryid` int NOT NULL,
  `userid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `wateradd_ibfk_1`(`waterid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

ALTER TABLE `customer` ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`factoryid`) REFERENCES `factory` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `factory` ADD CONSTRAINT `factory_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `language_translate` ADD CONSTRAINT `language_translate_ibfk_1` FOREIGN KEY (`language`) REFERENCES `language` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `language_translate` ADD CONSTRAINT `language_translate_ibfk_2` FOREIGN KEY (`id`) REFERENCES `language_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `post` ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`factoryid`) REFERENCES `factory` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `prepareforsell` ADD CONSTRAINT `prepareforsell_ibfk_1` FOREIGN KEY (`waterid`) REFERENCES `water` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `salarypaid` ADD CONSTRAINT `salarypaid_ibfk_1` FOREIGN KEY (`stuffid`) REFERENCES `stuff` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `stuff` ADD CONSTRAINT `stuff_ibfk_1` FOREIGN KEY (`factory_id`) REFERENCES `factory` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `stuff` ADD CONSTRAINT `stuff_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `stuffasuser` ADD CONSTRAINT `stuffasuser_ibfk_1` FOREIGN KEY (`stuffid`) REFERENCES `stuff` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `water` ADD CONSTRAINT `water_ibfk_1` FOREIGN KEY (`factoryid`) REFERENCES `factory` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `water_has_bill` ADD CONSTRAINT `water_has_bill_ibfk_1` FOREIGN KEY (`waterid`) REFERENCES `water` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `water_has_bill` ADD CONSTRAINT `water_has_bill_ibfk_2` FOREIGN KEY (`billid`) REFERENCES `bill` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `wateradd` ADD CONSTRAINT `wateradd_ibfk_1` FOREIGN KEY (`waterid`) REFERENCES `water` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `prepareforsellview` AS SELECT `prepareforsell`.`id` AS `id`, `prepareforsell`.`waterid` AS `waterid`, `prepareforsell`.`quality` AS `quality`, `prepareforsell`.`sellprice` AS `sellprice`, `prepareforsell`.`quality`* `prepareforsell`.`sellprice` AS `amount`, `prepareforsell`.`discount` AS `discount`, `prepareforsell`.`quality`* `prepareforsell`.`sellprice` * (`prepareforsell`.`discount` / 100) AS `amountdiscount`, `prepareforsell`.`customerid` AS `customerid`, `prepareforsell`.`factoryid` AS `factoryid`, `prepareforsell`.`userid` AS `userid` FROM `prepareforsell`;

