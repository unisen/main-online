-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24/08/2023 às 19:32
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
-- Estrutura para tabela `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id` int(11) NOT NULL,
  `nome_form` varchar(50) DEFAULT NULL,
  `documento` varchar(200) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id`, `nome_form`, `documento`, `numero`) VALUES
(1, 'form-foto', 'FOTO', 1),
(2, 'form-curriculum', 'CURRICULUM VITAE', 2),
(3, 'form-crm', 'CARTEIRA CRM', 3),
(4, 'form-rg', 'RG', 4),
(5, 'form-cpf', 'CPF', 5),
(6, 'form-titulo-eleitor', 'TITULO DE ELEITOR', 6),
(7, 'form-reservista', 'COMPROVANTE DE ALISTAMENTO MILITAR', 7),
(8, 'form-pis', 'PIS', 8),
(9, 'form-endereco', 'COMPROVANTE DE ENDERECO', 9),
(10, 'form-diploma', 'DIPLOMA', 10),
(11, 'form-debitocrm', 'CERTIDAO NEGATIVA DE DEBITO CRM', 11),
(12, 'form-vacinacao', 'CARTAO DE VACINA', 12),
(13, 'form-eticoscrm', 'ANTECEDENTES ETICOS CRM', 13),
(14, 'form-cncf', 'CERTIDAO NEGATIVA CRIMINAL FEDERAL', 14),
(15, 'form-cnce', 'CERTIDAO NEGATIVA CRIMINAL ESTADUAL', 15),
(16, 'form-cndf', 'CERTIDAO NEGATIVA DE DEBITO FEDERAL', 16),
(17, 'form-cnde', 'CERTIDAO NEGATIVA DE DEBITO ESTADUAL', 17),
(18, 'form-cndm', 'CERTIDAO NEGATIVA DE DEBITO MUNICIPAL', 18),
(19, 'form-cndt', 'CERTIDAO NEGATIVA DE DEBITO TRABALHISTA', 19),
(20, 'form-especs', 'CERTIFICADOS DE ESPECIALIDADES', 20),
(21, 'form-ctexp', 'CARTA DE EXPERIENCIA', 21);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
