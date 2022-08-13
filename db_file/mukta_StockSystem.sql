-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2022 at 01:34 PM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sushihab_isms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `deletecustomer` (IN `Uid` INT)  BEGIN
DELETE from customer WHERE customer_id  =Uid;
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `deleteData` (IN `Uid` INT)  BEGIN
DELETE from company WHERE company_id =Uid;
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `deleteSupp` (`did` INT)  BEGIN
DELETE FROM supplier WHERE supplier_id=did;
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `insertcompany` (`Company_name` VARCHAR(100), `Short_name` VARCHAR(50), `Company_email` VARCHAR(100), `Company_phone` INT(20), `Address` VARCHAR(100), `City` VARCHAR(50), `State` VARCHAR(100))  BEGIN
INSERT INTO company(company_name,short_name,company_email,company_phone,address,city,state )VALUES(Company_name,Short_name,Company_email,Company_phone,Address,City,State);
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `insertCust` (`Customer_name` VARCHAR(100), `Phone` INT(11), `Email` VARCHAR(100), `Address` VARCHAR(100), `Type_of_customer` VARCHAR(100))  BEGIN
INSERT INTO  customer(customer_name ,phone,email,address, type_of_customer)VALUES(Customer_name,Phone,Email,Address,Type_of_customer);
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `insertDataMed` (IN `mname` VARCHAR(100), IN `bname` VARCHAR(100), IN `cname` VARCHAR(100), IN `uprice` INT, IN `Qty` INT, IN `punit` VARCHAR(100), IN `supp` VARCHAR(100))  BEGIN
INSERT INTO medicine(medicine_name,brand_name,category_name,unit_price,qty,packing_unit,supplier)VALUES(mname,cname,bname,uprice,Qty,punit,supp);  
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `insertDataMs` (IN `mediN` VARCHAR(100), IN `brandN` VARCHAR(100), IN `categoryN` VARCHAR(100), IN `unitP` INT(30), IN `purchaseP` INT(100), IN `retailP` INT(11), IN `wholeP` INT(11), IN `packingU` VARCHAR(100), IN `manufactureD` DATE, IN `expireD` DATE, IN `supp` VARCHAR(100), IN `purchaseQ` INT(11), IN `balanceQ` INT(11))  BEGIN
INSERT INTO medicine_stock(medicine_name,brand_name,category_name,unit_price,purchase_price,retail_price,whole_sale_price,packing_unit,manufacture_Date,expire_date,supplier,purchase_qty,balance_qty)VALUES(mediN,brandN,categoryN,unitP,purchaseP,retailP,wholeP,packingU,manufactureD,expireD,supp,purchaseQ,balanceQ);
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `insertDataU` (IN `userN` VARCHAR(100), IN `Email` VARCHAR(100), IN `ph` INT, IN `pass` VARCHAR(100), IN `roleId` INT, IN `Status` VARCHAR(100))  BEGIN
INSERT INTO user(user_name,email,phone,password,role_id,status)VALUES(userN,Email,ph,pass,roleId,Status);
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `insertInv` (IN `Cust_id` INT, IN `contN` INT, IN `invD` DATE, IN `saleT` VARCHAR(20), IN `med_id` INT, IN `qt` INT, IN `uP` INT, IN `pU` VARCHAR(100), IN `tP` INT, IN `tA` DECIMAL(50,0), IN `sT` INT, IN `Du` INT, IN `Pa` INT, IN `gT` INT)  BEGIN
INSERT into invoice(customer_id,contact_number,invoice_date,sales_type,medicine_id,qty,unit_price,packing_unit,tax_percent,tax_amount,sub_total,Due,Paid,Grand_total)VALUES(Cust_id,contN,invD,saleT,med_id,qt,uP,pU,tP,tA,sT,Du,Pa,gT);
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `insertSupplier` (`Supplier_name` VARCHAR(100), `Supplier_phone` INT, `Supplier_email` VARCHAR(100), `Address` VARCHAR(100), `Type_of_supplier` VARCHAR(100))  BEGIN
INSERT INTO supplier (supplier_name,supplier_phone,supplier_email,address,type_of_supplier )VALUES(Supplier_name ,Supplier_phone,Supplier_email,Address ,Type_of_supplier);
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `inserttax` (`Tax_name` VARCHAR(20), `Tax_rate` VARCHAR(20))  BEGIN
INSERT INTO tax (tax_name,tax_rate)VALUES(Tax_name,Tax_rate);
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `insertunit` (`Packing_unit_name` VARCHAR(20))  BEGIN
INSERT INTO packing_unit(packing_unit_name)VALUES(Packing_unit_name);
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `updateDataMs` (`mediN` VARCHAR(100), `brandN` VARCHAR(100), `categoryN` VARCHAR(100), `unitP` INT(30), `purchaseP` INT(100), `retailP` INT(11), `wholeP` INT(11), `packingU` VARCHAR(100), `manufactureD` DATE, `expireD` DATE, `supp` VARCHAR(100), `purchaseQ` INT(11), `issueQ` INT(100), `balanceQ` INT(11), `uid` INT)  BEGIN
update medicine_stock set medicine_name=mediN,brand_name=brandN,category_name=categoryN,unit_price=unitP,purchase_price=purchaseP,retail_price=retailP,whole_sale_price=wholeP,packing_unit=packingU,manufacture_Date=manufactureD,expire_date=expireD,supplier=supp,purchase_qty=purchaseQ,issue_qty=issueQ,balance_qty=balanceQ WHERE medicine_id=uid;
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `updateMed` (`medicineN` VARCHAR(100), `brandN` VARCHAR(100), `categoryN` VARCHAR(100), `unitP` INT, `Qty` INT, `packingU` VARCHAR(100), `supp` VARCHAR(100), `uid` INT)  BEGIN
update medicine SET medicine_name=medicineN,brand_name=brandN,category_name=categoryN,unit_price=unitP,qty=Qty,packing_unit=packingU,supplier=supp WHERE medicine_id=uid;
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `updatesupplier` (`subName` VARCHAR(100), `Supplier_phone` INT, `Supplier_email` VARCHAR(100), `Address` VARCHAR(100), `Type_of_supplier` VARCHAR(100), `Uid` INT)  BEGIN
UPDATE supplier set supplier_name=subName,supplier_phone=Supplier_phone,supplier_email=Supplier_email,address=Address,type_of_supplier=Type_of_supplier where supplier_id =Uid;
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `updateTax` (`TaxName` VARCHAR(20), `Rate` VARCHAR(20), `Uid` INT)  BEGIN
UPDATE tax set tax_name=TaxName,tax_rate=Rate  where tax_id =Uid;
END$$

CREATE DEFINER=`sushihab`@`localhost` PROCEDURE `updateUnit` (`Unit` VARCHAR(20), `Uid` INT)  BEGIN
UPDATE packing_unit set packing_unit=Unit  where unit_id=Uid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Acme'),
(2, 'Squire'),
(3, 'Beximco'),
(4, 'Incepta '),
(5, 'Opsonin '),
(6, 'Renata '),
(7, 'ACI');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `short_name` varchar(50) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_phone` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `short_name`, `company_email`, `company_phone`, `address`, `city`, `state`) VALUES
(1, 'AmzadEnterprice', 'AE', 'example@gmail.com', 1739227722, 'Nayapoltan', 'Dhaka-1212', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type_of_customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `phone`, `email`, `address`, `type_of_customer`) VALUES
(1, 'Hasanul Banna', 1649098451, 'ample@gmail.com', 'Mohakhali', 'Regular'),
(3, 'Oliur Bijor', 645654654, 'abc@gmail.com', 'dhaka', ''),
(5, 'Moriom', 18373737, 'moriom@gmail.com', 'paltan', 'Global'),
(6, 'Sohel ', 1679428768, 'sohelnahar8@gmail.com', 'Motijheel', 'Local'),
(7, 'Hasanul Manna', 1739206571, 'hasanul@gmail.com', 'Paltan', ''),
(9, 'Habib', 1815322180, 'habib600@gmail.com', 'Dhaka', 'Local'),
(10, 'Labib', 175322180, 'labib500@gmail.com', 'Dhaka', 'Local'),
(14, 'Md. Obaidul Rahman', 1911805322, '0baidul36@gmail.com', 'Uttara,Dhaka', 'Local'),
(15, 'Md. Sakib', 1954665645, 'sakibdiu@gmail.com', 'Farmgate,Dhaka', 'Local'),
(16, 'Shahab Uddin', 1845986545, 'sushihab65@gmail.com', ' poltan,Dhaka', 'Local'),
(17, 'Mosarof Hassain', 1569874562, 'mosarofduet@gmail.com', 'Gazipur', 'Local'),
(18, 'Abuzar', 1956458654, 'abuzar469@gmail.com', 'Mirpur', 'Global'),
(19, 'Sabrina Sultana mukta', 2147483647, 'sabrinasultanamukta@gmail.com', 'Farmgate,Dhaka', 'Local'),
(20, 'Oliur Rahaman', 1609098450, 'oliurrahaman70437@gmail.com', 'Narsingdi', 'Global'),
(21, 'Md. Yusuf Ali', 2147483647, 'yusufcse@gmail.com', 'Savar', 'Local'),
(22, 'Md. Abu Rayhan Rimon', 1356978456, 'rayhandev@gmail.com', 'Mirpur-10', 'Global'),
(23, 'Md. Hosne Rabbay', 1848670437, 'hosnerabby600@gmail.com', 'Mirpur-14', 'Local'),
(24, '', 0, '', '', ''),
(25, '', 0, '', '', ''),
(26, '', 0, '', '', ''),
(27, '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `iid` int(30) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `sales_type` varchar(20) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `packing_unit` varchar(100) NOT NULL,
  `Unit_price` int(11) NOT NULL,
  `Issue_quantity` int(11) NOT NULL,
  `dis_percent` int(11) NOT NULL,
  `dis_amount` decimal(50,0) NOT NULL,
  `total` int(11) NOT NULL,
  `sub_total` decimal(50,0) NOT NULL,
  `Due` decimal(50,0) NOT NULL,
  `Paid` decimal(50,0) NOT NULL,
  `Grand_total` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`iid`, `invoice_id`, `customer_id`, `invoice_date`, `sales_type`, `medicine_id`, `packing_unit`, `Unit_price`, `Issue_quantity`, `dis_percent`, `dis_amount`, `total`, `sub_total`, `Due`, `Paid`, `Grand_total`) VALUES
(1, 1, 1, '2022-06-01', 'Select Sales Type', 1, 'Box', 25, 2, 2, '2', 50, '76', '24', '50', '74'),
(2, 1, 1, '2022-06-01', 'Select Sales Type', 2, 'o', 10, 2, 2, '2', 0, '76', '24', '50', '74'),
(3, 1, 1, '2022-06-01', 'Select Sales Type', 3, '', 3, 2, 2, '2', 0, '76', '24', '50', '74'),
(4, 3, 3, '2022-06-08', 'Customer', 1, 'Box', 25, 3, 3, '3', 75, '114', '11', '100', '111'),
(5, 4, 10, '2022-06-02', 'Customer', 1, 'Box', 25, 5, 5, '9', 125, '175', '66', '100', '166'),
(6, 4, 10, '2022-06-02', 'Customer', 2, 'o', 10, 5, 5, '9', 2, '175', '66', '100', '166'),
(7, 5, 9, '2022-06-01', 'Dealer', 1, 'Box', 25, 3, 3, '3', 75, '105', '0', '102', '102'),
(8, 5, 9, '2022-06-01', 'Dealer', 2, 'o', 10, 3, 3, '3', 5, '105', '0', '102', '102'),
(9, 6, 7, '2022-06-02', 'Dealer', 1, 'Box', 25, 3, 3, '3', 75, '87', '14', '70', '84'),
(10, 6, 7, '2022-06-02', 'Dealer', 3, 'o', 3, 4, 3, '3', 5, '87', '14', '70', '84'),
(11, 7, 3, '2022-06-17', 'Customer', 2, 'Box', 10, 3, 3, '1', 30, '45', '4', '40', '44'),
(12, 7, 3, '2022-06-17', 'Customer', 3, 'o', 3, 5, 3, '1', 15, '45', '4', '40', '44'),
(13, 8, 5, '2022-06-01', 'Select Sales Type', 1, 'Box', 25, 3, 3, '6', 75, '186', '80', '100', '180'),
(14, 8, 5, '2022-06-01', 'Select Sales Type', 2, 'o', 10, 3, 3, '6', 30, '186', '80', '100', '180'),
(15, 8, 5, '2022-06-01', 'Select Sales Type', 3, '', 3, 2, 3, '6', 6, '186', '80', '100', '180'),
(16, 8, 5, '2022-06-01', 'Select Sales Type', 1, '', 25, 3, 3, '6', 75, '186', '80', '100', '180'),
(17, 9, 7, '2022-06-02', 'Dealer', 1, 'Box', 25, 3, 3, '3', 75, '111', '8', '100', '108'),
(18, 9, 7, '2022-06-02', 'Dealer', 2, 'o', 10, 3, 3, '3', 30, '111', '8', '100', '108'),
(19, 9, 7, '2022-06-02', 'Dealer', 3, '', 3, 2, 3, '3', 6, '111', '8', '100', '108'),
(20, 10, 5, '2022-06-29', 'Dealer', 2, 'Box', 10, 5, 2, '1', 50, '74', '1', '72', '73'),
(21, 10, 5, '2022-06-29', 'Dealer', 3, 'o', 3, 8, 2, '1', 24, '74', '1', '72', '73'),
(23, 11, 22, '2022-06-29', 'Customer', 9, 'Box', 10, 5, 5, '9', 50, '186', '7', '170', '177'),
(24, 11, 22, '2022-06-29', 'Customer', 13, 'o', 8, 5, 5, '9', 40, '186', '7', '170', '177'),
(25, 11, 22, '2022-06-29', 'Customer', 10, '', 24, 4, 5, '9', 96, '186', '7', '170', '177'),
(26, 12, 1, '0000-00-00', 'Select Sales Type', 14, 'Box', 350, 5, 5, '88', 1750, '1750', '1363', '300', '1663'),
(27, 13, 1, '2022-06-29', 'Customer', 14, 'Box', 350, 5, 5, '94', 1750, '1870', '1666', '111', '1777'),
(28, 13, 1, '2022-06-29', 'Customer', 10, 'o', 24, 5, 5, '94', 120, '1870', '1666', '111', '1777'),
(29, 14, 1, '2022-06-29', 'Customer', 15, 'Box', 15, 7, 5, '12', 105, '240', '0', '228', '228'),
(30, 14, 1, '2022-06-29', 'Customer', 7, 'o', 15, 5, 5, '12', 75, '240', '0', '228', '228'),
(31, 14, 1, '2022-06-29', 'Customer', 7, '', 15, 4, 5, '12', 60, '240', '0', '228', '228');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `brand_id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `packing_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `brand_id`, `category_id`, `medicine_name`, `unit_price`, `packing_unit`) VALUES
(1, 5, 1, 'Abacavir', 25, 'Piece'),
(2, 1, 1, 'Azithromycin', 10, 'Piece'),
(3, 7, 2, 'Napa Extra', 3, 'Piece'),
(4, 2, 2, 'Histacin ', 2, 'Piece'),
(5, 3, 2, 'Civit', 2, 'gram'),
(6, 6, 2, 'Paracitamal', 5, 'Piece'),
(7, 5, 2, 'Doxycycline', 15, 'Piece'),
(8, 1, 1, 'Quinine', 7, 'Piece'),
(9, 5, 1, 'Lexapro', 10, 'Piece'),
(10, 4, 2, 'Humira', 24, 'Box'),
(11, 3, 2, 'Metoprolol', 65, 'Box'),
(12, 2, 2, '3RD Cef ', 27, 'Piece'),
(13, 6, 2, 'Aeron FT', 8, 'gram'),
(14, 4, 1, 'Hydralazine', 350, 'Box'),
(15, 3, 2, 'Neosporin', 15, 'Piece');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`category_id`, `category_name`) VALUES
(1, 'Capsule'),
(2, 'Tablet'),
(4, 'Non-GYN cytology'),
(5, 'GYN cytology');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

CREATE TABLE `medicine_stock` (
  `medicine_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_price` decimal(50,0) NOT NULL,
  `packing_unit` varchar(100) NOT NULL,
  `manufacture_Date` date NOT NULL,
  `expire_date` date NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `issue_qty` int(11) NOT NULL,
  `balance_qty` int(11) NOT NULL,
  `stock_in_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_stock`
--

INSERT INTO `medicine_stock` (`medicine_id`, `brand_id`, `category_id`, `supplier_id`, `purchase_price`, `packing_unit`, `manufacture_Date`, `expire_date`, `purchase_qty`, `issue_qty`, `balance_qty`, `stock_in_date`) VALUES
(1, 1, '2', 8, '22', 'Piece', '2022-06-28', '2024-06-28', 2000, 3, 859, '2022-06-28 19:17:03'),
(2, 2, '1', 13, '9', 'Piece', '2022-06-28', '2025-02-28', 800, 5, 856, '2022-06-28 19:36:57'),
(3, 3, '2', 16, '2', 'Piece', '2022-06-28', '2024-11-28', 900, 8, 871, '2022-06-28 19:36:57'),
(12, 2, '2', 12, '25', 'Piece', '2022-06-29', '2024-06-29', 1000, 0, 1000, '2022-06-29 04:43:04'),
(11, 3, '2', 10, '60', 'Box', '2022-06-08', '2024-06-29', 850, 0, 850, '2022-06-29 04:44:32'),
(10, 4, '2', 11, '20', 'Box', '2022-06-29', '2023-07-29', 700, 5, 691, '2022-06-29 09:33:20'),
(9, 5, '1', 9, '8', 'Piece', '2022-06-29', '2023-06-29', 565, 5, 560, '2022-06-29 09:17:31'),
(13, 6, '2', 13, '7', 'Piece', '2022-06-29', '2023-06-29', 450, 5, 445, '2022-06-29 09:17:31'),
(14, 4, '1', 8, '310', 'Box', '2022-06-30', '2024-06-29', 1000, 5, 990, '2022-06-29 09:33:20'),
(15, 3, '2', 9, '12', 'Piece', '2022-06-29', '2023-06-29', 950, 7, 943, '2022-06-29 10:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `packing_unit`
--

CREATE TABLE `packing_unit` (
  `unit_id` int(11) NOT NULL,
  `packing_unit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packing_unit`
--

INSERT INTO `packing_unit` (`unit_id`, `packing_unit`) VALUES
(1, '6Box');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_phone` int(11) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type_of_supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_email`, `address`, `type_of_supplier`) VALUES
(8, 'Incepta Pharmaceuticals Ltd', 1518792088, 'incepta@gmail.com', 'Dhaka', 'International'),
(9, 'Incepta Pharmaceuticals Ltd', 28373773, 'ins@gmail.com', 'badda', 'International'),
(10, 'A M Enterprise', 237837373, 'tyys@gmail.com', 'paltan', 'International'),
(11, 'Orion Pharma Ltd', 49394, 'ins@gmail.com', '53', 'Local'),
(12, 'AB Pharmaceutical', 9990990, 'kal@gmail.com', 'Motijhil', 'International'),
(13, 'ACI Limited', 382727733, 'ins@gmail.com', 'barishal', 'Local'),
(14, 'AB Pharmaceutical', 39393939, 'ons@gmail.com', 'dhaka', 'Local');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `tax_id` int(11) NOT NULL,
  `tax_name` varchar(20) NOT NULL,
  `tax_rate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `tax_name`, `tax_rate`) VALUES
(1, 'Import tax', '8%');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `account_creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `phone`, `password`, `role_id`, `account_creation_date`, `status`) VALUES
(1, 'isms', 'isms@gmail.com', 1518792088, 'isms@', 1, '2022-05-31 11:20:20', 'true'),
(2, 'isms_seller', 'seller@gmail.com', 1518792088, 'seller@', 2, '2022-06-28 19:25:02', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_roll`
--

CREATE TABLE `user_roll` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `permission` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roll`
--

INSERT INTO `user_roll` (`role_id`, `role_name`, `permission`, `status`) VALUES
(1, 'Admin', '', 'Active'),
(2, 'Seller', '', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `customer_id_2` (`customer_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_name` (`brand_id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `packing_unit`
--
ALTER TABLE `packing_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_roll`
--
ALTER TABLE `user_roll`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `iid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `packing_unit`
--
ALTER TABLE `packing_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_roll`
--
ALTER TABLE `user_roll`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
