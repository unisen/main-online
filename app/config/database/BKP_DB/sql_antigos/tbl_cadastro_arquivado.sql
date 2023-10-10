-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25/08/2023 às 21:28
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escala_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_cadastro_arquivado`
--

CREATE TABLE `tbl_cadastro_arquivado` (
  `ID` int(11) NOT NULL,
  `CONTRATO` varchar(20) NOT NULL,
  `INSCRIÇÃO` varchar(20) NOT NULL,
  `SEXO` varchar(20) NOT NULL,
  `ESTADO CIVIL` varchar(20) NOT NULL,
  `NOME COMPLETO` varchar(500) NOT NULL,
  `FILIAÇÃO` varchar(500) NOT NULL,
  `nome_pai` varchar(200) DEFAULT NULL,
  `nome_mae` varchar(200) DEFAULT NULL,
  `CRM` varchar(20) NOT NULL,
  `TELEFONE` varchar(20) NOT NULL,
  `E-MAIL` varchar(200) NOT NULL,
  `DATA DE NASCIMENTO` varchar(10) NOT NULL,
  `RG` varchar(100) NOT NULL,
  `NATURALIDADE` varchar(50) NOT NULL,
  `NACIONALIDADE` varchar(20) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `TITULO DE ELEITOR` varchar(20) NOT NULL,
  `PIS` varchar(20) NOT NULL,
  `ENDEREÇO` varchar(500) NOT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(200) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `cep` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `ENDEREÇO NO NOME` varchar(5) NOT NULL,
  `DADOS BANCARIOS` varchar(500) NOT NULL,
  `FUNÇÃO` varchar(50) NOT NULL,
  `ESPECIALIDADE` varchar(50) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `ID PLANILHA` varchar(50) NOT NULL,
  `EMPRESA` varchar(50) NOT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `confirmacao` varchar(100) NOT NULL,
  `submission_date` varchar(100) NOT NULL,
  `ARQUIVO` varchar(5000) NOT NULL,
  `USER_IMAGE` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_cadastro_arquivado`
--
ALTER TABLE `tbl_cadastro_arquivado`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_cadastro_arquivado`
--
ALTER TABLE `tbl_cadastro_arquivado`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
