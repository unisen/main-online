--
-- Banco de dados: `unisen19_tzp_ubs`
--
CREATE DATABASE IF NOT EXISTS `unisen19_tzp_ubs` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `unisen19_tzp_ubs`;

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
(1, 'RENATO PEREIRA CAMPELO', 'repcampelo@hotmail.com', '13628', 'GO', 'RENATO CAMPELO (13628)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '978342621-49', 'PORTA', '62ffbf106e3ed', 'confirmado', '19/08/2022 13:49'),
(2, 'TIAGO RESENDE TELLES', 'tiagoresendet@gmail.com', '28691', 'GO', 'TIAGO RESENDE (28691)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '042.102.131-44', 'PORTA', '62faabc8d8b7d', 'confirmado', '15/08/2022 17:25'),
(3, 'WILSON CALIPSE DA SILVA', 'drwilsoncalipse@gmail.com', '23945', 'GO', 'WILSON CALIPSE (23945)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '033.829.711-19', 'SALA VERMELHA;PORTA', '62faf94ed8ee0', 'confirmado', '15/08/2022 22:56'),
(4, 'JORGE AUGUSTO MARQUES OLIVEIRA', 'jorgeaugusto_105@icloud.com', '30317', 'GO', 'JORGE MARQUES (30317)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '701.404.291-23', 'PORTA', '62ff9c55ef591', 'confirmado', '19/08/2022 11:21'),
(5, 'JAIRO CESAR RODRIGUES DA SILVA', 'jcrs1957@gmail.com', '11485', 'GO', 'JAIRO SILVA (11485)', 'PRAMED', '32.607.218/0001-03', '195.514.441-91', 'PORTA', '62ffa92ada276', 'confirmado', '19/08/2022 12:15'),
(6, 'BEATRIZ XAVIER DA PAIXAO DIAS', 'beatrizdias0705@gmail.com', '28573', 'GO', 'BEATRIZ PAIXAO (28573)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '047.250.971-36', 'PORTA', '62ffb441eb9ee', 'confirmado', '19/08/2022 13:03'),
(8, 'GIULIANO CESAR DE PAULA JUNIOR', 'giulianocpj@gmail.com', '29255', 'GO', 'GIULIANO CESAR (29255)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '701.056.411-62', 'PORTA', '63001fe31182a', 'confirmado', '19/08/2022 20:42'),
(9, 'RONDINELE FIGUEIRA', 'rondinelepaulogo@hotmail.com', '17287', 'GO', 'RONDINELE FIGUEIRA (17287)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '007.643.381-10', 'SALA VERMELHA;PORTA', '63012646d576c', 'confirmado', '20/08/2022 15:21'),
(10, 'RODOLFO MAIA ARRUDA', 'rodolfomaia63@gmail.com', '27473', 'GO', 'RODOLFO MAIA (27473)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '054.333.853-37', 'PORTA', '630134fa75286', 'confirmado', '20/08/2022 16:24'),
(11, 'MARIANA QUEIROZ BORGES', 'marianaqueirozzb@gmail.com', '29330', 'GO', 'MARIANA QUEIROZ (29330)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '037.333.241-61', 'SALA VERMELHA;PORTA', '6302ad85780c6', 'confirmado', '21/08/2022 19:11'),
(12, 'GABRIELLA NUNES DE MAGALHAES DOS SANTOS', 'gabriella3333@yahoo.com.br', '28711', 'GO', 'GABRIELLA NUNES (28711)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '051.093.251-70', 'PORTA', '6302c71a519d6', 'confirmado', '21/08/2022 21:00'),
(14, 'VALDIVINO SOARES DE OLIVEIRA JUNIOR', 'jvadvsoares@gmail.com', '30524', 'GO', 'VALDIVINO SOARES (30524)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '054.058.441-01', 'PORTA', '6304e8b5e8108', 'confirmado', '23/08/2022 11:48'),
(15, 'WALLACE PINHEIRO RODRIGUES', 'wallaceprd@hotmail.com', '22395', 'GO', 'WALLACE PINHEIRO (22395)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '039.950.771-02', 'SALA VERMELHA', '630552cf29946', 'confirmado', '23/08/2022 19:21'),
(16, 'RAFAEL SOMMA DE ARAUJO', 'rafasomma18@gmail.com', '27805', 'GO', 'RAFAEL SOMMA (27805)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '035.476.221-40', 'PORTA', '63061b2ca6154', 'confirmado', '24/08/2022 09:35'),
(17, 'LUCIANA CACAO VILELA BUENO', 'luuciana.bueno@gmail.com', '27355', 'GO', 'LUCIANA CACAO (27355)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '059.138.561-98', 'PORTA', '63076e5434325', 'confirmado', '25/08/2022 09:43'),
(18, 'ANA CLARA RODRIGUES DA CUNHA DE SANT ANA MORAES', 'a.anaclaramoraes@gmail.com', '29378', 'GO', 'ANA CLARA (29378)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.189.961-59', 'PORTA', '63076eaca162a', 'confirmado', '25/08/2022 09:44'),
(19, 'ANA CAROLINA PINHEIRO MEDEIROS', 'carolpmedeiros@icloud.com', '28792', 'GO', 'ANA MEDEIROS (28792)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '703.081.211-55', 'PORTA', '63076ef5e9a84', 'confirmado', '25/08/2022 09:45'),
(20, 'DANIELA SOUZA DE JESUS', 'danielasouzadejesus7@gmail.com', '29185', 'GO', 'DANIELA SOUZA (29185)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '038.652.171-92', 'PORTA', '63076f6455def', 'confirmado', '25/08/2022 09:47'),
(21, 'FERNANDO DIAS ARAUJO FILHO', 'fernandodaf15@gmail.com', '28410', 'GO', 'FERNANDO DIAS (28410)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '701.915.471-90', 'PORTA', '63076fd4639b8', 'confirmado', '25/08/2022 09:49'),
(22, 'ELLEN CAMILA RODRIGUES DIAS', 'ellen_camila@yahoo.com.br', '30324', 'GO', 'ELLEN DIAS (30324)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '032.650.401-00', 'PORTA', '6307705659675', 'confirmado', '25/08/2022 09:51'),
(23, 'FERNANDA SOUZA MIRANDA', 'fer26miranda@hotmail.com', '17142', 'GO', 'FERNANDA MIRANDA (17142)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '012.622.186-32', 'PORTA', '6307706a762e3', 'confirmado', '25/08/2022 09:51'),
(24, 'AUGUSTO MONTEIRO NASCENTE BORGES', 'augustomonteiro10@gmail.com', '29376', 'GO', 'AUGUSTO MONTEIRO (29376)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '037.175.391-08', 'PORTA', '6307708f4f341', 'confirmado', '25/08/2022 09:52'),
(25, 'HELOISA GANASSINI QUINTANILHA', 'heloisagquintanilha@gmail.com', '29244', 'GO', 'HELOISA QUINTANILHA (29244)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '036.361.401-08', 'PORTA', '630770dd3a29a', 'confirmado', '25/08/2022 09:53'),
(26, 'LARISSA PEREIRA NEVES', 'laripnvs@hotmail.com', '30407', 'GO', 'LARISSA NEVES (30407)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '016.168.001-19', 'SALA VERMELHA;PORTA', '630772497bf5f', 'confirmado', '25/08/2022 09:59'),
(27, 'SAMILLA PEREIRA RODRIGUES', 'samillapr@gmail.com', '27371', 'GO', 'SAMILLA RODRIGUES (27371)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '023.863.062-59', 'PORTA', '63077347ec5bf', 'confirmado', '25/08/2022 10:04'),
(28, 'LILIANE RIBEIRO DE GODOY LIMA', 'lilianegodoyrl@hotmail.com', '27280', 'GO', 'LILIANE GODOY (27280)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '024.160.961-50', 'PORTA', '630773603f958', 'confirmado', '25/08/2022 10:04'),
(29, 'LUCAS ALVES OLIVEIRA', 'lucas.alves3oliveira@gmail.com', '28929', 'GO', 'LUCAS OLIVEIRA (28929)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '047.124.491-01', 'PORTA', '630774190e9bc', 'confirmado', '25/08/2022 10:07'),
(30, 'ANNA LUIZA RODRIGUES ARAUJO', 'anitaaraujo1@hotmail.com', '27396', 'GO', 'ANNA ARAUJO (27396)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '050.192.261-06', 'PORTA', '63077452868cc', 'confirmado', '25/08/2022 10:08'),
(31, 'LAIS FONSECA GARCIA DE LIMA', 'laisfgl@hotmail.com', '28765', 'GO', 'LAIS FONSECA (28765)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '054.973.161-07', 'PORTA', '63077503d28ac', 'confirmado', '25/08/2022 10:11'),
(32, 'ALESSANDRO ROGERIO BARROS DE REZENDE', 'dralessandrorogeriorezende2@gmail.com', '8272', 'GO', 'ALESSANDRO ROGERIO (8272)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '526.571.321-20', 'PORTA', '63077539cbc5b', 'confirmado', '25/08/2022 10:12'),
(33, 'MICHEL MARTINS SOARES', 'michel_pgt@hotmail.com', '28505', 'GO', 'MICHEL SOARES (28505)', 'M M SOARES ATIVIDADES MEDICAS LTDA.', '43.490.112/0001-80', '693.345.951-91', 'PORTA', '6307753f007b4', 'confirmado', '25/08/2022 10:12'),
(34, 'DIANA CAVALCANTI DE PAULA GONCALVES', 'dianacpg5@hotmail.com', '28808', 'GO', 'DIANA CAVALCANTI (28808)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '059.676.771-43', 'PORTA', '630775ad6e660', 'confirmado', '25/08/2022 10:14'),
(35, 'EDUARDO SIQUEIRA MARTINS', 'eduardosiqueira.med@gmail.com', '27568', 'GO', 'EDUARDO SIQUEIRA (27568)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '009.023.211-96', 'PORTA', '630775e0e45c5', 'confirmado', '25/08/2022 10:15'),
(36, 'KALIL DO CARMO CUNHA PORTO', 'kalilporto93@gmail.com', '28125', 'GO', 'KALIL PORTO (28125)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '039.045.231-98', 'PORTA', '630777de66e95', 'confirmado', '25/08/2022 10:23'),
(37, 'MARCUS VINICIUS SANTOS MENDES', 'mvsm_med@hotmail.com', '21055', 'GO', 'MARCUS MENDES (21055)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '003.534.061-47', 'SALA VERMELHA;PORTA', '6307790f4f974', 'confirmado', '25/08/2022 10:28'),
(38, 'ISABELLA CORREIA TEODORO DE ARAUJO', 'isabella.correia@hotmail.com', '30141', 'GO', 'ISABELLA CORREIA (30141)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '043.902.421-80', 'PORTA', '6307793f64982', 'confirmado', '25/08/2022 10:29'),
(39, 'MILLA PROTO DE MATTOS SABINO', 'milla_proto@hotmail.com', '28113', 'GO', 'MILLA PROTO (28113)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '021.729.721-85', 'PORTA', '6307798d2eb94', 'confirmado', '25/08/2022 10:30'),
(40, 'FERNANDO AUGUSTO DE OLIVEIRA', 'dr.fernandoaugusto98@gmail.com', '29367', 'GO', 'FERNANDO AUGUSTO (29367)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.639.421-00', 'PORTA', '63077f9612a7e', 'confirmado', '25/08/2022 10:56'),
(41, 'MARCO ANTONIO MATHEUS VIEIRA', 'marcomvieira60@gmail.com', '28834', 'GO', 'MARCO ANTONIO (28834)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '017.685.371-51', 'SALA VERMELHA;PORTA', '630789011dcc3', 'confirmado', '25/08/2022 11:36'),
(42, 'NATASKA BATISTA POSSAS', 'nataskabatista@gmail.com', '27177', 'GO', 'NATASKA POSSAS (27177)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '413.580.688-01', 'PORTA', '63078d771c1b2', 'confirmado', '25/08/2022 11:55'),
(43, 'ADRIANO BORGES DE CARVALHO FILHO', 'adriano_bcf@hotmail.com', '30423', 'GO', 'ADRIANO BORGES (30423)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '040.216.941-70', 'PORTA', '63078de43f194', 'confirmado', '25/08/2022 11:57'),
(44, 'LINA BORGES CAVALCANTE', 'lininhaborges@hotmail.com', '28717', 'GO', 'LINA BORGES (28717)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '013.000.231-39', 'PORTA', '63078fbbe9bb1', 'confirmado', '25/08/2022 12:05'),
(45, 'LUISE DAVET BACK', 'luiseback97@gmail.com', '27551', 'GO', 'LUISE BACK (27551)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '014.229.781-09', 'PORTA', '6307961ba6ec6', 'confirmado', '25/08/2022 12:32'),
(46, 'ISADORA BARROS DE OLIVEIRA', 'isadorabdo@icloud.com', '27282', 'GO', 'ISADORA BARROS (27282)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '033.157.871-90', 'PORTA', '63079ca8d6dcc', 'confirmado', '25/08/2022 13:00'),
(47, 'NATHALIA DE PINA SOUSA PINHEIRO', 'nathalia_pinheiro_pina@hotmail.com', '29837', 'GO', 'NATHALIA PINHEIRO (29837)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '702.028.881-26', 'PORTA', '6307a21c941ae', 'confirmado', '25/08/2022 13:23'),
(48, 'AURIANE BUENO BARBOSA', 'aurianebueno@hotmail.com', '30436', 'GO', 'AURIANE BUENO (30436)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '011.107.071-69', 'PORTA', '6307a36e91357', 'confirmado', '25/08/2022 13:29'),
(49, 'GABRIEL QUEIROZ FERNANDES', 'gabrielqfs@gmail.com', '24368', 'GO', 'GABRIEL FERNANDES (24368)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '710.200.121-53', 'PORTA', '6307a9b9325f3', 'confirmado', '25/08/2022 13:56'),
(50, 'MAYARA RITA FIGUEREDO', 'mayararita10@hotmail.com', '28352', 'GO', 'MAYARA FIGUEREDO (28352)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '030.935.681-45', 'PORTA', '6307dc00d103a', 'confirmado', '25/08/2022 17:30'),
(51, 'GABRIELA MAIA BARBOSA', 'gabiimbarbosa@gmail.com', '27126', 'GO', 'GABRIELA MAIA (27126)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '055.827.021-21', 'PORTA', '6307e9bd5ac2d', 'confirmado', '25/08/2022 18:29'),
(52, 'ANA FLAVIA HENRIQUE ACCIOLI MARTINS SOARES', 'acciolianaflavia@gmail.com', '29246', 'GO', 'ANA FLAVIA (29246)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '021.318.041-30', 'PORTA', '6307efedd82b0', 'confirmado', '25/08/2022 18:55'),
(53, 'LARA RANULFO DE MENDONCA', 'lararanulfo.m@gmail.com', '29176', 'GO', 'LARA RANULFO (29176)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '047.469.741-01', 'PORTA', '63081bd7459a7', 'confirmado', '25/08/2022 22:03'),
(54, 'LARISSA MARTINS VIEIRA DE ANDRADE', 'larissamvandrade@gmail.com', '28526', 'GO', 'LARISSA ANDRADE (28526)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '701.800.151-09', 'PORTA', '630894b6a21ce', 'confirmado', '26/08/2022 06:39'),
(55, 'LUCAS MACHADO VIEIRA', 'lucas.mvie@gmail.com', '29584', 'GO', 'LUCAS MACHADO (29584)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '050.520.081-39', 'PORTA', '6308be6daafb9', 'confirmado', '26/08/2022 09:37'),
(56, 'ANDRE LUIZ CAVALCANTE CIRQUEIRA', 'acavalcante1961@gmail.com', '27790', 'GO', 'ANDRE LUIZ (27790)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '027.658.401-56', 'SALA VERMELHA', '6309050f27c13', 'confirmado', '26/08/2022 14:38'),
(57, 'ISABELA GONCALVES COSTA', 'isabela.costa.igc@gmail.com', '28112', 'GO', 'ISABELA GONCALVES (28112)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '061.130.021-44', 'PORTA', '630923201cdb7', 'confirmado', '26/08/2022 16:46'),
(58, 'VALTER LUIS FIUZA JUNIOR', 'valter.lfj@gmail.com', '30012', 'GO', 'VALTER FIUZA (30012)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '042.742.971-44', 'PORTA', '63094cc1cacfb', 'confirmado', '26/08/2022 19:44'),
(59, 'NICOLE DE SOUZA MELO', 'nickmelo021@gmail.com', '27360', 'GO', 'NICOLE MELO (27360)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '702.137.781-90', 'PORTA', '630cefe30d722', 'confirmado', '29/08/2022 13:57'),
(60, 'LORENA CAMILA GALVANI', 'lorenacgalvani@gmail.com', '29117', 'GO', 'LORENA GALVANI (29117)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '042.207.451-90', 'PORTA', '630d0491ded7f', 'confirmado', '29/08/2022 15:25'),
(61, 'GEOVANNA RODRIGUES DE OLIVEIRA', 'geovannarod4@gmail.com', '28674', 'GO', 'GEOVANNA RODRIGUES (28674)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '702.572.721-00', 'PORTA', '630fa5040b574', 'confirmado', '31/08/2022 15:14'),
(63, 'PEDRO HENRIQUE DE ABREU SOUZA ZANINE', 'phzanine@gmail.com', '29910', 'GO', 'PEDRO ZANINE (29910)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.971.041-40', 'SALA VERMELHA;PORTA', '630fa68a51390', 'confirmado', '31/08/2022 15:20'),
(64, 'NAYARA VIEIRA CANêDO', 'nayaracanedo1@gmail.com', '30325', 'GO', 'NAYARA CANÊDO (30325)', 'NV CANEDO CLÍNICA MÉDICA ', '47.079.539/0001-41', '951.845.552-20', 'PORTA', '630fafb99ade7', 'confirmado', '31/08/2022 16:00'),
(65, 'LOHANA MENDONCA LINHARES', 'lohanamendonca27@hotmail.com', '29328', 'GO', 'LOHANA MENDONCA (29328)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.083.551-69', 'PORTA', '630fb05221f90', 'confirmado', '31/08/2022 16:02'),
(66, 'KIARA LORENA PANE BARBOZA', 'kiara.pane8@gmail.com', '30023', 'GO', 'KIARA PANE (30023)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '107.563.001-00', 'PORTA', '630fc5b4b44f8', 'confirmado', '31/08/2022 17:33'),
(67, 'CAROLLINE PATAN DE MATOS', 'carolpatan@gmail.com', '27540', 'GO', 'CAROLLINE PATAN (27540)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '039.730.021-26', 'PORTA', '630fd56b79297', 'confirmado', '31/08/2022 18:40'),
(68, 'MARCOS FONSECA BARBOSA', 'marcosbae5@hotmail.com', '27969', 'GO', 'MARCOS FONSECA (27969)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '789.780.412-72', 'PORTA', '630fd6119c2c9', 'confirmado', '31/08/2022 18:43'),
(69, 'THAYSA CARDOSO SILVA', 'thaysacardoso_1@hotmail.com', '21356', 'GO', 'THAYSA CARDOSO (21356)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '016.920.021-39', 'SALA VERMELHA;PORTA', '630fd9dc6600e', 'confirmado', '31/08/2022 18:59'),
(70, 'ISABELLA FRANçOISE TELES', 'isabellafrancoiseteles@gmail.com', '28954', 'GO', 'ISABELLA FRANÇOISE (28954)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '045.361.031-55', 'PORTA', '630ff84940c44', 'confirmado', '31/08/2022 21:09'),
(71, 'ARTHUR CAMARGO PIRES', 'camargopires02@gmail.com', '28300', 'GO', 'ARTHUR CAMARGO (28300)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '701.094.231-51', 'PORTA', '630ffde8a1b9c', 'confirmado', '31/08/2022 21:33'),
(72, 'SARAH NOGUEIRA MARINS', 'sarahmarins9@gmail.com', '27663', 'GO', 'SARAH MARINS (27663)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '037.783.911-60', 'PORTA', '630fff8d72a1c', 'confirmado', '31/08/2022 21:40'),
(73, 'MATHEUS VINICIUS FERNANDES SANTOS', 'mths.vncs@gmail.com', '27774', 'GO', 'MATHEUS VINICIUS (27774)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '061.994.741-12', 'SALA VERMELHA', '6310a6d3b44e5', 'confirmado', '01/09/2022 09:34'),
(74, 'LUIZ OTáVIO VILELA REBOUçAS', 'luiz.reboucas21@gmail.com', '29305', 'GO', 'LUIZ OTÁVIO (29305)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '027.599.661-19', 'SALA VERMELHA', '6310a96d4e7b0', 'confirmado', '01/09/2022 09:45'),
(75, 'ADELICIO APOLINARIO DE SOUSA', 'adeliciofisica@gmail.com', '23816', 'GO', 'ADELICIO APOLINARIO  (23816)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '999.764.121-34', 'SALA VERMELHA;PORTA', '6310ad80a3470', 'confirmado', '01/09/2022 10:02'),
(76, 'PAULO TEODORO BUENO LOPES', 'buenolopes@outlook.com', '19934', 'GO', 'PAULO TEODORO (19934)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '032.663.471-10', 'PORTA', '6310b23818eb8', 'confirmado', '01/09/2022 10:23'),
(77, 'ALINE FREIRE SILVA LIMA', 'alinefreirelima1@gmail.com', '26999', 'GO', 'ALINE LIMA (26999)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '002.430.951-63', 'SALA VERMELHA;PORTA', '6310d3ca1a2bb', 'confirmado', '01/09/2022 12:46'),
(78, 'ISABELA CARVALHO VILELA PEREIRA CAMARGO', 'isabelavilela26@hotmail.com', '29775', 'GO', 'ISABELA CAMARGO (29775)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '740.685.801-97', 'SALA VERMELHA;PORTA', '6310e825057f8', 'confirmado', '01/09/2022 14:13'),
(79, 'JULIANA ALVES DE SOUSA TEIXEIRA', 'juasteixeira@hotmail.com', '24232', 'GO', 'JULIANA ALVES (24232)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '035.685.261-07', 'PORTA', '6310eff52aa95', 'confirmado', '01/09/2022 14:46'),
(80, 'MANOEL LUIZ FRANCA JúNIOR', 'manoel_juninho@hotmail.com', '28815', 'GO', 'MANOEL FRANCA (28815)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '704.269.241-18', 'SALA VERMELHA;PORTA', '6310fd9e7c4b2', 'confirmado', '01/09/2022 15:44'),
(81, 'ADERRONE VIEIRA MENDES', 'aderrone@hotmail.com', '30429', 'GO', 'ADERRONE MENDES (30429)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '548.771.301-44', 'PORTA', '63120e18466d3', 'confirmado', '02/09/2022 11:07'),
(82, 'RAFAEL AVELLO DE MATOS', 'avellodematos@gmail.com', '27562', 'GO', 'RAFAEL AVELLO (27562)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '052.035.221-11', 'PORTA', '63125032a92df', 'confirmado', '02/09/2022 15:49'),
(83, 'HEBERSON BRITO BESSA', 'hebersonb@gmail.com', '30322', 'GO', 'HEBERSON BRITO (30322)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '028.609.661-70', 'SALA VERMELHA;PORTA', '6313989c031f4', 'confirmado', '03/09/2022 15:10'),
(84, 'RENAN ANDRé DE ÁVILA', 'renanavila2502@gmail.com', '30067', 'GO', 'RENAN ÁVILA (30067)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '045.088.471-61', 'PORTA', '6314c7ab807e7', 'confirmado', '04/09/2022 12:43'),
(85, 'LUCAS MARTINS MORAIS', 'lucas.martins23@hotmail.com', '29823', 'GO', 'LUCAS MARTINS (29823)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '070.521.156-89', 'PORTA', '6314ca303daa4', 'confirmado', '04/09/2022 12:54'),
(86, 'RAQUEL BARCELOS ANDRADE', 'raquelba04@gmail.com', '27586', 'GO', 'RAQUEL BARCELOS (27586)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '117.766.646-47', 'PORTA', '6314ca35ac57e', 'confirmado', '04/09/2022 12:54'),
(87, 'PEDRO PAULO COUTO DE OLIVEIRA', 'pedropaulo.couto@hotmail.com', '10885', 'GO', 'PEDRO COUTO (10885)', 'MEDCORE', '21.095.402/0001-97', '839.085.361-20', 'PORTA', '6314ca443524d', 'confirmado', '04/09/2022 12:54'),
(88, 'THALITA SILVA CARVALHO', 'drathalitasc@gmail.com', '29558', 'GO', 'THALITA CARVALHO (29558)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '037.959.461-74', 'PORTA', '6314cc1febe3a', 'confirmado', '04/09/2022 13:02'),
(89, 'ISABELLA RODRIGUES SILVA TOVAR', 'isabellatovarmedica@gmail.com', '27286', 'GO', 'ISABELLA TOVAR (27286)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '024.925.601-04', 'PORTA', '63150d2ad9f71', 'confirmado', '04/09/2022 17:40'),
(90, 'THAIS ALVES COUTO', 't.alvescouto@gmail.com', '28754', 'GO', 'THAIS ALVES (28754)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '031.258.261-79', 'PORTA', '63151922b6c94', 'confirmado', '04/09/2022 18:31'),
(91, 'MATEUS BARCELOS COPPOLLA', 'coppolla15@gmail.com', '27196', 'GO', 'MATEUS BARCELOS (27196)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '033.442.531-07', 'PORTA', '6315414de3c42', 'confirmado', '04/09/2022 21:22'),
(92, 'FLAVIO ADRIANO MACHADO', 'flavio.machaddo@gmail.com', '8224', 'GO', 'FLAVIO ADRIANO (8224)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '789.239.131-20', 'SALA VERMELHA;PORTA', '63156c65e14a7', 'confirmado', '05/09/2022 00:26'),
(93, 'ANNA CLARA MACHADO GOMES', 'claraanna013@gmail.com', '27785', 'GO', 'ANNA CLARA (27785)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '014.715.551-78', 'PORTA', '63160e3df1649', 'confirmado', '05/09/2022 11:57'),
(94, 'GUSTAVO FARIA LIMA', 'gustavofaria_10@hotmail.com', '27825', 'GO', 'GUSTAVO LIMA (27825)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '000.421.992-98', 'SALA VERMELHA', '63161fe080cfe', 'confirmado', '05/09/2022 13:12'),
(95, 'NICYAN DANTAS FERREIRA', 'dantasnicyan@gmail.com', '23386', 'GO', 'NICYAN FERREIRA (23386)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '021.252.371-64', 'SALA VERMELHA;PORTA', '63162138b33d6', 'confirmado', '05/09/2022 13:18'),
(96, 'RAYANNE DE DEUS GUEDES AVILA', 'rayanneguedes10@hotmail.com', '21331', 'GO', 'RAYANNE GUEDES (21331)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '013.764.831-65', 'PORTA', '631631164dc1b', 'confirmado', '05/09/2022 14:25'),
(97, 'RICARDO RABELO AGUILAR', 'ricardorabeloaguilar@gmail.com', '28955', 'GO', 'RICARDO RABELO (28955)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.491.031-80', 'PORTA', '631652dfc3f81', 'confirmado', '05/09/2022 16:49'),
(98, 'JEAN CARLOS NAVES', 'jeancnaves@gmail.com', '9309', 'GO', 'JEAN NAVES (9309)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '532.646.901-44', 'PORTA', '63172db7adfc1', 'confirmado', '06/09/2022 08:23'),
(99, 'CLEBER JOSé DE FREITAS', 'cleber.energy2@gmail.com', '30279', 'GO', 'CLEBER FREITAS (30279)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '619.240.671-53', 'PORTA', '63177185cb7c9', 'confirmado', '06/09/2022 13:12'),
(100, 'JúLIA VELOSO ROMãO', 'juliaromao96@hotmail.com', '30447', 'GO', 'JÚLIA ROMÃO (30447)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '702.886.321-25', 'PORTA', '6317bade2005a', 'confirmado', '06/09/2022 18:25'),
(101, 'SALES PAULO DA SILVA NETO', 'spsn15@gmail.com', '26080', 'GO', 'SALES PAULO (26080)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '023.592.071-13', 'PORTA', '6318bf539e116', 'confirmado', '07/09/2022 12:57'),
(102, 'ARTHUR GUERRA GARCIA', 'arthurgguerra@hotmail.com', '28062', 'GO', 'ARTHUR GARCIA (28062)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '963.695.821-15', 'SALA VERMELHA;PORTA', '6319c3a574e66', 'confirmado', '08/09/2022 07:27'),
(103, 'ILIANA JUSTIZ ABREU', 'ilianajustiz@gmail.com', '30538', 'GO', 'ILIANA JUSTIZ (30538)', 'IJ ABREU CLINICA MEDICA ', '47.110.064/0001-09', '074.924.321-00', 'PORTA', '631a454f50e28', 'confirmado', '08/09/2022 16:41'),
(104, 'THIAGO DE OLIVEIRA ESPíNDOLA', 'thiagoespindola.med@gmail.com', '29022', 'GO', 'THIAGO ESPÍNDOLA (29022)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '029.391.231-95', 'SALA VERMELHA;PORTA', '631a9bdc03ad8', 'confirmado', '08/09/2022 22:50'),
(105, 'VICTOR AUGUSTHO BARBOSA', 'victoraugustho@icloud.com', '29251', 'GO', 'VICTOR BARBOSA (29251)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '041.907.961-07', 'PORTA', '631bac0dbf704', 'confirmado', '09/09/2022 18:11'),
(108, 'SABRINA DE CASTRO SILVA', 'sabrinacastro12@hotmail.com', '30483', 'GO', 'SABRINA CASTRO (30483)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '074.059.455-97', 'PORTA', '631c8235ee594', 'confirmado', '10/09/2022 09:25'),
(109, 'DANDARA SOARES DA SILVA', 'dandara-fise@hotmail.com', '30480', 'GO', 'DANDARA SOARES (30480)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '049.465.113-00', 'PORTA', '631c835bd0131', 'confirmado', '10/09/2022 09:30'),
(110, 'ISADORA CAMPOS KHAOULE', 'isadorack@hotmail.com', '30527', 'GO', 'ISADORA KHAOULE (30527)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '029.785.221-35', 'PORTA', '631f559766e40', 'confirmado', '12/09/2022 12:51'),
(111, 'PAULA ANDREZA LOURES', 'paula.al20015@gmail.com', '30281', 'GO', 'PAULA ANDREZA (30281)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '041.981.641-00', 'PORTA', '6320764a3e0df', 'confirmado', '13/09/2022 09:23'),
(112, 'BARUC ALVES', 'drbarucalves@gmail.com', '27552', 'GO', 'BARUC ALVES (27552)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '058.131.305-43', 'PORTA', '63222dd699e94', 'confirmado', '14/09/2022 16:39'),
(113, 'MARIANA LIMA DE MORAIS', 'marianalimamorais@hotmail.com', '29158', 'GO', 'MARIANA MORAIS (29158)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '035.691.001-62', 'PORTA', '63223713c982f', 'confirmado', '14/09/2022 17:18'),
(114, 'FERNANDA KELLY ALVES ALCANTARA', 'fernandameduni15@gmail.com', '28964', 'GO', 'FERNANDA KELLY (28964)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '033.087.431-40', 'PORTA', '63224b7f36d66', 'confirmado', '14/09/2022 18:45'),
(115, 'SIANDRA CORDEIRO ALVES DE ALARCãO SOARES', 'siandrasoares@hotmail.com', '28433', 'GO', 'SIANDRA CORDEIRO (28433)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '533.072.161-04', 'PORTA', '63225bd0e57a0', 'confirmado', '14/09/2022 19:55'),
(116, 'JOSE ELIAS RODRIGUES SOUZA SCAFF', 'jescaff1000@gmail.com', '29307', 'GO', 'JOSE ELIAS (29307)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '703.504.201-65', 'PORTA', '63228770b69db', 'confirmado', '14/09/2022 23:01'),
(117, 'LEANDRO REZENDE DE SOUZA JUNIOR', 'leandrojrsquash@hotmail.com', '23892', 'GO', 'LEANDRO REZENDE (23892)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '043.175.311-35', 'SALA VERMELHA;PORTA', '63235aaca06f0', 'confirmado', '15/09/2022 14:02'),
(118, 'GéSSICA HELEN DE MELO', 'gessica.helen@hotmail.com', '29721', 'GO', 'GÉSSICA MELO (29721)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '051.379.401-86', 'PORTA', '6323772ad93ab', 'confirmado', '15/09/2022 16:04'),
(119, 'ISABELLA ALVES REZENDE', 'isabellaalvessr@gmail.com', '27617', 'GO', 'ISABELLA REZENDE (27617)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '016.034.371-26', 'PORTA', '6323864e0144c', 'confirmado', '15/09/2022 17:08'),
(120, 'PALLOMA MIRANDA CARVALHO', 'pallomamiranda@outlook.com.br', '30501', 'GO', 'PALLOMA MIRANDA (30501)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '011.629.302-09', 'PORTA', '6323b11bf3001', 'confirmado', '15/09/2022 20:11'),
(121, 'GABRIEL NOGUEIRA SILVA', 'nogueira.gns@gmail.com', '29331', 'GO', 'GABRIEL NOGUEIRA (29331)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.519.821-29', 'PORTA', '6329f07b7fe14', 'confirmado', '20/09/2022 13:55'),
(122, 'TAMIRES ROCHA SANCHES', 'tamiresrs.med@gmail.com', '22236', 'GO', 'TAMIRES SANCHES (22236)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '031.084.761-30', 'PORTA', '6329f95b50fee', 'confirmado', '20/09/2022 14:33'),
(123, 'JULLYANA EGITO PEIXOTO DA COSTA', 'jullyanaegito@gmail.com', '28317', 'GO', 'JULLYANA EGITO (28317)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.913.161-97', 'SALA VERMELHA;PORTA', '632de4f181194', 'novo', '23/09/2022 13:55'),
(124, 'ANA BEATRIZ LUSTOSA NASCIMENTO', 'anabeatrizlustosa96@gmail.com', '30077', 'GO', 'ANA BEATRIZ (30077)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.770.851-08', 'PORTA', '632e5b0d7ebc2', 'novo', '23/09/2022 22:19'),
(125, 'DANIELA EUGêNIO HORBYLON', 'dhorbylon@gmail.com', '28080', 'GO', 'DANIELA HORBYLON (28080)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '033.955.171-28', 'PORTA', '6335820a3a352', 'confirmado', '29/09/2022 08:31'),
(126, 'MATHEUS NASCENTE BORGES', 'matnb01@hotmail.com', '29782', 'GO', 'MATHEUS NASCENTE (29782)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '007.151.081-82', 'PORTA', '6335cbf8ccd4c', 'confirmado', '29/09/2022 13:46'),
(127, 'ANGELICA CRISTINA BEZERRA SIRINO ROSA', 'angelsirino@gmail.com', '28534', 'GO', 'ANGELICA CRISTINA (28534)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '700.460.461-60', 'PORTA', '6335e25b7f101', 'confirmado', '29/09/2022 15:22'),
(128, 'MATHEUS MENDONCA MARCOLINO', 'matheusmendoncamarcolino@gmail.com', '26793', 'GO', 'MATHEUS MENDONCA (26793)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '016.832.871-26', 'PORTA', '6335f06a6b307', 'confirmado', '29/09/2022 16:22'),
(129, 'ISADORA ZUPELLI RODRIGUES', 'isadorazr@hotmail.com', '30422', 'GO', 'ISADORA ZUPELLI (30422)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '017.985.711-88', 'PORTA', '6336f8060a01e', 'novo', '30/09/2022 11:07'),
(130, 'KETHELIN KELLER SILVA FRANçA', 'kethelinkellersf@gmail.com', '28995', 'GO', 'KETHELIN KELLER (28995)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '021.243.761-52', 'PORTA', '633b4d1e05c02', 'confirmado', '03/10/2022 17:59'),
(131, 'MARIANNA FINCATTO BERTHIER', 'mariannaberthier@gmail.com', '29415', 'GO', 'MARIANNA BERTHIER (29415)', 'RPC E ASSOCIADOS S/S LTDA', '20.755.503/0001-84', '006.283.580-75', 'PORTA', '633db9ea67830', 'novo', '05/10/2022 14:07');

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
(1, 'GERAL');

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `setembro`
--

CREATE TABLE `setembro` (
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
  `D30` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `setembro`
--

INSERT INTO `setembro` (`ID`, `Visible`, `bgcolor`, `Hora_Func`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`, `D9`, `D10`, `D11`, `D12`, `D13`, `D14`, `D15`, `D16`, `D17`, `D18`, `D19`, `D20`, `D21`, `D22`, `D23`, `D24`, `D25`, `D26`, `D27`, `D28`, `D29`, `D30`) VALUES
(1, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, '1', '#C65911_#FFFFFF', '07:00 - 13:00 (GERAL)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)'),
(22, '1', '#C65911_#FFFFFF', '07:00 - 13:00 (GERAL)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)'),
(23, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, '1', '#833C0C_#FFFFFF', '13:00 - 19:00 (GERAL)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)'),
(82, '1', '#833C0C_#FFFFFF', '13:00 - 19:00 (GERAL)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)'),
(83, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(108, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(109, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(110, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(111, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(112, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(113, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(114, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(115, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(116, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(117, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(118, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(119, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(120, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(121, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(122, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(123, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(124, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(125, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(126, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(129, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(130, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(131, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(132, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(133, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(137, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, '1', '#6C0000_#FFFFFF', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(143, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(144, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(145, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(146, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(147, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(148, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(150, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(151, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(152, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(153, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(154, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(155, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(156, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(160, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(162, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(163, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(164, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(165, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(167, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(168, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(169, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(170, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(171, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(172, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(173, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(174, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(175, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(176, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(177, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(178, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(179, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(180, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(181, '1', '#6C0000_#FFFFFF', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(182, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(183, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(184, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(185, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(186, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(187, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(188, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(189, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(190, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(191, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(192, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(193, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(194, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(195, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(196, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(197, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(198, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(199, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(200, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `setembrofixa`
--

CREATE TABLE `setembrofixa` (
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
  `D30` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `setembrofixa`
--

INSERT INTO `setembrofixa` (`ID`, `Visible`, `bgcolor`, `Hora_Func`, `D1`, `D2`, `D3`, `D4`, `D5`, `D6`, `D7`, `D8`, `D9`, `D10`, `D11`, `D12`, `D13`, `D14`, `D15`, `D16`, `D17`, `D18`, `D19`, `D20`, `D21`, `D22`, `D23`, `D24`, `D25`, `D26`, `D27`, `D28`, `D29`, `D30`) VALUES
(1, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, '0', '', '07:00 - 13:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, '1', '#C65911_#FFFFFF', '07:00 - 13:00 (GERAL)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)'),
(22, '1', '#C65911_#FFFFFF', '07:00 - 13:00 (GERAL)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)'),
(23, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, '0', '', '07:00 - 13:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, '0', '', '11:00 - 17:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(76, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(77, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(78, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(79, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(80, '0', '', '13:00 - 19:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(81, '1', '#83C8C3_#FFFFFF', '13:00 - 19:00 (GERAL)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)', '', '', 'MARCIO POLO (10918)', '', 'MARCIO POLO (10918)', 'THIAGO ESPÍNDOLA (29022)', 'MARCIO POLO (10918)'),
(82, '1', '#83C8C3_#FFFFFF', '13:00 - 19:00 (GERAL)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)', '', '', 'LOHANA LINHARES (29328)', '', 'THIAGO ESPÍNDOLA (29022)', '', 'RICARDO COUTINHO (27761)'),
(83, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(86, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(94, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(95, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(96, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(97, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(98, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(99, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(100, '0', '', '13:00 - 19:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(101, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(102, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(103, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(104, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(105, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(106, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(107, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(108, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(109, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(110, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(111, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(112, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(113, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(114, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(115, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(116, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(117, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(118, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(119, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(120, '0', '', '17:00 - 23:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(121, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(122, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(123, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(124, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(125, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(126, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(128, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(129, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(130, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(131, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(132, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(133, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(135, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(137, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(138, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, '0', '', '19:00 - 01:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(141, '1', '#6C0000_#FFFFFF', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(143, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(144, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(145, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(146, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(147, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(148, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(150, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(151, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(152, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(153, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(154, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(155, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(156, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(157, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(160, '0', '', '19:00 - 01:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(162, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(163, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(164, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(165, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(167, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(168, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(169, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(170, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(171, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(172, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(173, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(174, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(175, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(176, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(177, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(178, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(179, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(180, '0', '', '01:00 - 07:00 (LIDER)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(181, '1', '#6C0000_#FFFFFF', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(182, '0', '', '01:00 - 07:00 (PORTA)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(183, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(184, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(185, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(186, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(187, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(188, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(189, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(190, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(191, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(192, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(193, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(194, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(195, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(196, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(197, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(198, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(199, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(200, '0', '', '01:00 - 07:00 (GERAL)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Índices para tabelas despejadas
--

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
-- Índices de tabela `setembro`
--
ALTER TABLE `setembro`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `setembrofixa`
--
ALTER TABLE `setembrofixa`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `corpo_clinico`
--
ALTER TABLE `corpo_clinico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `setembro`
--
ALTER TABLE `setembro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de tabela `setembrofixa`
--
ALTER TABLE `setembrofixa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
