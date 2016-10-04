/*
Navicat MySQL Data Transfer

Source Server         : Holygardens
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : dbholygarden

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2017-04-04 12:32:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tblacunit
-- ----------------------------
DROP TABLE IF EXISTS `tblacunit`;
CREATE TABLE `tblacunit` (
  `intUnitID` int(11) NOT NULL AUTO_INCREMENT,
  `strUnitName` varchar(45) NOT NULL,
  `intUnitStatus` int(11) NOT NULL,
  `intCapacity` int(11) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intLevelAshID` int(11) NOT NULL,
  `intCustomerId` int(11) DEFAULT NULL,
  PRIMARY KEY (`intUnitID`),
  KEY `fk_tblacunit_intLevelAshID_idx` (`intLevelAshID`),
  KEY `fk_tblacunit_intCustomerId_idx` (`intCustomerId`),
  CONSTRAINT `fk_tblacunit_intCustomerId` FOREIGN KEY (`intCustomerId`) REFERENCES `tblcustomer` (`intCustomerId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblacunit_intLevelAshID` FOREIGN KEY (`intLevelAshID`) REFERENCES `tbllevelash` (`intLevelAshID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblacunit
-- ----------------------------
INSERT INTO `tblacunit` VALUES ('7', 'A0001', '1', '2', '0', '7', null);
INSERT INTO `tblacunit` VALUES ('8', 'A0002', '0', '2', '0', '7', null);
INSERT INTO `tblacunit` VALUES ('9', 'A0003', '0', '2', '0', '7', null);
INSERT INTO `tblacunit` VALUES ('10', 'K0001', '0', '2', '0', '10', null);
INSERT INTO `tblacunit` VALUES ('11', 'K0002', '0', '2', '0', '10', null);
INSERT INTO `tblacunit` VALUES ('12', 'K0003', '0', '2', '0', '10', null);
INSERT INTO `tblacunit` VALUES ('13', 'K0004', '0', '2', '0', '10', null);
INSERT INTO `tblacunit` VALUES ('14', 'K0005', '0', '2', '0', '10', null);
INSERT INTO `tblacunit` VALUES ('15', 'K0006', '0', '2', '0', '10', null);

-- ----------------------------
-- Table structure for tblashcrypt
-- ----------------------------
DROP TABLE IF EXISTS `tblashcrypt`;
CREATE TABLE `tblashcrypt` (
  `intAshID` int(11) NOT NULL AUTO_INCREMENT,
  `strAshName` varchar(45) NOT NULL,
  `intNoOfLevel` int(11) NOT NULL,
  `intStatus` int(11) NOT NULL,
  PRIMARY KEY (`intAshID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblashcrypt
-- ----------------------------
INSERT INTO `tblashcrypt` VALUES ('3', 'St.Peter', '3', '0');
INSERT INTO `tblashcrypt` VALUES ('4', 'Kryptonite', '4', '0');

-- ----------------------------
-- Table structure for tblashdeceased
-- ----------------------------
DROP TABLE IF EXISTS `tblashdeceased`;
CREATE TABLE `tblashdeceased` (
  `intAshDeceasedId` int(11) NOT NULL AUTO_INCREMENT,
  `intUnitId` int(11) NOT NULL,
  `intDeceasedId` int(11) NOT NULL,
  PRIMARY KEY (`intAshDeceasedId`),
  KEY `fk_tblashdeceased_intUnitId_idx` (`intUnitId`),
  KEY `fk_tblashdeceased_intDeceasedId_idx` (`intDeceasedId`),
  CONSTRAINT `fk_tblashdeceased_intDeceasedId` FOREIGN KEY (`intDeceasedId`) REFERENCES `tbldeceased` (`intDeceasedId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblashdeceased_intUnitId` FOREIGN KEY (`intUnitId`) REFERENCES `tblacunit` (`intUnitID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblashdeceased
-- ----------------------------

-- ----------------------------
-- Table structure for tblavailunit
-- ----------------------------
DROP TABLE IF EXISTS `tblavailunit`;
CREATE TABLE `tblavailunit` (
  `intAvailUnitId` int(11) NOT NULL AUTO_INCREMENT,
  `intLotId` int(11) NOT NULL,
  `intCustomerId` int(11) NOT NULL,
  `dateAvailUnit` date NOT NULL,
  `strModeOfPayment` varchar(45) NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `intStatus` int(11) DEFAULT NULL,
  `intInterestId` int(11) DEFAULT NULL,
  `deciDownpayment` decimal(12,2) DEFAULT NULL,
  `deciBalance` decimal(12,2) DEFAULT NULL,
  `datDueDate` date DEFAULT NULL,
  `boolDownpaymentStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`intAvailUnitId`),
  KEY `fk_tblavailunit_intLotId_idx` (`intLotId`),
  KEY `fk_tblavailunit_intCustomerId_idx` (`intCustomerId`),
  KEY `fk_tblavailunit_intInterestId_idx` (`intInterestId`),
  CONSTRAINT `fk_tblavailunit_intCustomerId` FOREIGN KEY (`intCustomerId`) REFERENCES `tblcustomer` (`intCustomerId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblavailunit_intInterestId` FOREIGN KEY (`intInterestId`) REFERENCES `tblinterest` (`intInterestId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblavailunit_intLotId` FOREIGN KEY (`intLotId`) REFERENCES `tbllot` (`intLotID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblavailunit
-- ----------------------------
INSERT INTO `tblavailunit` VALUES ('6', '19', '3', '2016-10-01', 'Reserve', '1000.00', '0', '9', '50000.00', '408750.00', '2016-10-06', '1');
INSERT INTO `tblavailunit` VALUES ('7', '20', '3', '2016-10-01', 'At-Need', '1000.00', '0', '9', '50000.00', '450000.00', '2016-10-06', '1');
INSERT INTO `tblavailunit` VALUES ('8', '29', '4', '2017-01-01', 'Spotcash', '153000.00', null, null, null, null, null, null);
INSERT INTO `tblavailunit` VALUES ('9', '32', '5', '2017-01-01', 'Reserve', '5000.00', '0', '10', '16975.03', '148955.85', '2017-01-06', '1');

-- ----------------------------
-- Table structure for tblavailunitash
-- ----------------------------
DROP TABLE IF EXISTS `tblavailunitash`;
CREATE TABLE `tblavailunitash` (
  `intAvailUnitAshId` int(11) NOT NULL AUTO_INCREMENT,
  `intUnitId` int(11) NOT NULL,
  `intCustomerId` int(11) NOT NULL,
  `dateAvailUnit` date NOT NULL,
  `strModeOfPayment` varchar(45) NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `intStatus` int(11) DEFAULT NULL,
  `intInterestId` int(11) DEFAULT NULL,
  `deciDownpayment` decimal(12,2) DEFAULT NULL,
  `deciBalance` decimal(12,2) DEFAULT NULL,
  `datDueDate` date DEFAULT NULL,
  `tblavailunitashcol` varchar(45) DEFAULT NULL,
  `boolDownpaymentStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`intAvailUnitAshId`),
  KEY `fk_tblavailunitash_intUnitId_idx` (`intUnitId`),
  KEY `fk_tblavailunitash_intCustomerId_idx` (`intCustomerId`),
  KEY `fk_tblavailunitash_intInterestId_idx` (`intInterestId`),
  CONSTRAINT `fk_tblavailunitash_intCustomerId` FOREIGN KEY (`intCustomerId`) REFERENCES `tblcustomer` (`intCustomerId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblavailunitash_intInterestId` FOREIGN KEY (`intInterestId`) REFERENCES `tblinterest` (`intInterestId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblavailunitash_intUnitId` FOREIGN KEY (`intUnitId`) REFERENCES `tblacunit` (`intUnitID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblavailunitash
-- ----------------------------
INSERT INTO `tblavailunitash` VALUES ('2', '7', '3', '2016-10-01', 'Reserve', '1000.00', '0', '9', '3000.00', '27000.00', '2016-10-06', null, '1');

-- ----------------------------
-- Table structure for tblblock
-- ----------------------------
DROP TABLE IF EXISTS `tblblock`;
CREATE TABLE `tblblock` (
  `intBlockID` int(11) NOT NULL AUTO_INCREMENT,
  `strBlockName` varchar(45) NOT NULL,
  `intNoOfLot` int(11) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intSectionID` int(11) NOT NULL,
  `intTypeID` int(11) NOT NULL,
  PRIMARY KEY (`intBlockID`),
  KEY `fk_tblblock_intSectionID_idx` (`intSectionID`),
  KEY `fk_tblblock_intTypeID_idx` (`intTypeID`),
  CONSTRAINT `fk_tblblock_intSectionID` FOREIGN KEY (`intSectionID`) REFERENCES `tblsection` (`intSectionID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblblock_intTypeID` FOREIGN KEY (`intTypeID`) REFERENCES `tbltypeoflot` (`intTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblblock
-- ----------------------------
INSERT INTO `tblblock` VALUES ('17', 'A', '3', '0', '14', '6');
INSERT INTO `tblblock` VALUES ('18', 'B', '3', '0', '14', '6');
INSERT INTO `tblblock` VALUES ('19', 'C', '3', '0', '14', '6');
INSERT INTO `tblblock` VALUES ('20', 'A', '5', '0', '15', '8');
INSERT INTO `tblblock` VALUES ('21', 'B', '5', '0', '15', '8');
INSERT INTO `tblblock` VALUES ('22', 'C', '5', '0', '15', '8');

-- ----------------------------
-- Table structure for tblbusinessdependency
-- ----------------------------
DROP TABLE IF EXISTS `tblbusinessdependency`;
CREATE TABLE `tblbusinessdependency` (
  `intBusinessDependencyId` int(11) NOT NULL AUTO_INCREMENT,
  `strBusinessDependencyName` varchar(225) NOT NULL,
  `deciBusinessDependencyValue` decimal(8,2) NOT NULL,
  PRIMARY KEY (`intBusinessDependencyId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblbusinessdependency
-- ----------------------------
INSERT INTO `tblbusinessdependency` VALUES ('1', 'downpayment', '10.00');
INSERT INTO `tblbusinessdependency` VALUES ('2', 'reservation', '1000.00');
INSERT INTO `tblbusinessdependency` VALUES ('3', 'discount', '10.00');
INSERT INTO `tblbusinessdependency` VALUES ('4', 'refund', '5000.00');
INSERT INTO `tblbusinessdependency` VALUES ('5', 'penalty', '12.00');
INSERT INTO `tblbusinessdependency` VALUES ('6', 'charge', '10.00');
INSERT INTO `tblbusinessdependency` VALUES ('7', 'gracePeriod', '5.00');
INSERT INTO `tblbusinessdependency` VALUES ('8', 'reservationNoDown', '30.00');
INSERT INTO `tblbusinessdependency` VALUES ('9', 'reservationNotFull', '5.00');
INSERT INTO `tblbusinessdependency` VALUES ('10', 'overdue', '5.00');

-- ----------------------------
-- Table structure for tblcollectionash
-- ----------------------------
DROP TABLE IF EXISTS `tblcollectionash`;
CREATE TABLE `tblcollectionash` (
  `intCollectionAshId` int(11) NOT NULL AUTO_INCREMENT,
  `intAvailUnitAshId` int(11) NOT NULL,
  `dateDate` date NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `deciBalance` decimal(12,2) NOT NULL,
  PRIMARY KEY (`intCollectionAshId`),
  KEY `fk_tblcollectionash_intAvailUnitAshId_idx` (`intAvailUnitAshId`),
  CONSTRAINT `fk_tblcollectionash_intAvailUnitAshId` FOREIGN KEY (`intAvailUnitAshId`) REFERENCES `tblavailunitash` (`intAvailUnitAshId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcollectionash
-- ----------------------------

-- ----------------------------
-- Table structure for tblcollectionlot
-- ----------------------------
DROP TABLE IF EXISTS `tblcollectionlot`;
CREATE TABLE `tblcollectionlot` (
  `intCollectionLotId` int(11) NOT NULL AUTO_INCREMENT,
  `intAvailUnitId` int(11) NOT NULL,
  `dateDate` date NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `deciBalance` decimal(12,2) NOT NULL,
  PRIMARY KEY (`intCollectionLotId`),
  KEY `fk_tblcollectionlot_intAvailUnitId_idx` (`intAvailUnitId`),
  CONSTRAINT `fk_tblcollectionlot_intAvailUnitId` FOREIGN KEY (`intAvailUnitId`) REFERENCES `tblavailunit` (`intAvailUnitId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcollectionlot
-- ----------------------------
INSERT INTO `tblcollectionlot` VALUES ('19', '6', '2016-11-01', '2818200.00', '408750.00');
INSERT INTO `tblcollectionlot` VALUES ('20', '9', '2017-03-02', '3819.38', '148955.85');

-- ----------------------------
-- Table structure for tblcompanysettings
-- ----------------------------
DROP TABLE IF EXISTS `tblcompanysettings`;
CREATE TABLE `tblcompanysettings` (
  `intCompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `strCompanyName` varchar(60) DEFAULT NULL,
  `strAddress` varchar(100) DEFAULT NULL,
  `strContactNo` varchar(15) DEFAULT NULL,
  `strEmailAddress` varchar(20) DEFAULT NULL,
  `strLogo` text,
  `strColor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`intCompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcompanysettings
-- ----------------------------
INSERT INTO `tblcompanysettings` VALUES ('1', 'Memorial Lot Management System', 'Room 203 F N Crisostomo Building, Sumulong Highway Barangay Mayamot, Antipolo City', '(679)-817-546', 'mlms@gmail.com', '../../pages/images/IMG_20160304_174145.jpg', '#e324d0');

-- ----------------------------
-- Table structure for tblcustomer
-- ----------------------------
DROP TABLE IF EXISTS `tblcustomer`;
CREATE TABLE `tblcustomer` (
  `intCustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strAddress` text NOT NULL,
  `strContactNo` varchar(45) NOT NULL,
  `dateBirthday` date NOT NULL,
  `intGender` int(11) NOT NULL,
  `intCivilStatus` int(11) NOT NULL,
  PRIMARY KEY (`intCustomerId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblcustomer
-- ----------------------------
INSERT INTO `tblcustomer` VALUES ('3', 'Jeron', '', 'Cruz', 'Antipolo', '09123456789', '1996-03-28', '0', '0');
INSERT INTO `tblcustomer` VALUES ('4', 'Gina', '', 'Conors', 'Faculty Room', '0995484957', '1990-08-09', '1', '1');
INSERT INTO `tblcustomer` VALUES ('5', 'Jack', '', 'O\'Conor', 'Faculty Room', '0995484957', '1990-08-09', '0', '0');

-- ----------------------------
-- Table structure for tbldeceased
-- ----------------------------
DROP TABLE IF EXISTS `tbldeceased`;
CREATE TABLE `tbldeceased` (
  `intDeceasedId` int(11) NOT NULL AUTO_INCREMENT,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `intGender` int(11) NOT NULL,
  `dateBirthday` date NOT NULL,
  `dateDeath` date NOT NULL,
  `strRelationship` text NOT NULL,
  `intCustomerId` int(11) NOT NULL,
  PRIMARY KEY (`intDeceasedId`),
  KEY `fk_tbldeceased_intCustomerId_idx` (`intCustomerId`),
  CONSTRAINT `fk_tbldeceased_intCustomerId` FOREIGN KEY (`intCustomerId`) REFERENCES `tblcustomer` (`intCustomerId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbldeceased
-- ----------------------------

-- ----------------------------
-- Table structure for tbldiscount
-- ----------------------------
DROP TABLE IF EXISTS `tbldiscount`;
CREATE TABLE `tbldiscount` (
  `intDiscountID` int(11) NOT NULL AUTO_INCREMENT,
  `strDescription` varchar(45) NOT NULL,
  `dblPercent` decimal(8,2) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intServiceID` int(11) NOT NULL,
  PRIMARY KEY (`intDiscountID`),
  KEY `fk_tbldiscount_intServiceID_idx` (`intServiceID`),
  CONSTRAINT `fk_tbldiscount_intServiceID` FOREIGN KEY (`intServiceID`) REFERENCES `tblservice` (`intServiceID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbldiscount
-- ----------------------------
INSERT INTO `tbldiscount` VALUES ('1', 'Senior Citizen', '0.10', '0', '50');
INSERT INTO `tbldiscount` VALUES ('2', 'On the Spot', '0.15', '0', '53');

-- ----------------------------
-- Table structure for tbldownpaymentash
-- ----------------------------
DROP TABLE IF EXISTS `tbldownpaymentash`;
CREATE TABLE `tbldownpaymentash` (
  `intDownpaymentAshId` int(11) NOT NULL AUTO_INCREMENT,
  `dateDate` date NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `intAvailUnitAshId` int(11) NOT NULL,
  PRIMARY KEY (`intDownpaymentAshId`),
  KEY `fk_tbldownpaymentash_intAvailUnitAshId_idx` (`intAvailUnitAshId`),
  CONSTRAINT `fk_tbldownpaymentash_intAvailUnitAshId` FOREIGN KEY (`intAvailUnitAshId`) REFERENCES `tblavailunitash` (`intAvailUnitAshId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbldownpaymentash
-- ----------------------------
INSERT INTO `tbldownpaymentash` VALUES ('2', '2016-10-01', '3000.00', '2');

-- ----------------------------
-- Table structure for tbldownpaymentlot
-- ----------------------------
DROP TABLE IF EXISTS `tbldownpaymentlot`;
CREATE TABLE `tbldownpaymentlot` (
  `intDownpaymentLotId` int(11) NOT NULL AUTO_INCREMENT,
  `dateDate` date NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `intAvaiUnitId` int(11) NOT NULL,
  PRIMARY KEY (`intDownpaymentLotId`),
  KEY `fk_tbldownpaymentlot_intAvailUnitId_idx` (`intAvaiUnitId`),
  CONSTRAINT `fk_tbldownpaymentlot_intAvailUnitId` FOREIGN KEY (`intAvaiUnitId`) REFERENCES `tblavailunit` (`intAvailUnitId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbldownpaymentlot
-- ----------------------------
INSERT INTO `tbldownpaymentlot` VALUES ('8', '2016-10-01', '50000.00', '6');
INSERT INTO `tbldownpaymentlot` VALUES ('24', '2017-01-01', '50000.00', '7');
INSERT INTO `tbldownpaymentlot` VALUES ('25', '2017-02-02', '17000.00', '9');

-- ----------------------------
-- Table structure for tblemployee
-- ----------------------------
DROP TABLE IF EXISTS `tblemployee`;
CREATE TABLE `tblemployee` (
  `intEmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `strUsername` varchar(45) NOT NULL,
  `strPassword` varchar(45) NOT NULL,
  PRIMARY KEY (`intEmployeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblemployee
-- ----------------------------
INSERT INTO `tblemployee` VALUES ('1', 'admin', 'admin');

-- ----------------------------
-- Table structure for tblinterest
-- ----------------------------
DROP TABLE IF EXISTS `tblinterest`;
CREATE TABLE `tblinterest` (
  `intInterestId` int(11) NOT NULL AUTO_INCREMENT,
  `intNoOfYear` int(11) NOT NULL,
  `deciAtNeedInterest` decimal(8,2) NOT NULL,
  `deciRegularInterest` decimal(8,2) NOT NULL,
  `intStatus` int(11) NOT NULL,
  PRIMARY KEY (`intInterestId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblinterest
-- ----------------------------
INSERT INTO `tblinterest` VALUES ('9', '1', '12.00', '10.00', '0');
INSERT INTO `tblinterest` VALUES ('10', '5', '20.00', '10.00', '0');

-- ----------------------------
-- Table structure for tbllevelash
-- ----------------------------
DROP TABLE IF EXISTS `tbllevelash`;
CREATE TABLE `tbllevelash` (
  `intLevelAshID` int(11) NOT NULL AUTO_INCREMENT,
  `strLevelName` varchar(45) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intNoOfUnit` int(11) NOT NULL,
  `dblSellingPrice` decimal(12,2) NOT NULL,
  `intAshID` int(11) NOT NULL,
  PRIMARY KEY (`intLevelAshID`),
  KEY `fk_tbllevelash_intAshID_idx` (`intAshID`),
  CONSTRAINT `fk_tbllevelash_intAshID` FOREIGN KEY (`intAshID`) REFERENCES `tblashcrypt` (`intAshID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbllevelash
-- ----------------------------
INSERT INTO `tbllevelash` VALUES ('7', 'A', '0', '3', '30000.00', '3');
INSERT INTO `tbllevelash` VALUES ('8', 'B', '0', '3', '30000.00', '3');
INSERT INTO `tbllevelash` VALUES ('9', 'C', '0', '3', '30000.00', '3');
INSERT INTO `tbllevelash` VALUES ('10', 'A', '0', '6', '966000.00', '4');
INSERT INTO `tbllevelash` VALUES ('11', 'B', '0', '6', '966000.00', '4');
INSERT INTO `tbllevelash` VALUES ('12', 'C', '0', '6', '966000.00', '4');
INSERT INTO `tbllevelash` VALUES ('13', 'D', '0', '6', '966000.00', '4');

-- ----------------------------
-- Table structure for tbllot
-- ----------------------------
DROP TABLE IF EXISTS `tbllot`;
CREATE TABLE `tbllot` (
  `intLotID` int(11) NOT NULL AUTO_INCREMENT,
  `strLotName` varchar(45) NOT NULL,
  `intLotStatus` int(11) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intBlockID` int(11) NOT NULL,
  `intCustomerId` int(11) DEFAULT NULL,
  PRIMARY KEY (`intLotID`),
  KEY `fk_tbllot_intBlockID_idx` (`intBlockID`),
  KEY `fk_tbllot_intCustomerId_idx` (`intCustomerId`),
  CONSTRAINT `fk_tbllot_intBlockID` FOREIGN KEY (`intBlockID`) REFERENCES `tblblock` (`intBlockID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbllot_intCustomerId` FOREIGN KEY (`intCustomerId`) REFERENCES `tblcustomer` (`intCustomerId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbllot
-- ----------------------------
INSERT INTO `tbllot` VALUES ('19', 'A0001', '1', '0', '17', null);
INSERT INTO `tbllot` VALUES ('20', 'A0002', '3', '0', '17', null);
INSERT INTO `tbllot` VALUES ('21', 'A0003', '0', '0', '17', null);
INSERT INTO `tbllot` VALUES ('22', 'Hearts0001', '0', '0', '20', null);
INSERT INTO `tbllot` VALUES ('23', 'Hearts0002', '0', '0', '20', null);
INSERT INTO `tbllot` VALUES ('24', 'Hearts0003', '0', '0', '20', null);
INSERT INTO `tbllot` VALUES ('25', 'Hearts0004', '0', '0', '20', null);
INSERT INTO `tbllot` VALUES ('26', 'Hearts0005', '0', '0', '20', null);
INSERT INTO `tbllot` VALUES ('27', 'Eternal0001', '0', '0', '21', null);
INSERT INTO `tbllot` VALUES ('28', 'Eternal0002', '0', '0', '21', null);
INSERT INTO `tbllot` VALUES ('29', 'Eternal0003', '2', '0', '21', null);
INSERT INTO `tbllot` VALUES ('30', 'Eternal0004', '0', '0', '21', null);
INSERT INTO `tbllot` VALUES ('31', 'Eternal0005', '0', '0', '21', null);
INSERT INTO `tbllot` VALUES ('32', 'Everlasting0001', '1', '0', '22', null);
INSERT INTO `tbllot` VALUES ('33', 'Everlasting0002', '0', '0', '22', null);
INSERT INTO `tbllot` VALUES ('34', 'Everlasting0003', '0', '0', '22', null);
INSERT INTO `tbllot` VALUES ('35', 'Everlasting0004', '0', '0', '22', null);
INSERT INTO `tbllot` VALUES ('36', 'Everlasting0005', '0', '0', '22', null);

-- ----------------------------
-- Table structure for tbllotdeceased
-- ----------------------------
DROP TABLE IF EXISTS `tbllotdeceased`;
CREATE TABLE `tbllotdeceased` (
  `intLotDeceasedId` int(11) NOT NULL AUTO_INCREMENT,
  `intDeceasedId` int(11) NOT NULL,
  `intLotId` int(11) NOT NULL,
  PRIMARY KEY (`intLotDeceasedId`),
  KEY `fk_tblLotDeceased_intLotId_idx` (`intLotId`),
  KEY `fk_tbldeceased_idx` (`intDeceasedId`),
  CONSTRAINT `fk_tbldeceased` FOREIGN KEY (`intDeceasedId`) REFERENCES `tbldeceased` (`intDeceasedId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbllotdeceased_intLotId` FOREIGN KEY (`intLotId`) REFERENCES `tbllot` (`intLotID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbllotdeceased
-- ----------------------------

-- ----------------------------
-- Table structure for tblrequirement
-- ----------------------------
DROP TABLE IF EXISTS `tblrequirement`;
CREATE TABLE `tblrequirement` (
  `intRequirementId` int(11) NOT NULL AUTO_INCREMENT,
  `strRequirementName` varchar(50) NOT NULL,
  `strRequirementDesc` text,
  `intStatus` int(11) NOT NULL,
  PRIMARY KEY (`intRequirementId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblrequirement
-- ----------------------------
INSERT INTO `tblrequirement` VALUES ('6', 'Death Certificate', '', '0');
INSERT INTO `tblrequirement` VALUES ('7', 'Valid ID', '', '0');
INSERT INTO `tblrequirement` VALUES ('8', 'Permit', '', '0');

-- ----------------------------
-- Table structure for tblschedule
-- ----------------------------
DROP TABLE IF EXISTS `tblschedule`;
CREATE TABLE `tblschedule` (
  `intScheduleId` int(11) NOT NULL AUTO_INCREMENT,
  `intLotDeceasedId` int(11) NOT NULL,
  `intAshDeceasedId` int(11) NOT NULL,
  `dateSchedule` date NOT NULL,
  `timeSchedule` time NOT NULL,
  PRIMARY KEY (`intScheduleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblschedule
-- ----------------------------

-- ----------------------------
-- Table structure for tblsection
-- ----------------------------
DROP TABLE IF EXISTS `tblsection`;
CREATE TABLE `tblsection` (
  `intSectionID` int(11) NOT NULL AUTO_INCREMENT,
  `strSectionName` varchar(45) NOT NULL,
  `intNoOfBlock` int(11) NOT NULL,
  `intStatus` tinyint(2) NOT NULL,
  PRIMARY KEY (`intSectionID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblsection
-- ----------------------------
INSERT INTO `tblsection` VALUES ('14', 'East', '3', '0');
INSERT INTO `tblsection` VALUES ('15', 'Cupid', '3', '0');

-- ----------------------------
-- Table structure for tblservice
-- ----------------------------
DROP TABLE IF EXISTS `tblservice`;
CREATE TABLE `tblservice` (
  `intServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `strServiceName` varchar(45) NOT NULL,
  `dblServicePrice` decimal(12,2) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `strServiceStatus` varchar(45) DEFAULT NULL,
  `intServiceTypeId` int(11) NOT NULL,
  `intServiceRequested` int(11) DEFAULT NULL,
  PRIMARY KEY (`intServiceID`),
  KEY `fk_tblservice_intServiceTypeId_idx` (`intServiceTypeId`),
  CONSTRAINT `fk_tblservice_intServiceTypeId` FOREIGN KEY (`intServiceTypeId`) REFERENCES `tblservicetype` (`intServiceTypeId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblservice
-- ----------------------------
INSERT INTO `tblservice` VALUES ('50', 'Interment', '5000.00', '0', null, '10', null);
INSERT INTO `tblservice` VALUES ('51', 'Cleaning of Unit', '100.00', '0', 'added', '11', null);
INSERT INTO `tblservice` VALUES ('52', 'Construction', '10000.00', '0', null, '11', null);
INSERT INTO `tblservice` VALUES ('53', 'Exhumation', '5000.00', '0', null, '10', null);

-- ----------------------------
-- Table structure for tblservicerequested
-- ----------------------------
DROP TABLE IF EXISTS `tblservicerequested`;
CREATE TABLE `tblservicerequested` (
  `intServiceRequested` int(11) NOT NULL,
  `dateRequested` date NOT NULL,
  `deciAmountPaid` double NOT NULL,
  `intCustomerId` int(11) NOT NULL,
  `intUnitId` int(11) NOT NULL,
  `intServiceId` int(11) DEFAULT NULL,
  PRIMARY KEY (`intServiceRequested`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblservicerequested
-- ----------------------------
INSERT INTO `tblservicerequested` VALUES ('1', '2017-01-01', '0', '3', '20', '51');
INSERT INTO `tblservicerequested` VALUES ('2', '2017-01-01', '0', '3', '20', '51');
INSERT INTO `tblservicerequested` VALUES ('3', '2017-04-03', '10000', '4', '29', '52');

-- ----------------------------
-- Table structure for tblservicerequirement
-- ----------------------------
DROP TABLE IF EXISTS `tblservicerequirement`;
CREATE TABLE `tblservicerequirement` (
  `intServiceRequirementId` int(11) NOT NULL AUTO_INCREMENT,
  `intServiceId` int(11) NOT NULL,
  `intRequirementId` int(11) NOT NULL,
  PRIMARY KEY (`intServiceRequirementId`),
  KEY `fk_tblservicerequirement_intServiceId_idx` (`intServiceId`),
  KEY `fk_tblservicerequirement_intRequirementId_idx` (`intRequirementId`),
  CONSTRAINT `fk_tblservicerequirement_intRequirementId` FOREIGN KEY (`intRequirementId`) REFERENCES `tblrequirement` (`intRequirementId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblservicerequirement_intServiceId` FOREIGN KEY (`intServiceId`) REFERENCES `tblservice` (`intServiceID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblservicerequirement
-- ----------------------------
INSERT INTO `tblservicerequirement` VALUES ('3', '50', '6');
INSERT INTO `tblservicerequirement` VALUES ('4', '50', '7');
INSERT INTO `tblservicerequirement` VALUES ('5', '51', '7');
INSERT INTO `tblservicerequirement` VALUES ('6', '52', '8');
INSERT INTO `tblservicerequirement` VALUES ('7', '53', '8');
INSERT INTO `tblservicerequirement` VALUES ('8', '53', '7');

-- ----------------------------
-- Table structure for tblservicetype
-- ----------------------------
DROP TABLE IF EXISTS `tblservicetype`;
CREATE TABLE `tblservicetype` (
  `intServiceTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `strServiceTypeName` varchar(45) NOT NULL,
  `strServiceTypeDesc` text,
  PRIMARY KEY (`intServiceTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblservicetype
-- ----------------------------
INSERT INTO `tblservicetype` VALUES ('10', 'Service Scheduling', '');
INSERT INTO `tblservicetype` VALUES ('11', 'Service Request', '');

-- ----------------------------
-- Table structure for tbltransactiondeceased
-- ----------------------------
DROP TABLE IF EXISTS `tbltransactiondeceased`;
CREATE TABLE `tbltransactiondeceased` (
  `intTransactionDeceasedId` int(11) NOT NULL AUTO_INCREMENT,
  `dateTransactionDeceased` date NOT NULL,
  `intCustomerid` int(11) NOT NULL,
  `intServiceId` int(11) NOT NULL,
  `intDeceasedId` int(11) NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `intTransactionType` int(11) NOT NULL,
  PRIMARY KEY (`intTransactionDeceasedId`),
  KEY `fk_tbltransactiondeceased_intCustomerId_idx` (`intCustomerid`),
  KEY `fk_tbltransactiondeceased_intServiceId_idx` (`intServiceId`),
  KEY `fk_tbltransactiondeceased_intDeceasedId_idx` (`intDeceasedId`),
  CONSTRAINT `fk_tbltransactiondeceased_intCustomerId` FOREIGN KEY (`intCustomerid`) REFERENCES `tblcustomer` (`intCustomerId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbltransactiondeceased_intDeceasedId` FOREIGN KEY (`intDeceasedId`) REFERENCES `tbldeceased` (`intDeceasedId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbltransactiondeceased_intServiceId` FOREIGN KEY (`intServiceId`) REFERENCES `tblservice` (`intServiceID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbltransactiondeceased
-- ----------------------------

-- ----------------------------
-- Table structure for tbltypeoflot
-- ----------------------------
DROP TABLE IF EXISTS `tbltypeoflot`;
CREATE TABLE `tbltypeoflot` (
  `intTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `strTypeName` varchar(45) NOT NULL,
  `intNoOfLot` int(11) NOT NULL,
  `deciSellingPrice` decimal(12,2) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`intTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbltypeoflot
-- ----------------------------
INSERT INTO `tbltypeoflot` VALUES ('6', 'Lawn', '1', '500000.00', '0');
INSERT INTO `tbltypeoflot` VALUES ('7', 'Junior Estate', '24', '20000000.00', '0');
INSERT INTO `tbltypeoflot` VALUES ('8', 'Lovelots', '5', '169750.25', '0');

-- ----------------------------
-- Procedure structure for checkBlockCount
-- ----------------------------
DROP PROCEDURE IF EXISTS `checkBlockCount`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkBlockCount`(IN intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intBlockID) INTO curr FROM tblblock WHERE intSectionID = intID AND intStatus = 0;
	SELECT intNoOfBlock INTO max FROM tblsection WHERE intSectionID = intID;

	SELECT curr, max;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for checkLevel
-- ----------------------------
DROP PROCEDURE IF EXISTS `checkLevel`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkLevel`(IN intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intLevelAshID) INTO curr FROM tbllevelash WHERE intAshID = intID AND intStatus = 0;
	SELECT intNoOfLevel INTO max FROM tblashcrypt WHERE intAshID = intID;

	SELECT curr, max;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for checkLotCount
-- ----------------------------
DROP PROCEDURE IF EXISTS `checkLotCount`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkLotCount`(intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;	
	
	SELECT COUNT(intLotID) INTO curr FROM tbllot WHERE intBlockID = intID AND intStatus = 0;
	SELECT intNoOfLot INTO max FROM tblBlock WHERE intBlockID = intID;

	SELECT max,curr;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for checkUnit
-- ----------------------------
DROP PROCEDURE IF EXISTS `checkUnit`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkUnit`(IN intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intUnitID) INTO curr FROM tblacunit WHERE intLevelAshID = intID AND intStatus = 0;
	SELECT intNoOfUnit INTO max FROM tbllevelash WHERE intLevelAshID = intID;


	SELECT curr, max;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for deactivateAshCrypt
-- ----------------------------
DROP PROCEDURE IF EXISTS `deactivateAshCrypt`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateAshCrypt`(IN ashID INT)
BEGIN
	UPDATE tblashcrypt set intStatus = 1 WHERE intAshID = ashID;

	UPDATE tbllevelash set intStatus = 1 WHERE intAshID = ashID;

	UPDATE tblacunit set intStatus = 1 WHERE intLevelAshID IN(SELECT intLevelAshID FROM tbllevelash WHERE intAshID = ashID);
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for deactivateBlock
-- ----------------------------
DROP PROCEDURE IF EXISTS `deactivateBlock`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateBlock`(IN blockID INT)
BEGIN
	UPDATE tblblock set intStatus = 1 WHERE intBlockID = blockID;

	UPDATE tbllot set intStatus = 1 WHERE intBlockID = blockID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for deactivateLevel
-- ----------------------------
DROP PROCEDURE IF EXISTS `deactivateLevel`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateLevel`(IN LevelAshID INT)
BEGIN
	UPDATE tbllevelash set intStatus = 1 WHERE intLevelAshID = LevelAshID;

	UPDATE tblacunit set intStatus = 1 WHERE intLevelAshID = LevelAshID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for deactivateSection
-- ----------------------------
DROP PROCEDURE IF EXISTS `deactivateSection`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateSection`(IN sectionId INT)
BEGIN

	UPDATE tblsection SET intStatus = 1 WHERE intSectionID = sectionId;

	UPDATE tblBlock SET intStatus = 1 WHERE intSectionID = sectionId;

	UPDATE tblLot SET intStatus = 1 WHERE intBlockID IN(SELECT intBlockID FROM tblBlock
														WHERE intSectionID = sectionId);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for deactivateService
-- ----------------------------
DROP PROCEDURE IF EXISTS `deactivateService`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateService`(IN serviceID INT)
BEGIN
	UPDATE tblservice set intStatus = 1 WHERE intServiceID = serviceID;

	UPDATE tbldiscount set intStatus = 1 WHERE intServiceID = serviceID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for insertCustomer
-- ----------------------------
DROP PROCEDURE IF EXISTS `insertCustomer`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCustomer`(in tfFirstName varchar(45), in tfMiddleName varchar(45), in newLastName varchar(45), in tfAddress text, in tfContactNo varchar(45), in dateCreated date, in gender int(11), civilStatus int(11))
BEGIN

	INSERT INTO tblcustomer (strFirstName, strMiddleName, strLastName, strAddress, strContactNo, dateBirthday, intGender, intCivilStatus) 
										VALUES (tfFirstName,tfMiddleName,newLastName,tfAddress,tfContactNo,dateCreated,gender,civilStatus);
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for insertService
-- ----------------------------
DROP PROCEDURE IF EXISTS `insertService`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertService`(in tfServiceName varchar(45),in tfServicePriceFinal decimal,in tfStatus int ,in serviceType int)
BEGIN
declare id int;
INSERT INTO `dbholygarden`.`tblservice` (`strServiceName`, `dblServicePrice`,`intStatus`,`intServiceTypeId`) 
VALUES (tfServiceName,tfServicePriceFinal,tfStatus,serviceType);
set id = last_insert_id();
select id;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for retrieveAshCrypt
-- ----------------------------
DROP PROCEDURE IF EXISTS `retrieveAshCrypt`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveAshCrypt`(IN ashID INT)
BEGIN
	UPDATE tblashcrypt set intStatus = 0 WHERE intAshID = ashID;

	UPDATE tbllevelash set intStatus = 0 WHERE intAshID = ashID;

	UPDATE tblacunit set intStatus = 0 WHERE intLevelAshID IN(SELECT intLevelAshID FROM tbllevelash WHERE intAshID = ashID);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for retrieveBlock
-- ----------------------------
DROP PROCEDURE IF EXISTS `retrieveBlock`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveBlock`(IN blockID INT)
BEGIN
	UPDATE tblblock set intStatus = 0 WHERE intBlockID = blockID;

	UPDATE tbllot set intStatus = 0 WHERE intBlockID = blockID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for retrieveLevel
-- ----------------------------
DROP PROCEDURE IF EXISTS `retrieveLevel`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveLevel`(IN LevelAshID INT)
BEGIN
	UPDATE tbllevelash set intStatus = 0 WHERE intLevelAshID = LevelAshID;

	UPDATE tblacunit set intStatus = 0 WHERE intLevelAshID = LevelAshID;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for retrieveSection
-- ----------------------------
DROP PROCEDURE IF EXISTS `retrieveSection`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveSection`(IN sectionId INT)
BEGIN

	UPDATE tblsection SET intStatus = 0 WHERE intSectionID = sectionId;

	UPDATE tblBlock SET intStatus = 0 WHERE intSectionID = sectionId;

	UPDATE tblLot SET intStatus = 0 WHERE intBlockID IN(SELECT intBlockID FROM tblBlock WHERE intSectionID = sectionId);
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for retrieveService
-- ----------------------------
DROP PROCEDURE IF EXISTS `retrieveService`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveService`(IN serviceID INT)
BEGIN
	UPDATE tblservice set intStatus = 0 WHERE intServiceID = serviceID;

	UPDATE tbldiscount set intStatus = 0 WHERE intServiceID = serviceID;
END
;;
DELIMITER ;
