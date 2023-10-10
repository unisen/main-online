CREATE VIEW vmvencimentos_date AS 
SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento from cash ORDER BY fvencimento DESC


SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,`Valor Titulo`,`Valor Pago`,`Detalhe` FROM `cash` ORDER BY fvencimento DESC


/* Entre Intervalos de datas nas tabelas com campo de data formatado como texto (VARCHAR) */

SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,`Valor Titulo`,`Valor Pago`,`Detalhe` FROM `cash` WHERE Vencimento BETWEEN '30/09/2023' AND '30/09/2023';

SELECT SUM(`Valor Pago`) as `Total Pago` FROM `cash` WHERE `Cliente/Fornecedor` = 'ADELICIO APOLINÁRIO DE SOUSA' AND Vencimento BETWEEN '30/09/2023' AND '30/09/2023';


SELECT * FROM `cash` WHERE `Cliente/Fornecedor` = 'ADELICIO APOLINÁRIO DE SOUSA' AND Vencimento BETWEEN '30/09/2023' AND '30/09/2023';


SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`),SUM(`Valor Pago`) FROM `cash`
GROUP BY fdatapgto;

SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`),SUM(`Valor Pago`) FROM `cash`
WHERE `Data Pgto` >= '01/09/2023'
GROUP BY fdatapgto;



SELECT `Cliente/Fornecedor`, STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`),SUM(`Valor Pago`) FROM `cash` WHERE `Cliente/Fornecedor` = 'YHASMIN FERNANDA SILVEIRA LAMEIRA' AND `Data Pgto` = '22/09/2023';

SELECT FORMAT(`Valor Pago`, 'C', 'de-DE') as valor_pago FROM `cash` LIMIT 1;

SELECT SUM(`Valor Pago`) as valor_pago FROM `cash` WHERE ID <= 2;


SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash`
WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01'
GROUP BY fdatapgto
ORDER BY fdatapgto DESC;

SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash`
WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01'
GROUP BY fdatapgto
ORDER BY fdatapgto DESC;

SELECT * FROM `cash`
WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01'
ORDER BY STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') DESC;

SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01' GROUP BY fdatapgto ORDER BY fdatapgto DESC;

SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(FORMAT(`Valor Titulo`, 'C', 'pt-br')) as total_vtitulo, SUM(FORMAT(`Valor Pago`, 'C', 'pt-br')) as total_vpgto FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01' GROUP BY fdatapgto ORDER BY fdatapgto DESC;


SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-22' GROUP BY fdatapgto ORDER BY fdatapgto DESC;

SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') = '2023-09-22' ORDER BY fdatapgto DESC;

SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,`Valor Titulo`,`Valor Pago`,`Detalhe` FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') = '2023-09-22' ORDER BY `cash`.`Valor Pago` DESC

SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01' GROUP BY fdatapgto ORDER BY fdatapgto DESC;

SELECT `Vencimento`,`Data Pgto`,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash2` WHERE`Data Pgto` >= '2023-09-01' GROUP BY `Data Pgto` ORDER BY `Data Pgto` DESC;

SELECT REPLACE('12.000,22', '.', '');

-- FORMATA COMO MOEDA
SELECT FORMAT(CONVERT(float, 2565,00),'C','pt-br');
SELECT FORMAT(CONVERT(float, 2565,00),'C','pt-br');

SELECT *, CAST(`Valor Titulo` AS float), FORMAT(`Valor Pago`,'C','pt-br') FROM cash_teste;


SELECT FORMAT(CONVERT(float, REPLACE('2.565,00','.',''),'C','pt-br'));

SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,`Valor Titulo`,`Valor Pago`,`Detalhe` FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01' ORDER BY `fdatapgto` DESC

SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto, REPLACE(`Valor Titulo`,'.',''),REPLACE(`Valor Pago`,'.',''),`Detalhe` FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01' ORDER BY `fdatapgto` DESC

SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto, REPLACE(`Valor Titulo`,'.','') AS valor_titulo, REPLACE(`Valor Pago`,'.','') as valor_pago,`Detalhe` FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01' ORDER BY `fdatapgto` DESC



SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto, REPLACE(`Valor Titulo`,'.','') AS valor_titulo, REPLACE(`Valor Pago`,'.','') as valor_pago,`Detalhe`
INTO cash_teste
FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01' ORDER BY `fdatapgto` DESC


-- CRIA UMA TABELA - Inserindo todos os dados formatados em outra tabela

INSERT INTO cash_teste
SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto, REPLACE(`Valor Titulo`,'.','') AS valor_titulo, REPLACE(`Valor Pago`,'.','') as valor_pago,`Detalhe`
FROM `cash` WHERE STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') >= '2023-09-01' ORDER BY `fdatapgto` DESC


-- cria tabela cash2 trocando as virgulas pelos pontos no campos de moeda
INSERT INTO cash2
SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,`Vencimento`,`Data Pgto`,REPLACE(`Valor Titulo`,',','.') AS `Valor Titulo`,REPLACE(`Valor Pago`,',','.') AS `Valor Pago`,`Detalhe`
FROM cash_teste


ALTER TABLE `cash2` CHANGE `Valor Pago` `Valor Pago` DECIMAL(20,2) NULL DEFAULT '0.00';

SELECT `Vencimento`,`Data Pgto`,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash2` WHERE`Data Pgto` >= '2023-09-01' GROUP BY `Data Pgto` ORDER BY `Data Pgto` DESC;

-- AGORA CORRIGIDO AS CONTA E TODOS CAMPOS DE DATA E DE MOEDA
SELECT `Cliente/Fornecedor`, `Vencimento`,`Data Pgto`, SUM(`Valor Titulo`), SUM(`Valor Pago`) FROM `cash2` WHERE `Cliente/Fornecedor` = 'YHASMIN FERNANDA SILVEIRA LAMEIRA' GROUP BY `Data Pgto`;

-- SOMA DOS ULTIMOS RECEBIMENTOS NO MÊS DE SETEMBRO, AGRUPADOS PELO DIA DA DATA DE PAGAMENTO
SELECT `Vencimento`,`Data Pgto`,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash2` WHERE `Data Pgto` BETWEEN '2023-09-01' AND '2023-09-31' GROUP BY `Data Pgto` ORDER BY `Data Pgto` DESC;





-- cria a tabela cash_teste formatando os campos errados
INSERT INTO cash_teste
SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto, REPLACE(`Valor Titulo`,'.','') AS valor_titulo, REPLACE(`Valor Pago`,'.','') as valor_pago,`Detalhe`
FROM `cash;



SELECT `Vencimento`,`Data Pgto`,SUM(`Valor Titulo`) as total_vtitulo, SUM(`Valor Pago`) as total_vpgto FROM `cash_teste` WHERE `Data Pgto` >= '2023-09-01' GROUP BY `Data Pgto` ORDER BY `Data Pgto` DESC;


SELECT *, CAST(`Valor Titulo` AS float), FORMAT(`Valor Pago`,'C','pt-br') FROM cash_teste;



