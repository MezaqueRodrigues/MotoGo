-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_motogo
DROP DATABASE IF EXISTS `db_motogo`;
CREATE DATABASE IF NOT EXISTS `db_motogo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_motogo`;

-- Copiando estrutura para tabela db_motogo.empresa
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `idempresa` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idempresa`),
  KEY `fk_empresa_usuario1_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_empresa_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_motogo.empresa: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`idempresa`, `cnpj`, `rua`, `numero`, `cidade`, `bairro`, `cep`, `telefone`, `usuario_idusuario`) VALUES
	(1, '12.456.456/0001-55', 'Rua teste', '12', 'Ouro Fino', 'centro', '37.878-889', '(25) 1232-4566', 0),
	(2, 'fsdfs', 'fsdfs', 'fsdfs', 'CUIABA', 'fsdfs', '78020-50', '654141044', 0),
	(3, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 0),
	(4, 'n', 'n', 'n', 'n', 'n', 'n', 'n', 0),
	(5, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 0),
	(7, '12456789', 'Rua Rodrigo Campos', '10', 'Inconfidenets', 'Centro', '123', '12345', 15);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Copiando estrutura para tabela db_motogo.encomendas
DROP TABLE IF EXISTS `encomendas`;
CREATE TABLE IF NOT EXISTS `encomendas` (
  `idencomendas` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_produto` text DEFAULT NULL,
  `endereco_retirada` text DEFAULT NULL,
  `endereco_entrega` text DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `dimensoes_produto` text DEFAULT NULL,
  `valor_entrega` decimal(10,2) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'CRIADA',
  `empresa_idempresa` int(11) NOT NULL,
  PRIMARY KEY (`idencomendas`),
  KEY `fk_encomendas_empresa1_idx` (`empresa_idempresa`),
  CONSTRAINT `fk_encomendas_empresa1` FOREIGN KEY (`empresa_idempresa`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_motogo.encomendas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `encomendas` DISABLE KEYS */;
INSERT INTO `encomendas` (`idencomendas`, `descricao_produto`, `endereco_retirada`, `endereco_entrega`, `peso`, `dimensoes_produto`, `valor_entrega`, `status`, `empresa_idempresa`) VALUES
	(9, 'Pedido nº 12345 - Pizza Brócolis', 'Inconfidentes', 'Ouro Fino', 1, NULL, 6.00, 'ENTREGADOR A CAMINHO', 7),
	(10, 'Pedido nº 12345 - Pizza Brócolis', 'Inconfidentes', 'Ouro Fino', 1, NULL, 6.00, 'CRIADO', 7);
/*!40000 ALTER TABLE `encomendas` ENABLE KEYS */;

-- Copiando estrutura para tabela db_motogo.entregas
DROP TABLE IF EXISTS `entregas`;
CREATE TABLE IF NOT EXISTS `entregas` (
  `identregas` int(11) NOT NULL AUTO_INCREMENT,
  `hora_retirada` timestamp NULL DEFAULT NULL,
  `hora_entrega` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'AGUARDANDO RETIRADA',
  `encomendas_idencomendas` int(11) NOT NULL,
  `motoboy_id` int(11) NOT NULL,
  PRIMARY KEY (`identregas`),
  KEY `fk_motoboy_has_encomendas_encomendas1_idx` (`encomendas_idencomendas`),
  KEY `fk_motoboy_has_encomendas_motoboy1_idx` (`motoboy_id`),
  CONSTRAINT `fk_motoboy_has_encomendas_encomendas1` FOREIGN KEY (`encomendas_idencomendas`) REFERENCES `encomendas` (`idencomendas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_motoboy_has_encomendas_motoboy1` FOREIGN KEY (`motoboy_id`) REFERENCES `motoboy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_motogo.entregas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `entregas` DISABLE KEYS */;
INSERT INTO `entregas` (`identregas`, `hora_retirada`, `hora_entrega`, `created_at`, `status`, `encomendas_idencomendas`, `motoboy_id`) VALUES
	(2, NULL, NULL, '2021-10-08 14:07:39', 'AGUARDANDO RETIRADA', 9, 25);
/*!40000 ALTER TABLE `entregas` ENABLE KEYS */;

-- Copiando estrutura para tabela db_motogo.motoboy
DROP TABLE IF EXISTS `motoboy`;
CREATE TABLE IF NOT EXISTS `motoboy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(45) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `cnh` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `placa_moto` varchar(10) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_motoboy_usuario1_idx` (`usuario_idusuario`),
  CONSTRAINT `fk_motoboy_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_motogo.motoboy: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `motoboy` DISABLE KEYS */;
INSERT INTO `motoboy` (`id`, `telefone`, `cpf`, `cnh`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `data_nascimento`, `usuario_idusuario`, `placa_moto`, `sexo`) VALUES
	(23, '(35) 7898-4565', '2', '132132', 'Rua Teste', '10', 'Centro', 'Inconfidentes', 'MG', '375760000', '2021-10-25', 16, NULL, NULL),
	(25, '(35) 3464-1200', '3', 'a', 'Rua Joaquim Pinheiro', '125', 'Centro', 'Ouro Fino', 'MG', '78020-50', '1986-04-26', 20, NULL, NULL),
	(38, '35 3464-1234', '123.456.789-78', '123.456.78', 'Rua Joaquim Pinheiro', '52', 'Centro', 'Inconfidentes', 'MG', '37576-000', '2021-11-30', 27, NULL, NULL),
	(50, '(35)1111-1111', '123.456.789-33', '123', 'Rua das Flores', '35', 'Centro', 'Inconfidentes', 'Minas Gerais', '37.576-000', '2020-02-05', 28, 'ABC-1234', 'Masculino');
/*!40000 ALTER TABLE `motoboy` ENABLE KEYS */;

-- Copiando estrutura para tabela db_motogo.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `tipo` enum('Motoboy','Empresa','Administrador') DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_motogo.usuario: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `senha`, `foto`, `tipo`) VALUES
	(1, NULL, 'softip@gmail.com', '123', NULL, 'Motoboy'),
	(2, NULL, 'softip2@gmail.com', '123', NULL, 'Motoboy'),
	(3, 'Joelma Santos', 'joelma@yahoo.com.br', '$2y$10$uFwcOl4gs/qjQfSryUpQoOQlRPMohpJJZfmGh9xI0N6Q9Mrv/Dpk6', 'photos/1633541224_d71c1a5504f008d0ea0b.png', 'Motoboy'),
	(4, NULL, 'IMPERIALLEDS@GMAIL.COM', '$2y$10$AYcwBp9ZpmXWyXe.DiVzTewSHHbIjeF1hfx.ocgvruSYiJbRdTrlO', NULL, 'Motoboy'),
	(6, 'Ivan Paulino Pereira', 'softip@gmail.com3', '$2y$10$FA/6Oor0CKEU6/6TBBHff.U/YcTD/.Iocak2BlqfaF/kfP0llRKSO', NULL, 'Motoboy'),
	(7, NULL, 'cassia@moreira.com', '$2y$10$QXlvA.MJH.2Q1XuSneqfP.6t30m7cwDPZ/LjUUCF.uHUtjDCPvXb6', NULL, 'Motoboy'),
	(8, 'Lorenzo Moreira', 'lorezo@gmail.com', '$2y$10$zgeiK5cmq9c.tjDBKSNfQuE5aacOWhNByDEJhgbsGTe.gGREvrDYy', 'xxxx', 'Motoboy'),
	(9, 'Lorenzo Moreira', 'lorezo2@gmail.com', '$2y$10$wjrQvIGCj0y83RFLE0F.iuY2KwHg6jk6kGj741OtLEr0dE3cA27TW', 'photos/1633541224_d71c1a5504f008d0ea0b.png', 'Motoboy'),
	(10, 'Lorenzo Moreira', 'lorezo3@gmail.com', '$2y$10$KPJEd8d2EQO3r9/IQHKIB.eQLfT1rte5mw/xMNj6YlCM8zSPRIkEG', 'photos/1633541638_e0e634fcb440ae7112c3.png', 'Motoboy'),
	(11, 'Lorenzo Moreira', 'lorezo4@gmail.com', '$2y$10$Fvyy9h7/fiw13tmMNWnxNenOjE0v6LfcekPkMFKLgFS/DCHMBqtcK', 'photos/1633541739_8e87afedf4429469dec9.png', 'Motoboy'),
	(12, 'Lorenzo Moreira', 'lorezo5@gmail.com', '$2y$10$nDW6UJR8b6N9aWP2OLI5reyx64/fm6/6xdA25l.csLnkb0sbB4eju', 'photos/1633543150_30a786398dfbb0c8374b.png', 'Motoboy'),
	(13, 'Lorena Pereira', 'lorena@gmail.com.br', '$2y$10$lWA2ME.uOrS0zfdUgqNYguBdSJ9AEwKx8M7sDMyuGUYp1LCI6/I0W', 'photos/1633543289_da99433c522e96f38510.png', 'Motoboy'),
	(14, 'Antonio da Silva', 'antonio@gmail.com', '$2y$10$727amQsrzGNcnSQ/xg3rY.bzhVfWqB8ChYiFMd8lvt8uqsiFSO6P.', 'photos/1633544003_be7e13fbdd6566a6f606.jpg', 'Motoboy'),
	(15, 'Loja do Paraguai', 'paraguai@gmail.com', '$2y$10$ClfLnBByVk2oXJJbF6RXGO2MlDwOAbefmVVV2uT6ppEouMS71WnaO', 'photos/1633546347_17b1bb8d9eae7ee9b9cb.jpg', 'Empresa'),
	(16, 'Fernandinho Maluco', 'fernandinho@gmail.com', '$2y$10$nhE/W1zZKaDtljdYhJP/HeFkFFVYJCuazcZTce2V.0D6zNsae3JRi', 'photos/1633550449_8f9e0df578e6e830c454.jpg', 'Motoboy'),
	(20, 'José Comilão', 'jose.comilao@yahoo.com.br', '$2y$10$kuZJzhrc0Iq5lnw0NI6LwemaOylDTEfOLjy02OGIMyAgL1Oyg1X6y', 'photos/1634908930.jpg', 'Motoboy'),
	(27, 'Juliana', 'juju@gmail.com', '$2y$10$yZrNrKRGaUn6WWRwtLO5FeDJM6snvzavvEHjX5h8bsbzR6LGiE6u2', 'photos/1638283455_5d6437cfe596bc5e1f54.jpg', 'Motoboy'),
	(28, 'Mezaque', 'mezaque@gmail.com', '$2y$10$yG2OkgFmjGwnceMPeT0O1eCn.PKXTU3pP0RMJIl8BMsC9bpiIXq1W', 'photos/1638283931_0468c0fb89b834fc3a82.jpg', 'Motoboy');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela db_motogo.veiculo
DROP TABLE IF EXISTS `veiculo`;
CREATE TABLE IF NOT EXISTS `veiculo` (
  `idveiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `cor` varchar(45) DEFAULT NULL,
  `volume` varchar(45) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `motoboy_id` int(11) NOT NULL,
  PRIMARY KEY (`idveiculo`),
  KEY `fk_veiculo_motoboy_idx` (`motoboy_id`),
  CONSTRAINT `fk_veiculo_motoboy` FOREIGN KEY (`motoboy_id`) REFERENCES `motoboy` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela db_motogo.veiculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
