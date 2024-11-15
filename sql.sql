-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para useunnica
CREATE DATABASE IF NOT EXISTS `faterzindash` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `faterzindash`;

-- Copiando estrutura para tabela useunnica.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cep` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `cadastrado` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela useunnica.clientes: ~0 rows (aproximadamente)
INSERT INTO `clientes` (`id`, `nome`, `telefone`, `cep`, `address`, `cadastrado`) VALUES
	(1, 'Rafael Nascimento Silva', '436573465', '490000001', 'x', 1);

-- Copiando estrutura para tabela useunnica.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `user` varchar(24) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `senha` text DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `funcao` varchar(30) DEFAULT NULL,
  `painel` int(11) DEFAULT 0,
  `cep` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `pagamento` varchar(8) DEFAULT NULL,
  `admin` int(11) DEFAULT 0,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela useunnica.funcionarios: ~4 rows (aproximadamente)
INSERT INTO `funcionarios` (`id`, `nome`, `user`, `email`, `senha`, `telefone`, `funcao`, `painel`, `cep`, `address`, `pagamento`, `admin`) VALUES
	(1, 'Rafael Nascimento', 'rnsrafinha', 'rnsrafinha@gmail.com', '1234', '11111', 'A', 1, '49000-001', 'x', NULL, 1),
	(2, 'João Menezes', NULL, NULL, NULL, '22222', 'B', 0, NULL, NULL, NULL, 0),
	(3, 'Luis Miguel', NULL, NULL, NULL, '33333', 'C', 0, NULL, NULL, NULL, 0),
	(4, 'Danilo Oliveira', NULL, NULL, NULL, '44444', 'D', 0, NULL, NULL, NULL, 0);

-- Copiando estrutura para tabela useunnica.mercadorias
CREATE TABLE IF NOT EXISTS `mercadorias` (
  `id` int(11) DEFAULT NULL,
  `nome` varchar(22) DEFAULT 'Vestidos A',
  `descricao` text DEFAULT NULL,
  `tempo1` varchar(2) DEFAULT NULL,
  `tempo2` varchar(2) DEFAULT NULL,
  `tempo3` varchar(4) DEFAULT NULL,
  `tempo4` varchar(2) DEFAULT NULL,
  `tempo5` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela useunnica.mercadorias: ~2 rows (aproximadamente)
INSERT INTO `mercadorias` (`id`, `nome`, `descricao`, `tempo1`, `tempo2`, `tempo3`, `tempo4`, `tempo5`) VALUES
	(1, 'Vestidos A', '', '20', '08', '2026', '20', '00'),
	(2, 'Vestidos B', '', '21', '08', '2026', '21', '20');

-- Copiando estrutura para tabela useunnica.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text DEFAULT NULL,
  `valor` decimal(20,6) DEFAULT NULL,
  `valorpromocional` decimal(20,6) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `PP` int(11) DEFAULT NULL,
  `P` int(11) DEFAULT NULL,
  `M` int(11) DEFAULT NULL,
  `G` int(11) DEFAULT NULL,
  `GG` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela useunnica.produtos: ~8 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `valor`, `valorpromocional`, `categoria`, `PP`, `P`, `M`, `G`, `GG`) VALUES
	(1, 'Vestido Azul', 99.000000, 89.000000, 'vestido', 0, 0, 0, 0, 1),
	(2, 'Camiseta Preta', 12.000000, NULL, 'camiseta', 2, 1, 1, 0, 0),
	(3, 'Short Cinza', 121.000000, NULL, 'short', 1, 2, 1, 0, 0),
	(4, 'Calça Jeans Clara', 59.000000, 39.000000, 'calca', 1, 0, 1, 0, 0),
	(5, 'Calça Jeans Escura', 99.000000, NULL, 'calca', 2, 1, 2, 0, 0),
	(6, 'Jaqueta de Couro', 189.000000, NULL, 'jaqueta', 2, 0, 3, 0, 0),
	(7, 'Bermuda Branca', 289.000000, 189.000000, 'bermuda', 1, 0, 1, 0, 0),
	(8, 'Conjunto Roxo', 89.000000, NULL, 'conjunto', 1, 1, 1, 0, 0);

-- Copiando estrutura para tabela useunnica.saida_produtos
CREATE TABLE IF NOT EXISTS `saida_produtos` (
  `produtoid` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT 1,
  `vendaid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela useunnica.saida_produtos: ~5 rows (aproximadamente)
INSERT INTO `saida_produtos` (`produtoid`, `quantidade`, `vendaid`) VALUES
	(4, 2, 1),
	(1, 1, 1),
	(3, 1, 1),
	(2, 1, 2),
	(4, 2, 3);

-- Copiando estrutura para tabela useunnica.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendedorid` int(11) DEFAULT NULL,
  `clienteid` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela useunnica.vendas: ~3 rows (aproximadamente)
INSERT INTO `vendas` (`id`, `vendedorid`, `clienteid`, `data`) VALUES
	(1, 1, 1, '2024-10-16 20:37:28'),
	(2, 2, 1, '2024-10-16 20:37:29'),
	(3, 3, 1, '2024-10-16 20:37:29');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
