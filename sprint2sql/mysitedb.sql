-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mysitedb
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tComentarios`
--

DROP TABLE IF EXISTS `tComentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tComentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(2000) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `id_pelicula` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `FK_Comentarios_Usuarios` (`usuario_id`),
  KEY `FK_Comentarios_Peliculas` (`id_pelicula`),
  CONSTRAINT `FK_Comentarios_Peliculas` FOREIGN KEY (`id_pelicula`) REFERENCES `tPeliculas` (`id_pelicula`),
  CONSTRAINT `FK_Comentarios_Usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `tUsuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tComentarios`
--

LOCK TABLES `tComentarios` WRITE;
/*!40000 ALTER TABLE `tComentarios` DISABLE KEYS */;
INSERT INTO `tComentarios` VALUES (1,'Buena película, le doy un 8. Me gusta la habilidad para narrar varias historias distintas y crear un punto de divergencia entre ellas.',0,1),(2,'Es una película larga y se necesita paciencia para acabarla. Sin embargo, el hilo principal se mantiene en suspense hasta el final, lo que hace que sea un poco más interesante e, incluso, te acabe gustando.',2,4),(3,'Me gustó el género de comedia que da, es un buen toque que permanece hasta el final e, incluso, hace posible un buen giro dramatical en el final.',1,0),(4,'Soy científico y puedo corroborar que la gran parte de la película es científicamente posible, aunque hay alguna flipada.',3,2),(5,'No entendí nada, no se qué de los sueños y una peonza rara que no para de girar. Nolan está loco.',4,3),(6,'Buena película, le doy un 8. Me gusta la habilidad para narrar varias historias distintas y crear un punto de divergencia entre ellas.',0,1),(7,'Es una película larga y se necesita paciencia para acabarla. Sin embargo, el hilo principal se mantiene en suspense hasta el final, lo que hace que sea un poco más interesante e, incluso, te acabe gustando.',2,4),(8,'Me gustó el género de comedia que da, es un buen toque que permanece hasta el final e, incluso, hace posible un buen giro dramatical en el final.',1,0),(9,'Soy científico y puedo corroborar que la gran parte de la película es científicamente posible, aunque hay alguna flipada.',3,2),(10,'No entendí nada, no se qué de los sueños y una peonza rara que no para de girar. Nolan está loco.',4,3);
/*!40000 ALTER TABLE `tComentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tPeliculas`
--

DROP TABLE IF EXISTS `tPeliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tPeliculas` (
  `id_pelicula` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `url_imagen` varchar(200) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tPeliculas`
--

LOCK TABLES `tPeliculas` WRITE;
/*!40000 ALTER TABLE `tPeliculas` DISABLE KEYS */;
INSERT INTO `tPeliculas` VALUES (1,'Reservoir dogs','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQlAfee-wOfz-QVtvEEAJS7KRg8Yw4VGXblxOpi4Ygf9jDtNrJQ','Quentin Tarantino','Drama/Crimen'),(2,'Pulp Fiction','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZUTnNVTW8xT3y97qIZ8op9FNtIXzmp6TPDcC0qpqTvvKNV9YT','Quentin Tarantino','Drama'),(3,'Interestellar','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT_RccL1NBnzoF49rygF-O0YRB2-kIsi_u2OY4nhmV9hRCWbHok','Christopher Nolan','Drama/Ciencia ficción'),(4,'Inception','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTfZzcNIKne1CvXHbUn1q-wvuB7-eVp93ZmL2oI2sW0COs0OdcW','Christopher Nolan','Acción/Ciencia ficción'),(5,'Ciudadano Kane','https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRPez7KMgeqSIgCPbRNZI1Fgp2nIcbeyJgVSM_E8JOKdUgPgx0C','Orson Welles','Drama/Misterio'),(6,'Reservoir dogs','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQlAfee-wOfz-QVtvEEAJS7KRg8Yw4VGXblxOpi4Ygf9jDtNrJQ','Quentin Tarantino','Drama/Crimen'),(7,'Pulp Fiction','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZUTnNVTW8xT3y97qIZ8op9FNtIXzmp6TPDcC0qpqTvvKNV9YT','Quentin Tarantino','Drama'),(8,'Interestellar','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT_RccL1NBnzoF49rygF-O0YRB2-kIsi_u2OY4nhmV9hRCWbHok','Christopher Nolan','Drama/Ciencia ficción'),(9,'Inception','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTfZzcNIKne1CvXHbUn1q-wvuB7-eVp93ZmL2oI2sW0COs0OdcW','Christopher Nolan','Acción/Ciencia ficción'),(10,'Ciudadano Kane','https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRPez7KMgeqSIgCPbRNZI1Fgp2nIcbeyJgVSM_E8JOKdUgPgx0C','Orson Welles','Drama/Misterio');
/*!40000 ALTER TABLE `tPeliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tUsuarios`
--

DROP TABLE IF EXISTS `tUsuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tUsuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contrasenha` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tUsuarios`
--

LOCK TABLES `tUsuarios` WRITE;
/*!40000 ALTER TABLE `tUsuarios` DISABLE KEYS */;
INSERT INTO `tUsuarios` VALUES (1,'javier','esmoris','javierEB@email.com','1234'),(2,'juan','garcía','juang@email.com','1234'),(3,'marta','broncano','martab@email.com','4321'),(4,'admin','admin','admin@email.com','000'),(5,'carlos','galán','carlosg@email.com','0123');
/*!40000 ALTER TABLE `tUsuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-18 14:55:54
