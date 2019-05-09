/*
SQLyog Ultimate v8.53 
MySQL - 5.7.17 : Database - jemmaconstructioninventorydb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jemmaconstructioninventorydb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `jemmaconstructioninventorydb`;

/*Table structure for table `admin_table` */

DROP TABLE IF EXISTS `admin_table`;

CREATE TABLE `admin_table` (
  `adminid` int(6) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin_table` */

insert  into `admin_table`(`adminid`,`fullname`,`username`,`password`) values (1,'admin','admin','21232f297a57a5a743894a0e4a801fc3');

/*Table structure for table `in_table` */

DROP TABLE IF EXISTS `in_table`;

CREATE TABLE `in_table` (
  `InID` varchar(60) NOT NULL,
  `InQuantity` int(6) DEFAULT NULL,
  `inDate` date DEFAULT NULL,
  `ProductID` int(6) DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  `BodegeroName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`InID`),
  KEY `FK_in_table` (`ProductID`),
  KEY `FK_in_table123` (`adminid`),
  CONSTRAINT `FK_in_table` FOREIGN KEY (`ProductID`) REFERENCES `product_table` (`ProductID`) ON DELETE CASCADE,
  CONSTRAINT `FK_in_table123` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `in_table` */

insert  into `in_table`(`InID`,`InQuantity`,`inDate`,`ProductID`,`adminid`,`BodegeroName`) values ('00030',50,'2017-03-14',10,1,'asdasd'),('00040',2000,'2017-04-06',10,1,'Albert');

/*Table structure for table `material_table` */

DROP TABLE IF EXISTS `material_table`;

CREATE TABLE `material_table` (
  `MaterialID` int(6) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(6) DEFAULT NULL,
  `ProductID` int(6) DEFAULT NULL,
  `Quantity` int(6) DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  `Method` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`MaterialID`),
  KEY `FK_material_table` (`ProductID`),
  KEY `FK_material_tableasdads` (`adminid`),
  KEY `delete project from material table` (`ProjectID`),
  CONSTRAINT `FK_material_table` FOREIGN KEY (`ProductID`) REFERENCES `product_table` (`ProductID`) ON DELETE CASCADE,
  CONSTRAINT `FK_material_tableasdads` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `material_table` */

insert  into `material_table`(`MaterialID`,`ProjectID`,`ProductID`,`Quantity`,`adminid`,`Method`) values (27,28,10,500,1,'Direct product to site'),(29,31,10,500,1,'Indirect'),(30,32,10,5000,1,'Indirect'),(31,35,10,6000,1,'Direct product to site'),(32,1,10,500,1,'Indirect'),(33,2,10,500,1,'Direct product to site');

/*Table structure for table `out_table` */

DROP TABLE IF EXISTS `out_table`;

CREATE TABLE `out_table` (
  `OutID` int(6) NOT NULL AUTO_INCREMENT,
  `OutQuantity` int(6) DEFAULT NULL,
  `OutDate` date DEFAULT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `ProductID` int(6) DEFAULT NULL,
  `IsApproved` varchar(60) DEFAULT NULL,
  `RequestDate` date DEFAULT NULL,
  `isOpened` varchar(20) DEFAULT 'False',
  `adminid` int(6) DEFAULT NULL,
  `MaterialID` int(6) DEFAULT NULL,
  PRIMARY KEY (`OutID`),
  KEY `FK_out_table1` (`ProductID`),
  KEY `FK_out_table23213` (`adminid`),
  KEY `FK_out_table434` (`MaterialID`),
  KEY `delete project to out table` (`ProjectID`),
  CONSTRAINT `FK_out_table1` FOREIGN KEY (`ProductID`) REFERENCES `product_table` (`ProductID`) ON DELETE CASCADE,
  CONSTRAINT `FK_out_table23213` FOREIGN KEY (`adminid`) REFERENCES `admin_table` (`adminid`),
  CONSTRAINT `FK_out_table434` FOREIGN KEY (`MaterialID`) REFERENCES `material_table` (`MaterialID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `out_table` */

insert  into `out_table`(`OutID`,`OutQuantity`,`OutDate`,`ProjectID`,`ProductID`,`IsApproved`,`RequestDate`,`isOpened`,`adminid`,`MaterialID`) values (14,50,NULL,28,10,'Pending','2017-04-06','False',NULL,27),(15,60,'2017-04-06',28,10,'Approved','2017-04-06','True',1,27),(16,200,'2017-04-06',31,10,'Approved','2017-04-06','True',1,29),(17,200,'2017-04-06',32,10,'Approved','2017-04-06','True',1,30),(18,6000,'2017-04-06',35,10,'Approved','2017-04-06','True',1,31),(19,100,'2017-04-08',1,10,'Approved','2017-04-08','True',1,32),(20,100,'2017-04-08',2,10,'Approved','2017-04-08','True',1,33),(21,50,'2017-04-08',2,10,'Approved','2017-04-08','True',1,33);

/*Table structure for table `product_table` */

DROP TABLE IF EXISTS `product_table`;

CREATE TABLE `product_table` (
  `ProductID` int(6) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(60) DEFAULT NULL,
  `ProductDescription` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `product_table` */

insert  into `product_table`(`ProductID`,`ProductName`,`ProductDescription`) values (10,'Cement','1 sack of cements');

/*Table structure for table `project_engineer_table` */

DROP TABLE IF EXISTS `project_engineer_table`;

CREATE TABLE `project_engineer_table` (
  `ProjectEngrID` int(6) NOT NULL AUTO_INCREMENT,
  `ProjectEngrName` varchar(60) DEFAULT NULL,
  `ProjectEngrPhoneNum` varchar(20) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`ProjectEngrID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `project_engineer_table` */

insert  into `project_engineer_table`(`ProjectEngrID`,`ProjectEngrName`,`ProjectEngrPhoneNum`,`username`,`password`) values (7,'Engr. Fiore','09754263977','fiore','de43660386db04fa5dce2030568416b0'),(9,'Engr. Jun','097243633','jun','6b5843ce9d2d0599c3e3ce6d59c1551f');

/*Table structure for table `project_table` */

DROP TABLE IF EXISTS `project_table`;

CREATE TABLE `project_table` (
  `ProjectID` int(6) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(100) DEFAULT NULL,
  `StationLimit` int(6) DEFAULT NULL,
  `ProjectEngrID` int(6) DEFAULT NULL,
  `adminid` int(6) DEFAULT NULL,
  `ProjectStatus` varchar(60) DEFAULT 'Ongoing',
  PRIMARY KEY (`ProjectID`),
  KEY `FK_project_table` (`ProjectEngrID`),
  KEY `FK_project_table2333` (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `project_table` */

insert  into `project_table`(`ProjectID`,`ProjectName`,`StationLimit`,`ProjectEngrID`,`adminid`,`ProjectStatus`) values (1,'asd',123132,7,1,'Ongoing'),(2,'123',123123,7,1,'Ongoing');

/*Table structure for table `inventoryview` */

DROP TABLE IF EXISTS `inventoryview`;

/*!50001 DROP VIEW IF EXISTS `inventoryview` */;
/*!50001 DROP TABLE IF EXISTS `inventoryview` */;

/*!50001 CREATE TABLE  `inventoryview`(
 `ProductID` int(6) ,
 `ProductName` varchar(60) ,
 `ProductDescription` varchar(500) ,
 `InID` varchar(60) ,
 `InQuantity` int(6) ,
 `inDate` date 
)*/;

/*Table structure for table `inventoryview1` */

DROP TABLE IF EXISTS `inventoryview1`;

/*!50001 DROP VIEW IF EXISTS `inventoryview1` */;
/*!50001 DROP TABLE IF EXISTS `inventoryview1` */;

/*!50001 CREATE TABLE  `inventoryview1`(
 `ProductID` int(6) ,
 `ProductName` varchar(60) ,
 `ProductDescription` varchar(500) ,
 `InID` varchar(60) ,
 `InQuantity` int(6) ,
 `inDate` date ,
 `CurrentStock` decimal(33,0) 
)*/;

/*Table structure for table `inview` */

DROP TABLE IF EXISTS `inview`;

/*!50001 DROP VIEW IF EXISTS `inview` */;
/*!50001 DROP TABLE IF EXISTS `inview` */;

/*!50001 CREATE TABLE  `inview`(
 `InID` varchar(60) ,
 `InQuantity` int(6) ,
 `inDate` date ,
 `adminid` int(6) ,
 `BodegeroName` varchar(60) ,
 `fullname` varchar(60) ,
 `ProductID` int(6) ,
 `ProductName` varchar(60) ,
 `ProductDescription` varchar(500) 
)*/;

/*Table structure for table `materialview` */

DROP TABLE IF EXISTS `materialview`;

/*!50001 DROP VIEW IF EXISTS `materialview` */;
/*!50001 DROP TABLE IF EXISTS `materialview` */;

/*!50001 CREATE TABLE  `materialview`(
 `Method` varchar(60) ,
 `MaterialID` int(6) ,
 `adminid` int(6) ,
 `ProjectID` int(6) ,
 `ProductID` int(6) ,
 `Quantity` int(6) ,
 `ProductName` varchar(60) ,
 `ProductDescription` varchar(500) 
)*/;

/*Table structure for table `outview` */

DROP TABLE IF EXISTS `outview`;

/*!50001 DROP VIEW IF EXISTS `outview` */;
/*!50001 DROP TABLE IF EXISTS `outview` */;

/*!50001 CREATE TABLE  `outview`(
 `OutID` int(6) ,
 `OutQuantity` int(6) ,
 `OutDate` date ,
 `ProjectID` int(11) ,
 `ProductID` int(6) ,
 `IsApproved` varchar(60) ,
 `RequestDate` date ,
 `isOpened` varchar(20) ,
 `adminid` int(6) ,
 `MaterialID` int(6) ,
 `ProductName` varchar(60) ,
 `ProductDescription` varchar(500) ,
 `ProjectName` varchar(100) ,
 `StationLimit` int(6) ,
 `ProjectEngrID` int(6) ,
 `ProjectEngrName` varchar(60) ,
 `Method` varchar(60) 
)*/;

/*Table structure for table `projectview` */

DROP TABLE IF EXISTS `projectview`;

/*!50001 DROP VIEW IF EXISTS `projectview` */;
/*!50001 DROP TABLE IF EXISTS `projectview` */;

/*!50001 CREATE TABLE  `projectview`(
 `ProjectID` int(6) ,
 `ProjectStatus` varchar(60) ,
 `adminid` int(6) ,
 `ProjectName` varchar(100) ,
 `StationLimit` int(6) ,
 `ProjectEngrID` int(6) ,
 `ProjectEngrName` varchar(60) 
)*/;

/*View structure for view inventoryview */

/*!50001 DROP TABLE IF EXISTS `inventoryview` */;
/*!50001 DROP VIEW IF EXISTS `inventoryview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventoryview` AS select `product_table`.`ProductID` AS `ProductID`,`product_table`.`ProductName` AS `ProductName`,`product_table`.`ProductDescription` AS `ProductDescription`,`in_table`.`InID` AS `InID`,`in_table`.`InQuantity` AS `InQuantity`,`in_table`.`inDate` AS `inDate` from (`in_table` join `product_table` on((`in_table`.`ProductID` = `product_table`.`ProductID`))) */;

/*View structure for view inventoryview1 */

/*!50001 DROP TABLE IF EXISTS `inventoryview1` */;
/*!50001 DROP VIEW IF EXISTS `inventoryview1` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventoryview1` AS select `product_table`.`ProductID` AS `ProductID`,`product_table`.`ProductName` AS `ProductName`,`product_table`.`ProductDescription` AS `ProductDescription`,`in_table`.`InID` AS `InID`,`in_table`.`InQuantity` AS `InQuantity`,`in_table`.`inDate` AS `inDate`,(select ((select sum(`in_table`.`InQuantity`) from `in_table`) - (select coalesce(sum(`out_table`.`OutQuantity`),0) from `out_table` where (`out_table`.`IsApproved` = 'Approved'))) AS `CurrentStock`) AS `CurrentStock` from (`in_table` join `product_table` on((`in_table`.`ProductID` = `product_table`.`ProductID`))) group by `product_table`.`ProductID` */;

/*View structure for view inview */

/*!50001 DROP TABLE IF EXISTS `inview` */;
/*!50001 DROP VIEW IF EXISTS `inview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inview` AS select `in_table`.`InID` AS `InID`,`in_table`.`InQuantity` AS `InQuantity`,`in_table`.`inDate` AS `inDate`,`in_table`.`adminid` AS `adminid`,`in_table`.`BodegeroName` AS `BodegeroName`,`admin_table`.`fullname` AS `fullname`,`product_table`.`ProductID` AS `ProductID`,`product_table`.`ProductName` AS `ProductName`,`product_table`.`ProductDescription` AS `ProductDescription` from ((`in_table` join `admin_table` on((`in_table`.`adminid` = `admin_table`.`adminid`))) join `product_table` on((`in_table`.`ProductID` = `product_table`.`ProductID`))) */;

/*View structure for view materialview */

/*!50001 DROP TABLE IF EXISTS `materialview` */;
/*!50001 DROP VIEW IF EXISTS `materialview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `materialview` AS select `material_table`.`Method` AS `Method`,`material_table`.`MaterialID` AS `MaterialID`,`material_table`.`adminid` AS `adminid`,`material_table`.`ProjectID` AS `ProjectID`,`material_table`.`ProductID` AS `ProductID`,`material_table`.`Quantity` AS `Quantity`,`product_table`.`ProductName` AS `ProductName`,`product_table`.`ProductDescription` AS `ProductDescription` from (`product_table` join `material_table` on((`product_table`.`ProductID` = `material_table`.`ProductID`))) */;

/*View structure for view outview */

/*!50001 DROP TABLE IF EXISTS `outview` */;
/*!50001 DROP VIEW IF EXISTS `outview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `outview` AS select `out_table`.`OutID` AS `OutID`,`out_table`.`OutQuantity` AS `OutQuantity`,`out_table`.`OutDate` AS `OutDate`,`out_table`.`ProjectID` AS `ProjectID`,`out_table`.`ProductID` AS `ProductID`,`out_table`.`IsApproved` AS `IsApproved`,`out_table`.`RequestDate` AS `RequestDate`,`out_table`.`isOpened` AS `isOpened`,`out_table`.`adminid` AS `adminid`,`out_table`.`MaterialID` AS `MaterialID`,`product_table`.`ProductName` AS `ProductName`,`product_table`.`ProductDescription` AS `ProductDescription`,`project_table`.`ProjectName` AS `ProjectName`,`project_table`.`StationLimit` AS `StationLimit`,`project_table`.`ProjectEngrID` AS `ProjectEngrID`,`project_engineer_table`.`ProjectEngrName` AS `ProjectEngrName`,`material_table`.`Method` AS `Method` from ((((`out_table` join `product_table` on((`out_table`.`ProductID` = `product_table`.`ProductID`))) join `project_table` on((`out_table`.`ProjectID` = `project_table`.`ProjectID`))) join `material_table` on((`out_table`.`MaterialID` = `material_table`.`MaterialID`))) join `project_engineer_table` on((`project_table`.`ProjectEngrID` = `project_engineer_table`.`ProjectEngrID`))) */;

/*View structure for view projectview */

/*!50001 DROP TABLE IF EXISTS `projectview` */;
/*!50001 DROP VIEW IF EXISTS `projectview` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `projectview` AS select `project_table`.`ProjectID` AS `ProjectID`,`project_table`.`ProjectStatus` AS `ProjectStatus`,`project_table`.`adminid` AS `adminid`,`project_table`.`ProjectName` AS `ProjectName`,`project_table`.`StationLimit` AS `StationLimit`,`project_table`.`ProjectEngrID` AS `ProjectEngrID`,`project_engineer_table`.`ProjectEngrName` AS `ProjectEngrName` from (`project_engineer_table` join `project_table` on((`project_engineer_table`.`ProjectEngrID` = `project_table`.`ProjectEngrID`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
