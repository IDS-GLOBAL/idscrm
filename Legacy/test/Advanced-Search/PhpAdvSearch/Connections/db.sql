-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.10


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Definition of table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `IdCategory` int(10) NOT NULL AUTO_INCREMENT,
  `Category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdCategory`),
  KEY `Id` (`IdCategory`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`IdCategory`,`Category`) VALUES 
 (1,'Cat 1'),
 (2,'Cat 2'),
 (3,'Cat 3');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


--
-- Definition of table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
CREATE TABLE `clienti` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Description` longtext,
  `CITY` varchar(50) DEFAULT NULL,
  `CATEGORY` int(10) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `PHONE` varchar(50) DEFAULT NULL,
  `MAIL` varchar(50) DEFAULT NULL,
  `FAX` varchar(50) DEFAULT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `STATE` varchar(50) DEFAULT NULL,
  `DataStart` datetime DEFAULT NULL,
  `Visibile` tinyint(1) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Importo` float NOT NULL,
  `Decimale` decimal(8,2) NOT NULL DEFAULT '0.00',
  `Numero` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` (`Id`,`Description`,`CITY`,`CATEGORY`,`NAME`,`PHONE`,`MAIL`,`FAX`,`ADDRESS`,`STATE`,`DataStart`,`Visibile`,`Foto`,`Importo`,`Decimale`,`Numero`) VALUES 
 (2,'Lorem ipsum dolor sit amet, consectetuer a adipiscing elit. Duis ligula lorem,consequat eget, tristique nec, auctor quis, purus…','Las Vegas',2,'Name_2','345354','bbzdhdzhdzhdzhdzhdzhdzhzdhdzhdzhdzhb@bbb.com','654354354','hfxhfx','U.S.A.','2007-01-01 01:26:45',1,'/Public/test.jpg',123.67,'1111.11',0),
 (3,'Lorem ipsum dolor sit amet, consectetuer a adipiscing elit. Duis ligula lorem,consequat eget, tristique nec, auctor quis, purus…','San Francisco',2,'Name_3','32132132','cczdhdzhzdhdzhzdhdzhdzhc@ccc.com','354354453','hfx','U.S.A.','2007-01-01 00:00:00',0,'/Public/Cascata.jpg',125.25,'222.33',0),
 (4,'Special chars: à è ì ò ù ° # § £ $ % & ?','San Francisco',2,'Name_4','321321321','dddhzdhzdhzdhzdhzdhd@ddd.com','354354354','hnfxhn','U.S.A.','2007-01-01 00:00:00',1,'/Public/Cascata.jpg',123,'3333.44',0),
 (5,'Multi lines: \\nLorem ipsum dolor sit amet, consectetuer a adipiscing elit. Duis ligula lorem,\\nhxdhtxh\\n1\\n2\\nconsequat eget, tristique nec, auctor 123 quis, purus 1234 5678 90 0001','Las Vegas',3,'Name_5','321321321','eee@eee.com','354354354','fxn','U.S.A.','2007-01-01 00:00:00',1,'/Public/test.jpg',444,'5555.66',0),
 (6,'gzd','New York',3,'Name_6','32132123','fff@fff.com','35435435','zdbd','U.S.A.','2007-01-01 00:00:00',1,'/Public/test_s.jpg',555,'0.00',0),
 (7,'gdz','Las Vegas',3,'Name_7','564654','ggg@ggg.com','354354354','zbdzb','U.S.A.','2007-01-01 00:00:00',1,'c:\\pippo\\numero.gif',666,'0.00',0),
 (8,'gdz','Las Vegas',2,'Name_8','654654','hhh@hhh.com','85468798','zdbdz','U.S.A.','2007-01-01 00:00:00',0,NULL,777,'0.00',0),
 (9,'dxhgd','New York',2,'Name_9','32132132','iii@iii.com','98798768','bdzbzd','U.S.A.','2007-01-01 00:00:00',1,NULL,888,'0.00',0),
 (10,'gdxghdx','New York',2,'Name_10','646546','mmm@mmm.com','65468496','bzxb','U.S.A.','2007-01-01 00:00:00',0,NULL,999,'0.00',0),
 (11,'ghdxgbd','New York',2,'Name_11','546465','nnn@nnn.com','','xcgbfx','U.S.A.','2007-01-01 00:00:00',1,NULL,1232,'0.00',0),
 (12,'xbdxb','New York',3,'Name_12','454654','ooo@ooo.com','35464867','bfxb','U.S.A.','2007-01-01 00:00:00',0,NULL,232,'0.00',0),
 (13,'dxbgd','New York',3,'Name_13','4654654','ppp@ppp.com','654654789','fxf','U.S.A.','2007-01-01 00:00:00',0,NULL,243,'0.00',0),
 (14,'xbxcb','New York',2,'Name_14','654654','qqq@qqq.com','6546878978','nfxn','U.S.A.','2007-01-01 00:00:00',1,NULL,12,'0.00',0),
 (15,'xcbcx','New York',3,'Name_15','654654','rrr@rrr.com','68468789','fcn','U.S.A.','2007-01-01 00:00:00',1,NULL,1251,'0.00',0),
 (16,'bxb','New York',2,'Name_16','56464','sss@sss.com','35468789','v nv','U.S.A.','2007-01-01 00:00:00',0,NULL,1251,'0.00',0),
 (17,'xfbfxgb','Paris',3,'Name_17','654654654','ttt@ttt.com','312321321','nv','FRAN.CE','2007-01-01 00:00:00',1,NULL,132,'0.00',0),
 (18,'fxgb','Paris',2,'Name_18','564654486','uuu@uuu.com','3213213213','nv nv n','FRAN.CE','2007-01-01 00:00:00',-1,NULL,1000,'0.00',0),
 (19,'gfxbfxb','Paris',3,'Name_19','54351321354','vvv@vvv.com','321564654564','v n','FRANC.E','2007-01-01 00:00:00',0,NULL,0,'0.00',0),
 (20,'gfxbgfx','Paris',3,'Name_20','3513513546','www@www.com','654354354','cfncf','FRAN.CE','2007-01-01 00:00:00',1,NULL,0,'0.00',0),
 (21,'bfxb','Paris',3,'Name_21','5434321435','qwe@qwe.com','3534135435','ncfn','FRAN.CE','2007-01-01 00:00:00',1,NULL,0,'0.00',0),
 (22,'fxgbgfx','Paris',2,'Name_22','3132132132','rty@rty.com','34354534','cnc','FRAN.CE','2007-01-01 00:00:00',1,NULL,0,'0.00',0),
 (23,'bxf','Rome',2,'Name_23','3513132132','uio@uio.com','331435453','n n','Ital.y','2007-01-01 00:00:00',1,NULL,0,'0.00',0),
 (24,'bfxgb','Rome',3,'Name_24','3513213514','asd@asd.com','321354534','n','Ita.ly','2007-01-01 00:00:00',1,NULL,0,'0.00',0),
 (25,'gfxbg','Rome',3,'Name_25','35435465435','fgh@fgh.com','31354564','v n','Ita.ly','2007-01-01 00:00:00',0,NULL,0,'0.00',0),
 (26,'fxbgg','Rome',2,'Name_26','35135135131','jkl@ghj.com','354654654','v nv','Ita.ly','2007-01-01 00:00:00',0,NULL,0,'0.00',0),
 (27,'Lorem ipsum dolor sit amet, consectetuer a adipiscing elit. Duis ligula lorem,consequat eget, tristique nec, auctor quis, purus…','Rome',3,'Name_27','3531321321','cvb@cvb.com','5646546465','nv','Ita.ly','2007-01-01 00:00:00',1,NULL,0,'0.00',0),
 (28,'gbfx','Rome',2,'Name_28','3132132132','mnb@mnb.com','46565464','n v','Ita.ly','2007-01-01 00:00:00',0,NULL,0,'0.00',0);
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
