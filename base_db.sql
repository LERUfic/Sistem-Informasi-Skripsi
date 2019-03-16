-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for osx10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: db_skripsi
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proposal` (
  `nrp` varchar(20) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `dosbing1` varchar(20) DEFAULT NULL,
  `dosbing2` varchar(20) DEFAULT NULL,
  `rmk` int(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `idstat` int(100) DEFAULT NULL,
  PRIMARY KEY (`nrp`),
  KEY `idstat` (`idstat`),
  KEY `dosbing1` (`dosbing1`),
  KEY `dosbing2` (`dosbing2`),
  CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`idstat`) REFERENCES `status_proposal` (`idstat`),
  CONSTRAINT `proposal_ibfk_2` FOREIGN KEY (`nrp`) REFERENCES `tb_user` (`nrp`),
  CONSTRAINT `proposal_ibfk_3` FOREIGN KEY (`dosbing1`) REFERENCES `tb_user` (`nrp`),
  CONSTRAINT `proposal_ibfk_4` FOREIGN KEY (`dosbing2`) REFERENCES `tb_user` (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposal`
--

LOCK TABLES `proposal` WRITE;
/*!40000 ALTER TABLE `proposal` DISABLE KEYS */;
/*!40000 ALTER TABLE `proposal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rmk`
--

DROP TABLE IF EXISTS `rmk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rmk` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `srmk` varchar(50) DEFAULT NULL,
  `lrmk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rmk`
--

LOCK TABLES `rmk` WRITE;
/*!40000 ALTER TABLE `rmk` DISABLE KEYS */;
INSERT INTO `rmk` VALUES (1,'RPL','Rekayasa Perangkat Lunak'),(2,'KBJ','Komputasi Berbasis Jaringan'),(3,'KCV','Komputasi Cerdas dan Visi'),(4,'AJK','Arsitektur Jaringan dan Komputer'),(5,'IGS','Interaksi, Grafika dan Seni'),(6,'ALPRO','Algoritma Pemrograman'),(7,'MI','Manajemen Informasi'),(8,'DTK','Dasar dan Terapan Komputasi');
/*!40000 ALTER TABLE `rmk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar`
--

DROP TABLE IF EXISTS `seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminar` (
  `nrp` varchar(20) NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `d_mulai` datetime DEFAULT NULL,
  `d_selesai` datetime DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `idstat` int(100) DEFAULT NULL,
  PRIMARY KEY (`nrp`),
  KEY `idstat` (`idstat`),
  CONSTRAINT `seminar_ibfk_1` FOREIGN KEY (`idstat`) REFERENCES `status_proposal` (`idstat`),
  CONSTRAINT `seminar_ibfk_2` FOREIGN KEY (`nrp`) REFERENCES `tb_user` (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar`
--

LOCK TABLES `seminar` WRITE;
/*!40000 ALTER TABLE `seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_proposal`
--

DROP TABLE IF EXISTS `status_proposal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_proposal` (
  `idstat` int(100) NOT NULL,
  `textstat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idstat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_proposal`
--

LOCK TABLES `status_proposal` WRITE;
/*!40000 ALTER TABLE `status_proposal` DISABLE KEYS */;
INSERT INTO `status_proposal` VALUES (10,'Pengajuan Oleh Mahasiswa'),(11,'Disetujui Dosen Pembimbing 1'),(12,'Disetujui Dosen Pembimbing 2'),(13,'Disetujui Oleh Semua Dosen Pembimbing'),(14,'Disetujui Oleh Tim RMK'),(15,'Disetujui Oleh Kaprodi'),(16,'Proses Melakukan Seminar'),(20,'Pengajuan Jadwal Seminar Proposal Tugas Akhir Oleh Mahasiswa'),(21,'Menyetujui Jadwal Seminar Proposal Tugas Akhir Oleh Dosen Pembimbing 1'),(22,'Menyetujui Jadwal Seminar Proposal Tugas Akhir Oleh Dosen Pembimbing 2'),(23,'Menyetujui Jadwal Seminar Proposal Tugas Akhir Oleh Semua Dosen Pembimbing'),(24,'Menyetujui Hasil Akhir Seminar Proposal Tugas Akhir Oleh Kaprodi'),(30,'Menunggu Sidang Tugas Akhir'),(31,'Selesai Sidang Tugas Akhir'),(32,'Mahasiswa Dinyatakan Lulus');
/*!40000 ALTER TABLE `status_proposal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `nrp` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `role` int(5) DEFAULT NULL,
  PRIMARY KEY (`nrp`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES ('5116100056','Aguel Satria Wijaya','5116100056@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',5),('Administrator','Administrator','admin@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',1),('dosbing1','Dosen Pembimbing 1','dosbing1@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',4),('dosbing2','Dosen Pembimbing 2','dosbing2@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',4),('dosbing3','Dosen Pembimbing 3','dosbing3@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',4),('kaprodi','Kepala Prodi','kaprodi@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',2),('LERUfic','LERUfic Atans','lerufic@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',5),('verifikator','verifikator RMK','verifikator@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',3),('verifikatorAJK','Verifikator AJK','verifikator.ajk@aguelsatria.web.id','9759f383c1820492226d154ef279d83a',3);
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_rmk`
--

DROP TABLE IF EXISTS `user_rmk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_rmk` (
  `idrmk` int(100) DEFAULT NULL,
  `iduser` varchar(20) DEFAULT NULL,
  KEY `idrmk` (`idrmk`),
  KEY `iduser` (`iduser`),
  CONSTRAINT `user_rmk_ibfk_1` FOREIGN KEY (`idrmk`) REFERENCES `rmk` (`id`),
  CONSTRAINT `user_rmk_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `tb_user` (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_rmk`
--

LOCK TABLES `user_rmk` WRITE;
/*!40000 ALTER TABLE `user_rmk` DISABLE KEYS */;
INSERT INTO `user_rmk` VALUES (1,'Administrator'),(2,'Administrator'),(3,'Administrator'),(4,'Administrator'),(5,'Administrator'),(6,'Administrator'),(7,'Administrator'),(8,'Administrator'),(1,'kaprodi'),(2,'kaprodi'),(3,'kaprodi'),(4,'kaprodi'),(5,'kaprodi'),(6,'kaprodi'),(7,'kaprodi'),(8,'kaprodi'),(1,'verifikator'),(2,'verifikator'),(3,'verifikator'),(4,'verifikator'),(5,'verifikator'),(6,'verifikator'),(7,'verifikator'),(8,'verifikator'),(4,'verifikatorAJK'),(1,'dosbing1'),(2,'dosbing1'),(3,'dosbing1'),(4,'dosbing1'),(5,'dosbing1'),(4,'dosbing2'),(2,'dosbing3'),(6,'dosbing3');
/*!40000 ALTER TABLE `user_rmk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_skripsi'
--

--
-- Dumping routines for database 'db_skripsi'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-16 15:30:55
