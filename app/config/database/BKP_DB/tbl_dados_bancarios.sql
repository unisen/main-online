-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01/09/2023 às 16:57
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
-- Estrutura para tabela `tbl_dados_bancarios`
--

CREATE TABLE `tbl_dados_bancarios` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cpf_user` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `conta_corrente` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `agencia` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `banco` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tipo_chave` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `chave_pix` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_dados_bancarios`
--
ALTER TABLE `tbl_dados_bancarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_dados_bancarios`
--
ALTER TABLE `tbl_dados_bancarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
