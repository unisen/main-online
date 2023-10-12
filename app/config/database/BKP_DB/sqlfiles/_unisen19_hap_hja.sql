--
-- Banco de dados: `unisen19_hap_hja`
--
CREATE DATABASE IF NOT EXISTS `unisen19_hap_hja` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `unisen19_hap_hja`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `consolidado_abril`
--

CREATE TABLE `consolidado_abril` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(500) NOT NULL,
  `CRM` varchar(20) NOT NULL,
  `EMPRESA` varchar(300) NOT NULL,
  `FUNCAO` varchar(100) NOT NULL,
  `HORARIO` varchar(200) NOT NULL,
  `A` varchar(20) NOT NULL,
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
  `TOTAL_DDS` varchar(30) NOT NULL,
  `TOTAL_FDS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `FUNCAO` varchar(50) NOT NULL,
  `confirmacao` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL,
  `SUBMISSION_DATE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `corpo_clinico`
--

INSERT INTO `corpo_clinico` (`ID`, `NOME_COMPLETO`, `EMAIL`, `CRM`, `UF`, `ID_ESCALA`, `EMPRESA_NOME`, `CNPJ`, `CPF`, `FUNCAO`, `confirmacao`, `status`, `SUBMISSION_DATE`) VALUES
(1, 'ROSANA DOS SANTOS VIEIRA CRUZ', 'rosanasantosvieira@gmail.com', '28467', 'GO', 'ROSANA CRUZ (28467)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '622.329.403-49', '', '63bf3c0f63af6', 'confirmado', '11/01/2023 19:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dezembro`
--

CREATE TABLE `dezembro` (
  `ID` int(11) NOT NULL,
  `Visible` varchar(1) NOT NULL,
  `bgcolor` varchar(30) NOT NULL,
  `Hora_Func` varchar(70) NOT NULL,
  `D1` varchar(70) DEFAULT NULL,
  `D2` varchar(70) DEFAULT NULL,
  `D3` varchar(70) DEFAULT NULL,
  `D4` varchar(70) DEFAULT NULL,
  `D5` varchar(70) DEFAULT NULL,
  `D6` varchar(70) DEFAULT NULL,
  `D7` varchar(70) DEFAULT NULL,
  `D8` varchar(70) DEFAULT NULL,
  `D9` varchar(70) DEFAULT NULL,
  `D10` varchar(70) DEFAULT NULL,
  `D11` varchar(70) DEFAULT NULL,
  `D12` varchar(70) DEFAULT NULL,
  `D13` varchar(70) DEFAULT NULL,
  `D14` varchar(70) DEFAULT NULL,
  `D15` varchar(70) DEFAULT NULL,
  `D16` varchar(70) DEFAULT NULL,
  `D17` varchar(70) DEFAULT NULL,
  `D18` varchar(70) DEFAULT NULL,
  `D19` varchar(70) DEFAULT NULL,
  `D20` varchar(70) DEFAULT NULL,
  `D21` varchar(70) DEFAULT NULL,
  `D22` varchar(70) DEFAULT NULL,
  `D23` varchar(70) DEFAULT NULL,
  `D24` varchar(70) DEFAULT NULL,
  `D25` varchar(70) DEFAULT NULL,
  `D26` varchar(70) DEFAULT NULL,
  `D27` varchar(70) DEFAULT NULL,
  `D28` varchar(70) DEFAULT NULL,
  `D29` varchar(70) DEFAULT NULL,
  `D30` varchar(70) DEFAULT NULL,
  `D31` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `dezembro`
--

INSERT INTO `dezembro` (`ID`, `Visible`, `bgcolor`, `Hora_Func`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`, `D9`, `D10`, `D11`, `D12`, `D13`, `D14`, `D15`, `D16`, `D17`, `D18`, `D19`, `D20`, `D21`, `D22`, `D23`, `D24`, `D25`, `D26`, `D27`, `D28`, `D29`, `D30`, `D31`) VALUES
(1, '1', '#9BC2E6_#000000', '07:00 - 13:00 (LIDER)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'UBIRATAN NETO (18052)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'HUMBERTO PIRES (27097)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'UBIRATAN NETO (18052)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'HUMBERTO PIRES (27097)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)'),
(2, '1', '#9BC2E6_#000000', '07:00 - 13:00 (LIDER)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'ELISE OLIVEIRA (26568)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'ELISE OLIVEIRA (26568)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)'),
(3, '1', '#9BC2E6_#000000', '07:00 - 13:00 (LIDER)', 'FERNANDO VIEIRA (14167)', 'ELISE OLIVEIRA (26568)', 'GLAUCIA SILVADO (15370)', 'ISADORA OLIVEIRA (27282)', 'GUILHERME MERCES (24688)', 'ELISE OLIVEIRA (26568)', 'FERNANDO VIEIRA (14167)', 'FERNANDO VIEIRA (14167)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'LUAN TEIXEIRA (25986)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'FERNANDO VIEIRA (14167)', 'FERNANDO VIEIRA (14167)', 'ELISE OLIVEIRA (26568)', 'GLAUCIA SILVADO (15370)', 'ISADORA OLIVEIRA (27282)', 'GUILHERME MERCES (24688)', 'ELISE OLIVEIRA (26568)', 'FERNANDO VIEIRA (14167)', 'FERNANDO VIEIRA (14167)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'LUAN TEIXEIRA (25986)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'FERNANDO VIEIRA (14167)', 'FERNANDO VIEIRA (14167)', 'ELISE OLIVEIRA (26568)', 'GLAUCIA SILVADO (15370)'),
(4, '1', '#9BC2E6_#000000', '07:00 - 13:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(5, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'SHAYEEN SANDES (21861)', 'LARISSA CRUZEIRO (24965)', 'MARIANE CLEMENTINO (28546)', 'SAYONARA PANIAGO (23800)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'ISADORA OLIVEIRA (27282)', 'MARIANE CLEMENTINO (28546)', 'SAYONARA PANIAGO (23800)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'LARISSA CRUZEIRO (24965)', 'MARIANE CLEMENTINO (28546)', 'SAYONARA PANIAGO (23800)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'ISADORA OLIVEIRA (27282)', 'MARIANE CLEMENTINO (28546)', 'SAYONARA PANIAGO (23800)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'LARISSA CRUZEIRO (24965)', 'MARIANE CLEMENTINO (28546)'),
(22, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'ISADORA OLIVEIRA (27282)', 'GABRIELA RIBEIRO (26332)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'LORENA GALVANI (29117)', 'THAÍS COUTO (28754)', 'ELISE OLIVEIRA (26568)', 'ISADORA OLIVEIRA (27282)', 'GABRIELA RIBEIRO (26332)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'LORENA GALVANI (29117)', 'MARCUS TEIXEIRA (24323)', 'MARCUS TEIXEIRA (24323)', 'ISADORA OLIVEIRA (27282)', 'GABRIELA RIBEIRO (26332)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'LORENA GALVANI (29117)', 'THAÍS COUTO (28754)', 'ELISE OLIVEIRA (26568)', 'ISADORA OLIVEIRA (27282)', 'GABRIELA RIBEIRO (26332)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'LORENA GALVANI (29117)', 'MARCUS TEIXEIRA (24323)', 'MARCUS TEIXEIRA (24323)', 'ISADORA OLIVEIRA (27282)', 'GABRIELA RIBEIRO (26332)', 'ISABELLA SILVA (26357)'),
(23, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'GIOVANNA ROCHA (26148)', 'ADRIANA BRITO (22640)', 'BRENDA MENDONÇA (29125)', 'WILSON CALIPSE (23945)', 'ISADORA OLIVEIRA (27282)', 'JESSIKA REZENDE (26663)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'ADRIANA BRITO (22640)', 'BRENDA MENDONÇA (29125)', 'SHAYEEN SANDES (21861)', 'ISADORA OLIVEIRA (27282)', 'JESSIKA REZENDE (26663)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'ADRIANA BRITO (22640)', 'BRENDA MENDONÇA (29125)', 'WILSON CALIPSE (23945)', 'ISADORA OLIVEIRA (27282)', 'JESSIKA REZENDE (26663)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'ADRIANA BRITO (22640)', 'BRENDA MENDONÇA (29125)', 'SHAYEEN SANDES (21861)', 'ISADORA OLIVEIRA (27282)', 'JESSIKA REZENDE (26663)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'ADRIANA BRITO (22640)', 'BRENDA MENDONÇA (29125)'),
(24, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'ELISE OLIVEIRA (26568)', 'ZENISON JUNIOR (26872)', 'JULIANA DE MACEDO (30104)', 'JULIANA DE MACEDO (30104)', 'MATEUS LEITE (16988)', 'ADRIANA BRITO (22640)', 'ADRIANA BRITO (22640)', 'ELISE OLIVEIRA (26568)', 'ZENISON JUNIOR (26872)', 'LINA BORGES (28717)', 'ISABELLA MAGALHÃES (29126)', 'MATEUS LEITE (16988)', 'ADRIANA BRITO (22640)', 'ADRIANA BRITO (22640)', 'ELISE OLIVEIRA (26568)', 'ZENISON JUNIOR (26872)', 'JULIANA DE MACEDO (30104)', 'JULIANA DE MACEDO (30104)', 'MATEUS LEITE (16988)', 'ADRIANA BRITO (22640)', 'ADRIANA BRITO (22640)', 'ELISE OLIVEIRA (26568)', 'ZENISON JUNIOR (26872)', 'LINA BORGES (28717)', 'ISABELLA MAGALHÃES (29126)', 'MATEUS LEITE (16988)', 'ADRIANA BRITO (22640)', 'ADRIANA BRITO (22640)', 'ELISE OLIVEIRA (26568)', 'ZENISON JUNIOR (26872)', 'JULIANA DE MACEDO (30104)'),
(25, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'ISABELLA SILVA (26357)', 'PATRÍCIA GOMES (24666)', 'SAYONARA PANIAGO (23800)', 'XXXXX', 'GIOVANNA ROCHA (26148)', 'ZENISON JUNIOR (26872)', 'LORENA GALVANI (29117)', 'ISABELLA SILVA (26357)', 'PATRÍCIA GOMES (24666)', 'GABRIELA VILELA (25433)', 'XXXXX', 'GIOVANNA ROCHA (26148)', 'ZENISON JUNIOR (26872)', 'LORENA GALVANI (29117)', 'ISABELLA SILVA (26357)', 'PATRÍCIA GOMES (24666)', 'SAYONARA PANIAGO (23800)', 'XXXXX', 'GIOVANNA ROCHA (26148)', 'ZENISON JUNIOR (26872)', 'LORENA GALVANI (29117)', 'ISABELLA SILVA (26357)', 'PATRÍCIA GOMES (24666)', 'GABRIELA VILELA (25433)', 'XXXXX', 'GIOVANNA ROCHA (26148)', 'ZENISON JUNIOR (26872)', 'LORENA GALVANI (29117)', 'ISABELLA SILVA (26357)', 'PATRÍCIA GOMES (24666)', 'SAYONARA PANIAGO (23800)'),
(26, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'MATEUS LEITE (16988)', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'CAIQUE OTTO (25797)', 'ISADORA OLIVEIRA (27282)', 'AMANDA ALVES (27007)', 'MATEUS LEITE (16988)', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'AMANDA ALVES (27007)', 'ISADORA OLIVEIRA (27282)', 'AMANDA ALVES (27007)', 'MATEUS LEITE (16988)', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'CAIQUE OTTO (25797)', 'ISADORA OLIVEIRA (27282)', 'AMANDA ALVES (27007)', 'MATEUS LEITE (16988)', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'AMANDA ALVES (27007)', 'ISADORA OLIVEIRA (27282)', 'AMANDA ALVES (27007)', 'MATEUS LEITE (16988)', 'MATEUS LEITE (16988)', 'XXXXX'),
(27, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'MIGUEL NETO (23780)', 'JESSIKA REZENDE (26663)', 'XXXXX', 'XXXXX', 'ANDRESSA COZER (28580)', 'MARIANA BICALHO (29363)', 'XXXXX', 'ANDRESSA COZER (28580)', 'SHAYEEN SANDES (21861)', 'XXXXX', 'XXXXX', 'ANDRESSA COZER (28580)', 'MARIANA BICALHO (29363)', 'XXXXX', 'MIGUEL NETO (23780)', 'JESSIKA REZENDE (26663)', 'XXXXX', 'XXXXX', 'ANDRESSA COZER (28580)', 'MARIANA BICALHO (29363)', 'XXXXX', 'ANDRESSA COZER (28580)', 'SHAYEEN SANDES (21861)', 'XXXXX', 'XXXXX', 'ANDRESSA COZER (28580)', 'MARIANA BICALHO (29363)', 'XXXXX', 'MIGUEL NETO (23780)', 'JESSIKA REZENDE (26663)', 'XXXXX'),
(28, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(29, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(30, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(31, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, '1', '#9BC2E6_#000000', '13:00 - 19:00 (LIDER)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'WALLACE PINHEIRO (22395)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'HUMBERTO PIRES (27097)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'WALLACE PINHEIRO (22395)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'HUMBERTO PIRES (27097)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)'),
(62, '1', '#9BC2E6_#000000', '13:00 - 19:00 (LIDER)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'ELISE OLIVEIRA (26568)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'ELISE OLIVEIRA (26568)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)'),
(63, '1', '#9BC2E6_#000000', '13:00 - 19:00 (LIDER)', 'ELISE OLIVEIRA (26568)', 'LARISSA CRUZEIRO (24965)', 'CARLOS BICALHO (29610)', 'GLAUCIA SILVADO (15370)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'GUILHERME MERCES (24688)', 'ELISE OLIVEIRA (26568)', 'LARISSA CRUZEIRO (24965)', '', 'LUAN TEIXEIRA (25986)', 'ELISE OLIVEIRA (26568)', 'MARCUS TEIXEIRA (24323)', 'GUILHERME MERCES (24688)', 'ELISE OLIVEIRA (26568)', 'LARISSA CRUZEIRO (24965)', 'CARLOS BICALHO (29610)', 'GLAUCIA SILVADO (15370)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'GUILHERME MERCES (24688)', 'ELISE OLIVEIRA (26568)', 'LARISSA CRUZEIRO (24965)', '', 'LUAN TEIXEIRA (25986)', 'ELISE OLIVEIRA (26568)', 'MARCUS TEIXEIRA (24323)', 'GUILHERME MERCES (24688)', 'ELISE OLIVEIRA (26568)', 'LARISSA CRUZEIRO (24965)', 'CARLOS BICALHO (29610)'),
(64, '1', '#9BC2E6_#000000', '13:00 - 19:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(65, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'LARISSA CRUZEIRO (24965)', 'ISADORA OLIVEIRA (27282)', 'TARQUINIO JUNIOR (26698)', 'LARISSA ARANTES (24013)', 'LORENA GALVANI (29117)', 'ROGERIO SANTANA (12176)', 'ROGERIO SANTANA (12176)', 'LARISSA CRUZEIRO (24965)', 'NATALIA SARDINHA ()', 'TARQUINIO JUNIOR (26698)', 'ISABELLA MAGALHÃES (29126)', 'LORENA GALVANI (29117)', 'ROGERIO SANTANA (12176)', 'ROGERIO SANTANA (12176)', 'LARISSA CRUZEIRO (24965)', 'ISADORA OLIVEIRA (27282)', 'TARQUINIO JUNIOR (26698)', 'LARISSA ARANTES (24013)', 'LORENA GALVANI (29117)', 'ROGERIO SANTANA (12176)', 'ROGERIO SANTANA (12176)', 'LARISSA CRUZEIRO (24965)', 'NATALIA SARDINHA ()', 'TARQUINIO JUNIOR (26698)', 'ISABELLA MAGALHÃES (29126)', 'LORENA GALVANI (29117)', 'ROGERIO SANTANA (12176)', 'ROGERIO SANTANA (12176)', 'LARISSA CRUZEIRO (24965)', 'ISADORA OLIVEIRA (27282)', 'TARQUINIO JUNIOR (26698)'),
(82, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'MARIANE CLEMENTINO (28546)', 'ROSAYNNY FUMEIRO (28600)', 'ISADORA OLIVEIRA (27282)', 'MARIANE CLEMENTINO (28546)', 'ELISE OLIVEIRA (26568)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'MARIANE CLEMENTINO (28546)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'ELISE OLIVEIRA (26568)', 'MARCUS TEIXEIRA (24323)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'MARIANE CLEMENTINO (28546)', 'ROSAYNNY FUMEIRO (28600)', 'ISADORA OLIVEIRA (27282)', 'MARIANE CLEMENTINO (28546)', 'ELISE OLIVEIRA (26568)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'MARIANE CLEMENTINO (28546)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'ELISE OLIVEIRA (26568)', 'MARCUS TEIXEIRA (24323)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'MARIANE CLEMENTINO (28546)'),
(83, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'ISABELLA SILVA (26357)', 'ZENISON JUNIOR (26872)', 'MARIANA BICALHO (29363)', 'LUIZ MESQUITA (20513)', 'MATEUS LEITE (16988)', 'ZENISON JUNIOR (26872)', 'SAMUEL GALVÃO (25522)', 'ISABELLA SILVA (26357)', 'ZENISON JUNIOR (26872)', 'MARIANA BICALHO (29363)', 'CAROLINE BILEGO (26449)', 'MATEUS LEITE (16988)', 'ZENISON JUNIOR (26872)', 'SAMUEL GALVÃO (25522)', 'ISABELLA SILVA (26357)', 'ZENISON JUNIOR (26872)', 'MARIANA BICALHO (29363)', 'LUIZ MESQUITA (20513)', 'MATEUS LEITE (16988)', 'ZENISON JUNIOR (26872)', 'SAMUEL GALVÃO (25522)', 'ISABELLA SILVA (26357)', 'ZENISON JUNIOR (26872)', 'MARIANA BICALHO (29363)', 'CAROLINE BILEGO (26449)', 'MATEUS LEITE (16988)', 'ZENISON JUNIOR (26872)', 'SAMUEL GALVÃO (25522)', 'ISABELLA SILVA (26357)', 'ZENISON JUNIOR (26872)', 'MARIANA BICALHO (29363)'),
(84, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'GIOVANNA ROCHA (26148)', 'MARIANE CLEMENTINO (28546)', 'XXXXX', 'XXXXX', 'ROGERIO SANTANA (12176)', 'ADRIANA BRITO (22640)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'MARIANE CLEMENTINO (28546)', 'GABRIELA VILELA (25433)', 'XXXXX', 'ROGERIO SANTANA (12176)', 'ADRIANA BRITO (22640)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'MARIANE CLEMENTINO (28546)', 'XXXXX', 'XXXXX', 'ROGERIO SANTANA (12176)', 'ADRIANA BRITO (22640)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'MARIANE CLEMENTINO (28546)', 'GABRIELA VILELA (25433)', 'XXXXX', 'ROGERIO SANTANA (12176)', 'ADRIANA BRITO (22640)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'MARIANE CLEMENTINO (28546)', 'XXXXX'),
(85, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'BRENDA MENDONÇA (29125)', 'ELISE OLIVEIRA (26568)', 'XXXXX', 'XXXXX', 'THAÍS ALVES (28754)', 'JESSIKA SANDES (26663)', 'LORENA GALVANI (29117)', 'BRENDA MENDONÇA (29125)', 'ELISE OLIVEIRA (26568)', 'XXXXX', 'XXXXX', 'THAÍS ALVES (28754)', 'JESSIKA SANDES (26663)', 'LORENA GALVANI (29117)', 'BRENDA MENDONÇA (29125)', 'ELISE OLIVEIRA (26568)', 'XXXXX', 'XXXXX', 'THAÍS ALVES (28754)', 'JESSIKA SANDES (26663)', 'LORENA GALVANI (29117)', 'BRENDA MENDONÇA (29125)', 'ELISE OLIVEIRA (26568)', 'XXXXX', 'XXXXX', 'THAÍS ALVES (28754)', 'JESSIKA SANDES (26663)', 'LORENA GALVANI (29117)', 'BRENDA MENDONÇA (29125)', 'ELISE OLIVEIRA (26568)', 'XXXXX'),
(86, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'MARIANA BICALHO (29363)', 'THAÍS COUTO (28754)', 'XXXXX', 'XXXXX', 'ISABELLA SILVA (26357)', 'MARIANA BICALHO (29363)', 'ISADORA OLIVEIRA (27282)', 'MARIANA BICALHO (29363)', 'THAÍS COUTO (28754)', 'XXXXX', 'XXXXX', 'ISABELLA SILVA (26357)', 'MARIANA BICALHO (29363)', 'ISADORA OLIVEIRA (27282)', 'MARIANA BICALHO (29363)', 'THAÍS COUTO (28754)', 'XXXXX', 'XXXXX', 'ISABELLA SILVA (26357)', 'MARIANA BICALHO (29363)', 'ISADORA OLIVEIRA (27282)', 'MARIANA BICALHO (29363)', 'THAÍS COUTO (28754)', 'XXXXX', 'XXXXX', 'ISABELLA SILVA (26357)', 'MARIANA BICALHO (29363)', 'ISADORA OLIVEIRA (27282)', 'MARIANA BICALHO (29363)', 'THAÍS COUTO (28754)', 'XXXXX'),
(87, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(88, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(89, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(90, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(91, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(108, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(109, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(110, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(111, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(112, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(113, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(114, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(115, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(116, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(117, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(118, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(119, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(120, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(121, '1', '#305496_#FFFFFF', '19:00 - 01:00 (LIDER)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'WALLACE PINHEIRO (22395)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'ISADORA OLIVEIRA (27282)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'WALLACE PINHEIRO (22395)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'ISADORA OLIVEIRA (27282)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)'),
(122, '1', '#305496_#FFFFFF', '19:00 - 01:00 (LIDER)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'CARLOS BICALHO (29610)', 'HUMBERTO PIRES (27097)', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'MARILIA RODRIGUES (24537)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'HUMBERTO PIRES (27097)', '', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'GUILHERME MERCES (24688)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'CARLOS BICALHO (29610)', 'HUMBERTO PIRES (27097)', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'MARILIA RODRIGUES (24537)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'HUMBERTO PIRES (27097)', '', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'GUILHERME MERCES (24688)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'CARLOS BICALHO (29610)'),
(123, '1', '#305496_#FFFFFF', '19:00 - 01:00 (LIDER)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'WALLACE PINHEIRO (22395)', 'SAMUEL GALVÃO (25522)', 'HUMBERTO PIRES (27097)', 'CARLOS BICALHO (29610)', 'LARISSA CRUZEIRO (24965)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'LUAN TEIXEIRA (25986)', '', 'HUMBERTO PIRES (27097)', 'CARLOS BICALHO (29610)', 'LARISSA CRUZEIRO (24965)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'WALLACE PINHEIRO (22395)', 'SAMUEL GALVÃO (25522)', 'HUMBERTO PIRES (27097)', 'CARLOS BICALHO (29610)', 'LARISSA CRUZEIRO (24965)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'LUAN TEIXEIRA (25986)', '', 'HUMBERTO PIRES (27097)', 'CARLOS BICALHO (29610)', 'LARISSA CRUZEIRO (24965)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'WALLACE PINHEIRO (22395)'),
(124, '1', '#305496_#FFFFFF', '19:00 - 01:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(125, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(126, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(129, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(130, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(131, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(132, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(133, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(137, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'LIANA COUTO (25698)', 'LORENA GALVANI (29117)', 'CAROLINE BILEGO (26449)', 'GABRIELLA REIS (25438)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'GUILHERME MERCES (24688)', 'SAYONARA PANIAGO (23800)', 'LORENA GALVANI (29117)', 'MARIA SILVA (27307)', 'LIANA COUTO (25698)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'LORENA GALVANI (29117)', 'CAROLINE BILEGO (26449)', 'GABRIELLA REIS (25438)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'GUILHERME MERCES (24688)', 'SAYONARA PANIAGO (23800)', 'LORENA GALVANI (29117)', 'MARIA SILVA (27307)', 'LIANA COUTO (25698)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'LORENA GALVANI (29117)', 'CAROLINE BILEGO (26449)'),
(142, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'ALINE ESSADO (24052)', 'WILSON CALIPSE (23945)', 'MARIANA BICALHO (29363)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'TARQUINIO JUNIOR (26698)', 'LAURA GALVANI (18474)', 'WILSON CALIPSE (23945)', 'BEATRIZ PAIXAO (28573)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'TARQUINIO JUNIOR (26698)', 'ALINE ESSADO (24052)', 'WILSON CALIPSE (23945)', 'MARIANA BICALHO (29363)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'TARQUINIO JUNIOR (26698)', 'LAURA GALVANI (18474)', 'WILSON CALIPSE (23945)', 'BEATRIZ PAIXAO (28573)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'TARQUINIO JUNIOR (26698)', 'ALINE ESSADO (24052)', 'WILSON CALIPSE (23945)', 'MARIANA BICALHO (29363)'),
(143, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'BRENDA MENDONÇA (29125)', 'CAIQUE OTTO (25797)', 'SAYONARA PANIAGO (23800)', 'RENATA CAMILO ()', 'LINA BORGES (28717)', 'SAYONARA PANIAGO (23800)', 'FERNANDO FILHO (28410)', 'BRENDA MENDONÇA (29125)', 'CAIQUE OTTO (25797)', 'SAYONARA PANIAGO (23800)', 'MORENA MAIA (25241)', 'LINA BORGES (28717)', 'SAYONARA PANIAGO (23800)', 'BRENDA MENDONÇA (29125)', 'BRENDA MENDONÇA (29125)', 'CAIQUE OTTO (25797)', 'SAYONARA PANIAGO (23800)', 'RENATA CAMILO ()', 'LINA BORGES (28717)', 'SAYONARA PANIAGO (23800)', 'FERNANDO FILHO (28410)', 'BRENDA MENDONÇA (29125)', 'CAIQUE OTTO (25797)', 'SAYONARA PANIAGO (23800)', 'MORENA MAIA (25241)', 'LINA BORGES (28717)', 'SAYONARA PANIAGO (23800)', 'BRENDA MENDONÇA (29125)', 'BRENDA MENDONÇA (29125)', 'CAIQUE OTTO (25797)', 'SAYONARA PANIAGO (23800)'),
(144, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'HUMBERTO MENDES (27486)', 'GABRIELA VILELA (25433)', 'GABRIELA RIBEIRO (26332)', 'LINA BORGES (28717)', 'GLAUCIA SILVADO (15370)', 'GABRIELA VILELA (25433)', 'LINA BORGES (28717)', 'HUMBERTO MENDES (27486)', 'GABRIELA VILELA (25433)', 'GABRIELA RIBEIRO (26332)', 'CAROLINE BILEGO (26449)', 'GLAUCIA SILVADO (15370)', 'GABRIELA VILELA (25433)', 'LINA BORGES (28717)', 'HUMBERTO MENDES (27486)', 'GABRIELA VILELA (25433)', 'GABRIELA RIBEIRO (26332)', 'LINA BORGES (28717)', 'GLAUCIA SILVADO (15370)', 'GABRIELA VILELA (25433)', 'LINA BORGES (28717)', 'HUMBERTO MENDES (27486)', 'GABRIELA VILELA (25433)', 'GABRIELA RIBEIRO (26332)', 'CAROLINE BILEGO (26449)', 'GLAUCIA SILVADO (15370)', 'GABRIELA VILELA (25433)', 'LINA BORGES (28717)', 'HUMBERTO MENDES (27486)', 'GABRIELA VILELA (25433)', 'GABRIELA RIBEIRO (26332)'),
(145, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'MORENA MAIA (25241)', 'CAROLINE BILEGO (26449)', 'XXXXX', 'XXXXX', 'HUMBERTO MENDES (27486)', 'LIANA COUTO (25698)', 'GLAUCIA SILVADO (15370)', 'ISABELLA MAGALHÃES (29126)', 'CAROLINE BILEGO (26449)', 'XXXXX', 'XXXXX', 'MORENA MAIA (25241)', 'LIANA COUTO (25698)', 'GLAUCIA SILVADO (15370)', 'MORENA MAIA (25241)', 'CAROLINE BILEGO (26449)', 'XXXXX', 'XXXXX', 'HUMBERTO MENDES (27486)', 'LIANA COUTO (25698)', 'GLAUCIA SILVADO (15370)', 'ISABELLA MAGALHÃES (29126)', 'CAROLINE BILEGO (26449)', 'XXXXX', 'XXXXX', 'MORENA MAIA (25241)', 'LIANA COUTO (25698)', 'GLAUCIA SILVADO (15370)', 'MORENA MAIA (25241)', 'CAROLINE BILEGO (26449)', 'XXXXX'),
(146, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'JULIANA DE MACEDO (30104)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'JULIANA DE MACEDO (30104)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'JULIANA DE MACEDO (30104)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'JULIANA DE MACEDO (30104)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(147, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(148, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(150, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(151, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(152, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(153, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(154, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(155, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(156, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(160, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, '1', '#305496_#FFFFFF', '01:00 - 07:00 (LIDER)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'WALLACE PINHEIRO (22395)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'ISADORA OLIVEIRA (27282)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'WALLACE PINHEIRO (22395)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'ISADORA OLIVEIRA (27282)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)'),
(162, '1', '#305496_#FFFFFF', '01:00 - 07:00 (LIDER)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'CARLOS BICALHO (29610)', 'HUMBERTO PIRES (27097)', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'MARILIA RODRIGUES (24537)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'HUMBERTO PIRES (27097)', '', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'GUILHERME MERCES (24688)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'CARLOS BICALHO (29610)', 'HUMBERTO PIRES (27097)', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'MARILIA RODRIGUES (24537)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'HUMBERTO PIRES (27097)', '', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'GUILHERME MERCES (24688)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'CARLOS BICALHO (29610)'),
(163, '1', '#305496_#FFFFFF', '01:00 - 07:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(164, '1', '#305496_#FFFFFF', '01:00 - 07:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(165, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(167, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(168, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(169, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(170, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(171, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `dezembro` (`ID`, `Visible`, `bgcolor`, `Hora_Func`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`, `D9`, `D10`, `D11`, `D12`, `D13`, `D14`, `D15`, `D16`, `D17`, `D18`, `D19`, `D20`, `D21`, `D22`, `D23`, `D24`, `D25`, `D26`, `D27`, `D28`, `D29`, `D30`, `D31`) VALUES
(172, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(173, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(174, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(175, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(176, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(177, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(178, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(179, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(180, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(181, '1', '#7B7B7B_#FFFFFF', '01:00 - 07:00 (PORTA)', 'AMANDA ALVES (27007)', 'LORENA GALVANI (29117)', 'CAROLINE BILEGO (26449)', 'GABRIELLA REIS (25438)', 'HUMBERTO MENDES (27486)', 'UBIRATAN NETO (18052)', 'AMANDA ALVES (27007)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'LIANA COUTO (25698)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'TARQUINIO JUNIOR (26698)', 'AMANDA ALVES (27007)', 'LORENA GALVANI (29117)', 'CAROLINE BILEGO (26449)', 'GABRIELLA REIS (25438)', 'HUMBERTO MENDES (27486)', 'UBIRATAN NETO (18052)', 'AMANDA ALVES (27007)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'LIANA COUTO (25698)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'TARQUINIO JUNIOR (26698)', 'AMANDA ALVES (27007)', 'LORENA GALVANI (29117)', 'CAROLINE BILEGO (26449)'),
(182, '1', '#7B7B7B_#FFFFFF', '01:00 - 07:00 (PORTA)', 'LIANA COUTO (25698)', 'WILSON CALIPSE (23945)', 'MARIANA BICALHO (29363)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'GUILHERME MERCES (24688)', 'HUMBERTO MENDES (27486)', 'WILSON CALIPSE (23945)', 'MARIA SILVA (27307)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'WILSON CALIPSE (23945)', 'MARIANA BICALHO (29363)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'GUILHERME MERCES (24688)', 'HUMBERTO MENDES (27486)', 'WILSON CALIPSE (23945)', 'MARIA SILVA (27307)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'WILSON CALIPSE (23945)', 'MARIANA BICALHO (29363)'),
(183, '1', '#7B7B7B_#FFFFFF', '01:00 - 07:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(184, '1', '#7B7B7B_#FFFFFF', '01:00 - 07:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(185, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(186, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(187, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(188, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(189, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(190, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(191, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(192, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(193, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(194, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(195, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(196, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(197, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(198, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(199, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(200, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dezembrofixa`
--

CREATE TABLE `dezembrofixa` (
  `ID` int(11) NOT NULL,
  `Visible` varchar(1) NOT NULL,
  `bgcolor` varchar(30) NOT NULL,
  `Hora_Func` varchar(70) NOT NULL,
  `A1` varchar(70) DEFAULT NULL,
  `A2` varchar(70) DEFAULT NULL,
  `A3` varchar(70) DEFAULT NULL,
  `A4` varchar(70) DEFAULT NULL,
  `A5` varchar(70) DEFAULT NULL,
  `A6` varchar(70) DEFAULT NULL,
  `A7` varchar(70) DEFAULT NULL,
  `B1` varchar(70) DEFAULT NULL,
  `B2` varchar(70) DEFAULT NULL,
  `B3` varchar(70) DEFAULT NULL,
  `B4` varchar(70) DEFAULT NULL,
  `B5` varchar(70) DEFAULT NULL,
  `B6` varchar(70) DEFAULT NULL,
  `B7` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `dezembrofixa`
--

INSERT INTO `dezembrofixa` (`ID`, `Visible`, `bgcolor`, `Hora_Func`, `A1`, `A2`, `A3`, `A4`, `A5`, `A6`, `A7`, `B1`, `B2`, `B3`, `B4`, `B5`, `B6`, `B7`) VALUES
(1, '1', '#9BC2E6_#000000', '07:00 - 13:00 (LIDER)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'UBIRATAN NETO (18052)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'HUMBERTO PIRES (27097)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)'),
(2, '1', '#9BC2E6_#000000', '07:00 - 13:00 (LIDER)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'ELISE OLIVEIRA (26568)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)'),
(3, '1', '#9BC2E6_#000000', '07:00 - 13:00 (LIDER)', 'FERNANDO VIEIRA (14167)', 'ELISE OLIVEIRA (26568)', 'GLAUCIA SILVADO (15370)', 'ISADORA OLIVEIRA (27282)', 'GUILHERME MERCES (24688)', 'ELISE OLIVEIRA (26568)', 'FERNANDO VIEIRA (14167)', 'FERNANDO VIEIRA (14167)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'LUAN TEIXEIRA (25986)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'FERNANDO VIEIRA (14167)'),
(4, '1', '#9BC2E6_#000000', '07:00 - 13:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(5, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '0', '', '07:00 - 13:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'SHAYEEN SANDES (21861)', 'LARISSA CRUZEIRO (24965)', 'MARIANE CLEMENTINO (28546)', 'SAYONARA PANIAGO (23800)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'ISADORA OLIVEIRA (27282)', 'MARIANE CLEMENTINO (28546)', 'SAYONARA PANIAGO (23800)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)', 'SHAYEEN SANDES (21861)'),
(22, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'ISADORA OLIVEIRA (27282)', 'GABRIELA RIBEIRO (26332)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'LORENA GALVANI (29117)', 'THAÍS COUTO (28754)', 'ELISE OLIVEIRA (26568)', 'ISADORA OLIVEIRA (27282)', 'GABRIELA RIBEIRO (26332)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'LORENA GALVANI (29117)', 'MARCUS TEIXEIRA (24323)', 'MARCUS TEIXEIRA (24323)'),
(23, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'GIOVANNA ROCHA (26148)', 'ADRIANA BRITO (22640)', 'BRENDA MENDONÇA (29125)', 'WILSON CALIPSE (23945)', 'ISADORA OLIVEIRA (27282)', 'JESSIKA REZENDE (26663)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'ADRIANA BRITO (22640)', 'BRENDA MENDONÇA (29125)', 'SHAYEEN SANDES (21861)', 'ISADORA OLIVEIRA (27282)', 'JESSIKA REZENDE (26663)', 'ZENISON JUNIOR (26872)'),
(24, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'ELISE OLIVEIRA (26568)', 'ZENISON JUNIOR (26872)', 'JULIANA DE MACEDO (30104)', 'JULIANA DE MACEDO (30104)', 'MATEUS LEITE (16988)', 'ADRIANA BRITO (22640)', 'ADRIANA BRITO (22640)', 'ELISE OLIVEIRA (26568)', 'ZENISON JUNIOR (26872)', 'LINA BORGES (28717)', 'ISABELLA MAGALHÃES (29126)', 'MATEUS LEITE (16988)', 'ADRIANA BRITO (22640)', 'ADRIANA BRITO (22640)'),
(25, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'ISABELLA SILVA (26357)', 'PATRÍCIA GOMES (24666)', 'SAYONARA PANIAGO (23800)', 'XXXXX', 'GIOVANNA ROCHA (26148)', 'ZENISON JUNIOR (26872)', 'LORENA GALVANI (29117)', 'ISABELLA SILVA (26357)', 'PATRÍCIA GOMES (24666)', 'GABRIELA VILELA (25433)', 'XXXXX', 'GIOVANNA ROCHA (26148)', 'ZENISON JUNIOR (26872)', 'LORENA GALVANI (29117)'),
(26, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'MATEUS LEITE (16988)', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'CAIQUE OTTO (25797)', 'ISADORA OLIVEIRA (27282)', 'AMANDA ALVES (27007)', 'MATEUS LEITE (16988)', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'AMANDA ALVES (27007)', 'ISADORA OLIVEIRA (27282)', 'AMANDA ALVES (27007)'),
(27, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'MIGUEL NETO (23780)', 'JESSIKA REZENDE (26663)', 'XXXXX', 'XXXXX', 'ANDRESSA COZER (28580)', 'MARIANA BICALHO (29363)', 'XXXXX', 'ANDRESSA COZER (28580)', 'SHAYEEN SANDES (21861)', 'XXXXX', 'XXXXX', 'ANDRESSA COZER (28580)', 'MARIANA BICALHO (29363)', 'XXXXX'),
(28, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'MATEUS LEITE (16988)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'MATEUS LEITE (16988)', 'XXXXX'),
(29, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(30, '1', '#F2F2F2_#000000', '07:00 - 13:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(31, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, '0', '', '12:00 - 18:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, '1', '#9BC2E6_#000000', '13:00 - 19:00 (LIDER)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'WALLACE PINHEIRO (22395)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'THIAGO ABREU (20417)', 'HUMBERTO PIRES (27097)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)', 'RAFAEL MARTINS (26863)'),
(62, '1', '#9BC2E6_#000000', '13:00 - 19:00 (LIDER)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'ELISE OLIVEIRA (26568)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'DAYSILENE SOBRINHO (28811)', 'MARILIA RODRIGUES (24537)', 'DAYSILENE SOBRINHO (28811)'),
(63, '1', '#9BC2E6_#000000', '13:00 - 19:00 (LIDER)', 'ELISE OLIVEIRA (26568)', 'LARISSA CRUZEIRO (24965)', 'CARLOS BICALHO (29610)', 'GLAUCIA SILVADO (15370)', 'ELISE OLIVEIRA (26568)', 'ELISE OLIVEIRA (26568)', 'GUILHERME MERCES (24688)', 'ELISE OLIVEIRA (26568)', 'LARISSA CRUZEIRO (24965)', '', 'LUAN TEIXEIRA (25986)', 'ELISE OLIVEIRA (26568)', 'MARCUS TEIXEIRA (24323)', 'GUILHERME MERCES (24688)'),
(64, '1', '#9BC2E6_#000000', '13:00 - 19:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(65, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'LARISSA CRUZEIRO (24965)', 'ISADORA OLIVEIRA (27282)', 'TARQUINIO JUNIOR (26698)', 'LARISSA ARANTES (24013)', 'LORENA GALVANI (29117)', 'ROGERIO SANTANA (12176)', 'ROGERIO SANTANA (12176)', 'LARISSA CRUZEIRO (24965)', 'NATALIA SARDINHA ()', 'TARQUINIO JUNIOR (26698)', 'ISABELLA MAGALHÃES (29126)', 'LORENA GALVANI (29117)', 'ROGERIO SANTANA (12176)', 'ROGERIO SANTANA (12176)'),
(82, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'MARIANE CLEMENTINO (28546)', 'ROSAYNNY FUMEIRO (28600)', 'ISADORA OLIVEIRA (27282)', 'MARIANE CLEMENTINO (28546)', 'ELISE OLIVEIRA (26568)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'MARIANE CLEMENTINO (28546)', 'ISABELLA SILVA (26357)', 'ISADORA OLIVEIRA (27282)', 'ELISE OLIVEIRA (26568)', 'MARCUS TEIXEIRA (24323)'),
(83, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'ISABELLA SILVA (26357)', 'ZENISON JUNIOR (26872)', 'MARIANA BICALHO (29363)', 'LUIZ MESQUITA (20513)', 'MATEUS LEITE (16988)', 'ZENISON JUNIOR (26872)', 'SAMUEL GALVÃO (25522)', 'ISABELLA SILVA (26357)', 'ZENISON JUNIOR (26872)', 'MARIANA BICALHO (29363)', 'CAROLINE BILEGO (26449)', 'MATEUS LEITE (16988)', 'ZENISON JUNIOR (26872)', 'SAMUEL GALVÃO (25522)'),
(84, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'GIOVANNA ROCHA (26148)', 'MARIANE CLEMENTINO (28546)', 'XXXXX', 'XXXXX', 'ROGERIO SANTANA (12176)', 'ADRIANA BRITO (22640)', 'ZENISON JUNIOR (26872)', 'GIOVANNA ROCHA (26148)', 'MARIANE CLEMENTINO (28546)', 'GABRIELA VILELA (25433)', 'XXXXX', 'ROGERIO SANTANA (12176)', 'ADRIANA BRITO (22640)', 'ZENISON JUNIOR (26872)'),
(85, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'BRENDA MENDONÇA (29125)', 'ELISE OLIVEIRA (26568)', 'XXXXX', 'XXXXX', 'THAÍS ALVES (28754)', 'JESSIKA SANDES (26663)', 'LORENA GALVANI (29117)', 'BRENDA MENDONÇA (29125)', 'ELISE OLIVEIRA (26568)', 'XXXXX', 'XXXXX', 'THAÍS ALVES (28754)', 'JESSIKA SANDES (26663)', 'LORENA GALVANI (29117)'),
(86, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'MARIANA BICALHO (29363)', 'THAÍS COUTO (28754)', 'XXXXX', 'XXXXX', 'ISABELLA SILVA (26357)', 'MARIANA BICALHO (29363)', 'ISADORA OLIVEIRA (27282)', 'MARIANA BICALHO (29363)', 'THAÍS COUTO (28754)', 'XXXXX', 'XXXXX', 'ISABELLA SILVA (26357)', 'MARIANA BICALHO (29363)', 'ISADORA OLIVEIRA (27282)'),
(87, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(88, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(89, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(90, '1', '#F2F2F2_#000000', '13:00 - 19:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(91, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, '0', '', '13:00 - 19:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(108, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(109, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(110, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(111, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(112, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(113, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(114, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(115, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(116, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(117, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(118, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(119, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(120, '0', '', '18:00 - 00:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(121, '1', '#305496_#FFFFFF', '19:00 - 01:00 (LIDER)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'WALLACE PINHEIRO (22395)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'ISADORA OLIVEIRA (27282)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)'),
(122, '1', '#305496_#FFFFFF', '19:00 - 01:00 (LIDER)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'CARLOS BICALHO (29610)', 'HUMBERTO PIRES (27097)', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'MARILIA RODRIGUES (24537)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'HUMBERTO PIRES (27097)', '', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'GUILHERME MERCES (24688)'),
(123, '1', '#305496_#FFFFFF', '19:00 - 01:00 (LIDER)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'WALLACE PINHEIRO (22395)', 'SAMUEL GALVÃO (25522)', 'HUMBERTO PIRES (27097)', 'CARLOS BICALHO (29610)', 'LARISSA CRUZEIRO (24965)', 'LARISSA CRUZEIRO (24965)', 'WALLACE PINHEIRO (22395)', 'LUAN TEIXEIRA (25986)', '', 'HUMBERTO PIRES (27097)', 'CARLOS BICALHO (29610)', 'LARISSA CRUZEIRO (24965)'),
(124, '1', '#305496_#FFFFFF', '19:00 - 01:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(125, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(126, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(129, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(130, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(131, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(132, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(133, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(137, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'LIANA COUTO (25698)', 'LORENA GALVANI (29117)', 'CAROLINE BILEGO (26449)', 'GABRIELLA REIS (25438)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'GUILHERME MERCES (24688)', 'SAYONARA PANIAGO (23800)', 'LORENA GALVANI (29117)', 'MARIA SILVA (27307)', 'LIANA COUTO (25698)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'LAURA GALVANI (18474)'),
(142, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'ALINE ESSADO (24052)', 'WILSON CALIPSE (23945)', 'MARIANA BICALHO (29363)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'TARQUINIO JUNIOR (26698)', 'LAURA GALVANI (18474)', 'WILSON CALIPSE (23945)', 'BEATRIZ PAIXAO (28573)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'TARQUINIO JUNIOR (26698)'),
(143, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'BRENDA MENDONÇA (29125)', 'CAIQUE OTTO (25797)', 'SAYONARA PANIAGO (23800)', 'RENATA CAMILO ()', 'LINA BORGES (28717)', 'SAYONARA PANIAGO (23800)', 'FERNANDO FILHO (28410)', 'BRENDA MENDONÇA (29125)', 'CAIQUE OTTO (25797)', 'SAYONARA PANIAGO (23800)', 'MORENA MAIA (25241)', 'LINA BORGES (28717)', 'SAYONARA PANIAGO (23800)', 'BRENDA MENDONÇA (29125)'),
(144, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'HUMBERTO MENDES (27486)', 'GABRIELA VILELA (25433)', 'GABRIELA RIBEIRO (26332)', 'LINA BORGES (28717)', 'GLAUCIA SILVADO (15370)', 'GABRIELA VILELA (25433)', 'LINA BORGES (28717)', 'HUMBERTO MENDES (27486)', 'GABRIELA VILELA (25433)', 'GABRIELA RIBEIRO (26332)', 'CAROLINE BILEGO (26449)', 'GLAUCIA SILVADO (15370)', 'GABRIELA VILELA (25433)', 'LINA BORGES (28717)'),
(145, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'MORENA MAIA (25241)', 'CAROLINE BILEGO (26449)', 'XXXXX', 'XXXXX', 'HUMBERTO MENDES (27486)', 'LIANA COUTO (25698)', 'GLAUCIA SILVADO (15370)', 'ISABELLA MAGALHÃES (29126)', 'CAROLINE BILEGO (26449)', 'XXXXX', 'XXXXX', 'MORENA MAIA (25241)', 'LIANA COUTO (25698)', 'GLAUCIA SILVADO (15370)'),
(146, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'JULIANA DE MACEDO (30104)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'JULIANA DE MACEDO (30104)', 'XXXXX'),
(147, '1', '#7B7B7B_#FFFFFF', '19:00 - 01:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(148, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(150, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(151, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(152, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(153, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(154, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(155, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(156, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(160, '0', '', '19:00 - 01:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, '1', '#305496_#FFFFFF', '01:00 - 07:00 (LIDER)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'WALLACE PINHEIRO (22395)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)', 'MARILIA RODRIGUES (24537)', 'ALEX SILVA (19502)', 'SAMUEL GALVÃO (25522)', 'ISADORA OLIVEIRA (27282)', 'HEBERT CAETANO (14489)', 'PABLO CINTRA (19778)', 'CARLOS BICALHO (29610)'),
(162, '1', '#305496_#FFFFFF', '01:00 - 07:00 (LIDER)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'CARLOS BICALHO (29610)', 'HUMBERTO PIRES (27097)', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'MARILIA RODRIGUES (24537)', 'THIAGO ABREU (20417)', 'ADELICIO APOLINARIO (23816)', 'HUMBERTO PIRES (27097)', '', 'PABLO CINTRA (19778)', 'MARILIA RODRIGUES (24537)', 'GUILHERME MERCES (24688)'),
(163, '1', '#305496_#FFFFFF', '01:00 - 07:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(164, '1', '#305496_#FFFFFF', '01:00 - 07:00 (LIDER)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(165, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(167, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(168, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(169, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(170, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(171, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(172, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(173, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(174, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(175, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(176, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(177, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(178, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(179, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(180, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(181, '1', '#7B7B7B_#FFFFFF', '01:00 - 07:00 (PORTA)', 'AMANDA ALVES (27007)', 'LORENA GALVANI (29117)', 'CAROLINE BILEGO (26449)', 'GABRIELLA REIS (25438)', 'HUMBERTO MENDES (27486)', 'UBIRATAN NETO (18052)', 'AMANDA ALVES (27007)', 'LAURA GALVANI (18474)', 'LORENA GALVANI (29117)', 'GABRIELA RIBEIRO (26332)', 'LIANA COUTO (25698)', 'TARQUINIO JUNIOR (26698)', 'UBIRATAN NETO (18052)', 'TARQUINIO JUNIOR (26698)'),
(182, '1', '#7B7B7B_#FFFFFF', '01:00 - 07:00 (PORTA)', 'LIANA COUTO (25698)', 'WILSON CALIPSE (23945)', 'MARIANA BICALHO (29363)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'GUILHERME MERCES (24688)', 'HUMBERTO MENDES (27486)', 'WILSON CALIPSE (23945)', 'MARIA SILVA (27307)', 'MARIA SILVA (27307)', 'LAURA GALVANI (18474)', 'LIANA COUTO (25698)', 'LAURA GALVANI (18474)'),
(183, '1', '#7B7B7B_#FFFFFF', '01:00 - 07:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(184, '1', '#7B7B7B_#FFFFFF', '01:00 - 07:00 (PORTA)', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX', 'XXXXX'),
(185, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(186, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(187, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(188, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(189, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(190, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(191, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(192, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(193, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(194, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(195, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(196, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(197, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(198, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(199, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(200, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dimensionamento`
--

CREATE TABLE `dimensionamento` (
  `ID` int(11) NOT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `linhas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'LIDER'),
(2, 'PORTA');

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
(1, '07:00 - 13:00'),
(2, '13:00 - 19:00'),
(3, '19:00 - 01:00'),
(4, '01:00 - 07:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consolidado_abril`
--
ALTER TABLE `consolidado_abril`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `corpo_clinico`
--
ALTER TABLE `corpo_clinico`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `dezembro`
--
ALTER TABLE `dezembro`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `dezembrofixa`
--
ALTER TABLE `dezembrofixa`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `dimensionamento`
--
ALTER TABLE `dimensionamento`
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
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consolidado_abril`
--
ALTER TABLE `consolidado_abril`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `corpo_clinico`
--
ALTER TABLE `corpo_clinico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `dezembro`
--
ALTER TABLE `dezembro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de tabela `dezembrofixa`
--
ALTER TABLE `dezembrofixa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de tabela `dimensionamento`
--
ALTER TABLE `dimensionamento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
