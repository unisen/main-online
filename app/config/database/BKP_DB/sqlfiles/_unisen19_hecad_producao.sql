--
-- Banco de dados: `unisen19_hecad_producao`
--
CREATE DATABASE IF NOT EXISTS `unisen19_hecad_producao` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `unisen19_hecad_producao`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `consolidado_agosto2023`
--

CREATE TABLE `consolidado_agosto2023` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(500) NOT NULL,
  `CRM` varchar(20) NOT NULL,
  `EMPRESA` varchar(300) NOT NULL,
  `FUNCAO` varchar(100) NOT NULL,
  `HORARIO` varchar(200) NOT NULL,
  `A1` varchar(20) NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` varchar(20) NOT NULL,
  `A5` varchar(20) NOT NULL,
  `A6` varchar(20) NOT NULL,
  `A7` varchar(20) NOT NULL,
  `A8` varchar(20) NOT NULL,
  `A9` varchar(20) NOT NULL,
  `A10` varchar(20) NOT NULL,
  `A11` varchar(20) NOT NULL,
  `A12` varchar(20) NOT NULL,
  `A13` varchar(20) NOT NULL,
  `A14` varchar(20) NOT NULL,
  `A15` varchar(20) NOT NULL,
  `A16` varchar(20) NOT NULL,
  `A17` varchar(20) NOT NULL,
  `A18` varchar(20) NOT NULL,
  `A19` varchar(20) NOT NULL,
  `A20` varchar(20) NOT NULL,
  `A21` varchar(20) NOT NULL,
  `A22` varchar(20) NOT NULL,
  `A23` varchar(20) NOT NULL,
  `A24` varchar(20) NOT NULL,
  `A25` varchar(20) NOT NULL,
  `A26` varchar(20) NOT NULL,
  `A27` varchar(20) NOT NULL,
  `A28` varchar(20) NOT NULL,
  `A29` varchar(20) NOT NULL,
  `A30` varchar(20) NOT NULL,
  `A31` varchar(20) NOT NULL,
  `TOTAL_DDS` varchar(30) NOT NULL,
  `TOTAL_FDS` varchar(30) NOT NULL,
  `FDS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `consolidado_agosto2023`
--

INSERT INTO `consolidado_agosto2023` (`ID`, `NOME`, `CRM`, `EMPRESA`, `FUNCAO`, `HORARIO`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `A10`, `A11`, `A12`, `A13`, `A14`, `A15`, `A16`, `A17`, `A18`, `A19`, `A20`, `A21`, `A22`, `A23`, `A24`, `A25`, `A26`, `A27`, `A28`, `A29`, `A30`, `A31`, `TOTAL_DDS`, `TOTAL_FDS`, `FDS`) VALUES
(1, 'ALINE SOARES VELASCO', '16836', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '', '', '', '', '', '', '', '4', '', '', '', '', '', '6', '', ''),
(2, 'BRUNA EUGENIO HORBYLON', '20296', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '13', '', '', '', '23', '', ''),
(3, 'EVERTON SOUSA DE PONTES', '20224', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '', '5', '', ''),
(4, 'GABRIELLA JAIME VIEIRA', '24531', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '', '', '', '', '', '', '', '5', '', ''),
(5, 'ISABELLA RODRIGUES MENDONÇA', '26005', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13', '', '', '', '', '', '', '', '', '', '', '', '', '', '13', '', ''),
(6, 'MARIANE MARTINS FERREIRA', '18392', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '', '', '', '', '9', '', ''),
(7, 'NATAL VIEIRA RAMOS JÚNIOR', '17203', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '2', '', '0', '', '3', '', '', '', '', '', '', '5', '', ''),
(8, 'PABLO SANTIAGO DE FREITAS FERNANDES', '20141', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '17', '', ''),
(9, 'PABLO SANTIAGO DE FREITAS FERNANDES', '20141', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15', '17', '', '', '', '18', '13', '20', '', '', '14', '', '13', '19', '11', '24', '164', '', ''),
(10, 'PAULA ROBERTA MARÇAL MAIA', '23456', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '', '', '', '', '', '', '2', '', ''),
(11, 'RENAN DE MACEDO CARVALHO', '1338', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '', '', '', '', '', '', '10', '', ''),
(12, 'STÉPHANE RIBEIRO SEIXAS', '23194', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', '', '', '', '4', '', ''),
(13, 'SUSANA HAGE REYES', '14112', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '9', '', '', '', '', '', '', '', '', '', '', '', '11', '', ''),
(14, 'YHASMIN OLIVEIRA GONDIM MORAES', '20070', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '17', '', '15', '32', '', ''),
(15, 'ADRIANA CHAVEIRO DE ANDRADE BRITO', '22640', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '3', '', '', '', '', '7', '', ''),
(16, 'ALICE SOUSA ALMEIDA', '26988', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '', '10', '', ''),
(17, 'ANTÔNIO FERNANDO DE MENDONÇA', '3428', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '16', '', '', '22', '23', '', '', '24', '', '', '24', '21', '18', '13', '', '', '161', '', ''),
(18, 'BÁRBARA MARIA BIAGE TEIXEIRA', '20263', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', '', '', '', '', '4', '5', '', '', '', '', '', '', '13', '', ''),
(19, 'CAMILA PEDATELLA JAIME', '23471', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', ''),
(20, 'DARLÔ PERES DOS SANTOS FILHO', '8021', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '', '7', '9', '5', '', '', '6', '', '4', '', '', '', '', '10', '', '46', '', ''),
(21, 'DARLÔ PERES DOS SANTOS FILHO', '8021', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '10', '', '', '', '', '', '', '', '', '20', '', ''),
(22, 'DARLÔ PERES DOS SANTOS FILHO', '8021', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '8', '', '10', '', '', '', '', '6', '', '', '', '', '', '', '13', '37', '', ''),
(23, 'DIULY CAROLINE RIBEIRO', '25546', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '', '', '', '', '18', '', '', '14', '44', '', ''),
(24, 'DIULY CAROLINE RIBEIRO', '25546', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '19', '', '', '', '', '', '', '', '', '', '19', '', ''),
(25, 'DIULY CAROLINE RIBEIRO', '25546', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '24', '', '', '', '', '', '', '24', '', ''),
(26, 'FERNANDA PIRES MUNIZ', '21882', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '', '', '', '', '', '', '', '', '', '11', '', '', '16', '', ''),
(27, 'FERNANDA PIRES MUNIZ', '21882', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '', '', '', '', '', '', '', '', '', '', '', '', '', '14', '26', '', ''),
(28, 'GABRIELA CAMPOS FURLAN', '29693', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11', '', '', '', '', '', '', '16', '', '', '27', '', ''),
(29, 'GABRIELA CAMPOS FURLAN', '29693', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '18', '', '', '', '33', '', '', '16', '', '', '', '24', '', '', '17', '', '108', '', ''),
(30, 'GABRIELA DA SILVA TEIXEIRA', '29240', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', '', '', '', '', '4', '', ''),
(31, 'GABRIELLA JAIME VIEIRA', '24531', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7', '', '', '', '', '', '7', '', ''),
(32, 'GISELLE DA COSTA SILVA', '18368', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '', '', '', '', '', '9', '', ''),
(33, 'ISABELLA RODRIGUES MENDONÇA', '26005', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '16', '', '', '', '', '', '', '14', '', '', '30', '', ''),
(34, 'JULIANA BOSI PEREIRA CARDOSO', '8951', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '', ''),
(35, 'JULIANA BOSI PEREIRA CARDOSO', '8951', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '2', '', '', '', '13', '', '', '14', '8', '', '', '', '', '9', '6', '57', '', ''),
(36, 'LUDMILA RUYS LOPES JASBICK', '20831', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '', '', '', '15', '', '', '', '', '24', '', ''),
(37, 'MARCELO RODRIGUES SUGURI', '17877', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '4', '', '', '', '', '', '8', '', '', '', '21', '', ''),
(38, 'MARCELO RODRIGUES SUGURI', '17877', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '', '', '', '11', '10', '', '', '31', '', ''),
(39, 'MARIANE MARTINS FERREIRA', '18392', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '22', '', '', '31', '', '', '14', '', '', '', '16', '', '', '', '83', '', ''),
(40, 'MATTEUS DI VILELA REBOUÇAS', '25036', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '', '6', '', ''),
(41, 'MATTEUS DI VILELA REBOUÇAS', '25036', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13', '', '', '', '', '', '', '', '', '', '13', '', ''),
(42, 'NATAL VIEIRA RAMOS JÚNIOR', '17203', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', ''),
(43, 'NATAL VIEIRA RAMOS JÚNIOR', '17203', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', ''),
(44, 'NATAL VIEIRA RAMOS JÚNIOR', '17203', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '', '', '', '', '', '', '', '', '', '', '5', '', ''),
(45, 'PABLO SANTIAGO DE FREITAS FERNANDES', '20141', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '14', '', '', '', '', '', '', '17', '', '', '', '', '', '', '16', '47', '', ''),
(46, 'PABLO SANTIAGO DE FREITAS FERNANDES', '20141', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '26', '46', '', ''),
(47, 'PRISCILA DE OLIVEIRA LOPES', '17281', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '31', '31', '', '', '62', '', ''),
(48, 'RAISA GONÇALVES DE SOUSA', '29506', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7', '', '', '', '', '', '', '', '', '', '', '', '7', '', ''),
(49, 'RAISA GONÇALVES DE SOUSA', '29506', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '', '', '', '', '', '', '', '', '10', '', ''),
(50, 'RAISA GONÇALVES DE SOUSA', '29506', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13', '', '', '', '', '', '', '36', '', '', '', '', '18', '', '67', '', ''),
(51, 'RENAN DE MACEDO CARVALHO', '1338', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '10', '', '', '', '', '22', '', ''),
(52, 'STÉPHANE RIBEIRO SEIXAS', '23194', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '', '', '', '', '', '8', '9', '', '', '', '', '', '', '9', '', '28', '', ''),
(53, 'SUSANA HAGE REYES', '14112', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '', '', '', '', '', '', '9', '', ''),
(54, 'YHASMIN OLIVEIRA GONDIM MORAES', '20070', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '', '', '', '', '', '', '', '', '', '', '12', '', ''),
(55, 'YHASMIN OLIVEIRA GONDIM MORAES', '20070', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '14', '', '', '', '', '', '', '', '', '', '', '', '', '', '26', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consolidado_setembro2023`
--

CREATE TABLE `consolidado_setembro2023` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(500) NOT NULL,
  `CRM` varchar(20) NOT NULL,
  `EMPRESA` varchar(300) NOT NULL,
  `FUNCAO` varchar(100) NOT NULL,
  `HORARIO` varchar(200) NOT NULL,
  `A1` varchar(20) NOT NULL,
  `A2` varchar(20) NOT NULL,
  `A3` varchar(20) NOT NULL,
  `A4` varchar(20) NOT NULL,
  `A5` varchar(20) NOT NULL,
  `A6` varchar(20) NOT NULL,
  `A7` varchar(20) NOT NULL,
  `A8` varchar(20) NOT NULL,
  `A9` varchar(20) NOT NULL,
  `A10` varchar(20) NOT NULL,
  `A11` varchar(20) NOT NULL,
  `A12` varchar(20) NOT NULL,
  `A13` varchar(20) NOT NULL,
  `A14` varchar(20) NOT NULL,
  `A15` varchar(20) NOT NULL,
  `A16` varchar(20) NOT NULL,
  `A17` varchar(20) NOT NULL,
  `A18` varchar(20) NOT NULL,
  `A19` varchar(20) NOT NULL,
  `A20` varchar(20) NOT NULL,
  `A21` varchar(20) NOT NULL,
  `A22` varchar(20) NOT NULL,
  `A23` varchar(20) NOT NULL,
  `A24` varchar(20) NOT NULL,
  `A25` varchar(20) NOT NULL,
  `A26` varchar(20) NOT NULL,
  `A27` varchar(20) NOT NULL,
  `A28` varchar(20) NOT NULL,
  `A29` varchar(20) NOT NULL,
  `A30` varchar(20) NOT NULL,
  `TOTAL_DDS` varchar(30) NOT NULL,
  `TOTAL_FDS` varchar(30) NOT NULL,
  `FDS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `consolidado_setembro2023`
--

INSERT INTO `consolidado_setembro2023` (`ID`, `NOME`, `CRM`, `EMPRESA`, `FUNCAO`, `HORARIO`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `A8`, `A9`, `A10`, `A11`, `A12`, `A13`, `A14`, `A15`, `A16`, `A17`, `A18`, `A19`, `A20`, `A21`, `A22`, `A23`, `A24`, `A25`, `A26`, `A27`, `A28`, `A29`, `A30`, `TOTAL_DDS`, `TOTAL_FDS`, `FDS`) VALUES
(1, 'ADRIANA CHAVEIRO DE ANDRADE BRITO', '22640', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11', '', '', '', '', '', '', '', '', '', '11', '', ''),
(2, 'BRUNA EUGENIO HORBYLON', '20296', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '14', '', ''),
(3, 'CAMILA PEDATELLA JAIME', '23471', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '12', '', '', '', '', '', '', '', '', '', '', '', '', '', '11', '', '', '', '', '', '', '', '', '', '23', '', ''),
(4, 'CAROLINE MENDES SANTOS', '23656', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '2', '', ''),
(5, 'CAROLINE MENDES SANTOS', '23656', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '', '', '', '', '', '', '', '', '4', '', '', '14', '', ''),
(6, 'DIULY CAROLINE RIBEIRO', '25546', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '18', '', '', '', '', '', '', '11', '', '', '', '', '', '', '', '', '', '', '', '', '', '11', '', '', '40', '', ''),
(7, 'GABRIELA DA SILVA TEIXEIRA', '29240', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '', ''),
(8, 'GABRIELLA JAIME VIEIRA', '24531', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '3', '3', '', ''),
(9, 'INAJÁ DE FIGUEIREDO MARTINS ESCARIÃO', '17653', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', '', '', '', '', '', '', '10', '', ''),
(10, 'INAJÁ DE FIGUEIREDO MARTINS ESCARIÃO', '17653', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '16', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '', '', '', '', '', '', '', '25', '', ''),
(11, 'ISABELA BIANCHINI COSTA E SILVA', '27163', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '10', '', '', '', '', '', '', '', '8', '', '', '', '', '', '', '9', '', '', '', '', '', '', '11', '', '10', '', '', '', '', '48', '', ''),
(12, 'JULIANA BOSI PEREIRA CARDOSO', '8951', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7', '', '', '', '', '8', '', '', '', '15', '', ''),
(13, 'LARISSA PFRIMER CAPUZZO', '18720', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', ''),
(14, 'NATAL VIEIRA RAMOS JÚNIOR', '17203', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '4', '', '14', '', '9', '', '', '6', '', '12', '', '', '', '', '8', '', '8', '', '7', '', '', '9', '', '10', '', '87', '', ''),
(15, 'NATAL VIEIRA RAMOS JÚNIOR', '17203', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11', '', ''),
(16, 'PABLO SANTIAGO DE FREITAS FERNANDES', '20141', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '19', '19', '', '', '', '', '', '24', '22', '26', '25', '', '', '', '19', '28', '25', '', '', '', '', '', '', '', '', '', '', '207', '', ''),
(17, 'PAULA DAHER RASSI GUIMARÃES', '28761', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '17', '', ''),
(18, 'PAULA DAHER RASSI GUIMARÃES', '28761', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11', '', '', '', '', '', '19', '', ''),
(19, 'PAULA ROBERTA MARÇAL MAIA', '23456', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '19:00 - 01:00', '', '', '', '', '', '', '', '14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', '18', '', ''),
(20, 'PRISCILA DE OLIVEIRA LOPES', '17281', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '30', '', '', '', '', '', '', '31', '', '', '', '', '', '', '33', '', '', '', '', '', '', '31', '', '', '', '', '', '125', '', ''),
(21, 'STÉPHANE RIBEIRO SEIXAS', '23194', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', ''),
(22, 'THAÍS SILVA FERNANDES', '25589', 'RPC E ASSOCIADOS S/S LTDA', 'APOIO', '13:00 - 19:00', '', '', '', '', '12', '', '', '', '', '', '', '10', '', '', '', '', '', '', '11', '', '', '', '', '', '', '6', '', '', '', '', '39', '', ''),
(23, 'ADRIANA CHAVEIRO DE ANDRADE BRITO', '22640', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '9', '', '', '', '', '10', '15', '', '', '', '', '', '', '', '', '', '', '', '', '', '8', '', '', '', '', '', '', '', '', '42', '', ''),
(24, 'ADRIANA CHAVEIRO DE ANDRADE BRITO', '22640', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '9', '', '', '', '', '29', '', ''),
(25, 'ANTÔNIO FERNANDO DE MENDONÇA', '3428', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '23', '17', '21', '17', '', '', '18', '24', '25', '18', '22', '', '', '22', '18', '24', '14', '18', '', '', '20', '20', '20', '13', '13', '', '', '17', '384', '', ''),
(26, 'BÁRBARA MARIA BIAGE TEIXEIRA', '20263', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '1', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', ''),
(27, 'BRUNA EUGENIO HORBYLON', '20296', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '10', '', '', '10', '', '', '', '9', '', '', '10', '', '', '49', '', ''),
(28, 'BRUNA EUGENIO HORBYLON', '20296', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '15', '', '', '14', '', '', '', '19', '', '', '11', '', '', '', '', '', '', '11', '', '', '70', '', ''),
(29, 'BRUNA EUGENIO HORBYLON', '20296', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15', '', ''),
(30, 'CAMILA PEDATELLA JAIME', '23471', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '', ''),
(31, 'CAMILA PEDATELLA JAIME', '23471', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '4', '', '', '', '', '', '', '', '', '8', '8', '', '', '', '8', '', '', '', '', '', '', '', '', '', '28', '', ''),
(32, 'CAROLINE MENDES SANTOS', '23656', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '4', '', ''),
(33, 'DARLÔ PERES DOS SANTOS FILHO', '8021', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '10', '', '5', '', '', '6', '', '6', '', '', '', '', '5', '', '6', '', '', '', '', '7', '', '5', '9', '8', '', '', '8', '', '5', '', '80', '', ''),
(34, 'DARLÔ PERES DOS SANTOS FILHO', '8021', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '10', '', '6', '', '', '6', '', '7', '', '', '', '', '7', '', '10', '', '', '', '', '9', '', '7', '10', '10', '', '', '10', '', '10', '', '102', '', ''),
(35, 'DARLÔ PERES DOS SANTOS FILHO', '8021', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '15', '', '', '', '', '', '', '17', '', '', '', '', '', '', '15', '', '', '', '', '', '', '', '13', '', '60', '', ''),
(36, 'DIULY CAROLINE RIBEIRO', '25546', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '14', '', '', '', '', '', '', '13', '', '', '', '', '', '', '16', '', '', '', '', '', '', '17', '', '60', '', ''),
(37, 'DIULY CAROLINE RIBEIRO', '25546', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '23', '', '', '', '', '', '', '', '', '', '', '23', '', ''),
(38, 'EVERTON SOUSA DE PONTES', '20224', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', ''),
(39, 'FERNANDA PIRES MUNIZ', '21882', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '9', '', '', '', '', '', '', '10', '', '', '', '', '19', '', ''),
(40, 'FERNANDA PIRES MUNIZ', '21882', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '', '', '', '', '', '', '', '', '', '', '', '', '', '13', '', '', '25', '', ''),
(41, 'GABRIELA CAMPOS FURLAN', '29693', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '15', '', '', '', '', '', '', '10', '', '', '', '', '', '', '12', '', '', '', '', '', '', '14', '', '', '', '', '51', '', ''),
(42, 'GABRIELA CAMPOS FURLAN', '29693', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '13', '', '', '', '', '', '', '17', '', '', '', '13', '', '', '', '', '', '13', '25', '', '15', '', '', '', '', '96', '', ''),
(43, 'GABRIELA DA SILVA TEIXEIRA', '29240', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7', '', ''),
(44, 'GABRIELLA JAIME VIEIRA', '24531', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '', '', '', '', '', '', '7', '', '', '', '', '', '', '', '', '13', '', ''),
(45, 'INAJÁ DE FIGUEIREDO MARTINS ESCARIÃO', '17653', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '23', '', ''),
(46, 'ISABELA BIANCHINI COSTA E SILVA', '27163', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '17', '', ''),
(47, 'ISABELLA RODRIGUES MENDONÇA', '26005', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '16', '', '', '', '14', '', '', '', '', '', '', '18', '', '', '', '', '', '', '18', '', '', '', '', '', '', '', '22', '', '', '', '88', '', ''),
(48, 'JORDANA CARLA CABRAL E SILVA', '20932', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '7', '', '', '', '', '', '', '', '14', '', ''),
(49, 'JULIANA BOSI PEREIRA CARDOSO', '8951', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '8', '', ''),
(50, 'MARCELO RODRIGUES SUGURI', '17877', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '10', '6', '', '', '', '10', '9', '6', '', '', '', '', '', '', '6', '', '', '', '', '', '', '6', '', '', '', '', '8', '61', '', ''),
(51, 'MARCELO RODRIGUES SUGURI', '17877', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '12', '10', '', '', '', '11', '10', '10', '8', '', '', '', '', '', '10', '6', '', '', '', '', '', '10', '', '', '', '', '12', '99', '', ''),
(52, 'MARIANE MARTINS FERREIRA', '18392', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '19', '', '', '24', '', '', '', '22', '', '', '', '22', '', '', '17', '', '', '13', '', '', '', '12', '', '', '12', '', '', '141', '', ''),
(53, 'MATTEUS DI VILELA REBOUÇAS', '25036', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '', ''),
(54, 'NATAL VIEIRA RAMOS JÚNIOR', '17203', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12', '', ''),
(55, 'PABLO SANTIAGO DE FREITAS FERNANDES', '20141', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '20', '', '', '', '', '', '', '27', '', '', '', '', '', '', '', '', '', '47', '', ''),
(56, 'PABLO SANTIAGO DE FREITAS FERNANDES', '20141', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '26', '', ''),
(57, 'PAULA DAHER RASSI GUIMARÃES', '28761', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20', '', '', '', '', '', '', '', '', '20', '', ''),
(58, 'POLYANA OLIVEIRA SANTOS', '21239', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '', ''),
(59, 'POLYANA OLIVEIRA SANTOS', '21239', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '', '', '', '10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10', '', '', '', '', '', '20', '', ''),
(60, 'PRISCILA DE OLIVEIRA LOPES', '17281', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '29', '', '', '', '', '', '', '32', '', '', '', '', '', '', '28', '', '', '', '', '', '', '28', '', '', '', '', '117', '', ''),
(61, 'RAISA GONÇALVES DE SOUSA', '29506', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '19:00 - 07:00', '', '', '19', '', '', '', '', '23', '28', '21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '91', '', ''),
(62, 'RENAN DE MACEDO CARVALHO', '1338', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '15', '10', '', '', '', '', '', '', '10', '', '', '', '', '', '15', '10', '', '', '', '', '', '', '10', '', '', '', '7', '', '9', '86', '', ''),
(63, 'RENAN DE MACEDO CARVALHO', '1338', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '16', '12', '', '', '', '', '', '', '14', '', '', '', '', '', '17', '12', '', '', '', '', '', '', '19', '', '', '', '2', '', '10', '102', '', ''),
(64, 'STÉPHANE RIBEIRO SEIXAS', '23194', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '8', '', '', '', '', '', '', '7', '', '', '', '', '', '', '10', '', '', '', '', '', '', '6', '', '', '', '31', '', ''),
(65, 'STÉPHANE RIBEIRO SEIXAS', '23194', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '13:00 - 19:00', '', '', '', '', '', '10', '', '', '', '', '', '', '10', '', '', '', '', '', '', '11', '', '', '', '', '', '', '10', '', '', '', '41', '', ''),
(66, 'SUSANA HAGE REYES', '14112', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '3', '', '11', '', ''),
(67, 'YHASMIN OLIVEIRA GONDIM MORAES', '20070', 'RPC E ASSOCIADOS S/S LTDA', 'PORTA', '07:00 - 13:00', '', '', '', '', '', '', '', '', '', '', '', '17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '17', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `corpo_clinico`
--

CREATE TABLE `corpo_clinico` (
  `ID` int(11) NOT NULL,
  `NOME_COMPLETO` varchar(300) NOT NULL,
  `EMAIL` varchar(300) NOT NULL,
  `CRM` varchar(20) NOT NULL,
  `UF` varchar(20) NOT NULL,
  `ID_ESCALA` varchar(70) NOT NULL,
  `EMPRESA_NOME` varchar(300) NOT NULL,
  `CNPJ` varchar(20) NOT NULL,
  `CPF` varchar(20) NOT NULL,
  `CELULAR` varchar(30) NOT NULL,
  `FUNCAO` varchar(50) NOT NULL,
  `confirmacao` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL,
  `SUBMISSION_DATE` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `corpo_clinico`
--

INSERT INTO `corpo_clinico` (`ID`, `NOME_COMPLETO`, `EMAIL`, `CRM`, `UF`, `ID_ESCALA`, `EMPRESA_NOME`, `CNPJ`, `CPF`, `CELULAR`, `FUNCAO`, `confirmacao`, `status`, `SUBMISSION_DATE`) VALUES
(50, 'RENATO PEREIRA CAMPELO', 'repcampelo@hotmail.com', '13628', 'GO', 'RENATO CAMPELO (13628)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '978.342.621-49', '(62) 98205-1212', 'ADM', '64ce67d328fdf', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIKnN4D8K7p-qSv_w'),
(51, 'ASSESSORIA DE ESCALA', 'jadsonrecartes03@gmail.com', '1', 'GO', 'ASSESSORIA ESCALA (00001)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '016.148.331-33', '(62) 98231-3178', 'ADM', '64ce717ab1d76', 'confirmado', '05/08/2023 12:57'),
(446, 'ADRIANA CHAVEIRO DE ANDRADE BRITO', 'dricac@hotmail.com', '22640', 'GO', 'ADRIANA CHAVEIRO (22640)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-85', '916.158.791-53', '(62) 99342-2502', 'PORTA; CORREDOR', '?', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIKnN4D8K7p-qSv_w'),
(447, 'ALICE ELIANE ALMEIDA MORAIS', 'aliceeliane@hotmail.com', '5215', 'GO', 'ALICE ELIANE (5215)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-85', '485.483.241-04', '(62) 991419076', 'SALA VERMELHA; CORREDOR', '989', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIMjv2VglKsSE7oHQ'),
(448, 'ALICE SOUSA ALMEIDA', 'alicesa0314@gmail.com', '26988', 'GO', 'ALICE SOUSA (26988)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-85', '703.123.951-67', '(62) 99242-6472', 'PORTA; CORREDOR', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIO4gf9SjU9uZC20w'),
(449, 'ALINE SOARES VELASCO', 'velascoaline@yahoo.com.br', '16836', 'GO', 'ALINE VELASCO (16836)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-86', '718.136.161-91', '(62) 99940-0843', 'PORTA; CORREDOR', '11740', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIQNa0L5e4RZGLZTQ'),
(450, 'ANA CLÁUDIA ROSA', 'anaclaudiarosa@gmail.com', '18387', 'GO', 'ANA CLÁUDIA (18387)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-87', '071.540.658-26', '(62) 98342-1111', 'SALA VERMELHA', '9369', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIS3lnaVskqzow3-Q'),
(451, 'ANALICE ALMEIDA ANDRADE', 'analice.a3@gmail.com', '19773', 'GO', 'ANALICE ALMEIDA (19773)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-88', '037.392.921-80', '(62) 99166-1551', 'CORREDOR', '14217', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFUwYTN6NDC9xt56Q'),
(452, 'ANDRIELLE MARCIA LEAL FERREIRA ARANTES', 'draandriellepediatra@gmail.com', '30053', 'GO', 'ANDRIELLE MARCIA (30053)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-130', '024.821.481-03', '(63) 99986-4703', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIUW6LYFCtNCnGTpw'),
(453, 'ANTÔNIO FERNANDO DE MENDONÇA', 'afmpediatra@gmail.com', '3428', 'GO', 'ANTÔNIO FERNANDO (3428)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '166.317.141-68', '(62) 98292-8562', 'PORTA', '1621', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFY4p-r6nrApQ0sEQ'),
(454, 'AUGUSTO CESAR MACHADO', 'augustoneonato@gmail.com', '21178', 'GO', 'AUGUSTO CESAR (21178)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-89', '526.169.754-91', '(62) 99902-1967', 'SALA VERMELHA', '10772', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFagxRUyJJPIhZTLg'),
(455, 'BÁRBARA MARIA BIAGE TEIXEIRA', 'barbarabiage@hotmail.com', '20263', 'GO', 'BÁRBARA BIAGE (20263)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-90', '037.363.321-14', '(61) 99251-0366', 'SALA VERMELHA; CORREDOR; PORTA', '12442', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFcglDhz2me8CgLUQ'),
(456, 'BEATRIZ FERREIRA CARVALHO', 'biacarvalho07@outlook.com', '23746', 'GO', 'BEATRIZ CARVALHO (23746)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-130', '054.687.501-71', '(62) 98313-8333', 'PORTA; CORREDOR', '16020', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFeTgSRV9SHzdvM8A'),
(457, 'BRUNA EUGENIO HORBYLON', 'bruna_horbylon@hotmail.com', '20296', 'GO', 'BRUNA HORBYLON (20296)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-90', '034.008.221-67', '(62) 98216-1818', 'PORTA; CORREDOR', '16914', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFg4Z9dKnHI3jxLmA'),
(458, 'CAMILA PEDATELLA JAIME', 'camilapedatella@gmail.com', '23471', 'GO', 'CAMILA PEDATELLA (23471)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-91', '043.013.841-54', '(62) 99298-4263', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFirosMvVGCDZlMaQ'),
(459, 'CAROLINE MENDES SANTOS', 'mendescaroline777@gmail.com', '23656', 'GO', 'CAROLINE MENDES (23656)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-91', '013.220.411-80', '(62) 99319-7168', 'PORTA; CORREDOR', '?', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFkcUmXmaIKRDErXg'),
(460, 'DARLÔ PERES DOS SANTOS FILHO', 'drdarlopres@gmail.com', '8021', 'GO', 'DARLÔ PERES (8021)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-92', '287.422.731-53', '(62) 99684-9761', 'PORTA', '?', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFmiP-gKAvNqe3Pgw'),
(461, 'DÉBORA ALVES DE OLIVEIRA AGUIAR', 'x', '20229', 'GO', 'DÉBORA AGUIAR (20229)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-93', '027.108.501-09', 'x', 'PORTA; CORREDOR', '14715', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFohguolKLmMmxTow'),
(462, 'DIULY CAROLINE RIBEIRO', 'diulycaroline@hotmail.com', '25546', 'GO', 'DIULY RIBEIRO (25546)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-94', '756.987.901-59', '(62) 99625-3375', 'PORTA', '17164', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIW1ALG7-a2pdJSew'),
(463, 'ELANICE COSTA TORRES', 'elanicetorres@yahoo.com.br', '30588', 'GO', 'ELANICE COSTA (30588)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-95', '823.142.761-91', '(61) 99317-0087', 'SALA VERMELHA', '16633', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIYj9i7GTc0JxS86A'),
(464, 'ERIKA CRISTINA VIEIRA OLIVEIRA XIMENES BELO', 'x', '10216', 'GO', 'ERIKA BELO (10216)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-96', '935.395.5017- 8', 'x', 'SALA VERMELHA; CORREDOR', '10263', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFujnzhRx4pU0kgAg'),
(465, 'EVERTON SOUSA DE PONTES', 'everton_pontes@yahoo.com', '20224', 'GO', 'EVERTON SOUSA (20224)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-97', '006.605.521-08', '(64) 99927-0387', 'SALA VERMELHA; CORREDOR; PORTA', '14201', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIa28NSE8eQNca3Lg'),
(466, 'FAUSTO CARLOS DORNINGER', 'faustodorninger@gmail.com', '28738', 'GO', 'FAUSTO CARLOS (28738)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-130', '868.289.081-04', '(11) 97313-9662', 'SALA VERMELHA', '15366', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNFyRebfVQwMSLuxjA'),
(467, 'FERNANDA PIRES MUNIZ', 'fepiresmuniz@gmail.com', '21882', 'GO', 'FERNANDA PIRES (21882)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-98', '937.766.241-91', '(62) 98198-2807', 'PORTA; CORREDOR', '11384', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIct8rTVCgOOYJZCA'),
(468, 'GABRIELA CAMPOS FURLAN', 'gabrielacfurlan@gmail.com', '29693', 'GO', 'GABRIELA FURLAN (29693)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-99', '366.829.848-39', '(62) 99378-2136', 'PORTA', '17176', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIf_GRtAR4VH-CSdQ'),
(469, 'GABRIELA DA SILVA TEIXEIRA', 'gabrielateixs@gmail.com', '29240', 'GO', 'GABRIELA TEIXEIRA (29240)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-100', '023.578.071-56', '(62) 98115-4646', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIhF6j1Uo2lXZBPGA'),
(470, 'GABRIELLA JAIME VIEIRA', 'gabriellajaime@outlook.com', '24531', 'GO', 'GABRIELLA JAIME (24531)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-101', '040.184.441-25', '(62) 98133-8668', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIjgoa7t32p26qqoQ'),
(471, 'GISELLE DA COSTA SILVA', 'gisellecosta07@gmail.com', '18368', 'GO', 'GISELLE SILVA (18368)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-102', '010.072.901-02', '(62) 99930-9501', 'PORTA; CORREDOR', '15171', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIlsvenzGquh1uCug'),
(472, 'INAJÁ DE FIGUEIREDO MARTINS ESCARIÃO', 'inajaescariao@hotmail.com', '17653', 'GO', 'INAJÁ ESCARIÃO (17653)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-130', '030.627.811-14', '(64) 999772470', 'PORTA; CORREDOR', '?', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIn_3fnsUUcjkwTyw'),
(473, 'IRENE RIBEIRO MACHADO', 'irene.ribeiro-@hotmail.com', '6698', 'GO', 'IRENE RIBEIRO (6698)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-103', '240.038.401-00', '(62) 99922-1981', 'CORREDOR', '1983', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIp2sW3TW_7n-dr9w'),
(474, 'ISABELA BIANCHINI COSTA E SILVA', 'isabela_bianchini@hotmail.com', '27163', 'GO', 'ISABELA BIACHINI (27163)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-104', ' 701.674.281-44', '(62) 98230-4175', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNF9l91XMHisrVk7Cg'),
(475, 'ISABELLA DA MATA VILELA', 'med.isabellavilela@gmail.com', '16652', 'GO', 'ISABELA VILELA (16652)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-105', '025.868.421-62', '(62) 99968-8486', 'CORREDOR', '16652', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIslA8Tac6pf_xZxg'),
(476, 'ISABELLA RODRIGUES MENDONÇA', 'irmedicina@gmail.com', '26005', 'GO', 'ISABELLA MENDONÇA (26005)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-106', '046.283.461-19', '(62) 99701-3301', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIvjOYMWDXZFpVaxw'),
(477, 'JAMES NOGUEIRA PIMENTA', 'jnp0603@yahoo.com.br', '10062', 'GO', 'JAMES PIMENTA (10062)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-107', '796.161.351-04', '(62) 982616731', 'SALA VERMELHA; CORREDOR; PORTA', '1565', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIxCCYdBJWgZhb5YQ'),
(478, 'JAQUELINE MENDONÇA GONDIM', 'jaquelinemendoncagondim@gmail.com', '23421', 'GO', 'JAQUELINE GONDIM (23421)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-108', '031.271.301-04', '(62) 99153-3396', 'PORTA', '?', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNI01QypCjPgf-CfwQ'),
(479, 'JORDANA CARLA CABRAL E SILVA', 'jordanacarla@hotmail.com', '20932', 'GO', 'JORDANA CABRAL (20932)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-108', '024.984.661-69', '(62) 98557-7020', 'PORTA; CORREDOR', '?', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNI2cRiRcbILRfgIGA'),
(480, 'JULIANA BOSI PEREIRA CARDOSO', 'jbpcardoso@terra.com.br', '8951', 'GO', 'JULIANA BOSI (8951)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-109', '809.099.221-87', '(62) 99910-9926', 'PORTA; CORREDOR', '4889', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNI5bIKBCcawc9eWnQ'),
(481, 'LARISSA PFRIMER CAPUZZO', 'larissapfrimer@gmail.com', '18720', 'GO', 'LARISSA PFRIMER (18720)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-110', '032.235.981-38', '(62) 99656-4883', 'SALA VERMELHA; CORREDOR; PORTA', '11351', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNIGxlcA5U5zt9rVLg'),
(482, 'LEONARDO FARIA RIBEIRO', 'leofribeiro007@gmail.com', '10947', 'GO', 'LEONARDO FARIA (10947)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-111', '937.241.101-97', '(62) 98137-6560', 'SALA VERMELHA; CORREDOR', '10761', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNI7ksLFjWz2GQn1_w'),
(483, 'LUDMILA RUYS LOPES JASBICK', 'draludjasbick@gmail.com', '20831', 'GO', 'LUDMILA JASBICK (20831)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-112', '086.083.827-76', '(62) 99959-5794', 'PORTA', '14659', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNI9gl6V2SIZJASXBw'),
(484, 'MARCELO RODRIGUES SUGURI', 'sugurimarcelo@live.com', '17877', 'GO', 'MARCELO SUGURI (17877)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-113', '012.102.961-10', '(61) 98197-8611', 'PORTA', '16235', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNI__0mJLskOrSdXYw'),
(485, 'MARIANE MARTINS FERREIRA', 'ma_martinsf@hotmail.com', '18392', 'GO', 'MARIANE FERREIRA (18392)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-114', '023.003.521-33', '(64) 99623-1990', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJBxJqN36K7BO_LIg'),
(486, 'MATTEUS DI VILELA REBOUÇAS', 'matteus21@msn.com', '25036', 'GO', 'MATTEUS REBOUÇAS (25036)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-115', '027.599.481-37', '(62) 99995-4442', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJD0l_Olp04tZls0w'),
(487, 'NATAL VIEIRA RAMOS JÚNIOR', 'natalvrjunior@gmail.com', '17203', 'GO', 'NATAL VIEIRA (17203)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-116', '467.747.691-87', '(62) 99627-2467', 'PORTA', '17203', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJFmul-RW-JexC7pQ'),
(488, 'PABLO SANTIAGO DE FREITAS FERNANDES', 'psantiagoff@hotmail.com', '20141', 'GO', 'PABLO FERNANDES (20141)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-117', '915.916.861-72', '(62) 98429-4613', 'PORTA', '12910', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJHIjyRxYRQG1ImVw'),
(489, 'PAMELA BRITO SEBA', 'pam_seba@hotmail.com', '22972', 'GO', 'PAMELA BRITO (22972)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-118', '061.632.086-84', '(62) 98115-3091', 'SALA VERMELHA; CORREDOR', '11688', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJKVb23I676Oyz9Lw'),
(490, 'PAULA DAHER RASSI GUIMARÃES', 'pauladaherr@gmail.com', '28761', 'GO', 'PAULA DAHER (28761)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-119', '015.731.421-90', '(62) 99661-2747', 'PORTA', 'RES', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJNlUaBjP9AnpA1kw'),
(491, 'PAULA DANIELLI DA SILVA SOUZA', 'pauladaniellis@gmail.com', '16779', 'GO', 'PAULA DANIELLI (16779)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-120', '007.696.081-16', '(62) 98110-0627', 'PORTA', '15889', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNEuiiIfz_y02FjzFw'),
(492, 'PAULA ROBERTA MARÇAL MAIA', 'paulamaiarv@gmail.com', '23456', 'GO', 'PAULA ROBERTA (23456)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-121', '735.418.931-68', '(61) 99600-6161', 'PORTA; CORREDOR', '17581', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJPuTZeLpzViGG39Q'),
(493, 'POLYANA OLIVEIRA SANTOS', 'polyolivers@gmail.com', '21239', 'GO', 'POLYANA SANTOS (21239)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-121', '035.525.931-10', '(62) 98135-4274', 'PORTA; CORREDOR', '?', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJR3ta93dwjcRnApA'),
(494, 'PRISCILA DE OLIVEIRA LOPES', 'priprilopes06@hotmail.com', '17281', 'GO', 'PRISCILA LOPES (17281)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-122', '025.279.241-66', '(62) 99620-0020', 'PORTA', '11934', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJXi8y16lHQNJuxeg'),
(495, 'RAISA GONÇALVES DE SOUSA', 'raisa_acinomnx@hotmail.com', '29506', 'GO', 'RAISA GONÇALVES (29506)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-123', '044.553.591-17', '(66) 99659-5985', 'CORREDOR', '15608', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJXi8y16lHQNJuxeg'),
(496, 'RENAN DE MACEDO CARVALHO', 'renangyncarvalho@hotmail.com', '1338', 'GO', 'RENAN CARVALHO (1338)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-123', '147.291.792-49', '(62) 99315-8333', 'PORTA', '16336', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJaLAb8v-jCABkC9g'),
(497, 'RODRIGO CAETANO DE ALMEIDA', 'amc.le@hotmail.com', '6445', 'GO', 'RODRIGO CAETANO (6445)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-124', '438.258.931-20', '(62) 99215-4900', 'SALA VERMELHA; CORREDOR', '2441', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJdsOvvgx3bvueGwQ'),
(498, 'STÉFANNY CAROLINE GUIMARÃES RAMOS', 'stefannycgr@gmail.com', '23303', 'GO', 'STÉFANNY CAROLINE (23303)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-125', '042.943.551-74', '(62) 981720448', 'PORTA; CORREDOR', '17667', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJghPsb8kuxeOq6sw'),
(499, 'STÉPHANE RIBEIRO SEIXAS', 'stephane.seixas@hotmail.com', '23194', 'GO', 'STÉPHANE RIBEIRO (23194)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-126', '749.887.351-68', '(62) 99629-0863', 'PORTA', '17169', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJjKaSpI_GYcWB3rg'),
(500, 'SUSANA HAGE REYES', 'susana07hage@gmail.com', '14112', 'GO', 'SUSANA HAGE (14112)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-127', '704.888.271-91', '(62) 99821-9690', 'PORTA', '14094', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJmseBJNgVDEEqXAg'),
(501, 'THAÍS SILVA FERNANDES', 't.silvafernandes93@gmail.com', '25589', 'GO', 'THAÍS SILVA (25589)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-128', '043.061.011-42', '(62) 98103-2132', 'PORTA; CORREDOR', '17443', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJpFI8GBhrPTdgpig'),
(502, 'WYARA TALITA CARVALHO DE FREITAS', 'wyara_talita@me.com', '18255', 'GO', 'WYARA TALITA (18255)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-129', '994.377.671-49', '(62) 98296-0023', 'SALA VERMELHA; CORREDOR; PORTA', '15511', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJspXAgnn9NsRj_qA'),
(503, 'YHASMIN OLIVEIRA GONDIM MORAES', 'yhasmin.uni3@gmail.com', '20070', 'GO', 'YHASMIN GONDIM (20070)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-130', '032.736.901-94', '(62) 98104-7030', 'PORTA; CORREDOR', '12074', 'confirmado', 'https://1drv.ms/x/s!AsBUefPyS81SnNJuVT99E5HDSN-Y-A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcao`
--

CREATE TABLE `funcao` (
  `ID` int(11) NOT NULL,
  `funcao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `funcao`
--

INSERT INTO `funcao` (`ID`, `funcao`) VALUES
(1, 'AMBULATÓRIO'),
(2, 'DIARISTA'),
(3, 'GASTRO'),
(4, 'PLANTÃO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

CREATE TABLE `horario` (
  `ID` int(11) NOT NULL,
  `horario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `horario`
--

INSERT INTO `horario` (`ID`, `horario`) VALUES
(1, '07:00 - 10:00'),
(2, '07:00 - 13:00'),
(3, '13:00 - 19:00'),
(4, '19:00 - 01:00'),
(5, '01:00 - 07:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `troca`
--

CREATE TABLE `troca` (
  `submission_date` varchar(20) NOT NULL,
  `setor` varchar(100) DEFAULT NULL,
  `data_plantao` varchar(100) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `fixo` varchar(100) DEFAULT NULL,
  `plantonista` varchar(100) DEFAULT NULL,
  `substituto` varchar(100) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consolidado_agosto2023`
--
ALTER TABLE `consolidado_agosto2023`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `consolidado_setembro2023`
--
ALTER TABLE `consolidado_setembro2023`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `corpo_clinico`
--
ALTER TABLE `corpo_clinico`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `troca`
--
ALTER TABLE `troca`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consolidado_agosto2023`
--
ALTER TABLE `consolidado_agosto2023`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `consolidado_setembro2023`
--
ALTER TABLE `consolidado_setembro2023`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `corpo_clinico`
--
ALTER TABLE `corpo_clinico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `troca`
--
ALTER TABLE `troca`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
