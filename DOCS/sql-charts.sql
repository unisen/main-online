-- SELECIONA VALORES A PAGAR AGRUPADOS POR MES
SELECT `mes`, `tipo`, SUM(`valor_titulo`) AS total_vtitulos, SUM(`valor_pago`) AS total_vpago FROM `fluxo_de_caixa` WHERE `tipo` = 'PAGAR' GROUP BY mes ORDER BY `id` ASC;

CREATE VIEW vmvalpgto_mes AS
SELECT `mes`, `tipo`, SUM(`valor_titulo`) AS total_vtitulos, SUM(`valor_pago`) AS total_vpago FROM `fluxo_de_caixa` WHERE `tipo` = 'PAGAR' GROUP BY mes ORDER BY `id` ASC;



-- SELECIONA VALORES A RECEBER AGRUPADOS POR MES
CREATE VIEW vmvalreceber_mes AS
SELECT `mes`, `tipo`, SUM(`valor_titulo`) AS total_vtitulos, SUM(`valor_pago`) AS total_vpago FROM `fluxo_de_caixa` WHERE `tipo` = 'RECEBER' GROUP BY mes ORDER BY `id` ASC;