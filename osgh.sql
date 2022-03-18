-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Mar-2022 às 18:54
-- Versão do servidor: 5.6.17
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `osgh`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `Cod_colaborador` int(5) NOT NULL AUTO_INCREMENT,
  `Cod_departamento` int(5) DEFAULT NULL,
  `Nome_colaborador` varchar(100) DEFAULT NULL,
  `User` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `Perfil` int(1) NOT NULL,
  PRIMARY KEY (`Cod_colaborador`),
  KEY `Cod_departamento` (`Cod_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `colaborador`
--

INSERT INTO `colaborador` (`Cod_colaborador`, `Cod_departamento`, `Nome_colaborador`, `User`, `Senha`, `Perfil`) VALUES
(1, 1, 'Otavio Faccioli', 'OTAVIO', 'gh1013', 0),
(3, 1, 'TESTE', 'TESTE', '123', 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `Cod_departamento` int(5) NOT NULL AUTO_INCREMENT,
  `Nome_departamento` varchar(50) NOT NULL,
  PRIMARY KEY (`Cod_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`Cod_departamento`, `Nome_departamento`) VALUES
(1, 'Administrativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

DROP TABLE IF EXISTS `os`;
CREATE TABLE IF NOT EXISTS `os` (
  `Cod_os` int(5) NOT NULL AUTO_INCREMENT,
  `Cod_colaborador` int(5) DEFAULT NULL,
  `Cod_setor` int(5) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Prioridade` varchar(20) DEFAULT NULL,
  `Titulo_os` varchar(50) DEFAULT NULL,
  `Descricao_os` longtext,
  `Descricao_servos` longtext,
  `Materiais_os` varchar(535) DEFAULT NULL,
  `Prioridade_tec` int(1) NOT NULL,
  `Data_inicio` date DEFAULT NULL,
  `Data_final` date DEFAULT NULL,
  `Finalizado` int(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_os`),
  KEY `Cod_colaborador` (`Cod_colaborador`),
  KEY `Cod_setor` (`Cod_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`Cod_os`, `Cod_colaborador`, `Cod_setor`, `Data`, `Prioridade`, `Titulo_os`, `Descricao_os`, `Descricao_servos`, `Materiais_os`, `Prioridade_tec`, `Data_inicio`, `Data_final`, `Finalizado`) VALUES
(3, 1, 1, '0000-00-00', '1', NULL, 'TESTE', NULL, 'TESTE', 0, NULL, NULL, 0),
(4, 1, 1, '0000-00-00', '2', NULL, 'TESTE', NULL, 'TESTE', 0, NULL, NULL, 0),
(5, 1, 1, '2022-03-15', '2', NULL, 'TESTE', NULL, 'TESTE', 0, '0000-00-00', '0000-00-00', 0),
(6, 1, 1, '2022-03-15', '1', NULL, 'TESTE', NULL, 'TESTE', 0, '0000-00-00', '0000-00-00', 0),
(7, 1, 1, '2022-03-15', '1', NULL, 'TESTE', NULL, 'TESTE', 0, '2020-10-10', '0000-00-00', 0),
(8, 1, 2, '2022-03-15', '2', NULL, 'TESTEeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, 'oi', 0, '2022-03-15', '2022-03-15', 0),
(9, 1, 2, '2022-03-15', '2', NULL, 'TESTEeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, '', 0, '0000-00-00', '0000-00-00', 0),
(10, 1, 2, '2022-03-15', '2', NULL, 'TESTEeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, '', 0, '0000-00-00', '0000-00-00', 0),
(11, 1, 2, '2022-03-15', '2', NULL, 'TESTEeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, 'Parafuso7', 0, '2001-01-01', '2002-02-02', 2),
(12, 1, 3, '2022-03-15', '0', NULL, 'TESTE DO TESTE ARRAY', NULL, '', 0, '0000-00-00', '0000-00-00', 1),
(13, 1, 1, '2022-03-15', '2', NULL, 'TESTE NOVAMENTE', NULL, 'TESTE DO MATERIALsdfsdfsf', 0, '2022-03-05', '2022-03-27', 2),
(14, 1, 1, '2022-03-16', '2', NULL, 'TESTE DA DATA', NULL, 'perfilado', 0, '2022-03-15', '2022-03-16', 1),
(15, 1, 1, '2022-03-16', '2', NULL, 'TESTE DA DATA', NULL, '', 0, '2022-03-16', '2022-03-23', 2),
(16, 1, 1, '2022-03-16', '1', NULL, 'TESTE DO TESTE TESTADO', NULL, '', 0, '0000-00-00', '0000-00-00', 0),
(17, 1, 1, '2022-03-17', '0', '', 'TESTE 17', '', '', 0, '0000-00-00', '0000-00-00', 0),
(18, 1, 1, '2022-03-17', '0', '', 'TESTE 18', '', '', 0, '0000-00-00', '0000-00-00', 0),
(19, 1, 1, '2022-03-17', '0', '', 'TESTE 19', '', '', 0, '0000-00-00', '0000-00-00', 0),
(20, 1, 1, '2022-03-17', '0', 'TESTEEEEEEEEEEEEEEEEEEEEEE 19', 'TESTE 19', 'TESTE 19', 'TESTE 19', 1, '2022-03-17', '2022-03-18', 2),
(21, 3, 1, '2022-03-18', '2', 'TESTE DO USUARIO TESTE', 'TESTE TESTANDO 123', '', '', 0, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

DROP TABLE IF EXISTS `setor`;
CREATE TABLE IF NOT EXISTS `setor` (
  `Cod_setor` int(5) NOT NULL AUTO_INCREMENT,
  `Nome_setor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Cod_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`Cod_setor`, `Nome_setor`) VALUES
(1, 'Escritorio'),
(2, 'Galpao Branco'),
(3, 'GalpÃ£o Vermelho');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
