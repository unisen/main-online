--
-- Banco de dados: `unisen19_tzp_checkin`
--
CREATE DATABASE IF NOT EXISTS `unisen19_tzp_checkin` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `unisen19_tzp_checkin`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `2022`
--

CREATE TABLE `2022` (
  `unidade` varchar(40) NOT NULL,
  `plantonista` varchar(50) NOT NULL,
  `data_plantao` varchar(10) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `funcao` varchar(30) NOT NULL,
  `submission` varchar(30) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `2022`
--

INSERT INTO `2022` (`unidade`, `plantonista`, `data_plantao`, `horario`, `funcao`, `submission`, `ID`) VALUES
('CS', 'THIAGO ESPÍNDOLA (29022)', '02/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '02/11/2022 07:23:26', 1),
('CS', 'THIAGO ESPÍNDOLA (29022)', '03/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '03/11/2022 07:55:17', 2),
('CS', 'RICARDO COUTINHO (27761)', '04/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '04/11/2022 07:57:31', 3),
('CS', 'RICARDO COUTINHO (27761)', '04/11/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '04/11/2022 18:00:33', 4),
('CS', 'THIAGO ESPÍNDOLA (29022)', '09/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '10/11/2022 07:14:02', 5),
('CS', 'THIAGO ESPÍNDOLA (29022)', '10/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '10/11/2022 07:14:50', 6),
('CS', 'LOHANA MENDONCA (29328)', '07/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '11/11/2022 11:27:05', 7),
('CS', 'RAFAEL MAMEDE (19828)', '12/11/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '12/11/2022 19:32:18', 8),
('CS', 'VICTOR FONTENELLE (29700)', '12/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '12/11/2022 21:28:45', 9),
('CS', 'RICARDO RABELO (28955)', '13/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '13/11/2022 14:01:36', 10),
('CS', 'RAFAEL MAMEDE (19828)', '15/11/2022', '07:00 - 13:00\n13:00 - 19:00\n19:00 - 01:00\n01:00 - 07:00', 'GERAL', '15/11/2022 06:53:28', 11),
('CS', 'THIAGO ESPÍNDOLA (29022)', '16/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '16/11/2022 07:14:06', 12),
('CS', 'RICARDO COUTINHO (27761)', '18/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '18/11/2022 07:22:28', 13),
('CS', 'JOSÉ MACEDO (30867)', '21/11/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '22/11/2022 13:13:01', 14),
('CS', 'THIAGO ESPÍNDOLA (29022)', '14/11/2022', '07:00 - 13:00\n13:00 - 19:00\n19:00 - 01:00\n01:00 - 07:00', 'GERAL', '22/11/2022 19:02:01', 15),
('CS', 'THIAGO ESPÍNDOLA (29022)', '17/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '22/11/2022 19:04:16', 16),
('CS', 'JOSÉ MACEDO (30867)', '23/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '24/11/2022 08:45:26', 17),
('CS', 'THIAGO ESPÍNDOLA (29022)', '24/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '24/11/2022 12:01:45', 18),
('CS', 'RICARDO COUTINHO (27761)', '25/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '25/11/2022 07:55:57', 19),
('CS', 'JOSÉ MACEDO (30867)', '27/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '28/11/2022 12:30:42', 20),
('CS', 'CLEÓPATRA MORAIS (30837)', '28/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '28/11/2022 13:20:55', 21),
('CS', 'THIAGO ESPÍNDOLA (29022)', '30/11/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '30/11/2022 12:00:48', 22),
('CS', 'JOSÉ MACEDO (30867)', '07/12/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '08/12/2022 13:35:07', 23),
('CS', 'GABRIELA MATEUS (30890)', '02/12/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '09/12/2022 19:02:16', 24),
('CS', 'VICTOR FONTENELLE (29700)', '09/12/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '09/12/2022 19:37:46', 25),
('CS', 'ALEX XAVIER (30829)', '09/12/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '09/12/2022 21:26:17', 26),
('CS', 'VICTOR FONTENELLE (29700)', '10/12/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '10/12/2022 12:34:22', 27),
('CS', 'JOSÉ MACEDO (30867)', '14/12/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '15/12/2022 17:29:25', 28),
('CS', 'JOSÉ MACEDO (30867)', '15/12/2022', '07:00 - 13:00\n13:00 - 19:00\n19:00 - 01:00\n01:00 - 07:00', 'GERAL', '15/12/2022 17:31:00', 29),
('CS', 'JOSÉ MACEDO (30867)', '16/12/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '16/12/2022 07:56:13', 30),
('CS', 'JOSÉ MACEDO (30867)', '17/12/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '17/12/2022 21:02:01', 31),
('CS', 'JOSÉ MACEDO (30867)', '18/12/2022', '07:00 - 13:00\n13:00 - 19:00\n19:00 - 01:00\n01:00 - 07:00', 'GERAL', '18/12/2022 08:02:49', 32),
('CS', 'JOSÉ MACEDO (30867)', '20/12/2022', '07:00 - 13:00\n13:00 - 19:00\n19:00 - 01:00\n01:00 - 07:00', 'GERAL', '20/12/2022 11:14:34', 33),
('CS', 'JOSÉ MACEDO (30867)', '25/12/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '25/12/2022 19:53:47', 34),
('CS', 'CLEÓPATRA MORAIS (30837)', '26/12/2022', '07:00 - 13:00\n13:00 - 19:00', 'GERAL', '26/12/2022 15:39:48', 35),
('CS', 'FELIPE GREYCK (27442)', '26/12/2022', '19:00 - 01:00\n01:00 - 07:00', 'GERAL', '27/12/2022 08:17:58', 36),
('CS', 'THIAGO ESPÍNDOLA (29022)', '29/12/2022', '07:00 - 13:00\n13:00 - 19:00\n19:00 - 01:00\n01:00 - 07:00', 'GERAL', '29/12/2022 12:31:39', 37),
('CS', 'THIAGO ESPÍNDOLA (29022)', '22/12/2022', '07:00 - 13:00\n13:00 - 19:00\n19:00 - 01:00\n01:00 - 07:00', 'GERAL', '29/12/2022 12:36:31', 38);

-- --------------------------------------------------------

--
-- Estrutura para tabela `2023`
--

CREATE TABLE `2023` (
  `unidade` varchar(40) NOT NULL,
  `plantonista` varchar(50) NOT NULL,
  `data_plantao` varchar(10) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `funcao` varchar(30) NOT NULL,
  `submission` varchar(30) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, '01:00 - 07:00'),
(5, '10:00 - 16:00'),
(6, '16:00 - 22:00'),
(7, '08:00 - 17:00'),
(8, '12:00 - 18:00'),
(9, '18:00 - 00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `ID` int(11) NOT NULL,
  `CS` varchar(100) NOT NULL,
  `UBS_PLANTAO` varchar(50) NOT NULL,
  `GO` varchar(50) NOT NULL,
  `PQT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `unidade`
--

INSERT INTO `unidade` (`ID`, `CS`, `UBS_PLANTAO`, `GO`, `PQT`) VALUES
(1, 'GERAL', 'GERAL', 'GO', 'PSIQUIATRA');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `2022`
--
ALTER TABLE `2022`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `2023`
--
ALTER TABLE `2023`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `2022`
--
ALTER TABLE `2022`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `2023`
--
ALTER TABLE `2023`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
