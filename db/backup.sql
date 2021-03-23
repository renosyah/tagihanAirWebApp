-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: tagihan_air_db
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `auth_key` text,
  `token` text,
  PRIMARY KEY (`id_admin`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin','admin','auth_key-01','token-01');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id_berita` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `tgl_berita` datetime DEFAULT NULL,
  `isi_berita` text,
  `gambar` text,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id_berita`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_pelanggan`
--

DROP TABLE IF EXISTS `info_pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `id_bayar` int DEFAULT NULL,
  `tgl_pembayaran` datetime DEFAULT NULL,
  `denda` varchar(100) DEFAULT NULL,
  `total_bayar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_pelanggan`
--

LOCK TABLES `info_pelanggan` WRITE;
/*!40000 ALTER TABLE `info_pelanggan` DISABLE KEYS */;
INSERT INTO `info_pelanggan` VALUES (1,12345,'2021-01-19 00:00:00','5000','5000'),(3,20607,'2021-01-27 00:00:00','5000','5000'),(4,12345,'2021-01-29 00:00:00','5000','5000');
/*!40000 ALTER TABLE `info_pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` VALUES (1,'pelanggan A','pelanggan1@gmail.com','0812345678','jl janti, bantul, DIY'),(2,'Bagus','bagus@gmail.com','88888888802','desa 1'),(3,'Cahyo','cahyo@gmail.com','88888888803','desa1'),(4,'Deny','Deny@gmail.com','88888888804','desa2'),(5,'Enny','eny@gmail.com','88888888805','desa2'),(6,'Feny','feny@gmail.com','88888888806','desa3'),(7,'Ghani','ghani@gmail.com','88888888807','desa3'),(8,'Joko','joko@gmail.com','88888888808','desa4'),(9,'Koni','knio@gmail.com','88888888809','desa4'),(10,'luna','luni@gmail.com','88888888810','desa 4');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengaduan`
--

DROP TABLE IF EXISTS `pengaduan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengaduan` (
  `id_pengaduan` int NOT NULL AUTO_INCREMENT,
  `pengaduan` text,
  `id_pelanggan` varchar(12) DEFAULT NULL,
  `penanganan` text,
  `status` text,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id_pengaduan`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaduan`
--

LOCK TABLES `pengaduan` WRITE;
/*!40000 ALTER TABLE `pengaduan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengaduan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengumuman`
--

DROP TABLE IF EXISTS `pengumuman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengumuman` (
  `id_pengumuman` int NOT NULL AUTO_INCREMENT,
  `id_kategori` varchar(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `tgl_berita` datetime DEFAULT NULL,
  `isi_berita` text,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id_pengumuman`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengumuman`
--

LOCK TABLES `pengumuman` WRITE;
/*!40000 ALTER TABLE `pengumuman` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengumuman` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-09  9:58:31
