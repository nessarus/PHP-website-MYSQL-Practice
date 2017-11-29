-- CITS1402 Assignment 
-- 20163079.sql
-- Name: 			Joshua Chin Hao Ng
-- Student Number: 	20163079
-- Date: 			18/10/2017

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
-- Temporary table structure for view `BuyerCostPerProduct`
--

DROP TABLE IF EXISTS `BuyerCostPerProduct`;
/*!50001 DROP VIEW IF EXISTS `BuyerCostPerProduct`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `BuyerCostPerProduct` (
  `Customer ID` tinyint NOT NULL,
  `Customer Name` tinyint NOT NULL,
  `Product ID` tinyint NOT NULL,
  `Product Name` tinyint NOT NULL,
  `Cost` tinyint NOT NULL,
  `Date` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'u1','a1','p1'),(2,'u2','a2','p2'),(3,'u3','a3','p3'),(4,'u4','a4','p4'),(5,'u5','a5','p5'),(6,'u6','a6','p6'),(7,'u7','asdaf','324234'),(8,'u8','a8','p8'),(9,'u9','a9','p9'),(10,'u10','a10','p10'),(11,'u50','2 abc','01234'),(12,'u234','41324','2341'),(13,'test2','123 abac','2342'),(14,'test3','534543','1234'),(15,'u234t','34 adfba','2143'),(16,'u1234','12345','12345'),(17,'u234','1324 324lkja','2130498'),(18,'u224324','1234 qaudfpoaisud','3042852-20984'),(19,'u12348','123 apodiufapsoidu','2234-908098'),(20,'u1234','1234 asdfhzucyvziuxyvc','2345870329845'),(21,'u1234','132 abdfaldj','043985-29'),(22,'u123498','1234 adsfashgdiuyrwenr','1829374109');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`oid`,`pid`),
  KEY `pid` (`pid`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`),
  CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,1,10),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(1,8,1),(1,9,1),(1,10,1),(2,1,1),(2,2,2),(2,3,3),(2,4,4),(2,5,5),(2,6,6),(2,7,7),(2,8,8),(2,9,9),(2,10,10),(3,1,1),(4,1,1),(5,1,1),(6,1,1),(7,1,1),(8,1,1),(9,1,1),(10,1,1),(11,1,1),(12,1,1),(13,12,1),(14,1,1),(15,1,1),(16,1,1),(17,6,1234),(18,13,1431),(19,5,7),(20,1,245),(21,1,3254),(22,3,2),(23,1,134),(24,2,1),(25,3,23),(26,16,23);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,1),(12,1),(13,3),(14,12),(15,13),(16,14),(17,15),(18,16),(19,17),(20,18),(21,19),(22,20),(23,21),(24,22),(25,7),(26,7);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double(15,2) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'n1',0,1.00),(2,'n2',1,1.00),(3,'n3',177,500.00),(4,'n4',1,1.00),(5,'n5',1,1.00),(6,'n6',1,1.00),(7,'n7',1,1.00),(8,'n8',1,1.00),(9,'n9',1,1.00),(10,'n10',1,1.00),(11,'n11',1,1.00),(12,'n12',1,1.00),(13,'abc',5,1.00),(14,'abc',3,1.00),(15,'hello',12,123.00),(16,'step',11,123.13),(17,'Google Pixel',140,143.99);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `BuyerCostPerProduct`
--

/*!50001 DROP TABLE IF EXISTS `BuyerCostPerProduct`*/;
/*!50001 DROP VIEW IF EXISTS `BuyerCostPerProduct`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`20163079`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `BuyerCostPerProduct` AS select `c`.`cid` AS `Customer ID`,`c`.`username` AS `Customer Name`,`p`.`pid` AS `Product ID`,`p`.`name` AS `Product Name`,sum((`i`.`quantity` * `p`.`price`)) AS `Cost`,curdate() AS `Date` from (((`invoices` `i` join `customers` `c`) join `orders` `o`) join `products` `p`) where ((`i`.`pid` = `p`.`pid`) and (`i`.`oid` = `o`.`oid`) and (`o`.`cid` = `c`.`cid`)) group by `c`.`cid`,`p`.`pid` order by `c`.`cid`,`p`.`pid` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-19 11:51:15

-- Q1 
select c.* from customers c, orders o
where c.cid = o.cid
group by o.cid
having count(o.oid) >= 3;

-- Q2
select c.* from customers c, orders o, invoices i, products p 
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid 
group by c.cid 
having sum(i.quantity*p.price)>=500;

-- Q3
select * from products p
where p.pid not in 
(select i.pid from invoices i);

-- Q4
select p.* from customers c, orders o, invoices i, products p 
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid 
group by p.pid 
having count(c.cid)=1;

-- Q5
select p.pid, count(o.oid) 
from orders o join invoices i on (o.oid = i.oid)
right join products p on (i.pid = p.pid) 
group by p.pid;

-- Q6
select sum(quantity) from invoices;


-- Q7
drop function if exists CostOfBestBuyers;
delimiter ++
create function CostOfBestBuyers(n INT) Returns DOUBLE
begin
declare total DOUBLE;
select sum(s.summing) from (
select sum(i.quantity*p.price) as summing 
from customers c, orders o, invoices i, products p  
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid  
group by c.cid order by summing desc limit n
) as s into total;
return total;
end++
delimiter ;


-- Q8
drop view if exists BuyerCostPerProduct;
create view BuyerCostPerProduct as 
select c.cid as 'Customer ID', c.username as 'Customer Name',
p.pid as 'Product ID', p.name as 'Product Name', 
sum(i.quantity*p.price) as 'Cost',  current_date() as 'Date'
from invoices i, customers c, orders o, products p 
where i.pid = p.pid and i.oid = o.oid and o.cid = c.cid 
group by c.cid, p.pid order by c.cid, p.pid;

