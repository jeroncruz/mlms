CREATE DATABASE  IF NOT EXISTS `dbholygarden` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbholygarden`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: dbholygarden
-- ------------------------------------------------------
-- Server version	5.6.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblacunit`
--

DROP TABLE IF EXISTS `tblacunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblacunit`
--

LOCK TABLES `tblacunit` WRITE;
/*!40000 ALTER TABLE `tblacunit` DISABLE KEYS */;
INSERT INTO `tblacunit` VALUES (5,'A0001',0,2,0,5,NULL),(6,'A0002',0,2,0,5,NULL);
/*!40000 ALTER TABLE `tblacunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblashcrypt`
--

DROP TABLE IF EXISTS `tblashcrypt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblashcrypt` (
  `intAshID` int(11) NOT NULL AUTO_INCREMENT,
  `strAshName` varchar(45) NOT NULL,
  `intNoOfLevel` int(11) NOT NULL,
  `intStatus` int(11) NOT NULL,
  PRIMARY KEY (`intAshID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblashcrypt`
--

LOCK TABLES `tblashcrypt` WRITE;
/*!40000 ALTER TABLE `tblashcrypt` DISABLE KEYS */;
INSERT INTO `tblashcrypt` VALUES (1,'Malungkot',2,0),(2,'Masaya',2,0);
/*!40000 ALTER TABLE `tblashcrypt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblavailunit`
--

DROP TABLE IF EXISTS `tblavailunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblavailunit`
--

LOCK TABLES `tblavailunit` WRITE;
/*!40000 ALTER TABLE `tblavailunit` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblavailunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblavailunitash`
--

DROP TABLE IF EXISTS `tblavailunitash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblavailunitash`
--

LOCK TABLES `tblavailunitash` WRITE;
/*!40000 ALTER TABLE `tblavailunitash` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblavailunitash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblblock`
--

DROP TABLE IF EXISTS `tblblock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblblock`
--

LOCK TABLES `tblblock` WRITE;
/*!40000 ALTER TABLE `tblblock` DISABLE KEYS */;
INSERT INTO `tblblock` VALUES (13,'A',2,0,12,4),(14,'B',2,0,12,4);
/*!40000 ALTER TABLE `tblblock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblbusinessdependency`
--

DROP TABLE IF EXISTS `tblbusinessdependency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblbusinessdependency` (
  `intBusinessDependencyId` int(11) NOT NULL AUTO_INCREMENT,
  `strBusinessDependencyName` varchar(225) NOT NULL,
  `deciBusinessDependencyValue` decimal(8,2) NOT NULL,
  PRIMARY KEY (`intBusinessDependencyId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbusinessdependency`
--

LOCK TABLES `tblbusinessdependency` WRITE;
/*!40000 ALTER TABLE `tblbusinessdependency` DISABLE KEYS */;
INSERT INTO `tblbusinessdependency` VALUES (1,'downpayment',30.00),(2,'reservationFee',1000.00),(3,'discountSpotcash',10.00),(4,'refund',60.00),(5,'penalty',10.00),(6,'charge',2000.00),(7,'gracePeriod',5.00),(8,'voidReservationNoDownpayment',120.00),(9,'voidReservationNotFullPayment',2.00),(10,'voidOwnershipOverDue',2.00);
/*!40000 ALTER TABLE `tblbusinessdependency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcollectionash`
--

DROP TABLE IF EXISTS `tblcollectionash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcollectionash`
--

LOCK TABLES `tblcollectionash` WRITE;
/*!40000 ALTER TABLE `tblcollectionash` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcollectionash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcollectionlot`
--

DROP TABLE IF EXISTS `tblcollectionlot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcollectionlot` (
  `intCollectionLotId` int(11) NOT NULL AUTO_INCREMENT,
  `intAvailUnitId` int(11) NOT NULL,
  `dateDate` date NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `deciBalance` decimal(12,2) NOT NULL,
  PRIMARY KEY (`intCollectionLotId`),
  KEY `fk_tblcollectionlot_intAvailUnitId_idx` (`intAvailUnitId`),
  CONSTRAINT `fk_tblcollectionlot_intAvailUnitId` FOREIGN KEY (`intAvailUnitId`) REFERENCES `tblavailunit` (`intAvailUnitId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcollectionlot`
--

LOCK TABLES `tblcollectionlot` WRITE;
/*!40000 ALTER TABLE `tblcollectionlot` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcollectionlot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcompanysettings`
--

DROP TABLE IF EXISTS `tblcompanysettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcompanysettings`
--

LOCK TABLES `tblcompanysettings` WRITE;
/*!40000 ALTER TABLE `tblcompanysettings` DISABLE KEYS */;
INSERT INTO `tblcompanysettings` VALUES (1,'Memorial Lot Management System','Room 203 F N Crisostomo Building, Sumulong Highway Barangay Mayamot, Antipolo City','(679)-817-546','mlms@gmail.com','../../pages/images/logo.png','#76d99d');
/*!40000 ALTER TABLE `tblcompanysettings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcustomer`
--

DROP TABLE IF EXISTS `tblcustomer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcustomer`
--

LOCK TABLES `tblcustomer` WRITE;
/*!40000 ALTER TABLE `tblcustomer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcustomer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldeceased`
--

DROP TABLE IF EXISTS `tbldeceased`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldeceased` (
  `intDeceasedId` int(11) NOT NULL AUTO_INCREMENT,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `intGender` int(11) NOT NULL,
  `dateBirthday` date NOT NULL,
  `dateDeath` date NOT NULL,
  `strRelationship` text NOT NULL,
  PRIMARY KEY (`intDeceasedId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldeceased`
--

LOCK TABLES `tbldeceased` WRITE;
/*!40000 ALTER TABLE `tbldeceased` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbldeceased` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldiscount`
--

DROP TABLE IF EXISTS `tbldiscount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldiscount` (
  `intDiscountID` int(11) NOT NULL AUTO_INCREMENT,
  `strDescription` varchar(45) NOT NULL,
  `dblPercent` decimal(8,2) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intServiceID` int(11) NOT NULL,
  PRIMARY KEY (`intDiscountID`),
  KEY `fk_tbldiscount_intServiceID_idx` (`intServiceID`),
  CONSTRAINT `fk_tbldiscount_intServiceID` FOREIGN KEY (`intServiceID`) REFERENCES `tblservice` (`intServiceID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldiscount`
--

LOCK TABLES `tbldiscount` WRITE;
/*!40000 ALTER TABLE `tbldiscount` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbldiscount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldownpaymentash`
--

DROP TABLE IF EXISTS `tbldownpaymentash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldownpaymentash` (
  `intDownpaymentAshId` int(11) NOT NULL AUTO_INCREMENT,
  `dateDate` date NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `intAvailUnitAshId` int(11) NOT NULL,
  PRIMARY KEY (`intDownpaymentAshId`),
  KEY `fk_tbldownpaymentash_intAvailUnitAshId_idx` (`intAvailUnitAshId`),
  CONSTRAINT `fk_tbldownpaymentash_intAvailUnitAshId` FOREIGN KEY (`intAvailUnitAshId`) REFERENCES `tblavailunitash` (`intAvailUnitAshId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldownpaymentash`
--

LOCK TABLES `tbldownpaymentash` WRITE;
/*!40000 ALTER TABLE `tbldownpaymentash` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbldownpaymentash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldownpaymentlot`
--

DROP TABLE IF EXISTS `tbldownpaymentlot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldownpaymentlot` (
  `intDownpaymentLotId` int(11) NOT NULL AUTO_INCREMENT,
  `dateDate` date NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  `intAvaiUnitId` int(11) NOT NULL,
  PRIMARY KEY (`intDownpaymentLotId`),
  KEY `fk_tbldownpaymentlot_intAvailUnitId_idx` (`intAvaiUnitId`),
  CONSTRAINT `fk_tbldownpaymentlot_intAvailUnitId` FOREIGN KEY (`intAvaiUnitId`) REFERENCES `tblavailunit` (`intAvailUnitId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldownpaymentlot`
--

LOCK TABLES `tbldownpaymentlot` WRITE;
/*!40000 ALTER TABLE `tbldownpaymentlot` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbldownpaymentlot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblemployee`
--

DROP TABLE IF EXISTS `tblemployee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblemployee` (
  `intEmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `strUsername` varchar(45) NOT NULL,
  `strPassword` varchar(45) NOT NULL,
  PRIMARY KEY (`intEmployeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblemployee`
--

LOCK TABLES `tblemployee` WRITE;
/*!40000 ALTER TABLE `tblemployee` DISABLE KEYS */;
INSERT INTO `tblemployee` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `tblemployee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinterest`
--

DROP TABLE IF EXISTS `tblinterest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinterest` (
  `intInterestId` int(11) NOT NULL AUTO_INCREMENT,
  `intNoOfYear` int(11) NOT NULL,
  `deciAtNeedInterest` decimal(8,2) NOT NULL,
  `deciRegularInterest` decimal(8,2) NOT NULL,
  `intStatus` int(11) NOT NULL,
  PRIMARY KEY (`intInterestId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinterest`
--

LOCK TABLES `tblinterest` WRITE;
/*!40000 ALTER TABLE `tblinterest` DISABLE KEYS */;
INSERT INTO `tblinterest` VALUES (7,1,12.00,10.00,0),(8,2,14.00,12.00,0);
/*!40000 ALTER TABLE `tblinterest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllevelash`
--

DROP TABLE IF EXISTS `tbllevelash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllevelash`
--

LOCK TABLES `tbllevelash` WRITE;
/*!40000 ALTER TABLE `tbllevelash` DISABLE KEYS */;
INSERT INTO `tbllevelash` VALUES (5,'A',0,2,10000.00,1),(6,'B',0,2,10000.00,1);
/*!40000 ALTER TABLE `tbllevelash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllot`
--

DROP TABLE IF EXISTS `tbllot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllot`
--

LOCK TABLES `tbllot` WRITE;
/*!40000 ALTER TABLE `tbllot` DISABLE KEYS */;
INSERT INTO `tbllot` VALUES (13,'A0001',0,0,13,NULL),(14,'A0002',0,0,13,NULL);
/*!40000 ALTER TABLE `tbllot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllotdeceased`
--

DROP TABLE IF EXISTS `tbllotdeceased`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllotdeceased` (
  `intLotDeceasedId` int(11) NOT NULL AUTO_INCREMENT,
  `intDeceasedId` int(11) NOT NULL,
  `intLotId` int(11) NOT NULL,
  PRIMARY KEY (`intLotDeceasedId`),
  KEY `fk_tblLotDeceased_intLotId_idx` (`intLotId`),
  KEY `fk_tbldeceased_idx` (`intDeceasedId`),
  CONSTRAINT `fk_tbllotdeceased_intLotId` FOREIGN KEY (`intLotId`) REFERENCES `tbllot` (`intLotID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbldeceased` FOREIGN KEY (`intDeceasedId`) REFERENCES `tbldeceased` (`intDeceasedId`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllotdeceased`
--

LOCK TABLES `tbllotdeceased` WRITE;
/*!40000 ALTER TABLE `tbllotdeceased` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbllotdeceased` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblrequirement`
--

DROP TABLE IF EXISTS `tblrequirement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblrequirement` (
  `intRequirementId` int(11) NOT NULL AUTO_INCREMENT,
  `strRequirementName` varchar(50) NOT NULL,
  `strRequirementDesc` text,
  `intStatus` int(11) NOT NULL,
  PRIMARY KEY (`intRequirementId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblrequirement`
--

LOCK TABLES `tblrequirement` WRITE;
/*!40000 ALTER TABLE `tblrequirement` DISABLE KEYS */;
INSERT INTO `tblrequirement` VALUES (4,'Valid ID','',0),(5,'Death Certificate','',0);
/*!40000 ALTER TABLE `tblrequirement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblschedule`
--

DROP TABLE IF EXISTS `tblschedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblschedule` (
  `intScheduleId` int(11) NOT NULL AUTO_INCREMENT,
  `intLotDeceasedId` int(11) NOT NULL,
  `intAshDeceasedId` int(11) NOT NULL,
  `dateSchedule` date NOT NULL,
  `timeSchedule` time NOT NULL,
  PRIMARY KEY (`intScheduleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblschedule`
--

LOCK TABLES `tblschedule` WRITE;
/*!40000 ALTER TABLE `tblschedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblschedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsection`
--

DROP TABLE IF EXISTS `tblsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsection` (
  `intSectionID` int(11) NOT NULL AUTO_INCREMENT,
  `strSectionName` varchar(45) NOT NULL,
  `intNoOfBlock` int(11) NOT NULL,
  `intStatus` tinyint(2) NOT NULL,
  PRIMARY KEY (`intSectionID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsection`
--

LOCK TABLES `tblsection` WRITE;
/*!40000 ALTER TABLE `tblsection` DISABLE KEYS */;
INSERT INTO `tblsection` VALUES (12,'North',2,0);
/*!40000 ALTER TABLE `tblsection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblservice`
--

DROP TABLE IF EXISTS `tblservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservice` (
  `intServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `strServiceName` varchar(45) NOT NULL,
  `dblServicePrice` decimal(12,2) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intServiceTypeId` int(11) NOT NULL,
  PRIMARY KEY (`intServiceID`),
  KEY `fk_tblservice_intServiceTypeId_idx` (`intServiceTypeId`),
  CONSTRAINT `fk_tblservice_intServiceTypeId` FOREIGN KEY (`intServiceTypeId`) REFERENCES `tblservicetype` (`intServiceTypeId`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblservice`
--

LOCK TABLES `tblservice` WRITE;
/*!40000 ALTER TABLE `tblservice` DISABLE KEYS */;
INSERT INTO `tblservice` VALUES (48,'Interment',10000.00,0,5);
/*!40000 ALTER TABLE `tblservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblservicerequirement`
--

DROP TABLE IF EXISTS `tblservicerequirement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservicerequirement` (
  `intServiceRequirementId` int(11) NOT NULL AUTO_INCREMENT,
  `intServiceId` int(11) NOT NULL,
  `intRequirementId` int(11) NOT NULL,
  PRIMARY KEY (`intServiceRequirementId`),
  KEY `fk_tblservicerequirement_intServiceId_idx` (`intServiceId`),
  KEY `fk_tblservicerequirement_intRequirementId_idx` (`intRequirementId`),
  CONSTRAINT `fk_tblservicerequirement_intRequirementId` FOREIGN KEY (`intRequirementId`) REFERENCES `tblrequirement` (`intRequirementId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblservicerequirement_intServiceId` FOREIGN KEY (`intServiceId`) REFERENCES `tblservice` (`intServiceID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblservicerequirement`
--

LOCK TABLES `tblservicerequirement` WRITE;
/*!40000 ALTER TABLE `tblservicerequirement` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblservicerequirement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblservicetype`
--

DROP TABLE IF EXISTS `tblservicetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservicetype` (
  `intServiceTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `strServiceTypeName` varchar(45) NOT NULL,
  `strServiceTypeDesc` text,
  PRIMARY KEY (`intServiceTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblservicetype`
--

LOCK TABLES `tblservicetype` WRITE;
/*!40000 ALTER TABLE `tblservicetype` DISABLE KEYS */;
INSERT INTO `tblservicetype` VALUES (5,'Service Scheduling','');
/*!40000 ALTER TABLE `tblservicetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltransactiondeceased`
--

DROP TABLE IF EXISTS `tbltransactiondeceased`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltransactiondeceased` (
  `intTransactionDeceasedId` int(11) NOT NULL AUTO_INCREMENT,
  `dateTransactionDeceased` date NOT NULL,
  `intCustomerid` int(11) NOT NULL,
  `intServiceId` int(11) NOT NULL,
  `intDeceasedId` int(11) NOT NULL,
  `deciAmountPaid` decimal(12,2) NOT NULL,
  PRIMARY KEY (`intTransactionDeceasedId`),
  KEY `fk_tbltransactiondeceased_intCustomerId_idx` (`intCustomerid`),
  KEY `fk_tbltransactiondeceased_intServiceId_idx` (`intServiceId`),
  KEY `fk_tbltransactiondeceased_intDeceasedId_idx` (`intDeceasedId`),
  CONSTRAINT `fk_tbltransactiondeceased_intDeceasedId` FOREIGN KEY (`intDeceasedId`) REFERENCES `tbldeceased` (`intDeceasedId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbltransactiondeceased_intCustomerId` FOREIGN KEY (`intCustomerid`) REFERENCES `tblcustomer` (`intCustomerId`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbltransactiondeceased_intServiceId` FOREIGN KEY (`intServiceId`) REFERENCES `tblservice` (`intServiceID`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltransactiondeceased`
--

LOCK TABLES `tbltransactiondeceased` WRITE;
/*!40000 ALTER TABLE `tbltransactiondeceased` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltransactiondeceased` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltypeoflot`
--

DROP TABLE IF EXISTS `tbltypeoflot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltypeoflot` (
  `intTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `strTypeName` varchar(45) NOT NULL,
  `intNoOfLot` int(11) NOT NULL,
  `deciSellingPrice` decimal(12,2) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`intTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltypeoflot`
--

LOCK TABLES `tbltypeoflot` WRITE;
/*!40000 ALTER TABLE `tbltypeoflot` DISABLE KEYS */;
INSERT INTO `tbltypeoflot` VALUES (4,'Junior Estate',24,20000000.00,0),(5,'Lawn',1,50000.00,0);
/*!40000 ALTER TABLE `tbltypeoflot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbholygarden'
--

--
-- Dumping routines for database 'dbholygarden'
--
/*!50003 DROP PROCEDURE IF EXISTS `checkBlockCount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkBlockCount`(IN intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intBlockID) INTO curr FROM tblblock WHERE intSectionID = intID AND intStatus = 0;
	SELECT intNoOfBlock INTO max FROM tblsection WHERE intSectionID = intID;

	SELECT curr, max;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkLevel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkLevel`(IN intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intLevelAshID) INTO curr FROM tbllevelash WHERE intAshID = intID AND intStatus = 0;
	SELECT intNoOfLevel INTO max FROM tblashcrypt WHERE intAshID = intID;

	SELECT curr, max;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkLotCount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkLotCount`(intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;	
	
	SELECT COUNT(intLotID) INTO curr FROM tbllot WHERE intBlockID = intID AND intStatus = 0;
	SELECT intNoOfLot INTO max FROM tblBlock WHERE intBlockID = intID;

	SELECT max,curr;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkUnit` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkUnit`(IN intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intUnitID) INTO curr FROM tblacunit WHERE intLevelAshID = intID AND intStatus = 0;
	SELECT intNoOfUnit INTO max FROM tbllevelash WHERE intLevelAshID = intID;


	SELECT curr, max;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateAshCrypt` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateAshCrypt`(IN ashID INT)
BEGIN
	UPDATE tblashcrypt set intStatus = 1 WHERE intAshID = ashID;

	UPDATE tbllevelash set intStatus = 1 WHERE intAshID = ashID;

	UPDATE tblacunit set intStatus = 1 WHERE intLevelAshID IN(SELECT intLevelAshID FROM tbllevelash WHERE intAshID = ashID);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateBlock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateBlock`(IN blockID INT)
BEGIN
	UPDATE tblblock set intStatus = 1 WHERE intBlockID = blockID;

	UPDATE tbllot set intStatus = 1 WHERE intBlockID = blockID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateLevel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateLevel`(IN LevelAshID INT)
BEGIN
	UPDATE tbllevelash set intStatus = 1 WHERE intLevelAshID = LevelAshID;

	UPDATE tblacunit set intStatus = 1 WHERE intLevelAshID = LevelAshID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateSection` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateSection`(IN sectionId INT)
BEGIN

	UPDATE tblsection SET intStatus = 1 WHERE intSectionID = sectionId;

	UPDATE tblBlock SET intStatus = 1 WHERE intSectionID = sectionId;

	UPDATE tblLot SET intStatus = 1 WHERE intBlockID IN(SELECT intBlockID FROM tblBlock
														WHERE intSectionID = sectionId);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateService` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateService`(IN serviceID INT)
BEGIN
	UPDATE tblservice set intStatus = 1 WHERE intServiceID = serviceID;

	UPDATE tbldiscount set intStatus = 1 WHERE intServiceID = serviceID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertCustomer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertCustomer`(in tfFirstName varchar(45), in tfMiddleName varchar(45), in newLastName varchar(45), in tfAddress text, in tfContactNo varchar(45), in dateCreated date, in gender int(11), civilStatus int(11))
BEGIN

	INSERT INTO tblcustomer (strFirstName, strMiddleName, strLastName, strAddress, strContactNo, dateBirthday, intGender, intCivilStatus) 
										VALUES (tfFirstName,tfMiddleName,newLastName,tfAddress,tfContactNo,dateCreated,gender,civilStatus);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertService` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertService`(in tfServiceName varchar(45),in tfServicePriceFinal decimal,in tfStatus int ,in serviceType int)
BEGIN
declare id int;
INSERT INTO `dbholygarden`.`tblservice` (`strServiceName`, `dblServicePrice`,`intStatus`,`intServiceTypeId`) 
VALUES (tfServiceName,tfServicePriceFinal,tfStatus,serviceType);
set id = last_insert_id();
select id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveAshCrypt` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveAshCrypt`(IN ashID INT)
BEGIN
	UPDATE tblashcrypt set intStatus = 0 WHERE intAshID = ashID;

	UPDATE tbllevelash set intStatus = 0 WHERE intAshID = ashID;

	UPDATE tblacunit set intStatus = 0 WHERE intLevelAshID IN(SELECT intLevelAshID FROM tbllevelash WHERE intAshID = ashID);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveBlock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveBlock`(IN blockID INT)
BEGIN
	UPDATE tblblock set intStatus = 0 WHERE intBlockID = blockID;

	UPDATE tbllot set intStatus = 0 WHERE intBlockID = blockID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveLevel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveLevel`(IN LevelAshID INT)
BEGIN
	UPDATE tbllevelash set intStatus = 0 WHERE intLevelAshID = LevelAshID;

	UPDATE tblacunit set intStatus = 0 WHERE intLevelAshID = LevelAshID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveSection` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveSection`(IN sectionId INT)
BEGIN

	UPDATE tblsection SET intStatus = 0 WHERE intSectionID = sectionId;

	UPDATE tblBlock SET intStatus = 0 WHERE intSectionID = sectionId;

	UPDATE tblLot SET intStatus = 0 WHERE intBlockID IN(SELECT intBlockID FROM tblBlock WHERE intSectionID = sectionId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `retrieveService` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieveService`(IN serviceID INT)
BEGIN
	UPDATE tblservice set intStatus = 0 WHERE intServiceID = serviceID;

	UPDATE tbldiscount set intStatus = 0 WHERE intServiceID = serviceID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-30 18:05:24
