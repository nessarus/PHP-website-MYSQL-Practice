-- CITS1402 Assignment 
-- 20163079.sql
-- Name: 		Joshua Chin Hao Ng
-- Student Number: 	20163079
-- Date: 		18/10/2017

CREATE DATABASE IF NOT EXISTS db_20163079;
USE db_20163079;

--
-- Table structure for table `customers`
--
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB;

--
-- Table structure for table `orders`
--
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB;

--
-- Table structure for table `products`
--
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double(15,2) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB;

--
-- Table structure for table `invoices`
--
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`oid`,`pid`),
  KEY `pid` (`pid`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`),
  CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`)
) ENGINE=InnoDB;

--
-- Temporary table structure for view `BuyerCostPerProduct`
--
DROP VIEW IF EXISTS `BuyerCostPerProduct`
CREATE VIEW `BuyerCostPerProduct` as 
select c.cid as 'Customer ID', c.username as 'Customer Name',
p.pid as 'Product ID', p.name as 'Product Name', 
sum(i.quantity*p.price) as 'Cost',  current_date() as 'Date'
from invoices i, customers c, orders o, products p 
where i.pid = p.pid and i.oid = o.oid and o.cid = c.cid 
group by c.cid, p.pid order by c.cid, p.pid;
