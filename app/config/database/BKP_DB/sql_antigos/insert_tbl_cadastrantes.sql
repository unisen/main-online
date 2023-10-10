-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05/07/2023 às 19:57
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

--
-- Despejando dados para a tabela `tbl_cadastrantes`
--

INSERT INTO `tbl_cadastrantes` (`ID`, `CONTRATO`, `INSCRIÇÃO`, `SEXO`, `ESTADO CIVIL`, `NOME COMPLETO`, `FILIAÇÃO`, `CRM`, `TELEFONE`, `E-MAIL`, `DATA DE NASCIMENTO`, `RG`, `NATURALIDADE`, `NACIONALIDADE`, `CPF`, `TITULO DE ELEITOR`, `PIS`, `ENDEREÇO`, `ENDEREÇO NO NOME`, `DADOS BANCARIOS`, `FUNÇÃO`, `ESPECIALIDADE`, `senha`, `ID PLANILHA`, `EMPRESA`, `STATUS`, `confirmacao`, `submission_date`, `ARQUIVO`) VALUES
(1, '', '', 'feminino', 'casado', 'JULIANNE SOUZA GUERRA', 'JOSE LUCIO GUERRA e MARIA APARECIDA DE SOUSA GUERRA', '31636GO', '(62) 99438-3333', 'juliannesouzamed@hotmail.com', '13/04/1985', '5238322 / SSP-GO / DE: 13/02/2014', 'GOIANIA-GO', 'brasileira', '741.607.531-91', '053901051031', '1372610031-7', 'RUA SALVADOR Q123 L14/ 21, RES. PLAZA DE ESPANA. APT 301B. PARQUE AMAZNOIA', 'SIM', 'CPF-741.607.531-91', '', '', '63d27572d0c074bd78c147f195049b29e28b9b74', 'JULIANNE GUERRA (31636)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '64388896c3cfa31636GO', '13/04/2023 19:56', './cadastrantes/31636GO/JULIANNE SOUZA GUERRA - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CARTAO DE VACINA [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CARTEIRA CRM [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CPF [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CURRICULUM VITAE [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - CURSO DE CAPACITACAO [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - DIPLOMA [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - FOTO [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - PIS [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - RG [1].pdf;./cadastrantes/31636GO/JULIANNE SOUZA GUERRA - TITULO DE ELEITOR [1].pdf'),
(302, '', '', 'feminino', 'solteiro', 'LARISSA DE MOURA GOULART ASSIS', 'ROGÉRIO GUIMARÃES GOULART ASSIS e GEOVANIA CARLA DE MOURA ASSIS', '31587GO', '(16) 99700-6169', 'larissa.goulartm@hotmail.com', '20/01/1997', '8449455 / ssp go-GO / DE: 02/01/2023', 'ARAXÁ-MG', 'brasileira', '128.515.916-06', '211798480272', '20760218794', 'Rua 260, 600, ap 501', 'NÃO', 'CPF-128.515.916-06', '', '', '32bd5a0d83f8cf0e4301d701fc2fddfd60724f2a', 'LARISSA MOURA (31587)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '6438957a051e331587GO', '13/04/2023 20:51', './cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CARTAO DE VACINA [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CARTEIRA CRM [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CPF [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CURRICULUM VITAE [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - CURSO DE CAPACITACAO [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - DIPLOMA [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - PIS [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - RG [1].pdf;./cadastrantes/31587GO/LARISSA DE MOURA GOULART ASSIS - TITULO DE ELEITOR [1].pdf'),
(303, '', '', 'masculino', 'solteiro', 'PAULO MARCOS DO NASCIMENTO', 'FRANCISCO ANTONIO DO NASCIMENTO e RITA DE CASSIA DA SILVA NASCIMENTO', '17571GO', '(62) 99538-0220', 'pmn2376@gmail.com', '10/03/1986', '4604263 / sspgo-GO / DE: 10/03/1986', 'CERES-GO', 'brasileira', '009.890.681-02', '052994971007', '11995355377', 'rua 46, numero 545, apto 1602', 'SIM', 'Celular-(62) 99538-0220', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'PAULO MARCOS (17571)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '64395afe03b0017571GO', '14/04/2023 10:54', './cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CARTAO DE VACINA [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CARTEIRA CRM [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - COMPROVANTE DE ALISTAMENTO MILITAR [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - CPF [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - DIPLOMA [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - FOTO [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - PIS [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - RG [1].pdf;./cadastrantes/17571GO/PAULO MARCOS DO NASCIMENTO - TITULO DE ELEITOR [1].pdf'),
(304, '', '', 'feminino', 'divorciado', 'LARISSA PFRIMER CAPUZZO', 'JOSÉ HUMBERTO CAPUZZO e IRMA JULIANA PFRIMER CAPUZZO', '18720GO', '(62) 99656-4883', 'larissapfrimer@gmail.com', '08/11/1989', '5025413 / SPTC-GO / DE: 28/01/2004', 'GOIÂNIA-GO', 'brasileira', '032.235.981-38', '057454601040', '21284923837', 'RUA C 180 QUADRA 444 LOTE 05 CASA 02 SETOR JARDIM AMERICA', 'SIM', 'CPF-032.235.981-38', '', '', 'e03f856b092bf8cfb75f44038b8c99d32da616db', 'LARISSA PFRIMER (18720)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '643dd21659ccb18720GO', '17/04/2023 20:11', './cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [2].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [3].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CARTAO DE VACINA [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CARTEIRA CRM [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CARTEIRA CRM [2].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CPF [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - CURRICULUM VITAE [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - DIPLOMA [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - FOTO [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - PIS [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - RG [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - TITULO DE ELEITOR [1].pdf;./cadastrantes/18720GO/LARISSA PFRIMER CAPUZZO - TITULO DE ELEITOR [2].pdf'),
(305, '', '', 'feminino', 'casado', 'GISELLE MIRANDA VINHADELLI', 'AILTON GOUVEA VINHADELLI e NILVA MARTINS MIRANDA VINHADELLI', '31017GO', '(64) 98132-7444', 'vinhadelligiselle@gmail.com', '24/08/1993', '5670733 / ssp -GO / DE: 28/08/2010', 'BOM JESUS -GO', 'brasileira', '749.645.851-15', '062232541015', '9866738', 'Rua GV 05 QUADRA 12 LOTE 16 CONDOMINIO RESIDENCIAL GRANVILLE CEP 74366018', 'SIM', 'CPF-749.645.851-15', '', '', 'a2d6b7d2eedd8c0ec59529fff986b1d23769a2df', 'GISELLE MIRANDA (31017)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '64429d8c7d29e31017GO', '21/04/2023 11:28', './cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CARTAO DE VACINA [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CARTEIRA CRM [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CPF [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - CURRICULUM VITAE [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - DIPLOMA [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - FOTO [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - PIS [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - RG [1].pdf;./cadastrantes/31017GO/GISELLE MIRANDA VINHADELLI - TITULO DE ELEITOR [1].pdf'),
(306, '', '', 'masculino', 'solteiro', 'GABRIEL ELIAS DE LIMA BARROS', 'ROSENVAL ELIAS DE LIMA e MÔNICA BEATRIZ DE BARROS LIMA', '32024GO', '(62) 99179-4743', 'gabrelias20@outlook.com', '16/12/1997', '5048421 / Secretaria de Segurança Pública-GO / DE: 01/08/2014', 'GOIÂNIA-GO', 'brasileira', '019.422.851-75', '067388671015', '11780965634', 'Rua das Margaridas, Quadra 14, lote 7', 'NÃO', 'Celular-(62) 99179-4743', '', '', 'ba7a668ea691ab4d55966c74beddab655552ecf4', 'GABRIEL ELIAS (32024)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '645111e92c4b932024GO', '02/05/2023 10:36', './cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CARTAO DE VACINA [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CARTEIRA CRM [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - COMPROVANTE DE ALISTAMENTO MILITAR [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CPF [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - CURRICULUM VITAE [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - DIPLOMA [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - FOTO [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - PIS [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - RG [1].pdf;./cadastrantes/32024GO/GABRIEL ELIAS DE LIMA BARROS - TITULO DE ELEITOR [1].pdf'),
(307, '', '', 'feminino', 'solteiro', 'KAROLINE ALMEIDA SATO', 'RICARDO DIAS SATO e ADRIANE DE ALMEIDA SATO', '32019GO', '(62) 99680-5422', 'drikamile@hotmail.com', '25/03/1997', '6241775 / ssp-GO / DE: 15/08/2012', 'SANTA HELENA DE GOIAS-GO', 'brasileira', '703.104.361-17', '065584831007', '26902446537', 'jd atlantico, ed terra mundi pq cascavel ap 404 premium', 'NÃO', 'CPF-703.104.361-17', '', '', 'ad8aed4866843be0cb1f6bafc1630c7d777679fc', 'KAROLINE SATO (32019)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '64515d1e5e64d32019GO', '02/05/2023 15:57', './cadastrantes/32019GO/KAROLINE ALMEIDA SATO - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CARTAO DE VACINA [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CARTEIRA CRM [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CPF [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - CURRICULUM VITAE [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - DIPLOMA [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - FOTO [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - PIS [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - RG [1].pdf;./cadastrantes/32019GO/KAROLINE ALMEIDA SATO - TITULO DE ELEITOR [1].pdf'),
(308, '', '', 'feminino', 'solteiro', 'CAROLINA SILVA OLIVEIRA', 'CARLOS GERALDO DE OLIVEIRA e MARIA HELENA DA SILVA', '32023GO', '(62) 98111-9822', 'carolinasoliveira3@gmail.com', '07/04/1999', '5712356 / SSP GO-GO / DE: 25/01/2017', 'GOIÂNIA-GO', 'brasileira', '006.402.261-75', '067391531023', '27061101925', 'Rua 135, número 720, setor Marista, Ed. Premier Blanc, Ap. 1202', 'NÃO', 'CPF-006.402.261-75', '', '', '87182f350327b712883edd7479dbf5c3fe182db2', 'CAROLINA OLIVEIRA (32023)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '6451c29d3ae1a32023GO', '02/05/2023 23:10', './cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CARTAO DE VACINA [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CPF [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - CURRICULUM VITAE [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - DIPLOMA [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - FOTO [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - PIS [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - RG [1].pdf;./cadastrantes/32023GO/CAROLINA SILVA OLIVEIRA - TITULO DE ELEITOR [1].pdf'),
(309, '', '', 'feminino', 'casado', 'FRANSCINE LEAO RODRIGUES ACAR PEREIRA', 'CARLOS EDUARDO DE PAULA RODRIGUES e TANIA GARCIA LEAO RODRIGUES', '015504GO', '(62) 98459-5700', 'franscinelr@yahoo.com.br', '27/10/1982', '4131974 / DGPC-GO / DE: 13/10/1997', 'GOIANIA-GO', 'brasileira', '726.962.061-04', '048677611023 SEÇÃO 2', '19026677270', 'RUA T 60 N 57 AP 302 SETOR BUENO GOIANIA - GO CEP 74.223-160', 'SIM', 'CPF-726.962.061-04', '', '', '6e69f0d3ee6ce3cceaa90c26f03ac8dea73f8012', 'FRANSCINE LEAO (015504)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '6453f85550a5d015504GO', '04/05/2023 15:24', './cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CARTAO DE VACINA [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CARTEIRA CRM [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CPF [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - CURRICULUM VITAE [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - DIPLOMA [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - FOTO [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - PIS [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - RG [1].pdf;./cadastrantes/015504GO/FRANSCINE LEAO RODRIGUES ACAR PEREIRA - TITULO DE ELEITOR [1].pdf'),
(310, '', '', 'feminino', 'solteiro', 'THAIS CARVALHO BOMTEMPO', 'ENIO MARTINS BOMTEMPO e ALTAMIRA CRISTINA DE CARVALHO BOMTEMPO', '29469GO', '(62) 98137-9510', 'bomtempo.thais@gmail.com', '21/11/1994', '5974112 / SSP-GO / DE: 04/11/2010', 'GOIANIA-GO', 'brasileira', '711.419.101-44', '062339161082', '21286437190', 'RUA X QUADRA A, LOTE 2', 'NÃO', 'Celular-(62) 98137-9510', '', '', '487cddfb37636c3409ec1098975ef80fddcc06f4', 'THAIS BOMTEMPO (29469)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '64567b68c390c29469GO', '06/05/2023 13:08', './cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CARTAO DE VACINA [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CARTEIRA CRM [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CPF [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - CURRICULUM VITAE [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - DIPLOMA [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - FOTO [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - PIS [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - RG [1].pdf;./cadastrantes/29469GO/THAIS CARVALHO BOMTEMPO - TITULO DE ELEITOR [1].pdf'),
(312, '', '', 'feminino', 'solteiro', 'EMMANUELLE KISSIA PINHEIRO VENTURA', 'JOSÉ DE ANCHIETA CHAVIER VENTURA e IGMA PINHEIRO DA SILVA VENTURA', '1091800GO', '(62) 98205-1212', 'repcampelo@hotmail.com', '23/02/1991', '17771439 / SSP-MT / DE: 28/09/2005', 'GOIÂNIA-GO', 'brasileira', '019.609.761-41', '989772323', '979080981212', 'RUA T-30 N. 2078 QD 84, LT 06/', 'NÃO', 'CPF-978.342.621-49', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'EMMANUELLE VENTURA (1091800)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '6458f6676a5901091800GO', '08/05/2023 10:17', './cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CARTAO DE VACINA [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CARTEIRA CRM [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CPF [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - CURRICULUM VITAE [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - DIPLOMA [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - FOTO [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - PIS [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - RG [1].pdf;./cadastrantes/1091800GO/EMMANUELLE KISSIA PINHEIRO VENTURA - TITULO DE ELEITOR [1].pdf'),
(358, '', '', 'masculino', 'solteiro', 'DIEGO FERNANDES NEVES OLIVEIRA', 'DARIO FERNANDES NEVES OLIVEIRA e ENEUSA MARIA DA SILVA NEVES', '696969GO', '(62) 99265-8254', 'dfno82@gmail.com', '08/01/1982', '4304274 / SSP-GO / DE: 24/06/2008', 'IPATINGA-GO', 'brasileira', '942.495.801-30', '6465456', '4535355', 'Rua 36, 115, Setor Marista', 'SIM', 'Celular-(62) 99265-8254', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'DIEGO FERNANDES (696969)', 'RPC E ASSOCIADOS S/S LTDA', 'confirmado', '649cd22c8b0c4696969GO', '28/06/2023 21:37', './cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - ANTECEDENTES ETICOS CRM [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CARTAO DE VACINA [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CERTIDAO NEGATIVA CRIMINAL ESTADUAL [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CERTIDAO NEGATIVA CRIMINAL FEDERAL [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO CRM [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO ESTADUAL [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO FEDERAL [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO MUNICIPAL [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CERTIDAO NEGATIVA DE DEBITO TRABALHISTA [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - COMPROVANTE DE ENDERECO [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - CURRICULUM VITAE [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - DIPLOMA [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - PIS [1].pdf;./cadastrantes/696969GO/DIEGO FERNANDES NEVES OLIVEIRA - TITULO DE ELEITOR [1].pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
