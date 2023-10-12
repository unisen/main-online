--
-- Banco de dados: `unisen19_hospitalamerica_obstetricia_checkin`
--
CREATE DATABASE IF NOT EXISTS `unisen19_hospitalamerica_obstetricia_checkin` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `unisen19_hospitalamerica_obstetricia_checkin`;

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
-- Estrutura para tabela `corpo`
--

CREATE TABLE `corpo` (
  `ID` int(11) NOT NULL,
  `plantonista` varchar(100) NOT NULL
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
(8, '19:00 - 23:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `ID` int(11) NOT NULL,
  `OBSTETRICIA` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `unidade`
--

INSERT INTO `unidade` (`ID`, `OBSTETRICIA`) VALUES
(1, 'LIDER'),
(2, 'ATENDIMENTO'),
(3, 'ENFERMARIA'),
(5, 'PPP');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `2023`
--
ALTER TABLE `2023`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `corpo`
--
ALTER TABLE `corpo`
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
-- AUTO_INCREMENT de tabela `2023`
--
ALTER TABLE `2023`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `corpo`
--
ALTER TABLE `corpo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
