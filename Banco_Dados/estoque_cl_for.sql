-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.25a


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bancodados
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ bancodados;
USE bancodados;

--
-- Table structure for table `bancodados`.`classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE `classe` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bancodados`.`classe`
--

/*!40000 ALTER TABLE `classe` DISABLE KEYS */;
INSERT INTO `classe` (`codigo`,`data`,`nome`) VALUES 
 (1,'27/09/2012','ADMINISTRACAO');
/*!40000 ALTER TABLE `classe` ENABLE KEYS */;


--
-- Table structure for table `bancodados`.`estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE `estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `data` varchar(10) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `unidade` int(11) NOT NULL,
  `qtd_estq` int(11) NOT NULL,
  `qtd_mini` int(11) NOT NULL,
  `classe` varchar(1) DEFAULT NULL,
  `vencimento` varchar(10) DEFAULT NULL,
  `fornecedor` varchar(150) DEFAULT NULL,
  `referencia` varchar(150) DEFAULT NULL,
  `saldo` decimal(12,2) NOT NULL,
  `valor` decimal(12,2) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `user` varchar(200) DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bancodados`.`estoque`
--

/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` (`id`,`codigo`,`data`,`descricao`,`unidade`,`qtd_estq`,`qtd_mini`,`classe`,`vencimento`,`fornecedor`,`referencia`,`saldo`,`valor`,`foto`,`user`,`obs`) VALUES 
 (1,1,'25/09/2012','PAPEL A4',200,5000,1000,'E','00/00/0000','KALUNGA','ESCRITORIO','10.00','80.00',NULL,NULL,'TESTE DE INCLUSAO'),
 (3,3,'25/09/2012','HD EXTERNO',1,3,1,'I','00/00/0000','MAXTOR SEG','INFORMATICA','0.00','200.00',NULL,NULL,'HD PARA BACKUP'),
 (4,4,'26/09/2012','PENDRIVERS 8GB',1,20,5,'I','00/00/0000','KINGSTON','ARMAZENAENTO','15.00','15.00',NULL,NULL,'PARA BACKUP DO CPD');
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;


--
-- Table structure for table `bancodados`.`fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE `fornecedor` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(10) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `fone` varchar(150) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `log` varchar(100) DEFAULT NULL,
  UNIQUE KEY `iinicio` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bancodados`.`fornecedor`
--

/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` (`codigo`,`data`,`nome`,`fone`,`endereco`,`log`) VALUES 
 (1,'27/09/2012','KALUNGA','(11) 32569854','RUA XAVIER DE TOLEDO, 56',NULL);
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
