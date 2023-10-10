-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20/06/2023 às 06:18
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
-- Estrutura para tabela `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `registro` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipopessoa` varchar(200) DEFAULT NULL,
  `nome` char(250) DEFAULT NULL,
  `fantasia` char(250) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `numero` varchar(200) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `cep` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `contatos` varchar(200) DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `fax` varchar(200) DEFAULT NULL,
  `celular` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `cnpjcpf` varchar(200) DEFAULT NULL,
  `idrg` varchar(200) DEFAULT NULL,
  `situacao` varchar(200) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `emailnfe` varchar(200) DEFAULT NULL,
  `vendedor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `registro`, `username`, `password`, `tipopessoa`, `nome`, `fantasia`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `contatos`, `telefone`, `fax`, `celular`, `email`, `website`, `cnpjcpf`, `idrg`, `situacao`, `obs`, `emailnfe`, `vendedor`) VALUES
(1, '2023-06-20 01:05:30', '94249580130', '$2y$10$4NJVO1aBL8lNJNM46NJXRe61KJJWNosKcUhmX4ivqfJWUeCpIT1Hy', 'Admin', 'Diego Fernandes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfno82@gmail.com', NULL, '942.495.801-30', NULL, 'Ativo', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
