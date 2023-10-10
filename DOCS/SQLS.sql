CREATE VIEW vmvencimentos_date AS 
SELECT STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento from cash ORDER BY fvencimento DESC


SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,`Valor Titulo`,`Valor Pago`,`Detalhe` FROM `cash` ORDER BY fvencimento DESC


/* Entre Intervalos de datas nas tabelas com campo de data formatado como texto (VARCHAR) */

SELECT `ID`,`Mês`,`Tipo`,`NF/CPF`,`Cliente/Fornecedor`,`Centro de Custo`,`Plano de Contas`,`Banco`,STR_TO_DATE(`Vencimento`, '%d/%m/%Y') as fvencimento,STR_TO_DATE(`Data Pgto`, '%d/%m/%Y') as fdatapgto,`Valor Titulo`,`Valor Pago`,`Detalhe` FROM `cash` WHERE Vencimento BETWEEN '30/09/2023' AND '30/09/2023';

SELECT SUM(`Valor Pago`) as `Total Pago` FROM `cash` WHERE `Cliente/Fornecedor` = 'ADELICIO APOLINÁRIO DE SOUSA' AND Vencimento BETWEEN '30/09/2023' AND '30/09/2023';


SELECT * FROM `cash` WHERE `Cliente/Fornecedor` = 'ADELICIO APOLINÁRIO DE SOUSA' AND Vencimento BETWEEN '30/09/2023' AND '30/09/2023';
