
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LastName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 'John', 'White', 'johndoe@example.com', '812483f', '1234567890', '123 Main St');
INSERT INTO `customers` VALUES (2, 'Jane', 'Smith', 'janesmith@example.com', '717a8fc', '9876543210', '456 Elm St');
INSERT INTO `customers` VALUES (3, 'Mike', 'Johnson', 'mikejohnson@example.com', '86b429b', '5555555555', '789 Oak Ave');
INSERT INTO `customers` VALUES (4, 'Sarah', 'Williams', 'sarahwilliams@example.com', 'e403d25', '1111111111', '321 Maple Ln');
INSERT INTO `customers` VALUES (5, 'David', 'Brown', 'davidbrown@example.com', '1ad937f3', '9999999999', '654 Pine Dr');
INSERT INTO `customers` VALUES (6, 'Jennifer', 'Taylor', 'jennifertaylor@example.com', 'ca432e', '8888888888', '987 Cedar Rd');
INSERT INTO `customers` VALUES (7, 'Robert', 'Anderson', 'robertanderson@example.com', '96cf70', '7777777777', '741 Birch Blvd');
INSERT INTO `customers` VALUES (8, 'Emily', 'Davis', 'emilydavis@example.com', 'ab8226', '4444444444', '369 Spruce Ave');
INSERT INTO `customers` VALUES (9, 'Michael', 'Thomas', 'michaelthomas@example.com', 'c83ce8', '2222222222', '852 Oakwood Dr');
INSERT INTO `customers` VALUES (10, 'Laura', 'Clark', 'lauraclark@example.com', '6a5e10', '6666666666', '963 Elmwood St');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VehicleID` int(11) NULL DEFAULT NULL,
  `ServiceDate` date NULL DEFAULT NULL,
  `serviceTypeId` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `VehicleID`(`VehicleID`) USING BTREE,
  INDEX `serviceTypeId`(`serviceTypeId`) USING BTREE,
  CONSTRAINT `services_ibfk_1` FOREIGN KEY (`VehicleID`) REFERENCES `vehicles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `services_ibfk_2` FOREIGN KEY (`serviceTypeId`) REFERENCES `servicetypes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 1, '2023-05-01', 1);
INSERT INTO `services` VALUES (2, 1, '2023-04-15', 1);
INSERT INTO `services` VALUES (3, 2, '2023-05-10', 3);
INSERT INTO `services` VALUES (4, 4, '2023-05-05', 6);
INSERT INTO `services` VALUES (5, 4, '2023-05-12', 5);
INSERT INTO `services` VALUES (6, 5, '2023-04-28', 6);
INSERT INTO `services` VALUES (7, 8, '2023-05-02', 2);
INSERT INTO `services` VALUES (8, 7, '2023-04-29', 3);
INSERT INTO `services` VALUES (9, 8, '2023-05-18', 4);
INSERT INTO `services` VALUES (10, 9, '2023-05-08', 4);

-- ----------------------------
-- Table structure for servicetypes
-- ----------------------------
DROP TABLE IF EXISTS `servicetypes`;
CREATE TABLE `servicetypes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `serviceDescription` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `serviceCost` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of servicetypes
-- ----------------------------
INSERT INTO `servicetypes` VALUES (1, 'Oil Change', 'Regular oil change and filter replacement', 50);
INSERT INTO `servicetypes` VALUES (2, 'Tire Rotation', 'Rotating tires for even wear', 20);
INSERT INTO `servicetypes` VALUES (3, 'Brake Inspection', 'Thorough inspection of brake system', 30);
INSERT INTO `servicetypes` VALUES (4, 'Air Conditioning Service', 'Inspection and maintenance of the air conditioning system', 60);
INSERT INTO `servicetypes` VALUES (5, 'Wheel Alignment', 'Adjustment of wheel angles for proper alignment', 40);
INSERT INTO `servicetypes` VALUES (6, 'Battery Replacement', 'Replacement of the vehicle battery', 80);
INSERT INTO `servicetypes` VALUES (7, 'Transmission Service', 'Maintenance and fluid replacement for the transmission', 120);
INSERT INTO `servicetypes` VALUES (8, 'Engine Tune-up', 'Optimization of engine performance', 90);
INSERT INTO `servicetypes` VALUES (9, 'Fuel System Cleaning', 'Cleaning and maintenance of the fuel system', 70);
INSERT INTO `servicetypes` VALUES (10, 'Diagnostic Service', 'Troubleshooting and identification of vehicle issues', 50);

-- ----------------------------
-- Table structure for vehicles
-- ----------------------------
DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NULL DEFAULT NULL,
  `Make` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Model` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Year` int(11) NULL DEFAULT NULL,
  `VIN` varchar(17) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LicensePlate` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `CustomerId`(`CustomerId`) USING BTREE,
  CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of vehicles
-- ----------------------------
INSERT INTO `vehicles` VALUES (1, 1, 'Toyota', 'Camry', 2015, '1HGCM82633A01', 'ABC123');
INSERT INTO `vehicles` VALUES (2, 1, 'Honda', 'Accord', 2018, '1HGCV1F32JA02', 'DEF456');
INSERT INTO `vehicles` VALUES (3, 4, 'Ford', 'F-150', 2019, '1FTMF1CB7KFA03', 'GHI789');
INSERT INTO `vehicles` VALUES (4, 3, 'Chevrolet', 'Cruze', 2017, '1G1BE5SM4H72404', 'JKL012');
INSERT INTO `vehicles` VALUES (5, 4, 'Volkswagen', 'Jetta', 2020, '3VWC57BU7LM05', 'MNO345');
INSERT INTO `vehicles` VALUES (6, 5, 'Nissan', 'Altima', 2016, '1N4AL3AP6GC06', 'PQR678');
INSERT INTO `vehicles` VALUES (7, 8, 'Hyundai', 'Elantra', 2019, '5NPD84LF6K007', 'STU901');
INSERT INTO `vehicles` VALUES (8, 7, 'Honda', 'Civic', 2021, '2HGFC1F50MH08', 'VWX234');
INSERT INTO `vehicles` VALUES (9, 8, 'Toyota', 'Corolla', 2014, '5YFBURHE80009', 'YZA567');
INSERT INTO `vehicles` VALUES (10, 9, 'Ford', 'Escape', 2018, '1FMCU0F78JUA10', 'BCD789');

SET FOREIGN_KEY_CHECKS = 1;
